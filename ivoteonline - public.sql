-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 07:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ivoteonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'system', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidate_id` int(20) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `age` int(10) NOT NULL,
  `department` varchar(40) NOT NULL,
  `year` varchar(40) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `panel` varchar(50) NOT NULL,
  `no_of_votes` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `c_name`, `age`, `department`, `year`, `designation`, `panel`, `no_of_votes`) VALUES
(1, 'Ugam', 21, 'Comp', 'TE', 'general-secretary', 'united', 7),
(2, 'Sujal', 21, 'Comp', 'TE', 'cultural-secretary', 'pacers', 4),
(3, 'Arnav', 21, 'Comp', 'TE', 'general-secretary', 'pacers', 6),
(4, 'Rohit', 20, 'Comp', 'TE', 'sports-secretary', 'united', 2),
(6, 'Sanket', 20, 'Comp', 'TE', 'magazine-secretary', 'pacers', 21),
(9, 'Alex', 21, 'Mech', 'BE', 'sports-secretary', 'united', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voter_login`
--

CREATE TABLE `voter_login` (
  `voter_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(10) NOT NULL,
  `voted` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voter_login`
--

INSERT INTO `voter_login` (`voter_id`, `password`, `name`, `age`, `voted`) VALUES
('22CE01', 'admin', 'Vilas Ram Naik', 21, 'n'),
('22CE02', 'admin', 'Sam Robert Fernandes', 21, 'n'),
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `voter_login`
--
ALTER TABLE `voter_login`
  ADD PRIMARY KEY (`voter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
