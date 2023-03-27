<?php
include("../connection.php");


    $prd_name = $_POST['prd_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $brand = $_POST['brand'];
    $image = $_FILES['img']['name'];
    $image_tmp = $_FILES['img']['tmp_name'];


   

    if(isset($_POST['them'])){
        //them
        $sql_them = "INSERT INTO products (prd_name,img,price,quantity,brand_name) VALUE('$prd_name','$image',$price,$quantity,'$brand')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($image_tmp,'../img/'.$image);
        header('location:../product/main_product.php');
    }


?>