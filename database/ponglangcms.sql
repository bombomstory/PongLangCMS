-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 05:39 PM
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
-- Table structure for table `plcms_about`
--

CREATE TABLE `plcms_about` (
  `id` int(11) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plcms_about`
--

INSERT INTO `plcms_about` (`id`, `menuname`, `link`, `orders`) VALUES
(1, 'ประวัติความเป็นมา', '', '1'),
(2, 'บุคลากร', '', '2'),
(3, 'ประกันคุณภาพ', '', '3');

-- --------------------------------------------------------

--
-- Table structure for table `plcms_contact`
--

CREATE TABLE `plcms_contact` (
  `id` int(11) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plcms_contact`
--

INSERT INTO `plcms_contact` (`id`, `menuname`, `link`, `orders`) VALUES
(1, 'ติดต่อเรา', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `plcms_course`
--

CREATE TABLE `plcms_course` (
  `id` int(11) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plcms_course`
--

INSERT INTO `plcms_course` (`id`, `menuname`, `link`, `orders`) VALUES
(1, 'วท.บ. สาขาเทคโนโลยีสารสนเทศและดิจิทัล', '', '1'),
(2, 'วท.บ. สาขาวิทยาการข้อมูลและอุตสาหกรรมดิจิทัล', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `plcms_download`
--

CREATE TABLE `plcms_download` (
  `id` int(11) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plcms_download`
--

INSERT INTO `plcms_download` (`id`, `menuname`, `link`, `orders`) VALUES
(1, 'ดาวน์โหลดเอกสารหรือแบบฟอร์มต่าง ๆ', '', '1'),
(2, 'ดาวน์โหลดซอฟต์แวร์', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `plcms_menu`
--

CREATE TABLE `plcms_menu` (
  `id` int(11) NOT NULL,
  `menuname` varchar(30) NOT NULL,
  `link` varchar(255) NOT NULL,
  `orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plcms_menu`
--

INSERT INTO `plcms_menu` (`id`, `menuname`, `link`, `orders`) VALUES
(1, 'หลักสูตร', 'index2.php', 2),
(2, 'เกี่ยวกับ', 'index1.php', 1),
(3, 'ข่าวสาร', 'index3.php', 3),
(4, 'นักศึกษา', 'index4.php', 4),
(5, 'ผลงาน', 'index5.php', 5),
(6, 'ดาวน์โหลด', 'index6.php', 6),
(7, 'การติดต่อ', 'index7.php', 7);

-- --------------------------------------------------------

--
-- Table structure for table `plcms_new`
--

CREATE TABLE `plcms_new` (
  `id` int(11) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plcms_new`
--

INSERT INTO `plcms_new` (`id`, `menuname`, `link`, `orders`) VALUES
(1, 'ข่าวประชาสัมพันธ์', '', '1'),
(2, 'ภาพกิจกรรม', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `plcms_performance`
--

CREATE TABLE `plcms_performance` (
  `id` int(11) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plcms_performance`
--

INSERT INTO `plcms_performance` (`id`, `menuname`, `link`, `orders`) VALUES
(1, 'ผลงานวิชาการและงานวิจัย', '', '1'),
(2, 'ผลงานโครงการและงานบริการวิชาการ', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `plcms_student`
--

CREATE TABLE `plcms_student` (
  `id` int(11) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plcms_student`
--

INSERT INTO `plcms_student` (`id`, `menuname`, `link`, `orders`) VALUES
(1, 'นักศึกษาปัจจุบัน', '', '1'),
(2, 'ศิษย์เก่า', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `plcms_user`
--

CREATE TABLE `plcms_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plcms_user`
--

INSERT INTO `plcms_user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `mobile`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ผู้ดูแลระบบ', 'หลังบ้าน', 'por.15082542@gmail.com', '0930298443', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plcms_about`
--
ALTER TABLE `plcms_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plcms_contact`
--
ALTER TABLE `plcms_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plcms_course`
--
ALTER TABLE `plcms_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plcms_download`
--
ALTER TABLE `plcms_download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plcms_menu`
--
ALTER TABLE `plcms_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plcms_new`
--
ALTER TABLE `plcms_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plcms_performance`
--
ALTER TABLE `plcms_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plcms_student`
--
ALTER TABLE `plcms_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plcms_user`
--
ALTER TABLE `plcms_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plcms_about`
--
ALTER TABLE `plcms_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plcms_contact`
--
ALTER TABLE `plcms_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plcms_course`
--
ALTER TABLE `plcms_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plcms_download`
--
ALTER TABLE `plcms_download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plcms_menu`
--
ALTER TABLE `plcms_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `plcms_new`
--
ALTER TABLE `plcms_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plcms_performance`
--
ALTER TABLE `plcms_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plcms_student`
--
ALTER TABLE `plcms_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plcms_user`
--
ALTER TABLE `plcms_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
