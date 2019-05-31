-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 09, 2019 lúc 04:30 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$eZGgpbLjqoNm8Y3O1sttk.Gx75xwZdklisqLSelUPDkMRXBFvkGVu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enroll` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`id`, `cname`, `enroll`, `createdate`, `creator`) VALUES
(1, 'database', '123', '2019-05-05 17:00:00', 1),
(2, 'CSDL', '123', '2019-05-05 17:00:00', 2),
(3, 'Math', '123', '2019-05-05 17:00:00', 1),
(4, 'Toán rời rạc', '2708', '2019-05-05 17:00:00', 2),
(5, 'Công Nghệ Web', '123', '2019-05-05 17:00:00', 1),
(6, 'Lập Trình Mạng', '123', '2019-05-05 17:00:00', 1),
(7, 'KTLT', '111', '2019-05-06 06:07:33', 1),
(8, 'Cơ sở tri thức', '123', '2019-05-09 13:00:20', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `image` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `created_at`, `uid`, `pid`, `status`, `image`) VALUES
(10, 'Tình yêu có thể biến ta thành bất cứ con người nào\r\nNếu thik người thik mik thì đó là duyên\r\n \r\nCòn nếu ko đó chính là nghiệp', '2019-04-28 06:33:27', 1, 4, 1, NULL),
(11, 'Tình yêu có thể biến ta thành bất cứ con người nào\r\nNếu thik người thik mik thì đó là duyên\r\n \r\nCòn nếu ko đó chính là nghiệp', '2019-04-28 06:33:30', 1, 4, 0, NULL),
(32, 'aturrrr', '2019-04-28 08:38:12', 1, 4, 1, NULL),
(34, 'thunder', '2019-04-28 08:43:52', 1, 4, 1, NULL),
(46, 'ofcourse', '2019-05-08 16:02:34', 1, 4, 0, NULL),
(47, 'hello world', '2019-05-02 13:47:58', 1, 4, 0, NULL),
(48, 'zzzzzzzzzzzz', '2019-05-02 13:51:10', 1, 4, 0, NULL),
(49, 'zzzzzzzzzzzzzz', '2019-05-02 13:51:15', 1, 4, 1, NULL),
(50, 'Login', '2019-05-08 16:02:00', 1, 1, 0, NULL),
(51, 'zzzzzzzzzz', '2019-05-02 15:00:30', 1, 5, 0, 'images/.png'),
(52, 'Diagram', '2019-05-08 16:02:09', 1, 7, 1, NULL),
(53, 'mmm', '2019-05-03 05:20:23', 1, 5, 0, NULL),
(54, 'ikj', '2019-05-03 05:20:57', 1, 7, 1, NULL),
(55, 'áđá', '2019-05-06 06:42:45', 1, 7, 0, NULL),
(56, 'aaaaaaaaaaaaaa', '2019-05-06 13:16:49', 1, 7, 0, NULL),
(57, 'zxd', '2019-05-06 13:18:50', 1, 7, 1, NULL),
(58, 'aaaaaaaaaaaaaaaaaaaaaaaa', '2019-05-06 13:36:34', 1, 7, 1, NULL),
(59, 'aa', '2019-05-06 13:38:43', 1, 7, 0, 'images/59.png'),
(60, 'ok', '2019-05-06 13:47:32', 1, 7, 0, 'images/60.png'),
(61, 'aaaa', '2019-05-06 13:53:52', 1, 7, 1, 'images/61.png'),
(62, 'ko có gì', '2019-05-06 14:15:41', 1, 7, 1, 'images/62.png'),
(63, 'zzzzzzzzzzzzzzzzzzzzxxxxxxxxxxxxxx', '2019-05-06 15:17:40', 1, 7, 1, NULL),
(64, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2019-05-06 15:17:50', 1, 7, 1, NULL),
(65, 'hi', '2019-05-08 16:02:18', 3, 8, 1, NULL),
(66, 'hello', '2019-05-08 16:02:25', 3, 8, 1, 'images/66.png'),
(67, 'yes or yes', '2019-05-07 13:42:02', 3, 8, 1, 'images/67.png'),
(68, 'oke', '2019-05-07 14:50:12', 3, 8, 1, 'images/68.png'),
(69, 'Teacher three', '2019-05-08 09:14:47', 1, 8, 1, 'images/69.png'),
(70, '4h16p', '2019-05-08 09:16:40', 1, 8, 1, 'images/70.png'),
(71, '4h17p', '2019-05-08 09:22:38', 1, 8, 0, 'images/71.png'),
(72, '4h19p', '2019-05-08 09:22:29', 1, 8, 0, 'images/72.png'),
(73, 'aaaaaaaaaaaaaaaaaaaaaaaa', '2019-05-08 09:23:34', 1, 8, 0, NULL),
(74, 'maybe later', '2019-05-08 09:34:46', 1, 7, 1, NULL),
(75, '4h34 D4 405', '2019-05-08 09:35:01', 1, 7, 0, NULL),
(76, 'bbbbbbbbbbbbb', '2019-05-08 16:23:59', 1, 5, 0, NULL),
(77, 'ơi', '2019-05-08 16:28:18', 1, 5, 1, NULL),
(78, 'bebe', '2019-05-08 16:28:38', 1, 5, 0, NULL),
(79, 'cali', '2019-05-08 16:30:29', 1, 5, 1, NULL),
(80, 'cali', '2019-05-08 16:30:46', 1, 5, 0, NULL),
(81, 'sao không được', '2019-05-08 16:30:59', 1, 5, 0, NULL),
(82, 'zzzzzzzzzzzzzzzzzz', '2019-05-08 16:33:45', 1, 1, 0, NULL),
(83, 'bài tập lập trình', '2019-05-08 16:37:38', 1, 5, 1, NULL),
(84, 'bài tập web', '2019-05-08 16:37:51', 1, 4, 0, NULL),
(85, 'hi', '2019-05-08 16:39:25', 2, 5, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `created_at`, `cid`, `uid`, `image`, `status`) VALUES
(1, 'convert', 'well', '2019-05-09 08:25:16', 1, 3, NULL, 0),
(2, 'Bài học đầu tiên', 'acdef', '2019-05-09 07:07:53', 1, 3, NULL, 0),
(4, 'abcde', 'Quản lý bài đăng', '2019-05-09 08:38:38', 1, 3, NULL, 0),
(5, 'Đề tài', 'gì bây giờ', '2019-05-08 16:02:58', 1, 1, NULL, 0),
(7, 'Thông báo', 'Hôm nay lớp được nghỉ', '2019-05-09 03:56:29', 2, 1, 'images/.png', 0),
(8, 'abcde', 'abcde', '2019-05-08 09:27:58', 3, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rep_cmt`
--

