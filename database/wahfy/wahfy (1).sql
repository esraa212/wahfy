-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2021 at 06:14 PM
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$fcTcXV4lG4JD7U/MkUpQ.Oth4D3wDugb6PrRpfQGwgj756qrRwhmO', 'qAJXTYBInINSJ1shr64Yq9FWGUBCIaNfFZWFKYZSzCJb5BTJ5ixeViggc06X', NULL, '2021-02-15 09:37:20', '2021-02-15 09:37:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `advertisments`
--

CREATE TABLE `advertisments` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `city_id` longtext COLLATE utf8mb4_unicode_ci,
  `area_id` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisments`
--

INSERT INTO `advertisments` (`id`, `title`, `description`, `image`, `from`, `to`, `city_id`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 'fsd', 'dfds', '/uploads/advertisments/1613663777.jpeg', '2021-02-05 00:00:00', '2021-02-16 00:00:00', '[\"3\",\"4\"]', '[\"0\"]', '2021-02-18 13:56:17', '2021-02-18 13:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', '2021-02-16 13:39:32', '2021-02-16 13:42:17'),
(5, 'Electronics', '2021-02-21 10:18:15', '2021-02-21 10:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `area_id` bigint UNSIGNED NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categories` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `mobile`, `city_id`, `area_id`, `address`, `created_at`, `updated_at`, `categories`) VALUES
(1, 'Esraa', 'esraammotafa@gmail.com', NULL, '$2y$10$980r8/wuS3XkQc8QZZr1fO/poHPCOryBEw5kX/u9WYxlkJtxqkxTm', NULL, '01113265845', 4, 3, 'address', '2021-02-21 09:47:54', '2021-02-21 10:18:56', '[\"1\",\"5\"]'),
(2, 'Esraa', 'admin@esraa.com', NULL, '$2y$10$qybvXJ75sMWXJ08OoL7x2.CIT9VM/0gWSDlLQ4irV08JNaPQQwr0e', NULL, '01112376543', 1, 5, 'adddress', '2021-02-25 10:44:25', '2021-02-25 10:44:25', 'null'),
(3, 'Esraa Mosafa Elsyaed', 'aa@a.com', NULL, '$2y$10$7tsFKEtbmDd.i0uUqyo83u29.f7gh/zQpXSdnMXJX.2s7mIbrSndm', NULL, '01112354789', 3, 4, 'test address', '2021-02-25 10:48:24', '2021-02-25 10:48:24', '[\"1\",\"5\"]'),
(4, 'test21', 'tt@r.com', NULL, '$2y$10$jxd/b9BjOD45tgge8Uo2.OI80Xt.1W6zp8pKetOFiHTDC5f0L0KoG', NULL, '01112345678', 1, 1, 'as', '2021-02-25 10:51:10', '2021-02-25 10:51:10', '[\"1\",\"5\"]'),
(5, 'Esraa APi', 'esraa@api.com', NULL, '$2y$10$8FZbtseABMzxlq5wgd/ynO5eXTxnqECh4nE2ZD7s4tC.RFMDOcr.e', NULL, '01112354678', 1, 1, 'address api', '2021-02-25 14:04:28', '2021-02-25 14:04:28', 'null'),
(6, 'Esraa APi2', 'esraa@api22.com', NULL, '$2y$10$e8ehOpkL1a1DxCX8SEAjyOjopF00BuFlUrJ.Dts8S.8gcQUdtAb16', NULL, '01112354676', 1, 1, 'address api', '2021-02-25 14:12:09', '2021-02-25 14:12:09', '\"1,5\"');

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
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('inquiry','complain') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `feedback_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `reply` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_text`, `product_id`, `customer_id`, `supplier_id`, `created_at`, `updated_at`, `status`, `reply`) VALUES
(1, 'very good Product I love IT', 1, 1, 1, NULL, '2021-02-23 13:05:09', 1, 'your feedback is important,Thank You');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'clothes', '2021-02-17 08:28:47', '2021-02-17 08:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `dialog_id` bigint UNSIGNED NOT NULL,
  `sender_id` bigint NOT NULL,
  `receiver_id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(40, '2021_02_23_153056_add_subject_and_type_to_dialogs', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` longtext COLLATE utf8mb4_unicode_ci,
  `area_id` longtext COLLATE utf8mb4_unicode_ci,
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

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `transaction_id` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT '0.00',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `quantity` int NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` bigint UNSIGNED NOT NULL,
  `product_sub_category_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `tax`, `active`, `quantity`, `image`, `product_category_id`, `product_sub_category_id`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'r3rd', '1000.00', '2.00', 1, 10, '/uploads/products/1613651664.jpeg', 1, 1, 1, '2021-02-18 09:10:23', '2021-02-18 10:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pullover', '2021-02-17 13:31:59', '2021-02-17 13:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`id`, `name`, `product_category_id`, `created_at`, `updated_at`) VALUES
(1, 'cotton', 1, '2021-02-17 13:53:00', '2021-02-17 13:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `value` int NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `like` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Women', 1, '2021-02-16 14:18:06', '2021-02-16 14:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `area_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `industry_id`, `city_id`, `area_id`, `category_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(1, 'H&M', 'Salah Salem str', 1, 1, 1, 1, 1, '2021-02-17 10:12:36', '2021-02-17 10:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `device_id` int UNSIGNED NOT NULL,
  `platform` enum('android','ios') COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
