-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 05:49 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dootel`
--
CREATE DATABASE IF NOT EXISTS `dootel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dootel`;

-- --------------------------------------------------------

--
-- Table structure for table `company_customer`
--

CREATE TABLE `company_customer` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `aadhar` bigint(20) DEFAULT NULL,
  `narration` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_customer`
--

INSERT INTO `company_customer` (`id`, `date`, `customer_name`, `amount`, `address`, `aadhar`, `narration`, `image`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(2, '2019-10-18', 'ajazkhan', 222, 'SXC', 32323232323, 'fdfdf', '5da947a9eb966_1571375017.png', 0, 0, '2019-10-17 23:33:39', '2019-10-17 23:33:39'),
(3, '2019-10-18', 'Mohit', 500, 'SXC', 545454566, 'ajazjjzjaja', '5da98310d2432_1571390224.png', 2, 1, '2019-10-18 03:47:07', '2019-10-18 03:47:07'),
(8, '2019-12-02', 'Ajazkhan A. Pathan', 600, 'SXC', 559598980555, 'saasbahsabhabhs', '5de5089a80f79_1575291034.jpeg', 4, 0, '2019-12-02 07:20:36', '2019-12-02 07:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `company_employee`
--

CREATE TABLE `company_employee` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `education` varchar(20) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `experience` int(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `experience_certificate` varchar(10) DEFAULT NULL,
  `notice_period` varchar(10) DEFAULT NULL,
  `notice_month` varchar(20) DEFAULT NULL,
  `reason` varchar(3000) DEFAULT NULL,
  `profile_picture` varchar(250) DEFAULT NULL,
  `aadhar` bigint(20) DEFAULT NULL,
  `behaviour` int(11) DEFAULT NULL,
  `attendence` int(11) DEFAULT NULL,
  `sincetity` int(11) DEFAULT NULL,
  `dependability` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_employee`
--

INSERT INTO `company_employee` (`id`, `full_name`, `gender`, `education`, `designation`, `experience`, `doj`, `leave_date`, `experience_certificate`, `notice_period`, `notice_month`, `reason`, `profile_picture`, `aadhar`, `behaviour`, `attendence`, `sincetity`, `dependability`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ajazkhan', 'Male', 'POST', 'ff', 34, '1970-01-01', '2019-10-17', 'No', 'No', NULL, 'dffd', '5da8704b61310_1571319883.png', 454545, 1, 0, 2, 1, 0, 0, '2019-10-17 08:14:47', '2019-10-17 08:14:47'),
(3, 'Sagar', 'Male', 'MCA', 'ff', 2, '1970-01-01', '2019-10-18', 'Yes', 'Yes', '5', 'dffd', '5da97ce75feff_1571388647.png', 434343434, 2, 1, 4, 1, 2, 1, '2019-10-18 03:22:17', '2019-10-18 03:22:17'),
(4, 'Sagar Morvadiya', 'Male', 'POST', 'Developer', 3, '2019-11-12', '2019-11-11', 'Yes', 'Yes', NULL, 'dffd', '5dccfa497fdb8_1573714505.jpg', 111111111111, 1, 1, 1, 2, 4, 0, '2019-11-11 06:53:17', '2019-11-14 01:25:08'),
(5, 'Riyaz', 'Male', 'POST', 'Developer', 3, '2019-11-18', '2019-11-18', 'Yes', 'No', '5', 'dffd', '5dd21ff25fa9e_1574051826.jpg', 111111111111, 2, 0, 3, 2, 4, 0, '2019-11-17 23:07:15', '2019-11-17 23:07:15'),
(6, 'Ajazkhan A. Pathan', 'Male', 'd', 'ff', 3, '2019-11-18', '2019-11-18', 'Yes', 'No', NULL, 'dffd', '5dd2201db85b1_1574051869.jpg', 111111111111, 1, 0, 3, 2, 4, 0, '2019-11-17 23:07:56', '2019-11-17 23:07:56'),
(7, 'Ajazkhan A. Pathan3', 'Male', 'POST', 'Developer', 3, '2019-11-19', '2019-11-18', 'No', 'No', NULL, 'dffd', '5dd22046ccf82_1574051910.jpg', 111111111111, 2, 1, 2, 1, 4, 0, '2019-11-17 23:08:40', '2019-11-17 23:08:40'),
(9, 'Sagar Morvadiya6', 'Male', 'POST', 'Developer', 3, '2019-11-19', '2019-11-18', 'Yes', 'No', NULL, 'this is test, this is test, this is test, this is test, this is test, this is test, this is test, this is test, this is test, this is test, this is test, this is test, this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test,this is test.', '5dd2211d2c843_1574052125.jpg', 111111111111, 3, 0, 3, 1, 4, 0, '2019-11-17 23:12:14', '2019-11-25 06:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `company_employee_experience`
--

CREATE TABLE `company_employee_experience` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_employee_experience`
--

INSERT INTO `company_employee_experience` (`id`, `emp_id`, `designation`, `doj`, `leave_date`, `company_id`, `created_at`, `updated_at`) VALUES
(3, 4, 'Developer', '2019-11-11', '2019-11-12', 4, '2019-11-11 07:43:19', '2019-11-11 07:43:19'),
(5, 4, 'ff', '2019-11-11', '2019-11-11', 4, '2019-11-11 08:39:56', '2019-11-11 08:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `company_job_post`
--

CREATE TABLE `company_job_post` (
  `id` int(11) NOT NULL,
  `post_date` date DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `experience_from` int(11) DEFAULT NULL,
  `experience_to` int(11) DEFAULT NULL,
  `ctc` varchar(20) DEFAULT NULL,
  `from_ctc` int(11) DEFAULT NULL,
  `to_ctc` int(11) DEFAULT NULL,
  `vacancies` int(11) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `industry` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_job_post`
--

INSERT INTO `company_job_post` (`id`, `post_date`, `job_title`, `description`, `keywords`, `experience_from`, `experience_to`, `ctc`, `from_ctc`, `to_ctc`, `vacancies`, `location`, `industry`, `qualification`, `email`, `venue`, `date_from`, `date_to`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(2, '2019-10-18', 'developer', 'xz', 'work', 0, 9, 'Rs', 2, 2, 3, 'Rajkot', 'IT', 'MCA', 'abc@gmail.com', 'Rajkot', '2019-10-18', '2019-10-19', 2, 0, '2019-10-18 01:11:43', '2019-10-18 01:26:33'),
(3, '2019-10-19', 'developer', 'designer', 'work', 3, 5, 'Rs', 1, 5, 10, 'Rajkot', 'Web', 'B.tech', 'abc@gmail.com', 'Rajkot', '2019-10-19', '2019-10-19', 2, 1, '2019-10-19 01:15:53', '2019-10-19 01:15:53'),
(4, '2019-10-25', 'Android', 'abcx', 'work', 1, 3, 'Rs', 1, 5, 50, 'Ahmdabad', 'IT', 'MCA', 'abc@gmail.com', 'Rajkot', '2019-10-25', '2019-10-26', 4, 0, '2019-10-25 06:27:40', '2019-10-25 06:27:40'),
(5, '2019-11-05', 'Web Designer', 'designer forms', 'work', 2, 0, 'Rs', 5, 10, 50, 'Rajkot', 'Web', 'MCA', 'sagarco@gmail.com', 'Rajkot', '2019-11-05', '2019-11-05', 46, 1, '2019-11-05 07:37:23', '2019-11-05 07:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `company_register`
--

CREATE TABLE `company_register` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `industry_type` varchar(50) DEFAULT NULL,
  `company_address` varchar(250) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `reference` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_register`
--

INSERT INTO `company_register` (`id`, `date`, `contact_person`, `package_id`, `mobile`, `company_name`, `industry_type`, `company_address`, `city`, `reference`, `logo`, `created_at`, `updated_at`) VALUES
(2, '2019-10-17', 'ajazkhan', 6, 9904760745, 'ajazAAA', 'sdjsk', 'SXC', 'DF', 'sd', NULL, '2019-10-17 01:13:13', '2019-10-17 04:15:37'),
(4, '2019-10-19', 'ajazkhan', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'wsdsd', '5dccf2077a940_1573712391.ico', '2019-10-19 01:54:24', '2019-11-14 00:49:54'),
(6, '2019-10-23', 'ajazkhan', 6, 7016158344, 'ajaz', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-23 05:24:26', '2019-10-23 05:24:26'),
(7, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajazAAA', 'qqq', 'SXC', 'DF', 'fd', NULL, '2019-10-23 23:06:54', '2019-10-23 23:06:54'),
(19, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajazAAA', 'qqq', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-23 23:54:56', '2019-10-23 23:54:56'),
(20, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-23 23:56:31', '2019-10-23 23:56:31'),
(21, '2019-10-24', 'ajaz', 6, 9904760745, 'ajazAAA', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 00:04:00', '2019-10-24 00:04:00'),
(22, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 00:07:29', '2019-10-24 00:07:29'),
(23, '2019-10-24', 'ajaz', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 00:09:42', '2019-10-24 00:09:42'),
(24, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 00:10:54', '2019-10-24 00:10:54'),
(25, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'ss', NULL, '2019-10-24 00:12:33', '2019-10-24 00:12:33'),
(26, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 00:13:48', '2019-10-24 00:13:48'),
(27, '2019-10-24', 'ajaz', 6, 9904760745, 'ajazAAA', 'qqq', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 00:16:29', '2019-10-24 00:16:29'),
(28, '2019-10-24', 'ajaz', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'fd', NULL, '2019-10-24 00:28:11', '2019-10-24 00:28:11'),
(29, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'a', NULL, '2019-10-24 00:31:32', '2019-10-24 00:31:32'),
(30, '2019-10-24', 'ajaz', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'fd', NULL, '2019-10-24 00:37:16', '2019-10-24 00:37:16'),
(31, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'fd', NULL, '2019-10-24 00:48:53', '2019-10-24 00:48:53'),
(32, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajazAAA', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 00:51:02', '2019-10-24 00:51:02'),
(33, '2019-10-24', 'ajaz', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'ad', NULL, '2019-10-24 00:53:19', '2019-10-24 00:53:19'),
(34, '2019-10-24', 'ajaz', 6, 9904760745, 'ajazAAA', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 00:56:01', '2019-10-24 00:56:01'),
(35, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajazAAA', 'qqq', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 00:59:09', '2019-10-24 00:59:09'),
(36, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajaz', 'qqq', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 01:00:40', '2019-10-24 01:00:40'),
(37, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajazAAA', 'qqq', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 01:02:30', '2019-10-24 01:02:30'),
(38, '2019-10-24', 'ajaz', 6, 9904760745, 'ajazAAA', 'sdjsk', 'SXC', 'DF', 'fd', NULL, '2019-10-24 01:03:35', '2019-10-24 01:03:35'),
(39, '2019-10-24', 'ajaz', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 01:05:23', '2019-10-24 01:05:23'),
(40, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 01:07:05', '2019-10-24 01:07:05'),
(41, '2019-10-24', 'ajazkhan', 6, 9904760745, 'fd', 'fd', 'SXC', 'DF', 'f', NULL, '2019-10-24 01:10:15', '2019-10-24 01:10:15'),
(42, '2019-10-24', 'ajaz', 6, 9904760745, 'ajaz', 'qqq', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 01:11:25', '2019-10-24 01:11:25'),
(43, '2019-10-24', 'sagar', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 01:40:51', '2019-10-24 01:40:51'),
(44, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajazAAA', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 01:56:40', '2019-10-24 01:56:40'),
(45, '2019-10-24', 'ajazkhan', 6, 9904760745, 'ajazAAA', 'sdjsk', 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 02:05:07', '2019-10-24 02:05:07'),
(46, '2019-11-05', 'Sagar Company', 6, 9904760745, 'Sagar', 'website', 'rajkot', 'Rajkot', 'fd', '5dc17311b83f4_1572958993.jpg', '2019-11-05 07:33:45', '2019-11-05 07:33:45'),
(47, '2019-11-09', 'Bhargav', 10, 9904760745, 'Ajaz', 'sdjsk', 'SXC', 'DF', 'aaaaa', '5dc686d900517_1573291737.jpg', '2019-11-09 03:59:15', '2019-11-09 03:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_register`
--

CREATE TABLE `consultancy_register` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cunsultancy_name` varchar(50) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `cunsultancy_address` varchar(250) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `reference` varchar(250) DEFAULT NULL,
  `upload_image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consultancy_register`
--

INSERT INTO `consultancy_register` (`id`, `date`, `cunsultancy_name`, `package_id`, `mobile`, `cunsultancy_address`, `city`, `reference`, `upload_image`, `created_at`, `updated_at`) VALUES
(2, '2019-10-17', 'Ajaz', 4, 9904760745, 'Rajkot', 'DF', 'ddf', '5da8087c5023b_1571293308.png', '2019-10-17 00:51:53', '2019-10-17 04:27:46'),
(4, '2019-10-23', 'Ajaz', 4, 9904760745, 'SXC', 'DF', 'fd', NULL, '2019-10-23 05:32:20', '2019-10-23 05:32:20'),
(5, '2019-10-24', 'Ajaz', 4, 9904760745, 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 03:36:32', '2019-10-24 03:36:32'),
(6, '2019-10-24', 'hg', 4, 9904760745, 'SXC', 'DF', 'aaaaa', NULL, '2019-10-24 03:41:10', '2019-10-24 03:41:10'),
(7, '2019-10-24', 'Ajaz', 5, 9904760745, 'SXC', 'DF', 'aaaaa', '5dccf810543e1_1573713936.jpg', '2019-10-24 06:19:49', '2019-11-14 01:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `groups_id` varchar(100) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_name`, `doj`, `user_type`, `groups_id`, `mobile`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2019-11-21', 'Superadmin', NULL, 9904760745, 'admin@admin.com', 0, '2019-11-21 06:58:18', '2019-11-21 06:58:18'),
(4, 'ajazkhan', '2019-11-16', 'Admin', NULL, 9904760745, 'test1@gmail.com', 1, '2019-11-16 05:02:25', '2019-11-22 05:48:33'),
(5, 'ajazkhan2', '2019-11-26', 'Group_Admin', '4,5,7', 9904760745, 'test2@gmail.com', 1, '2019-11-16 05:10:01', '2019-11-26 05:45:44'),
(6, 'Ajazbhai', '2019-11-16', 'Employee', NULL, 9904760745, 'test3@gmail.com', 0, '2019-11-16 05:11:46', '2019-11-16 05:11:46'),
(8, 'ajazkhan', '2019-11-20', 'Admin', NULL, 9904760745, 'sss@ddd.cc', 0, '2019-11-21 08:15:47', '2019-11-21 08:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `subject` varchar(50) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `amount`, `subject`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Ajaz', 111, 'abc', '5dccfb43bf64d_1573714755.jpg', 0, '2019-10-18 06:14:02', '2019-11-14 01:29:17'),
(4, 'Sagar', 0, 'abc2', '5dcbeab88da1c_1573644984.jpg', 0, '2019-10-19 04:52:31', '2019-11-13 06:06:25'),
(7, 'Ajaz5', 200, 'abc2xx', '5dcbeadac9c76_1573645018.png', 0, '2019-11-06 06:40:59', '2019-11-13 06:06:59'),
(8, 'zzz', 500, 'abc', '5dcd47be5caaa_1573734334.jpg', 0, '2019-11-14 06:55:08', '2019-11-14 06:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `group_comment`
--

CREATE TABLE `group_comment` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_comment`
--

INSERT INTO `group_comment` (`id`, `group_id`, `post_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(2, 2, 3, 2, 'hello', '2019-11-12 09:38:41', '2019-11-12 09:38:41'),
(3, 2, 2, 2, 'hello2', '2019-11-12 09:38:45', '2019-11-12 09:38:45'),
(4, 2, 3, 2, 'hello comment', '2019-11-12 10:01:04', '2019-11-12 10:01:04'),
(5, 2, 2, 2, 'aa post che', '2019-11-12 10:06:16', '2019-11-12 10:06:16'),
(6, 2, 3, 3, 'jjjj', '2019-11-16 06:22:00', '2019-11-16 06:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_experience`
--

CREATE TABLE `jobseeker_experience` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `months` int(11) DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobseeker_experience`
--

INSERT INTO `jobseeker_experience` (`id`, `ref_id`, `role`, `company_name`, `months`, `years`, `created_at`, `updated_at`) VALUES
(1, 2, 'Individual', 'ajaz', 4, 4, NULL, NULL),
(2, 2, 'Individual', 'ajazAAA', 5, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_register`
--

CREATE TABLE `jobseeker_register` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `education` varchar(50) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `skill` varchar(100) DEFAULT NULL,
  `board` varchar(50) DEFAULT NULL,
  `institution` varchar(50) DEFAULT NULL,
  `passing_year` int(4) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `experience` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `hometown` varchar(250) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `aadhar` bigint(20) DEFAULT NULL,
  `pan` varchar(20) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `profile_photo` varchar(250) DEFAULT NULL,
  `resume_doc` varchar(250) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `int_job_location` varchar(50) DEFAULT NULL,
  `applied_by` varchar(50) DEFAULT NULL,
  `consultancy_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobseeker_register`
--

INSERT INTO `jobseeker_register` (`id`, `date`, `email`, `full_name`, `mobile`, `education`, `course`, `specialization`, `skill`, `board`, `institution`, `passing_year`, `marks`, `experience`, `dob`, `gender`, `address`, `hometown`, `pincode`, `state`, `aadhar`, `pan`, `reference`, `profile_photo`, `resume_doc`, `package_id`, `int_job_location`, `applied_by`, `consultancy_id`, `created_at`, `updated_at`) VALUES
(2, '2019-10-17', 'mohit@gmail.com', 'ajazkhan', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 2014, 56, 'Experience', '1995-09-25', 'Male', 'SXC', 'DF', 33333, 'DDD', 343434, 'sdfer32', 'fd', '5da8168be8d57_1571296907.png', '5da816915c4e6_1571296913.png', 8, NULL, 'Self', 0, '2019-10-17 01:59:31', '2019-10-17 05:33:18'),
(5, '2019-10-18', 'abc@gmail.com', 'ajazkhanpp', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 56, 522, 'Fresher', '2019-10-18', 'Male', 'SXC', 'DF', 33333, 'DDD', 565, 'bnb', NULL, '5da99b348ed2a_1571396404.png', '5da99b43d3517_1571396419.png', NULL, NULL, 'Consultancy', 2, '2019-10-18 05:30:29', '2019-10-24 05:31:10'),
(7, '2019-10-23', 'abc@gmail.comf', 'ajazkhan', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 33, 33, 'Fresher', '2019-10-23', NULL, 'SXC', 'DF', 33333, 'DDD', 3343434343, '4343434', 'ew', NULL, NULL, 8, NULL, 'Self', 0, '2019-10-23 05:40:16', '2019-10-23 05:40:16'),
(9, '2019-10-24', 'aaasa@gmial.com', 'ajazkhan', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 2323, 232, 'Fresher', '2019-10-24', 'Male', 'SXC', 'DF', 33333, 'DDD', 323232, 'wed', '23', NULL, NULL, 8, NULL, 'Self', 0, '2019-10-24 04:01:19', '2019-10-24 04:01:19'),
(10, '2019-10-24', 'asas@ff.com', 'ajazkhan', 9904760745, 'd', 'dsd', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 323, 32, 'Fresher', '2019-10-28', NULL, 'SXC', 'DF', 33333, 'DDD', 32332, '23edsx', 'aaaaa', NULL, NULL, 8, NULL, 'Self', 0, '2019-10-24 04:03:47', '2019-10-24 04:03:47'),
(11, '2019-10-24', 'abc@gmail.comyj', 'ajazkhan', 9904760745, 'POST', 'dsd', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 6756, 67, 'Fresher', '2019-10-24', 'Male', 'SXC', 'DF', 33333, 'DDD', 67, '67', '67', NULL, NULL, 8, NULL, 'Self', 0, '2019-10-24 04:05:46', '2019-10-24 04:05:46'),
(12, '2019-10-24', 'abc@gmail.comrdgvb', 'ajazkhan', 9904760745, 'd', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 43, 34, 'Fresher', '2019-10-15', 'Male', 'SXC', 'DF', 33333, 'DDD', 4343, '34', 'aaaaa', NULL, NULL, 8, NULL, 'Self', 0, '2019-10-24 04:12:45', '2019-10-24 04:12:45'),
(13, '2019-10-24', 'abc@gmail.comccccccccz', 'ajazkhan', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 232, 232, 'Fresher', '2019-10-08', 'Male', 'SXC', 'DF', 33333, 'DDD', 23232323, 'ds', 'aaaaa', NULL, NULL, 8, NULL, 'Self', 0, '2019-10-24 04:14:35', '2019-10-24 04:14:35'),
(14, '2019-10-24', 'abc@gmail.comfjnb', 'ajazkhan', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 45, 45, 'Fresher', '2019-10-22', 'Male', 'SXC', 'DF', 33333, 'DDD', 45454, 'FCGVCDG55', 'aaaaa', NULL, NULL, 8, NULL, 'Self', 0, '2019-10-24 04:19:28', '2019-10-24 04:19:28'),
(15, '2019-10-24', 'abc@gmail.comfjnh', 'Ajazkhan A. Pathan', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 2000, 25, 'Fresher', '2019-10-23', 'Male', 'SXC', 'DF', 33333, 'DDD', 2323232, 'sd', 'aaaaa', '5dccf702a55f8_1573713666.jpg', '5dccf70683340_1573713670.pdf', 8, 'Rajkot', 'Self', 0, '2019-10-24 07:55:26', '2019-11-16 00:58:10'),
(16, '2019-10-25', 'abc@gmail.com', 'ajazkhan', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 22222, 2, 'Fresher', '2019-10-26', 'Male', 'SXC', 'DF', 33333, 'DDD', 2322, 'fcdxz', NULL, NULL, NULL, NULL, NULL, 'Consultancy', 2, '2019-10-25 06:28:58', '2019-10-25 06:28:58'),
(17, '2019-11-07', 'sagarmorvadiya@gmail.com', 'Sagar Morvadiya', 9904760745, 'Master', 'MCA', 'Computer', 'html', 'RKU', 'SOE', 2019, 90, 'Fresher', '2019-11-07', 'Male', 'Tramba', 'Tramba', 360005, 'Gujarat', 1414141212, 'qwq556', 'Ajaz', '5dc3f182be3ae_1573122434.jpg', '5dc3f189ef782_1573122441.pdf', 8, NULL, 'Self', 0, '2019-11-07 04:57:53', '2019-11-07 04:57:53'),
(18, '2019-11-09', '555@gmail.com', 'ajazkhan', 9904760745, 'd', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 2017, 55, 'Fresher', '2019-11-09', 'Male', 'SXC', 'DF', 33333, 'DDD', 123456, 'sd', 'aaaaa', '5dc682298c5a6_1573290537.jpg', '5dc682315f4c2_1573290545.pdf', 9, NULL, 'Self', 0, '2019-11-09 03:39:37', '2019-11-09 03:39:37'),
(19, '2019-11-09', 'kishan@gmail.com', 'ajazkhan', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 2019, 50, 'Fresher', '2019-11-09', 'Male', 'SXC', 'DF', 33333, 'DDD', 12, NULL, 'aaaaa', '5dc69f41f0cff_1573297985.png', '5dc69f499d175_1573297993.pdf', 8, 'Rajkot', 'Self', 0, '2019-11-09 05:46:37', '2019-11-09 05:46:37'),
(20, '2019-11-16', 'aejubhai@gmail.com', 'Ajazkhan', 9904760745, 'POST', 'MCA', 'Computer', 'kcmdkx', 'RKU', 'SOE', 2019, 90, 'Fresher', '2019-11-16', 'Male', 'SXC', 'DF', 33333, 'DDD', 111111111111, 'gf5gf5', NULL, '5dcf9b68acd0b_1573886824.jpg', NULL, NULL, 'Rajkot2', 'Consultancy', 7, '2019-11-16 01:09:12', '2019-11-16 01:17:06'),
(21, '2019-11-18', 'riyaz@gmail.com1', 'Riyaz', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 2019, 70, 'Fresher', '2019-11-18', 'Male', 'SXC', 'DF', 33333, 'DDD', 111111111111, 'ghfb54', NULL, '5dd227460dd8a_1574053702.jpg', '5dd2274bd192c_1574053707.pdf', NULL, 'Rajkot', 'Consultancy', 7, '2019-11-17 23:38:31', '2019-11-17 23:38:31'),
(22, '2019-11-18', 'nirmal@gmail.com', 'ajazkhan', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'SOE', 2011, 56, 'Fresher', '2019-11-18', 'Male', 'SXC', 'DF', 33333, 'DDD', 2323232, 'dsd63', NULL, NULL, '5dd2279d4d1c7_1574053789.pdf', NULL, 'Rajkot', 'Consultancy', 7, '2019-11-17 23:39:50', '2019-11-17 23:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`id`, `ref_id`, `role`, `email`, `password`, `expire_date`, `created_at`, `updated_at`) VALUES
(10, 2, 'Consultancy', 'ajazkhanpathan14@gmail.com', 'Njk4ZDUxYTE5ZDhhMTIxY2U1ODE0OTlkN2I3MDE2Njg=', '2019-10-31', '2019-10-17 00:51:53', '2019-10-17 00:51:53'),
(12, 2, 'Company', 'sapariyap128@gmail.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '2019-11-30', '2019-10-17 01:13:13', '2019-10-18 01:35:39'),
(14, 2, 'Subscriber', 'sagar@gmail.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', NULL, '2019-10-17 01:40:33', '2019-10-19 03:27:14'),
(16, 2, 'Individual', 'mohit@gmail.com', 'Njk4ZDUxYTE5ZDhhMTIxY2U1ODE0OTlkN2I3MDE2Njg=', NULL, '2019-10-17 01:59:31', '2019-10-17 01:59:31'),
(20, 1, 'Superadmin', 'admin@admin.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', NULL, '2019-10-17 18:30:00', '2019-10-14 18:30:00'),
(24, 4, 'Company', 'abc@gmail.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '2019-12-28', '2019-10-19 01:54:24', '2019-11-14 06:10:47'),
(25, 5, 'Company', 'abc@gmail.com3', 'YjJjYTY3OGI0YzkzNmY5MDVmYjgyZjI3MzNmNTI5N2Y=', NULL, '2019-10-23 04:41:59', '2019-10-23 04:41:59'),
(26, 6, 'Company', 'abc@gmail.com5', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-23 05:24:26', '2019-10-23 05:24:26'),
(27, 3, 'Consultancy', 'abc@gmail.coma', 'NDEyNGJjMGE5MzM1YzI3ZjA4NmYyNGJhMjA3YTQ5MTI=', NULL, '2019-10-23 05:30:56', '2019-10-23 05:30:56'),
(28, 4, 'Consultancy', 'abc@gmail.comdd', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-23 05:32:20', '2019-10-23 05:32:20'),
(29, 7, 'Individual', 'abc@gmail.comf', 'Njk4ZDUxYTE5ZDhhMTIxY2U1ODE0OTlkN2I3MDE2Njg=', NULL, '2019-10-23 05:40:16', '2019-10-23 05:40:16'),
(30, 3, 'Subscriber', 'abc@gmail.comgrtg', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', NULL, '2019-10-23 05:47:33', '2019-10-23 05:47:33'),
(31, 7, 'Company', 'ajazkhan@gmail.co', 'YjJjYTY3OGI0YzkzNmY5MDVmYjgyZjI3MzNmNTI5N2Y=', NULL, '2019-10-23 23:06:54', '2019-10-23 23:06:54'),
(43, 19, 'Company', 'mohit2@gmail.com', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-23 23:54:56', '2019-10-23 23:54:56'),
(44, 20, 'Company', 'mohin5@gmail.com', 'NDEyNGJjMGE5MzM1YzI3ZjA4NmYyNGJhMjA3YTQ5MTI=', NULL, '2019-10-23 23:56:31', '2019-10-23 23:56:31'),
(45, 21, 'Company', 'abc@gmail.comxxc', 'NDEyNGJjMGE5MzM1YzI3ZjA4NmYyNGJhMjA3YTQ5MTI=', NULL, '2019-10-24 00:04:00', '2019-10-24 00:04:00'),
(46, 22, 'Company', 'abc@gmail.come', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-24 00:07:29', '2019-10-24 00:07:29'),
(47, 23, 'Company', 'abc@gmail.coms', 'NzRiODczMzc0NTQyMDBkNGQzM2Y4MGM0NjYzZGM1ZTU=', NULL, '2019-10-24 00:09:42', '2019-10-24 00:09:42'),
(48, 24, 'Company', 'abc@gmail.comffgfg', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-24 00:10:54', '2019-10-24 00:10:54'),
(49, 25, 'Company', 'abc@gmail.comrfer', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-24 00:12:33', '2019-10-24 00:12:33'),
(50, 26, 'Company', 'abc@gmail.comffg', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-24 00:13:48', '2019-10-24 00:13:48'),
(51, 27, 'Company', 'apathan720@rku.ac.in', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-24 00:16:29', '2019-10-24 00:16:29'),
(52, 28, 'Company', 'abc@gmail.comgf', 'M2Q0MDQ0ZDY1YWJkZGE0MDdhOTI5OTFmMTMwMGVjOTc=', NULL, '2019-10-24 00:28:11', '2019-10-24 00:28:11'),
(53, 29, 'Company', 'abc@gmail.comfrfd', 'NDEyNGJjMGE5MzM1YzI3ZjA4NmYyNGJhMjA3YTQ5MTI=', NULL, '2019-10-24 00:31:32', '2019-10-24 00:31:32'),
(54, 30, 'Company', 'abc@gmail.comww', 'NDEyNGJjMGE5MzM1YzI3ZjA4NmYyNGJhMjA3YTQ5MTI=', NULL, '2019-10-24 00:37:16', '2019-10-24 00:37:16'),
(55, 31, 'Company', 'abc@gmail.comwedew', 'NDEyNGJjMGE5MzM1YzI3ZjA4NmYyNGJhMjA3YTQ5MTI=', NULL, '2019-10-24 00:48:53', '2019-10-24 00:48:53'),
(56, 32, 'Company', 'abc@gmail.comff', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-24 00:51:02', '2019-10-24 00:51:02'),
(57, 33, 'Company', 'abc@gmail.comghgh', 'NzRiODczMzc0NTQyMDBkNGQzM2Y4MGM0NjYzZGM1ZTU=', NULL, '2019-10-24 00:53:19', '2019-10-24 00:53:19'),
(58, 34, 'Company', 'abc@gmail.comdf', 'NDEyNGJjMGE5MzM1YzI3ZjA4NmYyNGJhMjA3YTQ5MTI=', NULL, '2019-10-24 00:56:01', '2019-10-24 00:56:01'),
(59, 35, 'Company', 'abc@gmail.comfg', 'NzRiODczMzc0NTQyMDBkNGQzM2Y4MGM0NjYzZGM1ZTU=', NULL, '2019-10-24 00:59:09', '2019-10-24 00:59:09'),
(60, 36, 'Company', 'ccc@c.c', 'NDEyNGJjMGE5MzM1YzI3ZjA4NmYyNGJhMjA3YTQ5MTI=', NULL, '2019-10-24 01:00:40', '2019-10-24 01:00:40'),
(61, 37, 'Company', 'abc@gmail.comsd', 'NzRiODczMzc0NTQyMDBkNGQzM2Y4MGM0NjYzZGM1ZTU=', NULL, '2019-10-24 01:02:30', '2019-10-24 01:02:30'),
(62, 38, 'Company', 'abc@gmail.comdc', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-24 01:03:35', '2019-10-24 01:03:35'),
(63, 39, 'Company', 'abc@gmail.comn', 'NzRiODczMzc0NTQyMDBkNGQzM2Y4MGM0NjYzZGM1ZTU=', NULL, '2019-10-24 01:05:23', '2019-10-24 01:05:23'),
(64, 40, 'Company', 'abc@gmail.comghg', 'NzNjMThjNTlhMzliMTgzODIwODFlYzAwYmI0NTZkNDM=', NULL, '2019-10-24 01:07:05', '2019-10-24 01:07:05'),
(65, 41, 'Company', 'abc@gmail.comfd', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-24 01:10:15', '2019-10-24 01:10:15'),
(66, 42, 'Company', 'abc@gmail.comfsds', 'NzRiODczMzc0NTQyMDBkNGQzM2Y4MGM0NjYzZGM1ZTU=', NULL, '2019-10-24 01:11:25', '2019-10-24 01:11:25'),
(67, 43, 'Company', 'sagar@gmail.coms', 'MjAyY2I5NjJhYzU5MDc1Yjk2NGIwNzE1MmQyMzRiNzA=', NULL, '2019-10-24 01:40:51', '2019-10-24 01:40:51'),
(68, 44, 'Company', 'aaa@aaa.com', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-24 01:56:40', '2019-10-24 01:56:40'),
(69, 45, 'Company', 'abc@gmail.comdsds', 'MjAyY2I5NjJhYzU5MDc1Yjk2NGIwNzE1MmQyMzRiNzA=', NULL, '2019-10-24 02:05:07', '2019-10-24 02:05:07'),
(70, 5, 'Consultancy', 'abc@gmail.comdffd', 'ZjNhYmI4NmJkMzRjZjRkNTI2OThmMTRjMGRhMWRjNjA=', NULL, '2019-10-24 03:36:32', '2019-10-24 03:36:32'),
(71, 6, 'Consultancy', 'hh@hh.com', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', NULL, '2019-10-24 03:41:10', '2019-10-24 03:41:10'),
(73, 9, 'Individual', 'aaasa@gmial.com', 'YjZkNzY3ZDJmOGVkNWQyMWE0NGIwZTU4ODY2ODBjYjk=', NULL, '2019-10-24 04:01:19', '2019-10-24 04:01:19'),
(74, 10, 'Individual', 'asas@ff.com', 'YjBiYWVlOWQyNzlkMzRmYTFkZmQ3MWFhZGI5MDhjM2Y=', NULL, '2019-10-24 04:03:47', '2019-10-24 04:03:47'),
(75, 11, 'Individual', 'abc@gmail.comyj', 'YWQ1NzQ4NDAxNjY1NGRhODcxMjVkYjg2ZjQyMjdlYTM=', NULL, '2019-10-24 04:05:46', '2019-10-24 04:05:46'),
(76, 12, 'Individual', 'abc@gmail.comrdgvb', 'Njk4ZDUxYTE5ZDhhMTIxY2U1ODE0OTlkN2I3MDE2Njg=', NULL, '2019-10-24 04:12:45', '2019-10-24 04:12:45'),
(77, 13, 'Individual', 'abc@gmail.comccccccccz', 'YjU5YzY3YmYxOTZhNDc1ODE5MWU0MmY3NjY3MGNlYmE=', NULL, '2019-10-24 04:14:35', '2019-10-24 04:14:35'),
(78, 14, 'Individual', 'abc@gmail.comfjnb', 'YjU5YzY3YmYxOTZhNDc1ODE5MWU0MmY3NjY3MGNlYmE=', NULL, '2019-10-24 04:19:28', '2019-10-24 04:19:28'),
(79, 7, 'Consultancy', 'aaa@a.com', 'NDdiY2U1Yzc0ZjU4OWY0ODY3ZGJkNTdlOWNhOWY4MDg=', '2020-01-17', '2019-10-24 11:49:49', '2019-10-24 13:31:50'),
(80, 15, 'Individual', 'abc@gmail.comfjnh', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '2020-01-07', '2019-10-24 13:25:26', '2019-10-24 13:25:26'),
(81, 46, 'Company', 'sagarco@gmail.com', 'Nzg4YjU5OWYyNTQ1ZDFkZWE2MjdiM2IxMjM1YTcxNTk=', '2019-12-15', '2019-11-05 13:03:45', '2019-11-05 13:03:45'),
(82, 17, 'Individual', 'sagarmorvadiya@gmail.com', 'ZmQ5ZjkzYjkwYmJiNTI5NGUyYzc1YzgyZGQwNGE5M2E=', '2019-12-27', '2019-11-07 10:27:53', '2019-11-07 10:27:53'),
(83, 18, 'Individual', '555@gmail.com', 'MTVkZTIxYzY3MGFlN2MzZjZmM2YxZjM3MDI5MzAzYzk=', '2019-11-14', '2019-11-09 09:09:37', '2019-11-09 09:09:37'),
(84, 47, 'Company', 'bhargav@gmail.com', 'NmJmYmQ3YmUzYmUwYTI0NDU1MDhlZGI5Yjk3OWY2NDI=', '2019-11-19', '2019-11-09 09:29:15', '2019-11-09 09:29:15'),
(85, 19, 'Individual', 'kishan@gmail.com', 'YjE2MzRjMDI4MTI4OTZiODdmZmYzZDU2Zjg5ZTM2YWY=', '2019-12-29', '2019-11-09 11:16:37', '2019-11-09 11:16:37'),
(86, 4, 'Admin', 'test1@gmail.com', 'NWExMDVlOGI5ZDQwZTEzMjk3ODBkNjJlYTIyNjVkOGE=', NULL, '2019-11-16 05:02:25', '2019-11-16 05:02:25'),
(87, 5, 'Group_Admin', 'test2@gmail.com', 'YWQwMjM0ODI5MjA1YjkwMzMxOTZiYTgxOGY3YTg3MmI=', NULL, '2019-11-16 05:10:01', '2019-11-16 05:10:01'),
(88, 6, 'Employee', 'test3@gmail.com', 'OGFkODc1N2JhYTg1NjRkYzEzNmMxZTA3NTA3ZjRhOTg=', NULL, '2019-11-16 05:11:46', '2019-11-16 05:11:46'),
(89, 7, 'Group_Admin', 'azaz@gmail.com', 'YTlkM2IzNDgwMGQ0MjgzZWQzNGIyYmJiZWI0NDNhNzc=', NULL, '2019-11-21 06:58:18', '2019-11-21 06:58:18'),
(90, 8, 'Admin', 'sss@ddd.cc', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', NULL, '2019-11-21 08:15:47', '2019-11-21 08:15:47'),
(92, 5, 'Admin', 'test2@gmail.com', NULL, NULL, '2019-11-25 23:46:24', '2019-11-25 23:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `menu_master`
--

CREATE TABLE `menu_master` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(50) DEFAULT NULL,
  `sub_menu_name` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_master`
--

INSERT INTO `menu_master` (`id`, `menu_name`, `sub_menu_name`, `order`) VALUES
(1, 'Consultancy', 'Consultancy_List', 1),
(3, 'Company', 'Company_List', 2),
(4, 'Jobseeker', 'Jobseeker_List', 3),
(5, 'Subscriber', 'Subscriber_List', 4),
(6, 'Group_Admin', 'Group_Admin', 5),
(7, 'Packages', 'Package_List', 6),
(8, 'Groups', 'Groups', 7),
(9, 'Group_Posts', 'Posts', 8),
(10, 'Slider_Master', 'Slider', 9),
(11, 'Testimonial_Master', 'Testimonials', 10);

-- --------------------------------------------------------

--
-- Table structure for table `package_list_master`
--

CREATE TABLE `package_list_master` (
  `id` int(11) NOT NULL,
  `package_title` varchar(50) NOT NULL,
  `package_type` varchar(20) DEFAULT NULL,
  `package_validity` int(11) DEFAULT NULL,
  `package_price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `no_of_candidate` int(11) DEFAULT 0,
  `no_of_customer` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package_list_master`
--

INSERT INTO `package_list_master` (`id`, `package_title`, `package_type`, `package_validity`, `package_price`, `image`, `user_id`, `no_of_candidate`, `no_of_customer`, `created_at`, `updated_at`) VALUES
(4, 'Gold', 'Consultancy', 30, 50, '5dccf91adcab9_1573714202.jpg', NULL, 3, NULL, '2019-10-15 22:58:25', '2019-11-14 01:20:03'),
(5, 'Silver', 'Consultancy', 60, 500, '5da69c9f078d2_1571200159.jpeg', NULL, 10, NULL, '2019-10-15 22:59:10', '2019-10-15 22:59:20'),
(6, 'Ajazkhan', 'Company', 40, 10, '5da6e3bea1f20_1571218366.jpg', '1', 5, 2, '2019-10-16 04:02:51', '2019-11-28 01:36:04'),
(8, 'Title', 'Individual', 50, 4000, '5da6f5c0da89d_1571222976.jpg', NULL, 0, NULL, '2019-10-16 05:19:38', '2019-10-16 05:21:15'),
(9, 'ggg', 'Individual', 5, 0, '5dc681c336eb6_1573290435.gif', NULL, 0, NULL, '2019-11-09 03:37:17', '2019-11-09 03:37:17'),
(10, 'Testing', 'Company', 10, 0, '5dc68671bfe2c_1573291633.jpg', NULL, 10, NULL, '2019-11-09 03:57:19', '2019-11-09 03:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `group_id`, `title`, `description`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '2019-10-18', 2, 'Title', '55dfd', '5dc6990669ab3_1573296390.jpg', NULL, '2019-10-18 07:16:44', '2019-11-09 05:16:41'),
(3, '2019-11-12', 2, 'second post', 'this is .......................', '5dca60c3489eb_1573544131.jpeg', NULL, '2019-11-12 02:03:44', '2019-11-12 02:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `slider_master`
--

CREATE TABLE `slider_master` (
  `id` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider_master`
--

INSERT INTO `slider_master` (`id`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '5dc16d90004d5_1572957584.jpg', '0', '2019-11-05 07:09:45', '2019-11-05 07:09:45'),
(4, '5dc16d9b89240_1572957595.jpg', '0', '2019-11-05 07:09:56', '2019-11-05 07:09:56'),
(5, '5dc16da6042b2_1572957606.jpg', '0', '2019-11-05 07:10:07', '2019-11-05 07:10:07'),
(6, '5dc16f8658469_1572958086.jpg', '0', '2019-11-05 07:18:07', '2019-11-05 07:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `subscribed_groups`
--

CREATE TABLE `subscribed_groups` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `subscriber_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribed_groups`
--

INSERT INTO `subscribed_groups` (`id`, `group_id`, `amount`, `subscriber_id`, `created_at`) VALUES
(21, NULL, NULL, NULL, '2019-10-24 12:33:51'),
(22, NULL, NULL, NULL, '2019-10-24 12:35:48'),
(23, NULL, NULL, NULL, '2019-10-24 12:38:27'),
(27, 4, 0, 2, '2019-11-13 11:40:42'),
(28, 5, 0, 2, '2019-11-13 11:40:43'),
(29, 2, 111, 2, '2019-11-16 06:06:15'),
(30, 2, 111, 3, '2019-11-16 06:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_register`
--

CREATE TABLE `subscriber_register` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `aadhar` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriber_register`
--

INSERT INTO `subscriber_register` (`id`, `date`, `name`, `mobile`, `address`, `aadhar`, `created_at`, `updated_at`) VALUES
(2, '2019-10-17', 'ajazkhan pathan', 9904760745, 'SXC', 232323232, '2019-10-17 01:40:33', '2019-10-17 04:42:19'),
(3, '2019-10-23', 'ajazkhan', 9904760745, 'SXC', 23232323, '2019-10-23 05:47:33', '2019-10-23 05:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials_master`
--

CREATE TABLE `testimonials_master` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials_master`
--

INSERT INTO `testimonials_master` (`id`, `title`, `description`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Title1', 'desc55', '5dc24eebbbbe6_1573015275.jpg', '0', '2019-11-05 23:11:16', '2019-11-05 23:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_master`
--

CREATE TABLE `transaction_master` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `order_id` varchar(10) DEFAULT NULL,
  `payment_for` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_master`
--

INSERT INTO `transaction_master` (`id`, `ref_id`, `role`, `transaction_id`, `amount`, `order_id`, `payment_for`, `status`, `created_at`, `updated_at`) VALUES
(1, 43, 'Company', '20191024111212800110168691300958443', 400, '34', 'Registration', 1, '2019-10-24 01:40:51', '2019-10-24 01:41:43'),
(2, 44, 'Company', '0', 400, '55', 'Registration', 0, '2019-10-24 01:56:40', '2019-10-24 01:56:40'),
(3, 45, 'Company', '20191024111212800110168119000951228', 10, '50', 'Registration', 2, '2019-10-24 02:05:08', '2019-10-24 02:11:11'),
(4, 5, 'Company', '20191024111212800110168216300934206', 50, 'JLXQPriGxz', 'Registration', 2, '2019-10-24 03:37:33', '2019-10-24 03:39:05'),
(5, 6, 'Consultancy', '20191024111212800110168086101983585', 50, '08yKiqgLxo', 'Registration', 2, '2019-10-24 03:41:10', '2019-10-24 03:41:43'),
(6, 13, 'Individual', '0', 4000, 'pm9B4aIYhx', 'Registration', 0, '2019-10-24 04:14:35', '2019-10-24 04:14:35'),
(7, 14, 'Individual', '0', 4000, 'uvrXH8idep', 'Registration', 0, '2019-10-24 04:19:28', '2019-10-24 04:19:28'),
(8, 2, 'Subscriber', '0', NULL, 'us3jYWo8rl', 'Subscription', 0, '2019-10-24 04:51:55', '2019-10-24 04:51:55'),
(9, 2, 'Subscriber', '20191024111212800110168741700956415', 111, 'Un7RW1gxZS', 'Subscription', 2, '2019-10-24 04:52:58', '2019-10-24 04:55:57'),
(10, 7, 'Consultancy', '20191024111212800110168956300944158', 50, 'QRLH6uXgNn', 'Registration', 2, '2019-10-24 06:19:49', '2019-10-24 06:20:27'),
(11, 2, 'Subscriber', '20191024111212800110168540900941164', 111, 'RZUMOHNh9r', 'Subscription', 2, '2019-10-24 06:42:31', '2019-10-24 06:42:58'),
(12, 2, 'Subscriber', '20191024111212800110168920600944159', 111, 'reqO0WPCJE', 'Subscription', 2, '2019-10-24 06:44:41', '2019-10-24 06:45:04'),
(13, 2, 'Subscriber', '20191024111212800110168174300929474', 111, 'MN7XcHKyeY', 'Subscription', 2, '2019-10-24 06:46:12', '2019-10-24 06:51:29'),
(14, 2, 'Subscriber', '20191024111212800110168894200957981', 111, 'QOUj7siSxH', 'Subscription', 2, '2019-10-24 06:52:02', '2019-10-24 06:52:25'),
(15, 2, 'Subscriber', '20191024111212800110168562300959397', 111, 'IXcLVOGlvj', 'Subscription', 2, '2019-10-24 07:02:25', '2019-10-24 07:02:51'),
(16, 2, 'Subscriber', '20191024111212800110168106200944556', 111, 'PkEFgpjn1X', 'Subscription', 2, '2019-10-24 07:03:26', '2019-10-24 07:03:51'),
(17, 2, 'Subscriber', '20191024111212800110168460700963964', 111, 'MIXkAwtrYR', 'Subscription', 2, '2019-10-24 07:05:23', '2019-10-24 07:05:48'),
(18, 2, 'Subscriber', '20191024111212800110168532000958191', 111, 'zEqPlVCIwX', 'Subscription', 2, '2019-10-24 07:08:01', '2019-10-24 07:08:27'),
(19, 2, 'Subscriber', '20191024111212800110168902900945590', 111, 'Uu0BeOPx5Q', 'Subscription', 2, '2019-10-24 07:12:38', '2019-10-24 07:14:14'),
(20, 2, 'Subscriber', '20191024111212800110168734300960263', 111, 'RGQk9PVS2H', 'Subscription', 2, '2019-10-24 07:19:40', '2019-10-24 07:20:02'),
(21, 2, 'Subscriber', '20191024111212800110168937300936387', 111, 'B1rPz3Vd70', 'Subscription', 2, '2019-10-24 07:24:57', '2019-10-24 07:25:24'),
(22, 2, 'Subscriber', '20191024111212800110168774800951160', 111, 'w6b1TQWOg3', 'Subscription', 2, '2019-10-24 07:32:31', '2019-10-24 07:32:52'),
(23, 2, 'Subscriber', '20191024111212800110168341500956109', 111, 'yltrvkAOg7', 'Subscription', 2, '2019-10-24 07:34:10', '2019-10-24 07:34:28'),
(24, 15, 'Individual', '20191024111212800110168654700963153', 4000, '0nkxrAz4V1', 'Registration', 2, '2019-10-24 07:55:27', '2019-10-24 07:55:54'),
(25, 46, 'Company', '20191105111212800110168244400981172', 10, 'rxGfUN1abF', 'Registration', 2, '2019-11-05 07:33:45', '2019-11-05 07:34:13'),
(26, 17, 'Individual', '20191107111212800110168424300972397', 4000, '8hmR9Wzkx4', 'Registration', 2, '2019-11-07 04:57:53', '2019-11-07 04:58:28'),
(27, 18, 'Individual', '0', 0, 'lpkYt1uhXn', 'Registration', 0, '2019-11-09 03:39:37', '2019-11-09 03:39:37'),
(28, 47, 'Company', '0', 0, 'ynJLc0OI9A', 'Registration', 2, '2019-11-09 03:59:16', '2019-11-09 03:59:16'),
(29, 19, 'Individual', '20191109111212800110168689700994539', 4000, '5LFJyD1P0Y', 'Registration', 2, '2019-11-09 05:46:37', '2019-11-09 05:47:02'),
(30, 2, 'Subscriber', '0', 111, 'dODXFC0xs4', 'Subscription', 0, '2019-11-13 06:10:49', '2019-11-13 06:10:49'),
(31, 2, 'Subscriber', '0', 200, '1GEyiuRzJZ', 'Subscription', 0, '2019-11-13 06:10:58', '2019-11-13 06:10:58'),
(32, 2, 'Subscriber', '20191116111212800110168499701013630', 111, 'z4BNWKuPfx', 'Subscription', 2, '2019-11-16 00:35:43', '2019-11-16 00:36:15'),
(33, 3, 'Subscriber', '20191116111212800110168223101023808', 111, 'jUeEIACxB2', 'Subscription', 2, '2019-11-16 00:50:58', '2019-11-16 00:51:20'),
(43, 7, 'Consultancy', '20191118111212800110168910501027101', 50, '8cENVx3Oje', 'Registration', 2, '2019-11-18 06:23:40', '2019-11-18 06:24:06'),
(44, 7, 'Consultancy', '20191118111212800110168517901227723', 50, 'Fpm5Tyu9Yc', 'Registration', 2, '2019-11-18 06:26:22', '2019-11-18 06:26:50'),
(45, 7, 'Consultancy', '20191118111212800110168185801057927', 50, 'IWH1Ec927M', 'Registration', 2, '2019-11-18 06:28:37', '2019-11-18 06:29:00'),
(46, 7, 'Consultancy', '20191118111212800110168668401020840', 50, '0UMvWz38D2', 'Registration', 2, '2019-11-18 06:34:14', '2019-11-18 06:34:38'),
(47, 7, 'Consultancy', '20191118111212800110168662401019713', 500, 'VKo4wG7E5e', 'Registration', 2, '2019-11-18 06:40:36', '2019-11-18 06:40:56'),
(48, 4, 'Company', '20191118111212800110168190001028495', 10, 'A2WtxNcGmn', 'Registration', 2, '2019-11-18 07:03:09', '2019-11-18 07:03:34'),
(49, 15, 'Individual', '20191118111212800110168053601020133', 4000, '4KWpZCtgal', 'Registration', 2, '2019-11-18 07:30:13', '2019-11-18 07:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE `user_rights` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) DEFAULT NULL COMMENT 'id of employee',
  `menu_id` int(11) DEFAULT NULL,
  `user_rights` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'user id of user creater'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `ref_id`, `menu_id`, `user_rights`, `user_id`) VALUES
(50, 8, 1, 1, 0),
(51, 8, 3, 0, 0),
(52, 8, 4, 1, 0),
(53, 8, 5, 0, 0),
(54, 1, 6, 1, 0),
(55, 1, 1, 1, 0),
(57, 1, 3, 1, 0),
(58, 1, 4, 1, 0),
(59, 1, 5, 1, 0),
(61, 1, 7, 1, 0),
(62, 1, 8, 1, 0),
(63, 1, 9, 1, 0),
(64, 1, 10, 1, 0),
(65, 1, 11, 1, 0),
(123, 4, 1, 1, 1),
(124, 4, 3, 0, 1),
(125, 4, 4, 0, 1),
(126, 4, 5, 0, 1),
(127, 4, 6, 1, 1),
(128, 4, 7, 0, 1),
(129, 4, 8, 0, 1),
(130, 4, 9, 0, 1),
(131, 4, 10, 0, 1),
(132, 4, 11, 0, 1),
(163, 5, 6, 1, 1),
(164, 5, 7, 0, 1),
(165, 5, 8, 1, 1),
(166, 5, 9, 1, 1),
(167, 5, 10, 0, 1),
(168, 5, 11, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_customer`
--
ALTER TABLE `company_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_employee`
--
ALTER TABLE `company_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_employee_experience`
--
ALTER TABLE `company_employee_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_job_post`
--
ALTER TABLE `company_job_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_register`
--
ALTER TABLE `company_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultancy_register`
--
ALTER TABLE `consultancy_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_comment`
--
ALTER TABLE `group_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_experience`
--
ALTER TABLE `jobseeker_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_register`
--
ALTER TABLE `jobseeker_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_master`
--
ALTER TABLE `menu_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_list_master`
--
ALTER TABLE `package_list_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_master`
--
ALTER TABLE `slider_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribed_groups`
--
ALTER TABLE `subscribed_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber_register`
--
ALTER TABLE `subscriber_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials_master`
--
ALTER TABLE `testimonials_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_master`
--
ALTER TABLE `transaction_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_customer`
--
ALTER TABLE `company_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_employee`
--
ALTER TABLE `company_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company_employee_experience`
--
ALTER TABLE `company_employee_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_job_post`
--
ALTER TABLE `company_job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_register`
--
ALTER TABLE `company_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `consultancy_register`
--
ALTER TABLE `consultancy_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `group_comment`
--
ALTER TABLE `group_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobseeker_experience`
--
ALTER TABLE `jobseeker_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobseeker_register`
--
ALTER TABLE `jobseeker_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `menu_master`
--
ALTER TABLE `menu_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `package_list_master`
--
ALTER TABLE `package_list_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider_master`
--
ALTER TABLE `slider_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscribed_groups`
--
ALTER TABLE `subscribed_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subscriber_register`
--
ALTER TABLE `subscriber_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials_master`
--
ALTER TABLE `testimonials_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction_master`
--
ALTER TABLE `transaction_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
