-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 03:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Date` datetime NOT NULL,
  `card_id` int(3) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(1) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Date`, `card_id`, `item_name`, `quantity`, `amount`) VALUES
('2019-04-04 10:25:07', 1, 'salad', 1, 50),
('2019-04-04 22:40:38', 1, 'paneer 65', 4, 140),
('2019-04-04 23:09:12', 1, 'chicken briyani', 1, 100),
('2019-04-05 10:43:28', 1, 'momos', 1, 90),
('2019-04-05 11:04:40', 1, 'mushroom chilly', 1, 170);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(4) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` bigint(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `email`, `mobileno`, `username`, `password`) VALUES
(1, 'Tarun', 'kajalraokr@gmail.com', 8120999203, 'TKEZ', 'Tarunn');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `idgallery` int(3) NOT NULL,
  `titlegallery` text NOT NULL,
  `descgallery` text NOT NULL,
  `imgfullname` text NOT NULL,
  `ordergallery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`idgallery`, `titlegallery`, `descgallery`, `imgfullname`, `ordergallery`) VALUES
(3, 'hokage ban gya ', ' tere ko samaj nhi ayega kripya ignore', 'naruto.5ca36ea32ca135.65389615.jpg', '1'),
(4, ' bjbjb ihnk nk', 'vyvy hihin nomo ljml', 'poiuytrddfghj.5ca6eb18cc82a1.89839458.jpg', '2');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `attribute_id` int(3) NOT NULL,
  `item` varchar(50) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(3) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `item`, `price`, `ID`) VALUES
(1, 'salad', 50, 1),
(1, 'paneer tikka', 180, 2),
(1, 'Virgin Mary', 60, 3),
(1, 'Paneer Chilli', 130, 4),
(1, 'paneer 65', 140, 5),
(1, 'mushroom chilly', 170, 6),
(1, 'chhicken chilli', 170, 7),
(1, 'gobhi', 100, 8),
(1, 'chicken curry', 190, 9),
(1, 'chicken briyani', 100, 10),
(1, 'momos', 90, 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `customer_id` int(3) NOT NULL,
  `restaurant_id` int(3) NOT NULL,
  `attribute_id` int(3) NOT NULL,
  `menu_id` int(3) NOT NULL,
  `quantity` int(1) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `customer_id` int(3) NOT NULL,
  `orderid` int(3) NOT NULL,
  `ordered` int(1) NOT NULL,
  `receiverd` int(1) NOT NULL,
  `on_route` int(1) NOT NULL,
  `delivered` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Owner_id` int(3) NOT NULL,
  `Reataurant_Name` varchar(255) NOT NULL,
  `Owner_name` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobileno` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Owner_id`, `Reataurant_Name`, `Owner_name`, `Location`, `email`, `sex`, `username`, `password`, `mobileno`) VALUES
(1, 'Fuko La Su', 'Tarun', 'Raipur', 'TarunkumarEkkaTkez@gmail.com', 'male', 'Tasd', 'Tar', 8120999203);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `card_id` (`card_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`idgallery`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `order_menu` (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`attribute_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`,`restaurant_id`),
  ADD UNIQUE KEY `attribute_id` (`attribute_id`),
  ADD UNIQUE KEY `menu_id` (`menu_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `idgallery` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `attribute_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `orderid` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `Owner_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `order_history` (`attribute_id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `order_menu` FOREIGN KEY (`menu_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `order_history_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `menu` (`ID`),
  ADD CONSTRAINT `order_history_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `cart` (`card_id`);

--
-- Constraints for table `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `order_status_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
