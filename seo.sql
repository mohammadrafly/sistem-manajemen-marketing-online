-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2022 at 07:18 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `author`, `title`, `content`, `created_at`, `updated_at`) VALUES
(3, 3, 'Spanduk', 'spanduk di pinggir jalans', '2022-05-27 00:39:22', '2022-05-27 00:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `list_teams`
--

CREATE TABLE `list_teams` (
  `id` int(11) NOT NULL,
  `id_teams` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `join` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_teams`
--

INSERT INTO `list_teams` (`id`, `id_teams`, `id_user`, `join`) VALUES
(13, 4, 2, '2022-06-02 22:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `meta` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `categories` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `expired` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `leader` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `title`, `leader`, `created_at`, `updated_at`) VALUES
(4, 'Team Beta', 4, '2022-06-02 21:06:33', '2022-06-02 21:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` enum('Leader','Employee','Superuser','Unset') NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `teams` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `name`, `role`, `profile`, `gender`, `teams`, `created`, `updated_at`) VALUES
(2, 'employee', '$2y$10$qTkYd0iMSK8Xyicbg/oz6OI6xicDwLIpy63zbxjnjKGoOn8i8b8Q.', 'employee@smmo.com', '082376473621', 'employee', 'Employee', '1654197380_0409042fff49b69f155d.png', 'Perempuan', 4, '2022-05-26 17:49:19', '2022-05-26 17:49:19'),
(3, 'superuser', '$2y$10$uyYkxautA4IkKSPsWVdWAuubbxplq.syD.AFlOInZ0WzGGdMtIdIC', 'superuser@smmo.com', '081907861309', 'superuser', 'Superuser', '', 'Laki-laki', 0, '2022-05-26 19:34:07', '2022-05-26 19:34:07'),
(4, 'leader', '$2y$10$afEtP0UUW6rRrOnq0IMazu3MNLtdzsPlzM.Cb8MT74Hax5Xi5B4e6', 'leader@smmo.com', '089765674625', 'leader', 'Leader', '1654154869_f43b4f2eaaebed3d1520.png', 'Laki-laki', 4, '2022-05-26 19:34:47', '2022-05-26 19:34:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `list_teams`
--
ALTER TABLE `list_teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD KEY `id_teams` (`id_teams`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `categories` (`categories`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leader` (`leader`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams` (`teams`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `list_teams`
--
ALTER TABLE `list_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
