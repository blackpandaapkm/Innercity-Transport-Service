<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name'];
    $sv_id = $_POST['sv_id'];
    $dv_id = $_POST['dv_id'];
    $bus_reg_no = $_POST['bus_reg_no'];
    $total_sit = $_POST['total_sit'];
    $query = "UPDATE bus SET bus_name='$bus_name',sv_id='$sv_id',dv_id='$dv_id',bus_reg_no='$bus_reg_no',total_sit='$total_sit' where bus_id='$bus_id'";
    if (mysqli_query($con, $query)) {
        header("location:adminpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
?>
<?php
include("connection.php");
$query = "SELECT sv_id FROM `supervisor`;";
$query2 = "SELECT dv_id FROM `driver`;";
$sv_data = mysqli_query($con, $query);
$dv_data = mysqli_query($con, $query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE BUS</title>
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
        <h1>UPDATE BUS</h1>
        <?php
        include("connection.php");
        if (isset($_GET['updatebid'])) {
            $id = $_GET['updatebid'];
            $query = "select * from bus where bus_id='$id'";
            $qrun = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($qrun)) {
        ?>
                <form action="#" method="post">
                    <p>Bus id</p>
                    <input type="text" placeholder="Bus id" name="bus_id" value="<?php echo $row['bus_id'] ?>" readonly>
                    <p>Bus name</p>
                    <input type="text" placeholder="Bus name" name="bus_name" value="<?php echo $row['bus_name'] ?>" required>
                    <p>Suupervisor id</p>
                    <select name="sv_id" id="f1" value="<?php echo $row['sv_id'] ?>">
                        <option selected><?php echo $row['sv_id']; ?></option>
                        <?php
                        while ($sv_data_row = mysqli_fetch_array($sv_data)) { ?>
                            <option value="<?php echo $sv_data_row['sv_id']; ?>">
                                <?php echo $sv_data_row['sv_id']; ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                    <p>Driver id</p>
                    <select name="dv_id" id="f1" value="<?php echo $row['dv_id'] ?>">
                        <option selected><?php echo $row['dv_id']; ?></option>
                        <?php
                        while ($dv_data_row = mysqli_fetch_array($dv_data)) { ?>
                            <option value="<?php echo $dv_data_row['dv_id']; ?>">
                                <?php echo $dv_data_row['dv_id']; ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                    <p>Bus reg no</p>
                    <input type="text" placeholder="Bus reg no" name="bus_reg_no" value="<?php echo $row['bus_reg_no'] ?>" required>
                    <p>Total sit</p>
                    <input type="number" placeholder="Total sit" name="total_sit" value="<?php echo $row['total_sit'] ?>" required>
                    <input type="submit" id="button" name="submit" value="UPDATE DATA">
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>