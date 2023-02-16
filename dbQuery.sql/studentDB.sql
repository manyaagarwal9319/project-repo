-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 10:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: mydb
--

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(256) NOT NULL,
  `student_roll_no` int(11) NOT NULL,
  `student_email` varchar(256) NOT NULL,
  `student_mobile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`student_id`, `student_name`, `student_roll_no`, `student_email`, `student_mobile`, `created_at`) VALUES
(12, 'Manya ', 78, 'mnyaaa@gmail.com', '2147483647', '2023-01-26 15:44:05'),
(21, 'reena', 89, 'reenaaaa@gmail.com', '9620742989', '2023-01-27 07:14:56'),
(22, 'Mona', 29, 'mona@gmail.com', '90348923848', '2023-01-27 08:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `student_docs`
--

CREATE TABLE `student_docs` (
  `student_doc_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `adhar_front` blob NOT NULL,
  `adhar_back` blob NOT NULL,
  `pancard` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `marks_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `english_marks` int(11) NOT NULL,
  `math_marks` int(11) NOT NULL,
  `hindi_marks` int(11) NOT NULL,
  `physics_marks` int(11) NOT NULL,
  `chemistry_marks` int(11) NOT NULL,
  `grade` char(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`marks_id`, `student_id`, `english_marks`, `math_marks`, `hindi_marks`, `physics_marks`, `chemistry_marks`, `grade`, `created_at`) VALUES
(6, 12, 90, 98, 98, 90, 80, 'A', '2023-01-26 15:44:46'),
(12, 21, 78, 45, 67, 90, 78, 'C', '2023-01-27 07:15:31'),
(13, 22, 89, 78, 99, 34, 56, 'C', '2023-01-27 09:00:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_docs`
--
ALTER TABLE `student_docs`
  ADD PRIMARY KEY (`student_doc_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`marks_id`),
  ADD KEY `student_marks_ibfk_1` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_docs`
--
ALTER TABLE `student_docs`
  MODIFY `student_doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_docs`
--
ALTER TABLE `student_docs`
  ADD CONSTRAINT `student_docs_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_data` (`student_id`);

--
-- Constraints for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD CONSTRAINT `student_marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_data` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
