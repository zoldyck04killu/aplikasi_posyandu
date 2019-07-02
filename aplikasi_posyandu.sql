-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 05:32 PM
-- Server version: 10.1.38-MariaDB
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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` int(2) NOT NULL,
  `nip_petugas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `hak_akses`, `nip_petugas`) VALUES
('admin', '$2y$10$sqvLAjqp6qUV8nbzmoIeNuvStHc9MCgxqCGE0OmaoZ2gbcn9YS1Jm', 0, ''),
('ramli', '$2y$10$peSGaZQNh8QbxBGp/dZSBOHHPCNCw.OpZCciltIo/DD3crJ4.nyJK', 0, '196612121990031');

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
  `Nama_ortu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Umur_bayi` int(10) NOT NULL,
  `Agama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `No_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bayi`
--

INSERT INTO `bayi` (`Kode_bayi`, `Nama_bayi`, `Jekel`, `Tempat_lahir`, `Tanggal_lahir`, `Nama_ortu`, `Umur_bayi`, `Agama`, `No_hp`, `Alamat`) VALUES
('B001', 'Ahmad Raihan', 'pria', 'Lepasan', '2014-06-21', 'Kamalia / Zainudin', 43, 'Islam', '085758589944', 'Lepasan');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_imunisasi`
--

CREATE TABLE `jadwal_imunisasi` (
  `Kode_imunisasi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jadwal_imunisasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_imunisasi`
--

INSERT INTO `jadwal_imunisasi` (`Kode_imunisasi`, `Jadwal_imunisasi`) VALUES
('IMU001', '2018-01-01'),
('IMU002', '2018-02-01'),
('IMU003', '2018-03-01'),
('IMU004', '2018-04-02'),
('IMU005', '2018-05-01'),
('IMU006', '2018-06-01'),
('IMU007', '2018-07-02'),
('IMU008', '2018-08-01'),
('IMU009', '2018-09-03'),
('IMU010', '2018-10-01'),
('IMU011', '2018-11-01'),
('IMU012', '2018-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` int(2) NOT NULL,
  `Tanggal` date NOT NULL,
  `Blokir_pengguna` int(2) NOT NULL,
  `kode_bayi` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `hak_akses`, `Tanggal`, `Blokir_pengguna`, `kode_bayi`) VALUES
('ahmad_raihan', '$2y$10$yA2OERQ4MGbU9C1Dt3mlC.MPDEqTCFdeMSRSK/ySndUveswEa7dUG', 1, '2019-06-28', 0, 'B001');

-- --------------------------------------------------------

--
-- Table structure for table `pertumbuhan_bayi`
--

CREATE TABLE `pertumbuhan_bayi` (
  `No_pemeriksaan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `Nip_petugas` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kode_jadwal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kode_vaksin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kode_bayi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_bayi` int(10) NOT NULL,
  `Keterangan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keluhan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Berat_badan` int(10) NOT NULL,
  `Tinggi_badan` int(13) NOT NULL,
  `Lingkar_kepala` int(20) NOT NULL,
  `Keterangan_gizi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertumbuhan_bayi`
--

INSERT INTO `pertumbuhan_bayi` (`No_pemeriksaan`, `Tanggal`, `Nip_petugas`, `Kode_jadwal`, `Kode_vaksin`, `Kode_bayi`, `umur_bayi`, `Keterangan`, `Keluhan`, `Berat_badan`, `Tinggi_badan`, `Lingkar_kepala`, `Keterangan_gizi`) VALUES
('N001', '2018-01-15', '196612121990031', 'IMU001', 'V001', 'B001', 42, ' ', ' ', 14, 95, 45, 'Baik / Normal'),
('N002', '2018-02-14', '196612121990031', 'IMU002', 'V002', 'B001', 43, '', '', 14, 95, 0, 'Baik / Normal'),
('N003', '2019-05-14', '08634234', 'Imu001', 'V001', 'B002', 2, 'fdsvfs baru', 'sdcasw baru', 5, 55, 40, 'cukup baru');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `Nip_petugas` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_petugas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jabatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tempat_lahir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tgl_lahir` date NOT NULL,
  `No_hp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`Nip_petugas`, `Nama_petugas`, `Jabatan`, `Jenis_kelamin`, `Tempat_lahir`, `Tgl_lahir`, `No_hp`, `alamat`) VALUES
('196612121990031', 'H. Ramli, S.Kep', 'Petugas Posyandu', 'pria', 'Nagara', '1975-06-07', '082232324890', 'Lepasan'),
('197607042010011', 'Budi Hariyanto, Amk', 'Petugas Posyandu', 'pria', 'Marabahan', '1981-08-14', '082377247812', 'Marabahan');

-- --------------------------------------------------------

--
-- Table structure for table `vaksin`
--

CREATE TABLE `vaksin` (
  `Kode_vaksin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `Nama_vaksin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dosis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `perberian` int(5) NOT NULL,
  `Keterangan_vaksin` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaksin`
--

INSERT INTO `vaksin` (`Kode_vaksin`, `tanggal`, `Nama_vaksin`, `Dosis`, `perberian`, `Keterangan_vaksin`) VALUES
('V001', '2018-01-01', 'BCG+PELARUT', '10', 10, ''),
('V002', '2018-01-01', 'DPT HB (COMBO)', '10', 10, ''),
('V003', '2018-01-01', 'POLIO+PIPET', '15', 15, ''),
('V004', '2018-01-01', 'HEPATITIS B UNIJECK', '5', 5, ''),
('V005', '2018-01-01', 'CAMPAK+PELARUT', '10', 10, '');

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
-- Indexes for table `jadwal_imunisasi`
--
ALTER TABLE `jadwal_imunisasi`
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
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`Nip_petugas`);

--
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`Kode_vaksin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
