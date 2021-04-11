<?php
session_start();
include_once('../Database/connect_db.php');
$phone=$_POST['phone'];
$sql="SELECT * FROM card_fans WHERE phone='$phone'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if($phone=="011111111"){
    $_SESSION['admin']="yes";
    header("Location: ../../Admin/index.php");
}


    if (mysqli_num_rows($result) <= 0) {
        header("Location: register_temp.php");
    }else{
        $_SESSION['user']=$row['id'];
        header("Location: user/index.php");

        }