<?php
session_start();
include("connection.php");
$email = $_SESSION['email'];
$query3 = "SELECT sv_id FROM `supervisor` where sv_mail='$email';";
$sv_id = mysqli_query($con, $query3);
while ($row = mysqli_fetch_array($sv_id)) {
    $svid=$row['sv_id'];
}
echo $email;
echo $svid;
if (isset($_GET['tickid'])) {
    $id = $_GET['tickid'];
    echo $id;
    $query = "Insert into ticket_sit(ticket_id,status,sv_id) values('$id','CHECKED','$svid')";
    if (mysqli_query($con, $query)) {
        header("location:supervisorpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
?>