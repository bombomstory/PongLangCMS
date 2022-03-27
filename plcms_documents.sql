-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 12:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponglangcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `plcms_documents`
--

CREATE TABLE `plcms_documents` (
  `id` int(11) NOT NULL,
  `documentname` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `countdownload` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plcms_documents`
--

INSERT INTO `plcms_documents` (`id`, `documentname`, `filename`, `countdownload`, `status`) VALUES
(1, 'แบบคำร้องขอแต่งตั้งอาจารย์ที่ปรึกษาสัมมนา', 'download/documents/Mathseminar.pdf', 0, 1),
(2, 'แผนการเรียนตลอดหลักสูตร 2562 - 2563', 'download/documents/MATH.pdf', 0, 1),
(3, 'แผนการเรียนตลอดหลักสูตร ปีการศึกษา 2564', 'download/documents/EDU/pdf', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plcms_documents`
--
ALTER TABLE `plcms_documents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plcms_documents`
--
ALTER TABLE `plcms_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
