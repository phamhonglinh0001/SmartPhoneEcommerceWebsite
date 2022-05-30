-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2022 lúc 04:44 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nienluan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `ten_admin` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `id_taikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `ten_admin`, `id_taikhoan`) VALUES
(1, 'Phạm Hồng Linh', 1),
(2, 'Võ Tấn Hậu', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_ddt` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `id_bl` int(11) NOT NULL,
  `thoigian_bl` datetime NOT NULL,
  `noidung_bl` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id_ddt`, `id_kh`, `id_bl`, `thoigian_bl`, `noidung_bl`) VALUES
(34, 1, 7, '2022-05-06 17:06:50', 'Sản phẩm xài rất tôt'),
(25, 1, 8, '2022-05-06 17:07:16', 'Sản phẩm rất tuyệt vời'),
(31, 1, 9, '2022-05-12 20:48:48', 'Sản phẩm rất tốt, tuyệt vời');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `id` int(11) NOT NULL,
  `id_dh` int(11) DEFAULT NULL,
  `id_ddt` int(11) NOT NULL,
  `id_gh` int(11) NOT NULL,
  `id_ms` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_mua` int(11) DEFAULT NULL,
  `trang_thai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_gio_hang`
--

INSERT INTO `chi_tiet_gio_hang` (`id`, `id_dh`, `id_ddt`, `id_gh`, `id_ms`, `so_luong`, `gia_mua`, `trang_thai`) VALUES
(21, 17, 1, 1, 4, 2, 12742500, 'Đã thanh toán'),
(28, 22, 34, 1, 3, 3, 7990000, 'Đã thanh toán'),
(29, 22, 25, 1, 4, 1, 30990000, 'Đã thanh toán'),
(30, 22, 17, 1, 1, 2, 12990000, 'Đã thanh toán'),
(31, 23, 12, 1, 1, 2, 288000, 'Đã hủy'),
(32, 24, 27, 1, 3, 2, 3690000, 'Đã thanh toán'),
(33, 24, 12, 1, 1, 2, 288000, 'Đã thanh toán'),
(34, 25, 33, 1, 2, 2, 2990000, 'Đã thanh toán'),
(35, 25, 31, 1, 5, 2, 5290000, 'Đã thanh toán'),
(36, 26, 29, 1, 1, 4, 19990000, 'Đã thanh toán'),
(37, 26, 27, 1, 4, 2, 3690000, 'Đã thanh toán'),
(38, 26, 16, 1, 3, 1, 12990000, 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id_ddt` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `giatri_dg` int(11) NOT NULL,
  `ngay_dg` datetime NOT NULL,
  `id_dg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`id_ddt`, `id_kh`, `giatri_dg`, `ngay_dg`, `id_dg`) VALUES
