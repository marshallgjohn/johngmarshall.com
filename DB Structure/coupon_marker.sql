-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 10:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coupon_marker`
--

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `E_ID` int(11) NOT NULL,
  `M_ID` int(11) DEFAULT NULL,
  `e_DATE` text COLLATE utf8_bin,
  `E_Coupon` text COLLATE utf8_bin NOT NULL,
  `E_Desc` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`E_ID`, `M_ID`, `e_DATE`, `E_Coupon`, `E_Desc`) VALUES
(37, 39, '04-01', 'fgfg', 'fgfgfg'),
(38, 40, '04-01', 'fgfg', 'fgfgfg'),
(40, 42, '04-01', 'fgfg', 'fgfgfg'),
(41, 39, '04-01', 'asdas', 'saasas'),
(43, 44, '04-01', 'asdd', 'ddsad'),
(44, 41, '04-24', 'dsf', 'sdfsd'),
(47, 47, '04-01', 'sdaf', 'ssss'),
(52, 50, '04-11', 'asd', 'ssass');

-- --------------------------------------------------------

--
-- Table structure for table `marker`
--

CREATE TABLE `marker` (
  `M_ID` int(11) NOT NULL,
  `M_name` text COLLATE utf8_bin NOT NULL,
  `M_lat` float NOT NULL,
  `M_lng` float NOT NULL,
  `M_addy` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `marker`
--

INSERT INTO `marker` (`M_ID`, `M_name`, `M_lat`, `M_lng`, `M_addy`) VALUES
(39, 'Waffle House', 32.7068, -97.1167, '2221 S Cooper St, Arlington, TX 76013, USA'),
(40, 'Waffle House', 32.6923, -97.0615, '2998 S, TX-360, Grand Prairie, TX 75051, United States'),
(41, 'Waffle House', 32.678, -97.0457, '2610 West, Grand Prairie, TX 75052, United States'),
(42, 'Waffle House', 32.674, -96.9847, '3970 FM1382, Grand Prairie, TX 75052, USA'),
(44, 'Walgreens', 32.6593, -97.1143, '100 SE Green Oaks Blvd, Arlington, TX 76018, USA'),
(47, 'El Mofongo Restaurant', 32.6858, -97.1304, '3701 S Cooper St #141, Arlington, TX 76015, USA'),
(50, 'Walgreens Photo', 32.7063, -97.1485, '2420 W Arkansas Ln, Arlington, TX 76013, USA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`E_ID`),
  ADD KEY `M_ID` (`M_ID`);

--
-- Indexes for table `marker`
--
ALTER TABLE `marker`
  ADD PRIMARY KEY (`M_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `E_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `marker`
--
ALTER TABLE `marker`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`M_ID`) REFERENCES `marker` (`M_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
