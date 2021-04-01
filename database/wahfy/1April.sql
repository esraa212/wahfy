-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2021 at 06:31 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wahfy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` bigint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `user_name`, `email`, `password`, `remember_token`, `image`, `created_at`, `updated_at`, `supplier_id`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$fcTcXV4lG4JD7U/MkUpQ.Oth4D3wDugb6PrRpfQGwgj756qrRwhmO', 'ZBMicvYlErxCfnEnkA6qiYXVMeDgYHE88ym08f7LzESmL6gWZkNMHxsbHp9J', NULL, '2021-02-15 09:37:20', '2021-02-15 09:37:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `advertisments`
--

CREATE TABLE `advertisments` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `city_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `area_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisments`
--

INSERT INTO `advertisments` (`id`, `title`, `description`, `image`, `from`, `to`, `city_id`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 'fsd', 'dfds', '/uploads/advertisments/1615454006.jpg', '2021-02-05 00:00:00', '2021-02-16 00:00:00', '[\"3\",\"4\"]', '[\"0\"]', '2021-02-18 13:56:17', '2021-03-11 07:13:26'),
(3, 'test2', 'gdsg', '/uploads/advertisments/1615454101.jpg', '2021-03-03 00:00:00', '2021-03-05 00:00:00', '[\"3\"]', '[\"0\",\"4\"]', '2021-03-11 07:15:01', '2021-03-11 07:15:01'),
(4, 'tst3', 'fdsf', '/uploads/advertisments/1615454128.jpg', '2016-06-11 00:00:00', '2021-02-16 00:00:00', '[\"4\"]', '[\"0\",\"3\"]', '2021-03-11 07:15:28', '2021-03-11 07:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Nasr City', 1, '2021-02-16 12:40:45', '2021-02-16 12:40:45'),
(3, '6 October', 4, '2021-02-18 13:31:40', '2021-02-18 13:31:40'),
(4, 'San Stifano', 3, '2021-02-18 13:32:03', '2021-02-18 13:32:03'),
(5, '5th settelemet', 1, '2021-02-18 13:32:21', '2021-02-18 13:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('size','material','length','width') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'size',
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(2, 'size', 's', '2021-03-24 12:08:49', '2021-03-24 12:08:49'),
(3, 'size', 'm', '2021-03-24 12:08:58', '2021-03-24 12:08:58'),
(4, 'size', 'l', '2021-03-24 12:09:07', '2021-03-24 12:09:07'),
(7, 'size', 'xs', '2021-03-28 08:25:19', '2021-03-28 08:25:19'),
(8, 'size', 'xxs', '2021-03-28 08:25:27', '2021-03-28 08:25:27'),
(9, 'size', 'xl', '2021-03-28 08:25:40', '2021-03-28 08:25:40'),
(10, 'size', 'xxl', '2021-03-28 08:25:51', '2021-03-28 08:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test tets tets ttets t', '/uploads/banners/1614691910.png', 1, 1, '2021-03-02 07:52:50', '2021-03-02 11:31:50'),
(2, 'test2', 'test tets tets ttets t', '/uploads/banners/1614691930.png', 1, 2, '2021-03-02 07:53:24', '2021-03-02 11:32:10'),
(5, 'test', 'hello welcome to our website', '/uploads/banners/1615130185.png', 1, 4, '2021-03-07 13:16:25', '2021-03-07 13:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `industry_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `industry_id`, `image`) VALUES
(1, 'Women', '2021-02-16 13:39:32', '2021-03-07 11:09:21', 1, NULL),
(6, 'Men', '2021-03-03 10:15:46', '2021-03-07 11:09:12', 1, NULL),
(7, 'Kids', '2021-03-07 11:09:30', '2021-03-11 10:39:04', 1, '/uploads/categories/1615466344.jpg'),
(18, 'TV', '2021-03-14 12:09:39', '2021-03-14 12:09:39', 4, '/uploads/categories/1615730979.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'cairo', '2021-02-16 11:49:20', '2021-02-16 12:00:22'),
(3, 'Alexandria', '2021-02-18 13:31:08', '2021-02-18 13:31:08'),
(4, 'Giza', '2021-02-18 13:31:18', '2021-02-18 13:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'red', '2021-03-28 08:32:29', '2021-03-28 08:32:29'),
(3, 'black', '2021-03-28 08:32:37', '2021-03-28 08:32:37'),
(4, 'blue', '2021-03-28 08:32:45', '2021-03-28 08:32:45'),
(5, 'pink', '2021-03-28 08:32:55', '2021-03-28 08:32:55'),
(6, 'grey', '2021-03-28 08:33:07', '2021-03-28 08:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `area_id` bigint UNSIGNED NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `mobile`, `city_id`, `area_id`, `address`, `created_at`, `updated_at`, `categories`) VALUES
(1, 'Esraa', 'esraammotafa@gmail.com', NULL, '$2y$10$980r8/wuS3XkQc8QZZr1fO/poHPCOryBEw5kX/u9WYxlkJtxqkxTm', NULL, '01113265845', 4, 3, 'address', '2021-02-21 09:47:54', '2021-03-07 13:04:02', '[\"1\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]'),
(2, 'Esraa', 'admin@esraa.com', NULL, '$2y$10$qybvXJ75sMWXJ08OoL7x2.CIT9VM/0gWSDlLQ4irV08JNaPQQwr0e', NULL, '01112376543', 1, 5, 'adddress', '2021-02-25 10:44:25', '2021-02-25 10:44:25', 'null'),
(3, 'Esraa Mosafa Elsyaed', 'aa@a.com', NULL, '$2y$10$7tsFKEtbmDd.i0uUqyo83u29.f7gh/zQpXSdnMXJX.2s7mIbrSndm', NULL, '01112354789', 3, 4, 'test address', '2021-02-25 10:48:24', '2021-02-25 10:48:24', '[\"1\",\"5\"]'),
(4, 'test21', 'tt@r.com', NULL, '$2y$10$jxd/b9BjOD45tgge8Uo2.OI80Xt.1W6zp8pKetOFiHTDC5f0L0KoG', NULL, '01112345678', 1, 1, 'as', '2021-02-25 10:51:10', '2021-02-25 10:51:10', '[\"1\",\"5\"]'),
(5, 'Esraa APi', 'esraa@api.com', NULL, '$2y$10$8FZbtseABMzxlq5wgd/ynO5eXTxnqECh4nE2ZD7s4tC.RFMDOcr.e', NULL, '01112354678', 1, 1, 'address api', '2021-02-25 14:04:28', '2021-02-25 14:04:28', 'null'),
(6, 'Esraa APi2', 'esraa@api22.com', NULL, '$2y$10$e8ehOpkL1a1DxCX8SEAjyOjopF00BuFlUrJ.Dts8S.8gcQUdtAb16', NULL, '01112354676', 1, 1, 'address api', '2021-02-25 14:12:09', '2021-02-25 14:12:09', '\"1,5\"'),
(7, 'Esraa MM', 'test@esraa.com', NULL, '$2y$10$JznkHR.WvrAJr9z6R0pXw.bB./AHeYC5v49cPxpF1UImXWAXy1oxO', NULL, '01113256478', 1, 1, 'retret ert', '2021-03-09 12:16:56', '2021-03-09 12:16:56', '[\"1\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `price_before` decimal(10,2) NOT NULL,
  `price_after` decimal(10,2) NOT NULL,
  `discount_type` enum('precentage','amount') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `product_id`, `supplier_id`, `price_before`, `price_after`, `discount_type`, `discount_value`, `created_at`, `updated_at`, `active`) VALUES
(1, 1, 1, '1000.00', '900.00', 'precentage', '10.00', '2021-03-03 08:03:32', '2021-03-03 08:03:32', 1),
(4, 8, 1, '1000.00', '900.00', 'precentage', '10.00', '2021-03-07 11:44:47', '2021-03-07 11:44:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dialogs`
--

CREATE TABLE `dialogs` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('inquiry','complain') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `feedback_text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `reply` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_text`, `product_id`, `customer_id`, `supplier_id`, `created_at`, `updated_at`, `status`, `reply`) VALUES
(1, 'very good Product I love IT', 1, 1, 1, NULL, '2021-03-07 13:09:10', 1, 'gh'),
(2, 'nice', 7, 1, 1, '2021-03-07 08:36:02', '2021-03-07 10:26:15', 1, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Fashion', '2021-02-17 08:28:47', '2021-03-11 14:48:42', '/uploads/industries/1615481322.jpg'),
(3, 'Cars', '2021-03-07 10:59:13', '2021-03-11 14:48:10', '/uploads/industries/1615481290.jpg'),
(4, 'Electronics', '2021-03-07 10:59:26', '2021-03-11 14:48:25', '/uploads/industries/1615481305.jpg'),
(5, 'Food', '2021-03-07 10:59:56', '2021-03-11 14:48:58', '/uploads/industries/1615481338.jpg'),
(6, 'Furniture', '2021-03-07 11:00:35', '2021-03-11 14:51:27', '/uploads/industries/1615481487.png'),
(7, 'Perfumes', '2021-03-07 11:00:55', '2021-03-11 14:49:17', '/uploads/industries/1615481357.jpg'),
(8, 'Makeup', '2021-03-07 11:04:12', '2021-03-11 14:52:21', '/uploads/industries/1615481541.jpg'),
(9, 'yr', '2021-03-11 09:07:19', '2021-03-11 10:11:35', '/uploads/industries/1615464695.jpg'),
(10, 'Esraa', '2021-03-11 09:14:40', '2021-03-11 09:14:40', '/uploads/industries/1615461280.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `dialog_id` bigint UNSIGNED NOT NULL,
  `sender_id` bigint NOT NULL,
  `receiver_id` bigint NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_read` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_15_100943_create_admins_table', 1),
(14, '2021_02_15_115437_create_cities_table', 2),
(15, '2021_02_15_115637_create_areas_table', 2),
(16, '2021_02_15_120335_create_industries_table', 2),
(17, '2021_02_15_120519_create_categories_table', 2),
(18, '2021_02_15_120555_create_sub_categories_table', 2),
(19, '2021_02_15_123013_create_suppliers_table', 2),
(20, '2021_02_15_135933_create_product_categories_table', 2),
(21, '2021_02_15_140526_create_product_sub_categories_table', 2),
(22, '2021_02_15_142131_create_products_table', 2),
(23, '2021_02_15_151120_create_customers_table', 2),
(24, '2021_02_15_152827_create_favorites_table', 2),
(25, '2021_02_15_153411_create_ratings_table', 2),
(26, '2021_02_15_160119_create_feedback_table', 2),
(27, '2021_02_15_161230_create_dialogs_table', 2),
(28, '2021_02_15_161744_create_messages_table', 2),
(29, '2021_02_15_162823_create_notifications_table', 2),
(30, '2021_02_15_163947_create_advertisments_table', 2),
(31, '2021_02_15_164530_create_payments_table', 2),
(32, '2021_02_15_164847_create_orders_table', 2),
(33, '2021_02_15_165438_create_order_product_table', 2),
(34, '2021_02_16_100136_add_favorite_categories_to_customers', 3),
(35, '2021_02_16_100532_add_like_to_ratings', 3),
(36, '2021_02_16_101140_add_supplier_id_to_admins', 3),
(37, '2021_02_21_145221_create_tokens_table', 4),
(38, '2021_02_22_104956_add_customer_id_and_transaction_id_to_payments', 5),
(39, '2021_02_23_110017_add_status_and_reply_to_feedback', 6),
(40, '2021_02_23_153056_add_subject_and_type_to_dialogs', 7),
(41, '2021_03_02_082555_create_banners_table', 8),
(42, '2021_03_02_083206_create_deals_table', 8),
(44, '2021_03_03_103830_add_active_to_deals', 9),
(45, '2021_03_03_115931_add_industry_id_to_categories', 10),
(46, '2021_03_07_093111_add_supplie_id_to_product_categories', 11),
(47, '2021_03_08_103130_add_color_and_size_to_products', 12),
(48, '2021_03_11_103002_add_image_to_industries', 13),
(49, '2021_03_11_103120_add_image_to_categories', 13),
(51, '2021_03_11_133659_create_subscriptions_table', 14),
(52, '2021_03_24_130824_create_attributes_table', 15),
(53, '2021_03_24_131904_create_products_attributes_table', 15),
(54, '2021_03_25_134050_add_supplier_id_to_ratings', 16),
(55, '2021_03_28_093630_create_colors_table', 17),
(56, '2021_03_28_094538_add_color_id_to_products_attributes', 18),
(57, '2021_03_30_090603_add_image_to_suppliers', 19);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `area_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `push_button` int NOT NULL DEFAULT '0',
  `seen` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `city_id`, `area_id`, `push_button`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'test', 'djakldj', '[\"3\"]', '[\"4\"]', 0, 0, '2021-02-21 13:37:28', '2021-02-21 13:37:28'),
(4, 't2', '22', '[\"1\",\"4\"]', '[\"0\",\"1\"]', 1, 0, '2021-02-21 13:43:39', '2021-02-21 13:43:39'),
(5, 'test', 'djakldj', '[\"1\"]', '[\"0\",\"1\"]', 1, 0, '2021-02-21 13:44:16', '2021-02-21 13:44:16'),
(7, 'ttt', 'asdsa', '[\"3\"]', '[\"0\",\"4\"]', 1, 0, '2021-02-21 14:57:33', '2021-02-21 14:57:33'),
(8, 'ttt', 'asdsa', '[\"3\"]', '[\"0\",\"4\"]', 1, 0, '2021-02-21 14:59:07', '2021-02-21 14:59:07'),
(9, 'ttt', 'asdsa', '[\"3\"]', '[\"0\",\"4\"]', 1, 0, '2021-02-21 15:02:04', '2021-02-21 15:02:04'),
(10, 'ttt', 'asdsa', '[\"3\"]', '[\"0\",\"4\"]', 1, 0, '2021-02-21 15:13:00', '2021-02-21 15:13:00'),
(11, 'wsd', 'djakldj', '[\"3\"]', 'null', 1, 0, '2021-02-21 15:13:13', '2021-02-21 15:13:13'),
(12, 'wsd', 'djakldj', '[\"3\"]', 'null', 1, 0, '2021-02-21 15:52:36', '2021-02-21 15:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `payment_id` bigint UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total_value` decimal(10,2) NOT NULL,
  `shipping` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `payment_id`, `order_date`, `tax`, `subtotal`, `total_value`, `shipping`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-03-31', '0.00', '0.00', '1000.00', '0.00', '2021-03-31 14:10:45', '2021-03-31 14:10:45'),
(2, 1, 2, '2021-03-31', '0.00', '0.00', '1000.00', '0.00', '2021-03-31 14:10:50', '2021-03-31 14:10:50'),
(3, 1, 3, '2021-03-31', '0.00', '0.00', '1000.00', '0.00', '2021-03-31 14:12:25', '2021-03-31 14:12:25'),
(4, 1, 4, '2021-03-31', '0.00', '0.00', '5000.00', '0.00', '2021-03-31 14:31:42', '2021-03-31 14:31:42'),
(5, 1, 5, '2021-03-31', '0.00', '0.00', '1000.00', '0.00', '2021-03-31 14:32:09', '2021-03-31 14:32:09'),
(6, 1, 6, '2021-03-31', '0.00', '0.00', '5000.00', '0.00', '2021-03-31 14:32:28', '2021-03-31 14:32:28'),
(7, 1, 7, '2021-03-31', '0.00', '0.00', '5000.00', '0.00', '2021-03-31 14:32:41', '2021-03-31 14:32:41'),
(8, 1, 8, '2021-03-31', '0.00', '0.00', '5000.00', '0.00', '2021-03-31 14:33:14', '2021-03-31 14:33:14'),
(9, 1, 9, '2021-03-31', '0.00', '0.00', '1000.00', '0.00', '2021-03-31 14:35:26', '2021-03-31 14:35:26'),
(10, 1, 10, '2021-03-31', '0.00', '0.00', '1000.00', '0.00', '2021-03-31 14:37:57', '2021-03-31 14:37:57'),
(11, 1, 11, '2021-03-31', '0.00', '0.00', '1000.00', '0.00', '2021-03-31 14:39:28', '2021-03-31 14:39:28'),
(12, 1, 12, '2021-03-31', '0.00', '0.00', '1000.00', '0.00', '2021-03-31 14:40:45', '2021-03-31 14:40:45'),
(13, 1, 13, '2021-03-31', '0.00', '0.00', '1000.00', '0.00', '2021-03-31 14:41:18', '2021-03-31 14:41:18'),
(14, 1, 14, '2021-03-31', '0.00', '0.00', '1000.00', '0.00', '2021-03-31 14:56:49', '2021-03-31 14:56:49'),
(15, 1, 15, '2021-04-01', '0.00', '0.00', '900.00', '0.00', '2021-04-01 12:26:05', '2021-04-01 12:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 2, 1, 1, NULL, NULL),
(3, 3, 1, 1, NULL, NULL),
(4, 5, 1, 1, NULL, NULL),
(5, 9, 8, 1, NULL, NULL),
(6, 10, 1, 1, NULL, NULL),
(7, 11, 1, 1, NULL, NULL),
(8, 12, 8, 1, NULL, NULL),
(9, 13, 8, 1, NULL, NULL),
(10, 14, 1, 1, NULL, NULL),
(11, 15, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `transaction_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `payment_date`, `status`, `method`, `created_at`, `updated_at`, `customer_id`, `transaction_id`) VALUES
(1, '1000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:10:45', '2021-03-31 14:10:45', 1, NULL),
(2, '1000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:10:50', '2021-03-31 14:10:50', 1, NULL),
(3, '1000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:12:25', '2021-03-31 14:12:25', 1, NULL),
(4, '5000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:31:42', '2021-03-31 14:31:42', 1, NULL),
(5, '1000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:32:09', '2021-03-31 14:32:09', 1, NULL),
(6, '5000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:32:28', '2021-03-31 14:32:28', 1, NULL),
(7, '5000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:32:41', '2021-03-31 14:32:41', 1, NULL),
(8, '5000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:33:13', '2021-03-31 14:33:13', 1, NULL),
(9, '1000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:35:26', '2021-03-31 14:35:26', 1, NULL),
(10, '1000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:37:57', '2021-03-31 14:37:57', 1, NULL),
(11, '1000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:39:28', '2021-03-31 14:39:28', 1, NULL),
(12, '1000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:40:45', '2021-03-31 14:40:45', 1, NULL),
(13, '1000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:41:17', '2021-03-31 14:41:17', 1, NULL),
(14, '1000.00', '2021-03-31', 'pendding', 'cash_on_delivery', '2021-03-31 14:56:48', '2021-03-31 14:56:48', 1, NULL),
(15, '900.00', '2021-04-01', 'pendding', 'cash_on_delivery', '2021-04-01 12:26:05', '2021-04-01 12:26:05', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT '0.00',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `quantity` int DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` bigint UNSIGNED NOT NULL,
  `product_sub_category_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `tax`, `active`, `quantity`, `image`, `product_category_id`, `product_sub_category_id`, `supplier_id`, `created_at`, `updated_at`, `color`, `size`) VALUES
(1, 'test', 'r3rd', '1000.00', '2.00', 1, 10, '/uploads/products/1613651664.jpeg', 1, 1, 1, '2021-02-18 09:10:23', '2021-02-18 10:34:24', 'black', ''),
(7, 'test2', 'rwerwer', '200.00', '0.00', 1, 10, '/uploads/products/1614787096.jpg', 1, 1, 1, '2021-03-03 13:58:16', '2021-03-03 13:58:16', 'black', ''),
(8, 'red dress', 'very beautifull dress', '1000.00', '0.00', 1, 5, '/uploads/products/1615124663.jpg', 3, 3, 1, '2021-03-07 11:44:23', '2021-03-07 11:44:23', '', ''),
(9, 'wide leg panys', 'very good product', '1000.00', '0.00', 1, 10, '/uploads/products/1615204088.jpg', 1, 1, 1, '2021-03-08 09:48:08', '2021-03-08 09:48:08', 'Blue', 's'),
(13, 'jeans', 'wide jeans', '1000.00', '0.00', 1, NULL, '/uploads/products/1616937285.jpg', 1, 1, 1, '2021-03-28 11:14:45', '2021-03-28 11:14:45', NULL, NULL),
(15, 'long Dress1', 'wide Long Dress', '1000.00', '0.00', 1, NULL, '/uploads/products/1616937713.jpg', 3, 3, 1, '2021-03-28 11:21:53', '2021-03-30 08:23:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `attribute_id`, `product_id`, `quantity`, `value`, `attribute`, `created_at`, `updated_at`, `color_id`) VALUES
(1, 3, 13, 5, NULL, 'size', NULL, NULL, 3),
(2, 7, 13, 5, NULL, 'size', NULL, NULL, 3),
(3, 3, 13, 6, NULL, 'size', NULL, NULL, 4),
(4, 7, 13, 6, NULL, 'size', NULL, NULL, 4),
(5, 3, 15, 10, NULL, 'size', NULL, NULL, 2),
(6, 4, 15, 22, NULL, 'size', NULL, NULL, 5),
(7, 3, 15, 10, NULL, 'size', NULL, NULL, 2),
(8, 4, 15, 3, NULL, 'size', NULL, NULL, 6),
(9, 4, 15, 22, NULL, 'size', NULL, NULL, 5),
(12, 3, 15, 10, NULL, 'size', NULL, NULL, 2),
(13, 4, 15, 22, NULL, 'size', NULL, NULL, 5),
(14, 3, 15, 10, NULL, 'size', NULL, NULL, 2),
(15, 4, 15, 3, NULL, 'size', NULL, NULL, 6),
(16, 4, 15, 22, NULL, 'size', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`, `supplier_id`) VALUES
(1, 'Men', '2021-02-17 13:31:59', '2021-03-07 11:12:55', 1),
(3, 'Women', '2021-03-07 11:12:46', '2021-03-07 11:12:46', 1),
(4, 'kids', '2021-03-07 11:13:16', '2021-03-07 11:13:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`id`, `name`, `product_category_id`, `created_at`, `updated_at`) VALUES
(1, 'pants', 1, '2021-02-17 13:53:00', '2021-03-07 11:13:35'),
(3, 'Dresses', 3, '2021-03-07 11:14:16', '2021-03-07 11:14:16'),
(4, 'pullover', 4, '2021-03-07 11:14:33', '2021-03-07 11:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `value` int NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `like` int NOT NULL DEFAULT '0',
  `supplier_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `value`, `description`, `product_id`, `customer_id`, `created_at`, `updated_at`, `like`, `supplier_id`) VALUES
(1, 4, 'i love it', 1, 1, NULL, '2021-03-03 13:54:23', 1, 1),
(2, 5, 'very good Product', 7, 1, '2021-03-03 14:03:44', '2021-03-03 14:06:03', 1, NULL),
(3, 4, 'cvc', 8, 1, '2021-03-28 13:41:35', '2021-03-28 13:41:35', 0, 1),
(4, 5, 'gj', 8, 1, '2021-03-28 13:47:21', '2021-03-28 13:47:21', 0, 1),
(5, 2, 're', 8, 1, '2021-03-28 13:50:19', '2021-03-28 13:50:19', 0, 1),
(6, 3, 'sassa', 8, 1, '2021-03-28 13:52:07', '2021-03-28 13:52:07', 0, 1),
(7, 2, 'nb', 8, 1, '2021-03-28 13:52:41', '2021-03-28 13:52:41', 0, 1),
(8, 5, 'nbjkj', 8, 1, '2021-03-28 13:52:49', '2021-03-28 13:52:49', 0, 1),
(9, 5, 'nice', 1, 1, '2021-04-01 11:45:53', '2021-04-01 11:45:53', 0, 1),
(10, 4, 'Love It', 1, 1, '2021-04-01 11:46:17', '2021-04-01 11:46:17', 0, 1),
(11, 5, 'Okay', 15, 1, '2021-04-01 11:46:34', '2021-04-01 11:46:34', 0, 1),
(12, 5, 'dad', 9, 1, '2021-04-01 12:22:08', '2021-04-01 12:22:08', 0, 1),
(13, 3, 'gfdgfd', 9, 1, '2021-04-01 12:22:38', '2021-04-01 12:22:38', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin@esraa.com', '2021-03-11 12:20:30', '2021-03-11 12:20:30'),
(2, 'test@esraa.com', '2021-03-11 12:21:29', '2021-03-11 12:21:29'),
(3, 'admin@admin.com', '2021-03-11 12:46:59', '2021-03-11 12:46:59'),
(4, 'esraa@admin.com', '2021-03-11 12:55:01', '2021-03-11 12:55:01'),
(5, 'hh@l.com', '2021-03-11 12:56:45', '2021-03-11 12:56:45'),
(6, 'hh@s.cokj', '2021-03-11 12:57:30', '2021-03-11 12:57:30'),
(7, 'hh@l.nom', '2021-03-11 12:58:39', '2021-03-11 12:58:39'),
(8, 'hj@s.bom', '2021-03-11 12:59:11', '2021-03-11 12:59:11'),
(9, 'd@f.hom', '2021-03-11 13:03:06', '2021-03-11 13:03:06'),
(10, 'dg@j.nom', '2021-03-11 13:06:10', '2021-03-11 13:06:10'),
(11, 'hv@g.jol', '2021-03-11 13:06:54', '2021-03-11 13:06:54'),
(12, 'hj@s.vom', '2021-03-11 13:12:24', '2021-03-11 13:12:24'),
(13, 'rt@h.bon', '2021-03-11 13:13:41', '2021-03-11 13:13:41'),
(14, 'g@a.com', '2021-03-11 13:18:24', '2021-03-11 13:18:24'),
(15, 'df@h.nom', '2021-03-11 13:18:48', '2021-03-11 13:18:48'),
(16, 'tt@w.com', '2021-03-11 14:12:15', '2021-03-11 14:12:15'),
(17, 's@admin.com', '2021-03-28 13:39:13', '2021-03-28 13:39:13'),
(18, 'ee@e.com', '2021-04-01 12:00:14', '2021-04-01 12:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Pants', 1, '2021-02-16 14:18:06', '2021-03-07 11:11:43'),
(3, 'accessories', 1, '2021-03-07 11:12:13', '2021-03-07 11:12:13'),
(4, 'Dresses', 1, '2021-03-07 11:12:25', '2021-03-07 11:12:25'),
(5, 'Smart tv', 18, '2021-03-14 12:10:03', '2021-03-14 12:10:03'),
(6, 'LED Tvs', 18, '2021-03-14 12:10:26', '2021-03-14 12:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `area_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `industry_id`, `city_id`, `area_id`, `category_id`, `sub_category_id`, `created_at`, `updated_at`, `image`) VALUES
(1, 'H&M', 'Salah Salem str', 1, 1, 1, 1, 1, '2021-02-17 10:12:36', '2021-03-30 08:12:31', '/uploads/suppliers/1617099151.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `device_id` int UNSIGNED NOT NULL,
  `platform` enum('android','ios') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_username_unique` (`username`),
  ADD KEY `customers_city_id_foreign` (`city_id`),
  ADD KEY `customers_area_id_foreign` (`area_id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deals_product_id_foreign` (`product_id`);

--
-- Indexes for table `dialogs`
--
ALTER TABLE `dialogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dialogs_customer_id_foreign` (`customer_id`),
  ADD KEY `dialogs_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_supplier_id_foreign` (`supplier_id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`),
  ADD KEY `favorites_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_product_id_foreign` (`product_id`),
  ADD KEY `feedback_customer_id_foreign` (`customer_id`),
  ADD KEY `feedback_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_dialog_id_foreign` (`dialog_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`),
  ADD KEY `products_product_sub_category_id_foreign` (`product_sub_category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_attributes_arrribute_id_foreign` (`attribute_id`),
  ADD KEY `products_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sub_categories_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`),
  ADD KEY `ratings_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_industry_id_foreign` (`industry_id`),
  ADD KEY `suppliers_city_id_foreign` (`city_id`),
  ADD KEY `suppliers_area_id_foreign` (`area_id`),
  ADD KEY `suppliers_category_id_foreign` (`category_id`),
  ADD KEY `suppliers_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisments`
--
ALTER TABLE `advertisments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dialogs`
--
ALTER TABLE `dialogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `customers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dialogs`
--
ALTER TABLE `dialogs`
  ADD CONSTRAINT `dialogs_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dialogs_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_dialog_id_foreign` FOREIGN KEY (`dialog_id`) REFERENCES `dialogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_product_sub_category_id_foreign` FOREIGN KEY (`product_sub_category_id`) REFERENCES `product_sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD CONSTRAINT `products_attributes_arrribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD CONSTRAINT `product_sub_categories_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suppliers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suppliers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suppliers_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suppliers_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
