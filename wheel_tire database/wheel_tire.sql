-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 08:17 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wheel_tire`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(8) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `account_active` int(11) DEFAULT '1',
  `account_type` varchar(50) NOT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_address1` varchar(255) DEFAULT NULL,
  `account_address2` varchar(255) DEFAULT NULL,
  `account_city` varchar(50) DEFAULT NULL,
  `account_state` varchar(25) DEFAULT NULL,
  `account_zip` varchar(11) DEFAULT NULL,
  `account_phone` varchar(25) DEFAULT NULL,
  `account_fax` varchar(25) DEFAULT NULL,
  `account_email` varchar(50) DEFAULT NULL,
  `account_notes` longtext,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `parent_id`, `account_active`, `account_type`, `account_name`, `account_address1`, `account_address2`, `account_city`, `account_state`, `account_zip`, `account_phone`, `account_fax`, `account_email`, `account_notes`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Customer', 'AMERICAN TRANSPORTATION SERVICES', 'Home 17 , Street 01 para shout factory near railway signal work shop lahore', 'sfsdfsdf', 'Lahore', 'Punjab', '54900', '3224001730', 'sdfs344', 'bilalshah512@yahoo.com', 'dfsdfsdfsdf', 1, '2019-05-17 05:47:40', '2019-05-17 05:47:40'),
