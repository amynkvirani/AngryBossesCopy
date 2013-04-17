-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2013 at 09:49 AM
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
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Emp_ID` int(11) NOT NULL,
  `Emp_Name` text NOT NULL,
  `Emp_Age` int(11) NOT NULL,
  `Emp_DOB` date NOT NULL,
  `Emp_Address` text NOT NULL,
  `Emp_UniName` text NOT NULL,
  `Emp_Courses` int(11) NOT NULL,
  `Emp_Major` int(11) NOT NULL,
  `Emp_GradDate` year(4) NOT NULL,
  `Emp_IntAread` text NOT NULL,
  `Emp_PrefCity` text NOT NULL,
  `Emp_InternJob` text NOT NULL,
  `Emp_CV` text NOT NULL,
  `Emp_UName` text NOT NULL,
  `Emp_Pass` text NOT NULL,
  `Emp_Email` text NOT NULL,
  `Emp_OtherInfo` text NOT NULL,
  PRIMARY KEY (`Emp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeer`
--

CREATE TABLE IF NOT EXISTS `employeer` (
  `Cmp_ID` int(11) NOT NULL,
  `Cmp_Name` text NOT NULL,
  `Cmp_About` text NOT NULL,
  `Cmp_Departments` text NOT NULL,
  `Cmp_UName` text NOT NULL,
  `Cmp_Pass` text NOT NULL,
  `Cmp_Email` int(11) NOT NULL,
  `Cmp_OtherInfo` int(11) NOT NULL,
  PRIMARY KEY (`Cmp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
