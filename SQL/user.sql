-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 06:07 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userID` varchar(15) NOT NULL,
  `userType` varchar(255) NOT NULL,
  `isActivated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `userID`, `userType`, `isActivated`) VALUES
('AD20/00001', '259b042404c3e243cd2fae4b40037f96', 'AD2000001', 'admin', 1),
('AD20/00002', '7c896b34ffe83d0400932e4d3fdf2a08', 'AD2000002', 'admin', 1),
('OF20/00001', '537ad9de502e3b2a0287750e44d6937a', 'OF2000001', 'officer', 1),
('OF20/00002', '537ad9de502e3b2a0287750e44d6937a', 'OF2000002', 'officer', 1),
('OF20/00003', '537ad9de502e3b2a0287750e44d6937a', 'OF2000003', 'officer', 1),
('OF20/00004', '537ad9de502e3b2a0287750e44d6937a', 'OF2000004', 'officer', 1),
('OF20/00005', '537ad9de502e3b2a0287750e44d6937a', 'OF2000005', 'officer', 1),
('OF20/00006', '537ad9de502e3b2a0287750e44d6937a', 'OF2000006', 'officer', 1),
('OF20/00007', '537ad9de502e3b2a0287750e44d6937a', 'OF2000007', 'officer', 1),
('OF20/00008', '537ad9de502e3b2a0287750e44d6937a', 'OF2000008', 'officer', 1),
('OF20/00009', 'f3ffca74054b044286d7a71351b97ee6', 'OF2000009', 'officer', 1),
('OF20/00010', '9bef9f2dc3f0cc08cf851dc62f0ea723', 'OF2000010', 'officer', 1),
('OF20/00011', 'cd090023262241a5ce678682a2e3e240', 'OF2000011', 'officer', 1),
('OF20/00012', 'efb5df8aa64786b4a9039f9d9f31a7ea', 'OF2000012', 'officer', 2),
('OF21/00001', 'b59828eb0cabe45c93cfc52c080a8921', 'OF2100001', 'officer', 2),
('OF21/00002', 'b73eec803b207ab5ed9c5fb5a2ad7a64', 'OF2100002', 'officer', 0),
('PR20/00001', '537ad9de502e3b2a0287750e44d6937a', 'PR2000001', 'parent', 1),
('PR20/00002', 'c04b69b95ba697a0c058e0f49114629b', 'PR2000002', 'parent', 1),
('PR20/00003', 'f168033a1641184234ba2db024ecb03a', 'PR2000003', 'parent', 1),
('PR20/00004', '50e9bd68b799d82f098d5f31097b9450', 'PR2000004', 'parent', 1),
('PR20/00005', '51e2a38e4e9e26217b42fe9d9bf8f59e', 'PR2000005', 'parent', 2),
('PR20/00006', '789e789f27fb3ae1ac0972f53aa5d691', 'PR2000006', 'parent', 2),
('PR20/00007', '70c7d969e4159f2c003592f6ade30fc5', 'PR2000007', 'parent', 0),
('PR20/00008', '6192e1192f216df479f9a7937aef4f89', 'PR2000008', 'parent', 0),
('PR20/00009', '8a6b22e8a5d2ccdef208ddc897c7ae8d', 'PR2000009', 'parent', 0),
('PR20/00010', '8f145d50163d719d81018e0d901cbe13', 'PR2000010', 'parent', 0),
('PR20/00011', 'c4d3992b9b7bc38a44542d78f75f2d2f', 'PR2000011', 'parent', 0),
('PR20/00012', '057cc2e18e23236854d18cf8f12e973c', 'PR2000012', 'parent', 0),
('PR20/00013', 'ed6d4f56150f811a87de6f6cdbd2cdbf', 'PR2000013', 'parent', 0),
('PR20/00014', '975c2649f24656fb47f1d72207083ae9', 'PR2000014', 'parent', 0),
('PR20/00015', '0930597a90354c46d02045a3c0367743', 'PR2000015', 'parent', 0),
('PR20/00016', '99c0393c29375d68750813608477a3b3', 'PR2000016', 'parent', 0),
('PR20/00017', '99ab3935541102d442ccb29bccafb4e5', 'PR2000017', 'parent', 1),
('PR20/00018', 'bfa15c05ddd9f651ad670764feb22835', 'PR2000018', 'parent', 0),
('PR20/00019', 'd3ef2a1f811ff4f4a326b866f71cd70b', 'PR2000019', 'parent', 0),
('ST20/00001', '537ad9de502e3b2a0287750e44d6937a', 'ST2000001', 'student', 1),
('ST20/00002', 'd368562b947e61464c7e6220e46a3388', 'ST2000002', 'student', 1),
('ST20/00003', 'b1ae5a341745e81736bd320b3a953b00', 'ST2000003', 'student', 1),
('ST20/00004', 'f00d14ebce6b3534155f263674318719', 'ST2000004', 'student', 1),
('ST20/00005', 'ad6c566e26c879bdb51161bac0692f53', 'ST2000005', 'student', 2),
('ST20/00006', '44159707603a30b42f450fb8c741ebd6', 'ST2000006', 'student', 0),
('ST20/00007', '11e66ddb98c51fe2633dfd9aee312718', 'ST2000007', 'student', 0),
('ST20/00008', '82749c4378034dccc1994419200772eb', 'ST2000008', 'student', 0),
('ST20/00009', 'a719844afa7303032ec9b7bfd0e4a704', 'ST2000009', 'student', 0),
('ST20/00010', 'ecaf88fb06ff6ca4d596b297b9d8dbd3', 'ST2000010', 'student', 0),
('ST20/00011', 'fec3079e7b1eeafa4b449a8153c92355', 'ST2000011', 'student', 0),
('ST20/00012', '296680add6e98087362d55986323831b', 'ST2000012', 'student', 0),
('ST20/00013', 'bf93e165b8e154bde5bea6f569bcaa02', 'ST2000013', 'student', 0),
('ST20/00014', '764ccf545a9aba4bc40321db52d0d632', 'ST2000014', 'student', 0),
('ST20/00015', '862873837cd1ac800b23749825b1b095', 'ST2000015', 'student', 0),
('ST20/00016', '2f9c4cdc064d03f22ebf12802acc3199', 'ST2000016', 'student', 0),
('ST20/00017', '62a570184bc3d10854e5f7bc81b963aa', 'ST2000017', 'student', 1),
('ST20/00018', '86c2e3670463cdf121102a2ccfcc5804', 'ST2000018', 'student', 0),
('ST20/00019', '59e6c33b739fbad93d5f6cb02f308393', 'ST2000019', 'student', 0),
('TC20/00001', '537ad9de502e3b2a0287750e44d6937a', 'TC2000001', 'teacher', 1),
('TC20/00002', '537ad9de502e3b2a0287750e44d6937a', 'TC2000002', 'teacher', 1),
('TC20/00003', '537ad9de502e3b2a0287750e44d6937a', 'TC2000003', 'teacher', 1),
('TC20/00004', '537ad9de502e3b2a0287750e44d6937a', 'TC2000004', 'teacher', 1),
('TC20/00005', '537ad9de502e3b2a0287750e44d6937a', 'TC2000005', 'teacher', 1),
('TC20/00006', '537ad9de502e3b2a0287750e44d6937a', 'TC2000006', 'teacher', 1),
('TC20/00007', '537ad9de502e3b2a0287750e44d6937a', 'TC2000007', 'teacher', 1),
('TC20/00008', '537ad9de502e3b2a0287750e44d6937a', 'TC2000008', 'teacher', 2),
('TC20/00009', 'd027bd500336e29c9c1df0caeb3137ff', 'TC2000009', 'teacher', 2),
('TC20/00010', '61a9bbcec8240d911e6de7650e6e5708', 'TC2000010', 'teacher', 2),
('TC20/00011', '519bedc2732b2bd05f059ae1f6526d91', 'TC2000011', 'teacher', 0),
('TC20/00012', 'fc8216fa54a03ea81c4896c2039c24c0', 'TC2000012', 'teacher', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
