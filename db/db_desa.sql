-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 18, 2024 at 12:24 PM
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
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_belum_menikah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `belum_menikah`
--

INSERT INTO `belum_menikah` (`id_belum_menikah`, `id_pejabat`, `nik`, `tanggal_belum_menikah`) VALUES
(1, 1, '123456789', '2019-11-15'),
(2, 1, '3215260112990001', '2019-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `cerai_mati`
--

CREATE TABLE `cerai_mati` (
  `id_cerai_mati` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_cerai_mati` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cerai_mati`
--

INSERT INTO `cerai_mati` (`id_cerai_mati`, `id_pejabat`, `nik`, `tanggal_cerai_mati`) VALUES
(1, 1, '123456789', '2019-11-14'),
(2, 1, '3215260112990001', '2019-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
--

CREATE TABLE `domisili` (
  `id_domisili` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `no_surat_rt` varchar(255) NOT NULL,
  `tanggal_domisili` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domisili`
--

INSERT INTO `domisili` (`id_domisili`, `id_pejabat`, `nik`, `no_surat_rt`, `tanggal_domisili`) VALUES
(2, 1, '123456789', '1', '2019-11-15'),
(3, 1, '12312421424', '123', '2019-11-21'),
(4, 1, '321560400820003', '123', '2019-11-23'),
(5, 1, '3215260112990001', 'svsd', '2019-11-25'),
(6, 1, '3215260112990001', 'oijk', '2024-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `id` bigint(16) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `hari_wafat` varchar(20) NOT NULL,
  `tanggal_wafat` date NOT NULL,
  `pukul` time NOT NULL,
  `sebab_wafat` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`id`, `nik`, `hari_wafat`, `tanggal_wafat`, `pukul`, `sebab_wafat`, `keterangan`) VALUES
(0, '3215260400820003', 'Senin', '2024-11-12', '12:09:00', 'Jantung', '');

-- --------------------------------------------------------

--
-- Table structure for table `menikah`
--

CREATE TABLE `menikah` (
  `id_menikah` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_menikah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menikah`
--

INSERT INTO `menikah` (`id_menikah`, `id_pejabat`, `nik`, `tanggal_menikah`) VALUES
(1, 1, '42432', '2019-11-15'),
(2, 1, '2147483647', '2019-11-16'),
(3, 1, '3215260401050001', '2019-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `pemakaman`
--

CREATE TABLE `pemakaman` (
  `id_pemakaman` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_pemakaman` varchar(255) NOT NULL,
  `hari_pemakaman` varchar(30) NOT NULL,
  `tanggal_dimakamkan` date NOT NULL,
  `jam_dimakamkan` varchar(10) NOT NULL,
  `tanggal_pemakaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakaman`
--

INSERT INTO `pemakaman` (`id_pemakaman`, `id_pejabat`, `nik`, `tanggal_lahir`, `tempat_pemakaman`, `hari_pemakaman`, `tanggal_dimakamkan`, `jam_dimakamkan`, `tanggal_pemakaman`) VALUES
(1, 1, '2147483647', '0000-00-00', 'Tegal', '4', '0000-00-00', '10:30', '2019-11-15'),
(2, 1, '42432', '0000-00-00', 'Tegal', '', '0000-00-00', '11:11', '2019-11-20'),
(3, 1, '3215260112990001', '0000-00-00', 'vssd', '', '0000-00-00', '22:02', '2019-11-25'),
(4, 1, '3215260400820003', '0000-00-00', 'assaa', '', '0000-00-00', '11:01', '2019-11-25');

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
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `no_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `agama`, `status_perkawinan`, `pekerjaan`) VALUES
(3215260112990001, 3215262108070011, 'Muhamad Husein', 'Karawang', '1999-12-04', 'Laki Laki', 'Sukamaju ,Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371       ', '010', '011', 'Islam', 'Belum Menikah', 'Belum Bekerja'),
(3215260400820003, 3215261009140482, 'Agus Saefudin', 'Karawang', '1992-08-04', 'Laki Laki', 'Krajan 1 Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371 ', '003', 'Kepala Dusun Krajan 1', 'Islam', 'Menikah', 'Mahasiswa'),
(3215260401050001, 3215262108070011, 'Tedi Rahman', 'Karawang', '2005-01-04', 'Laki Laki', 'Sukamaju ,Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371 ', '010', 'Kepala Dusun Sukamaju', 'Islam', 'Belum Menikah', 'Belum Bekerja'),
(3215260607060001, 3215262108070011, 'Sugiri', 'Karwang', '2006-07-06', 'Laki Laki', 'Sukamaju ,Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371 ', '010', 'Kepala Dusun Sukamaju', 'Islam', 'Belum Menikah', 'Belum Bekerja'),
(3215261607780001, 3215267007900001, 'Suhendar', 'Karawang', '1987-07-16', 'Laki Laki', 'Sukamaju ,Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371  ', '001', 'Kepala Dusun Sukamaju', 'Islam', 'Menikah', 'Buruh'),
(3215262207990004, 3215261009140482, 'Angga Nugraha', 'Karawang', '1999-07-22', 'Laki Laki', 'Krajan 1 Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371 ', '003', 'Kepala Dusun Krajan 1', 'Islam', 'Belum Menikah', 'Pelajar'),
(3215262701170002, 3215262108070011, 'David Syahputra', 'Karawang', '2017-01-21', 'Laki Laki', 'Sukamaju ,Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371 ', '010', 'Kepala Dusun Sukamaju', 'Islam', 'Belum Menikah', 'Belum Bekerja'),
(3215264206720008, 3215262108070011, 'Sarni', 'Karawang', '1972-08-02', 'Perempuan', 'Krajan 1 Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371       ', '003', 'Kepala Dusun Krajan 1', 'Islam', 'Belum Menikah', 'Mengurus Rumah Tangg'),
(3215265010760002, 3215260807190011, 'Entin Sutini', 'Karawang', '1976-10-10', 'Perempuan', 'Krajan 1', '002', 'Kepala Dusun Krajan 1', 'Islam', 'Belum Menikah', 'Mengurus Rumah Tangg'),
(3215266909080001, 3215262108070011, 'Rita Khodijah', 'Karawang', '2008-09-29', 'Perempuan', 'Sukamaju ,Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371 ', '010', 'Kepala Dusun Sukamaju', 'Islam', 'Belum Menikah', 'Belum Bekerja'),
(3215267007900001, 3215262108070011, 'Ijah', 'Karawang', '1990-07-30', 'Perempuan', 'Sukamaju ,Desa Warung Bambu , Kecamatan Karawang Timur Kota Karawan. 41371    ', '010', 'Kepala Dusun Sukamaju', 'Islam', 'Menikah', 'Megurus Rumah Tangga');

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id_penghasilan` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `keperluan_penghasilan` text NOT NULL,
  `jumlah_penghasilan` int(11) NOT NULL,
  `tanggal_penghasilan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghasilan`
--

INSERT INTO `penghasilan` (`id_penghasilan`, `id_pejabat`, `nik`, `keperluan_penghasilan`, `jumlah_penghasilan`, `tanggal_penghasilan`) VALUES
(1, 1, '2147483647', 'dsss', 24324324, '2019-11-14'),
(2, 1, '3215260112990001', 'fdsg', 2125, '2019-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `pindah`
--

CREATE TABLE `pindah` (
  `id_pindah` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_kepala_keluarga` varchar(30) NOT NULL,
  `nik_pemohon` varchar(30) NOT NULL,
  `alasan_pindah` varchar(255) NOT NULL,
  `alamat_pindah` varchar(255) NOT NULL,
  `dusun_pindah` varchar(255) NOT NULL,
  `rt_pindah` varchar(5) NOT NULL,
  `rw_pindah` varchar(5) NOT NULL,
  `desa_pindah` varchar(255) NOT NULL,
  `kecamatan_pindah` varchar(255) NOT NULL,
  `kabupaten_pindah` varchar(255) NOT NULL,
  `provinsi_pindah` varchar(255) NOT NULL,
  `kode_pos_pindah` int(5) NOT NULL,
  `telepon_pindah` varchar(12) NOT NULL,
  `tanggal_pindah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pindah`
--

INSERT INTO `pindah` (`id_pindah`, `id_pejabat`, `nik_kepala_keluarga`, `nik_pemohon`, `alasan_pindah`, `alamat_pindah`, `dusun_pindah`, `rt_pindah`, `rw_pindah`, `desa_pindah`, `kecamatan_pindah`, `kabupaten_pindah`, `provinsi_pindah`, `kode_pos_pindah`, `telepon_pindah`, `tanggal_pindah`) VALUES
(1, 1, '75765757', '111111111', 'Keamanan', 'Kp cikedokan desa sukadanau Rt 01/01 dusun 1 no 142, cikarang barat', 'adsd', '7', '77676', 'kkuhuhb', '17845', 'Tegal', 'JAWA BARAT', 17845, '087730384035', '2019-11-19'),
(2, 1, '3215260112990001', '3215261607780001', 'Kesehatan', 'cikarang', 'mojo', '12', '1', 'benge', 'asu', 'krwg', 'jwbarat', 535261, '094898349849', '2019-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `pindahdatang`
--

CREATE TABLE `pindahdatang` (
  `id` bigint(20) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `alasan_pindah` varchar(100) NOT NULL,
  `alamat_tujuan` varchar(100) NOT NULL,
  `klasifikasi_pindah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pindahdatang`
--

INSERT INTO `pindahdatang` (`id`, `nik`, `tanggal_pindah`, `alasan_pindah`, `alamat_tujuan`, `klasifikasi_pindah`) VALUES
(0, '3215260112990001', '2024-11-13', 'Keamanan', 'Jl.  ', 'Antar Desa');

-- --------------------------------------------------------

--
-- Table structure for table `skck`
--

CREATE TABLE `skck` (
  `id_skck` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tanggal_skck` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skck`
--

INSERT INTO `skck` (`id_skck`, `id_pejabat`, `nik`, `tanggal_skck`) VALUES
(3, 1, '123456789', '2019-11-15'),
(4, 1, '75765757', '2019-11-15'),
(5, 1, '232323423', '2019-11-15'),
(6, 1, '3215260112990001', '2019-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `sktm_kesehatan`
--

CREATE TABLE `sktm_kesehatan` (
  `id_sktm_kesehatan` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_anak` varchar(30) NOT NULL,
  `nik_ayah` varchar(16) NOT NULL,
  `tanggal_sktm_kesehatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sktm_kesehatan`
--

INSERT INTO `sktm_kesehatan` (`id_sktm_kesehatan`, `id_pejabat`, `nik_anak`, `nik_ayah`, `tanggal_sktm_kesehatan`) VALUES
(2, 1, '', '', '2019-11-15'),
(3, 1, '', '', '2019-11-15'),
(4, 1, '', '', '2019-11-15'),
(5, 1, '111', '12346777', '2019-11-16'),
(6, 1, '42432', '123456789', '2019-11-20'),
(7, 1, '3215260112990001', '3215260112990001', '2019-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `sktm_pendidikan`
--

CREATE TABLE `sktm_pendidikan` (
  `id_sktm_pendidikan` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_ayah` varchar(30) NOT NULL,
  `nik_anak` varchar(30) NOT NULL,
  `tanggal_sktm_pendidikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sktm_pendidikan`
--

INSERT INTO `sktm_pendidikan` (`id_sktm_pendidikan`, `id_pejabat`, `nik_ayah`, `nik_anak`, `tanggal_sktm_pendidikan`) VALUES
(1, 1, '123456789', '12346777', '2019-11-15'),
(2, 1, '111', '111111111', '2019-11-16'),
(3, 1, '3215260112990001', '3215260400820003', '2019-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `surat_kelahiran`
--

CREATE TABLE `surat_kelahiran` (
  `id_surat_kelahiran` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik_ayah` varchar(30) NOT NULL,
  `nik_ibu` varchar(30) NOT NULL,
  `nik_pelapor` varchar(30) NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `kelamin_anak` varchar(15) NOT NULL,
  `tempat_lahir_anak` varchar(255) NOT NULL,
  `tanggal_lahir_anak` date NOT NULL,
  `jam_lahir_anak` varchar(10) NOT NULL,
  `hari_lahir_anak` varchar(20) NOT NULL,
  `hubungan_sebagai` varchar(100) NOT NULL,
  `tanggal_surat_kelahiran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_kelahiran`
--

INSERT INTO `surat_kelahiran` (`id_surat_kelahiran`, `id_pejabat`, `nik_ayah`, `nik_ibu`, `nik_pelapor`, `nama_anak`, `kelamin_anak`, `tempat_lahir_anak`, `tanggal_lahir_anak`, `jam_lahir_anak`, `hari_lahir_anak`, `hubungan_sebagai`, `tanggal_surat_kelahiran`) VALUES
(2, 1, '123456789', '2147483647', '2147483647', 'syarif', 'Laki-Laki', 'Tegal', '2020-04-17', '11:11', '', 'abah', '2019-11-14'),
(3, 1, '12346777', '75765757', '12346777', 'khoirul syarif', 'Perempuan', 'Tegal', '0000-00-00', '11:11', '', 'abah', '2019-11-20'),
(4, 2, '3215260112990001', '3215260112990001', '3215260112990001', 'asd', 'Laki-Laki', 'asd', '2024-10-28', '11:17', 'Senin', 'asd', '2024-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `surat_kematian`
--

CREATE TABLE `surat_kematian` (
  `id_surat_kematian` int(50) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nik_pelapor` varchar(30) NOT NULL,
  `umur_pelapor` int(11) NOT NULL,
  `tempat_kematian` varchar(255) NOT NULL,
  `tanggal_kematian` date NOT NULL,
  `jam_kematian` varchar(10) NOT NULL,
  `hari_kematian` varchar(20) NOT NULL,
  `sebab_kematian` varchar(255) NOT NULL,
  `hubungan_sebagai` varchar(100) NOT NULL,
  `tanggal_surat_kematian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_kematian`
--

INSERT INTO `surat_kematian` (`id_surat_kematian`, `id_pejabat`, `nik`, `nik_pelapor`, `umur_pelapor`, `tempat_kematian`, `tanggal_kematian`, `jam_kematian`, `hari_kematian`, `sebab_kematian`, `hubungan_sebagai`, `tanggal_surat_kematian`) VALUES
(1, 1, '2147483647', '2147483647', 30, 'Tegal', '1990-11-11', '10:30', '', '', 'abah', '2019-11-15'),
(2, 1, '12346777', '123456789', 2, 'Tegal', '0000-00-00', '11:11', '', '', 'ibu', '2019-11-21'),
(3, 1, '3215260112990001', '3215260112990001', 12, 'tegall', '1998-09-16', '11:11', '1', '', 'sa', '2019-11-25'),
(4, 1, '3215261607780001', '3215262701170002', 120, 'sdds', '1998-11-11', '11:01', '', '', 'sodara', '2019-11-25'),
(5, 1, '3215260112990001', '3215260112990001', 12, 'asda', '2024-11-11', '11:15', 'Senin', '', 'aa', '2024-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin','sekretaris','kepaladesa','kaurpemerintahan') NOT NULL,
  `nip` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_petugas`, `level`, `nip`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Angelina', 'admin', ''),
(2, 'kades', 'c4ca4238a0b923820dcc509a6f75849b', 'Slamet', 'kepaladesa', '1990081720200410'),
(3, 'sekdes', 'c4ca4238a0b923820dcc509a6f75849b', 'Rohman', 'sekretaris', ''),
(4, 'mendawai', 'c4ca4238a0b923820dcc509a6f75849b', 'Zainudin', 'kaurpemerintahan', '198609262015051001');

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
-- Indexes for table `pemakaman`
--
ALTER TABLE `pemakaman`
  ADD PRIMARY KEY (`id_pemakaman`);

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
  ADD PRIMARY KEY (`id_pindah`);

--
-- Indexes for table `pindahdatang`
--
ALTER TABLE `pindahdatang`
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
  MODIFY `id_belum_menikah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cerai_mati`
--
ALTER TABLE `cerai_mati`
  MODIFY `id_cerai_mati` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menikah`
--
ALTER TABLE `menikah`
  MODIFY `id_menikah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemakaman`
--
ALTER TABLE `pemakaman`
  MODIFY `id_pemakaman` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id_pindah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skck`
--
ALTER TABLE `skck`
  MODIFY `id_skck` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sktm_kesehatan`
--
ALTER TABLE `sktm_kesehatan`
  MODIFY `id_sktm_kesehatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sktm_pendidikan`
--
ALTER TABLE `sktm_pendidikan`
  MODIFY `id_sktm_pendidikan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_kelahiran`
--
ALTER TABLE `surat_kelahiran`
  MODIFY `id_surat_kelahiran` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_kematian`
--
ALTER TABLE `surat_kematian`
  MODIFY `id_surat_kematian` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
