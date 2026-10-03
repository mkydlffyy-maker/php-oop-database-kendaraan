-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2026 at 02:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int NOT NULL,
  `nomor_polisi` varchar(20) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `warna` varchar(30) DEFAULT NULL,
  `harga_sewa` decimal(12,0) DEFAULT NULL,
  `status` enum('tersedia','Disewa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nomor_polisi`, `merk`, `tipe`, `tahun`, `warna`, `harga_sewa`, `status`) VALUES
(1, 'K 1234 AB', 'Toyota', 'Avanza', '2022', 'Hitam', 350000, 'tersedia'),
(2, 'K 5897 CD', 'Honda', 'Brio', '2023', 'Putih', 300000, 'tersedia'),
(3, 'K 3657 EF', 'Mitsubishi', 'Xpander', '2021', 'Silver', 400000, 'Disewa'),
(5, 'H 4991 UH', 'Honda', 'Supra X', '2000', 'Hitam', 150000, 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `id_servis` int NOT NULL,
  `nomor_polisi` varchar(50) DEFAULT NULL,
  `tanggal_servis` date DEFAULT NULL,
  `jenis_servis` varchar(50) DEFAULT NULL,
  `biaya_servis` decimal(12,0) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status` enum('Dalam Proses','Selesai') NOT NULL DEFAULT 'Dalam Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`id_servis`, `nomor_polisi`, `tanggal_servis`, `jenis_servis`, `biaya_servis`, `keterangan`, `status`) VALUES
(17, 'K 3657 EF', '2024-01-15', 'Perbaikan Rem', 450000, 'Ganti kampas rem depan', 'Selesai'),
(18, 'K 5897 CD', '2024-02-01', 'Servis Berkala', 350000, 'Tune up dan ganti busi', 'Selesai'),
(19, 'K 1234 AB', '2024-02-10', 'Ganti Ban', 800000, 'Ganti 2 ban luar belakang', 'Dalam Proses'),
(20, 'H 4991 UH', '2024-02-20', 'Perbaikan AC', 300000, 'Isi freon dan pembersihan filter AC', 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id_servis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id_servis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
