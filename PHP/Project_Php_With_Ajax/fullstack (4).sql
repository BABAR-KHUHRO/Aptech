-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 08:27 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullstack`
--

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unverified',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `name`, `email`, `password`, `role`, `status`, `date`) VALUES
(1, 'Abc', 'Abc@gmail.com', '123', 'user', 'verified', '2024-04-22 05:55:35'),
(2, 'Ahmed', 'Ahmed@gmail.com', '321', 'user', 'unverified', '2024-04-20 06:10:20'),
(3, 'Ali', 'Ali@gmail.com', 'ali', 'user', 'unverified', '2024-04-20 06:11:48'),
(4, 'Khalid', 'Khalid@gmail.com', '123', 'user', 'unverified', '2024-04-22 04:47:10'),
(5, 'Javed', 'Javed@gmail.com', '123', 'user', 'unverified', '2024-04-22 05:07:23'),
(6, 'Kashif', 'Kashif@gmail.com', '123', 'user', 'unverified', '2024-04-22 05:10:09'),
(7, 'Test', 'Test@gmail.com', '123', 'user', 'unverified', '2024-04-22 05:14:49'),
(8, 'Sir Shabir', 'shabir@gmail.com', '123', 'super admin', 'verified', '2024-04-22 06:02:06'),
(9, 'Test1', 'Test1@gmail.com', '123', 'user', 'unverified', '2024-04-22 06:16:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
