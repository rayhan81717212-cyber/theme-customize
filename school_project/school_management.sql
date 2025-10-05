-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2025 at 05:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `department`, `year`) VALUES
(1, 'XI', 'Business Studies', '2025'),
(2, 'XI', 'Humanities', '2025'),
(3, 'XII', 'Business Studies', '2025'),
(4, 'XII', 'Humanities', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `roll` varchar(20) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `department` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `religion` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `father_name`, `mother_name`, `roll`, `class_id`, `department`, `dob`, `gender`, `religion`, `email`, `phone`, `admission_date`, `address`, `photo`) VALUES
(1, 'Rahim Uddin', 'Abdul Karim', 'Fatema Khatun', '101', 1, '', '2008-03-15', 'Male', 'Islam', 'rahim@example.com', '01710000001', '2023-01-10', 'Dhaka, Bangladesh', 'uploads/rahim.jpg'),
(2, 'Sadia Akter', 'Jamal Uddin', 'Rina Akter', '102', 2, '', '2008-07-22', 'Female', 'Islam', 'sadia@example.com', '01710000002', '2023-01-12', 'Chittagong, Bangladesh', 'uploads/sadia.jpg'),
(3, 'Rony Hossain', 'Salam Hossain', 'Shila Hossain', '103', 1, '', '2008-01-30', 'Male', 'Islam', 'rony@example.com', '01710000003', '2023-01-15', 'Khulna, Bangladesh', 'uploads/rony.jpg'),
(4, 'Mim Naz', 'Kamal Naz', 'Anika Naz', '104', 3, '', '2008-05-17', 'Female', 'Islam', 'mim@example.com', '01710000004', '2023-01-20', 'Rajshahi, Bangladesh', 'uploads/mim.jpg'),
(5, 'Tareq Mahmud', 'Sayeed Mahmud', 'Rumana Mahmud', '105', 1, '', '2007-12-12', 'Male', 'Islam', 'tareq@example.com', '01710000005', '2023-01-25', 'Barishal, Bangladesh', 'uploads/tareq.jpg'),
(6, 'Nabila Khatun', 'Abul Khatun', 'Rafia Khatun', '106', 2, '', '2008-09-09', 'Female', 'Islam', 'nabila@example.com', '01710000006', '2023-01-28', 'Sylhet, Bangladesh', 'uploads/nabila.jpg'),
(7, 'Sabbir Ahmed', 'Shahid Ahmed', 'Salma Ahmed', '107', 2, '', '2008-02-20', 'Male', 'Islam', 'sabbir@example.com', '01710000007', '2023-02-01', 'Comilla, Bangladesh', 'uploads/sabbir.jpg'),
(8, 'Rina Sultana', 'Faruq Sultana', 'Joya Sultana', '108', 3, '', '2008-08-05', 'Female', 'Islam', 'rina@example.com', '01710000008', '2023-02-05', 'Mymensingh, Bangladesh', 'uploads/rina.jpg'),
(9, 'Imran Hossain', 'Mahbub Hossain', 'Rita Hossain', '109', 10, '', '2007-11-11', 'Male', 'Islam', 'imran@example.com', '01710000009', '2023-02-10', 'Tangail, Bangladesh', 'uploads/imran.jpg'),
(10, 'Faria Parvin', 'Shafiqul Parvin', 'Nusrat Parvin', '110', 1, '', '2008-06-25', 'Female', 'Islam', 'faria@example.com', '01710000010', '2023-02-15', 'Gazipur, Bangladesh', 'uploads/faria.jpg'),
(22, 'Rayhan', 'Kuddos', 'Rahima', '01', 1, '', '2025-10-02', 'Male', 'Islam', 'raya@gmail.com', '0170123014580', '2025-10-01', 'Dhaka', 'uploads/file.jpg'),
(24, 'Rayhan', 'Kuddus Molla', 'Rahima ', '1', 1, '', '2025-10-01', 'Male', 'Islam', 'rayhan@gmail.com', '01700000001', '2025-10-01', 'Dhaka', ''),
(25, 'Rayhan', 'kahma', 'sefali', '02', 1, '', '2025-10-01', 'Male', 'Islam', 'rat@gmail.com', '01710125014', '2025-10-01', 'dgaja', 'uploads/photo/20251001-152025.jpg'),
(26, 'Rayhan', 'Kuddos Molla', 'Rahima Begum', '01', 1, '', '2025-10-01', 'Male', 'Islam', 'rayhan@gmail.com', '0170561562', '2025-10-01', 'Dhaka', '../uploads/photo/20251001-153504.jpg'),
(27, 'kljdfkja', 'kjdlkaj', 'jdlkfjqa', '101', 1, '', '0000-00-00', '', 'Islam', '', '', '0000-00-00', '', 'uploads/photo/20251001-154036.jpg'),
(28, 'Ryhan', 'Kuddos molla', 'rahima', '50', 2, '', '2025-10-02', 'Male', 'Islam', 'rayhan@gmail.com', '01705675623', '2025-10-02', 'bandar', 'uploads/photo/20251001-161153.jpg'),
(29, 'rayhan', 'rayha', 'ra', '1', 1, '', '2025-10-01', 'Male', 'Islam', '', '', '0000-00-00', '', '../uploads/photo/20251001-161710.jpg'),
(30, 'ra', '', '', '', 0, '', '0000-00-00', '', '', '', '', '0000-00-00', '', ''),
(35, 'reyhan', 'kuddos', 'rahima', '2020', 2, '', '2025-10-02', 'Male', 'Islam', 'ser@gmail.com', '', '2025-10-02', 'sfd', 'uploads/photo/20251002-081936.jpg'),
(36, 'messi', 'kdkj', 'dfa', '01', 4, '', '1986-05-12', 'Male', 'Christian', 'mesi@example.com', '+9810540514052', '2025-10-02', 'dfa', 'uploads/photo/20251002-082207.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `subject_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `class_id`, `subject_code`) VALUES
(1, 'Accounting', '11', 256),
(2, 'Business Organization & Management', '11', 276),
(3, 'Finance, Banking & Insurance', '11', 292),
(4, 'Economics', '11', 109),
(5, 'Production Management & Marketing', '11', 286),
(6, 'Logic', '11', 121);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `joining_date` date NOT NULL,
  `education_qualification` varchar(255) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `gender`, `contact_no`, `subject_id`, `joining_date`, `education_qualification`, `salary`, `photo`) VALUES
