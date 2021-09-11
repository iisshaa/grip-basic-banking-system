-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 03:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

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
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `Name`, `Email`, `Balance`) VALUES
(1, 'Isha', 'isha12@gmail.com', 183790),
(2, 'Nikita', 'niki@gmail.com', 7790),
(3, 'Sam', 'sam@gmail.com', 40300),
(4, 'Jacob', 'jacob@gmail.com', 8320),
(5, 'Blair', 'blair@gmail.com', 39450),
(6, 'Nick', 'nick@gmail.com', 21240),
(7, 'Varun', 'varun@gmail.com', 48509),
(8, 'Rahul', 'rahul@gmail.com', 57300),
(9, 'Serena', 'serena@gmail.com', 31200),
(10, 'Aisha', 'aish11@gmail.com', 50001);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `SRNO` int(3) NOT NULL,
  `Sender` text NOT NULL,
  `Receiver` text NOT NULL,
  `Balance` int(8) NOT NULL,
  `Datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`SRNO`, `Sender`, `Receiver`, `Balance`, `Datetime`) VALUES
(1, 'Isha', 'Sam', 20000, '2021-09-08 14:55:43'),
(2, 'Nick', 'Jacob', 500, '2021-09-10 14:55:43'),
(3, 'Aisha', 'Varun', 1000, '2021-09-10 14:58:55'),
(4, 'Isha', 'Rahul', 9000, '2021-09-11 16:16:13'),
(5, 'Blair', 'Nick', 450, '2021-09-11 16:16:45'),
(6, 'Jacob', 'Isha', 880, '2021-09-11 16:18:31'),
(7, 'Varun', 'Nikita', 500, '2021-09-11 16:24:31'),
(8, 'Aisha', 'Sam', 2000, '2021-09-11 16:25:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`SRNO`),
  ADD KEY `SRNO` (`SRNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `SRNO` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
