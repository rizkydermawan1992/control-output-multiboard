-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 06:03 AM
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
-- Database: `kontrolesp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kontrol`
--

CREATE TABLE `tabel_kontrol` (
  `ID` int(20) NOT NULL,
  `DEVICE` varchar(20) NOT NULL,
  `BOARD` varchar(20) NOT NULL,
  `GPIO` int(20) NOT NULL,
  `STATE` int(20) NOT NULL,
  `TYPE` enum('Active High','Active Low') NOT NULL,
  `LOGTIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kontrol`
--

INSERT INTO `tabel_kontrol` (`ID`, `DEVICE`, `BOARD`, `GPIO`, `STATE`, `TYPE`, `LOGTIME`) VALUES
(2, 'Lampu Kamar', '1', 12, 0, 'Active High', '2020-10-05 08:45:37'),
(3, 'Lampu Teras', '1', 13, 0, 'Active High', '2020-10-08 04:02:40'),
(22, 'Lampu R. Makan', '1', 14, 0, 'Active High', '2020-10-05 08:34:11'),
(23, 'Lampu R. Tamu', '1', 15, 0, 'Active High', '2020-10-05 08:34:13'),
(24, 'Kamar 1', '2', 25, 1, 'Active Low', '2020-10-03 12:01:08'),
(25, 'Kamar 2', '2', 26, 1, 'Active Low', '2020-10-03 12:01:10'),
(26, 'Kamar 3', '2', 14, 1, 'Active Low', '2020-10-03 12:01:11'),
(27, 'Kamar 4', '2', 27, 1, 'Active Low', '2020-10-03 12:01:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_kontrol`
--
ALTER TABLE `tabel_kontrol`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_kontrol`
--
ALTER TABLE `tabel_kontrol`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
