<?php
session_start();
$email = $_SESSION['email'];
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
 <title>ADMIN PANEL</title>
</head>

<body>
  <div class="header">
    <h2>ADMIN PANEL</h2>
    <p>INNERCITY TRANSPORT SERVICES</p>
  </div>
  <div class="alltab">
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'ROUTE')" id="defaultOpen">ROUTE</button>
      <button class="tablinks" onclick="openCity(event, 'BUS')">BUS</button>
      <button class="tablinks" onclick="openCity(event, 'DRIVER')">DRIVER</button>
      <button class="tablinks" onclick="openCity(event, 'SUPERVISOR')">SUPERVISOR</button>
      <button class="tablinks" onclick="openCity(event, 'PASSENGER')">PASSENGER</button>
      <button class="tablinks" onclick="openCity(event, 'TICKET')">TICKET</button>
      <button class="tablinks" onclick="openCity(event, 'PROFILE')">PROFILE</button>

    </div>

    <div id="ROUTE" class="tabcontent">
      <h3>ROUTE INFORMATION</h3>
      <!-- <p>ROUTE INFORMATION</p> -->
      <a href='addroute.php'>ADD</a>
      <br>
      <table class="table">
        <tread>
          <tr>
            <th>ROOT ID</th>
            <th>FROM</th>
            <th>TO</th>
            <th>DISTANCE</th>
            <th>BUS ID</th>
            <th>TIME</th>
            <th>OP</th>
          </tr>
        </tread>
        <tbody>
          <?php
          include("connection.php");
          $sql = "select * from route";
          $result = mysqli_query($con, $sql);

          if (!$result) {
            die("invalid query: " . $con->error);
          }
          while ($row = $result->fetch_assoc()) {
            $rt_id = $row['rt_id'];
            $from = $row['from_'];
            $to = $row['to_'];
            $Distance = $row['distance'];
            $bus_id = $row['bus_id'];
            $time = $row['time_'];

            echo "<tr>
            <td>" . $row["rt_id"] . "</td>
            <td>" . $row["from_"] . "</td>
            <td>" . $row["to_"] . "</td>
            <td>" . $row["distance"] . "</td>
            <td>" . $row["bus_id"] . "</td>
            <td>" . $row["time_"] . "</td>
            <td>
                <a href='updateroute.php? updaterid=" . $rt_id . "'>update</a>
                <a href='delete.php? deleteid=" . $rt_id . "'id='del'>delete</a>
            </td>
        </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <div id="BUS" class="tabcontent">
      <h3>BUS INFORMATION</h3>
      <!-- <p>BUS INFORMATION</p> -->
      <a href='addbbus.php'>ADD</a>
      <br>
      <table class="table">
        <tread>
          <tr>
            <th>BUS ID</th>
            <th>BUS NAME</th>
            <th>SUP ID</th>
            <th>DIRVER ID</th>
            <th>BUS REG NO </th>
            <th>TOTAL SIT</th>
            <th>OP</th>
          </tr>
        </tread>
        <tbody>
          <?php
          include("connection.php");
          $sql = "select * from bus";
          $result = mysqli_query($con, $sql);

          if (!$result) {
            die("invalid query: " . $con->error);
          }
          while ($row = $result->fetch_assoc()) {
            $bus_id = $row['bus_id'];
            echo "<tr>
            <td>" . $row["bus_id"] . "</td>
            <td>" . $row["bus_name"] . "</td>
            <td>" . $row["sv_id"] . "</td>
            <td>" . $row["dv_id"] . "</td>
            <td>" . $row["bus_reg_no"] . "</td>
            <td>" . $row["total_sit"] . "</td>
            <td>
                <a href='updatebus.php? updatebid=" . $bus_id . "'>update</a>
                <a href='delete.php? deletebid=" . $bus_id . "'id='del'>delete</a>
            </td>
        </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <div id="DRIVER" class="tabcontent">
      <h3>DRIVER INFORMATION</h3>
      <!-- <p>DRIVER INFORMATION</p> -->
      <a href='adddv.php'>ADD</a>
      <br>
      <table class="table">
        <tread>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>MOBILE NUMBER</th>
            <th>REG NO</th>
            <th>ADDRESS</th>
            <th>OP</th>
          </tr>
        </tread>
        <tbody>
          <?php
          include("connection.php");
          $sql = "select * from driver";
          $result = mysqli_query($con, $sql);

          if (!$result) {
            die("invalid query: " . $con->error);
          }
          while ($row = $result->fetch_assoc()) {
            $dv_id = $row['dv_id'];
            echo "<tr>
            <td>" . $row["dv_id"] . "</td>
            <td>" . $row["dv_name"] . "</td>
            <td>" . $row["dv_mobile_no"] . "</td>
            <td>" . $row["dv_reg"] . "</td>
            <td>" . $row["dv_address"] . "</td>
            <td>
                <a href='updatedriver.php? updatedid=" . $dv_id . "'>update</a>
                <a href='delete.php? deletedid=" . $dv_id . "'id='del'>delete</a>
            </td>
        </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <div id="SUPERVISOR" class="tabcontent">
      <h3>SUPERVISOR INFORMATION</h3>
      <!-- <p>SUPERVISOR INFORMATION</p> -->
      <a href='addsup.php'>ADD</a>
      <br>
      <table class="table">
        <tread>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>MOBILE NUMBER</th>
            <th>MAIL</th>
            <th>ADDRESS</th>
            <th>OP</th>
          </tr>
        </tread>
        <tbody>
          <?php
          include("connection.php");
          $sql = "select * from supervisor";
          $result = mysqli_query($con, $sql);

          if (!$result) {
            die("invalid query: " . $con->error);
          }
          while ($row = $result->fetch_assoc()) {
            $sv_id = $row['sv_id'];
            echo "<tr>
            <td>" . $row["sv_id"] . "</td>
            <td>" . $row["sv_name"] . "</td>
            <td>" . $row["sv_mobile_no"] . "</td>
            <td>" . $row["sv_mail"] . "</td>
            <td>" . $row["sv_address"] . "</td>
            <td>
                <a href='updatesupvisor.php? updatesid=" . $sv_id . "'>update</a>
                <a href='delete.php? deletesid=" . $sv_id . "'id='del'>delete</a>
            </td>
        </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <div id="PASSENGER" class="tabcontent">
      <h3>PASSENGER INFORMATION</h3>
      <!-- <p>PASSENGER INFORMATION</p> -->
      <br>
      <table class="table">
        <tread>
          <tr>
            <th>ID</th>
            <th>NAME </th>
            <th>MOBILE NUMBER</th>
            <th>MAIL</th>
            <th>ADDRESS</th>
            <th>GENDER</th>
          </tr>
        </tread>
        <tbody>
          <?php
          include("connection.php");
          $sql = "select * from passenger";
          $result = mysqli_query($con, $sql);

          if (!$result) {
            die("invalid query: " . $con->error);
          }
          while ($row = $result->fetch_assoc()) {

            $ps_id  = $row['ps_id'];
            echo "<tr>
            <td>" . $row["ps_id"] . "</td>
            <td>" . $row["ps_name"] . "</td>
            <td>" . $row["ps_mobile_no"] . "</td>
            <td>" . $row["ps_mail"] . "</td>
            <td>" . $row["ps_address"] . "</td>
            <td>" . $row["ps_gender"] . "</td>
            <td>
            <a href='delete.php? deletepid=" . $ps_id . "'id='del'>delete</a>
            </td>
        </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <div id="TICKET" class="tabcontent">
      <h3>TICKET INFORMATION</h3>
      <!-- <p>TICKET INFORMATION</p> -->
      <br>
      <table class="table">
        <tread>
          <tr>
            <th>TICKET ID</th>
            <th>ROOT ID</th>
            <th>BUS ID</th>
            <th>FROM</th>
            <th>TO</th>
            <th>PRICE</th>
            <th>SIT NO</th>
            <th>PASS ID</th>
            <th>SUP ID</th>
          </tr>
        </tread>
        <tbody>
          <?php
          include("connection.php");
          $sql = "select * from ticket";
          $result = mysqli_query($con, $sql);

          if (!$result) {
            die("invalid query: " . $con->error);
          }
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["ticket_id"] . "</td>
            <td>" . $row["rt_id"] . "</td>
            <td>" . $row["bus_id"] . "</td>
            <td>" . $row["from_"] . "</td>
            <td>" . $row["to_"] . "</td>
            <td>" . $row["price"] . "</td>
            <td>" . $row["sit_no"] . "</td>
            <td>" . $row["passenger_id"] . "</td>
            <td>" . $row["sv_id"] . "</td>
        </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <div id="PROFILE" class="tabcontent">
      <h3>PROFILE INFORMATION</h3>
      <!-- <p>PROFILE INFORMATION</p> -->
      <?php
      include("connection.php");
      $query = "select * from admin where ad_mail='$email'";
      $qrun = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($qrun)) {
      ?>
        <form action="#" method="post">
          <p> ID : <?php echo $row['ad_id'] ?></p>
          <p> NAME : <?php echo $row['ad_name'] ?></p>
          <p> MOBILE NO : <?php echo $row['ad_mobile_no'] ?></p>
          <p> MAIL : <?php echo $row['ad_mail'] ?></p>
          <p> ADDRESS : <?php echo $row['ad_address'] ?></p>

          <?php
          $ad_id  = $row['ad_id'];
          echo "<a href='updateadmin.php? updateaid=" . $ad_id . "'id='del'>update</a>"  ?>
          <a href='adminlog.php'>LOGOUT</a>
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
  <p>Inner city transport services</p>
		<div class="social">
			<a href="#"><i class="fab fa-facebook-f"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-dribbble"></i></a>
		</div>
		<p class="end">CopyRight By Team Halum </p>
  </div>
</body>

</html>