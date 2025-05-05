-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 09:45 PM
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
-- Database: `vchain`
--

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_logs`
--

CREATE TABLE `vehicle_logs` (
  `log_id` int(11) NOT NULL,
  `plate_number` varchar(10) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `entry_time` datetime NOT NULL,
  `exit_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_logs`
--

INSERT INTO `vehicle_logs` (`log_id`, `plate_number`, `owner_name`, `vehicle_type`, `entry_time`, `exit_time`) VALUES
(4, 'NDR6826', 'Buboy Cruz', 'private', '2025-03-19 16:03:51', '2025-03-19 17:10:50'),
(5, 'NDR6826', 'Buboy Cruz', 'private', '2025-03-19 16:33:40', '2025-03-19 18:01:13'),
(6, 'NDR6826', 'Buboy Cruz', 'private', '2025-03-19 16:34:08', '2025-03-19 18:04:03'),
(7, 'NDR6826', 'Buboy Cruz', 'private', '2025-03-19 16:43:55', '2025-03-19 18:18:54'),
(8, 'NDR6826', 'Buboy Cruz', 'private', '2025-03-19 18:25:41', '2025-03-19 20:08:50'),
(11, 'NDR6826', 'Buboy Cruz', 'private', '2025-03-20 04:02:42', '2025-03-20 04:03:06'),
(13, 'NAK8182', 'Felomino, Amelyn B.', 'private', '2025-03-20 21:08:58', '2025-03-20 21:15:18'),
(14, 'DAE4013', 'Bose, John Lander G.', 'private', '2025-03-20 21:17:03', '2025-03-20 21:18:27'),
(15, 'NDR6826', 'Buboy Cruz', 'private', '2025-03-20 21:23:57', '2025-03-20 21:24:06'),
(16, 'DAE4013', 'Bose, John Lander G.', 'private', '2025-03-20 21:25:58', '2025-03-20 21:29:20'),
(17, 'DAE4013', 'Bose, John Lander G.', 'private', '2025-03-20 21:32:53', '2025-03-29 15:01:04'),
(18, 'NAK8182', 'Felomino, Amelyn B.', 'private', '2025-03-20 21:34:14', '2025-03-20 21:35:05'),
(19, 'NDR6826', 'Buboy Cruz', 'private', '2025-03-23 10:07:20', '2025-03-29 14:58:19'),
(20, 'NAK8182', 'Felomino, Amelyn B.', 'private', '2025-03-29 15:02:16', NULL),
(21, 'NDR6826', 'Buboy Cruz', 'private', '2025-05-05 18:11:47', '2025-05-05 18:16:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehicle_logs`
--
ALTER TABLE `vehicle_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `plate_number` (`plate_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehicle_logs`
--
ALTER TABLE `vehicle_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicle_logs`
--
ALTER TABLE `vehicle_logs`
  ADD CONSTRAINT `vehicle_logs_ibfk_1` FOREIGN KEY (`plate_number`) REFERENCES `vehicle_registration` (`plate_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
