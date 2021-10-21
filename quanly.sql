-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2021 lúc 03:55 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` char(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_news`, `title`, `description`, `image`, `status`, `author`, `created_at`, `updated_at`) VALUES
(110, 'test 1', 'des 1', '', '1', 'alo', '2021-10-14 00:00:00', '2021-10-18 00:00:00'),
(111, 'test 2', 'des2', '12952763_1731687937042871_804874836_o.jpg', '1', 'alo', '2021-10-14 00:00:00', '0000-00-00 00:00:00'),
(112, 'test3', 'des3', '12952763_1731687937042871_804874836_o.jpg', '1', 'alo', '2021-10-14 00:00:00', '0000-00-00 00:00:00'),
(113, 'tes4', 'des4', '12952763_1731687937042871_804874836_o.jpg', '1', 'ha222', '2021-10-14 00:00:00', '0000-00-00 00:00:00'),
(114, 'test5', 'des5', '1.jpg', '0', 'ha222', '2021-10-15 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newsterm`
--

CREATE TABLE `newsterm` (
  `id_newsterm` int(11) NOT NULL,
  `id_news` int(50) NOT NULL,
  `id_term` int(50) NOT NULL,
  `id_user` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `newsterm`
--

INSERT INTO `newsterm` (`id_newsterm`, `id_news`, `id_term`, `id_user`) VALUES
(106, 110, 2, 21),
(107, 110, 5, 21),
(108, 111, 1, 21),
(109, 111, 5, 21),
(110, 111, 6, 21),
(111, 112, 1, 21),
(112, 112, 7, 21),
(113, 112, 8, 21),
(114, 113, 1, 21),
(115, 113, 5, 21),
(116, 113, 6, 21),
(117, 114, 3, 21),
(118, 114, 7, 21),
(120, 115, 2, 21),
(121, 115, 5, 21),
(122, 115, 6, 21),
(123, 116, 1, 21),
(124, 116, 2, 21),
(125, 116, 5, 21),
(128, 117, 13, 21),
(129, 117, 9, 21),
(130, 117, 10, 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `term`
--

CREATE TABLE `term` (
  `id_term` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `key_term` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `term`
--

INSERT INTO `term` (`id_term`, `name`, `key_term`) VALUES
(1, 'Thời sự', 'category'),
(2, 'Góc nhìn', 'category'),
(3, 'Thế giới', 'category'),
(4, 'Video', 'category'),
(5, 'Covid', 'tag'),
(6, 'Covid-19', 'tag'),
(7, 'bão', 'tag'),
(8, 'mưa', 'tag'),
(9, 'mùa đông', 'tag'),
(15, 'tình yêu học trò', 'category');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(50) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL),
(19, 'ha123', 'hanobi306@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-10-11', NULL),
(20, 'ha111', '', 'd41d8cd98f00b204e9800998ecf8427e', '2021-10-12', NULL),
(21, 'ha222', 'hanobi306@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-10-12', NULL),
(22, 'ha333', 'hanobi@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', '2021-10-12', NULL),
(23, 'ha444', 'hanobi299@gmail.com', '550a141f12de6341fba65b0ad0433500', '2021-10-12', NULL),
(24, 'ha', 'hanobi@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', '2021-10-13', '2021-10-13'),
(25, 'ha666', 'hanobi299@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-10-18', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Chỉ mục cho bảng `newsterm`
--
ALTER TABLE `newsterm`
  ADD PRIMARY KEY (`id_newsterm`);

--
-- Chỉ mục cho bảng `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id_term`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `newsterm`
--
ALTER TABLE `newsterm`
  MODIFY `id_newsterm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `term`
--
ALTER TABLE `term`
  MODIFY `id_term` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
