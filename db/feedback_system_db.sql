-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2014 at 04:12 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feedback_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `batch_id` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `session` int(10) NOT NULL,
  `section` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`s_no`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this table contains information about the batches.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(20) NOT NULL COMMENT 'the unique course id',
  `course_name` varchar(20) NOT NULL COMMENT 'the course name (MCA, MTECH, MBA(MS, FT, APR, TA), B.com )',
  `stream` varchar(15) NOT NULL COMMENT 'the stream (CS or MGM)',
  `number_of_sem` int(15) NOT NULL COMMENT 'the total number of semester',
  PRIMARY KEY (`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this table contains information about the courses available in iips';

-- --------------------------------------------------------

--
-- Table structure for table `feedback_info`
--

CREATE TABLE IF NOT EXISTS `feedback_info` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `student_no` int(255) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `faculty_id` varchar(20) NOT NULL,
  `conceptual_clearity` int(5) NOT NULL COMMENT 'specifies teacher''s ability to bring conceptual clearity',
  `subject_knowledge` int(5) NOT NULL COMMENT 'specifies teacher''s subject knowledge',
  `practical_example` int(5) NOT NULL COMMENT 'specifies teacher''s compliments theory with practical example',
  `handling_capability` int(5) NOT NULL COMMENT 'specifies teacher''s capability of handling cases/ assignment/ exercises/ activities',
  `motivation` int(5) NOT NULL COMMENT 'specifies motivation provided by teacher',
  `control_ability` int(5) NOT NULL COMMENT 'teacher''s ability to control the teacher',
  `course_completion` int(5) NOT NULL COMMENT 'specifies completion & coverage of course',
  `communication_skill` int(5) NOT NULL COMMENT 'specifies teacher''s communication skill',
  `regularity_punctuality` int(5) NOT NULL COMMENT 'specifies teacher''s regularity & punctuality',
  `outside_guidance` int(5) NOT NULL COMMENT 'specifies teacher''s guidance & interaction outside the classroom',
  `syllabus_industry_relvance` int(5) NOT NULL COMMENT 'specifies relevance of syllabus as per industry requirement',
  `sufficiency_of_course` int(5) NOT NULL COMMENT 'specifies sufficiency of course content',
  `books_availability` int(5) NOT NULL COMMENT 'specifies availability of books in library',
  `basic_requirements` int(5) NOT NULL COMMENT 'specifies requirements like chalk, duste',
  `technological_support` int(5) NOT NULL COMMENT 'specifies supports like OHP/LCD etc',
  `study_material` int(5) NOT NULL COMMENT 'specifies availability of material like photocopy etc',
  `resourse_availability` int(5) NOT NULL COMMENT 'specifies availability of resources like internet, computers, softwares,   database etc',
  `cleaniliness_of_class` int(5) NOT NULL,
  `suggestion_for_subject` longtext COMMENT 'It holds the suggestion regarding subject',
  `suggestion_for_course` longtext COMMENT 'It holds the suggestion regarding course',
  PRIMARY KEY (`s_no`),
  KEY `student_no` (`student_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table holde data entered by students' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
  `student_no` int(255) NOT NULL AUTO_INCREMENT COMMENT 'serial number',
  `batch_id` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `session` int(20) NOT NULL,
  `semester` int(20) NOT NULL,
  `section` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`student_no`),
  KEY `student_no` (`student_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this table contains general information about student.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` varchar(15) NOT NULL COMMENT 'Unique Subject ID',
  `course_id` varchar(20) NOT NULL COMMENT 'Course id from course table',
  `name_of_subject` varchar(50) NOT NULL,
  `semester` int(20) NOT NULL,
  `credits` int(10) NOT NULL COMMENT 'credits of that particular subjects',
  PRIMARY KEY (`subject_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this';

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE IF NOT EXISTS `time_table` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(20) NOT NULL COMMENT 'The course id from the course table to know the course name',
  `subject_id` varchar(20) NOT NULL COMMENT 'The subject id from subject table to know subject name',
  `faculty_id` varchar(30) NOT NULL COMMENT 'The faculty_id from user master table to know name',
  `semester` int(20) NOT NULL,
  `year` int(10) NOT NULL,
  `section` varchar(2) DEFAULT NULL,
  `day` varchar(20) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `room_number` varchar(10) NOT NULL,
  PRIMARY KEY (`s_no`),
  KEY `subject_id` (`subject_id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `course_id` (`course_id`),
  KEY `section` (`section`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `pro_cat_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `feedback_info`
--
ALTER TABLE `feedback_info`
  ADD CONSTRAINT `student_info_student_no` FOREIGN KEY (`student_no`) REFERENCES `student_info` (`student_no`);

--
-- Constraints for table `time_table`
--
ALTER TABLE `time_table`
  ADD CONSTRAINT `course_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `subject_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
