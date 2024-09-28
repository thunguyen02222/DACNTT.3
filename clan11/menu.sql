-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 07, 2024 lúc 12:18 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `menu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblmenu`
--

CREATE TABLE `tblmenu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `linkmenu` varchar(100) NOT NULL,
  `diachicha` int(11) NOT NULL,
  `diachicon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblmenu`
--

INSERT INTO `tblmenu` (`id`, `name`, `linkmenu`, `diachicha`, `diachicon`) VALUES
(1, 'TRANG CHỦ', 'trangchu.php', -1, 0),
(2, 'ĐIỆN THOẠI', 'tongsanpham.php?cha=-2&con=0', -2, 0),
(3, 'LAPTOP', 'tongsanpham.php?cha=-3&con=0', -3, 0),
(4, 'MÁY TÍNH BẢNG', 'tongsanpham.php?cha=-4&con=0', -4, 0),
(5, 'Apple(Iphone)', 'tongsanpham.php?cha=-2&con=1', -2, 1),
(6, 'Samsung', 'tongsanpham.php?cha=-2&con=2', -2, 2),
(7, 'Oppo', 'tongsanpham.php?cha=-2&con=3', -2, 3),
(8, 'Xiaomi', 'tongsanpham.php?cha=-2&con=4', -2, 4),
(9, 'Nokia', 'tongsanpham.php?cha=-2&con=5', -2, 5),
(10, 'Macbook', 'tongsanpham.php?cha=-3&con=1', -3, 1),
(11, 'Lenovo', 'tongsanpham.php?cha=-3&con=2', -3, 2),
(12, 'Dell', 'tongsanpham.php?cha=-3&con=3', -3, 3),
(13, 'Asus', 'tongsanpham.php?cha=-3&con=4', -3, 4),
(14, 'MSI', 'tongsanpham.php?cha=-3&con=5', -3, 5),
(15, 'Apple(iPad)', 'tongsanpham.php?cha=-4&con=1', -4, 1),
(16, 'Samsung', 'tongsanpham.php?cha=-4&con=2', -4, 2),
(17, 'Lenovo', 'tongsanpham.php?cha=-4&con=3', -4, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
