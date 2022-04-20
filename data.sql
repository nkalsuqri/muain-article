-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2022 at 07:09 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Article-meun`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `description`, `icon`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'article1', 'non', 'files/1650349682.jpg', NULL, '2022-04-19 02:28:02', '2022-04-19 02:28:02'),
(2, 1, 'sadas', 'sdfdf', 'files/1650349746.jpg', NULL, '2022-04-19 02:29:06', '2022-04-19 02:29:06'),
(3, 2, 'dfvds', 'dvsvd', 'files/1650349757.jpg', NULL, '2022-04-19 02:29:17', '2022-04-19 02:29:17'),
(4, 5, 'xcdsv', 'sdvdv', 'files/1650349806.jpg', NULL, '2022-04-19 02:30:06', '2022-04-19 02:30:06'),
(7, 7, 'Hi', 'jhjh', 'files/1650438288.png', NULL, '2022-04-20 03:04:48', '2022-04-20 03:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE `article_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `note` text CHARACTER SET utf8,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`id`, `category`, `description`, `note`, `created_at`, `updated_at`) VALUES
(1, 'First Page', 'non', NULL, '2022-04-18 04:33:48', '2022-04-18 06:30:23'),
(2, 'Main Page', NULL, NULL, '2022-04-18 04:37:02', '2022-04-18 04:37:02'),
(5, 'Right page', NULL, NULL, '2022-04-18 06:34:44', '2022-04-18 06:34:44'),
(7, 'my category', NULL, NULL, '2022-04-20 03:04:13', '2022-04-20 03:04:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
