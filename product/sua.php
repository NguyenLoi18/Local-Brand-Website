<?php
    include("../connection.php");
    $id=$_GET['prd_id'];
    // echo $id;
    $name = $_POST['ten_sp'];
    $img = $_POST['file-img'];
    $price = $_POST['gia_sp'];
    $quantity = $_POST['soluong_sp'];
    $brand =$_POST['brand_name'];
    echo $name;
    if (isset($_POST['ten_sp'])){
        $q= "UPDATE products set prd_name='$name', img='$img', price='$price', quantity='$quantity', brand_name ='$brand' where prd_id='$id'";

        $result = mysqli_query($mysqli, $q);
        header('location: main_product.php');
        // $q = mysqli_query($mysqli)

    }

?>