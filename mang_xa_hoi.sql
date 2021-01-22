-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 05:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mang_xa_hoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `bl_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `binh_luan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_binh_luan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`bl_id`, `post_id`, `user_id`, `binh_luan`, `nguoi_binh_luan`, `thoi_gian`) VALUES
(1, 57, 5, '2', 'phat_nguyen_726467', '2020-12-06 03:51:44'),
(2, 57, 5, '4', 'phat_nguyen_726467', '2020-12-06 03:52:21'),
(3, 58, 5, 'chủ nhật ở nh&agrave; l&agrave;m b&agrave;i tập ahuhu', 'phat_nguyen_726467', '2020-12-06 03:53:36'),
(4, 59, 5, 'ờ n&oacute; l&ugrave;n thiệt =)))', 'phat_nguyen_726467', '2020-12-06 04:05:07'),
(5, 60, 5, 'vi l&ugrave;n thiệt sự lu&ocirc;n ahihi', 'phat_nguyen_726467', '2020-12-06 04:06:27'),
(6, 61, 5, 'ờ đ&uacute;ng rồi, thằng đ&oacute; ngu vcl', 'phat_nguyen_726467', '2020-12-06 04:09:37'),
(7, 61, 5, 'ngu vcl', 'phat_nguyen_726467', '2020-12-06 04:12:05'),
(8, 59, 5, 't thấy xinh vl m&agrave;', 'phat_nguyen_385275', '2020-12-06 04:26:19'),
(9, 59, 5, '3', 'phat_nguyen_726467', '2020-12-06 04:48:01'),
(10, 62, 6, '2', 'phat_nguyen_726467', '2020-12-06 04:52:48'),
(11, 62, 6, 'k', 'phat_nguyen_726467', '2020-12-06 05:02:47'),
(12, 62, 6, 'l', 'phat_nguyen_726467', '2020-12-06 05:04:04'),
(13, 62, 6, '34', 'phat_nguyen_726467', '2020-12-06 05:17:26'),
(14, 85, 5, 'ple Lan Anh =)))', 'phat_nguyen_726467', '2020-12-06 08:00:10'),
(15, 85, 5, 'Ple Ple Lan Anh =))', 'ali_Ce_91930', '2020-12-06 08:00:43'),
(16, 86, 5, 'con khỉ dể thương gh&ecirc; =))', 'phat_nguyen_726467', '2020-12-06 08:07:50'),
(17, 86, 5, 'l&ecirc;u l&ecirc;u lớn rồi m&agrave; đi chơi vs khỉ =))', 'ali_Ce_91930', '2020-12-06 08:08:30'),
(18, 88, 8, 'hazza :3 :3', 'phat_nguyen_726467', '2020-12-06 13:52:43'),
(19, 83, 5, 'xinh g&aacute;i qu&aacute; ', 'phat_nguyen_726467', '2021-01-03 05:47:28'),
(20, 96, 5, 'a', 'phat_nguyen_726467', '2021-01-06 18:01:28'),
(21, 102, 5, 'a', 'phat_nguyen_726467', '2021-01-22 15:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nguoi_gui` int(11) NOT NULL,
  `nguoi_nhan` int(11) NOT NULL,
  `noidunggui` varchar(255) NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp(),
  `noidungxem` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `nguoi_gui`, `nguoi_nhan`, `noidunggui`, `thoigian`, `noidungxem`) VALUES
