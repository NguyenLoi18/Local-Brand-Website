<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOMEPAGE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="container">
        <div class="navbar">
            <div class="logo">
    <p><a href="index.php">DENNIS STORE</p>
            </div>
        <nav>
            <ul>
              
                <li><a href="">BRANDS</a>
                    <ul class="sub-menu">
                        
                            <?php 
                                require_once "connection.php";
                                $sql = "SELECT * FROM brands";
                                $rs = $mysqli-> query($sql);
                                foreach ($rs as $row){
                                    echo '
                                    <li>
                                    <a href="brands.php?id='.$row['brand_id'].'"> '.$row['brand_name'].'</a>
                                    </li>
                                    ';
                                }
                            ?>
                        
                    </ul>    
                </li>
                <li><a href="login.php">ACCOUNT</a></li>
                <li>
                    <a href ="cart.php" ><img src="img/icon.png" alt="" width="30px"> </a>
                </li>
                <li>
                    <?php
                    session_start();
                    if(isset($_SESSION["account_name"])){ ?>
                    <h3><?php echo 'Hi '. $_SESSION["account_name"].''; ?></h3>
                    <li>
                    <a href="logout.php">LOG OUT </a>
                    </li>
                    <?php }
                    else{
                        echo " ";
                    }
                    ?>
                    
                </li>

            </ul> 
        </nav>
        </div>
        
        
        <div class="col-2">
            <p>IN ORDER TO BE IRREPLACEABLE.</p> <br>
            <h1>ONE MUST ALWAYS BE DIFFERENT.</h1>
        </div>

                </div>