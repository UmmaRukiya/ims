-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 09:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `name`, `email`, `contact`, `photo`, `username`, `password`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, NULL, 'kamal@gmail.com', NULL, NULL, 'kamal', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, '2024-06-14 20:06:58', NULL, NULL, NULL, NULL),
(2, NULL, '', NULL, NULL, 'suraiya', 'cba3802d0d10dd128a8e065c2a48a78d94ed40ab', NULL, '2024-06-27 05:19:12', NULL, NULL, NULL, NULL),
(3, NULL, '', NULL, NULL, 'suraiya', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, '2024-06-27 05:19:31', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(5, 'six', '2024-06-29 08:12:51', 1, NULL, NULL, NULL),
(6, 'Seven', '2024-06-29 08:13:00', 1, NULL, NULL, NULL),
(7, 'Eight', '2024-06-29 08:13:12', 1, NULL, NULL, NULL),
(8, 'Nine', '2024-06-29 08:13:20', 1, NULL, NULL, NULL),
(9, 'Ten', '2024-06-29 08:13:29', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_fees_setting`
--

CREATE TABLE `class_fees_setting` (
  `id` int(11) NOT NULL,
  `fees_category_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_fees_setting`
--

INSERT INTO `class_fees_setting` (`id`, `fees_category_id`, `session_id`, `class_id`, `group_id`, `amount`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(4, 2, 1, 6, 1, 500, '2024-07-13 21:26:10', 1, NULL, NULL, NULL),
(5, 3, 1, 6, 1, 800, '2024-07-13 21:26:10', 1, NULL, 1, '2024-07-13 21:30:34'),
(6, 2, 1, 7, 1, 700, '2024-07-13 21:40:33', 1, NULL, NULL, NULL),
(7, 3, 1, 7, 1, 900, '2024-07-13 21:40:33', 1, NULL, NULL, NULL),
(12, 1, 1, 5, 1, 500, '2024-08-12 19:33:53', 1, NULL, NULL, NULL),
(13, 2, 1, 5, 1, 700, '2024-08-12 19:33:53', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE `class_routine` (
  `id` int(11) NOT NULL,
  `subject_name` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `day_name` int(11) DEFAULT NULL,
  `period` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`id`, `subject_name`, `teacher_id`, `day_name`, `period`, `class_id`, `section_id`, `session_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 3, 2, 0, 0, 5, 2, 1, '2024-06-29 17:58:35', 1, NULL, NULL, NULL),
(2, 4, 3, 0, 1, 5, 2, 1, '2024-06-29 17:58:35', 1, NULL, NULL, NULL),
(3, 5, 4, 0, 2, 5, 2, 1, '2024-06-29 17:58:36', 1, NULL, NULL, NULL),
(4, 6, 5, 0, 3, 5, 2, 1, '2024-06-29 17:58:36', 1, NULL, NULL, NULL),
(5, 7, 6, 0, 4, 5, 2, 1, '2024-06-29 17:58:36', 1, NULL, NULL, NULL),
(6, 8, 7, 0, 5, 5, 2, 1, '2024-06-29 17:58:36', 1, NULL, NULL, NULL),
(7, 9, 8, 0, 6, 5, 2, 1, '2024-06-29 17:58:36', 1, NULL, NULL, NULL),
(8, 10, 9, 0, 7, 5, 2, 1, '2024-06-29 17:58:36', 1, NULL, NULL, NULL),
(9, 3, 2, 1, 0, 5, 2, 1, '2024-06-29 18:01:15', 1, NULL, NULL, NULL),
(10, 4, 3, 1, 1, 5, 2, 1, '2024-06-29 18:01:15', 1, NULL, NULL, NULL),
(11, 5, 4, 1, 2, 5, 2, 1, '2024-06-29 18:01:15', 1, NULL, NULL, NULL),
(12, 6, 5, 1, 3, 5, 2, 1, '2024-06-29 18:01:15', 1, NULL, NULL, NULL),
(13, 7, 6, 1, 4, 5, 2, 1, '2024-06-29 18:01:15', 1, NULL, NULL, NULL),
(14, 8, 7, 1, 5, 5, 2, 1, '2024-06-29 18:01:15', 1, NULL, NULL, NULL),
(15, 9, 8, 1, 6, 5, 2, 1, '2024-06-29 18:01:15', 1, NULL, NULL, NULL),
(16, 10, 9, 1, 7, 5, 2, 1, '2024-06-29 18:01:15', 1, NULL, NULL, NULL),
(17, 5, 4, 2, 0, 5, 2, 1, '2024-06-29 18:07:28', 1, NULL, NULL, NULL),
(18, 6, 5, 2, 1, 5, 2, 1, '2024-06-29 18:07:28', 1, NULL, NULL, NULL),
(19, 3, 2, 2, 2, 5, 2, 1, '2024-06-29 18:07:28', 1, NULL, NULL, NULL),
(20, 4, 3, 2, 3, 5, 2, 1, '2024-06-29 18:07:28', 1, NULL, NULL, NULL),
(21, 7, 6, 2, 4, 5, 2, 1, '2024-06-29 18:07:28', 1, NULL, NULL, NULL),
(22, 8, 7, 2, 5, 5, 2, 1, '2024-06-29 18:07:29', 1, NULL, NULL, NULL),
(23, 9, 8, 2, 6, 5, 2, 1, '2024-06-29 18:07:29', 1, NULL, NULL, NULL),
(24, 11, 9, 2, 7, 5, 2, 1, '2024-06-29 18:07:29', 1, NULL, NULL, NULL),
(25, 5, 4, 3, 0, 5, 2, 1, '2024-06-29 18:11:17', 1, NULL, NULL, NULL),
(26, 6, 5, 3, 1, 5, 2, 1, '2024-06-29 18:11:17', 1, NULL, NULL, NULL),
(27, 3, 2, 3, 2, 5, 2, 1, '2024-06-29 18:11:17', 1, NULL, NULL, NULL),
(28, 4, 3, 3, 3, 5, 2, 1, '2024-06-29 18:11:17', 1, NULL, NULL, NULL),
(29, 7, 6, 3, 4, 5, 2, 1, '2024-06-29 18:11:17', 1, NULL, NULL, NULL),
(30, 8, 7, 3, 5, 5, 2, 1, '2024-06-29 18:11:17', 1, NULL, NULL, NULL),
(31, 9, 8, 3, 6, 5, 2, 1, '2024-06-29 18:11:17', 1, NULL, NULL, NULL),
(32, 11, 9, 3, 7, 5, 2, 1, '2024-06-29 18:11:17', 1, NULL, NULL, NULL),
(33, 4, 3, 4, 0, 5, 2, 1, '2024-06-29 18:24:22', 1, NULL, NULL, NULL),
(34, 9, 8, 4, 1, 5, 2, 1, '2024-06-29 18:24:22', 1, NULL, NULL, NULL),
(35, 3, 2, 4, 2, 5, 2, 1, '2024-06-29 18:24:22', 1, NULL, NULL, NULL),
(36, 5, 4, 4, 3, 5, 2, 1, '2024-06-29 18:24:22', 1, NULL, NULL, NULL),
(37, 7, 6, 4, 4, 5, 2, 1, '2024-06-29 18:24:23', 1, NULL, NULL, NULL),
(38, 6, 5, 4, 5, 5, 2, 1, '2024-06-29 18:24:23', 1, NULL, NULL, NULL),
(39, 11, 9, 4, 6, 5, 2, 1, '2024-06-29 18:24:23', 1, NULL, NULL, NULL),
(40, 10, 7, 4, 7, 5, 2, 1, '2024-06-29 18:24:24', 1, NULL, NULL, NULL),
(41, 4, 3, 4, 0, 5, 2, 1, '2024-06-29 18:29:21', 1, NULL, NULL, NULL),
(42, 9, 8, 4, 1, 5, 2, 1, '2024-06-29 18:29:21', 1, NULL, NULL, NULL),
(43, 3, 2, 4, 2, 5, 2, 1, '2024-06-29 18:29:21', 1, NULL, NULL, NULL),
(44, 5, 4, 4, 3, 5, 2, 1, '2024-06-29 18:29:21', 1, NULL, NULL, NULL),
(45, 7, 6, 4, 4, 5, 2, 1, '2024-06-29 18:29:21', 1, NULL, NULL, NULL),
(46, 6, 5, 4, 5, 5, 2, 1, '2024-06-29 18:29:21', 1, NULL, NULL, NULL),
(47, 11, 9, 4, 6, 5, 2, 1, '2024-06-29 18:29:22', 1, NULL, NULL, NULL),
(48, 10, 7, 4, 7, 5, 2, 1, '2024-06-29 18:29:22', 1, NULL, NULL, NULL),
(49, 6, 5, 5, 0, 5, 2, 1, '2024-06-29 18:43:05', 1, NULL, NULL, NULL),
(50, 4, 3, 5, 1, 5, 2, 1, '2024-06-29 18:43:05', 1, NULL, NULL, NULL),
(51, 9, 8, 5, 2, 5, 2, 1, '2024-06-29 18:43:05', 1, NULL, NULL, NULL),
(52, 3, 2, 5, 3, 5, 2, 1, '2024-06-29 18:43:05', 1, NULL, NULL, NULL),
(53, 5, 4, 5, 4, 5, 2, 1, '2024-06-29 18:43:05', 1, NULL, NULL, NULL),
(54, 7, 6, 5, 5, 5, 2, 1, '2024-06-29 18:43:05', 1, NULL, NULL, NULL),
(55, 11, 9, 5, 6, 5, 2, 1, '2024-06-29 18:43:05', 1, NULL, NULL, NULL),
(56, 8, 7, 5, 7, 5, 2, 1, '2024-06-29 18:43:05', 1, NULL, NULL, NULL),
(57, 5, 4, 0, 0, 6, 2, 1, '2024-06-29 19:53:24', 1, NULL, NULL, NULL),
(58, 6, 5, 0, 1, 6, 2, 1, '2024-06-29 19:53:24', 1, NULL, NULL, NULL),
(59, 3, 2, 0, 2, 6, 2, 1, '2024-06-29 19:53:24', 1, NULL, NULL, NULL),
(60, 4, 3, 0, 3, 6, 2, 1, '2024-06-29 19:53:24', 1, NULL, NULL, NULL),
(61, 7, 6, 0, 4, 6, 2, 1, '2024-06-29 19:53:24', 1, NULL, NULL, NULL),
(62, 8, 7, 0, 5, 6, 2, 1, '2024-06-29 19:53:24', 1, NULL, NULL, NULL),
(63, 9, 8, 0, 6, 6, 2, 1, '2024-06-29 19:53:24', 1, NULL, NULL, NULL),
(64, 11, 9, 0, 7, 6, 2, 1, '2024-06-29 19:53:24', 1, NULL, NULL, NULL),
(65, 5, 4, 1, 0, 6, 2, 1, '2024-06-29 20:01:53', 1, NULL, NULL, NULL),
(66, 6, 5, 1, 1, 6, 2, 1, '2024-06-29 20:01:53', 1, NULL, NULL, NULL),
(67, 3, 2, 1, 2, 6, 2, 1, '2024-06-29 20:01:53', 1, NULL, NULL, NULL),
(68, 4, 3, 1, 3, 6, 2, 1, '2024-06-29 20:01:53', 1, NULL, NULL, NULL),
(69, 7, 6, 1, 4, 6, 2, 1, '2024-06-29 20:01:53', 1, NULL, NULL, NULL),
(70, 8, 7, 1, 5, 6, 2, 1, '2024-06-29 20:01:53', 1, NULL, NULL, NULL),
(71, 9, 8, 1, 6, 6, 2, 1, '2024-06-29 20:01:54', 1, NULL, NULL, NULL),
(72, 11, 9, 1, 7, 6, 2, 1, '2024-06-29 20:01:54', 1, NULL, NULL, NULL),
(73, 4, 3, 2, 0, 6, 2, 1, '2024-06-29 20:07:03', 1, NULL, NULL, NULL),
(74, 9, 8, 2, 1, 6, 2, 1, '2024-06-29 20:07:04', 1, NULL, NULL, NULL),
(75, 3, 2, 2, 2, 6, 2, 1, '2024-06-29 20:07:04', 1, NULL, NULL, NULL),
(76, 5, 4, 2, 3, 6, 2, 1, '2024-06-29 20:07:04', 1, NULL, NULL, NULL),
(77, 6, 6, 2, 4, 6, 2, 1, '2024-06-29 20:07:04', 1, NULL, NULL, NULL),
(78, 7, 5, 2, 5, 6, 2, 1, '2024-06-29 20:07:04', 1, NULL, NULL, NULL),
(79, 11, 9, 2, 6, 6, 2, 1, '2024-06-29 20:07:04', 1, NULL, NULL, NULL),
(80, 10, 7, 2, 7, 6, 2, 1, '2024-06-29 20:07:04', 1, NULL, NULL, NULL),
(81, 4, 3, 3, 0, 6, 2, 1, '2024-06-29 20:10:14', 1, NULL, NULL, NULL),
(82, 9, 8, 3, 1, 6, 2, 1, '2024-06-29 20:10:14', 1, NULL, NULL, NULL),
(83, 3, 2, 3, 2, 6, 2, 1, '2024-06-29 20:10:14', 1, NULL, NULL, NULL),
(84, 5, 4, 3, 3, 6, 2, 1, '2024-06-29 20:10:14', 1, NULL, NULL, NULL),
(85, 6, 6, 3, 4, 6, 2, 1, '2024-06-29 20:10:14', 1, NULL, NULL, NULL),
(86, 7, 5, 3, 5, 6, 2, 1, '2024-06-29 20:10:14', 1, NULL, NULL, NULL),
(87, 11, 9, 3, 6, 6, 2, 1, '2024-06-29 20:10:14', 1, NULL, NULL, NULL),
(88, 10, 7, 3, 7, 6, 2, 1, '2024-06-29 20:10:14', 1, NULL, NULL, NULL),
(89, 3, 0, 4, 0, 6, 2, 1, '2024-06-29 20:14:01', 1, NULL, NULL, NULL),
(90, 4, 2, 4, 1, 6, 2, 1, '2024-06-29 20:14:01', 1, NULL, NULL, NULL),
(91, 5, 4, 4, 2, 6, 2, 1, '2024-06-29 20:14:01', 1, NULL, NULL, NULL),
(92, 6, 5, 4, 3, 6, 2, 1, '2024-06-29 20:14:01', 1, NULL, NULL, NULL),
(93, 7, 6, 4, 4, 6, 2, 1, '2024-06-29 20:14:01', 1, NULL, NULL, NULL),
(94, 8, 7, 4, 5, 6, 2, 1, '2024-06-29 20:14:01', 1, NULL, NULL, NULL),
(95, 9, 8, 4, 6, 6, 2, 1, '2024-06-29 20:14:01', 1, NULL, NULL, NULL),
(96, 10, 9, 4, 7, 6, 2, 1, '2024-06-29 20:14:01', 1, NULL, NULL, NULL);

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
  `term_id` int(11) NOT NULL,
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

INSERT INTO `class_subject` (`id`, `student_id`, `subject_id`, `class_id`, `group_id`, `session_id`, `term_id`, `sub`, `obj`, `prac`, `pass_marks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 1, '4', 5, NULL, 1, 1, '22.00', '25.00', '18.00', '33.00', '2024-08-21 05:52:53', 1, NULL, NULL, NULL),
(2, 2, '4', 5, NULL, 1, 1, '32.00', '30.00', '15.00', '33.00', '2024-08-21 05:52:53', 1, NULL, NULL, NULL),
(3, 3, '4', 5, NULL, 1, 1, '40.00', '36.00', '15.00', '33.00', '2024-08-21 05:52:53', 1, NULL, NULL, NULL),
(4, 4, '4', 5, NULL, 1, 1, '33.00', '34.00', '16.00', '33.00', '2024-08-21 05:52:53', 1, NULL, NULL, NULL),
(5, 1, '5', 5, NULL, 1, 1, '43.00', '33.00', '0.00', '33.00', '2024-08-20 17:03:53', 1, NULL, NULL, NULL),
(6, 2, '5', 5, NULL, 1, 1, '34.00', '28.00', '0.00', '33.00', '2024-08-20 17:03:54', 1, NULL, NULL, NULL),
(7, 3, '5', 5, NULL, 1, 1, '47.00', '43.00', '0.00', '33.00', '2024-08-20 17:03:54', 1, NULL, NULL, NULL),
(8, 4, '5', 5, NULL, 1, 1, '44.00', '45.00', '0.00', '33.00', '2024-08-20 17:03:54', 1, NULL, NULL, NULL),
(13, 1, '7', 5, NULL, 1, 1, '33.00', '43.00', '0.00', '33.00', '2024-08-20 18:34:59', 1, NULL, NULL, NULL),
(14, 2, '7', 5, NULL, 1, 1, '34.00', '43.00', '0.00', '33.00', '2024-08-20 18:34:59', 1, NULL, NULL, NULL),
(15, 3, '7', 5, NULL, 1, 1, '23.00', '34.00', '0.00', '33.00', '2024-08-20 18:34:59', 1, NULL, NULL, NULL),
(16, 4, '7', 5, NULL, 1, 1, '32.00', '32.00', '0.00', '33.00', '2024-08-20 18:34:59', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `day_name`
--

CREATE TABLE `day_name` (
  `id` int(11) NOT NULL,
  `sl` int(11) NOT NULL,
  `day_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `day_name`
--

INSERT INTO `day_name` (`id`, `sl`, `day_name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 0, 'Saturday', '2024-06-27 07:11:52', 1, NULL, NULL, NULL),
(2, 1, 'Sunday', '2024-06-27 07:11:52', 1, NULL, NULL, NULL),
(3, 2, 'Monday', '2024-06-27 07:11:52', 1, NULL, NULL, NULL),
(4, 3, 'TuesDay', '2024-06-27 07:11:52', 1, NULL, NULL, NULL),
(5, 4, 'WednesDay', '2024-06-27 07:11:52', 1, NULL, NULL, NULL),
(6, 5, 'Thursday', '2024-06-27 07:11:52', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'Math', '2024-06-26 17:29:19', 1, '2024-06-29 08:15:29', 1, NULL),
(2, 'Bangla', '2024-06-29 08:14:35', 1, NULL, NULL, NULL),
(3, 'English', '2024-06-29 08:15:41', 1, NULL, NULL, NULL),
(4, 'Science', '2024-06-29 08:16:07', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'Assitant teacher', '2024-06-26 17:29:43', 1, NULL, NULL, NULL),
(2, 'Teacher', '2024-06-29 08:16:26', 1, NULL, NULL, NULL),
(3, 'Senior  Teacher', '2024-06-29 08:16:55', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_term`
--

CREATE TABLE `exam_term` (
  `id` int(11) NOT NULL,
  `term` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_term`
--

INSERT INTO `exam_term` (`id`, `term`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'Monthly', '2024-08-20 16:59:00', 1, NULL, NULL, NULL),
(2, 'Half-yearly', '2024-08-20 16:59:30', 1, NULL, NULL, NULL),
(3, 'Yearly', '2024-08-20 16:59:46', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fees_category`
--

CREATE TABLE `fees_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `fees_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_category`
--

INSERT INTO `fees_category` (`id`, `name`, `type`, `fees_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'Sports', 1, 1, '2024-07-03 07:46:47', 1, NULL, NULL, NULL),
(2, 'Exam Fees', 2, 2, '2024-07-03 07:47:01', 1, NULL, NULL, NULL),
(3, 'Monthly Fees', 3, 3, '2024-07-03 07:47:18', 1, NULL, NULL, NULL),
(5, 'Lab fees', 4, 4, '2024-07-07 17:24:27', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `group` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `group`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'None', '2024-06-14 21:30:27', 1, NULL, NULL, NULL),
(2, 'Science', '2024-06-14 21:36:08', 1, NULL, NULL, NULL),
(4, 'Commerce', '2024-06-19 21:12:34', 1, '2024-06-29 08:12:21', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `sl` int(11) NOT NULL,
  `period_name` varchar(255) DEFAULT NULL,
  `period_time` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id`, `class_id`, `section_id`, `sl`, `period_name`, `period_time`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 1, 2, 0, '1st', '08:00 - 08:45', '2024-06-29 07:13:47', 1, NULL, NULL, NULL),
(2, 1, 2, 1, '2nd', '08:45 - 09:30', '2024-06-29 07:17:13', 1, NULL, NULL, NULL),
(3, 1, 2, 2, '3rd', '09:30 - 10:15', '2024-06-29 07:17:27', 1, NULL, NULL, NULL),
(4, 1, 2, 3, '4th', '10:15 - 11:00', '2024-06-29 07:18:00', 1, NULL, NULL, NULL),
(5, 1, 2, 4, 'Tiffin', '11:00 - 11:20', '2024-06-29 07:18:21', 1, NULL, NULL, NULL),
(6, 1, 2, 5, '5th', '11:20 - 12:05', '2024-06-29 07:18:47', 1, NULL, NULL, NULL),
(7, 1, 2, 6, '6th', '12:05 - 12:50', '2024-06-29 07:19:25', 1, NULL, NULL, NULL),
(8, 1, 2, 7, '7th', '12:50 - 01:30', '2024-06-29 07:19:49', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'Green', '2024-06-14 20:19:08', 1, '2024-06-14 20:21:11', 1, '2024-06-14 20:21:51'),
(2, 'Black', '2024-06-15 07:44:47', 1, '2024-06-15 07:45:02', 1, NULL),
(3, 'Red', '2024-06-29 08:09:18', 1, NULL, NULL, NULL),
(4, 'Green', '2024-06-29 08:09:26', 1, NULL, NULL, NULL),
(5, 'Blue', '2024-06-29 08:09:37', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, '2024', '2024-06-15 07:54:51', 1, NULL, NULL, NULL),
(3, '2023', '2024-06-15 08:01:05', 1, '2024-06-29 08:10:10', 1, NULL),
(5, '2022', '2024-06-29 08:09:58', 1, NULL, NULL, NULL),
(6, '2021', '2024-06-29 08:10:19', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `father_name`, `mother_name`, `email`, `contact`, `photo`, `username`, `password`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'kamal', 'Rahim', 'Rahima', 'kamal@gmail.com', '0985356', '17241652583265.jpg', 'kamal', '123', '2024-08-20 15:54:21', 1, '2024-08-20 16:47:38', 1, NULL),
(2, 'Jamal', 'abdul', 'jamila', 'kamal@gmail.com', '091676', '17241653307330.jpg', 'jamal', '123', '2024-08-20 16:48:50', 1, NULL, NULL, NULL),
(3, 'Emu', 'abdul', 'jamila', 'kamal@gmail.com', '0988276', '17241654281196.jpg', 'Emu', '123', '2024-08-20 16:50:28', 1, NULL, NULL, NULL),
(4, 'Ira', 'abdul', 'jamila', 'kamal@gmail.com', '01343454', '17241654894075.jpg', 'Ira', '123', '2024-08-20 16:51:29', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `att_date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `student_id`, `att_date`, `in_time`, `out_time`, `note`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 4444, '2024-06-18', '09:24:51', '14:30:51', '', '2024-06-18 22:29:15', 0, NULL, 1, '2024-06-19 07:19:58'),
(2, 4, '2024-06-18', '09:24:55', '14:30:55', 'Late', '2024-06-18 22:32:46', 0, NULL, NULL, NULL),
(3, 3902, '2024-06-26', '17:27:53', '00:00:00', 'P', '2024-06-26 17:27:56', 0, NULL, 1, '2024-06-26 17:28:01'),
(4, 3902, '2024-06-26', '17:28:12', '02:00:00', 'Late', '2024-06-26 17:28:15', 0, '2024-06-26 17:28:36', 1, NULL),
(5, 3902, '2024-06-28', '18:32:23', '00:00:00', 'P', '2024-06-28 18:32:26', 0, NULL, NULL, NULL),
(6, 3904, '2024-06-29', '09:31:50', '00:00:00', 'P', '2024-06-29 09:31:53', 0, NULL, NULL, NULL),
(7, 3904, '2024-06-29', '09:54:38', '00:00:00', 'P', '2024-06-29 09:54:40', 0, NULL, NULL, NULL),
(8, 3904, '2024-06-29', '09:56:05', '00:00:00', 'P', '2024-06-29 09:56:36', 0, NULL, NULL, NULL),
(9, 3904, '2024-06-29', '20:18:04', '00:00:00', 'P', '2024-06-29 20:18:08', 0, NULL, NULL, NULL),
(10, 3904, '2024-07-03', '07:30:01', '00:00:00', 'P', '2024-07-03 07:56:30', 0, NULL, NULL, NULL),
(11, 3904, '2024-07-03', '09:26:47', '01:00:00', 'P', '2024-07-03 09:27:04', 0, NULL, NULL, NULL),
(12, 3905, '2024-07-07', '15:17:02', '00:00:00', 'P', '2024-07-07 15:17:06', 0, NULL, NULL, NULL),
(13, 3906, '2024-07-07', '09:32:22', '14:09:00', 'P', '2024-07-07 15:33:14', 0, NULL, NULL, NULL),
(14, 3907, '2024-07-07', '09:20:22', '13:04:00', 'P', '2024-07-07 15:33:14', 0, '2024-07-07 15:46:03', 1, NULL),
(15, 3905, '2024-07-12', '08:32:40', '03:00:00', 'P', '2024-07-12 14:33:18', 24, NULL, NULL, NULL),
(16, 3906, '2024-07-12', '15:05:40', '00:00:00', 'P', '2024-07-12 14:33:18', 24, NULL, NULL, NULL),
(17, 3906, '2024-07-13', '17:18:10', '16:55:00', 'L', '2024-07-13 17:18:31', 0, NULL, NULL, NULL),
(18, 3906, '2024-07-13', '21:57:11', '21:57:11', 'P', '2024-07-13 21:57:15', 0, NULL, NULL, NULL),
(19, 3905, '2024-07-31', '17:27:11', '16:27:11', 'P', '2024-07-31 17:38:57', 0, NULL, NULL, NULL),
(20, 3906, '2024-07-31', '17:27:11', '16:27:11', 'P', '2024-07-31 17:38:57', 0, NULL, NULL, NULL),
(21, 1, '2024-08-20', '21:52:30', '16:52:30', 'P', '2024-08-20 16:53:02', 0, NULL, NULL, NULL),
(22, 2, '2024-08-20', '16:52:30', '16:52:30', 'L', '2024-08-20 16:53:02', 0, NULL, NULL, NULL),
(23, 3, '2024-08-20', '16:52:30', '16:52:30', 'P', '2024-08-20 16:53:02', 0, NULL, NULL, NULL),
(24, 4, '2024-08-20', '16:52:30', '16:52:30', 'P', '2024-08-20 16:53:02', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `roll` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `student_id`, `class_id`, `section_id`, `session_id`, `roll`, `group_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, '1', 5, 2, 1, 1, 1, '2024-08-20 15:54:21', 1, '2024-08-20 16:47:39', 1, NULL),
(2, '2', 5, 2, 1, 2, 1, '2024-08-20 16:48:50', 1, NULL, NULL, NULL),
(3, '3', 5, 2, 1, 3, 1, '2024-08-20 16:50:28', 1, NULL, NULL, NULL),
(4, '4', 5, 2, 1, 4, 1, '2024-08-20 16:51:29', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` int(11) NOT NULL,
  `fees_id` int(11) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_amount` int(11) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `fees_month` int(11) DEFAULT NULL,
  `fees_year` year(4) DEFAULT NULL,
  `due` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_details`
--

CREATE TABLE `student_fees_details` (
  `id` int(11) NOT NULL,
  `student_fees_id` int(11) DEFAULT NULL,
  `fees_category_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `fees_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` int(11) NOT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `total_marks` decimal(5,2) DEFAULT NULL,
  `pass_marks` decimal(5,2) DEFAULT NULL,
  `sub` decimal(5,2) DEFAULT NULL,
  `obj` decimal(5,2) DEFAULT NULL,
  `prac` decimal(5,2) DEFAULT NULL,
  `gp` decimal(5,2) DEFAULT NULL,
  `gpl` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `subject_id`, `student_id`, `class_id`, `section_id`, `group_id`, `session_id`, `total_marks`, `pass_marks`, `sub`, `obj`, `prac`, `gp`, `gpl`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, '4', 11, 1, 2, 1, 1, '150.00', '15.00', '0.00', '50.00', '0.00', '0.00', '', '2024-06-20 17:40:35', 0, NULL, NULL, NULL),
(2, '4', 11, 1, 2, 2, 3, '150.00', '15.00', '50.00', '30.00', '0.00', '4.00', '', '2024-06-20 17:57:41', 0, '2024-06-20 18:00:36', 1, '2024-06-20 18:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `subject_type` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `subject_type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'Bangla', '', '2024-06-15 07:29:16', 1, '2024-06-15 07:34:19', 1, '2024-06-15 07:34:25'),
(4, 'English', '1', '2024-06-20 13:00:31', 1, '2024-06-29 08:10:55', 1, NULL),
(5, 'Mathematics', '1', '2024-06-20 19:01:30', 1, '2024-06-29 08:11:01', 1, NULL),
(6, 'Science', '1', '2024-06-29 08:10:40', 1, NULL, NULL, NULL),
(7, 'Social-Science', '1', '2024-06-29 08:11:29', 1, NULL, NULL, NULL),
(8, 'Religion', '1', '2024-06-29 09:16:20', 1, NULL, NULL, NULL),
(9, 'ICT', '1', '2024-06-29 09:16:42', 1, NULL, NULL, NULL),
(10, 'Arts & Crafts', '0', '2024-06-29 09:24:05', 1, NULL, NULL, NULL),
(11, 'Work & Life Oriented Education', '0', '2024-06-29 09:24:54', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `assigned_class` int(11) DEFAULT NULL,
  `joining` date DEFAULT NULL,
  `resign` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teacher_id`, `name`, `father_name`, `mother_name`, `email`, `contact`, `photo`, `qualification`, `assigned_class`, `joining`, `resign`, `designation_id`, `department_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 101, 'suraiya', 'sogir', '', '', '', '', 'Bba', 0, '0000-00-00', '0000-00-00', 0, 1, '2024-06-26 17:30:39', 1, NULL, 1, '2024-06-29 08:17:09'),
(2, 102, 'Sharmin', ' mack', 'Begum', 'kamal@gmail.com', '45654646', '', 'BBA', 4, '0000-00-00', '0000-00-00', 12, 1, '2024-06-29 08:17:46', 1, NULL, NULL, NULL),
(3, 103, 'kamal', ' mack', 'jun', 'kamal@gmail.com', '45654646', '17207880531435.jpg', 'BBA', 0, '0000-00-00', '0000-00-00', 2, 1, '2024-06-29 08:21:01', 1, '2024-07-12 14:40:53', 1, NULL),
(4, 104, 'Jamal', 'jack', 'Marry', 'kamal@gmail.com', '45654646', '', 'BBA', 2, '0000-00-00', '0000-00-00', 3, 3, '2024-06-29 08:21:45', 1, NULL, NULL, NULL),
(5, 105, 'Sohana', 'denny', 'Rina', 'gorge@gmail.com', '45654646', '', 'BBA', 2, '0000-00-00', '0000-00-00', 2, 4, '2024-06-29 08:23:16', 1, '2024-06-29 08:27:15', 1, NULL),
(6, 106, 'Sam', 'Ron', 'Rony', 'sam@gmail.com', '45654646', '', 'BBA', 3, '0000-00-00', '0000-00-00', 1, 4, '2024-06-29 08:24:22', 1, NULL, NULL, NULL),
(7, 107, 'Priya', 'Rahim', 'Rahima', 'priya@gmail.com', '45654646', '', 'BBA', 5, '0000-00-00', '0000-00-00', 3, 2, '2024-06-29 08:25:35', 1, NULL, NULL, NULL),
(8, 108, 'Reema', 'Jony', 'Jamila', 'ben@gmail.com', '45654648', '', 'BBA', 2, '0000-00-00', '0000-00-00', 1, 3, '2024-06-29 08:27:02', 1, NULL, NULL, NULL),
(9, 109, 'Vim', ' mack', 'jun', 'gorge@gmail.com', '45654646', 'reiew-05.jpg', 'BBA', 2, '0000-00-00', '0000-00-00', 1, 2, '2024-06-29 09:40:21', 1, '2024-07-05 21:08:50', 1, NULL),
(10, 110, 'Nila', 'jashim', 'jennny', 'nila@gmail.com', '8436', NULL, 'BBA', 2, '2024-07-02', '0000-00-00', 2, 4, '2024-07-09 15:21:00', 1, '2024-07-09 15:31:31', 1, NULL),
(11, 111, 'Arif', 'imam', 'sumi', '', '99', '', '', 0, '0000-00-00', '0000-00-00', 1, 1, '2024-07-09 15:34:11', 1, '2024-07-09 15:39:34', 1, '2024-07-09 18:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `att_date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`id`, `teacher_id`, `att_date`, `in_time`, `out_time`, `note`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 108, '2024-07-13', '07:50:27', '20:50:27', 'P', '2024-07-13 19:51:06', 0, NULL, 1, '2024-07-13 20:11:13'),
(2, 109, '2024-07-13', '07:50:27', '20:50:27', 'L', '2024-07-13 19:51:06', 0, NULL, 1, '2024-07-13 20:11:11'),
(3, 0, '2024-07-13', '00:00:00', '00:00:00', '', '2024-07-13 19:54:52', 0, NULL, NULL, NULL),
(4, 0, '2024-07-13', '00:00:00', '00:00:00', '', '2024-07-13 19:54:52', 0, NULL, NULL, NULL),
(5, 104, '2024-07-13', '20:11:46', '20:11:46', 'A', '2024-07-13 20:12:22', 0, NULL, NULL, NULL),
(6, 105, '2024-07-13', '20:11:46', '22:11:46', 'L', '2024-07-13 20:12:22', 0, NULL, NULL, NULL),
(7, 106, '2024-07-13', '20:11:46', '21:11:46', 'P', '2024-07-13 20:12:22', 0, NULL, NULL, NULL),
(8, 0, '2024-07-13', '00:00:00', '00:00:00', '', '2024-07-13 20:14:41', 0, NULL, NULL, NULL),
(9, 109, '2024-07-13', '20:15:28', '20:15:28', 'A', '2024-07-13 20:16:00', 0, NULL, NULL, NULL),
(10, 110, '2024-07-13', '20:15:28', '20:15:28', 'P', '2024-07-13 20:16:01', 0, NULL, NULL, NULL),
(11, 0, '2024-07-13', '00:00:00', '00:00:00', '', '2024-07-13 20:16:01', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_fees_setting`
--
ALTER TABLE `class_fees_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_name`
--
ALTER TABLE `day_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_term`
--
ALTER TABLE `exam_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_category`
--
ALTER TABLE `fees_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees_details`
--
ALTER TABLE `student_fees_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class_fees_setting`
--
ALTER TABLE `class_fees_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `day_name`
--
ALTER TABLE `day_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_term`
--
ALTER TABLE `exam_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fees_category`
--
ALTER TABLE `fees_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fees_details`
--
ALTER TABLE `student_fees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
