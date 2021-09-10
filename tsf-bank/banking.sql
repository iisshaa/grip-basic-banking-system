-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2021 at 05:56 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--
CREATE DATABASE IF NOT EXISTS `banking` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `banking`;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transactions` (
  `SRNO` int(3) NOT NULL,
  `Sender` text NOT NULL,
  `Receiver` text NOT NULL,
  `Balance` int(8) NOT NULL,
  `Datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Srno`, `Sender`, `Receiver`, `Balance`, `Datetime`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(3) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Balance`) VALUES
(1, 'Rishabh', 'ris@gmail.com', 50000),
(2, 'Alisha', 'alisha@gmail.com', 30000),
(3, 'John', 'john@gmail.com', 39900),
(4, 'Jacob', 'jacob@gmail.com', 10000),
(5, 'Mark', 'mark@gmail.com', 40000),
(6, 'Nick', 'nick@gmail.com', 19990),
(7, 'Sergio', 'sergio@gmail.com', 50009),
(8, 'Jude', 'jude@gmail.com', 40100),
(9, 'Luke', 'luke@gmail.com', 30000),
(10, 'Chandler', 'chandler@gmail.com', 50001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`SRNO`);

--
-- Indexes for table `users`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `SRNO` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `customers`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;