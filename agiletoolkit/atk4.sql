-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 11:00 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `atk4`
--

-- --------------------------------------------------------

--
-- Table structure for table `combo1`
--

CREATE TABLE `combo1` (
  `id` int(11) NOT NULL,
  `col1` varchar(255) NOT NULL,
  `col2` varchar(255) NOT NULL,
  `col3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `combo1`
--

INSERT INTO `combo1` (`id`, `col1`, `col2`, `col3`) VALUES
(1, 'col1', 'col2', 0),
(2, '2 DDD', '2 DD', 0),
(3, '3 DD', '3 DD', 0),
(4, '4 DD', '4 DD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `crud1`
--

CREATE TABLE `crud1` (
  `id` int(11) NOT NULL,
  `id_combo` int(11) NOT NULL,
  `col3` varchar(255) NOT NULL,
  `col1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud1`
--

INSERT INTO `crud1` (`id`, `id_combo`, `col3`, `col1`) VALUES
(1, 4, '4 DD', 0),
(8, 1, 'aaaaa', 0),
(9, 1, 'uuu ssss', 0),
(10, 2, 'jjj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(2, 'HHHHAAAA', 'cw00011', 'berlingo'),
(3, 'dddd', 'cw00011', 'berlingo'),
(4, 'UUUAA', 'cw00011', 'berlingo'),
(5, 'AAAAAA', 'cw00011', 'berlingo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `combo1`
--
ALTER TABLE `combo1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud1`
--
ALTER TABLE `crud1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_combo1` (`id_combo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `combo1`
--
ALTER TABLE `combo1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crud1`
--
ALTER TABLE `crud1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crud1`
--
ALTER TABLE `crud1`
  ADD CONSTRAINT `fk_combo1` FOREIGN KEY (`id_combo`) REFERENCES `combo1` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
