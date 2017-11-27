-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2017 at 04:20 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Tutor`
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
('COMP 206'),
('COMP 251'),
('COMP 303'),
('COMP 451'),
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
  `ENGAGEMENT_COURSEID` varchar(255) DEFAULT NULL,
  `ENGAGEMENT_TUTORNAME` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engagements`
--

INSERT INTO `engagements` (`ENGAGEMENT_ID`, `ENGAGEMENT_STUDENT`, `ENGAGEMENT_TUTOR`, `ENGAGEMENT_DATETIME`, `ENGAGEMENT_DURATION`, `ENGAGEMENT_LOCATION`, `ENGAGEMENT_FEE`, `ENGAGEMENT_COURSEID`, `ENGAGEMENT_TUTORNAME`) VALUES
(2, 2, 1, '2017-11-28 04:00:00', 30, 'Bronfman 202', 50, 'COMP 206', ''),
(3, 2, 1, '2017-11-29 04:00:00', 50, 'Trottier', 50, 'COMP 251', ''),
(4, 1, 2, '2017-11-28 04:00:00', 50, 'Bronfman', 50, 'COMP 202', ''),
(5, 3, 1, '2017-11-28 03:04:00', 20, 'Bronfman', 50, 'COMP 202', ''),
(6, 3, 1, '2017-11-30 16:00:00', 50, 'Bronfman', 50, 'COMP 206', ''),
(7, 3, 1, '2017-11-28 04:00:00', 50, 'Bronfman', 50, 'COMP 251', 'Alex');

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
(1, 'Alex', 'hello', 'alex@mail.mcgill.ca', 'U3', '514-625-0454', 'COMP 202', 'COMP 206', 'COMP 251', 'COMP 303', 'COMP 451'),
(2, 'Jack', 'hello', 'jack@mail.mcgill.ca', 'U3+', '514-564-0243', 'BUSA 150', 'BUSA 307', 'BUSA 499', 'FINE 151', 'COMP 202'),
(3, 'Simon', 'hello', 'simon@mail.mcgill.ca', 'U3', '5146453434', NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `ENGAGEMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
