<?php
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
include('../../Database/connect_db.php');
$id_team=$_POST['id_team'];
//file
if(is_uploaded_file ( $_FILES['file']['tmp_name'] )) {

    $folder_dir = __DIR__."../../../Public/journals/";

    $base = basename($_FILES['file']['name']);

    $imageFileType = pathinfo($base, PATHINFO_EXTENSION);

    $file = uniqid() . "." . $imageFileType;

    $filename = $folder_dir .$file;

    if(file_exists($_FILES['file']['tmp_name'])) {

        if($imageFileType == "txt" || $imageFileType == "pdf")  {

            if($_FILES['file']['size'] < 500000) { // File size is less than 5MB

                //If all above condition are met then copy file from server temp location to uploads folder.
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $filename)){
                    $sql="INSERT INTO journals (id_team, file) VALUES('$id_team','$file')";
                    $result=mysqli_query($conn,$sql);
                    if ($result){  header("Location: club_man_temp.php");
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