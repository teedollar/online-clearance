-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 08:30 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineclearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'adminpassword');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) unsigned NOT NULL,
  `fac_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `fac_id`, `name`) VALUES
(1, 1, 'Chemistry'),
(2, 1, 'Botany'),
(3, 1, 'Computer science'),
(4, 1, 'Statistics'),
(5, 1, 'Mathematics'),
(6, 1, 'Mcrobiology'),
(7, 2, 'Political science'),
(8, 2, 'Economics'),
(9, 2, 'Geography'),
(10, 2, 'Sociology'),
(11, 3, 'Theatre art'),
(12, 3, 'Music'),
(13, 3, 'Arabic and Islamic studies'),
(14, 3, 'Religious studies'),
(15, 3, 'Classics'),
(16, 3, 'English'),
(17, 3, 'History'),
(18, 3, 'European studies'),
(19, 3, 'Communication and Language art'),
(20, 3, 'Archaeology and Anthropology'),
(21, 4, 'Law'),
(22, 5, 'Human Kinetics'),
(23, 5, 'Teacher Education'),
(24, 5, 'Adult Education'),
(25, 5, 'Educational Management'),
(26, 5, 'Guidance and Counselling');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
(1, 'Science'),
(2, 'Social Science'),
(3, 'Art'),
(4, 'Law'),
(5, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE IF NOT EXISTS `file_upload` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file` longblob NOT NULL,
  `pre_section` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `date_uploaded` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `sign` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`id`, `file_name`, `file`, `pre_section`, `section`, `date_uploaded`, `student_id`, `sign`) VALUES
(1, 'School Receipt.jpg', 0x66696c655f75706c6f61642f5363686f6f6c20526563656970742e6a7067, 3, 8, '2017-12-09', 5, 1),
(2, 'Hall Receipt.jpg', 0x66696c655f75706c6f61642f48616c6c20526563656970742e6a7067, 3, 8, '2017-12-09', 5, 1),
(3, 'Transcript_1.jpg', 0x66696c655f75706c6f61642f5472616e7363726970745f312e6a7067, 2, 10, '2017-12-09', 5, 1),
(4, 'Transcript_2.jpg', 0x66696c655f75706c6f61642f5472616e7363726970745f322e6a7067, 2, 10, '2017-12-09', 5, 1),
(5, 'School Receipt.jpg', 0x66696c655f75706c6f61642f5363686f6f6c20526563656970742e6a7067, 3, 8, '2017-12-09', 5, 1),
(6, 'Course Form.jpg', 0x66696c655f75706c6f61642f436f7572736520466f726d2e6a7067, 2, 10, '2017-12-09', 5, 1),
(7, 'Transcript_1.jpg', 0x66696c655f75706c6f61642f5472616e7363726970745f312e6a7067, 1, 2, '2017-12-09', 5, 1),
(8, 'Transcript_2.jpg', 0x66696c655f75706c6f61642f5472616e7363726970745f322e6a7067, 3, 8, '2017-12-09', 5, 1),
(9, 'School Receipt.jpg', 0x66696c655f75706c6f61642f5363686f6f6c20526563656970742e6a7067, 1, 2, '2017-12-09', 5, 1),
(10, 'Course Form.jpg', 0x66696c655f75706c6f61642f436f7572736520466f726d2e6a7067, 1, 2, '2017-12-09', 5, 1),
(11, 'School Receipt.jpg', 0x66696c655f75706c6f61642f5363686f6f6c20526563656970742e6a7067, 4, 3, '2017-12-09', 5, 1),
(12, 'School Receipt.jpg', 0x66696c655f75706c6f61642f5363686f6f6c20526563656970742e6a7067, 4, 2, '2017-12-09', 5, 1),
(13, 'School Receipt.jpg', 0x66696c655f75706c6f61642f5363686f6f6c20526563656970742e6a7067, 4, 1, '2017-12-09', 5, 1),
(14, 'School Receipt.jpg', 0x66696c655f75706c6f61642f5363686f6f6c20526563656970742e6a7067, 2, 3, '2017-12-10', 6, 1),
(15, 'School Receipt.jpg', 0x66696c655f75706c6f61642f5363686f6f6c20526563656970742e6a7067, 1, 1, '2017-12-10', 6, 0),
(16, 'Course Form.jpg', 0x66696c655f75706c6f61642f436f7572736520466f726d2e6a7067, 3, 2, '2017-12-10', 6, 1),
(17, 'School Receipt.jpg', 0x66696c655f75706c6f61642f5363686f6f6c20526563656970742e6a7067, 2, 3, '2017-12-10', 8, 0),
(18, 'Hall Receipt.jpg', 0x66696c655f75706c6f61642f48616c6c20526563656970742e6a7067, 2, 3, '2017-12-10', 8, 0),
(19, 'Course Form.jpg', 0x66696c655f75706c6f61642f436f7572736520466f726d2e6a7067, 2, 3, '2017-12-10', 9, 0),
(20, 'Hall Receipt.jpg', 0x66696c655f75706c6f61642f48616c6c20526563656970742e6a7067, 2, 3, '2017-12-10', 9, 0),
(21, 'Transcript_1.jpg', 0x66696c655f75706c6f61642f5472616e7363726970745f312e6a7067, 1, 1, '2017-12-10', 9, 0),
(22, 'Transcript_2.jpg', 0x66696c655f75706c6f61642f5472616e7363726970745f322e6a7067, 2, 3, '2017-12-10', 10, 0),
(23, 'Hall Receipt.jpg', 0x66696c655f75706c6f61642f48616c6c20526563656970742e6a7067, 4, 1, '2017-12-17', 8, 0),
(24, 'Capturenow.PNG', 0x66696c655f75706c6f61642f436170747572656e6f772e504e47, 4, 1, '2018-02-11', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE IF NOT EXISTS `hall` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `name`) VALUES
(1, 'Mellanby'),
(2, 'Kuti'),
(3, 'Bello'),
(4, 'Tedder'),
(5, 'Indepence'),
(6, 'Nnamdi Azikwe'),
(7, 'Queen Elizabeth'),
(8, 'Queen Idia'),
(9, 'Obafemi Awolowo');

