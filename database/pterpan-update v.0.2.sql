-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 12:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl`
--

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
(10, '2023_11_02_125139_create_useremail_table', 1),
(11, '2023_11_06_052605_create_user_transaksi', 2),
(12, '2023_11_10_091725_create_transaksi_bank', 3),
(13, '2023_11_15_113108_create_pengambilmail_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengambilmail`
--

CREATE TABLE `pengambilmail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `berat` varchar(255) NOT NULL,
  `namaLengkap` varchar(100) DEFAULT NULL,
  `nomor` varchar(16) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kodePos` varchar(50) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengambilmail`
--

INSERT INTO `pengambilmail` (`id`, `name`, `email`, `email_verified_at`, `berat`, `namaLengkap`, `nomor`, `alamat`, `kecamatan`, `kota`, `provinsi`, `kodePos`, `catatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Niko', 'bara@gmail.com', NULL, 'medium', 'Niko', '081289934392', 'Jalan Bumijo Kulon', 'Jetis', 'Yogyakarta', 'Daerah Istimewa Yogyakarta', '55231', 'JT1/1100', 'eIJu0MItwXv2h4YHon10WQLBDCnwLZk5JbqHjea2c5pI3ZO0JBejw2GVwVEP', '2023-11-16 02:04:29', '2023-11-16 02:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bank`
--

CREATE TABLE `transaksi_bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPemilik` bigint(20) UNSIGNED NOT NULL,
  `jenisSampah` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `catatanTambahan` text DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL,
  `terkirim` tinyint(1) NOT NULL,
  `bankSampah` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useremail`
--

CREATE TABLE `useremail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `baru` tinyint(1) NOT NULL,
  `namaLengkap` varchar(100) DEFAULT NULL,
  `nomor` varchar(16) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kodePos` varchar(50) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `useremail`
--

INSERT INTO `useremail` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `baru`, `namaLengkap`, `nomor`, `alamat`, `kecamatan`, `kota`, `provinsi`, `kodePos`, `catatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Niko', 'bara@gmail.com', NULL, '$2y$10$iYAaGn1CuaI0XtEk9pgaIuFyVVXHoNIQMrXEWX9zrR2gu3Y7cos86', 'pemilik', 0, 'Nikolaus Pastika Bara Satyaradi', '081289934392', 'Jalan Bumijo Kulon', 'Jetis', 'Yogyakarta', 'Daerah Istimewa Yogyakarta', '55231', 'JT1/1100', 'iHnXBBDVwQOWtYDyktLUFNkZL1O5nEI7PhXs7GTNA3LBzzpJAkWV60sClGws', '2023-11-16 01:59:21', '2023-11-16 02:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_transaksi`
--

CREATE TABLE `user_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPemilik` bigint(20) UNSIGNED NOT NULL,
  `jenisSampah` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kodePos` int(11) NOT NULL,
  `catatan` text DEFAULT NULL,
  `berat` varchar(255) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `buktibayar` varchar(255) DEFAULT NULL,
  `terbayar` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `terambil` tinyint(1) NOT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengambilmail`
--
ALTER TABLE `pengambilmail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengambilmail_email_unique` (`email`);

--
-- Indexes for table `transaksi_bank`
--
ALTER TABLE `transaksi_bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_bank_idpemilik_foreign` (`idPemilik`);

--
-- Indexes for table `useremail`
--
ALTER TABLE `useremail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `useremail_email_unique` (`email`);

--
-- Indexes for table `user_transaksi`
--
ALTER TABLE `user_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_transaksi_idpemilik_foreign` (`idPemilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengambilmail`
--
ALTER TABLE `pengambilmail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi_bank`
--
ALTER TABLE `transaksi_bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useremail`
--
ALTER TABLE `useremail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_transaksi`
--
ALTER TABLE `user_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi_bank`
--
ALTER TABLE `transaksi_bank`
  ADD CONSTRAINT `transaksi_bank_idpemilik_foreign` FOREIGN KEY (`idPemilik`) REFERENCES `useremail` (`id`);

--
-- Constraints for table `user_transaksi`
--
ALTER TABLE `user_transaksi`
  ADD CONSTRAINT `user_transaksi_idpemilik_foreign` FOREIGN KEY (`idPemilik`) REFERENCES `useremail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
