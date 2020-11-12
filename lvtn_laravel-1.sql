-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2020 lúc 04:45 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lvtn_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `ma_bl` int(10) UNSIGNED NOT NULL,
  `chitiet_bl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bl` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ma_sp` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_dh`
--

CREATE TABLE `chitiet_dh` (
  `ma_chitiet` int(10) UNSIGNED NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_tien` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `ma_sp` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `ma_dg` int(10) UNSIGNED NOT NULL,
  `chitiet_dg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_sp` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ma_danhmuc` int(10) UNSIGNED NOT NULL,
  `ten_danhmuc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai_danhmuc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ma_danhmuc`, `ten_danhmuc`, `trangthai_danhmuc`, `created_at`, `updated_at`) VALUES
(1, 'Giày', '1', '2020-11-11 02:17:55', '2020-11-11 02:17:55'),
(3, 'Phụ kiện', '1', '2020-11-11 02:53:43', '2020-11-11 03:17:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongsanpham`
--

CREATE TABLE `dongsanpham` (
  `ma_dongsp` int(10) UNSIGNED NOT NULL,
  `ten_dongsp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai_dongsp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dongsanpham`
--

INSERT INTO `dongsanpham` (`ma_dongsp`, `ten_dongsp`, `trangthai_dongsp`, `created_at`, `updated_at`) VALUES
(1, 'Nike', '1', '2020-11-11 07:19:26', '2020-11-11 07:19:26'),
(2, 'Adidas', '1', '2020-11-11 07:25:05', '2020-11-11 07:25:05'),
(7, 'Vans', '1', '2020-11-11 23:35:02', '2020-11-11 23:35:02'),
(8, 'Converse', '1', '2020-11-12 07:04:57', '2020-11-12 07:04:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `ma_dh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydathang` date NOT NULL,
  `ten_kh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_tt` int(11) NOT NULL,
  `ma_vanchuyen` int(11) NOT NULL,
  `phivanchuyen` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `sdt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai_dh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `ma_km` int(11) NOT NULL,
  `hansudung` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_10_085638_create_danhmuc_table', 1),
(5, '2020_11_10_085754_create_dongsanpham_table', 1),
(6, '2020_11_10_085904_create_nhacungcap_table', 1),
(7, '2020_11_10_090046_create_sanpham_table', 1),
(8, '2020_11_10_092153_rename_sanpham_column', 1),
(9, '2020_11_10_092549_create_sanpham_hinhanh_table', 1),
(10, '2020_11_10_092606_create_sanpham_size_table', 1),
(11, '2020_11_10_092621_create_sanpham_mau_table', 1),
(12, '2020_11_10_095654_rename_users_column', 1),
(13, '2020_11_10_101901_update_sanpham_table', 1),
(14, '2020_11_10_103356_drop_binhluan_table', 1),
(15, '2020_11_10_104045_change_users_column', 1),
(16, '2020_11_10_105640_drop_donhang_table', 2),
(17, '2020_11_10_105746_create_donhang_table', 3),
(18, '2020_11_10_112536_create_donnhang_table', 4),
(19, '2020_11_10_113320_create_chitiet_dh_table', 5),
(20, '2020_11_10_113825_create_khuyenmai_table', 6),
(21, '2020_11_10_113848_create_binhluan_table', 6),
(22, '2020_11_10_113912_create_danhgia_table', 6),
(23, '2020_11_10_114210_drop_danhgia_table', 7),
(24, '2020_11_10_114235_drop_binhluan_table', 7),
(25, '2020_11_10_114331_create_binhluan_table', 8),
(26, '2020_11_10_114344_create_danhgia_table', 8),
(27, '2020_11_10_122146_rename_sanpham_mau_column', 9),
(28, '2020_11_11_173236_update_sanpham_column', 10),
(29, '2020_11_12_061412_drop_sanpham_hinhanh_column', 11),
(30, '2020_11_12_061633_update_sanpham_hinhanh_column', 12),
(31, '2020_11_12_062050_drop_sanpham_hinhanh_table', 13),
(32, '2020_11_12_062137_add_sanpham_hinhanh_column', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `ma_ncc` int(10) UNSIGNED NOT NULL,
  `ten_ncc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`ma_ncc`, `ten_ncc`, `diachi`, `sdt`, `created_at`, `updated_at`) VALUES
(1, 'Nike Diamond Plaza', 'Tầng 3, Diamond Plaza, 34 Lê Duẩn, Q.1, TP. HCM', '(028) 3829 5454', '2020-11-11 08:15:10', '2020-11-12 06:58:26'),
(2, 'adidas Originals Store HCM Bitexco', '2 Hai Trieu, Ho Chi Minh City, Việt Nam', '+848439156073', '2020-11-11 08:22:22', '2020-11-12 06:53:21'),
(4, 'Drake Vietnam', '879 Nguyễn Kiệm, Phường 3, Quận Gò Vấp, TP.HCM', '02822286666', '2020-11-11 23:38:05', '2020-11-12 07:02:26'),
(5, 'Converse Ba Tháng Hai', '122 Đường 3/2, P.12, Quận 10, TP.HCM', '02838621970', '2020-11-12 07:04:36', '2020-11-12 07:04:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ma_sp` int(10) UNSIGNED NOT NULL,
  `ten_sp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai_sp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_danhmuc` int(10) UNSIGNED NOT NULL,
  `ma_dongsp` int(10) UNSIGNED NOT NULL,
  `ma_ncc` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ma_sp`, `ten_sp`, `gia`, `sale`, `hinhanh`, `mota`, `trangthai_sp`, `checkcode`, `ma_danhmuc`, `ma_dongsp`, `ma_ncc`, `created_at`, `updated_at`) VALUES
(3, 'Nike Air Force 1 \'07 LV8', 3300000, 3300000, 'CT2300_100.png.png', 'Nike Air Force 1 \'07 LV8 kết hợp các tính năng hiệu suất lấy cảm hứng từ vòng cổ tương tự của \'82 OG trong khi nó được cập nhật các chi tiết đã được sử dụng trong các kho lưu trữ trước đây của chúng tôi.', '1', 'CT2300 100', 1, 1, 1, '2020-11-12 07:39:01', '2020-11-12 07:39:01'),
(4, 'Air Max 97 Golf NRG \'Lucky and Good\'', 5400000, 5400000, 'CJ0563_200.png.png', 'Hãy giữ vận may cho bạn với Giày Golf Nike Air Max 97 G NRG . Được tạo kiểu bằng vải nhung có rãnh, phiên bản giới hạn của NRG ghi nhận những thăng trầm mà bạn phải đối mặt trong suốt một vòng chơi gôn.', '1', 'CJ0563-200', 1, 1, 1, '2020-11-12 07:47:45', '2020-11-12 07:47:45'),
(5, 'Air Max 97 \'Green Abyss Illusion Green\'', 3200000, 3200000, 'CZ7868_300.png.png', 'Với một Bộ phận Air Max có chiều dài đầy đủ, Air Max 97 là một trong những hình bóng cổ điển nhất của Nike. Lớp lưới thoáng khí phía trên thể hiện thiết kế tinh giản đặc trưng trong khi ngồi trên đệm siêu nhẹ của bộ phận không khí.', '1', 'CZ7868-300', 1, 1, 1, '2020-11-12 07:52:25', '2020-11-12 07:52:25'),
(6, 'Stan Smith Green', 1600000, 1600000, 'stan-smith-M20324-01-100x100.jpg', 'The Stan Smith là dòng sản phẩm giày quần vợt cổ điển cho nữ, lần đầu tiên xuất hiện vào năm 1971 và đã trở thành một biểu tượng thời trang và nhìn thấy từ sân tennis đến văn phòng trên toàn thế giới.', '1', 'M20324', 1, 2, 2, '2020-11-12 08:15:12', '2020-11-12 08:15:12'),
(7, 'SUPERSTAR', 2400000, 2400000, 'Giay_Superstar_trang_EG4958_01_standard.jpg', 'Thiết kế ban đầu dành cho sân bóng rổ vào thập niên 70. Được các ngôi sao hip hop tôn sùng vào thập niên 80. Đôi giày adidas Superstar giờ đây đã trở thành biểu tượng của các tín đồ thời trang đường phố.', '1', 'EG4958', 1, 2, 2, '2020-11-12 08:17:50', '2020-11-12 08:17:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_hinhanh`
--

CREATE TABLE `sanpham_hinhanh` (
  `ma_hinhanh` int(10) UNSIGNED NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai_hinhanh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_sp` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_mau`
--

CREATE TABLE `sanpham_mau` (
  `ma_mau` int(10) UNSIGNED NOT NULL,
  `mau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai_mau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_sp` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_size`
--

CREATE TABLE `sanpham_size` (
  `ma_size` int(10) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `trangthai_size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_sp` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `binhluan_user_id_foreign` (`user_id`),
  ADD KEY `binhluan_ma_sp_foreign` (`ma_sp`);

--
-- Chỉ mục cho bảng `chitiet_dh`
--
ALTER TABLE `chitiet_dh`
  ADD PRIMARY KEY (`ma_chitiet`),
  ADD KEY `chitiet_dh_donhang_id_foreign` (`donhang_id`),
  ADD KEY `chitiet_dh_ma_sp_foreign` (`ma_sp`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`ma_dg`),
  ADD KEY `danhgia_ma_sp_foreign` (`ma_sp`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ma_danhmuc`);

--
-- Chỉ mục cho bảng `dongsanpham`
--
ALTER TABLE `dongsanpham`
  ADD PRIMARY KEY (`ma_dongsp`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`donhang_id`),
  ADD KEY `donhang_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD KEY `khuyenmai_donhang_id_foreign` (`donhang_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ma_ncc`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `sanpham_ma_danhmuc_foreign` (`ma_danhmuc`),
  ADD KEY `sanpham_ma_dongsp_foreign` (`ma_dongsp`),
  ADD KEY `sanpham_ma_ncc_foreign` (`ma_ncc`);

--
-- Chỉ mục cho bảng `sanpham_hinhanh`
--
ALTER TABLE `sanpham_hinhanh`
  ADD PRIMARY KEY (`ma_hinhanh`),
  ADD KEY `sanpham_hinhanh_ma_sp_foreign` (`ma_sp`);

--
-- Chỉ mục cho bảng `sanpham_mau`
--
ALTER TABLE `sanpham_mau`
  ADD PRIMARY KEY (`ma_mau`),
  ADD KEY `sanpham_mau_ma_sp_foreign` (`ma_sp`);

--
-- Chỉ mục cho bảng `sanpham_size`
--
ALTER TABLE `sanpham_size`
  ADD PRIMARY KEY (`ma_size`),
  ADD KEY `sanpham_size_ma_sp_foreign` (`ma_sp`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ma_bl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitiet_dh`
--
ALTER TABLE `chitiet_dh`
  MODIFY `ma_chitiet` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `ma_dg` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ma_danhmuc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dongsanpham`
--
ALTER TABLE `dongsanpham`
  MODIFY `ma_dongsp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `donhang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `ma_ncc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ma_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham_hinhanh`
--
ALTER TABLE `sanpham_hinhanh`
  MODIFY `ma_hinhanh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sanpham_mau`
--
ALTER TABLE `sanpham_mau`
  MODIFY `ma_mau` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham_size`
--
ALTER TABLE `sanpham_size`
  MODIFY `ma_size` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ma_sp_foreign` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`) ON DELETE CASCADE,
  ADD CONSTRAINT `binhluan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitiet_dh`
--
ALTER TABLE `chitiet_dh`
  ADD CONSTRAINT `chitiet_dh_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`donhang_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitiet_dh_ma_sp_foreign` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ma_sp_foreign` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `khuyenmai_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`donhang_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ma_danhmuc_foreign` FOREIGN KEY (`ma_danhmuc`) REFERENCES `danhmuc` (`ma_danhmuc`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanpham_ma_dongsp_foreign` FOREIGN KEY (`ma_dongsp`) REFERENCES `dongsanpham` (`ma_dongsp`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanpham_ma_ncc_foreign` FOREIGN KEY (`ma_ncc`) REFERENCES `nhacungcap` (`ma_ncc`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham_hinhanh`
--
ALTER TABLE `sanpham_hinhanh`
  ADD CONSTRAINT `sanpham_hinhanh_ma_sp_foreign` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham_mau`
--
ALTER TABLE `sanpham_mau`
  ADD CONSTRAINT `sanpham_mau_ma_sp_foreign` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham_size`
--
ALTER TABLE `sanpham_size`
  ADD CONSTRAINT `sanpham_size_ma_sp_foreign` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
