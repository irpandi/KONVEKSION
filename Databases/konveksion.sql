-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 09:09 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konveksion`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `foto` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama`, `foto`, `alamat`, `nomor_telepon`) VALUES
(1, 'admin01', 'adminsatu', 'Luthfi Muhammad', '30112017152856admin.PNG', 'Jln Soekarno Hatta No.106', '+6281233429905');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id_karyawan` int(12) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nik` bigint(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(55) NOT NULL,
  `ttl` text NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `nomor_telepon` text NOT NULL,
  `alamat` text NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `uang_makan` int(50) NOT NULL,
  `bonus` int(50) NOT NULL,
  `kasbon` int(50) NOT NULL,
  `gaji` int(50) NOT NULL,
  `gaji_total` int(50) NOT NULL,
  `banyak_1` int(40) NOT NULL,
  `banyak_2` int(50) NOT NULL,
  `banyak_3` int(50) NOT NULL,
  `nama_barang_1` varchar(100) NOT NULL,
  `nama_barang_2` varchar(100) NOT NULL,
  `nama_barang_3` varchar(100) NOT NULL,
  `harga_1` int(50) NOT NULL,
  `harga_2` int(50) NOT NULL,
  `harga_3` int(50) NOT NULL,
  `jumlah_1` int(50) NOT NULL,
  `jumlah_2` int(50) NOT NULL,
  `jumlah_3` int(50) NOT NULL,
  `jumlah_total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id_karyawan`, `username`, `password`, `nik`, `nama`, `foto`, `ttl`, `jenis_kelamin`, `nomor_telepon`, `alamat`, `bagian`, `uang_makan`, `bonus`, `kasbon`, `gaji`, `gaji_total`, `banyak_1`, `banyak_2`, `banyak_3`, `nama_barang_1`, `nama_barang_2`, `nama_barang_3`, `harga_1`, `harga_2`, `harga_3`, `jumlah_1`, `jumlah_2`, `jumlah_3`, `jumlah_total`) VALUES
(29, 'irpandi', 'irpandi', 3282505195000001, 'Rifki Irpandi', '28112017091305_20170121_173812.JPG', 'Bandung, 25 Mei 1997', 'Pria', '0822-1929-7733', 'Jln Cibuntu Timur Rt 06/Rw 05 Kelurahan Warung Muncang Kecamatan Bandung Kulon', 'Obras', 3000, 100000, 2000, 101000, 131000, 10, 10, 10, 'Baju', 'Kameja', 'Celana', 1000, 1000, 1000, 10000, 10000, 10000, 30000),
(30, 'denira', 'denira', 3282505195000002, 'Denira Adiwijaya', '01122017053030_20171002_125830.JPG', 'Jakarta, 19 Desember 1997', 'Wanita', '0822-1929-7131', 'Jln Jakarta Selatan No.5 Rt 01/Rw 09 Kelurahan Bojong Kecamatan Cendrawasih', 'Overdeck', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat`
--

CREATE TABLE `tbl_riwayat` (
  `id_riwayat` int(12) NOT NULL,
  `id_karyawan` int(12) NOT NULL,
  `tanggal` datetime NOT NULL,
  `uang_makan` int(50) NOT NULL,
  `bonus` int(50) NOT NULL,
  `kasbon` int(50) NOT NULL,
  `gaji` int(50) NOT NULL,
  `gaji_total` int(50) NOT NULL,
  `banyak_1` int(50) NOT NULL,
  `banyak_2` int(50) NOT NULL,
  `banyak_3` int(50) NOT NULL,
  `nama_barang_1` varchar(100) NOT NULL,
  `nama_barang_2` varchar(55) NOT NULL,
  `nama_barang_3` varchar(55) NOT NULL,
  `harga_1` int(40) NOT NULL,
  `harga_2` int(50) NOT NULL,
  `harga_3` int(50) NOT NULL,
  `jumlah_1` int(50) NOT NULL,
  `jumlah_2` int(50) NOT NULL,
  `jumlah_3` int(50) NOT NULL,
  `jumlah_total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id_riwayat`, `id_karyawan`, `tanggal`, `uang_makan`, `bonus`, `kasbon`, `gaji`, `gaji_total`, `banyak_1`, `banyak_2`, `banyak_3`, `nama_barang_1`, `nama_barang_2`, `nama_barang_3`, `harga_1`, `harga_2`, `harga_3`, `jumlah_1`, `jumlah_2`, `jumlah_3`, `jumlah_total`) VALUES
(21, 29, '2017-11-30 08:26:55', 5000, 10000, 2000, 13000, 43000, 10, 10, 10, 'Baju', 'Kameja', 'Celana', 1000, 1000, 1000, 10000, 10000, 10000, 30000),
(22, 29, '2017-11-30 08:47:59', 10000, 10000, 2000, 18000, 48000, 10, 10, 10, 'Baju', 'Kameja', 'Celana', 1000, 1000, 1000, 10000, 10000, 10000, 30000),
(23, 29, '2017-11-30 08:54:58', 0, 0, 2000, -2000, 28000, 10, 10, 10, 'Baju', 'Kameja', 'Celana', 1000, 1000, 1000, 10000, 10000, 10000, 30000),
(24, 29, '2017-11-30 21:45:19', 3000, 100000, 2000, 101000, 131000, 10, 10, 10, 'Baju', 'Kameja', 'Celana', 1000, 1000, 1000, 10000, 10000, 10000, 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_karyawan_2` (`id_karyawan`),
  ADD KEY `id_karyawan_3` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id_karyawan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  MODIFY `id_riwayat` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD CONSTRAINT `tbl_riwayat_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_data` (`id_karyawan`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
