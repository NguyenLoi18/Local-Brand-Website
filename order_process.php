<?php
    session_start();
    include("connection.php");

    
    if (isset($_SESSION['add_cart'])){
        if (isset($_SESSION['account_name'])) {
            $name = $_SESSION['account_name'];

            $query = "SELECT account_name From Account  where account_name='$name'";
            $user = mysqli_query($mysqli, $query);
            while ($check = mysqli_fetch_array($user)){
                $query2 = "insert into `order` values(default, '".$check[0]."', now())";
                $result = mysqli_query($mysqli, $query2) or die(mysqli_error($mysqli));

            }

            if($result) {
                foreach ($_SESSION['add_cart'] as $key => $value){

                    if (isset($_SESSION['add_cart'][$key]['prd_id'])){
                        $max=mysqli_query($mysqli, "Select max(order_id) from `order`");
                        while ($row = mysqli_fetch_array($max)){
                            $order_id = $row[0];
                        }

                        $prd_id = $_SESSION['add_cart'][$key]['prd_id'];
                        $prd_quantity = $_SESSION['add_cart'][$key]['number'];
                        $product = mysqli_query($mysqli, "SELECT * FROM products where prd_id =".$prd_id);
                        $ht = mysqli_fetch_array($product);
                        $total = $ht['price'] * $prd_quantity;
                        mysqli_query($mysqli, "INSERT INTO order_detail (order_id, prd_id, od_quantity, od_price) values('".$order_id."', '".$prd_id."', '".$prd_quantity."', '".$total."')");
                        echo "done";
                    }
                }
            }
            unset($_SESSION['add_cart']);

            echo "<script>
                    alert('Thank you for your order, please wait for our contact!');
                    window.location.href='index.php'; 
                </script>";
        }
        else {
            header("location:login.php");
        }
    }

?>