(70, 5, 8, 'my name is ali - tao t&ecirc;n l&agrave; ali', '2021-01-09 18:01:16', 'no'),
(69, 8, 5, 'c&ograve;n m&agrave;y t&ecirc;n g&igrave;', '2021-01-09 18:01:13', 'no'),
(68, 8, 5, 'my name is ph&aacute;t - Tao t&ecirc;n l&agrave; ph&aacute;t', '2021-01-09 18:00:45', 'no'),
(77, 5, 8, 'ch&agrave;o ph&aacute;t nha', '2021-01-09 18:03:08', 'no'),
(76, 5, 8, 'ch&agrave;o l?n n?a', '2021-01-09 18:03:00', 'no'),
(78, 8, 5, 'ng? ngon', '2021-01-09 18:07:35', 'no'),
(75, 5, 8, 'oke ch&agrave;o', '2021-01-09 18:02:52', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` text CHARACTER SET utf8 NOT NULL,
  `upload_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(83, 5, 'Lan Quế Phường tầm này là tầm thường\r\nVì bên em mới là thiên đường', '100.128016120_1629767800536254_2499029257928420415_o.jpg', '2020-12-06 07:52:21'),
(85, 5, 'L&ecirc;u L&ecirc;u', '8.128016120_1629767800536254_2499029257928420415_o.jpg', '2020-12-06 07:59:43'),
(86, 5, 'L&ecirc;u L&ecirc;u', '32.trà.png', '2020-12-06 08:04:13'),
(88, 8, 'hết tiền rồi :3 :3', '', '2020-12-06 13:52:23'),
(89, 5, 'a', '', '2020-12-19 17:04:42'),
(93, 9, 'a', '26.1.png', '2020-12-19 17:21:06'),
(94, 9, 'a', '', '2020-12-19 17:28:16'),
(95, 5, 'a', '', '2021-01-06 17:41:42'),
(96, 5, 'No', '76.2.png', '2021-01-06 17:44:31'),
(97, 5, 'a', '', '2021-01-09 17:42:31'),
(99, 5, 'a', '', '2021-01-21 04:53:58'),
(101, 5, 'a', '52.1.jpg', '2021-01-22 15:37:36'),
(102, 5, 'a', '', '2021-01-22 15:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_1`
--

CREATE TABLE `user_1` (
  `user_id` int(11) NOT NULL,
  `f_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Relationship` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_birthday` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `posts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recovery_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_1`
--

INSERT INTO `user_1` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `Relationship`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `user_reg_date`, `status`, `posts`, `recovery_account`) VALUES
(5, 'phat', 'nguyen', 'phat_nguyen_726467', 'Hello Coding Cafe.This is my default status!', '...', 'phatphat', 'phat@gmail.com', 'Viet Nam', 'Nam', '2020-10-28', '../assets/imageava/35.1.png', '../assets/imagecover/94.2.jpg', '2020-11-04 17:38:24', 'hoatdong', 'yes', 'Iwanttoputading intheuniverse.'),
(6, 'phat', 'nguyen', 'phat_nguyen_467468', 'Hello Coding Cafe.This is my default status!', '...', 'phatphat', 'phat1@gmail.com', 'Viet Nam', 'Nam', '1999-01-21', '../assets/images/covit.png', '../assets/images/banner.png', '2020-12-06 04:11:46', 'hoatdong', 'yes', 'Iwanttoputading intheuniverse.'),
(7, 'phat', 'nguyen', 'phat_nguyen_385275', 'Hello Coding Cafe.This is my default status!', '...', '999999999', 'phat211@gmail.com', 'Viet Nam', 'Nam', '1999-01-21', '../assets/images/avatar_mac_dinh.png', '../assets/images/banner.png', '2020-12-06 04:24:47', 'hoatdong', 'no', 'Iwanttoputading intheuniverse.'),
(8, 'ali', 'Ce', 'ali_Ce_91930', 'Hello Coding Cafe.This is my default status!', '...', 'phatphat', 'ali@gmail.com', 'Viet Nam', 'Nam', '1999-01-21', '../assets/images/avatar_mac_dinh.png', '../assets/images/banner.png', '2020-12-06 05:53:33', 'hoatdong', 'yes', 'Iwanttoputading intheuniverse.'),
(9, 'aq', 'qq', 'aq_qq_815669', 'Hello Coding Cafe.This is my default status!', '...', 'phatphat', 'q@gmail.com', 'Viet Nam', 'Nam', '1999-01-21', '../assets/imageava/9.1.png', '../assets/imagecover/47.1.jpg', '2020-12-06 06:06:40', 'hoatdong', 'yes', 'Iwanttoputading intheuniverse.'),
(10, 'a1', 'a', 'a1_a_379647', 'hello speed code', 'ddocj than', 'phatphat', 'phat123@gmail.com', 'Viet Nam', 'Nam', '2001-12-12', '../assets/images/avatar_mac_dinh.png', '../assets/images/banner.png', '2021-01-21 04:56:27', 'hoatdong', 'no', 'Chua kich hoat'),
(11, 'a', 'q', 'a_q_907040', 'hello speed code', 'ddocj than', 'phatphat', 'pha22t@gmail.com', 'Viet Nam', 'Nam', '2021-01-04', '../assets/images/avatar_mac_dinh.png', '../assets/images/banner.png', '2021-01-22 15:36:57', 'hoatdong', 'no', 'Chua kich hoat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`bl_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user_1`
--
ALTER TABLE `user_1`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `bl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `user_1`
--
ALTER TABLE `user_1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
