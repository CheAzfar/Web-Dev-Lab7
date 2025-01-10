-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 11:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expenditure_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `domestic_tourists`
--

CREATE TABLE `domestic_tourists` (
  `id` int(11) NOT NULL,
  `component` varchar(255) DEFAULT NULL,
  `year_2010` decimal(10,2) DEFAULT NULL,
  `year_2011` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `domestic_tourists`
--

INSERT INTO `domestic_tourists` (`id`, `component`, `year_2010`, `year_2011`) VALUES
(1, 'Food & beverages', 6448.00, 7756.00),
(2, 'Transport', 6220.00, 7417.00),
(3, 'Accommodation', 6096.00, 4985.00),
(4, 'Shopping', 2603.00, 3801.00),
(5, 'Expenditure', 595.00, 801.00),
(6, 'Other activities', 1722.00, 2249.00);

-- --------------------------------------------------------

--
-- Table structure for table `domestic_visitors`
--

CREATE TABLE `domestic_visitors` (
  `id` int(11) NOT NULL,
  `component` varchar(255) DEFAULT NULL,
  `year_2010` decimal(10,2) DEFAULT NULL,
  `year_2011` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `domestic_visitors`
--

INSERT INTO `domestic_visitors` (`id`, `component`, `year_2010`, `year_2011`) VALUES
(1, 'Shopping', 8914.00, 13149.00),
(2, 'Transport', 8098.00, 10019.00),
(3, 'Food & beverages', 7975.00, 9691.00),
(4, 'Accommodation', 6130.00, 5028.00),
(5, 'Expenditure', 894.00, 1097.00),
(6, 'Other activities', 2667.00, 3362.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domestic_tourists`
--
ALTER TABLE `domestic_tourists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domestic_visitors`
--
ALTER TABLE `domestic_visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domestic_tourists`
--
ALTER TABLE `domestic_tourists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `domestic_visitors`
--
ALTER TABLE `domestic_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
