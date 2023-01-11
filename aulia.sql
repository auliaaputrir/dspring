-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2023 pada 18.05
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aulia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `payment_status` enum('Terbayar','Menunggu','Ditolak','Gagal') NOT NULL DEFAULT 'Menunggu',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `reservation_id`, `total`, `payment_status`, `image`, `created_at`, `updated_at`) VALUES
(12, 54, 1000000, 'Terbayar', '1672406792.jpeg', '2022-12-30 06:26:32', '2022-12-30 06:26:32'),
(13, 55, 1000000, 'Terbayar', '1672407045.jpeg', '2022-12-30 06:30:45', '2022-12-30 06:30:45'),
(16, 56, 1200000, 'Menunggu', NULL, '2023-01-09 11:04:09', '2023-01-09 11:04:09'),
(17, 57, 1200000, 'Menunggu', '1673456378.jpg', '2023-01-10 08:27:14', '2023-01-11 09:59:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `period` enum('Bulanan','Tahunan') NOT NULL,
  `stay_date` date NOT NULL,
  `reservation_status` enum('Diterima','Menunggu','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reservations`
--

INSERT INTO `reservations` (`id`, `created_at`, `updated_at`, `room_id`, `user_id`, `period`, `stay_date`, `reservation_status`) VALUES
(54, '2023-01-07 13:21:10', NULL, 12, 17, 'Bulanan', '2023-01-09', 'Diterima'),
(55, '2023-01-04 13:36:19', NULL, 17, 17, 'Bulanan', '2023-01-09', 'Diterima'),
(56, '2023-01-09 13:36:19', '2023-01-09 11:04:09', 14, 17, 'Bulanan', '2023-01-11', 'Diterima'),
(57, '2023-01-10 05:20:10', '2023-01-10 08:27:14', 12, 17, 'Bulanan', '2023-01-11', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` int(11) NOT NULL,
  `floor_number` enum('1','2') NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `room_status` enum('Ada','Tidak Ada') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `floor_number`, `price`, `description`, `room_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 101, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Tidak Ada', '2023-01-02 22:25:07', '2023-01-02 22:50:37', NULL),
(12, 102, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Tidak Ada', '2023-01-02 22:44:09', '2023-01-10 05:20:10', NULL),
(13, 103, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Ada', '2023-01-02 23:03:59', '2023-01-02 23:03:59', NULL),
(14, 104, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Ada', '2023-01-02 23:04:15', '2023-01-02 23:04:15', NULL),
(15, 105, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Ada', '2023-01-02 23:04:38', '2023-01-02 23:04:38', NULL),
(16, 106, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Ada', '2023-01-02 23:04:54', '2023-01-02 23:04:54', NULL),
(17, 107, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Tidak Ada', '2023-01-02 23:05:19', '2023-01-08 12:35:38', NULL),
(18, 108, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\ncloset duduk & shower', 'Ada', NULL, NULL, NULL),
(22, 201, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Ada', NULL, NULL, NULL),
(23, 202, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Ada', NULL, NULL, NULL),
(24, 203, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Ada', NULL, NULL, NULL),
(25, 204, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Ada', NULL, NULL, NULL),
(26, 205, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Ada', NULL, NULL, NULL),
(27, 206, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Ada', NULL, NULL, NULL),
(28, 207, '1', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Ada', NULL, '2023-01-02 23:57:34', NULL),
(29, 208, '2', 1200000, 'Luas 3 x 3,4 M,\r\nlantai granite tile,\r\nmeja & lemari,\r\nspringbed with drawer,\r\nwater heather,\r\ncloset duduk & shower', 'Ada', NULL, NULL, NULL),
(39, 156, '1', 1200000, 'svboor', 'Ada', '2023-01-03 04:57:46', '2023-01-03 04:57:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('admin','penyewa') NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone_number` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `telephone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'Aulia Putri Rachmadani', 'alputrir@gmail.com', '123456', NULL, '$2y$10$gDimyj0KHkN/ZrXj8HAIK.B6KUjd1g2yudsfhj5ITrtZuSRjLzQSe', 'abvjlSwGYQiTeKrhLVH9F95iTBAcQ3a5qivK5VrfeXCPxAs6ilFR1umjLxKk', '2022-11-27 09:22:28', '2022-11-27 09:22:28'),
(9, 'penyewa', 'Coba', 'auliaputrirachmadani@gmail.com', '08972850515', NULL, '$2y$10$gDimyj0KHkN/ZrXj8HAIK.B6KUjd1g2yudsfhj5ITrtZuSRjLzQSe', NULL, '2022-12-26 09:50:34', '2022-12-26 09:50:34'),
(10, 'penyewa', 'Karina Muslimah', 'karina@gmail.com', '08972850515', NULL, '$2y$10$gDimyj0KHkN/ZrXj8HAIK.B6KUjd1g2yudsfhj5ITrtZuSRjLzQSe', NULL, '2023-01-01 07:26:39', '2023-01-01 07:26:39'),
(11, 'penyewa', 'Aulia Putri', 'L200180156@STUDENT.UMS.AC.ID', '08972850923', NULL, '$2y$10$gDimyj0KHkN/ZrXj8HAIK.B6KUjd1g2yudsfhj5ITrtZuSRjLzQSe', NULL, '2023-01-01 07:46:24', '2023-01-01 07:46:24'),
(17, 'penyewa', 'karina', 'karin@gmail.com', '08972850515', NULL, '$2y$10$gDimyj0KHkN/ZrXj8HAIK.B6KUjd1g2yudsfhj5ITrtZuSRjLzQSe', NULL, '2023-01-08 03:44:19', '2023-01-08 03:44:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
