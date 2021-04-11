<?php
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
include('../../Database/connect_db.php');
$title=$_POST['title'];
$body=$_POST['body'];
//file
if(is_uploaded_file ( $_FILES['image']['tmp_name'] )) {

    $folder_dir = __DIR__."../../../Public/img/";

    $base = basename($_FILES['image']['name']);

    $imageFileType = pathinfo($base, PATHINFO_EXTENSION);

    $file = uniqid() . "." . $imageFileType;

    $filename = $folder_dir .$file;

    if(file_exists($_FILES['image']['tmp_name'])) {

        if($imageFileType == "jpg" || $imageFileType == "png")  {

            if($_FILES['image']['size'] < 500000) { // File size is less than 5MB

                //If all above condition are met then copy file from server temp location to uploads folder.
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $filename)){
                    $sql="INSERT INTO news (title, body, image) VALUES('$title','$body','$file')";
                    $result=mysqli_query($conn,$sql);
                    if ($result){  header("Location: ../news.php");
                    }else{
                        echo "Nooooo id do not upload";
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