<?php
session_start();

// Xóa tất cả các session
session_destroy();

// Chuyển hướng về trang đăng nhập
header("Location: trangchu_khach.php");
exit();
?>