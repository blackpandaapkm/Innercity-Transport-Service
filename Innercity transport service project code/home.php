<?php
session_start();
$email = $_SESSION['email'];
?>
<?php
include("connection.php");
$query = "SELECT from_ FROM `route`;";
$query2 = "SELECT to_ FROM `route`;";
$from_data = mysqli_query($con, $query);
$to_data = mysqli_query($con, $query2);
$query3 = "SELECT time_ FROM `route`;";
$time_data = mysqli_query($con, $query3);
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="adminpanel.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .header {
      background-color: darkkhaki;
    }
  </style>
  <title>USER PANEL</title>
</head>

<body>
  <div class="header">
    <h2>USER PANEL</h2>
    <p>INNERCITY TRANSPORT SERVICES</p>
  </div>
  <div class="alltab">
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'vTICKET')" id="defaultOpen">BUY TICKET</button>
      <button class="tablinks" onclick="openCity(event, 'TICKET')">MY TICKET</button>
      <button class="tablinks" onclick="openCity(event, 'PROFILE')">PROFILE</button>
    </div>

    <div id="TICKET" class="tabcontent">
      <h3>TICKETS</h3>
      <br>
      <table class="table">
        <tread>
          <tr>
            <th>BUS NAME</th>
            <th>from</th>
            <th>to</th>
            <th>PRICE</th>
            <th>TIME</th>
            <th>DATE</th>
            <th>OP</th>
          </tr>
        </tread>
        <tbody>
          <?php
            include("connection.php");
            $sql = "select * from ticket INNER join passenger on ticket.passenger_id = passenger.ps_id INNER join bus on ticket.bus_id = bus.bus_id where passenger.ps_mail ='$email';";
            $result = mysqli_query($con, $sql);
            if (!$result) {
              die("invalid query: " . $con->error);
            }
            while ($row = $result->fetch_assoc()) {
              $tic_id =$row['ticket_id'];
              $price = $row["distance"] * 5;
              echo "<tr>
            <td>" . $row["bus_name"] . "</td>
            <td>" . $row["from_"] . "</td>
            <td>" . $row["to_"] . "</td>
            <td>" . $price . "</td>
            <td>" . $row["time_"] . "</td>
            <td>" . $row["date_"] . "</td>
            <td>
                <a href='delete.php?deltic_id=". $tic_id ."'>CANCEL</a>
            </td>
        </tr>";
            }
          ?>
        </tbody>
      </table>

    </div>

    <div id="vTICKET" class="tabcontent">
      <h3> BUY TICKET</h3>
      <form action="#" method="post">
        <level>FROM</level>
        <select name="f1" id="f1">
          <option selected>select</option>
          <?php
          while ($from_data_row = mysqli_fetch_array($from_data)) { ?>
            <option value="<?php echo $from_data_row['from_']; ?>">
              <?php echo $from_data_row['from_']; ?>
            </option>
          <?php }
          ?>
        </select>
        <level>TO</level>
        <select name="f2" id="f1">
          <option selected>select</option>
          <?php
          while ($to_data_row = mysqli_fetch_array($to_data)) { ?>
            <option value="<?php echo $to_data_row['to_']; ?>">
              <?php echo $to_data_row['to_']; ?>
            </option>
          <?php }
          ?>
        </select>
        <level>DATE</level>
        <input type="date" name="date_" required>
        </select>
        <input type="submit" id="button" name="search" value="search">
      </form>
      <br>
      <table class="table">
        <tread>
          <tr>
            <th>BUS NAME</th>
            <th>from</th>
            <th>to</th>
            <th>PRICE</th>
            <th>TIME</th>
            <th>OP</th>
          </tr>
        </tread>
        <tbody>
          <?php
          if (isset($_POST['search'])) {
            include("connection.php");
            $from = $_POST['f1'];
            $to = $_POST['f2'];
            $date = $_POST['date_'];
            $_SESSION['mail'] = $email;
            $_SESSION['date'] = $date;
            $sql = "select * from route INNER join bus on route.bus_id = bus.bus_id where from_='$from' AND to_='$to';";
            $result = mysqli_query($con, $sql);

            if (!$result) {
              die("invalid query: " . $con->error);
            }
            while ($row = $result->fetch_assoc()) {
              $rt_id = $row['rt_id'];
              $price = $row["distance"] * 5;
              echo "<tr>
            <td>" . $row["bus_name"] . "</td>
            <td>" . $row["from_"] . "</td>
            <td>" . $row["to_"] . "</td>
            <td>" . $price . "</td>
            <td>" . $row["time_"] . "</td>
            <td>
                <a href='choosetic.php?rt_id=" . $rt_id . "'>buy now</a>
            </td>
        </tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>

    <div id="PROFILE" class="tabcontent">
      <h3>PROFILE INFORMATION</h3>
      <?php
      include("connection.php");
      $query = "select * from passenger where ps_mail='$email'";
      $qrun = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($qrun)) {
      ?>
        <form action="#" method="post">
          <p>ID : <?php echo $row['ps_id'] ?></p>
          <p>NAME : <?php echo $row['ps_name'] ?></p>
          <p>MOBILE NO : <?php echo $row['ps_mobile_no'] ?></p>
          <p>MAIL : <?php echo $row['ps_mail'] ?></p>
          <p>ADDRESS : <?php echo $row['ps_address'] ?></p>
          <?php
          $ps_id  = $row['ps_id'];
          echo "<a href='updatepassenger.php? updatepsid=" . $ps_id . "'>update</a>" ?>
          <a href='index.php'>LOGOUT</a>
        </form>
      <?php
      }
      ?>
    </div>
    <script>
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
    </script>
  </div>
  <div class="footer">
    <p>Inner city transport service</p>
    <div class="social">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-dribbble"></i></a>
    </div>
    <p class="end">CopyRight By Team Halum </p>
  </div>
</body>

</html>