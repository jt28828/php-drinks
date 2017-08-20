-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2017 at 02:10 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drinks`
--

-- --------------------------------------------------------

--
-- Table structure for table `bottles`
--

CREATE TABLE `bottles` (
  `bottle_id` int(11) NOT NULL,
  `bottle_name` varchar(255) NOT NULL,
  `bottle_type` varchar(255) DEFAULT NULL,
  `bottle_image` varchar(255) DEFAULT NULL,
  `alcohol_content_percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `drink_id` int(11) NOT NULL,
  `drink_name` int(11) NOT NULL,
  `drink_image` int(11) NOT NULL,
  `ingredient_1` int(11) NOT NULL,
  `ingredient_2` int(11) DEFAULT NULL,
  `ingredient_3` int(11) DEFAULT NULL,
  `ingredient_4` int(11) DEFAULT NULL,
  `ingredient_1_amount` int(11) NOT NULL,
  `ingredient_2_amount` int(11) DEFAULT NULL,
  `ingredient_3_amount` int(11) DEFAULT NULL,
  `ingredient_4_amount` int(11) DEFAULT NULL,
  `drink_color` varchar(10) DEFAULT '#2196F3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores information about drinks and their ingredients';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bottles`
--
ALTER TABLE `bottles`
  ADD PRIMARY KEY (`bottle_id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`drink_id`),
  ADD KEY `ingredient_1` (`ingredient_1`),
  ADD KEY `ingredient_2` (`ingredient_2`),
  ADD KEY `ingredient_3` (`ingredient_3`),
  ADD KEY `ingredient_4` (`ingredient_4`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bottles`
--
ALTER TABLE `bottles`
  MODIFY `bottle_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `drink_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `drinks`
--
ALTER TABLE `drinks`
  ADD CONSTRAINT `on_bottle_delete_drinks` FOREIGN KEY (`ingredient_1`) REFERENCES `bottles` (`bottle_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
