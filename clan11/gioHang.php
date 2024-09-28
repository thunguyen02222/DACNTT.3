<!-- Định nghĩa các thẻ HTML, bắt đầu một trang web -->

<!DOCTYPE html>
<html>
<head>
    <!-- Thiết lập mã ký tự và thiết lập kích thước màn hình -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Liên kết các tệp CSS cho trang web -->
    <link rel="stylesheet" type="text/css" href="trangchu.css">
    <link rel="stylesheet" href="gioHang.css">
    <!-- Tiêu đề của trang -->
    <title></title>
</head>
<body>


<!-- Phần menu của trang web -->

<div class="menu1">
    <div class="menu1-logofptshop">
        <!-- Định nghĩa logo của FPT Shop -->
        <img src="/73DCTD22/img/Logo fptshop.png" class="menu1-logofptshopimg">
    </div>
    <div class="menu1-Search">

    </div>
    <div class="menu1-Dangnhap">

    </div>
</div>


<!-- PHP: Kết nối đến cơ sở dữ liệu và lấy dữ liệu menu -->

<?php
session_start();

// Kết nối đến cơ sở dữ liệu menu
$conn1 = mysqli_connect('localhost','root','','menu');

// Kiểm tra kết nối
if (!$conn1){
    echo 'Kết nối không thành công'.mysqli_connect_error();
}
else{
    // Truy vấn để lấy dữ liệu menu
    $query1 = "SELECT * FROM tblmenu WHERE diachicon='0' ORDER BY diachicha DESC";
    $result1 = mysqli_query($conn1,$query1);
    // Kiểm tra kết quả trả về
    if(mysqli_num_rows($result1)>0){
        echo '<div class="menu">
                        <div class="border">';
        // Duyệt từng hàng dữ liệu
        while ($row1=mysqli_fetch_assoc($result1)){
            $conn2 = mysqli_connect('localhost','root','','menu');
            // Truy vấn để lấy dữ liệu menu con
            $query2 = "SELECT * FROM tblmenu WHERE diachicha='".$row1['diachicha']."' and diachicon>'0' ORDER BY diachicon";
            $result2 = mysqli_query($conn2,$query2);
            // Kiểm tra kết quả trả về
            if(mysqli_num_rows($result2)==0){
                echo     '<div class="dropdown">
                                    <button class="dropbtn">
                                        <a href="'.$row1['linkmenu'].'" class="menu-text">'.$row1['name'].'</a>
                                    </button>
                                </div>';
            }
            else{
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
        // Liên kết đến trang giỏ hàng
        echo '</div>
       
        
                      </div>';
    }
}
// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn1);
?>


<!-- Phần hiển thị sản phẩm trong giỏ hàng -->

<section class="main-content">
    <div class="container">
        <?php if(isset($_SESSION['giohang']) && count($_SESSION['giohang']) >0): ?>
        <!-- Tiêu đề danh sách sản phẩm trong giỏ hàng -->
        <h2>Danh sách sản phẩm trong giỏ hàng</h2>
        <table>
            <thead>
            <!-- Các tiêu đề cột -->
            <tr>
                <th>Số thứ tự</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Biến tổng tiền
            $tongTien = 0;
            $key = 1; ?>
            <?php foreach ($_SESSION['giohang'] as $value): ?>
                <?php extract($value);
                // Tính tổng tiền
                $tongTien += $soLuong * $gia;
                ?>
                <!-- Dòng cho mỗi sản phẩm trong giỏ hàng -->
                <tr>
                    <td><?= $key++ ?></td>
                    <td><?= $ten ?></td>
                    <td><?= number_format($gia) ?>đ</td>
                    <td><?= $soLuong ?></td>
                    <td><?= number_format($soLuong * $gia) ?>đ</td>
                    <td>
                        <!-- Form để xóa sản phẩm khỏi giỏ hàng -->
                        <form action="xuLyThanhToan.php" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" name="xoa" onclick="alert('xóa nhé')" class="button">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

            <!-- Dòng hiển thị tổng tiền -->
            <tr>
                <td colspan="5">Tổng tiền : <?=number_format($tongTien)?>đ</td>
            </tr>
            <!-- Thêm các hàng sản phẩm khác tương tự ở đây-->

            </tbody>
        </table>
            <!-- Liên kết đến trang thanh toán -->
            <div><a href="thanhToan.php"  class="btnthanhtoan">Thanh toán</a></div>
        <?php else: ?>
            <!-- Hiển thị thông báo khi giỏ hàng trống -->
            <h2>chưa có sản phẩm nào trong giỏ</h2>
        <?php endif; ?>





    </div>
</section>


</body>
</html>
