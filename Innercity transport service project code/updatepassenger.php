<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $ps_id = $_POST['ps_id'];
    $ps_name = $_POST['ps_name'];
    $ps_mobile_no = $_POST['ps_mobile_no'];
    $ps_mail = $_POST['ps_mail'];
    $ps_address = $_POST['ps_address'];
    $ps_gender = $_POST['ps_gender'];
    $ps_password = $_POST['ps_password'];
    $query = "UPDATE passenger SET ps_name='$ps_name',ps_mobile_no='$ps_mobile_no',ps_mail='$ps_mail',ps_address='$ps_address',ps_gender='$ps_gender',ps_password='$ps_password' where ps_id='$ps_id'";
    if (mysqli_query($con, $query)) {
        header("location:home.php");
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
    <title>UPDATE USER</title>
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
        <h1>UPDATE PROFILE</h1>
        <?php
        include("connection.php");
        if (isset($_GET['updatepsid'])) {
            $id = $_GET['updatepsid'];
            $query = "select * from passenger where ps_id='$id'";
            $qrun = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($qrun)) {
        ?>
                <form action="#" method="post">
                    <p>Id</p>
                    <input type="text" placeholder="Id" name="ps_id" value="<?php echo $row['ps_id'] ?>" readonly>
                    <p>NAME</p>
                    <input type="text" placeholder="NAME" name="ps_name" value="<?php echo $row['ps_name'] ?>" required>
                    <p>MOBILE NUMBER</p>
                    <input type="text" placeholder="MOBILE NUMBER" name="ps_mobile_no" value="<?php echo $row['ps_mobile_no'] ?>" required>
                    <p>MAIL</p>
                    <input type="text" placeholder="MAIL" name="ps_mail" value="<?php echo $row['ps_mail'] ?>" required>
                    <p>ADDRESS</p>
                    <input type="text" placeholder="ADDRESS" name="ps_address" value="<?php echo $row['ps_address'] ?>" required>
                    <p>GENDER</p>
                    <input type="text" placeholder="GENDER" name="ps_gender" value="<?php echo $row['ps_gender'] ?>" required>
                    <p>PASSWORD</p>
                    <input type="password" placeholder="PASSWORD" name="ps_password" value="<?php echo $row['ps_password'] ?>" required>
                    <input type="submit" id="button" name="submit" value="UPDATE DATA">
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>