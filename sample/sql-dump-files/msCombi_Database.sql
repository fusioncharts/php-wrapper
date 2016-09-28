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
(1, 'Mon', 67, 78, 58),
(2, 'Tue', 78, 87, 45),
(3, 'Wed', 84, 45, 67),
(4, 'Thurs', 98, 122, 90),
(5, 'Fri', 98, 80, 48),
(6, 'Sat', 111, 49, 45),
(7, 'Sun', 98, 115, 89);

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
