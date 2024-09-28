<?php
session_start();
    // Kiểm tra nếu người dùng nhấn vào nút "Thêm vào giỏ hàng"
    if(isset($_POST['addToCart'])){
        // Kiểm tra xem biến session 'giohang' đã được khởi tạo chưa, nếu chưa thì khởi tạo nó là một mảng rỗng
        if (!isset($_SESSION['giohang'])) {
            $_SESSION['giohang'] = [];
        }
        // Lấy các thông tin của sản phẩm từ form và gán vào các biến tương ứng
        $id = $_POST['id']; // ID của sản phẩm
        $ten = $_POST['tenmay']; // Tên của sản phẩm
        $gia = $_POST['giamoi']; // Giá của sản phẩm
        $soLuong =  1; // Số lượng sản phẩm mặc định là 1
        $check_sp = 0; // Biến kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        // Kiểm tra nếu giỏ hàng không trống
        if (count($_SESSION['giohang']) > 0) {
            // Duyệt qua các sản phẩm trong giỏ hàng
            foreach ($_SESSION['giohang'] as $key => $value) {
                // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên 1
                if ($key == $id) {
                    $check_sp = 1; // Đánh dấu rằng sản phẩm đã có trong giỏ hàng
                    $_SESSION['giohang'][$id]["soLuong"] += $soLuong; // Tăng số lượng của sản phẩm lên 1
                    break; // Thoát khỏi vòng lặp
                }
            }
        }
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm vào giỏ hàng
        if ($check_sp == 0) {
            $_SESSION['giohang'][$id] = ["id" => $id, "ten" => $ten, "gia" => $gia,"soLuong" => $soLuong]; // Thêm thông tin của sản phẩm vào giỏ hàng
        }
        header("location: trangchu.php");
    }
    ?>