-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 05:19 PM
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
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `achievementID` varchar(255) NOT NULL,
  `categoryID` varchar(255) NOT NULL,
  `studentID` varchar(255) NOT NULL,
  `achievementDate` date NOT NULL,
  `achievementName` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `value` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`achievementID`, `categoryID`, `studentID`, `achievementDate`, `achievementName`, `position`, `value`, `description`, `date`, `time`) VALUES
('AC2100001', '232', '0001', '0000-00-00', 'dcd', 'dc', 1, 'sdc', '2021-02-04', '06:49:56'),
('AC2100002', '2344', '3455', '0000-00-00', 'fdf', 'fvf', 1, 'fdvd', '2021-02-04', '06:50:19'),
('AC2100003', 'ss', 'xs', '0000-00-00', 'sss', 'patticipation', 1, 'ssssssssssssssssssss', '2021-02-04', '08:10:27'),
('AC2100004', 'b', '  m ,', '2022-06-04', 'nbv', '3', 2, 'v', '2021-02-04', '08:13:12'),
('AC2100005', 'b', '  m ,', '2222-02-02', 'sdfd', '2', 3, 'wdwdw', '2021-02-04', '08:21:16'),
('AC2100006', 'b', 'ssssssssssssssssssssssss', '0000-00-00', 'xxx', '2', 2, 'wwwwwwwwwwww', '2021-02-04', '08:23:01'),
('AC2100007', 'b', 'eff', '0998-02-21', 'xxx', '1', 1, 'sdse', '2021-02-04', '08:28:55'),
('AC2100008', 'b', 'eff', '2222-02-02', 'aaa', '3', 1, 'ewwwe', '2021-02-04', '08:32:35'),
('AC2100009', 'b', '  m ,', '3333-03-03', '33333333333333333333', 'patticipation', 1, 'wdwdw', '2021-02-04', '08:37:03'),
('AC2100010', '123', '123', '2222-02-02', '2wedwd', '3', 3, 'ssssssssssssssss', '2021-02-04', '08:51:49'),
('AC2100011', '123', '123', '2222-02-02', '2wedwd', '3', 3, 'ssssssssssssssss', '2021-02-04', '08:52:56'),
('AC2100012', '1', '1', '2222-02-02', '3', '3', 3, 'ssssssssssssssss', '2021-02-04', '08:55:22'),
('AC2100013', 'w', 'w', '2222-12-02', '2wedwd', '1', 1, 'wdwdw', '2021-02-04', '09:06:28'),
('AC2100014', 'fef', 'efe', '0033-03-31', 'fffffffff', '3', 1, 'ggggg', '2021-02-12', '12:56:12'),
('AC2100015', '111', 'TS', '2021-02-28', 'qqq', '1', 1, 'qqqq', '2021-02-12', '13:04:25'),
('AC2100016', 'aaa', 'aa111', '2021-02-17', 'a', '1', 2, 'a', '2021-02-12', '13:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `addalexam`
--

CREATE TABLE `addalexam` (
  `examID` varchar(20) NOT NULL,
  `examYear` int(6) NOT NULL,
  `examName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addalexam`
--

INSERT INTO `addalexam` (`examID`, `examYear`, `examName`) VALUES
('GCEAL/2016', 2016, 'G.C.E A/L Examination 2016'),
('GCEAL/2017', 2017, 'G.C.E A/L Examination 2017');

-- --------------------------------------------------------

--
-- Table structure for table `addolexam`
--

CREATE TABLE `addolexam` (
  `examID` varchar(11) NOT NULL,
  `examYear` int(4) NOT NULL,
  `examName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addolexam`
--

INSERT INTO `addolexam` (`examID`, `examYear`, `examName`) VALUES
('GCEOL/2015', 2015, 'GCE O/L Examination 2015'),
('GCEOL/2016', 2016, 'GCE O/L Examination 2016');

-- --------------------------------------------------------

--
-- Table structure for table `addscholexam`
--

CREATE TABLE `addscholexam` (
  `examID` varchar(20) NOT NULL,
  `examYear` int(4) NOT NULL,
  `examName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addscholexam`
--

INSERT INTO `addscholexam` (`examID`, `examYear`, `examName`) VALUES
('G5SE/2016', 2016, 'Grade 5 Scholarship Examination 2016'),
('G5SE/2017', 2017, 'Grade 5 Scholarship Examination 2017'),
('G5SE/2019', 2019, 'Grade 5 Scolarship Examination'),
('G5SE/2020', 2020, 'Grade 5 Examination 2020');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userID` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userID`, `email`) VALUES
('AD2000001', 'dgamhatha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category_teacher`
--

CREATE TABLE `category_teacher` (
  `categoryID` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `teacherID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `charactercertificate`
--

CREATE TABLE `charactercertificate` (
  `characterID` varchar(10) NOT NULL,
  `studentID` varchar(10) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `characterCertificate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charactercertificate`
--

INSERT INTO `charactercertificate` (`characterID`, `studentID`, `filename`, `characterCertificate`) VALUES
('', 'ST2000001', 'character-certificate-ST2000001.pdf', '16530');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `gradeID` varchar(10) NOT NULL,
  `classID` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacherIncharge` varchar(255) NOT NULL,
  `teacherID` varchar(10) NOT NULL,
  `medium` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`gradeID`, `classID`, `name`, `teacherIncharge`, `teacherID`, `medium`) VALUES
('2021G1', '2021G1A', 'A', 'Damith Ranaweera', 'TC2000006', 'English'),
('2021G1', '2021G1B', 'B', '', '', 'Sinhala'),
('2021G1', '2021G1C', 'C', '', '', 'Sinhala'),
('2021G1', '2021G1D', 'D', 'Badya Wijayananda', 'TC2000002', 'Sinhala'),
('2021G1', '2021G1E', 'E', '', '', ''),
('2021G1', '2021G1F', 'F', '', '', ''),
('2021G1', '2021G1T', 'T', '', '', 'Tamil'),
('2021G2', '2021G2A', 'A', '', '', 'English'),
('2021G2', '2021G2B', 'B', '', '', 'Sinhala'),
('2021G2', '2021G2C', 'C', '', '', 'Sinhala'),
('2021G2', '2021G2D', 'D', 'Hema Thennakoon', 'TC2000001', 'Sinhala'),
('2021G2', '2021G2E', 'E', '', '', ''),
('2021G2', '2021G2F', 'F', '', '', ''),
('2021G2', '2021G2T', 'T', '', '', 'Tamil'),
('2021G3', '2021G3A', 'A', '', '', 'English'),
('2021G3', '2021G3B', 'B', '', '', 'Sinhala'),
('2021G3', '2021G3C', 'C', '', '', 'Sinhala'),
('2021G3', '2021G3D', 'D', '', '', 'Sinhala'),
('2021G3', '2021G3T', 'T', '', '', 'Tamil'),
('2021G4', '2021G4A', 'A', '', '', 'English'),
('2021G4', '2021G4B', 'B', '', '', 'Sinhala'),
('2021G4', '2021G4C', 'C', '', '', 'Sinhala'),
('2021G4', '2021G4D', 'D', '', '', 'Sinhala'),
('2021G4', '2021G4T', 'T', '', '', 'Tamil'),
('2021G5', '2021G5A', 'A', '', '', 'English'),
('2021G5', '2021G5B', 'B', '', '', 'Sinhala'),
('2021G5', '2021G5T', 'T', '', '', 'Tamil'),
('2021G6', '2021G6A', 'A', '', '', 'English'),
('2021G6', '2021G6B', 'B', '', '', 'Sinhala'),
('2021G6', '2021G6C', 'C', '', '', 'Sinhala'),
('2021G6', '2021G6D', 'D', '', '', 'Sinhala'),
('2021G6', '2021G6E', 'E', '', '', 'Sinhala'),
('2021G6', '2021G6T', 'T', '', '', 'Tamil');

-- --------------------------------------------------------

--
-- Table structure for table `classstudent`
--

CREATE TABLE `classstudent` (
  `gradeID` varchar(10) NOT NULL,
  `classID` varchar(10) NOT NULL,
  `studentID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classstudent`
--

INSERT INTO `classstudent` (`gradeID`, `classID`, `studentID`) VALUES
('2021G2', '2021G1A', 'ST2000001'),
('2021G2', '2021G3B', 'ST2000002'),
('2021G2', '2021G1B', 'ST2000004'),
('2021G2', '2021G2D', 'ST2000005');

-- --------------------------------------------------------

--
-- Table structure for table `csocieties`
--

CREATE TABLE `csocieties` (
  `SocietyID` varchar(255) NOT NULL,
  `SocietyName` varchar(100) NOT NULL,
  `tcrID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csocieties`
--

INSERT INTO `csocieties` (`SocietyID`, `SocietyName`, `tcrID`) VALUES
('S02000001', 'Tamil', 'TC20/00005'),
('S02000002', 'Dancing', 'TR20/00003'),
('S02000003', 'Music', 'TR20/00001');

-- --------------------------------------------------------

--
-- Table structure for table `csports`
--

CREATE TABLE `csports` (
  `SportID` varchar(255) NOT NULL,
  `SportName` varchar(200) NOT NULL,
  `tcrID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csports`
--

INSERT INTO `csports` (`SportID`, `SportName`, `tcrID`) VALUES
('SP2000002', 'Football', 'TC2000001'),
('SP2000001', 'Cricket', 'TC2000004'),
('SP2000003', 'VolleyBall', 'TR20/00005'),
('SP2000004', 'Karathe', 'TR20/00006'),
('SP2000005', 'Badmintion', 'TC20/00001'),
('SP2000006', 'VolleyBall', 'TC2000002');

-- --------------------------------------------------------

--
-- Table structure for table `duty`
--

CREATE TABLE `duty` (
  `dutyID` varchar(255) CHARACTER SET latin1 NOT NULL,
  `duty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duty`
--

INSERT INTO `duty` (`dutyID`, `duty`) VALUES
('d1', 'User Management'),
('d2', 'Exam Result Management'),
('d3', 'Document Management'),
('d4', 'Request Management'),
('d5', 'NewsFeed Management'),
('d6', 'Class Management');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `Year` year(4) NOT NULL,
  `GradeID` varchar(10) NOT NULL,
  `Grade` int(11) NOT NULL,
  `TeacherInCharge` varchar(255) NOT NULL,
  `gradeActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`Year`, `GradeID`, `Grade`, `TeacherInCharge`, `gradeActive`) VALUES
(2021, '2021G1', 1, '', 1),
(2021, '2021G10', 10, '', 0),
(2021, '2021G11', 11, '', 0),
(2021, '2021G12', 12, '', 0),
(2021, '2021G13', 13, '', 0),
(2021, '2021G2', 2, '', 1),
(2021, '2021G3', 3, '', 1),
(2021, '2021G4', 4, '', 1),
(2021, '2021G5', 5, '', 1),
(2021, '2021G6', 6, '', 1),
(2021, '2021G7', 7, '', 0),
(2021, '2021G8', 8, '', 0),
(2021, '2021G9', 9, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiryID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reciever` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiryID`, `title`, `message`, `reciever`, `sender`) VALUES
(23, 'Regarding the Character generation.', 'One of the functionalities of our system is to auto generate the Character certificate of students. We are thinking of using DOMPDF for that. Is it okay to use? \r\nWe were told to not use frameworks in the project. DOMPDF is not considered as a framework right sir?', 'TC20/00001', 'PR20/00001'),
(24, 'Regarding the archietecture.', 'Dear sir, When doing the project we have to follow an architecture. What architecture would be the best to follow? ', 'TC20/00001', 'PR20/00001'),
(25, 'Regarding Presentations.', 'How much time is remaining from your project ?', 'TC20/00003', 'PR20/00003'),
(30, 'Regarding the absence.', 'Dear miss my son was ill.Beacuse of that reason he didn\'t attend lectures.', 'TC20/00001', 'PR20/00001'),
(33, 'Announcement', 'Hello', 'PR20/00001', 'TC20/00001'),
(34, 'Hello', 'mplementing a Read and Write function on Newsfeed', 'TC20/00001', 'PR20/00001'),
(36, 'Heelo', 'HELLO', 'TC20/00001', 'PR20/00001'),
(37, 'EXAMS ON NEXT YEAR', 'EXAMS', 'TC20/00001', 'PR20/00001');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `newsID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `news` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `newsDate` date NOT NULL,
  `newsTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`newsID`, `title`, `news`, `image`, `newsDate`, `newsTime`) VALUES
(48, 'Annual Sportsmeet', 'The annual inter house sports meet of ABC School in Colombo was held at the Sports Ministry Grounds (Torrington) on 11th and 12th October 2014. The meet witnessed the participation of over 300 students in nearly 150 track and field events over two days of intense competition. Former National Cricket Captain MahelaJayawardena was the Chief Guest at the colourful closing ceremony held on Sunday evening. \r\n\r\nThe ceremony commenced with a glittering dance item performed by the students of year 7 and 8. This was followed by a March Past of the senior students which was breathtaking to watch. The Chief Guest highlighted the importance of engaging in sports and the impact it has on developing character and personality. Lionel House became the winning house for the second consecutive year while Dudley House was the runner up.  ', 'sportmeet.jpg', '2020-11-10', '12:37:07'),
(49, 'Awurudu Festival', 'As of yesterday, over 100,000 people have died around the world due to the coronavirus and over 1.7 million people have been infected. In Sri Lanka, seven have died and 197 cases have been reported by Saturday.This is not a time for celebration. In Sri Lanka, the entire island has been under curfew since 20 March. Districts of Colombo, Gampaha and Kalutara - which have been identified as high risk areas - were given an eight-hour break on 24 March. Since then, Kandy and Jaffna Districts have been added to the high risk area list. And, last week, the authorities identified the Ratnapura and Pelmadulla areas as high risk as well. Authorities are working hard to control the situation, but the curfew will remain in place, at least for the time being. Until this year, nothing prevented Avurudu celebrations and festivities from going ahead - floods, droughts, other pandemics, disasters, tsunami, a 30-year war, and the list goes on.\r\n\r\n But, now we are faced with an ultimatum - as cliche as it may sound, it is a matter of life and death. This year, let us do our duty by staying at home, so that those who are trying to safeguard the country and its people, can do theirs. Celebrations can wait until after we overcome this pandemic.', 'awurudu.jpg', '2020-11-10', '12:41:33'),
(50, 'School Board Meeting', 'For public health and safety, the public is not encouraged to attend the Petersburg City School Board regular meeting scheduled to begin at 6:00 pm on Nov 18, 2020, at Petersburg High School.\r\n\r\nOnly a limited number of staff will be in attendance. The public will be allowed in the room using social distancing requirements as directed by the Governor of Virginia and the Centers for Disease Control, subject to available space. The meeting will be live-streamed via a Zoom Board meeting.\r\n\r\nThe directions to join the webinar online are listed below.\r\n\r\n\r\nWhen: November 18, 2020, 06:00 PM Eastern Time \r\n\r\nTopic: Petersburg City Public Schools -  SCHOOL BOARD - WORK SESSION\r\n  ', 'building.jpg', '2020-11-10', '12:45:54'),
(51, 'Important announcement for student and teachers.', 'Following the recommendations of the Minister of Higher Education, Research and Innovation, we are asking every student, teacher and employee who has recently returned from China, Hong Kong, Macao, Singapore, South Korea and Northern Italy (mainly the regions of Lombardy and Veneto), to stay off campus during the 14 days following their return. The IGS Group will provide remote educational tools. If you find yourself in this situation, please contact your educational referent.\r\n\r\nIn order to manage possible contamination risks as best as possible, please abide by the following recommendations: cough into your sleeve, use single-use tissues and, above all, wash your hands regularly.\r\n\r\nIn case you show signs of a respiratory infection (fever, or feel feverish, cough, respiratory difficulties), please immediately dial 15.\r\n\r\nThese preventative measures, as well as everyone’s accountability, will make it possible to traverse this difficult time under the most favorable conditions.\r\n\r\nWe are counting on your kindly cooperation. ', 'Coronavirus_occident.jpg', '2020-11-10', '12:48:58'),
(56, 'Sustainable Development Goals', 'The Sustainable Development Goals or Global Goals are a collection of 17 interlinked global goals designed to be a \"blueprint to achieve a better and more sustainable future for all\". The SDGs were set in 2015 by the United Nations General Assembly and are intended to be achieved by the year 2030', 'E SDG Poster 2019_without UN emblem_PRINT.jpg', '2020-12-03', '07:05:07'),
(57, 'COVID 19', 'he IGS Group will provide remote educational tools. If you find yourself in this situation, Research and Innovation, we are asking every student, teacher and employee who has recently returned from China, Hong Kong, Macao, Singapore, South Korea and Northern Italy (mainly the regions of Lombardy and Veneto), to stay off campus during the 14 days following their return. The IGS Group will provide remote educational tools. If you find yourself in this situation, please contact your educational referent. In order to manage possible contamination risks as best as possible, please abide by the following recommendations: ', 'GOAL_4_TARGET_4.5.jpg', '2020-12-03', '07:53:32'),
(58, 'EXAMS', 'Research and Innovation, we are asking every student, teacher and employee who has recently returned from China, Hong Kong, Macao, Singapore, South Korea and Northern Italy (mainly the regions of Lombardy and Veneto), to stay off campus during the 14 days following their return. The IGS Group will provide remote educational tools. If you find yourself in this situation, please contact your educational referent. In order to manage possible contamination risks as best as possible, please abide by the following recommendations:', 'images.png', '2020-12-03', '08:49:46'),
(59, 'clc', 'clclclclclclclclclclclclclclc', 'Screenshot (964).png', '2021-03-17', '09:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `officerID` varchar(10) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`officerID`, `fName`, `lName`, `nic`, `contactNo`, `address`, `email`, `gender`, `dob`) VALUES
('OF2000001', 'Dilhani', 'Gamhatha', '996601747123', '076-1230987', 'No.1,Negombo road,Panadura', 'dgamhatha@gmail.com', 'female', '1999-01-08'),
('OF2000002', 'Sandeepa', 'Ranathunga', '976601744V', '1234567890', 'Galle road,Pilana', 'dgamhatha@gmail.com', 'male', '1997-01-02'),
('OF2000003', 'Renuka ', 'Damayanthi', '656601722V', '076-7553401', 'Paragammana,Kegalle', 'hansikamedani@gmail.com', 'female', '1965-02-03'),
('OF2000004', 'Widanapathirana', 'Gunathilaka', '656601744V', '071-8152927', 'Waldeniya road,Akuressa', 'hansikamedani@gmail.com', 'male', '1965-03-01'),
('OF2000005', 'Rocheal', 'Fernando', '896604744V', '078-6783401', 'Kandy road,Galigamuwa', 'hansikamedani@gmail.com', 'female', '1989-02-05'),
('OF2000006', 'Medani', 'Gunathilaka', '966601744V', '077-7553401', 'H 212,Paragammana,Kegalle', 'hansikamedani@gmail.com', 'female', '1996-08-06'),
('OF2000007', 'Chanaka ', 'Prasad', '966606544V', '070-1230100', 'Jayasooriya Waththa,Walasmulla,Matara', 'hansikamedani@gmail.com', 'male', '1996-02-05'),
('OF2000008', 'Asini ', 'Silva', '606000944V', '091-1234098', 'Maha Ambalangoda,Galle', 'hansikamedani@gmail.com', 'female', '1960-05-02'),
('OF2000009', 'Dilhani', 'Gamhatha', '123456789V', '0778596485', '54,Kandy road, Colombo', 'dgamhatha@gmail.com', 'female', '1999-01-03'),
('OF2000010', 'Dilhani', 'Gamhatha', '524365589V', '0779854632', '43, temple road, Kandy', 'dgamhatha@gmail.com', 'female', '2006-04-16'),
('OF2000011', 'Dilhani', 'Gamhatha', '123458796V', '0778458855', 'Kandy', 'dgamhatha@gmail.com', 'female', '2004-01-30'),
('OF2000012', 'Dilhani', 'Gamhatha', '245827563V', '0779854652', '32,Temple road, Panadura', 'dgamhatha@gmail.com', 'female', '2003-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `officerduties`
--

CREATE TABLE `officerduties` (
  `dutyID` varchar(255) CHARACTER SET latin1 NOT NULL,
  `officerID` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officerduties`
--

INSERT INTO `officerduties` (`dutyID`, `officerID`) VALUES
('d1', 'OF2000001'),
('d1', 'OF2000003'),
('d1', 'OF2000005'),
('d1', 'OF2000006'),
('d1', 'OF2000008'),
('d1', 'OF2000009'),
('d1', 'OF2000010'),
('d1', 'OF2000011'),
('d1', 'OF2000012'),
('d2', 'OF2000001'),
('d2', 'OF2000004'),
('d2', 'OF2000006'),
('d2', 'OF2000007'),
('d2', 'OF2000008'),
('d2', 'OF2000010'),
('d2', 'OF2000011'),
('d2', 'OF2000012'),
('d3', 'OF2000001'),
('d3', 'OF2000002'),
('d3', 'OF2000005'),
('d3', 'OF2000006'),
('d3', 'OF2000007'),
('d3', 'OF2000009'),
('d3', 'OF2000012'),
('d4', 'OF2000001'),
('d4', 'OF2000004'),
('d4', 'OF2000006'),
('d4', 'OF2000007'),
('d5', 'OF2000001'),
('d5', 'OF2000003'),
('d5', 'OF2000005'),
('d5', 'OF2000006'),
('d5', 'OF2000007'),
('d6', 'OF2000001'),
('d6', 'OF2000003'),
('d6', 'OF2000004'),
('d6', 'OF2000005'),
('d6', 'OF2000006'),
('d6', 'OF2000008');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentID` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `contactNo` varchar(10) NOT NULL,
  `admissionNo` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentID`, `name`, `nic`, `occupation`, `contactNo`, `admissionNo`, `email`) VALUES
('PR2000001', 'Kamani Gunathilaka', '656216098V', 'Teacher', '071-815322', 'ST2000001', 'dgamhatha@gmail.com'),
('PR2000002', 'Nirmala Silva', '142586825V', 'Doctor', '0775846852', 'ST2000002', 'dgamhatha@gmail.com'),
('PR2000003', 'Nimala Perera', '123456789456', 'aa', '0778596455', 'ST2000003', 'dga@rss.com'),
('PR2000004', 'Kamala Perera', '85468592V', 'Dcotor', '1234567898', 'ST2000004', 'ss@ss.com'),
('PR2000005', 'Kamala Perera', '587458652V', 'Banker', '0778458566', 'ST2000005', 'dgamhatha@gmail.com'),
('PR2000006', 'Kamala Perera', '124587588V', 'Doctor', '0779854652', 'ST2000006', 'dgamhatha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestID` int(255) NOT NULL,
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `request` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `requestDate` date NOT NULL,
  `requestTime` time NOT NULL,
  `RequestStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `id`, `name`, `request`, `image`, `requestDate`, `requestTime`, `RequestStatus`) VALUES
(10, 'TC2000001', 'Medani Gunathilaka', 'a', 'building.jpg', '2021-01-14', '13:03:34', '0'),
(11, 'TC2000001', '2222', 'fgfg', 'education.png', '2021-01-30', '06:11:36', '1'),
(12, 'TC2000001', 'dfd', 'dfdfd', 'barak.jpg', '2021-02-02', '17:06:48', '1'),
(13, 'ST2000001', 'aaaa', 'aaaaa', 'student_photo.jpg', '2021-03-17', '08:48:36', '1'),
(15, 'ST2000001', 'www', 'wwww', 'student_photo.jpg', '2021-03-17', '08:54:58', '0'),
(16, 'ST2000001', 'tttt', 'tttttttt', 'student_photo.jpg', '2021-03-17', '08:55:24', '0'),
(17, 'ST2000001', 'rrrr', 'rrrrrrrrr', 'student_photo.jpg', '2021-03-17', '08:57:11', '0'),
(18, 'ST2000001', 'xsxxs', 'rrrrrrrrra', 'student_photo.jpg', '2021-03-17', '08:58:07', '0'),
(23, 'ST2000001', 'rrrrrrrrrrrr', 'rrrrrrrrrr', 'FIREEQ (1).png', '2021-03-17', '09:05:35', '0'),
(24, 'PR2000001', 'wwwwwwwwwmmmmmmmmmmmmsssssssssssssssssssssssssssssssssss', 'wwwwwwwwww', 'Anuka.jpg', '2021-03-17', '13:35:31', '0'),
(25, 'PR2000001', 'frfrr', 'frfrfrfr', 'ButterCream.lk.jpeg', '2021-03-17', '13:37:20', '0'),
(26, 'PR2000001', 'ooooooooooo', 'oooooooooooo', 'change.png', '2021-03-17', '13:42:17', '0'),
(27, 'ST2000001', 'gggggggg', 'gggggggggggg', 'WhatsApp Image 2020-11-22 at 2.06.46 PM.jpeg', '2021-03-17', '13:59:38', '1'),
(28, 'ST2000001', 'lllll', 'llll', 'WhatsApp Image 2020-12-28 at 3.13.40 PM.jpeg', '2021-03-17', '14:04:16', '1');

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
('ST2000001', 'Hansika', 'Medani', 'Gunathilaka', '2000-02-01', 'Udadeniya', 'Kegalle', 'Kegalle', 'Buddhism', '2020-12-02', '1', 'dgamhatha@gmail.com', '071-231212', 'Female', '200123212345', ''),
('ST2000002', 'Ann', 'Kaushalya', 'Silva', '2001-11-30', '54, Temple road', 'Gampola', 'Kandy', 'Buddhist', '2020-12-03', '5', 'dgamhatha@gmail.com', '0779854652', 'Female', '', ''),
('ST2000003', 'Dilhani', 'Sachini', 'Gamhatha', '1996-11-12', '34,Temple Road', 'Gampola', 'Kalutara', 'Buddhist', '2020-12-03', '2', 'dgamhatha@gmail.com', '0775846852', 'Female', '', 0x73747564656e745f70686f746f2e6a7067),
('ST2000004', 'Sandali', 'Sachini', 'Perera', '2008-11-30', 'Temple road,', 'Kandy', 'Kandy', 'Buddhist', '2020-12-03', '5', 'dgamhatha@gmail.com', '0778458566', 'Female', '', 0x73747564656e745f70686f746f2e6a7067),
('ST2000005', 'Dilhani', 'Ann', 'Gamhatha', '1999-12-30', '34, road', 'Kandy', 'Matale', 'Buddhist', '2020-12-03', '5', 'dgamhatha@gmail.com', '0778965412', 'Female', '', 0x73747564656e745f70686f746f2e6a7067),
('ST2000006', 'Ann', 'Sachini', 'Perera', '2009-10-27', '23, Road', 'Kandy', 'Kandy', 'Buddhist', '2020-12-03', '5', 'dgamhatha@gmail.com', '0779854625', 'Female', '', 0x73747564656e745f70686f746f2e6a7067),
('ST2000007', 'Dilhani', 'Ann', 'Gamhatha', '2020-07-10', '43, Temple road', 'Kandy', 'Kandy', 'Buddhist', '2020-12-03', '5', 'dgamhatha@gmail.com', '0779854685', 'Female', '124569856325', 0x73747564656e745f70686f746f2e6a7067),
('ST2000008', 'a', 'a', 'a', '2011-10-11', 'a', 'a', 'Jaffna', 'Christian', '2021-02-11', '1', 'sss@sss.com', '1234567898', 'Male', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` varchar(10) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactNo` varchar(10) NOT NULL,
  `catID` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `teacherType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `fName`, `lName`, `nic`, `address`, `contactNo`, `catID`, `email`, `dob`, `gender`, `teacherType`) VALUES
('TC2000001', 'Hema', 'Thennakoon', '676160833V', '', '076-125498', NULL, 'dgamhatha@gmail.com', '1967-05-08', 'female', 'classTcr'),
('TC2000002', 'Badya', 'Wijayananda', '706601744V', '', '071-123456', NULL, 'dgamhatha@gmail.com', '1970-03-03', 'female', 'TcrinCharge'),
('TC2000003', 'Kamal', 'Randeni', '777891744V', '', '076-123444', NULL, 'dgamhatha@gmail.com', '1977-06-03', 'male', 'both'),
('TC2000004', 'Poojni', 'Senanayaka', '906601555V', '', '078-456789', NULL, 'hansikamedani@gmail.com', '1990-03-05', 'female', 'classTcr'),
('TC2000005', 'Sandya', 'Perera', '788601744V', '', '035-222102', NULL, 'hansikamedani@gmail.com', '1978-03-03', 'female', 'TcrinCharge'),
('TC2000006', 'Damith', 'Ranaweera', '933344457V', '', '070-121209', NULL, 'hansikamedani@gmail.com', '1993-04-05', 'male', 'both'),
('TC2000007', 'Kalana', 'Silva', '987801744V', '', '076-980340', NULL, 'hansikamedani@gmail.com', '1998-04-06', 'male', 'classTcr'),
('TC2000008', 'Nilmini', 'Buddhasiri', '766601744V', '', '011-123098', NULL, 'hansikamedani@gmail.com', '1976-09-04', 'female', 'TcrinCharge'),
('TC2000009', 'ROLLING', 'DD', '123456789123', '11', '1234567898', NULL, 'dga@as.com', '1995-07-27', 'female', 'classTcr');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('OF20/00005', '537ad9de502e3b2a0287750e44d6937a', 'OF2000005', 'officer', 0),
('OF20/00006', '537ad9de502e3b2a0287750e44d6937a', 'OF2000006', 'officer', 1),
('OF20/00007', '537ad9de502e3b2a0287750e44d6937a', 'OF2000007', 'officer', 1),
('OF20/00008', '537ad9de502e3b2a0287750e44d6937a', 'OF2000008', 'officer', 1),
('OF20/00009', 'f3ffca74054b044286d7a71351b97ee6', 'OF2000009', 'officer', 1),
('OF20/00010', '9bef9f2dc3f0cc08cf851dc62f0ea723', 'OF2000010', 'officer', 1),
('OF20/00011', 'cd090023262241a5ce678682a2e3e240', 'OF2000011', 'officer', 1),
('OF20/00012', 'efb5df8aa64786b4a9039f9d9f31a7ea', 'OF2000012', 'officer', 1),
('PR20/00001', '537ad9de502e3b2a0287750e44d6937a', 'PR2000001', 'parent', 1),
('PR20/00002', 'c04b69b95ba697a0c058e0f49114629b', 'PR2000002', 'parent', 1),
('PR20/00003', 'f168033a1641184234ba2db024ecb03a', 'PR2000003', 'parent', 1),
('PR20/00004', '50e9bd68b799d82f098d5f31097b9450', 'PR2000004', 'parent', 1),
('PR20/00005', '51e2a38e4e9e26217b42fe9d9bf8f59e', 'PR2000005', 'parent', 1),
('PR20/00006', '789e789f27fb3ae1ac0972f53aa5d691', 'PR2000006', 'parent', 1),
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
('PR20/00017', '99ab3935541102d442ccb29bccafb4e5', 'PR2000017', 'parent', 0),
('PR20/00018', 'bfa15c05ddd9f651ad670764feb22835', 'PR2000018', 'parent', 0),
('PR20/00019', 'd3ef2a1f811ff4f4a326b866f71cd70b', 'PR2000019', 'parent', 0),
('ST20/00001', '537ad9de502e3b2a0287750e44d6937a', 'ST2000001', 'student', 1),
('ST20/00002', 'd368562b947e61464c7e6220e46a3388', 'ST2000002', 'student', 1),
('ST20/00003', 'b1ae5a341745e81736bd320b3a953b00', 'ST2000003', 'student', 1),
('ST20/00004', 'f00d14ebce6b3534155f263674318719', 'ST2000004', 'student', 1),
('ST20/00005', 'ad6c566e26c879bdb51161bac0692f53', 'ST2000005', 'student', 1),
('ST20/00006', '44159707603a30b42f450fb8c741ebd6', 'ST2000006', 'student', 1),
('ST20/00007', '11e66ddb98c51fe2633dfd9aee312718', 'ST2000007', 'student', 1),
('ST20/00008', '82749c4378034dccc1994419200772eb', 'ST2000008', 'student', 1),
('ST20/00009', 'a719844afa7303032ec9b7bfd0e4a704', 'ST2000009', 'student', 0),
('ST20/00010', 'ecaf88fb06ff6ca4d596b297b9d8dbd3', 'ST2000010', 'student', 0),
('ST20/00011', 'fec3079e7b1eeafa4b449a8153c92355', 'ST2000011', 'student', 0),
('ST20/00012', '296680add6e98087362d55986323831b', 'ST2000012', 'student', 0),
('ST20/00013', 'bf93e165b8e154bde5bea6f569bcaa02', 'ST2000013', 'student', 0),
('ST20/00014', '764ccf545a9aba4bc40321db52d0d632', 'ST2000014', 'student', 0),
('ST20/00015', '862873837cd1ac800b23749825b1b095', 'ST2000015', 'student', 0),
('ST20/00016', '2f9c4cdc064d03f22ebf12802acc3199', 'ST2000016', 'student', 0),
('ST20/00017', '62a570184bc3d10854e5f7bc81b963aa', 'ST2000017', 'student', 0),
('ST20/00018', '86c2e3670463cdf121102a2ccfcc5804', 'ST2000018', 'student', 0),
('ST20/00019', '59e6c33b739fbad93d5f6cb02f308393', 'ST2000019', 'student', 0),
('TC20/00001', '537ad9de502e3b2a0287750e44d6937a', 'TC2000001', 'teacher', 1),
('TC20/00002', '537ad9de502e3b2a0287750e44d6937a', 'TC2000002', 'teacher', 1),
('TC20/00003', '537ad9de502e3b2a0287750e44d6937a', 'TC2000003', 'teacher', 1),
('TC20/00004', '537ad9de502e3b2a0287750e44d6937a', 'TC2000004', 'teacher', 1),
('TC20/00005', '537ad9de502e3b2a0287750e44d6937a', 'TC2000005', 'teacher', 1),
('TC20/00006', '537ad9de502e3b2a0287750e44d6937a', 'TC2000006', 'teacher', 1),
('TC20/00007', '537ad9de502e3b2a0287750e44d6937a', 'TC2000007', 'teacher', 1),
('TC20/00008', '537ad9de502e3b2a0287750e44d6937a', 'TC2000008', 'teacher', 1),
('TC20/00009', 'd027bd500336e29c9c1df0caeb3137ff', 'TC2000009', 'teacher', 1),
('TC20/00010', '61a9bbcec8240d911e6de7650e6e5708', 'TC2000010', 'teacher', 0),
('TC20/00011', '519bedc2732b2bd05f059ae1f6526d91', 'TC2000011', 'teacher', 0),
('TC20/00012', 'fc8216fa54a03ea81c4896c2039c24c0', 'TC2000012', 'teacher', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`achievementID`);

--
-- Indexes for table `addalexam`
--
ALTER TABLE `addalexam`
  ADD PRIMARY KEY (`examID`);

--
-- Indexes for table `addolexam`
--
ALTER TABLE `addolexam`
  ADD PRIMARY KEY (`examID`);

--
-- Indexes for table `addscholexam`
--
ALTER TABLE `addscholexam`
  ADD PRIMARY KEY (`examID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `charactercertificate`
--
ALTER TABLE `charactercertificate`
  ADD PRIMARY KEY (`characterID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `gradeID` (`gradeID`);

--
-- Indexes for table `classstudent`
--
ALTER TABLE `classstudent`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `csocieties`
--
ALTER TABLE `csocieties`
  ADD PRIMARY KEY (`SocietyID`);

--
-- Indexes for table `csports`
--
ALTER TABLE `csports`
  ADD PRIMARY KEY (`SportID`);

--
-- Indexes for table `duty`
--
ALTER TABLE `duty`
  ADD PRIMARY KEY (`dutyID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`GradeID`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiryID`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
  ADD PRIMARY KEY (`newsID`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`officerID`);

--
-- Indexes for table `officerduties`
--
ALTER TABLE `officerduties`
  ADD PRIMARY KEY (`dutyID`,`officerID`),
  ADD KEY `officerID` (`officerID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`admissionNo`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`gradeID`) REFERENCES `grades` (`GradeID`);

--
-- Constraints for table `office`
--
ALTER TABLE `office`
  ADD CONSTRAINT `office_ibfk_1` FOREIGN KEY (`officerID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `officerduties`
--
ALTER TABLE `officerduties`
  ADD CONSTRAINT `officerduties_ibfk_1` FOREIGN KEY (`officerID`) REFERENCES `office` (`officerID`),
  ADD CONSTRAINT `officerduties_ibfk_2` FOREIGN KEY (`dutyID`) REFERENCES `duty` (`dutyID`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`parentID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`admissionNo`) REFERENCES `user` (`userID`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
