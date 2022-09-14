-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 06:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hossam ragab', 'hragab366@gmail.com', NULL, '$2y$10$w5x9PeeXHKZim/TfOXKe5ete5UauH3NHLRNqwJ2kpq2TDoisnjvXG', NULL, '2022-09-07 01:53:45', '2022-09-07 01:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'sweater', '631817457e5e3.jpg', '2022-09-07 02:00:05', '2022-09-07 02:00:05'),
(2, 'Suits', '6318177293687.jpg', '2022-09-07 02:00:50', '2022-09-07 02:00:50'),
(3, 'Shoes', '6318177e099d2.jpg', '2022-09-07 02:01:02', '2022-09-07 02:01:02'),
(4, 'Dress', '6318179192dfb.jpg', '2022-09-07 02:01:21', '2022-09-07 02:01:21'),
(5, 'Kids clothes', '631817a87a2fa.jpg', '2022-09-07 02:01:44', '2022-09-07 02:01:44'),
(6, 'Coat', '631817d14158e.jpg', '2022-09-07 02:02:25', '2022-09-07 02:02:25'),
(7, 'Men\'s', '631817f3d0243.jpg', '2022-09-07 02:02:59', '2022-09-07 02:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_08_28_192846_create_admins_table', 1),
(4, '2022_08_29_170908_create_categories_table', 1),
(5, '2022_08_29_170946_create_products_table', 1),
(6, '2022_09_07_185137_create_orders_table', 2),
(8, '2022_09_07_190306_create_orderd__products_table', 3),
(9, '2022_09_13_151537_create_sales_table', 4),
(10, '2022_09_13_184356_create_tasks_table', 5),
(11, '2022_09_14_020929_create_notifications_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('5296f746-71e2-4dad-a55f-3899093543aa', 'App\\Notifications\\OrderCreated', 'App\\Models\\Admin', 1, '{\"user_name\":\"hossam ragab\",\"order_id\":6039}', NULL, '2022-09-14 13:28:58', '2022-09-14 13:28:58'),
('fec4e524-06cb-40b2-88ae-815ada061e73', 'App\\Notifications\\OrderCreated', 'App\\Models\\Admin', 1, '{\"user_name\":\"hossam ragab\",\"order_id\":7678}', '2022-09-14 01:17:45', '2022-09-14 00:34:53', '2022-09-14 00:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `orderd__products`
--

CREATE TABLE `orderd__products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `oder_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderd__products`
--

INSERT INTO `orderd__products` (`id`, `product_id`, `user_id`, `oder_id`, `created_at`, `updated_at`) VALUES
(18, 3, 1, 1808, '2022-09-10 13:51:40', NULL),
(19, 2, 1, 1808, '2022-09-10 13:51:40', NULL),
(20, 5, 1, 3134, '2022-09-14 02:27:12', NULL),
(21, 11, 1, 3134, '2022-09-14 02:27:13', NULL),
(22, 16, 1, 3134, '2022-09-14 02:27:13', NULL),
(26, 5, 1, 6039, '2022-09-14 15:28:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `First_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `State` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `Confirmed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `First_name`, `Last_name`, `Address_1`, `Address_2`, `email`, `Phone`, `Country`, `City`, `State`, `zip`, `user_id`, `total`, `created_at`, `updated_at`, `Confirmed`) VALUES
(1808, 'adel', 'mohamed', 'adasfkoh i', 'aojfhsiadhfi', 'hragab366@gmail.com', '0120 414 7942', NULL, 'ALEXANDRIA', 'sadasfs', 10001, 1, 1220, '2022-09-10 11:51:40', '2022-09-13 14:45:02', '1'),
(3134, 'Hisham', 'Ragab', 'adadsjaojdi', 'asdjkhasdhui', 'captenavira233@gmail.com', '0120 414 7942', NULL, 'ALEXANDRIA', 'cairo', 10001, 1, 1520, '2022-09-14 00:27:12', '2022-09-14 00:27:12', '0'),
(6039, 'Yasmine', 'mohamed', 'adasfsfasfa', 'AXHGHUASIGDIUASI', 'captenavira233@gmail.com', '01281632088', NULL, 'ALEXANDRIA', 'adadad', 10001, 1, 320, '2022-09-14 13:28:58', '2022-09-14 13:28:58', '0');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `descreption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_price` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `category_id`, `descreption`, `old_price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'T-shirt', 500, 7, NULL, 650, '6318c42724c21.jpg', NULL, NULL),
(2, 'shoes', 600, 3, NULL, 1000, '6318c4481f74a.jpg', NULL, NULL),
(3, 'T-shirt 1', 600, 7, NULL, 900, '6318c467d42ac.jpg', NULL, NULL),
(4, 'sweet shirt 1', 200, 7, NULL, NULL, '6320c76ebe497.png', NULL, NULL),
(5, 'sweet shirt 2', 300, 7, NULL, NULL, '6320c78dd423c.png', NULL, NULL),
(6, 'T-shirt 4', 800, 7, NULL, 1200, '6320cb1779722.jpg', NULL, NULL),
(7, 'T-shirt 5', 700, 7, NULL, NULL, '6320cb2d106c8.png', NULL, NULL),
(8, 'shirt', 600, 7, NULL, 800, '6320cb4e8cad5.jpg', NULL, NULL),
(9, 'sweater 2', 500, 1, NULL, NULL, '6320cb727eb25.jpg', NULL, NULL),
(10, 'sweater 4', 800, 1, NULL, 1000, '6320cbb39276a.jpg', NULL, NULL),
(11, 'blue sweater', 900, 1, NULL, NULL, '6320cbe6ebfff.jpg', NULL, NULL),
(12, 'sweater 8', 600, 1, NULL, 800, '6320cc2504621.jpg', NULL, NULL),
(13, 'Dress 1', 300, 4, NULL, NULL, '6320cc4bb0bef.jpg', NULL, NULL),
(14, 'Dress 2', 500, 4, NULL, NULL, '6320cc94104e2.jpg', NULL, NULL),
(15, 'Dress 3', 800, 4, NULL, NULL, '6320cca5e0674.jpg', NULL, NULL),
(16, 'Dress 4', 300, 4, NULL, NULL, '6320ccb858d80.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_related_order`
--

CREATE TABLE `products_related_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `orderdproducts_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `orderd_products_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `Sold_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `order_id`, `user_id`, `Sold_at`) VALUES
(3, 1808, 1, '2022-09-13 16:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Update All prices', '1', '2022-09-13 17:18:41', '2022-09-13 17:18:41'),
(2, 'Add women clothes', '1', '2022-09-13 17:33:44', '2022-09-13 17:38:56'),
(3, 'Add trousers category', '0', '2022-09-14 14:05:29', '2022-09-14 14:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hossam ragab', 'hragab366@gmail.com', NULL, '$2y$10$NxBxXtiK2UYGXdr/ngH1x.yRrJ.ekBCJRYvNjcz3VqrZQBlrtrCJa', NULL, '2022-09-07 01:58:53', '2022-09-07 01:58:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orderd__products`
--
ALTER TABLE `orderd__products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderd__products_product_id_foreign` (`product_id`),
  ADD KEY `orderd__products_user_id_foreign` (`user_id`),
  ADD KEY `orderd__products_oder_id_foreign` (`oder_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `products_related_order`
--
ALTER TABLE `products_related_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_related_order_order_id_foreign` (`order_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_order_order_id_foreign` (`order_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_order_id_foreign` (`order_id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderd__products`
--
ALTER TABLE `orderd__products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products_related_order`
--
ALTER TABLE `products_related_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderd__products`
--
ALTER TABLE `orderd__products`
  ADD CONSTRAINT `orderd__products_oder_id_foreign` FOREIGN KEY (`oder_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderd__products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderd__products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_related_order`
--
ALTER TABLE `products_related_order`
  ADD CONSTRAINT `products_related_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
