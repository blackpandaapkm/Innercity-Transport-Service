<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $sv_id = $_POST['sv_id'];
    $sv_name = $_POST['sv_name'];
    $sv_mobile_no = $_POST['sv_mobile_no'];
    $sv_mail = $_POST['sv_mail'];
    $sv_address = $_POST['sv_address'];
    $sv_password = $_POST['sv_password'];
    $query = "UPDATE supervisor SET sv_name='$sv_name',sv_mobile_no='$sv_mobile_no',sv_mail='$sv_mail',sv_address='$sv_address' where sv_id='$sv_id'";
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
    <title>UPDATE SUPERVISOR</title>
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
        <h1>UPDATE SUPERVISOR</h1>
        <?php
        include("connection.php");
        if (isset($_GET['updatesid'])) {
            $id = $_GET['updatesid'];
            $query = "select * from supervisor where sv_id='$id'";
            $qrun = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($qrun)) {
        ?>
                <form action="#" method="post">
                <p>supervisor id</p>
                    <input type="text" placeholder="sv id" name="sv_id" value="<?php echo $row['sv_id'] ?>" readonly>
                    <p>supervisor name</p>
                    <input type="text" placeholder="sv name" name="sv_name" value="<?php echo $row['sv_name'] ?>" required>
                    <p>supervisor mobile no</p>
                    <input type="text" placeholder="sv_mobile_no" name="sv_mobile_no" value="<?php echo $row['sv_mobile_no'] ?>" required>
                    <p>supervisor mail</p>
                    <input type="text" placeholder="sv_mail" name="sv_mail" value="<?php echo $row['sv_mail'] ?>" required>
                    <p>supervisor address</p>
                    <input type="text" placeholder="sv_address" name="sv_address" value="<?php echo $row['sv_address'] ?>" required>
                    <input type="submit" id="button" name="submit" value="UPDATE DATA">
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>