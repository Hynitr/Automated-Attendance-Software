-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 06:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin No.` text NOT NULL,
  `Password` text NOT NULL,
  `id` int(11) NOT NULL,
  `school` text NOT NULL,
  `logo` text NOT NULL,
  `logo2` text NOT NULL,
  `website` text NOT NULL,
  `alias` text NOT NULL,
  `tel` text NOT NULL,
  `addr` text NOT NULL,
  `blksmsname` text NOT NULL,
  `blkuser` text NOT NULL,
  `blkpword` text NOT NULL,
  `token` text NOT NULL,
  `instanceid` text NOT NULL,
  `emal` text NOT NULL,
  `expectedtimein` time NOT NULL,
  `renew` date DEFAULT NULL,
  `pkkey` text NOT NULL,
  `skkey` text NOT NULL,
  `renewamt` text NOT NULL,
  `startyear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin No.`, `Password`, `id`, `school`, `logo`, `logo2`, `website`, `alias`, `tel`, `addr`, `blksmsname`, `blkuser`, `blkpword`, `token`, `instanceid`, `emal`, `expectedtimein`, `renew`, `pkkey`, `skkey`, `renewamt`, `startyear`) VALUES
('Demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 1, 'De-Guide Light School', 'logo/logo.png', '', 'https://hynitr.com', 'hynitr', '09010484986, 09121132025', 'Ikole-Ekiti, Ekiti State. Nigeira', 'Hynitr', 'deguidelightschool@yahoo.com', 'Guide64', '96gytxofmowmyv9p', 'instance30269', 'hynitrofficial@gmail.com', '07:00:00', '2024-01-26', 'pk_test_d136f60195369e292262aa6b71daa381aae398fb', 'sk_test_76b2fa2e9ed5c4f3a61a75393cfdf1146452224f', '50000', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Nursery 1'),
(2, 'Nursery 2'),
(3, 'KG 1'),
(4, 'KG 2'),
(5, 'Year 1'),
(6, 'Year 2'),
(7, 'Year 3'),
(8, 'Year 4'),
(9, 'Year 5'),
(10, 'J.S.S 1'),
(11, 'J.S.S 2'),
(12, 'J.S.S 3'),
(13, 'S.S.S 1'),
(14, 'S.S.S 2'),
(15, 'S.S.S 3'),
(16, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `keyy`
--

CREATE TABLE `keyy` (
  `id` int(11) NOT NULL,
  `keyy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keyy`
--

INSERT INTO `keyy` (`id`, `keyy`) VALUES
(1, 'fe01ce2a7fbac8fafaed7c982a04e229');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `attendanceid` text NOT NULL,
  `fullname` text NOT NULL,
  `date` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `AttendanceID` text NOT NULL,
  `qrid` text NOT NULL,
  `Last Name` text NOT NULL,
  `First Name` text NOT NULL,
  `dob` date NOT NULL,
  `Gender` text NOT NULL,
  `Telephone1` text NOT NULL,
  `Address` text NOT NULL,
  `Telephone2` text NOT NULL,
  `Datereg` date NOT NULL,
  `department` text NOT NULL,
  `Active` text NOT NULL,
  `Passport` text NOT NULL,
  `qrcode` text NOT NULL,
  `bday` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keyy`
--
ALTER TABLE `keyy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keyy`
--
ALTER TABLE `keyy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
