-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 05:05 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plant_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `collection_file` text NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `collection_id`, `collection_file`, `upload_date`) VALUES
(1, 1, 'SCAN_20210226_153315233_26022021_031957_opt.pdf', '2022-04-25'),
(2, 1, 'III_02_Pengisian_IT_Work_Order_.pdf', '2022-04-25'),
(3, 2, 'Master_List_Procedure___ARKANANTA_Management_System.pdf', '2022-04-25'),
(4, 2, 'License_Comparison_Chart_for_SAP_Business_One_-_Jan_2020_EN.pdf', '2022-04-25'),
(5, 3, 'Form_GOL_IT_Supplies_Nov_2017.pdf', '2022-04-26'),
(6, 4, 'SCAN_20210226_153315233_26022021_031957_opt1.pdf', '2022-04-26'),
(7, 5, 'SCAN_20210226_153315233_26022021_031957_opt2.pdf', '2022-04-26'),
(8, 6, 'SCAN_20210226_153315233_26022021_031957_opt.pdf', '2022-04-26'),
(9, 7, 'SCAN_20210226_153315233_26022021_031957_opt3.pdf', '2022-04-26'),
(10, 8, 'SCAN_20210226_153315233_26022021_031957_opt4.pdf', '2022-04-26'),
(11, 9, 'SCAN_20210226_153315233_26022021_031957_opt5.pdf', '2022-04-26'),
(12, 10, 'SCAN_20210226_153315233_26022021_031957_opt6.pdf', '2022-04-26'),
(13, 11, 'SCAN_20210226_153315233_26022021_031957_opt7.pdf', '2022-04-26'),
(14, 12, 'SCAN_20210226_153315233_26022021_031957_opt8.pdf', '2022-04-26'),
(15, 12, 'III_02_Pengisian_IT_Work_Order_1.pdf', '2022-04-26'),
(16, 12, 'Master_List_Procedure___ARKANANTA_Management_System1.pdf', '2022-04-26'),
(17, 12, 'Form_GOL_IT_Supplies_Nov_20171.pdf', '2022-04-26'),
(18, 13, 'SCAN_20210226_153315233_26022021_031957_opt9.pdf', '2022-04-26'),
(19, 14, 'SCAN_20210226_153315233_26022021_031957_opt1.pdf', '2022-04-26'),
(20, 15, 'SCAN_20210226_153315233_26022021_031957_opt10.pdf', '2022-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `unit_type_id` int(11) NOT NULL,
  `collection_type_id` int(11) NOT NULL,
  `collection_name` varchar(100) NOT NULL,
  `collection_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `manufacture_id`, `unit_type_id`, `collection_type_id`, `collection_name`, `collection_status`) VALUES
(1, 7, 4, 2, 'tes', 1),
(2, 7, 6, 1, 'tes2', 1),
(3, 7, 2, 4, 'tes 3', 1),
(4, 7, 3, 1, 'tes', 1),
(5, 7, 3, 1, 'tes2', 1),
(6, 1, 6, 4, 'tes', 1),
(7, 7, 1, 5, 'te', 1),
(8, 7, 1, 4, 'tes 3', 1),
(9, 7, 6, 1, 'tes', 1),
(10, 7, 2, 4, 'tes', 1),
(11, 7, 1, 5, 'tes', 1),
(12, 7, 6, 2, 'tes', 1),
(13, 7, 3, 4, 'tes', 1),
(14, 1, 6, 1, 'CAT tes', 1),
(15, 7, 4, 2, 'AC  pagination pagination-sm float-right', 1);

-- --------------------------------------------------------

--
-- Table structure for table `collection_type`
--

CREATE TABLE `collection_type` (
  `id` int(11) NOT NULL,
  `collection_type` varchar(50) NOT NULL,
  `collection_type_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collection_type`
--

INSERT INTO `collection_type` (`id`, `collection_type`, `collection_type_status`) VALUES
(1, 'Part Book', 1),
(2, 'Manual Operations', 1),
(4, 'Schematic', 1),
(5, 'Service Maintenance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(11) NOT NULL,
  `manufacture` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `manufacture_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `manufacture`, `slug`, `manufacture_status`) VALUES
(1, 'Caterpillar', 'caterpillar', 1),
(2, 'Komatsu', 'komatsu', 1),
(3, 'Volvo', 'volvo', 1),
(5, 'Sandvik', 'sandvik', 1),
(6, 'Terex', 'terex', 1),
(7, 'Atlas Copco', 'atlas-copco', 1),
(8, 'Hitachi', 'hitachi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_type`
--

CREATE TABLE `unit_type` (
  `id` int(11) NOT NULL,
  `unit_type` varchar(50) NOT NULL,
  `unit_type_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_type`
--

INSERT INTO `unit_type` (`id`, `unit_type`, `unit_type_status`) VALUES
(1, 'Off-Highway Truck', 1),
(2, 'Excavator', 1),
(3, 'Grader', 1),
(4, 'Bulldozer', 1),
(5, 'Light Vehicle', 1),
(6, 'Dump Truck', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `password`, `user_status`, `level`) VALUES
(1, 13100, 'Frizky Ramadhan', '13100', 1, 'admin'),
(6, 13283, 'Dwi Gatot Siswanto', '13283', 1, 'superuser'),
(8, 12939, 'Chanigia Ibrahim', '12939', 1, 'superuser'),
(9, 13844, 'Ary Bhinuko', '13844', 1, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collection_type_index` (`collection_type_id`),
  ADD KEY `manufacture_index` (`manufacture_id`),
  ADD KEY `unit_type_index` (`unit_type_id`);

--
-- Indexes for table `collection_type`
--
ALTER TABLE `collection_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_type`
--
ALTER TABLE `unit_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `collection_type`
--
ALTER TABLE `collection_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `unit_type`
--
ALTER TABLE `unit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collection_type_index` FOREIGN KEY (`collection_type_id`) REFERENCES `collection_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manufacture_index` FOREIGN KEY (`manufacture_id`) REFERENCES `manufactures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_type_index` FOREIGN KEY (`unit_type_id`) REFERENCES `unit_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
