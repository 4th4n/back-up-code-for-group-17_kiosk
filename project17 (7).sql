-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 12:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project17`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `low_stock_level` int(11) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(255) NOT NULL DEFAULT 'pcs',
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `description`, `image`, `quantity`, `low_stock_level`, `category`, `created_at`, `updated_at`, `unit`, `stock`) VALUES
(57, 'CHICKEN ADOBO', 50.00, NULL, '1734084587.jpg', 34, 10, 'Lunch', '2024-12-13 02:09:47', '2025-04-20 22:51:18', 'tray', 2),
(58, 'PORK ADOBO', 50.00, NULL, '1734084649.jpg', 39, 10, 'Lunch', '2024-12-13 02:10:49', '2025-04-20 22:44:43', 'tray', 2),
(59, 'PORK SINIGANG', 50.00, NULL, '1734084718.jpg', 16, 15, 'Lunch', '2024-12-13 02:11:58', '2025-04-20 22:59:49', 'tray', 3),
(60, 'FRIED CHICKEN', 50.00, NULL, '1734084761.jpg', 58, 15, 'Lunch', '2024-12-13 02:12:41', '2025-04-20 22:59:49', 'tray', 2),
(61, 'PORK MENUDO', 50.00, NULL, '1734084849.jpg', 24, 15, 'Lunch', '2024-12-13 02:14:09', '2025-04-20 22:44:43', 'tray', 2),
(62, 'PORK STEAK', 50.00, NULL, '1734084898.jpg', 40, 15, 'Lunch', '2024-12-13 02:14:58', '2025-04-20 08:14:19', 'tray', 2),
(63, 'CHICKEN TINOLA', 50.00, NULL, '1734084957.jpg', 30, 15, 'Lunch', '2024-12-13 02:15:57', '2024-12-13 02:15:57', 'tray', 2),
(64, 'FRIED RICE', 10.00, NULL, '1734085822.jpg', 36, 15, 'Breakfast', '2024-12-13 02:30:22', '2025-04-20 08:14:00', 'tray', 2),
(65, 'SUNNY SIDE UP', 10.00, NULL, '1734085938.jpg', 19, 10, 'Breakfast', '2024-12-13 02:32:18', '2025-03-04 03:45:58', 'tray', 2),
(66, 'TOCINO', 15.00, NULL, '1734085992.jpg', 12, 10, 'Breakfast', '2024-12-13 02:33:12', '2025-04-13 22:46:08', 'pack', 2),
(67, 'SKINLESS', 15.00, NULL, '1734086047.jpg', 20, 10, 'Breakfast', '2024-12-13 02:34:07', '2025-04-20 08:14:06', 'pack', 2),
(68, 'FOOTLONG', 10.00, NULL, '1734086107.jpg', 19, 10, 'Breakfast', '2024-12-13 02:35:08', '2024-12-24 20:33:43', 'pack', 2),
(69, 'HOT DOG', 10.00, NULL, '1734086164.jpg', 20, 10, 'Breakfast', '2024-12-13 02:36:04', '2024-12-17 04:59:18', 'pack', 2),
(70, 'SPAGHETTI', 25.00, NULL, '1734086661.jpg', 30, 15, 'Snacks', '2024-12-13 02:44:21', '2024-12-13 02:44:21', 'tray', 2),
(71, 'PALABOK', 25.00, NULL, '1734086717.jpg', 30, 15, 'Snacks', '2024-12-13 02:45:17', '2024-12-13 02:45:17', 'tray', 2),
(72, 'MACARONI SOUP', 20.00, NULL, '1734086806.jpg', 35, 15, 'Snacks', '2024-12-13 02:46:46', '2024-12-13 02:46:46', 'tray', 2),
(73, 'MACARONI SPAGHETTI', 25.00, NULL, '1734086882.jpg', 30, 15, 'Snacks', '2024-12-13 02:48:02', '2024-12-13 02:48:02', 'tray', 2),
(74, 'BAKED MACARONI CHEESE', 25.00, NULL, '1734086965.jpg', 20, 10, 'Snacks', '2024-12-13 02:49:25', '2024-12-13 02:49:25', 'tray', 2),
(75, 'BANANA CUE', 20.00, NULL, '1734087141.jpg', 20, 10, 'Snacks', '2024-12-13 02:52:21', '2024-12-17 04:56:40', 'tray', 2),
(76, 'BANANA ROLLS', 10.00, NULL, '1734087333.jpg', 30, 15, 'Snacks', '2024-12-13 02:55:33', '2024-12-13 02:55:33', 'tray', 2),
(77, 'PANCIT NOODLES', 20.00, NULL, '1734087390.jpg', 40, 20, 'Snacks', '2024-12-13 02:56:31', '2024-12-16 03:27:38', 'tray', 2),
(78, 'SWEET CHOCOLATE RICE PORRIDGE(champorado)', 20.00, NULL, '1734087498.jpg', 20, 15, 'Snacks', '2024-12-13 02:58:18', '2024-12-13 02:58:18', 'tray', 1),
(79, 'SPICY SEAFOOD', 30.00, NULL, '1734088832.jpg', 20, 10, 'Cup Noodles', '2024-12-13 03:20:32', '2024-12-13 03:32:05', 'box', 1),
(80, 'HOT CHEESY SEAFOOD', 30.00, NULL, '1734089120.png', 20, 10, 'Cup Noodles', '2024-12-13 03:25:20', '2024-12-13 03:25:20', 'box', 1),
(81, 'BULALO', 30.00, NULL, '1734089290.jpg', 20, 10, 'Cup Noodles', '2024-12-13 03:28:10', '2024-12-13 03:31:33', 'tray', 1),
(82, 'CHEESY SEAFOOD', 30.00, NULL, '1734089350.jpg', 20, 10, 'Cup Noodles', '2024-12-13 03:29:11', '2024-12-13 03:29:11', 'box', 1),
(86, 'C2 SOLO APPLE', 15.00, NULL, '1734095002.jpg', 50, 25, 'Drinks', '2024-12-13 05:03:22', '2024-12-13 05:03:22', 'box', 2),
(87, 'C2 SOLO LEMON', 15.00, NULL, '1734095133.png', 50, 25, 'Drinks', '2024-12-13 05:05:33', '2024-12-13 05:05:33', 'box', 2),
(88, 'C2 SOLO RASPBERRY', 30.00, NULL, '1734095224.png', 25, 12, 'Drinks', '2024-12-13 05:07:04', '2024-12-17 05:01:28', 'box', 1),
(89, 'C2 SOLO CLASSIC GREEN', 30.00, NULL, '1734095295.png', 25, 12, 'Drinks', '2024-12-13 05:08:15', '2024-12-13 05:08:15', 'box', 1),
(91, 'MISMO COCA-COLA', 20.00, NULL, '1734095735.jpg', 44, 12, 'Drinks', '2024-12-13 05:15:36', '2024-12-17 05:03:02', 'box', 2),
(92, 'COCA-COLA', 15.00, NULL, '1734095790.jpg', 44, 12, 'Drinks', '2024-12-13 05:16:30', '2024-12-17 05:03:41', 'box', 2),
(93, 'SPRITE', 20.00, NULL, '1734096112.png', 44, 10, 'Drinks', '2024-12-13 05:21:52', '2024-12-13 05:21:52', 'box', 2),
(94, 'ROYAL', 20.00, NULL, '1734096171.png', 44, 15, 'Drinks', '2024-12-13 05:22:51', '2024-12-13 05:22:51', 'box', 2),
(95, 'WILKINS PURE', 20.00, NULL, '1734096307.png', 40, 10, 'Drinks', '2024-12-13 05:25:07', '2024-12-13 05:25:07', 'box', 2),
(96, 'NATURES SPRING', 15.00, NULL, '1734096484.jpg', 44, 15, 'Drinks', '2024-12-13 05:28:04', '2024-12-17 05:08:01', 'box', 2),
(97, 'ZESTO ORANGE', 13.00, NULL, '1734096586.jpg', 39, 20, 'Drinks', '2024-12-13 05:29:46', '2024-12-17 05:10:17', 'box', 2),
(98, 'ZESTO APPLE', 13.00, NULL, '1734096624.jpg', 40, 20, 'Drinks', '2024-12-13 05:30:24', '2024-12-17 05:10:44', 'box', 2),
(99, 'WAFELLO CHOCO', 12.00, NULL, '1734139345.jpg', 24, 10, 'Biscuits', '2024-12-13 17:22:25', '2024-12-13 17:22:25', 'pack', 2),
(100, 'WAFELLO CHEESE', 12.00, NULL, '1734139411.jpg', 22, 10, 'Biscuits', '2024-12-13 17:23:31', '2025-04-01 04:08:53', 'pack', 2),
(101, 'HANSEL CHOCO', 10.00, NULL, '1734139543.png', 23, 10, 'Biscuits', '2024-12-13 17:25:43', '2025-02-03 22:22:40', 'pack', 2),
(102, 'HANSEL PEANUT', 10.00, NULL, '1734139611.png', 23, 10, 'Biscuits', '2024-12-13 17:26:51', '2025-04-20 16:35:04', 'pack', 2),
(103, 'HANSEL MILK', 10.00, NULL, '1734139679.png', 23, 10, 'Biscuits', '2024-12-13 17:27:59', '2025-04-09 17:39:06', 'pack', 2),
(104, 'HANSEL STRAWBERRY', 10.00, NULL, '1734139747.png', 25, 24, 'Biscuits', '2024-12-13 17:29:07', '2025-03-28 01:48:32', 'pack', 2),
(105, 'FITA', 10.00, NULL, '1734139796.png', 24, 10, 'Biscuits', '2024-12-13 17:29:56', '2024-12-13 17:29:56', 'pack', 2),
(106, 'WAFRETS CHOCO', 10.00, NULL, '1734139855.jpg', 24, 10, 'Biscuits', '2024-12-13 17:30:55', '2024-12-13 17:30:55', 'pack', 2),
(107, 'WAFRETS CHEESE', 10.00, NULL, '1734139926.png', 24, 10, 'Biscuits', '2024-12-13 17:32:06', '2025-04-20 08:14:19', 'pack', 2),
(108, 'BINGO ORANGE', 11.00, NULL, '1734139980.jpg', 24, 20, 'Biscuits', '2024-12-13 17:33:00', '2025-04-20 08:14:19', 'pack', 2),
(109, 'BINGO CHOCO', 11.00, NULL, '1734140038.jpg', 24, 10, 'Biscuits', '2024-12-13 17:33:58', '2024-12-13 17:34:54', 'pack', 2),
(110, 'BINGO-VANILLA', 11.00, NULL, '1734140139.jpg', 24, 10, 'Biscuits', '2024-12-13 17:35:39', '2024-12-17 19:00:20', 'pack', 2),
(111, 'CREAM O CHOCO', 15.00, NULL, '1734140211.png', 24, 10, 'Biscuits', '2024-12-13 17:36:51', '2024-12-17 19:22:18', 'pack', 2),
(112, 'CREAM-O VANILLA', 15.00, NULL, '1734140282.png', 24, 10, 'Biscuits', '2024-12-13 17:38:02', '2024-12-17 18:59:52', 'pack', 2),
(113, 'PRESTO PEANUT BUTTER', 13.00, NULL, '1734140343.jpg', 24, 10, 'Biscuits', '2024-12-13 17:39:03', '2024-12-13 17:39:03', 'pack', 2),
(114, 'PRESTO PEANUT CHOCOLATE', 13.00, NULL, '1734140404.jpg', 24, 10, 'Biscuits', '2024-12-13 17:40:04', '2024-12-13 17:40:04', 'pack', 2),
(115, 'HELLO', 13.00, NULL, '1734140704.jpg', 30, 10, 'Chocolates', '2024-12-13 17:45:04', '2024-12-13 17:45:04', 'pack', 2),
(116, 'CHOCO MUCHO(DARK CHOCOLATE)', 15.00, NULL, '1734140859.jpg', 25, 10, 'Chocolates', '2024-12-13 17:47:39', '2024-12-13 17:55:16', 'pack', 2),
(117, 'CHOCO MUCHO COOKIES', 15.00, NULL, '1734140930.jpg', 22, 10, 'Chocolates', '2024-12-13 17:48:50', '2024-12-26 21:22:14', 'pack', 2),
(118, 'CHOCO MUCHO (MILK CHOCOLATE)', 15.00, NULL, '1734141277.jpg', 22, 10, 'Chocolates', '2024-12-13 17:54:37', '2024-12-17 20:26:14', 'pack', 2),
(119, 'CLOUD 9 CLASSIC', 3.00, NULL, '1734141737.jpg', 44, 10, 'Chocolates', '2024-12-13 18:02:17', '2024-12-17 05:29:42', 'pack', 2),
(120, 'CLOUD 9 OVERLOAD', 17.00, NULL, '1734141811.jpg', 44, 10, 'Chocolates', '2024-12-13 18:03:31', '2024-12-13 18:03:31', 'pack', 2),
(121, 'BIG BANG', 20.00, NULL, '1734141868.jpg', 30, 10, 'Chocolates', '2024-12-13 18:04:28', '2024-12-13 18:04:28', 'pack', 2),
(122, 'BENG BENG', 18.00, NULL, '1734141905.jpg', 30, 15, 'Chocolates', '2024-12-13 18:05:05', '2024-12-13 18:05:05', 'pack', 2),
(123, 'GOYA DARK CHOCOLATE', 25.00, NULL, '1734141961.jpg', 44, 10, 'Chocolates', '2024-12-13 18:06:01', '2024-12-13 18:06:01', 'pack', 2),
(125, 'GOYA CREAM WHITE CHOCOLATE', 25.00, NULL, '1734142135.jpg', 44, 10, 'Chocolates', '2024-12-13 18:08:55', '2024-12-13 18:08:55', 'pack', 2),
(126, 'DAIRY MILK CHOCOLATE', 25.00, NULL, '1734142187.jpg', 30, 10, 'Chocolates', '2024-12-13 18:09:47', '2025-04-20 08:14:19', 'pack', 2),
(128, 'V CUT CHEESE | 60 g', 25.00, NULL, '1734142744.png', 30, 10, 'Junk foods', '2024-12-13 18:19:04', '2024-12-17 18:44:57', 'box', 2),
(129, 'V CUT SPICY BARBECUE | 60 g', 25.00, NULL, '1734142825.png', 30, 10, 'Junk foods', '2024-12-13 18:20:25', '2024-12-17 18:39:33', 'box', 2),
(130, 'V CUT CHEESE | 25 g', 15.00, NULL, '1734142903.png', 44, 10, 'Junk foods', '2024-12-13 18:21:43', '2025-04-20 08:13:24', 'box', 2),
(131, 'V CUT SPICY BARBEQUE | 25 g', 15.00, NULL, '1734142943.png', 44, 10, 'Junk foods', '2024-12-13 18:22:23', '2025-04-20 08:13:24', 'box', 2),
(132, 'V CUT ONION GARLIC | 25 g', 15.00, NULL, '1734143003.png', 44, 10, 'Junk foods', '2024-12-13 18:23:23', '2024-12-17 18:50:12', 'box', 2),
(133, 'RICE', 10.00, NULL, '1734439562.jpg', 22, 12, 'Lunch', '2024-12-17 04:46:02', '2025-04-20 08:14:06', 'tray', 2),
(134, 'CHOCO KNOTS', 13.00, NULL, '1734490387.jpg', 22, 10, 'Chocolates', '2024-12-17 18:53:07', '2025-04-20 08:14:19', 'tray', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '0001_01_01_000000_create_users_table', 1),
(20, '0001_01_01_000001_create_cache_table', 1),
(21, '0001_01_01_000002_create_jobs_table', 1),
(22, '2024_10_16_033750_create_items_table', 1),
(23, '2024_10_16_041442_create_orders_table', 1),
(24, '2024_10_16_041443_create_order_items_table', 1),
(25, '2024_10_16_061245_add_quantity_to_items_table', 1),
(26, '2024_10_18_070302_add_image_to_items_table', 1),
(29, '2024_11_04_062435_create_menus_table', 2),
(30, '2024_11_05_024736_create_categories_table', 2),
(37, '2024_11_07_060120_make_category_nullable_in_items_table', 3),
(38, '2024_11_07_060453_add_category_to_items_table', 3),
(39, '2024_11_08_041605_add_completed_to_orders_table', 3),
(40, '2024_12_02_070256_add_low_stock_level_to_items_table', 4),
(45, '2024_12_09_011711_add_stock_to_items_table', 5),
(47, '2024_12_09_101118_add_status_to_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `total_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `total_price`, `created_at`, `updated_at`, `completed`, `status`) VALUES
(190, '4487', 100.00, '2025-03-18 18:15:26', '2025-03-18 18:15:47', 0, 'paid'),
(191, '8069', 50.00, '2025-03-18 18:45:48', '2025-03-18 18:46:04', 0, 'paid'),
(192, '1500', 50.00, '2025-03-18 18:58:18', '2025-03-18 18:58:40', 0, 'paid'),
(193, '6607', 50.00, '2025-03-18 19:03:35', '2025-03-18 19:04:10', 0, 'paid'),
(194, '6880', 50.00, '2025-03-18 19:22:18', '2025-03-18 19:22:31', 0, 'paid'),
(196, '5993', 100.00, '2025-03-19 19:36:03', '2025-03-19 19:36:20', 0, 'cancelled'),
(197, '6693', 150.00, '2025-03-19 19:37:05', '2025-03-19 19:42:29', 0, 'cancelled'),
(198, '6105', 50.00, '2025-03-19 19:44:49', '2025-03-19 19:44:58', 0, 'paid'),
(199, '3988', 50.00, '2025-03-19 19:54:16', '2025-03-19 19:54:52', 0, 'cancelled'),
(200, '9742', 50.00, '2025-03-20 01:07:37', '2025-03-20 01:08:18', 0, 'paid'),
(201, '6032', 50.00, '2025-03-20 01:07:47', '2025-03-20 01:08:44', 0, 'paid'),
(202, '0580', 10.00, '2025-03-20 04:30:42', '2025-03-21 19:54:11', 0, 'paid'),
(203, '0845', 50.00, '2025-03-21 18:46:58', '2025-03-21 19:54:18', 0, 'paid'),
(204, '5936', 50.00, '2025-03-21 19:49:32', '2025-03-21 20:09:43', 0, 'paid'),
(205, '0009', 50.00, '2025-03-23 02:26:41', '2025-03-23 02:28:44', 0, 'cancelled'),
(206, '9554', 50.00, '2025-03-23 03:13:09', '2025-03-23 03:13:19', 0, 'paid'),
(207, '4845', 50.00, '2025-03-28 01:41:58', '2025-03-28 01:42:32', 0, 'paid'),
(208, '5176', 50.00, '2025-03-28 01:42:52', '2025-03-28 01:43:04', 0, 'cancelled'),
(209, '2218', 50.00, '2025-03-28 01:52:48', '2025-03-28 01:53:10', 0, 'paid'),
(210, '6269', 50.00, '2025-03-28 20:08:14', '2025-03-29 01:32:52', 0, 'paid'),
(211, '3089', 50.00, '2025-03-29 16:16:13', '2025-03-29 16:16:25', 0, 'paid'),
(212, '6824', 100.00, '2025-03-31 00:24:01', '2025-03-31 00:24:13', 0, 'paid'),
(213, '4848', 50.00, '2025-04-01 00:24:02', '2025-04-01 00:24:17', 0, 'paid'),
(214, '7350', 124.00, '2025-04-01 04:08:53', '2025-04-02 22:25:00', 0, 'paid'),
(215, '1679', 20.00, '2025-04-09 17:39:05', '2025-04-13 22:44:01', 0, 'paid'),
(216, '1274', 150.00, '2025-04-09 18:27:47', '2025-04-13 22:44:41', 0, 'paid'),
(217, '2914', 600.00, '2025-04-09 18:42:37', '2025-04-20 08:13:19', 0, 'cancelled'),
(218, '3083', 105.00, '2025-04-09 18:44:39', '2025-04-20 08:13:24', 0, 'cancelled'),
(219, '4514', 700.00, '2025-04-09 19:06:35', '2025-04-20 08:13:28', 0, 'cancelled'),
(220, '0069', 1100.00, '2025-04-10 05:30:43', '2025-04-20 08:13:33', 0, 'cancelled'),
(221, '7935', 500.00, '2025-04-10 05:49:04', '2025-04-20 08:13:38', 0, 'cancelled'),
(222, '8976', 150.00, '2025-04-10 22:24:45', '2025-04-20 08:13:41', 0, 'cancelled'),
(223, '8900', 100.00, '2025-04-10 23:23:45', '2025-04-20 08:13:45', 0, 'cancelled'),
(224, '3898', 100.00, '2025-04-10 23:26:25', '2025-04-20 08:13:49', 0, 'cancelled'),
(225, '7918', 200.00, '2025-04-11 01:11:15', '2025-04-20 08:13:54', 0, 'cancelled'),
(226, '4628', 50.00, '2025-04-11 01:17:11', '2025-04-20 08:14:10', 0, 'cancelled'),
(227, '9459', 50.00, '2025-04-11 03:07:58', '2025-04-20 08:14:23', 0, 'cancelled'),
(228, '7094', 115.00, '2025-04-13 22:46:08', '2025-04-13 22:46:27', 0, 'paid'),
(229, '1956', 313.00, '2025-04-20 04:19:30', '2025-04-20 08:14:06', 0, 'cancelled'),
(230, '2654', 309.00, '2025-04-20 08:04:24', '2025-04-20 08:14:19', 0, 'cancelled'),
(231, '6707', 100.00, '2025-04-20 08:12:06', '2025-04-20 08:14:15', 0, 'cancelled'),
(232, '7634', 60.00, '2025-04-20 08:12:33', '2025-04-20 08:14:00', 0, 'cancelled'),
(233, '3112', 400.00, '2025-04-20 15:28:32', '2025-04-20 16:18:38', 0, 'cancelled'),
(234, '0087', 50.00, '2025-04-20 15:31:33', '2025-04-20 16:18:34', 0, 'cancelled'),
(235, '4883', 60.00, '2025-04-20 16:34:42', '2025-04-20 16:35:04', 0, 'cancelled'),
(236, '4423', 400.00, '2025-04-20 22:44:43', '2025-04-20 22:54:45', 0, 'paid'),
(237, '1652', 150.00, '2025-04-20 22:59:49', '2025-04-20 23:00:54', 0, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `quantity`, `price`, `image`, `created_at`, `updated_at`) VALUES
(212, 190, 60, 1, 50.00, NULL, '2025-03-18 18:15:26', '2025-03-18 18:15:26'),
(213, 190, 61, 1, 50.00, NULL, '2025-03-18 18:15:26', '2025-03-18 18:15:26'),
(214, 191, 59, 1, 50.00, NULL, '2025-03-18 18:45:49', '2025-03-18 18:45:49'),
(215, 192, 60, 1, 50.00, NULL, '2025-03-18 18:58:18', '2025-03-18 18:58:18'),
(216, 193, 60, 1, 50.00, NULL, '2025-03-18 19:03:35', '2025-03-18 19:03:35'),
(217, 194, 60, 1, 50.00, NULL, '2025-03-18 19:22:18', '2025-03-18 19:22:18'),
(219, 196, 59, 2, 50.00, NULL, '2025-03-19 19:36:03', '2025-03-19 19:36:03'),
(220, 197, 59, 3, 50.00, NULL, '2025-03-19 19:37:05', '2025-03-19 19:37:05'),
(221, 198, 59, 1, 50.00, NULL, '2025-03-19 19:44:49', '2025-03-19 19:44:49'),
(222, 199, 59, 1, 50.00, NULL, '2025-03-19 19:54:16', '2025-03-19 19:54:16'),
(223, 200, 60, 1, 50.00, NULL, '2025-03-20 01:07:37', '2025-03-20 01:07:37'),
(224, 201, 59, 1, 50.00, NULL, '2025-03-20 01:07:47', '2025-03-20 01:07:47'),
(225, 202, 64, 1, 10.00, NULL, '2025-03-20 04:30:42', '2025-03-20 04:30:42'),
(226, 203, 59, 1, 50.00, NULL, '2025-03-21 18:46:58', '2025-03-21 18:46:58'),
(227, 204, 57, 1, 50.00, NULL, '2025-03-21 19:49:32', '2025-03-21 19:49:32'),
(228, 205, 59, 1, 50.00, NULL, '2025-03-23 02:26:41', '2025-03-23 02:26:41'),
(229, 206, 60, 1, 50.00, NULL, '2025-03-23 03:13:09', '2025-03-23 03:13:09'),
(230, 207, 57, 1, 50.00, NULL, '2025-03-28 01:41:58', '2025-03-28 01:41:58'),
(231, 208, 58, 1, 50.00, NULL, '2025-03-28 01:42:52', '2025-03-28 01:42:52'),
(232, 209, 57, 1, 50.00, NULL, '2025-03-28 01:52:48', '2025-03-28 01:52:48'),
(233, 210, 60, 1, 50.00, NULL, '2025-03-28 20:08:14', '2025-03-28 20:08:14'),
(234, 211, 57, 1, 50.00, NULL, '2025-03-29 16:16:13', '2025-03-29 16:16:13'),
(235, 212, 60, 1, 50.00, NULL, '2025-03-31 00:24:01', '2025-03-31 00:24:01'),
(236, 212, 58, 1, 50.00, NULL, '2025-03-31 00:24:01', '2025-03-31 00:24:01'),
(237, 213, 57, 1, 50.00, NULL, '2025-04-01 00:24:02', '2025-04-01 00:24:02'),
(238, 214, 57, 1, 50.00, NULL, '2025-04-01 04:08:53', '2025-04-01 04:08:53'),
(239, 214, 59, 1, 50.00, NULL, '2025-04-01 04:08:53', '2025-04-01 04:08:53'),
(240, 214, 100, 2, 12.00, NULL, '2025-04-01 04:08:53', '2025-04-01 04:08:53'),
(241, 215, 102, 1, 10.00, NULL, '2025-04-09 17:39:06', '2025-04-09 17:39:06'),
(242, 215, 103, 1, 10.00, NULL, '2025-04-09 17:39:07', '2025-04-09 17:39:07'),
(243, 216, 57, 2, 50.00, NULL, '2025-04-09 18:27:47', '2025-04-09 18:27:47'),
(244, 216, 58, 1, 50.00, NULL, '2025-04-09 18:27:47', '2025-04-09 18:27:47'),
(245, 217, 59, 4, 50.00, NULL, '2025-04-09 18:42:37', '2025-04-09 18:42:37'),
(246, 217, 58, 8, 50.00, NULL, '2025-04-09 18:42:37', '2025-04-09 18:42:37'),
(247, 218, 130, 3, 15.00, NULL, '2025-04-09 18:44:39', '2025-04-09 18:44:39'),
(248, 218, 131, 4, 15.00, NULL, '2025-04-09 18:44:39', '2025-04-09 18:44:39'),
(249, 219, 58, 5, 50.00, NULL, '2025-04-09 19:06:35', '2025-04-09 19:06:35'),
(250, 219, 57, 3, 50.00, NULL, '2025-04-09 19:06:35', '2025-04-09 19:06:35'),
(251, 219, 60, 4, 50.00, NULL, '2025-04-09 19:06:35', '2025-04-09 19:06:35'),
(252, 219, 61, 1, 50.00, NULL, '2025-04-09 19:06:35', '2025-04-09 19:06:35'),
(253, 219, 62, 1, 50.00, NULL, '2025-04-09 19:06:35', '2025-04-09 19:06:35'),
(254, 220, 57, 6, 50.00, NULL, '2025-04-10 05:30:43', '2025-04-10 05:30:43'),
(255, 220, 58, 5, 50.00, NULL, '2025-04-10 05:30:43', '2025-04-10 05:30:43'),
(256, 220, 59, 9, 50.00, NULL, '2025-04-10 05:30:43', '2025-04-10 05:30:43'),
(257, 220, 61, 1, 50.00, NULL, '2025-04-10 05:30:43', '2025-04-10 05:30:43'),
(258, 220, 62, 1, 50.00, NULL, '2025-04-10 05:30:43', '2025-04-10 05:30:43'),
(259, 221, 61, 4, 50.00, NULL, '2025-04-10 05:49:04', '2025-04-10 05:49:04'),
(260, 221, 62, 4, 50.00, NULL, '2025-04-10 05:49:04', '2025-04-10 05:49:04'),
(261, 221, 60, 1, 50.00, NULL, '2025-04-10 05:49:04', '2025-04-10 05:49:04'),
(262, 221, 59, 1, 50.00, NULL, '2025-04-10 05:49:04', '2025-04-10 05:49:04'),
(263, 222, 57, 1, 50.00, NULL, '2025-04-10 22:24:45', '2025-04-10 22:24:45'),
(264, 222, 60, 1, 50.00, NULL, '2025-04-10 22:24:45', '2025-04-10 22:24:45'),
(265, 222, 61, 1, 50.00, NULL, '2025-04-10 22:24:45', '2025-04-10 22:24:45'),
(266, 223, 57, 1, 50.00, NULL, '2025-04-10 23:23:45', '2025-04-10 23:23:45'),
(267, 223, 62, 1, 50.00, NULL, '2025-04-10 23:23:45', '2025-04-10 23:23:45'),
(268, 224, 60, 2, 50.00, NULL, '2025-04-10 23:26:25', '2025-04-10 23:26:25'),
(269, 225, 60, 3, 50.00, NULL, '2025-04-11 01:11:15', '2025-04-11 01:11:15'),
(270, 225, 61, 1, 50.00, NULL, '2025-04-11 01:11:15', '2025-04-11 01:11:15'),
(271, 226, 60, 1, 50.00, NULL, '2025-04-11 01:17:11', '2025-04-11 01:17:11'),
(272, 227, 60, 1, 50.00, NULL, '2025-04-11 03:07:58', '2025-04-11 03:07:58'),
(273, 228, 57, 1, 50.00, NULL, '2025-04-13 22:46:08', '2025-04-13 22:46:08'),
(274, 228, 59, 1, 50.00, NULL, '2025-04-13 22:46:08', '2025-04-13 22:46:08'),
(275, 228, 66, 1, 15.00, NULL, '2025-04-13 22:46:08', '2025-04-13 22:46:08'),
(276, 229, 133, 1, 10.00, NULL, '2025-04-20 04:19:30', '2025-04-20 04:19:30'),
(277, 229, 67, 1, 15.00, NULL, '2025-04-20 04:19:30', '2025-04-20 04:19:30'),
(278, 229, 134, 1, 13.00, NULL, '2025-04-20 04:19:30', '2025-04-20 04:19:30'),
(279, 229, 126, 1, 25.00, NULL, '2025-04-20 04:19:30', '2025-04-20 04:19:30'),
(280, 229, 61, 1, 50.00, NULL, '2025-04-20 04:19:30', '2025-04-20 04:19:30'),
(281, 229, 57, 2, 50.00, NULL, '2025-04-20 04:19:30', '2025-04-20 04:19:30'),
(282, 229, 59, 1, 50.00, NULL, '2025-04-20 04:19:30', '2025-04-20 04:19:30'),
(283, 229, 62, 1, 50.00, NULL, '2025-04-20 04:19:30', '2025-04-20 04:19:30'),
(284, 230, 59, 1, 50.00, NULL, '2025-04-20 08:04:25', '2025-04-20 08:04:25'),
(285, 230, 62, 3, 50.00, NULL, '2025-04-20 08:04:25', '2025-04-20 08:04:25'),
(286, 230, 134, 1, 13.00, NULL, '2025-04-20 08:04:25', '2025-04-20 08:04:25'),
(287, 230, 60, 1, 50.00, NULL, '2025-04-20 08:04:25', '2025-04-20 08:04:25'),
(288, 230, 107, 1, 10.00, NULL, '2025-04-20 08:04:25', '2025-04-20 08:04:25'),
(289, 230, 108, 1, 11.00, NULL, '2025-04-20 08:04:25', '2025-04-20 08:04:25'),
(290, 230, 126, 1, 25.00, NULL, '2025-04-20 08:04:25', '2025-04-20 08:04:25'),
(291, 231, 57, 1, 50.00, NULL, '2025-04-20 08:12:06', '2025-04-20 08:12:06'),
(292, 231, 61, 1, 50.00, NULL, '2025-04-20 08:12:06', '2025-04-20 08:12:06'),
(293, 232, 64, 1, 10.00, NULL, '2025-04-20 08:12:33', '2025-04-20 08:12:33'),
(294, 232, 61, 1, 50.00, NULL, '2025-04-20 08:12:33', '2025-04-20 08:12:33'),
(295, 233, 60, 8, 50.00, NULL, '2025-04-20 15:28:32', '2025-04-20 15:28:32'),
(296, 234, 60, 1, 50.00, NULL, '2025-04-20 15:31:33', '2025-04-20 15:31:33'),
(297, 235, 102, 6, 10.00, NULL, '2025-04-20 16:34:42', '2025-04-20 16:34:42'),
(298, 236, 58, 4, 50.00, NULL, '2025-04-20 22:44:43', '2025-04-20 22:44:43'),
(299, 236, 61, 3, 50.00, NULL, '2025-04-20 22:44:43', '2025-04-20 22:44:43'),
(300, 236, 60, 1, 50.00, NULL, '2025-04-20 22:44:43', '2025-04-20 22:44:43'),
(301, 237, 59, 2, 50.00, NULL, '2025-04-20 22:59:49', '2025-04-20 22:59:49'),
(302, 237, 60, 1, 50.00, NULL, '2025-04-20 22:59:49', '2025-04-20 22:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3bJMvLM6HKdgDFi5UmXWyM8M9pbjFjytRSDLkfVg', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOTJsaHBCSmIxQWF3VlZHSWcwT0t6UG1TQlBVZm53U254QW1mQ3NpMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0L3ZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjU6Im9yZGVyIjthOjE6e2k6NjA7YTozOntzOjQ6Im5hbWUiO3M6MTM6IkZSSUVEIENISUNLRU4iO3M6NToicHJpY2UiO3M6NToiNTAuMDAiO3M6ODoicXVhbnRpdHkiO2k6Mzt9fX0=', 1745196028),
('kcmBHkRTgjRhiF0yFpMJsBFA7nHbfMDqJVTATgDS', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibkVpOTdYQ25VZ0M3dGtzT3kxMEljcjJ5NEVWZWlLSmhXM21mRTNrdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1745219112),
('yrZSRBUO9Wrpsb08gFdrqOFsxiComETwviJHxhMA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ1R4b2Zqb2RlRURFT2kzNk9qVDI0RGtLeWhzaGpMckdjeGQwNTlXbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW51L2NhdGVnb3J5L3NuYWNrcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToib3JkZXIiO2E6Mjp7aTo2MDthOjM6e3M6NDoibmFtZSI7czoxMzoiRlJJRUQgQ0hJQ0tFTiI7czo1OiJwcmljZSI7czo1OiI1MC4wMCI7czo4OiJxdWFudGl0eSI7aTozO31pOjYxO2E6Mzp7czo0OiJuYW1lIjtzOjExOiJQT1JLIE1FTlVETyI7czo1OiJwcmljZSI7czo1OiI1MC4wMCI7czo4OiJxdWFudGl0eSI7aTozO319fQ==', 1745194487);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2024-11-07 21:33:15', '$2y$12$qSfO8G4x9q7.A4BiLCqeAeGo8xkrhxxQ1RyoyeImlN86oeSfdsiUi', '9rlCGploM5', '2024-11-07 21:33:15', '2024-11-07 21:33:15'),
(3, 'Guido Grimes', 'zhirthe@example.com', '2024-11-07 21:35:34', '$2y$12$pW9FsDnf8n53lspo38DeQO4XHTGB.Pv1aCLQwLh6.vv95.FyOf5ae', '7xhpS1g0CWQAHQvc4ToMarGxk60et6R87ec9hb9Hftg9hUkoAEB0IxLEQ9EQ', '2024-11-07 21:35:34', '2024-11-07 21:35:34'),
(4, 'jonathan Dreo', 'dreo@gmail.com', '2024-11-07 22:01:47', '$2y$12$ux2EjF/TO.0XlW82X/D.reCmBXhY88Escjco3ppRxysxIGZbhsWry', '0pYdpldIlb09XNE3VtmGUxsJdZvCKzEMtIjBh6E31Xkx5QjB9upIzl9nMfmm', '2024-11-07 22:01:47', '2024-11-07 22:01:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
