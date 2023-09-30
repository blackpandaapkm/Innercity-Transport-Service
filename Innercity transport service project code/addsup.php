<?php

include("connection.php");
include("functions.php");

if (isset($_POST['submit'])) {
    $sv_id = $_POST['sv_id'];
    $sv_name = $_POST['sv_name'];
    $sv_mobile_no = $_POST['sv_mobile_no'];
    $sv_mail = $_POST['sv_mail'];
    $sv_address = $_POST['sv_address'];
    $sv_password = $_POST['sv_password'];

    $query = "Insert into supervisor(sv_id,sv_name,sv_mobile_no,sv_mail,sv_address,sv_password) values ('$sv_id','$sv_name','$sv_mobile_no','$sv_mail','$sv_address','$sv_password')";
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
    <title>ADD SUUPERVISOR</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="signup">
        <h1>ADD SUPERVISOR</h1>
        <form action="#" method="post">
            <input type="text" placeholder="supervisor Id" name="sv_id" required>
            <input type="text" placeholder="supervisor name" name="sv_name" required>
            <input type="number" placeholder="supervisor mobile no" name="sv_mobile_no" required>
            <input type="text" placeholder="supervisor mail" name="sv_mail" required>
            <input type="text" placeholder="supervisor ddress" name="sv_address" required>
            <input type="password" placeholder="supervisor password" name="sv_password" required>
            <input type="submit" id="button" name="submit" value="ADD DATA">
        </form>
    </div>
</body>

</html>