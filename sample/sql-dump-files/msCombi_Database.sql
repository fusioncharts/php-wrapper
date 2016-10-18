-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2016 at 10:18 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mscombi2d`
--
CREATE DATABASE IF NOT EXISTS `mscombi2d` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mscombi2d`;

-- --------------------------------------------------------

--
-- Table structure for table `mscombi2ddata`
--

CREATE TABLE `mscombi2ddata` (
  `id` int(7) NOT NULL,
  `category` varchar(50) NOT NULL,
  `value1` int(50) NOT NULL,
  `value2` int(50) NOT NULL,
  `value3` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mscombi2ddata`
--

INSERT INTO `mscombi2ddata` (`id`, `category`, `value1`, `value2`, `value3`) VALUES
(1, 'Jan', 16000, 15000, 4000),
(2, 'Feb', 20000, 16000, 5000),
(3, 'Mar', 18000, 17000, 3000),
(4, 'Apr', 19000, 18000, 4000),
(5, 'May', 15000, 19000, 1000),
(6, 'Jun', 21000, 19000, 7000),
(7, 'Jul', 16000, 19000, 1000),
(8, 'Aug', 20000, 19000, 4000),
(9, 'Sep', 17000, 20000, 1000),
(10, 'Oct', 25000, 21000, 8000),
(11, 'Nov', 19000, 22000, 2000),
(12, 'Dec', 23000, 23000, 7000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mscombi2ddata`
--
ALTER TABLE `mscombi2ddata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mscombi2ddata`
--
ALTER TABLE `mscombi2ddata`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;