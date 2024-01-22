-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 11:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eservice_db`
--
CREATE DATABASE IF NOT EXISTS `eservice_db` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `eservice_db`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_by`, `updated_by`, `created_date`, `updated_date`, `status`) VALUES
(4, 'มคอ. 1', '', 1, 1, '2022-04-17 08:37:45', '2022-04-17 08:38:45', 'active'),
(5, 'มคอ. 3', '', 1, 1, '2022-04-17 08:38:56', '2022-04-17 08:38:56', 'active'),
(6, 'มคอ. 7', '', 1, 1, '2022-04-17 08:39:10', '2022-04-17 08:39:10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(8) NOT NULL,
  `semester_id` int(8) NOT NULL,
  `subject_id` int(8) NOT NULL,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `section_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `category_id`, `semester_id`, `subject_id`, `created_by`, `updated_by`, `created_date`, `updated_date`, `status`, `section_id`) VALUES
(3, 'อุตสาหกรรม', 5, 3, 2, 1, 6, '2022-04-17 08:40:45', '2023-10-28 09:03:50', 'delete', 2),
(5, 'Science', 4, 3, 2, 1, 3, '2023-10-28 08:12:15', '2023-10-28 08:24:05', 'delete', 0),
(6, 'Computer', 4, 4, 2, 3, 3, '2023-10-28 08:22:57', '2023-10-28 08:24:02', 'delete', 0),
(7, 'ปลูกผักสวนครัว', 5, 3, 2, 3, 3, '2023-10-28 08:24:23', '2023-10-28 08:29:08', 'delete', 0),
(8, 'sss', 4, 3, 2, 3, 3, '2023-10-28 08:29:03', '2023-10-28 08:41:01', 'delete', 3),
(9, 'กรก', 4, 3, 2, 3, 3, '2023-10-28 08:41:26', '2023-10-28 08:41:26', 'active', 4),
(10, 'คัดลอกหลักสูตร กรก', 4, 4, 2, 3, 3, '2023-10-28 08:50:44', '2023-10-28 08:50:44', 'active', 4),
(11, 'การทำงานของระบบประสาท', 5, 3, 3, 6, 6, '2023-10-28 09:03:27', '2023-10-28 09:03:27', 'active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `id` int(8) NOT NULL,
  `course_id` int(8) NOT NULL,
  `form_1_generals_id` int(8) NOT NULL,
  `form_2_components_id` int(8) NOT NULL,
  `form_3_elo_mains_id` int(8) NOT NULL,
  `form_4_plan_mains_id` int(8) NOT NULL,
  `form_5_resources_id` int(8) NOT NULL,
  `form_6_assesses_id` int(8) NOT NULL,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`id`, `course_id`, `form_1_generals_id`, `form_2_components_id`, `form_3_elo_mains_id`, `form_4_plan_mains_id`, `form_5_resources_id`, `form_6_assesses_id`, `created_by`, `updated_by`, `created_date`, `updated_date`, `status`) VALUES
(10, 3, 3, 2, 1, 6, 2, 2, 2, 2, '2022-04-17 08:41:34', '2023-10-28 09:05:58', 'delete'),
(11, 11, 0, 0, 0, 0, 0, 0, 2, 2, '2023-10-28 09:06:03', '2023-10-28 09:06:03', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `form_1_generals`
--

CREATE TABLE `form_1_generals` (
  `id` int(8) NOT NULL,
  `type` enum('none','must','free') NOT NULL DEFAULT 'none',
  `teacher_name` varchar(255) NOT NULL,
  `section` int(2) NOT NULL,
  `pre_course` varchar(255) NOT NULL,
  `co_course` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_1_generals`
--

INSERT INTO `form_1_generals` (`id`, `type`, `teacher_name`, `section`, `pre_course`, `co_course`, `place`, `created_by`, `updated_by`, `updated_date`, `created_date`, `status`) VALUES
(3, 'none', 'อาจารย์นพดล ปัทมา', 2, 'โปรเจคก่อน', 'โปรเจคร่วม', 'ตึกอุตสาหกรรม', 2, 2, '2022-04-17 08:43:13', '2022-04-17 08:43:13', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `form_2_components`
--

CREATE TABLE `form_2_components` (
  `id` int(8) NOT NULL,
  `description` text NOT NULL,
  `theory` text NOT NULL,
  `lab` text NOT NULL,
  `research` text NOT NULL,
  `private` text NOT NULL,
  `technology` text NOT NULL,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_2_components`
--

INSERT INTO `form_2_components` (`id`, `description`, `theory`, `lab`, `research`, `private`, `technology`, `created_by`, `updated_by`, `updated_date`, `created_date`, `status`) VALUES
(2, 'ทดสอบ', '1', '2', '3', '4', '6', 2, 2, '2022-04-17 08:43:56', '2022-04-17 08:43:56', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `form_3_elo_mains`
--

CREATE TABLE `form_3_elo_mains` (
  `id` int(8) NOT NULL,
  `elo1` text NOT NULL,
  `elo2` text NOT NULL,
  `elo3` text NOT NULL,
  `elo4` text NOT NULL,
  `elo5` text NOT NULL,
  `elo6` text NOT NULL,
  `clo1` text NOT NULL,
  `clo2` text NOT NULL,
  `clo3` text NOT NULL,
  `clo4` text NOT NULL,
  `clo5` text NOT NULL,
  `clo6` text NOT NULL,
  `elo1_checkbox_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo2_checkbox_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo3_checkbox_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo4_checkbox_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo5_checkbox_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo6_checkbox_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo1_checkbox_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo2_checkbox_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo3_checkbox_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo4_checkbox_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo5_checkbox_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo6_checkbox_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo1_checkbox_3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo2_checkbox_3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo3_checkbox_3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo4_checkbox_3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo5_checkbox_3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo6_checkbox_3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo1_checkbox_4` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo2_checkbox_4` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo3_checkbox_4` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo4_checkbox_4` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo5_checkbox_4` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo6_checkbox_4` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo1_checkbox_5` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo2_checkbox_5` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo3_checkbox_5` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo4_checkbox_5` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo5_checkbox_5` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo6_checkbox_5` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo1_checkbox_6` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo2_checkbox_6` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo3_checkbox_6` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo4_checkbox_6` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo5_checkbox_6` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `elo6_checkbox_6` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_3_elo_mains`
--

INSERT INTO `form_3_elo_mains` (`id`, `elo1`, `elo2`, `elo3`, `elo4`, `elo5`, `elo6`, `clo1`, `clo2`, `clo3`, `clo4`, `clo5`, `clo6`, `elo1_checkbox_1`, `elo2_checkbox_1`, `elo3_checkbox_1`, `elo4_checkbox_1`, `elo5_checkbox_1`, `elo6_checkbox_1`, `elo1_checkbox_2`, `elo2_checkbox_2`, `elo3_checkbox_2`, `elo4_checkbox_2`, `elo5_checkbox_2`, `elo6_checkbox_2`, `elo1_checkbox_3`, `elo2_checkbox_3`, `elo3_checkbox_3`, `elo4_checkbox_3`, `elo5_checkbox_3`, `elo6_checkbox_3`, `elo1_checkbox_4`, `elo2_checkbox_4`, `elo3_checkbox_4`, `elo4_checkbox_4`, `elo5_checkbox_4`, `elo6_checkbox_4`, `elo1_checkbox_5`, `elo2_checkbox_5`, `elo3_checkbox_5`, `elo4_checkbox_5`, `elo5_checkbox_5`, `elo6_checkbox_5`, `elo1_checkbox_6`, `elo2_checkbox_6`, `elo3_checkbox_6`, `elo4_checkbox_6`, `elo5_checkbox_6`, `elo6_checkbox_6`, `created_by`, `updated_by`, `updated_date`, `created_date`, `status`) VALUES
(1, '1', '2', '3', '4', '5', '6', 'q', 'w', 'e', 'r', 't', 'y', 'active', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'active', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'active', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'active', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'active', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'active', 2, 2, '2022-04-17 08:44:29', '2022-04-17 08:44:29', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `form_4_plan_details`
--

CREATE TABLE `form_4_plan_details` (
  `id` int(8) NOT NULL,
  `form_4_plan_main_id` int(8) NOT NULL,
  `week` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `activity_1` varchar(255) NOT NULL,
  `activity_2` varchar(255) NOT NULL,
  `clo1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `clo2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `clo3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `clo4` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `clo5` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `clo6` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_4_plan_details`
--

INSERT INTO `form_4_plan_details` (`id`, `form_4_plan_main_id`, `week`, `title`, `time`, `activity_1`, `activity_2`, `clo1`, `clo2`, `clo3`, `clo4`, `clo5`, `clo6`, `created_by`, `updated_by`, `updated_date`, `created_date`, `status`) VALUES
(81, 6, '1', '', '1', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'active', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(82, 6, '2', '', '2', '', '', 'active', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(83, 6, '3', '', '3', '', '', 'inactive', 'inactive', 'active', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(84, 6, '4', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'active', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(85, 6, '5', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(86, 6, '6', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(87, 6, '7', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(88, 6, '8', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(89, 6, '9', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(90, 6, '10', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(91, 6, '11', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(92, 6, '12', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(93, 6, '13', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(94, 6, '14', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(95, 6, '15', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(96, 6, '16', '', '', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(97, 6, '17', '', '', '', '', 'inactive', 'active', 'active', 'inactive', 'inactive', 'active', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(98, 6, '18', '', '6', '', '', 'inactive', 'active', 'inactive', 'inactive', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(99, 6, '19', '', '5', '', '', 'inactive', 'inactive', 'inactive', 'active', 'inactive', 'inactive', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active'),
(100, 6, '20', '', '4', '', '', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', 'active', 2, 2, '2022-04-17 08:45:10', '2022-04-17 08:45:10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `form_4_plan_mains`
--

CREATE TABLE `form_4_plan_mains` (
  `id` int(8) NOT NULL,
  `percent_1` text NOT NULL,
  `percent_2` text NOT NULL,
  `percent_3` text NOT NULL,
  `percent_4` text NOT NULL,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_4_plan_mains`
--

INSERT INTO `form_4_plan_mains` (`id`, `percent_1`, `percent_2`, `percent_3`, `percent_4`, `created_by`, `updated_by`, `updated_date`, `created_date`, `status`) VALUES
(6, '1', '2', '3', '4', 2, 2, '2022-04-17 08:45:24', '2022-04-17 08:45:10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `form_5_resources`
--

CREATE TABLE `form_5_resources` (
  `id` int(8) NOT NULL,
  `must` text NOT NULL,
  `order` text NOT NULL,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_5_resources`
--

INSERT INTO `form_5_resources` (`id`, `must`, `order`, `created_by`, `updated_by`, `updated_date`, `created_date`, `status`) VALUES
(2, 'ไม่มี', '', 2, 2, '2022-04-17 08:45:40', '2022-04-17 08:45:40', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `form_6_assesses`
--

CREATE TABLE `form_6_assesses` (
  `id` int(8) NOT NULL,
  `by_student_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_student_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_student_3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_student_4` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_student_5` varchar(255) NOT NULL,
  `by_assess_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_assess_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_assess_3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_assess_4` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_assess_5` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_assess_6` varchar(255) NOT NULL,
  `by_fix_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_fix_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_fix_3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_fix_4` varchar(255) NOT NULL,
  `by_research_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_research_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_research_3` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_research_4` varchar(255) NOT NULL,
  `by_ressult_1` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_ressult_2` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `by_ressult_3` varchar(255) NOT NULL,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_6_assesses`
--

INSERT INTO `form_6_assesses` (`id`, `by_student_1`, `by_student_2`, `by_student_3`, `by_student_4`, `by_student_5`, `by_assess_1`, `by_assess_2`, `by_assess_3`, `by_assess_4`, `by_assess_5`, `by_assess_6`, `by_fix_1`, `by_fix_2`, `by_fix_3`, `by_fix_4`, `by_research_1`, `by_research_2`, `by_research_3`, `by_research_4`, `by_ressult_1`, `by_ressult_2`, `by_ressult_3`, `created_by`, `updated_by`, `updated_date`, `created_date`, `status`) VALUES
(2, 'inactive', 'inactive', 'inactive', 'inactive', 'ทดสอบ', 'inactive', 'inactive', 'inactive', 'inactive', 'inactive', '', 'inactive', 'inactive', 'inactive', '', 'inactive', 'inactive', 'inactive', '', 'inactive', 'inactive', '', 2, 2, '2022-04-17 08:52:03', '2022-04-17 08:49:52', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(8) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `updated_date` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_by`, `updated_by`, `created_date`, `updated_date`, `status`) VALUES
(0, '-', 1, 1, '2023-10-28', '2023-10-28', 'inactive'),
(2, 'ภาคการจัดการเทคโนโลยีการผลิตและสารสนเทศ', 1, 1, '2023-10-28', '2023-10-28', 'active'),
(3, 'ภาคการเกษตร', 1, 1, '2023-10-28', '2023-10-28', 'active'),
(4, 'ภาคภาษาไทย', 1, 1, '2023-10-28', '2023-10-28', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(8) NOT NULL,
  `term` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `term`, `year`, `created_by`, `updated_by`, `created_date`, `updated_date`, `status`) VALUES
(3, 1, 2654, 1, 1, '2022-04-17 08:39:33', '2022-04-17 08:39:33', 'active'),
(4, 2, 2564, 1, 1, '2022-04-17 08:39:45', '2022-04-17 08:39:45', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(8) NOT NULL,
  `code` varchar(255) NOT NULL,
  `unit` int(2) NOT NULL,
  `name_thai` varchar(255) NOT NULL,
  `name_english` varchar(255) NOT NULL,
  `time_theory` int(2) NOT NULL DEFAULT 0,
  `time_lab` int(2) NOT NULL DEFAULT 0,
  `time_research` int(2) NOT NULL DEFAULT 0,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `unit`, `name_thai`, `name_english`, `time_theory`, `time_lab`, `time_research`, `created_by`, `updated_by`, `created_date`, `updated_date`, `status`) VALUES
(2, '030245102', 3, 'ระเบียบวิธีวิจัย', 'Research Methodology', 5, 2, 2, 1, 1, '2022-04-17 08:37:26', '2022-04-17 08:37:26', 'active'),
(3, '020120450', 10, 'นอนกลางวัน', 'afternoon napping', 99, 1, 6, 3, 3, '2023-10-28 08:52:00', '2023-10-28 08:52:00', 'active'),
(4, '99999', 99, 'ภาค 2', 'section 2', 99, 99, 99, 6, 6, '2023-10-28 09:05:05', '2023-10-28 09:05:05', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prefixname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` enum('admin','teacher','staff') NOT NULL DEFAULT 'teacher',
  `created_by` int(8) NOT NULL DEFAULT 0,
  `updated_by` int(8) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `section_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `prefixname`, `firstname`, `lastname`, `role`, `created_by`, `updated_by`, `created_date`, `updated_date`, `status`, `section_id`) VALUES
(1, 'admin', '$2a$08$ZzsTRFTJyeAAsvdFq6S.4.1iNXn8Pp7D1nVN6R/F82UrXzeuBJwqW', 'นาย', 'สมชาย', 'ทำงานดี', 'admin', 0, 1, '2021-11-25 13:24:45', '2021-11-28 01:52:31', 'active', 0),
(2, 'teacher', '$2a$08$uomdbsV5pCshlmh2NKLaJ.gV6.MyZZD7Ec9yEGx02BBXiGZXM1iPW', 'นาง', 'ปรีชา', 'สอนดี', 'teacher', 0, 1, '2021-11-25 13:24:45', '2023-10-28 08:01:15', 'active', 2),
(3, 'staff', '$2a$08$.HEv9DYkiIphyGPnLO2xv.coA6E0eg6dOB7FljzEau5EM30mS.UlG', 'นาย', 'อุตสาหกรรม', 'พระนครเหนือ', 'staff', 0, 1, '2021-11-25 13:24:45', '2023-10-28 08:01:18', 'active', 4),
(4, 'somchai', '$2a$08$NrNaCMQE8f2J28q5C5MpNeJBleRhKhD8FvwUJ.ySduKRAD7gBdTC.', 'นาย', 'สมหญิง', 'มาทำงาน', 'staff', 1, 1, '2021-11-26 12:27:09', '2023-10-28 08:01:23', 'active', 2),
(5, 'peerasak', '$2a$08$b9PlYrOFH0/6qSY20iERtOW0pE9MvD4zKBdZpY.j62o4VE28h4MW2', 'นาย', 'พีระศักดิ์', 'รักสอน', 'teacher', 1, 1, '2021-11-26 12:37:43', '2023-10-28 08:01:28', 'active', 3),
(6, 'tstaff', '$2a$08$FUtDzvengwfCqqQKNlMBwu62J32n6DBFA1JEW.1gdZ2S8ON3enjma', 'นาย', 'ทดสอบพนักงาน', 'พนักงาน', 'staff', 1, 1, '2023-10-28 08:04:18', '2023-10-28 08:04:18', 'active', 2),
(7, 't1', '$2a$08$.P1.Nyw8Z8X7d9IJuFEdIuoTeiHnTJBP51wbBmJZoTAqnr95oM4Ku', 'นาง', 't1', 't1test', 'teacher', 1, 1, '2023-10-28 09:00:08', '2023-10-28 09:00:08', 'active', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_1_generals`
--
ALTER TABLE `form_1_generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_2_components`
--
ALTER TABLE `form_2_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_3_elo_mains`
--
ALTER TABLE `form_3_elo_mains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_4_plan_details`
--
ALTER TABLE `form_4_plan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_4_plan_mains`
--
ALTER TABLE `form_4_plan_mains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_5_resources`
--
ALTER TABLE `form_5_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_6_assesses`
--
ALTER TABLE `form_6_assesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `form_1_generals`
--
ALTER TABLE `form_1_generals`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_2_components`
--
ALTER TABLE `form_2_components`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_3_elo_mains`
--
ALTER TABLE `form_3_elo_mains`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_4_plan_details`
--
ALTER TABLE `form_4_plan_details`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `form_4_plan_mains`
--
ALTER TABLE `form_4_plan_mains`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form_5_resources`
--
ALTER TABLE `form_5_resources`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_6_assesses`
--
ALTER TABLE `form_6_assesses`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"eservice_db\",\"table\":\"courses\"},{\"db\":\"eservice_db\",\"table\":\"subjects\"},{\"db\":\"eservice_db\",\"table\":\"users\"},{\"db\":\"eservice_db\",\"table\":\"form_2_components\"},{\"db\":\"eservice_db\",\"table\":\"form_1_generals\"},{\"db\":\"eservice_db\",\"table\":\"sections\"},{\"db\":\"eservice_db\",\"table\":\"categories\"},{\"db\":\"eservice_db\",\"table\":\"enrolls\"},{\"db\":\"eservice_db\",\"table\":\"semesters\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'eservice_db', 'courses', '{\"sorted_col\":\"`courses`.`section_id` ASC\"}', '2023-10-28 08:28:24'),
('root', 'eservice_db', 'users', '{\"sorted_col\":\"`users`.`prefixname` DESC\"}', '2023-10-28 05:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-10-28 09:10:02', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
