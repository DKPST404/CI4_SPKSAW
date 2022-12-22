-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2022 at 01:14 PM
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
-- Database: `ci4saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `datasiswa`
--

CREATE TABLE `datasiswa` (
  `id_siswa` int NOT NULL,
  `nis_siswa` varchar(30) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `kelas_siswa` varchar(10) NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `periode` year NOT NULL,
  `tanggungan_orang_tua` int NOT NULL,
  `penghasilan_orang_tua` int NOT NULL,
  `nilai_kehadiran` int NOT NULL,
  `nilai_rata-rata_rapot` int NOT NULL,
  `peringkat_kelas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `datasiswa`
--

INSERT INTO `datasiswa` (`id_siswa`, `nis_siswa`, `nama_siswa`, `kelas_siswa`, `alamat_siswa`, `periode`, `tanggungan_orang_tua`, `penghasilan_orang_tua`, `nilai_kehadiran`, `nilai_rata-rata_rapot`, `peringkat_kelas`) VALUES
(1, '202201', 'Yoga', 'X AKL 1', 'Kesesi', 2022, 1, 50000, 98, 100, 6),
(2, '202202', 'Ani', 'AKT. 2', 'Kesesi', 2022, 2, 6444646, 76, 90, 9),
(3, '202203', 'Putri', 'X', 'Kesesi', 2022, 3, 565654564, 88, 80, 7),
(4, '202101', 'Nisa', 'X', 'Kesesi', 2021, 2, 534536474, 97, 75, 6),
(5, '202102', 'Like', 'X', 'Kesesi', 2021, 2, 6536556, 85, 86, 5),
(6, '202103', 'Aji', 'X', 'Kesesi', 2021, 4, 55454545, 90, 89, 4),
(9, '202209', 'Oka', 'X', 'Kesesi', 2022, 5, 45353453, 80, 87, 3),
(10, '77', 'Y', 'X AKL 1', 'Kesesi', 2025, 6, 12312312, 75, 78, 2),
(11, '20231', 'Ali', 'X AKL 1', 'Kesesi', 2023, 4, 231231, 100, 78, 1),
(12, '20232', 'Nano', 'X AKL 2', 'Kesesi', 2023, 7, 43434343, 100, 90, 15),
(13, '20233', 'Tono', 'X TO 1', 'Kesesi', 2023, 4, 5245232, 90, 98, 14),
(14, '20234', 'Bowo', 'X AKL 2', 'Kesesi', 2023, 3, 4524524, 70, 97, 12),
(15, '20235', 'Hani', 'X AKL 1', 'Kesesi', 2023, 6, 42454, 80, 93, 13);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot_kriteria` int NOT NULL,
  `jenis_kriteria` enum('benefit','cost') NOT NULL,
  `status_kriteria` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `jenis_kriteria`, `status_kriteria`) VALUES
(1, 'Penghasilan Orang Tua', 30, 'cost', 'aktif'),
(2, 'Tanggungan Orang Tua', 20, 'benefit', 'aktif'),
(3, 'Nilai Kehadiran', 15, 'benefit', 'aktif'),
(4, 'Nilai Rata-rata rapot', 15, 'benefit', 'aktif'),
(12, 'Peringkat Kelas', 20, 'cost', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `id_perhitungan` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `nilai_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `fullname`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datasiswa`
--
ALTER TABLE `datasiswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`id_perhitungan`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datasiswa`
--
ALTER TABLE `datasiswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `id_perhitungan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD CONSTRAINT `perhitungan_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `datasiswa` (`id_siswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `perhitungan_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
