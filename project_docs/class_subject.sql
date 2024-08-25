-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 08:19 AM
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
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `sub` decimal(5,2) DEFAULT NULL,
  `obj` decimal(5,2) DEFAULT NULL,
  `prac` decimal(5,2) DEFAULT NULL,
  `pass_marks` decimal(5,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `student_id`, `subject_id`, `class_id`, `group_id`, `session_id`, `sub`, `obj`, `prac`, `pass_marks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 3906, NULL, NULL, NULL, NULL, 34.00, 24.00, 43.00, 34.00, '2024-08-13 07:42:58', 0, NULL, NULL, NULL),
(2, 3909, NULL, NULL, NULL, NULL, 55.00, 12.00, 21.00, 121.00, '2024-08-13 07:42:58', 0, NULL, NULL, NULL),
(3, 3910, NULL, NULL, NULL, NULL, 21.00, 12.00, 12.00, 34.00, '2024-08-13 07:42:58', 0, NULL, NULL, NULL),
(4, 3911, NULL, NULL, NULL, NULL, 12.00, 12.00, 21.00, 34.00, '2024-08-13 07:42:59', 0, NULL, NULL, NULL),
(5, 3913, NULL, NULL, NULL, NULL, 45.00, 12.00, 43.00, 34.00, '2024-08-13 07:42:59', 0, NULL, NULL, NULL),
(6, 3915, NULL, NULL, NULL, NULL, 45.00, 12.00, 43.00, 34.00, '2024-08-13 07:42:59', 0, NULL, NULL, NULL),
(7, 3906, NULL, NULL, NULL, NULL, 50.00, 50.00, 50.00, 50.00, '2024-08-13 07:46:13', 0, NULL, NULL, NULL),
(8, 3909, NULL, NULL, NULL, NULL, 50.00, 50.00, 50.00, 50.00, '2024-08-13 07:46:13', 0, NULL, NULL, NULL),
(9, 3910, NULL, NULL, NULL, NULL, 50.00, 50.00, 50.00, 50.00, '2024-08-13 07:46:13', 0, NULL, NULL, NULL),
(10, 3911, NULL, NULL, NULL, NULL, 50.00, 50.00, 50.00, 50.00, '2024-08-13 07:46:13', 0, NULL, NULL, NULL),
(11, 3913, NULL, NULL, NULL, NULL, 50.00, 50.00, 50.00, 50.00, '2024-08-13 07:46:13', 0, NULL, NULL, NULL),
(12, 3915, NULL, NULL, NULL, NULL, 50.00, 50.00, 50.00, 50.00, '2024-08-13 07:46:13', 0, NULL, NULL, NULL),
(13, 3906, NULL, NULL, NULL, NULL, 88.00, 88.00, 88.00, 88.00, '2024-08-13 08:16:18', 0, NULL, NULL, NULL),
(14, 3909, NULL, NULL, NULL, NULL, 88.00, 88.00, 88.00, 88.00, '2024-08-13 08:16:18', 0, NULL, NULL, NULL),
(15, 3910, NULL, NULL, NULL, NULL, 88.00, 88.00, 88.00, 88.00, '2024-08-13 08:16:18', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
