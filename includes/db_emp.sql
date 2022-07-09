-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 07:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_emp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_child`
--

CREATE TABLE `tbl_child` (
  `CHILD_ID` int(11) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `MIDDLE_NAME` varchar(255) NOT NULL,
  `BIRTH_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_child`
--

INSERT INTO `tbl_child` (`CHILD_ID`, `LAST_NAME`, `FIRST_NAME`, `MIDDLE_NAME`, `BIRTH_DATE`) VALUES
(1, 'Madrelijos', 'ZeusS', 'De Guzman', '2022-07-16'),
(3, 'a', 'Johnico ', 'asdasdas', '2022-07-20'),
(4, 'Madrelijos', 'Johnico', 'Dulay', '2022-07-08'),
(5, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(6, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(7, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(8, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(9, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(10, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(11, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(12, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(13, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(14, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(15, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(16, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(17, 'Madrelijos', 'Johnico ', 'Dulay', '2022-07-08'),
(18, 'Madrelijos', 'Johnico ', 'gogogoog', '2022-07-19'),
(19, 'Madrelijos', 'Johnico ', 'gogogoogsss', '2022-07-19'),
(20, 'tavor', 'paerl', 'dulaty', '2022-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `EMP_ID` int(11) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `MIDDLE_NAME` varchar(255) NOT NULL,
  `BIRTH_DATE` date NOT NULL,
  `OFFICE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`EMP_ID`, `LAST_NAME`, `FIRST_NAME`, `MIDDLE_NAME`, `BIRTH_DATE`, `OFFICE_ID`) VALUES
(25, 'Tavor', 'Earl John', 'Dulay', '2003-02-05', 27),
(26, 'Madrelijos', 'Rafael', 'Dulay', '2006-12-04', 30),
(29, 'Aquino', 'Roferdz Nick', 'Madrelijos', '1000-10-10', 31),
(32, 'Madrelijos', 'Johnico ', 'Dulay', '2000-10-10', 28),
(33, 'Madrelijos', 'Nikko', 'Dulay', '0122-12-12', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family`
--

CREATE TABLE `tbl_family` (
  `PARENT_ID` int(11) NOT NULL,
  `CHILD_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_family`
--

INSERT INTO `tbl_family` (`PARENT_ID`, `CHILD_ID`) VALUES
(33, 1),
(33, 17),
(33, 18),
(33, 19),
(25, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_office`
--

CREATE TABLE `tbl_office` (
  `OFFICE_ID` int(11) NOT NULL,
  `OFFICE_NAME` varchar(255) NOT NULL,
  `OFFICE_LOCATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_office`
--

INSERT INTO `tbl_office` (`OFFICE_ID`, `OFFICE_NAME`, `OFFICE_LOCATION`) VALUES
(27, 'DILG - Central Office', '13'),
(28, 'DILG - Region I', '01'),
(30, 'DILG - Region III', '03'),
(31, 'DILG Region IV', '04'),
(33, 'DILG Region II', '02'),
(34, 'DILG Region V', '05'),
(35, 'DILG Region VI', '06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_region`
--

CREATE TABLE `tbl_region` (
  `region_c` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `region_m` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `region_sort` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_region`
--

INSERT INTO `tbl_region` (`region_c`, `region_m`, `abbreviation`, `region_sort`) VALUES
('01', 'REGION I - ILOCOS REGION', 'REGION 1', 2),
('02', 'REGION II - CAGAYAN VALLEY', 'REGION 2', 3),
('03', 'REGION III - CENTRAL LUZON', 'REGION 3', 4),
('04', 'REGION IV-A - CALABARZON', 'REGION 4A', 5),
('05', 'REGION V - BICOL REGION', 'REGION 5', 7),
('06', 'REGION VI - WESTERN VISAYAS', 'REGION 6', 8),
('07', 'REGION VII - CENTRAL VISAYAS', 'REGION 7', 9),
('08', 'REGION VIII - EASTERN VISAYAS', 'REGION 8', 10),
('09', 'REGION IX - ZAMBOANGA PENINSULA', 'REGION 9', 11),
('10', 'REGION X - NORTHERN MINDANAO', 'REGION 10', 12),
('11', 'REGION XI - DAVAO REGION', 'REGION 11', 13),
('12', 'REGION XII - SOCCSSARGEN', 'REGION 12', 14),
('13', 'NATIONAL CAPITAL REGION', 'NCR', 1),
('14', 'CORDILLERA ADMINISTRATIVE REGION', 'CAR', 15),
('15', 'AUTONOMOUS REGION IN MUSLIM MINDANAO', 'ARMM', 17),
('16', 'REGION XIII - CARAGA', 'CARAGA', 16),
('17', 'MIMAROPA', 'MIMAROPA1', 6),
('18', '-', '-', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `USER_ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_child`
--
ALTER TABLE `tbl_child`
  ADD PRIMARY KEY (`CHILD_ID`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD KEY `OFFICE_ID` (`OFFICE_ID`);

--
-- Indexes for table `tbl_family`
--
ALTER TABLE `tbl_family`
  ADD KEY `PARENT_ID` (`PARENT_ID`),
  ADD KEY `CHILD_ID` (`CHILD_ID`);

--
-- Indexes for table `tbl_office`
--
ALTER TABLE `tbl_office`
  ADD PRIMARY KEY (`OFFICE_ID`),
  ADD KEY `OFFICE_ID` (`OFFICE_ID`),
  ADD KEY `OFFICE_LOCATION` (`OFFICE_LOCATION`),
  ADD KEY `OFFICE_ID_2` (`OFFICE_ID`);

--
-- Indexes for table `tbl_region`
--
ALTER TABLE `tbl_region`
  ADD PRIMARY KEY (`region_c`),
  ADD KEY `region_c` (`region_c`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_child`
--
ALTER TABLE `tbl_child`
  MODIFY `CHILD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_office`
--
ALTER TABLE `tbl_office`
  MODIFY `OFFICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `tbl_employee_ibfk_1` FOREIGN KEY (`OFFICE_ID`) REFERENCES `tbl_office` (`OFFICE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_family`
--
ALTER TABLE `tbl_family`
  ADD CONSTRAINT `tbl_family_ibfk_1` FOREIGN KEY (`CHILD_ID`) REFERENCES `tbl_child` (`CHILD_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_family_ibfk_2` FOREIGN KEY (`PARENT_ID`) REFERENCES `tbl_employee` (`EMP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `tbl_employee` (`EMP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
