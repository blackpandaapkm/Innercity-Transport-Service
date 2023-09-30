<?php
session_start();
$rt_id = $_SESSION['rt_id'];
$email = $_SESSION['mail'];
$date = $_SESSION['date'];
$seat = $_GET['seat'];
?>
<?php
if (isset($_POST['submit'])) {
    $vf_code = $_POST['vf_code'];
    $td_code = $_POST['td_code'];
    if ($td_code == $vf_code) {
        $_SESSION['rt_id'] = $rt_id;
        $_SESSION['mail'] = $email;
        $_SESSION['seat'] = $seat;
        $_SESSION['py_status'] = "done";
        $_SESSION['date'] = $date;
        header("location:finalticket.php");
    } else {
        echo "not working";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link rel="stylesheet" href="signup.css">
    <style>
        form p{
            text-align: left;
            margin-left: 25px;
        }


        #gg{


            text-align: center;;
        }


    </style>
</head>

<body>
    <div class="signup">
        <h1>PAYMENT</h1>
        <?php
        include("connection.php");
        include("functions.php");
        $code = random_num(5);
        if (isset($_GET['seat'])) {
            $query = "select * from route where rt_id='$rt_id'";
            $qrun = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($qrun)) {
        ?>
                <form action="#" method="post">
                    <p>Route id</p>
                    <input type="text" placeholder="rt id" name="rt_id" value="<?php echo $row['rt_id'] ?>" readonly>
                    <p>Distance</p>
                    <input type="text" placeholder="distance" name="distance" value="<?php echo $row['distance'] ?>" readonly>
                    <p>Price</p>
                    <input type="text" placeholder="price" name="price" value="<?php echo $row['distance'] * 5 ?>" readonly>
                    <p> Your transtion code <?php echo $code ?></p>
                    <input type="text" placeholder="cxvxc" name="vf_code" value="<?php echo $code ?>" hidden>
                    <input type="text" placeholder="Enter transtion code" name="td_code" required>
                    <input type="submit" id="button" name="submit" value="PAYMENT">
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>