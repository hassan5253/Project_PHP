-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2014 at 06:00 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `friendrequestdb`
--
CREATE DATABASE `friendrequestdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `friendrequestdb`;

-- --------------------------------------------------------

--
-- Table structure for table `tblfriendrequest`
--

CREATE TABLE IF NOT EXISTS `tblfriendrequest` (
  `RID` int(11) NOT NULL AUTO_INCREMENT,
  `SourceID` int(11) DEFAULT NULL,
  `DestinationID` int(11) DEFAULT NULL,
  `FStatus` varchar(10) DEFAULT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblfriendrequest`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblprimaryusers`
--

CREATE TABLE IF NOT EXISTS `tblprimaryusers` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `UPass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblprimaryusers`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
