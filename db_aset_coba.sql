-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2024 at 06:05 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aset_coba`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_aset`
--

CREATE TABLE `t_aset` (
  `id_aset` int NOT NULL,
  `id_gedung` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `kode_aset` varchar(50) NOT NULL,
  `nama_aset` text,
  `volume` varchar(10) NOT NULL,
  `nilai_aset` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_aset`
--

INSERT INTO `t_aset` (`id_aset`, `id_gedung`, `id_ruangan`, `kode_aset`, `nama_aset`, `volume`, `nilai_aset`) VALUES
(11, 12, 10, 'GR-R5-001', 'Komputer', '12', '34535'),
(12, 12, 10, 'GR-R5-002', 'Laptop', '56', '3454543'),
(13, 12, 9, 'GR-RA-001', 'Monitor', '12', '456546');

-- --------------------------------------------------------

--
-- Table structure for table `t_barang`
--

CREATE TABLE `t_barang` (
  `id_barang` int NOT NULL,
  `id_kategori` int NOT NULL,
  `nama_barang` text,
  `merk` text,
  `tahun_perolehan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_barang`
--

INSERT INTO `t_barang` (`id_barang`, `id_kategori`, `nama_barang`, `merk`, `tahun_perolehan`) VALUES
(1, 1, 'asgdasg', 'asudga', '2024-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `t_gedung`
--

CREATE TABLE `t_gedung` (
  `id_gedung` int NOT NULL,
  `kode_gedung` varchar(5) NOT NULL,
  `nama_gedung` text,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_gedung`
--

INSERT INTO `t_gedung` (`id_gedung`, `kode_gedung`, `nama_gedung`, `date`) VALUES
(9, 'FIA', 'Fakultas Ilmu Administrasi', '2024-08-08'),
(10, 'FKDIP', 'Fakultas Keguruan dan Ilmu Pendidikan', '2024-08-08'),
(11, 'GB', 'Gedung Belakang', '2024-08-08'),
(12, 'GR', 'Gedung Rektorat', '2024-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` int NOT NULL,
  `kode_kategori` text NOT NULL,
  `nama_kategori` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
(1, 'GDG', 'Gedung');

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `id_peminjaman` int NOT NULL,
  `id_aset` int NOT NULL,
  `id_user` int NOT NULL,
  `nama_peminjam` text,
  `no_hp` varchar(20) NOT NULL,
  `fakultas` text,
  `jumlah_barang` varchar(5) NOT NULL,
  `tanggal_meminjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('Sedang Dipinjam','Dikembalikan') NOT NULL,
  `tanggal_dikembalikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_peminjaman`
--

INSERT INTO `t_peminjaman` (`id_peminjaman`, `id_aset`, `id_user`, `nama_peminjam`, `no_hp`, `fakultas`, `jumlah_barang`, `tanggal_meminjam`, `tanggal_kembali`, `status`, `tanggal_dikembalikan`) VALUES
(5, 12, 5, 'Ahmad', '081224210297', 'Fakultas Ilmu Komputer', '12', '2024-08-16', '2024-08-30', 'Sedang Dipinjam', '0000-00-00'),
(6, 13, 7, 'jancok', '13131863', 'Fakultas Teknik', '12', '2024-08-15', '2024-08-24', 'Sedang Dipinjam', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengaduan`
--

CREATE TABLE `t_pengaduan` (
  `id_pengaduan` int NOT NULL,
  `id_user` int NOT NULL,
  `id_aset` int NOT NULL,
  `keluhan` text,
  `status` enum('Sudah Diperbaiki','Belum Diperbaiki') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_ruangan`
--

CREATE TABLE `t_ruangan` (
  `id_ruangan` int NOT NULL,
  `kode_ruangan` varchar(8) NOT NULL,
  `nama_ruangan` text,
  `date` date NOT NULL,
  `id_gedung` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_ruangan`
--

INSERT INTO `t_ruangan` (`id_ruangan`, `kode_ruangan`, `nama_ruangan`, `date`, `id_gedung`) VALUES
(9, 'GR-RA', 'Ruangan Auditorium', '2024-08-10', 12),
(10, 'GR-R5', 'Ruang 5', '2024-08-10', 12),
(11, 'FKDIP-RG', 'Ruang GYM', '2024-08-10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int NOT NULL,
  `nama_lengkap` text,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('admin','mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama_lengkap`, `email`, `no_hp`, `fakultas`, `password`, `level`) VALUES
(5, 'Ahmad', 'ahmad@123', '081224210297', 'Fakultas Ilmu Komputer', '$2y$10$ZmlEddzVxoR0LGbWyD9JcOOAP2H8gTYtQqnGeyKHYe.WTdYDq4hPu', 'mahasiswa'),
(6, 'Rendhi Richardo Ardiansyah', 'rendhi@123', '', '', '$2y$10$0eoQIB7oxtKYUukf.8hGm.B/7TdawJYdJLc9tMXC83lCgq8dG9cnG', 'admin'),
(7, 'jancok', 'jancok@123', '13131863', 'Fakultas Teknik', '$2y$10$/pyc0i6JLryQ2b/qihRs/eZ/jOleyzTRDLX/AzclXrasy52OIWlb2', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_aset`
--
ALTER TABLE `t_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `t_gedung`
--
ALTER TABLE `t_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `t_pengaduan`
--
ALTER TABLE `t_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `t_ruangan`
--
ALTER TABLE `t_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_aset`
--
ALTER TABLE `t_aset`
  MODIFY `id_aset` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_barang`
--
ALTER TABLE `t_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_gedung`
--
ALTER TABLE `t_gedung`
  MODIFY `id_gedung` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_pengaduan`
--
ALTER TABLE `t_pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_ruangan`
--
ALTER TABLE `t_ruangan`
  MODIFY `id_ruangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
