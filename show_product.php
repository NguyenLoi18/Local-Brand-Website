<?php
    require_once"connection.php";
    $sql = "SELECT * FROM products ";
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