-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 10:32 PM
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
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_logins`
--

CREATE TABLE `failed_logins` (
  `idUsers` int(11) NOT NULL,
  `failed_time` int(11) NOT NULL,
  `failed_ip` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'danny958a', 'johnmarsh19@hotmail.com', '$2y$10$8.VMp2TbOhLVcKgBOkkO6OsloOHV4BbOvjpkjSJRgl9BizJpKIS1q'),
(2, 'fcdssd', 'john.marshall2@mavs.uta.edu', '$2y$10$Bz8BQVHtda/SyIL7twLq7OVFbCD69stBVGVKKU33Znwl1sPjzM5lu'),
(3, 'godtookmykfc', 'dsdsdsds@hmail.com', '$2y$10$9cEHg162YDjECrxDqQGzHu.gOESD1sV44eU1y4/kapZfnTGT0ItgW'),
(4, 'test', 'johnmarsh19@hotmail.com', '$2y$10$4GW4Cxm//xw3A6Jf62c5Oeizl2mgyCx1tnItryBdFVhdOx6I9dbUK'),
(5, 'marshallgjohn', 'me@johngmarshall.com', '$2y$10$K3E0Y09SHZboNOlFcTCikujn.6cuhs/RBbCsCptcYB7/pfZ5r2lIG'),
(6, 'tester', 'mark.ryan@outlook.com', '$2y$10$pPE6XiBzhcNNecsEG0bpWeVbrFKIGUtoBmc3YRGRVcn0GWU3.UbBG'),
(7, 'david', 'david@david.com', '$2y$10$BIYH.Hx2kplG7BKAU/AtZun9u51xH2Gf5OmQCwZZHHIEYnOyLVQHO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD CONSTRAINT `failed_logins_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
