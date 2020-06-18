-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2020 at 07:40 AM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eclbikyu_mediapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_request`
--

CREATE TABLE `blood_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `blood_group` varchar(30) NOT NULL,
  `place` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `expire_date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`id`, `name`, `blood_group`, `place`, `phone_number`, `expire_date`) VALUES
(3, 'afadf', 'a+', 'mirpur', 56465464, '10-11-19'),
(2, 'OS', 'A+', 'Dhaka', 55698, '10-2-11'),
(4, 'robin', 'a+', 'mirpur', 56465464, '10-11-19'),
(5, 'ajjjjjjjj', 'a+', 'mirpur', 56465464, '10-11-19'),
(6, 'hdshjd', 'a+', 'dhaka', 4545454, '10-11-19'),
(7, 'os', 'a+', 'mirpur', 56465464, '10-11-19'),
(8, 'Jihad', 'a+', 'mirpur', 56465464, '10-11-19'),
(9, 'Supto', 'A+', 'Dhaka', 55698, '10-2-11'),
(10, 'naran', 'a+', 'mirpur', 56465464, '10-11-19'),
(11, 'Akash Ahmed', 'A+', 'Dhaka', 55698, '10-2-11'),
(12, 'badal', 'a+', 'mirpur', 56465464, '10-11-19'),
(13, 'badal', 'a+', 'mirpur', 56465464, '10-11-19'),
(14, 'harun', 'a+', 'mirpur', 56465464, '10-11-19'),
(15, 'harun', 'a+', 'mirpur', 56465464, '10-11-19'),
(16, 'labib', 'a+', 'mirpur', 56465464, '10-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `first_name`, `last_name`) VALUES
(1, 'Abul', 'Bakar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_request`
--
ALTER TABLE `blood_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
