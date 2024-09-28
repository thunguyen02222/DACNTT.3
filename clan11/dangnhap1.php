<?php
session_start();
// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng đến trang chủ
if (isset($_SESSION["email"])) {
    header("Location: trangchu.php");
    exit();
}

// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    echo $email;
    echo $password;
    // Kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
    $connection = mysqli_connect("localhost", "root", "", "customer");
    if (!$connection) {
        die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM account WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $emailname = mysqli_fetch_assoc($result);
        if ($password == $emailname["password"]) {
            // Đăng nhập thành công, thiết lập session và chuyển hướng đến trang chủ
            $_SESSION["email"] = $email;
            header("Location: trangchu.php");
            exit();
        } else {
            $loginError = "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
    } else {
        $loginError = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }

    mysqli_close($connection);
}
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập</title>
    <style type="text/css">body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    width: 100%;
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.container h1 {
    text-align: center;
    color: #333;
}

.container form input[type="text"],
.container form input[type="password"] {
    width: 100%;
    padding: 14px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 6px;
    
}

.container form button {
    width: 100%;
    padding: 14px 20px;
    background-color: red;
    border: none;
    color: #fff;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.container form button:hover {
    background-color: #cb1c22;
}

.container p {
    margin-top: 20px;
    text-align: center;
}

.container p a {
    color: red;
    text-decoration: none;
}

.container p a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
    <div class="container">
	    <form action="dangnhap1.php" method="post">
	    	<h1>Đăng nhập</h1>
            <form method="post" action="login.php">
	    	<input type="text" name="email" placeholder="Nhập email của bạn" required>
	    	<input type="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
	    	<button type="submit" name="login-btn">Đăng nhập</button>
        </form>
	    	<p>Bạn chưa có tài khoản? <a href="dangky1.php">Đăng ký</a></p>
	    </form>	
    </div>	
    <?php if (isset($loginError)) { echo $loginError; } ?>
</body>
</html>      
