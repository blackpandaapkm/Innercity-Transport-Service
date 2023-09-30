<?php 
session_start();
$tic_code = $_SESSION['tic_code'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TICKET</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
    }
    body {
      background-color: white;
    }
    .signup {
      width: 360px;
      padding: 2rem 2rem;
      margin: 50px auto;
      background-color: antiquewhite;
      border-radius: 10px;
      text-align: left;
      box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }
    h1 {
      font-size: 2rem;
      color: chocolate;
      margin-bottom: 1.2rem;
      text-align: center;
    }
    form p {
      width: 92%;
      outline: none;
      border: 1px solid white;
      padding: 12px 20px;
      margin-bottom: 10px;
      border-radius: 20px;
      background: white;
    }
    .term {
      margin-top: 0.2rem;
      margin-bottom: 2rem;
    }

    .term label {
      font-size: 1rem;
    }

    .term a {
      color: rgb(14, 31, 184);
    }
    .member {
      margin-top: 2rem;
      margin-bottom: 0.2rem;
      text-align: center;
    }
    .member a {
      color: rgb(14, 31, 184);

    }
    #dd {
      background-color: gray;
    }
  </style>
</head>

<body>
  <div class="signup">
    <h1>HALUM</h1>
    <?php
    include("connection.php");
    $query = "select * from ticket where ticket_id ='$tic_code'";
    $qrun = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($qrun)) {
    ?>
      <form action="#" method="post">
        <P>NAME :   <?php echo $row['passenger_name'] ?></P>
        <P>USER ID:  <?php echo $row['passenger_id'] ?></P>
        <P>FROM:  <?php echo $row['from_'] ?></P>
        <P>TO:  <?php echo $row['to_'] ?></P>
        <P id="dd">TICKET CODE:  <?php echo $row['ticket_id'] ?></P>
        <P id="dd">BUS CODE:  <?php echo $row['bus_id'] ?></P>
        <P id="dd">SEAT NO:   <?php echo $row['sit_no'] ?></P>
        <P>ARRIVAL TIME:   <?php echo $row['time_'] ?></P>
        <P>DATE:   <?php echo $row['date_'] ?></P>
        <div class="member">
          FOR MORE INFORMATION
          <a href="pdf.php">HALUM.COM</a>
        </div>

      <?php
    }
      ?>
      </form>
  </div>

</body>

</html>