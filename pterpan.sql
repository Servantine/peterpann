-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 05:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

--
-- Dumping data for table `dsn_pembimbing`
--

INSERT INTO `dsn_pembimbing` (`nidn`, `nama_dosen`, `jabatan`, `prodi`, `fakultas`, `no_telp`, `password`) VALUES
('12203324', 'Tori', 'Dosen Tetap', 'S-1 Arsitektur', 'Arsitektur', '+6281289934322', '123'),
('12203326', 'Tika', 'Dosen Tidak Tetap', 'S-1 Manajemen', 'Bisnis', '+6281289934369', '123'),
('8020123', 'Albertus Shamu', 'Dosen Tetap', 'S-1 Arsitektur', 'Arsitektur', '08954123221', '123');

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

--
-- Dumping data for table `dtl_kelompok_kkn`
--

INSERT INTO `dtl_kelompok_kkn` (`id_dtl_kelompok_kkn`, `nim`, `id_kelompok`, `jabatan`) VALUES
(1, '72210451', 5, 'Ketua Kelompok'),
(2, '72210456', 5, 'Anggota Kelompok'),
(3, '72210450', 6, 'Anggota Kelompok'),
(4, '72210669', 8, 'Ketua Kelompok');

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

--
-- Dumping data for table `kelompok_kkn`
--

INSERT INTO `kelompok_kkn` (`id_kelompok`, `id_kkn`, `nidn`, `nama_kelompok`, `lokasi`, `alamat`) VALUES
(5, 4, '12203326', 'Kelompok DESA BALONG 1', 'BEJI, DESA BALONG, Jepara Regency, Central Java 59453', 'Sidorejo, Balong, Kembang, Jepara Regency, Central Java 59453'),
(6, 5, '12203324', 'Kelompok KKN DESA TEMBI 1', 'DESA TEMBI, BANTUL, YOGYAKARTA', 'Jl. Desa Wisata Tembi, Gatak, Timbulharjo, Kec. Sewon, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55185'),
(7, 4, '12203326', 'Kelompok DESA BALONG 2', 'Sawah, DESA BALONG', 'Sawah, Balong, Kec. Kembang, Kabupaten Jepara, Jawa Tengah 59453'),
(8, 6, '12203326', 'KKN Kelompok 1 UKDW', 'Universitas Kristen Duta Wacana', 'Jl. Dr. Wahidin Sudirohusodo No.5-25, Kotabaru, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224'),
(9, 4, '12203326', 'Kelompok Desa Penari', 'Muntilan', 'Jl. Kartini No.1, Balemulyo, Muntilan, Kec. Muntilan, Kabupaten Magelang, Jawa Tengah 56412');

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

--
-- Dumping data for table `kkn`
--

