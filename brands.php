<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOMEPAGE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
   <?php
   include("header.php");
   ?>
<!-------------categories---------->
<div class="categories">
    <?php   
            require_once "connection.php";
            $id = $_GET['id'];
            $sql = "SELECT brand_name FROM brands where brand_id = $id";
            $rs = $mysqli->query($sql);

            foreach($rs as $row){ 
                echo '<h2> '.$row['brand_name'].' PRODUCTS</h2>';
            }
    ?>
    <div class="row">
        <?php
            require_once"connection.php";
            $id = $_GET['id'];
            $sql = "SELECT * FROM products inner join brands on brands.brand_name = products.brand_name where brands.brand_id= $id";
            $rs = $mysqli->query($sql);

            foreach($rs as $row){ ?>
                
            <div class="total_prd">
            <div class="col-3">
            <form action="add_cart.php?id=<?php echo $row['prd_id'] ?>" method ="POST">
                    <h1><?php echo $row['prd_name'] ?></h1>
                    <img src="img/<?php echo $row['img']?>" style ="width: 400px; height: 400px">
                    <p><?php echo $row['price'].' VND' ?></p>
                    <div class="col-3-brand"><?php echo $row['brand_name'] ?></div>
                    </div>
                    <input type="number" name="quantity" value="1" min ="1" max="<?php echo $row['quantity']?>"> 
                <button name = "add" class="btn">ADD TO CART</button>
                </form>
            </div>
            
        <?php

            }

        ?>
   </div>     
<!-------------------brands------------->
<?php
   include("footer.php");
   ?>



</div>
</body>
</html>