-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 01:59 PM
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
-- Database: `cvbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pelamar`
--

CREATE TABLE `data_pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `universitas` varchar(100) NOT NULL,
  `pengalaman` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pelamar`
--

INSERT INTO `data_pelamar` (`id_pelamar`, `nama`, `email`, `alamat`, `telepon`, `pendidikan`, `universitas`, `pengalaman`, `deskripsi`) VALUES
(30, 'M. Ikhwan Fauzie', 'Fauzie.wae@gmail.com', 'jalan tanah hitam dusun 7', '091272490856', 'Doktor (S3)', 'Universitas Muhammadiyah Bengkulu', 3, 'pendiri voltage corporation');

-- --------------------------------------------------------

--
-- Table structure for table `file_pelamar`
--

CREATE TABLE `file_pelamar` (
  `id_file` int(11) NOT NULL,
  `id_pelamar` int(11) DEFAULT NULL,
  `jenis_file` varchar(50) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `lokasi_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_pelamar`
--

INSERT INTO `file_pelamar` (`id_file`, `id_pelamar`, `jenis_file`, `nama_file`, `lokasi_file`) VALUES
(28, NULL, 'CV', 'Buku Panduan PKL FT 2024 (1) (1).pdf', 'assets/fileCV/Buku Panduan PKL FT 2024 (1) (1).pdf'),
(29, NULL, 'Foto', '00000PORTRAIT_00000_PXL_30-10-2023_17-34-22-757.SL.jpg', 'assets/img/00000PORTRAIT_00000_PXL_30-10-2023_17-34-22-757.SL.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pelamar`
--
ALTER TABLE `data_pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indexes for table `file_pelamar`
--
ALTER TABLE `file_pelamar`
  ADD PRIMARY KEY (`id_file`),
  ADD UNIQUE KEY `id_pelamar` (`id_pelamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pelamar`
--
ALTER TABLE `data_pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `file_pelamar`
--
ALTER TABLE `file_pelamar`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
