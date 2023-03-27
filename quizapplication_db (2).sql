-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 06:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizapplication_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_options`
--

CREATE TABLE `quiz_options` (
  `id` int(11) NOT NULL,
  `IsPrimary` int(11) NOT NULL,
  `question_Id` int(11) NOT NULL,
  `creationTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `optionName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_options`
--

INSERT INTO `quiz_options` (`id`, `IsPrimary`, `question_Id`, `creationTime`, `optionName`) VALUES
(1, 0, 1, '2023-03-26 18:18:58', 'Options-01-01'),
(2, 0, 1, '2023-03-26 18:18:58', 'Options-01-02'),
(3, 0, 1, '2023-03-26 18:18:58', 'Options-01-03'),
(4, 1, 1, '2023-03-26 18:18:58', 'Options-01-04'),
(5, 0, 2, '2023-03-26 18:18:58', 'Options-02-01'),
(6, 1, 2, '2023-03-26 18:18:58', 'Options-02-02'),
(7, 0, 2, '2023-03-26 18:18:58', 'Options-02-03'),
(8, 0, 2, '2023-03-26 18:18:58', 'Options-02-04'),
(9, 1, 3, '2023-03-26 18:18:58', 'Options-03-01'),
(10, 0, 3, '2023-03-26 18:18:58', 'Options-03-02'),
(11, 0, 3, '2023-03-26 18:18:58', 'Options-03-03'),
(12, 0, 3, '2023-03-26 18:18:58', 'Options-03-04'),
(13, 0, 4, '2023-03-26 18:18:58', 'Options-04-01'),
(14, 0, 4, '2023-03-26 18:18:58', 'Options-04-02'),
(15, 1, 4, '2023-03-26 18:18:58', 'Options-04-03'),
(16, 0, 4, '2023-03-26 18:18:58', 'Options-04-04'),
(17, 0, 5, '2023-03-26 18:18:58', 'Options-05-01'),
(18, 0, 5, '2023-03-26 18:18:58', 'Options-05-02'),
(19, 0, 5, '2023-03-26 18:18:58', 'Options-05-03'),
(20, 1, 5, '2023-03-26 18:18:58', 'Options-05-04'),
(21, 0, 6, '2023-03-26 18:18:58', 'Options-06-01'),
(22, 0, 6, '2023-03-26 18:18:58', 'Options-06-02'),
(23, 0, 6, '2023-03-26 18:18:58', 'Options-06-03'),
(24, 1, 6, '2023-03-26 18:18:58', 'Options-06-04'),
(25, 0, 7, '2023-03-26 18:18:58', 'Options-07-01'),
(26, 0, 7, '2023-03-26 18:18:58', 'Options-07-02'),
(27, 1, 7, '2023-03-26 18:18:58', 'Options-07-03'),
(28, 0, 7, '2023-03-26 18:18:58', 'Options-07-04'),
(29, 0, 8, '2023-03-26 18:18:58', 'Options-08-01'),
(30, 1, 8, '2023-03-26 18:18:58', 'Options-08-02'),
(31, 0, 8, '2023-03-26 18:18:58', 'Options-08-03'),
(32, 0, 8, '2023-03-26 18:18:58', 'Options-08-04'),
(33, 0, 9, '2023-03-26 18:18:58', 'Options-09-01'),
(34, 1, 9, '2023-03-26 18:18:58', 'Options-09-02'),
(35, 0, 9, '2023-03-26 18:18:58', 'Options-09-03'),
(36, 0, 9, '2023-03-26 18:18:58', 'Options-09-04'),
(37, 1, 10, '2023-03-26 18:18:58', 'Options-10-01'),
(38, 0, 10, '2023-03-26 18:18:58', 'Options-10-02'),
(39, 0, 10, '2023-03-26 18:18:58', 'Options-10-03'),
(40, 0, 10, '2023-03-26 18:18:58', 'Options-10-04'),
(41, 1, 11, '2023-03-26 18:18:58', 'Options-11-01'),
(42, 0, 11, '2023-03-26 18:18:58', 'Options-11-02'),
(43, 0, 11, '2023-03-26 18:18:58', 'Options-11-03'),
(44, 0, 11, '2023-03-26 18:18:58', 'Options-11-04'),
(45, 0, 12, '2023-03-26 18:18:58', 'Options-12-01'),
(46, 1, 12, '2023-03-26 18:18:58', 'Options-12-02'),
(47, 0, 12, '2023-03-26 18:18:58', 'Options-12-03'),
(48, 0, 12, '2023-03-26 18:18:58', 'Options-12-04'),
(49, 0, 13, '2023-03-26 18:18:58', 'Options-13-01'),
(50, 0, 13, '2023-03-26 18:18:58', 'Options-13-02'),
(51, 0, 13, '2023-03-26 18:18:58', 'Options-13-03'),
(52, 1, 13, '2023-03-26 18:18:58', 'Options-13-04'),
(53, 0, 14, '2023-03-26 18:18:58', 'Options-14-01'),
(54, 0, 14, '2023-03-26 18:18:58', 'Options-14-02'),
(55, 0, 14, '2023-03-26 18:18:58', 'Options-14-03'),
(56, 1, 14, '2023-03-26 18:18:58', 'Options-14-04'),
(57, 0, 15, '2023-03-26 18:18:58', 'Options-15-01'),
(58, 0, 15, '2023-03-26 18:18:58', 'Options-15-02'),
(59, 0, 15, '2023-03-26 18:18:58', 'Options-15-03'),
(60, 1, 15, '2023-03-26 18:18:58', 'Options-15-04'),
(61, 0, 16, '2023-03-26 18:18:58', 'Options-16-01'),
(62, 1, 16, '2023-03-26 18:18:58', 'Options-16-02'),
(63, 0, 16, '2023-03-26 18:18:58', 'Options-16-03'),
(64, 0, 16, '2023-03-26 18:18:58', 'Options-16-04'),
(65, 0, 17, '2023-03-26 18:18:58', 'Options-17-01'),
(66, 0, 17, '2023-03-26 18:18:58', 'Options-17-02'),
(67, 0, 17, '2023-03-26 18:18:58', 'Options-17-03'),
(68, 1, 17, '2023-03-26 18:18:58', 'Options-17-04'),
(69, 0, 18, '2023-03-26 18:18:58', 'Options-18-01'),
(70, 0, 18, '2023-03-26 18:18:58', 'Options-18-02'),
(71, 0, 18, '2023-03-26 18:18:58', 'Options-18-03'),
(72, 1, 18, '2023-03-26 18:18:58', 'Options-18-04'),
(73, 0, 19, '2023-03-26 18:18:58', 'Options-19-01'),
(74, 0, 19, '2023-03-26 18:18:58', 'Options-19-02'),
(75, 0, 19, '2023-03-26 18:18:58', 'Options-19-03'),
(76, 1, 19, '2023-03-26 18:18:58', 'Options-19-04'),
(77, 0, 20, '2023-03-26 18:18:58', 'Options-20-01'),
(78, 0, 20, '2023-03-26 18:18:58', 'Options-20-02'),
(79, 1, 20, '2023-03-26 18:18:58', 'Options-20-03'),
(80, 0, 20, '2023-03-26 18:18:58', 'Options-20-04');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_played`
--

CREATE TABLE `quiz_played` (
  `id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `creationTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `endTime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_played`
--

INSERT INTO `quiz_played` (`id`, `user_Id`, `creationTime`, `endTime`) VALUES
(1, 2, '2023-03-26 19:45:59', '2023-03-26 19:45:59'),
(2, 2, '2023-03-26 20:11:42', '2023-03-26 20:11:42'),
(3, 2, '2023-03-27 03:35:34', '2023-03-27 03:35:34'),
(4, 2, '2023-03-27 03:50:52', '2023-03-27 03:50:52'),
(5, 2, '2023-03-27 03:51:55', '2023-03-27 03:51:55'),
(6, 2, '2023-03-27 03:55:05', '2023-03-27 03:55:05'),
(7, 2, '2023-03-27 03:59:26', '2023-03-27 03:59:26'),
(8, 2, '2023-03-27 04:06:59', '2023-03-27 04:06:59'),
(9, 2, '2023-03-27 04:07:42', '2023-03-27 04:07:42'),
(10, 2, '2023-03-27 04:10:03', '2023-03-27 04:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_played_answered`
--

