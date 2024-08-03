-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2024 at 08:43 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_31_153347_create_roles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', 'admin', NULL, NULL),
(2, '2', 'employee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genders` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `f_name`, `l_name`, `genders`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', '$2y$12$PzZs7htwnokM7ufPnBP5OO5CQjLcznqaB2nUf8eoyPjwFNWTgXR2S', 'SuperAdmin', 'Neverdie', 'male', '1', NULL, NULL, '2024-08-03 13:41:54'),
(2, 'wmante', '$2y$12$v3jmUXt7TbDM82n0EOy4WOv8xfj80Kv2vn65wr2QcwQ9r6weIiR4m', 'Marlin', 'Wisoky', 'female', '1', NULL, '2024-07-31 09:03:53', '2024-07-31 09:03:53'),
(3, 'Harry_Wiegand', '$2y$12$pbff02AarPAkV4UZMNOaG.xxAAoszmztoAgbtVvVtGaFgVUXYjt2W', 'Harry', 'Wiegand', 'male', '2', NULL, '2024-07-31 09:03:53', '2024-08-03 12:25:11'),
(4, 'runolfsdottir.milford', '$2y$12$OroGn/WEW9tFkEAR6d90HuUmopLUb84IWiYRwRs.Csf7QZC/LjAO.', 'Coty', 'Kirlin', 'male', '2', NULL, '2024-07-31 09:03:54', '2024-07-31 09:03:54'),
(5, 'wisozk.maia', '$2y$12$R42Xn/8UH1gicGLJm/f.ROfFqC6PY.4ZHmi5O1NgLToXla7GDeUiW', 'Jarrod', 'Armstrong', 'female', '2', NULL, '2024-07-31 09:03:54', '2024-08-03 12:20:14'),
(6, 'patricia47', '$2y$12$4gYDfIZTSWYCw9RVsl/I/.L8mhnKSI1U4GRqz/VpKBmlpUPCCkwt2', 'Vivien', 'Kling', 'male', '1', NULL, '2024-07-31 09:03:54', '2024-07-31 09:03:54'),
(7, 'wilderman.shayne', '$2y$12$GtcmmtTN8N.BLGNgwHrKM.SwwQF9Oz386XQyshB.SHeyBGBmC3Ala', 'Coty', 'Schaefer', 'female', '1', NULL, '2024-07-31 09:03:54', '2024-07-31 09:03:54'),
(8, 'elise28', '$2y$12$Ynz/e9oCL3qw7uQhQd4LWOkCoCFDkb6fa.XJV2yShRzZTpHE4O2Zi', 'Bailee', 'Fisher', 'female', '2', NULL, '2024-07-31 09:03:55', '2024-08-03 12:12:31'),
(9, 'reichel_kendrick', '$2y$12$BZC5mE2qWT1bR.SjDHKrRex.SOOEoex5tI4o9hV7VOlnp3OcNzIQS', 'Naomi', 'Reinger', 'female', '2', NULL, '2024-07-31 09:03:55', '2024-08-03 11:39:38'),
(10, 'tyrell_rake', '$2y$12$yxp6Pb855nfUXGHu93xoAeY68kj5l7X0ht3WhbmQI3KbE/haLlXzC', 'Tyrell', 'Rake', 'male', '2', NULL, '2024-08-02 12:37:45', '2024-08-03 11:21:42'),
(11, 'tyler_rake', '$2y$12$74PyL/xEvNVQRmjAP9klMul/lRJQO1qsB1nxfn4f1i4YpsZgvAAOu', 'Tyler', 'Rake', 'male', '2', NULL, '2024-08-03 12:22:27', '2024-08-03 12:22:27'),
(12, 'Lynas_x', '$2y$12$37ItKbLJyoAirdU/oPUS0eywfD98ugkEAwv/ANQYGryPcavo2twNq', 'Lynas', 'X', 'male', '2', NULL, '2024-08-03 12:37:25', '2024-08-03 12:37:25'),
(13, 'Wiz_khaliffa', '$2y$12$k/v54qFch42KkD0ci2ohuuMc1chnxMBo54B.t6CNAhZxoRfl3/rXO', 'Wiz', 'khaliffa', 'male', '2', NULL, '2024-08-03 12:38:01', '2024-08-03 12:38:01'),
(14, 'Selena_gmz', '$2y$12$LoGYbQDTS1uzx5wcVVLr4eS3oyZZes7zRGu.9iRhFCR/fN5CHxY06', 'Selena', 'Gomez', 'female', '2', NULL, '2024-08-03 12:38:41', '2024-08-03 12:38:41'),
(15, 'Hardy_jj', '$2y$12$T5nm882anHg/B.AD1w0QkuvTtBY5CGYw6SJ1585ucvJJdMLiH/L5W', 'Hardy', 'Jones', 'female', '2', NULL, '2024-08-03 12:39:23', '2024-08-03 12:39:23');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
