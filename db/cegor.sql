-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 07:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cegor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(4, 'Alfandi Safira', 'admin_fandi', '$2y$10$4CmdRuQHam8CAY5fqm4XyOaenQTqZRIYutwc1kLywwtaEczhiuw/y');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `pesanan` varchar(20) DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_pesanan`, `nama_pemesan`, `no_telp`, `alamat`, `pesanan`, `jumlah`, `keterangan`) VALUES
(11, 'Alip', '089512156466', 'Ciracas', 'Nasi Goreng', 12, '4 tidak pedas, 4 sedang, 4 pedas'),
(12, 'Alfandi Safira', '089512156466', 'Poncol', 'Nasi Goreng', 12, ''),
(13, 'Pandi', '089512156466', 'Poncol', 'Mie Tektek', 12, 'pedes semua'),
(14, 'Roni', '089512156466', 'Ciracas', 'Nasi Goreng', 15, '5 ga pedes\r\n'),
(15, 'Rena', '089512156466', 'Poncol', 'Mie Aceh', 20, '10 pedes 10 sedang'),
(16, 'Safira', '089512156466', 'Pondok', 'Bebek Goreng', 12, ''),
(17, 'Rani', '089512156466', 'Pondok Melati', 'Nasi Goreng', 15, 'ga pedes');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(50) DEFAULT NULL,
  `harga_makanan` varchar(50) DEFAULT NULL,
  `gambar_makanan` varchar(50) DEFAULT NULL,
  `ketersediaan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `harga_makanan`, `gambar_makanan`, `ketersediaan`) VALUES
(34, 'Mie Tektek', '15.000', '62217d8b6a911.jpg', 'Tersedia'),
(35, 'Nasi Goreng', '12.000', '62217da2c13d7.jpg', 'Tersedia'),
(36, 'Mie Aceh', '16.000', '62217dbc9be18.jpg', 'Tersedia'),
(37, 'Kwetiau Goreng', '13.000', '62217dd67c297.jpg', 'Tersedia'),
(38, 'Bebek Goreng', '12.000', '6225b769eacf7.jpg', 'Tersedia'),
(39, 'Ayam Goreng', '10.000', '6225b7800f17e.jpg', 'Tersedia'),
(40, 'Pecel Lele', '12.000', '6225b799d9876.jpg', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id_minuman` int(11) NOT NULL,
  `nama_minuman` varchar(50) DEFAULT NULL,
  `harga_minuman` varchar(50) DEFAULT NULL,
  `gambar_minuman` varchar(50) DEFAULT NULL,
  `ketersediaan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id_minuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
