-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 03:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stokbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_peralatan` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `asal_perolehan` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'masuk' COMMENT 'masuk,keluar',
  `lokasi` varchar(100) NOT NULL,
  `teknisi` varchar(100) NOT NULL,
  `foto` blob NOT NULL,
  `file` blob NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `tanggal`, `tanggal_keluar`, `id_barang`, `nama_barang`, `jenis_peralatan`, `merk`, `sn`, `asal_perolehan`, `harga`, `status`, `lokasi`, `teknisi`, `foto`, `file`, `keterangan`) VALUES
(222, '2024-10-17', '0000-00-00', '20241219230639', 'Mikrofon', '', '', '', 'Pembelian ', 150000, 'masuk', '', '', 0x707265766965772e6a7067, '', 'Digunakan untuk kebaktian umum'),
(223, '2024-10-20', '2024-12-03', '20241219231318', 'Gitar Elektrik', '', '', '', 'Donasi Jemaat', 3000000, 'keluar', '', '', 0x707265766965775f322e6a7067, '', 'Senar putus tidak bisa diperbaiki'),
(224, '2024-10-20', '0000-00-00', '20241219231422', 'Gitar Elektrik', '', '', '', 'Donasi Jemaat', 3000000, 'masuk', '', '', 0x707265766965775f322e6a7067, '', 'Keperluan musik gereja'),
(225, '2024-10-17', '0000-00-00', '20241219231533', 'Mikrofon', '', '', '', 'Pembelian ', 150000, 'masuk', '', '', 0x707265766965772e6a7067, '', 'Digunakan untuk kebaktian umum'),
(227, '2024-10-21', '0000-00-00', '20241219231902', 'Proyektor', '', '', '', 'Donasi yayasan', 5000000, 'masuk', '', '', 0x74682e6a7067, '', 'Digunakan untuk keperluan kebaktian'),
(228, '2024-10-20', '0000-00-00', '20241219231934', 'Proyektor', '', '', '', 'Donasi yayasan', 5000000, 'masuk', '', '', 0x74682e6a7067, '', 'Digunakan untuk keperluan kebaktian'),
(230, '2024-10-21', '0000-00-00', '20241219232154', 'Alkitab', '', '', '', 'Pembelian', 200000, 'masuk', '', '', 0x6d645f363237346365373134666565642e6a7067, '', 'Keperluan kebaktian'),
(231, '2024-10-21', '0000-00-00', '20241219232238', 'Alkitab', '', '', '', 'Pembelian', 200000, 'masuk', '', '', 0x6d645f363237346365373134666565642e6a7067, '', 'Keperluan kebaktian'),
(232, '2024-10-22', '0000-00-00', '20241219232338', 'Sound System', '', '', '', 'Pembelian', 3500000, 'masuk', '', '', 0x7468202831292e6a7067, '', 'Keperluan kebaktian'),
(233, '2024-10-22', '0000-00-00', '20241219232415', 'Sound System', '', '', '', 'Pembelian ', 3500000, 'masuk', '', '', 0x7468202831292e6a7067, '', 'Keperluan kebaktian'),
(236, '2024-10-23', '0000-00-00', '20241219232856', 'Organ Tunggal', '', '', '', 'Pembelian', 7000000, 'masuk', '', '', 0x7468202833292e6a7067, '', 'Keperluan musik kebaktian'),
(237, '2024-10-23', '0000-00-00', '20241219233009', 'Organ Tunggal', '', '', '', 'Pembelian ', 7000000, 'masuk', '', '', 0x7468202833292e6a7067, '', 'Keperluan musik kebaktian'),
(241, '2024-12-23', '0000-00-00', '20241219233549', 'Kursi Jemaat', '', '', '', 'Pembelian', 2500000, 'masuk', '', '', 0x7468202832292e6a7067, '', 'Penunjang kebaktian'),
(242, '2024-10-23', '0000-00-00', '20241219233625', 'Kursi Jemaat', '', '', '', 'Pembelian ', 250000, 'masuk', '', '', 0x7468202832292e6a7067, '', 'Penunjang kebaktian'),
(243, '2024-10-27', '0000-00-00', '20241219233707', 'Meja Altar', '', '', '', 'Bantuan Pemerintah', 5000000, 'masuk', '', '', 0x7468202834292e6a7067, '', 'Keperluan kebaktian'),
(244, '2024-10-27', '0000-00-00', '20241219233743', 'Meja Altar', '', '', '', 'Bantuan Pemerintah', 5000000, 'masuk', '', '', 0x7468202834292e6a7067, '', 'Keperluan kebaktian'),
(245, '2024-10-31', '0000-00-00', '20241219233911', 'PC ', '', '', '', 'Pembelian', 10000000, 'masuk', '', '', 0x7468202835292e6a7067, '', 'Penunjang administrasi'),
(246, '2024-10-31', '0000-00-00', '20241219234021', 'PC ', '', '', '', 'Pembelian ', 10000000, 'masuk', '', '', 0x7468202835292e6a7067, '', 'Penunjang administrasi'),
(247, '2024-11-01', '0000-00-00', '20241219234118', 'Printer', '', '', '', 'Pembelian ', 1500000, 'masuk', '', '', 0x7468202836292e6a7067, '', 'Penunjang cetak administrasi'),
(248, '2024-11-01', '2024-12-02', '20241219234148', 'Printer', '', '', '', 'Pembelian', 1500000, 'keluar', '', '', 0x7468202836292e6a7067, '', 'Mati total');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
