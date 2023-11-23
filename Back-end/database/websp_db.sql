-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 06:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_skkm`
--

CREATE TABLE `history_skkm` (
  `nim` int(11) NOT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kd_jurusan` char(3) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nama_jurusan`) VALUES
('AA', 'Anak Agung'),
('J01', 'Teknologi Informasi'),
('J02', 'Sistem Komputer'),
('J03', 'Sistem Informasi'),
('J04', 'Bisnis Digital'),
('J07', 'Teknik Kedokteran'),
('J08', 'Teknik Taijutsu');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(2) NOT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `kedudukan` varchar(20) NOT NULL,
  `jenis_skkm` varchar(20) NOT NULL,
  `poin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `kd_jurusan` char(3) NOT NULL,
  `gender` int(11) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `kd_jurusan`, `gender`, `no_hp`, `alamat`, `email`, `nama_foto`) VALUES
(123456, 'Wira si pemberani', 'AA', 1, '081267894', 'jln raya 1', 'wira@gmail.com', 'jollyroger.png'),
(22007098, 'broi', 'J04', 0, '018231235', 'dmnnya jln', 'broi@gmail.com', 'handsome-patrick.jpg'),
(220030126, 'asfasas', 'AA', 0, '08125678', 'asfadhz123', 'f@gmail.com', 'handsome-squidward.jpg'),
(220040247, 'kevin', 'J03', 1, '0891456278', 'jln sunset road', 'kevin@gmail.com', 'handsome-squidward.jpg'),
(220040248, 'Praba', 'J08', 1, '081267894', 'jln gunung agung', 'aba@gmail.com', 'handsome-patrick.jpg'),
(220041603, 'Desi', 'J04', 0, '098127617564', 'jln gunung agung', 'Warner09.cp@ddrd.in', 'handsome-squidward.jpg'),
(220060999, 'Asep Schneider', 'J01', 1, '0894567123', 'tengah jln', 'asep@gmail.com', 'static-assets-upload5667496413544591045.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `skkm`
--

CREATE TABLE `skkm` (
  `nim` int(11) NOT NULL,
  `skkm_wajib` int(11) NOT NULL DEFAULT 0,
  `skkm_ilmiah` int(11) NOT NULL DEFAULT 0,
  `skkm_minat` int(11) NOT NULL DEFAULT 0,
  `skkm_organisasi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skkm`
--

INSERT INTO `skkm` (`nim`, `skkm_wajib`, `skkm_ilmiah`, `skkm_minat`, `skkm_organisasi`) VALUES
(123456, 28, 25, 16, 5),
(22007098, 2, 6, 0, 5),
(220030126, 4, 8, 7, 5),
(220040247, 2, 2, 2, 0),
(220040248, 2, 6, 0, 5),
(220040250, 3, 2, 2, 0),
(220041603, 1, 2, 0, 6),
(220060789, 1, 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('', ''),
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_skkm`
--
ALTER TABLE `history_skkm`
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `skkm`
--
ALTER TABLE `skkm`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_skkm`
--
ALTER TABLE `history_skkm`
  ADD CONSTRAINT `history_skkm_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `skkm` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
