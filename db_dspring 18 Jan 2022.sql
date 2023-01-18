-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 01:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dspring`
--

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_23_222644_create_rooms_table', 1),
(6, '2022_11_23_222732_create_payments_table', 1),
(7, '2022_11_23_222800_create_reservations_table', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `payment_status` enum('Terbayar','Menunggu','Ditolak','Gagal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `reservation_id`, `total`, `payment_status`, `image`, `created_at`, `updated_at`) VALUES
(10, 14, 500000, 'Ditolak', '1674002200.jpeg', '2023-01-18 00:34:53', '2023-01-18 00:37:23');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `period` enum('Bulanan','Tahunan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `stay_date` date NOT NULL,
  `reservation_status` enum('Diterima','Menunggu','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `created_at`, `updated_at`, `room_id`, `user_id`, `period`, `stay_date`, `reservation_status`) VALUES
(14, '2023-01-18 00:33:41', '2023-01-18 00:34:53', 40, 11, 'Bulanan', '2023-01-19', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` int(11) NOT NULL,
  `floor_number` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_status` enum('Tersedia','Terpesan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Terpesan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `floor_number`, `price`, `description`, `room_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 101, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Terpesan', '2023-01-02 22:25:07', '2023-01-18 00:49:42', NULL),
(12, 102, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Tersedia', '2023-01-02 22:44:09', '2023-01-17 16:15:40', NULL),
(13, 103, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Tersedia', '2023-01-02 23:03:59', '2023-01-17 16:24:14', NULL),
(14, 104, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Terpesan', '2023-01-02 23:04:15', '2023-01-18 00:34:53', NULL),
(15, 105, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Terpesan', '2023-01-02 23:04:38', '2023-01-18 00:45:03', NULL),
(16, 106, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Terpesan', '2023-01-02 23:04:54', '2023-01-18 00:50:04', NULL),
(17, 107, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Tersedia', '2023-01-02 23:05:19', '2023-01-13 01:51:25', NULL),
(18, 108, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Tersedia', NULL, '2023-01-17 16:23:53', NULL),
(22, 201, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Tersedia', NULL, '2023-01-15 02:54:49', NULL),
(23, 202, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Tersedia', NULL, '2023-01-17 16:15:15', NULL),
(24, 203, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Tersedia', NULL, '2023-01-17 15:46:16', NULL),
(25, 204, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Tersedia', NULL, NULL, NULL),
(26, 205, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Tersedia', NULL, NULL, NULL),
(27, 206, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Tersedia', NULL, NULL, NULL),
(28, 207, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Terpesan', NULL, '2023-01-18 00:44:42', NULL),
(29, 208, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Tersedia', NULL, NULL, NULL),
(39, 156, '1', 1200000, 'svboo', 'Terpesan', '2023-01-03 04:57:46', '2023-01-18 00:33:15', NULL),
(40, 555, '1', 500000, 'uyru triutyit yo yot', 'Terpesan', '2023-01-12 11:17:21', '2023-01-18 00:33:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('admin','penyewa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `telephone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'Admin', 'alputrir@gmail.com', '123456', NULL, '$2y$10$l5EHc4.pMAMWw.glXHw3fOIlqdvAbjkh2sARg3AU821aXRfLWQbK6', '946I1a2PtVvZqGn4fE9ML5pWe4quYn52A4eIkIJOMXawUGKv0vNxAesdpiTo', '2022-11-27 09:22:28', '2022-11-27 09:22:28'),
(9, 'penyewa', 'Coba', 'auliaputrirachmadani@gmail.com', '08972850515', NULL, '$2y$10$gFCrcxuMLqffOTivbHaC/OWznPVL0EPt9SgfM69AjYSKlRS8VLTmy', NULL, '2022-12-26 09:50:34', '2022-12-26 09:50:34'),
(10, 'penyewa', 'Karina Muslimah', 'karina@gmail.com', '08972850515', NULL, '$2y$10$FEz1Za.Tm06UEsInzOaS7uoWboGNodem8RlZ6qZyW5YQXhBvs2IEy', NULL, '2023-01-01 07:26:39', '2023-01-01 07:26:39'),
(11, 'penyewa', 'Aulia Putri', 'L200180156@STUDENT.UMS.AC.ID', '08972850923', NULL, '$2y$10$Hwn.NWOT8MJr.oha7XtKquVjZSUwbqptj5foEt6sO9teDw45XubgW', NULL, '2023-01-01 07:46:24', '2023-01-01 07:46:24'),
(12, 'penyewa', 'karina', 'karin@gmail.com', '08972850515', NULL, '$2y$10$OwaBB7/KrJ3a2gie79Wp1O9wr9Iax4O7iQFVubJq5.tXi29efLDea', NULL, '2023-01-08 03:44:19', '2023-01-08 03:44:19'),
(13, 'penyewa', 'asa', 'asa@gmail.com', '343235245', NULL, '$2y$10$3so6.W..I89741rIzN6o5uG72mz.c/gETdv.m4/NWeNl7n8eJZMC6', NULL, '2023-01-12 08:43:03', '2023-01-12 08:43:03'),
(14, 'penyewa', 'Nisa', 'nisa@gmail.com', '90830848', NULL, '$2y$10$tOq2gqMwcWFkOG4VCkVfs.wyzNc7toXUlhuhZE2gB3VwPZuSo4NeK', NULL, '2023-01-13 01:37:24', '2023-01-13 01:37:24'),
(15, 'penyewa', 'Tes', 'test@gmail.com', '3545353', NULL, '$2y$10$cbTjoRMC1UvdN7fqMkXmNOAPJaw4yzacSZ4a740dnwbs6KSrfSZrO', NULL, '2023-01-17 15:21:22', '2023-01-17 15:21:22');

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
