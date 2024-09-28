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
-- Cơ sở dữ liệu: `hotro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hotro`
--

CREATE TABLE `tbl_hotro` (
  `id` int(11) NOT NULL,
  `tenhotro` varchar(100) NOT NULL,
  `noidung` longtext NOT NULL,
  `linkhotro` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hotro`
--

INSERT INTO `tbl_hotro` (`id`, `tenhotro`, `noidung`, `linkhotro`) VALUES
(1, 'Hành Vi Gian Lận Trên Sàn Shopee', 'Người Bán được xem là có hành vi gian lận đối với hoạt động bán hàng trên Sàn Thương Mại Điện Tử Shopee (“Sàn Shopee”) nếu Người Bán thực hiện, có dấu hiệu thực hiện một trong các hành vi sau (“Người Bán Vi Phạm”): <br><br><br>\r\n\r\n \r\n\r\n(a) Tăng lượt đánh giá Shop bằng các phương thức vi phạm chính sách hiện hành của Shopee;<br><br>\r\n\r\n(b) Tạo đơn hàng ảo để tăng lượt bán, hiển thị, tương tác cho Sản Phẩm. Đơn hàng ảo bao gồm nhưng không giới hạn đơn hàng được đặt bởi Người Mua nhưng không được gửi đến Người Mua trên thực tế; hoặc đơn hàng có sự thông đồng giữa Người Bán và Người Mua và/hoặc bên thứ ba; hoặc đơn hàng không có Sản Phẩm thực tế bên trong hoặc Sản Phẩm khác biệt một cách rõ ràng với thông tin và mô tả đơn hàng trên hệ thống Shopee; có sự bất thường trong địa chỉ nhận hàng của nhiều Người Mua khi mua hàng trên cùng một hoặc một số Shop của Người Bán;<br><br>\r\n(c) Tạo đơn hàng ảo để lừa đảo, chiếm dụng tiền, lợi ích vật chất của Sàn Shopee, bao gồm nhưng không giới hạn các mã ưu đãi, mã giảm giá do Shopee và/hoặc Đối Tác của Shopee tài trợ;<br><br>\r\n\r\n(d) Lạm dụng các chương trình khuyến mại của Shopee và/hoặc Đối Tác của Shopee tổ chức trong từng thời kỳ nhằm mục đích lừa đảo, chiếm dụng tiền, các lợi ích vật chất từ những chương trình này;<br><br>\r\n\r\n(e) Lạm dụng các chương trình ưu đãi miễn phí vận chuyển, mã giảm giá, Shopee Xu do Shopee và/hoặc Đối Tác của Shopee tài trợ; <br><br>\r\n\r\n(f) Thực hiện các giao dịch hoặc kêu gọi, hướng dẫn Người Mua thực hiện các giao dịch mua hàng ngoài Sàn Shopee, bao gồm các giao dịch ngoại tuyến. <br><br>\r\n\r\n\r\nHành Vi Gian Lận Trên Sàn Shopee được xem là hành vi vi phạm nghiêm trọng đối với Điều khoản dịch vụ, Quy chế hoạt động và các Quy định, Chính Sách khác của Shopee, gây ra tổn hại có thể không bù đắp được không chỉ cho Shopee, Đối Tác của Shopee và cho Người Dùng chân chính. ', 'ndhotro.php?id=1'),
(2, 'Cách Tìm Kiếm Thông Tin Trên Trung Tâm Trợ Giúp', 'Lưu ý: \r\n\r\nTrung tâm trợ giúp sẽ cung cấp các bài viết và thông tin hỗ trợ Người dùng Shopee. \r\nBạn KHÔNG THỂ trao đổi trực tiếp, đối thoại với Shop hay Nhân viên hỗ trợ của Shopee tại trang này. \r\nBạn KHÔNG THỂ tim kiếm thông tin chi tiết đơn hàng, mã vận đơn, sản phẩm khuyến mãi hoặc số điện thoại. Để tra cứu những nội dung trên, bạn có thể vào trang chủ shopee.vn hoặc tải ứng dụng di động.\r\n\r\n\r\nBước 1: Vào mục Tôi > Trung tâm trợ giúp\r\nBước 2: Nhập từ khóa , cụm từ của vấn đề bạn đang gặp khó khăn vào thanh tìm kiếm\r\nBước 3: Bấm chọn tiếp bài viết có liên quan đến vấn đề bạn đang tìm kiếm thông tin', 'ndhotro.php?id=2'),
(3, '[Thanh toán] Làm thế nào để thanh toán bằng Chuyển khoản ngân hàng?', 'Thanh toán bằng hình thức Chuyển khoản ngân hàng chỉ áp dụng cho đơn hàng có giá trị thanh toán cuối cùng (gồm phí vận chuyển và các chi phí phát sinh khác) từ 10.000 VNĐ trở lên (*). Và chỉ áp dụng cho một số Người bán nhất định\r\n(*) đơn hàng không bao gồm các sản phẩm thuộc nhóm Nạp thẻ & Dịch vụ\r\n\r\n\r\n\r\nĐể thanh toán bằng hình thức Chuyển khoản ngân hàng trên Shopee, bạn hãy làm theo các bước như sau:  \r\n\r\n\r\nBước 1: Chọn sản phẩm cần mua > chọn Mua hàng\r\nBước 2: Chọn Phương thức thanh toán > chọn thanh toán là Chuyển khoản ngân hàng \r\nBước 3: Sao chép \"Số tài khoản định danh và Số tiền Tổng thanh toán\"\r\nBước 4: Thực hiển chuyển khoản bằng Internet Banking', 'ndhotro.php?id=3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_hotro`
--
ALTER TABLE `tbl_hotro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_hotro`
--
ALTER TABLE `tbl_hotro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
