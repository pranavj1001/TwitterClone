-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 06:09 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitterdatabase`
--
CREATE DATABASE IF NOT EXISTS `twitterdatabase` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `twitterdatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `followingdata`
--

CREATE TABLE `followingdata` (
  `id` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `isFollowing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followingdata`
--

INSERT INTO `followingdata` (`id`, `follower`, `isFollowing`) VALUES
(2, 4, 2),
(7, 4, 3),
(11, 2, 2),
(14, 2, 4),
(15, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `tweet` text NOT NULL,
  `userid` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `tweet`, `userid`, `datetime`) VALUES
(1, 'Yolo, Guys! ', 3, '2017-01-05 00:56:59'),
(2, 'its 12:56 rn', 2, '2017-01-05 00:55:59'),
(3, 'testing another tweet', 4, '2017-01-06 22:26:54'),
(4, 'Testing this post system', 4, '2017-01-08 23:12:33'),
(5, 'Testing our new alert boxes!', 4, '2017-01-08 23:38:50'),
(6, 'Testing our new alert boxes! part 2', 4, '2017-01-08 23:40:25'),
(7, 'fixed an error', 4, '2017-01-08 23:42:44'),
(8, 'Phew!!! Finally done with this site. Cheers!!', 3, '2017-01-10 22:16:32'),
(9, 'testing our new reload functionality', 2, '2017-01-10 22:20:44'),
(10, 'and it worked', 2, '2017-01-10 22:21:00'),
(11, 'New tweet for github!', 4, '2017-01-19 12:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'asd@asd.com', '42b886de9eff22197b4ca714066ab21c'),
(2, 'asd@sad.com', '95f8d188993fbee2e202b595a7b4aec1'),
(3, 'dovah@gmail.com', '842cbdb5c0fbe55e3172de49f4fdc5ab'),
(4, 'pranav@pranav.com', '400e1c2241b6f8218fab5e2fe4067f17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followingdata`
--
ALTER TABLE `followingdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
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
-- AUTO_INCREMENT for table `followingdata`
--
ALTER TABLE `followingdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
