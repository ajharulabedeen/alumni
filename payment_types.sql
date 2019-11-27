-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 07:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larangular`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `amount` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `start_date`, `last_date`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(7, 'March-19 Fee', '2019-01-01', '2019-01-31', 'Update : Please pay the FEE!', '500', '2019-11-27 08:21:33', '2019-11-27 08:28:09'),
(9, 'Yearly Fee 2019!', '2019-01-01', '2019-01-31', 'Association Yearly Fees!', '500', '2019-11-27 11:42:10', '2019-11-27 11:42:10'),
(10, 'Yearly Fee 2020!', '2020-01-01', '2020-01-31', 'Association Yearly Fees!', '500', '2019-11-27 11:43:14', '2019-11-27 11:43:14'),
(11, 'Yearly Fee 2021!', '2021-01-01', '2021-01-31', 'Association Yearly Fees!', '500', '2019-11-27 11:43:20', '2019-11-27 11:43:20'),
(12, 'Sminar Python 2020!', '2019-04-01', '2019-04-30', 'Seminar On Python by Nuhil', '500', '2019-11-27 11:44:27', '2019-11-27 11:44:27'),
(13, '3 days workshop on Git!', '2019-07-01', '2019-07-31', 'How to contribute in open source project by GIT', '500', '2019-11-27 11:45:11', '2019-11-27 11:45:11'),
(14, '1 days workshop on Python!', '2019-05-01', '2019-05-15', 'Python Basic!', '500', '2019-11-27 11:48:43', '2019-11-27 11:48:43'),
(15, 'Picnic 2020', '2020-02-01', '2020-02-15', 'Picnic', '500', '2019-11-27 11:49:16', '2019-11-27 11:49:16'),
(16, 'MeetUp 2020', '2020-02-16', '2020-01-28', 'Picnic', '500', '2019-11-27 11:49:47', '2019-11-27 11:49:47'),
(17, 'MeetUp 2020', '2020-06-01', '2020-06-07', 'Picnic', '500', '2019-11-27 12:21:33', '2019-11-27 12:21:33'),
(18, 'MeetUp 2020', '2018-06-01', '2018-06-07', 'Picnic', '500', '2019-11-27 12:21:44', '2019-11-27 12:21:44'),
(19, 'MeetUp 22', '2022-06-01', '2022-06-07', 'Picnic', '700', '2019-11-27 12:22:02', '2019-11-27 12:22:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