-- --------------------------------------------------------

--
-- Table structure for table `pre_section`
--

CREATE TABLE IF NOT EXISTS `pre_section` (
  `id` int(11) NOT NULL,
  `pre_section_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_section`
--

INSERT INTO `pre_section` (`id`, `pre_section_name`) VALUES
(1, 'Faculty level'),
(2, 'Department level'),
(3, 'Hall level'),
(4, 'Other levels');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`) VALUES
(1, 'Bursary'),
(2, 'Jaja clinic'),
(3, 'Keneth Dike library');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE IF NOT EXISTS `signature` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `signature` longblob NOT NULL,
  `pre_section_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id`, `staff_id`, `signature`, `pre_section_id`, `section_id`) VALUES
(1, 1, 0x7369676e6174757265732f7369676e312e6a7067, 1, 2),
(3, 6, 0x7369676e6174757265732f7369676e322e6a7067, 3, 8),
(4, 4, 0x7369676e6174757265732f7369676e312e6a7067, 4, 3),
(6, 10, 0x7369676e6174757265732f7369676e312e6a7067, 4, 2),
(7, 8, 0x7369676e6174757265732f7369676e322e6a7067, 2, 10),
(8, 9, 0x7369676e6174757265732f7369676e312e6a7067, 4, 1),
(9, 7, 0x7369676e6174757265732f7369676e322e6a7067, 3, 2),
(10, 2, 0x7369676e6174757265732f7369676e312e6a7067, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(10) unsigned NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_section_id` int(11) NOT NULL,
  `section_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `surname`, `othername`, `home_address`, `email`, `password`, `phone_number`, `pre_section_id`, `section_id`) VALUES
(1, 'Olagunju', 'Adetayo Saheed', 'jhbjb jbjb', 'bhjghj@gmail.com', 'Olagunju', '09087654321', 1, '2'),
(2, 'Ikudaisi', 'Adetayo Saheed', 'jhbjb jbjb', 'bhjghj@gmail.com', 'Ikudaisi', '09087654321', 2, '3'),
(3, 'Akinlabi', 'Adetayo Saheed', 'jhh hhvh hbh', 'admin@gmail.com', 'Akinlabi', '09087654321', 3, '3'),
(4, 'Omikunle', 'Azeez', 'ghjjgj jhjgjgj gjg', 'omi@gmail.com', 'adetayo', '979789867675', 4, '3'),
(5, 'Gideon', 'Emmanuel', 'Emmanuella street. Lagos', 'emma@gmail.com', 'Gideon', '09087654334', 2, '8'),
(6, 'Owolabi', 'Elizabeth', 'Elizabeth road, Oshogbo', 'eli@gmail.com', 'Owolabi', '08123674532', 3, '8'),
(7, 'Akerele', 'Oluwashola Akin', 'UI', 'ake@gmail.com', 'Akerele', '09056128976', 3, '2'),
(8, 'Fagbenro', 'Johnson', 'Ibadan', 'gbenro@gmail.com', 'Fagbenro', '09056128976', 2, '10'),
(9, 'Ojo', 'Kehinde Bashir', 'Oyo town, Ibadan', 'ojo@gmail.com', 'Ojo', '09087654334', 4, '1'),
(10, 'Adeosun', 'Temitope Kolade', 'Osogbo, Osun state', 'adeosun@gmail.com', 'Adeosun', '09056128976', 4, '2'),
(11, 'Folayan', 'Adekunle Seun', 'Iragbiji, Osun state', 'folayan@gmail.com', 'Folayan', '09087654334', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) unsigned NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hall` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `surname`, `othername`, `home_address`, `email`, `phone_number`, `matric_no`, `password`, `faculty`, `department`, `hall`) VALUES
(5, 'Omikunle', 'Esther Abosede', 'Ui road, Ikeja', 'esther@gmail.com', '08154236754', '123456', '654321', '2', '10', '8'),
(6, 'Ogunsola', 'Akinola Caleb', 'Sango road, Samanda. Ibadan', 'calebian@gmail.com', '09056128976', '178673', '178673', '1', '3', '2'),
(7, 'Owolabi', 'Toheebat Adeola', 'No 52, Idi agbon street, Ibadan', 'owolabi@gmail.com', '09087654321', '179090', '179090', '5', '25', '8'),
(8, 'Igi Aruwe', 'Daniel Richard', 'Sango, Ibadan', 'igi@gmail.com', '08123674532', '111111', '111111', '1', '3', '2'),
(9, 'Nwachukwu', 'Caleb Akin', 'Sango, Ibadan', 'nwachukwu@gmail.com', '08123674532', '222222', '222222', '1', '3', '4'),
(10, 'Ohajinwa', 'Remy', 'Sango, Ibadan', 'remy@gmail.com', '09087654321', '333333', '333333', '1', '3', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_section`
--
ALTER TABLE `pre_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pre_section`
--
ALTER TABLE `pre_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
