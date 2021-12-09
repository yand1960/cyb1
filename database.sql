-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 08:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calc`
--
CREATE DATABASE IF NOT EXISTS `calc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `calc`;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `ID` int(11) NOT NULL,
  `Number1` int(11) NOT NULL,
  `Number2` int(11) NOT NULL,
  `Result` int(11) NOT NULL,
  `UserID` varchar(30) NOT NULL,
  `Timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`ID`, `Number1`, `Number2`, `Result`, `UserID`, `Timestamp`) VALUES
(1, 1, 2, 3, 'Yuri', '2021-11-30 21:18:33'),
(2, 2, 2, 4, 'Vasya', '2021-11-25 19:18:32'),
(3, 11, 22, 33, 'anonym', '0000-00-00 00:00:00'),
(4, 111, 222, 333, 'anonym', '0000-00-00 00:00:00'),
(5, 111, 222, 333, 'anonym', '0000-00-00 00:00:00'),
(6, 111, 222, 333, 'anonym', '0000-00-00 00:00:00'),
(7, 111, 222, 333, 'anonym', '0000-00-00 00:00:00'),
(8, 111, 222, 333, 'anonym', '0000-00-00 00:00:00'),
(9, 1, 2, 3, 'anonym', '0000-00-00 00:00:00'),
(10, 1, 2, 3, 'anonym', '0000-00-00 00:00:00'),
(11, 1, 2, 3, 'anonym', '0000-00-00 00:00:00'),
(12, 1, 22, 23, 'anonym', '0000-00-00 00:00:00'),
(13, 1, 2, 3, 'anonym', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `PwdHash` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `PwdHash`) VALUES
(1, 'yuri', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(2, 'vasya', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `calc1`
--

