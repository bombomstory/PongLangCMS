-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2022 at 12:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

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
-- Table structure for table `plcms_menu`
--

CREATE TABLE `plcms_menu` (
  `ID` int(11) NOT NULL,
  `menuname` varchar(30) NOT NULL,
  `link` varchar(255) NOT NULL,
  `orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plcms_menu`
--

INSERT INTO `plcms_menu` (`ID`, `menuname`, `link`, `orders`) VALUES
(1, 'หน้าหลัก', 'index.php', 1),
(2, 'เกี่ยวกับ', 'index.php', 6),
(3, 'โดเมน', 'index.php', 2),
(4, 'โฮสติ้ง', 'index.php', 3),
(5, 'ติดต่อเรา', 'index.php', 7),
(6, 'ข่าวประชาสัมพันธ์', 'news.php', 4),
(7, 'ร่วมงานกับเรา', 'jobs.php', 5);

-- --------------------------------------------------------

--
-- Table structure for table `plcm_news`
--

CREATE TABLE `plcm_news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `orders` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plcm_news`
--

INSERT INTO `plcm_news` (`id`, `title`, `content`, `image`, `orders`) VALUES
(6, 'test 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1648371253.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plcms_menu`
--
ALTER TABLE `plcms_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `plcm_news`
--
ALTER TABLE `plcm_news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plcms_menu`
--
ALTER TABLE `plcms_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plcm_news`
--
ALTER TABLE `plcm_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