(2, 0, 1, 'Customer', 'Vision Plus', 'Home 17 , Street 01 para shout factory near railway signal work shop lahore', NULL, 'Lahore', 'Punjab', '54900', '3224001730', '45435', 'wheel@gmail.com', 'dsgfsdfsd fsdfsdf sdfsdfsd', 1, '2019-05-22 05:30:16', '2019-05-22 06:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `description`) VALUES
(1, 'Database'),
(2, 'Vendor'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `block_reports`
--

CREATE TABLE `block_reports` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(7) NOT NULL,
  `report_id` int(11) NOT NULL,
  `comments` varchar(256) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `report_id`, `comments`, `created_by`, `created_at`, `updated_at`) VALUES
(14, 13, 'New Comment for report 13', 7, '2019-06-03 09:03:54', '2019-06-03 09:03:54'),
(13, 13, 'hi.\r\nthis is comment 1 on report 13', 7, '2019-06-03 08:01:12', '2019-06-03 08:01:12'),
(12, 4, 'This is Comment', 7, '2019-05-29 05:35:21', '2019-05-29 05:35:21'),
(26, 12, 'comment for report 12', 7, '2019-06-03 10:02:04', '2019-06-03 10:02:04'),
(25, 12, 'new comment 12', 7, '2019-06-03 10:01:50', '2019-06-03 10:01:50'),
(24, 11, 'new comment for report 11', 7, '2019-06-03 09:58:29', '2019-06-03 09:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `comments_newest`
--

CREATE TABLE `comments_newest` (
  `user_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `account_id` int(8) NOT NULL,
  `user_id` int(8) DEFAULT NULL,
  `location_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` longtext,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `account_id`, `user_id`, `location_name`, `user_name`, `email`, `password`, `address`, `city`, `state`, `zip`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(26, 1, 24, 'new', 'new', 'new@new.com', '$2y$10$EUueP.Wjzoro5I7Jdo9vTeiV0J0Jt5OBOWs.squr1yZFfJKUX/dV6', 'new', 'new', 'new', 'new', 1, 1, '2019-06-19 00:59:25', '2019-06-19 00:59:25'),
(25, 1, 22, 'New location', 'saleem', 'saleem@location.com', '$2y$10$wjILvEjCnGZsOyZC1EyQPe.9vja8V1/bE2M1cp64s0Yleo0JWhxbm', 'address', 'city', 'state', 'zip', 1, 1, '2019-06-17 02:58:01', '2019-06-17 02:58:01'),
(20, 1, 19, 'Muslim Town', 'zaib', 'zaib@location.com', '$2y$10$BYObeaNZg52hYyvDkg7wJu4EsvXkpQmo2n9BgHgDfgCyi3NfU4vnO', 'address', 'city', 'state', 'zip', 1, 1, '2019-06-17 02:52:35', '2019-06-17 02:52:35'),
(21, 2, 20, 'krachi', 'pervez', 'pervez@location.com', '$2y$10$Ebt8sc8gegN8cGLlEz7eqO4xv0gAEtIiMrsKrcGoZ73lkKHE.rMsC', NULL, NULL, NULL, NULL, 1, 1, '2019-06-17 02:53:11', '2019-06-17 02:53:11'),
(19, 1, 18, 'lahore', 'aslam', 'aslam@location.com', '$2y$10$Bzyf7P79/.qfxOrioFYdhO9taZY9mAXn0rgk548BTt3RxQYgoYS/m', 'address', 'city', 'state', 'zip', 1, 1, '2019-06-17 02:51:45', '2019-06-17 02:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `location_manager`
--

CREATE TABLE `location_manager` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_to_account`
--

CREATE TABLE `location_to_account` (
  `account_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `slug`) VALUES
(1, 'Dashboard', 'dashboard'),
(2, 'Reports', 'reports'),
(3, 'Users', 'users'),
(4, 'Accounts', 'accounts'),
(5, 'Locations', 'locations'),
(6, 'Add Report', 'add_report');

-- --------------------------------------------------------

--
-- Table structure for table `module_permissions`
--

CREATE TABLE `module_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_permissions`
--

INSERT INTO `module_permissions` (`id`, `role_id`, `module_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 2, 5),
(10, 3, 1),
(11, 3, 2),
(12, 4, 6),
(13, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `fromuserid` int(11) NOT NULL,
  `touserid` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `ratingid` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `vendor_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `min_users` int(11) DEFAULT NULL,
  `max_users` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` longtext,
  `enable` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `userid` varchar(25) NOT NULL,
  `accountid` varchar(25) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `account_id` int(8) DEFAULT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `front_wheel_position` varchar(5) DEFAULT NULL,
  `rear_wheel_position` varchar(5) DEFAULT NULL,
  `steer_wheel_position` varchar(5) DEFAULT NULL,
  `location_id` int(2) DEFAULT NULL,
  `report_unit_num` varchar(80) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `comment` longtext,
  `last_user_comments` longtext,
  `signature` bit(1) DEFAULT b'0',
  `signature_by` int(11) DEFAULT NULL,
  `signature_on` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `account_id`, `vehicle_type`, `front_wheel_position`, `rear_wheel_position`, `steer_wheel_position`, `location_id`, `report_unit_num`, `name`, `weight`, `manager_id`, `comment`, `last_user_comments`, `signature`, `signature_by`, `signature_on`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 2, 'trailer', 'LF', 'LR', 'LS', 6, '1000', 'Atif Amin', 150, 39, 'some comments', NULL, b'0', NULL, '2019-05-27 16:53:57', 37, '2019-05-23 02:41:15', '2019-05-23 07:41:15'),
(4, 1, 'power_unit', 'LF', 'RR', 'RS', 0, 'unit 300', 'ray gross', 300, 40, 'test comments on new report', NULL, b'1', 7, '2019-05-29 06:34:23', 38, '2019-05-23 02:43:42', '2019-05-23 07:43:42'),
(5, 1, 'trailer', 'LF', 'LR', 'LS', 0, 'GF32', 'Zubair', 445, 6, 'This is comment', NULL, b'1', 7, '2019-05-29 06:31:46', 1, '2019-05-24 05:46:27', '2019-05-24 10:46:27'),
(6, 1, 'trailer', 'LF', 'LR', 'LS', 16, 'ht65', 'wheel', 550, 6, 'This is comment', '', b'1', 7, '2019-06-03 09:52:56', 1, '2019-05-24 05:48:46', '2019-05-24 10:48:46'),
(7, 1, 'trailer', 'LF', 'LR', 'LS', 15, '765', 'Know More', 660, 5, NULL, NULL, b'1', 7, '2019-05-29 06:33:29', 1, '2019-05-24 05:56:44', '2019-05-24 10:56:44'),
(9, 1, 'trailer', 'LF', 'LR', 'LS', 15, 'er43', 'Hire', 43, 7, NULL, NULL, b'1', 7, '2019-06-03 09:51:25', 1, '2019-05-29 07:34:50', '2019-05-29 12:34:50'),
(147, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 07:07:45', '2019-06-24 12:07:45'),
(146, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 07:06:53', '2019-06-24 12:06:53'),
(145, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 06:50:09', '2019-06-24 11:50:09'),
(144, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 06:49:56', '2019-06-24 11:49:56'),
(143, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 06:49:47', '2019-06-24 11:49:47'),
(142, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 06:49:30', '2019-06-24 11:49:30'),
(141, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 06:49:17', '2019-06-24 11:49:17'),
(140, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 06:46:42', '2019-06-24 11:46:42'),
(139, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 06:45:08', '2019-06-24 11:45:08'),
(138, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 06:44:25', '2019-06-24 11:44:25'),
(137, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 06:42:40', '2019-06-24 11:42:40'),
(136, 1, 'trailer', NULL, NULL, NULL, NULL, 'sdfsdf', 'sdfsdf', 43, 21, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 06:41:02', '2019-06-24 11:41:02'),
(135, 1, 'trailer', NULL, NULL, NULL, NULL, 'erwrw', 'werwerwerw', 43, 21, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-21 05:56:15', '2019-06-21 10:56:15'),
(134, 1, 'trailer', NULL, NULL, NULL, NULL, 'erwrw', 'werwerwerw', 43, 21, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-21 05:55:21', '2019-06-21 10:55:21'),
(133, 1, 'trailer', NULL, NULL, NULL, NULL, '32432', 'try Scan', 34, 10, '32', NULL, b'0', NULL, NULL, 1, '2019-06-20 09:13:27', '2019-06-20 14:13:27'),
(132, 1, 'power_unit', NULL, NULL, NULL, NULL, '324234', 'Muahammad Zubair Khan', 45, 23, 'test', NULL, b'0', NULL, NULL, 1, '2019-06-20 09:11:39', '2019-06-20 14:11:39'),
(131, 1, 'trailer', NULL, NULL, NULL, NULL, '324234', 'Hire', 45, 10, 'test', NULL, b'0', NULL, NULL, 1, '2019-06-20 08:07:05', '2019-06-20 13:07:05'),
(130, 1, 'trailer', NULL, NULL, NULL, NULL, '34', 'Know More', 50, 10, 'test', NULL, b'0', NULL, NULL, 1, '2019-06-20 08:06:03', '2019-06-20 13:06:03'),
(129, 1, 'trailer', NULL, NULL, NULL, NULL, 'sdfsdf', 'sdfdsfsdf', 43, 25, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-20 02:17:25', '2019-06-20 07:17:25'),
(128, 1, 'trailer', NULL, NULL, NULL, NULL, 'sdfsdf', 'sdfdsfsdf', 43, 25, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-20 02:16:31', '2019-06-20 07:16:31'),
(127, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfsdf', 'sdfsdfsdfs', 43, 25, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-20 02:04:11', '2019-06-20 07:04:11'),
(126, 1, 'trailer', NULL, NULL, NULL, NULL, 'ewrew', 'dsfdsf', 43, 25, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-20 01:58:46', '2019-06-20 06:58:46'),
(125, 1, 'trailer', NULL, NULL, NULL, NULL, 'ewrew', 'dsfdsf', 43, 25, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-20 01:55:07', '2019-06-20 06:55:07'),
(124, 1, 'trailer', NULL, NULL, NULL, NULL, 'sdf', 'sdfdfs', 43, 25, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-20 01:33:41', '2019-06-20 06:33:41'),
(123, 1, 'trailer', NULL, NULL, NULL, NULL, 'unit', 'name', 54, 26, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-20 01:32:59', '2019-06-20 06:32:59'),
(122, 1, 'trailer', NULL, NULL, NULL, NULL, 'unit', 'name', 54, 26, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-20 01:23:57', '2019-06-20 06:23:57'),
(121, 1, 'power_unit', NULL, NULL, NULL, 26, 'test', 'test', 45, 26, NULL, NULL, b'0', NULL, NULL, 24, '2019-06-19 08:07:07', '2019-06-19 13:07:07'),
(120, 1, 'trailer', NULL, NULL, NULL, 26, 'dfgfdg', 'dfgfdg', 454, 26, 'sdffdsfs', NULL, b'0', NULL, NULL, 24, '2019-06-19 07:53:41', '2019-06-19 12:53:41'),
(119, 1, 'trailer', NULL, NULL, NULL, 26, 'dfgdf', 'dfgdgdfgd', 54, 26, NULL, NULL, b'0', NULL, NULL, 24, '2019-06-19 07:19:13', '2019-06-19 12:19:13'),
(118, 1, 'trailer', NULL, NULL, NULL, 26, 'sdsada', 'asdasda', 2323, 26, NULL, NULL, b'0', NULL, NULL, 24, '2019-06-19 07:14:45', '2019-06-19 12:14:45'),
(117, 1, 'trailer', NULL, NULL, NULL, NULL, 'sdfg', 'fdgdfgfdg', 45678, 26, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-19 07:13:06', '2019-06-19 12:13:06'),
(116, 1, 'trailer', NULL, NULL, NULL, NULL, '1212', 'Muahammad Zubair Khan', 45, 25, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-19 06:52:34', '2019-06-19 11:52:34'),
(115, 1, 'trailer', NULL, NULL, NULL, NULL, '1212', 'Know More', 45, 25, NULL, NULL, b'0', NULL, NULL, 25, '2019-06-19 06:51:30', '2019-06-19 11:51:30'),
(114, 1, 'trailer', NULL, NULL, NULL, NULL, 'qwqw', 'Muahammad Zubair Khan', 45, 25, NULL, NULL, b'0', NULL, NULL, 25, '2019-06-19 06:51:09', '2019-06-19 11:51:09'),
(113, 1, 'trailer', NULL, NULL, NULL, NULL, 'qwqw', 'Muahammad Zubair Khan', 43, 26, 'dsfsd', NULL, b'0', NULL, NULL, 25, '2019-06-19 06:49:51', '2019-06-19 11:49:51'),
(112, 1, 'trailer', NULL, NULL, NULL, NULL, 'qwqw', 'dfgdfgd', 45, 25, 'comment', NULL, b'0', NULL, NULL, 1, '2019-06-19 06:48:11', '2019-06-19 11:48:11'),
(111, 1, 'trailer', NULL, NULL, NULL, NULL, 'fgdgfdgdf', 'dfgdfgd', 4343, 23, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-19 06:37:35', '2019-06-19 11:37:35'),
(110, 1, 'trailer', NULL, NULL, NULL, 26, 'dsf', 'sdfsd', 43, 25, NULL, NULL, b'0', NULL, NULL, 24, '2019-06-19 06:04:34', '2019-06-19 11:04:34'),
(109, 1, 'power_unit', NULL, NULL, NULL, NULL, 'images', 'too many', 54, 26, 'This is comment', NULL, b'0', NULL, NULL, 1, '2019-06-19 04:58:55', '2019-06-19 09:58:55'),
(151, 1, 'trailer', NULL, NULL, NULL, NULL, 'fdgfdgfd', 'gfdgdfgdgd', 54, 23, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 07:13:43', '2019-06-24 12:13:43'),
(150, 1, 'trailer', NULL, NULL, NULL, NULL, 'fdgfdgfd', 'gfdgdfgdgd', 54, 23, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 07:12:43', '2019-06-24 12:12:43'),
(149, 1, 'trailer', NULL, NULL, NULL, NULL, 'fdgfdgfd', 'gfdgdfgdgd', 54, 23, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 07:11:59', '2019-06-24 12:11:59'),
(148, 1, 'trailer', NULL, NULL, NULL, NULL, 'dsfdfs', 'dsfsdfsdf', 32423, 6, NULL, NULL, b'0', NULL, NULL, 1, '2019-06-24 07:08:23', '2019-06-24 12:08:23'),
(108, 1, 'power_unit', NULL, NULL, NULL, NULL, 'images', 'too many', 54, 26, 'This is comment', NULL, b'0', NULL, NULL, 1, '2019-06-19 04:57:53', '2019-06-19 09:57:53'),
(107, 1, 'trailer', NULL, NULL, NULL, 26, 'unit number', 'name', 54, 26, 'This is comment', NULL, b'0', NULL, NULL, 24, '2019-06-19 03:10:42', '2019-06-19 08:10:42'),
(105, 1, 'trailer', NULL, NULL, NULL, 20, 'sadasd', 'sdasdas', 11, 23, 'asdasdas', NULL, b'0', NULL, NULL, 19, '2019-06-18 03:22:53', '2019-06-18 08:22:53'),
(106, 1, 'trailer', NULL, NULL, NULL, NULL, 'unit number', 'global admin', 43, 23, 'comment', NULL, b'0', NULL, NULL, 1, '2019-06-18 05:07:32', '2019-06-18 10:07:32'),
(104, 1, 'trailer', NULL, NULL, NULL, 20, 'unit', 'name', 54, 23, 'comment', NULL, b'0', NULL, NULL, 19, '2019-06-18 03:17:13', '2019-06-18 08:17:13'),
(103, 1, 'trailer', NULL, NULL, NULL, 16, 'sr', 'dsfsdf', 34, 6, 'sdfsfsdf', NULL, b'0', NULL, NULL, 1, '2019-06-17 01:46:57', '2019-06-17 06:46:57'),
(102, 1, 'trailer', NULL, NULL, NULL, 16, 'rtertert', 'tertretre', 45345, 10, 'reteteter', NULL, b'0', NULL, NULL, 1, '2019-06-13 08:59:30', '2019-06-13 13:59:30'),
(101, 1, 'trailer', NULL, NULL, NULL, 16, 'dgdfgdf', 'dfgdfgdfg', 345345, 10, 'fdgdgdf', NULL, b'0', NULL, NULL, 1, '2019-06-13 08:58:15', '2019-06-13 13:58:15'),
(100, 2, 'trailer', NULL, NULL, NULL, 16, '435435435', '3454353453', 45354, 10, NULL, NULL, b'0', NULL, NULL, 14, '2019-06-13 08:57:09', '2019-06-13 13:57:09'),
(99, 2, 'trailer', NULL, NULL, NULL, 16, 'ertret', 'ertertert', 4543, 10, NULL, NULL, b'0', NULL, NULL, 14, '2019-06-13 08:55:41', '2019-06-13 13:55:41'),
(91, 1, 'trailer', NULL, NULL, NULL, 15, 'hdf', 'Muahammad Zubair Khan', 45, 7, 'sdfsdfsdf', NULL, b'0', NULL, NULL, 1, '2019-06-12 06:47:21', '2019-06-12 11:47:21'),
(92, 1, 'trailer', NULL, NULL, NULL, 15, 'hdf', 'Muahammad Zubair Khan', 45, 7, 'sdfsdfsdf', NULL, b'0', NULL, NULL, 1, '2019-06-12 06:47:43', '2019-06-12 11:47:43'),
(93, 2, 'trailer', NULL, NULL, NULL, NULL, 'rtetert', 'ertertert', 435, 10, NULL, NULL, b'0', NULL, NULL, 14, '2019-06-13 08:36:58', '2019-06-13 13:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `report_images`
--

CREATE TABLE `report_images` (
  `id` int(11) NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `image_type` varchar(50) DEFAULT NULL,
  `url` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_images`
--

INSERT INTO `report_images` (`id`, `report_id`, `image_type`, `url`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 4, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559121202/aw84hptctlzomdi9h5gv.webp', 1, '2019-05-29 09:12:29', '2019-05-29 09:12:29'),
(2, 4, 'left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559122663/vxf4e69txjyx3qwckhhj.webp', 1, '2019-05-29 09:36:50', '2019-05-29 09:36:50'),
(9, 4, 'left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559133931/bfvalf2ofaayvj5rlw9i.webp', 1, '2019-05-29 12:44:38', '2019-05-29 12:44:38'),
(14, NULL, NULL, 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559218134/k4vp44b1ionkcvvwfenv.webp', 1, '2019-05-30 12:08:00', '2019-05-30 12:08:00'),
(25, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302489/wpqpgvjuudjqplmdqivb.webp', 1, '2019-05-31 11:33:54', '2019-05-31 11:33:54'),
(26, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302491/sqf52rvbvoyptury5snd.webp', 1, '2019-05-31 11:33:55', '2019-05-31 11:33:55'),
(27, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302492/ujzrtwg52tnbufcmdkw4.webp', 1, '2019-05-31 11:33:57', '2019-05-31 11:33:57'),
(28, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302516/ubyibbp4guyk0enn7w1r.webp', 1, '2019-05-31 11:34:21', '2019-05-31 11:34:21'),
(29, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302518/wbf5yk0fwj7h0gocq8jh.webp', 1, '2019-05-31 11:34:23', '2019-05-31 11:34:23'),
(30, NULL, 'png', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559302520/otuh8l43mmvlncbfuqeu.webp', 1, '2019-05-31 11:34:25', '2019-05-31 11:34:25'),
(31, 11, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559543871/cbnaudegnawetne9x9m5.webp', 1, '2019-06-03 06:37:04', '2019-06-03 06:37:04'),
(32, 11, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559543873/o6py4ik1qc2nbum3xztk.webp', 1, '2019-06-03 06:37:04', '2019-06-03 06:37:04'),
(33, 11, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559543875/y2bade9shahdmj9paznp.webp', 1, '2019-06-03 06:37:04', '2019-06-03 06:37:04'),
(34, 11, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559543876/afqlpqpdhnytbnv4t3ap.webp', 1, '2019-06-03 06:37:04', '2019-06-03 06:37:04'),
(35, 11, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559543878/rje4itko88aqfhhl372k.webp', 1, '2019-06-03 06:37:04', '2019-06-03 06:37:04'),
(36, 11, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559543880/tglt5bpgnwn1mvciyev0.webp', 1, '2019-06-03 06:37:04', '2019-06-03 06:37:04'),
(37, 12, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559544475/g5kulxdun4v6qlesj7bs.webp', 1, '2019-06-03 06:47:06', '2019-06-03 06:47:06'),
(38, 12, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559544477/r32nhazmr9noe6tecgjl.webp', 1, '2019-06-03 06:47:06', '2019-06-03 06:47:06'),
(39, 12, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559544479/zfkb8tqpysc9vh625zi4.webp', 1, '2019-06-03 06:47:06', '2019-06-03 06:47:06'),
(40, 12, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559544482/cd5cukyeqmz9bdptsuzz.webp', 1, '2019-06-03 06:47:06', '2019-06-03 06:47:06'),
(41, 13, 'power_unit_left_stear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559544698/sfbptxwgacpg1l8gfbth.webp', 1, '2019-06-03 06:50:52', '2019-06-03 06:50:52'),
(42, 13, 'power_unit_left_stear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559544700/kkugijuzhvudh9hq4drp.webp', 1, '2019-06-03 06:50:52', '2019-06-03 06:50:52'),
(43, 13, 'power_unit_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559544702/njzr1z5c2qmsy2gcupub.webp', 1, '2019-06-03 06:50:52', '2019-06-03 06:50:52'),
(44, 13, 'power_unit_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559544704/xhku8tdnk54t91ayhmcc.webp', 1, '2019-06-03 06:50:52', '2019-06-03 06:50:52'),
(45, 13, 'power_unit_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559544706/v5wo0esdi0wgx7njlvh8.webp', 1, '2019-06-03 06:50:52', '2019-06-03 06:50:52'),
(46, 13, 'power_unit_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559544708/vzyw4dxjw3lxig869zuz.webp', 1, '2019-06-03 06:50:52', '2019-06-03 06:50:52'),
(47, 13, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559548826/lf0mhvrr5ym65zn8vkdl.webp', 7, '2019-06-03 07:59:30', '2019-06-03 07:59:30'),
(48, 14, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559554979/hjhkmgqj07ktaieqnxhi.webp', 7, '2019-06-03 09:42:03', '2019-06-03 09:42:03'),
(49, 17, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559562291/eqe8h2zqwbyiagplr5lb.webp', 7, '2019-06-03 11:43:58', '2019-06-03 11:43:58'),
(50, 17, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559562293/tea0os2aob2x51vsycge.webp', 7, '2019-06-03 11:43:58', '2019-06-03 11:43:58'),
(51, 17, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559562295/uibxebmvp1wuzhv95gsl.webp', 7, '2019-06-03 11:43:58', '2019-06-03 11:43:58'),
(52, 22, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559562775/cotszrk08bnegfdlxyad.webp', 7, '2019-06-03 11:52:00', '2019-06-03 11:52:00'),
(53, 22, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559562776/bkulcfxdbhkf8m4zx8vc.webp', 7, '2019-06-03 11:52:00', '2019-06-03 11:52:00'),
(54, 23, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559563078/yeu1jxg03ecb91ftefes.webp', 7, '2019-06-03 11:57:09', '2019-06-03 11:57:09'),
(55, 23, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559563080/iqfi4sqmtx8ci6jpqk1r.webp', 7, '2019-06-03 11:57:09', '2019-06-03 11:57:09'),
(56, 23, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559563081/w4b2nldyrie6y8yifbt7.webp', 7, '2019-06-03 11:57:09', '2019-06-03 11:57:09'),
(57, 23, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559563084/ec1cyuqljivjcvtr6ot3.webp', 7, '2019-06-03 11:57:09', '2019-06-03 11:57:09'),
(58, 23, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559563085/erqsscosiqdt2ouaqi9n.webp', 7, '2019-06-03 11:57:09', '2019-06-03 11:57:09'),
(59, 24, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565387/ou96qktrqt9sbhpuhgn6.webp', 1, '2019-06-03 12:35:36', '2019-06-03 12:35:36'),
(60, 24, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565389/uekqe7jabugibotj2ctc.webp', 1, '2019-06-03 12:35:36', '2019-06-03 12:35:36'),
(61, 24, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565391/oubl5ha0tttvlxggw2yc.webp', 1, '2019-06-03 12:35:36', '2019-06-03 12:35:36'),
(62, 24, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565393/yjlepuxtmlkpksx6gbhq.webp', 1, '2019-06-03 12:35:36', '2019-06-03 12:35:36'),
(63, 25, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565610/sec7udvigbckvjaeolks.webp', 1, '2019-06-03 12:39:18', '2019-06-03 12:39:18'),
(64, 25, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565611/tilnsl7xay4whknsf1zs.webp', 1, '2019-06-03 12:39:18', '2019-06-03 12:39:18'),
(65, 25, 'trailer_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565613/e5ettoevwx2fvscvsquh.webp', 1, '2019-06-03 12:39:18', '2019-06-03 12:39:18'),
(66, 25, 'trailer_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565614/p3nz1jegvkpef1qwuefq.webp', 1, '2019-06-03 12:39:18', '2019-06-03 12:39:18'),
(67, 26, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565694/t4grk5hvhpuvjhuhdcjj.webp', 7, '2019-06-03 12:40:43', '2019-06-03 12:40:43'),
(68, 26, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565696/iab2aoufk4rswdtyeize.webp', 7, '2019-06-03 12:40:43', '2019-06-03 12:40:43'),
(69, 26, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565698/etv2g8xahnfq8sdd0ksg.webp', 7, '2019-06-03 12:40:43', '2019-06-03 12:40:43'),
(70, 26, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565700/bvwq7iox13zhrofo8cjz.webp', 7, '2019-06-03 12:40:44', '2019-06-03 12:40:44'),
(71, 27, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565745/uzgldfklfrjoforbnxfc.webp', 7, '2019-06-03 12:41:33', '2019-06-03 12:41:33'),
(72, 27, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565746/p6ltcyh93k767ikzjv21.webp', 7, '2019-06-03 12:41:34', '2019-06-03 12:41:34'),
(73, 27, 'trailer_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565748/fp71vxbyvkgrcud3iyaj.webp', 7, '2019-06-03 12:41:34', '2019-06-03 12:41:34'),
(74, 27, 'trailer_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1559565750/pvb5jc4giyxvoc2hwjpc.webp', 7, '2019-06-03 12:41:34', '2019-06-03 12:41:34'),
(75, 68, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560230997/nblyzoxuhqkzl4hdo3us.webp', 1, '2019-06-11 05:29:01', '2019-06-11 05:29:01'),
(76, 68, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560230999/o85sd0jhrffjdsrzj3kx.webp', 1, '2019-06-11 05:29:01', '2019-06-11 05:29:01'),
(77, 69, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560231925/zl424nrgtuaxcecahbde.webp', 1, '2019-06-11 05:44:31', '2019-06-11 05:44:31'),
(78, 69, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560231929/um55hr5m5vscczn6v4jd.webp', 1, '2019-06-11 05:44:31', '2019-06-11 05:44:31'),
(79, 15, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560246272/njgtpg2jxhyweaddmyud.webp', 7, '2019-06-11 09:43:33', '2019-06-11 09:43:33'),
(80, 16, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560254816/ocwm0jikenjn2ssdw21g.webp', 7, '2019-06-11 12:05:57', '2019-06-11 12:05:57'),
(81, 102, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560434437/i3kghh1dsh4n4k1ndhvu.webp', 1, '2019-06-13 13:59:37', '2019-06-13 13:59:37'),
(82, 102, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560434439/r5brl7lbwtmlmxakaqag.webp', 1, '2019-06-13 13:59:37', '2019-06-13 13:59:37'),
(83, 105, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560930496/dgtcgg9o6yckkuma1llf.webp', 26, '2019-06-19 07:47:12', '2019-06-19 07:47:12'),
(84, 104, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560930523/fyaoagtbdprm0f99shq3.webp', 26, '2019-06-19 07:47:38', '2019-06-19 07:47:38'),
(85, 107, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560931918/q1ntk7itbv1gcgkuhktx.webp', 24, '2019-06-19 08:10:59', '2019-06-19 08:10:59'),
(86, 107, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560931920/evotz3gdofvgqofd1ap7.webp', 24, '2019-06-19 08:10:59', '2019-06-19 08:10:59'),
(87, 107, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560931922/ejkte3qgauhq4rwhtlum.webp', 24, '2019-06-19 08:10:59', '2019-06-19 08:10:59'),
(88, 107, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560931924/d0ugtkdan8imeauvilal.webp', 24, '2019-06-19 08:10:59', '2019-06-19 08:10:59'),
(89, 107, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560941755/qngz52gbi2fw8wnhnsxm.webp', 26, '2019-06-19 10:54:50', '2019-06-19 10:54:50'),
(90, 110, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560943906/d08oftuwbwjjxzbp71jo.webp', 25, '2019-06-19 11:30:40', '2019-06-19 11:30:40'),
(91, 118, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560946794/t1mltigoqjxy6vckfhrs.webp', 26, '2019-06-19 12:18:49', '2019-06-19 12:18:49'),
(92, 119, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560948808/efuozhpleido1jiijtl1.webp', 26, '2019-06-19 12:52:23', '2019-06-19 12:52:23'),
(93, 120, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949259/k05i7cqlf0f6twdlycm2.webp', 26, '2019-06-19 12:59:53', '2019-06-19 12:59:53'),
(94, 121, 'power_unit_left_stear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949698/gzlxrsjuvnqzlpov7wv1.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(95, 121, 'power_unit_right_stear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949700/t38mvztlccesr43urqk6.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(96, 121, 'power_unit_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949703/cqm9qb5fo1vjasrkr95t.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(97, 121, 'power_unit_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949704/twslfvg1nv50obbl02qd.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(98, 121, 'power_unit_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949707/g83lrvbda4tnsjqjt36j.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(99, 121, 'power_unit_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949708/csoy7nkgf6bnwv3jy09o.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(100, 131, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036100/erqodadhj1zr0wgw9qqa.webp', 1, '2019-06-20 13:07:20', '2019-06-20 13:07:20'),
(101, 131, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036102/yc8paotfdlwjuevyxoot.webp', 1, '2019-06-20 13:07:21', '2019-06-20 13:07:21'),
(102, 131, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036105/fpxo9oghj5mvrjw6kbiw.webp', 1, '2019-06-20 13:07:21', '2019-06-20 13:07:21'),
(103, 131, 'trailer_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036107/hqttbpbxl6w6zesykmfx.webp', 1, '2019-06-20 13:07:21', '2019-06-20 13:07:21'),
(104, 131, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036100/erqodadhj1zr0wgw9qqa.webp', 1, '2019-06-20 13:07:20', '2019-06-20 13:07:20'),
(105, 131, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036102/yc8paotfdlwjuevyxoot.webp', 1, '2019-06-20 13:07:21', '2019-06-20 13:07:21'),
(106, 131, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036105/fpxo9oghj5mvrjw6kbiw.webp', 1, '2019-06-20 13:07:21', '2019-06-20 13:07:21'),
(107, 131, 'trailer_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036107/hqttbpbxl6w6zesykmfx.webp', 1, '2019-06-20 13:07:21', '2019-06-20 13:07:21'),
(108, 131, 'trailer_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036107/hqttbpbxl6w6zesykmfx.webp', 1, '2019-06-20 13:07:21', '2019-06-20 13:07:21'),
(109, 131, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036105/fpxo9oghj5mvrjw6kbiw.webp', 1, '2019-06-20 13:07:21', '2019-06-20 13:07:21'),
(110, 131, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036102/yc8paotfdlwjuevyxoot.webp', 1, '2019-06-20 13:07:21', '2019-06-20 13:07:21'),
(111, 131, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036100/erqodadhj1zr0wgw9qqa.webp', 1, '2019-06-20 13:07:20', '2019-06-20 13:07:20'),
(112, 132, 'power_unit_left_stear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561039971/vkwkyottrjohue06qxpq.webp', 1, '2019-06-20 14:11:56', '2019-06-20 14:11:56'),
(113, 132, 'power_unit_right_stear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561039975/aagcctoi0lt7prr0z0aa.webp', 1, '2019-06-20 14:11:56', '2019-06-20 14:11:56'),
(114, 132, 'power_unit_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561039977/soskxyg6jcrmpwxddmmr.webp', 1, '2019-06-20 14:11:56', '2019-06-20 14:11:56'),
(115, 132, 'power_unit_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561039979/rgj7finzxpzjc625iqa5.webp', 1, '2019-06-20 14:11:56', '2019-06-20 14:11:56'),
(116, 132, 'power_unit_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561039981/fwdd9wjwe16fr1optqss.webp', 1, '2019-06-20 14:11:56', '2019-06-20 14:11:56'),
(117, 132, 'power_unit_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561039983/dwpwbmul7vm9myi0vtcb.webp', 1, '2019-06-20 14:11:56', '2019-06-20 14:11:56'),
(118, 133, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561036107/hqttbpbxl6w6zesykmfx.webp', 1, '2019-06-20 14:13:36', '2019-06-20 14:13:36'),
(119, 133, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561040082/w0sarmfew5iuvm9o36kt.webp', 1, '2019-06-20 14:13:36', '2019-06-20 14:13:36'),
(120, 133, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561040082/w0sarmfew5iuvm9o36kt.webp', 1, '2019-06-20 14:13:36', '2019-06-20 14:13:36'),
(121, 133, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561040082/w0sarmfew5iuvm9o36kt.webp', 1, '2019-06-20 14:13:36', '2019-06-20 14:13:36'),
(122, 121, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561040243/zsploetuaqc4hnrle8nc.webp', 26, '2019-06-20 14:16:17', '2019-06-20 14:16:17'),
(123, 121, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561099603/abvuyjey7omvgo0iyqxs.webp', 26, '2019-06-21 06:45:36', '2019-06-21 06:45:36'),
(124, 121, 'main_image', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561099616/kjbcdlildpke7u0l35lf.webp', 26, '2019-06-21 06:45:49', '2019-06-21 06:45:49'),
(125, 135, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561114649/myrkq7n5fjz34txsyegn.webp', 1, '2019-06-21 10:56:34', '2019-06-21 10:56:34'),
(126, 135, 'trailer_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561114655/deelibgjfsu1ypd5dial.webp', 1, '2019-06-21 10:56:34', '2019-06-21 10:56:34'),
(127, 135, 'trailer_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561114658/txpxfrhybmb3bcqghifu.webp', 1, '2019-06-21 10:56:34', '2019-06-21 10:56:34'),
(128, 135, 'trailer_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561114661/ui6h7lrwnaeyqvzd8rkb.webp', 1, '2019-06-21 10:56:34', '2019-06-21 10:56:34'),
(129, 121, 'power_unit_right_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949708/csoy7nkgf6bnwv3jy09o.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(130, 121, 'power_unit_left_rear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949707/g83lrvbda4tnsjqjt36j.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(131, 121, 'power_unit_right_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949704/twslfvg1nv50obbl02qd.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(132, 121, 'power_unit_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949703/cqm9qb5fo1vjasrkr95t.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(133, 121, 'power_unit_right_stear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949700/t38mvztlccesr43urqk6.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(134, 121, 'power_unit_left_stear', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1560949698/gzlxrsjuvnqzlpov7wv1.webp', 24, '2019-06-19 13:07:23', '2019-06-19 13:07:23'),
(135, 148, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561378176/o7q6fzg1xmyed0hvlguk.webp', 1, '2019-06-24 12:08:34', '2019-06-24 12:08:34'),
(136, 148, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561378178/vqy458mboxoia0tnbbgb.webp', 1, '2019-06-24 12:08:34', '2019-06-24 12:08:34'),
(137, 148, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561378180/oobrrfwkffhnda6ezk2l.webp', 1, '2019-06-24 12:08:34', '2019-06-24 12:08:34'),
(138, 148, 'trailer_left_front', 'http://res.cloudinary.com/onsiteconfirmation-com/image/upload/v1561378182/cjtuj8cgs5jqcxr2wu6l.webp', 1, '2019-06-24 12:08:35', '2019-06-24 12:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE `service_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `account_type` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `unit_number` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL DEFAULT '0',
  `location` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `data` text NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `snapshots`
--

CREATE TABLE `snapshots` (
  `id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `img_dir` varchar(50) NOT NULL,
  `image_id` longtext NOT NULL,
  `path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `account_id` int(2) DEFAULT NULL,
  `location_id` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `user_role` int(2) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `password` char(128) DEFAULT NULL,
  `signature` longtext,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT '1',
  `authentication` enum('true','false') DEFAULT 'false',
  `authentication_code` varchar(5) DEFAULT NULL,
  `authentication_status` enum('Y','N') DEFAULT 'Y',
  `authentication_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT '0',
  `is_otp` int(1) DEFAULT '0',
  `otp` varchar(6) DEFAULT NULL,
  `otp_expiry_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account_id`, `location_id`, `email`, `user_role`, `first_name`, `last_name`, `password`, `signature`, `remember_token`, `is_active`, `authentication`, `authentication_code`, `authentication_status`, `authentication_time`, `created_by`, `is_otp`, `otp`, `otp_expiry_date`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'ray@mobilemaintenance.com', 1, 'Ray', 'Gross', '$2y$10$axXaJyPRrdCvSte12jbIMetXgWMbTMZhSSXwRQkVwpaOVnhOgpJ.C', NULL, 'kv8zD0E5EYciVbXeN99SoMZ9BQN7M6KG0gr1cpeGRcPrGL96pzbs1KcZPnve', 1, 'false', NULL, 'N', '2019-06-24 11:14:08', 0, 0, NULL, '2019-06-17 07:28:16', '2019-06-24 11:14:08', '2019-06-24 11:14:08'),
(5, 1, '15', 'usama@gmail.com', 2, 'Usama', 'Javed', '$2y$10$axXaJyPRrdCvSte12jbIMetXgWMbTMZhSSXwRQkVwpaOVnhOgpJ.C', NULL, 'NyuXgWF3DAWHVWhykIWqtsX5qMmYzhxK2juUUASnLX7W7ZtNyEbcWOAz2KKP', 1, 'false', NULL, 'Y', '2019-06-19 06:12:18', 1, 0, NULL, '2019-06-17 07:28:16', '2019-06-17 13:50:30', '2019-06-17 13:50:30'),
(6, 1, '16', 'ali@gmail.com', 3, 'ali', 'ahmad khan', '$2y$10$iqhHb5Z99hvdBEubUfV37ek0LAn0e.J0Wjw16kqhkxTnG/9sPO8Rq', NULL, '5bz3AYlBi7SaPFZssWtVFibPZ5goicTt8hBWd3FbpRNtV8uoiWJZZiwzh5IL', 1, 'false', NULL, 'Y', '2019-06-19 06:12:18', 1, 0, NULL, '2019-06-17 07:28:16', '2019-06-03 11:59:46', '2019-06-03 11:59:46'),
(8, 1, '16', 'manger@gmail.com', 3, 'Manager', 'One', '$2y$10$aimZYCIhKo4qDDmJS0u8NOP/TlOVlC6LVpkNfk9sZLsIyyc/aj.9.', NULL, 'UELZoqH5i8250RB3lPBtQqiDQ2eM93pXcImeXbZLRtd7LgnOzmCMez7kEg2n', 1, 'false', NULL, 'Y', '2019-06-19 06:12:18', 5, 0, NULL, '2019-06-17 07:28:16', '2019-06-10 07:52:29', '2019-06-10 07:52:29'),
(10, 2, '16', 'tire@gmail.com', 3, 'Tire', 'Wheel', '$2y$10$02OEqZOoGFI1TZxdKYH1NuLBFgMmpf1dFhRJb8qh/0EXAObTdzFGm', NULL, 'qqbmH9xpVuvUt32Y04KMzzjIrHrcpBzufAsIOzKjJWN69bfkDct0oJHMgaBR', 1, 'false', NULL, 'Y', '2019-06-19 06:12:18', 1, 0, NULL, '2019-06-17 07:28:16', '2019-06-10 08:05:10', '2019-06-10 08:05:10'),
(18, 1, '0', 'aslam@location.com', 4, 'aslam', '', '$2y$10$Ik6UqjSMcSnkpHoTuzlrmekOIRD4vElurDBbEFJFMG34KS4BGhNhK', NULL, NULL, 1, 'false', NULL, 'Y', '2019-06-19 06:12:18', 1, 0, NULL, '2019-06-17 07:51:45', '2019-06-17 02:51:45', '2019-06-17 02:51:45'),
(19, 1, '0', 'zaib@location.com', 4, 'zaib', '', '$2y$10$5qYXMdwuZlyu10ruJfGb.uWxnlWT8gPOAZ0gseVT6ER0bE1b/avv.', NULL, 'lAU6SvjCfs1BHfv9k4QlwLQvcGagf4Lq71Eljs4fpbZrVZJwgCEDqcrMyti3', 1, 'false', NULL, 'Y', '2019-06-19 06:12:18', 1, 0, NULL, '2019-06-17 07:52:35', '2019-06-18 10:06:50', '2019-06-18 10:06:50'),
(20, 2, '0', 'pervez@location.com', 4, 'pervez', '', '$2y$10$s0U/UFZf7sUvuuzgDrOq3uYTKZfID1hes4d0bWK56VBi6M2vP8p66', NULL, NULL, 1, 'false', NULL, 'Y', '2019-06-19 06:12:18', 1, 0, NULL, '2019-06-17 07:53:11', '2019-06-17 02:53:11', '2019-06-17 02:53:11'),
(21, 1, '[\"20\",\"19\"]', 'faisal@manager.com', 3, 'faisal', 'saleem', '$2y$10$CQUhEAYLwo6vkKXLdN/oUOFtPWvdDR0AWbwl8B0nUhdL1UDcqAGfK', NULL, NULL, 1, 'false', NULL, 'Y', '2019-06-19 06:12:18', 1, 0, NULL, '2019-06-17 07:55:40', '2019-06-17 02:55:40', '2019-06-17 02:55:40'),
(22, 1, '0', 'saleem@location.com', 4, 'saleem', '', '$2y$10$SfkOKON9CGdH5ng212XT.OsNYr.2xj2JxuS/qClArpptzfF1XMP1S', NULL, 'gijjladlObfXmhpOpy2ynZJD1aLXymqNXlZV6bGMWSUbPiewd3uT903MEakf', 1, 'false', NULL, 'Y', '2019-06-19 06:12:18', 1, 0, NULL, '2019-06-17 07:58:01', '2019-06-18 08:15:24', '2019-06-18 08:15:24'),
(23, 1, '[\"22\",\"20\"]', 'manager@manager.com', 3, 'new', 'manager', '$2y$10$OpBvd3DtJO7L20qOneOSI.j3B51B1uh23l6KEj3/ByAPZxrzEsBGO', NULL, 'rjI2vhQSB7Qf24XbpIFclexGwhWf7u9EQEUdCXDic4dyVO8ZMkVbMesmg7zH', 1, 'false', NULL, 'N', '2019-06-21 11:07:17', 1, 0, NULL, '2019-06-17 10:42:26', '2019-06-21 11:07:17', '2019-06-21 11:07:17'),
(24, 1, '0', 'new@new.com', 4, 'new', '', '$2y$10$MKCWVmT5CpGNsjhggq3IIubjW24SroB9fOjaIiFi.oc2NDPCEn7xq', NULL, 'pc16ZKGl8M4t4E9EMuOtYryx2kx23QHCExuQ9IWMLfdIrKGLi9shJEZHzCT3', 1, 'false', NULL, 'N', '2019-06-19 13:07:30', 1, 0, NULL, '2019-06-19 05:59:25', '2019-06-19 13:07:30', '2019-06-19 13:07:30'),
(25, 1, '[\"26\",\"25\"]', 'new@manager.com', 3, 'new', 'new', '$2y$10$M0Q8QrHdG4rxFKp9.q0rS.aXyDEDg6EVhQSC1XaUKCYfnoF8neUXi', NULL, 'hBBH0AsNEz18bLh31242B8NJHGbaeYtdpJi690IFbISDMfspYkB0QFCD9pDa', 1, 'false', NULL, 'N', '2019-06-21 11:06:49', 1, 0, NULL, '2019-06-19 06:00:11', '2019-06-21 11:06:49', '2019-06-21 11:06:49'),
(26, 1, '[\"25\",\"20\",\"19\"]', '042zubair@gmail.com', 3, 'zubair', 'khan', '$2y$10$d4w5.7VE7RpakOMmSrWEWe0J.rXRwWPPykT5z2X8aD9A9soLBHyMm', NULL, 'G5E09j7AyOD3Vmb8nUQhtM9hkxweUN8JhYlpBVIOWMQ6RAHHt3b4EuZtxHVH', 1, 'false', NULL, 'N', '2019-06-24 07:26:11', 1, 0, NULL, '2019-06-19 06:47:52', '2019-06-24 07:26:11', '2019-06-24 07:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_visible` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `description`, `is_visible`) VALUES
(1, 'Global Admin', b'0'),
(2, 'Administrator', b'1'),
(3, 'Manager', b'1'),
(4, 'Location', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_reports`
--
ALTER TABLE `block_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_newest`
--
ALTER TABLE `comments_newest`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_manager`
--
ALTER TABLE `location_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_permissions`
--
ALTER TABLE `module_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_images`
--
ALTER TABLE `report_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snapshots`
--
ALTER TABLE `snapshots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `block_reports`
--
ALTER TABLE `block_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `location_manager`
--
ALTER TABLE `location_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `module_permissions`
--
ALTER TABLE `module_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `report_images`
--
ALTER TABLE `report_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `snapshots`
--
ALTER TABLE `snapshots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
