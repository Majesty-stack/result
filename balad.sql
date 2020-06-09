-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 05:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `balad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-05-13 11:18:49'),
(2, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-10-01 07:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE IF NOT EXISTS `tblclasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` varchar(80) DEFAULT NULL,
  `Exam` varchar(20) NOT NULL,
  `Session` varchar(7) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `Exam`, `Session`, `CreationDate`, `UpdationDate`) VALUES
(43, 'JSS1', 'Third-term', '20/21', '2020-04-22 21:24:12', '2020-05-15 11:18:15'),
(44, 'JSS2A', 'Third-term', '20/21', '2020-04-22 21:24:22', '2020-05-16 05:40:13'),
(45, 'JSS2B', 'Second-term', '20/21', '2020-04-22 21:24:31', '0000-00-00 00:00:00'),
(46, 'JSS3', 'Second-term', '20/21', '2020-04-22 21:24:42', '0000-00-00 00:00:00'),
(47, 'SS1', 'Second-term', '20/21', '2020-04-22 21:24:54', '0000-00-00 00:00:00'),
(48, 'SS2', 'Second-term', '20/21', '2020-04-22 21:25:05', '0000-00-00 00:00:00'),
(49, 'SS3', 'Second-term', '20/21', '2020-04-22 21:25:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE IF NOT EXISTS `tblresult` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `CA` varchar(11) DEFAULT NULL,
  `CASS` varchar(11) NOT NULL,
  `marks` varchar(11) NOT NULL,
  `FirstTerm` varchar(6) NOT NULL,
  `SecondTerm` varchar(11) NOT NULL,
  `ThirdTerm` varchar(6) NOT NULL,
  `Average` int(11) NOT NULL,
  `Open` int(5) NOT NULL,
  `Present` int(5) NOT NULL,
  `Absent` int(5) NOT NULL,
  `Resume` varchar(15) NOT NULL,
  `Comment1` text NOT NULL,
  `Comment2` text NOT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2508 ;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `CA`, `CASS`, `marks`, `FirstTerm`, `SecondTerm`, `ThirdTerm`, `Average`, `Open`, `Present`, `Absent`, `Resume`, `Comment1`, `Comment2`, `PostingDate`, `UpdationDate`) VALUES
(2468, 133, 43, 70, '12', '13', '56', '78', '67', '81', 75, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-07 07:00:17', '2020-06-09 14:41:50'),
(2469, 133, 43, 72, '13', '10', '60', '89', '90', '83', 87, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-07 07:00:17', '2020-06-09 14:41:50'),
(2470, 133, 43, 68, '14', '12', '45', '45', '67', '71', 61, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-07 07:00:17', '2020-06-09 14:41:50'),
(2471, 133, 43, 69, '12', '14', '56', '78', '67', '82', 76, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-07 07:00:17', '2020-06-09 14:41:50'),
(2472, 133, 43, 75, '15', '17', '56', '78', '46', '88', 71, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-07 07:00:17', '2020-06-09 14:38:23'),
(2473, 133, 43, 67, '17', '18', '45', '56', '78', '80', 71, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-07 07:00:17', '2020-06-09 14:38:23'),
(2474, 133, 43, 71, '18', '13', '45', '78', '89', '70', 79, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-07 07:00:17', '2020-06-09 14:53:25'),
(2475, 133, 43, 71, '12', '2', '56', '78', '89', '70', 79, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-07 07:00:17', '2020-06-09 14:53:25'),
(2476, 133, 43, 73, '14', '15', '56', '78', '89', '85', 84, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-07 07:00:18', '2020-06-09 14:41:50'),
(2477, 133, 43, 66, '12', '13', '56', '78', '78', '81', 79, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-07 07:00:18', '2020-06-09 14:41:50'),
(2478, 134, 43, 70, '12', '13', '45', '50', '67', '70', 62, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 12:20:50', '2020-06-09 14:49:48'),
(2479, 134, 43, 72, '12', '15', '56', '78', '89', '83', 83, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 12:20:50', '2020-06-09 14:49:48'),
(2480, 134, 43, 68, '12', '13', '45', '78', '90', '70', 79, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 12:20:50', '2020-06-09 14:49:48'),
(2481, 134, 43, 69, '12', '13', '45', '67', '78', '70', 72, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 12:20:50', '2020-06-09 14:49:48'),
(2482, 134, 43, 75, '12', '14', '56', '56', '78', '82', 72, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 12:20:50', '2020-06-09 14:49:48'),
(2483, 134, 43, 67, '12', '14', '56', '78', '100', '82', 87, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 12:20:50', '2020-06-09 14:49:48'),
(2484, 134, 43, 71, '14', '14', '12', '34', '45', '39', 36, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 12:20:50', '2020-06-09 14:57:03'),
(2485, 134, 43, 71, '14', '12', '13', '45', '23', '39', 36, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 12:20:51', '2020-06-09 14:57:03'),
(2486, 134, 43, 73, '12', '20', '56', '36', '78', '88', 67, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 12:20:51', '2020-06-09 14:49:48'),
(2487, 134, 43, 66, '12', '13', '15', '67', '56', '40', 54, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 12:20:51', '2020-06-09 14:49:48'),
(2488, 135, 44, 70, '12', '13', '40', '56', '57', '65', 59, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 14:30:15', '2020-06-09 14:58:31'),
(2489, 135, 44, 68, '12', '13', '45', '67', '89', '70', 75, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 14:30:15', '2020-06-09 14:58:31'),
(2490, 135, 44, 69, '12', '13', '56', '78', '90', '81', 83, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 14:30:15', '2020-06-09 14:58:31'),
(2491, 135, 44, 75, '12', '13', '45', '56', '89', '70', 72, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 14:30:15', '2020-06-09 14:58:31'),
(2492, 135, 44, 67, '12', '15', '37', '89', '89', '64', 81, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 14:30:15', '2020-06-09 14:58:30'),
(2493, 135, 44, 71, '12', '14', '55', '89', '89', '81', 86, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 14:30:15', '2020-06-09 14:58:31'),
(2494, 135, 44, 73, '12', '15', '55', '78', '89', '37', 39, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 14:30:15', '2020-06-09 14:58:31'),
(2495, 135, 44, 73, '11', '13', '13', '23', '56', '37', 39, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 14:30:15', '2020-06-09 14:58:31'),
(2496, 135, 44, 66, '12', '14', '56', '34', '56', '82', 57, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 14:30:15', '2020-06-09 14:58:30'),
(2497, 135, 44, 74, '12', '13', '45', '12', '34', '70', 39, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 14:30:15', '2020-06-09 14:58:31'),
(2498, 136, 43, 70, '12', '13', '34', '45', '67', '59', 57, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 15:07:53', '2020-06-09 15:20:38'),
(2499, 136, 43, 72, '12', '14', '23', '45', '67', '49', 54, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 15:07:53', '2020-06-09 15:20:38'),
(2500, 136, 43, 68, '12', '13', '34', '56', '78', '59', 64, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 15:07:53', '2020-06-09 15:20:38'),
(2501, 136, 43, 69, '13', '15', '60', '89', '78', '88', 85, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 15:07:53', '2020-06-09 15:20:38'),
(2502, 136, 43, 75, '12', '13', '45', '78', '56', '70', 68, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 15:07:53', '2020-06-09 15:20:39'),
(2503, 136, 43, 67, '8', '9', '34', '78', '90', '51', 73, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 15:07:53', '2020-06-09 15:20:38'),
(2504, 136, 43, 71, '12', '13', '45', '67', '89', '86', 88, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 15:07:53', '2020-06-09 15:20:38'),
(2505, 136, 43, 71, '12', '14', '60', '89', '90', '86', 88, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 15:07:53', '2020-06-09 15:20:38'),
(2506, 136, 43, 73, '12', '14', '60', '45', '56', '86', 62, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 15:07:53', '2020-06-09 15:20:39'),
(2507, 136, 43, 66, '12', '14', '56', '78', '90', '82', 83, 112, 101, 7, '21/7/2020', 'Good result,promoted to the next class', 'Amusa is a good boy.', '2020-06-09 15:07:53', '2020-06-09 15:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE IF NOT EXISTS `tblstudents` (
  `StudentId` int(11) NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(100) NOT NULL,
  `AdmissionNumber` int(15) NOT NULL,
  `RollId` int(15) NOT NULL,
  `State` varchar(100) NOT NULL,
  `TelephoneNumber` varchar(15) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Age` varchar(100) NOT NULL,
  `Scores` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`StudentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `AdmissionNumber`, `RollId`, `State`, `TelephoneNumber`, `Address`, `Sex`, `Age`, `Scores`, `image`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(133, 'Amusa Quadri', 2525, 2525, 'OYO', '08060076346', 'Alhaji', 'Male', '12', 764, 'upload/1591512968.jpg', 43, '2020-06-07 06:56:07', '2020-06-07 07:01:05', 1),
(134, 'Hammed Lawal', 2626, 2626, 'Kano', '08060076346', 'lagos', 'Male', '12', 652, 'upload/1591704918.jpg', 43, '2020-06-09 12:15:18', '2020-06-09 12:22:29', 1),
(135, 'Adebayo Fumilola', 2727, 2727, 'KWARA', '08060076346', 'LAGAO', 'Male', '13', 674, 'upload/1591712778.jpg', 44, '2020-06-09 14:26:18', '2020-06-09 14:30:55', 1),
(136, 'Olawale lawal', 2828, 2828, 'OYO', '08060076346', 'LAGOS', 'Male', '12', 710, 'upload/1591714892.jpg', 43, '2020-06-09 15:01:31', '2020-06-09 15:20:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE IF NOT EXISTS `tblsubjectcombination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(81, 43, 66, 1, '2020-04-22 21:40:34', '2020-04-22 21:40:34'),
(82, 43, 67, 1, '2020-04-22 21:40:41', '2020-04-22 21:40:41'),
(83, 43, 68, 1, '2020-04-22 21:40:49', '2020-04-22 21:40:49'),
(84, 43, 69, 1, '2020-04-22 21:40:57', '2020-04-22 21:40:57'),
(85, 43, 70, 1, '2020-04-22 21:41:12', '2020-04-22 21:41:12'),
(86, 43, 71, 0, '2020-04-22 21:41:21', '2020-04-22 21:41:21'),
(87, 43, 71, 1, '2020-04-22 21:41:32', '2020-04-22 21:41:32'),
(88, 43, 72, 1, '2020-04-22 21:41:41', '2020-04-22 21:41:41'),
(89, 43, 73, 1, '2020-04-22 21:41:50', '2020-04-22 21:41:50'),
(90, 43, 74, 1, '2020-04-22 21:42:01', '2020-04-22 21:42:01'),
(91, 43, 75, 1, '2020-04-22 21:42:17', '2020-04-22 21:42:17'),
(92, 49, 66, 1, '2020-05-07 14:32:31', '2020-05-07 14:32:31'),
(93, 49, 67, 1, '2020-05-07 14:32:50', '2020-05-07 14:32:50'),
(94, 49, 73, 1, '2020-05-07 14:33:11', '2020-05-07 14:33:11'),
(95, 49, 74, 1, '2020-05-07 14:33:23', '2020-05-07 14:33:23'),
(96, 49, 75, 1, '2020-05-07 14:33:37', '2020-05-07 14:33:37'),
(97, 49, 76, 1, '2020-05-07 14:33:55', '2020-05-07 14:33:55'),
(98, 49, 78, 1, '2020-05-07 14:34:09', '2020-05-07 14:34:09'),
(99, 48, 66, 1, '2020-05-07 14:34:24', '2020-05-07 14:34:24'),
(100, 49, 79, 1, '2020-05-07 14:34:30', '2020-05-07 14:34:30'),
(101, 48, 67, 1, '2020-05-07 14:34:32', '2020-05-07 14:34:32'),
(102, 49, 80, 1, '2020-05-07 14:34:44', '2020-05-07 14:34:44'),
(103, 48, 73, 1, '2020-05-07 14:34:49', '2020-05-07 14:34:49'),
(104, 48, 74, 1, '2020-05-07 14:35:04', '2020-05-07 14:35:04'),
(105, 48, 75, 1, '2020-05-07 14:35:13', '2020-05-07 14:35:13'),
(106, 49, 78, 1, '2020-05-07 14:35:21', '2020-05-07 14:35:21'),
(107, 48, 71, 1, '2020-05-07 14:35:46', '2020-05-07 14:35:46'),
(108, 48, 80, 1, '2020-05-07 14:36:04', '2020-05-07 14:36:04'),
(109, 48, 79, 1, '2020-05-07 14:36:18', '2020-05-07 14:36:18'),
(110, 48, 74, 1, '2020-05-07 14:38:40', '2020-05-07 14:38:40'),
(111, 44, 66, 1, '2020-05-16 05:41:38', '2020-05-16 05:41:38'),
(112, 44, 67, 1, '2020-05-16 05:41:46', '2020-05-16 05:41:46'),
(113, 44, 68, 1, '2020-05-16 05:41:54', '2020-05-16 05:41:54'),
(114, 44, 69, 1, '2020-05-16 05:42:03', '2020-05-16 05:42:03'),
(115, 44, 70, 1, '2020-05-16 05:42:12', '2020-05-16 05:42:12'),
(116, 44, 71, 1, '2020-05-16 05:42:22', '2020-05-16 05:42:22'),
(117, 44, 73, 1, '2020-05-16 05:42:30', '2020-05-16 05:42:30'),
(118, 44, 73, 1, '2020-05-16 05:42:41', '2020-05-16 05:42:41'),
(119, 44, 74, 1, '2020-05-16 05:42:49', '2020-05-16 05:42:49'),
(120, 44, 75, 1, '2020-05-16 05:43:02', '2020-05-16 05:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectTeacher` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectTeacher`, `Creationdate`, `UpdationDate`) VALUES
(66, 'MATHS', 'MR Eletu', '2020-04-22 21:35:51', '0000-00-00 00:00:00'),
(67, 'ENGLISH', 'Mrs salami', '2020-04-22 21:36:04', '0000-00-00 00:00:00'),
(68, 'BASIC SCIENCE', 'MRS AYORINDE', '2020-04-22 21:36:23', '0000-00-00 00:00:00'),
(69, 'BASIC TECH', 'MR Jamiu', '2020-04-22 21:36:41', '0000-00-00 00:00:00'),
(70, 'Agric Science', 'MRS AYORINDE', '2020-04-22 21:37:15', '0000-00-00 00:00:00'),
(71, 'ICT', 'Mr Amusa', '2020-04-22 21:37:41', '0000-00-00 00:00:00'),
(72, 'Arabic Edu.', 'Mr Azeez', '2020-04-22 21:38:43', '0000-00-00 00:00:00'),
(73, 'Islamic Studies', 'Mr Ismail', '2020-04-22 21:39:20', '0000-00-00 00:00:00'),
(74, 'YORUBA', 'Mrs', '2020-04-22 21:39:49', '0000-00-00 00:00:00'),
(75, 'CIVIC EDU', 'MRS Kehinde', '2020-04-22 21:40:07', '0000-00-00 00:00:00'),
(76, 'Literature ', 'Mr Salaudeen ', '2020-05-07 14:20:06', '0000-00-00 00:00:00'),
(77, 'Mathematics ', 'Mr Abdul Rahim', '2020-05-07 14:20:50', '0000-00-00 00:00:00'),
(78, 'Government ', 'Mr Abdul Lateef', '2020-05-07 14:21:17', '0000-00-00 00:00:00'),
(79, 'Economic ', 'Mr Taiwo', '2020-05-07 14:21:55', '0000-00-00 00:00:00'),
(80, 'Biology ', 'Mr Abdul Rauf', '2020-05-07 14:22:20', '0000-00-00 00:00:00'),
(81, 'English Language ', 'Mr Oyekan', '2020-05-07 14:22:50', '0000-00-00 00:00:00'),
(82, 'Yoruba Language ', 'Mrs Yetunde', '2020-05-07 14:23:25', '0000-00-00 00:00:00'),
(83, 'Civic Education ', 'Mr Bolaji', '2020-05-07 14:23:56', '0000-00-00 00:00:00'),
(84, 'Islamic Studies ', 'Mr Abdullahi', '2020-05-07 14:24:29', '0000-00-00 00:00:00'),
(85, 'Mathematics', 'Shobayo', '2020-05-07 15:10:33', '0000-00-00 00:00:00'),
(86, 'English', 'Oyekan', '2020-05-07 15:10:52', '0000-00-00 00:00:00'),
(87, 'Yoruba', 'Mr akin', '2020-05-07 15:11:19', '0000-00-00 00:00:00'),
(88, 'Literature', 'Mr salaudeen', '2020-05-07 15:11:59', '0000-00-00 00:00:00'),
(89, 'Government', 'Mr quadri', '2020-05-07 15:12:29', '0000-00-00 00:00:00'),
(90, 'Islamic', 'Mr Akeem', '2020-05-07 15:13:24', '0000-00-00 00:00:00'),
(91, 'Agricu', 'Mr lateef', '2020-05-07 15:14:17', '0000-00-00 00:00:00'),
(92, 'Economic', 'Mrs fayemiwo', '2020-05-07 15:15:05', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
