-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2016 at 01:54 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_perfmon`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `website` varchar(10000) NOT NULL,
  `callback_url` varchar(1000) NOT NULL,
  `app_name` varchar(10000) NOT NULL,
  `consumer_key` varchar(36) NOT NULL,
  `consumer_secret` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `email`, `description`, `website`, `callback_url`, `app_name`, `consumer_key`, `consumer_secret`) VALUES
(36, 'rahul@bluecubenetwork.com', 'a', 'http://localhost/perfmon-apps/newApp.php', 'http://localhost/perfmon-apps/newApp.php', 'c', '85F5D475-FB45-E99E-F29B-B81198E4061F', '152c7e63f56bd13644e4ad7dd047aa92e0509f487a337dae4aad04a393df7279'),
(41, 'rahul@bluecubenetwork.com', 'b', 'http://localhost/perfmon-apps/newApp.php', 'http://localhost/perfmon-apps/newApp.php', 'b', 'DDA0AFD2-FCFD-3C62-5B6D-D0267850B2DC', '89bfd2253de08189ba39cd86ad89c4ec8d2529b3c42d0537d6e1d6af55cf55e2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
