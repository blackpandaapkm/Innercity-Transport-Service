<?php

include("connection.php");
include("functions.php");

if (isset($_POST['submit'])) {
    $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name'];
    $sv_id = $_POST['sv_id'];
    $dv_id = $_POST['dv_id'];
    $bus_reg_no = $_POST['bus_reg_no'];
    $total_sit = $_POST['total_sit'];
    $query = "Insert into bus(bus_id,bus_name,sv_id,dv_id,bus_reg_no,total_sit) values ('$bus_id','$bus_name','$sv_id','$dv_id','$bus_reg_no','$total_sit')";
    if (mysqli_query($con, $query)) {
        header("location:adminpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
?>
<?php
include("connection.php");
$query = "SELECT sv_id FROM `supervisor`;";
$query2 = "SELECT dv_id FROM `driver`;";
$sv_data = mysqli_query($con, $query);
$dv_data = mysqli_query($con, $query2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD BUS</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="signup">
        <h1>ADD BUS</h1>
        <form action="#" method="post">
            <input type="text" placeholder="Bus Id" name="bus_id" required>
            <input type="text" placeholder="Bus name" name="bus_name" required>
            <select name="sv_id" id="f1">
                <option selected>Suupervisor id</option>
                <?php
                while ($sv_data_row = mysqli_fetch_array($sv_data)) { ?>
                    <option value="<?php echo $sv_data_row['sv_id']; ?>">
                        <?php echo $sv_data_row['sv_id']; ?>
                    </option>
                <?php }
                ?>
            </select>
            <select name="dv_id" id="f1">
                <option selected>Driver id</option>
                <?php
                while ($dv_data_row = mysqli_fetch_array($dv_data)) { ?>
                    <option value="<?php echo $dv_data_row['dv_id']; ?>">
                        <?php echo $dv_data_row['dv_id']; ?>
                    </option>
                <?php }
                ?>
            </select>
            <input type="text" placeholder="Bus Reg Number" name="bus_reg_no" required>
            <input type="number" placeholder="Total Sit" name="total_sit" required>
            <input type="submit" id="button" name="submit" value="ADD DATA">
        </form>
    </div>
</body>

</html>