<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $sv_id = $_POST['sv_id'];
    $sv_name = $_POST['sv_name'];
    $sv_password = $_POST['sv_password'];
    $query = "UPDATE supervisor SET sv_password='$sv_password' where sv_id='$sv_id'";
    if (mysqli_query($con, $query)) {
        header("location:supervisorpanel.php");
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
    <title>UPDATE SUPERVISOR</title>
    <link rel="stylesheet" href="signup.css">
    <style>
        form p {
            text-align: left;
            margin-left: 25px;
        }
    </style>
</head>

<body>
    <div class="signup">
        <h1>UPDATE SUPERVISOR</h1>
        <?php
        include("connection.php");
        if (isset($_GET['updatessid'])) {
            $id = $_GET['updatessid'];
            $query = "select * from supervisor where sv_id='$id'";
            $qrun = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($qrun)) {
        ?>
                <form action="#" method="post">
                    <p>Supervisor id</p>
                    <input type="text" placeholder="sv id" name="sv_id" value="<?php echo $row['sv_id'] ?>" readonly>
                    <p>Supervisor name</p>
                    <input type="text" placeholder="sv name" name="sv_name" value="<?php echo $row['sv_name'] ?>" readonly>
                    <p>Supervisor password</p>
                    <input type="password" placeholder="sv_password" name="sv_password" value="<?php echo $row['sv_password'] ?>" required>
                    <input type="submit" id="button" name="submit" value="UPDATE DATA">
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>