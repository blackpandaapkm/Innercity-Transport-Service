<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $dv_id = $_POST['dv_id'];
    $dv_name = $_POST['dv_name'];
    $dv_mobile_no = $_POST['dv_mobile_no'];
    $dv_reg = $_POST['dv_reg'];
    $dv_address = $_POST['dv_address'];
    $query = "UPDATE driver SET dv_name='$dv_name',dv_mobile_no='$dv_mobile_no',dv_reg='$dv_reg',dv_address='$dv_address' where dv_id='$dv_id'";
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
    <title>UPDATE DRIVER</title>
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
        <h1>UPDATE DRIVER</h1>
        <?php
        include("connection.php");
        if (isset($_GET['updatedid'])) {
            $id = $_GET['updatedid'];
            $query = "select * from driver where dv_id='$id'";
            $qrun = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($qrun)) {
        ?>
                <form action="#" method="post">
                    <p>Driver id</p>
                    <input type="text" placeholder="Driver id" name="dv_id" value="<?php echo $row['dv_id'] ?>" readonly>
                    <p>Driver name</p>
                    <input type="text" placeholder="Driver name" name="dv_name" value="<?php echo $row['dv_name'] ?>" required>
                    <p>Driver mobbile no</p>
                    <input type="text" placeholder="Driver mobbile no" name="dv_mobile_no" value="<?php echo $row['dv_mobile_no'] ?>" required>
                    <p>Driver reg number</p>
                    <input type="text" placeholder="Driver reg number" name="dv_reg" value="<?php echo $row['dv_reg'] ?>" required>
                    <p>Driver address</p>
                    <input type="text" placeholder="Driver address" name="dv_address" value="<?php echo $row['dv_address'] ?>" required>
                    <input type="submit" id="button" name="submit" value="UPDATE DATA">
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>