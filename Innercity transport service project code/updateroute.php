<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $rt_id = $_POST['rt_id'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $distance = $_POST['distance'];
    $bus_id = $_POST['bus_id'];
    $time = $_POST['time'];
    $query = "UPDATE route SET from_='$from',to_='$to',distance='$distance',bus_id='$bus_id',time_='$time' where rt_id='$rt_id'";
    if (mysqli_query($con, $query)) {
        header("location:adminpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
?>
<?php
include("connection.php");
$query = "SELECT bus_id FROM `bus`;";
$bus_data = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE ROUTE</title>
    <link rel="stylesheet" href="signup.css">
    <style>
        form p{
            text-align: left;
            margin-left: 25px;
        }
    </style>
</head>
<body>
    <div class="signup">
        <h1>UPDATE ROUTE</h1>
        <?php
        include("connection.php");
        if (isset($_GET['updaterid'])) {
            $id = $_GET['updaterid'];
            $query = "select * from route where rt_id='$id'";
            $qrun = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($qrun)) {
        ?>
                <form action="#" method="post">
                    <p>Route id</p>
                    <input type="text" placeholder="rt id" name="rt_id" value="<?php echo $row['rt_id'] ?>" readonly>
                    <p>From</p>
                    <input type="text" placeholder="From" name="from" value="<?php echo $row['from_'] ?>" required>
                    <p>To</p>
                    <input type="text" placeholder="to" name="to" value="<?php echo $row['to_'] ?>" required>
                    <p>Distance</p>
                    <input type="text" placeholder="distance" name="distance" value="<?php echo $row['distance'] ?>" required>
                    <p>Bus id</p>
                    <select name="bus_id" id="f1">
                        <option selected><?php echo $row['bus_id']; ?></option>
                        <?php

                        while ($bus_data_row = mysqli_fetch_array($bus_data)) { ?>
                            <option value="<?php echo $bus_data_row['bus_id']; ?>">
                                <?php echo $bus_data_row['bus_id']; ?>
                            </option>

                        <?php }
                        ?>
                    </select>
                    <p>Time</p>
                    <input type="time" placeholder="time" name="time" value="<?php echo $row['time_'] ?>" required>
                    <input type="submit" id="button" name="submit" value="UPDATE DATA">
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>
</html>