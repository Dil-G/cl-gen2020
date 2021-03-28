-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 05:02 AM
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
-- Table structure for table `ol_results`
--

CREATE TABLE `ol_results` (
  `examID` varchar(20) NOT NULL,
  `admissionNo` varchar(20) NOT NULL,
  `studentIndex` int(20) NOT NULL,
  `studentName` text NOT NULL,
  `SubName` text NOT NULL,
  `SubID` varchar(20) NOT NULL,
  `Grade` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ol_results`
--

INSERT INTO `ol_results` (`examID`, `admissionNo`, `studentIndex`, `studentName`, `SubName`, `SubID`, `Grade`) VALUES
('GCEOL/2015', 'ST2000001', 18020001, 'Sandali Perera', 'Buddhism', 'SOL1', 'A'),
('GCEOL/2015', 'ST2000002', 18020002, 'Hasara Silva', 'Catholicism', 'SOL2', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ol_results`
--
ALTER TABLE `ol_results`
  ADD PRIMARY KEY (`studentIndex`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
