<?php

    session_start();
    include("connection.php");
   
    
   if (isset($_GET['order_id']) && ($_GET['order_id']!="")){
    $id = $_GET['order_id'];
    $query_show_inf = mysqli_query($mysqli,"SELECT * FROM order_detail  join products  on order_detail.prd_id= products.prd_id WHERE order_id='$id'");
    while ($row=mysqli_fetch_array($query_show_inf)){
        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ORDER</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>

<table>
        <tr>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng </th>
                <th>Thành Tiền </th>
            
                
                
        </tr>
        <tr>
            <td><?php echo $row['prd_id'] ?></td>
            <td><?php echo $row['prd_name'] ?></td>
            <td><?php echo $row['od_quantity']?></td>
            <td><?php echo number_format( $row['od_price'],0)?> VND</td>

            
            
        </tr>



  <?php  
    }
}
  ?>

</table>

</body>
</html>