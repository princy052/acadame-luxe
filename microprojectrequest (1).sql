-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2025 at 04:01 PM
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
-- Database: `microproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `microprojectrequest`
--

CREATE TABLE `microprojectrequest` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Payment_Status` varchar(100) NOT NULL,
  `Timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `microprojectrequest`
--

INSERT INTO `microprojectrequest` (`ID`, `Name`, `Email`, `Course`, `Payment_Status`, `Timestamp`) VALUES
(1, 'hjhj', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'Razorpay', '2025-10-24 18:49:40'),
(2, 'hjhj', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'Razorpay', '2025-10-24 18:55:12'),
(3, 'mhjh', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'PhonePe', '2025-10-24 18:55:43'),
(4, 'mhjh', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'PhonePe', '2025-10-24 18:57:36'),
(5, 'mhjh', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'GPay', '2025-10-24 19:02:58'),
(6, 'mhjh', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'GPay', '2025-10-24 19:26:14'),
(7, 'Princy', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'GPay', '2025-10-24 19:29:00'),
(8, 'scsc', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'GPay', '2025-10-24 19:33:14'),
(9, 'cd', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'GPay', '2025-10-24 19:43:38'),
(10, 'mhjh', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'GPay', '2025-10-24 19:47:47'),
(11, 'mhjh', 'princyelinmathew2028@bca.ajce.in', 'Data Structures', 'GPay', '2025-10-24 19:48:51'),
(12, 'mhjh', 'princyelinmathew2028@bca.ajce.in', 'Data Structures', 'PhonePe', '2025-10-24 19:49:49'),
(13, 'mhjh', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'GPay', '2025-10-24 19:54:16'),
(14, 'mhjh', 'princyelinmathew2028@bca.ajce.in', 'Web Development', 'GPay', '2025-10-24 19:59:50'),
(15, 'mhjh', 'princyelinmathew2028@bca.ajce.in', 'Data Structures', 'GPay', '2025-10-24 20:09:24'),
(16, 'example', 'example@gmail.com', 'Web Development', 'GPay', '2025-10-24 23:04:10'),
(17, 'example', 'example@gmail.com', 'Data Structures', 'GPay', '2025-10-24 23:18:19'),
(18, 'example', 'example@gmail.com', 'Machine Learning', 'GPay', '2025-10-25 05:59:17'),
(19, 'example', 'example@gmail.com', 'Data Structures', 'GPay', '2025-10-25 08:42:55'),
(20, 'example', 'example@gmail.com', 'Data Structures', 'GPay', '2025-10-25 09:11:21'),
(21, 'example', 'example@gmail.com', 'Data Structures', 'GPay', '2025-10-25 09:27:57'),
(22, 'mhjh', 'pr@gmail.com', 'Data Structures', 'GPay', '2025-10-26 09:24:09'),
(23, 'mhjh', 'example@gmail.com', 'Cloud Computing', 'GPay', '2025-10-26 09:54:11'),
(24, 'Priyanka maria mathew', 'abcd01@gmail.com', 'Web Development', 'GPay', '2025-10-26 10:10:45'),
(25, 'Princy Elin Mathew', 'pr@gmail.com', 'Web Development', 'GPay', '2025-10-26 11:06:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `microprojectrequest`
--
ALTER TABLE `microprojectrequest`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `microprojectrequest`
--
ALTER TABLE `microprojectrequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
