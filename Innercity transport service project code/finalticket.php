<?php
include("connection.php");
include("functions.php");
session_start();
$rt_id = $_SESSION['rt_id'];
$email = $_SESSION['mail'];
$seat = $_SESSION['seat'];
$status = $_SESSION['py_status'];
$date = $_SESSION['date'];
$dodo="CANCEL";
$sql = "select * from route where rt_id='$rt_id'";
$result2 = mysqli_query($con, $sql);
if (!$result2) {
    die("invalid query: " . $con->error);
}
while ($row = $result2->fetch_assoc()) {
    $from = $row['from_'];
    $to = $row['to_'];
    $bus_id = $row['bus_id'];
    $time = $row['time_'];
    $distance = $row['distance'];
    $price = $distance*5;
}
$sql1 = "select * from bus where bus_id='$bus_id'";
$result1 = mysqli_query($con, $sql1);

if (!$result1) {
    die("invalid query: " . $con->error);
}
while ($row1 = $result1->fetch_assoc()) {
    $bus_name = $row1['bus_name'];
    $sv_id = $row1['sv_id'];
}
?>
<?php

if (isset($_POST['ok'])) {
    $ps_name = $_POST['ps_name'];
    $ps_id = $_POST['ps_id'];
    $tic_code = $_POST['tic_code'];
    $query = "Insert into ticket(ticket_id,from_,to_,distance,bus_id,time_,date_,rt_id,price,sit_no,passenger_id,passenger_name,sv_id) values ('$tic_code','$from','$to','$distance','$bus_id','$time','$date','$rt_id','$price','$seat','$ps_id','$ps_name','$sv_id')";
    
    $dd = mysqli_query($con, $query);

    if (!$dd) {
        die("invalid query: " . $con->error);
    } else {
        $_SESSION['tic_code'] = $tic_code;
        header("location:pdf_ticket.php");
        header("location:pdf.php");
        $dodo="HOME";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

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

        .info {
            background-color: burlywood;
            width: 30%;
            align-items: center;
            margin-left: 5%;
        }

        .info p {
            margin-left: 25%;
            width: 300px;
            height: 30px;
            background-color: white;
            border-radius: 25px;
            padding: 5px;
        }

        .info a {
            margin-left: 25%;
            width: fit-content;
            height: 25px;
            background-color: red;
        }
    </style>
    <title>FINAL TICKET</title>
</head>

<body>
    <div class="header">
        <h2>USER PANEL</h2>
        <p>INNERCITY TRANSPORT SERVICES</p>
    </div>
    <div class="alltab">
        <div class="info">
            <h3>TICKET INFORMATION</h3>
            <?php
            include("connection.php");
            $cod = random_num(7);
            $query = "select * from passenger where ps_mail='$email'";
            $qrun = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($qrun)) {
            ?>
                <form action="#" method="post">
                    <input type="text" placeholder="cxvxc" name="ps_name" value="<?php echo $row['ps_name'] ?>" hidden>
                    <input type="text" placeholder="cxvxc" name="ps_id" value="<?php echo $row['ps_id'] ?>" hidden>
                    <P>USER NAME : <?php echo $row['ps_name'] ?></P>
                    <P>USER ID: <?php echo $row['ps_id'] ?></P>
                    <P>FROM: <?php echo $from ?></P>
                    <P>TO: <?php echo $to ?></P>
                    <P id="dd">TICKET CODE: <?php echo $cod ?></P>
                    <input type="text" placeholder="cxvxc" name="tic_code" value="<?php echo $cod ?>" hidden>
                    <P id="dd">BUS NAME: <?php echo $bus_name ?></P>
                    <P id="dd">SEAT NO: <?php echo $seat ?></P>
                    <P>ARRIVAL TIME: <?php echo $time ?></P>
                    <P>DATE: <?php echo $date ?></P>
                    <?php echo "<a href='home.php'>$dodo</a>" ?>
                    <input type="submit" id="button" name="ok" value="DOWNLOAD">
                </form>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="footer">
        <p>city transport services</p>
        <div class="social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-dribbble"></i></a>
        </div>
        <p class="end">CopyRight By anupam kumar </p>
    </div>
</body>

</html>