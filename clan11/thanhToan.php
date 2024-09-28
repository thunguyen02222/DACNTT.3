<!DOCTYPE html>
<html>
<head>
    <!-- Khai báo loại mã HTML và cài đặt kích thước và tỷ lệ của trang -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Liên kết đến file CSS cho trang chủ và trang giỏ hàng -->
    <link rel="stylesheet" type="text/css" href="trangchu.css">

    <!-- CSS Customization cho trang thanh toán -->
    <style>
        /* Thêm CSS cho trang thanh toán */
        .payment-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        /* Tiêu đề cho trang thanh toán */
        .payment-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Form thanh toán */
        .payment-form input[type="text"],
        .payment-form input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Nút submit cho form thanh toán */
        .payment-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Hover effect cho nút submit */
        .payment-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Bảng hiển thị sản phẩm và thông tin thanh toán */
        .payment-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Kiểu cho header và các ô trong bảng */
        .payment-table th,
        .payment-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        /* Kiểu cho header của bảng */
        .payment-table th {
            background-color: #f2f2f2;
        }
    </style>
    <!-- Tiêu đề của trang -->
    <title>Thanh toán sản phẩm</title>
</head>
<body>

<!-- Header và menu của trang -->
<div class="menu1">
    <!-- Logo của FPT Shop -->
    <div class="menu1-logofptshop">
        <img src="/73DCTD22/img/Logo fptshop.png" class="menu1-logofptshopimg">
    </div>
    <!-- Ô tìm kiếm sản phẩm -->
    <div class="menu1-Search">
        
    </div>
    <!-- Nút đăng nhập -->
    <div class="menu1-Dangnhap"></div>
</div>

<!-- PHP để hiển thị menu -->
<?php
// Bắt đầu phiên làm việc của PHP
session_start();

// Kết nối đến cơ sở dữ liệu MySQL để lấy menu
$conn1 = mysqli_connect('localhost','root','','menu');

// Kiểm tra kết nối
if (!$conn1){
    echo 'Kết nối không thành công'.mysqli_connect_error();
}
else{
    // Truy vấn để lấy các mục menu chính
    $query1 = "SELECT * FROM tblmenu WHERE diachicon='0' ORDER BY diachicha DESC";
    $result1 = mysqli_query($conn1,$query1);

    // Kiểm tra số dòng trả về từ truy vấn
    if(mysqli_num_rows($result1)>0){
        echo '<div class="menu">
                        <div class="border">';
        // Lặp qua từng dòng dữ liệu
        while ($row1=mysqli_fetch_assoc($result1)){
            $conn2 = mysqli_connect('localhost','root','','menu');
            // Truy vấn để lấy các mục con của menu chính
            $query2 = "SELECT * FROM tblmenu WHERE diachicha='".$row1['diachicha']."' and diachicon>'0' ORDER BY diachicon";
            $result2 = mysqli_query($conn2,$query2);

            // Kiểm tra số dòng trả về từ truy vấn
            if(mysqli_num_rows($result2)==0){
                // Nếu không có mục con, hiển thị mục chính làm menu dropdown
                echo     '<div class="dropdown">
                                    <button class="dropbtn">
                                        <a href="'.$row1['linkmenu'].'" class="menu-text">'.$row1['name'].'</a>
                                    </button>
                                </div>';
            }
            else{
                // Nếu có mục con, hiển thị mục chính làm menu dropdown và hiển thị mục con
                echo    '<div class="dropdown">
                                    <button class="dropbtn"><a href="'.$row1['linkmenu'].'" class="menu-text">'.$row1['name'].'</a></button>
                                 <div class="dropdown-content">';
                if(mysqli_num_rows($result2)>0){
                    while ($row2=mysqli_fetch_assoc($result2)){
                        echo          '<a href="'.$row2['linkmenu'].'">'.$row2['name'].'</a>';
                    }
                    echo          '</div>
                                        </div>';

                }
            }
        }
        // Hiển thị nút giỏ hàng
        echo '</div>
        </div>';
    }
}
// Đóng kết nối với cơ sở dữ liệu
mysqli_close($conn1);
?>

<!-- Nội dung trang thanh toán sản phẩm -->
<div class="payment-container">

    <!-- Bảng hiển thị danh sách sản phẩm -->
    <h2>Danh sách sản phẩm</h2>
    <table class="payment-table">
        <thead>
        <tr>
            <th>Số thứ tự</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        </thead>
        <tbody>
        <!-- Dữ liệu sản phẩm từ giỏ hàng -->
        <!-- Dòng này sẽ thay đổi để hiển thị thông tin sản phẩm từ giỏ hàng -->
        <?php
        // Khởi tạo biến tổng tiền
        $tongTien = 0;
        $key = 1; ?>
        <?php foreach ($_SESSION['giohang'] as $value): ?>
            <?php
            // Trích xuất dữ liệu từ mỗi sản phẩm trong giỏ hàng
            extract($value);
            // Tính tổng tiền của từng sản phẩm
            $tongTien += $soLuong * $gia;
            ?>
            <!-- Hiển thị thông tin sản phẩm trong từng hàng của bảng -->
            <tr>
                <td><?= $key++ ?></td>
                <td><?= $ten ?></td>
                <td><?= number_format($gia) ?>đ</td>
                <td><?= $soLuong ?></td>
                <td><?= number_format($soLuong * $gia) ?>đ</td>
            </tr>
        <?php endforeach; ?>
        <!-- Hiển thị tổng tiền -->
        <tr>
            <td colspan="5">Tổng tiền : <?=number_format($tongTien)?>đ</td>
        </tr>
        </tbody>
    </table>

    <!-- Form thanh toán sản phẩm -->
    <h2>Thanh toán sản phẩm</h2>
    <form action="xuLyThanhToan.php" method="post" class="payment-form">
        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" required>

        <!-- Input ẩn chứa tổng tiền của đơn hàng -->
        <input type="hidden" name="total" value="<?=$tongTien?>">

        <!-- Nút submit để thực hiện đặt hàng -->
        <input type="submit" name="order" value="Đặt hàng">
    </form>
</div>

</body>
</html>
