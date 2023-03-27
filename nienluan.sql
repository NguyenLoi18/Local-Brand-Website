-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 06:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nienluan`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_name` varchar(255) NOT NULL,
  `account_password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `account_phone` varchar(255) NOT NULL,
  `account_fullname` varchar(255) NOT NULL,
  `account_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_name`, `account_password`, `account_type`, `account_phone`, `account_fullname`, `account_address`) VALUES
('khanh', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', '0763891970', 'Pham Tran Hong Khanh', '3/2 phuong Hung Loi quan Ninh Kieu tp Can Tho'),
('lam', 'c4ca4238a0b923820dcc509a6f75849b', 'user', '0763891970', 'Nguyen Tran Truc Lam', 'Soc Trang'),
('ngan', 'c4ca4238a0b923820dcc509a6f75849b', 'user', '0763891970', 'Le Thi Tuyet Ngan', '117/8g 3/2 Hung Loi Ninh Kieu Can Tho');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(5) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'HADES'),
(2, 'SWE'),
(3, 'DEGREY');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `account_name`, `order_date`) VALUES
(1, 'lam', '2021-05-20 21:16:51'),
(12, 'lam', '2021-05-21 23:03:47'),
(13, 'lam', '2021-05-21 23:10:56'),
(14, 'lam', '2021-05-21 23:18:46'),
(15, 'lam', '2021-05-21 23:19:27'),
(16, 'ngan', '2021-05-21 23:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(255) NOT NULL,
  `prd_id` int(255) NOT NULL,
  `od_quantity` int(255) NOT NULL,
  `od_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `prd_id`, `od_quantity`, `od_price`) VALUES
(1, 7, 3, 1500000),
(1, 16, 1, 450000),
(12, 3, 1, 500000),
(13, 2, 1, 500000),
(14, 1, 3, 1650000),
(14, 2, 1, 500000),
(15, 4, 6, 2400000),
(15, 11, 1, 400000),
(15, 15, 2, 900000),
(16, 2, 1, 500000),
(16, 4, 1, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prd_id` int(11) NOT NULL,
  `prd_name` varchar(255) DEFAULT NULL,
  `img` char(50) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `brand_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prd_id`, `prd_name`, `img`, `price`, `quantity`, `brand_name`) VALUES
(1, 'Cube Tee', 'swe7.webp', 550000, 100, 'SWE      '),
(2, 'Logo Bomber', 'swe5.webp', 500000, 100, 'SWE '),
(3, 'Hawaii Tee', 'swe4.webp', 500000, 12, 'SWE '),
(4, 'Art Black Tee', 'swe3.webp', 400000, 50, 'SWE '),
(5, 'Black Basic Tee', 'swe6.webp', 300000, 40, 'SWE '),
(6, 'Neon Logo Hoddie', 'hades6.webp', 600000, 100, 'HADES '),
(7, 'Angel Hirting Tee', 'hades4.webp', 500000, 100, 'HADES '),
(8, 'Logo Sweater', 'hades5.webp', 550000, 100, 'HADES '),
(9, 'Mix Blue', 'dg2.webp', 450000, 50, 'DEGREY                '),
(10, 'Fire Logo Tee', 'swe1.webp', 450000, 12, 'SWE '),
(11, 'Blue Tee', 'dg4.webp', 400000, 60, 'DEGREY '),
(12, 'Black Logo', 'dg5.webp', 400000, 100, 'DEGREY '),
(13, 'Black Hoddie', 'dg6.webp', 550000, 40, 'DEGREY  '),
(14, 'Badana Hoddie', 'hades1.webp', 550000, 100, 'HADES '),
(15, 'Funny Tee', 'hades2.webp', 450000, 50, 'HADES '),
(16, 'Art Tee', 'hades3.webp', 450000, 50, 'HADES '),
(17, 'Mix Black', 'dg3.webp', 550000, 50, 'DEGREY          ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_name`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `account_name` (`account_name`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`prd_id`),
  ADD KEY `prd_id` (`prd_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`account_name`) REFERENCES `account` (`account_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`prd_id`) REFERENCES `products` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
