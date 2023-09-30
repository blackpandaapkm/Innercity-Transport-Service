<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $ad_id = $_POST['ad_id'];
    $ad_password = $_POST['ad_password'];
    $query = "UPDATE admin SET ad_password='$ad_password' where ad_id='$ad_id'";
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
    <title>UPDATE ADMIN</title>
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
        <h1>UPDATE admin</h1>
        <?php
        include("connection.php");
        if (isset($_GET['updateaid'])) {
            $id = $_GET['updateaid'];
            $query = "select * from admin where ad_id='$id'";
            $qrun = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($qrun)) {
        ?>
                <form action="#" method="post">
                <p>Admin id</p>
                    <input type="text" placeholder="Admin id" name="ad_id" value="<?php echo $row['ad_id'] ?>" readonly>
                    <p>Admin password</p>
                    <input type="text" placeholder="Admin password" name="ad_password" value="<?php echo $row['ad_password'] ?>" required>
                    <input type="submit" id="button" name="submit" value="UPDATE DATA">
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>