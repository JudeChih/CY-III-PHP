-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-08-07 16:44:26
-- 伺服器版本： 10.3.16-MariaDB
-- PHP 版本： 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `toby_store`
--

-- --------------------------------------------------------

--
-- 資料表結構 `productdata`
--

CREATE TABLE `productdata` (
  `pd_id` int(11) NOT NULL COMMENT '產品編號',
  `pd_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品名稱',
  `pd_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品分類',
  `pd_price` int(100) NOT NULL COMMENT '產品價錢',
  `pd_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品圖片',
  `pd_star` int(11) NOT NULL COMMENT '產品星數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `productdata`
--

INSERT INTO `productdata` (`pd_id`, `pd_name`, `pd_type`, `pd_price`, `pd_image`, `pd_star`) VALUES
(1, 'Super Note Book 01', 'Computer', 45000, 'product01.png', 4),
(2, 'Super Note Book 02', 'Computer', 24000, 'product03.png', 3),
(3, 'Super Note Book 03', 'Computer', 43999, 'product04.png', 2),
(4, 'Super Note Book 04', 'Computer', 31000, 'product06.png', 4),
(5, 'Bose QuietComfort 01', 'Headset', 10000, 'product02.png', 5),
(6, 'Bose QuietComfort 02', 'Headset', 5000, 'product05.png', 5),
(7, 'Super Note Book 05', 'Computer', 55500, 'product08.png', 1),
(8, 'SAMSUNG S7 edge', 'Phone', 24000, 'product07.png', 3),
(9, 'Osmo Action', 'Camera', 40000, 'product09.png', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `userdata`
--

CREATE TABLE `userdata` (
  `ud_id` int(11) NOT NULL COMMENT '使用者編號',
  `ud_account` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者帳號',
  `ud_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者密碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `productdata`
--
ALTER TABLE `productdata`
  ADD PRIMARY KEY (`pd_id`);

--
-- 資料表索引 `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`ud_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `productdata`
--
ALTER TABLE `productdata`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '產品編號', AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `userdata`
--
ALTER TABLE `userdata`
  MODIFY `ud_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '使用者編號';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
