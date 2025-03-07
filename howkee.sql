-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 04:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `howkee`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userRole` varchar(10) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userPicture` varchar(255) DEFAULT NULL,
  `session` varchar(255) NOT NULL,
  `registeredDate` date NOT NULL,
  `lastOnline` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `userRole`, `userEmail`, `userPassword`, `userPicture`, `session`, `registeredDate`, `lastOnline`, `status`) VALUES
(1000, 'Joash Hii', 'Sales', 'sales@gmail.com', '6db4e4607e0e7d00a8ad099c59f06a5b3bbd6254ccab41db3384de4d72ff05cf', 'null', '1', '2025-03-07', '2025-03-07 11:25:00', 'Offline now'),
(1001, 'John ', 'Admin', 'admin@gmail.com', '6db4e4607e0e7d00a8ad099c59f06a5b3bbd6254ccab41db3384de4d72ff05cf', 'null', '1', '2025-03-07', '2025-03-07 11:25:00', 'Offline now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
