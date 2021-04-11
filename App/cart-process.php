<?php
include('../Database/connect_db.php');
$id=$_POST['id'];
$id_user=$_POST['user'];
$result_search=mysqli_query($conn,"SELECT * FROM cart");
$row=mysqli_fetch_assoc($result);
if($row['id_user']==$id_user and $row['id_product']==$id){
    return true;
}else{
    $result=mysqli_query($conn,"INSERT INTO cart(id_product,id_user) VALUES('$id','$id_user')");
    if($result){
        return true;
    }else{  
        return false;
    }
}

