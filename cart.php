<?php
    include("connection.php");
    include("header.php");
           
             if(!isset($_SESSION['add_cart']) | $_SESSION['add_cart'] == []){
                echo "<script>alert('Your cart is empty! ');location.href='index.php'</script>";
            }            

             $cart = (isset($_SESSION['add_cart']))? $_SESSION['add_cart'] : [];   

             if (isset($_POST['quantity'])) {
              foreach($cart as $key => $row) {
                  if($row['prd_id'] == $_POST['prd_id']){
                      $cart[$key]['number'] = $_POST['quantity'];
                      // print_r ($row);
                  }
                  $cart = array_values($cart);
                  // print_r($row);
              }
            }
?>
<html lang="en">
<head>
<link rel="stylesheet" href="cart.css">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>

<table  >
  <tr>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Giá sản phẩm</th>
    <th>Thành tiền</th>
    <th>Xóa </th>
    
  </tr>
  <?php 
    $subTotal =0;
    foreach($cart as $key => $value): 
    
    $subTotal += ($value["price"] * $value["number"]);
    ?>
  <tr>
    <td><?php echo $value['prd_name'] ?></td>
    <td><img src="img/<?php echo $value['img'] ?>" width="120px"></td>
    <td><?php echo $cart[$key]['number'] ?></td>
    <td><?php echo number_format($value['price'],0)?> VND</td>
    <td><?php echo number_format($value["price"] * $value["number"],0)?> VND</th>
    <td><a href="delete_product.php?&id=<?php echo $value['prd_id'] ?>">
            <button class="btn">Xóa</button>
        </a>
    </td>
  </tr>
  <?php endforeach ?>

</table>
<h4>TỔNG TIỀN: <?php echo number_format($subTotal,0);?> VND</h4>

<a href="order.php" class="order"> <button class="button">ĐẶT HÀNG</button></a>
  
</body>
</html>