<?php 
    session_start();
    require "connection.php";  //kết nối database
    if(isset($_POST['add'])){

        if(isset($_GET['id'])){        // kiểm tra id sản phẩm được add
        $id = $_GET['id'];
        $query = "SELECT * FROM products  WHERE prd_id = $id";
        $rs = $mysqli->query($query);
            if ($rs -> num_rows > 0) {
                while($row = $rs->fetch_assoc()) {
            $item = [
                'prd_id'=>$row['prd_id'],
                'prd_name'=>$row['prd_name'],
                'img'=>$row['img'],
                'price'=>$row['price'],
                'number'=> $_POST['quantity'],
                'quantity'=>$row['quantity'],
                'brand_name'=>$row['brand_name'],
            ]; // đưa các giá trị của ID sản phẩm order vào 1 mảng để lấy dữ liệu order
        
                    if(isset($_SESSION['add_cart'][$id])){
                      echo "<script>alert(' You have added this product in your cart, please check it! ');location.href='index.php'</script>";
                    } // kiểm tra nếu SP đã được thêm thì không được thêm nữa
                    else {
                            $_SESSION['add_cart'][$id] = $item;
                        }
                    }

           echo "<script>alert(' This product added success! ');location.href='index.php'</script>";
    }
        }
}
?>