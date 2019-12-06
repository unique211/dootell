-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 09:53 AM
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
(3, '2019-10-18', 'Mohit', 500, 'SXC', 545454566, 'ajazjjzjaja', '5da98310d2432_1571390224.png', 2, 1, '2019-10-18 03:47:07', '2019-10-18 03:47:07');

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
  `reason` varchar(50) DEFAULT NULL,
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
(3, 'Sagar', 'Male', 'MCA', 'ff', 2, '1970-01-01', '2019-10-18', 'Yes', 'Yes', '5', 'dffd', '5da97ce75feff_1571388647.png', 434343434, 2, 1, 4, 1, 2, 0, '2019-10-18 03:22:17', '2019-10-18 03:22:17');

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
(2, '2019-10-18', 'developer', 'xz', 'work', 0, 9, 'Rs', 2, 2, 3, 'Rajkot', 'IT', 'MCA', 'abc@gmail.com', 'Rajkot', '2019-10-18', '2019-10-19', 0, 0, '2019-10-18 01:11:43', '2019-10-18 01:26:33'),
(3, '2019-10-19', 'developer', 'designer', 'work', 3, 5, 'Rs', 1, 5, 10, 'Rajkot', 'Web', 'B.tech', 'abc@gmail.com', 'Rajkot', '2019-10-19', '2019-10-19', 2, 1, '2019-10-19 01:15:53', '2019-10-19 01:15:53');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_register`
--

INSERT INTO `company_register` (`id`, `date`, `contact_person`, `package_id`, `mobile`, `company_name`, `industry_type`, `company_address`, `city`, `reference`, `created_at`, `updated_at`) VALUES
(2, '2019-10-17', 'ajazkhan', 6, 9904760745, 'ajazAAA', 'sdjsk', 'SXC', 'DF', 'sd', '2019-10-17 01:13:13', '2019-10-17 04:15:37'),
(4, '2019-10-19', 'ajazkhan', 6, 9904760745, 'ajaz', 'sdjsk', 'SXC', 'DF', 'wsdsd', '2019-10-19 01:54:24', '2019-10-19 01:54:24');

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
(2, '2019-10-17', 'Ajaz', 4, 9904760745, 'Rajkot', 'DF', 'ddf', '5da8087c5023b_1571293308.png', '2019-10-17 00:51:53', '2019-10-17 04:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Ajaz', 111, 0, '2019-10-18 06:14:02', '2019-10-18 06:14:02'),
(4, 'Sagar', 0, 0, '2019-10-19 04:52:31', '2019-10-19 04:52:31'),
(5, 'Group1', 0, 0, '2019-10-19 04:52:57', '2019-10-19 04:52:57'),
(6, 'Group12', 0, 0, '2019-10-19 04:55:57', '2019-10-19 04:58:17');

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
  `edu_doc` varchar(250) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `applied_by` varchar(50) DEFAULT NULL,
  `consultancy_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobseeker_register`
--

INSERT INTO `jobseeker_register` (`id`, `date`, `email`, `full_name`, `mobile`, `education`, `course`, `specialization`, `skill`, `board`, `institution`, `passing_year`, `marks`, `experience`, `dob`, `gender`, `address`, `hometown`, `pincode`, `state`, `aadhar`, `pan`, `reference`, `profile_photo`, `resume_doc`, `edu_doc`, `package_id`, `applied_by`, `consultancy_id`, `created_at`, `updated_at`) VALUES
(2, '2019-10-17', 'mohit@gmail.com', 'ajazkhan', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 2014, 56, 'Experience', '1995-09-25', 'Male', 'SXC', 'DF', 33333, 'DDD', 343434, 'sdfer32', 'fd', '5da8168be8d57_1571296907.png', '5da816915c4e6_1571296913.png', '5da81697b6021_1571296919.png', 8, 'Self', 0, '2019-10-17 01:59:31', '2019-10-17 05:33:18'),
(5, '2019-10-18', 'abc@gmail.com', 'ajazkhanpp', 9904760745, 'POST', 'MCA', 'dflscl', 'kcmdkx', 'dhsu', 'uhu', 56, 522, 'Fresher', '2019-10-18', 'Male', 'SXC', 'DF', 33333, 'DDD', 565, 'bnb', NULL, '5da99b348ed2a_1571396404.png', '5da99b43d3517_1571396419.png', '5da99b48694a0_1571396424.png', NULL, 'Consultancy', 0, '2019-10-18 05:30:29', '2019-10-18 05:34:21');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`id`, `ref_id`, `role`, `email`, `password`, `created_at`, `updated_at`) VALUES
(10, 2, 'Consultancy', 'ajazkhanpathan14@gmail.com', 'Njk4ZDUxYTE5ZDhhMTIxY2U1ODE0OTlkN2I3MDE2Njg=', '2019-10-17 00:51:53', '2019-10-17 00:51:53'),
(12, 2, 'Company', 'sapariyap128@gmail.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '2019-10-17 01:13:13', '2019-10-18 01:35:39'),
(14, 2, 'Subscriber', 'sagar@gmail.com', 'NDFlZDQ0ZTMwMzhkYmVlZTdkMmZmYWE3ZjUxZDhhNGI=', '2019-10-17 01:40:33', '2019-10-19 03:27:14'),
(16, 2, 'Individual', 'mohit@gmail.com', 'Njk4ZDUxYTE5ZDhhMTIxY2U1ODE0OTlkN2I3MDE2Njg=', '2019-10-17 01:59:31', '2019-10-17 01:59:31'),
(20, 0, 'Superadmin', 'admin@admin.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '2019-10-17 18:30:00', '2019-10-14 18:30:00'),
(24, 4, 'Company', 'abc@gmail.com', 'OTAwMTUwOTgzY2QyNGZiMGQ2OTYzZjdkMjhlMTdmNzI=', '2019-10-19 01:54:24', '2019-10-19 01:54:24');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package_list_master`
--

