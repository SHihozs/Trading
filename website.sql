-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 05:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_info`
--

CREATE TABLE `db_info` (
  `db_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `db_username` char(100) NOT NULL,
  `db_password` char(100) NOT NULL,
  `db_name` char(100) NOT NULL,
  `db_surname` char(100) NOT NULL,
  `db_email` char(100) NOT NULL,
  `db_sex` char(10) NOT NULL,
  `db_phone` int(10) NOT NULL,
  `db_address` text NOT NULL,
  `db_status` varchar(10) NOT NULL DEFAULT 'user',
  `db_datasave` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `db_picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_info`
--

INSERT INTO `db_info` (`db_id`, `db_username`, `db_password`, `db_name`, `db_surname`, `db_email`, `db_sex`, `db_phone`, `db_address`, `db_status`, `db_datasave`, `db_picture`) VALUES
(00055, 'karin', 'karin123', 'karin', 'kujo', 'karina@hotmail.com', 'female', 587965412, '					France', 'user', '2018-11-11 17:52:26', '__thank_you__by_hizukin-d50sooc.jpg'),
(00058, 'yona', 'yona123', 'yona', 'yozune', 'yona@hotmail.com', 'female', 561547895, 'Japan', 'user', '2018-11-02 07:27:33', '_render__73__brilliant_black_by_sandrareina-d9tixq5.png'),
(00060, 'linnar', 'linnar123', 'lin', 'nar', 'lin@hotmail.com', 'female', 357888888, 'England', 'user', '2018-11-11 18:02:24', '1395971_367296890092500_2099361575969545093_n.png'),
(00062, 'min', 'min123', 'yanisa', 'suphat', 'min@hotmail.com', 'female', 555874566, 'Bangkok', 'user', '2018-11-12 00:40:08', 'elegant_anime_girl_by_mayomie-d7fq48d.png'),
(00063, 'moji', 'moji', 'sakuragi', 'hanamiji', 'moji@hotmail.com', 'male', 213555555, 'mahidol', 'user', '2021-11-03 14:43:56', '1ffc45415ea464a6df560b957c75aa7f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `db_order`
--

CREATE TABLE `db_order` (
  `ordernumrecipe` int(5) NOT NULL,
  `ordercusname` char(100) NOT NULL,
  `ordernum` int(11) NOT NULL,
  `orderdetail` text NOT NULL,
  `totalprice` decimal(10,0) NOT NULL,
  `dataorder` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `db_product`
--

CREATE TABLE `db_product` (
  `db_productid` int(5) NOT NULL,
  `db_productname` char(100) NOT NULL,
  `db_productdetail` text NOT NULL,
  `db_productprice` float NOT NULL,
  `db_productstock` int(11) NOT NULL,
  `db_productdatasave` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `db_productpicture` varchar(150) NOT NULL COMMENT 'รูปสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_product`
--

INSERT INTO `db_product` (`db_productid`, `db_productname`, `db_productdetail`, `db_productprice`, `db_productstock`, `db_productdatasave`, `db_productpicture`) VALUES
(34, 'เค้กช็อกโกเเลต', 'นำเข้าจากญี่ปุ่น', 750, 15, '2021-11-03 15:58:52', 'Food21.png'),
(41, 'ข้าวปั้น', 'นำเข้าจากสิงคโปร์', 2000, 78, '2021-11-03 15:40:37', '2011_02_11panda_3782.jpg'),
(42, 'เเฟนต้า', 'นำเข้าจากสิงคโปร์', 200, 78, '2021-11-03 15:50:28', '1d.png'),
(44, 'ขนมปัง', 'นำเข้าจากญี่ปุ่น', 100, 45, '2021-11-03 15:51:08', 'Food5.png'),
(45, 'เค้ก', 'นำเข้าจากฟินเเลนด์', 600, 15, '2021-11-03 15:59:07', 'Food22.png');

-- --------------------------------------------------------

--
-- Table structure for table `db_select`
--

CREATE TABLE `db_select` (
  `autoselect` int(11) NOT NULL,
  `selectproductid` varchar(5) CHARACTER SET utf32 NOT NULL,
  `selectproductname` varchar(200) CHARACTER SET utf32 NOT NULL,
  `selectproductstock` int(5) NOT NULL,
  `selectproductprice` int(5) NOT NULL,
  `selectproductimg` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_info`
--
ALTER TABLE `db_info`
  ADD PRIMARY KEY (`db_id`),
  ADD UNIQUE KEY `db_username` (`db_username`),
  ADD UNIQUE KEY `db_email` (`db_email`),
  ADD UNIQUE KEY `db_email_3` (`db_email`),
  ADD KEY `db_email_2` (`db_email`);

--
-- Indexes for table `db_order`
--
ALTER TABLE `db_order`
  ADD PRIMARY KEY (`ordernumrecipe`),
  ADD KEY `ordercusname` (`ordercusname`);

--
-- Indexes for table `db_product`
--
ALTER TABLE `db_product`
  ADD PRIMARY KEY (`db_productid`);

--
-- Indexes for table `db_select`
--
ALTER TABLE `db_select`
  ADD PRIMARY KEY (`autoselect`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_info`
--
ALTER TABLE `db_info`
  MODIFY `db_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `db_order`
--
ALTER TABLE `db_order`
  MODIFY `ordernumrecipe` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_product`
--
ALTER TABLE `db_product`
  MODIFY `db_productid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `db_select`
--
ALTER TABLE `db_select`
  MODIFY `autoselect` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
