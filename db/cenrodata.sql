-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 04:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cenrodata`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `post_id` int(11) NOT NULL,
  `postCaption` varchar(100) NOT NULL,
  `postDescription` varchar(255) NOT NULL,
  `data` longblob NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `postDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `case_id` int(11) NOT NULL,
  `case_number` varchar(100) NOT NULL,
  `case_desc` varchar(255) NOT NULL,
  `case_details` varchar(255) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `case_number`, `case_desc`, `case_details`, `stat`) VALUES
(1, 'SAHBA73WKJ79S9', 'MARIA VERSUS JUAN: OVER A PARCEL OF LAND', 'Lorem ipsum dolor sit amet,-(11-13-2023)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `serviceLabel` varchar(255) NOT NULL,
  `serviceSteps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `serviceLabel`, `serviceSteps`) VALUES
(1, 'Application for Survey Authority', '1. Submit Letter Request to the Implementing PENR/CENR Office with complete supporting requirements.\r\n\r\n2. Receive Order of Payment and pay corresponding fees. \r\n\r\n3. Receive Official Receipt (OR). \r\n\r\n4. Receive Survey Authority, sign in the duplicate copy, and forward the same to the Records Officer for filing. '),
(2, 'Application for Residential Free Patent', '1. Submit accomplished Application Form to the CENR Office with complete supporting requirements Applicant may also submit the application through email or courier, where, applicable, the applicant may also apply online or through LMI/SI/DPLI.\r\n\r\n2. Receive Order of Payment and pay corresponding fees.\r\n\r\n3. Receive (OR) and forward the same to Records Unit/Section.'),
(3, 'Application for Chainsaw Registration', '1. Submit application form and supporting documents to the Implementing PENR/CENR Office.\r\n2. Receive Order of Payment and pay corresponding fee.\r\n3. Receive OR (Official Receipt).\r\n4. Receive Certificate of Chainsaw Registration.'),
(4, 'Application for Agricultural Free Patent', '1. Submit accomplished Application Form to the CENR Office with complete supporting requirements Applicant may also submit the application through email or courier, where, applicable, the applicant may also apply online or through LMI/SI/DPLI.\r\n\r\n2. Receive Order of Payment and pay corresponding fees.\r\n\r\n3. Receive (OR) and forward the same to Records Unit/Section.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(2, 'ICT1', '$2y$10$yqw4keh9tPD'),
(3, 'yeyy', '$2y$10$ULwsZ./3RmR'),
(4, '123456', '$2y$10$MwjqWeSm77p'),
(5, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
