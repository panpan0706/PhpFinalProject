-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-06-04 14:02:11
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `php2017`
--

-- --------------------------------------------------------

--
-- 資料表結構 `mails`
--

CREATE TABLE `mails` (
  `mail_id` int(11) NOT NULL,
  `id_from` varchar(20) NOT NULL,
  `id_to` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `mails`
--

INSERT INTO `mails` (`mail_id`, `id_from`, `id_to`, `title`, `content`, `time`, `read_status`) VALUES
(1, '123456', '9999', '123', '456\r\n789', '2017-06-04 11:49:45', 1),
(2, '123456', '9999', '456', '654', '2017-06-04 10:10:24', 1),
(3, '123456', '9999', '156', '156', '2017-06-04 09:57:01', 1),
(4, '123456', '9999', '156', '156', '2017-06-04 09:57:05', 1),
(5, '123456', '9999', '999', '987', '2017-06-04 09:20:07', 0),
(6, '123456', '156', '156', '156', '2017-06-04 09:56:21', 1),
(7, '156', '156', '88888', '888889', '2017-06-04 09:54:49', 1),
(8, '156', '9999', 'TESTtitle', 'LINE 1\r\nLINE 1\r\nLINE 1\r\nLINE 1\r\nLINE 1\r\nLINE 1\r\nLINE 1\r\nLINE 1\r\nLINE 1\r\nLINE 1\r\nLINE 1\r\nLINE 1\r\nLINE 1', '2017-06-04 09:58:18', 1),
(9, '156', '156', '1515', '12121', '2017-06-04 10:02:23', 1),
(10, '156', '156', 'gig87g87', '87g87g87', '2017-06-04 10:19:20', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`mail_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `mails`
--
ALTER TABLE `mails`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
