<?php
session_start();
include("connection.php");
$email = $_SESSION['email'];
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
  .header
{
    background-color: green;
}
</style>
<title>SUPERVISOR PANEL</title>
</head>

<body>
<div class="header">
  <h2>SUPERVISOR PANEL</h2>
  <p>INNERCITY TRANSPORT SERVICES</p>
</div>
<div class="alltab">
  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'TICKET')" id="defaultOpen">TICKET</button>
    <button class="tablinks" onclick="openCity(event, 'CTICKET')">CHECKED TICKET</button>
    <button class="tablinks" onclick="openCity(event, 'PROFILE')">PROFILE</button>
  </div>

  <div id="TICKET" class="tabcontent">
    <h3>TICKET</h3>
    <form action="#" method="post">
    <level>TIME</level>
        <select name="f1" id="f1">
          <option selected>select</option>
          <?php
          while ($time_data_row = mysqli_fetch_array($time_data)) { ?>
            <option value="<?php echo $time_data_row['time_']; ?>">
              <?php echo $time_data_row['time_']; ?>
            </option>
          <?php }
          ?>
        </select>
      <input type="submit" id="button" name="search" value="search">
    </form>
    <br>
    <table class="table">
      <tread>
        <tr>
          <th>TICKET ID</th>
          <th>from</th>
          <th>to</th>
          <th>SIT NO</th>
          <th>PS_id</th>
          <th>OP</th>
        </tr>
      </tread>
      <tbody>
        <?php

        if (isset($_POST['search'])) {
          include("connection.php");
          $time = $_POST['f1'];
          $sql = "select * from ticket where time_='$time' AND sv_id in (select sv_id from supervisor where sv_mail ='$email')";
          $result = mysqli_query($con, $sql);

          if (!$result) {
            die("invalid query: " . $con->error);
          }
          while ($row = $result->fetch_assoc()) {
            $ticket_id=$row['ticket_id'];
            echo "<tr>
            <td>" . $row["ticket_id"] . "</td>
            <td>" . $row["from_"] . "</td>
            <td>" . $row["to_"] . "</td>
            <td>" . $row["sit_no"] . "</td>
            <td>" . $row["passenger_id"] . "</td>
            <td>
                <a href='checkedtic.php? tickid=" . $ticket_id . "'>checked</a>
             </td>
        </tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>
  <div id="CTICKET" class="tabcontent">
    <h3>CHECKED TICKET</h3>
    <form action="#" method="post">
    <!-- <level>TIME</level>
        <select name="f1" id="f1">
          <option selected>select</option>
          <?php
          while ($time_data_row = mysqli_fetch_array($time_data)) { ?>
            <option value="<?php echo $time_data_row['time_']; ?>">
              <?php echo $time_data_row['time_']; ?>
            </option>
          <?php }
          ?>
        </select> 
      <input type="submit" id="button" name="search" value="search">
    </form>
    <br>-->
    <table class="table">
      <tread>
        <tr>
          <th>TICKET ID</th>
          <th>STATUS</th>
        </tr>
      </tread>
      <tbody>
        <?php
          include("connection.php");
          $sql = "select * from ticket_sit where sv_id in (select sv_id from supervisor where sv_mail ='$email')";
          $result = mysqli_query($con, $sql);

          if (!$result) {
            die("invalid query: " . $con->error);
          }
          while ($row = $result->fetch_assoc()) {
            $ticket_id=$row['ticket_id'];
            echo "<tr>
            <td>" . $row["ticket_id"] . "</td>
            <td>" . $row["status"] . "</td>
        </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
  <div id="PROFILE" class="tabcontent">
    <h3>PROFILE INFORMATION</h3>
    <?php
    include("connection.php");
    $query = "select * from supervisor where sv_mail='$email'";
    $qrun = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($qrun)) {
    ?>
      <form action="#" method="post">
        <p>supervisor ID : <?php echo $row['sv_id'] ?></p>
        <p>supervisor NAME : <?php echo $row['sv_name'] ?></p>
        <p>supervisor mobile_no : <?php echo $row['sv_mobile_no'] ?></p>
        <p>supervisor MAIL : <?php echo $row['sv_mail'] ?></p>
        <p>supervisor ADDRESS : <?php echo $row['sv_address'] ?></p>
        <?php
        $sv_id  = $row['sv_id'];
        echo "<a href='updatessv.php? updatessid=" . $sv_id . "'>update</a>"  ?>
        <a href='supervisorlog.php'>LOGOUT</a>
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
  <div  class="footer">
  <p>Inner city transport service</p>
		<div class="social">
			<a href="#"><i class="fab fa-facebook-f"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-dribbble"></i></a>
		</div>
		<p class="end">CopyRight By anupam kumar </p>
  </div>
</body>

</html>