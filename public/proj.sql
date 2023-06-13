-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 02:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nrc_number` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `address`, `nrc_number`, `phone_number`, `gender`, `password`, `profile_image`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Peter Parker', 'spider.man@example.com', '36413 West Fords Apt. 359\r\nWendyborough, AR 48651-6453', '12/LaMaTa(N)398890', '415.397.3462', 'male', '$2y$10$BtA0EHwQr61owJjd9KnIpO37sgrAQBcDilsoOQ4Uqqq2WEdJQhzWm', '20230324033814_71df9295429fe131e89b24d5c992f512.jpg', 'admin', '2023-03-23 21:04:19', '2023-04-01 17:56:08'),
(4, 'Daredevil', 'daredevil@gmail.com', 'Hell Kitchen', '12/NaYaNa(N)006666', '801-756-6252', 'male', '$2y$10$t3k30VO0Rp7GU2krenZHSuZtuz3vgC1iebt.De4P7qLXdQOaMJDHC', '20230402003133_k6ubl4cs70aa1.jpg', 'staff', '2023-04-01 18:01:33', '2023-04-01 22:13:08'),
(5, 'Steve Rogers', 'steve.rogers@gmail.com', 'Brooklyn, NY', '12/BaHaNa(E)002234', '+49 174 6801372', 'male', '$2y$10$yP3EGLyDU8.ppiZkTXY0VOebRgO.Nw6EZPjkiP7p0rcsF1DtkgR9.', '20230415062600_CapAmerica-EndgameProfile.webp', 'admin', '2023-04-14 23:56:00', '2023-04-22 10:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Adidas', '2023-03-23 21:04:19', '2023-03-23 21:04:19'),
(3, 'Uniqlo', '2023-03-23 21:04:19', '2023-03-23 21:04:19'),
(4, 'H & M', '2023-03-23 21:04:19', '2023-04-14 12:28:15'),
(6, 'Nike', '2023-04-21 22:10:30', '2023-04-21 22:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'T-shirts', '2023-03-23 21:04:19', '2023-03-23 21:04:19'),
(2, 'Shirts', '2023-03-23 21:04:19', '2023-03-23 21:04:19'),
(3, 'Jackets', '2023-03-23 21:04:19', '2023-03-23 21:04:19'),
(4, 'Pants', '2023-03-23 21:04:19', '2023-04-15 20:31:26'),
(5, 'Shorts', '2023-03-23 21:04:19', '2023-04-14 09:21:45'),
(6, 'Skirts', '2023-03-23 21:04:19', '2023-03-23 21:04:19'),
(8, 'Hoodies', '2023-04-15 06:56:55', '2023-04-15 06:56:55');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_14_062953_create_admins_table', 1),
(6, '2023_02_14_063026_create_categories_table', 1),
(7, '2023_02_14_063054_create_brands_table', 1),
(8, '2023_02_14_063108_create_products_table', 1),
(9, '2023_02_14_063137_create_suppliers_table', 1),
(10, '2023_02_14_063230_create_purchases_table', 1),
(11, '2023_02_14_063306_create_purchase_details_table', 1),
(12, '2023_02_19_173732_create_orders_table', 1),
(13, '2023_02_21_043022_create_order_details_table', 1),
(14, '2023_03_06_012925_create_wishlists_table', 1),
(15, '2023_03_08_183843_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `untaxed_total` bigint(20) UNSIGNED NOT NULL,
  `vat` bigint(20) UNSIGNED NOT NULL,
  `grand_total` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `status` enum('in progress','in delivery','completed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `untaxed_total`, `vat`, `grand_total`, `first_name`, `last_name`, `delivery_address`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, '2023-04-27', 255000, 12750, 267750, 'Clark', 'Kent', 'Metropolis', '09111222334', 'completed', '2023-04-27 02:51:24', '2023-04-28 23:41:43'),
(7, 1, '2023-04-29', 250000, 12500, 262500, 'Johnny', 'Depp', 'NY', '09972698017', 'completed', '2023-04-28 23:38:31', '2023-04-28 23:41:29'),
(8, 1, '2023-04-29', 450000, 22500, 472500, 'Nay', 'Toe', 'Yangon', '0935228796', 'in progress', '2023-04-29 00:54:26', '2023-04-29 00:54:26'),
(9, 1, '2023-04-29', 510000, 25500, 535500, 'Clark', 'Kent', 'Metropolis', '09345667189', 'in delivery', '2023-04-29 01:11:39', '2023-06-13 05:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `sub_total`, `created_at`, `updated_at`) VALUES
(6, 'UP-NAV-L', 1, 255000, '2023-04-27 02:51:24', '2023-04-27 02:51:24'),
(7, 'LTLSSPH-RED-M', 1, 250000, '2023-04-28 23:38:31', '2023-04-28 23:38:31'),
(8, 'LTLSSPH-RED-M', 1, 250000, '2023-04-29 00:54:26', '2023-04-29 00:54:26'),
(8, 'S-BEI-M', 1, 200000, '2023-04-29 00:54:26', '2023-04-29 00:54:26'),
(9, 'UP-NAV-L', 2, 510000, '2023-04-29 01:11:39', '2023-04-29 01:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `size` enum('XS','S','M','L','XL','2XL','3XL') NOT NULL,
  `color` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Kid') NOT NULL,
  `instock` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `front_image` varchar(255) NOT NULL,
  `back_image` varchar(255) NOT NULL,
  `average_rating` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `size`, `color`, `gender`, `instock`, `category_id`, `brand_id`, `front_image`, `back_image`, `average_rating`, `created_at`, `updated_at`) VALUES
('ACFTJ-BLA-M', 'Adicolor Classic Firebird Track Jacket', 250000.00, 'M', 'Black', 'Female', 10, 3, 2, 'c1967d071800479ab901af000088fe87_9366.webp', 'f053a78b537b401085d0af00008906a5_9366.webp', 0.00, '2023-04-15 07:02:53', '2023-04-15 20:35:15'),
('LTLSSPH-RED-M', 'Looney Tunes Long-Sleeve Sweat Pullover Hoodie', 250000.00, 'M', 'Red', 'Male', 34, 8, 3, 'ezgif.com-gif-maker.png', 'goods_457403_sub14.webp', 5.00, '2023-04-14 22:23:31', '2023-04-28 23:41:25'),
('LTLSSPH-RED-S', 'Looney Tunes Long-Sleeve Sweat Pullover Hoodie', 250000.00, 'S', 'Red', 'Male', 4, 8, 3, 'ezgif.com-gif-maker.png', 'goods_457403_sub14.webp', 0.00, '2023-04-15 06:56:41', '2023-04-15 06:59:51'),
('MBOFSBJ-BLA-M', 'Men\'s Black Oversized Fit Satin Baseball Jacket', 250000.00, 'M', 'Black', 'Male', 100015, 3, 4, 'hmgoepprod (2).webp', 'hmgoepprod (3).webp', 0.00, '2023-04-15 20:32:40', '2023-04-29 01:16:26'),
('S-BEI-M', 'Shacket', 200000.00, 'M', 'Beige', 'Female', 15, 3, 3, 'hmgoepprod.jpeg', 'shacket-brown.png', 0.00, '2023-04-22 10:11:30', '2023-04-22 10:13:28'),
('T2TJ-BLA-M', 'Tira 21 Track Jacket', 270000.00, 'M', 'Black', 'Male', 10, 3, 2, 'trio_21_track_jacket_front_black.png', 'trio 21 track jacket back.png', 0.00, '2023-04-15 07:03:47', '2023-04-16 23:13:04'),
('UP-BRO-M', 'Utility Parka', 255000.00, 'M', 'Brown', 'Male', 10, 3, 3, 'usgoods_24_453848.webp', 'usgoods_453848_sub7.webp', 0.00, '2023-04-16 06:20:08', '2023-04-16 06:20:08'),
('UP-NAV-L', 'Utility Parka', 255000.00, 'L', 'Navy', 'Male', 4, 3, 3, 'usgoods_69_453848.webp', 'usgoods_453848_sub6.webp', 0.00, '2023-04-15 07:00:59', '2023-06-13 05:24:01'),
('UP-NAV-M', 'Utility Parka', 255000.00, 'M', 'Navy', 'Male', 39, 3, 3, 'usgoods_69_453848.webp', 'usgoods_453848_sub6.webp', 0.00, '2023-04-14 12:34:13', '2023-04-29 01:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` date NOT NULL,
  `untaxed_total` bigint(20) UNSIGNED NOT NULL,
  `vat` bigint(20) UNSIGNED NOT NULL,
  `grand_total` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','completed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `admin_id`, `supplier_id`, `purchase_date`, `untaxed_total`, `vat`, `grand_total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2023-04-15', 1000000, 50000, 1050000, 'completed', '2023-04-14 23:46:21', '2023-04-14 23:46:27'),
(2, 5, 6, '2023-04-15', 1500000, 75000, 1575000, 'completed', '2023-04-15 00:12:56', '2023-04-15 00:51:10'),
(6, 5, 6, '2023-04-22', 1000000, 50000, 1050000, 'completed', '2023-04-21 22:11:52', '2023-04-21 22:12:07'),
(7, 5, 6, '2023-04-22', 1500000, 75000, 1575000, 'completed', '2023-04-22 10:00:52', '2023-04-22 10:01:15'),
(9, 5, 6, '2023-04-29', 400000, 20000, 420000, 'completed', '2023-04-29 01:16:10', '2023-04-29 01:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `sub_total` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`purchase_id`, `product_id`, `quantity`, `price`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 'LTLSSPH-RED-M', 10, 100000, 1000000, '2023-04-14 23:46:21', '2023-04-14 23:46:21'),
(2, 'UP-NAV-M', 10, 150000, 1500000, '2023-04-15 00:12:56', '2023-04-15 00:12:56'),
(6, 'LTLSSPH-RED-M', 10, 100000, 1000000, '2023-04-21 22:11:52', '2023-04-21 22:11:52'),
(7, 'MBOFSBJ-BLA-M', 5, 100000, 500000, '2023-04-22 10:00:52', '2023-04-22 10:00:52'),
(7, 'UP-NAV-L', 10, 100000, 1000000, '2023-04-22 10:00:52', '2023-04-22 10:00:52'),
(9, 'MBOFSBJ-BLA-M', 100000, 4, 400000, '2023-04-29 01:16:10', '2023-04-29 01:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(6, 'LTLSSPH-RED-M', 1, 5, 'Great Product', '2023-04-20 05:25:20', '2023-04-20 05:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(5, 'Nike Sportswear', '09345151512', 'Germany', '2023-04-13 21:18:33', '2023-04-13 21:18:33'),
(6, 'Uniqo Supplier', '09342118971', 'Japan', '2023-04-15 00:03:46', '2023-04-15 00:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `phone_number`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Superman', 'superman@gmail.com', 'Metropolis', '(435) 497-0896', '$2y$10$/BiLNq.qgM/Sdjs8yJsFs.hEb7sphshcSzGHUwtU2RmhZPALGctqu', '2023-03-23 21:04:19', '2023-04-29 01:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 1, 'MBOFSBJ-BLA-M', '2023-04-20 05:08:53', '2023-04-20 05:08:53'),
(8, 1, 'ACFTJ-BLA-M', '2023-04-22 10:16:14', '2023-04-22 10:16:14');

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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_admin_id_foreign` (`admin_id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`purchase_id`,`product_id`),
  ADD KEY `purchase_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
