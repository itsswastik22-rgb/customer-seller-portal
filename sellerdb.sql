-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2026 at 09:57 AM
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
-- Database: `sellerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `BEmail` varchar(30) NOT NULL,
  `BName` text NOT NULL,
  `BDOB` int(11) NOT NULL,
  `BPassword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`BEmail`, `BName`, `BDOB`, `BPassword`) VALUES
('Ankita@123', 'Ankita', 2025, 'Ankita'),
('Lenovo@gmail', 'Lenovo', 2025, 'lenovo@123'),
('Lenv@123', 'Lenvo', 2025, 'Lenovo@1'),
('Panigrahi@123', 'S Panigrahi', 2023, 'Panigrahi@1'),
('Raj@1', 'Rajshree ', 2025, 'Rajas'),
('Swastik@1', 'Swastik', 2025, 'Swas@1');

-- --------------------------------------------------------

--
-- Table structure for table `modprd`
--

CREATE TABLE `modprd` (
  `prId` varchar(10) NOT NULL,
  `prName` text NOT NULL,
  `prDesc` varchar(500) NOT NULL,
  `prQuant` int(15) NOT NULL,
  `prPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modprd`
--

INSERT INTO `modprd` (`prId`, `prName`, `prDesc`, `prQuant`, `prPrice`) VALUES
('345', 'iphone 17 pro max', 'mobile phone', 45, 100000.00),
('bby7644', 'hand', 'hxd exehfhf', 2, 100.00),
('fan', 'USHA Table Fan', 'High-Speed Fan, Best For Summers', 78, 2100.00),
('lap1', 'Lenovo', 'Laptop made for students (limited)', 15, 0.00),
('PC1', 'ASUS PC', 'For Gaming Purpose', 17, 10000.00),
('php', 'Introduction to PHP', 'book made for learning basic php', 41, 520.00),
('surf123', 'surf', 'Pehle istemal karo,phir biswas karo', 4, 40.00),
('watch1', 'Rolex', 'Watch made for gentlemen', 4, 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OID` int(11) NOT NULL,
  `BName` varchar(100) NOT NULL,
  `PName` varchar(200) NOT NULL,
  `PQuant` int(11) NOT NULL,
  `Amt` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OID`, `BName`, `PName`, `PQuant`, `Amt`) VALUES
(1, 'Ankita', 'Rolex', 1, 5000.00),
(2, 'Ankita', 'Surf', 2, 100.00),
(3, 'Ankita', 'Introduction to PHP', 2, 1040.00),
(4, 'Ankita', 'hand', 1, 100.00),
(5, 'Ankita', 'Surf', 1, 50.00),
(6, 'Lenovo', 'Surf', 1, 50.00),
(7, 'Lenovo', 'Surf', 1, 50.00),
(8, 'TestUser', 'Introduction to PHP', 2, 1040.00),
(9, 'TestUser', 'Rolex', 1, 5000.00),
(10, 'TestUser', 'hand', 2, 200.00),
(11, 'TestUser', 'Introduction to PHP', 2, 1040.00),
(12, 'TestUser', 'Rolex', 1, 5000.00),
(13, 'TestUser', 'bu', 1, 0.00),
(14, 'TestUser', 'Surf', 2, 100.00),
(15, 'TestUser', 'Rolex', 1, 5000.00),
(16, 'Swastik', 'Introduction to PHP', 3, 1560.00),
(17, 'Rajshree ', 'ASUS PC', 10, 100000.00),
(18, 'Swastik', 'ASUS PC', 5, 50000.00),
(19, 'S Panigrahi', 'USHA Table Fan', 2, 4200.00),
(20, 'Ankita', 'USHA Table Fan', 20, 42000.00);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `Email` varchar(30) NOT NULL,
  `FullName` text NOT NULL,
  `DOB` date NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`Email`, `FullName`, `DOB`, `Password`) VALUES
('Anshu@123', 'Ansh', '2025-05-12', 'Ansh@1'),
('Anshuman@123', 'Anshuman', '2025-04-07', 'Ansh@123'),
('dibyanshu@gmail.com', 'dibyanshu srivastava', '2003-03-31', 'Dibya@123'),
('Lenovo@gmail', 'Lenovo', '2025-03-31', 'Moto@123'),
('Roy@123', 'D Roy', '2025-04-03', 'Roy'),
('Saurav@1', 'Saurav Kumar', '2025-04-28', 'Saurav'),
('Sumit@gmail', 'Sumit P', '2025-04-28', 'Sumit@1'),
('Swas@gmail', 'swastik', '2025-04-06', 'Swas@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`BEmail`);

--
-- Indexes for table `modprd`
--
ALTER TABLE `modprd`
  ADD PRIMARY KEY (`prId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
