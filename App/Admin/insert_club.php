<?php
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
include('../../Database/connect_db.php');
$production_time=$_POST['production_time'];
$name=$_POST['name'];
$body=$_POST['body'];




//file
if(is_uploaded_file ( $_FILES['icon']['tmp_name'] )) {

    $folder_dir = __DIR__."../../../Public/img/logos/";

    $base = basename($_FILES['icon']['name']);

    $imageFileType = pathinfo($base, PATHINFO_EXTENSION);

    $file = uniqid() . "." . $imageFileType;

    $filename = $folder_dir .$file;

    if(file_exists($_FILES['icon']['tmp_name'])) {

        if($imageFileType == "jpg" || $imageFileType == "png")  {

            if($_FILES['icon']['size'] < 500000) { // File size is less than 5MB

                //If all above condition are met then copy file from server temp location to uploads folder.
                if(move_uploaded_file($_FILES["icon"]["tmp_name"], $filename)){
                    $sql="INSERT INTO team_list (production_time,name,body,icon)
                     VALUES('$production_time','$name','$body','$file')";
                    $result=mysqli_query($conn,$sql);
                    if ($result){ 
                         header("Location: ../list_clubs.php");
                    }else{
                        echo "Nooooo id do not upload".mysqli_error($conn);
                    }
                }else{
                    echo "Nooooooooooooooooo!!";
                }
                

            } else {
                $_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
                header("Location: create-job-post.php");
                exit();
            }
        } else {
            $_SESSION['uploadError'] =true;
            header("Location: create-job-post.php");
            exit();
        }
    }

}else{
    echo "Nooooooooooooooooooooooooo";
}