-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 23, 2024 at 12:45 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

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
-- Table structure for table `belum_menikah`
--

CREATE TABLE `belum_menikah` (
  `id_belum_menikah` int(50) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `tanggal_belum_menikah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cerai_mati`
--

CREATE TABLE `cerai_mati` (
  `id_cerai_mati` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `tanggal_cerai_mati` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
--

CREATE TABLE `domisili` (
  `id_domisili` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `no_surat_rt` varchar(255) NOT NULL,
  `tanggal_domisili` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kedatangan`
--

CREATE TABLE `kedatangan` (
  `id` int(11) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `alasan_datang` varchar(100) NOT NULL,
  `alamat_tujuan` varchar(100) NOT NULL,
  `klasifikasi_datang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelahiran`
--

CREATE TABLE `kelahiran` (
  `id_kelahiran` int(11) NOT NULL,
  `nik_ayah` bigint(16) NOT NULL,
  `nik_ibu` bigint(16) NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `kelamin_anak` varchar(15) NOT NULL,
  `tempat_lahir_anak` varchar(255) NOT NULL,
  `tanggal_lahir_anak` date NOT NULL,
  `jam_lahir_anak` varchar(10) NOT NULL,
  `hari_lahir_anak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `id` int(11) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `hari_wafat` varchar(20) NOT NULL,
  `tanggal_wafat` date NOT NULL,
  `pukul` time NOT NULL,
  `sebab_wafat` varchar(50) NOT NULL,
  `tempat` text NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menikah`
--

CREATE TABLE `menikah` (
  `id_menikah` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `tanggal_menikah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` bigint(16) NOT NULL,
  `no_kk` bigint(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `keperluan_penghasilan` text NOT NULL,
  `jumlah_penghasilan` int(11) NOT NULL,
  `tanggal_penghasilan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pindah`
--

CREATE TABLE `pindah` (
  `id` int(11) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `alasan_pindah` varchar(100) NOT NULL,
  `alamat_tujuan` varchar(100) NOT NULL,
  `klasifikasi_pindah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skck`
--

CREATE TABLE `skck` (
  `id_skck` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `tanggal_skck` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sktm_kesehatan`
--

CREATE TABLE `sktm_kesehatan` (
  `id_sktm_kesehatan` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `nik_anak` bigint(16) NOT NULL,
  `nik_ayah` bigint(16) NOT NULL,
  `tanggal_sktm_kesehatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sktm_pendidikan`
--

CREATE TABLE `sktm_pendidikan` (
  `id_sktm_pendidikan` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `nik_ayah` varchar(30) NOT NULL,
  `nik_anak` varchar(30) NOT NULL,
  `tanggal_sktm_pendidikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_kelahiran`
--

CREATE TABLE `surat_kelahiran` (
  `id_surat_kelahiran` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `id_kelahiran` int(11) NOT NULL,
  `tanggal_surat_kelahiran` date NOT NULL,
  `nik_pelapor` bigint(16) NOT NULL,
  `hubungan_sebagai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `surat_kematian`
--

CREATE TABLE `surat_kematian` (
  `id_surat_kematian` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `id_kematian` int(11) NOT NULL,
  `nik_pelapor` bigint(16) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `hubungan_sebagai` varchar(100) NOT NULL,
  `tanggal_surat_kematian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin','pimpinan') NOT NULL,
  `nip` char(18) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belum_menikah`
--
ALTER TABLE `belum_menikah`
  ADD PRIMARY KEY (`id_belum_menikah`);

--
-- Indexes for table `cerai_mati`
--
ALTER TABLE `cerai_mati`
  ADD PRIMARY KEY (`id_cerai_mati`);

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`);

--
-- Indexes for table `kedatangan`
--
ALTER TABLE `kedatangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menikah`
--
ALTER TABLE `menikah`
  ADD PRIMARY KEY (`id_menikah`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `pindah`
--
ALTER TABLE `pindah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skck`
--
ALTER TABLE `skck`
  ADD PRIMARY KEY (`id_skck`);

--
-- Indexes for table `sktm_kesehatan`
--
ALTER TABLE `sktm_kesehatan`
  ADD PRIMARY KEY (`id_sktm_kesehatan`);

--
-- Indexes for table `sktm_pendidikan`
--
ALTER TABLE `sktm_pendidikan`
  ADD PRIMARY KEY (`id_sktm_pendidikan`);

--
-- Indexes for table `surat_kelahiran`
--
ALTER TABLE `surat_kelahiran`
  ADD PRIMARY KEY (`id_surat_kelahiran`);

--
-- Indexes for table `surat_kematian`
--
ALTER TABLE `surat_kematian`
  ADD PRIMARY KEY (`id_surat_kematian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `belum_menikah`
--
ALTER TABLE `belum_menikah`
  MODIFY `id_belum_menikah` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cerai_mati`
--
ALTER TABLE `cerai_mati`
  MODIFY `id_cerai_mati` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kedatangan`
--
ALTER TABLE `kedatangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menikah`
--
ALTER TABLE `menikah`
  MODIFY `id_menikah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skck`
--
ALTER TABLE `skck`
  MODIFY `id_skck` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sktm_kesehatan`
--
ALTER TABLE `sktm_kesehatan`
  MODIFY `id_sktm_kesehatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sktm_pendidikan`
--
ALTER TABLE `sktm_pendidikan`
  MODIFY `id_sktm_pendidikan` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_kelahiran`
--
ALTER TABLE `surat_kelahiran`
  MODIFY `id_surat_kelahiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_kematian`
--
ALTER TABLE `surat_kematian`
  MODIFY `id_surat_kematian` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
