<?php
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
include('../../Database/connect_db.php');
$host_id=$_POST['host_id'];
$guest_id=$_POST['guest_id'];
$time=$_POST['time'];

$sql="INSERT INTO leage_play (host_id, guest_id, time) VALUES('$host_id','$guest_id','$time')";
                    $result=mysqli_query($conn,$sql);
                    if ($result){ 
                         header("Location: ../match.php");

                    }else{
                        echo "Nooooo id do not upload";
                    }