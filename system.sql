-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2026 at 02:55 AM
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
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cnum` text NOT NULL,
  `email` text NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `sub` enum('ielts','pte','japanese') DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive',
  `image` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ielts`
--

CREATE TABLE `ielts` (
  `id` int(11) NOT NULL,
  `mode` enum('paperbased','compbased') DEFAULT NULL,
  `testdate` text DEFAULT NULL,
  `reportdate` text DEFAULT NULL,
  `listband` text DEFAULT NULL,
  `listremarks` text DEFAULT NULL,
  `readband` text DEFAULT NULL,
  `readremarks` text DEFAULT NULL,
  `writeband` text DEFAULT NULL,
  `writeremarks` text DEFAULT NULL,
  `speakband` text DEFAULT NULL,
  `speakremarks` text DEFAULT NULL,
  `score` text DEFAULT NULL,
  `wasta` enum('weak','average','good','excellent') DEFAULT NULL,
  `wascc` enum('weak','average','good','excellent') DEFAULT NULL,
  `waslr` enum('weak','average','good','excellent') DEFAULT NULL,
  `wasgra` enum('weak','average','good','excellent') DEFAULT NULL,
  `wascmt` text DEFAULT NULL,
  `sasfc` enum('weak','average','good','excellent') DEFAULT NULL,
  `saslr` enum('weak','average','good','excellent') DEFAULT NULL,
  `sasg` enum('weak','average','good','excellent') DEFAULT NULL,
  `sasp` enum('weak','average','good','excellent') DEFAULT NULL,
  `sascmt` text DEFAULT NULL,
  `impr` text DEFAULT NULL,
  `cname` text DEFAULT NULL,
  `cnum` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `contact` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `sub` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `japanese`
--

CREATE TABLE `japanese` (
  `id` int(11) NOT NULL,
  `level` text NOT NULL,
  `testdate` text DEFAULT NULL,
  `reportdate` text DEFAULT NULL,
  `vocabulary` text DEFAULT NULL,
  `grammar` text DEFAULT NULL,
  `reading` text DEFAULT NULL,
  `listening` text DEFAULT NULL,
  `score` text DEFAULT NULL,
  `resultstatus` enum('pass','borderline','needsimpro') DEFAULT NULL,
  `examremarks` text NOT NULL,
  `studyrecom` text NOT NULL,
  `cname` text DEFAULT NULL,
  `cnum` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `contact` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `sub` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pte`
--

CREATE TABLE `pte` (
  `id` int(11) NOT NULL,
  `testdate` text DEFAULT NULL,
  `reportdate` text DEFAULT NULL,
  `listband` text DEFAULT NULL,
  `readband` text DEFAULT NULL,
  `writeband` text DEFAULT NULL,
  `speakband` text DEFAULT NULL,
  `grammar` text NOT NULL,
  `oralflu` text DEFAULT NULL,
  `pro` text DEFAULT NULL,
  `vocabulary` text DEFAULT NULL,
  `spelling` text DEFAULT NULL,
  `writtendis` text DEFAULT NULL,
  `score` text DEFAULT NULL,
  `speacc` enum('low','moderate','high') DEFAULT NULL,
  `timemgmt` enum('poor','Average','excellent') DEFAULT NULL,
  `microusa` enum('needsimpro','Good') DEFAULT NULL,
  `impr` text DEFAULT NULL,
  `cname` text DEFAULT NULL,
  `cnum` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `contact` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `sub` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnum` (`cnum`) USING HASH,
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD UNIQUE KEY `contact` (`contact`) USING HASH;

--
-- Indexes for table `ielts`
--
ALTER TABLE `ielts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `japanese`
--
ALTER TABLE `japanese`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pte`
--
ALTER TABLE `pte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ielts`
--
ALTER TABLE `ielts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `japanese`
--
ALTER TABLE `japanese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pte`
--
ALTER TABLE `pte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
