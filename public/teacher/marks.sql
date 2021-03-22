-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 11:55 AM
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
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `autoID` int(255) NOT NULL,
  `teacherID` varchar(255) NOT NULL,
  `admissionNumber` varchar(255) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `sinhala` varchar(255) NOT NULL,
  `english` varchar(255) NOT NULL,
  `buddhism` varchar(255) NOT NULL,
  `maths` varchar(255) NOT NULL,
  `science` varchar(255) NOT NULL,
  `history` varchar(255) NOT NULL,
  `group01` varchar(255) NOT NULL,
  `group02` varchar(255) NOT NULL,
  `group03` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`autoID`, `teacherID`, `admissionNumber`, `studentName`, `sinhala`, `english`, `buddhism`, `maths`, `science`, `history`, `group01`, `group02`, `group03`) VALUES
(1, 'TC2000001', 'ST2000001', 'Medani Gunathilaka', '99', '34', '99', '98', '99', '44', '67', '80', '34'),
(2, 'TC2000001', 'ST2000002', 'Dilhani Gamhatha', '100', '45', '67', '87', '45', '78', '68', '90', '45'),
(3, 'TC2000001', 'ST2000003', 'Sandali Perera', '34', '56', '45', '76', '78', '55', '69', '45', '56'),
(4, 'TC2000001', 'ST2000004', 'Sherene Dias', '44', '67', '67', '65', '67', '44', '70', '78', '67'),
(5, 'TC2000001', 'ST2000005', 'Randika Perera', '44', '78', '68', '54', '89', '66', '71', '66', '78'),
(6, 'TC2000001', 'ST2000006', 'Manula Gunathilaka', '67', '89', '69', '35', '34', '57', '72', '88', '89'),
(7, 'TC2000001', 'ST2000007', 'Sandeepa Ranathunga', '45', '89', '70', '46', '56', '77', '73', '89', '89'),
(8, 'TC2000001', 'ST2000008', 'Chanaka Prasad', '89', '90', '71', '57', '89', '46', '74', '89', '90'),
(9, 'TC2000001', 'ST2000009', 'Asini Pathmila', '78', '56', '72', '57', '67', '88', '75', '67', '56'),
(10, 'TC2000001', 'ST2000010', 'Uvini de Silva', '90', '65', '45', '88', '45', '87', '76', '93', '65'),
(11, 'TC2000003', 'ST2000011', 'Geethika Perera', '99', '34', '99', '98', '99', '44', '67', '80', '34'),
(12, 'TC2000003', 'ST2000012', 'Poojani Senanayaka', '100', '45', '67', '87', '45', '78', '68', '90', '45'),
(13, 'TC2000003', 'ST2000013', 'Himal Malith', '34', '56', '45', '76', '78', '55', '69', '45', '56'),
(14, 'TC2000003', 'ST2000014', 'Ama Perera', '44', '67', '67', '65', '67', '44', '70', '78', '67'),
(15, 'TC2000003', 'ST2000015', 'Madona Dini', '44', '78', '68', '54', '89', '66', '71', '66', '78'),
(16, 'TC2000003', 'ST2000016', 'Danuji Thasara', '67', '89', '69', '35', '34', '57', '72', '88', '89'),
(17, 'TC2000003', 'ST2000017', 'Kasuni Dias', '45', '89', '70', '46', '56', '77', '73', '89', '89'),
(18, 'TC2000013', 'ST2000018', 'Abises coray', '89', '90', '71', '57', '89', '46', '74', '89', '90'),
(19, 'TC2000013', 'ST2000019', 'Acini Dias', '78', '56', '72', '57', '67', '88', '75', '67', '56'),
(20, 'TC2000013', 'ST2000020', 'Senura Nilipul', '90', '65', '45', '88', '45', '87', '76', '93', '65');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`autoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `autoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