CREATE TABLE `quiz_played_answered` (
  `quiz_Id` int(11) NOT NULL,
  `answare_Id` int(11) NOT NULL,
  `creationTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `question_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_played_answered`
--

INSERT INTO `quiz_played_answered` (`quiz_Id`, `answare_Id`, `creationTime`, `question_id`, `id`) VALUES
(3, 2, '2023-03-27 03:35:37', 1, 21),
(3, 26, '2023-03-27 03:35:59', 7, 26),
(3, 54, '2023-03-27 03:36:22', 14, 27),
(3, 50, '2023-03-27 03:36:25', 13, 28),
(3, 74, '2023-03-27 03:36:28', 19, 29),
(3, 62, '2023-03-27 03:36:31', 16, 30),
(3, 70, '2023-03-27 03:36:35', 18, 31),
(3, 42, '2023-03-27 03:39:42', 11, 32),
(3, 30, '2023-03-27 03:40:04', 8, 33),
(3, 14, '2023-03-27 03:40:10', 4, 34),
(3, 6, '2023-03-27 03:40:14', 2, 35),
(3, 67, '2023-03-27 03:40:18', 17, 36),
(3, 11, '2023-03-27 03:40:24', 3, 37),
(3, 35, '2023-03-27 03:40:29', 9, 38),
(3, 47, '2023-03-27 03:40:34', 12, 39),
(3, 22, '2023-03-27 03:41:59', 6, 41),
(3, 38, '2023-03-27 03:45:33', 10, 42),
(3, 58, '2023-03-27 03:45:38', 15, 43),
(3, 18, '2023-03-27 03:45:43', 5, 44),
(3, 78, '2023-03-27 03:48:33', 20, 45),
(4, 2, '2023-03-27 03:50:56', 1, 46),
(4, 42, '2023-03-27 03:51:00', 11, 47),
(4, 74, '2023-03-27 03:51:04', 19, 48),
(4, 78, '2023-03-27 03:51:12', 20, 49),
(4, 51, '2023-03-27 03:51:42', 13, 50),
(4, 9, '2023-03-27 03:51:45', 3, 51),
(4, 37, '2023-03-27 03:51:49', 10, 52),
(5, 2, '2023-03-27 03:51:57', 1, 53),
(5, 74, '2023-03-27 03:52:47', 19, 54),
(5, 54, '2023-03-27 03:54:12', 14, 55),
(5, 26, '2023-03-27 03:54:37', 7, 56),
(5, 23, '2023-03-27 03:54:41', 6, 57),
(5, 5, '2023-03-27 03:54:44', 2, 58),
(5, 68, '2023-03-27 03:54:58', 17, 59),
(6, 4, '2023-03-27 03:55:16', 1, 60),
(6, 9, '2023-03-27 03:55:59', 3, 61),
(6, 26, '2023-03-27 03:56:50', 7, 62),
(6, 74, '2023-03-27 03:57:07', 19, 63),
(6, 59, '2023-03-27 03:57:10', 15, 64),
(6, 68, '2023-03-27 03:57:13', 17, 65),
(6, 6, '2023-03-27 03:57:58', 2, 66),
(6, 55, '2023-03-27 03:58:01', 14, 67),
(6, 42, '2023-03-27 03:58:22', 11, 68),
(6, 71, '2023-03-27 03:58:26', 18, 69),
(6, 33, '2023-03-27 03:58:29', 9, 70),
(6, 50, '2023-03-27 03:58:31', 13, 71),
(6, 24, '2023-03-27 03:58:34', 6, 72),
(6, 30, '2023-03-27 03:59:02', 8, 73),
(6, 19, '2023-03-27 03:59:10', 5, 74),
(6, 46, '2023-03-27 03:59:14', 12, 75),
(7, 2, '2023-03-27 03:59:28', 1, 76),
(7, 11, '2023-03-27 03:59:30', 3, 77),
(7, 22, '2023-03-27 04:00:27', 6, 78),
(7, 43, '2023-03-27 04:00:37', 11, 79),
(7, 7, '2023-03-27 04:00:42', 2, 80),
(7, 46, '2023-03-27 04:01:08', 12, 81),
(7, 74, '2023-03-27 04:01:17', 19, 82),
(7, 18, '2023-03-27 04:01:31', 5, 83),
(7, 39, '2023-03-27 04:01:40', 10, 84),
(7, 27, '2023-03-27 04:01:54', 7, 85),
(7, 62, '2023-03-27 04:02:12', 16, 86),
(7, 70, '2023-03-27 04:02:56', 18, 87),
(7, 54, '2023-03-27 04:03:02', 14, 88),
(7, 30, '2023-03-27 04:03:06', 8, 89),
(7, 50, '2023-03-27 04:04:35', 13, 90),
(7, 59, '2023-03-27 04:04:38', 15, 91),
(7, 78, '2023-03-27 04:04:40', 20, 92),
(7, 35, '2023-03-27 04:04:42', 9, 93),
(7, 66, '2023-03-27 04:04:48', 17, 94),
(7, 15, '2023-03-27 04:04:50', 4, 95),
(8, 2, '2023-03-27 04:07:01', 1, 96),
(8, 69, '2023-03-27 04:07:04', 18, 97),
(8, 6, '2023-03-27 04:07:07', 2, 98),
(8, 34, '2023-03-27 04:07:27', 9, 99),
(9, 2, '2023-03-27 04:07:44', 1, 100),
(9, 7, '2023-03-27 04:07:47', 2, 101),
(9, 51, '2023-03-27 04:07:49', 13, 102),
(9, 14, '2023-03-27 04:07:52', 4, 103),
(9, 79, '2023-03-27 04:07:54', 20, 104),
(9, 38, '2023-03-27 04:09:01', 10, 105),
(9, 26, '2023-03-27 04:09:04', 7, 106),
(9, 11, '2023-03-27 04:09:07', 3, 107),
(9, 66, '2023-03-27 04:09:09', 17, 108),
(9, 43, '2023-03-27 04:09:12', 11, 109),
(9, 22, '2023-03-27 04:09:16', 6, 110),
(9, 55, '2023-03-27 04:09:18', 14, 111),
(9, 74, '2023-03-27 04:09:21', 19, 112),
(9, 63, '2023-03-27 04:09:23', 16, 113),
(9, 70, '2023-03-27 04:09:26', 18, 114),
(9, 34, '2023-03-27 04:09:30', 9, 115),
(9, 18, '2023-03-27 04:09:35', 5, 116),
(9, 47, '2023-03-27 04:09:37', 12, 117),
(9, 30, '2023-03-27 04:09:39', 8, 118),
(9, 59, '2023-03-27 04:09:43', 15, 119),
(10, 2, '2023-03-27 04:10:06', 1, 120),
(10, 7, '2023-03-27 04:10:08', 2, 121),
(10, 33, '2023-03-27 04:10:18', 9, 122),
(10, 37, '2023-03-27 04:10:41', 10, 123),
(10, 72, '2023-03-27 04:11:35', 18, 124),
(10, 50, '2023-03-27 04:14:39', 13, 125),
(10, 58, '2023-03-27 04:15:01', 15, 126),
(10, 47, '2023-03-27 04:15:09', 12, 127),
(10, 42, '2023-03-27 04:16:08', 11, 128),
(10, 18, '2023-03-27 04:17:53', 5, 129),
(10, 26, '2023-03-27 04:18:02', 7, 130),
(10, 10, '2023-03-27 04:18:38', 3, 131),
(10, 30, '2023-03-27 04:18:51', 8, 132),
(10, 14, '2023-03-27 04:19:42', 4, 133),
(10, 74, '2023-03-27 04:19:51', 19, 134),
(10, 54, '2023-03-27 04:20:11', 14, 135),
(10, 23, '2023-03-27 04:20:15', 6, 136),
(10, 66, '2023-03-27 04:20:19', 17, 137),
(10, 79, '2023-03-27 04:20:31', 20, 138),
(10, 62, '2023-03-27 04:21:15', 16, 139);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `question` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `creationTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `creator_Id` int(11) NOT NULL,
  `imageUrl` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `isActive`, `question`, `remarks`, `creationTime`, `creator_Id`, `imageUrl`) VALUES
