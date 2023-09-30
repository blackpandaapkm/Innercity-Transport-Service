<?php
session_start();
include("connection.php");
if (isset($_POST['signin'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $query = "select * from supervisor where sv_mail='$mail'and sv_password='$password'";

    $dd = mysqli_query($con, $query);
    $count = mysqli_num_rows($dd);
    $_SESSION['email'] = $mail;

    if ($count > 0) {
        header("location:supervisorpanel.php");
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
    <title>SUPERVISOR SIGNIN</title>
    <link rel="stylesheet" href="signup.css">
    <style>
        body {
            background-color: darkgreen;
        }
    </style>

</head>

<body>
    <div class="signup">
        <h1>sign in</h1>
        <form action="#" method="post">
            <input type="email" placeholder="mail" name="mail" required>
            <input type="password" placeholder="password" name="password" required>
            <input type="submit" id="button" name="signin" value="Signin">
        </form>
    </div>
</body>

</html>