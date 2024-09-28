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
-- Cơ sở dữ liệu: `user_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `address`, `username`, `password`) VALUES
(8, 'Nguyễn Hiền Dịu ', 'Hà Nội', 'td123', '$2y$10$EmustA6jsvwVxm8ekHgnL.cCkMVuKpp3cHyltE8wirhhNMkf048EC'),
(9, 'fwewe', 'fewfweeffew', 'fewf', '$2y$10$k13PlmONtkU3Wf1bgiCHVeIQIYy5zJCLSVhVTONGWWq7MHrCWbGAK'),
(10, 'Tuyết Nga', 'Hải Dương', 'admin1', '$2y$10$0BtJMdRe0YL7fw/LU1McB.MdblE18GyNiSPYazGeyTcUZYQh.6vxK'),
(11, 'Thắng', 'Hà Nam', 'thangaz', '$2y$10$eeBbj/MS4xPV62x7HDTOGudmfVM7JfOD0fzqtUPG4RrrJB0oA7Zq6'),
(12, 'phong', 'Thanh Hóa', 'phongz123', '$2y$10$jP6dGBqn1bMFEmyGl.IwvOWSSX8YEQJwg6DyI9fqKvz0ykVFMorF.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
