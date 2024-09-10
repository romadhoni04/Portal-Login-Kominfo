-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2024 at 03:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_login_kominfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(3, 1, 'Voluptate voluptas consequatur perspiciatis recusandae voluptatem eius.', '2024-09-09 10:50:18', '2024-09-09 10:50:18'),
(4, 11, 'Distinctio ipsa expedita accusantium et sit quo unde.', '2024-09-09 10:50:18', '2024-09-09 10:50:18'),
(6, 4, 'Laudantium fuga doloribus magnam corporis voluptas soluta.', '2024-09-09 10:50:18', '2024-09-09 10:50:18'),
(9, 13, 'Sit in quaerat velit aut fuga eaque.', '2024-09-09 10:50:18', '2024-09-09 10:50:18'),
(10, 1, 'Consectetur quia sunt quas in pariatur eos.', '2024-09-09 10:50:18', '2024-09-09 10:50:18'),
(11, 2, 'Contoh aktivitas', '2024-09-09 18:05:23', '2024-09-09 18:05:23'),
(12, 2, 'Contoh aktivitas', '2024-09-09 18:12:11', '2024-09-09 18:12:11'),
(13, 14, 'Nihil officiis ut vero aut a quas.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(14, 4, 'Optio laborum et saepe aspernatur laudantium odio commodi.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(18, 1, 'Consectetur vel architecto rem aliquid non distinctio.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(21, 1, 'Laboriosam in culpa aut.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(24, 11, 'Ratione minima non sunt delectus.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(26, 2, 'Doloribus aut mollitia necessitatibus qui et vel aut doloribus.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(27, 11, 'Laboriosam accusantium fuga distinctio consectetur quisquam.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(30, 3, 'A molestias dolor et commodi officiis.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(31, 2, 'Ut eveniet perferendis non optio non aut cumque.', '2024-09-09 18:13:01', '2024-09-09 18:13:01'),
(32, 4, 'Aut ut nemo natus et quisquam omnis.', '2024-09-09 18:13:01', '2024-09-09 18:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_28_064043_add_last_name_to_users_table', 2),
(5, '2024_08_30_012530_add_profile_image_to_users_table', 2),
(6, '2024_09_04_030605_add_role_to_users_table', 3),
(7, '2024_09_05_010046_create_permission_tables', 4),
(8, '2024_09_09_172416_create_activity_logs_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('anam1@gmail.com', '$2y$12$HosPe8LvcEt8j4rYkhgEX.Ms47EowIqMlV12.WlvG1RpLuPlo6p1C', '2024-09-05 20:55:45'),
('dhoniroma676@gmail.com', '$2y$12$BtfTWgZ8VKT.nLYRXt96YOX3AhSdDH6PVX.EIDf.UKecbJ7jAlXp2', '2024-09-03 20:33:02'),
('sayagans0412@gmail.com', '$2y$12$ZZdbCiDjeKEvP5ETmLRaMumghekLNI/UjbNl33pn9ZRA2S34dx0Ne', '2024-09-05 20:29:59'),
('tempetahu190@gmail.com', '$2y$12$WiXsxgaOkap63LCfI2WvG.bFRkHWZY7kZUgcu8h5am1eWPOhfaEIG', '2024-09-07 08:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2024-09-04 18:07:38', '2024-09-04 18:07:38'),
(2, 'Administrator', 'web', '2024-09-07 18:22:52', '2024-09-07 18:22:52'),
(3, 'User', 'web', '2024-09-09 08:24:34', '2024-09-09 08:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `profile_image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Super Admin', 'Roma Dhoni', 'dhoniroma676@gmail.com', NULL, NULL, '$2y$12$HucBAG8DxQwQFCcBccEnnuXeb2PaO9gow7VrF52NnPWt1Z5QXogPO', NULL, '2024-09-04 03:20:18', '2024-09-07 12:46:48', 'superadmin'),
(2, 'Roma', 'Dhoni', 'tempetahu190@gmail.com', NULL, NULL, '$2y$12$sSMdBAGZFHZVE3YH3nDzz.o4L3RaewyHCPdtl4Z26M5pjfOKfGULa', 'RQUQY2NYAnPqFhvffFBCWZy8CNWOMhqXL86NHaUa2dlsW70Y1fSoVfIoddo4', '2024-09-03 20:36:27', '2024-09-05 20:27:31', 'user'),
(3, 'Roma', 'Dhoni', 'admin@gmail.com', NULL, NULL, '$2y$12$HucBAG8DxQwQFCcBccEnnuXeb2PaO9gow7VrF52NnPWt1Z5QXogPO', NULL, '2024-09-03 21:27:05', '2024-09-04 00:11:49', 'administrator'),
(4, 'Doni', 'Ganteng', 'sayagans0412@gmail.com', NULL, NULL, '$2y$12$HucBAG8DxQwQFCcBccEnnuXeb2PaO9gow7VrF52NnPWt1Z5QXogPO', NULL, '2024-09-04 18:39:03', '2024-09-07 12:44:24', 'administrator'),
(11, 'endah', 'santoso', 'tes@gmail.com', NULL, NULL, '$2y$12$CmhcKwmzQdKRglEysaGoyOSIBcvhc.8gir0fo6hDzHvzfrlwCmtu6', NULL, '2024-09-09 08:20:55', '2024-09-09 08:49:17', 'user'),
(13, 'Roma', 'Dhoni', 'sindidoniaja@gmail.com', NULL, NULL, '$2y$12$LAK84VFYoGrp9fnOHmWHteCHvMyCtFfUWqFyuPIYtAPewLZqibCQy', NULL, '2024-09-09 08:39:29', '2024-09-09 08:39:29', 'administrator'),
(14, 'roma', 'tes saja', 'saya@mail.com', NULL, NULL, '$2y$12$5EP8lQF7y7PGOMzgIRTs4.U0.dEhAjTYAwMaM02o6OQfws89YA7S.', NULL, '2024-09-09 08:49:52', '2024-09-09 08:50:50', 'administrator'),
(15, 'doni', 'ganteng', 'anjay@gmail.com', NULL, NULL, '$2y$12$6mW7HxZHMzb0BXU56nSSeOIX1ArnDQGI9v0h2JUKJTHAcJFMFa2Ua', NULL, '2024-09-09 18:14:15', '2024-09-09 18:14:15', 'administrator'),
(17, 'Roma', 'Dhoni', 'tesadmin@gmail.com', NULL, NULL, '$2y$12$X4bbTNXkGKIcdFGFuRtTZOKmlExo2HkdgZ9TdJMhLgHKpKSp2VC2W', NULL, '2024-09-10 00:45:43', '2024-09-10 00:45:43', 'administrator'),
(19, 'administrator', 'doni', 'adminaja@gmail.com', NULL, NULL, '$2y$12$AEWXonCg0jldPMAbAxHPse9VpQIEzM3xI0reDZrjbi.7JRRDqVOgW', NULL, '2024-09-10 02:43:53', '2024-09-10 02:43:53', 'administrator'),
(20, 'user', 'doni', 'useraja1@gmail.com', NULL, NULL, '$2y$12$uJun4U4HrmEzTLJAyPQWf.k8nVcuxTdpZctYuxK9geuW4vIdYgUXG', NULL, '2024-09-10 02:44:22', '2024-09-10 02:44:22', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
