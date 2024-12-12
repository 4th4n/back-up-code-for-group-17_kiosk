-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 11:40 AM
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
(21, 'Presto Peanut Butter', 13.00, NULL, '1732854718.jpg', 0, NULL, 'Biscuits', '2024-11-28 20:31:58', '2024-12-05 21:19:32', 'pcs', 0),
(23, 'Presto Peanut Chocolate', 13.00, NULL, '1732854841.jpg', 96, NULL, 'Biscuits', '2024-11-28 20:34:01', '2024-12-09 02:25:29', 'pcs', 0),
(25, 'Cream-O Vanilla', 15.00, NULL, '1732855127.jpg', 5, NULL, 'Biscuits', '2024-11-28 20:38:47', '2024-12-08 22:03:05', 'pcs', 0),
(26, 'Cream-O Choco', 15.00, NULL, '1732855364.jpg', 10, NULL, 'Biscuits', '2024-11-28 20:42:45', '2024-12-01 22:31:38', 'pcs', 0),
(28, 'Bingo Choco', 11.00, NULL, '1732855583.jpg', 8, NULL, 'Biscuits', '2024-11-28 20:46:23', '2024-12-01 22:54:00', 'pcs', 0),
(29, 'Bingo Vanilla', 11.00, NULL, '1732855647.jpg', 5, NULL, 'Biscuits', '2024-11-28 20:47:27', '2024-12-03 22:58:18', 'pcs', 0),
(30, 'Bingo Orange', 11.00, NULL, '1732855764.jpg', 10, NULL, 'Biscuits', '2024-11-28 20:49:24', '2024-11-28 20:49:24', 'pcs', 0),
(31, 'Cream O Butter', 32.00, 'haha', '1733123431.jpg', 35, 20, 'Chocolates', '2024-12-01 23:10:31', '2024-12-01 23:10:31', 'pcs', 0),
(32, 'Cream O Vanilla', 224.00, 'ere', '1733123513.jpg', 20, 35, 'Breakfast', '2024-12-01 23:11:53', '2024-12-01 23:11:53', 'pcs', 0),
(33, 'Bingo Orange Blue', 13.00, 'ee', '1733123617.jpg', 40, 10, 'Biscuits', '2024-12-01 23:13:37', '2024-12-01 23:13:37', 'pcs', 0),
(38, 'Presto Peanut Chocolate3323', 12.00, NULL, '1733462587.jpg', 9, 10, 'Breakfast', '2024-12-05 21:23:07', '2024-12-05 21:24:18', 'pcs', 0),
(42, 'spag', 20.00, NULL, '1733703982.jpg', 12, 2, 'Breakfast', '2024-12-08 16:26:22', '2024-12-08 16:26:22', 'kg', 0),
(43, 'jonathan', 12.00, NULL, '1733711121.jpg', 12, 12, 'Breakfast', '2024-12-08 18:25:21', '2024-12-08 18:25:21', 'pcs', 12),
(44, 'jajajajajajajajja%aaaaaa', 19.00, NULL, '1733711212.jpg', 12, 9, 'Breakfast', '2024-12-08 18:26:52', '2024-12-08 18:26:52', 'box', 2),
(45, 'Cream 0 Chocoaaaa', 15.00, NULL, '1733711621.jpg', 18, 15, 'Chocolates', '2024-12-08 18:33:41', '2024-12-08 18:33:41', 'pack', 2),
(46, 'jonatha', 12.00, NULL, '1733722239.jpg', 18, 15, 'Breakfast', '2024-12-08 21:30:39', '2024-12-08 21:30:39', 'pack', 23),
(47, 'Cream 0 Choco', 9.00, NULL, '1733724286.jpg', 18, 9, 'Breakfast', '2024-12-08 22:04:46', '2024-12-08 22:04:46', 'pack', 2),
(48, 'Cream 0 Chocoaaa', 17.00, NULL, '1733725990.jpg', 18, 10, 'Biscuits', '2024-12-08 22:33:10', '2024-12-08 22:33:10', 'pack', 2),
(49, 'Cream O\' Vanillaaaaa', 15.00, NULL, '1733726199.jpg', 16, 9, 'Breakfast', '2024-12-08 22:36:39', '2024-12-08 22:36:39', 'pcs', 2);

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
(33, '', 30.00, '2024-11-14 03:28:45', '2024-12-09 02:24:54', 0, 'completed'),
(34, '', 9.00, '2024-11-14 03:46:19', '2024-12-09 02:24:56', 0, 'completed'),
(35, '', 122.00, '2024-11-18 03:55:48', '2024-12-09 02:26:07', 0, 'completed'),
(36, '', 60.00, '2024-11-19 21:47:47', '2024-12-09 02:26:18', 0, 'cancelled'),
(37, '', 131.00, '2024-11-19 22:02:26', '2024-12-09 02:26:26', 0, 'cancelled'),
(38, '', 122.00, '2024-11-19 23:32:00', '2024-12-09 02:26:33', 0, 'cancelled'),
(39, '', 12.00, '2024-11-19 23:33:35', '2024-12-09 02:26:34', 0, 'cancelled'),
(40, '', 60.00, '2024-11-20 04:17:36', '2024-12-09 02:26:36', 0, 'cancelled'),
(41, '', 30.00, '2024-11-20 04:17:44', '2024-12-09 02:26:38', 0, 'cancelled'),
(42, '', 30.00, '2024-11-20 04:17:50', '2024-12-09 02:26:40', 0, 'cancelled'),
(43, '', 0.00, '2024-11-20 04:44:07', '2024-12-09 02:26:41', 0, 'cancelled'),
(44, '', 122.00, '2024-11-20 05:12:04', '2024-12-09 02:26:43', 0, 'cancelled'),
(45, '', 36.00, '2024-11-20 05:20:27', '2024-12-09 02:26:45', 0, 'cancelled'),
(58, 'ORD-6747252792D1A', 23.00, '2024-11-27 05:56:55', '2024-12-09 02:31:53', 0, 'completed'),
(59, 'ORD-67472CB988DDF', 23.00, '2024-11-27 06:29:13', '2024-12-09 02:35:13', 0, 'completed'),
(60, 'ORD-67472DBC3F7BB', 23.00, '2024-11-27 06:33:32', '2024-12-09 02:35:18', 0, 'completed'),
(61, 'ORD-67472E76608AF', 23.00, '2024-11-27 06:36:38', '2024-12-09 02:36:45', 0, 'cancelled'),
(62, 'ORD-67472E8F0C93A', 23.00, '2024-11-27 06:37:03', '2024-11-27 06:37:03', 0, 'pending'),
(63, 'ORD-67472FD4DD904', 23.00, '2024-11-27 06:42:28', '2024-11-27 06:42:28', 0, 'pending'),
(64, 'ORD-67473093D0F0A', 23.00, '2024-11-27 06:45:39', '2024-11-27 06:45:39', 0, 'pending'),
(65, 'ORD-674731508206C', 23.00, '2024-11-27 06:48:48', '2024-11-27 06:48:48', 0, 'pending'),
(66, 'ORD-674733A23676F', 23.00, '2024-11-27 06:58:42', '2024-11-27 06:58:42', 0, 'pending'),
(67, 'ORD-6747351A9A2DA', 22.00, '2024-11-27 07:04:58', '2024-11-27 07:04:58', 0, 'pending'),
(68, 'ORD-67473650b4e24', 45.00, '2024-11-27 07:10:08', '2024-11-27 07:10:08', 0, 'pending'),
(69, 'ORD-674736c103233', 45.00, '2024-11-27 07:12:01', '2024-11-27 07:12:01', 0, 'pending'),
(70, 'ORD-6747377B6E35E', 23.00, '2024-11-27 07:15:07', '2024-11-27 07:15:07', 0, 'pending'),
(71, 'ORD-6747382245E03', 23.00, '2024-11-27 07:17:54', '2024-11-27 07:17:54', 0, 'pending'),
(72, 'ORD-6747383D6F977', 23.00, '2024-11-27 07:18:21', '2024-11-27 07:18:21', 0, 'pending'),
(73, 'ORD-674739BF40F9E', 46.00, '2024-11-27 07:24:47', '2024-11-27 07:24:47', 0, 'pending'),
(74, 'ORD-6749149F537A4', 23.00, '2024-11-28 17:10:55', '2024-11-28 17:10:55', 0, 'pending'),
(75, 'ORD-67493CE12A200', 9.00, '2024-11-28 20:02:41', '2024-11-28 20:02:41', 0, 'pending'),
(76, 'ORD-674D54F933D99', 97.00, '2024-12-01 22:34:33', '2024-12-01 22:34:33', 0, 'pending'),
(82, 'ORD-674D5775E011E', 153.00, '2024-12-01 22:45:09', '2024-12-01 22:45:09', 0, 'pending'),
(99, 'ORD-674D596BAA2D4', 106.00, '2024-12-01 22:53:31', '2024-12-01 22:53:31', 0, 'pending'),
(100, 'ORD-674D5976357B2', 26.00, '2024-12-01 22:53:42', '2024-12-01 22:53:42', 0, 'pending'),
(101, 'ORD-674D5988D2EDD', 55.00, '2024-12-01 22:54:00', '2024-12-01 22:54:00', 0, 'pending'),
(102, 'ORD-674FFD8A5B071', 11.00, '2024-12-03 22:58:18', '2024-12-03 22:58:18', 0, 'pending'),
(103, 'ORD-675276C3CCCCC', 39.00, '2024-12-05 20:00:03', '2024-12-05 20:00:03', 0, 'pending'),
(104, 'ORD-675278632D27F', 28.00, '2024-12-05 20:06:59', '2024-12-05 20:06:59', 0, 'pending'),
(105, 'ORD-6752793EE5A4B', 13.00, '2024-12-05 20:10:38', '2024-12-05 20:10:38', 0, 'pending'),
(106, 'ORD-67527A6F25527', 52.00, '2024-12-05 20:15:43', '2024-12-05 20:15:43', 0, 'pending'),
(107, 'ORD-6752855248E1E', 13.00, '2024-12-05 21:02:10', '2024-12-05 21:02:10', 0, 'pending'),
(108, 'ORD-675285D8543DC', 30.00, '2024-12-05 21:04:24', '2024-12-05 21:04:24', 0, 'pending'),
(109, 'ORD-675285FC9CE89', 45.00, '2024-12-05 21:05:00', '2024-12-05 21:05:00', 0, 'pending'),
(110, 'ORD-6752876118EF4', 65.00, '2024-12-05 21:10:57', '2024-12-05 21:10:57', 0, 'pending'),
(111, 'ORD-675287E8AE21E', 15.00, '2024-12-05 21:13:12', '2024-12-05 21:13:12', 0, 'pending'),
(112, 'ORD-6752885063C72', 32.00, '2024-12-05 21:14:56', '2024-12-05 21:14:56', 0, 'pending'),
(113, 'ORD-675288696D7DA', 16.00, '2024-12-05 21:15:21', '2024-12-05 21:15:21', 0, 'pending'),
(114, 'ORD-67528964CD673', 65.00, '2024-12-05 21:19:32', '2024-12-05 21:19:32', 0, 'pending'),
(115, 'ORD-675289C8543FD', 28.00, '2024-12-05 21:21:12', '2024-12-08 04:33:34', 1, 'pending'),
(116, 'ORD-67528A49758D9', 24.00, '2024-12-05 21:23:21', '2024-12-08 04:33:15', 1, 'pending'),
(117, 'ORD-67528A82845C4', 12.00, '2024-12-05 21:24:18', '2024-12-07 23:20:36', 1, 'pending'),
(118, 'ORD-6755740331C4F', 13.00, '2024-12-08 02:25:07', '2024-12-08 02:25:38', 1, 'pending'),
(119, 'ORD-67559263D572A', 30.00, '2024-12-08 04:34:43', '2024-12-08 04:34:43', 0, 'pending'),
(120, 'ORD-67559355B98D1', 15.00, '2024-12-08 04:38:45', '2024-12-08 04:38:45', 0, 'pending'),
(121, 'ORD-675594FDB0971', 15.00, '2024-12-08 04:45:49', '2024-12-08 04:59:42', 1, 'pending'),
(122, 'ORD-6756345591DD9', 15.00, '2024-12-08 16:05:41', '2024-12-08 16:05:41', 0, 'pending'),
(123, 'ORD-67563477D51E1', 15.00, '2024-12-08 16:06:15', '2024-12-08 16:06:15', 0, 'pending'),
(124, 'ORD-67563493EDFB8', 15.00, '2024-12-08 16:06:43', '2024-12-08 16:06:43', 0, 'pending'),
(125, 'ORD-6756387B4FDE5', 15.00, '2024-12-08 16:23:23', '2024-12-08 21:06:29', 1, 'pending'),
(126, 'ORD-675656C4A70E4', 15.00, '2024-12-08 18:32:36', '2024-12-08 20:56:11', 1, 'pending'),
(127, 'ORD-67568731878B9', 15.00, '2024-12-08 21:59:13', '2024-12-08 21:59:13', 0, 'pending'),
(128, 'ORD-6756873AA808C', 15.00, '2024-12-08 21:59:22', '2024-12-08 21:59:22', 0, 'pending'),
(129, 'ORD-675688003E378', 15.00, '2024-12-08 22:02:40', '2024-12-08 22:02:40', 0, 'pending'),
(130, 'ORD-675688194E57D', 15.00, '2024-12-08 22:03:05', '2024-12-09 02:24:28', 0, 'completed'),
(131, 'ORD-6756C5994C93C', 13.00, '2024-12-09 02:25:29', '2024-12-09 02:26:13', 0, 'completed');

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
(106, 100, 21, 2, 13.00, NULL, '2024-12-01 22:53:42', '2024-12-01 22:53:42'),
(107, 101, 28, 2, 11.00, NULL, '2024-12-01 22:54:00', '2024-12-01 22:54:00'),
(108, 101, 29, 3, 11.00, NULL, '2024-12-01 22:54:00', '2024-12-01 22:54:00'),
(109, 102, 29, 1, 11.00, NULL, '2024-12-03 22:58:18', '2024-12-03 22:58:18'),
(110, 103, 21, 3, 13.00, NULL, '2024-12-05 20:00:04', '2024-12-05 20:00:04'),
(111, 104, 23, 1, 13.00, NULL, '2024-12-05 20:06:59', '2024-12-05 20:06:59'),
(112, 104, 25, 1, 15.00, NULL, '2024-12-05 20:06:59', '2024-12-05 20:06:59'),
(113, 105, 21, 1, 13.00, NULL, '2024-12-05 20:10:38', '2024-12-05 20:10:38'),
(114, 106, 21, 4, 13.00, NULL, '2024-12-05 20:15:43', '2024-12-05 20:15:43'),
(115, 107, 23, 1, 13.00, NULL, '2024-12-05 21:02:10', '2024-12-05 21:02:10'),
(118, 110, 21, 5, 13.00, NULL, '2024-12-05 21:10:57', '2024-12-05 21:10:57'),
(119, 111, 25, 1, 15.00, NULL, '2024-12-05 21:13:12', '2024-12-05 21:13:12'),
(122, 114, 21, 5, 13.00, NULL, '2024-12-05 21:19:32', '2024-12-05 21:19:32'),
(124, 116, 38, 2, 12.00, NULL, '2024-12-05 21:23:21', '2024-12-05 21:23:21'),
(125, 117, 38, 1, 12.00, NULL, '2024-12-05 21:24:18', '2024-12-05 21:24:18'),
(126, 118, 23, 1, 13.00, NULL, '2024-12-08 02:25:07', '2024-12-08 02:25:07'),
(127, 119, 25, 2, 15.00, NULL, '2024-12-08 04:34:43', '2024-12-08 04:34:43'),
(139, 131, 23, 1, 13.00, NULL, '2024-12-09 02:25:29', '2024-12-09 02:25:29');

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
('itYqZpasf6SLICbjFruuk6XXUxoFGXlA6oGpFwcB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYndMMDVMbzlFQ0RFdzJyRzZMaTJrUU9BOWRpN0t3Mmk0d0ZFZ2JJdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXNoaWVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733740606);

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
(4, 'jonathan Dreo', 'dreo@gmail.com', '2024-11-07 22:01:47', '$2y$12$ux2EjF/TO.0XlW82X/D.reCmBXhY88Escjco3ppRxysxIGZbhsWry', 'hYU16lfMgGJIYyk0Ppm9nRkFs1VaDjG88kGRdgiGFPDTDXgpZQTkTaxtL3LX', '2024-11-07 22:01:47', '2024-11-07 22:01:47');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

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
