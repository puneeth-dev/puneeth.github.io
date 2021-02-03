-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 07:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automation`
--

-- --------------------------------------------------------

--
-- Table structure for table `android_automation`
--

CREATE TABLE `android_automation` (
  `host_id` int(11) NOT NULL,
  `android_id` varchar(30) NOT NULL,
  `command` int(11) NOT NULL,
  `StatusFlag` varchar(30) NOT NULL,
  `device_ip` varchar(30) NOT NULL,
  `battery_percent` int(11) NOT NULL,
  `battery_state` int(11) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `log_file_path` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `android_automation`
--

INSERT INTO `android_automation` (`host_id`, `android_id`, `command`, `StatusFlag`, `device_ip`, `battery_percent`, `battery_state`, `last_update`, `log_file_path`) VALUES
(181, 'efbc0fa2597cea9e', 0, '', '10.0.2.16', 0, 0, '0000-00-00 00:00:00', ''),
(182, 'd5e12aeb69d2df51', 0, 'PASS', '192.168.232.2', 46, 1, '2021-02-04 00:28:33', 'http://192.168.0.102/Embedded_SQA/Android_Automation/uploads/d5e12aeb69d2df51.txt'),
(183, '79773556971c856f', 0, '', '10.0.2.16', 100, 0, '2021-02-01 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `android_automation`
--
ALTER TABLE `android_automation`
  ADD PRIMARY KEY (`host_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `android_automation`
--
ALTER TABLE `android_automation`
  MODIFY `host_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
