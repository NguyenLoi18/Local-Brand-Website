<?php
include('../connection.php');
    
    $tenbrand = $_POST['BRAND'];
    
    if(isset($_POST['thembrand'])){
        $sql_them = "INSERT INTO brands(brand_name) VALUE('$tenbrand')";
        mysqli_query($mysqli,$sql_them);
        header('location:../brand/main_brand.php');

    }else{
        $id = $_GET['brand_id'];
        $sql_xoa = "DELETE FROM brands WHERE brand_id='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('location:../brand/main_brand.php');
    }



?>