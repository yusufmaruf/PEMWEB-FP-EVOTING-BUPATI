-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 09:20 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evote`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_paslon`
--

CREATE TABLE `tb_paslon` (
  `id_paslon` int(2) NOT NULL,
  `nama_paslon` varchar(100) NOT NULL,
  `nama_wakil` varchar(100) NOT NULL,
  `foto_paslon` varchar(200) NOT NULL,
  `visi_paslon` varchar(500) NOT NULL,
  `misi_paslon` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_paslon`
--

INSERT INTO `tb_paslon` (`id_paslon`, `nama_paslon`, `nama_wakil`, `foto_paslon`, `visi_paslon`, `misi_paslon`) VALUES
(1, 'Irsyad', 'mujib', 'irsyad.jpg', 'memajukan kesejahteraan umum', 'memajukan kesejahteraan umum kabupaten pasuruan'),
(2, 'Riang Khulup', 'Prayuda', 'IMG-20180107-WA0019.jpg', 'mencerdaskan kehidupan bangsa', 'mencerdaskan kehidupan bangsa khusus kab pasuruan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `iduser` int(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `namauser` varchar(100) NOT NULL,
  `level` enum('pemilih','admin') NOT NULL,
  `nik` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `jenis` enum('ADM','PML') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`iduser`, `password`, `namauser`, `level`, `nik`, `status`, `jenis`) VALUES
(1, 'admin', 'Achmad Yusuf Al Maruf', 'admin', '20082010148', 1, 'ADM'),
(7, 'pemilih', 'Nadilla Anidew', 'pemilih', '20082010147', 0, 'PML'),
(8, 'pemilih', 'Yusuf Al ', 'pemilih', '20082010145', 0, 'PML');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vote`
--

CREATE TABLE `tb_vote` (
  `id_vote` int(11) NOT NULL,
  `id_paslon` int(2) NOT NULL,
  `iduser` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_vote`
--

INSERT INTO `tb_vote` (`id_vote`, `id_paslon`, `iduser`, `date`) VALUES
(1, 1, 7, '2022-06-17 14:12:05'),
(2, 2, 8, '2022-06-17 14:12:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_paslon`
--
ALTER TABLE `tb_paslon`
  ADD PRIMARY KEY (`id_paslon`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD PRIMARY KEY (`id_vote`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_paslon`
--
ALTER TABLE `tb_paslon`
  MODIFY `id_paslon` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_vote`
--
ALTER TABLE `tb_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
