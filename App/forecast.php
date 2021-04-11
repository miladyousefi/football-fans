<?php
session_start();
include('../Database/connect_db.php');
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
    $forecast_guest=$_POST['guest'];
    $forecast_host=$_POST['host'];
    $guest_id=$_POST['guest_id'];
    $host_id=$_POST['host_id'];
    $user_id=$_POST['user_id'];
    $match_id=$_POST['match_id'];

$sql="INSERT INTO forecast (forecast_guest,forecast_host,match_id,user_id,host_id,guest_id) VALUES('$forecast_guest','$forecast_host','$match_id','$user_id','$host_id','$guest_id')";
$result=mysqli_query($conn,$sql);
if ($result) {
    header("Location: match.php");
}else{
    header("Location: match.php");
}
