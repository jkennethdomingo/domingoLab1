-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2023 at 01:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itc311`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_section`
--

CREATE TABLE `table_section` (
  `Section` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_section`
--

INSERT INTO `table_section` (`Section`) VALUES
('A1'),
('F1'),
('F2'),
('F3'),
('F5'),
('F6'),
('F7'),
('G1'),
('G2'),
('G3');

-- --------------------------------------------------------

--
-- Table structure for table `table_students`
--

CREATE TABLE `table_students` (
  `id` int NOT NULL,
  `StudName` text,
  `StudGender` text,
  `StudCourse` text,
  `StudSection` varchar(25) DEFAULT NULL,
  `StudYear` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_students`
--

INSERT INTO `table_students` (`id`, `StudName`, `StudGender`, `StudCourse`, `StudSection`, `StudYear`) VALUES
(2, 'John Kenneth Nicko M. Domingo', 'Male', 'BSIT', 'F2', '3'),
(4, 'Kim Chaewon', 'Female', 'BSCS', 'F1', '2'),
(6, 'Kim Minju', 'Female', 'BSCpE', 'F2', '1'),
(8, 'Jang Wonyoung', 'Female', 'BSIT', 'F1', '1'),
(9, 'Im Nayeon', 'Female', 'BSIT', 'F1', '4'),
(11, 'Miyawaki Sakura', 'Female', 'BSIT', 'F2', '4'),
(14, 'Chinatsu Kano', 'Female', 'BSCS', 'F2', '2'),
(16, 'Miku Nakano', 'Female', 'BSIT', 'F6', '1'),
(18, 'Yabuki Nako', 'Female', 'BSIT', 'G1', '1'),
(19, 'Liz', 'Female', 'BSIT', 'G3', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_section`
--
ALTER TABLE `table_section`
  ADD PRIMARY KEY (`Section`);

--
-- Indexes for table `table_students`
--
ALTER TABLE `table_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `StudSection` (`StudSection`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_students`
--
ALTER TABLE `table_students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_students`
--
ALTER TABLE `table_students`
  ADD CONSTRAINT `table_students_ibfk_1` FOREIGN KEY (`StudSection`) REFERENCES `table_section` (`Section`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
