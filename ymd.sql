-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 04:07 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ymd`
--

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(11) NOT NULL,
  `to_mobile` varchar(15) NOT NULL,
  `provide_help_id` varchar(250) DEFAULT NULL,
  `provide_help_name` varchar(250) DEFAULT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `to_mobile`, `provide_help_id`, `provide_help_name`, `date_sent`) VALUES
(5, '8106060162', 'YMD1011101', 'Chiranjeevi S', '2020-03-06 05:10:01'),
(6, '9030729193', 'YMD1011101', 'Chiranjeevi S', '2020-03-07 10:30:36'),
(7, '9908507781', 'YMD1011101', 'Chiranjeevi S', '2020-03-07 11:07:06'),
(8, ' 9030729193 ', '  YMD3624905 ', '', '2020-03-09 10:52:20'),
(9, ' 8639473221  ', '  YMD8138309 ', '', '2020-03-09 10:56:53'),
(10, '9030729193', 'YMD3624905', 'Karun', '2020-03-09 11:04:41'),
(11, '9030729193', 'YMD3624905', 'Karun', '2020-03-09 11:05:35'),
(12, '8639473221', 'YMD8138309', 'janardhan', '2020-03-09 05:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level_name` varchar(250) DEFAULT NULL,
  `left_pairs` int(5) DEFAULT NULL,
  `right_pairs` int(5) DEFAULT NULL,
  `usd_value` float DEFAULT NULL,
  `inr_value` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level_name`, `left_pairs`, `right_pairs`, `usd_value`, `inr_value`) VALUES
(1, 'Level 1', 15, 15, 42.2, 3000),
(2, 'Level 2', 25, 25, 70.4, 5000),
(3, 'Level 3', 35, 35, 98.5, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `provide_helpers`
--

CREATE TABLE `provide_helpers` (
  `id` int(11) NOT NULL,
  `login_id` varchar(250) NOT NULL,
  `helper_name` varchar(250) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `date_helping` datetime NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` int(11) NOT NULL,
  `day_no` int(5) NOT NULL,
  `no_of_persons` bigint(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `day_no`, `no_of_persons`, `amount`) VALUES