INSERT INTO `package_list_master` (`id`, `package_title`, `package_type`, `package_validity`, `package_price`, `image`, `user_id`, `no_of_candidate`, `created_at`, `updated_at`) VALUES
(4, 'Gold', 'Consultancy', 30, 50, '5da69c6718ae2_1571200103.jpg', NULL, 10, '2019-10-15 22:58:25', '2019-10-15 22:58:25'),
(5, 'Silver', 'Consultancy', 60, 500, '5da69c9f078d2_1571200159.jpeg', NULL, 10, '2019-10-15 22:59:10', '2019-10-15 22:59:20'),
(6, 'Ajazkhan', 'Company', 40, 400, '5da6e3bea1f20_1571218366.jpg', NULL, 5, '2019-10-16 04:02:51', '2019-10-16 04:02:51'),
(8, 'Title', 'Individual', 50, 4000, '5da6f5c0da89d_1571222976.jpg', NULL, 0, '2019-10-16 05:19:38', '2019-10-16 05:21:15');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `group_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, '2019-10-18', 2, 'Title', '55dfd', '2019-10-18 07:16:44', '2019-10-18 07:16:44');

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
(10, 2, 111, 2, '2019-10-19 10:52:52'),
(12, 4, 0, 2, '2019-10-19 11:12:09');

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
(2, '2019-10-17', 'ajazkhan pathan', 9904760745, 'SXC', 232323232, '2019-10-17 01:40:33', '2019-10-17 04:42:19');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_customer`
--
ALTER TABLE `company_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_employee`
--
ALTER TABLE `company_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_job_post`
--
ALTER TABLE `company_job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_register`
--
ALTER TABLE `company_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consultancy_register`
--
ALTER TABLE `consultancy_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `package_list_master`
--
ALTER TABLE `package_list_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribed_groups`
--
ALTER TABLE `subscribed_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscriber_register`
--
ALTER TABLE `subscriber_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