(1, 1, 'Question-01', '', '2023-03-26 18:18:58', 1, 'includes/images/img.png'),
(2, 1, 'Question-02', '', '2023-03-26 18:18:58', 1, ''),
(3, 1, 'Question-03', '', '2023-03-26 18:18:58', 1, 'includes/images/img.png'),
(4, 1, 'Question-04', '', '2023-03-26 18:18:58', 1, ''),
(5, 1, 'Question-05', '', '2023-03-26 18:18:58', 1, ''),
(6, 1, 'Question-06', '', '2023-03-26 18:18:58', 1, 'includes/images/img.png'),
(7, 1, 'Question-07', '', '2023-03-26 18:18:58', 1, ''),
(8, 1, 'Question-08', '', '2023-03-26 18:18:58', 1, ''),
(9, 1, 'Question-09', '', '2023-03-26 18:18:58', 1, 'includes/images/img.png'),
(10, 1, 'Question-10', '', '2023-03-26 18:18:58', 1, ''),
(11, 1, 'Question-11', '', '2023-03-26 18:18:58', 1, 'includes/images/img.png'),
(12, 1, 'Question-12', '', '2023-03-26 18:18:58', 1, ''),
(13, 1, 'Question-13', '', '2023-03-26 18:18:58', 1, ''),
(14, 1, 'Question-14', '', '2023-03-26 18:18:58', 1, 'includes/images/img.png'),
(15, 1, 'Question-15', '', '2023-03-26 18:18:58', 1, ''),
(16, 1, 'Question-16', '', '2023-03-26 18:18:58', 1, ''),
(17, 1, 'Question-17', '', '2023-03-26 18:18:58', 1, ''),
(18, 1, 'Question-18', '', '2023-03-26 18:18:58', 1, ''),
(19, 1, 'Question-19', '', '2023-03-26 18:18:58', 1, ''),
(20, 1, 'Question-20', '', '2023-03-26 18:18:58', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `roleId` tinyint(4) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `emailAddress` varchar(200) DEFAULT NULL,
  `mobileNumber` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `creationTIme` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `isActive`, `roleId`, `fullName`, `userName`, `emailAddress`, `mobileNumber`, `password`, `creationTIme`) VALUES
(1, 1, 1, 'Bijay Admin', 'admin1', 'bijay.adhikari.27648@gmail.com', '+977-9865413772', 'admin1', '2023-03-26 13:40:21'),
(2, 1, 2, 'Bijay Student', 'user1', 'bijay.adhikari.27648@gmail.com', '+977-9865413772', 'user1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `roleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `roleName`) VALUES
(1, 'Admin'),
(3, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_played`
--
ALTER TABLE `quiz_played`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_played_answered`
--
ALTER TABLE `quiz_played_answered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roleName` (`roleName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_options`
--
ALTER TABLE `quiz_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `quiz_played`
--
ALTER TABLE `quiz_played`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz_played_answered`
--
ALTER TABLE `quiz_played_answered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
