<?php

include("connection.php");
include("functions.php");

if (isset($_POST['submit'])) {
    $dv_id = $_POST['dv_id'];
    $dv_name = $_POST['dv_name'];
    $dv_mobile_no = $_POST['dv_mobile_no'];
    $dv_reg = $_POST['dv_reg'];
    $dv_address = $_POST['dv_address'];

    $query = "Insert into driver(dv_id,dv_name,dv_mobile_no,dv_reg,dv_address) values ('$dv_id','$dv_name','$dv_mobile_no','$dv_reg','$dv_address')";
    if (mysqli_query($con, $query)) {
        header("location:adminpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD DRIVER</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="signup">
        <h1>ADD DRIVER</h1>
        <form action="#" method="post">
            <input type="text" placeholder="Driver id" name="dv_id" required>
            <input type="text" placeholder="Driver name" name="dv_name" required>
            <input type="number" placeholder="Driver mobile no" name="dv_mobile_no" required>
            <input type="text" placeholder="Driver reg number" name="dv_reg" required>
            <input type="text" placeholder="Driver address" name="dv_address" required>
            <input type="submit" id="button" name="submit" value="ADD DATA">
        </form>
    </div>
</body>

</html>