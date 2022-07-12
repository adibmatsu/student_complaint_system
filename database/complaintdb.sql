-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2022 at 06:45 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaintdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `ad_name` varchar(255) NOT NULL,
  `adminno` int(10) NOT NULL,
  `cred_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `ad_name`, `adminno`, `cred_id`) VALUES
(1, 'admin', 20201, 8),
(2, 'Megat', 3001, 16);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `comp_id` int(10) NOT NULL,
  `comp_cat` varchar(255) NOT NULL,
  `comp_loct` varchar(255) NOT NULL,
  `comp_desc` varchar(255) NOT NULL,
  `comp_date` date NOT NULL,
  `comp_status` int(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `officer_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`comp_id`, `comp_cat`, `comp_loct`, `comp_desc`, `comp_date`, `comp_status`, `user_id`, `officer_id`) VALUES
(1, 'Electrical', 'Bilik', 'lampu rosak', '2022-07-02', 0, 7, 1),
(2, 'Plumbing', 'Tandas', 'Paip rosak', '2022-07-03', 1, 7, 1),
(3, 'Furniture', 'Bilik', 'Katil patah', '2022-07-04', 1, 7, 1),
(4, 'Furniture', 'Hallway', 'Rak kasut patah', '2022-07-09', 1, 7, 1),
(5, 'Electrical', 'Bilik', 'kipas tercabut', '2022-07-02', 1, 7, 1),
(6, 'Electrical', 'Tandas', 'lampu tandas kena air', '2022-07-02', 1, 7, 1),
(7, 'Plumbing', 'Tandas', 'Paip bocor', '2022-07-04', 0, 8, 1),
(8, 'Furniture', 'Bilik', 'tilam keras mcm batu', '2022-07-04', 1, 9, 1),
(9, 'Plumbing', 'Tandas', 'paip bocor', '2022-07-09', NULL, 7, NULL),
(10, 'Electrical', 'Bilik', 'Kipas terbakar', '2022-07-12', 0, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `cred_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`cred_id`, `email`, `password`, `usertype`) VALUES
(7, 'syafiq3@syafiq4.com', '123123123', 0),
(8, 'admin@gmail.com', 'admin', 3),
(9, 'izzathensem@gmail.com', '123456', 0),
(11, 'hafiz@gmail.com', '12345', 1),
(12, 'Najmi@gmail.com', '12345', 0),
(14, 'izzul@officer.com', '12345', 2),
(15, 'adib@officer.com', '12345', 2),
(16, 'megat@admin.com', '12345', 3),
(17, 'raaf@user.com', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `officer_id` int(10) NOT NULL,
  `off_name` varchar(255) NOT NULL,
  `offno` int(10) NOT NULL,
  `cred_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`officer_id`, `off_name`, `offno`, `cred_id`) VALUES
(1, 'Izzul', 1001, 14),
(2, 'Adib', 1002, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `telno` int(20) NOT NULL,
  `studno` int(10) DEFAULT NULL,
  `staffno` int(10) DEFAULT NULL,
  `cred_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `telno`, `studno`, `staffno`, `cred_id`) VALUES
(6, 'syafiq2', 123456789, 2020878585, NULL, 7),
(7, 'izzat', 1234567890, 2020862772, NULL, 9),
(8, 'Hafiz', 123456789, NULL, 1020123456, 11),
(9, 'Najmi', 123456765, 2023678321, NULL, 12),
(10, 'Raaf', 104682880, 1005, NULL, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `credadmin_fk` (`cred_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `officerid_fk` (`officer_id`),
  ADD KEY `userid_fk` (`user_id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`cred_id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`officer_id`),
  ADD KEY `credoff_fk` (`cred_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `creduser_fk` (`cred_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `comp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `cred_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `officer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `credadmin_fk` FOREIGN KEY (`cred_id`) REFERENCES `credentials` (`cred_id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `officerid_fk` FOREIGN KEY (`officer_id`) REFERENCES `officers` (`officer_id`),
  ADD CONSTRAINT `userid_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `officers`
--
ALTER TABLE `officers`
  ADD CONSTRAINT `credoff_fk` FOREIGN KEY (`cred_id`) REFERENCES `credentials` (`cred_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `creduser_fk` FOREIGN KEY (`cred_id`) REFERENCES `credentials` (`cred_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
