<?php
include('../Database/connect_db.php');
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
    $name=$_POST['name'];
    $family=$_POST['family'];
    $father_name=$_POST['name_father'];
    $code_meli=$_POST['code_meli'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $address=$_POST['address'];



    $sql="SELECT * FROM card_fans WHERE phone='$phone'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);
    if ($row <= 0) {
            $sql = "INSERT INTO card_fans (name,family,name_father,code_meli,city,phone,address) VALUES('$name','$family','$father_name','$code_meli','$city','$phone','$address')";
            $status = mysqli_query($conn,$sql);  
            if ($status) {
                header("Location: index.php");
                }else{
                    header("Location: register_temp.php");
                }?>
            <?php

    }else{
        header("Location: index.php");

    }

    
    