(34, 1, 5, '2022-05-06 17:06:50', 5),
(25, 1, 4, '2022-05-06 17:07:16', 6),
(31, 1, 5, '2022-05-12 20:48:48', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_chi`
--

CREATE TABLE `dia_chi` (
  `id_kh` int(11) NOT NULL,
  `chitietdiachi` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `id_dc` int(11) NOT NULL,
  `macdinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dia_chi`
--

INSERT INTO `dia_chi` (`id_kh`, `chitietdiachi`, `id_dc`, `macdinh`) VALUES
(2, 'Cờ Đỏ, Ô Môn, TP. Cần Thơ', 2, 1),
(1, 'Chợ Mới  - An Giang fnalfnlamfa', 5, 1),
(1, 'Chợ Mới  - An Giang', 9, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dong_dienthoai`
--

CREATE TABLE `dong_dienthoai` (
  `id_ddt` int(11) NOT NULL,
  `ten_ddt` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `id_th` int(11) DEFAULT NULL,
  `id_km` int(11) DEFAULT NULL,
  `mota` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `anh` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `tg_bh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dong_dienthoai`
--

INSERT INTO `dong_dienthoai` (`id_ddt`, `ten_ddt`, `id_th`, `id_km`, `mota`, `anh`, `gia`, `tg_bh`) VALUES
(1, 'IPhone 11', 1, 1, 'Apple đã chính thức trình làng bộ 3 siêu phẩm iPhone 11, trong đó phiên bản iPhone 11 64GB có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như iPhone Xr ra mắt trước đó.', '1_1.jpg', 16990000, 24),
(2, 'IPhone 13 Pro Max', 1, 1, 'iPhone 13 Pro Max 128 GB - siêu phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.', '2_1.jpg', 33990000, 24),
(3, 'IPhone 12 Pro', 1, 2, 'iPhone 12 Pro - \"Siêu phẩm công nghệ\" với nhiều nâng cấp mạnh mẽ về thiết kế, cấu hình và hiệu năng, khẳng định đẳng cấp thời thượng trên thị trường smartphone cao cấp.', '3_1.jpg', 25290000, 24),
(4, 'IPhone 13', 1, 1, 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 - điện thoại có nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.', '4_1.jpg', 24990000, 24),
(5, 'IPhone SE (2022)', 1, NULL, 'Như vậy là sau bao ngày chờ đợi thì iPhone SE 64 GB (2022) cũng đã được giới thiệu tại sự kiện Apple Peek Performance. Thiết bị nổi bật với cấu hình mạnh mẽ, chạy chip hiện đại nhất của Apple hiện tại nhưng giá bán lại rất phải chăng.', '5_1.jpg', 12990000, 24),
(6, 'Itel L6502', 2, NULL, 'Sở hữu một smartphone có ngoại hình đẹp với cấu hình tốt, giá rẻ không còn là điều không tưởng với Itel L6502, một phiên bản đẹp, giá tốt đến từ Itel đã sẵn sàng cho bạn trải nghiệm.', '6_1.jpg', 2490000, 24),
(7, 'Itel L6006', 2, NULL, 'Itel L6006 đến từ thương hiệu Itel phù hợp với những ai đang tìm kiếm cho mình một chiếc smartphone giá rẻ với cấu hình ổn định, được trang bị đầy đủ các tính năng thông dụng và có giá thành phải chăng.', '7_1.jpg', 2190000, 24),
(8, 'Masstel FAMI 12 4G', 3, 2, 'Masstel Fami 12 4G có giao diện hiển thị to, rõ ràng, phông chữ lớn tiện lợi dễ dàng sử dụng, phù hợp với các bậc phụ huynh, người lớn tuổi.\r\nSở hữu thiết kế chắc chắn với khung viền kim loại, mặt lưng nhựa. Máy có phím mở khóa nhanh màn hình bên cạnh viền của máy cho thao tác sử dụng tiện lợi hơn.\r\nHỗ trợ các tiện ích nghe đài FM không cần tai nghe, trang bị đèn LED với phím bật tắt nhanh. Ngoài ra máy cũng có chức năng đọc số bằng giọng nói khá là tiện lợi.\r\nLoa của máy có âm lượng lớn, nghe gọi rõ ràng, hỗ trợ công nghệ HD Call nâng cao chất lượng cuộc gọi.\r\n\r\n', '8_1.jpg', 650000, 24),
(9, 'Masstel FAMI 60 4G', 3, NULL, 'Masstel Fami 60 là chiếc điện thoại phổ thông dành tặng riêng cho người cao tuổi với thiết kế gọn gàng, màn hình rõ nét và cụm loa ngoài cực lớn cùng pin “siêu trâu”, hỗ trợ công nghệ đàm thoại LTE 4G, hứa hẹn sẽ đáp ứng hoàn hảo nhu cầu giải trí cơ bản, liên lạc của bạn.', '9_1.jpeg', 750000, 24),
(12, 'Mobell M319 (2021)', 4, 3, 'Mobell M319 (2021) một chiếc điện thoại phổ thông đáp ứng tốt các nhu cầu nghe gọi cơ bản. Máy có ưu điểm về thiết kế, màn hình và mức giá phải chăng phù hợp với nhiều đối tượng người dùng.', '12_1.jpg', 320000, 24),
(13, 'Mobell Rock 3', 4, 3, 'Mobell Rock 3 là bản nâng cấp của chiếc điện thoại Mobell trước đó với vẻ ngoài hầm hố đặc trưng của dòng điện thoại chống sốc cũng như va đập.', '13_1.jpg', 590000, 24),
(14, 'Nokia G10', 5, 2, 'Nokia G10 cùng với Nokia G20 là bộ đôi smartphone đầu tiên thuộc dòng G-series của Nokia, người dùng sẽ trải nghiệm lâu dài với dung lượng pin lớn, thiết kế thời trang và hoạt động trên hệ điều hành Android 11 nguyên bản, tối ưu sự mượt mà và hỗ trợ cập nhật đến 3 năm.', '14_1.jpg', 3690000, 24),
(15, 'Nokia C30', 5, NULL, 'Nokia C30 là dòng smartphone giá rẻ được Nokia chăm chút và đầu tư kỹ lưỡng với những nâng cấp đáng kể về hiệu năng camera cùng viên pin cực khủng so với Nokia C20 đem lại trải nghiệm tuyệt vời hơn thế hệ tiền nhiệm của mình.', '15_1.jpg', 3450000, 24),
(16, 'OPPO Reno7', 6, NULL, 'OPPO Reno7 Z 5G được OPPO ra mắt với thiết kế độc đáo, trẻ trung, trang bị bộ ba camera 64 MP, thời lượng pin lớn cùng nhiều tính năng nổi bật thú vị, đáp ứng tốt mọi nhu cầu sử dụng cho bạn tha hồ khám phá.', '16_1.jpg', 12990000, 24),
(17, 'OPPO Reno6 5G', 6, NULL, 'Sau khi ra mắt OPPO Reno5 chưa lâu thì OPPO lại cho ra mẫu smartphone mới mang tên OPPO Reno6 với hàng loạt cải tiến mới về ngoại hình bên ngoài lẫn hiệu năng bên trong, mang đến trải nghiệm vượt bật cho người dùng.', '17_1.jpg', 12990000, 24),
(18, 'OPPO Reno4 Pro', 6, NULL, 'OPPO chính thức trình làng chiếc smartphone có tên OPPO Reno4 Pro. Máy trang bị cấu hình vô cùng cao cấp với vi xử lý chip Snapdragon 720G, bộ 4 camera đến 48 MP ấn tượng, cùng công nghệ sạc siêu nhanh 65 W nhưng được bán với mức giá vô ưu đãi, dễ tiếp cận.', '18_1.jpg', 10490000, 24),
(19, 'OPPO Reno5 5G', 6, NULL, 'OPPO đã trình làng OPPO Reno5 5G phiên bản kết nối 5G internet siêu nhanh ra thị trường. Chiếc điện thoại với hàng loạt các tính năng nổi bật cùng vẻ ngoài thời thượng giúp tôn lên vẻ sang trọng cho người sở hữu.', '19_1.jpg', 8990000, 24),
(20, 'OPPO A55', 6, NULL, 'OPPO cho ra mắt OPPO A55 4G chiếc smartphone giá rẻ tầm trung có thiết kế đẹp mắt, cấu hình khá ổn, cụm camera chất lượng và dung lượng pin ấn tượng, mang đến một lựa chọn trải nghiệm thú vị vừa túi tiền cho người tiêu dùng.', '20_1.jpg', 4990000, 24),
(21, 'OPPO A16K ', 6, NULL, 'OPPO chính thức trình làng mẫu smartphone giá rẻ - OPPO A16K sở hữu màu sắc thời thượng, viên pin dung lượng cao, cấu hình khỏe, selfie lung linh, một lựa chọn thú vị cho người tiêu dùng.', '21_1.jpg', 3290000, 24),
(22, 'Realme 9i', 7, NULL, 'Realme 9i được trang bị CPU Snapdragon 680 mang lại hiệu năng ổn định cho các tác vụ cơ bản. Con chip này được sản xuất trên tiến trình 6 nm tiên tiến nên nó có khả năng tiết kiệm năng lượng khá ấn tượng.\r\n\r\nChiếc điện thoại này sử dụng công nghệ mở rộng RAM động, ở phiên bản 6 GB có thể mở rộng thêm tối đa đến 5 GB, nâng tổng RAM máy hỗ trợ đến 11 GB (ở phiên bản 4 GB RAM thì có thể mở rộng thêm tối đa 3 GB), khi kiểm tra bằng phần mềm đo hiệu năng, máy đạt hơn 230000 điểm với Antutu (bên trái) và khoảng hơn 8700 điểm PCMark (bên phải).', '22_1.jpg', 6490000, 24),
(23, 'Realme C21-Y', 7, NULL, 'Realme C21-Y 3 GB là chiếc điện thoại nằm ở phân khúc giá rẻ với điểm nhấn thiết kế hình học sang trọng, bộ 3 camera chất lượng, hiệu năng đáp ứng khá tốt các nhu cầu và thời lượng pin tương đối dài hứa hẹn mang đến cho người dùng những trải nghiệm ấn tượng.', '23_1.jpg', 3690000, 24),
(24, 'Realme C25Y', 7, NULL, 'Realme C25Y 64GB - là chiếc smartphone được Realme cho ra mắt với một mức giá khá tốt, sở hữu thiết kế hiện đại với 3 camera AI lên đến 50 MP, hiệu suất ổn định cùng thời gian sử dụng lâu dài nhờ viên pin khủng 5000 mAh, được xem là một trong những sản phẩm lý tưởng mà bạn nên sở hữu.', '24_1.jpeg', 4690000, 24),
(25, 'Samsung Galaxy S22 Ultra 5G', 8, NULL, 'Galaxy S22 Ultra 5G chiếc smartphone cao cấp nhất trong bộ 3 Galaxy S22 series mà Samsung đã cho ra mắt. Tích hợp bút S Pen hoàn hảo trong thân máy, trang bị vi xử lý mạnh mẽ cho các tác vụ sử dụng vô cùng mượt mà và nổi bật hơn với cụm camera không viền độc đáo mang đậm dấu ấn riêng.', '25_1.jpg', 30990000, 24),
(26, 'Samsung Galaxy A32', 8, NULL, 'Samsung Galaxy A32 4G là chiếc điện thoại thuộc phân khúc tầm trung nhưng sở hữu nhiều ưu điểm vượt trội về màn hình lớn sắc nét, bộ bốn camera 64 MP cùng vi xử lý hiệu năng cao và được bán ra với mức giá vô cùng tốt.', '26_1.jpg', 6490000, 24),
(27, 'Samsung Galaxy A03s', 8, NULL, 'Nhằm đem đến cho người dùng thêm sự lựa chọn trong phân khúc, Samsung đã cho ra mắt thêm một chiếc điện thoại giá rẻ với tên gọi Galaxy A03s. So với người tiền nhiệm Galaxy A02s, thiết bị sẽ có một số nâng cấp mới, đây hứa hẹn sẽ là sản phẩm đáng để bạn trải nghiệm.', '27_1.jpg', 3690000, 24),
(28, 'Vivo V23e', 9, NULL, 'Vivo V23e - sản phẩm tầm trung được đầu tư lớn về khả năng selfie cùng ngoại hình mỏng nhẹ, bên cạnh thiết kế vuông vức theo xu hướng hiện tại thì V23e còn có hiệu năng tốt và một viên pin có khả năng sạc cực nhanh.', '28_1.jpg', 8490000, 24),
(29, 'Vivo X70 Pro 5G', 9, NULL, 'Vivo cho ra mắt Vivo X70 Pro, một sản phẩm cao cấp ấn tượng với kiểu dáng lẫn hiệu năng tuyệt vời. Đặc biệt, camera còn được nâng cấp hàng loạt các tính năng thông minh, cùng bạn sáng tạo nên những kiệt tác đầy nghệ thuật.', '29_1.jpg', 19990000, 24),
(30, 'Vivo Y33s', 9, NULL, 'Y33s tái tạo màu sắc tốt, màn hình này hiển thị hình ảnh khá rực rỡ, màu sắc rất tươi và nổi bật nên khi giải trí như xem phim thì sẽ mang lại một trải nghiệm tươi tắn, hấp dẫn.\r\n\r\nTrong phân khúc giá này thì các hãng hầu hết đã trang bị camera nốt ruồi trên các sản phẩm của họ mà Y33s vẫn sử dụng thiết kế giọt nước, nếu camera trước Y33s được thay thế bằng camera nốt ruồi thì sẽ ấn tượng hơn.', '30_1.jpg', 6990000, 24),
(31, 'Vivo Y21s', 9, NULL, 'Vivo đã giới thiệu thêm một phiên bản thuộc series Y21 mang tên Vivo Y21s, đây là một trong những mẫu smartphone tầm trung đầu tiên của Vivo được trang bị camera chính lên đến 50 MP. Máy có thiết kế trẻ trung, pin dung lượng lớn cùng công nghệ mở rộng RAM.', '31_1.jpg', 5290000, 24),
(32, 'Xiaomi 11T 5G', 10, NULL, 'Xiaomi 11T đầy nổi bật với thiết kế vô cùng trẻ trung, màn hình AMOLED, bộ 3 camera sắc nét và viên pin lớn đây sẽ là mẫu smartphone của Xiaomi thỏa mãn mọi nhu cầu giải trí, làm việc và là niềm đam mê sáng tạo của bạn. ', '32_1.jpg', 10990000, 24),
(33, 'Xiaomi Redmi 9C', 10, NULL, 'Xiaomi Redmi 9C (3GB/64GB), smartphone nổi bật trong phân khúc điện thoại giá rẻ với thiết kế tinh tế sang trọng, hiệu năng mạnh mẽ Helio G35 mới, viên pin dung lượng khủng, cùng bộ 3 AI camera bắt trọn mọi khoảnh khắc.', '33_1.jpg', 2990000, 24),
(34, 'Xiaomi Mi 11 Lite', 10, NULL, 'Xiaomi Mi 11 Lite là phiên bản thu gọn của Xiaomi Mi 11 5G được ra mắt trước đó. Thừa hưởng nhiều ưu điểm của đàn anh, Mi 11 Lite hoàn toàn có thể đáp ứng tốt các tác vụ thông thường một cách dễ dàng và đặc biệt hơn máy có thiết kế vô cùng mỏng nhẹ và thời trang.', '34_1.jpg', 7990000, 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id_dh` int(11) NOT NULL,
  `ngaydathang` datetime NOT NULL,
  `ngaynhanhang` datetime DEFAULT NULL,
  `id_kh` int(11) NOT NULL,
  `id_dc` int(11) DEFAULT NULL,
  `trangthai_dh` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `tong_tien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id_dh`, `ngaydathang`, `ngaynhanhang`, `id_kh`, `id_dc`, `trangthai_dh`, `tong_tien`) VALUES
(17, '2022-05-06 07:31:16', '2022-05-06 12:33:25', 1, 9, 'Đã giao hàng', 25485000),
(22, '2022-05-06 11:47:56', '2022-05-06 16:49:03', 1, 9, 'Đã giao hàng', 80940000),
(23, '2022-05-07 00:06:50', NULL, 1, 9, 'Đã hủy', 576000),
(24, '2022-05-07 00:08:00', '2022-05-07 05:08:20', 1, 9, 'Đã giao hàng', 7956000),
(25, '2022-05-12 15:42:04', '2022-05-12 20:42:29', 1, 9, 'Đã giao hàng', 16560000),
(26, '2022-05-13 03:38:28', '2022-05-13 08:40:43', 1, 9, 'Đã giao hàng', 100330000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_gh` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id_gh`, `id_kh`) VALUES
(1, 1),
(2, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id_hd` int(11) NOT NULL,
  `id_dh` int(11) NOT NULL,
  `ngay_xuat` datetime NOT NULL,
  `ngay_thanh_toan` datetime NOT NULL,
  `tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_kh` int(11) NOT NULL,
  `ten_kh` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `sdt` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `id_taikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id_kh`, `ten_kh`, `ngaysinh`, `gioitinh`, `sdt`, `email`, `id_taikhoan`) VALUES
(1, 'Phạm Hồng Linh', '2000-07-24', 1, '0986611387', 'phamhonglinh009@gmail.com', 4),
(2, 'Võ Tấn Hậu', '2000-10-05', 1, '0123456789', 'votanhau003@gmail.com', 5),
(4, 'Demo', '2000-07-24', 1, '0986611387', 'phamhonglinh005@gmail.com', 8);

--
-- Bẫy `khach_hang`
--
DELIMITER $$
CREATE TRIGGER `after_insert_themgiohang` AFTER INSERT ON `khach_hang` FOR EACH ROW BEGIN
	INSERT INTO gio_hang(id_kh) VALUES (NEW.id_kh);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `id_km` int(11) NOT NULL,
  `ten_km` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `giatri_km` int(11) NOT NULL,
  `thoigian_bd` datetime NOT NULL,
  `thoigian_kt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`id_km`, `ten_km`, `giatri_km`, `thoigian_bd`, `thoigian_kt`) VALUES
(1, 'Khuyến mãi giảm giá khủng 30/4', 25, '2022-03-22 03:06:13', '2022-05-28 03:06:13'),
(2, 'Khuyến mãi siêu khủng \"Chào mừng QT Lao động 1-5\"', 20, '2022-03-22 03:07:22', '2022-05-02 03:07:22'),
(3, 'Khuyến mãi tri ân khách hàng thân yêu', 10, '2022-03-22 03:10:02', '2022-07-22 03:10:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau_sac`
--

CREATE TABLE `mau_sac` (
  `id_ms` int(11) NOT NULL,
  `ten_ms` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mau_sac`
--

INSERT INTO `mau_sac` (`id_ms`, `ten_ms`) VALUES
(1, 'Đỏ'),
(2, 'Vàng'),
(3, 'Trắng'),
(4, 'Đen'),
(5, 'Xanh dương'),
(6, 'Bạc'),
(7, 'Xanh Rêu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `so_luong`
--

CREATE TABLE `so_luong` (
  `id_ms` int(11) NOT NULL,
  `id_ddt` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `so_luong`
--

INSERT INTO `so_luong` (`id_ms`, `id_ddt`, `so_luong`) VALUES
(1, 1, 8),
(1, 2, 4),
(1, 3, 5),
(1, 4, 5),
(1, 5, 5),
(1, 6, 5),
(1, 7, 4),
(1, 8, 5),
(1, 9, 5),
(1, 12, 3),
(1, 13, 5),
(1, 14, 5),
(1, 15, 5),
(1, 16, 5),
(1, 17, 3),
(1, 18, 5),
(1, 19, 5),
(1, 20, 5),
(1, 21, 5),
(1, 22, 5),
(1, 23, 5),
(1, 24, 5),
(1, 25, 5),
(1, 26, 5),
(1, 27, 5),
(1, 28, 5),
(1, 29, 1),
(1, 30, 5),
(1, 31, 5),
(1, 32, 5),
(1, 33, 5),
(1, 34, 5),
(2, 1, 9),
(2, 2, 5),
(2, 3, 5),
(2, 4, 5),
(2, 5, 5),
(2, 6, 5),
(2, 7, 4),
(2, 8, 5),
(2, 9, 5),
(2, 12, 5),
(2, 13, 5),
(2, 14, 5),
(2, 15, 5),
(2, 16, 5),
(2, 17, 5),
(2, 18, 5),
(2, 19, 5),
(2, 20, 5),
(2, 21, 5),
(2, 22, 6),
(2, 23, 5),
(2, 24, 5),
(2, 25, 5),
(2, 26, 5),
(2, 27, 5),
(2, 28, 5),
(2, 29, 5),
(2, 30, 5),
(2, 31, 5),
(2, 32, 5),
(2, 33, 3),
(2, 34, 5),
(3, 1, 10),
(3, 2, 5),
(3, 3, 5),
(3, 4, 5),
(3, 5, 5),
(3, 6, 5),
(3, 7, 5),
(3, 8, 5),
(3, 9, 5),
(3, 12, 5),
(3, 13, 5),
(3, 14, 5),
(3, 15, 5),
(3, 16, 4),
(3, 17, 5),
(3, 18, 5),
(3, 19, 5),
(3, 20, 5),
(3, 21, 5),
(3, 22, 5),
(3, 23, 5),
(3, 24, 5),
(3, 25, 5),
(3, 26, 5),
(3, 27, 3),
(3, 28, 5),
(3, 29, 5),
(3, 30, 5),
(3, 31, 5),
(3, 32, 5),
(3, 33, 5),
(3, 34, 2),
(4, 1, 11),
(4, 2, 5),
(4, 3, 5),
(4, 4, 5),
(4, 5, 4),
(4, 6, 4),
(4, 7, 5),
(4, 8, 5),
(4, 9, 5),
(4, 12, 5),
(4, 13, 5),
(4, 14, 5),
(4, 15, 5),
(4, 16, 5),
(4, 17, 5),
(4, 18, 5),
(4, 19, 5),
(4, 20, 5),
(4, 21, 5),
(4, 22, 5),
(4, 23, 5),
(4, 24, 5),
(4, 25, 4),
(4, 26, 5),
(4, 27, 3),
(4, 28, 5),
(4, 29, 5),
(4, 30, 5),
(4, 31, 5),
(4, 32, 5),
(4, 33, 5),
(4, 34, 5),
(5, 1, 5),
(5, 2, 5),
(5, 3, 5),
(5, 4, 5),
(5, 5, 5),
(5, 6, 5),
(5, 7, 5),
(5, 8, 5),
(5, 9, 5),
(5, 12, 4),
(5, 13, 5),
(5, 14, 5),
(5, 15, 5),
(5, 16, 5),
(5, 17, 5),
(5, 18, 5),
(5, 19, 5),
(5, 20, 5),
(5, 21, 5),
(5, 22, 5),
(5, 23, 5),
(5, 24, 5),
(5, 25, 5),
(5, 26, 5),
(5, 27, 5),
(5, 28, 5),
(5, 29, 5),
(5, 30, 5),
(5, 31, 3),
(5, 32, 5),
(5, 33, 5),
(5, 34, 5),
(6, 1, 8),
(7, 1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `username` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`username`, `password`, `id_taikhoan`, `ngaytao`, `level`, `avatar`) VALUES
('linh', '123', 1, '2022-03-21 04:53:26', 1, ''),
('hau', 'hau', 3, '2022-03-21 04:57:36', 1, ''),
('phamhonglinh', 'phamhonglinh', 4, '2022-03-22 03:11:29', 0, '4.jpg'),
('votanhau', 'votanhau', 5, '2022-03-22 03:12:14', 0, ''),
('demo', 'demo', 8, '2022-04-01 14:05:32', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_so`
--

CREATE TABLE `thong_so` (
  `id_ts` int(11) NOT NULL,
  `id_ddt` int(11) NOT NULL,
  `congnghemanhinh` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `dophangiai` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `kichthuocmanhinh` float DEFAULT NULL,
  `camsau` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `camtruoc` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `hedieuhanh` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `cpu` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tocdocpu` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `gpu` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ram` float DEFAULT NULL,
  `rom` int(11) DEFAULT NULL,
  `congsac` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `congtainghe` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `loaipin` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `dungluongpin` int(11) DEFAULT NULL,
  `congsuatsac` int(11) DEFAULT NULL,
  `dai` float DEFAULT NULL,
  `rong` float DEFAULT NULL,
  `day` float DEFAULT NULL,
  `ngayramat` date DEFAULT NULL,
  `nang` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_so`
--

INSERT INTO `thong_so` (`id_ts`, `id_ddt`, `congnghemanhinh`, `dophangiai`, `kichthuocmanhinh`, `camsau`, `camtruoc`, `hedieuhanh`, `cpu`, `tocdocpu`, `gpu`, `ram`, `rom`, `congsac`, `congtainghe`, `loaipin`, `dungluongpin`, `congsuatsac`, `dai`, `rong`, `day`, `ngayramat`, `nang`) VALUES
(1, 32, 'AMOLED', 'Full HD+ (1080 x 2400 Pixels)', 6.67, '108-8-5', '16', 'Android 11', ' MediaTek Dimensity 1200 8 nhân', '1 nhân 3 GHz, 3 nhân 2.6 GHz & 4 nhân 2 GHz', 'Mali-G77 MC9', 8, 128, 'Type-C', 'Type-C', 'Li-Po', 5000, 67, 164.1, 76.9, 8.8, '2021-10-01', 203),
(2, 1, ' IPS LCD', '828 x 1792 Pixels', 6.1, '12-12', '12', 'IOS 15', ' Apple A13 Bionic 6 nhân', '2 nhân 2.65 GHz & 4 nhân 1.8 GHz', 'Apple GPU 4 nhân', 4, 64, 'Lightning', 'Lightning', ' Li-Ion', 3110, 18, 150.9, 75.7, 8.3, '2019-11-01', 194),
(3, 2, 'OLED', '1284 x 2778 Pixels', 6.7, '12-12-12', '12', 'IOS 15', 'Apple A15 Bionic 6 nhân', '3.22 GHz', ' Apple GPU 5 nhân', 6, 128, 'Lightning', 'Lightning', ' Li-Ion', 4352, 20, 160.8, 78.1, 7.65, '2021-09-01', 240),
(4, 3, 'OLED', '1170 x 2532 Pixels', 6.1, '12-12-12', '12', 'IOS 15', 'Apple A14 Bionic 6 nhân', '2 nhân 3.1 GHz & 4 nhân 1.8 GHz', 'Apple GPU 4 nhân', 6, 128, 'Lightning', 'Lightning', ' Li-Ion', 2815, 20, 146.7, 71.5, 7.4, '2020-10-01', 189),
(5, 4, 'OLED', '1170 x 2532 Pixels', 6.1, '12-12', '12', 'IOS 15', 'Apple A15 Bionic 6 nhân', '3.22 GHz', 'Apple GPU 4 nhân', 4, 128, 'Lightning', 'Lightning', ' Li-Ion', 3240, 20, 146.7, 71.5, 7.65, '2021-09-01', 174),
(6, 5, ' IPS LCD', 'HD (750 x 1334 Pixels)', 4.7, '12', '7', 'IOS 15', 'Apple A15 Bionic 6 nhân', 'Đang cập nhật', 'Đang cập nhật', 3, 64, 'Lightning', 'Không có', ' Li-Ion', 2130, 20, 138.4, 67.3, 7.3, '2022-03-01', 144),
(7, 6, ' IPS LCD', 'HD+ (720 x 1600 Pixels)', 6.5, '8', '5', 'Android 10', 'Spreadtrum SC9832E 4 nhân', '1.4 GHz', 'Mali-T820 MP1', 3, 32, 'Micro USB', '3.5 mm', ' Li-Ion', 4000, 5, 166, 75.9, 8.55, '2021-10-01', 179),
(8, 7, ' IPS LCD', 'HD+ (720 x 1560 Pixels)', 6.1, '5', '5', 'Android 10', 'Spreadtrum SC9832E 4 nhân', '1.4 GHz', 'Mali-T820 MP1', 2, 32, 'Micro USB', '3.5 mm', ' Li-Ion', 3000, 5, 156, 77.8, 9.46, '2021-10-01', 178),
(9, 8, 'TFT LCD', '176 x 220 Pixels', 2, '0', '0', 'Không có', 'Unisoc UIS8910', 'Không có', 'Không có', 0.016, 0, 'Type-C', 'Không có', ' Li-Ion', 2000, 2, 125.9, 57.1, 15.3, '2021-12-01', 146.2),
(10, 9, 'TFT LCD', '128 x 160 Pixels', 1.77, '0.08', '0', 'Không có', 'T107', 'Không có', 'Không có', 0.048, 0, 'Micro USB', '3.5 mm', ' Li-Ion', 1400, 2, 118.3, 54.5, 15.3, '2022-03-01', 124),
(11, 12, 'TFT LCD', 'QVGA (240 x 320 Pixels)', 2.4, '0.8', '0', 'Không có', 'Không có', 'Không có', 'Không có', 0, 0, 'Micro USB', '3.5 mm', ' Li-Ion', 1000, 2, 123, 56, 12.95, '2021-04-01', 182),
(12, 13, 'TFT LCD', 'QVGA (240 x 320 Pixels)', 2.4, '0.08', '0', 'Không có', 'Không rõ', 'Không có', 'Không có', 0, 0, 'Micro USB', 'Micro USB', ' Li-Ion', 5000, 2, 135, 64, 28.5, '2017-08-01', 166),
(13, 14, 'TFT LCD', 'HD+ (720 x 1600 Pixels)', 6.5, '13-2-2', '8', 'Android 11', 'MediaTek Helio G25 8 nhân', '8 nhân 2.0 GHz', 'IMG PowerVR GE8320', 4, 64, 'Type-C', '3.5 mm', ' Li-Ion', 5050, 10, 164.9, 76, 9.2, '2021-12-01', 194),
(14, 15, ' IPS LCD', 'HD+ (720 x 1600 Pixels)', 6.82, '13-2', '5', 'Android 11', 'Spreadtrum SC9863A 8 nhân', '4 nhân 1.6 GHz & 4 nhân 1.2 GHz', 'IMG PowerVR GE8322', 3, 32, 'Micro USB', '3.5 mm', 'Li-Po', 6000, 10, 177.7, 79.1, 9.9, '2021-08-01', 237),
(16, 17, 'AMOLED', 'Full HD+ (1080 x 2400 Pixels)', 6.43, '64-8-2', '32', 'Android 11', 'MediaTek Dimensity 900 5G', '2 nhân 2.4 GHz & 6 nhân 2 GHz', ' Mali-G68 MC4', 8, 128, 'Type-C', 'Type-C', ' Li-Ion', 4300, 65, 156.8, 72.1, 7.59, '2021-07-01', 182),
(17, 18, 'AMOLED', 'Full HD+ (1080 x 2400 Pixels)', 6.5, '48-8-2-2', '32', 'Android 10', 'Snapdragon 720G 8 nhân', '2 nhân 2.3 GHz & 6 nhân 1.8 GHz', 'Adreno 618', 8, 256, 'Type-C', '3.5 mm', 'Li-Po', 4000, 65, 159.6, 72.5, 7.6, '2020-07-01', 161),
(18, 19, 'AMOLED', 'Full HD+ (1080 x 2400 Pixels)', 6.43, '64-8-2-2', '32', 'Android 11', 'Snapdragon 765G 8 nhân', '1 nhân 2.4 GHz, 1 nhân 2.2 GHz & 6 nhân 1.8 GHz', ' Adreno 620', 8, 128, 'Type-C', '3.5 mm', 'Li-Po', 4300, 65, 159.1, 73.4, 7.7, '2021-02-01', 180),
(19, 21, ' IPS LCD', 'HD+ (720 x 1600 Pixels)', 6.52, '13', '5', 'Android 11', 'MediaTek Helio G35 8 nhân', '4 nhân 2.3 GHz & 4 nhân 1.8 GHz', 'IMG PowerVR GE8320', 3, 32, 'Micro USB', '3.5 mm', 'Li-Po', 4230, 10, 164, 75.4, 7.85, '2021-11-01', 175),
(20, 20, ' IPS LCD', 'HD+ (700 x 1600 Pixels)', 6.5, '50-2-2', '16', 'Android 11', 'MediaTek Helio G35 8 nhân', '4 nhân 2.3 GHz & 4 nhân 1.8 GHz', 'IMG PowerVR GE8320', 4, 64, 'Type-C', '3.5 mm', 'Li-Po', 5000, 18, 163.6, 75.7, 8.4, '2021-10-01', 193),
(21, 22, ' IPS LCD', '1080 x 2412 Pixels', 6.6, '50-2-2', '16', 'Android 11', ' Snapdragon 680 8 nhân', '2.4 GHz', 'Adreno 610', 6, 128, 'Type-C', '3.5 mm', 'Li-Po', 5000, 33, 164.4, 75.7, 8.4, '2022-01-01', 190),
(22, 24, ' IPS LCD', 'HD+ (720 x 1600 Pixels)', 6.5, '50-2-2', '8', 'Android 11', 'Unisoc T618 8 nhân', '2.0 GHz', ' Mali-G52', 4, 64, 'Micro USB', '3.5 mm', 'Li-Po', 5000, 18, 164.5, 76, 9.1, '2021-11-01', 200),
(23, 23, ' IPS LCD', 'HD+ (720 x 1600 Pixels)', 6.5, '13-2-2', '5', 'Android 11', 'Spreadtrum T610 8 nhân', '1.8 GHz', 'Mali-G52', 3, 32, 'Micro USB', '3.5 mm', 'Li-Po', 5000, 10, 164.5, 76, 9.1, '2021-06-01', 194),
(24, 25, 'Dynamic AMOLED 2X', '2K+ (1440 x 3088 Pixels)', 6.8, '108-12-10-10', '40', 'Android 12', 'Snapdragon 8 Gen 1 8 nhân', '1 nhân 3 GHz, 3 nhân 2.5 GHz & 4 nhân 1.79 GHz', 'Adreno 730', 8, 128, 'Type-C', 'Type-C', ' Li-Ion', 5000, 45, 163.3, 77.9, 8.9, '2022-02-01', 228),
(25, 26, 'Super AMOLED', 'Full HD+ (1080 x 2400 Pixels)', 6.4, '64-8-5-5', '20', 'Android 11', 'MediaTek Helio G80 8 nhân', '2 nhân 2.0 GHz & 6 nhân 1.8 GHz', 'Mali-G52 MC2', 6, 128, 'Type-C', '3.5 mm', ' Li-Ion', 5000, 15, 158.9, 73.6, 8.4, '2021-03-01', 184),
(26, 27, 'PLS LCD', 'HD+ (720 x 1600 Pixels)', 6.5, '13-2-2', '5', 'Android 11', 'MediaTek MT6765 8 nhân', '4 nhân 2.3 GHz & 4 nhân 1.8 GHz', 'IMG PowerVR GE8320', 4, 64, 'Type-C', '3.5 mm', 'Li-Po', 5000, 8, 164.2, 75.9, 9.1, '2021-08-01', 196),
(27, 28, 'AMOLED', 'Full HD+ (1080 x 2400 Pixels)', 6.44, '64-8-2', '50', 'Android 11', 'MediaTek Helio G96 8 nhân', '2 nhân 2.05 GHz & 6 nhân 2.0 GHz', ' Mali-G57 MC2', 8, 128, 'Type-C', 'Type-C', 'Li-Po', 4050, 44, 160.87, 74.28, 7.41, '2021-11-01', 172),
(28, 29, 'AMOLED', 'Full HD+ (1080 x 2376 Pixels)', 6.56, '50-12-12-8', '32', 'Android 11', 'MediaTek Dimensity 1200 8 nhân', '1 nhân 3 GHz, 3 nhân 2.6 GHz & 4 nhân 2 GHz', ' Mali-G77 MP9', 12, 256, 'Type-C', 'Type-C', 'Li-Po', 4450, 44, 158.3, 73.2, 8.1, '2021-09-01', 184),
(29, 30, ' IPS LCD', 'Full HD+ (1080 x 2408 Pixels)', 6.58, '50-2-2', '16', 'Android 11', ' MediaTek Helio G80 8 nhân', '2 nhân 2.0 GHz & 6 nhân 1.8 GHz', 'Mali-G52 MC2', 8, 128, 'Type-C', '3.5 mm', 'Li-Po', 5000, 18, 164.26, 76.08, 8, '2021-12-01', 182),
(30, 31, ' IPS LCD', 'HD+ (720 x 1600 Pixels)', 6.51, '50-2-2', '8', 'Android 11', 'MediaTek Helio G80 8 nhân', '2.0 GHz', 'Mali-G52', 4, 128, 'Type-C', '3.5 mm', 'Li-Po', 5000, 18, 164.26, 76.08, 8, '2021-09-01', 182),
(31, 33, ' IPS LCD', 'HD+ (720 x 1600 Pixels)', 6.53, '13-2-2', '5', 'Android 10', 'MediaTek Helio G35 8 nhân', '4 nhân 2.3 GHz & 4 nhân 1.8 GHz', 'IMG PowerVR GE8320', 3, 64, 'Micro USB', '3.5 mm', ' Li-Ion', 5000, 10, 164.9, 77.07, 9, '2020-07-01', 196),
(32, 16, 'AMOLED', 'Full HD+', 6.43, '64-8-2', '32', 'Android 12', 'Snapdragon 778G', 'Đang cập nhật', 'Đang cập nhật', 8, 128, 'Type-C', 'Type-C', ' Li-Ion', 4500, 60, 164.9, 76, 7.65, '2022-03-01', 184),
(33, 34, 'AMOLED', 'Full HD+ (1080 x 2400 Pixels)', 6.55, '64-8-5', '16', 'Android 11', 'Snapdragon 732G 8 nhân', '2 nhân 2.3 GHz & 6 nhân 1.8 GHz', 'Adreno 618', 8, 128, 'Type-C', 'Type-C', 'Li-Po', 4250, 33, 160.53, 75.72, 6.81, '2021-04-01', 157);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `id_th` int(11) NOT NULL,
  `ten_th` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `anh` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`id_th`, `ten_th`, `anh`) VALUES
(1, 'IPhone', '1.png'),
(2, 'Itel', 'itel.jpg'),
(3, 'Masstel', 'masstel.png'),
(4, 'Mobell', 'mobell.jpg'),
(5, 'Nokia', 'nokia.jpg'),
(6, 'Oppo', 'oppo.jpg'),
(7, 'Realme', 'realme.png'),
(8, 'Samsung', 'samsung.png'),
(9, 'Vivo', 'vivo.jpg'),
(10, 'Xiaomi', 'xiaomi.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `id_ddt` (`id_ddt`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ddt` (`id_ddt`),
  ADD KEY `id_dh` (`id_dh`),
  ADD KEY `id_gh` (`id_gh`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id_dg`),
  ADD KEY `id_ddt` (`id_ddt`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD PRIMARY KEY (`id_dc`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `dong_dienthoai`
--
ALTER TABLE `dong_dienthoai`
  ADD PRIMARY KEY (`id_ddt`),
  ADD KEY `dong_dienthoai_ibfk_2` (`id_km`),
  ADD KEY `id_th` (`id_th`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_dh`),
  ADD KEY `fk_kh` (`id_kh`),
  ADD KEY `fk_dc` (`id_dc`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_gh`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `id_dh` (`id_dh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_kh`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`id_km`);

--
-- Chỉ mục cho bảng `mau_sac`
--
ALTER TABLE `mau_sac`
  ADD PRIMARY KEY (`id_ms`);

--
-- Chỉ mục cho bảng `so_luong`
--
ALTER TABLE `so_luong`
  ADD PRIMARY KEY (`id_ms`,`id_ddt`),
  ADD KEY `id_ddt` (`id_ddt`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Chỉ mục cho bảng `thong_so`
--
ALTER TABLE `thong_so`
  ADD PRIMARY KEY (`id_ts`),
  ADD KEY `id_ddt` (`id_ddt`);

--
-- Chỉ mục cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`id_th`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id_dg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  MODIFY `id_dc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dong_dienthoai`
--
ALTER TABLE `dong_dienthoai`
  MODIFY `id_ddt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id_gh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  MODIFY `id_km` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `mau_sac`
--
ALTER TABLE `mau_sac`
  MODIFY `id_ms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `thong_so`
--
ALTER TABLE `thong_so`
  MODIFY `id_ts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `id_th` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_ddt`) REFERENCES `dong_dienthoai` (`id_ddt`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`);

--
-- Các ràng buộc cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_1` FOREIGN KEY (`id_ddt`) REFERENCES `dong_dienthoai` (`id_ddt`),
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_3` FOREIGN KEY (`id_gh`) REFERENCES `gio_hang` (`id_gh`);

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`),
  ADD CONSTRAINT `danh_gia_ibfk_2` FOREIGN KEY (`id_ddt`) REFERENCES `dong_dienthoai` (`id_ddt`),
  ADD CONSTRAINT `danh_gia_ibfk_3` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`);

--
-- Các ràng buộc cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD CONSTRAINT `dia_chi_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `dong_dienthoai`
--
ALTER TABLE `dong_dienthoai`
  ADD CONSTRAINT `dong_dienthoai_ibfk_2` FOREIGN KEY (`id_km`) REFERENCES `khuyen_mai` (`id_km`) ON DELETE SET NULL,
  ADD CONSTRAINT `dong_dienthoai_ibfk_3` FOREIGN KEY (`id_th`) REFERENCES `thuong_hieu` (`id_th`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_dc`) REFERENCES `dia_chi` (`id_dc`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`id_dh`) REFERENCES `don_hang` (`id_dh`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `tai_khoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `so_luong`
--
ALTER TABLE `so_luong`
  ADD CONSTRAINT `so_luong_ibfk_1` FOREIGN KEY (`id_ddt`) REFERENCES `dong_dienthoai` (`id_ddt`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `so_luong_ibfk_2` FOREIGN KEY (`id_ms`) REFERENCES `mau_sac` (`id_ms`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `thong_so`
--
ALTER TABLE `thong_so`
  ADD CONSTRAINT `thong_so_ibfk_1` FOREIGN KEY (`id_ddt`) REFERENCES `dong_dienthoai` (`id_ddt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
