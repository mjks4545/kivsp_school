-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2016 at 04:52 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kivsp_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(18) NOT NULL,
  `cno` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `coments` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pwd`, `cno`, `address`, `coments`, `status`, `created_at`) VALUES
(1, 'admin', 'admin@seedsschool.com', 'admin', '00923429818632', 'GHQ Peshawar', '1st Admin', 1, '06/09/2016 03:43 pm');

-- --------------------------------------------------------

--
-- Table structure for table `auto_fee_genarate`
--

CREATE TABLE `auto_fee_genarate` (
  `id` int(11) NOT NULL,
  `auto_month` varchar(20) NOT NULL,
  `auto_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(150) NOT NULL,
  `b_account_no` varchar(25) NOT NULL,
  `b_branch` varchar(300) NOT NULL,
  `b_account_title` varchar(300) NOT NULL,
  `b_date` varchar(25) NOT NULL,
  `b_month` varchar(20) NOT NULL,
  `b_year` varchar(10) NOT NULL,
  `b_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`b_id`, `b_name`, `b_account_no`, `b_branch`, `b_account_title`, `b_date`, `b_month`, `b_year`, `b_status`) VALUES
(1, 'habib bank limited', '123456789', 'peshawar', 'saving', '02-Aug-2016 16:0 pm', 'Aug', '2016', '1'),
(2, 'habib bank limited', '222131231232', 'mardan', 'saving', '02-Aug-2016 16:0 pm', 'Aug', '2016', '1'),
(3, 'national bank ', '4353424324324323', 'karachi', 'home', '03-Aug-2016 15:0 pm', 'Aug', '2016', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bank_transection`
--

