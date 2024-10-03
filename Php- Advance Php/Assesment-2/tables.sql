-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 06:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax_assesment`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `id` int(11) NOT NULL,
  `rType` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `times` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`id`, `rType`, `date`, `times`, `time`, `user_id`) VALUES
(1, 'custom', '2024-10-02', '8:00 to 9:30', '1727879167', 1),
(2, 'custom', '2024-10-03', '3:00 to 4:30', '1727879423', 2),
(3, 'custom', '2024-10-03', '4:30 to 6:00', '1727928460', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fullday`
--

CREATE TABLE `fullday` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `reserveType` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fullday`
--

INSERT INTO `fullday` (`id`, `date`, `reserveType`, `time`, `user_id`) VALUES
(3, '2024-10-03', 'full-day', '1727928759', 2);

-- --------------------------------------------------------

--
-- Table structure for table `halfday`
--

CREATE TABLE `halfday` (
  `id` int(11) NOT NULL,
  `rType` varchar(50) NOT NULL,
  `half` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `halfday`
--

INSERT INTO `halfday` (`id`, `rType`, `half`, `date`, `time`, `user_id`) VALUES
(1, 'half-day', 'afternoon', '', '1727927463', 2),
(2, 'half-day', 'afternoon', '2024-10-03', '1727927522', 2),
(3, 'half-day', 'morning', '2024-10-03', '1727928528', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservationdetails`
--

CREATE TABLE `reservationdetails` (
  `id` int(11) NOT NULL,
  `ReservationType` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `HalfDay` varchar(50) DEFAULT NULL,
  `user_id` int(50) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservationdetails`
--

INSERT INTO `reservationdetails` (`id`, `ReservationType`, `date`, `time`, `HalfDay`, `user_id`, `user_name`) VALUES
(1, 'custom', '2024-07-11', '16:00', '', 1, 'Nikunj Gagliya '),
(2, 'custom', '2024-07-11', '16:00', '', 1, 'Nikunj Gagliya '),
(3, 'custom', '0000-00-00', '', '', 1, 'Nikunj Gagliya ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Nikunj Gagliya ', 'nikunjgagliya5@gmail.com', 'nikunj'),
(2, 'dharmesh', 'djgagliya@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `halfday` (`user_id`);

--
-- Indexes for table `fullday`
--
ALTER TABLE `fullday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halfday`
--
ALTER TABLE `halfday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservationdetails`
--
ALTER TABLE `reservationdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ReservationDetails` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fullday`
--
ALTER TABLE `fullday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `halfday`
--
ALTER TABLE `halfday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservationdetails`
--
ALTER TABLE `reservationdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `custom`
--
ALTER TABLE `custom`
  ADD CONSTRAINT `custom` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fullday` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `halfday` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `reservationdetails`
--
ALTER TABLE `reservationdetails`
  ADD CONSTRAINT `ReservationDetails` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
