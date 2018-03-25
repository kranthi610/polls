-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2018 at 10:59 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memes`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--
-- CREATE DATABASE IF NOT EXISTS `memes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `memes`;

CREATE TABLE `images` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `imgName` varchar(64) NOT NULL,
  `imgType` varchar(3) NOT NULL,
  `date` int(15) NOT NULL,
  `imgPath` varchar(128) NOT NULL,
  `thumbPath` varchar(128) NOT NULL,
  `tags` text NOT NULL,
  `ipAddress` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `memeText`
--

CREATE TABLE `memeText` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `imageID` int(5) NOT NULL,
  `memePath` varchar(128) NOT NULL,
  `topText` varchar(128) NOT NULL,
  `botText` varchar(128) NOT NULL,
  `ipAddress` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memeText`
--
ALTER TABLE `memeText`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
