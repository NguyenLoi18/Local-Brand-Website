<?php

        include("../connection.php");
        $id = $_GET['prd_id'];
        $sql_xoa = "DELETE FROM products WHERE prd_id=$id";
        mysqli_query($mysqli,$sql_xoa);
        header('location:../product/main_product.php');

?>


