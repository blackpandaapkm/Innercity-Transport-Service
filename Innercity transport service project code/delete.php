<?php
include("connection.php");
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    // echo "$id";
    $query = "delete from route where rt_id ='$id'";
    if (mysqli_query($con, $query)) {
        header("location:adminpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
if (isset($_GET['deletepid'])) {
    $id = $_GET['deletepid'];
    echo "$id";
    $query = "delete from passenger where ps_id ='$id'";
    if (mysqli_query($con, $query)) {
        header("location:adminpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
if (isset($_GET['deletebid'])) {
    $id = $_GET['deletebid'];
    echo "$id";
    $query = "delete from bus where bus_id ='$id'";
    if (mysqli_query($con, $query)) {
        header("location:adminpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
if (isset($_GET['deletesid'])) {
    $id = $_GET['deletesid'];
    echo "$id";
    $query = "delete from supervisor where sv_id ='$id'";
    if (mysqli_query($con, $query)) {
        header("location:adminpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
if (isset($_GET['deletedid'])) {
    $id = $_GET['deletedid'];
    echo "$id";
    $query = "delete from driver where dv_id ='$id'";
    if (mysqli_query($con, $query)) {
        header("location:adminpanel.php");
    } else {
        die(mysqli_error($con));
    }
}
if (isset($_GET['deltic_id'])) {
    $id = $_GET['deltic_id'];
    echo "$id";
    $query = "delete from ticket where ticket_id ='$id'";
    if (mysqli_query($con, $query)) {
        header("location:home.php");
    } else {
        die(mysqli_error($con));
    }
}
?>