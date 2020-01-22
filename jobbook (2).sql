-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2020 at 03:19 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `kode` varchar(15) NOT NULL,
  `pekerjaan` varchar(15) DEFAULT NULL,
  `pelamar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `onProgress`
--

CREATE TABLE `onProgress` (
  `kode` int(11) NOT NULL,
  `id_pekerjaan` varchar(15) DEFAULT NULL,
  `id_pekerja` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `do_date` date DEFAULT NULL,
  `status` enum('Selesai','Belum selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `kode` varchar(15) NOT NULL,
  `nama_pekerjaan` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `link_gmap` varchar(250) DEFAULT NULL,
  `lama_pengerjaan` int(5) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status` enum('open','close') DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pembuat` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(25) NOT NULL DEFAULT 'defaultThumbnail.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `nik` varchar(15) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `photo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`nik`, `nama_lengkap`, `alamat`, `no_hp`, `tgl_lahir`, `jenis_kelamin`, `photo`) VALUES
('1314141', 'fafafafa', 'daf', '', NULL, NULL, NULL),
('1414141', 'afafafaf', 'afafa', '1314141', NULL, NULL, NULL),
('1710530203', 'Fathurrahman', 'Lotim', '', '0199-08-24', 'Laki-laki', 'defaultL.jpg'),
('1710530240', 'Fathurrahman', 'Jl. Arya Banjar Getas, Tj. Karang Permai, Sekarbela, Kota Mataram, Nusa Tenggara Barat', '083142808426', NULL, NULL, NULL),
('234234', 'sfsfs', 'ewrew', '', NULL, NULL, NULL),
('adafa', 'afafa', 'ad', '1414', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(1) NOT NULL,
  `nik` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `role`, `nik`) VALUES
('fathur', 'fathur.ashter15@gmail.com', '$2y$10$rONYvHAqcnptthrIJztb6eYhYQcWf86iA3S2Z1sFxEiVph76Dn/xC', 1, '1710530203'),
('fathur.ashter15@gmail.coma', '-', '$2y$10$yx/V4JROUSiuyYG3o27suOowJHLDT343D.JmeZUTwt2zB1aKlkdE6', 1, '1414141'),
('tester', '-', '$2y$10$BDICXkGmHBvgYJAilPgcFOUsp22ANXceagjdzm8oLAINFcLxutdCm', 1, '1710530240');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_pekerjaan` (`pekerjaan`),
  ADD KEY `pelamar` (`pelamar`);

--
-- Indexes for table `onProgress`
--
ALTER TABLE `onProgress`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_pekerja` (`id_pekerja`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `pembuat` (`pembuat`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `onProgress`
--
ALTER TABLE `onProgress`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD CONSTRAINT `lamaran_ibfk_1` FOREIGN KEY (`pelamar`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lamaran_ibfk_2` FOREIGN KEY (`pekerjaan`) REFERENCES `pekerjaan` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `onProgress`
--
ALTER TABLE `onProgress`
  ADD CONSTRAINT `onProgress_ibfk_1` FOREIGN KEY (`id_pekerja`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onProgress_ibfk_2` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_ibfk_1` FOREIGN KEY (`pembuat`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `profile` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
