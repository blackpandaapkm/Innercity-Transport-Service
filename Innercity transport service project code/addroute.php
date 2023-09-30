<?php
include("connection.php");
include("functions.php");
if (isset($_POST['submit'])) {
    $rt_id = $_POST['rt_id'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $Distance = $_POST['dis'];
    $bus_id = $_POST['bus_id'];
    $time = $_POST['time'];

    $query = "Insert into route(rt_id,from_,to_,distance,bus_id,time_) values ('$rt_id','$from','$to','$Distance','$bus_id','$time')";
    if (mysqli_query($con, $query)) {
        header("location:adminpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
?>
<?php
include("connection.php");
$query = "SELECT bus_id FROM `bus`;";
$bus_data = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD ROUTE</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="signup">
        <h1>ADD ROUTE</h1>
        <form action="#" method="post">
            <input type="text" placeholder="Route Id" name="rt_id" required>
            <input type="text" placeholder="From " name="from" required>
            <input type="text" placeholder="To " name="to" required>
            <input type="number" placeholder="Distance " name="dis" required>
            <select name="bus_id" id="f1">
            <option selected>select</option>
                <?php
                while ($bus_data_row = mysqli_fetch_array($bus_data)) { ?>
                    <option value="<?php echo $bus_data_row['bus_id']; ?>">
                        <?php echo $bus_data_row['bus_id']; ?>
                    </option>
                <?php }
                ?>
            </select>
            <input type="time" placeholder="Time" name="time" required>
            <input type="submit" id="button" name="submit" value="ADD DATA">
        </form>
    </div>
</body>
</html>