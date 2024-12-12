-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 07:58 AM
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
(21, 'Presto Peanut Butter', 13.00, NULL, '1732854718.jpg', 0, NULL, 'Biscuits', '2024-11-28 20:31:58', '2024-12-09 23:12:28', 'pcs', 0),
(23, 'Presto Peanut Chocolate', 13.00, NULL, '1732854841.jpg', 93, NULL, 'Biscuits', '2024-11-28 20:34:01', '2024-12-11 22:53:42', 'pcs', 0),
(25, 'Cream-O Vanilla', 15.00, NULL, '1732855127.jpg', 0, NULL, 'Biscuits', '2024-11-28 20:38:47', '2024-12-10 05:38:37', 'pcs', 0),
(26, 'Cream-O Choco', 15.00, NULL, '1732855364.jpg', 10, NULL, 'Biscuits', '2024-11-28 20:42:45', '2024-12-01 22:31:38', 'pcs', 0),
(28, 'Bingo Choco', 11.00, NULL, '1732855583.jpg', 8, NULL, 'Biscuits', '2024-11-28 20:46:23', '2024-12-01 22:54:00', 'pcs', 0),
(29, 'Bingo Vanilla', 11.00, NULL, '1732855647.jpg', 4, NULL, 'Biscuits', '2024-11-28 20:47:27', '2024-12-09 19:45:34', 'pcs', 0),
(30, 'Bingo Orange', 11.00, NULL, '1732855764.jpg', 10, NULL, 'Biscuits', '2024-11-28 20:49:24', '2024-11-28 20:49:24', 'pcs', 0),
(31, 'Cream O Butter', 32.00, 'haha', '1733123431.jpg', 35, 20, 'Chocolates', '2024-12-01 23:10:31', '2024-12-01 23:10:31', 'pcs', 0),
(32, 'Cream O Vanilla', 224.00, 'ere', '1733123513.jpg', 20, 35, 'Breakfast', '2024-12-01 23:11:53', '2024-12-01 23:11:53', 'pcs', 0),
(33, 'Bingo Orange Blue', 13.00, 'ee', '1733123617.jpg', 40, 10, 'Biscuits', '2024-12-01 23:13:37', '2024-12-01 23:13:37', 'pcs', 0),
(38, 'Presto Peanut Chocolate3323', 12.00, NULL, '1733462587.jpg', 9, 10, 'Breakfast', '2024-12-05 21:23:07', '2024-12-05 21:24:18', 'pcs', 0),
(42, 'spag', 25.00, NULL, '1733703982.jpg', 10, 2, 'Breakfast', '2024-12-08 16:26:22', '2024-12-09 18:48:06', 'kg', 0),
(43, 'jonathan', 12.00, NULL, '1733711121.jpg', 12, 12, 'Breakfast', '2024-12-08 18:25:21', '2024-12-08 18:25:21', 'pcs', 12),
(44, 'jajajajajajajajja%aaaaaa', 19.00, NULL, '1733711212.jpg', 12, 9, 'Breakfast', '2024-12-08 18:26:52', '2024-12-08 18:26:52', 'box', 2),
(45, 'Cream 0 Chocoaaaa', 15.00, NULL, '1733711621.jpg', 18, 15, 'Chocolates', '2024-12-08 18:33:41', '2024-12-08 18:33:41', 'pack', 2),
(46, 'jonatha', 12.00, NULL, '1733722239.jpg', 18, 15, 'Breakfast', '2024-12-08 21:30:39', '2024-12-08 21:30:39', 'pack', 23),
(47, 'Cream 0 Choco', 9.00, NULL, '1733724286.jpg', 18, 9, 'Breakfast', '2024-12-08 22:04:46', '2024-12-08 22:04:46', 'pack', 2),
(48, 'Cream 0 Chocoaaa', 17.00, NULL, '1733725990.jpg', 18, 10, 'Biscuits', '2024-12-08 22:33:10', '2024-12-08 22:33:10', 'pack', 2),
(50, 'spaghetti', 25.00, NULL, '1733799207.jpg', 10, 8, 'Chocolates', '2024-12-09 18:53:27', '2024-12-09 18:53:27', 'pcs', 3),
(51, 'Rice', 10.00, NULL, '1733800230.jpg', 15, 5, 'Lunch', '2024-12-09 19:10:30', '2024-12-09 19:10:30', 'pcs', 3),
(52, 'hahaha', 12.00, NULL, '1733800278.jpg', 12, 3, 'Breakfast', '2024-12-09 19:11:18', '2024-12-09 19:11:18', 'tray', 12),
(53, 'Macaroni', 25.00, NULL, '1733800348.png', 15, 5, 'Snacks', '2024-12-09 19:12:28', '2024-12-09 19:12:28', 'tray', 3),
(54, 'Banana Que', 12.00, NULL, '1733810987.jpg', 12, 5, 'Breakfast', '2024-12-09 22:09:47', '2024-12-09 22:09:47', 'tray82', 2),
(55, 'toro', 12.00, NULL, '1733811504.png', 15, 8, 'Breakfast', '2024-12-09 22:18:24', '2024-12-09 22:37:01', 'tray82', 2);

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
(140, 'ORD-675A88768D443', 13.00, '2024-12-11 22:53:42', '2024-12-11 22:53:42', 0, 'pending');

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
(150, 140, 23, 1, 13.00, NULL, '2024-12-11 22:53:42', '2024-12-11 22:53:42');

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
('gwOk3xdsCB5LDSUKSWZzAvYw4fwWpXEKgWGjI2k9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1l1bnNhWlRkcXp3cWpSQ2k3VU9XZmhNZVl5c2FNYzNiSjFBc0dTbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXNoaWVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733986605),
('PzkFMOxa1n62Darulv40UXhKxIiMh649ZzSozC45', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazZ6bnJmeGJzZHVYcHpxVng2VTB3dzY2bjN4SHJZNmRDRGlEMjBXMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXNoaWVyL3JlY2VpcHQvMTM5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733984486);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

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
