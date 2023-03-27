<?php

    session_start();
    include("connection.php");
   

    $sql = "SELECT * from account ";
    $query_show_cus= mysqli_query($mysqli,$sql);

    while ($row=mysqli_fetch_array($query_show_cus)){
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CUSTOMER</title>
    <link rel="stylesheet" href="customer.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>

<table>
        <tr>
                <th>Tên Tài Khoản</th>
                <th>Họ Tên</th>
                <th>Số Điện Thoại </th>
                <th>Địa Chỉ</th>
            
                
                
        </tr>
        <tr>
            <td><?php echo $row['account_name'] ?></td>
            <td><?php echo $row['account_fullname'] ?></td>
            <td><?php echo $row['account_phone']?></td>
            <td class="address"><?php echo $row['account_address']?></td>
            
            
        </tr>



  <?php  
  
}
  ?>
