-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 08:48 AM
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
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `correct_answer` int(11) DEFAULT NULL,
  `wrong_answer` int(11) DEFAULT NULL,
  `date_of_exam` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `student_id`, `total_marks`, `correct_answer`, `wrong_answer`, `date_of_exam`) VALUES
(1, 1, 0, 0, 3, '2024-04-25 06:42:16'),
(2, 9, 4, 2, 1, '2024-04-25 06:43:51');

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
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `registers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
