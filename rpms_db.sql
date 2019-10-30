-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 05:15 PM
-- Server version: 10.2.12-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(100) NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_lastname` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(15) DEFAULT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='Keep user data';

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email`, `admin_firstname`, `admin_lastname`, `phone`, `admin_password`, `salt`, `admin_image`) VALUES
(19, 'somto@gmail.com', 'Somtochukwu', 'Okafor', 560294755, '4b564300f0ddbac86882cc05406af082f9b6394d4c55d14eddfd024739ca931b', '7a0654a461b3be2631e02cea9d7ff84110a15f007e7ff727659fb4438318c8d1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permits_table`
--

CREATE TABLE `permits_table` (
  `permit_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_lastname` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_title` varchar(5) COLLATE utf32_unicode_ci NOT NULL,
  `previous_name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `user_passport` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `issue_place` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `nationality` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `local_address` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `phone` int(15) NOT NULL,
  `foreign_address` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `closest_relative` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `edu_qualifications` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `profession` varchar(75) COLLATE utf32_unicode_ci NOT NULL,
  `profession_address` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `employer_name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `first_arrival_date` date DEFAULT NULL,
  `latest_arrival_date` date NOT NULL,
  `previous_expiry` date DEFAULT NULL,
  `apply_reason` varchar(500) COLLATE utf32_unicode_ci NOT NULL,
  `proposed_stay_length` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `marital_status` varchar(20) COLLATE utf32_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `spouse_nationality` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `spouse_place_of_birth` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `spouse_date_of_birth` date DEFAULT NULL,
  `curr_status` varchar(50) COLLATE utf32_unicode_ci NOT NULL DEFAULT 'Submitted',
  `apply_date` date NOT NULL DEFAULT current_timestamp(),
  `pass_image` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `pass_data` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `letter` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='Keep user data';

--
-- Dumping data for table `permits_table`
--

INSERT INTO `permits_table` (`permit_id`, `user_id`, `user_email`, `user_firstname`, `user_lastname`, `user_title`, `previous_name`, `user_passport`, `issue_date`, `issue_place`, `expiry_date`, `nationality`, `birth_date`, `birth_place`, `local_address`, `phone`, `foreign_address`, `closest_relative`, `edu_qualifications`, `profession`, `profession_address`, `employer_name`, `first_arrival_date`, `latest_arrival_date`, `previous_expiry`, `apply_reason`, `proposed_stay_length`, `marital_status`, `spouse_name`, `spouse_nationality`, `spouse_place_of_birth`, `spouse_date_of_birth`, `curr_status`, `apply_date`, `pass_image`, `pass_data`, `letter`) VALUES
(1, 18, 'dhalehk@gmail.com', 'Dale', 'Boahene', 'Mr.', 'Boahene', 'qwsedfg234', '2018-05-17', 'Tema, Greater Accra', '2018-05-16', 'Ghana', '1996-07-18', 'Ghana', 'c25 Main Street 40-0146', 265640301, 'c25 Main Street 40-0146', 'Dale Boahene', 'BSc. Computer Engineering', 'Student', 'GA520', 'University of Ghana, Legon', '2018-05-24', '2018-05-17', '2018-05-08', '', '', 'Single', '', '', '', '2018-05-17', 'Submitted', '2018-06-29', '../img/uploads/passport/ug.jpg', '../img/uploads/data/maps.PNG', '../img/uploads/passport/keys.txt'),
(3, 19, 'somto@gmail.com', 'Somtochukwu', 'Okafor', 'Ms', 'Boahene', 'ghcgvdsfoo86t9', '2017-12-12', 'Lagos, Nigeria', '2018-07-07', 'Nigerian', '1998-07-10', 'Lagos', 'University of Ghana, Legon, GA-520-7906', 560294755, 'Festac Estate, Hse No. 9734875', 'Dale Boahene', 'BSc. Biomedical Engineering', 'Student', 'GA520', 'University of Ghana, Legon', '2015-10-16', '2018-06-07', '2017-07-12', 'Education', '1', 'Single', '', '', '', NULL, 'Submitted', '2018-07-06', '../img/uploads/passport/ug.jpg', '../img/uploads/passport/maps.png', '../img/uploads/passport/keys.txt');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(100) NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_lastname` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_passport` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(15) DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='Keep user data';

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `user_email`, `user_firstname`, `user_lastname`, `user_passport`, `phone`, `user_password`, `salt`, `user_image`) VALUES
(17, 'dale@gmail.com', 'dale', 'asdfghj', 'dfvbnm,', NULL, '5f1a8bcecad15340cdf7e0263e77f235fb385a8031f8806c122c04b9b8bde33b', 'a2f60d75b1e63108919d34e698e480304552117f5c8784129f60498cd6d19ead', NULL),
(18, 'dhalehk@gmail.com', 'Dale', 'Boahene', 'qazwsxedc123', NULL, 'dbbd492c73a945c9940d77247087a385c9f08ee8de0febef9c2de1531af0637f', '62705b18c5a9d7716cf6b5f7e86e4ae51c1deb30f12fc27182373890058296fb', '../img/uploads/fiverr.PNG'),
(19, 'somto@gmail.com', 'Somtochukwu', 'Okafor', 'qwefgvbxfdfhg', NULL, '4b564300f0ddbac86882cc05406af082f9b6394d4c55d14eddfd024739ca931b', '7a0654a461b3be2631e02cea9d7ff84110a15f007e7ff727659fb4438318c8d1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `user_email` (`admin_email`);

--
-- Indexes for table `permits_table`
--
ALTER TABLE `permits_table`
  ADD PRIMARY KEY (`permit_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permits_table`
--
ALTER TABLE `permits_table`
  MODIFY `permit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
