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
-- Table structure for table `ol_rsheet`
--

CREATE TABLE `ol_rsheet` (
  `examID` varchar(20) NOT NULL,
  `admissionNo` varchar(20) NOT NULL,
  `studentIndex` int(20) NOT NULL,
  `studentName` text NOT NULL,
  `Buddhism` varchar(2) NOT NULL,
  `Saivaneri` varchar(2) NOT NULL,
  `Catholicism` varchar(2) NOT NULL,
  `Christianity` varchar(2) NOT NULL,
  `Islam` varchar(2) NOT NULL,
  `Sinhala` varchar(2) NOT NULL,
  `Tamil` varchar(2) NOT NULL,
  `History` varchar(2) NOT NULL,
  `Science` varchar(2) NOT NULL,
  `Mathematics` varchar(2) NOT NULL,
  `English` varchar(2) NOT NULL,
  `BAStudies` varchar(2) NOT NULL,
  `SLSinhala` varchar(2) NOT NULL,
  `SLTamil` varchar(2) NOT NULL,
  `French` varchar(2) NOT NULL,
  `Art` varchar(2) NOT NULL,
  `Oriental_Music` varchar(2) NOT NULL,
  `Western_Music` varchar(2) NOT NULL,
  `Oriental_Dancing` varchar(2) NOT NULL,
  `ICT` varchar(2) NOT NULL,
  `Health_Physical_Edu` varchar(2) NOT NULL,
  `Media_Studies` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ol_rsheet`
--

INSERT INTO `ol_rsheet` (`examID`, `admissionNo`, `studentIndex`, `studentName`, `Buddhism`, `Saivaneri`, `Catholicism`, `Christianity`, `Islam`, `Sinhala`, `Tamil`, `History`, `Science`, `Mathematics`, `English`, `BAStudies`, `SLSinhala`, `SLTamil`, `French`, `Art`, `Oriental_Music`, `Western_Music`, `Oriental_Dancing`, `ICT`, `Health_Physical_Edu`, `Media_Studies`) VALUES
('GCEOL/2015', 'ST2000010', 18020010, 'Johnny Depp', '', '', 'A', '', '', '', 'A', 'C', 'A', 'A', 'A', 'A', '', '', '', '', 'C', '', '', '', 'A', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ol_rsheet`
--
ALTER TABLE `ol_rsheet`
  ADD PRIMARY KEY (`studentIndex`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
