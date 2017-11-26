-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 07:30 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `COURSE_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`COURSE_ID`) VALUES
('BUSA 150'),
('BUSA 307'),
('BUSA 499'),
('COMP 202'),
('COMP 303'),
('FINE 151');

-- --------------------------------------------------------

--
-- Table structure for table `engagements`
--

CREATE TABLE `engagements` (
  `ENGAGEMENT_ID` int(11) NOT NULL,
  `ENGAGEMENT_STUDENT` int(11) DEFAULT NULL,
  `ENGAGEMENT_TUTOR` int(11) DEFAULT NULL,
  `ENGAGEMENT_DATETIME` datetime DEFAULT NULL,
  `ENGAGEMENT_DURATION` int(11) DEFAULT NULL,
  `ENGAGEMENT_LOCATION` varchar(255) DEFAULT NULL,
  `ENGAGEMENT_FEE` int(11) DEFAULT NULL,
  `ENGAGEMENT_COURSEID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `STUDENT_ID` int(11) NOT NULL,
  `STUDENT_NAME` varchar(255) DEFAULT NULL,
  `STUDENT_PASSWORD` varchar(255) DEFAULT NULL,
  `STUDENT_EMAIL` varchar(255) DEFAULT NULL,
  `STUDENT_YEAROFSTUDY` enum('U0','U1','U2','U3','U3+') DEFAULT NULL,
  `STUDENT_PHONE` varchar(255) DEFAULT NULL,
  `STUDENT_COURSE1` varchar(255) DEFAULT NULL,
  `STUDENT_COURSE2` varchar(255) DEFAULT NULL,
  `STUDENT_COURSE3` varchar(255) DEFAULT NULL,
  `STUDENT_COURSE4` varchar(255) DEFAULT NULL,
  `STUDENT_COURSE5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`STUDENT_ID`, `STUDENT_NAME`, `STUDENT_PASSWORD`, `STUDENT_EMAIL`, `STUDENT_YEAROFSTUDY`, `STUDENT_PHONE`, `STUDENT_COURSE1`, `STUDENT_COURSE2`, `STUDENT_COURSE3`, `STUDENT_COURSE4`, `STUDENT_COURSE5`) VALUES
(1234567, 'Jonathan', 'hello', 'jo.cool@mcgill.ca', 'U3+', '6549873214', NULL, NULL, NULL, NULL, NULL),
(2616616, 'Mariam Madward', 'heye', 'hey', 'U2', 'hey', NULL, NULL, NULL, NULL, NULL),
(2626265, 'Sarah', 'nsfjkldsf', 'jkas', 'U0', 'dsdfas', NULL, NULL, NULL, NULL, NULL),
(26066565, 'alex new', 'alex', 'alex', 'U0', 'alex', NULL, NULL, NULL, NULL, NULL),
(260556321, 'Jack Black', 'kungfupanda', 'jack.black@mail.mcgill.ca', 'U2', '3216549874', NULL, NULL, NULL, NULL, NULL),
(260634017, 'Alexandre Perron', 'hello', 'alexandre.perron@mail.mcgill.ca', 'U2', '5146250454', 'COMP 202', 'COMP 303', 'FINE 151', 'BUSA 307', 'BUSA 150'),
(260734567, 'Joseph', 'Tommy', 'J.T@TOMMY.COM', 'U2', '6581456987', NULL, NULL, NULL, NULL, NULL),
(389578389, 'an', 'dfjkswahkl', 'dfnjklsdh', 'U3', 'DFJSKLL', NULL, NULL, NULL, NULL, NULL),
(2147483647, 'John Doe', 'Hello', 'john.doe@mail.mcgill.ca', 'U2', '747361251545', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`COURSE_ID`);

--
-- Indexes for table `engagements`
--
ALTER TABLE `engagements`
  ADD PRIMARY KEY (`ENGAGEMENT_ID`),
  ADD KEY `ENGAGEMENT_STUDENT` (`ENGAGEMENT_STUDENT`),
  ADD KEY `ENGAGEMENT_TUTOR` (`ENGAGEMENT_TUTOR`),
  ADD KEY `ENGAGEMENT_COURSEID` (`ENGAGEMENT_COURSEID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`STUDENT_ID`),
  ADD KEY `STUDENT_COURSE1` (`STUDENT_COURSE1`),
  ADD KEY `STUDENT_COURSE2` (`STUDENT_COURSE2`),
  ADD KEY `STUDENT_COURSE3` (`STUDENT_COURSE3`),
  ADD KEY `STUDENT_COURSE4` (`STUDENT_COURSE4`),
  ADD KEY `STUDENT_COURSE5` (`STUDENT_COURSE5`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `engagements`
--
ALTER TABLE `engagements`
  MODIFY `ENGAGEMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `engagements`
--
ALTER TABLE `engagements`
  ADD CONSTRAINT `engagements_ibfk_1` FOREIGN KEY (`ENGAGEMENT_STUDENT`) REFERENCES `students` (`STUDENT_ID`),
  ADD CONSTRAINT `engagements_ibfk_2` FOREIGN KEY (`ENGAGEMENT_TUTOR`) REFERENCES `students` (`STUDENT_ID`),
  ADD CONSTRAINT `engagements_ibfk_3` FOREIGN KEY (`ENGAGEMENT_COURSEID`) REFERENCES `courses` (`COURSE_ID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`STUDENT_COURSE1`) REFERENCES `courses` (`COURSE_ID`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`STUDENT_COURSE2`) REFERENCES `courses` (`COURSE_ID`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`STUDENT_COURSE3`) REFERENCES `courses` (`COURSE_ID`),
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`STUDENT_COURSE4`) REFERENCES `courses` (`COURSE_ID`),
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`STUDENT_COURSE5`) REFERENCES `courses` (`COURSE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
