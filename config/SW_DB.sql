-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 11, 2023 at 05:14 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SW_DB`
--
CREATE DATABASE IF NOT EXISTS `SW_DB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `SW_DB`;

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `sku` varchar(64) NOT NULL,
  `weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DVD`
--

CREATE TABLE `DVD` (
  `sku` varchar(64) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DVD`
--

INSERT INTO `DVD` (`sku`, `size`) VALUES
('123edc', 2048);

-- --------------------------------------------------------

--
-- Table structure for table `Furniture`
--

CREATE TABLE `Furniture` (
  `sku` varchar(64) NOT NULL,
  `length` float NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Furniture`
--

INSERT INTO `Furniture` (`sku`, `length`, `width`, `height`) VALUES
('123qaz', 15, 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `productList`
--

CREATE TABLE `productList` (
  `sku` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` float DEFAULT NULL,
  `productType` enum('DVD','Book','Furniture') NOT NULL,
  `productDescription` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productList`
--

INSERT INTO `productList` (`sku`, `name`, `price`, `productType`, `productDescription`) VALUES
('123edc', 'The Avengers', 35, 'DVD', 'A nice movie'),
('123qaz', 'Ikea Table', 23, 'Furniture', 'A nice table');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`sku`);

--
-- Indexes for table `DVD`
--
ALTER TABLE `DVD`
  ADD PRIMARY KEY (`sku`);

--
-- Indexes for table `Furniture`
--
ALTER TABLE `Furniture`
  ADD PRIMARY KEY (`sku`);

--
-- Indexes for table `productList`
--
ALTER TABLE `productList`
  ADD PRIMARY KEY (`sku`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Book`
--
ALTER TABLE `Book`
  ADD CONSTRAINT `weightForeignKey` FOREIGN KEY (`sku`) REFERENCES `productList` (`sku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DVD`
--
ALTER TABLE `DVD`
  ADD CONSTRAINT `DvdObjectForeignKey` FOREIGN KEY (`sku`) REFERENCES `productList` (`sku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Furniture`
--
ALTER TABLE `Furniture`
  ADD CONSTRAINT `furnitureForeignKey` FOREIGN KEY (`sku`) REFERENCES `productList` (`sku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
