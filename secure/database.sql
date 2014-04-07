-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2014 at 11:47 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `COMPanion`
--

-- --------------------------------------------------------

--
-- Table structure for table `Fixture`
--

CREATE TABLE `Fixture` (
`Fixture` int(11) unsigned NOT NULL AUTO_INCREMENT,
`Tournament ID` int(11) unsigned NOT NULL,
`Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`Location` varchar(255) DEFAULT NULL,
`Name` varchar(255) NOT NULL DEFAULT '',
PRIMARY KEY (`Fixture`),
KEY `Tournament ID` (`Tournament ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Score`
--

CREATE TABLE `Score` (
`Fixture ID` int(11) unsigned NOT NULL,
`Team ID` int(11) NOT NULL,
`Wins` decimal(11,0) DEFAULT NULL,
`Losses` decimal(11,0) DEFAULT NULL,
`Draws` decimal(11,0) DEFAULT NULL,
KEY `Fixture ID` (`Fixture ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE `Team` (
`Team ID` int(11) unsigned NOT NULL,
`User ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `Team Info`
--

CREATE TABLE `Team Info` (
`Team ID` int(11) unsigned NOT NULL,
`User ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------


--
-- Table structure for table `Tournament`
--

CREATE TABLE `Tournament` (
`Tournament ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
`Tournament Name` varchar(255) DEFAULT '',
`Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`Tournament ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
`User ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
`Name` varchar(255) NOT NULL DEFAULT '',
`Username` varchar(255) NOT NULL DEFAULT '',
`Role` tinyint(11) NOT NULL,
PRIMARY KEY (`User ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User Data`
--

CREATE TABLE `User Data` (
`Location` varchar(255) DEFAULT '',
`Sports` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Fixture`
--
ALTER TABLE `Fixture`
ADD CONSTRAINT `fixture_ibfk_1` FOREIGN KEY (`Tournament ID`) REFERENCES `Tournament` (`Tournament ID`);

--
-- Constraints for table `Score`
--
ALTER TABLE `Score`
ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`Fixture ID`) REFERENCES `Fixture` (`Fixture`);