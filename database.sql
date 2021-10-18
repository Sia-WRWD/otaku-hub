-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 06:02 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otaku_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminGodCodename` tinytext NOT NULL,
  `AdminEmail` tinytext NOT NULL,
  `AdminPassword` longtext NOT NULL,
  `AdminRealName` varchar(255) NOT NULL,
  `AdminDescription` varchar(1000) NOT NULL,
  `AdminAge` int(11) NOT NULL,
  `AdminCountry` tinytext NOT NULL,
  `AdminPosition` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminGodCodename`, `AdminEmail`, `AdminPassword`, `AdminRealName`, `AdminDescription`, `AdminAge`, `AdminCountry`, `AdminPosition`) VALUES
(8, 'admintest', 'admintest@gmail.com', '$2y$10$lEf2jUKq7io9LxrsppyuZuw4cPh.TYazrV.p3jYeq4PORvpaV6StK', 'New Admin', 'Insert Your Description Here!', 1, 'Isekai', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `UserID` varchar(128) NOT NULL,
  `CommentDate` datetime NOT NULL,
  `CommentMessage` text NOT NULL,
  `CommentAnime` varchar(28) NOT NULL,
  `PosID` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `ModID` int(11) NOT NULL,
  `ModFBICodename` tinytext NOT NULL,
  `ModEmail` tinytext NOT NULL,
  `ModPassword` longtext NOT NULL,
  `ModRealName` varchar(255) NOT NULL,
  `ModDescription` varchar(1000) NOT NULL,
  `ModAge` int(11) NOT NULL,
  `ModCountry` tinytext NOT NULL,
  `ModPosition` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`ModID`, `ModFBICodename`, `ModEmail`, `ModPassword`, `ModRealName`, `ModDescription`, `ModAge`, `ModCountry`, `ModPosition`) VALUES
(7, 'moderatortest', 'moderatortest@gmail.com', '$2y$10$unlMA4c2YEtK/j08Nlx69OIbiRtN3rGqz64RW2sL/4xJv2TElpKja', 'New Moderator', 'Insert Your Description Here!', 1, 'Isekai', 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `ImgID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ImgStatus` int(11) NOT NULL,
  `PosID` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`ImgID`, `UserID`, `ImgStatus`, `PosID`) VALUES
(18, 12, 1, 'User'),
(19, 8, 1, 'Admin'),
(20, 7, 1, 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `ResetID` int(11) NOT NULL,
  `ResetEmail` text NOT NULL,
  `ResetSelector` text NOT NULL,
  `ResetToken` longtext NOT NULL,
  `ResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` tinytext NOT NULL,
  `UserEmail` tinytext NOT NULL,
  `UserPassword` longtext NOT NULL,
  `UserRealName` varchar(255) NOT NULL,
  `UserDescription` varchar(1000) NOT NULL,
  `UserAge` int(11) NOT NULL,
  `UserCountry` tinytext NOT NULL,
  `UserPosition` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `UserEmail`, `UserPassword`, `UserRealName`, `UserDescription`, `UserAge`, `UserCountry`, `UserPosition`) VALUES
(12, 'usertest', 'usertest@gmail.com', '$2y$10$yXU.kq8s1dsUJcEFhAgLYeb9M.P6le6ErZEppNe6Z0weqXYIF1Nzy', 'New Member', 'Insert Your Description Here!', 1, 'Isekai', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`ModID`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`ImgID`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`ResetID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `ModID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `ImgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reset`
--
ALTER TABLE `reset`
  MODIFY `ResetID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
