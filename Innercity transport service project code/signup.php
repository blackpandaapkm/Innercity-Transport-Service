<?php

include("connection.php");
include("functions.php");

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $mobilenumber = $_POST['mobilenumber'];
    $mail = $_POST['mail'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    if ($password == $cpassword) {
        $user_id = random_num(10);
        $query = "Insert into passenger(ps_id,ps_name,ps_mobile_no,ps_mail,ps_address,ps_gender,ps_password) values ('$user_id','$name','$mobilenumber','$mail','$address','$gender','$password')";
        if (mysqli_query($con, $query)) {
            header("location:signin.php");
        } else {
            die(mysqli_error($con));
        }
    }
    else
    {
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER SIGNUP</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="signup">
        <h1>SIGN UP</h1>
        <form action="#" method="post">
            <input type="text" placeholder="name" name="name" required>
            <input type="text" placeholder="mobile number" name="mobilenumber" required>
            <input type="email" placeholder="mail" name="mail" required>
            <input type="text" placeholder="address" name="address" required>
            <input type="text" placeholder="gender" name="gender" required>
            <input type="password" placeholder="password" name="password" required>
            <input type="password" placeholder="confirm password" name="cpassword" required>
            <div class="term">
                <input type="checkbox" id="checkbox" required >
                <label for="checkbox">i agree to these
                    <a href="#">Term and conditions</a>
                </label>
            </div>
            <input type="submit" id="button" name="signup" value="Signup">
            <div class="member">
                already a member ?
                <a href="signin.php">login here</a>
            </div>
    </div>
    </form>

</body>

</html>