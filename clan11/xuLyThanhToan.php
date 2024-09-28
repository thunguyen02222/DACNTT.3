<?php
// Bắt đầu phiên làm việc của PHP và sử dụng session
session_start();

// Xử lý khi người dùng đặt hàng
if (isset($_POST['order'])) {
    // Lấy thông tin người dùng nhập từ form
    $ten = $_POST['name'];
    $soDT = $_POST['phone'];
    $diaChi = $_POST['address'];
    $tongTien = $_POST['total'];

    // Thiết lập múi giờ cho Hà Nội (UTC+7)
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    // Lấy thời gian hiện tại ở Hà Nội
    $current_time = date('Y-m-d H:i:s');

    // Kết nối đến cơ sở dữ liệu MySQL
    $conn = mysqli_connect('localhost', 'root', '', 'product');

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    // Chuẩn bị truy vấn để chèn thông tin đơn hàng vào bảng orders
    $sql = "INSERT INTO orders (`id`, `customer_name`, `customer_phone`, `customer_address`, `total`, `created_at`, `status`) 
            VALUES (NULL, '$ten', '$soDT', '$diaChi', '$tongTien', '$current_time', 'Đơn hàng mới')";

    // Thực thi truy vấn
    if (mysqli_query($conn, $sql)) {
        // Lấy ID của đơn hàng vừa tạo
        $order_id = mysqli_insert_id($conn);

        // Hiển thị thông tin đơn hàng
        echo "Đơn hàng của bạn đã được đặt thành công!<br>";
        echo "Tên: " . $ten . "<br>";
        echo "Số điện thoại: " . $soDT . "<br>";
        echo "Địa chỉ: " . $diaChi . "<br>";
        echo "Tổng tiền: " . $tongTien . "đ<br>";
        echo "Cảm ơn bạn đã mua hàng!";

        // Tiếp theo, thêm dữ liệu vào bảng order_detail sử dụng $order_id
        foreach ($_SESSION['giohang'] as $item) {
            $id_product = $item['id'];
            $product_name = $item['ten'];
            $quantity = $item['soLuong'];
            $price = $item['gia'];
            $total = $item['soLuong'] * $item['gia'];

            // Chuẩn bị truy vấn để chèn thông tin chi tiết đơn hàng vào bảng order_detail
            $sql_order_detail = "INSERT INTO order_detail (`order_id`, `id_product`, `product_name`, `quantity`, `price`, `total`) 
                    VALUES ('$order_id', '$id_product', '$product_name', '$quantity', '$price', '$total')";

            // Thực thi truy vấn
            if (!mysqli_query($conn, $sql_order_detail)) {
                echo "Lỗi khi thêm chi tiết đơn hàng: " . mysqli_error($conn);
            }
        }

        // Sau khi thêm chi tiết đơn hàng xong, hãy xoá giỏ hàng bằng cách unset session
        unset($_SESSION['giohang']);
        // Hiển thị nút để quay về trang chủ
        echo '<a href="trangchu.php">Quay về trang chủ</a>';
    } else {
        // Hiển thị thông báo lỗi khi thêm đơn hàng vào cơ sở dữ liệu
        echo "Lỗi khi thêm đơn hàng: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
}

// Xử lý khi người dùng muốn xóa sản phẩm khỏi giỏ hàng
if (isset($_POST['xoa'])) {
    // Lấy ID của sản phẩm cần xóa
    $id = $_POST['id'];
    // Xóa sản phẩm khỏi giỏ hàng bằng cách unset session
    unset($_SESSION['giohang'][$id]);
    // Hiển thị thông báo xóa thành công
    echo 'Xóa sản phẩm thành công!';
    // Chuyển hướng người dùng về trang giỏ hàng
    header("location: gioHang.php");
}
?>