(1, 'Abdul Karim', 'Male', '', 1, '2020-01-15', 'M.Sc in Mathematics', '35000.00', 'abdul_karim.jpg'),
(2, 'Fatema Begum', 'Female', '', 2, '2019-03-20', 'M.A in English', '32000.00', 'fatema_begum.jpg'),
(3, 'Mohammad Rahman', 'Male', '', 3, '2021-07-10', 'M.Sc in Physics', '40000.00', 'rahman.jpg'),
(4, 'Sadia Akter', 'Female', '', 4, '2022-02-05', 'M.Sc in Chemistry', '37000.00', 'sadia.jpg'),
(5, 'Nazmul Hasan', 'Male', '', 5, '2018-06-18', 'B.Ed in Biology', '30000.00', 'nazmul.jpg'),
(6, 'Shamima Sultana', 'Female', '', 6, '2020-09-12', 'M.A in History', '31000.00', 'shamima.jpg'),
(7, 'Kamal Hossain', 'Male', '', 7, '2017-11-25', 'M.A in Bangla', '33000.00', 'kamal.jpg'),
(8, 'Rokeya Khatun', 'Female', '', 8, '2021-01-30', 'M.Com in Accounting', '36000.00', 'rokeya.jpg'),
(9, 'Imran Hossain', 'Male', '', 9, '2019-12-08', 'M.Sc in ICT', '42000.00', 'imran.jpg'),
(10, 'Farhana Yesmin', 'Female', '', 10, '2022-05-22', 'M.Sc in Geography', '34000.00', 'farhana.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
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
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
