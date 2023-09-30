<?php
session_start();
include("connection.php");
if (isset($_POST['signin'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $query = "select * from admin where ad_mail='$mail'and ad_password='$password'";
    $dd = mysqli_query($con, $query);
    $count = mysqli_num_rows($dd);
    $_SESSION['email'] = $mail;
    if ($count > 0) {
        header("location:adminpanel.php");
    } else {
?>
        <script>
            function myFunction() {
                alert("wrong information");
            }
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN SIGNIN</title>
    <link rel="stylesheet" href="signup.css">
    <style>
        body {
            background-color: brown;
        }
    </style>
</head>

<body>
    <div class="signup">
        <h1>ADMIN</h1>
        <h1> SIGN IN</h1>
        <form action="#" method="post">
            <input type="email" placeholder="Enter your mail" name="mail" required>
            <input type="password" placeholder="Enter your password" name="password" required>
            <input type="submit" id="button" name="signin" value="SIGN IN">
        </form>
    </div>
</body>
</html>