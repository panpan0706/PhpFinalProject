-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-06-04 14:02:05
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
-- 資料表結構 `articles`
--

CREATE TABLE `articles` (
  `article_id` int(20) NOT NULL,
  `account` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `articles`
--

INSERT INTO `articles` (`article_id`, `account`, `title`, `content`, `time`) VALUES
(8, '9999', 'test_title 1610', '123\r\n456\r\n789', '2017-06-04 08:17:35'),
(9, '9999', '123456', '456789', '2017-06-04 08:17:59'),
(10, '9999', '123456', '484848', '2017-06-04 08:28:21'),
(11, '123456', 'TESTTTTTTTTTTTTT', 'TESTLINE1\r\nTESTLINE2\r\nTESTLINE3\r\nTESTLINE4\r\nTESTLINE5\r\nTESTLINE6\r\nTESTLINE7\r\nTESTLINE8\r\nTESTLINE9\r\nTESTLINE10', '2017-06-04 08:37:23'),
(12, '123456', '123456あああ', 'ㄋㄋㄋ\r\n\r\nㄎㄎㄎ\r\n\r\n123\r\n\r\nあいうえお', '2017-06-04 08:48:55'),
(13, '9999', '56161819', '6516515651', '2017-06-04 11:59:56');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