CREATE TABLE `bank_transection` (
  `t_id` bigint(20) NOT NULL,
  `fkbank_id` int(50) NOT NULL,
  `t_amount` varchar(300) NOT NULL,
  `t_chknum` varchar(25) DEFAULT NULL,
  `t_way` varchar(25) NOT NULL,
  `t_type` tinyint(1) NOT NULL,
  `t_detail` varchar(300) DEFAULT NULL,
  `t_date` varchar(25) NOT NULL,
  `t_time` varchar(20) NOT NULL,
  `t_month` varchar(10) NOT NULL,
  `t_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_transection`
--

INSERT INTO `bank_transection` (`t_id`, `fkbank_id`, `t_amount`, `t_chknum`, `t_way`, `t_type`, `t_detail`, `t_date`, `t_time`, `t_month`, `t_year`) VALUES
(6, 1, '3000', '12312321312321', 'cheque', 1, 'take from ali', '02-Aug-2016', '07:02 pm', 'Aug', '2016'),
(7, 1, '2000', NULL, 'online', 0, 'paid to asad', '02-Aug-2016', '07:02 pm', 'Aug', '2016'),
(8, 1, '3000', '12312321312321', 'cash', 1, 'take from ali', '02-Aug-2016', '07:02 pm', 'Aug', '2016'),
(9, 1, '3000', NULL, 'online', 1, 'this is paid by asad @ which can be convereted to some other one whichadas  asd as d asd as d as d asd as d asd as das d as as d asd asd as das d asd sa das das d asd asd sa das dsad asd as dsa dsa dsa das das das d as', '03-Aug-2016', '08:56 pm', 'Aug', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cl_id` bigint(20) NOT NULL,
  `su_id` bigint(20) NOT NULL,
  `co_id` bigint(20) NOT NULL,
  `t_id` bigint(11) NOT NULL,
  `fee` varchar(6) NOT NULL,
  `time` varchar(50) NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `e_date` varchar(15) NOT NULL,
  `class_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cl_id`, `su_id`, `co_id`, `t_id`, `fee`, `time`, `s_date`, `date`, `e_date`, `class_status`) VALUES
(5, 2, 1, 1, '2000', '10:00-11:00', '01-Jul-2016', '14-Jul-2016', '01-Nov-2016', 1),
(6, 3, 1, 1, '3000', '12:00-01:00', '10-Jul-2016', '14-Jul-2016', '10-Nov-2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_course`
--

CREATE TABLE `class_course` (
  `class_course_id` int(11) NOT NULL,
  `class_course_name` varchar(255) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `updated_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_course`
--

INSERT INTO `class_course` (`class_course_id`, `class_course_name`, `updated_date`, `updated_time`) VALUES
(1, 'I', '23-Aug-2016', '04:23:44pm'),
(2, 'II\r\n', '23-Aug-2016', '04:24:10pm');

-- --------------------------------------------------------

--
-- Table structure for table `class_sections`
--

CREATE TABLE `class_sections` (
  `c_section_id` int(11) NOT NULL,
  `c_section_name` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `class_course_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `updated_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_sections`
--

INSERT INTO `class_sections` (`c_section_id`, `c_section_name`, `subjects`, `class_course_id`, `co_id`, `created_date`, `created_time`, `updated_date`, `updated_time`) VALUES
(1, 'A', 'Maths', 1, 1, '24-Aug-2016', '12:26:31pm', '', ''),
(2, 'B', 'Biology', 1, 1, '24-Aug-2016', '12:27:46pm', '', ''),
(3, 'C', 'Physics', 1, 1, '24-Aug-2016', '12:27:54pm', '', ''),
(4, 'D', 'Chemistry', 1, 1, '24-Aug-2016', '12:28:01pm', '', ''),
(5, 'A', 'Maths', 1, 2, '24-Aug-2016', '12:28:08pm', '', ''),
(6, 'B', 'Biology', 1, 2, '24-Aug-2016', '12:28:18pm', '', ''),
(7, 'C', 'Physics', 1, 2, '24-Aug-2016', '12:28:40pm', '', ''),
(8, 'D', 'Chemistry', 1, 2, '24-Aug-2016', '12:28:48pm', '', ''),
(9, 'A', 'Maths', 2, 1, '24-Aug-2016', '12:28:57pm', '', ''),
(10, 'B', 'Biology', 2, 1, '24-Aug-2016', '12:29:04pm', '', ''),
(11, 'C', 'Physics', 2, 1, '24-Aug-2016', '12:29:20pm', '', ''),
(12, 'D', 'Chemistry', 2, 1, '24-Aug-2016', '12:29:28pm', '', ''),
(13, 'A', 'Maths', 2, 2, '24-Aug-2016', '12:29:34pm', '', ''),
(14, 'B', 'Biology', 2, 2, '24-Aug-2016', '12:29:42pm', '', ''),
(15, 'C', 'Physics', 2, 2, '24-Aug-2016', '12:29:52pm', '', ''),
(16, 'D', 'Chemistry', 2, 2, '24-Aug-2016', '12:30:00pm', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `co_id` bigint(20) NOT NULL,
  `co_name` varchar(50) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `created_time` varchar(100) NOT NULL,
  `updated_date` varchar(100) NOT NULL,
  `updated_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`co_id`, `co_name`, `created_date`, `created_time`, `updated_date`, `updated_time`) VALUES
(1, 'DVM', '14-Jun-2016', '03:41:01pm', '23-Aug-2016', '04:23:44pm'),
(2, 'DVS', '22-Aug-2016', '08:07:33pm', '23-Aug-2016', '04:25:35pm');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `e_id` int(11) NOT NULL,
  `e_date` varchar(15) NOT NULL,
  `e_title` varchar(300) NOT NULL,
  `e_bg` varchar(10) NOT NULL,
  `e_status` int(11) NOT NULL DEFAULT '1',
  `e_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `e_date`, `e_title`, `e_bg`, `e_status`, `e_type`) VALUES
(1, '02-Jul-2016', 'Saturday', '#F79F81', 1, 0),
(2, '03-Jul-2016', 'Sunday', '#F5A9A9', 1, 0),
(3, '09-Jul-2016', 'Saturday', '#F79F81', 1, 0),
(4, '10-Jul-2016', 'Sunday', '#F5A9A9', 1, 0),
(5, '16-Jul-2016', 'Saturday', '#F79F81', 1, 0),
(6, '17-Jul-2016', 'Sunday', '#F5A9A9', 1, 0),
(7, '23-Jul-2016', 'Saturday', '#F79F81', 1, 0),
(8, '24-Jul-2016', 'Sunday', '#F5A9A9', 1, 0),
(9, '30-Jul-2016', 'Saturday', '#F79F81', 1, 0),
(10, '31-Jul-2016', 'Sunday', '#F5A9A9', 1, 0),
(11, '06-Aug-2016', 'Saturday', '#F79F81', 1, 0),
(12, '07-Aug-2016', 'Sunday', '#F5A9A9', 1, 0),
(13, '13-Aug-2016', 'Saturday', '#F79F81', 1, 0),
(14, '14-Aug-2016', 'Sunday', '#F5A9A9', 1, 0),
(15, '20-Aug-2016', 'Saturday', '#F79F81', 1, 0),
(16, '21-Aug-2016', 'Sunday', '#F5A9A9', 1, 0),
(17, '27-Aug-2016', 'Saturday', '#F79F81', 1, 0),
(18, '28-Aug-2016', 'Sunday', '#F5A9A9', 1, 0),
(19, '10-Aug-2016', 'meeting with teacher', '#92896d', 1, 1),
(20, '11-Aug-2016', 'metting', '#00ff00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `e_id` int(11) NOT NULL,
  `field_study` varchar(100) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `class_course_id` int(11) NOT NULL,
  `class_section_name` varchar(100) NOT NULL,
  `exam_date` varchar(100) NOT NULL,
  `exam_month` varchar(100) NOT NULL,
  `exam_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`e_id`, `field_study`, `exam_type`, `class_course_id`, `class_section_name`, `exam_date`, `exam_month`, `exam_marks`) VALUES
(1, 'DVM', '1stterm', 1, 'A', '2016-08-18', 'may', 2323),
(2, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 33434),
(3, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 33434),
(4, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(5, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(6, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(7, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(8, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(9, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(10, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(11, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(12, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(13, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(14, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(15, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(16, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(17, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(18, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(19, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(20, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(21, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(22, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(23, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 2323),
(24, 'DVM', '0', 1, 'A', '08/11/2016', 'february', 2323),
(25, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3243),
(26, 'DVM', '1stterm', 1, 'A', '2016-08-11', 'june', 232),
(27, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3243),
(28, 'DVM', '1stterm', 1, 'A', '2016-08-11', 'june', 232),
(29, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3243),
(30, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3243),
(31, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3243),
(32, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(33, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(34, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(35, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(36, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(37, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(38, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(39, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(40, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(41, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(42, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(43, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(44, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(45, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(46, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 34234),
(47, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(48, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(49, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(50, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(51, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(52, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(53, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(54, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(55, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(56, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(57, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(58, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(59, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(60, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(61, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(62, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(63, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(64, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(65, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(66, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(67, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(68, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(69, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(70, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(71, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(72, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(73, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(74, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(75, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(76, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(77, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(78, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(79, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(80, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(81, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(82, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(83, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(84, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(85, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(86, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(87, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(88, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(89, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(90, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(91, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(92, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(93, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(94, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(95, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(96, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(97, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(98, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(99, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(100, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(101, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(102, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(103, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(104, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(105, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(106, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(107, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(108, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23213),
(109, 'DVM', '1stterm', 1, 'B', '08/11/2016', 'january', 23123),
(110, 'DVM', '1stterm', 1, 'B', '08/11/2016', 'january', 5454),
(111, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3432),
(112, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3432),
(113, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3432),
(114, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3432),
(115, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2132),
(116, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2132),
(117, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2132),
(118, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2132),
(119, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2132),
(120, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2132),
(121, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2132),
(122, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2132),
(123, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2132),
(124, 'DVM', '1stterm', 1, 'B', '08/11/2016', 'january', 2312),
(125, 'DVM', '1stterm', 1, 'B', '08/11/2016', 'january', 2312),
(126, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(127, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(128, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(129, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(130, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(131, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(132, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(133, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(134, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(135, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(136, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(137, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(138, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(139, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'may', 12312),
(140, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3412),
(141, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3412),
(142, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3412),
(143, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3412),
(144, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 3412),
(145, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 23123),
(146, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2132),
(147, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23123),
(148, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 1232),
(149, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 21312),
(150, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 3123),
(151, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 3232),
(152, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 123),
(153, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 213),
(154, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2312),
(155, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(156, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(157, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(158, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(159, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(160, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(161, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(162, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(163, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(164, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(165, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(166, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(167, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(168, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(169, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(170, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(171, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(172, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(173, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(174, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(175, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(176, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(177, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(178, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(179, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(180, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(181, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(182, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(183, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(184, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 2312),
(185, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23),
(186, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23),
(187, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23),
(188, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23),
(189, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23),
(190, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2312),
(191, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2312),
(192, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2312),
(193, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2312),
(194, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2312),
(195, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2312),
(196, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 213),
(197, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 231),
(198, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(199, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 223),
(200, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 12312),
(201, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 12312),
(202, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 123),
(203, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 2131),
(204, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23),
(205, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 312),
(206, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(207, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 23123),
(208, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 13123),
(209, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(210, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(211, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(212, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(213, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(214, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(215, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(216, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 1231),
(217, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 12312),
(218, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(219, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 123),
(220, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 6565),
(221, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 233),
(222, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'january', 323),
(223, 'DVM', '1stterm', 1, 'B', '08/11/2016', 'july', 233),
(224, 'DVM', '1stterm', 1, 'B', '08/11/2016', 'january', 500),
(225, 'DVM', '2ndterm', 1, 'A', '08/11/2016', 'may', 500),
(226, 'DVM', '1stterm', 1, 'A', '08/11/2016', 'february', 500),
(227, 'DVM', '2ndterm', 1, 'A', '08/11/2016', 'february', 500),
(228, 'DVM', '1stterm', 1, 'A', '2016-08-01', 'january', 500);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `e_r_id` int(11) NOT NULL,
  `marks_obt` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_course_id` int(11) NOT NULL,
  `class_section_name` varchar(100) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`e_r_id`, `marks_obt`, `subject_id`, `student_id`, `course_id`, `class_course_id`, `class_section_name`, `test_id`) VALUES
(1, 22, 1, 2, 1, 1, 'B', 224),
(2, 33, 2, 2, 1, 1, 'B', 224),
(3, 33, 3, 2, 1, 1, 'B', 224),
(4, 33, 4, 2, 1, 1, 'B', 224),
(5, 22, 5, 2, 1, 1, 'B', 224),
(6, 22, 6, 2, 1, 1, 'B', 224),
(7, 22, 7, 2, 1, 1, 'B', 224),
(8, 22, 8, 2, 1, 1, 'B', 224),
(9, 22, 9, 2, 1, 1, 'B', 224),
(10, 22, 10, 2, 1, 1, 'B', 224),
(11, 44, 1, 1, 1, 1, 'A', 227),
(12, 33, 2, 1, 1, 1, 'A', 227),
(13, 22, 3, 1, 1, 1, 'A', 227),
(14, 66, 4, 1, 1, 1, 'A', 227),
(15, 88, 5, 1, 1, 1, 'A', 227),
(16, 9, 6, 1, 1, 1, 'A', 227),
(17, 7, 7, 1, 1, 1, 'A', 227),
(18, 65, 8, 1, 1, 1, 'A', 227),
(19, 4, 9, 1, 1, 1, 'A', 227),
(20, 3, 10, 1, 1, 1, 'A', 227),
(21, 22, 1, 8, 1, 1, 'A', 227),
(22, 11, 2, 8, 1, 1, 'A', 227),
(23, 22, 3, 8, 1, 1, 'A', 227),
(24, 33, 4, 8, 1, 1, 'A', 227),
(25, 22, 5, 8, 1, 1, 'A', 227),
(26, 11, 6, 8, 1, 1, 'A', 227),
(27, 33, 7, 8, 1, 1, 'A', 227),
(28, 22, 8, 8, 1, 1, 'A', 227),
(29, 44, 9, 8, 1, 1, 'A', 227),
(30, 22, 10, 8, 1, 1, 'A', 227),
(31, 44, 1, 1, 1, 1, 'A', 227),
(32, 33, 2, 1, 1, 1, 'A', 227),
(33, 22, 3, 1, 1, 1, 'A', 227),
(34, 66, 4, 1, 1, 1, 'A', 227),
(35, 88, 5, 1, 1, 1, 'A', 227),
(36, 9, 6, 1, 1, 1, 'A', 227),
(37, 7, 7, 1, 1, 1, 'A', 227),
(38, 65, 8, 1, 1, 1, 'A', 227),
(39, 4, 9, 1, 1, 1, 'A', 227),
(40, 3, 10, 1, 1, 1, 'A', 227),
(41, 22, 1, 8, 1, 1, 'A', 227),
(42, 11, 2, 8, 1, 1, 'A', 227),
(43, 22, 3, 8, 1, 1, 'A', 227),
(44, 33, 4, 8, 1, 1, 'A', 227),
(45, 22, 5, 8, 1, 1, 'A', 227),
(46, 11, 6, 8, 1, 1, 'A', 227),
(47, 33, 7, 8, 1, 1, 'A', 227),
(48, 22, 8, 8, 1, 1, 'A', 227),
(49, 44, 9, 8, 1, 1, 'A', 227),
(50, 22, 10, 8, 1, 1, 'A', 227),
(51, 44, 1, 1, 1, 1, 'A', 227),
(52, 33, 2, 1, 1, 1, 'A', 227),
(53, 22, 3, 1, 1, 1, 'A', 227),
(54, 66, 4, 1, 1, 1, 'A', 227),
(55, 88, 5, 1, 1, 1, 'A', 227),
(56, 9, 6, 1, 1, 1, 'A', 227),
(57, 7, 7, 1, 1, 1, 'A', 227),
(58, 65, 8, 1, 1, 1, 'A', 227),
(59, 4, 9, 1, 1, 1, 'A', 227),
(60, 3, 10, 1, 1, 1, 'A', 227),
(61, 22, 1, 8, 1, 1, 'A', 227),
(62, 11, 2, 8, 1, 1, 'A', 227),
(63, 22, 3, 8, 1, 1, 'A', 227),
(64, 33, 4, 8, 1, 1, 'A', 227),
(65, 22, 5, 8, 1, 1, 'A', 227),
(66, 11, 6, 8, 1, 1, 'A', 227),
(67, 33, 7, 8, 1, 1, 'A', 227),
(68, 22, 8, 8, 1, 1, 'A', 227),
(69, 44, 9, 8, 1, 1, 'A', 227),
(70, 22, 10, 8, 1, 1, 'A', 227),
(71, 44, 1, 1, 1, 1, 'A', 227),
(72, 33, 2, 1, 1, 1, 'A', 227),
(73, 22, 3, 1, 1, 1, 'A', 227),
(74, 66, 4, 1, 1, 1, 'A', 227),
(75, 88, 5, 1, 1, 1, 'A', 227),
(76, 9, 6, 1, 1, 1, 'A', 227),
(77, 7, 7, 1, 1, 1, 'A', 227),
(78, 65, 8, 1, 1, 1, 'A', 227),
(79, 4, 9, 1, 1, 1, 'A', 227),
(80, 3, 10, 1, 1, 1, 'A', 227),
(81, 22, 1, 8, 1, 1, 'A', 227),
(82, 11, 2, 8, 1, 1, 'A', 227),
(83, 22, 3, 8, 1, 1, 'A', 227),
(84, 33, 4, 8, 1, 1, 'A', 227),
(85, 22, 5, 8, 1, 1, 'A', 227),
(86, 11, 6, 8, 1, 1, 'A', 227),
(87, 33, 7, 8, 1, 1, 'A', 227),
(88, 22, 8, 8, 1, 1, 'A', 227),
(89, 44, 9, 8, 1, 1, 'A', 227),
(90, 22, 10, 8, 1, 1, 'A', 227),
(91, 44, 1, 1, 1, 1, 'A', 227),
(92, 33, 2, 1, 1, 1, 'A', 227),
(93, 22, 3, 1, 1, 1, 'A', 227),
(94, 66, 4, 1, 1, 1, 'A', 227),
(95, 88, 5, 1, 1, 1, 'A', 227),
(96, 9, 6, 1, 1, 1, 'A', 227),
(97, 7, 7, 1, 1, 1, 'A', 227),
(98, 65, 8, 1, 1, 1, 'A', 227),
(99, 4, 9, 1, 1, 1, 'A', 227),
(100, 3, 10, 1, 1, 1, 'A', 227),
(101, 22, 1, 8, 1, 1, 'A', 227),
(102, 11, 2, 8, 1, 1, 'A', 227),
(103, 22, 3, 8, 1, 1, 'A', 227),
(104, 33, 4, 8, 1, 1, 'A', 227),
(105, 22, 5, 8, 1, 1, 'A', 227),
(106, 11, 6, 8, 1, 1, 'A', 227),
(107, 33, 7, 8, 1, 1, 'A', 227),
(108, 22, 8, 8, 1, 1, 'A', 227),
(109, 44, 9, 8, 1, 1, 'A', 227),
(110, 22, 10, 8, 1, 1, 'A', 227),
(111, 44, 1, 1, 1, 1, 'A', 227),
(112, 33, 2, 1, 1, 1, 'A', 227),
(113, 22, 3, 1, 1, 1, 'A', 227),
(114, 66, 4, 1, 1, 1, 'A', 227),
(115, 88, 5, 1, 1, 1, 'A', 227),
(116, 9, 6, 1, 1, 1, 'A', 227),
(117, 7, 7, 1, 1, 1, 'A', 227),
(118, 65, 8, 1, 1, 1, 'A', 227),
(119, 4, 9, 1, 1, 1, 'A', 227),
(120, 3, 10, 1, 1, 1, 'A', 227),
(121, 22, 1, 8, 1, 1, 'A', 227),
(122, 11, 2, 8, 1, 1, 'A', 227),
(123, 22, 3, 8, 1, 1, 'A', 227),
(124, 33, 4, 8, 1, 1, 'A', 227),
(125, 22, 5, 8, 1, 1, 'A', 227),
(126, 11, 6, 8, 1, 1, 'A', 227),
(127, 33, 7, 8, 1, 1, 'A', 227),
(128, 22, 8, 8, 1, 1, 'A', 227),
(129, 44, 9, 8, 1, 1, 'A', 227),
(130, 22, 10, 8, 1, 1, 'A', 227),
(131, 44, 1, 1, 1, 1, 'A', 227),
(132, 33, 2, 1, 1, 1, 'A', 227),
(133, 22, 3, 1, 1, 1, 'A', 227),
(134, 66, 4, 1, 1, 1, 'A', 227),
(135, 88, 5, 1, 1, 1, 'A', 227),
(136, 9, 6, 1, 1, 1, 'A', 227),
(137, 7, 7, 1, 1, 1, 'A', 227),
(138, 65, 8, 1, 1, 1, 'A', 227),
(139, 4, 9, 1, 1, 1, 'A', 227),
(140, 3, 10, 1, 1, 1, 'A', 227),
(141, 22, 1, 8, 1, 1, 'A', 227),
(142, 11, 2, 8, 1, 1, 'A', 227),
(143, 22, 3, 8, 1, 1, 'A', 227),
(144, 33, 4, 8, 1, 1, 'A', 227),
(145, 22, 5, 8, 1, 1, 'A', 227),
(146, 11, 6, 8, 1, 1, 'A', 227),
(147, 33, 7, 8, 1, 1, 'A', 227),
(148, 22, 8, 8, 1, 1, 'A', 227),
(149, 44, 9, 8, 1, 1, 'A', 227),
(150, 22, 10, 8, 1, 1, 'A', 227),
(151, 44, 1, 1, 1, 1, 'A', 227),
(152, 33, 2, 1, 1, 1, 'A', 227),
(153, 22, 3, 1, 1, 1, 'A', 227),
(154, 66, 4, 1, 1, 1, 'A', 227),
(155, 88, 5, 1, 1, 1, 'A', 227),
(156, 9, 6, 1, 1, 1, 'A', 227),
(157, 7, 7, 1, 1, 1, 'A', 227),
(158, 65, 8, 1, 1, 1, 'A', 227),
(159, 4, 9, 1, 1, 1, 'A', 227),
(160, 3, 10, 1, 1, 1, 'A', 227),
(161, 22, 1, 8, 1, 1, 'A', 227),
(162, 11, 2, 8, 1, 1, 'A', 227),
(163, 22, 3, 8, 1, 1, 'A', 227),
(164, 33, 4, 8, 1, 1, 'A', 227),
(165, 22, 5, 8, 1, 1, 'A', 227),
(166, 11, 6, 8, 1, 1, 'A', 227),
(167, 33, 7, 8, 1, 1, 'A', 227),
(168, 22, 8, 8, 1, 1, 'A', 227),
(169, 44, 9, 8, 1, 1, 'A', 227),
(170, 22, 10, 8, 1, 1, 'A', 227),
(171, 44, 1, 1, 1, 1, 'A', 227),
(172, 33, 2, 1, 1, 1, 'A', 227),
(173, 22, 3, 1, 1, 1, 'A', 227),
(174, 66, 4, 1, 1, 1, 'A', 227),
(175, 88, 5, 1, 1, 1, 'A', 227),
(176, 9, 6, 1, 1, 1, 'A', 227),
(177, 7, 7, 1, 1, 1, 'A', 227),
(178, 65, 8, 1, 1, 1, 'A', 227),
(179, 4, 9, 1, 1, 1, 'A', 227),
(180, 3, 10, 1, 1, 1, 'A', 227),
(181, 22, 1, 8, 1, 1, 'A', 227),
(182, 11, 2, 8, 1, 1, 'A', 227),
(183, 22, 3, 8, 1, 1, 'A', 227),
(184, 33, 4, 8, 1, 1, 'A', 227),
(185, 22, 5, 8, 1, 1, 'A', 227),
(186, 11, 6, 8, 1, 1, 'A', 227),
(187, 33, 7, 8, 1, 1, 'A', 227),
(188, 22, 8, 8, 1, 1, 'A', 227),
(189, 44, 9, 8, 1, 1, 'A', 227),
(190, 22, 10, 8, 1, 1, 'A', 227),
(191, 44, 1, 1, 1, 1, 'A', 227),
(192, 33, 2, 1, 1, 1, 'A', 227),
(193, 22, 3, 1, 1, 1, 'A', 227),
(194, 66, 4, 1, 1, 1, 'A', 227),
(195, 88, 5, 1, 1, 1, 'A', 227),
(196, 9, 6, 1, 1, 1, 'A', 227),
(197, 7, 7, 1, 1, 1, 'A', 227),
(198, 65, 8, 1, 1, 1, 'A', 227),
(199, 4, 9, 1, 1, 1, 'A', 227),
(200, 3, 10, 1, 1, 1, 'A', 227),
(201, 22, 1, 8, 1, 1, 'A', 227),
(202, 11, 2, 8, 1, 1, 'A', 227),
(203, 22, 3, 8, 1, 1, 'A', 227),
(204, 33, 4, 8, 1, 1, 'A', 227),
(205, 22, 5, 8, 1, 1, 'A', 227),
(206, 11, 6, 8, 1, 1, 'A', 227),
(207, 33, 7, 8, 1, 1, 'A', 227),
(208, 22, 8, 8, 1, 1, 'A', 227),
(209, 44, 9, 8, 1, 1, 'A', 227),
(210, 22, 10, 8, 1, 1, 'A', 227);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_reason` varchar(100) NOT NULL,
  `expense_paid_to` varchar(100) NOT NULL,
  `expense_paid_amount` varchar(100) NOT NULL,
  `expense_month` varchar(20) NOT NULL,
  `expense_year` varchar(20) NOT NULL,
  `expense_created_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_reason`, `expense_paid_to`, `expense_paid_amount`, `expense_month`, `expense_year`, `expense_created_date`) VALUES
(1, 'rent of land', 'asad khan', '1000', 'Jul', '2016', '10-Jul-2016'),
(2, 'karaya', 'amid sabri', '2000', 'Jul', '2016', '02-Jul-2016'),
(3, 'rent of kor', 'asad khan', '1000', 'Jun', '2016', '15-Jun-2016'),
(4, 'rent of land', 'asad khan', '1000', 'Jul', '2016', '14-Jul-2016'),
(5, 'rent of land', 'asad khan', '1000', 'Jul', '2016', '12-Jul-2016'),
(6, 'rent of land', 'asad khan', '1000', 'Jul', '2016', '02-Jul-2016'),
(7, 'rent of land', 'asad khan', '1000', 'Jul', '2016', '30-Jul-2016'),
(8, 'rent', 'asad shah', '20000', 'Aug', '2016', '02-Aug-2016');

-- --------------------------------------------------------

--
-- Table structure for table `otherstaff`
--

CREATE TABLE `otherstaff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `type` varchar(32) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(32) NOT NULL,
  `st_status` varchar(1) NOT NULL DEFAULT '1',
  `created_date` varchar(32) NOT NULL,
  `created_time` varchar(32) NOT NULL,
  `updated_date` varchar(50) NOT NULL,
  `updated_time` varchar(50) NOT NULL,
  `password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otherstaff`
--

INSERT INTO `otherstaff` (`id`, `name`, `contact`, `cnic`, `type`, `salary`, `address`, `email`, `st_status`, `created_date`, `created_time`, `updated_date`, `updated_time`, `password`) VALUES
(1, 'gatekeeper1', '03129236798', '1623122131231', 'gatekeeper', '2000', 'Charsadda,KPK,Pakistan', 'gatekeeper@seeds.com', '1', '14-Jul-2016', '02:46:15pm', '14-Jul-2016', '02:52:25pm', 'asad'),
(2, 'receptionist', '213456789654321', '3456787654321', 'receptionist', '2000', 'peshawar', 'receptionist@seeds.com', '1', '01-Aug-2016', '03:35:33pm', '', '', 'receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendence`
--

CREATE TABLE `staff_attendence` (
  `Staff_att_id` bigint(20) NOT NULL,
  `sta_id` int(11) NOT NULL,
  `status` varchar(300) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_attendence`
--

INSERT INTO `staff_attendence` (`Staff_att_id`, `sta_id`, `status`, `date`, `month`, `year`) VALUES
(1, 1, 'a', '17-Jul-2016', 'Jul', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `staff_salaries`
--

CREATE TABLE `staff_salaries` (
  `id` int(11) NOT NULL,
  `fkstaff_id` varchar(100) NOT NULL,
  `total_salary` varchar(150) NOT NULL,
  `paid_salary` varchar(150) NOT NULL,
  `remaining_salary` varchar(150) NOT NULL,
  `amount_reason` varchar(100) NOT NULL,
  `paid_month` varchar(100) NOT NULL,
  `paid_year` varchar(20) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `created_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_salaries`
--

INSERT INTO `staff_salaries` (`id`, `fkstaff_id`, `total_salary`, `paid_salary`, `remaining_salary`, `amount_reason`, `paid_month`, `paid_year`, `created_date`, `created_time`) VALUES
(1, '1', '2000', '100', '1900', 'month fee', '01', '2016', '30-Jul-2016', '02:55:13pm'),
(2, '1', '2000', '100', '1800', 'paid remains', '01', '2014', '14-Jul-2016', '02:58:22pm'),
(3, '1', '2000', '100', '1700', 'paid remains', '01', '2016', '14-Jul-2016', '02:58:54pm'),
(15, '1', '2000', '200', '3500', 'karaya', '07', '2016', '26-Jul-2016', '08:58:22pm');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `std_father_name` varchar(100) NOT NULL,
  `student_address` varchar(100) NOT NULL,
  `student_phone` varchar(20) NOT NULL,
  `student_cnic` varchar(20) NOT NULL,
  `student_created_date` varchar(20) NOT NULL,
  `student_created_time` varchar(20) NOT NULL,
  `student_month` varchar(20) NOT NULL,
  `student_year` varchar(20) NOT NULL,
  `student_updated_date` varchar(20) NOT NULL,
  `student_updated_time` varchar(20) NOT NULL,
  `student_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `std_father_name`, `student_address`, `student_phone`, `student_cnic`, `student_created_date`, `student_created_time`, `student_month`, `student_year`, `student_updated_date`, `student_updated_time`, `student_status`) VALUES
(1, 'Any Name', 'Father', 'any address', '0293239233', '', '24-Aug-2016', '12:35:41pm', 'Aug', '2016', '', '', 1),
(2, 'New Student', 'Aslam''s Father', 'Address_new', '03424234342', '', '24-Aug-2016', '12:59:18pm', 'Aug', '2016', '', '', 1),
(3, 'Aslam', 'anyname', 'Address', '0323424234', '', '24-Aug-2016', '01:00:06pm', 'Aug', '2016', '', '', 1),
(4, 'akram', 'akram''s father', 'Swat', '02423424234', '', '24-Aug-2016', '01:00:56pm', 'Aug', '2016', '', '', 1),
(5, 'Shakir', 'Shakir''s Father', 'Swabi', '03423342344', '', '24-Aug-2016', '01:33:22pm', 'Aug', '2016', '', '', 1),
(6, 'Hanif', 'abbo', 'Swabi', '230849238434', '', '24-Aug-2016', '01:57:20pm', 'Aug', '2016', '', '', 1),
(7, 'Wazir', 'Wazir dad', 'Waziro', '02423424234', '', '24-Aug-2016', '02:00:31pm', 'Aug', '2016', '', '', 1),
(8, 'Student_New', 'kdfj', 'New address', '298409896', '', '24-Aug-2016', '02:34:06pm', 'Aug', '2016', '', '', 1),
(9, 'Aslam', 'Father', 'New address', '03424234342', '', '24-Aug-2016', '03:21:15pm', 'Aug', '2016', '', '', 1),
(10, 'Salman', 'khan', 'swat', '20849234344', '', '25-Aug-2016', '12:25:04pm', 'Aug', '2016', '', '', 1),
(11, 'Mr.X', 'Mr. Y', 'X address', '11992002882', '1212121234131', '29-Aug-2016', '12:53:18pm', 'Aug', '2016', '', '', 1),
(12, 'Nabil', 'shah', 'shahdand', '2309482394', '1343949234892', '29-Aug-2016', '01:13:55pm', 'Aug', '2016', '', '', 1),
(13, 'saleem', 'saleem''s father', 'aslfkafjk', '554545456452', '45121565335', '29-Aug-2016', '02:34:20pm', 'Aug', '2016', '', '', 1),
(14, 'Hakim', 'Salim', 'slksjfd', '9034892384', '34230949334', '29-Aug-2016', '03:11:51pm', 'Aug', '2016', '', '', 1),
(15, 'subhan', 'sfjk', 'asdklfjal', '29384924', '298340928490', '29-Aug-2016', '03:24:41pm', 'Aug', '2016', '', '', 1),
(16, 'sfjalk', 'asklfjaslkf', 'lksjlafk', '234809809', '2093840924', '29-Aug-2016', '03:35:17pm', 'Aug', '2016', '', '', 1),
(17, 'sfalkjfsa', 'salkjf', 'alskjflk', '239849284', '209384092384', '29-Aug-2016', '03:40:57pm', 'Aug', '2016', '', '', 1),
(18, 'was', 'wasss', 'asdkfj', '20348923', '2384238498', '29-Aug-2016', '03:52:52pm', 'Aug', '2016', '', '', 1),
(19, 'Karim', 'Rahim', 'Hayatabad', '091123322', '219321093239', '29-Aug-2016', '04:09:18pm', 'Aug', '2016', '', '', 1),
(20, 'SFKJ', 'skfd', 'faskjf', '2343489385', '290843928403', '30-Aug-2016', '04:04:32pm', 'Aug', '2016', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `st_attendance_id` int(11) NOT NULL,
  `fkclass_id` int(11) NOT NULL,
  `fkstudent_id` int(11) NOT NULL,
  `status` varchar(300) NOT NULL,
  `att_date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`st_attendance_id`, `fkclass_id`, `fkstudent_id`, `status`, `att_date`, `time`, `month`, `year`) VALUES
(1, 5, 1, 'p', '25-Jul-2016', '08:58 33pm', 'Jul', '2016'),
(2, 5, 2, 'p', '25-Jul-2016', '08:58 33pm', 'Jul', '2016'),
(3, 5, 3, 'p', '25-Jul-2016', '08:58 33pm', 'Jul', '2016'),
(4, 5, 4, 'p', '25-Jul-2016', '08:58 33pm', 'Jul', '2016'),
(5, 5, 1, 'a', '26-Jul-2016', '08:58 pm', 'Jul', '2016'),
(6, 5, 1, 'a', '27-Jul-2016', '08:58 pm', 'Jul', '2016'),
(7, 5, 1, 'a', '28-Jul-2016', '08:58 pm', 'Jul', '2016'),
(8, 5, 1, 'a', '29-Jul-2016', '08:58 pm', 'Jul', '2016'),
(9, 5, 1, 'Saturday', '30-Jul-2016', '08:58 pm', 'Jul', '2016'),
(10, 5, 1, 'Sunday', '31-Jul-2016', '08:58 pm', 'Jul', '2016'),
(11, 5, 2, 'a', '26-Jul-2016', '08:58 pm', 'Jul', '2016'),
(12, 5, 2, 'a', '27-Jul-2016', '08:58 pm', 'Jul', '2016'),
(13, 5, 2, 'a', '28-Jul-2016', '08:58 pm', 'Jul', '2016'),
(14, 5, 2, 'a', '29-Jul-2016', '08:58 pm', 'Jul', '2016'),
(15, 5, 2, 'Saturday', '30-Jul-2016', '08:58 pm', 'Jul', '2016'),
(16, 5, 2, 'Sunday', '31-Jul-2016', '08:58 pm', 'Jul', '2016'),
(17, 5, 3, 'a', '26-Jul-2016', '08:58 pm', 'Jul', '2016'),
(18, 5, 3, 'a', '27-Jul-2016', '08:58 pm', 'Jul', '2016'),
(19, 5, 3, 'a', '28-Jul-2016', '08:58 pm', 'Jul', '2016'),
(20, 5, 3, 'a', '29-Jul-2016', '08:58 pm', 'Jul', '2016'),
(21, 5, 3, 'Saturday', '30-Jul-2016', '08:58 pm', 'Jul', '2016'),
(22, 5, 3, 'Sunday', '31-Jul-2016', '08:58 pm', 'Jul', '2016'),
(23, 5, 4, 'a', '26-Jul-2016', '08:58 pm', 'Jul', '2016'),
(24, 5, 4, 'a', '27-Jul-2016', '08:58 pm', 'Jul', '2016'),
(25, 5, 4, 'a', '28-Jul-2016', '08:58 pm', 'Jul', '2016'),
(26, 5, 4, 'a', '29-Jul-2016', '08:58 pm', 'Jul', '2016'),
(27, 5, 4, 'Saturday', '30-Jul-2016', '08:58 pm', 'Jul', '2016'),
(28, 5, 4, 'Sunday', '31-Jul-2016', '08:58 pm', 'Jul', '2016'),
(29, 5, 1, 'p', '01-Aug-2016', '08:59 11pm', 'Aug', '2016'),
(30, 5, 2, 'p', '01-Aug-2016', '08:59 11pm', 'Aug', '2016'),
(31, 5, 3, 'p', '01-Aug-2016', '08:59 11pm', 'Aug', '2016'),
(32, 5, 4, 'p', '01-Aug-2016', '08:59 11pm', 'Aug', '2016'),
(33, 5, 1, 'a', '02-Aug-2016', '12:21 pm', 'Aug', '2016'),
(34, 5, 2, 'a', '02-Aug-2016', '12:21 pm', 'Aug', '2016'),
(35, 5, 3, 'a', '02-Aug-2016', '12:21 pm', 'Aug', '2016'),
(36, 5, 4, 'a', '02-Aug-2016', '12:21 pm', 'Aug', '2016'),
(37, 5, 1, 'a', '03-Aug-2016', '01:53 pm', 'Aug', '2016'),
(38, 5, 1, 'a', '04-Aug-2016', '01:53 pm', 'Aug', '2016'),
(39, 5, 1, 'a', '05-Aug-2016', '01:53 pm', 'Aug', '2016'),
(40, 5, 1, 'Saturday', '06-Aug-2016', '01:53 pm', 'Aug', '2016'),
(41, 5, 1, 'Sunday', '07-Aug-2016', '01:53 pm', 'Aug', '2016'),
(42, 5, 1, 'a', '08-Aug-2016', '01:53 pm', 'Aug', '2016'),
(43, 5, 1, 'a', '09-Aug-2016', '01:53 pm', 'Aug', '2016'),
(44, 5, 1, 'a', '12-Aug-2016', '01:53 pm', 'Aug', '2016'),
(45, 5, 1, 'Saturday', '13-Aug-2016', '01:53 pm', 'Aug', '2016'),
(46, 5, 1, 'Sunday', '14-Aug-2016', '01:53 pm', 'Aug', '2016'),
(47, 5, 1, 'a', '15-Aug-2016', '01:53 pm', 'Aug', '2016'),
(48, 5, 1, 'a', '16-Aug-2016', '01:53 pm', 'Aug', '2016'),
(49, 5, 1, 'a', '17-Aug-2016', '01:53 pm', 'Aug', '2016'),
(50, 5, 1, 'a', '18-Aug-2016', '01:53 pm', 'Aug', '2016'),
(51, 5, 1, 'a', '19-Aug-2016', '01:53 pm', 'Aug', '2016'),
(52, 5, 1, 'Saturday', '20-Aug-2016', '01:53 pm', 'Aug', '2016'),
(53, 5, 1, 'Sunday', '21-Aug-2016', '01:53 pm', 'Aug', '2016'),
(54, 5, 2, 'a', '03-Aug-2016', '01:53 pm', 'Aug', '2016'),
(55, 5, 2, 'a', '04-Aug-2016', '01:53 pm', 'Aug', '2016'),
(56, 5, 2, 'a', '05-Aug-2016', '01:53 pm', 'Aug', '2016'),
(57, 5, 2, 'Saturday', '06-Aug-2016', '01:53 pm', 'Aug', '2016'),
(58, 5, 2, 'Sunday', '07-Aug-2016', '01:53 pm', 'Aug', '2016'),
(59, 5, 2, 'a', '08-Aug-2016', '01:53 pm', 'Aug', '2016'),
(60, 5, 2, 'a', '09-Aug-2016', '01:53 pm', 'Aug', '2016'),
(61, 5, 2, 'a', '12-Aug-2016', '01:53 pm', 'Aug', '2016'),
(62, 5, 2, 'Saturday', '13-Aug-2016', '01:53 pm', 'Aug', '2016'),
(63, 5, 2, 'Sunday', '14-Aug-2016', '01:53 pm', 'Aug', '2016'),
(64, 5, 2, 'a', '15-Aug-2016', '01:53 pm', 'Aug', '2016'),
(65, 5, 2, 'a', '16-Aug-2016', '01:53 pm', 'Aug', '2016'),
(66, 5, 2, 'a', '17-Aug-2016', '01:53 pm', 'Aug', '2016'),
(67, 5, 2, 'a', '18-Aug-2016', '01:53 pm', 'Aug', '2016'),
(68, 5, 2, 'a', '19-Aug-2016', '01:53 pm', 'Aug', '2016'),
(69, 5, 2, 'Saturday', '20-Aug-2016', '01:53 pm', 'Aug', '2016'),
(70, 5, 2, 'Sunday', '21-Aug-2016', '01:53 pm', 'Aug', '2016'),
(71, 5, 3, 'a', '03-Aug-2016', '01:53 pm', 'Aug', '2016'),
(72, 5, 3, 'a', '04-Aug-2016', '01:53 pm', 'Aug', '2016'),
(73, 5, 3, 'a', '05-Aug-2016', '01:53 pm', 'Aug', '2016'),
(74, 5, 3, 'Saturday', '06-Aug-2016', '01:53 pm', 'Aug', '2016'),
(75, 5, 3, 'Sunday', '07-Aug-2016', '01:53 pm', 'Aug', '2016'),
(76, 5, 3, 'a', '08-Aug-2016', '01:53 pm', 'Aug', '2016'),
(77, 5, 3, 'a', '09-Aug-2016', '01:53 pm', 'Aug', '2016'),
(78, 5, 3, 'a', '12-Aug-2016', '01:53 pm', 'Aug', '2016'),
(79, 5, 3, 'Saturday', '13-Aug-2016', '01:53 pm', 'Aug', '2016'),
(80, 5, 3, 'Sunday', '14-Aug-2016', '01:53 pm', 'Aug', '2016'),
(81, 5, 3, 'a', '15-Aug-2016', '01:53 pm', 'Aug', '2016'),
(82, 5, 3, 'a', '16-Aug-2016', '01:53 pm', 'Aug', '2016'),
(83, 5, 3, 'a', '17-Aug-2016', '01:53 pm', 'Aug', '2016'),
(84, 5, 3, 'a', '18-Aug-2016', '01:53 pm', 'Aug', '2016'),
(85, 5, 3, 'a', '19-Aug-2016', '01:53 pm', 'Aug', '2016'),
(86, 5, 3, 'Saturday', '20-Aug-2016', '01:53 pm', 'Aug', '2016'),
(87, 5, 3, 'Sunday', '21-Aug-2016', '01:53 pm', 'Aug', '2016'),
(88, 5, 4, 'a', '03-Aug-2016', '01:53 pm', 'Aug', '2016'),
(89, 5, 4, 'a', '04-Aug-2016', '01:53 pm', 'Aug', '2016'),
(90, 5, 4, 'a', '05-Aug-2016', '01:53 pm', 'Aug', '2016'),
(91, 5, 4, 'Saturday', '06-Aug-2016', '01:53 pm', 'Aug', '2016'),
(92, 5, 4, 'Sunday', '07-Aug-2016', '01:53 pm', 'Aug', '2016'),
(93, 5, 4, 'a', '08-Aug-2016', '01:53 pm', 'Aug', '2016'),
(94, 5, 4, 'a', '09-Aug-2016', '01:53 pm', 'Aug', '2016'),
(95, 5, 4, 'a', '12-Aug-2016', '01:53 pm', 'Aug', '2016'),
(96, 5, 4, 'Saturday', '13-Aug-2016', '01:53 pm', 'Aug', '2016'),
(97, 5, 4, 'Sunday', '14-Aug-2016', '01:53 pm', 'Aug', '2016'),
(98, 5, 4, 'a', '15-Aug-2016', '01:53 pm', 'Aug', '2016'),
(99, 5, 4, 'a', '16-Aug-2016', '01:53 pm', 'Aug', '2016'),
(100, 5, 4, 'a', '17-Aug-2016', '01:53 pm', 'Aug', '2016'),
(101, 5, 4, 'a', '18-Aug-2016', '01:53 pm', 'Aug', '2016'),
(102, 5, 4, 'a', '19-Aug-2016', '01:53 pm', 'Aug', '2016'),
(103, 5, 4, 'Saturday', '20-Aug-2016', '01:53 pm', 'Aug', '2016'),
(104, 5, 4, 'Sunday', '21-Aug-2016', '01:53 pm', 'Aug', '2016'),
(105, 5, 1, 'a', '22-Aug-2016', '07:04 17pm', 'Aug', '2016'),
(106, 5, 2, 'p', '22-Aug-2016', '07:04 17pm', 'Aug', '2016'),
(107, 5, 3, 'p', '22-Aug-2016', '07:04 17pm', 'Aug', '2016'),
(108, 5, 4, 'p', '22-Aug-2016', '07:04 17pm', 'Aug', '2016'),
(109, 5, 1, 'a', '23-Aug-2016', '12:11 pm', 'Aug', '2016'),
(110, 5, 2, 'a', '23-Aug-2016', '12:11 pm', 'Aug', '2016'),
(111, 5, 3, 'a', '23-Aug-2016', '12:11 pm', 'Aug', '2016'),
(112, 5, 4, 'a', '23-Aug-2016', '12:11 pm', 'Aug', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_fee`
--

CREATE TABLE `student_class_fee` (
  `classfee_id` int(11) NOT NULL,
  `fkstudent_id` varchar(32) NOT NULL,
  `fkclass_id` varchar(32) NOT NULL,
  `class_fee` varchar(150) NOT NULL,
  `admission_fee` varchar(150) NOT NULL,
  `to_be_pay` varchar(150) NOT NULL,
  `classfee_created_date` varchar(20) NOT NULL,
  `classfee_created_time` varchar(20) NOT NULL,
  `st_class_fee_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `student_fee_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `class_course_id` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `fee_type` varchar(255) NOT NULL,
  `to_be_pay` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`student_fee_id`, `student_id`, `co_id`, `class_course_id`, `fee`, `fee_type`, `to_be_pay`, `time`, `date`, `month`, `year`, `status`) VALUES
(1, 1, 1, 1, 2000, 'monthly_fee', 2000, '03-08-44', '30-Aug-2016', 'Aug', '2016', 1),
(2, 8, 1, 1, 2000, 'monthly_fee', 2000, '03-08-02', '30-Aug-2016', 'Aug', '2016', 1),
(3, 12, 1, 1, 2000, 'monthly_fee', 2000, '03-08-10', '30-Aug-2016', 'Aug', '2016', 1),
(4, 13, 1, 1, 2000, 'monthly_fee', 2000, '03-08-19', '30-Aug-2016', 'Aug', '2016', 1),
(5, 16, 1, 1, 2000, 'monthly_fee', 2000, '03-08-29', '30-Aug-2016', 'Aug', '2016', 1),
(6, 16, 1, 1, 2000, 'monthly_fee', 2000, '03-08-46', '30-Aug-2016', 'Aug', '2016', 1),
(7, 17, 1, 1, 2000, 'monthly_fee', 2000, '03-08-58', '30-Aug-2016', 'Aug', '2016', 1),
(8, 18, 1, 1, 2000, 'monthly_fee', 2000, '03-08-10', '30-Aug-2016', 'Aug', '2016', 1),
(9, 19, 1, 1, 2000, 'monthly_fee', 2000, '03-08-19', '30-Aug-2016', 'Aug', '2016', 1),
(11, 1, 1, 1, 20000, 'admission_fee', 20000, '04-08-26', '30-Aug-2016', 'Aug', '2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_other_payment`
--

CREATE TABLE `student_other_payment` (
  `otherpay_id` int(11) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `total_amt` varchar(200) NOT NULL,
  `paid_amt` varchar(200) NOT NULL,
  `otherfee_remain` int(11) NOT NULL,
  `amt_reason` varchar(100) NOT NULL,
  `other_month` varchar(20) NOT NULL,
  `other_year` varchar(20) NOT NULL,
  `otherpay_created_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_other_payment`
--

INSERT INTO `student_other_payment` (`otherpay_id`, `student_id`, `total_amt`, `paid_amt`, `otherfee_remain`, `amt_reason`, `other_month`, `other_year`, `otherpay_created_date`) VALUES
(1, '8', '100', '80', 20, 'ID Card Fee', 'Aug', '2016', '26-Aug-2016');

-- --------------------------------------------------------

--
-- Table structure for table `student_payment`
--

CREATE TABLE `student_payment` (
  `p_id` bigint(20) NOT NULL,
  `fkstudentclassfee_id` int(11) NOT NULL,
  `std_payment` int(11) NOT NULL,
  `std_paid` int(11) NOT NULL,
  `std_remain` varchar(10) NOT NULL,
  `std_month` varchar(20) NOT NULL,
  `std_year` varchar(20) NOT NULL,
  `std_date` varchar(20) NOT NULL,
  `std_reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_payment`
--

INSERT INTO `student_payment` (`p_id`, `fkstudentclassfee_id`, `std_payment`, `std_paid`, `std_remain`, `std_month`, `std_year`, `std_date`, `std_reason`) VALUES
(1, 1, 2000, 1000, '1000', 'Jul', '2016', '26-Jul-2016', 'Monthly Fee'),
(2, 2, 3000, 0, '3000', 'Jul', '2016', '26-Jul-2016', 'Monthly Fee'),
(3, 3, 1500, 500, '1000', 'Jun', '2016', '26-Jul-2016', 'Monthly Fee'),
(4, 4, 2600, 0, '2600', 'Jul', '2016', '26-Jul-2016', 'Monthly Fee'),
(5, 5, 1000, 0, '1000', 'Jul', '2016', '26-Jul-2016', 'Monthly Fee'),
(6, 1, 1000, 500, '500', 'Jul', '2016', '26-Jul-2016', 'Monthly Fee'),
(7, 3, 1500, 0, '2500', 'Jul', '2016', '29-Jul-2016', 'Monthly Fee'),
(8, 6, 1000, 500, '500', 'Jul', '2016', '30-Jul-2016', 'Monthly Fee'),
(9, 7, 2500, 1000, '1500', 'Jul', '2016', '30-Jul-2016', 'Monthly Fee'),
(10, 1, 2000, 0, '2500', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(11, 2, 3000, 0, '6000', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(12, 3, 1500, 0, '4000', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(13, 4, 2600, 0, '5200', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(14, 5, 1000, 0, '2000', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(15, 6, 1000, 0, '1500', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(16, 7, 2500, 0, '4000', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(17, 1, 2500, 2000, '500', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(18, 1, 500, 200, '300', 'Feb', '2015', '24-Aug-2016', 'Monthly Fee');

-- --------------------------------------------------------

--
-- Table structure for table `student_pay_fee`
--

CREATE TABLE `student_pay_fee` (
  `studentpay_id` int(11) NOT NULL,
  `student_fee_id` int(11) NOT NULL,
  `student_payment` int(11) NOT NULL,
  `student_paid` int(11) NOT NULL,
  `remaining_fee` int(10) NOT NULL,
  `std_month` varchar(20) NOT NULL,
  `std_year` varchar(20) NOT NULL,
  `std_date` varchar(20) NOT NULL,
  `std_reason` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_pay_fee`
--

INSERT INTO `student_pay_fee` (`studentpay_id`, `student_fee_id`, `student_payment`, `student_paid`, `remaining_fee`, `std_month`, `std_year`, `std_date`, `std_reason`) VALUES
(1, 2, 2000, 1900, 100, 'Aug', '2016', '30-Aug-2016', 'Monthly Fee');

-- --------------------------------------------------------

--
-- Table structure for table `student_section`
--

CREATE TABLE `student_section` (
  `student_course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `c_section_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `class_course_id` int(11) NOT NULL,
  `admission_fee` int(11) NOT NULL,
  `monthly_fee` int(11) NOT NULL,
  `other_fee` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_section`
--

INSERT INTO `student_section` (`student_course_id`, `student_id`, `c_section_id`, `co_id`, `class_course_id`, `admission_fee`, `monthly_fee`, `other_fee`, `created_date`, `created_time`) VALUES
(1, 1, 1, 1, 1, 12000, 1200, 200, '24-Aug-2016', '12:36:04pm'),
(2, 2, 2, 1, 1, 12000, 1200, 2000, '24-Aug-2016', '12:59:48pm'),
(3, 3, 1, 2, 1, 13000, 2000, 3000, '24-Aug-2016', '01:00:32pm'),
(4, 4, 2, 2, 2, 20000, 2000, 1200, '24-Aug-2016', '01:01:29pm'),
(7, 7, 2, 2, 1, 13000, 1200, 200, '24-Aug-2016', '02:00:55pm'),
(8, 8, 1, 1, 1, 1200, 1200, 200, '24-Aug-2016', '02:34:27pm'),
(9, 10, 2, 1, 1, 13000, 1200, 400, '25-Aug-2016', '12:25:23pm'),
(10, 11, 2, 2, 2, 9000, 2000, 100, '29-Aug-2016', '12:56:37pm'),
(11, 12, 1, 1, 1, 20000, 1000, 100, '29-Aug-2016', '02:32:58pm'),
(12, 13, 1, 1, 1, 8000, 800, 50, '29-Aug-2016', '02:34:37pm'),
(13, 14, 2, 2, 1, 20000, 2000, 120, '29-Aug-2016', '03:12:12pm'),
(14, 16, 1, 1, 1, 293848, 4234, 234, '29-Aug-2016', '03:39:53pm'),
(15, 16, 1, 1, 1, 293848, 4234, 234, '29-Aug-2016', '03:40:19pm'),
(16, 17, 1, 1, 1, 23842, 2394, 8, '29-Aug-2016', '03:41:17pm'),
(20, 18, 1, 1, 1, 20000, 2000, 190, '29-Aug-2016', '03:53:08pm'),
(30, 19, 1, 1, 1, 12000, 2000, 100, '29-Aug-2016', '04:11:52pm');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `su_id` int(10) NOT NULL,
  `su_name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`su_id`, `su_name`, `duration`) VALUES
(1, 'Chemistry', 4),
(2, 'Maths', 4),
(3, 'Biology', 4),
(4, 'English', 2),
(5, 'Pak Studies', 2),
(6, 'urdu', 3),
(7, 'pashto', 9),
(8, 'farsi', 2),
(10, 'Mobiles technologie', 2),
(12, 'hindi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `t_gender` varchar(20) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `updated_time` varchar(10) NOT NULL,
  `t_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `cnic`, `address`, `contact`, `t_gender`, `created_date`, `created_time`, `updated_date`, `updated_time`, `t_status`) VALUES
(1, 'teacher1', 'teacher@seeds.com', 'teacher', '162312213123121', 'katlang1', '031292367982', 'female', '14-Jul-2016', '12:33:38pm', '19-Jul-2016', '07:57:17pm', 1),
(2, 'teacher 2', 'teacher2@seeds.com', 'teacher', '1610102591183', 'Charsadda,KPK,Pakistan', '03155151801', 'female', '19-Jul-2016', '07:16:54pm', '', '', 1),
(3, 'teacher_pass', 'teacher_pass@seedschool.com', 'teacher', '231232132131223', 'katti garhi adda', '2334234324234', 'male', '30-Jul-2016', '05:54:20pm', '', '', 1),
(4, 'Teacher_new', 'email_new@gmail.com', '123456', '1343949234892', 'Address_new', '0342232243', 'female', '22-Aug-2016', '02:26:46pm', '22-Aug-2016', '02:35:25pm', 1),
(5, 'Teacher 4', 'teacher@gmail.com', '5BSrUT', '9234234908909', 'New address', '0323423423', 'female', '22-Aug-2016', '05:15:17pm', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendence`
--

CREATE TABLE `teacher_attendence` (
  `teacher_att_id` bigint(20) NOT NULL,
  `fkteacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendence`
--

INSERT INTO `teacher_attendence` (`teacher_att_id`, `fkteacher_id`, `class_id`, `status`, `date`, `month`, `year`) VALUES
(30, 1, 6, 'a', '2016-07-15', 'Jul', '2016'),
(31, 1, 6, 'Saturday', '2016-07-16', 'Jul', '2016'),
(32, 1, 6, 'Sunday', '2016-07-17', 'Jul', '2016'),
(33, 1, 6, 'a', '2016-07-18', 'Jul', '2016'),
(34, 1, 6, 'a', '2016-07-19', 'Jul', '2016'),
(35, 1, 6, 'a', '2016-07-20', 'Jul', '2016'),
(36, 1, 6, 'p', '2016-07-21', 'Jul', '2016'),
(37, 1, 6, 'l', '2016-07-22', 'Jul', '2016'),
(38, 1, 6, 'Saturday', '2016-07-23', 'Jul', '2016'),
(39, 1, 6, 'Sunday', '2016-07-24', 'Jul', '2016'),
(40, 1, 6, 'a', '2016-07-25', 'Jul', '2016'),
(41, 1, 6, 'a', '2016-07-26', 'Jul', '2016'),
(42, 1, 6, 'a', '2016-07-27', 'Jul', '2016'),
(43, 1, 6, 'a', '2016-07-28', 'Jul', '2016'),
(44, 1, 6, 'a', '2016-07-29', 'Jul', '2016'),
(45, 1, 6, 'Saturday', '2016-07-30', 'Jul', '2016'),
(46, 1, 6, 'Sunday', '2016-07-31', 'Jul', '2016'),
(47, 1, 5, 'p', '2016-08-01', 'Aug', '2016'),
(48, 1, 5, 'a', '2016-08-02', 'Aug', '2016'),
(49, 1, 5, 'a', '2016-08-03', 'Aug', '2016'),
(50, 1, 5, 'a', '2016-08-04', 'Aug', '2016'),
(51, 1, 5, 'a', '2016-08-05', 'Aug', '2016'),
(52, 1, 5, 'Saturday', '2016-08-06', 'Aug', '2016'),
(53, 1, 5, 'Sunday', '2016-08-07', 'Aug', '2016'),
(54, 1, 5, 'a', '2016-08-08', 'Aug', '2016'),
(55, 1, 5, 'a', '2016-08-09', 'Aug', '2016'),
(56, 1, 5, 'a', '2016-08-10', 'Aug', '2016'),
(57, 1, 5, 'a', '2016-08-11', 'Aug', '2016'),
(58, 1, 5, 'a', '2016-08-12', 'Aug', '2016'),
(59, 1, 5, 'Saturday', '2016-08-13', 'Aug', '2016'),
(60, 1, 5, 'Sunday', '2016-08-14', 'Aug', '2016'),
(61, 1, 5, 'a', '2016-08-15', 'Aug', '2016'),
(62, 1, 5, 'a', '2016-08-16', 'Aug', '2016'),
(63, 1, 5, 'a', '2016-08-17', 'Aug', '2016'),
(64, 1, 5, 'a', '2016-08-18', 'Aug', '2016'),
(65, 1, 5, 'a', '2016-08-19', 'Aug', '2016'),
(66, 1, 5, 'Saturday', '2016-08-20', 'Aug', '2016'),
(67, 1, 5, 'Sunday', '2016-08-21', 'Aug', '2016'),
(68, 1, 5, 'a', '2016-08-22', 'Aug', '2016'),
(69, 1, 5, 'a', '2016-08-23', 'Aug', '2016'),
(70, 1, 5, 'a', '2016-08-24', 'Aug', '2016'),
(71, 1, 5, 'a', '2016-08-25', 'Aug', '2016'),
(72, 1, 5, 'a', '2016-08-26', 'Aug', '2016'),
(73, 1, 5, 'Saturday', '2016-08-27', 'Aug', '2016'),
(74, 1, 5, 'Sunday', '2016-08-28', 'Aug', '2016'),
(75, 1, 5, 'a', '2016-08-29', 'Aug', '2016'),
(76, 1, 5, 'a', '2016-08-30', 'Aug', '2016'),
(77, 1, 5, 'a', '2016-08-31', 'Aug', '2016'),
(78, 1, 5, 'p', '2016-07-01', 'Jul', '2016'),
(79, 1, 5, 'Saturday', '2016-07-02', 'Jul', '2016'),
(80, 1, 5, 'Sunday', '2016-07-03', 'Jul', '2016'),
(81, 1, 5, 'a', '2016-07-04', 'Jul', '2016'),
(82, 1, 5, 'a', '2016-07-05', 'Jul', '2016'),
(83, 1, 5, 'a', '2016-07-06', 'Jul', '2016'),
(84, 1, 5, 'a', '2016-07-07', 'Jul', '2016'),
(85, 1, 5, 'a', '2016-07-08', 'Jul', '2016'),
(86, 1, 5, 'Saturday', '2016-07-09', 'Jul', '2016'),
(87, 1, 5, 'Sunday', '2016-07-10', 'Jul', '2016'),
(88, 1, 5, 'a', '2016-07-11', 'Jul', '2016'),
(89, 1, 5, 'a', '2016-07-12', 'Jul', '2016'),
(90, 1, 5, 'a', '2016-07-13', 'Jul', '2016'),
(91, 1, 5, 'a', '2016-07-14', 'Jul', '2016'),
(92, 1, 5, 'a', '2016-07-15', 'Jul', '2016'),
(93, 1, 5, 'Saturday', '2016-07-16', 'Jul', '2016'),
(94, 1, 5, 'Sunday', '2016-07-17', 'Jul', '2016'),
(95, 1, 5, 'a', '2016-07-18', 'Jul', '2016'),
(96, 1, 5, 'a', '2016-07-19', 'Jul', '2016'),
(97, 1, 5, 'a', '2016-07-20', 'Jul', '2016'),
(98, 1, 5, 'a', '2016-07-21', 'Jul', '2016'),
(99, 1, 5, 'a', '2016-07-22', 'Jul', '2016'),
(100, 1, 5, 'Saturday', '2016-07-23', 'Jul', '2016'),
(101, 1, 5, 'Sunday', '2016-07-24', 'Jul', '2016'),
(102, 1, 5, 'a', '2016-07-25', 'Jul', '2016'),
(103, 1, 5, 'a', '2016-07-26', 'Jul', '2016'),
(104, 1, 5, 'a', '2016-07-27', 'Jul', '2016'),
(105, 1, 5, 'a', '2016-07-28', 'Jul', '2016'),
(106, 1, 5, 'a', '2016-07-29', 'Jul', '2016'),
(107, 1, 5, 'Saturday', '2016-07-30', 'Jul', '2016'),
(108, 1, 5, 'Sunday', '2016-07-31', 'Jul', '2016'),
(109, 1, 5, 'a', '2016-08-01', 'Aug', '2016'),
(110, 1, 6, 'a', '2016-08-01', 'Aug', '2016'),
(111, 1, 5, 'a', '2016-08-02', 'Aug', '2016'),
(112, 1, 6, 'a', '2016-08-02', 'Aug', '2016'),
(113, 1, 5, 'a', '2016-08-03', 'Aug', '2016'),
(114, 1, 5, 'a', '2016-08-04', 'Aug', '2016'),
(115, 1, 5, 'a', '2016-08-05', 'Aug', '2016'),
(116, 1, 5, 'Saturday', '2016-08-06', 'Aug', '2016'),
(117, 1, 5, 'Sunday', '2016-08-07', 'Aug', '2016'),
(118, 1, 5, 'a', '2016-08-08', 'Aug', '2016'),
(119, 1, 5, 'a', '2016-08-09', 'Aug', '2016'),
(120, 1, 5, 'a', '2016-08-12', 'Aug', '2016'),
(121, 1, 5, 'Saturday', '2016-08-13', 'Aug', '2016'),
(122, 1, 5, 'Sunday', '2016-08-14', 'Aug', '2016'),
(123, 1, 5, 'a', '2016-08-15', 'Aug', '2016'),
(124, 1, 5, 'a', '2016-08-16', 'Aug', '2016'),
(125, 1, 5, 'a', '2016-08-17', 'Aug', '2016'),
(126, 1, 5, 'a', '2016-08-18', 'Aug', '2016'),
(127, 1, 5, 'a', '2016-08-19', 'Aug', '2016'),
(128, 1, 5, 'Saturday', '2016-08-20', 'Aug', '2016'),
(129, 1, 5, 'Sunday', '2016-08-21', 'Aug', '2016'),
(130, 1, 6, 'a', '2016-08-03', 'Aug', '2016'),
(131, 1, 6, 'a', '2016-08-04', 'Aug', '2016'),
(132, 1, 6, 'a', '2016-08-05', 'Aug', '2016'),
(133, 1, 6, 'Saturday', '2016-08-06', 'Aug', '2016'),
(134, 1, 6, 'Sunday', '2016-08-07', 'Aug', '2016'),
(135, 1, 6, 'a', '2016-08-08', 'Aug', '2016'),
(136, 1, 6, 'a', '2016-08-09', 'Aug', '2016'),
(137, 1, 6, 'a', '2016-08-12', 'Aug', '2016'),
(138, 1, 6, 'Saturday', '2016-08-13', 'Aug', '2016'),
(139, 1, 6, 'Sunday', '2016-08-14', 'Aug', '2016'),
(140, 1, 6, 'a', '2016-08-15', 'Aug', '2016'),
(141, 1, 6, 'a', '2016-08-16', 'Aug', '2016'),
(142, 1, 6, 'a', '2016-08-17', 'Aug', '2016'),
(143, 1, 6, 'a', '2016-08-18', 'Aug', '2016'),
(144, 1, 6, 'a', '2016-08-19', 'Aug', '2016'),
(145, 1, 6, 'Saturday', '2016-08-20', 'Aug', '2016'),
(146, 1, 6, 'Sunday', '2016-08-21', 'Aug', '2016'),
(147, 1, 0, 'p', '22-Aug-2016', 'Aug', '2016'),
(148, 2, 0, 'p', '22-Aug-2016', 'Aug', '2016'),
(149, 3, 0, 'a', '22-Aug-2016', 'Aug', '2016'),
(150, 4, 0, 'l', '22-Aug-2016', 'Aug', '2016'),
(151, 1, 5, 'a', '2016-08-22', 'Aug', '2016'),
(152, 1, 6, 'a', '2016-08-22', 'Aug', '2016'),
(153, 1, 5, 'a', '2016-08-23', 'Aug', '2016'),
(154, 1, 6, 'a', '2016-08-23', 'Aug', '2016'),
(155, 1, 5, 'a', '2016-08-24', 'Aug', '2016'),
(156, 1, 6, 'a', '2016-08-24', 'Aug', '2016'),
(157, 1, 0, 'a', '04-Aug-2016', 'Aug', '2016'),
(158, 2, 0, 'a', '04-Aug-2016', 'Aug', '2016'),
(159, 3, 0, 'p', '04-Aug-2016', 'Aug', '2016'),
(160, 4, 0, 'p', '04-Aug-2016', 'Aug', '2016'),
(161, 5, 0, 'p', '04-Aug-2016', 'Aug', '2016'),
(162, 1, 0, 'p', '25-Aug-2016', 'Aug', '2016'),
(163, 2, 0, 'a', '25-Aug-2016', 'Aug', '2016'),
(164, 3, 0, 'p', '25-Aug-2016', 'Aug', '2016'),
(165, 4, 0, 'p', '25-Aug-2016', 'Aug', '2016'),
(166, 5, 0, 'p', '25-Aug-2016', 'Aug', '2016'),
(167, 1, 5, 'a', '2016-08-25', 'Aug', '2016'),
(168, 1, 6, 'a', '2016-08-25', 'Aug', '2016'),
(169, 1, 5, 'a', '2016-08-26', 'Aug', '2016'),
(170, 1, 5, 'Saturday', '2016-08-27', 'Aug', '2016'),
(171, 1, 5, 'Sunday', '2016-08-28', 'Aug', '2016'),
(172, 1, 6, 'a', '2016-08-26', 'Aug', '2016'),
(173, 1, 6, 'Saturday', '2016-08-27', 'Aug', '2016'),
(174, 1, 6, 'Sunday', '2016-08-28', 'Aug', '2016'),
(175, 1, 5, 'a', '2016-08-29', 'Aug', '2016'),
(176, 1, 6, 'a', '2016-08-29', 'Aug', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salaries`
--

CREATE TABLE `teacher_salaries` (
  `sa_id` bigint(20) NOT NULL,
  `fkteacher_id` int(11) NOT NULL,
  `total_salary` int(11) NOT NULL,
  `paid_salary` int(11) NOT NULL,
  `remaining_salary` int(11) NOT NULL,
  `amount_reason` varchar(150) NOT NULL,
  `paid_month` varchar(20) NOT NULL,
  `salary_year` varchar(20) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salaries`
--

INSERT INTO `teacher_salaries` (`sa_id`, `fkteacher_id`, `total_salary`, `paid_salary`, `remaining_salary`, `amount_reason`, `paid_month`, `salary_year`, `created_date`, `created_time`) VALUES
(1, 7, 1600, 1000, 600, 'month', '06', '2015', '27-Jun-2016', '04:11:57pm'),
(2, 7, 1600, 200, 400, 'teacher salary', '02', '2016', '27-Jun-2016', '04:12:17pm'),
(3, 1, 2470, 2400, 70, 'salary', '07', '2016', '30-Jul-2016', '04:06:43pm'),
(4, 1, 3270, 2370, 970, 'monthly paid', '08', '2016', '01-Aug-2016', '04:55:05pm'),
(5, 1, 3270, 1000, 3240, 'month', '09', '2016', '01-Aug-2016', '05:06:47pm'),
(6, 1, 3270, 1000, 2240, 'month', '09', '2016', '01-Aug-2016', '05:13:38pm'),
(7, 1, 3270, 1000, 1240, 'month', '09', '2016', '01-Aug-2016', '05:21:42pm'),
(18, 4, 11000, 9000, 2000, 'work', '03', '2014', '22-Aug-2016', '05:35:04pm'),
(19, 5, 10000, 9000, 1000, 'Salary', '02', '2015', '22-Aug-2016', '05:39:29pm');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `teacher_subject_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `salary` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`teacher_subject_id`, `t_id`, `sub_id`, `salary`) VALUES
(1, 1, 2, '30'),
(2, 1, 3, '20'),
(3, 1, 7, '50'),
(5, 4, 3, '11000'),
(6, 5, 4, '10000'),
(7, 3, 2, '12000'),
(8, 2, 1, '13000');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `v_gender` varchar(11) NOT NULL,
  `v_cnic` varchar(15) NOT NULL,
  `note` varchar(500) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `v_month` varchar(20) NOT NULL,
  `v_year` varchar(20) NOT NULL,
  `v_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `name`, `contact`, `reason`, `address`, `relationship`, `v_gender`, `v_cnic`, `note`, `comments`, `date`, `time`, `v_month`, `v_year`, `v_status`) VALUES
(2, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Jan', '2015', 0),
(3, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Feb', '2015', 0),
(4, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(5, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Apr', '2016', 0),
(6, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'May', '2016', 0),
(7, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'May', '2016', 0),
(8, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Jul', '2016', 0),
(9, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Jul', '2016', 0),
(10, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Jul', '2016', 0),
(11, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 1),
(12, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(13, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(14, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(15, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(16, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(17, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(18, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(19, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(20, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(21, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(22, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(23, 'sadsad', '324234234234', 'New Admission', 'kadas asd asd sa', 'Student Him Self', 'male', '2342342342342', 'assa asd as d as da sd as das\r\n', '', '30-Jul-2016', '07:04:11pm', 'Jul', '2016', 0),
(24, 'visitor by recpe', '324234234234', 'Other Information', 'kadas asd asd sa', 'Parent', 'female', '2131231232132', 'hi for recept check', '', '01-Aug-2016', '03:50:29pm', 'Aug', '2016', 0),
(25, 'visitor by recpe', '324234234234', 'Other Information', 'kadas asd asd sa', 'Parent', 'female', '2131231232132', 'hi for recept check', '', '01-Aug-2016', '03:52:01pm', 'Aug', '2016', 0),
(26, 'visitor by recpe', '324234234234', 'Other Information', 'kadas asd asd sa', 'Parent', 'female', '2131231232132', 'hi for recept check', '', '01-Aug-2016', '03:52:05pm', 'Aug', '2016', 1),
(27, 'receptionist', '324234234234', 'Other Information', 'kadas asd asd sa', 'Parent', 'female', '2342342342342', 'asdasdas d a sd asd', '', '01-Aug-2016', '03:53:30pm', 'Aug', '2016', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_fee_genarate`
--
ALTER TABLE `auto_fee_genarate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `bank_transection`
--
ALTER TABLE `bank_transection`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `class_course`
--
ALTER TABLE `class_course`
  ADD PRIMARY KEY (`class_course_id`);

--
-- Indexes for table `class_sections`
--
ALTER TABLE `class_sections`
  ADD PRIMARY KEY (`c_section_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`e_r_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `otherstaff`
--
ALTER TABLE `otherstaff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendence`
--
ALTER TABLE `staff_attendence`
  ADD PRIMARY KEY (`Staff_att_id`),
  ADD UNIQUE KEY `id` (`Staff_att_id`);

--
-- Indexes for table `staff_salaries`
--
ALTER TABLE `staff_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`st_attendance_id`);

--
-- Indexes for table `student_class_fee`
--
ALTER TABLE `student_class_fee`
  ADD PRIMARY KEY (`classfee_id`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`student_fee_id`);

--
-- Indexes for table `student_other_payment`
--
ALTER TABLE `student_other_payment`
  ADD PRIMARY KEY (`otherpay_id`);

--
-- Indexes for table `student_payment`
--
ALTER TABLE `student_payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `student_pay_fee`
--
ALTER TABLE `student_pay_fee`
  ADD PRIMARY KEY (`studentpay_id`);

--
-- Indexes for table `student_section`
--
ALTER TABLE `student_section`
  ADD PRIMARY KEY (`student_course_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_attendence`
--
ALTER TABLE `teacher_attendence`
  ADD PRIMARY KEY (`teacher_att_id`);

--
-- Indexes for table `teacher_salaries`
--
ALTER TABLE `teacher_salaries`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`teacher_subject_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `auto_fee_genarate`
--
ALTER TABLE `auto_fee_genarate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bank_transection`
--
ALTER TABLE `bank_transection`
  MODIFY `t_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cl_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `class_course`
--
ALTER TABLE `class_course`
  MODIFY `class_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class_sections`
--
ALTER TABLE `class_sections`
  MODIFY `c_section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `co_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `e_r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `otherstaff`
--
ALTER TABLE `otherstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff_attendence`
--
ALTER TABLE `staff_attendence`
  MODIFY `Staff_att_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff_salaries`
--
ALTER TABLE `staff_salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `st_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `student_class_fee`
--
ALTER TABLE `student_class_fee`
  MODIFY `classfee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `student_fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student_other_payment`
--
ALTER TABLE `student_other_payment`
  MODIFY `otherpay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_payment`
--
ALTER TABLE `student_payment`
  MODIFY `p_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `student_pay_fee`
--
ALTER TABLE `student_pay_fee`
  MODIFY `studentpay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_section`
--
ALTER TABLE `student_section`
  MODIFY `student_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `su_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacher_attendence`
--
ALTER TABLE `teacher_attendence`
  MODIFY `teacher_att_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `teacher_salaries`
--
ALTER TABLE `teacher_salaries`
  MODIFY `sa_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `teacher_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
