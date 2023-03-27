<?php
session_start();

include("connection.php");


if (isset($_POST['signup'])) {

    $username = $_POST["account_name"];
    $passwd = md5($_POST["account_password"]);
    $phone = $_POST["account_phone"];
    $fullname =$_POST["account_fullname"];
    $address= $_POST["account_address"];

    if($username == 'admin'){
        echo "<script type='text/javascript'>alert('You are not administrator');</script>";
    }
    else {
    $regis = "SELECT * from account where account_name = '$username' && account_phone = '$phone' && account_type = 'user'";

    $result = mysqli_query($mysqli, $regis);

    $num = mysqli_num_rows($result);

    if ($num == 1) {

    $message = "This account or phone number already exist, Please check it again!";
    echo "<script type='text/javascript'>alert('$message');</script>";

    } else {
    $reg = "INSERT into account (account_name, account_password,  account_type,account_phone, account_fullname,account_address) values ('$username' , '$passwd' , 'user','$phone','$fullname','$address')";
    mysqli_query($mysqli, $reg);
    
    $ms = "Signup Successful";
    header('location:Login.php');
    echo "<script>alert('$ms');</script>";
    }
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SIGNUP</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    
                    <div class="box">
                    <h2>SIGNUP</h2>
                            <form action="" method="POST" id="signup">
                            <input type="text" class ="text" name="account_name" placeholder="Username" required>
                            <input type="password" class ="text" name="account_password" placeholder="Password" required>
                            <input type="text" class ="text" name="account_phone" placeholder="Phone number" required>
                            <input type="text" class ="text" name="account_fullname" placeholder="Full Name" required>
                            <input type="text" class ="text" name="account_address" placeholder="Detail Address" required>
                            <button name="signup" class="button">SIGN UP</button> <br>
                            <a href="login.php"> LOGIN</a>
                        </form>
  

</div>

</body>
</html>