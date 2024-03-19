-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 09:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contacts_ID` int(50) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `cNum` varchar(255) NOT NULL,
  `eMail` varchar(255) NOT NULL,
  `cPrice` int(50) NOT NULL,
  `isDeleted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contacts_ID`, `fName`, `lName`, `cNum`, `eMail`, `cPrice`, `isDeleted`) VALUES
(9, 'sdasda', 'dasda', '3534', 'sda@gmail.com', 0, 'yes'),
(10, 'sada', 'sdad', '342', 'das@jdma', 0, 'yes'),
(13, 'qweqwe', 'wqeqweqweq', '1231q', 'qweqwe@tasasdwaqw.com', 0, 'no'),
(14, 'Vladimer', 'Ilagor', '09123456789', 'vladimer.ilagor@gmail.com', 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_deleted`
--

CREATE TABLE `contacts_deleted` (
  `contDel_ID` int(50) NOT NULL,
  `contacts_ID` int(50) NOT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `cNum` varchar(255) DEFAULT NULL,
  `eMail` varchar(255) DEFAULT NULL,
  `isDeleted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts_deleted`
--

INSERT INTO `contacts_deleted` (`contDel_ID`, `contacts_ID`, `fName`, `lName`, `cNum`, `eMail`, `isDeleted`) VALUES
(2, 4, 'asdas', 'sdad', '123913', 'ada@gmail.com', 'yes'),
(3, 4, 'asdas', 'sdad', '123913', 'ada@gmail.com', 'yes'),
(4, 4, 'asdas', 'sdad', '123913', 'ada@gmail.com', 'yes'),
(5, 4, 'asdas', 'sdad', '123913', 'ada@gmail.com', 'yes'),
(6, 4, 'asdas', 'sdad', '123913', 'ada@gmail.com', 'yes'),
(7, 7, 'asdadm', 'mkdak', '12131', 'dsad@gmail.com', 'yes'),
(8, 11, 'asda', 'adad', '872131', 'asda@nasdl', 'yes'),
(9, 8, 'hi', 'hello', '1231312312', 'hsjdak@gmail.com', 'yes'),
(10, 13, 'qweqwe', 'wqeqweqweq', '123123213', 'qweqwe@tasasdwaqw.com', 'yes'),
(11, 9, 'sdasda', 'dasda', '3534', 'sda@gmail.com', 'yes'),
(12, 10, 'sada', 'sdad', '342', 'das@jdma', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `deleted`, `start_date`, `end_date`, `created_on`) VALUES
(1, 'Title 1', 'This the Description of title 1', 0, '2024-03-12', '2024-03-14', NULL),
(2, 'sdkfj', 'ksdgjfskdf', 1, '2024-03-12', '2024-03-14', NULL),
(3, 'asdas', 'asdasdasd', 1, '2024-03-13', '2024-03-21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contacts_ID`);

--
-- Indexes for table `contacts_deleted`
--
ALTER TABLE `contacts_deleted`
  ADD PRIMARY KEY (`contDel_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contacts_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts_deleted`
--
ALTER TABLE `contacts_deleted`
  MODIFY `contDel_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
