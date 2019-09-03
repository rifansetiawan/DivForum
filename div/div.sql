-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 02:43 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `div`
--
CREATE DATABASE IF NOT EXISTS `div` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `div`;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Game', '2019-01-04 23:02:21', '2019-01-04 23:02:21'),
(2, 'Anime', '2019-01-04 23:02:26', '2019-01-04 23:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_04_120459_thread', 1),
(4, '2019_01_04_120628_kategori', 1),
(5, '2019_01_04_120757_posting', 1),
(6, '2019_01_04_120959_surat', 1),
(7, '2019_01_04_121149_thread_fk', 1),
(8, '2019_01_04_121337_posting_fk', 1),
(9, '2019_01_04_121436_surat_fk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id_posting` int(10) UNSIGNED NOT NULL,
  `id_thread` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `isi_posting` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id_posting`, `id_thread`, `id_user`, `isi_posting`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'yaah ga ada yg respon.', '2019-01-05 00:50:55', '2019-01-05 01:01:42'),
(4, 1, 2, 'Sorry2.. yok kita nobar... kapan? dan dimana??', '2019-01-05 09:52:16', '2019-01-05 09:52:25'),
(6, 3, 2, 'enak ga mainnya?', '2019-01-05 09:53:37', '2019-01-05 09:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(10) UNSIGNED NOT NULL,
  `id_pengirim` int(10) UNSIGNED NOT NULL,
  `id_penerima` int(10) UNSIGNED NOT NULL,
  `isi_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `id_pengirim`, `id_penerima`, `isi_surat`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 'Fotonya kok kartun neng?', '2019-01-05 10:08:23', '2019-01-05 10:08:23'),
(4, 2, 1, 'Iya nih bang. lagi musim anime2 gitu deh...', '2019-01-05 10:08:57', '2019-01-05 10:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id_thread` int(10) UNSIGNED NOT NULL,
  `nama_thread` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_thread` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id_thread`, `nama_thread`, `id_kategori`, `id_user`, `deskripsi`, `status_thread`, `created_at`, `updated_at`) VALUES
(1, 'Nobar Dragon Ball Super', 2, 1, 'Nobar yuk gan.. episode terakhir nih!!', 'Buka', '2019-01-04 23:45:06', '2019-01-05 00:15:30'),
(3, 'Main Game Fortnite yuuk.', 1, 2, 'gimana rasanya main game Fortnite?', 'Buka', '2019-01-05 09:53:26', '2019-01-05 09:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `baik` int(11) NOT NULL,
  `buruk` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `telp`, `alamat`, `jenis_kelamin`, `foto`, `posisi`, `tanggal_lahir`, `baik`, `buruk`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Luke Skywalker', 'admin@div.com', '$2y$10$8.V/1kzLcN2KdMrhNXvllu0GeOIjxGcD1n6beAf.lzDGu51yAknZ6', '0875442556', 'Jalan Ikan Kue no 40', 'Pria', 'logo.png', 'Admin', '1996-01-20', 2, 1, 'CdYTcM8rlGHZLEOQduT1P2Q5J8fjg58xc4ERa6oVWrLv4dLgEkhz80InO7yD', '2019-01-04 13:34:47', '2019-01-06 13:40:05'),
(2, 'Wanda', 'wanda@gmail.com', '$2y$10$Jh1ycWwy3G6ynWKyffc2D.Yft.MdfyJyf9bz3Ef8EzFffidiNHNka', '08755661556', 'Jalan Rawa Belong no 22', 'Wanita', '2158b09dab18c51da76dc4a1aa591473.jpg', 'Member', '2003-01-15', 1, 1, 'SIYtto5Ok8ryfgogKlgUe1tWC9m5ro8b9VU4Pl4k3Lgd1Hu0K1Cmi4w1H4Wd', '2019-01-04 22:15:46', '2019-01-06 13:43:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id_posting`),
  ADD KEY `posting_id_user_foreign` (`id_user`),
  ADD KEY `posting_id_thread_foreign` (`id_thread`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `surat_id_pengirim_foreign` (`id_pengirim`),
  ADD KEY `surat_id_penerima_foreign` (`id_penerima`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id_thread`),
  ADD KEY `thread_id_user_foreign` (`id_user`),
  ADD KEY `thread_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id_posting` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id_thread` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posting`
--
ALTER TABLE `posting`
  ADD CONSTRAINT `posting_id_thread_foreign` FOREIGN KEY (`id_thread`) REFERENCES `thread` (`id_thread`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posting_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_id_penerima_foreign` FOREIGN KEY (`id_penerima`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_id_pengirim_foreign` FOREIGN KEY (`id_pengirim`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thread_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
