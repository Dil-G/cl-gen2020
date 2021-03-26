-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 06:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `admissionNo` varchar(10) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `mName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `adStreet` varchar(255) NOT NULL,
  `adCity` varchar(255) NOT NULL,
  `adDistrict` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `enteredDate` date NOT NULL,
  `enteredGrade` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `contactNo` varchar(10) NOT NULL,
  `gender` text NOT NULL,
  `stuNic` varchar(20) NOT NULL,
  `stuPhoto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`admissionNo`, `fName`, `mName`, `lName`, `dob`, `adStreet`, `adCity`, `adDistrict`, `religion`, `enteredDate`, `enteredGrade`, `email`, `contactNo`, `gender`, `stuNic`, `stuPhoto`) VALUES
('ST2000001', 'Hansika', 'Medani', 'Gunathilaka', '2003-06-02', 'Udadeniya', 'Kegalle', 'Kegalle', 'Buddhism', '2020-12-02', '2', 'dgamhatha@gmail.com', '0112365588', 'Female', '123456789789', ''),
('ST2000002', 'Ann', 'Kaushalya', 'Silva', '2001-11-30', '54, Temple road', 'Gampola', 'Kandy', 'Buddhist', '2020-12-03', '5', 'dgamhatha@gmail.com', '0779854652', 'Female', '', ''),
('ST2000003', 'Dilhani', 'Sachini', 'Gamhatha', '1996-11-12', '34,Temple Road', 'Gampola', 'Kalutara', 'Buddhist', '2020-12-03', '2', 'dgamhatha@gmail.com', '0775846852', 'Female', '', 0x73747564656e745f70686f746f2e6a7067),
('ST2000004', 'Sandali', 'Sachini', 'Perera', '2008-11-30', 'Temple road,', 'Kandy', 'Kandy', 'Buddhist', '2020-12-03', '5', 'dgamhatha@gmail.com', '0778458566', 'Female', '', 0x73747564656e745f70686f746f2e6a7067),
('ST2000005', 'Dilhani', 'Ann', 'Gamhatha', '1999-12-30', '34, road', 'Kandy', 'Matale', 'Buddhist', '2020-12-03', '5', 'dgamhatha@gmail.com', '0778965412', 'Female', '', 0x73747564656e745f70686f746f2e6a7067),
('ST2000017', 'qw', 'qw', 'qw', '2011-07-22', 'qw', 'qw', 'Monaragala', 'Islam', '2021-03-22', '1', 'qw@aa.cp', '1234567898', 'Male', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`admissionNo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`admissionNo`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
