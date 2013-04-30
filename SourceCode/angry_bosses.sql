-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2013 at 11:48 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `angry_bosses`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `App_ID` int(11) NOT NULL,
  `Job_ID` int(11) NOT NULL,
  `Emp_ID` int(11) NOT NULL,
  PRIMARY KEY (`App_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `Dept_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Dept_Name` text NOT NULL,
  PRIMARY KEY (`Dept_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Dept_ID`, `Dept_Name`) VALUES
(1, 'Human Resource'),
(2, 'Administration'),
(3, 'Marketing & Sales'),
(4, 'Finance'),
(5, 'Information Technology'),
(6, 'Health'),
(7, 'Internal Audit'),
(8, 'Customer Relations'),
(9, 'Business Development'),
(10, 'Business Support System'),
(11, 'Quality & Service Assurance');

-- --------------------------------------------------------

--
-- Table structure for table `dept_cmp`
--

CREATE TABLE IF NOT EXISTS `dept_cmp` (
  `Dept_ID` int(11) NOT NULL,
  `Cmp_ID` int(11) NOT NULL,
  PRIMARY KEY (`Dept_ID`,`Cmp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_cmp`
--

INSERT INTO `dept_cmp` (`Dept_ID`, `Cmp_ID`) VALUES
(0, 1),
(1, 1),
(2, 7),
(6, 7),
(7, 7),
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept_emp`
--

CREATE TABLE IF NOT EXISTS `dept_emp` (
  `Dept_ID` int(11) NOT NULL DEFAULT '0',
  `Emp_ID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Dept_ID`,`Emp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_emp`
--

INSERT INTO `dept_emp` (`Dept_ID`, `Emp_ID`) VALUES
(0, 2),
(1, 1),
(1, 2),
(4, 2),
(5, 1),
(9, 2),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Emp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Name` text NOT NULL,
  `Emp_Age` int(11) NOT NULL,
  `Emp_DOB` date NOT NULL,
  `Emp_Address` text NOT NULL,
  `Emp_UniName` text NOT NULL,
  `Emp_Courses` int(11) NOT NULL,
  `Emp_Major` text NOT NULL,
  `Emp_GradDate` date NOT NULL,
  `Emp_IntAread` text NOT NULL,
  `Emp_PrefCity` text NOT NULL,
  `Emp_InternJob` text NOT NULL,
  `Emp_CV` text NOT NULL,
  `Emp_UName` text NOT NULL,
  `Emp_Pass` text NOT NULL,
  `Emp_Email` text NOT NULL,
  `Emp_OtherInfo` text NOT NULL,
  PRIMARY KEY (`Emp_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_ID`, `Emp_Name`, `Emp_Age`, `Emp_DOB`, `Emp_Address`, `Emp_UniName`, `Emp_Courses`, `Emp_Major`, `Emp_GradDate`, `Emp_IntAread`, `Emp_PrefCity`, `Emp_InternJob`, `Emp_CV`, `Emp_UName`, `Emp_Pass`, `Emp_Email`, `Emp_OtherInfo`) VALUES
(1, 'Amyn Karim Virani', 21, '1991-10-20', 'Room # 216, M5', 'LUMS', 0, 'Computer Science', '2014-06-30', '', 'Karachi', 'Job', '', 'amyn.virani', 'amyn.virani', '14100210@lums.edu.pk', 'Interested in Software Development.'),
(2, 'Arsalan Jumani', 21, '1991-04-16', 'Room # 315, M5', 'LUMS', 0, 'Economics', '2014-06-30', '', 'Lahore', 'Job', '', 'arsalan.jumani', 'arsalan.jumani', 'arsalan.jumani@gmail.com', 'No Information.');

-- --------------------------------------------------------

--
-- Table structure for table `employeer`
--

CREATE TABLE IF NOT EXISTS `employeer` (
  `Cmp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cmp_Name` text NOT NULL,
  `Cmp_About` text NOT NULL,
  `Cmp_UName` text NOT NULL,
  `Cmp_Pass` text NOT NULL,
  `Cmp_Email` text NOT NULL,
  `Cmp_OtherInfo` text NOT NULL,
  PRIMARY KEY (`Cmp_ID`),
  UNIQUE KEY `Cmp_ID_2` (`Cmp_ID`),
  KEY `Cmp_ID` (`Cmp_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `employeer`
--

INSERT INTO `employeer` (`Cmp_ID`, `Cmp_Name`, `Cmp_About`, `Cmp_UName`, `Cmp_Pass`, `Cmp_Email`, `Cmp_OtherInfo`) VALUES
(1, 'Reckitt Benckiser', 'For such a fast-paced, entrepreneurial business some are surprised to learn the company’s history spans 150 years of innovation for consumers across the world. ', 'reckitt.becnkiser', 'reckitt.becnkiser', 'MEDIA.PR@RB.COM', 'With a German and British heritage, RB’s drive for financial performance and social responsibility today can be seen in its deep roots – as shown in this timeline.'),
(2, 'RB', 'For such a fast-paced, entrepreneurial business some are surprised to learn the companyâ€™s history spans 150 years of innovation for consumers across the world. ', 'reckitt.becnkiser', 'reckitt.becnkiser', 'MEDIA.PR@RB.COM', 'With a German and British heritage, RBâ€™s drive for financial performance and social responsibility today can be seen in its deep roots â€“ as shown in this timeline.'),
(3, 'MCB Bank Limited', 'MCB Bank Limited, with more than 60 years of experience as one of the leading banks in Pakistan, was incorporated on July 9 in 1947.', 'mcb', 'mcb', 'mcb@mcb.com', 'The bank has also been acknowledged though prestigious recognition and awards by Euromoney, MMT, Asia Money, SAFA (SAARC), The Asset and The Asian Banker.'),
(4, 'Allied Bank', 'The Bank started out in Lahore by the name Australasia Bank before independence in 1942; and became Allied Bank of Pakistan in 1974.', 'allied.bank', 'allied.bank', 'complaint.management@abl.com', 'To become a dynamic and efficient bank providing integrated solutions in order to be the first choice bank for the customers.'),
(5, 'Lahore University of Management Sciences', 'To become an internationally acclaimed research university that serves society through excellence in education and research.', 'lums', 'lums', 'cso@lums.edu.pk', 'LUMS aspires to achieve excellence and national and international leadership through unparalleled teaching and research, holistic undergraduate education, and civic engagement to serve the critical needs of society.'),
(6, 'National University of Computer ', 'The National University of Computer ', 'fast', 'fast', 'jobs@nu.edu.pk', 'NUCES Students and Alumni can search for Job Opportunities in various fields including IT Management, Engineering etc using one of the top ranked Job Boards of Pakistan.'),
(7, 'ABC', 'safskjf', 'abc', 'abc', 'abc@abc.com', 'skjdas'),
(8, 'ABC', 'safskjf', 'abc', 'abc', 'abc@abc.com', 'skjdas'),
(9, 'ABC', 'safskjf', 'abc', 'abc', 'abc@abc.com', 'skjdas'),
(10, 'ABC', 'safskjf', 'abc', 'abc', 'abc@abc.com', 'skjdas');

-- --------------------------------------------------------

--
-- Table structure for table `job_openings`
--

CREATE TABLE IF NOT EXISTS `job_openings` (
  `Job_ID` int(11) NOT NULL,
  `Job_Title` text NOT NULL,
  `Job_Detail` text NOT NULL,
  `Cmp_ID` int(11) NOT NULL,
  `Job_Location` text NOT NULL,
  `Job_Requirements` text NOT NULL,
  `Job_Open` tinyint(1) NOT NULL,
  `Job_ODate` date NOT NULL,
  `Job_CDate` date NOT NULL,
  `Job_Duration` text NOT NULL,
  `Job_Type` text NOT NULL,
  `Job_Salary` int(11) NOT NULL,
  `Job_OtherInfo` text NOT NULL,
  PRIMARY KEY (`Job_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
