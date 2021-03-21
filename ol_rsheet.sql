-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 03:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cl_gen`
--

-- --------------------------------------------------------

--
-- Table structure for table `schol_rsheet`
--

CREATE TABLE `schol_rsheet` (
  `examID` varchar(20) NOT NULL,
  `admissionNo` varchar(20) NOT NULL,
  `studentIndex` int(20) NOT NULL,
  `studentName` text NOT NULL,
  `examMarks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schol_rsheet`
--

INSERT INTO `schol_rsheet` (`examID`, `admissionNo`, `studentIndex`, `studentName`, `examMarks`) VALUES
('G5SE/2016', 'ST2000001', 18020001, 'Sandali Perera', 180),
('G5SE/2016', 'ST2000002', 18020002, 'Dilhani Gamhatha', 160),
('G5SE/2016', 'ST2000003', 18020003, 'Medhani Silva', 170),
('G5SE/2016', 'ST2000004', 18020004, 'Sherene Dias', 150),
('G5SE/2016', 'ST2000005', 18020005, 'Maheli Perera', 160),
('G5SE/2016', 'ST2000006', 18020006, 'Risandi Yuhara', 170),
('G5SE/2016', 'ST2000007', 18020007, 'Pasindu Chanusha', 170),
('G5SE/2016', 'ST2000008', 18020008, 'Manishka Perera', 160),
('G5SE/2016', 'ST2000009', 18020009, 'Chathura Alvis', 120),
('G5SE/2016', 'ST2000010', 18020010, 'Johnny Depp', 180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schol_rsheet`
--
ALTER TABLE `schol_rsheet`
  ADD PRIMARY KEY (`studentIndex`),
  ADD KEY `examID` (`examID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schol_rsheet`
--
ALTER TABLE `schol_rsheet`
  ADD CONSTRAINT `schol_rsheet_ibfk_1` FOREIGN KEY (`examID`) REFERENCES `addscholexam` (`examID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
