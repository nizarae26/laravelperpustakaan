-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 05:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `rak_id` bigint(20) UNSIGNED NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `slug`, `sampul`, `penulis`, `penerbit_id`, `kategori_id`, `rak_id`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Bintang', 'Bintang', '1708048311-jpg', 'Tere Liye', 1, 1, 1, 11, '2024-02-15 18:38:31', '2024-02-26 10:45:45'),
(2, 'Matahari', 'Matahari', '1708048344-jpg', 'Tere Liye', 2, 2, 2, 10, '2024-02-15 18:38:31', '2024-02-26 10:45:42'),
(3, 'Gus Baha', 'Gus Baha', '1708391514-jpg', 'Khoirul Anam', 3, 3, 3, 0, '2024-02-19 18:08:55', '2024-02-20 18:32:24'),
(4, 'Mbah Moen', 'KH Maimoen Zubair', '2024-02-20mbahmoen.jpg', 'Rene Islam', 1, 3, 2, 9, '2024-02-19 18:20:46', '2024-02-27 03:38:48'),
(6, 'Soekarno', 'Soekarno', '2024-02-22soekarno.jpg', 'Taufik Adi Susilo', 1, 4, 1, 10, '2024-02-22 02:49:10', '2024-02-26 10:32:47'),
(7, 'Great Trendlines', 'Great Trendlines Trading Rider', '1708943684-jpg', 'Makin Jr', 4, 7, 3, 10, '2024-02-26 01:20:37', '2024-02-26 10:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `id` int(11) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorit`
--

INSERT INTO `favorit` (`id`, `users_id`, `buku_id`, `created_at`, `updated_at`) VALUES
(7, 12, 3, '2024-02-19 23:43:10', '2024-02-19 23:43:10'),
(8, 12, 4, '2024-02-19 23:44:14', '2024-02-19 23:44:14'),
(9, 12, 1, '2024-02-19 23:44:18', '2024-02-19 23:44:18'),
(11, 12, 7, '2024-02-26 10:52:22', '2024-02-26 10:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Novel', 'Novel', '2024-02-15 18:38:31', '2024-02-18 07:46:28'),
(2, 'Sejarah', 'Sejarah', '2024-02-15 18:38:31', '2024-02-18 07:46:41'),
(3, 'Religi', 'Religi', '2024-02-15 18:38:31', '2024-02-19 18:09:09'),
(4, 'Biografi', 'Biografi', '2024-02-15 18:38:31', '2024-02-24 14:58:45'),
(5, 'Komik', 'Komik', '2024-02-15 18:38:31', '2024-02-24 14:59:04'),
(6, 'Non Fiksi', 'Non Fiksii', '2024-02-22 01:01:51', '2024-02-22 12:51:25'),
(7, 'Education', 'Education', '2024-02-26 01:21:03', '2024-02-26 01:21:03');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_08_115350_create_permission_tables', 1),
(7, '2024_01_08_115619_create_kategori_table', 1),
(8, '2024_01_08_120115_create_rak_table', 1),
(9, '2024_01_08_120139_create_penerbit_table', 1),
(10, '2024_01_08_120201_create_buku_table', 1),
(11, '2024_02_15_022647_create_peminjaman_table', 1),
(12, '2024_02_15_023124_create_detail_peminjaman_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_pinjam` timestamp NULL DEFAULT NULL,
  `batas_pinjam` timestamp NULL DEFAULT NULL,
  `tanggal_kembali` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `kode_pinjam`, `users_id`, `buku_id`, `status`, `tanggal_pinjam`, `batas_pinjam`, `tanggal_kembali`, `created_at`, `updated_at`) VALUES
(8, '33632597', 3, 1, 2, '2024-02-29 17:00:00', '2024-03-31 17:00:00', '2024-02-26 10:45:45', '2024-02-16 04:01:02', '2024-02-26 10:45:45'),
(9, '519440151', 4, 2, 2, '2024-02-16 17:00:00', '2024-03-16 17:00:00', '2024-02-26 10:45:42', '2024-02-17 05:40:33', '2024-02-26 10:45:42'),
(76, '830178074', 12, 1, 2, '2024-02-26 01:46:13', '2024-03-26 01:46:13', '2024-02-26 10:45:40', '2024-02-26 01:46:13', '2024-02-26 10:45:40'),
(78, '286956643', 12, 4, 2, '2024-02-27 03:22:10', '2024-03-27 03:22:10', '2024-02-27 03:38:48', '2024-02-27 03:22:10', '2024-02-27 03:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'gramedia', 'gramedia', '2024-02-15 18:38:31', '2024-02-15 18:38:31'),
(2, 'Erlangga', 'Erlangga', '2024-02-15 18:38:31', '2024-02-22 12:54:16'),
(3, 'Elex Media Komputindo', 'Elex Media Komputindo', '2024-02-19 18:09:26', '2024-02-19 18:10:09'),
(4, 'Lautan Pustaka', 'Lautan Pustaka', '2024-02-26 01:21:21', '2024-02-26 01:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id`, `rak`, `baris`, `slug`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1-1', 1, '2024-02-15 18:38:31', '2024-02-15 18:38:31'),
(2, '1', '2', '1-2', 1, '2024-02-15 18:38:31', '2024-02-15 18:38:31'),
(3, '1', '3', '1-3', 1, '2024-02-15 18:38:31', '2024-02-15 18:38:31'),
(4, '1', '4', '1-4', 1, '2024-02-15 18:38:31', '2024-02-15 18:38:31'),
(5, '1', '5', '1-5', 1, '2024-02-15 18:38:31', '2024-02-15 18:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-02-15 18:38:29', '2024-02-15 18:38:29'),
(2, 'operator', 'web', '2024-02-15 18:38:29', '2024-02-15 18:38:29'),
(3, 'peminjam', 'web', '2024-02-15 18:38:29', '2024-02-15 18:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(11) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(11) UNSIGNED NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `users_id`, `buku_id`, `ulasan`, `rating`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'keren', 5, '2024-02-17 21:19:59', '2024-02-17 21:19:59'),
(2, 4, 2, 'keren', 5, '2024-02-17 21:21:46', '2024-02-17 21:21:46'),
(3, 4, 2, 'keren', 5, '2024-02-17 21:23:39', '2024-02-17 21:23:39'),
(4, 4, 2, 'keren', 2, '2024-02-17 21:24:01', '2024-02-17 21:24:01'),
(5, 4, 2, 'keren', 5, '2024-02-17 21:26:25', '2024-02-17 21:26:25'),
(6, 4, 2, 'keren', 3, '2024-02-17 21:28:11', '2024-02-17 21:28:11'),
(7, 3, 2, 'keren banget', 5, '2024-02-18 18:32:48', '2024-02-18 18:32:48'),
(8, 3, 2, 'kerenennnnnn', 0, '2024-02-18 18:32:55', '2024-02-18 18:32:55'),
(9, 3, 2, 'kerennnnnnnn', 5, '2024-02-18 18:33:04', '2024-02-18 18:33:04'),
(10, 3, 2, 'kerennnnnbanget', 5, '2024-02-18 18:33:14', '2024-02-18 18:33:14'),
(11, 3, 1, 'kerennn', 5, '2024-02-18 18:34:33', '2024-02-18 18:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, '2024-02-15 18:38:29', '$2y$12$XIiwOhpY9ZO2Yy/y8xx5XuW48dol.homfKcSEoznw8rwKcGI58Tra', NULL, '2024-02-15 18:38:30', '2024-02-15 18:38:30'),
(2, 'operator', 'operator@gmail.com', 2, '2024-02-15 18:38:30', '$2y$12$nKtGKIKzCai7CbBbJ2YHT.MQ1EeJc2FXINfi4DFBTs/3F5mO7bzDS', NULL, '2024-02-15 18:38:30', '2024-02-15 18:38:30'),
(3, 'peminjam', 'peminjam@gmail.com', 3, '2024-02-15 18:38:30', '$2y$12$vHxVcgIVXbiCpL6bYPIw0.CrFDRqO18Wr1keHDIO26Sd5gio7aPcK', NULL, '2024-02-15 18:38:30', '2024-02-15 18:38:30'),
(4, 'coba', 'coba@gmail.com', 3, '2024-02-16 12:41:37', '$2y$12$vHxVcgIVXbiCpL6bYPIw0.CrFDRqO18Wr1keHDIO26Sd5gio7aPcK', NULL, '2024-02-19 04:01:15', '2024-02-19 04:01:52'),
(5, 'jajal', 'jajal@gmail.com', 3, NULL, '$2y$12$KfD7AnTQNAr3d9OD4Qt67usvfuABxFUsi3hKlhzo244Jeeku.vR0.', NULL, '2024-02-16 20:18:59', '2024-02-16 20:18:59'),
(10, 'nn', 'nn@gmail.com', 3, NULL, '$2y$12$8S7HCWq7tMWq.Edcg8QipeGRLBQ9M/4Dl3sxtRD16GDi0juvzcM/i', NULL, '2024-02-16 21:02:30', '2024-02-16 21:02:30'),
(11, 'coba', 'cobaa@gmail.com', 3, NULL, '$2y$12$oJ6hA/LxV/lCMiTuAz0tlOjOsi4ZG6r0nTudx.FCmp2Bp7Y.5tKJu', NULL, '2024-02-16 21:07:24', '2024-02-16 21:07:24'),
(12, 'biasa', 'biasa@gmail.com', 3, NULL, '$2y$12$3h5NX0iK/MzQdmJda3zaMO1Pxg99ids6VKIdmwWZJcC5/DKiYE4o2', NULL, '2024-02-19 18:06:46', '2024-02-19 18:06:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penerbit_id` (`penerbit_id`,`kategori_id`,`rak_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `rak_id` (`rak_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`,`buku_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
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
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_id` (`buku_id`),
  ADD KEY `peminjam_id` (`users_id`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`,`buku_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`rak_id`) REFERENCES `rak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rak`
--
ALTER TABLE `rak`
  ADD CONSTRAINT `rak_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
