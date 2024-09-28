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
  `tenmay` varchar(50) NOT NULL,
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

--
-- Đang đổ dữ liệu cho bảng `tbl_laptop`
--

INSERT INTO `tbl_laptop` (`id`, `loaimay`, `tenmay`, `giacu`, `giamoi`, `linksp`, `linkanh`, `dohoa`, `manhinh`, `cpu`, `ram`, `ocung`, `tragop`, `daban`) VALUES
(1, 1, 'Macbook Air 13 2020 M1/8GB/256GB SSD', 22990000, 18490000, 'sanpham.php?cha=-3&id=1', 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/11/12/637407970062806725_mba-2020-gold-dd.png', 'Apple M1 GPU 7 nhân', '13.3 inch, 2560 x 1600 Pixels, IPS, IPS LCD LED Backlit, True Tone', 'Apple, M1', '8 GB, LPDDR4', 'SSD 256 GB', 0, 328);

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

--
-- Đang đổ dữ liệu cho bảng `tbl_maytinhbang`
--

INSERT INTO `tbl_maytinhbang` (`id`, `loaimay`, `tenmay`, `giacu`, `giamoi`, `linksp`, `linkanh`, `manhinh`, `camerasau`, `cameraselfie`, `cpu`, `bonhotrong`, `tragop`, `daban`) VALUES
(1, 1, 'iPad Gen 9 2021 10.2 inch WiFi 64GB', 32990000, 28990000, 'sanpham.php?cha=-4&id=1', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/12/6/638059452014421919_ipad-gen-9-wifi-dd.jpg', '10.2 inch, IPS LCD, Liquid Retina HD, 2160 x 1620 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A13 Bionic', '128 GB', 0, 328);

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
  `linkanh` varchar(1000) NOT NULL,
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
(1, 1, 'iPhone 15 128 GB', 22990000, 20190000, 'sanpham.php?cha=-2&id=1', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/15/638303942321093007_iphone-15-hong-1.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', '[Apple A16 Bionic]', '128 GB', 0, 230),
(2, 1, 'iPhone 15 256 GB', 25990000, 23690000, 'sanpham.php?cha=-2&id=2', 'https://images.fpt.shop/unsafe/fit-in/960x640/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/9/13/638302015845512370_iPhone_15_Green_Pure_Back_iPhone_15_Green_Pure_Front_2up_Screen__USEN.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', '[Apple A16 Bionic]', '256 GB', 0, 200),
(3, 1, 'iPhone 15 512 GB', 2899000, 31990000, 'sanpham.php?cha=-2&id=3', 'https://images.fpt.shop/unsafe/fit-in/960x640/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/9/13/638302015843008975_iPhone_15_Blue_Pure_Back_iPhone_15_Blue_Pure_Front_2up_Screen__USEN.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', '[Apple A16 Bionic]', '512 GB', 0, 220),
(4, 1, 'iPhone 15  Pro 128 GB', 28990000, 25990000, 'sanpham.php?cha=-2&id=4', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/16/638304565863318698_iphone-15-pro-trang-1.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', '128 GB', 0, 450),
(5, 1, 'iPhone 15  Pro 256 GB', 31990000, 28990000, 'sanpham.php?cha=-2&id=5', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/16/638304612779650501_iphone-15-pro-xanh-1.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', '256 GB', 0, 654),
(6, 1, 'iPhone 15  Pro 512 GB', 36990000, 34990000, 'sanpham.php?cha=-2&id=6', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/16/638304560571374532_iphone-15-pro-den-1.jpg', '6.1 inch, OLED, Super Retina XDR, 2556 x 1179 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', '512 GB', 0, 447),
(7, 1, 'iPhone 15  Pro Max 256 GB', 34990000, 29990000, 'sanpham.php?cha=-2&id=7', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638307989548944936_iphone-15-promax-xanh-1.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', '256 GB', 0, 428),
(8, 1, 'iPhone 15  Pro Max 512 GB', 38990000, 36990000, 'sanpham.php?cha=-2&id=8', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638307980220145280_iphone-15-promax-den-1.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', '512 GB', 0, 713),
(9, 1, 'iPhone 15  Pro Max 1 TB', 45990000, 43990000, 'sanpham.php?cha=-2&id=9', 'https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638307982103040290_iphone-15-promax-trang-1.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels', '48.0 MP + 12.0 MP', '12.0 MP', 'Apple A17 Pro', ' 1 TB', 0, 865),
(10, 1, 'iPhone 14 Pro Max 256GB', 32990000, 28990000, 'sanpham.php?cha=-2&id=10', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/10/7/638007285202545738_iphone-14-pro-max-dd-bh.jpg', '6.7 inch, OLED, Super Retina XDR, 2796 x 1290 Pixels', '48.0 MP + 12.0 MP + 12.0 MP', '12.0 MP', 'Apple A16 Bionic', '256 GB', 0, 33),
(11, 1, 'iPhone 14 Plus 128GB', 24990000, 19890000, 'sanpham.php?cha=-2&id=11', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/2/20/638440340613418500_iphone-14-plus-dd-bh.jpg', '6.7 inch, OLED, Super Retina XDR, 2778 x 1284 Pixels', '12.0 MP + 12.0 MP', '12.0 MP', 'Apple A15 Bionic', '128 GB', -1, 234),
(12, 1, 'iPhone 11 64GB', 11990000, 8990000, 'sanpham.php?cha=-2&id=12', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/2/20/638440266267791271_iphone-11-dd-bh.jpg', '6.1 inch, IPS LCD, Liquid Retina HD, 828 x 1792 Pixels', '12.0 MP + 12.0 MP', '12.0 MP', 'Apple A13 Bionic', '64 GB', 0, 463),
(13, 2, 'Samsung Galaxy A15 128GB', 4990000, 4790000, 'sanpham.php?cha=-2&id=13', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/1/2/638397853078631034_samsung-galaxy-a15-xanh-dd-doimoi.jpg', '6.5 inch, Super AMOLED, FHD+, 1080 x 2408 Pixels', '50.0 MP + 5.0 MP + 2.0 MP', '5.0 MP + 2.0 MP', 'MediaTek G99', '128 GB', 0, 444),
(14, 2, 'Samsung Galaxy S22 5G 128GB', 21990000, 11990000, 'sanpham.php?cha=-2&id=14', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/3/31/638158962810512367_ss-galaxy-s22-dd-icon.jpg', '6.1 inch, Dynamic AMOLED 2X, FHD+, 1080 x 2340 Pixels', '50.0 MP + 12.0 MP + 10.0 MP', '10.0 MP', 'Snapdragon 8 Gen 1', '128 GB', 0, 112),
(15, 2, 'Samsung Galaxy S24 Plus 5G 256GB', 26990000, 21790000, 'sanpham.php?cha=-2&id=15', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/4/3/638477639726536939_samsung-galaxy-s24-dd-ai.jpg', '6.7 inch, FHD+, Dynamic AMOLED 2X, 3120 x 1440 Pixels', '50.0 MP + 12.0 MP + 10.0 MP', '12.0 MP', 'Exynos 2400', '256 GB', 0, 124),
(16, 3, 'OPPO Reno11 F 5G 8GB-256GB', 8990000, 8690000, 'sanpham.php?cha=-2&id=16', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/3/2/638449667186233630_oppo-reno11-f-xanh-dd-moi-1.jpg', '6.7 inch, AMOLED, FHD+, 1080 x 2412 Pixels', '64.0 MP + 8.0 MP + 2.0 MP', '32.0 MP', 'MediaTek Dimensity 7050 5G', '256 GB', -1, 231),
(17, 3, 'OPPO A58 6GB-128GB', 4990000, 4990000, 'sanpham.php?cha=-2&id=17', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/11/30/638369332268397830_oppo-a58-dd-doimoi.jpg', '6.7 inch, IPS LCD, FHD+, Màn hình chính: 1080 x 2400 Pixels, 1080 x 2400 Pixels', '50.0 MP + 2.0 MP', '8.0 MP', 'Helio G85', '128 GB', 0, 235),
(18, 3, 'OPPO Find N3 5G 16GB-512GB', 44990000, 41990000, 'sanpham.php?cha=-2&id=18', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/12/4/638372781579679832_oppo-find-n3-5g-vang-dd.jpg', '7.82 inch, 6.5 inch, 2K+, 2K+, 2268 x 2440 pixels', '48.0 MP + 64 MP + 48.0 MP', '20.0 MP + 32 MP', 'Qualcomm Snapdragon 8 Gen 2', '512 GB', 0, 98),
(19, 4, 'Xiaomi Redmi A3 4GB-128GB', 2990000, 2990000, 'sanpham.php?cha=-2&id=19', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/4/1/638475678237775959_xiaomi-redmi-a3-dd-bh-thucu.jpg', '6.71 inch, IPS LCD, HD+, 720 x 1650 Pixels', '8.0 MP + 0.08 MP', '5.0 MP', 'MediaTek Helio G36', '128 GB', 0, 87),
(20, 4, 'Xiaomi Redmi Note 13 Pro+ 5G 8GB-256GB', 10990000, 10490000, 'sanpham.php?cha=-2&id=20', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/1/29/638421257525766915_xiaomi-redmi-note-13-pro-plus-dd-bh.jpg', '6.67 inch, AMOLED, 1.5K, 2712 x 1220 Pixels', '200.0 MP + 8.0 MP + 2.0 MP', '16.0 MP', 'Dimensity 7200 Ultra', '256 GB', 0, 67),
(21, 4, 'Xiaomi 14 12GB-256GB', 22990000, 20990000, 'sanpham.php?cha=-2&id=21', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/3/26/638470498770132071_xiaomi-14-dd-bh.jpg', '6.36 inch, LTPO AMOLED, FHD+, 2670 x 1200 Pixels', '50.0 MP + 50.0 MP + 50.0 MP', '32.0 MP', 'Snapdragon 8 Gen 3', '256 GB', 0, 208),
(22, 5, 'Nokia 105 DS Pro 4G', 680000, 660000, 'sanpham.php?cha=-2&id=22', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/8/14/638276308841835967_nokia-105-ds-pro-4g-dd.jpg', '1.77 inch, QQVGA, 120 x 160 Pixels', 'empty', 'empty', 'Unisoc T107', '128 GB', -1, 87),
(23, 5, 'Nokia 110 DS Pro 4G', 720000, 700000, 'sanpham.php?cha=-2&id=23', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/8/14/638276301133266677_nokia-110-ds-pro-4g-dd.jpg', '1.77 inch, QQVGA, 120 x 160 Pixels1.77 inch, QQVGA, 120 x 160 Pixels', 'empty', 'empty', 'empty', '128 GB', -1, 102),
(24, 5, 'Nokia 215 DS 4G', 990000, 970000, 'sanpham.php?cha=-2&id=24', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/11/13/637408832230600670_nokia-215-xanh-dd.png', '2.4 inch, TFT LCD, QVGA, 320 x 240 Pixels', 'empty', 'empty', 'Unisoc T117', '128 GB', -1, 103);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
