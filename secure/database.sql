-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2014 at 07:28 PM
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
`fixtureID` int(11) unsigned NOT NULL AUTO_INCREMENT,
`date` datetime DEFAULT NULL,
`location` varchar(64) DEFAULT NULL,
PRIMARY KEY (`fixtureID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Score`
--

CREATE TABLE `Score` (
`scoreID` int(11) unsigned NOT NULL AUTO_INCREMENT,
`fixtureID` int(11) unsigned NOT NULL,
`teamID` int(11) unsigned NOT NULL,
`score` decimal(11,0) DEFAULT NULL,
PRIMARY KEY (`scoreID`),
KEY `fixtureID` (`fixtureID`),
KEY `teamID` (`teamID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Sport`
--

CREATE TABLE `Sport` (
`sportID` int(11) unsigned NOT NULL AUTO_INCREMENT,
`sportName` varchar(64) DEFAULT NULL,
PRIMARY KEY (`sportID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE `Team` (
`teamID` int(11) unsigned NOT NULL AUTO_INCREMENT,
`teamName` varchar(64) DEFAULT NULL,
`ownerID` int(11) unsigned NOT NULL,
`sportID` int(11) unsigned NOT NULL,
PRIMARY KEY (`teamID`),
KEY `sportID` (`sportID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TeamRoster`
--

CREATE TABLE `TeamRoster` (
`teamID` int(11) unsigned NOT NULL,
`userID` int(11) unsigned NOT NULL,
KEY `userID` (`userID`),
KEY `teamID` (`teamID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tournament`
--

CREATE TABLE `Tournament` (
`tournamentID` int(11) unsigned NOT NULL AUTO_INCREMENT,
`tournamentName` varchar(64) DEFAULT NULL,
`sportID` int(11) unsigned NOT NULL,
`typeID` int(11) unsigned NOT NULL,
`stage` tinyint(4) DEFAULT NULL,
PRIMARY KEY (`tournamentID`),
KEY `typeID` (`typeID`),
KEY `sportID` (`sportID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TournamentFixture`
--

CREATE TABLE `TournamentFixture` (
`tournamentID` int(11) unsigned NOT NULL,
`fixtureID` int(11) unsigned NOT NULL,
`teamID` int(11) unsigned NOT NULL,
KEY `fixtureID` (`fixtureID`),
KEY `teamID` (`teamID`),
KEY `tournamentID` (`tournamentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TournamentTeam`
--

CREATE TABLE `TournamentTeam` (
`tournamentID` int(11) unsigned NOT NULL,
`teamID` int(11) unsigned NOT NULL,
KEY `teamID` (`teamID`),
KEY `tournamentID` (`tournamentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TournamentType`
--

CREATE TABLE `TournamentType` (
`typeID` int(11) unsigned NOT NULL AUTO_INCREMENT,
`typeName` varchar(64) NOT NULL DEFAULT '',
PRIMARY KEY (`typeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
`userID` int(11) unsigned NOT NULL AUTO_INCREMENT,
`username` varchar(32) DEFAULT NULL,
`password` varchar(60) DEFAULT NULL,
`role` tinyint(4) DEFAULT NULL,
PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `UserData`
--

CREATE TABLE `UserData` (
`userID` int(11) unsigned NOT NULL,
`email` varchar(64) DEFAULT NULL,
`location` varchar(64) DEFAULT NULL,
`name` varchar(64) DEFAULT NULL,
KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Score`
--
ALTER TABLE `Score`
ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`fixtureID`) REFERENCES `Fixture` (`fixtureID`),
ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`teamID`) REFERENCES `TournamentTeam` (`teamID`);

--
-- Constraints for table `Team`
--
ALTER TABLE `Team`
ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`sportID`) REFERENCES `Sport` (`sportID`);

--
-- Constraints for table `TeamRoster`
--
ALTER TABLE `TeamRoster`
ADD CONSTRAINT `teamroster_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`),
ADD CONSTRAINT `teamroster_ibfk_2` FOREIGN KEY (`teamID`) REFERENCES `Team` (`teamID`);

--
-- Constraints for table `Tournament`
--
ALTER TABLE `Tournament`
ADD CONSTRAINT `tournament_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `TournamentType` (`typeID`),
ADD CONSTRAINT `tournament_ibfk_2` FOREIGN KEY (`sportID`) REFERENCES `Sport` (`sportID`);

--
-- Constraints for table `TournamentFixture`
--
ALTER TABLE `TournamentFixture`
ADD CONSTRAINT `tournamentfixture_ibfk_3` FOREIGN KEY (`tournamentID`) REFERENCES `Tournament` (`tournamentID`),
ADD CONSTRAINT `tournamentfixture_ibfk_1` FOREIGN KEY (`fixtureID`) REFERENCES `Fixture` (`fixtureID`),
ADD CONSTRAINT `tournamentfixture_ibfk_2` FOREIGN KEY (`teamID`) REFERENCES `Team` (`teamID`);

--
-- Constraints for table `TournamentTeam`
--
ALTER TABLE `TournamentTeam`
ADD CONSTRAINT `tournamentteam_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `TeamRoster` (`teamID`),
ADD CONSTRAINT `tournamentteam_ibfk_2` FOREIGN KEY (`tournamentID`) REFERENCES `Tournament` (`tournamentID`);

--
-- Constraints for table `UserData`
--
ALTER TABLE `UserData`
ADD CONSTRAINT `userdata_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`);