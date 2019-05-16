-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2019 at 06:10 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.4

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
('petugas1', '$2y$10$/gPoFeylMPDH3fcX.hWQF./2gqkfFWZh5P5px0hh38MtoeUInjTTG', 0, '08634234');

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

--
-- Dumping data for table `bayi`
--

INSERT INTO `bayi` (`Kode_bayi`, `Nama_bayi`, `Jekel`, `Tempat_lahir`, `Tanggal_lahir`, `Nama_ibu`, `Umur_ibu`, `Agama`, `No_hp`, `Alamat`) VALUES
('B001', 'Cuta Sri', 'wanita', 'Banjarmasin', '2019-01-01', 'Natasha Wilona', 29, 'Islam', '08714578345', 'Banjarmasin selatan');

-- --------------------------------------------------------

--
-- Table structure for table `Jadwal_imunisasi`
--

CREATE TABLE `Jadwal_imunisasi` (
  `Kode_imunisasi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jadwal_imunisasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Jadwal_imunisasi`
--

INSERT INTO `Jadwal_imunisasi` (`Kode_imunisasi`, `Jadwal_imunisasi`) VALUES
('Imu001', '2019-04-17');

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
('wira', '$2y$10$5bHrdsMC.zMhDvnNUSJ0S.KJXaGB.ay84gtnQIUgQy.GJ1G4iKt2a', 1, '2019-05-15', 0, 'B001');

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
  `Lingkar_kepala` int(20) NOT NULL,
  `Lebar_badan` int(20) NOT NULL,
  `Keterangan_gizi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertumbuhan_bayi`
--

INSERT INTO `pertumbuhan_bayi` (`No_pemeriksaan`, `Tanggal`, `Nip_petugas`, `Kode_jadwal`, `Kode_vaksin`, `Kode_bayi`, `umur_bayi`, `Keterangan`, `Keluhan`, `Berat_badan`, `Lingkar_kepala`, `Lebar_badan`, `Keterangan_gizi`) VALUES
('N001', '2019-03-05', '08634234', 'Imu001', 'V001', 'B001', 2, 'kurang gizi', 'pusing', 2, 30, 70, 'kurang baik'),
('N002', '2019-04-09', '08634234', 'Imu001', 'V001', 'B001', 3, 'cacar air', 'gatal', 4, 40, 80, 'kurang');

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
('08634234', 'momon kurniawan', 'Manager', 'pria', 'Banjarmasin Selatan', '2019-04-09', '0812645378', 'kayutangi 4');

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
-- Dumping data for table `vaksin`
--

INSERT INTO `vaksin` (`Kode_vaksin`, `Nama_vaksin`, `Dosis`, `Keterangan_vaksin`) VALUES
('V001', 'Gizi', '2x sehari', 'minum sebelum makan');

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
