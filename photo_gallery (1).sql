-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2017 at 03:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photo_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_01_05_053847_create_admin_table', 2),
('2017_01_05_060907_create_category_table', 3),
('2017_01_05_072734_create_photogalary_table', 4),
('2017_01_05_193615_add_photo_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Shahid', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_status`, `created_at`, `updated_at`, `photo`) VALUES
(7, 'River', 1, NULL, NULL, 'galary_image/NpBsQYbuSA3NIhe1xUCU.jpg'),
(8, 'Flower', 1, NULL, NULL, 'galary_image/R5ay7YSyKNkx2TzQ4zuo.jpg'),
(9, 'Waterfall', 1, NULL, NULL, 'galary_image/Or57UhCu9k9lfrgnAK3D.jpg'),
(10, 'Tree', 1, NULL, NULL, 'galary_image/QDHJf3IvRGfUJhLex0G5.jpg'),
(11, 'Sky', 1, NULL, NULL, 'galary_image/miKNplm0Knn2hqSkFcPD.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galary`
--

CREATE TABLE `tbl_galary` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `photo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_galary`
--

INSERT INTO `tbl_galary` (`id`, `category_id`, `photo_title`, `short_description`, `photo`, `photo_status`, `created_at`, `updated_at`) VALUES
(12, 7, 'River 4', 'River 4<br>', 'galary_image/iodsRyUKhksb6JpGnWcp.jpg', 1, NULL, NULL),
(13, 7, 'River 5', 'River 5<br>', 'galary_image/JoAnWSB7SpEvjzNzPPwH.jpg', 1, NULL, NULL),
(14, 7, 'River 6', 'River 6', 'galary_image/yM1stAojFoC3CkJm2lQh.jpg', 1, NULL, NULL),
(20, 8, 'Flower 6', 'Flower 6<br>', 'galary_image/pz5NT0v4Obw2HOzRMSvA.jpg', 1, NULL, NULL),
(24, 9, 'Waterfall 4', 'Waterfall 4<br>', 'galary_image/r9qz7zoWVnFVLOXMGjQQ.jpg', 1, NULL, NULL),
(25, 9, 'Waterfall 5', 'Waterfall 5<br>', 'galary_image/rxAU4SfFqNQszlgaoS2V.jpg', 1, NULL, NULL),
(29, 10, 'Tree 4', 'Tree 4<br>', 'galary_image/WKXXmfP0r1RqaA3Pwqi2.jpg', 1, NULL, NULL),
(30, 10, 'Tree 5', 'Tree 5<br>', 'galary_image/Kfh7i4anj1B4G8YlfHYy.jpg', 1, NULL, NULL),
(32, 11, 'Sky 2', 'Sky 2<br>', 'galary_image/kT26ICZVu4AbpWQXs9FR.jpg', 1, NULL, NULL),
(33, 11, 'Sky 3', 'Sky 3<br>', 'galary_image/igOE8n9wU5ZuRElmSOpR.jpg', 1, NULL, NULL),
(34, 11, 'Sky 4', 'Sky 4<br>', 'galary_image/hT8TfGkCncCii4WAsLeY.jpg', 1, NULL, NULL),
(37, 7, 'River 2', 'River 2<br>', 'galary_image/ObUqJClpJgXXghDNMCAW.jpg', 1, NULL, NULL),
(38, 7, 'Rvier 3', 'River 3<br>', 'galary_image/ucVWcWfpG4HZo2IqwXz4.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_galary`
--
ALTER TABLE `tbl_galary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_galary`
--
ALTER TABLE `tbl_galary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
