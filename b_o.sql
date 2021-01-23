-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 12:19 PM
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
(18, 10, 14, 5, 'Bab I', '210116_225240.pdf', 'cek pak', 2, '2021-01-16 15:52:40', 'sip\r\n', NULL, '2020', '2021-01-20 02:20:30'),
(20, 10, 14, 5, 'Bab I', '210116_230902.pdf', '', 1, '2021-01-16 16:09:02', 'cek lagi yaa', '210116_231739.pdf', '2020', '2021-01-20 02:20:34'),
(21, 10, 14, 5, 'Bab I', '210116_230918.pdf', '', 2, '2021-01-16 16:09:18', 'lanjutkan bab selanjutnya', NULL, '2020', '2021-01-20 02:20:39'),
(22, 10, 16, 6, 'Bab I', '210119_060348.pdf', 'cek pak', 1, '2021-01-18 23:03:48', 'aaaa', '210119_085327.pdf', '2020', '2021-01-20 02:20:42'),
(23, 10, 16, 6, 'Bab I', '210119_095322.pdf', 'sip', NULL, '2021-01-19 02:53:22', NULL, NULL, '2020', '2021-01-20 02:20:46'),
(24, 10, 14, 6, 'Bab I', '210119_113526.pdf', 'wsww', 1, '2021-01-19 04:35:26', 'rev', '210119_130103.pdf', '2020', '2021-01-20 02:20:49'),
(25, 10, 14, 6, 'Bab III', '210119_114716.pdf', 'aaaa', 2, '2021-01-19 04:47:16', 'oke\r\n', NULL, '2022/2023', '2021-01-20 02:20:52'),
(28, 10, 14, 6, 'Bab V', '210119_125839.pdf', 'cekbu', 2, '2021-01-19 05:58:39', 'gg', NULL, '2020', '2021-01-20 02:20:58'),
(29, 10, 14, 6, 'Bab IV', '210119_125903.pdf', 'ce', 1, '2021-01-19 05:59:03', 'revisi', '210120_094851.pdf', '2020', '2021-01-20 02:48:51'),
(30, 8, 14, 6, 'Bab II', '210120_092221.pdf', 'coba', 2, '2021-01-20 02:22:21', 'siplah\r\n', NULL, '2020 smester 6', '2021-01-20 02:41:43'),
(31, 8, 14, 6, 'Bab I', '210120_102544.pdf', 'a', 1, '2021-01-20 03:25:44', 'revisi oke\r\n', '210120_102812.pdf', '2020', '2021-01-20 03:28:12'),
(32, 5, 14, 6, 'Bab I', '210120_112247.pdf', 'cek bu', 2, '2021-01-20 04:22:47', 'oke\r\n', NULL, '2021', '2021-01-20 04:44:52'),
(33, 5, 14, 6, 'Bab V', '210120_112506.pdf', 'oke', 2, '2021-01-20 04:25:06', 'cek\r\n', NULL, '2021', '2021-01-20 04:52:55'),
(34, 5, 14, 6, 'Bab I', '210120_115758.pdf', 'cek lagi', 2, '2021-01-20 04:57:58', 'ok\r\n', NULL, '2021', '2021-01-20 10:33:58'),
(35, 5, 14, 6, 'Bab II', '210120_165018.pdf', 'a', 2, '2021-01-20 09:50:18', 'oo', NULL, '2020', '2021-01-20 10:33:52'),
(37, 5, 14, 6, 'Bab III', '210120_173828.pdf', 'cek\r\n', NULL, '2021-01-20 10:38:28', NULL, NULL, '2020', '2021-01-20 10:38:28'),
(38, 5, 13, 6, 'Bab I', '210120_174118.pdf', 'cek', NULL, '2021-01-20 10:41:18', NULL, NULL, '2020 smester 6', '2021-01-20 10:41:18');

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
(13, 'anas', 'pekalongan', '08587888999', 'anas', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'prastuti', 'kajen', '08587888988', 'prastuti', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 'victor', 'pekalongan', '0833666666', 'victor', '81dc9bdb52d04dc20036dbd8313ed055'),
(16, 'hari', 'pekalongan', '09888888777', 'hari', '81dc9bdb52d04dc20036dbd8313ed055'),
(17, 'faizal', 'pekalongan', '09888888777', 'faizal', '81dc9bdb52d04dc20036dbd8313ed055'),
(18, 'rizal', 'pekalongan', '09888888777', 'rizal', '81dc9bdb52d04dc20036dbd8313ed055'),
(20, 'adib', 'pemalang', '08232388888', 'adib', '81dc9bdb52d04dc20036dbd8313ed055'),
(21, 'rohman', 'pekalongan', '00888', 'rohman', '81dc9bdb52d04dc20036dbd8313ed055');

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
(9, 13, 'Teknik Informatika', 'TI'),
(12, 17, 'Sistem Informasi', 'SI'),
(14, 21, 'Komputerisasi Akutansi', 'KA');

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
(12, 9, 'agni', '17.240.0021', 'pemalang', '08232388888', 'd41d8cd98f00b204e9800998ecf8427e'),
(13, 9, 'andri', '17.240.0005', 'pekalongan', '08587888988', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 9, 'edo', '17.240.0003', 'kajen', '08587888999', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 9, 'anung', '17.240.0008', 'kajen', '08322388833', '81dc9bdb52d04dc20036dbd8313ed055'),
(16, 12, 'maya', '17.230.0001', 'pekalongan', '08587888999', '81dc9bdb52d04dc20036dbd8313ed055'),
(17, 12, 'indah', '17.230.0002', 'pemalang', '089775555555', '81dc9bdb52d04dc20036dbd8313ed055'),
(18, 12, 'anin', '17.230.0003', 'pekalongan', '08232388888', '81dc9bdb52d04dc20036dbd8313ed055'),
(19, 14, 'rizal', '17.240.0009', 'pekalongan', '00888', '81dc9bdb52d04dc20036dbd8313ed055');

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
(5, 'Laporan Magang', 5),
(6, 'Analisa sistem', 3),
(7, 'desain sistem', 3),
(9, 'Komunikasi Bisnis', 3);

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
(21, 9, 5, 13),
(22, 9, 6, 14),
(23, 9, 7, 14),
(24, 9, 8, 15),
(27, 9, 9, 20),
(28, 12, 6, 16),
(29, 12, 7, 16),
(30, 12, 9, 20),
(31, 12, 5, 20),
(32, 14, 6, 21),
(33, 14, 6, 16),
(34, 9, 9, 14),
(35, 12, 9, 15);

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
(19, 21, 13),
(20, 22, 12),
(21, 23, 12),
(22, 24, 12),
(23, 26, 13),
(25, 21, 14),
(26, 22, 14),
(27, 23, 14),
(28, 27, 14),
(29, 28, 16),
(30, 30, 18),
(33, 29, 18),
(34, 31, 18),
(36, 32, 19),
(37, 28, 17),
(38, 28, 18),
(39, 35, 16),
(40, 21, 15),
(41, 34, 13),
(42, 22, 13);

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
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `makul`
--
ALTER TABLE `makul`
  MODIFY `id_makul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ploting`
--
ALTER TABLE `ploting`
  MODIFY `id_ploting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
