-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2024 at 09:36 AM
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
-- Database: `db_ruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int NOT NULL,
  `prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `prodi`) VALUES
(1, 'Sistem Informasi'),
(2, 'Teknologi Informasi'),
(3, 'Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int NOT NULL,
  `kode_ruangan` varchar(30) NOT NULL,
  `lantai` varchar(5) NOT NULL,
  `gedung` varchar(50) NOT NULL,
  `fasilitas` text NOT NULL,
  `kondisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `kode_ruangan`, `lantai`, `gedung`, `fasilitas`, `kondisi`) VALUES
(1, 'A3.1', '3', 'FASILKOM', 'Meja, SMART TV, Kursi, AC', 'TERISI'),
(2, 'A3.2', '3', 'FASILKOM', 'Meja, Kursi, AC, HDMI CABLE', 'TERISI'),
(26, 'Laboratorium BASDA', '2', 'FASILKOM', 'AC, SERVER ROOM', 'KOSONG'),
(27, 'Digital Creative HUB', '4', 'FASILKOM', 'Lesehan, Smart TV, AC', 'KOSONG'),
(28, 'Laboratorium GIS', '2', 'FASILKOM', 'SERVER ROOM, GIS System', 'KOSONG'),
(29, 'AUDITORIUM', '4', 'FASILKOM', 'Kursi, Speech section', 'KOSONG');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int NOT NULL,
  `mahasiswa_id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_date` datetime NOT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `id_ruangan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `mahasiswa_id`, `file_name`, `upload_date`, `verified`, `id_ruangan`) VALUES
(1, 2, 'western-digital-FY2022-executive-summary.pdf', '2024-06-03 12:46:57', 0, 0),
(2, 2, 'SE KELOMPOK 5_Review Paper 1.docx.pdf', '2024-06-03 13:16:08', 0, 0),
(3, 2, 'SIPENDAP PITCH DECK.pdf', '2024-06-04 07:33:27', 0, 1),
(4, 2, 'Kontrak PKn_2324_2.pdf', '2024-06-04 07:33:56', 1, 29),
(5, 2, 'A4_TKTI_Tugas Akhir.pdf', '2024-06-04 09:27:50', 0, 2),
(6, 10, 'Kontrakkuliah_PWEB_2324.pdf', '2024-06-04 16:05:42', 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prodi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `role`, `email`, `prodi`) VALUES
(1, 'admin', '$2y$10$Kp0xWuTwa3Bd2J86FDHtkOHtkVUcAhYO7ymRUB4Yz75NuReMPo1ai', 'admin', 'admin', '', NULL),
(2, 'mahasiswa', '$2y$10$125Iac9eaQY0x84KzXeNQ./c4Cn3iRu/2ca6KyEbnkYS/FS7JCkoC', 'mahasiswa', 'mahasiswa', 'ligaralexandri@gmail.com', NULL),
(3, 'mahasiswa2', '$2y$10$KxLyGC/9.v3PzoWSECvoJe1dPuCQhk.BSeyT2wu7KEyAWbX3RkRje', 'Ligar', 'mahasiswa', '', NULL),
(4, 'mahasiswa3', '$2y$10$aSZpsQE.8FDYeLnFGMiBXuIsIg.4faobZcxk4Q3GauurRUtXA.eWu', 'Ligar2', 'mahasiswa', 'ligaralexandri@gmail.com', NULL),
(5, 'superadmin', '$2y$10$hoaizaIA7jKlTpNXrtfC1ea.xHEfU8nU9AKNCs/F0kH5440o938Qu', 'superadmin', 'superadmin', 'ligaralexandri@gmail.com', NULL),
(6, 'gharizah', '$2y$10$yuOvFQ4DEEHXe0PnYNGpcOc0Jxg2b5uUtyS9a71nAeigB34yDeira', 'Gharizah', 'mahasiswa', 'ligaralexandri@gmail.com', NULL),
(7, 'hanan', '$2y$10$Zvmyi7iaBn1n2NZVorHg4Ocx.QlxbT8kxgtVGVFQAERyoHaN1gOpK', 'Hanan', 'mahasiswa', 'm.ainulhanan21@gmail.com', NULL),
(8, 'hanan1', '$2y$10$KpyU9uTUAiBcFvY75Ep5bedCjai0XyVxddXF1uI7iVIXmvEIP06Mu', 'Hanan', 'mahasiswa', 'm.ainulhanan21@gmail.com', NULL),
(9, 'ligar2', '$2y$10$XZAIIcx6Xts7pG97faVZteOvYJdEQyWx5vfWWqHG2nhO0MQIACArG', 'Ligar2', 'mahasiswa', 'ligaralexandri@gmail.com', NULL),
(10, 'devina', '$2y$10$1G7bmnHFj.4bf0BqJ5DeL.mp8lgO7yWOLffOV.Q5Zq0f8datlSI.K', 'Devina', 'mahasiswa', 'devinacahyani57@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