CREATE TABLE `rep_cmt` (
  `id` int(11) NOT NULL,
  `repid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `rep_cmt`
--

INSERT INTO `rep_cmt` (`id`, `repid`) VALUES
(10, 11),
(32, 11),
(34, 11),
(49, 48),
(52, 51),
(54, 53),
(55, 11),
(56, 50),
(57, 50),
(58, 11),
(66, 50),
(70, 50),
(74, 60),
(77, 76),
(79, 50),
(83, 48),
(85, 82);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `dob` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `address`, `dob`, `remember_token`) VALUES
(1, 'Sơn Nguyễn Bá', 'son', '$2y$10$xmByj/A8AWmdY93xDJSu2uiO/SUIjHVUBFeVSMRVbDTJ4eiOZGeAK', 'son@gmail.com', 'Đông Anh- Hà Nội', '1998-08-27', '280nk12dmPWJnv7OQz9CIjoTFX1PNadYTe0pkuxkZnLtyaZhYHm8xPW2reZd'),
(2, 'Bùi Trọng Giáp', 'duong', '$2y$10$vNVByanpf6BFAGhvohwoL.7EOjlF7BNaLxJ5EHjhKTip4oE6xoVrK', 'duong@gmail.com', 'Thanh Hóa', '1998-12-12', '41HiEiXDP1nrGa08NmincebLZwNcB5n4siwu9JJ3YoZ5d8m2rKx1WpUobkVG'),
(3, 'Khá Bảnh', 'aaa', '$2y$10$xVVhl4UtNqj92De.zKv3FOswcLMuOSohslKs5ECyifW5UjQCZN.eW', 'khabanh@gmail.com', 'Hà Nội', '1998-12-19', NULL),
(4, 'son1', 'son1', '$2y$10$0/Ek9kmL/4jV36Qd0rxKNuQKVXL5ZTZv615X8v7Zs0okk4x4BVo1a', NULL, NULL, NULL, NULL),
(5, 'Tran Dan', 'coco', '$2y$10$SH9xyGSjAgifo/uaI4yh8O4RwXOWNS/V3lqhJ1RMUtGB6cf30Otse', '12313@gmail.com', 'Đông Anh- Hà Nội', '2019-05-08', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_class`
--

CREATE TABLE `user_class` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `dop` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_class`
--

INSERT INTO `user_class` (`id`, `uid`, `cid`, `dop`, `status`) VALUES
(1, 1, 1, '2019-05-09 09:12:33', 0),
(2, 1, 2, '2019-05-09 09:12:36', 0),
(3, 1, 3, '2019-05-09 09:12:38', 0),
(4, 2, 1, '2019-05-09 09:32:25', 0),
(5, 2, 2, '2019-05-09 09:12:43', 0),
(6, 2, 3, '2019-05-09 09:12:45', 0),
(7, 3, 1, '2019-05-09 09:12:47', 0),
(8, 5, 4, '2019-05-09 09:12:49', 0),
(10, 5, 1, '2019-05-09 12:26:33', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `pid` (`pid`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cid` (`cid`);

--
-- Chỉ mục cho bảng `rep_cmt`
--
ALTER TABLE `rep_cmt`
  ADD PRIMARY KEY (`id`,`repid`),
  ADD KEY `repid` (`repid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_class`
--
ALTER TABLE `user_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user_class`
--
ALTER TABLE `user_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `post` (`id`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `class` (`id`);

--
-- Các ràng buộc cho bảng `rep_cmt`
--
ALTER TABLE `rep_cmt`
  ADD CONSTRAINT `rep_cmt_ibfk_1` FOREIGN KEY (`repid`) REFERENCES `comment` (`id`);

--
-- Các ràng buộc cho bảng `user_class`
--
ALTER TABLE `user_class`
  ADD CONSTRAINT `user_class_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `user_class_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
