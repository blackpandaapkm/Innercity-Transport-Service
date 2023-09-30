<?php
session_start();
include("connection.php");
include("functions.php");
if (isset($_POST['signin'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $query = "select * from passenger where ps_mail='$mail'and ps_password='$password'";
    $_SESSION['email'] = $mail;
    $dd = mysqli_query($con, $query);
    $count = mysqli_num_rows($dd);

    if ($count > 0) {
        header("location:home.php");
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
    <title>USER SIGNIN</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="signup">
        <h1>SIGN IN</h1>
        <form action="#" method="post">
            <input type="email" placeholder="Enter mail" name="mail" required>
            <input type="password" placeholder="Enter password" name="password" required>
            <div class="term">
                <input type="checkbox" id="checkbox" required>
                <label for="checkbox">please read
                    <a href="#">Term and conditions</a>
                </label>
            </div>
            <input type="submit" id="button" name="signin" value="SIGN IN">
            <div class="member">
                new member ?
                <a href="signup.php">sign up here</a>
            </div>
    </div>
    </form>

</body>

</html>