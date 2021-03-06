-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2017 at 11:17 PM
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
-- Table structure for table `COURSES`
--

CREATE TABLE `COURSES` (
  `COURSE_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ENGAGEMENTS`
--

CREATE TABLE `ENGAGEMENTS` (
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
-- Table structure for table `STUDENTS`
--

CREATE TABLE `STUDENTS` (
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
-- Indexes for dumped tables
--

--
-- Indexes for table `COURSES`
--
ALTER TABLE `COURSES`
  ADD PRIMARY KEY (`COURSE_ID`);

--
-- Indexes for table `ENGAGEMENTS`
--
ALTER TABLE `ENGAGEMENTS`
  ADD PRIMARY KEY (`ENGAGEMENT_ID`),
  ADD KEY `ENGAGEMENT_STUDENT` (`ENGAGEMENT_STUDENT`),
  ADD KEY `ENGAGEMENT_TUTOR` (`ENGAGEMENT_TUTOR`),
  ADD KEY `ENGAGEMENT_COURSEID` (`ENGAGEMENT_COURSEID`);

--
-- Indexes for table `STUDENTS`
--
ALTER TABLE `STUDENTS`
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
-- AUTO_INCREMENT for table `ENGAGEMENTS`
--
ALTER TABLE `ENGAGEMENTS`
  MODIFY `ENGAGEMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ENGAGEMENTS`
--
ALTER TABLE `ENGAGEMENTS`
  ADD CONSTRAINT `engagements_ibfk_1` FOREIGN KEY (`ENGAGEMENT_STUDENT`) REFERENCES `STUDENTS` (`STUDENT_ID`),
  ADD CONSTRAINT `engagements_ibfk_2` FOREIGN KEY (`ENGAGEMENT_TUTOR`) REFERENCES `STUDENTS` (`STUDENT_ID`),
  ADD CONSTRAINT `engagements_ibfk_3` FOREIGN KEY (`ENGAGEMENT_COURSEID`) REFERENCES `COURSES` (`COURSE_ID`);

--
-- Constraints for table `STUDENTS`
--
ALTER TABLE `STUDENTS`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`STUDENT_COURSE1`) REFERENCES `COURSES` (`COURSE_ID`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`STUDENT_COURSE2`) REFERENCES `COURSES` (`COURSE_ID`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`STUDENT_COURSE3`) REFERENCES `COURSES` (`COURSE_ID`),
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`STUDENT_COURSE4`) REFERENCES `COURSES` (`COURSE_ID`),
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`STUDENT_COURSE5`) REFERENCES `COURSES` (`COURSE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
