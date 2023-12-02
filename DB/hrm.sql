-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 12:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_module`
--

CREATE TABLE `applicant_module` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(125) NOT NULL,
  `experience` text NOT NULL,
  `role` text NOT NULL,
  `cv` text NOT NULL,
  `status` int(11) NOT NULL,
  `followup_date` datetime NOT NULL,
  `followupdata` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_module`
--

INSERT INTO `applicant_module` (`id`, `name`, `email`, `experience`, `role`, `cv`, `status`, `followup_date`, `followupdata`, `created_at`, `updated_at`) VALUES
(4, 'Callum Golden', 'nefulufib@mailinator.com', 'Aut reiciendis fugia', 'Designer', '', 1, '2023-11-20 18:21:31', '[]', '2023-10-26 17:13:10', '2023-11-20 18:21:31'),
(6, 'Varun Sharma', 'varun@techcentrica.com', '12 Year', 'Developer', '', 2, '2023-10-23 18:10:00', '[{\"followup_time\":\"2023-10-30 17:04:00\",\"status\":\"1\",\"followup_note\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae excepturi quis nisi sunt praesentium dicta minima facilis placeat quaerat? At non consequatur temporibus deleniti sed ullam commodi facilis, ut iste.\",\"created_at\":\"2023-10-28 14:04:46\"},{\"followup_time\":\"2023-10-23 18:10:00\",\"status\":\"2\",\"followup_note\":\"Test\",\"created_at\":\"2023-10-28 14:10:50\"}]', '2023-10-28 12:26:43', '2023-10-28 14:10:50'),
(7, 'Suresh sarkar', 'admin@techcentrica.com', '2.5 Years', 'Developer', 'uploads/job_cv/hrm_655caa6820fea.pdf', 1, '0000-00-00 00:00:00', '', '2023-11-21 18:32:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employeeId` int(125) NOT NULL,
  `year` text NOT NULL,
  `month` text NOT NULL,
  `countAttendance` int(125) NOT NULL,
  `attendance_date` text NOT NULL,
  `attendance` text NOT NULL,
  `attendance_note` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employeeId`, `year`, `month`, `countAttendance`, `attendance_date`, `attendance`, `attendance_note`, `created_at`, `updated_at`) VALUES
(14, 28, '2023', 'November', 4, '[\"2023-11-01\",\"2023-11-02\",\"2023-11-03\",\"2023-11-04\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"2\",\"2\",\"2\",\"2\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"\",\"\",\"\",\"Extra Work\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '2023-11-04 14:51:37', '2023-11-04 14:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `role_type` int(1) NOT NULL DEFAULT 0,
  `police_code` text NOT NULL,
  `police_code_file` text NOT NULL,
  `emp_code` text NOT NULL,
  `system_ip` varchar(100) NOT NULL,
  `fname` varchar(125) NOT NULL,
  `lname` varchar(125) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `alt_mobile` text NOT NULL,
  `email` varchar(125) NOT NULL,
  `company_email` varchar(125) NOT NULL,
  `gender` text NOT NULL,
  `dob` text NOT NULL,
  `password` text NOT NULL,
  `department` varchar(50) NOT NULL,
  `role` varchar(256) NOT NULL,
  `profile_image` text NOT NULL,
  `permanent_address` text NOT NULL,
  `current_address` text NOT NULL,
  `joining_date` text NOT NULL,
  `ten_marksheet` text NOT NULL,
  `twelth_marksheet` text NOT NULL,
  `diploma` text NOT NULL,
  `degree` text NOT NULL,
  `aadhar_number` text NOT NULL,
  `aadhar` text NOT NULL,
  `pan_number` text NOT NULL,
  `pan` text NOT NULL,
  `ctc` varchar(256) NOT NULL,
  `guardian_contact` text NOT NULL,
  `last_comp_hr_contact` text NOT NULL,
  `experience_latter` text NOT NULL,
  `relieving_letter` text NOT NULL,
  `company_data` text NOT NULL,
  `sarary_slip` text NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `bank_name` text NOT NULL,
  `bank_account_no` text NOT NULL,
  `ifsc_code` text NOT NULL,
  `bank_attachment` text NOT NULL,
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `role_type`, `police_code`, `police_code_file`, `emp_code`, `system_ip`, `fname`, `lname`, `phone`, `alt_mobile`, `email`, `company_email`, `gender`, `dob`, `password`, `department`, `role`, `profile_image`, `permanent_address`, `current_address`, `joining_date`, `ten_marksheet`, `twelth_marksheet`, `diploma`, `degree`, `aadhar_number`, `aadhar`, `pan_number`, `pan`, `ctc`, `guardian_contact`, `last_comp_hr_contact`, `experience_latter`, `relieving_letter`, `company_data`, `sarary_slip`, `last_activity`, `bank_name`, `bank_account_no`, `ifsc_code`, `bank_attachment`, `status`, `last_login`, `last_logout`, `created_at`, `updated_at`) VALUES
(28, 0, '', '', 'HPR-28', '', 'Kapil', 'Chauhan', '2147483647', '46446464646', 'kapil.c@techcentrica.com', 'admin@techcentrica.com', 'male', '2023-10-12', 'e10adc3949ba59abbe56e057f20f883e', '5', 'Accountant', 'uploads/profile/hrm_6530da5de5e92.png', 'A-220 New Ashok Nagar New Delhi', 'A-239 Raj Nagar New Delhi ', '2023-10-14', 'uploads/profile/hrm_6530da5de5e92.png', 'uploads/profile/hrm_6530da5de5e92.png', 'uploads/profile/hrm_6530da5de5e92.png', 'uploads/profile/hrm_6530da5de5e92.png', '', 'uploads/profile/hrm_6530da5de5e92.png', '', 'uploads/profile/hrm_6530da5de5e92.png', '2 LPA', '987678987', '9876567890', 'null', '', '', 'null', NULL, '', '734867487684', '', 'uploads/profile/hrm_6530da5de5e92.png', 1, NULL, NULL, '2023-10-14 14:00:24', '2023-11-18 16:17:33'),
(29, 0, '', '', 'HPR-29', '', 'Varun', 'Sharma', '2147483647', '46446464646', 'varun.s@techcentrica.com', 'admin@techcentrica.com', 'male', '2023-10-12', 'e10adc3949ba59abbe56e057f20f883e', '1', 'Quasi amet cupidita', 'uploads/profile/hrm_6530da439f9bf.png', 'A-220 New Ashok Nagar New Delhi', 'A-239 Raj Nagar New Delhi ', '2023-10-14', '', '', '', '', '', '', '', '', '2 LPA', '987678987', '9876567890', '', '', '', '', NULL, '', '734867487684', 'AXIS098', '', 1, NULL, NULL, '2023-10-14 14:00:31', '2023-10-19 12:56:59'),
(30, 0, '', '', 'HPR-30', '', 'karan', 'ravat', '2147483647', '46446464646', 'karan.r@techcentrica.com', 'admin@techcentrica.com', 'male', '2023-10-12', 'e10adc3949ba59abbe56e057f20f883e', '3', 'Quasi amet cupidita', 'uploads/profile/hrm_6530da2ed70aa.png', 'A-220 New Ashok Nagar New Delhi', 'A-239 Raj Nagar New Delhi ', '2023-10-14', 'uploads/profile/hrm_6530da2ed70aa.png', 'uploads/profile/hrm_6530da2ed70aa.png', 'uploads/profile/hrm_6530da2ed70aa.png', 'uploads/profile/hrm_6530da2ed70aa.png', '', 'uploads/profile/hrm_6530da2ed70aa.png', '', 'uploads/profile/hrm_6530da2ed70aa.png', '2 LPA', '987678987', '9876567890', '[]', '[]', '{\"company_name\":[\"\"],\"company_address\":[\"\"],\"contact_person_name\":[\"\"],\"contact_number\":[\"\"]}', '[]', NULL, '', '734867487684', 'AXIS098', 'uploads/profile/hrm_6530da2ed70aa.png', 1, NULL, NULL, '2023-10-14 14:03:51', '2023-12-02 13:53:21'),
(31, 0, '123456', 'uploads/profile/hrm_65618a70413f2.jpg', 'HPR-31', '', 'Suresh', 'Sarkar', '9876789876', '9009876789', 'suresh.s@techcentrica.com', 'suresh.s@techcentrica.com', 'male', '1971-02-08', 'e10adc3949ba59abbe56e057f20f883e', '1', 'Laboriosam natus et', 'uploads/profile/hrm_653f8f7b7b1ea.png', 'A-220 New Ashok Nagar New Delhi', 'A-239 Raj Nagar New Delhi ', '2014-10-14', 'uploads/profile/hrm_653f8f7b7b1ea.png', 'uploads/profile/hrm_653f8f7b7b1ea.png', 'uploads/profile/hrm_653f8f7b7b1ea.png', 'uploads/profile/hrm_653f8f7b7b1ea.png', '98769098765', 'uploads/profile/hrm_653f8f7b7b1ea.png', 'KDMPS6789J', 'uploads/profile/hrm_653f8f7b7b1ea.png', '6 LPA', '987678987', '9876567890', '{\"1\":[\"uploads\\/experiencedocx\\/hrm_655dfbf456f73.jpeg\"],\"2\":[\"uploads\\/experiencedocx\\/hrm_655dfc3f0e2d1.jpg\"]}', '{\"1\":[\"uploads\\/experiencedocx\\/hrm_655dfc3f0de28.jpeg\"],\"2\":[\"uploads\\/experiencedocx\\/hrm_655dfc3f0e062.jpeg\"]}', '{\"company_name\":[\"Benton Gilliam Associates\",\"Cook and Travis Inc\"],\"company_address\":[\"Nixon and Velazquez Associates\",\"Erickson Stout Traders\"],\"contact_person_name\":[\"Payne Kelley Inc\",\"Stephenson Bean Trading\"],\"contact_number\":[\"8989898999\",\"877654567\"]}', '{\"1\":[\"uploads\\/experiencedocx\\/hrm_655dfc3f0e52d.jpeg\",\"uploads\\/experiencedocx\\/hrm_655dfc3f0ebb6.jpeg\"],\"2\":[\"uploads\\/experiencedocx\\/hrm_655dfc3f0f053.jpg\",\"uploads\\/experiencedocx\\/hrm_655dfc3f0f3a4.jpg\"]}', NULL, 'Axis Bank', '98765689876', '', 'uploads/profile/hrm_653f8f7b7b1ea.png', 1, NULL, NULL, '2023-10-14 14:59:08', '2023-11-22 18:33:59'),
(33, 0, '', '', 'HPR-33', '', 'Aman', 'Kumar', '19', '16', 'bicov@mailinator.com', 'giwosyho@mailinator.com', 'Select your gender', '1984-11-11', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2', 'Nesciunt sed evenie', 'uploads/profile/hrm_655b187f76558.jpg', 'A-220 New Ashok Nagar New Delhi', 'A-239 Raj Nagar New Delhi ', '2009-02-20', 'uploads/profile/hrm_655b187f76558.jpg', 'uploads/profile/hrm_655b187f76558.jpg', 'uploads/profile/hrm_655b187f76558.jpg', 'uploads/profile/hrm_655b187f76558.jpg', '97', 'uploads/profile/hrm_655b187f76558.jpg', '421', 'uploads/profile/hrm_655b187f76558.jpg', '6 LPA', '987678987', '9876567890', '{\"1\":[\"uploads\\/experiencedocx\\/hrm_655de1ee569dc.jpg\"],\"2\":[\"uploads\\/experiencedocx\\/hrm_655de21272dc7.jpg\"],\"3\":[\"uploads\\/experiencedocx\\/hrm_655dec1318639.pdf\"],\"4\":[\"uploads\\/experiencedocx\\/hrm_655df34c83c17.jpg\"]}', '{\"1\":[\"uploads\\/experiencedocx\\/hrm_655de1fe8ce2d.jpg\"],\"2\":[\"uploads\\/experiencedocx\\/hrm_655de229a1102.jpg\"],\"3\":[\"uploads\\/experiencedocx\\/hrm_655df32fca389.jpeg\"]}', '{\"company_name\":[\"Meyers and Mcfarland Associates\",\"Flowers and Malone Plc\",\"Benton Gilliam Associates\",\"Benton Gilliam Associates\"],\"company_address\":[\"Preston Foreman Trading\",\"Medina and Galloway Trading\",\"\",\"\"],\"contact_person_name\":[\"Payne Kelley Inc\",\"Mcdaniel Schneider LLC\",\"\",\"\"],\"contact_number\":[\"Foreman and Delgado Co\",\"Joseph Sutton Plc\",\"\",\"\"]}', '{\"1\":[\"uploads\\/experiencedocx\\/hrm_655df306ad394.jpg\",\"uploads\\/experiencedocx\\/hrm_655df306ad6e0.jpg\"],\"2\":[\"uploads\\/experiencedocx\\/hrm_655df31454028.jpg\"],\"3\":[\"uploads\\/experiencedocx\\/hrm_655df32112a6a.jpg\",\"uploads\\/experiencedocx\\/hrm_655df32112cac.jpg\"],\"4\":[\"uploads\\/experiencedocx\\/hrm_655df358dd4b0.jpg\",\"uploads\\/experiencedocx\\/hrm_655df358dd77b.jpeg\"]}', NULL, 'Irene Cannon', '734867487684', '', 'uploads/profile/hrm_655b187f76558.jpg', 0, NULL, NULL, '2023-10-19 14:02:37', '2023-11-22 17:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_attandance`
--

CREATE TABLE `emp_attandance` (
  `id` int(11) NOT NULL,
  `employeeId` int(125) NOT NULL,
  `salary_month` text DEFAULT NULL,
  `attendance_date` text NOT NULL,
  `in_time` text NOT NULL,
  `out_time` text NOT NULL,
  `shift` text NOT NULL,
  `total_duration` text NOT NULL,
  `attandace_status` text NOT NULL,
  `late_mark` text NOT NULL,
  `salary_calculation` text NOT NULL,
  `salary_conclusion` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_attandance`
--

INSERT INTO `emp_attandance` (`id`, `employeeId`, `salary_month`, `attendance_date`, `in_time`, `out_time`, `shift`, `total_duration`, `attandace_status`, `late_mark`, `salary_calculation`, `salary_conclusion`, `created_at`, `updated_at`, `status`) VALUES
(15, 28, 'Oct-2023', '[\"Date\",\"01-Oct-2023\",\"02-Oct-2023\",\"03-Oct-2023\",\"04-Oct-2023\",\"05-Oct-2023\",\"06-Oct-2023\",\"07-Oct-2023\",\"08-Oct-2023\",\"09-Oct-2023\",\"10-Oct-2023\",\"11-Oct-2023\",\"12-Oct-2023\",\"13-Oct-2023\",\"14-Oct-2023\",\"15-Oct-2023\",\"16-Oct-2023\",\"17-Oct-2023\",\"18-Oct-2023\",\"19-Oct-2023\",\"20-Oct-2023\",\"21-Oct-2023\",\"22-Oct-2023\",\"23-Oct-2023\",\"24-Oct-2023\",\"25-Oct-2023\",\"26-Oct-2023\",\"27-Oct-2023\",\"28-Oct-2023\",\"29-Oct-2023\",\"30-Oct-2023\",\"31-Oct-2023\",null,null]', '[\"InTime\",null,null,null,\"09:38\",\"09:59\",\"09:45\",null,null,\"09:44\",\"09:39\",\"09:48\",\"09:59\",null,\"09:46\",null,\"09:43\",\"09:50\",\"10:06\",\"09:58\",\"09:28\",\"09:59\",null,\"10:14\",null,\"09:53\",\"09:42\",0.41180555555555554,0.40625,null,0.4048611111111111,0.40277777777777773,null,null]', '[\"OutTime\",null,null,\"19:05\",\"18:49\",\"19:04\",\"19:31\",null,null,\"19:01\",\"19:00\",null,\"19:06\",null,\"19:21\",null,\"19:16\",\"19:09\",\"18:04\",\"18:53\",\"18:47\",\"19:56\",null,\"18:36\",null,\"18:47\",\"18:45\",null,null,null,0.7930555555555556,0.811111111111111,null,null]', '[\"Shift\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",null,null]', '[\"Total Duration\",\"00:00\",\"00:00\",\"9:01\",\"9:11\",\"9:01\",\"9:15\",\"00:00\",\"00:00\",\"9:16\",\"9:21\",\"8:42\",\"9:01\",\"00:00\",\"9:14\",\"00:00\",\"9:17\",\"9:10\",\"7:58\",\"8:55\",\"9:19\",\"9:57\",\"00:00\",\"8:22\",\"00:00\",\"8:54\",\"9:03\",\"8:37\",\"00:00\",\"00:00\",0,0,null,null]', '[\"Status\",\"WeeklyOff \",\"Holiday \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff \",\"WeeklyOff \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present \",\"Absent\",\"Present \",\"WeeklyOff \",\"Present \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff Present \",\"WeeklyOff \",\"Present \",\"Holiday \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present\",\"WeeklyOff\",\"Present\",\"Present\",null,null]', '[\"Late marks\",null,null,null,null,null,null,null,null,null,null,\"late\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Salary Calculations\",\"Basic\",\"Total late\",\"Net late\",\"Late Amount\",\"Total leave\",\"PL\",\"Net leave\",\"Leave Amount\",\"Net Deductions\",\"Net payable Salary\",null,\"Total Duration\",\"PresentDays\",\"Leaves\",\"Holiday\",\"AbsentDays\",\"Weekly Off\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Conclusion\",26000,13,5,500,1,1,5,500,1000,25000,null,\"171 Hrs 34 Min\",19,0,2,5,6,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '2023-11-20 13:55:36', '0000-00-00 00:00:00', 1),
(16, 29, 'Oct-2023', '[\"Date\",\"01-Oct-2023\",\"02-Oct-2023\",\"03-Oct-2023\",\"04-Oct-2023\",\"05-Oct-2023\",\"06-Oct-2023\",\"07-Oct-2023\",\"08-Oct-2023\",\"09-Oct-2023\",\"10-Oct-2023\",\"11-Oct-2023\",\"12-Oct-2023\",\"13-Oct-2023\",\"14-Oct-2023\",\"15-Oct-2023\",\"16-Oct-2023\",\"17-Oct-2023\",\"18-Oct-2023\",\"19-Oct-2023\",\"20-Oct-2023\",\"21-Oct-2023\",\"22-Oct-2023\",\"23-Oct-2023\",\"24-Oct-2023\",\"25-Oct-2023\",\"26-Oct-2023\",\"27-Oct-2023\",\"28-Oct-2023\",\"29-Oct-2023\",\"30-Oct-2023\",\"31-Oct-2023\",null,null]', '[\"InTime\",null,null,null,\"09:38\",\"09:59\",\"09:45\",null,null,\"09:44\",\"09:39\",\"09:48\",\"09:59\",null,\"09:46\",null,\"09:43\",\"09:50\",\"10:06\",\"09:58\",\"09:28\",\"09:59\",null,\"10:14\",null,\"09:53\",\"09:42\",0.41180555555555554,0.40625,null,0.4048611111111111,0.40277777777777773,null,null]', '[\"OutTime\",null,null,\"19:05\",\"18:49\",\"19:04\",\"19:31\",null,null,\"19:01\",\"19:00\",null,\"19:06\",null,\"19:21\",null,\"19:16\",\"19:09\",\"18:04\",\"18:53\",\"18:47\",\"19:56\",null,\"18:36\",null,\"18:47\",\"18:45\",null,null,null,0.7930555555555556,0.811111111111111,null,null]', '[\"Shift\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",null,null]', '[\"Total Duration\",\"00:00\",\"00:00\",\"9:01\",\"9:11\",\"9:01\",\"9:15\",\"00:00\",\"00:00\",\"9:16\",\"9:21\",\"8:42\",\"9:01\",\"00:00\",\"9:14\",\"00:00\",\"9:17\",\"9:10\",\"7:58\",\"8:55\",\"9:19\",\"9:57\",\"00:00\",\"8:22\",\"00:00\",\"8:54\",\"9:03\",\"8:37\",\"00:00\",\"00:00\",0,0,null,null]', '[\"Status\",\"WeeklyOff \",\"Holiday \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff \",\"WeeklyOff \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present \",\"Absent\",\"Present \",\"WeeklyOff \",\"Present \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff Present \",\"WeeklyOff \",\"Present \",\"Holiday \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present\",\"WeeklyOff\",\"Present\",\"Present\",null,null]', '[\"Late marks\",null,null,null,null,null,null,null,null,null,null,\"late\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Salary Calculations\",\"Basic\",\"Total late\",\"Net late\",\"Late Amount\",\"Total leave\",\"PL\",\"Net leave\",\"Leave Amount\",\"Net Deductions\",\"Net payable Salary\",null,\"Total Duration\",\"PresentDays\",\"Leaves\",\"Holiday\",\"AbsentDays\",\"Weekly Off\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Conclusion\",26000,13,5,500,1,1,5,500,1000,25000,null,\"171 Hrs 34 Min\",19,0,2,5,6,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '2023-11-20 13:56:51', '0000-00-00 00:00:00', 1),
(17, 30, 'Oct-2021', '[\"Date\",\"01-Oct-2023\",\"02-Oct-2023\",\"03-Oct-2023\",\"04-Oct-2023\",\"05-Oct-2023\",\"06-Oct-2023\",\"07-Oct-2023\",\"08-Oct-2023\",\"09-Oct-2023\",\"10-Oct-2023\",\"11-Oct-2023\",\"12-Oct-2023\",\"13-Oct-2023\",\"14-Oct-2023\",\"15-Oct-2023\",\"16-Oct-2023\",\"17-Oct-2023\",\"18-Oct-2023\",\"19-Oct-2023\",\"20-Oct-2023\",\"21-Oct-2023\",\"22-Oct-2023\",\"23-Oct-2023\",\"24-Oct-2023\",\"25-Oct-2023\",\"26-Oct-2023\",\"27-Oct-2023\",\"28-Oct-2023\",\"29-Oct-2023\",\"30-Oct-2023\",\"31-Oct-2023\",null,null]', '[\"InTime\",null,null,null,\"09:38\",\"09:59\",\"09:45\",null,null,\"09:44\",\"09:39\",\"09:48\",\"09:59\",null,\"09:46\",null,\"09:43\",\"09:50\",\"10:06\",\"09:58\",\"09:28\",\"09:59\",null,\"10:14\",null,\"09:53\",\"09:42\",0.41180555555555554,0.40625,null,0.4048611111111111,0.40277777777777773,null,null]', '[\"OutTime\",null,null,\"19:05\",\"18:49\",\"19:04\",\"19:31\",null,null,\"19:01\",\"19:00\",null,\"19:06\",null,\"19:21\",null,\"19:16\",\"19:09\",\"18:04\",\"18:53\",\"18:47\",\"19:56\",null,\"18:36\",null,\"18:47\",\"18:45\",null,null,null,0.7930555555555556,0.811111111111111,null,null]', '[\"Shift\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",null,null]', '[\"Total Duration\",\"00:00\",\"00:00\",\"9:01\",\"9:11\",\"9:01\",\"9:15\",\"00:00\",\"00:00\",\"9:16\",\"9:21\",\"8:42\",\"9:01\",\"00:00\",\"9:14\",\"00:00\",\"9:17\",\"9:10\",\"7:58\",\"8:55\",\"9:19\",\"9:57\",\"00:00\",\"8:22\",\"00:00\",\"8:54\",\"9:03\",\"8:37\",\"00:00\",\"00:00\",0,0,null,null]', '[\"Status\",\"WeeklyOff \",\"Holiday \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff \",\"WeeklyOff \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present \",\"Absent\",\"Present \",\"WeeklyOff \",\"Present \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff Present \",\"WeeklyOff \",\"Present \",\"Holiday \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present\",\"WeeklyOff\",\"Present\",\"Present\",null,null]', '[\"Late marks\",null,null,null,null,null,null,null,null,null,null,\"late\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Salary Calculations\",\"Basic\",\"Total late\",\"Net late\",\"Late Amount\",\"Total leave\",\"PL\",\"Net leave\",\"Leave Amount\",\"Net Deductions\",\"Net payable Salary\",null,\"Total Duration\",\"PresentDays\",\"Leaves\",\"Holiday\",\"AbsentDays\",\"Weekly Off\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Conclusion\",26000,13,5,500,1,1,5,500,1000,25000,null,\"171 Hrs 34 Min\",19,0,2,5,6,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '2023-11-20 13:56:54', '0000-00-00 00:00:00', 1),
(18, 31, 'Oct-2023', '[\"Date\",\"01-Oct-2023\",\"02-Oct-2023\",\"03-Oct-2023\",\"04-Oct-2023\",\"05-Oct-2023\",\"06-Oct-2023\",\"07-Oct-2023\",\"08-Oct-2023\",\"09-Oct-2023\",\"10-Oct-2023\",\"11-Oct-2023\",\"12-Oct-2023\",\"13-Oct-2023\",\"14-Oct-2023\",\"15-Oct-2023\",\"16-Oct-2023\",\"17-Oct-2023\",\"18-Oct-2023\",\"19-Oct-2023\",\"20-Oct-2023\",\"21-Oct-2023\",\"22-Oct-2023\",\"23-Oct-2023\",\"24-Oct-2023\",\"25-Oct-2023\",\"26-Oct-2023\",\"27-Oct-2023\",\"28-Oct-2023\",\"29-Oct-2023\",\"30-Oct-2023\",\"31-Oct-2023\",null,null]', '[\"InTime\",null,null,null,\"09:38\",\"09:59\",\"09:45\",null,null,\"09:44\",\"09:39\",\"09:48\",\"09:59\",null,\"09:46\",null,\"09:43\",\"09:50\",\"10:06\",\"09:58\",\"09:28\",\"09:59\",null,\"10:14\",null,\"09:53\",\"09:42\",0.41180555555555554,0.40625,null,0.4048611111111111,0.40277777777777773,null,null]', '[\"OutTime\",null,null,\"19:05\",\"18:49\",\"19:04\",\"19:31\",null,null,\"19:01\",\"19:00\",null,\"19:06\",null,\"19:21\",null,\"19:16\",\"19:09\",\"18:04\",\"18:53\",\"18:47\",\"19:56\",null,\"18:36\",null,\"18:47\",\"18:45\",null,null,null,0.7930555555555556,0.811111111111111,null,null]', '[\"Shift\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",null,null]', '[\"Total Duration\",\"00:00\",\"00:00\",\"9:01\",\"9:11\",\"9:01\",\"9:15\",\"00:00\",\"00:00\",\"9:16\",\"9:21\",\"8:42\",\"9:01\",\"00:00\",\"9:14\",\"00:00\",\"9:17\",\"9:10\",\"7:58\",\"8:55\",\"9:19\",\"9:57\",\"00:00\",\"8:22\",\"00:00\",\"8:54\",\"9:03\",\"8:37\",\"00:00\",\"00:00\",0,0,null,null]', '[\"Status\",\"WeeklyOff \",\"Holiday \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff \",\"WeeklyOff \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present \",\"Absent\",\"Present \",\"WeeklyOff \",\"Present \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff Present \",\"WeeklyOff \",\"Present \",\"Holiday \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present\",\"WeeklyOff\",\"Present\",\"Present\",null,null]', '[\"Late marks\",null,null,null,null,null,null,null,null,null,null,\"late\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Salary Calculations\",\"Basic\",\"Total late\",\"Net late\",\"Late Amount\",\"Total leave\",\"PL\",\"Net leave\",\"Leave Amount\",\"Net Deductions\",\"Net payable Salary\",null,\"Total Duration\",\"PresentDays\",\"Leaves\",\"Holiday\",\"AbsentDays\",\"Weekly Off\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Conclusion\",26000,13,5,500,1,1,5,500,1000,25000,null,\"171 Hrs 34 Min\",19,0,2,5,6,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '2023-11-20 13:56:57', '0000-00-00 00:00:00', 1),
(21, 33, 'Oct-2023', '[\"Date\",\"01-Oct-2023\",\"02-Oct-2023\",\"03-Oct-2023\",\"04-Oct-2023\",\"05-Oct-2023\",\"06-Oct-2023\",\"07-Oct-2023\",\"08-Oct-2023\",\"09-Oct-2023\",\"10-Oct-2023\",\"11-Oct-2023\",\"12-Oct-2023\",\"13-Oct-2023\",\"14-Oct-2023\",\"15-Oct-2023\",\"16-Oct-2023\",\"17-Oct-2023\",\"18-Oct-2023\",\"19-Oct-2023\",\"20-Oct-2023\",\"21-Oct-2023\",\"22-Oct-2023\",\"23-Oct-2023\",\"24-Oct-2023\",\"25-Oct-2023\",\"26-Oct-2023\",\"27-Oct-2023\",\"28-Oct-2023\",\"29-Oct-2023\",\"30-Oct-2023\",\"31-Oct-2023\",null,null]', '[\"InTime\",null,null,null,\"09:38\",\"09:59\",\"09:45\",null,null,\"09:44\",\"09:39\",\"09:48\",\"09:59\",null,\"09:46\",null,\"09:43\",\"09:50\",\"10:06\",\"09:58\",\"09:28\",\"09:59\",null,\"10:14\",null,\"09:53\",\"09:42\",\"09:44\",\"09:44\",\"09:44\",\"09:44\",\"09:46\",null,null]', '[\"OutTime\",null,null,\"19:05\",\"18:49\",\"19:04\",\"19:31\",null,null,\"19:01\",\"19:00\",null,\"19:06\",null,\"19:21\",null,\"19:16\",\"19:09\",\"18:04\",\"18:53\",\"18:47\",\"18:49\",null,\"18:59\",null,\"18:47\",\"18:44\",null,null,null,\"18:56\",\"18:57\",null,null]', '[\"Shift\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",null,null]', '[\"Total Duration\",\"00:00\",\"00:00\",\"9:01\",\"9:11\",\"9:01\",\"9:15\",\"00:00\",\"00:00\",\"9:16\",\"9:21\",\"8:42\",\"9:01\",\"00:00\",\"9:14\",\"00:00\",\"9:17\",\"9:10\",\"7:58\",\"8:55\",\"9:19\",\"9:57\",\"00:00\",\"8:22\",\"00:00\",\"8:54\",\"9:03\",\"8:37\",\"00:00\",\"00:00\",null,0,null,null]', '[\"Status\",\"WeeklyOff \",\"Holiday \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff \",\"WeeklyOff \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present \",\"Absent\",\"Present \",\"WeeklyOff \",\"Present \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff Present \",\"WeeklyOff \",\"Present \",\"Holiday \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present\",\"WeeklyOff\",\"Present\",\"Present\",null,null]', '[\"Late marks\",null,null,null,null,null,null,null,null,null,null,\"late\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Salary Calculations\",\"Basic\",\"Total late\",\"Net late\",\"Late Amount\",\"Total leave\",\"PL\",\"Net leave\",\"Leave Amount\",\"Net Deductions\",\"Net payable Salary\",null,\"Total Duration\",\"PresentDays\",\"Leaves\",\"Holiday\",\"AbsentDays\",\"Weekly Off\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Conclusion\",26000,13,5,500,1,1,5,500,1000,25000,null,\"171 Hrs 34 Min\",19,0,2,5,6,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '2023-11-20 15:54:03', '0000-00-00 00:00:00', 1),
(22, 28, 'Oct-2023', '[\"Date\",\"01-Oct-2023\",\"02-Oct-2023\",\"03-Oct-2023\",\"04-Oct-2023\",\"05-Oct-2023\",\"06-Oct-2023\",\"07-Oct-2023\",\"08-Oct-2023\",\"09-Oct-2023\",\"10-Oct-2023\",\"11-Oct-2023\",\"12-Oct-2023\",\"13-Oct-2023\",\"14-Oct-2023\",\"15-Oct-2023\",\"16-Oct-2023\",\"17-Oct-2023\",\"18-Oct-2023\",\"19-Oct-2023\",\"20-Oct-2023\",\"21-Oct-2023\",\"22-Oct-2023\",\"23-Oct-2023\",\"24-Oct-2023\",\"25-Oct-2023\",\"26-Oct-2023\",\"27-Oct-2023\",\"28-Oct-2023\",\"29-Oct-2023\",\"30-Oct-2023\",\"31-Oct-2023\",null,null]', '[\"InTime\",null,null,null,\"09:38\",\"09:59\",\"09:45\",null,null,\"09:44\",\"09:39\",\"09:48\",\"09:59\",null,\"09:46\",null,\"09:43\",\"09:50\",\"10:06\",\"09:58\",\"09:28\",\"09:59\",null,\"10:14\",null,\"09:53\",\"09:42\",\"09:44\",\"09:44\",\"09:44\",\"09:44\",\"09:46\",null,null]', '[\"OutTime\",null,null,\"19:05\",\"18:49\",\"19:04\",\"19:31\",null,null,\"19:01\",\"19:00\",null,\"19:06\",null,\"19:21\",null,\"19:16\",\"19:09\",\"18:04\",\"18:53\",\"18:47\",\"18:49\",null,\"18:59\",null,\"18:47\",\"18:44\",null,null,null,\"18:56\",\"18:57\",null,null]', '[\"Shift\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",\"FS\",null,null]', '[\"Total Duration\",\"00:00\",\"00:00\",\"9:01\",\"9:11\",\"9:01\",\"9:15\",\"00:00\",\"00:00\",\"9:16\",\"9:21\",\"8:42\",\"9:01\",\"00:00\",\"9:14\",\"00:00\",\"9:17\",\"9:10\",\"7:58\",\"8:55\",\"9:19\",\"9:57\",\"00:00\",\"8:22\",\"00:00\",\"8:54\",\"9:03\",\"8:37\",\"00:00\",\"00:00\",null,0,null,null]', '[\"Status\",\"WeeklyOff \",\"Holiday \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff \",\"WeeklyOff \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present \",\"Absent\",\"Present \",\"WeeklyOff \",\"Present \",\"Present \",\"Present \",\"Present \",\"Present \",\"WeeklyOff Present \",\"WeeklyOff \",\"Present \",\"Holiday \",\"Present \",\"Present \",\"Present  (No OutPunch)\",\"Present\",\"WeeklyOff\",\"Present\",\"Present\",null,null]', '[\"Late marks\",null,null,null,null,null,null,null,null,null,null,\"late\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Salary Calculations\",\"Basic\",\"Total late\",\"Net late\",\"Late Amount\",\"Total leave\",\"PL\",\"Net leave\",\"Leave Amount\",\"Net Deductions\",\"Net payable Salary\",null,\"Total Duration\",\"PresentDays\",\"Leaves\",\"Holiday\",\"AbsentDays\",\"Weekly Off\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '[\"Conclusion\",26000,13,5,500,1,1,5,500,1000,25000,null,\"171 Hrs 34 Min\",19,0,2,5,6,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '2023-11-20 15:58:37', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquery`
--

CREATE TABLE `enquery` (
  `id` int(11) NOT NULL,
  `city` text NOT NULL DEFAULT '0',
  `lead_ip` text NOT NULL,
  `name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `phone` int(11) NOT NULL,
  `lead_owner` int(10) DEFAULT 0,
  `comments` text NOT NULL,
  `status` int(1) NOT NULL,
  `seen` int(1) NOT NULL,
  `source` int(1) NOT NULL,
  `service` int(10) NOT NULL,
  `spam_Id` int(11) NOT NULL DEFAULT 0,
  `followup_note` longtext NOT NULL,
  `enquery_type` int(1) NOT NULL,
  `followup_date` datetime DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquery`
--

INSERT INTO `enquery` (`id`, `city`, `lead_ip`, `name`, `email`, `phone`, `lead_owner`, `comments`, `status`, `seen`, `source`, `service`, `spam_Id`, `followup_note`, `enquery_type`, `followup_date`, `created_at`, `updated_at`) VALUES
(11, 'Noida', '103.44.53.133', 'Aman Kumar', 'admin@kashi.com', 2147483647, 2, 'Test', 1, 1, 2, 0, 0, '[]', 0, '2023-09-13 10:42:49', '2023-09-13 10:42:49', '0000-00-00 00:00:00'),
(12, 'Noida', '103.44.53.133', 'Amethyst Bullock', 'mahita@mailinator.com', 2147483647, 15, 'Qui sint commodo ad ', 1, 1, 3, 0, 0, '[{\"followup_note\":\"Test\",\"followup_date\":\"2023-09-14 13:53:00\",\"enquery_type\":\"3\"},{\"followup_note\":\"asfs\",\"followup_date\":\"2023-09-23 14:57:00\",\"enquery_type\":\"1\"},{\"followup_note\":\"asfas\",\"followup_date\":\"2023-09-14 12:58:00\",\"enquery_type\":\"2\"},{\"followup_note\":\"asfbjsf\",\"followup_date\":\"2023-09-14 23:06:00\",\"enquery_type\":\"1\"},{\"followup_note\":\"ms fjbsddfs\",\"followup_date\":\"2023-09-15 18:07:42\",\"enquery_type\":\"3\"},{\"followup_note\":\"kjsajfs\",\"followup_date\":\"2023-09-15 18:09:24\",\"enquery_type\":\"3\"}]', 3, '2023-09-15 18:09:24', '2023-09-13 10:44:27', '2023-09-15 18:09:24'),
(14, '', '', 'Suresh Sarkar', 'sureshsarkar201811@gmail.com', 2147483647, 15, 'asdasf', 1, 1, 2, 0, 0, '[{\"followup_note\":\"ihsf\",\"followup_date\":\"2023-09-19 22:21:00\",\"enquery_type\":\"1\"}]', 1, '2023-09-19 22:21:00', '2023-09-15 18:18:09', '2023-09-19 17:21:18'),
(15, '', '', 'Suresh Sarkar', 'sureshsarkar201811@gmail.com', 45745, 2, 'asasf54745', 1, 1, 2, 0, 0, '[{\"followup_note\":\"Sds\",\"followup_date\":\"2023-09-20 21:40:00\",\"enquery_type\":\"1\"},{\"followup_note\":\"asasf\",\"followup_date\":\"2023-09-20 20:41:00\",\"enquery_type\":\"1\"},{\"followup_note\":\"zsfsdf\",\"followup_date\":\"2023-09-20 16:47:00\",\"enquery_type\":\"1\"},{\"followup_note\":\"asnfbsdf\",\"followup_date\":\"2023-09-19 17:16:31\",\"enquery_type\":\"3\"}]', 3, '2023-09-19 17:16:31', '2023-09-15 18:20:07', '2023-09-19 17:16:31'),
(16, '', '', 'Bernard Parrish', 'fakux@mailinator.com', 99, 15, 'Ratione eius dolor l', 1, 1, 1, 0, 0, '[{\"followup_note\":\"asdas\",\"followup_date\":\"2023-09-15 18:26:36\",\"enquery_type\":\"1\"}]', 1, '2023-09-15 18:26:36', '2023-09-15 18:21:32', '2023-09-15 18:26:36'),
(17, '', '', 'Hedy Mendez', 'cicifawo@mailinator.com', 30, 2, 'Libero eius iste rep', 1, 1, 1, 0, 0, '[{\"followup_note\":\"adasf\",\"followup_date\":\"2023-09-21 18:30:00\",\"enquery_type\":\"2\"},{\"followup_note\":\"asfsfas\",\"followup_date\":\"2023-09-18 21:53:00\",\"enquery_type\":\"1\"},{\"followup_note\":\"asfa\",\"followup_date\":\"2023-09-18 20:53:00\",\"enquery_type\":\"1\"}]', 1, '2023-09-18 20:53:00', '2023-09-15 18:21:37', '2023-09-18 18:54:02'),
(18, '', '', 'Suresh Sarkar', 'suresh.s@techcentrica.com', 1111, 2, 'Test', 1, 1, 1, 0, 0, '[{\"followup_note\":\"asfasf\",\"followup_date\":\"2023-09-19 21:54:00\",\"enquery_type\":\"1\"},{\"followup_note\":\"asfasf\",\"followup_date\":\"2023-09-17 21:54:00\",\"enquery_type\":\"1\"},{\"followup_note\":\"asdsdf\",\"followup_date\":\"2023-09-20 18:59:00\",\"enquery_type\":\"1\"}]', 0, '2023-09-20 18:59:00', '2023-09-15 19:53:41', '2023-09-18 18:55:46'),
(19, '', '', 'sdf', '', 0, 1, '', 1, 1, 1, 0, 0, '', 0, '2023-09-19 19:00:04', '2023-09-19 15:29:48', '2023-09-19 15:29:48'),
(20, '', '', 'sdfsd', '', 0, 2, '', 1, 1, 1, 0, 0, '[{\"followup_note\":\"low budget\",\"followup_date\":\"2023-09-21 13:07:00\",\"enquery_type\":\"5\"}]', 5, '2023-09-21 13:07:00', '2023-09-19 15:30:21', '2023-09-21 10:07:13'),
(21, '', '', 'sefd', '', 0, 2, '', 1, 1, 1, 0, 0, '[{\"followup_note\":\"zsf\",\"followup_date\":\"2023-09-20 11:00:38\",\"enquery_type\":\"5\"},{\"followup_note\":\"jhuh\",\"followup_date\":\"2023-09-20 15:14:00\",\"enquery_type\":\"1\"},{\"followup_note\":\"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi dolorum nisi placeat quisquam molestias veritatis? Quia voluptatum ea fuga nesciunt optio accusantium nihil laudantium officiis laboriosam facere! Maxime, ex dicta!\",\"followup_date\":\"2023-09-22 00:00:00\",\"enquery_type\":\"1\"},{\"followup_note\":\"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi dolorum nisi placeat quisquam molestias veritatis? Quia voluptatum ea fuga nesciunt optio accusantium nihil laudantium officiis laboriosam facere! Maxime, ex dicta!\",\"followup_date\":\"2023-09-22 14:31:00\",\"enquery_type\":\"4\",\"created_at\":\"2023-09-21 10:31:45\"}]', 4, '2023-09-22 14:31:00', '2023-09-19 15:30:44', '2023-09-21 10:31:45'),
(22, '', '', 'Suresh Sarkar', 'suresh.s@techcentrica.com', 2147483647, 0, 'Test', 1, 1, 1, 0, 0, '[]', 0, '2023-09-21 10:54:38', '2023-08-21 10:54:38', '0000-00-00 00:00:00'),
(23, '', '', 'Suresh Sarkar', 'sureshsarkar201811@gmail.com', 2147483647, 0, 'Test', 1, 1, 2, 0, 0, '[]', 0, '2023-09-21 11:57:51', '2023-08-21 11:57:51', '0000-00-00 00:00:00'),
(24, 'Noida', '103.44.53.133', 'Suresh Sarkar', 'sureshsarkar2020@gmail.com', 2147483647, 1, 'Libero eius iste rep', 1, 1, 3, 0, 1, '[{\"followup_note\":\"Test\",\"followup_date\":\"2023-09-23 00:00:00\",\"enquery_type\":\"1\",\"created_at\":\"2023-09-23 16:14:32\"},{\"followup_note\":\"Test\",\"followup_date\":\"2023-09-25 14:44:00\",\"enquery_type\":\"1\",\"created_at\":\"2023-09-25 10:44:12\"}]', 1, '2023-09-25 14:44:00', '2023-09-21 11:59:31', '2023-09-25 10:44:12'),
(25, 'Noida', '103.44.53.133', 'AA', 'aaa@gmail.com', 1111111111, 1, 'Libero eius iste rep', 1, 1, 1, 0, 1, '[{\"followup_note\":\"kjjzh\",\"followup_date\":\"2023-09-21 00:00:00\",\"enquery_type\":\"4\",\"created_at\":\"2023-09-21 17:54:50\"},{\"followup_note\":\"dfsdf\",\"followup_date\":\"2023-09-21 00:00:00\",\"enquery_type\":\"7\",\"created_at\":\"2023-09-21 17:59:31\"}]', 7, '2023-09-21 00:00:00', '2023-09-21 13:11:33', '2023-09-21 17:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_date` text NOT NULL,
  `event_type` int(1) NOT NULL,
  `emp_id` int(125) NOT NULL,
  `event_time` text NOT NULL,
  `event_heading` text NOT NULL,
  `event_content` text NOT NULL,
  `event_attachment` text DEFAULT NULL,
  `commentData` longtext NOT NULL,
  `like_emp_id` longtext NOT NULL,
  `like_count` int(125) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `sent_status` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_date`, `event_type`, `emp_id`, `event_time`, `event_heading`, `event_content`, `event_attachment`, `commentData`, `like_emp_id`, `like_count`, `status`, `sent_status`, `created_at`, `updated_at`) VALUES
(11, '2023-12-06', 3, 29, '13:50', 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', '[\"uploads\\/events\\/hrm_6565b07c99483.jpg\",\"uploads\\/events\\/hrm_6565b07c998cf.jpg\"]', '', '', 0, 1, 0, '2023-11-28 14:03:09', '2023-11-28 14:48:52'),
(12, '2023-11-29', 3, 30, '20:00', 'Happly Birthday Karan', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', '', '[{\"comment\":\"jsbdsdfh jsdf\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 18:08:03\",\"event_id\":\"12\"}]', '', 0, 1, 0, '2023-11-28 15:49:41', '0000-00-00 00:00:00'),
(13, '2023-11-29', 3, 30, '20:00', 'Happly Birthday Karan', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', '', '[{\"comment\":\"ksafiasfsdf\",\"employeeId\":\"31\",\"dt\":\"2023-12-01 14:41:23\",\"event_id\":\"13\"},{\"comment\":\"ksafiasfsdf\",\"employeeId\":\"31\",\"dt\":\"2023-12-01 14:41:26\",\"event_id\":\"13\"}]', '', 0, 1, 0, '2023-11-28 15:49:55', '0000-00-00 00:00:00'),
(14, '2023-12-01', 3, 31, '19:51', 'Happly Birthday Suresh', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', '', '[{\"comment\":\"asfasef\",\"employeeId\":\"31\",\"dt\":\"2023-12-01 12:28:22\",\"event_id\":\"14\"}]', '', 0, 1, 0, '2023-11-28 16:48:30', '0000-00-00 00:00:00'),
(15, '2023-12-25', 2, 0, '20:53', 'Happly Crishmash', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', '', '[{\"comment\":\"ksdhig jsdbufg sdgf hgvsduf hvusdf\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 16:07:11\",\"event_id\":\"15\"}]', '[]', 0, 1, 0, '2023-11-28 16:49:59', '0000-00-00 00:00:00'),
(16, '2023-11-30', 3, 29, '20:53', 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', '', '[{\"comment\":\"ksehg jbsd igausf hgh hibsgf g9sfv vy8sgd ihvsdf\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 15:32:30\",\"event_id\":\"16\"},{\"comment\":\"ksehg jbsd igausf hgh hibsgf g9sfv vy8sgd ihvsdf\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 15:32:50\",\"event_id\":\"16\"},{\"comment\":\"ksehg jbsd igausf hgh hibsgf g9sfv vy8sgd ihvsdf\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 15:32:51\",\"event_id\":\"16\"},{\"comment\":\"ksehg jbsd igausf hgh hibsgf g9sfv vy8sgd ihvsdf\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 15:32:52\",\"event_id\":\"16\"},{\"comment\":\"ksehg jbsd igausf hgh hibsgf g9sfv vy8sgd ihvsdf\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 15:32:55\",\"event_id\":\"16\"},{\"comment\":\"ksehg jbsd igausf hgh hibsgf g9sfv vy8sgd ihvsdf\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 15:32:56\",\"event_id\":\"16\"},{\"comment\":\"ksehg jbsd igausf hgh hibsgf g9sfv vy8sgd ihvsdf\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 15:34:09\",\"event_id\":\"16\"},{\"comment\":\"sofh sudg gsd hsgf ugv gs7fv usfd g \",\"employeeId\":\"31\",\"dt\":\"2023-11-29 17:59:07\",\"event_id\":\"16\"}]', '[]', 0, 1, 0, '2023-11-28 16:50:40', '0000-00-00 00:00:00'),
(17, '2023-11-29', 3, 30, '22:52', 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', '[\"uploads\\/events\\/hrm_65699eea2e362.jpeg\",\"uploads\\/events\\/hrm_65699eea2e583.jpg\",\"uploads\\/events\\/hrm_65699eea2e7a6.jpg\",\"uploads\\/events\\/hrm_65699eea2e9ad.jpg\"]', '[{\"comment\":\"ksehg jbsd igausf hgh hibsgf g9sfv vy8sgd ihvsdf\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 15:44:18\",\"event_id\":\"17\"},{\"comment\":\"SZfbjzbdc\",\"employeeId\":\"31\",\"dt\":\"2023-11-29 16:25:12\",\"event_id\":\"17\"},{\"comment\":\"sajdfsdb usf 9shdf hv uisd hp9sd hgsdf gw8sdf \",\"employeeId\":\"31\",\"dt\":\"2023-11-29 17:59:33\",\"event_id\":\"17\"},{\"comment\":\"saodfj sdfh09 budsbf sdf098 \",\"employeeId\":\"31\",\"dt\":\"2023-11-29 18:52:05\",\"event_id\":\"17\"},{\"comment\":\"skf sdhf\",\"employeeId\":\"29\",\"dt\":\"2023-11-29 18:54:47\",\"event_id\":\"17\"},{\"comment\":\"skdf sdhfh8 jksaf \",\"employeeId\":\"29\",\"dt\":\"2023-11-29 18:55:00\",\"event_id\":\"17\"},{\"comment\":\"sd,fnsdsdgdsg dg\",\"employeeId\":\"31\",\"dt\":\"2023-11-30 17:43:27\",\"event_id\":\"17\"},{\"comment\":\"sd,fnsdsdgdsg dg\",\"employeeId\":\"31\",\"dt\":\"2023-11-30 17:43:28\",\"event_id\":\"17\"},{\"comment\":\"sd,fnsdsdgdsg dg\",\"employeeId\":\"31\",\"dt\":\"2023-11-30 17:43:29\",\"event_id\":\"17\"},{\"comment\":\"sd,fnsdsdgdsg dg\",\"employeeId\":\"31\",\"dt\":\"2023-11-30 17:43:30\",\"event_id\":\"17\"},{\"comment\":\"sd,fnsdsdgdsg dg\",\"employeeId\":\"31\",\"dt\":\"2023-11-30 17:43:31\",\"event_id\":\"17\"},{\"comment\":\"sd,fnsdsdgdsg dg\",\"employeeId\":\"31\",\"dt\":\"2023-11-30 17:43:31\",\"event_id\":\"17\"},{\"comment\":\"sd,fnsdsdgdsg dg\",\"employeeId\":\"31\",\"dt\":\"2023-11-30 17:43:31\",\"event_id\":\"17\"}]', '[\"31\"]', 1, 1, 0, '2023-11-28 18:52:28', '2023-12-01 14:22:58'),
(18, '2023-11-30', 3, 30, '17:30', 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', '[\"uploads\\/events\\/hrm_65699ed94d98b.jpg\",\"uploads\\/events\\/hrm_65699ed94dd00.jpg\",\"uploads\\/events\\/hrm_65699ed94df3b.jpg\"]', '', '[\"31\"]', 1, 1, 0, '2023-11-30 11:01:38', '2023-12-01 14:22:41'),
(19, '2023-11-30', 3, 30, '17:30', 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', '[\"uploads\\/events\\/hrm_6569cfa648ad2.jpeg\",\"uploads\\/events\\/hrm_6569cfa6491e3.jpg\",\"uploads\\/events\\/hrm_6569cfa64a98c.jpg\",\"uploads\\/events\\/hrm_6569cfa64bb0c.jpeg\",\"uploads\\/events\\/hrm_6569cfa64bfeb.jpg\",\"uploads\\/events\\/hrm_6569cfa64c297.jpg\",\"uploads\\/events\\/hrm_6569cfa64c503.jpg\"]', '[{\"comment\":\"sdohgisdg kjsdbg\",\"employeeId\":\"31\",\"dt\":\"2023-11-30 17:06:54\",\"event_id\":\"19\"}]', '[\"31\"]', 1, 1, 0, '2023-11-30 11:01:40', '2023-12-01 17:50:54'),
(28, '2023-12-01', 2, 0, '17:59', 'Happly Birthday TC', 'Today we are celebrating 12th anniversary of TC', '[\"uploads\\/events\\/hrm_6569b9eaef90f.jpg\",\"uploads\\/events\\/hrm_6569b9eaf03d8.jpg\",\"uploads\\/events\\/hrm_6569b9eaf1421.jpg\",\"uploads\\/events\\/hrm_6569b9eaf2079.jpg\"]', '[{\"comment\":\"Many Many Happy Returns Of The DAY\",\"employeeId\":\"31\",\"dt\":\"2023-12-01 17:28:38\",\"event_id\":\"28\"},{\"comment\":\"Me too\",\"employeeId\":\"29\",\"dt\":\"2023-12-02 10:39:17\",\"event_id\":\"28\"}]', '{\"1\":\"29\"}', 1, 1, 0, '2023-12-01 16:16:34', '2023-12-01 16:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `emp_id` int(125) NOT NULL,
  `day_name` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `holiday_reason` text NOT NULL,
  `days` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `emp_id`, `day_name`, `date_from`, `date_to`, `holiday_reason`, `days`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tuesday-Wednesday', '2023-10-17', '2023-10-18', 'Test', '02', 1, '2023-10-16 14:17:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_module`
--

CREATE TABLE `job_module` (
  `id` int(11) NOT NULL,
  `designation` text NOT NULL,
  `experience` text NOT NULL,
  `attachment` text NOT NULL,
  `date_limit` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_module`
--

INSERT INTO `job_module` (`id`, `designation`, `experience`, `attachment`, `date_limit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Developer', '2 year+', 'uploads/job_attachment/hrm_653cebdb65082.pdf', '2023-11-01', 0, '2023-10-28 16:39:15', '0000-00-00 00:00:00'),
(2, 'Developer', '2.5 Years', 'uploads/job_attachment/hrm_653ce7931cc1f.pdf', '2023-11-02', 0, '2023-10-28 16:20:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leave_management`
--

CREATE TABLE `leave_management` (
  `id` int(11) NOT NULL,
  `emp_id` int(125) NOT NULL,
  `comments` text NOT NULL,
  `department` int(1) NOT NULL DEFAULT 0,
  `leave_date_from` date NOT NULL,
  `leave_date_to` date NOT NULL,
  `leave_reson` text NOT NULL,
  `nature_of_leave` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_management`
--

INSERT INTO `leave_management` (`id`, `emp_id`, `comments`, `department`, `leave_date_from`, `leave_date_to`, `leave_reson`, `nature_of_leave`, `status`, `created_at`, `updated_at`) VALUES
(19, 28, '', 0, '2023-10-14', '2023-10-15', 'Test', '2', 1, '2023-11-14 16:24:51', '2023-11-18 15:20:49'),
(20, 28, '', 0, '2023-10-14', '2023-10-15', 'Test', '1', 0, '2023-10-14 16:25:43', '2023-11-18 15:19:50'),
(22, 31, '', 2, '2023-11-22', '2023-11-24', 'Test', '2', 0, '2023-11-21 16:10:40', '0000-00-00 00:00:00'),
(23, 31, '', 1, '2023-11-22', '2023-11-24', 'Test', '2', 0, '2023-11-21 16:10:49', '0000-00-00 00:00:00'),
(24, 31, '', 1, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 0, '2023-11-21 16:13:09', '0000-00-00 00:00:00'),
(25, 31, '', 1, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 0, '2023-11-21 16:14:09', '0000-00-00 00:00:00'),
(26, 31, '', 1, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 0, '2023-11-21 16:15:47', '0000-00-00 00:00:00'),
(27, 31, '', 1, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 0, '2023-11-21 16:16:50', '0000-00-00 00:00:00'),
(28, 31, '', 1, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 0, '2023-11-21 16:18:29', '0000-00-00 00:00:00'),
(29, 31, '', 1, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 0, '2023-11-21 16:19:25', '0000-00-00 00:00:00'),
(30, 31, 'asfgsd', 1, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 1, '2023-11-21 16:20:53', '2023-11-23 14:22:58'),
(31, 31, 'asfsd', 1, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 1, '2023-11-21 16:21:47', '2023-11-23 14:13:36'),
(32, 31, 'Anim nostrud eu atqu', 1, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 1, '2023-11-21 16:23:32', '2023-11-23 13:22:17'),
(33, 31, 'amsbfjh knasvfiuai', 1, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 1, '2023-11-21 16:26:14', '2023-11-23 12:49:19'),
(34, 31, 'asfsdgdsg', 2, '2023-11-24', '2023-11-26', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde cum eveniet itaque nulla explicabo reiciendis ea nisi illo, ipsum eius fugiat quo doloribus quod quibusdam voluptatem impedit laboriosam atque esse.', '3', 1, '2023-11-21 16:30:28', '2023-11-23 15:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `event_id` int(125) NOT NULL DEFAULT 0,
  `emp_id` int(125) NOT NULL DEFAULT 0,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `seen` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `event_id`, `emp_id`, `title`, `content`, `seen`, `created_at`) VALUES
(4, 14, 28, 'Happly Birthday Suresh', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 16:48:30'),
(5, 14, 29, 'Happly Birthday Suresh', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 1, '2023-11-28 16:48:30'),
(6, 14, 30, 'Happly Birthday Suresh', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 16:48:30'),
(7, 14, 31, 'Happly Birthday Suresh', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 1, '2023-11-28 16:48:30'),
(8, 14, 33, 'Happly Birthday Suresh', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 16:48:30'),
(9, 15, 28, 'Happly Crishmash', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 16:49:59'),
(10, 15, 29, 'Happly Crishmash', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 1, '2023-11-28 16:49:59'),
(11, 15, 30, 'Happly Crishmash', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 16:49:59'),
(12, 15, 31, 'Happly Crishmash', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 1, '2023-11-28 16:49:59'),
(13, 15, 33, 'Happly Crishmash', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 16:49:59'),
(14, 16, 28, 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 16:50:40'),
(15, 16, 29, 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 1, '2023-11-28 16:50:40'),
(16, 16, 30, 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 16:50:40'),
(17, 16, 31, 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 1, '2023-11-28 16:50:40'),
(18, 16, 33, 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 16:50:40'),
(19, 17, 28, 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 18:52:28'),
(20, 17, 29, 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 1, '2023-11-28 18:52:28'),
(21, 17, 30, 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 18:52:28'),
(22, 17, 31, 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 1, '2023-11-28 18:52:28'),
(23, 17, 33, 'Happly Birthday Varun', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 0, '2023-11-28 18:52:28'),
(24, 18, 28, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:01:38'),
(25, 18, 29, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:01:38'),
(26, 18, 30, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:01:38'),
(27, 18, 31, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:01:38'),
(28, 19, 28, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:01:40'),
(29, 19, 29, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:01:40'),
(30, 19, 30, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:01:40'),
(31, 19, 31, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:01:40'),
(32, 20, 28, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:01'),
(33, 20, 29, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:01'),
(34, 20, 30, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:01'),
(35, 20, 31, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:01'),
(36, 21, 28, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:02'),
(37, 21, 29, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:02'),
(38, 21, 30, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:02'),
(39, 21, 31, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:02'),
(40, 22, 28, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:03'),
(41, 22, 29, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:03'),
(42, 22, 30, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:03'),
(43, 22, 31, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:03'),
(44, 23, 28, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:21'),
(45, 23, 29, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:21'),
(46, 23, 30, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:21'),
(47, 23, 31, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:21'),
(48, 24, 28, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:21'),
(49, 24, 29, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:21'),
(50, 24, 30, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:21'),
(51, 24, 31, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:21'),
(52, 25, 28, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:22'),
(53, 25, 29, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:22'),
(54, 25, 30, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:22'),
(55, 25, 31, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:22'),
(56, 26, 28, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:22'),
(57, 26, 29, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:22'),
(58, 26, 30, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:22'),
(59, 26, 31, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:22'),
(60, 27, 28, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:22'),
(61, 27, 29, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:22'),
(62, 27, 30, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 0, '2023-11-30 11:02:22'),
(63, 27, 31, 'Birthday Party of Karan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, ipsam vel. Voluptates vel officia alias inventore itaque tenetur, asperiores dolor voluptate soluta, blanditiis sit sequi quidem, obcaecati cumque. Perspiciatis, veritatis.', 1, '2023-11-30 11:02:22'),
(64, 28, 28, 'Happly Birthday TechCentrica', 'Today we are celebrating 12th anniversary of TC', 0, '2023-12-01 16:16:34'),
(65, 28, 29, 'Happly Birthday TechCentrica', 'Today we are celebrating 12th anniversary of TC', 1, '2023-12-01 16:16:34'),
(66, 28, 30, 'Happly Birthday TechCentrica', 'Today we are celebrating 12th anniversary of TC', 0, '2023-12-01 16:16:34'),
(67, 28, 31, 'Happly Birthday TechCentrica', 'Today we are celebrating 12th anniversary of TC', 1, '2023-12-01 16:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` text NOT NULL,
  `role` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `system_ip` varchar(100) NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `name`, `email`, `phone`, `password`, `role`, `status`, `system_ip`, `last_activity`, `last_login`, `last_logout`, `created_at`, `updated_at`) VALUES
(15, 'Anshu Dubby', 'anshu@techcentrica.com', 2147483647, 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '::1', '2023-09-21 17:09:19', '2023-09-21 17:09:19', NULL, '2023-09-15 15:31:39', '2023-09-22 11:43:58'),
(16, 'Isha Mehndiratta ', 'isha.m@techcentrica.com', 2147483647, 'd2496a24faa350e78e3af5af19b13615', 1, 1, '::1', '2023-09-25 18:46:47', '2023-09-25 10:39:07', '2023-09-22 11:56:53', '2023-09-15 20:13:47', '0000-00-00 00:00:00'),
(17, 'Akash', 'akash@techcentrica.com', 2147483647, 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '::1', '2023-09-22 11:49:49', '2023-09-22 11:49:49', '2023-09-22 11:54:58', '2023-09-22 11:44:26', '2023-09-22 11:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` int(11) NOT NULL,
  `emp_id` int(125) NOT NULL,
  `month` text NOT NULL,
  `department` int(2) NOT NULL DEFAULT 0,
  `document` text NOT NULL,
  `note` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `rating` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `emp_id`, `month`, `department`, `document`, `note`, `updated_at`, `created_at`, `status`, `rating`) VALUES
(1, 31, '2023-October', 1, 'uploads/performance_dox/hrm_655f3660152f2.pdf', '', '0000-00-00 00:00:00', '2023-11-23 16:54:16', 1, 0),
(3, 31, '2023-November', 1, 'uploads/performance_dox/hrm_6561d8f1b83d4.jpg', '', '0000-00-00 00:00:00', '2023-11-25 16:52:25', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(11) NOT NULL,
  `policy_name` text NOT NULL,
  `policy_file` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `policy_name`, `policy_file`, `status`, `created_at`, `updated_at`) VALUES
(6, 'shougo kjsdbguf ksvufas', 'uploads/policy/hrm_6564209d82013.xlsx', 1, '2023-11-27 10:22:45', '0000-00-00 00:00:00'),
(7, 'Policy Guidlines', 'uploads/policy/hrm_65642bef4eab9.pdf', 1, '2023-11-27 10:22:53', '2023-11-27 11:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `emp_id` int(125) NOT NULL,
  `department` int(2) NOT NULL DEFAULT 0,
  `month` text NOT NULL,
  `year` text NOT NULL,
  `days_in_month` text NOT NULL,
  `attendance_in_days` text NOT NULL,
  `late_mark` text NOT NULL,
  `casual_leave` text NOT NULL,
  `paid_leave` text NOT NULL,
  `basic` text NOT NULL,
  `hra` text NOT NULL,
  `conveyance_allowance` text NOT NULL,
  `special_allowance` text NOT NULL,
  `compensation` text NOT NULL,
  `incentive` text NOT NULL,
  `tds` text NOT NULL,
  `pf_amount` text NOT NULL,
  `esi` text NOT NULL,
  `salary_advance` text NOT NULL,
  `late_mark_amount` text NOT NULL,
  `casual_leave_amount` text NOT NULL,
  `total_earning` text NOT NULL,
  `total_deduction` text NOT NULL,
  `net_salary` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `emp_id`, `department`, `month`, `year`, `days_in_month`, `attendance_in_days`, `late_mark`, `casual_leave`, `paid_leave`, `basic`, `hra`, `conveyance_allowance`, `special_allowance`, `compensation`, `incentive`, `tds`, `pf_amount`, `esi`, `salary_advance`, `late_mark_amount`, `casual_leave_amount`, `total_earning`, `total_deduction`, `net_salary`, `status`, `created_at`, `updated_at`) VALUES
(7, 31, 1, 'October', '2023', '31', '31', '31', '31', '31', '20000', '2000', '1000', '1000', '1000', '1000', '0', '0', '0', '100', '500', '100', '26000', '700', '25300', 1, '2023-11-20 17:59:22', '2023-11-20 17:59:49'),
(8, 30, 3, 'October', '2023', '22', '22', '22', '22', '22', '20000', '2000', '1000', '1500', '1000', '1000', '0', '0', '0', '1000', '1000', '500', '26500', '2500', '24000', 1, '2023-11-27 14:57:50', '2023-12-02 13:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

CREATE TABLE `sub_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` text NOT NULL,
  `role` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `system_ip` varchar(100) NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_admin`
--

INSERT INTO `sub_admin` (`id`, `name`, `email`, `phone`, `password`, `role`, `status`, `system_ip`, `last_activity`, `last_login`, `last_logout`, `created_at`, `updated_at`) VALUES
(2, 'Suresh sarkar', 'subadmin@varun.com', 2147483647, '123456', 1, 1, '::1', '2023-09-21 14:30:02', '2023-09-21 14:23:41', '2023-09-21 14:30:12', '2023-09-12 17:48:23', '0000-00-00 00:00:00'),
(15, 'Anshu Dubby', 'anshu@techcentrica.com', 2147483647, 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '::1', '2023-09-21 17:09:19', '2023-09-21 17:09:19', NULL, '2023-09-15 15:31:39', '2023-09-22 11:43:58'),
(16, 'Isha Mehndiratta ', 'isha.m@techcentrica.com', 2147483647, 'd2496a24faa350e78e3af5af19b13615', 1, 1, '::1', '2023-09-25 18:46:47', '2023-09-25 10:39:07', '2023-09-22 11:56:53', '2023-09-15 20:13:47', '0000-00-00 00:00:00'),
(17, 'Akash', 'akash@techcentrica.com', 2147483647, 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '::1', '2023-09-22 11:49:49', '2023-09-22 11:49:49', '2023-09-22 11:54:58', '2023-09-22 11:44:26', '2023-09-22 11:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(125) NOT NULL,
  `system_ip` text NOT NULL,
  `owner_id` int(125) NOT NULL,
  `login_at` datetime NOT NULL,
  `logout_at` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`id`, `owner_name`, `system_ip`, `owner_id`, `login_at`, `logout_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Isha Mehndiratta ', '::1', 16, '2023-09-23 14:20:58', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(2, 'Isha Mehndiratta ', '::1', 16, '2023-09-23 14:23:03', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(3, 'Isha Mehndiratta ', '::1', 16, '2023-09-23 14:57:23', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(4, 'Isha Mehndiratta ', '::1', 16, '2023-09-23 15:19:27', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(5, 'Isha Mehndiratta ', '::1', 16, '2023-09-23 15:19:40', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(6, 'Isha Mehndiratta ', '::1', 16, '2023-09-25 09:50:53', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(7, 'Isha Mehndiratta ', '::1', 16, '2023-09-25 10:28:59', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(8, 'Isha Mehndiratta ', '::1', 16, '2023-09-25 10:39:07', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `z_admin`
--

CREATE TABLE `z_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(125) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `role_type` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `z_admin`
--

INSERT INTO `z_admin` (`id`, `email`, `password`, `name`, `phone`, `role_type`) VALUES
(1, 'admin@techcentrica.com', 'e10adc3949ba59abbe56e057f20f883e', 'Neha', '9876897654', 1),
(2, 'heha@techcentrica.com', 'e10adc3949ba59abbe56e057f20f883e', 'Neha Morya', '9876567876', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_module`
--
ALTER TABLE `applicant_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_attandance`
--
ALTER TABLE `emp_attandance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquery`
--
ALTER TABLE `enquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_module`
--
ALTER TABLE `job_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_management`
--
ALTER TABLE `leave_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admin`
--
ALTER TABLE `sub_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_admin`
--
ALTER TABLE `z_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_module`
--
ALTER TABLE `applicant_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `emp_attandance`
--
ALTER TABLE `emp_attandance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `enquery`
--
ALTER TABLE `enquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_module`
--
ALTER TABLE `job_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_management`
--
ALTER TABLE `leave_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_admin`
--
ALTER TABLE `sub_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `z_admin`
--
ALTER TABLE `z_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
