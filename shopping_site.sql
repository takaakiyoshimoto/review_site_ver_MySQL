-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 
-- サーバのバージョン： 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_site`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `reviewed`
--

CREATE TABLE `reviewed` (
  `id` text NOT NULL,
  `star` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `reviewed`
--

INSERT INTO `reviewed` (`id`, `star`, `comment`) VALUES
('2', '5', 'ここに感想を記入してください。');

-- --------------------------------------------------------

--
-- テーブルの構造 `shopping_data`
--

CREATE TABLE `shopping_data` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `goods` text NOT NULL,
  `quanity` int(11) DEFAULT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `shopping_data`
--

INSERT INTO `shopping_data` (`id`, `name`, `goods`, `quanity`, `time`) VALUES
(1, 'ヨシモト', 'apple', 1, '2020-06-11 07:00:14'),
(2, 'ヨシモト', 'apple', 2, '2020-06-11 07:00:43');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_management`
--

CREATE TABLE `user_management` (
  `id` int(12) NOT NULL,
  `name` text,
  `email` text,
  `pass` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user_management`
--

INSERT INTO `user_management` (`id`, `name`, `email`, `pass`) VALUES
(1, 'admin', 'admin@sample.com', 'P@ssw0rd'),
(2, 'ヨシモト', 'koaranoma-chi@outlook.com', 'P@ssw0rd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shopping_data`
--
ALTER TABLE `shopping_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shopping_data`
--
ALTER TABLE `shopping_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
