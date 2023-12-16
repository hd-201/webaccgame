-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2023 lúc 06:01 AM
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
-- Cơ sở dữ liệu: `web_accgame`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accessories`
--

CREATE TABLE `accessories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accessories`
--

INSERT INTO `accessories` (`id`, `title`, `status`, `category_id`) VALUES
(24, 'Đăng ký', 1, 22),
(25, 'Hành Tinh', 1, 22),
(26, 'Server', 1, 22),
(27, 'Bông Tai', 1, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `description`, `image`, `content`, `status`, `type`) VALUES
(7, 'Blog 3', 'blog-3', '<p>ădfas</p>', 'danhmuc98.gif', '<p>&agrave;dasdfas</p>', 1, 'blogs'),
(8, 'Cách nạp quân huy', 'cach-nap-quan-huy', '<p><em><strong>Nạp qu&acirc;n huy trực tiếp</strong></em></p>', 'dich-vu-nap-quan-huy-lien-quan10.gif', '<p><em><strong>Nạp qu&acirc;n huy trực tiếp</strong></em> đang trở th&agrave;nh một dịch vụ phổ biến v&agrave; được ưa chuộng đ&aacute;ng kể trong ng&agrave;nh c&ocirc;ng nghiệp game online hiện nay. Đặc biệt, nhu cầu n&agrave;y đang gia tăng mạnh mẽ trong cộng đồng c&aacute;c game thủ. Bạn đang cần <em><strong>nạp qu&acirc;n huy cho tựa game Li&ecirc;n Qu&acirc;n</strong></em>? H&atilde;y tin tưởng v&agrave; chọn lựa địa chỉ ch&iacute;nh x&aacute;c m&agrave; bạn đ&atilde; t&igrave;m kiếm!</p>', 1, 'instruct'),
(9, 'Cách chơi liên quân', 'cach-choi-lien-quan', '<p>Thắng bại tại kỹ năng</p>', 'dich-vu-nap-quan-huy-lien-quan73.gif', '<p>Thắng bại tại kỹ năng</p>', 1, 'blogs');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `order_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `image`, `status`, `order_category`) VALUES
(12, 'PUBG', 'pubg', 'PUBG', 'pugb43.gif', 1, NULL),
(14, 'Ngọc rồng online', 'ngoc-rong', 'Ngọc rồng online', 'nro20.gif', 1, NULL),
(15, 'Fifa online 4', 'fifa-online', 'Fifa online 4', 'ff435.gif', 1, NULL),
(16, 'Đột kích', 'dot-kich', 'Đột kích', 'cf95.gif', 1, NULL),
(17, 'Liên minh huyền thoại', 'lien-minh', 'Liên minh huyền thoại', 'lol62.gif', 1, NULL),
(18, 'Fire Fire', 'fire-fire', 'Free Fire', 'ff6.gif', 1, NULL),
(19, 'Nick liên quânnn', 'nick-lien-quannn', 'Nick liên quân giá rẻ', 'lq62.gif', 1, NULL),
(20, 'Nick tốc chiến', 'nick-toc-chien', 'Nick tốc chiến giá rẻ', 'BAN-NICK-LIEN-MINH-TOC-CHIEN75.gif', 1, NULL),
(21, 'Nick ninja school', 'nick-ninja-school', 'Nick ninja school giá rẻ', 'BAN-NICK-NINJA-SCHOOL-ONLINE99.gif', 1, NULL),
(22, 'Nick ngọc rồng blue', 'nick-ngoc-rong-blue', 'Nick ngọc rồng blue giá rẻ', 'BAN-NICK-NGOC-RONG-BLUE20.gif', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `nick_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `title`, `nick_id`) VALUES
(17, '438.jpg', 'Nick 2', 6),
(18, '521.jpg', 'Nick 2', 6),
(19, '161.jpg', 'Nick 2', 6),
(20, '245.jpg', 'Nick 2', 6),
(21, '183.jpg', 'NIck 1', 5),
(22, '286.jpg', 'NIck 1', 5),
(23, '385.jpg', 'NIck 1', 5),
(24, '170.jpg', 'Ngọc dồng', 8),
(25, '214.jpg', 'Ngọc dồng', 8),
(26, '378.jpg', 'Ngọc dồng', 8),
(27, '3RcdbTs582_165018870668.jpg', 'Ngọc dồng', 8),
(28, '495.jpg', 'Ngọc dồng', 8),
(29, '555.jpg', 'Ngọc dồng', 8),
(30, '189.jpg', 'Liên quân', 9),
(31, '263.jpg', 'Liên quân', 9),
(32, '381.jpg', 'Liên quân', 9),
(33, '448.jpg', 'nogjco rồng', 10),
(34, '585.jpg', 'nogjco rồng', 10),
(35, '651f821e108cf68.jpg', 'NROB  1', 11),
(36, '64e2331be1aee60.jpg', 'Nick nro blue 2', 12),
(37, 'thumb72.jpg', 'Nick 3', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nicks`
--

CREATE TABLE `nicks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `attribute` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nicks`
--

INSERT INTO `nicks` (`id`, `title`, `attribute`, `category_id`, `price`, `status`, `description`, `image`, `code`) VALUES
(11, 'NROB  1', '[\"Đăng ký:Ảo\",\"Hành Tinh:Trái đất\",\"Server:1\",\"Bông Tai:Có\"]', 22, '1300000', 1, 'NROB  1', 'thumb (1)30.jpg', 244214),
(12, 'Nick nro blue 2', '[\"Đăng ký:Ảo\",\"Hành Tinh:Xayda\",\"Server:1\",\"Bông Tai:Không\"]', 22, '45000', 1, 'Nick nro blue 2', 'thumb (1)25.jpg', 207648),
(13, 'Nick 3', '[\"Đăng ký: Ảo\",\"Hành Tinh: Namec\",\"Server: 2\",\"Bông Tai: Có\"]', 22, '1600000', 1, 'Nick 3', 'thumb13.jpg', 708350);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$2/1uH.HG8ngUABwXb6ZO6OM3u28Um00PD3XFjmwLTQwIFJiiHEP8m', '2023-10-31 00:44:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id`, `title`, `slug`, `description`, `image`, `status`) VALUES
(1, 'Mua ngọc nro', 'mua-ngoc-nro', 'Mua ngọc nro', 'DICH-VU-BAN-HONG-NGOC28.gif', 1),
(2, 'Nạp kim cương free fire', 'nap-kim-cuong-free-fire', 'Nạp kim cương free fire', 'DICH-VU-NAP-KIM-CUONG-FREE-FIRE61.gif', 1),
(3, 'Bán robux chính hãng', 'ban-robux-chinh-hang', 'Bán robux chính hãng', 'DICH-VU-BAN-ROBUX-CHINH-HANG46.gif', 1),
(4, 'Nạp quân huy liên quân', 'nap-quan-huy-lien-quan', 'nạp quân huy liên quân', 'DICH-VU-NAP-QUAN-HUY13.gif', 1),
(5, 'Nạp uc PUBG', 'nap-uc-pubg', 'nạp uc PUBG', 'DICH-VU-NAP-UC-PUBG-MOBILE14.gif', 1),
(6, 'Mua vàng nro', 'mua-vang-nro', 'mua vàng nro', 'DICH-VU-BAN-VANG-TU-DONG17.gif', 1),
(7, 'Mua xu ninja school', 'mua-xu-ninja-school', 'mua xu ninja school', 'DICH-VU-BAN-XU-NINJA-SCHOOL86.gif', 1),
(8, 'Vòng quay liên quân', 'vong-quay-lien-quan', 'Vòng quay liên quân giá rẻ', 'vongquaylq4.gif', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `image`, `status`) VALUES
(4, 'Slider 2', 'adsf', 'slide56.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `surplus` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `surplus`, `remember_token`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Dương', 'admin@gmail.com', NULL, '$2y$10$U6We9.TQqTAaWhd.sWtvFevqNrRIFSstirxjFf88iBJRW5R2uUWLa', 10000, 'KqjvoZsRFgUqe3NcSVASkinsM6n7ZNGMvjTD7WKMmgp6Er152KXl6WSQouPB', 1, '2023-10-10 19:01:35', '2023-10-10 19:01:35'),
(2, 'Hoàng Dương', 'admin1@gmail.com', NULL, '$2y$10$GDnHCz0/ldTh0djxpXrwA.ousjo8j0b8HkR30JKSRY0ejt.p8SZEi', 0, NULL, 1, '2023-11-08 01:23:08', '2023-11-08 01:23:08'),
(3, 'Hoàng Dương', 'user@gmail.com', NULL, '$2y$10$SkgNj/bWfmgDzXxdjqA8h.SONF4ldZEYvXNB2fNUL2GSMj2IaGDzm', 0, NULL, 2, '2023-11-08 01:50:18', '2023-11-08 01:50:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `link`, `image`, `status`, `slug`) VALUES
(2, 'Highlight Liên Quân', 'Tổng Hợp Những Pha Highlight Hay Nhất Liên Quân', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/lFPKZJiWIw0?si=bNGCe2F9MWsZ6WVZ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '454.jpg', 1, 'highlight-lien-quan'),
(4, 'Nhạc đánh liên quân', 'Nhạc đánh game', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/XSqnRJNdI6c?si=i098e5-wB8q8dYyK\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '113.jpg', 1, 'nhac-danh-lien-quan');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nicks`
--
ALTER TABLE `nicks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nicks`
--
ALTER TABLE `nicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
