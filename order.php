
<?php

    session_start();
    include("connection.php");
    if (isset($_SESSION['add_cart'])){
        if (isset($_SESSION['account_name'])) {
        $name = $_SESSION['account_name'];
        $sql = "SELECT * FROM account where account_name='$name'";
        $query_show_inf= mysqli_query($mysqli,$sql);
    }
    else {
        header("location:login.php");
    }
}
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ORDER</title>
    <link rel="stylesheet" href="order.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
<h5>Thông Tin Khách Hàng</h5>
<table>
        <tr>
                <th>Họ tên</th>
                <th>Số điện thoại </th>
                <th>Địa chỉ </th>
                
        </tr>
            <?php
        
                while($row = mysqli_fetch_array($query_show_inf)){ 
            ?>
                        <td><?php echo $row['account_fullname'] ?></td>
                        <td><?php echo $row['account_phone'] ?></td>
                        <td><?php echo $row['account_address'] ?></td>
                    <?php
                }
                ?>
</table>
<table>
    <tr>
        <th>HÌNH ẢNH</th>
        <th>SẢN PHẨM</th>
        <th>SỐ LƯỢNG</th>
        <th>ĐƠN GIÁ</th>
        <th>TỔNG TIỀN</th>
    </tr>
    <?php
    $total=0;
        foreach ($_SESSION['add_cart'] as $key => $value){
            $total += ($value['price'] * $value['number']);

    ?>
    <tr>
        <td><img src="img/<?php echo $value['img'] ?>" width="80px"></td>
        <td><?php echo $value['prd_name'] ?></td>
        <td><?php echo $value['number'] ?></td>
        <td><?php echo number_format($value['price'],0)?> VND</td>
        <td><?php echo number_format($value["price"] * $value["number"],0)?></td>
    </tr>
    <?php
        }
    ?>

</table>
<hr class="hr" />
<p>TOTAL: <?php echo number_format($total,0)?> VND</p><br>
<a href="order_process.php">Xác Nhận Đặt Hàng</a>


</body>
</html>