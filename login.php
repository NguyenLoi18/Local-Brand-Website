<?php
session_start();

include("connection.php");


if (isset($_POST['login'])) {

    $username = $_POST["account_name"];
    $passwd = md5($_POST["account_password"]);
    $user_check = "select * from account where account_name = '$username' && account_password = '$passwd' && account_type = 'user'";
    $admin_check = "select * from account where account_name = '$username' && account_password = '$passwd' && account_type = 'admin'";
      
    $result = mysqli_query($mysqli, $user_check);
    $res = mysqli_query($mysqli, $admin_check);
    
    $num = mysqli_num_rows($result); // thực hiện câu truy vấn đăng nhập với loại tài khoản là user
      
    switch($num){ // kiểm tra tài khoản có tồn tại không
        case "1":
            $_SESSION["account_name"] = $username;
            header("location: index.php");
            break;
        case "0": // nếu không tồn tại thì chuyển sang loại tài khoản admin 
            $num1 = mysqli_num_rows($res);
            if($num1 == 1){
                $_SESSION["account_name"] = 'admin';
                header("location: admin.php");
            }
            else {
                $message = "Username or password is wrong! Please check again!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } // Nếu loại admin không có thì báo lỗi đăng nhập
            break;
        default:
        $message = "Username or password is wrong! Please check again!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    
							<div class="box">
							<h2>LOGIN</h2>
							<form action="" method="POST" id="login">
                            <input type="text" class="text" name="account_name" placeholder="Username" required>
                            <input type="password" class="text" name="account_password" placeholder="Password" required>
                            <button name="login" class="button">Login</button> <br>
							<a href="signup.php">No Account ?</a>
    </form> 
  
</div>


</body>
</html>