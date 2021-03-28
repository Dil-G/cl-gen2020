-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 12:40 PM
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
  `markID` varchar(20) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `subjectID` varchar(20) NOT NULL,
  `grade` text NOT NULL,
  `examID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ol_results`
--

INSERT INTO `ol_results` (`markID`, `studentID`, `subjectID`, `grade`, `examID`) VALUES
('20000011', 'ST2000001', 'SOL1', 'A', 'GCEOL/2015'),
('200000116', 'ST2000001', 'SOL16', 'C', 'GCEOL/2015'),
('200000117', 'ST2000001', 'SOL17', 'A', 'GCEOL/2015'),
('20000014', 'ST2000001', 'SOL4', 'A', 'GCEOL/2015'),
('20000015', 'ST2000001', 'SOL5', 'A', 'GCEOL/2015'),
('20000016', 'ST2000001', 'SOL6', 'A', 'GCEOL/2015'),
('20000017', 'ST2000001', 'SOL7', 'A', 'GCEOL/2015'),
('20000018', 'ST2000001', 'SOL8', 'A', 'GCEOL/2015'),
('20000019', 'ST2000001', 'SOL9', 'A', 'GCEOL/2015'),
('200000211', 'ST2000002', 'SOL11', 'A', 'GCEOL/2015'),
('200000214', 'ST2000002', 'SOL14', 'A', 'GCEOL/2015'),
('200000218', 'ST2000002', 'SOL18', 'A', 'GCEOL/2015'),
('20000022', 'ST2000002', 'SOL2', 'A', 'GCEOL/2015'),
('20000024', 'ST2000002', 'SOL4', 'A', 'GCEOL/2015'),
('20000025', 'ST2000002', 'SOL5', 'A', 'GCEOL/2015'),
('20000026', 'ST2000002', 'SOL6', 'B', 'GCEOL/2015'),
('20000027', 'ST2000002', 'SOL7', 'A', 'GCEOL/2015'),
('20000028', 'ST2000002', 'SOL8', 'A', 'GCEOL/2015');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ol_results`
--
ALTER TABLE `ol_results`
  ADD PRIMARY KEY (`markID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
