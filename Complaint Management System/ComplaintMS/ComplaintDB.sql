-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2014 at 05:36 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `complaintdb`
--
CREATE DATABASE `complaintdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `complaintdb`;

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaint`
--

CREATE TABLE IF NOT EXISTS `tblcomplaint` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `CType` varchar(50) DEFAULT NULL,
  `Complaint` varchar(100) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `CDate` varchar(20) DEFAULT NULL,
  `Del` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblcomplaint`
--

INSERT INTO `tblcomplaint` (`CID`, `UID`, `CType`, `Complaint`, `Status`, `CDate`, `Del`) VALUES
(1, 1, 'Connectivity issue', 'A bad Connectivity at day time.', 'Not-Solved', '0000-00-00 00:00:00', 'True'),
(2, 1, 'Uploading issue', 'Can not able to upload even a text file.', 'Not-Solved', '02-Oct-2014', 'True'),
(3, 1, 'Slow Browsing', 'Zaroori complaint', 'Not-Solved', '02-Oct-2014', 'True'),
(4, 1, 'Online Song play issue', 'very slow browsing.', 'Not-Solved', '02-Oct-2014', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE IF NOT EXISTS `tblcustomer` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) DEFAULT NULL,
  `PhoneNo` varchar(20) DEFAULT NULL,
  `CAddress` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `UPass` varchar(20) DEFAULT NULL,
  `AccNo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`UID`, `FullName`, `PhoneNo`, `CAddress`, `Email`, `UPass`, `AccNo`) VALUES
(1, 'Farooq Shibli', '0300-1234567', 'F.B.Area, karachi', 'farooq@yahoo.com', '123', '42101-1234567-1'),
(2, 'Zahir ul Chaadri', '03002589587', 'dharna D Chowk', 'zahirchadri@dharna.com', '123', '42101-1234568-2'),
(3, 'abc', '02131234567', 'karachi', 'abc@xyz.com', '123', '42101-1234570-4'),
(4, 'Rashidali', '03001234567', 'Balida', 'rashid@yahoo.com', '123', '42101-1234567-1'),
(5, 'Aamir', '03451234567', 'Khi', 'aamirashrafh@gmail.com', '12345', '42101-1234567-1'),
(6, 'test', '03331234567', 'abc', 'test@yahoo.com', '123', '42101-1234567-1'),
(7, 'Nomi Soomro', '03201234567', 'Karachi....', 'Nomi@gmail.com', 'nomi', '42101-1234567-1'),
(8, 'Rashidali', '03001234567', 'balida', 'ali@gmail.com', '123', '42101-1234567-1');

-- --------------------------------------------------------

--
-- Table structure for table `tblsale`
--

CREATE TABLE IF NOT EXISTS `tblsale` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `AccNo` varchar(20) DEFAULT NULL,
  `Package` varchar(20) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `ADateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`AID`),
  UNIQUE KEY `AccNo` (`AccNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `tblsale`
--

INSERT INTO `tblsale` (`AID`, `AccNo`, `Package`, `Amount`, `ADateTime`) VALUES
(100, '42101-1234567-1', '4MB-EVO-Galaxy', 1200, '2014-10-02 00:00:00'),
(101, '42101-1234568-2', '3MB-EVO-Galaxy', 1200, '2014-10-02 00:00:00'),
(102, '42101-1234569-3', '8MB-EVO-Galaxy', 1200, '2014-10-02 00:00:00'),
(103, '42101-1234570-4', '15MB-EVO-Galaxy', 1200, '2014-10-02 00:00:00'),
(104, '42101-1234571-5', '10MB-EVO-Galaxy', 1200, '2014-10-02 00:00:00'),
(105, '42101-1234572-6', '30MB-CharGee-Nova', 1200, '2014-10-02 00:00:00'),
(106, '42101-1234573-7', '40MB-CharGee-Nova', 1200, '2014-10-02 00:00:00'),
(107, '42101-1234574-8', '50MB-CharGee-Nova', 1200, '2014-10-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbltype`
--

CREATE TABLE IF NOT EXISTS `tbltype` (
  `TID` int(11) NOT NULL AUTO_INCREMENT,
  `CType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbltype`
--

INSERT INTO `tbltype` (`TID`, `CType`) VALUES
(1, 'Weak Connection'),
(2, 'Connectivity issue'),
(3, 'Uploading issue'),
(4, 'Downloading issue'),
(5, 'Video Buffering issue'),
(6, 'Slow Browsing'),
(7, 'Online Song play issue'),
(8, 'Website Block issue');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
