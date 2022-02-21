-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 05:21 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epolice`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignofficer`
--

CREATE TABLE `assignofficer` (
  `ID` int(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phoneno` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idno` int(100) NOT NULL,
  `assault` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignofficer`
--

INSERT INTO `assignofficer` (`ID`, `firstname`, `lastname`, `phoneno`, `email`, `idno`, `assault`, `rank`) VALUES
(0, 'Kinywa', 'Kimangesh', 789564512, 'jkinywa@gmail.com', 11234567, '', 'Police');

-- --------------------------------------------------------

--
-- Table structure for table `cellregistry`
--

CREATE TABLE `cellregistry` (
  `ID` int(100) NOT NULL,
  `fullnames` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `idno` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `offense` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `wanted` varchar(255) NOT NULL,
  `dates` date NOT NULL,
  `tim` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cellregistry`
--

INSERT INTO `cellregistry` (`ID`, `fullnames`, `age`, `idno`, `gender`, `occupation`, `offense`, `location`, `wanted`, `dates`, `tim`) VALUES
(1, 'Joshua Kutuny', 48, 12334515, 'Male', 'Politician', 'Embezing Funds', 'Nairobi,Kenya', 'No', '2020-02-09', '17:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `ID` int(100) NOT NULL,
  `idno` int(100) NOT NULL,
  `dates` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `assault` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`ID`, `idno`, `dates`, `location`, `assault`, `description`) VALUES
(1, 33812323, '2020-12-03', 'Mombasa,Kisauni', 'Robery', 'By Neighbor'),
(2, 12122223, '2019-08-14', 'Nairobi,Kenya', 'Robery', 'On Kimathi street at 4:pm on sunday .'),
(3, 21415204, '2020-12-02', 'Webuye', 'Robery', 'Someone has always been stealing from my shop for quite a long time.'),
(4, 37088098, '2020-02-17', 'Mombasa', 'Others', 'I got into an harsh arguement with my lecturer and he threatened me.'),
(5, 32456790, '2020-02-16', 'Nyali', 'Insault', 'Two Otek brothers at Technical University of Mombasa');

-- --------------------------------------------------------

--
-- Table structure for table `missing`
--

CREATE TABLE `missing` (
  `ID` int(100) NOT NULL,
  `path` blob NOT NULL,
  `fullnames` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `idno` int(100) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `dates` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `ID` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`ID`, `username`, `password`) VALUES
(1, 'CORPORALJOHN', 'john123'),
(2, 'DCIGEORGE', 'george123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phoneno` int(100) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `idno` int(100) NOT NULL,
  `address` int(100) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `middlename`, `lastname`, `phoneno`, `age`, `gender`, `idno`, `address`, `residence`, `email`, `password`) VALUES
(1, 'George', 'Okoth', 'Okello', 790987845, 23, 'Male', 33813419, 93, 'Mombasa', 'okoth603@gmail.com', 'e57ce41e0426a259ae4f7470e88c06e9'),
(2, 'James', 'Njuguna', 'Junior', 12124321, 21, 'Male', 9876543, 900, 'Nairobi', 'jnjuguna@gmail.com', '6d7d82ec183045a8971c1e40034135ae');

-- --------------------------------------------------------

--
-- Table structure for table `wanted`
--

CREATE TABLE `wanted` (
  `ID` int(100) NOT NULL,
  `path` blob DEFAULT NULL,
  `fullnames` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `idno` int(100) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `offense` varchar(255) NOT NULL,
  `wanted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wanted`
--

INSERT INTO `wanted` (`ID`, `path`, `fullnames`, `age`, `idno`, `gender`, `offense`, `wanted`) VALUES
(5, 0x696d6167652f667230312e6a7067, 'Joseph Kinywa', 22, 26543245, 'Male', 'Murder', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignofficer`
--
ALTER TABLE `assignofficer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cellregistry`
--
ALTER TABLE `cellregistry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `missing`
--
ALTER TABLE `missing`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wanted`
--
ALTER TABLE `wanted`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cellregistry`
--
ALTER TABLE `cellregistry`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `missing`
--
ALTER TABLE `missing`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wanted`
--
ALTER TABLE `wanted`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
