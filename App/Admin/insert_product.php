<?php
include('functions/session.php');
include('../../Database/connect_db.php');
$product_cat=$_POST['product_cat'];
$product_brand=$_POST['product_brand'];
$product_title=$_POST['product_title'];

$product_price=$_POST['product_price'];

$product_desc=$_POST['product_desc'];

$product_keywords=$_POST['product_keywords'];


//file
if(is_uploaded_file ( $_FILES['product_image']['tmp_name'] )) {

    $folder_dir = __DIR__."../../../Public/img/product/";

    $base = basename($_FILES['product_image']['name']);

    $imageFileType = pathinfo($base, PATHINFO_EXTENSION);

    $file = uniqid() . "." . $imageFileType;

    $filename = $folder_dir .$file;

    if(file_exists($_FILES['product_image']['tmp_name'])) {

        if($imageFileType == "jpg" || $imageFileType == "png")  {

            if($_FILES['product_image']['size'] < 500000) { // File size is less than 5MB

                //If all above condition are met then copy file from server temp location to uploads folder.
                if(move_uploaded_file($_FILES["product_image"]["tmp_name"], $filename)){
                    $sql="INSERT INTO ecommerce (product_cat, product_brand, product_title,product_price,product_desc,product_keywords,product_image)
                     VALUES('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_keywords','$file')";
                    $result=mysqli_query($conn,$sql);
                    if ($result){ 
                         header("Location: ../store.php");
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