-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 06:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email_akun` varchar(50) DEFAULT NULL,
  `pass_akun` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `tgl_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama_akun`, `username`, `email_akun`, `pass_akun`, `level`, `tgl_insert`) VALUES
(1, 'Ahmad', 'ahmad', NULL, 'ahmad', 0, '2021-06-16 07:42:39'),
(2, 'Admin', 'admin', NULL, 'admin', 1, '2021-06-16 07:43:00'),
(3, 'Rena Dwi', 'rena', '', 'rena', 2, '2021-06-16 15:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `sampul_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_pengadu` int(11) NOT NULL,
  `keterangan_pengaduan` text NOT NULL,
  `status_pengaduan` varchar(100) NOT NULL,
  `bukti_pengaduan` text DEFAULT NULL,
  `id_sekretaris` int(11) DEFAULT NULL,
  `tgl_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `id_pengadu`, `keterangan_pengaduan`, `status_pengaduan`, `bukti_pengaduan`, `id_sekretaris`, `tgl_insert`) VALUES
(1, 1, 'Tetangga menggunakan knalpot berisik\r\n', 'Sudah ditindak lanjuti', NULL, 3, '2021-06-17 10:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `id_pemohon` int(11) NOT NULL,
  `jenis_permohonan` varchar(15) NOT NULL,
  `keterangan_permohonan` text NOT NULL,
  `status_permohonan` varchar(100) NOT NULL,
  `file_pendukung` varchar(255) NOT NULL,
  `surat` text NOT NULL,
  `id_sekretaris` int(11) NOT NULL,
  `tgl_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id_permohonan`, `id_pemohon`, `jenis_permohonan`, `keterangan_permohonan`, `status_permohonan`, `file_pendukung`, `surat`, `id_sekretaris`, `tgl_insert`) VALUES
(1, 1, 'KTP', 'Mohon untuk pengantar pembuatan KTP', 'Disetujui', 'default.png', '<h4><b><u>DISETUJUI</u></b></h4><p>Ahmad boleh membuat KTP</p>', 3, '2021-06-17 10:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `alamat_desa` text NOT NULL,
  `sejarah_desa` text NOT NULL,
  `tgl_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `nama_desa`, `visi`, `misi`, `alamat_desa`, `sejarah_desa`, `tgl_insert`) VALUES
(1, 'Hariang Buahdua', '\"Menjadi desa termaju\"', '\"Membangun desa yang melek teknologi\"', 'Jl. Blablabla No. 1', '<h4 style=\"text-align: center; \"><b>SEJARAH KAMI</b></h4><ul><li>Dibangun pada 1934</li><li>Diresmikan pada 1940</li></ul>', '2021-06-17 17:02:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
