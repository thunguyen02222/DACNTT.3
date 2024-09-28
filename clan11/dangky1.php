<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng đến trang chủ
if (isset($_SESSION["submit"])) {
    header("Location: trangchu.php");
    exit();
}

// Xử lý đăng ký
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = $_POST["full_name"];
   
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $cpass=md5($_POST['cpassword']);
    $address = $_POST["address"];

    // Thêm thông tin người dùng vào cơ sở dữ liệu
    $connection = mysqli_connect("localhost", "root", "", "customer");
    if (!$connection) {
        die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    

    $query = "INSERT INTO account (full_name, email, password, address) VALUES ('$full_name', '$email', '$password', '$address')";
    if (mysqli_query($connection, $query)) {
        // Đăng ký thành công, chuyển hướng đến trang đăng nhập
        header("Location: dangnhap1.php");
        exit();
    } else {
        $registerError = "Đã xảy ra lỗi trong quá trình đăng ký.";
    }

    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
    padding: 12px 20px;
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
        <form action="" method="post">
            <h1>Đăng ký</h1>
            <?php if (isset($registerError)) { echo $registerError; } ?>
            <input type="text" name="full_name" required placeholder="Nhập tên của bạn">
            <input type="text" name="email" required placeholder="Nhập email của bạn">
            <input type="password" name="password" required placeholder="Nhập mật khẩu của bạn">
            <input type="password" name="cpassword" required placeholder="Xác nhận lại mật khẩu của bạn">
            <input type="text" name="address" required placeholder="Nhập địa chỉ của bạn">
            <button type="submit" name="register-btn">Đăng ký</button>
        </form> 
            <p>Bạn đã có tài khoản? <a href="dangnhap1.php">Đăng nhập</a></p>
        </form> 
    </div>  
</body>
