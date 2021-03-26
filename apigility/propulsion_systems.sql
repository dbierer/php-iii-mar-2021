-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2021 at 05:09 AM
-- Server version: 10.2.13-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php3`
--

-- --------------------------------------------------------

--
-- Table structure for table `propulsion_systems`
--

CREATE TABLE `propulsion_systems` (
  `id` int(8) NOT NULL,
  `uuid` char(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `propellant` varchar(64) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `propulsion_systems`
--

INSERT INTO `propulsion_systems` (`id`, `uuid`, `type`, `propellant`, `timestamp`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Traditional Rocket', 'Chemical', '2022-09-11 06:37:08'),
(2, 'c81e728d9d4c2f636f067f89cc14862c', 'Solar Sail', 'High energy laser', '2020-07-20 04:55:26'),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Fusion Rocket', 'Nuclear fusion reaction', '2018-01-03 02:09:40'),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 'Antimatter Rocket', 'High density matter/antimatter reaction', '2022-11-27 21:53:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `propulsion_systems`
--
ALTER TABLE `propulsion_systems`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `propulsion_systems`
--
ALTER TABLE `propulsion_systems`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
