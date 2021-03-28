-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 12:41 PM
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
-- Table structure for table `ol_subjects`
--

CREATE TABLE `ol_subjects` (
  `SubjectID` varchar(20) NOT NULL,
  `SubName` text NOT NULL,
  `CatName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ol_subjects`
--

INSERT INTO `ol_subjects` (`SubjectID`, `SubName`, `CatName`) VALUES
('SOL1', 'Buddhism', 'Main'),
('SOL10', 'Second Language (Sinhala)', 'Cat1'),
('SOL11', 'Second Language (Tamil)', 'Cat1'),
('SOL12', 'French', 'Cat1'),
('SOL13', 'Oriental Music', 'Cat2'),
('SOL14', 'Western Music', 'Cat2'),
('SOL15', 'Art', 'Cat2'),
('SOL16', 'Oriental Dancing', 'Cat2'),
('SOL17', 'Information & Communication Technology', 'Cat3'),
('SOL18', 'Health & Physical Education', 'Cat3'),
('SOL19', 'Communication & Media Studies', 'Cat3'),
('SOL2', 'Catholicism', 'Main'),
('SOL3', 'Islam', 'Main'),
('SOL4', 'Sinhala Language and Literature', 'Main'),
('SOL5', 'History', 'Main'),
('SOL6', 'Science', 'Main'),
('SOL7', 'Mathematics', 'Main'),
('SOL8', 'English', 'Main'),
('SOL9', 'Business & Accounting Studies', 'Cat1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ol_subjects`
--
ALTER TABLE `ol_subjects`
  ADD PRIMARY KEY (`SubjectID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
