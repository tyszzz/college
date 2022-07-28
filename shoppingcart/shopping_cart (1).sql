-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2021-01-13 08:49:22
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shopping_cart`
--

-- --------------------------------------------------------

--
-- 資料表結構 `buyer`
--

CREATE TABLE `buyer` (
  `b_account` varchar(20) NOT NULL COMMENT '買家帳號',
  `email` varchar(30) NOT NULL COMMENT 'email',
  `name` varchar(20) NOT NULL COMMENT '使用者名稱',
  `tel` varchar(15) NOT NULL COMMENT '連絡電話',
  `password` varchar(20) NOT NULL COMMENT '密碼',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `security` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `buyer`
--

INSERT INTO `buyer` (`b_account`, `email`, `name`, `tel`, `password`, `address`, `security`) VALUES
('tyszzz', 'yungshengtan2012@hotmail.com', '陳俑勝', '0908554467', 'tyszzz123', '海龍之星', '我是你爸爸'),
('yungshengtan', 'yungshengtan77@gmail.com', 'Tan Yung Sheng', '908554467', 'nukpws', 'No. 700, Kaohsiung University Road, Nanzi District', '我是你爸爸');

-- --------------------------------------------------------

--
-- 資料表結構 `buyer_and_item`
--

CREATE TABLE `buyer_and_item` (
  `b_account` varchar(20) NOT NULL,
  `I_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `cart_and_item`
--

CREATE TABLE `cart_and_item` (
  `I_number` varchar(255) NOT NULL,
  `s_number` int(255) NOT NULL,
  `I_name` varchar(50) NOT NULL COMMENT '商品名字',
  `number` int(10) NOT NULL COMMENT '商品數量',
  `price` int(255) NOT NULL COMMENT '商品總價格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `item`
--

CREATE TABLE `item` (
  `I_number` varchar(255) NOT NULL COMMENT '商品編號',
  `i_name` varchar(50) NOT NULL COMMENT '商品名稱',
  `price` int(10) NOT NULL COMMENT '價格',
  `picture` varchar(255) NOT NULL COMMENT '商品圖片位置',
  `type` int(3) NOT NULL COMMENT '商品類型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `item`
--

INSERT INTO `item` (`I_number`, `i_name`, `price`, `picture`, `type`) VALUES
('A01', '麥香雞', 49, 'picture/1.png', 1),
('A02', '麥香雞薯條套餐', 99, 'picture/2.png\r\n', 1),
('A03', '麥香雞雞塊套餐', 144, 'picture/3.png', 1),
('B01', '大麥克', 80, 'picture/4.png', 2),
('B02', '大麥克薯條套餐', 135, 'picture/5.png', 2),
('B03', '大麥克雞塊套餐', 175, 'picture/6.png', 2),
('C01', '麥克雞塊', 64, 'picture/7.png', 3),
('C02', '麥克雞塊薯條餐', 119, 'picture/8.png', 3),
('D01', 'oreo冰旋風', 55, 'picture/9.png', 4),
('E01', '小包薯條', 32, 'picture/10.png', 5),
('E02', '中包薯條', 42, 'picture/11.png', 5),
('E03', '大包薯條', 55, 'picture/12.png', 5),
('F01', '蘋果派', 32, 'picture/13.png', 6),
('G01', '小杯可樂', 28, 'picture/14.png', 7),
('G02', '中杯可樂', 33, 'picture/14.png', 7),
('G03', '大杯可樂', 40, 'picture/14.png', 7),
('H01', '小杯雪碧', 28, 'picture/15.png', 8),
('H02', '中杯雪碧', 33, 'picture/15.png', 8),
('H03', '大杯雪碧', 40, 'picture/15.png', 8),
('I01', '小四季沙拉', 25, 'picture/16.png', 9),
('I02', '大四季沙拉', 42, 'picture/17.png', 9);

-- --------------------------------------------------------

--
-- 資料表結構 `o_rder`
--

CREATE TABLE `o_rder` (
  `O_no` int(20) NOT NULL,
  `I_number` varchar(255) NOT NULL,
  `I_name` varchar(50) NOT NULL,
  `number` int(10) NOT NULL,
  `price` int(255) NOT NULL,
  `b_account` varchar(20) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `o_rder`
--

INSERT INTO `o_rder` (`O_no`, `I_number`, `I_name`, `number`, `price`, `b_account`, `state`) VALUES
(1, 'B03', '大麥克雞塊套餐', 78, 13650, 'tyszzz', 1),
(1, 'F01', '蘋果派', 12, 384, 'tyszzz', 1),
(2, 'B03', '大麥克雞塊套餐', 12, 2100, 'tyszzz', 1),
(2, 'C02', '麥克雞塊薯條餐', 12, 1428, 'tyszzz', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `b_account` varchar(20) NOT NULL,
  `s_number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `shoppingcart`
--

INSERT INTO `shoppingcart` (`b_account`, `s_number`) VALUES
('tyszzz', 1),
('yungshengtan', 2);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`b_account`),
  ADD UNIQUE KEY `b_account` (`b_account`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 資料表索引 `buyer_and_item`
--
ALTER TABLE `buyer_and_item`
  ADD PRIMARY KEY (`b_account`,`I_number`),
  ADD KEY `bought` (`I_number`);

--
-- 資料表索引 `cart_and_item`
--
ALTER TABLE `cart_and_item`
  ADD PRIMARY KEY (`I_number`,`s_number`),
  ADD KEY `in2` (`s_number`),
  ADD KEY `I_number` (`I_number`);

--
-- 資料表索引 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`I_number`);

--
-- 資料表索引 `o_rder`
--
ALTER TABLE `o_rder`
  ADD PRIMARY KEY (`O_no`,`I_number`,`b_account`),
  ADD KEY `have5` (`I_number`),
  ADD KEY `have6` (`b_account`);

--
-- 資料表索引 `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`s_number`),
  ADD KEY `b_account` (`b_account`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `buyer_and_item`
--
ALTER TABLE `buyer_and_item`
  ADD CONSTRAINT `bought` FOREIGN KEY (`I_number`) REFERENCES `item` (`I_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buy` FOREIGN KEY (`b_account`) REFERENCES `buyer` (`b_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `cart_and_item`
--
ALTER TABLE `cart_and_item`
  ADD CONSTRAINT `in` FOREIGN KEY (`I_number`) REFERENCES `item` (`I_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `in2` FOREIGN KEY (`s_number`) REFERENCES `shoppingcart` (`s_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `o_rder`
--
ALTER TABLE `o_rder`
  ADD CONSTRAINT `have5` FOREIGN KEY (`I_number`) REFERENCES `item` (`I_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `have6` FOREIGN KEY (`b_account`) REFERENCES `buyer` (`b_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `have` FOREIGN KEY (`b_account`) REFERENCES `buyer` (`b_account`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
