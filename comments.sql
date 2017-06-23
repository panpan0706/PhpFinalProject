-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-06-04 14:02:08
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
-- 資料表結構 `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `account` varchar(20) NOT NULL,
  `article` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- 資料表的匯出資料 `comments`
--

INSERT INTO `comments` (`comment_id`, `account`, `article`, `content`, `time`) VALUES
(1, '156', 12, 'testline1\r\ntestline2', '2017-06-04 11:29:28'),
(2, '156', 12, 'TESTLINE1\r\nTTTLINE2', '2017-06-04 11:47:04'),
(3, '156', 12, 'TTTT1\r\nTTTT2', '2017-06-04 11:48:35'),
(4, '156', 11, 'TEST123', '2017-06-04 11:49:12'),
(6, '9999', 11, 'TTTTTTTTTTTTTTあああ\r\nTTTTTTTTTTTTTTあああ\r\nTTTTTTTTTTTTTTあああ\r\nTTTTTTTTTTTTTTあああ\r\nTTTTTTTTTTTTTTあああ\r\nTTTTTTTTTTTTTTあああ\r\nTTTTTTTTTTTTTTあああ\r\nTTTTTTTTTTTTTTあああ\r\nTTTTTTTTTTTTTTあああ\r\nTTTTTTTTTTTTTTあああ', '2017-06-04 11:50:54'),
(7, '9999', 12, 'r=eeeeee', '2017-06-04 11:58:22'),
(8, '9999', 13, 'iqg9rg12938rg1809', '2017-06-04 12:00:00');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