(1, 1, 1, 0),
(2, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_basic`
--

CREATE TABLE `user_basic` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `sponsor_id` int(11) DEFAULT NULL,
  `spill_id` int(11) DEFAULT NULL,
  `side` varchar(10) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `is_active` int(2) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `sttate` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_basic`
--

INSERT INTO `user_basic` (`id`, `full_name`, `email`, `mobile`, `sponsor_id`, `spill_id`, `side`, `date_created`, `is_active`, `city`, `sttate`) VALUES
(1, 'Chiranjeevi S', 'schiranjeevi2007@gmail.com', '8639473221', 0, 0, 'left', '2020-02-11 00:00:00', 1, 'Vijayawada', 'AP'),
(55, 'Mahesh Babu', 'mahesh@ymail.com', '9030729193', 1, 57, 'left', '2020-02-25 08:48:09', 1, NULL, NULL),
(56, 'Surya Prakash', 'prakash@ymail.com', '8977791739', 1, 0, 'right', '2020-02-25 08:49:26', 0, NULL, NULL),
(57, 'Sarath Babu', 'sarath@ymail.com', '9030729193', 1, 0, 'left', '2020-02-26 11:03:12', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `sponsor_id` int(11) DEFAULT NULL,
  `spill_id` int(11) DEFAULT NULL,
  `login_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address_1` text,
  `address_2` text,
  `acc_name` varchar(50) DEFAULT NULL,
  `acc_no` varchar(50) DEFAULT NULL,
  `ifsc` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `Gpay` varchar(50) DEFAULT NULL,
  `PhonePe` varchar(50) DEFAULT NULL,
  `PayTm` varchar(50) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int(5) NOT NULL,
  `side` varchar(10) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `full_name`, `email`, `mobile`, `sponsor_id`, `spill_id`, `login_id`, `password`, `address_1`, `address_2`, `acc_name`, `acc_no`, `ifsc`, `bank_name`, `Gpay`, `PhonePe`, `PayTm`, `date_created`, `is_active`, `side`, `city`, `state`, `position`) VALUES
(1, 'Chiranjeevi S', 'schiranjeevi@hotmail.com', '8639473221', 0, 0, 'YMD1011101', '123456', 'Krishnalanka', 'Vijayawada', 'Chiranjeevi S', '0123456789', 'SBIN000089', 'State Bank of India', '9030729193', '9030729193', '9030729193', '2020-03-04 13:10:59', 1, 'master', 'Vijayawada', 'AP', 'main'),
(2, 'Elina C', 'elina@ymail.com', '8639473221', 0, 0, 'YMD1100110', '123456', 'Krishnalanka', 'Vijayawada', 'Elina C', '147852369', 'SBIN1425630', 'SBI', '8639473221', '8639473221', '8639473221', '2020-03-10 16:42:24', 1, 'master', 'Vijayawada', 'AP', 'main'),
(3, 'Ravi dev', 'ravid@ymail.com', '8639473221', 0, 0, 'YMD1200140', '123456', 'Krishnalanka', 'Vijayawada', 'Ravi D', '101852369', 'SBIN1425630', 'SBI', '8639473221', '8639473221', '8639473221', '2020-03-10 16:43:27', 1, 'master', 'Vijayawada', 'AP', 'main'),
(4, 'Kumari Jio', 'kjio@gmail.com', '8639473221', 2, 2, 'YMD0719312', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 09:15:20', 1, 'right', '', '', 'r1'),
(5, 'Madhavi Jio', 'mjio@ymail.com', '9030729193', 2, 4, 'YMD7300380', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 10:29:58', 1, 'left', '', '', 'l1'),
(6, 'Madhu Jio', 'jmadhu@ymail.com', '8639473221', 2, 4, 'YMD5177789', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 10:35:09', 1, 'right', '', '', 'lr1'),
(7, 'Moulika P', 'pmoulika@ymail.com', '8106060162', 2, 2, 'YMD5531148', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 11:10:56', 1, 'left', '', '', ''),
(8, 'Malathi P', 'pmalathi@ymail.com', '9030729193', 2, 7, 'YMD3645655', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 11:13:23', 1, 'left', '', '', ''),
(9, 'Karuna Kumari', 'kkumari@gmail.com', '8639473221', 8, 8, 'YMD5755124', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 12:33:30', 1, 'left', '', '', ''),
(10, 'Jahnavi K', 'kjahnavi@ymail.com', '9030729193', 8, 8, 'YMD4541561', '123456', '', '', '', '', '', '', '', '', '', '2020-03-16 10:57:35', 1, 'right', '', '', ''),
(12, 'Johnny', 'johny@ymail.com', '8639473221', 2, 9, 'YMD6204908', '123456', '', '', '', '', '', '', '', '', '', '2020-03-19 01:26:06', 1, 'right', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details_old2`
--

CREATE TABLE `user_details_old2` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `sponsor_id` int(11) DEFAULT NULL,
  `spill_id` int(11) DEFAULT NULL,
  `login_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address_1` text,
  `address_2` text,
  `acc_name` varchar(50) DEFAULT NULL,
  `acc_no` varchar(50) DEFAULT NULL,
  `ifsc` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `Gpay` varchar(50) DEFAULT NULL,
  `PhonePe` varchar(50) DEFAULT NULL,
  `PayTm` varchar(50) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int(5) NOT NULL,
  `side` varchar(10) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details_old2`
--

INSERT INTO `user_details_old2` (`id`, `full_name`, `email`, `mobile`, `sponsor_id`, `spill_id`, `login_id`, `password`, `address_1`, `address_2`, `acc_name`, `acc_no`, `ifsc`, `bank_name`, `Gpay`, `PhonePe`, `PayTm`, `date_created`, `is_active`, `side`, `city`, `state`) VALUES
(1, 'Chiranjeevi S', 'schiranjeevi@hotmail.com', '8639473221', 0, 0, 'YMD1011101', '123456', 'Krishnalanka', 'Vijayawada', 'Chiranjeevi S', '0123456789', 'SBIN000089', 'State Bank of India', '9030729193', '9030729193', '9030729193', '2020-03-04 13:10:59', 1, 'master', 'Vijayawada', 'AP'),
(2, 'Elina C', 'elina@ymail.com', '8639473221', 0, 0, 'YMD1100110', '123456', 'Krishnalanka', 'Vijayawada', 'Elina C', '147852369', 'SBIN1425630', 'SBI', '8639473221', '8639473221', '8639473221', '2020-03-10 16:42:24', 1, 'master', 'Vijayawada', 'AP'),
(3, 'Ravi dev', 'ravid@ymail.com', '8639473221', 0, 0, 'YMD1200140', '123456', 'Krishnalanka', 'Vijayawada', 'Ravi D', '101852369', 'SBIN1425630', 'SBI', '8639473221', '8639473221', '8639473221', '2020-03-10 16:43:27', 1, 'master', 'Vijayawada', 'AP'),
(4, 'Kumari Jio', 'kjio@gmail.com', '8639473221', 2, 2, 'YMD0719312', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 09:15:20', 1, 'right', '', ''),
(5, 'Madhavi Jio', 'mjio@ymail.com', '9030729193', 2, 4, 'YMD7300380', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 10:29:58', 1, 'left', '', ''),
(6, 'Madhu Jio', 'jmadhu@ymail.com', '8639473221', 2, 4, 'YMD5177789', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 10:35:09', 1, 'right', '', ''),
(7, 'Moulika P', 'pmoulika@ymail.com', '8106060162', 2, 2, 'YMD5531148', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 11:10:56', 1, 'left', '', ''),
(8, 'Malathi P', 'pmalathi@ymail.com', '9030729193', 2, 7, 'YMD3645655', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 11:13:23', 1, 'left', '', ''),
(9, 'Karuna Kumari', 'kkumari@gmail.com', '8639473221', 8, 8, 'YMD5755124', '123456', '', '', '', '', '', '', '', '', '', '2020-03-11 12:33:30', 1, 'left', '', ''),
(10, 'Jahnavi K', 'kjahnavi@ymail.com', '9030729193', 8, 8, 'YMD4541561', '123456', '', '', '', '', '', '', '', '', '', '2020-03-16 10:57:35', 1, 'right', '', ''),
(12, 'Johnny', 'johny@ymail.com', '8639473221', 2, 9, 'YMD6204908', '123456', '', '', '', '', '', '', '', '', '', '2020-03-19 01:26:06', 1, 'right', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_kyc`
--

CREATE TABLE `user_kyc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_1` text,
  `address_2` text,
  `bank_name` varchar(255) DEFAULT NULL,
  `acc_no` varchar(50) DEFAULT NULL,
  `ifsc` varchar(20) DEFAULT NULL,
  `acc_name` varchar(255) DEFAULT NULL,
  `Gpay` varchar(30) DEFAULT NULL,
  `PhonePe` varchar(30) DEFAULT NULL,
  `PayTm` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_kyc`
--

INSERT INTO `user_kyc` (`id`, `user_id`, `address_1`, `address_2`, `bank_name`, `acc_no`, `ifsc`, `acc_name`, `Gpay`, `PhonePe`, `PayTm`) VALUES
(1, 1, 'Krishnalanka', 'Vijayawada', 'State Bank of India', '12345678901', 'SBIN0000123', 'Chiranjeevi S', '9030729193', '9030729193', '9030729193'),
(5, 55, '', '', '', '', '', '', '', '', ''),
(6, 56, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `login_id`, `password`) VALUES
(1, 1, 'YMD1011101', '123456'),
(29, 55, 'YMD5111573', '123456'),
(30, 56, 'YMD9000650', '123456'),
(31, 57, 'YMD1245780', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user_paid_reciept`
--

CREATE TABLE `user_paid_reciept` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trans_id` text,
  `img_path` varchar(255) NOT NULL,
  `paid_date` datetime NOT NULL,
  `paid_to` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_paid_reciept`
--

INSERT INTO `user_paid_reciept` (`id`, `user_id`, `trans_id`, `img_path`, `paid_date`, `paid_to`) VALUES
(1, 1, '123456789122', 'images/Digital Assistant.PNG', '2020-02-29 03:42:12', 'YMD1011101');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet_concat`
--

CREATE TABLE `user_wallet_concat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` float NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `amount_withdrawn` float NOT NULL,
  `date_withdrawn` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_wallet_concat`
--

INSERT INTO `user_wallet_concat` (`id`, `user_id`, `total_amount`, `date_updated`, `amount_withdrawn`, `date_withdrawn`) VALUES
(3, 2, 300, '2020-03-16 10:57:47', 0, NULL),
(4, 8, 300, '2020-03-19 01:26:16', 0, NULL),
(5, 7, 200, '2020-03-16 10:57:47', 0, NULL),
(6, 9, 100, '2020-03-19 01:26:16', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet_credit`
--

CREATE TABLE `user_wallet_credit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `amount_added` float NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_wallet_credit`
--

INSERT INTO `user_wallet_credit` (`id`, `user_id`, `full_name`, `amount_added`, `date_added`) VALUES
(1, 2, 'Kumari Jio', 100, '2020-03-11 10:23:51'),
(2, 4, 'Madhavi Jio', 100, '2020-03-11 10:30:07'),
(3, 4, 'Madhu Jio', 100, '2020-03-11 10:35:18'),
(4, 4, 'Madhu Jio', 100, '2020-03-11 10:36:09'),
(5, 2, 'Moulika P', 100, '2020-03-11 11:11:05'),
(6, 7, 'Malathi P', 100, '2020-03-11 11:13:30'),
(7, 7, 'Moulika P', 100, '2020-03-11 12:02:46'),
(8, 7, 'Moulika P', 100, '2020-03-11 12:07:53'),
(9, 7, 'Moulika P', 100, '2020-03-11 12:08:33'),
(10, 7, 'Moulika P', 100, '2020-03-11 12:09:39'),
(11, 7, 'Moulika P', 100, '2020-03-11 12:17:09'),
(12, 7, 'Moulika P', 100, '2020-03-11 12:18:36'),
(13, 7, 'Moulika P', 100, '2020-03-11 12:21:57'),
(14, 7, 'Moulika P', 100, '2020-03-11 12:23:36'),
(15, 7, 'Moulika P', 100, '2020-03-11 12:25:05'),
(16, 8, 'Malathi P', 100, '2020-03-11 12:33:39'),
(17, 8, 'Malathi P', 100, '2020-03-11 12:35:27'),
(18, 8, 'Malathi P', 100, '2020-03-11 12:42:24'),
(19, 8, 'Malathi P', 100, '2020-03-11 12:42:55'),
(20, 8, 'Malathi P', 100, '2020-03-11 12:43:20'),
(21, 8, 'Malathi P', 100, '2020-03-11 12:44:23'),
(22, 8, 'Malathi P', 100, '2020-03-11 12:44:58'),
(23, 8, 'Malathi P', 100, '2020-03-11 12:45:15'),
(24, 8, 'Malathi P', 100, '2020-03-11 12:45:51'),
(25, 8, 'Malathi P', 100, '2020-03-11 12:46:27'),
(26, 8, 'Malathi P', 100, '2020-03-11 12:46:27'),
(27, 8, 'Malathi P', 100, '2020-03-11 12:48:11'),
(28, 7, 'Moulika P', 100, '2020-03-11 12:48:11'),
(29, 2, 'Elina C', 100, '2020-03-11 12:48:11'),
(30, 8, 'Malathi P', 100, '2020-03-11 12:48:11'),
(31, 7, 'Moulika P', 100, '2020-03-11 12:48:11'),
(32, 2, 'Elina C', 100, '2020-03-11 12:48:11'),
(33, 8, 'Malathi P', 100, '2020-03-11 12:49:19'),
(34, 7, 'Moulika P', 100, '2020-03-11 12:49:19'),
(35, 2, 'Elina C', 100, '2020-03-11 12:49:19'),
(36, 8, 'Malathi P', 100, '2020-03-11 01:14:32'),
(37, 7, 'Moulika P', 100, '2020-03-11 01:14:32'),
(38, 2, 'Elina C', 100, '2020-03-11 01:14:32'),
(39, 8, 'Malathi P', 100, '2020-03-11 01:15:43'),
(40, 7, 'Moulika P', 100, '2020-03-11 01:15:43'),
(41, 2, 'Elina C', 100, '2020-03-11 01:15:43'),
(42, 8, 'Malathi P', 100, '2020-03-11 01:16:53'),
(43, 7, 'Moulika P', 100, '2020-03-11 01:16:53'),
(44, 2, 'Elina C', 100, '2020-03-11 01:16:54'),
(45, 8, 'Malathi P', 100, '2020-03-11 01:17:58'),
(46, 7, 'Moulika P', 100, '2020-03-11 01:17:58'),
(47, 2, 'Elina C', 100, '2020-03-11 01:17:58'),
(48, 8, 'Malathi P', 100, '2020-03-11 01:18:02'),
(49, 7, 'Moulika P', 100, '2020-03-11 01:18:03'),
(50, 2, 'Elina C', 100, '2020-03-11 01:18:03'),
(51, 8, 'Malathi P', 100, '2020-03-11 01:19:24'),
(52, 7, 'Moulika P', 100, '2020-03-11 01:19:24'),
(53, 2, 'Elina C', 100, '2020-03-11 01:19:24'),
(54, 8, 'Malathi P', 100, '2020-03-11 01:20:43'),
(55, 7, 'Moulika P', 100, '2020-03-11 01:20:43'),
(56, 2, 'Elina C', 100, '2020-03-11 01:20:43'),
(57, 8, 'Malathi P', 100, '2020-03-11 01:20:45'),
(58, 7, 'Moulika P', 100, '2020-03-11 01:20:45'),
(59, 2, 'Elina C', 100, '2020-03-11 01:20:45'),
(60, 8, 'Malathi P', 100, '2020-03-11 01:22:10'),
(61, 7, 'Moulika P', 100, '2020-03-11 01:22:10'),
(62, 2, 'Elina C', 100, '2020-03-11 01:22:10'),
(63, 8, 'Malathi P', 100, '2020-03-11 01:22:22'),
(64, 7, 'Moulika P', 100, '2020-03-11 01:22:22'),
(65, 2, 'Elina C', 100, '2020-03-11 01:22:22'),
(66, 8, 'Malathi P', 100, '2020-03-11 01:26:06'),
(67, 8, 'Malathi P', 100, '2020-03-11 01:26:23'),
(68, 7, 'Moulika P', 100, '2020-03-11 01:26:23'),
(69, 8, 'Malathi P', 100, '2020-03-11 01:26:41'),
(70, 7, 'Moulika P', 100, '2020-03-11 01:26:41'),
(71, 2, 'Elina C', 100, '2020-03-11 01:26:41'),
(72, 8, 'Malathi P', 100, '2020-03-11 01:26:56'),
(73, 7, 'Moulika P', 100, '2020-03-11 01:26:56'),
(74, 2, 'Elina C', 100, '2020-03-11 01:26:56'),
(75, 8, 'Malathi P', 100, '2020-03-11 01:27:49'),
(76, 7, 'Moulika P', 100, '2020-03-11 01:27:50'),
(77, 2, 'Elina C', 100, '2020-03-11 01:27:50'),
(78, 8, 'Malathi P', 100, '2020-03-11 01:28:15'),
(79, 7, 'Moulika P', 100, '2020-03-11 01:28:15'),
(80, 2, 'Elina C', 100, '2020-03-11 01:28:15'),
(81, 8, 'Malathi P', 100, '2020-03-11 01:29:01'),
(82, 7, 'Moulika P', 100, '2020-03-11 01:29:01'),
(83, 2, 'Elina C', 100, '2020-03-11 01:29:01'),
(84, 8, 'Malathi P', 100, '2020-03-11 01:31:47'),
(85, 7, 'Moulika P', 100, '2020-03-11 01:31:47'),
(86, 2, 'Elina C', 100, '2020-03-11 01:31:47'),
(87, 8, 'Malathi P', 100, '2020-03-11 01:31:51'),
(88, 7, 'Moulika P', 100, '2020-03-11 01:31:51'),
(89, 2, 'Elina C', 100, '2020-03-11 01:31:51'),
(90, 8, 'Malathi P', 100, '2020-03-11 01:32:51'),
(91, 7, 'Moulika P', 100, '2020-03-11 01:32:51'),
(92, 2, 'Elina C', 100, '2020-03-11 01:32:51'),
(93, 8, 'Malathi P', 100, '2020-03-11 01:33:17'),
(94, 7, 'Moulika P', 100, '2020-03-11 01:33:17'),
(95, 2, 'Elina C', 100, '2020-03-11 01:33:17'),
(96, 8, 'Malathi P', 100, '2020-03-11 01:36:38'),
(97, 7, 'Moulika P', 100, '2020-03-11 01:36:38'),
(98, 2, 'Elina C', 100, '2020-03-11 01:36:38'),
(99, 8, 'Malathi P', 100, '2020-03-11 01:37:32'),
(100, 7, 'Moulika P', 100, '2020-03-11 01:37:32'),
(101, 2, 'Elina C', 100, '2020-03-11 01:37:32'),
(102, 8, 'Malathi P', 100, '2020-03-11 01:46:21'),
(103, 7, 'Moulika P', 100, '2020-03-11 01:46:21'),
(104, 2, 'Elina C', 100, '2020-03-11 01:46:21'),
(105, 8, 'Malathi P', 100, '2020-03-16 10:57:46'),
(106, 7, 'Moulika P', 100, '2020-03-16 10:57:46'),
(107, 2, 'Elina C', 100, '2020-03-16 10:57:47'),
(108, 9, 'Karuna Kumari', 100, '2020-03-19 01:26:16'),
(109, 8, 'Malathi P', 100, '2020-03-19 01:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet_credit_old`
--

CREATE TABLE `user_wallet_credit_old` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_added` float NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet_final`
--

CREATE TABLE `user_wallet_final` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `paymemt_mode` varchar(250) NOT NULL,
  `trans_id` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `rec_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_withdrawls`
--

CREATE TABLE `user_withdrawls` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(250) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `amount_req` float NOT NULL,
  `date_req` date NOT NULL,
  `amount_received` float NOT NULL,
  `date_received` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provide_helpers`
--
ALTER TABLE `provide_helpers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_basic`
--
ALTER TABLE `user_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details_old2`
--
ALTER TABLE `user_details_old2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_kyc`
--
ALTER TABLE `user_kyc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_paid_reciept`
--
ALTER TABLE `user_paid_reciept`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_wallet_concat`
--
ALTER TABLE `user_wallet_concat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_wallet_credit`
--
ALTER TABLE `user_wallet_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallet_credit_old`
--
ALTER TABLE `user_wallet_credit_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_wallet_final`
--
ALTER TABLE `user_wallet_final`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_withdrawls`
--
ALTER TABLE `user_withdrawls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `provide_helpers`
--
ALTER TABLE `provide_helpers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_basic`
--
ALTER TABLE `user_basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_details_old2`
--
ALTER TABLE `user_details_old2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_kyc`
--
ALTER TABLE `user_kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_paid_reciept`
--
ALTER TABLE `user_paid_reciept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_wallet_concat`
--
ALTER TABLE `user_wallet_concat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_wallet_credit`
--
ALTER TABLE `user_wallet_credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `user_wallet_credit_old`
--
ALTER TABLE `user_wallet_credit_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_wallet_final`
--
ALTER TABLE `user_wallet_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_withdrawls`
--
ALTER TABLE `user_withdrawls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_kyc`
--
ALTER TABLE `user_kyc`
  ADD CONSTRAINT `user_kyc_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`id`);

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`id`);

--
-- Constraints for table `user_wallet_credit_old`
--
ALTER TABLE `user_wallet_credit_old`
  ADD CONSTRAINT `user_wallet_credit_old_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`id`);

--
-- Constraints for table `user_wallet_final`
--
ALTER TABLE `user_wallet_final`
  ADD CONSTRAINT `user_wallet_final_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`id`);

--
-- Constraints for table `user_withdrawls`
--
ALTER TABLE `user_withdrawls`
  ADD CONSTRAINT `user_withdrawls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
