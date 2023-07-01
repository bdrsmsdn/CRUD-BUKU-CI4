-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 08:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(3) NOT NULL,
  `no_buku` varchar(6) NOT NULL,
  `kategori` enum('keilmuan','bisnis','novel','') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(3) NOT NULL,
  `id_penerbit` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `no_buku`, `kategori`, `nama`, `harga`, `stok`, `id_penerbit`) VALUES
(5, 'K1001', 'keilmuan', 'Analisis dan Perancangan Sistem Informasi', 64000, 55, 1),
(8, 'K1002', 'keilmuan', 'Artificial Intelligence', 48000, 60, 1),
(9, 'K2003', 'keilmuan', 'Autocad 3 Dimensi', 40000, 50, 1),
(10, 'B1001', 'keilmuan', 'Bisnis Online', 75000, 27, 1),
(11, 'K3004', 'keilmuan', 'Cloud Computing Technology', 85000, 15, 1),
(12, 'B1002', 'bisnis', 'Etika Bisnis dan Tanggung Jawab Sosial', 67500, 20, 1),
(17, 'N6969', 'novel', 'Cara Menjadi Anime', 1000000, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(3) NOT NULL,
  `no_penerbit` varchar(6) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `no_penerbit`, `penerbit`, `alamat`, `kota`, `telepon`) VALUES
(1, 'SP01', 'Penerbit Informatika', 'Jl. Buah Batu No. 121', 'Bandung', '0813-2220-1946'),
(4, 'SP02', 'Andi Offset', 'Jl. Suryalaya IX No. 3', 'Bandung', '0878-3903-0688'),
(5, 'SP03', 'Danendra', 'Jl. Moch Toha 44', 'Bandung', '022-5201215'),
(9, 'SP04', 'PT. Badra', 'Jl. Pamoyanan', 'Bandung', '081281817375');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_buku` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `jumlah`, `id_user`, `id_buku`) VALUES
(1, 2, 4, 5),
(7, 1, 4, 5),
(8, 20, 4, 9),
(9, 1, 4, 17);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_stock_trigger` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
  UPDATE buku
  SET stok = stok - NEW.jumlah
  WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(3, 'admin', 'admin123', 1),
(4, 'user', 'user123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
