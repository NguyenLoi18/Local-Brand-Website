<?php
session_start();
include("connection.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ORDER MANAGEMENT</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
<a  href="admin.php">ADMIN's PAGE</a>
<h1 style="text-align:center">ORDER MANAGEMENT</h1>
        <br><br>
        <table>
            <tr>
                <th>STT</th>
                <th>Khách Hàng</th>
                <th>Ngày Lập</th>
                <th>Tổng Bill</th>
                <th>Chi Tiết</th>
            </tr>
            <?php
            $sql = "SELECT * FROM `order` ";
            $rs = $mysqli->query($sql);

           
                foreach($rs as $row){ 
                    $id = $row['order_id'];
                    $result = mysqli_query($mysqli, "SELECT SUM(od_price)  FROM order_detail where order_id='$id'"); 
                    $total = mysqli_fetch_array($result); 
    
                    
                    ?>
            <tr>
                <td><?php echo $row['order_id'] ?></td>
                <td><?php echo $row['account_name'] ?></td>
                <td><?php echo $row['order_date'] ?></td>
                <td><?php echo number_format($total[0],0)?> VND</td>

                <td>
                    <a href="order_detail.php?order_id=<?php echo $row['order_id'] ?> "> Detail</a>
                    <input type="hidden" name='order_id' value=<?php echo $row['order_id']?>>
                </td>
            </tr>
            
            <?php
            }
            
        ?>
        </table>



        </body>
</html>