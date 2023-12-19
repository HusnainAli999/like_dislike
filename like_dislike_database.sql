-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 02:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `like_dislike_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `like_dislike_table`
--

CREATE TABLE `like_dislike_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_dislike_table`
--

INSERT INTO `like_dislike_table` (`id`, `user_id`, `product_id`, `is_like`) VALUES
(71, 1, 1, 1),
(73, 1, 3, 1),
(74, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration_table`
--

CREATE TABLE `registration_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `register_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_table`
--

INSERT INTO `registration_table` (`id`, `name`, `email`, `password`, `register_at`) VALUES
(1, 'husnain ali', 'husnain@gmail.com', '$2y$10$IsOMHUTmHSF167hF7uEXtu.FscFaDSu1goz8cbA5OlcFPQ4YIluSW', '2023-12-19 00:25:04'),
(2, 'faizan', 'faizan@gmail.com', '$2y$10$bBZXPoyrq03.GTHWcslBFuZHWbCXo1BkWeGjyrZxBqfxaROb.vooa', '2023-12-19 00:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `sampe_products`
--

CREATE TABLE `sampe_products` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sampe_products`
--

INSERT INTO `sampe_products` (`id`, `title`, `price`) VALUES
(1, 'SoleStyle: Elevate Your Every Step with Trendsetting Footwear', 10000),
(2, 'Footwear Finesse: Step into Fashion with Our Stylish Shoes', 1500),
(3, 'Stride in Elegance: Unleash Your Style with Premium Shoes', 5600),
(4, 'Drive in Style: Unveiling Automotive Excellence in Every Step', 7800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `like_dislike_table`
--
ALTER TABLE `like_dislike_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_table`
--
ALTER TABLE `registration_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sampe_products`
--
ALTER TABLE `sampe_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `like_dislike_table`
--
ALTER TABLE `like_dislike_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `registration_table`
--
ALTER TABLE `registration_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sampe_products`
--
ALTER TABLE `sampe_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
