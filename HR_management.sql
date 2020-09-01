-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 06:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `name`, `amount`, `desc`, `created_at`, `updated_at`, `employee_id`) VALUES
(1, 'Ahmed Hammad', '100', 'this is the awards', '2020-01-02 09:54:44', '2020-01-02 09:54:44', '3'),
(2, 'hammad', '50', 'this is the award', '2020-01-02 09:55:51', '2020-01-02 09:55:51', '3');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Nasr City', '01235468989', '2019-11-06 14:23:02', '2019-11-06 14:23:02'),
(2, 'Haram', '01135523454', '2019-11-06 14:23:13', '2019-11-06 14:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `callcenters`
--

CREATE TABLE `callcenters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `callcenters`
--

INSERT INTO `callcenters` (`id`, `customer_id`, `type`, `desc`, `created_at`, `updated_at`) VALUES
(1, '8', 'In Bound', 'this is the In Bount this is the In Bount', '2019-11-17 16:27:49', '2019-12-12 12:27:33'),
(3, '7', 'Out Bound', 'ths is the Out Abount', '2019-11-17 16:31:23', '2019-11-17 16:31:23'),
(4, '1', 'In Bound', 'wsefw', '2020-01-28 13:06:53', '2020-01-28 13:06:53'),
(5, '42', 'In Bound', 'this is the description', '2020-02-19 14:20:41', '2020-02-19 14:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `commission`, `created_at`, `updated_at`) VALUES
(2, '10', '2019-11-12 08:53:27', '2019-11-16 15:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `user_name`, `mobile`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fastkood', 'ahmedhammad', '01141730359', '123456789', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `corporates`
--

CREATE TABLE `corporates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corporates`
--

INSERT INTO `corporates` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Corporate Name', 'corporate/1575124814.png', '2019-11-30 12:40:14', '2019-11-30 12:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_passport_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name_en`, `name_ar`, `mobile_1`, `mobile_2`, `address`, `n_passport_id`, `email`, `gender`, `job`, `date_birth`, `picture`, `nationality`, `status`, `notes`, `created_at`, `updated_at`, `reference`, `commission_id`) VALUES
(42, 'mostafa', 'مصطفى', '01118763129', '8763129', 'helwan', '15641', 'ahmedhamad@gmail.com', 'male', 'work', '2020-01-02', 'customers/1581970285.jpg', 'Egypt', '1', 'this notes in the customer', '2020-02-17 18:33:45', '2020-02-26 12:55:03', NULL, NULL),
(43, 'reda magdi', 'reda magdi', '01118763129', '8763129', 'helwan', '5456451', 'test@mail.com', 'male', 'work', '2020-01-01', 'customers/1581972435.jpg', 'Egypt', '1', 'anjnjkn', '2020-02-17 18:47:47', '2020-02-17 18:47:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `manager` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `parent`, `manager`, `created_at`, `updated_at`) VALUES
(4, 'slaes', 4, 0, '2019-11-06 15:19:02', '2019-11-06 17:28:36'),
(5, 'adminstration', 0, 0, '2019-11-06 15:19:15', '2019-11-06 15:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `amount`, `desc`, `created_at`, `updated_at`, `employee_id`) VALUES
(1, 'discount', '50', 'this is the discount', '2019-11-16 15:29:46', '2019-11-18 10:27:04', '2'),
(2, 'discount', '100', 'thsi iste discount', '2019-11-18 10:28:15', '2019-11-18 10:28:15', '3');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('e','c','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `type`, `image`, `recid`, `description`, `created_at`, `updated_at`) VALUES
(15, 'e', 'documents/1573763849.png', '2', 'this is the Employee Ahmed Magdi', '2019-11-09 15:03:35', '2019-11-14 18:37:29'),
(16, 'e', 'documents/1573319302.jpg', '3', 'this is is the mohamed', '2019-11-09 15:08:22', '2019-11-09 15:08:22'),
(17, 'p', 'documents/1573321316.PNG', '7', 'this is the mohamed', '2019-11-09 15:41:57', '2019-11-16 10:46:29'),
(18, 'c', 'documents/1573644040.png', '7', 'this is the Document', '2019-11-13 09:20:40', '2019-11-13 09:20:40'),
(19, 'c', 'documents/1573644061.PNG', '7', 'this is the Doc', '2019-11-13 09:21:01', '2019-11-13 09:21:01'),
(21, 'c', 'documents/1573909321.gif', '8', 'this is the Employee', '2019-11-16 11:02:01', '2019-11-16 11:02:01'),
(22, 'c', 'documents/1582128092.jpeg', '42', 'this is the description', '2020-02-19 14:01:32', '2020-02-19 14:01:32'),
(23, 'e', 'documents/1582655231.PNG', '8', 'this is the document', '2020-02-25 16:27:11', '2020-02-25 16:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_passport_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hiring_Date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '$2y$10$BcXCo2OHmmd7UDV4sFCTgesDMzJjO9BlENjYe2JaFpJCT9ZIDwhoi',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `mobile_1`, `mobile_2`, `email`, `address`, `n_passport_id`, `job`, `salary`, `hiring_Date`, `created_at`, `updated_at`, `branch_id`, `password`, `remember_token`, `type`, `company_name`) VALUES
(13, 'Ahmed Hammad', '01141730359', '01141730359', 'ahmedhamad@gmail.com', 'helwan', '2154164584848', '2', '3000', '2020-01-02', '2020-02-26 14:19:56', '2020-02-26 14:19:56', '1', '$2y$10$BcXCo2OHmmd7UDV4sFCTgesDMzJjO9BlENjYe2JaFpJCT9ZIDwhoi', NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expencestypes`
--

CREATE TABLE `expencestypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expencestypes`
--

INSERT INTO `expencestypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'كهربا', '2019-11-14 17:33:54', '2019-11-14 17:33:54'),
(3, 'ماء', '2019-11-14 17:35:47', '2019-11-14 17:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_type`, `amount`, `employee_id`, `branch_id`, `created_at`, `updated_at`, `date`) VALUES
(6, '1', '500', '3', '1', '2019-11-14 17:55:02', '2019-11-14 18:03:00', '2019-01-01'),
(7, '3', '50', '3', '1', '2019-11-14 18:03:13', '2019-11-14 18:03:13', '2019-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`id`, `name`, `mobile`, `family`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Hammad', '01118763129', 'son', '7', '2020-01-01 14:21:43', '2020-01-01 14:21:43'),
(2, 'hammad', '01118763129', 'son', '7', '2020-01-01 14:22:13', '2020-01-01 14:41:10'),
(3, 'Samar', '01118763129', 'daughter', '8', '2020-01-02 08:24:43', '2020-01-02 08:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `fistsconds`
--

CREATE TABLE `fistsconds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fistsconds`
--

INSERT INTO `fistsconds` (`id`, `first`, `second`, `created_at`, `updated_at`) VALUES
(1, '10', '12', '2019-11-14 15:22:33', '2019-11-16 15:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Sales', 4, '2019-11-06 15:48:14', '2019-11-06 15:53:42'),
(2, 'Adminstration', 5, '2019-11-07 13:37:55', '2019-11-07 13:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `leadcenters`
--

CREATE TABLE `leadcenters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leadcenters`
--

INSERT INTO `leadcenters` (`id`, `lead_id`, `type`, `desc`, `created_at`, `updated_at`) VALUES
(1, '5', 'Out Bound', 'thsi is teh description', '2020-02-16 13:52:11', '2020-02-16 13:52:11'),
(2, '7', 'Out Bound', 'this is the description', '2020-02-17 12:33:47', '2020-02-17 12:33:47'),
(3, '8', 'Out Bound', 'this is the description', '2020-02-17 12:34:16', '2020-02-17 12:34:16'),
(4, '9', 'Out Bound', 'this is the description', '2020-02-17 12:34:32', '2020-02-17 12:34:32'),
(5, '10', 'Out Bound', 'this is the description', '2020-02-17 12:34:46', '2020-02-17 12:34:46'),
(6, '11', 'Out Bound', 'this is the description', '2020-02-17 12:35:11', '2020-02-17 12:35:11'),
(7, '12', 'In Bound', 'this is the description', '2020-02-17 12:37:30', '2020-02-17 12:37:30'),
(8, '13', 'In Bound', 'this is the description', '2020-02-17 12:40:29', '2020-02-17 12:40:29'),
(9, '15', 'In Bound', 'this is the description', '2020-02-17 12:41:40', '2020-02-17 12:41:40'),
(10, '16', 'In Bound', 'this is the description', '2020-02-17 12:42:41', '2020-02-17 12:42:41'),
(11, '17', 'In Bound', 'this is the description', '2020-02-17 12:43:30', '2020-02-17 12:43:30'),
(12, '36', 'In Bound', 'صثيةص', '2020-02-17 13:15:11', '2020-02-17 13:15:11'),
(13, '40', 'In Bound', 'wedwq', '2020-02-17 17:20:21', '2020-02-17 17:20:21'),
(14, '41', 'In Bound', 'wedwq', '2020-02-17 17:20:35', '2020-02-17 17:20:35'),
(15, '42', 'In Bound', 'dqwd,lqw;\'d', '2020-02-17 17:22:00', '2020-02-17 17:22:00'),
(16, '43', 'In Bound', 'dqwd,lqw;\'d', '2020-02-17 17:22:07', '2020-02-17 17:22:07'),
(17, '44', 'In Bound', 'dqwd,lqw;\'d', '2020-02-17 17:22:13', '2020-02-17 17:22:13'),
(18, '45', 'In Bound', 'dqwd,lqw;\'d', '2020-02-17 17:22:26', '2020-02-17 17:22:26'),
(19, '46', 'Out Bound', 'this is the descri[ption', '2020-02-17 17:23:22', '2020-02-17 17:23:22'),
(20, '48', 'Out Bound', 'this i steh description', '2020-02-17 17:25:33', '2020-02-17 17:25:33'),
(21, '49', 'In Bound', 'the is description', '2020-02-17 17:27:55', '2020-02-17 17:27:55'),
(22, '53', 'In Bound', 'this is the description', '2020-02-19 11:56:34', '2020-02-19 11:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_passport_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_media` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name_en`, `name_ar`, `mobile_1`, `mobile_2`, `address`, `n_passport_id`, `email`, `gender`, `job`, `date_birth`, `picture`, `nationality`, `notes`, `social_media`, `status`, `created_at`, `updated_at`) VALUES
(53, 'reda magdi', 'reda magdi', '01118763129', '8763129', 'helwan', '5415415', 'test@mail.com', 'male', 'work', '2020-01-01', 'customers/1581972623.jpeg', 'Egypt', '.kdnjwnj', 'Facebook', '0', '2020-02-17 18:50:23', '2020-02-17 18:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_06_154817_create_branches_table', 2),
(4, '2019_11_06_163517_create_departments_table', 3),
(5, '2019_11_06_172527_create_jobs_table', 4),
(6, '2019_11_06_181500_create_employees_table', 5),
(7, '2019_11_07_093610_create_documents_table', 6),
(8, '2019_11_07_095429_create_customers_table', 7),
(9, '2019_11_07_130418_create_payments_table', 8),
(10, '2019_11_09_105558_create_expenses_table', 9),
(11, '2019_11_10_165127_create_commisions_table', 10),
(12, '2019_11_10_170832_create_commissions_table', 11),
(13, '2019_11_11_115507_create_commissionpays_table', 12),
(14, '2019_11_11_132612_create_commissionexps_table', 13),
(15, '2019_11_12_103449_create_commissions_table', 14),
(16, '2019_11_12_111130_create_offers_table', 15),
(17, '2019_11_14_165954_create_fistsconds_table', 16),
(18, '2019_11_14_191219_create_expencestypes_table', 17),
(19, '2019_11_16_165908_create_awards_table', 18),
(20, '2019_11_16_165935_create_discounts_table', 18),
(21, '2019_11_17_145552_create_refunds_table', 19),
(22, '2019_11_17_180830_create_callcenters_table', 20),
(23, '2019_11_20_183038_create_companies_table', 21),
(24, '2019_11_21_122050_create_services_table', 22),
(25, '2019_11_30_140456_create_corporates_table', 23),
(26, '2019_12_31_152405_create_families_table', 24),
(27, '2020_01_28_120850_create_leads_table', 25),
(28, '2020_01_28_141042_create_leadcenters_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month_count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `amount`, `month_count`, `status`, `created_at`, `updated_at`, `customer_id`, `type`) VALUES
(4, 'this is the offers', '100', '2', '1', '2019-11-13 15:23:57', '2020-02-19 14:54:08', NULL, 'Renewal'),
(5, 'thi sis the offer', '50', '1', '1', '2019-11-14 16:21:46', '2020-02-19 14:54:10', NULL, 'Renewal'),
(6, 'this is the eoffer', '200', '4', '1', '2019-11-14 16:22:00', '2020-01-06 14:41:26', NULL, 'no_renewal');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `customer_id`, `payment`, `image_id`, `employee_id`, `branch_id`, `created_at`, `updated_at`) VALUES
(30, '42', '4', 'customers/1581971625.jpg', '3', '2', '2020-02-17 18:33:45', '2020-02-17 18:33:45'),
(31, '43', '4', 'customers/1581972468.jpg', '3', '2', '2020-02-17 18:47:48', '2020-02-17 18:47:48'),
(32, '44', '4', 'customers/1582550431.PNG', '8', '1', '2020-02-24 11:20:32', '2020-02-24 11:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`id`, `payment_id`, `amount`, `created_by`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, '19', '100', '2', '2019-11-17 14:01:50', '2019-11-17 14:06:37', '7'),
(3, '19', '50', '2', '2019-11-17 15:07:35', '2019-11-17 15:07:35', '7'),
(4, '25', '100', '3', '2020-02-19 14:13:22', '2020-02-19 14:13:22', '42');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `desc`, `amount`, `company_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(2, 'this is the service', '100', '6', '12', '2019-11-21 14:08:41', '2019-11-21 14:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$BcXCo2OHmmd7UDV4sFCTgesDMzJjO9BlENjYe2JaFpJCT9ZIDwhoi',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_passport_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hiring_Date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `mobile_1`, `mobile_2`, `address`, `n_passport_id`, `job`, `salary`, `hiring_Date`, `branch_id`, `type`, `company_name`) VALUES
(4, '13', 'Ahmed Hammad', 'ahmedhamad@gmail.com', NULL, '$2y$10$BcXCo2OHmmd7UDV4sFCTgesDMzJjO9BlENjYe2JaFpJCT9ZIDwhoi', NULL, '2020-02-26 14:19:56', '2020-02-26 14:19:56', '01141730359', '01141730359', 'helwan', '2154164584848', '2', '3000', '2020-01-02', '1', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `callcenters`
--
ALTER TABLE `callcenters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporates`
--
ALTER TABLE `corporates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expencestypes`
--
ALTER TABLE `expencestypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fistsconds`
--
ALTER TABLE `fistsconds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leadcenters`
--
ALTER TABLE `leadcenters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `callcenters`
--
ALTER TABLE `callcenters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `corporates`
--
ALTER TABLE `corporates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expencestypes`
--
ALTER TABLE `expencestypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fistsconds`
--
ALTER TABLE `fistsconds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leadcenters`
--
ALTER TABLE `leadcenters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
