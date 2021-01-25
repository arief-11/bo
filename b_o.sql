-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 06:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b_o`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_makul` int(11) NOT NULL,
  `bab` varchar(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(500) DEFAULT NULL,
  `file2` varchar(100) DEFAULT NULL,
  `tahun` varchar(30) NOT NULL,
  `waktu2` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_tahun`, `id_mahasiswa`, `id_makul`, `bab`, `file`, `deskripsi`, `status`, `waktu`, `catatan`, `file2`, `tahun`, `waktu2`) VALUES
(39, 5, 20, 11, 'Bab I', '210123_101139.pdf', 'cek pak', 1, '2021-01-23 03:11:39', 'revisi', '210123_101712.pdf', '2020/2021 Ganjil', '2021-01-23 03:17:12'),
(40, 5, 20, 11, 'Bab I', '210123_101141.pdf', 'cek pak', 2, '2021-01-23 03:11:41', 'acc mas', NULL, '2020/2021 Ganjil', '2021-01-23 03:17:21'),
(41, 5, 20, 12, 'Bab I', '210123_101153.pdf', 'cek pak', 2, '2021-01-23 03:11:53', 'acc mas', NULL, '2020/2021 Ganjil', '2021-01-23 03:14:33'),
(42, 5, 21, 11, 'Bab II', '210123_101223.pdf', 'ok', 2, '2021-01-23 03:12:23', 'lgsung bab selnjutnya \r\n', NULL, '2020/2021 Ganjil', '2021-01-23 03:16:00'),
(43, 5, 21, 12, 'Bab II', '210123_101239.pdf', 'ok', 2, '2021-01-23 03:12:39', 'lanjut bab selanjutnta', NULL, '2020/2021 Ganjil', '2021-01-23 03:14:44'),
(44, 5, 22, 12, 'Bab I', '210123_101311.pdf', 'mohon koreksi pak', 2, '2021-01-23 03:13:11', 'ok', NULL, '2020/2021 Ganjil', '2021-01-23 03:14:51'),
(45, 5, 22, 11, 'Bab III', '210123_101325.pdf', 'mohon koreksi', 2, '2021-01-23 03:13:25', 'acc mas', NULL, '2020/2021 Ganjil', '2021-01-23 03:16:06'),
(46, 5, 23, 12, 'Bab IV', '210123_101351.pdf', 'koreksi pak', 2, '2021-01-23 03:13:51', 'lanjutkan', NULL, '2020/2021 Ganjil', '2021-01-23 03:15:02'),
(47, 5, 23, 11, 'Bab II', '210123_101404.pdf', 'koreksi pak', 2, '2021-01-23 03:14:04', 'lanjutkan', NULL, '2020/2021 Ganjil', '2021-01-23 03:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama`, `alamat`, `no_hp`, `username`, `password`) VALUES
(22, 'Anas Syaifudin, S.Kom ', 'pekalongan', '08587888999', 'anas', '81dc9bdb52d04dc20036dbd8313ed055'),
(23, 'M. Adib Al-Karomi, M.Kom ', 'pekalongan', '089775555555', 'adib', '81dc9bdb52d04dc20036dbd8313ed055'),
(24, 'Prastuti Sulistyorini, S.T., M.Kom ', 'pemalang', '08232388888', 'pras', '81dc9bdb52d04dc20036dbd8313ed055'),
(25, 'Victorianus A.S., S.E., M.Si ', 'pekalongan', '089775555555', 'victor', '81dc9bdb52d04dc20036dbd8313ed055'),
(26, 'Bambang Ismanto, M.Kom ', 'pemalang', '089775555555', 'bam', '81dc9bdb52d04dc20036dbd8313ed055'),
(27, 'Much. Rifqi Maulana, M.Kom', 'pekalongan', '089775555555', 'rifqi', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `singkatan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_dosen`, `nama`, `singkatan`) VALUES
(15, 27, 'Teknik Informatika', 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_jurusan`, `nama`, `nim`, `alamat`, `no_hp`, `password`) VALUES
(20, 15, 'AJI PRASETIYO ', '17.240.0001', 'pekalongan', '08322388833', '81dc9bdb52d04dc20036dbd8313ed055'),
(21, 15, 'FAIZIN ', '17.240.0002', 'pekalongan', '08322388833', '81dc9bdb52d04dc20036dbd8313ed055'),
(22, 15, 'M. SYAHRUL FAWAZA ', '17.240.0003', 'pekalongan', '08322388833', '81dc9bdb52d04dc20036dbd8313ed055'),
(23, 15, 'YAFI ATHA SALSABILA ', '17.240.0004', 'pekalongan', '08587888999', '81dc9bdb52d04dc20036dbd8313ed055'),
(24, 15, 'DITA ANGGUNIA', '17.240.0005', 'pemalang', '08587888999', '81dc9bdb52d04dc20036dbd8313ed055'),
(25, 15, 'ANI SURYANINGRUM ', '17.240.0006', 'pemalang', '08322388833', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `makul`
--

CREATE TABLE `makul` (
  `id_makul` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bab_maks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makul`
--

INSERT INTO `makul` (`id_makul`, `nama`, `bab_maks`) VALUES
(11, 'Laporan Magang', 3),
(12, 'Komunikasi Bisnis', 4),
(13, 'Analisa sistem', 4),
(14, 'Desain Sistem', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_makul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id_pembimbing`, `id_jurusan`, `id_makul`, `id_dosen`) VALUES
(36, 15, 11, 22),
(37, 15, 11, 26),
(38, 15, 12, 25);

-- --------------------------------------------------------

--
-- Table structure for table `ploting`
--

CREATE TABLE `ploting` (
  `id_ploting` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ploting`
--

INSERT INTO `ploting` (`id_ploting`, `id_pembimbing`, `id_mahasiswa`) VALUES
(43, 36, 20),
(44, 36, 25),
(45, 36, 24),
(46, 36, 21),
(47, 36, 22),
(48, 36, 23),
(49, 38, 20),
(50, 38, 25),
(51, 38, 24),
(52, 38, 21),
(53, 38, 22),
(54, 38, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tahun`, `status`) VALUES
(5, '2020/2021 Ganjil', 1),
(10, '2019/2020 Genap', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `makul`
--
ALTER TABLE `makul`
  ADD PRIMARY KEY (`id_makul`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indexes for table `ploting`
--
ALTER TABLE `ploting`
  ADD PRIMARY KEY (`id_ploting`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `makul`
--
ALTER TABLE `makul`
  MODIFY `id_makul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ploting`
--
ALTER TABLE `ploting`
  MODIFY `id_ploting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
