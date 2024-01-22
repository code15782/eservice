-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 01:13 PM
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
(3, 'อุตสาหกรรม', 5, 3, 2, 1, 6, '2022-04-17 08:40:45', '2023-10-28 09:03:50', 'active', 2),
(5, 'Science', 4, 3, 2, 1, 3, '2023-10-28 08:12:15', '2023-10-28 08:24:05', 'delete', 0),
(6, 'Computer', 4, 4, 2, 3, 3, '2023-10-28 08:22:57', '2023-10-28 08:24:02', 'delete', 0),
(7, 'ปลูกผักสวนครัว', 5, 3, 2, 3, 3, '2023-10-28 08:24:23', '2023-10-28 08:29:08', 'delete', 0),
(8, 'sss', 4, 3, 2, 3, 3, '2023-10-28 08:29:03', '2023-10-28 08:41:01', 'delete', 3),
(9, 'กรก', 4, 3, 2, 3, 3, '2023-10-28 08:41:26', '2023-10-28 08:41:26', 'delete', 4),
(10, 'คัดลอกหลักสูตร กรก', 4, 4, 2, 3, 3, '2023-10-28 08:50:44', '2023-10-28 08:50:44', 'delete', 4),
(11, 'การทำงานของระบบประสาท', 5, 3, 3, 6, 6, '2023-10-28 09:03:27', '2023-10-28 09:03:27', 'active', 2),
(12, 'หลักสูตรภาค4', 6, 3, 3, 3, 3, '2023-10-28 09:26:23', '2023-10-28 09:26:23', 'active', 4),
(13, 'ภาค2', 6, 3, 3, 6, 6, '2023-10-28 09:30:46', '2023-10-28 09:30:46', 'active', 2),
(14, 'หลักสูตรภาค4', 6, 4, 3, 3, 3, '2023-10-28 09:37:53', '2023-10-28 09:37:53', 'active', 4),
(15, 'หลักสูตรภาค4', 5, 3, 3, 9, 3, '2023-10-28 10:27:47', '2023-10-28 10:52:39', 'active', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
