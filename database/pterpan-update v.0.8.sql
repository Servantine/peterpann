-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 05:12 PM
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
-- Database: `pterpan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dsn_pembimbing`
--

CREATE TABLE `dsn_pembimbing` (
  `nidn` varchar(8) NOT NULL,
  `nama_dosen` varchar(25) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dtl_kelompok_kkn`
--

CREATE TABLE `dtl_kelompok_kkn` (
  `id_dtl_kelompok_kkn` int(11) NOT NULL,
  `nim` char(8) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `jabatan` enum('Ketua Kelompok','Anggota Kelompok') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_kkn`
--

CREATE TABLE `kelompok_kkn` (
  `id_kelompok` int(11) NOT NULL,
  `id_kkn` int(11) NOT NULL,
  `nidn` varchar(25) NOT NULL,
  `nama_kelompok` varchar(25) NOT NULL,
  `lokasi` varchar(59) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkn`
--

CREATE TABLE `kkn` (
  `id_kkn` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `id_lppm` varchar(75) NOT NULL,
  `nama_kkn` varchar(100) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kegiatan`
--

CREATE TABLE `laporan_kegiatan` (
  `id_laporan_kegiatan` int(11) NOT NULL,
  `id_rencana_kegiatan` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul_laporan` varchar(100) NOT NULL,
  `laporan_kegiatan` text NOT NULL,
  `fileupload` text DEFAULT NULL,
  `acc_dosen` tinyint(1) NOT NULL,
  `komentar_dosen` text DEFAULT NULL,
  `komentar_lppm` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id_logbook` int(11) NOT NULL,
  `nim` char(8) NOT NULL,
  `tanggal` date NOT NULL,
  `isi_logbook` text NOT NULL,
  `acc_dosen` tinyint(1) DEFAULT NULL,
  `acc_admin` tinyint(1) DEFAULT NULL,
  `komentar_dosen` text DEFAULT NULL,
  `komentar_admin` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lppm`
--

CREATE TABLE `lppm` (
  `id_lppm` char(8) NOT NULL,
  `nama_lppm` varchar(75) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lppm`
--

INSERT INTO `lppm` (`id_lppm`, `nama_lppm`, `username`, `password`) VALUES
('12345', 'LPPM', 'LPPM', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rencana_kegiatan`
--

CREATE TABLE `rencana_kegiatan` (
  `id_rencana_kegiatan` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul_kegiatan` varchar(200) NOT NULL,
  `rencana_kegiatan` text NOT NULL,
  `fileupload` text DEFAULT NULL,
  `acc_dosen` tinyint(1) DEFAULT NULL,
  `komentar_dosen` text DEFAULT NULL,
  `komentar_lppm` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dsn_pembimbing`
--
ALTER TABLE `dsn_pembimbing`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `dtl_kelompok_kkn`
--
ALTER TABLE `dtl_kelompok_kkn`
  ADD PRIMARY KEY (`id_dtl_kelompok_kkn`),
  ADD KEY `fk_detail-nim_mahasiswa-nim` (`nim`),
  ADD KEY `fk_detail-id-kelompok_mahasiswa-id-kelompok` (`id_kelompok`);

--
-- Indexes for table `kelompok_kkn`
--
ALTER TABLE `kelompok_kkn`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `fk_kelompok-id-kkn_kkn-id-kkn` (`id_kkn`),
  ADD KEY `fk_kelompok-nidn_dosen-nidn` (`nidn`);

--
-- Indexes for table `kkn`
--
ALTER TABLE `kkn`
  ADD PRIMARY KEY (`id_kkn`),
  ADD KEY `fk_kkn-id-lppm_lppm-id-lppm` (`id_lppm`);

--
-- Indexes for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD PRIMARY KEY (`id_laporan_kegiatan`),
  ADD KEY `fk_laporan-id-kelompok_kelompok-id-kelompok` (`id_kelompok`),
  ADD KEY `fk_rencana-id-rencana_laporan-id-rencana` (`id_rencana_kegiatan`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id_logbook`),
  ADD KEY `fk_logbook-nim_mahasiswa-nim` (`nim`);

--
-- Indexes for table `lppm`
--
ALTER TABLE `lppm`
  ADD PRIMARY KEY (`id_lppm`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `rencana_kegiatan`
--
ALTER TABLE `rencana_kegiatan`
  ADD PRIMARY KEY (`id_rencana_kegiatan`),
  ADD KEY `fk_rencana-id-kelompok_laporan-id-kelompok` (`id_kelompok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dtl_kelompok_kkn`
--
ALTER TABLE `dtl_kelompok_kkn`
  MODIFY `id_dtl_kelompok_kkn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelompok_kkn`
--
ALTER TABLE `kelompok_kkn`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kkn`
--
ALTER TABLE `kkn`
  MODIFY `id_kkn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  MODIFY `id_laporan_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rencana_kegiatan`
--
ALTER TABLE `rencana_kegiatan`
  MODIFY `id_rencana_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dtl_kelompok_kkn`
--
ALTER TABLE `dtl_kelompok_kkn`
  ADD CONSTRAINT `fk_detail-id-kelompok_mahasiswa-id-kelompok` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok_kkn` (`id_kelompok`),
  ADD CONSTRAINT `fk_detail-nim_mahasiswa-nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON UPDATE CASCADE;

--
-- Constraints for table `kelompok_kkn`
--
ALTER TABLE `kelompok_kkn`
  ADD CONSTRAINT `fk_kelompok-id-kkn_kkn-id-kkn` FOREIGN KEY (`id_kkn`) REFERENCES `kkn` (`id_kkn`),
  ADD CONSTRAINT `fk_kelompok-nidn_dosen-nidn` FOREIGN KEY (`nidn`) REFERENCES `dsn_pembimbing` (`nidn`) ON UPDATE CASCADE;

--
-- Constraints for table `kkn`
--
ALTER TABLE `kkn`
  ADD CONSTRAINT `fk_kkn-id-lppm_lppm-id-lppm` FOREIGN KEY (`id_lppm`) REFERENCES `lppm` (`id_lppm`);

--
-- Constraints for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD CONSTRAINT `fk_laporan-id-kelompok_kelompok-id-kelompok` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok_kkn` (`id_kelompok`),
  ADD CONSTRAINT `fk_rencana-id-rencana_laporan-id-rencana` FOREIGN KEY (`id_rencana_kegiatan`) REFERENCES `rencana_kegiatan` (`id_rencana_kegiatan`);

--
-- Constraints for table `logbook`
--
ALTER TABLE `logbook`
  ADD CONSTRAINT `fk_logbook-nim_mahasiswa-nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `rencana_kegiatan`
--
ALTER TABLE `rencana_kegiatan`
  ADD CONSTRAINT `fk_rencana-id-kelompok_laporan-id-kelompok` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok_kkn` (`id_kelompok`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
