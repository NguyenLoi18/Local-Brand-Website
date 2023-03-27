<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DENNIS STORE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>

    <div class="container">
        <?php 
            require_once "header.php";
        ?>
        <div class="col-2">
            <img src="img/local-brand.jpg" alt="">
        </div>
    </div>
<!-------------categories---------->
<div class="categories">
    <h2>ALL PRODUCTS</h2>
    <div class="row">
    <?php
        require_once "show_product.php";

        ?>
   </div>     
<!-------------------brands------------->
   <?php
   include("footer.php");
   ?>



</div>
</body>
</html>