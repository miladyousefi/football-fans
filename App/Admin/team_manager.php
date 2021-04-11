<?php
include('../../Database/connect_db.php');
$age=$_POST['age'];
$name=$_POST['name'];
$name_fa=$_POST['name_fa'];
$team_id=$_POST['team_id'];
$bio=$_POST['bio'];

$sql="INSERT INTO team_manager(age,name,name_fa,team_id,bio) VALUES('$age','$name','$name_fa','$team_id','$bio')";
$result=mysqli_query($conn,$sql);
    if($result){
        header("Location: club_man_temp.php");

    }else{
        header("Location: index.php");

    }