INSERT INTO `kkn` (`id_kkn`, `kode`, `id_lppm`, `nama_kkn`, `tema`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(4, 'KKN2023-01', '12345', 'KKN DESA BALONG', 'Masyarakat, Alam', '2023-12-04', '2024-01-18'),
(5, 'KKN2023-2', '12345', 'KKN DESA TEMBI', 'PARIWISATA', '2023-12-19', '2023-12-19'),
(6, 'KKN2023-3', '12345', 'KKN UKDW MAJU BERSAMA ', 'Melayani Masyarakat', '2023-12-20', '2024-01-20'),
(7, 'KKN2023-4', '12345', 'KKN UKDW Lancar Jaya', 'Bersama Membangun Kebersamaan', '2023-12-21', '2024-01-21');

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

--
-- Dumping data for table `laporan_kegiatan`
--

INSERT INTO `laporan_kegiatan` (`id_laporan_kegiatan`, `id_rencana_kegiatan`, `id_kelompok`, `tanggal`, `judul_laporan`, `laporan_kegiatan`, `fileupload`, `acc_dosen`, `komentar_dosen`, `komentar_lppm`) VALUES
(21, 8, 5, '2023-12-18', '', 'Morbi semper fringilla maximus. Nullam pretium pulvinar turpis, non commodo ex malesuada elementum. Duis interdum consequat enim. Morbi scelerisque eget lacus id ornare. Vivamus ut justo iaculis est malesuada gravida. Aenean lacinia felis non est hendrerit lacinia. Proin tempor lobortis quam non laoreet. Nam et orci et erat eleifend aliquam sit amet at erat. Vestibulum ultrices elit est, eget gravida nisl accumsan quis. Aliquam ornare hendrerit volutpat. Aliquam venenatis lorem nulla, in luctus enim tempus convallis. Phasellus congue dignissim dolor, non maximus lectus dapibus eget. Maecenas quis mattis neque. Proin fringilla sed purus sit amet auctor. Praesent elementum rhoncus diam non scelerisque.\r\n\r\nSuspendisse efficitur velit mi, ac eleifend mi congue eget. Quisque finibus dui eu hendrerit bibendum. Integer facilisis tempor pretium. Donec non euismod tellus, id rutrum nisl. Integer posuere sapien sit amet hendrerit mattis. Sed aliquam aliquet metus. Mauris ut magna ut libero blandit sodales eu ac arcu. Mauris massa sem, imperdiet vitae enim id, elementum rhoncus elit. Cras tincidunt, ex vel dapibus ultricies, diam arcu tincidunt ligula, et facilisis massa elit sit amet eros. Vestibulum consequat facilisis lorem, quis euismod sapien fermentum in. Integer luctus sagittis felis, vitae scelerisque libero finibus sit amet. Curabitur eu scelerisque ipsum. Nulla varius elementum commodo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat.', '8_Jadwal registrasi Semester Gasal 2324.pdf', 0, NULL, 'Testsd\r\n'),
(22, 9, 5, '2023-12-20', '', 'Berhasil', NULL, 1, 'bagus terlaksana dengan baik', NULL),
(23, 10, 5, '2023-12-21', '', 'Lompat sangat tinggi hingga ke gunung kembar.', '10_Soal_UAS.pdf', 0, NULL, NULL);

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

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id_logbook`, `nim`, `tanggal`, `isi_logbook`, `acc_dosen`, `acc_admin`, `komentar_dosen`, `komentar_admin`) VALUES
(11, '72210456', '2023-12-19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget mauris pretium, euismod diam ut, sagittis magna. Cras urna libero, luctus et malesuada id, feugiat non felis. Suspendisse nec condimentum lacus, in cursus libero. Quisque consequat ullamcorper urna quis vulputate. Sed ac rutrum nibh. Duis fringilla felis sed nisi lacinia pulvinar. Phasellus commodo lobortis sagittis. Pellentesque convallis nulla bibendum orci accumsan, non viverra risus pretium.\n\nDuis ac volutpat mauris. Aliquam ac elementum orci, tincidunt egestas quam. Duis in accumsan justo, in tempus mauris. Aenean luctus leo ipsum, quis gravida enim tincidunt eu. Maecenas iaculis volutpat sem. Fusce sit amet enim est. Praesent nunc tortor, pulvinar feugiat lacus a, porta tristique nunc. Duis sit amet quam tempor, condimentum quam quis, auctor erat. Cras ultrices neque lectus, id varius tortor porttitor at. Praesent ultrices eros nec quam faucibus hendrerit. Vivamus tellus lacus, hendrerit a risus vitae, iaculis posuere mi. Sed vitae arcu elit. Donec arcu justo, interdum nec sem rhoncus, auctor rhoncus mi.', 1, NULL, 'sangat bagus', 'qtest\r\n'),
(12, '72210456', '2023-12-20', 'logbook 1', NULL, NULL, NULL, ''),
(13, '72210456', '2023-12-21', 'Sangat Indah sekali', NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`, `fakultas`, `angkatan`, `password`, `nilai`, `catatan`) VALUES
('72210450', 'Antonius Istori Prayogi', 'S-1 Kedokteran', 'Kedokteran', 2021, '123', NULL, NULL),
('72210451', 'Gabriel Sean Bing', 'S-1 Teologi', 'Teologi', 2021, '123', 80, NULL),
('72210456', 'Nikolaus Pastika Bara Satyaradi', 'S-1 Sistem Informasi', 'Teknologi Informasi', 2021, '123', 81, NULL),
('72210669', 'Jerry', 'S-1 Kedokteran', 'Kedokteran', 2021, '123', NULL, NULL);

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
-- Dumping data for table `rencana_kegiatan`
--

