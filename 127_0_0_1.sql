-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2017 at 10:09 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internshala`
--
CREATE DATABASE IF NOT EXISTS `internshala` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `internshala`;

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `ID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Description` text NOT NULL,
  `Stipend` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `Duration` int(11) NOT NULL,
  `PostedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internshipapplcation`
--

CREATE TABLE `internshipapplcation` (
  `ID` int(11) NOT NULL,
  `InternshipID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `WhyHire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `uname` varchar(64) NOT NULL,
  `pword` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `IsEmployee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PostedBy` (`PostedBy`);

--
-- Indexes for table `internshipapplcation`
--
ALTER TABLE `internshipapplcation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `InternshipID` (`InternshipID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `internshipapplcation`
--
ALTER TABLE `internshipapplcation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`PostedBy`) REFERENCES `user` (`ID`);

--
-- Constraints for table `internshipapplcation`
--
ALTER TABLE `internshipapplcation`
  ADD CONSTRAINT `internshipapplcation_ibfk_1` FOREIGN KEY (`InternshipID`) REFERENCES `internship` (`ID`),
  ADD CONSTRAINT `internshipapplcation_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
