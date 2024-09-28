-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 10, 2024 lúc 06:34 PM
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
-- Cơ sở dữ liệu: `sosanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_laptop`
--

CREATE TABLE `tbl_laptop` (
  `id` int(11) NOT NULL,
  `loaimay` int(11) NOT NULL,
  `tenmay` varchar(100) NOT NULL,
  `giamoi` int(11) NOT NULL,
  `linkanh` varchar(1000) NOT NULL,
  `dohoa` varchar(100) NOT NULL,
  `manhinh` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `ocung` varchar(100) NOT NULL,
  `daban` int(11) NOT NULL,
  `giacu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_laptop`
--

INSERT INTO `tbl_laptop` (`id`, `loaimay`, `tenmay`, `giamoi`, `linkanh`, `dohoa`, `manhinh`, `cpu`, `ram`, `ocung`, `daban`, `giacu`) VALUES
(1, 1, 'Macbook Air 13 2020 M1/8GB/256GB SSD', 18490000, 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/11/12/637407970062806725_mba-2020-gold-dd.png', 'Apple M1 GPU 7 nhân', '13.3 inch, 2560 x 1600 Pixels, IPS, IPS LCD LED Backlit, True Tone', 'Apple, M1', '8 GB, LPDDR4', 'SSD 256 GB', 256, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_maytinhbang`
--

CREATE TABLE `tbl_maytinhbang` (
  `id` int(11) NOT NULL,
  `loaimay` int(11) NOT NULL,
  `tenmay` varchar(50) NOT NULL,
  `giamoi` int(11) NOT NULL,
  `linkanh` varchar(1000) NOT NULL,
  `manhinh` varchar(100) NOT NULL,
  `camerasau` varchar(100) NOT NULL,
  `cameraselfie` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `bonhotrong` varchar(100) NOT NULL,
  `daban` int(11) NOT NULL,
  `giacu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `loaimay` int(11) NOT NULL,
  `tenmay` varchar(50) NOT NULL,
  `giamoi` int(11) NOT NULL,
  `linkanh` varchar(10000) NOT NULL,
  `manhinh` varchar(100) NOT NULL,
  `camerasau` varchar(100) NOT NULL,
  `cameraselfie` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `bonhotrong` varchar(50) NOT NULL,
  `daban` int(11) NOT NULL,
  `giacu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `loaimay`, `tenmay`, `giamoi`, `linkanh`, `manhinh`, `camerasau`, `cameraselfie`, `cpu`, `bonhotrong`, `daban`, `giacu`) VALUES
(1, 1, 'iPhone 14 Pro Max 256GB', 28990000, 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/10/7/638007285202545738_iphone-14-pro-max-dd-bh.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels', '48.0 MP + 12.0 MP + 12.0 MP', '12.0 MP', 'Apple A16 Bionic', '256 GB', 328, 0),
(2, 1, 'iPhone 15  Pro Max 1 TB', 43990000, 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638307982103040290_iphone-15-promax-trang-1.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', ' 1 TB', 865, 45990000),
(3, 1, 'iPhone 15  Pro Max 1 TB', 43990000, 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638307982103040290_iphone-15-promax-trang-1.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', ' 1 TB', 865, 45990000),
(5, 1, 'iPhone 15  Pro Max 1 TB', 43990000, 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638307982103040290_iphone-15-promax-trang-1.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', ' 1 TB', 865, 45990000),
(6, 1, 'iPhone 15  Pro Max 1 TB', 43990000, 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638307982103040290_iphone-15-promax-trang-1.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', ' 1 TB', 865, 45990000);

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `tbl_laptop`
--
ALTER TABLE `tbl_laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_maytinhbang`
--
ALTER TABLE `tbl_maytinhbang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
