-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 12:18 PM
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
-- Database: `prod_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `pf_admin`
--

CREATE TABLE `pf_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pf_admin`
--

INSERT INTO `pf_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `pf_genres`
--

CREATE TABLE `pf_genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `views` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pf_genres`
--

INSERT INTO `pf_genres` (`id`, `genre`, `views`) VALUES
(1, 'pop', 1),
(2, 'rock', 4),
(3, 'jazz', 1),
(4, 'hiphop', 0),
(5, 'r&b', 0),
(6, 'metal', 0),
(7, 'electronic', 1),
(8, 'classical', 2),
(9, 'folk', 0),
(10, 'reggae', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pf_music`
--

CREATE TABLE `pf_music` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `music_genre` varchar(255) NOT NULL,
  `music_name` varchar(255) NOT NULL,
  `date_released` varchar(255) NOT NULL,
  `music_file` varchar(255) NOT NULL,
  `music_banner` varchar(255) NOT NULL,
  `views` int(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pf_music`
--

INSERT INTO `pf_music` (`id`, `user`, `artist_name`, `music_genre`, `music_name`, `date_released`, `music_file`, `music_banner`, `views`, `date_created`) VALUES
(1, 'producer01', 'Denver Bondoc', 'Pop, Rock', 'Heaven Knows', 'September 28, 2022', '1664322260hardtrap exbatalion type beat.mp3', '1664322260broken.jpg', 13, 'September 28, 2022'),
(2, 'producer01', 'Carl Llemos', 'HipHop, R & B', 'Right Here at Heaven', 'September 28, 2022', '1664326715yeahyeah-brokenstringbeats.mp3', '1664326715logo.jpg', 10, 'September 28, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `pf_users`
--

CREATE TABLE `pf_users` (
  `id` int(11) NOT NULL,
  `first_signin` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `work` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `years_exp` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `pinterest` varchar(255) NOT NULL,
  `discord` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `views` int(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pf_users`
--

INSERT INTO `pf_users` (`id`, `first_signin`, `role`, `username`, `email`, `contact`, `work`, `password`, `genre`, `profile`, `banner`, `full_name`, `address`, `bdate`, `years_exp`, `bio`, `facebook`, `twitter`, `instagram`, `pinterest`, `discord`, `others`, `views`, `date_created`) VALUES
(1, 1, 'producer', 'producer01', 'producer01@test.com', '09065003256', 'Producer & Artist In Lyrical Lemonade', '5f4dcc3b5aa765d61d8327deb882cf99', 'Pop, Electronic, Reggae', '16643203662.jpg', '1664321286metal-min.jpg', 'Denver Bondoc', 'Bldg. 143 Class 20 Sector 31', 'August 31, 2022', '2', 'I am a professional RnB music producer from Taguig City. and also I had the chance to make music collaboration to various music artists/singer such as Chris Brown, Tory Lanez and other famous singers.', 'https://link.com', 'https://link.com', 'https://link.com', 'n/a', 'https://link.com', 'https://link.com', 9, 'September 28, 2022'),
(2, 1, 'producer', 'producer02', 'producer02@test.com', '09065003256', 'lorem ipsum', '5f4dcc3b5aa765d61d8327deb882cf99', 'Pop, Rock', '16643505241.jpg', 'default.jpg', 'Carl Militante Llemos', 'none', 'September 27, 2022', '2', 'lorem ipsum', 'https://link.com', 'https://link.com', 'https://link.com', 'lorem ipsum', 'https://link.com', 'lorem ipsum', 5, 'September 28, 2022'),
(3, 0, 'listener', 'listener02', 'listener02@testmail.com', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 'September 28, 2022'),
(4, 0, 'listener', 'listener01', 'listener01@testmail.com', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, 'September 28, 2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pf_admin`
--
ALTER TABLE `pf_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pf_genres`
--
ALTER TABLE `pf_genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pf_music`
--
ALTER TABLE `pf_music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pf_users`
--
ALTER TABLE `pf_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pf_admin`
--
ALTER TABLE `pf_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pf_genres`
--
ALTER TABLE `pf_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pf_music`
--
ALTER TABLE `pf_music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pf_users`
--
ALTER TABLE `pf_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
