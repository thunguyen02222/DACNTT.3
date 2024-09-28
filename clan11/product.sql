-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 03, 2024 lúc 01:12 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `product`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `customer_address` text NOT NULL,
  `total` varchar(10) NOT NULL,
  `created_at` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_laptop`
--

CREATE TABLE `tbl_laptop` (
  `id` int(11) NOT NULL,
  `loaimay` int(11) NOT NULL,
  `tenmay` int(11) NOT NULL,
  `giacu` int(11) NOT NULL,
  `giamoi` int(11) NOT NULL,
  `linksp` varchar(100) NOT NULL,
  `linkanh` varchar(300) NOT NULL,
  `dohoa` varchar(100) NOT NULL,
  `manhinh` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `ocung` varchar(100) NOT NULL,
  `tragop` int(11) NOT NULL,
  `daban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_maytinhbang`
--

CREATE TABLE `tbl_maytinhbang` (
  `id` int(11) NOT NULL,
  `loaimay` int(11) NOT NULL,
  `tenmay` varchar(50) NOT NULL,
  `giacu` int(11) NOT NULL,
  `giamoi` int(11) NOT NULL,
  `linksp` varchar(100) NOT NULL,
  `linkanh` varchar(1000) NOT NULL,
  `manhinh` varchar(100) NOT NULL,
  `camerasau` varchar(100) NOT NULL,
  `cameraselfie` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `bonhotrong` varchar(100) NOT NULL,
  `tragop` int(11) NOT NULL,
  `daban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `loaimay` int(11) NOT NULL,
  `tenmay` varchar(50) NOT NULL,
  `giacu` int(11) NOT NULL,
  `giamoi` int(11) NOT NULL,
  `linksp` varchar(100) NOT NULL,
  `linkanh` varchar(250) NOT NULL,
  `manhinh` varchar(100) NOT NULL,
  `camerasau` varchar(100) NOT NULL,
  `cameraselfie` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `bonhotrong` varchar(50) NOT NULL,
  `tragop` int(11) NOT NULL,
  `daban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `loaimay`, `tenmay`, `giacu`, `giamoi`, `linksp`, `linkanh`, `manhinh`, `camerasau`, `cameraselfie`, `cpu`, `bonhotrong`, `tragop`, `daban`) VALUES
(1, 1, 'iPhone 15 128 GB', 22990000, 20190000, 'sanpham.php&cha=-2&id=1', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/15/638303942321093007_iphone-15-hong-1.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', '[Apple A16 Bionic]', '128 GB', 0, 230),
(2, 1, 'iPhone 15 256 GB', 25990000, 23690000, 'sanpham.php&cha=-2&id=2', 'https://images.fpt.shop/unsafe/fit-in/960x640/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/9/13/638302015845512370_iPhone_15_Green_Pure_Back_iPhone_15_Green_Pure_Front_2up_Screen__USEN.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', '[Apple A16 Bionic]', '256 GB', 0, 200),
(3, 1, 'iPhone 15 512 GB', 28990000, 31990000, 'sanpham.php&cha=-2&id=3', 'https://images.fpt.shop/unsafe/fit-in/960x640/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/9/13/638302015843008975_iPhone_15_Blue_Pure_Back_iPhone_15_Blue_Pure_Front_2up_Screen__USEN.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', '[Apple A16 Bionic]', '512 GB', 0, 220),
(4, 1, 'iPhone 15  Pro 128 GB', 28990000, 25990000, 'sanpham.php&cha=-2&id=4', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/16/638304565863318698_iphone-15-pro-trang-1.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', '128 GB', 0, 450),
(5, 1, 'iPhone 15  Pro 256 GB', 31990000, 28990000, 'sanpham.php&cha=-2&id=5', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/16/638304612779650501_iphone-15-pro-xanh-1.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', '256 GB', 0, 654),
(6, 1, 'iPhone 15  Pro 512 GB', 36990000, 34990000, 'sanpham.php&cha=-2&id=6', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/16/638304560571374532_iphone-15-pro-den-1.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', '512 GB', 0, 447),
(7, 1, 'iPhone 15  Pro Max 256 GB', 34990000, 29990000, 'sanpham.php&cha=-2&id=7', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638307989548944936_iphone-15-promax-xanh-1.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels\r\n', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', '256 GB', 0, 428),
(8, 1, 'iPhone 15  Pro Max 512 GB', 38990000, 36990000, 'sanpham.php&cha=-2&id=8', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638307980220145280_iphone-15-promax-den-1.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels\r\n', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', '512 GB', 0, 713),
(9, 1, 'iPhone 15  Pro Max 1 TB', 45990000, 43990000, 'sanpham.php&cha=-2&id=9', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638307982103040290_iphone-15-promax-trang-1.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels\r\n', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', ' 1 TB', 0, 865);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_laptop`
--
ALTER TABLE `tbl_laptop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_maytinhbang`
--
ALTER TABLE `tbl_maytinhbang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_laptop`
--
ALTER TABLE `tbl_laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_maytinhbang`
--
ALTER TABLE `tbl_maytinhbang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
