-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2019 at 04:19 AM
-- Server version: 10.3.13-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bayi`
--

CREATE TABLE `bayi` (
  `Kode_bayi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_bayi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jekel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tempat_lahir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal_lahir` date NOT NULL,
  `Nama_ibu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Umur_ibu` int(10) NOT NULL,
  `Agama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `No_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_petugas`
--

CREATE TABLE `data_petugas` (
  `Nip_petugas` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_petugas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jabatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tempat_lahir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tgl_lahir` date NOT NULL,
  `No_hp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Jadwal_imunisasi`
--

CREATE TABLE `Jadwal_imunisasi` (
  `Kode_imunisasi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jadwal_imunisasi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` int(2) NOT NULL,
  `Tanggal` date NOT NULL,
  `Blokir_pengguna` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertumbuhan_bayi`
--

CREATE TABLE `pertumbuhan_bayi` (
  `No_pemeriksaan` int(10) NOT NULL,
  `Tanggal` date NOT NULL,
  `Nip_petugas` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_petugas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kode_jadwal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jadwal_imunisasi` date NOT NULL,
  `Kode_vaksin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jenis_vaksin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_vaksin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dosis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan_vaksin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kode_bayi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_bayi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tgl_lahir` date NOT NULL,
  `Umur_bayi` int(10) NOT NULL,
  `Keterangan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keluhan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Berat_badan` int(10) NOT NULL,
  `Lingkar_kepala` int(20) NOT NULL,
  `Lebar_badan` int(20) NOT NULL,
  `Keterangan_gizi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaksin`
--

CREATE TABLE `vaksin` (
  `Kode_vaksin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_vaksin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dosis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan_vaksin` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bayi`
--
ALTER TABLE `bayi`
  ADD PRIMARY KEY (`Kode_bayi`);

--
-- Indexes for table `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD PRIMARY KEY (`Nip_petugas`);

--
-- Indexes for table `Jadwal_imunisasi`
--
ALTER TABLE `Jadwal_imunisasi`
  ADD PRIMARY KEY (`Kode_imunisasi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pertumbuhan_bayi`
--
ALTER TABLE `pertumbuhan_bayi`
  ADD PRIMARY KEY (`No_pemeriksaan`);

--
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`Kode_vaksin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