INSERT INTO `rencana_kegiatan` (`id_rencana_kegiatan`, `id_kelompok`, `tanggal`, `judul_kegiatan`, `rencana_kegiatan`, `fileupload`, `acc_dosen`, `komentar_dosen`, `komentar_lppm`) VALUES
(7, 5, '2023-12-18', 'Laporan Kegiatan 1', 'In mi risus, vehicula ut urna at, hendrerit facilisis lacus. Nullam nec tellus non ipsum euismod pulvinar a nec diam. In sed eros id tortor laoreet laoreet vel vitae lorem. Phasellus at vehicula nulla, eu blandit nunc. Ut accumsan dui elit, at scelerisque turpis fermentum et. Phasellus et lacus quam. Maecenas accumsan nibh et sodales malesuada. Aliquam eget orci interdum, dictum lectus ut, ultricies urna. Maecenas sodales elit turpis, ac cursus nibh pellentesque vitae. Vestibulum volutpat, sapien dapibus commodo molestie, ex nisl eleifend purus, sit amet ullamcorper ex libero vel urna.\r\n\r\nIn eget velit sed enim faucibus sagittis. Nam massa dui, efficitur quis egestas sit amet, posuere eu metus. Duis sodales eu est vitae cursus. Nullam malesuada commodo leo, ultricies molestie dui posuere ut. Pellentesque non enim dolor. Praesent sollicitudin, dolor tristique mollis feugiat, tortor sem vulputate lorem, ultrices euismod augue elit at nunc. Mauris convallis ligula ac risus porta, vel bibendum erat lobortis. Aliquam sed urna nunc. Nulla ut felis vitae eros varius lacinia id at eros. Maecenas fringilla accumsan sem, vitae scelerisque nisi pulvinar id. Donec scelerisque scelerisque ullamcorper. Duis ac eleifend arcu, at sodales arcu. Sed lobortis in orci nec egestas. Nam lobortis, sapien ut luctus tempor, sapien mi hendrerit libero, nec finibus magna eros eu est. Vestibulum vehicula magna vitae nulla tempus facilisis. Phasellus mattis bibendum diam nec suscipit.', NULL, NULL, NULL, NULL),
(8, 5, '2023-12-18', 'Latihan Microsoft Word', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam laoreet urna. Praesent ullamcorper purus quis metus mattis iaculis. Fusce vel neque et velit interdum vulputate quis nec orci. Nullam luctus ullamcorper urna. Maecenas dapibus elit ut auctor aliquam. Maecenas aliquet felis nisi, id euismod magna cursus id. Vestibulum sed posuere sapien. Phasellus elementum nec odio sed porttitor. Vestibulum a ullamcorper eros, ac egestas dolor.\r\n\r\nSed vel dui nec leo euismod sagittis ac et ipsum. Sed consequat diam et tortor blandit congue. Integer gravida porta quam. Cras mollis malesuada posuere. Sed iaculis ligula lorem, sit amet congue massa rutrum quis. Suspendisse semper volutpat viverra. Cras interdum arcu ut congue consequat. Mauris lacinia dolor faucibus, auctor mauris eget, interdum ante. Nunc tempor eros eu tristique malesuada. Morbi tempor blandit elementum. Ut bibendum pharetra elit. Etiam lorem est, tincidunt vitae dui vitae, congue porta quam. Fusce commodo risus egestas metus pulvinar semper. Duis vel purus semper, rutrum massa vel, porttitor lectus. Maecenas scelerisque nulla risus, non sodales erat tempus nec. Curabitur a est non sapien dapibus malesuada.', 'Latihan Microsoft Word_DFD.pptx.pdf', NULL, NULL, NULL),
(9, 5, '2023-12-20', 'Latihan Power Point', 'Melatih Swadaya masyarakat', 'Latihan Power Point_MSIB Captstone Project.pdf', 1, 'bagus ide yang menarik', NULL),
(10, 5, '2023-12-21', 'Lompat tali bersama gadis desa', 'Melompat lompat', NULL, NULL, NULL, NULL);

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
  MODIFY `id_dtl_kelompok_kkn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelompok_kkn`
--
ALTER TABLE `kelompok_kkn`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kkn`
--
ALTER TABLE `kkn`
  MODIFY `id_kkn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  MODIFY `id_laporan_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rencana_kegiatan`
--
ALTER TABLE `rencana_kegiatan`
  MODIFY `id_rencana_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
