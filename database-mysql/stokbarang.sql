-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 06:21 PM
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
-- Table structure for table `datanama`
--

CREATE TABLE `datanama` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datanama`
--

INSERT INTO `datanama` (`idbarang`, `namabarang`) VALUES
(1, 'Modem GSM wifi'),
(2, 'Cover Akrilik ( Custom) (Incl Laminating Keterangan Skala MMI, Doubletic Stiker)'),
(3, 'Terminal Listrik Outlet'),
(4, 'Inverter'),
(5, 'Inverter DC to AC'),
(6, 'Battery 70AH'),
(7, 'Stabilizer 2000 VA'),
(8, 'UPS 700VA'),
(9, 'Kabel Battery NYAF'),
(10, 'SD Card 32 GB'),
(11, 'Adaptor Display'),
(12, 'LAN Arrester'),
(13, 'Switch Hub'),
(14, 'UPS 600 VA'),
(15, 'Stabilizer 1000 V'),
(16, 'Sensor PAlert+ Model  PA50VE'),
(17, 'Cube Display'),
(18, 'Antena YAGI'),
(19, 'Antena Pig Tail'),
(20, 'Antena OMNI'),
(21, 'Meja Kerja'),
(22, 'Solar Panel 390Wp'),
(23, 'MPPT'),
(24, 'Battery Lithium 24V 100 Ah'),
(25, 'Display 55UH5J-H'),
(26, 'Mini PC'),
(27, 'UPS 1600 VA'),
(28, 'Battery 75AH'),
(29, 'Box Panel'),
(30, 'Titan Accelerometer'),
(31, 'Centaur Digitizer');

-- --------------------------------------------------------

--
-- Table structure for table `jenisnama`
--

CREATE TABLE `jenisnama` (
  `idjenis` int(11) NOT NULL,
  `jenisperalatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenisnama`
--

INSERT INTO `jenisnama` (`idjenis`, `jenisperalatan`) VALUES
(13, 'ACC NC dan REIS'),
(14, 'Intensitymater Realshake'),
(15, 'Seismograph InaTEWS'),
(16, 'WRS-NG'),
(17, 'Intensitymater Rekayasa'),
(18, 'Sirine Utama'),
(20, 'Precursor Magnet Bumi');

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
(2, '2023-07-14', '2023-09-08', '20240516000760', 'Modem GSM wifi', 'ACC NC dan REIS', 'Robustal', '06971423080019', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'KMJR', 'bin Jali', '', '', ''),
(3, '2023-07-14', '0000-00-00', '20240516000455', 'Modem GSM wifi', 'ACC NC dan REIS', 'Robustal', '06971423090049', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(4, '2023-07-14', '2023-07-09', '20240516000159', 'Modem GSM wifi', 'ACC NC dan REIS', 'Robustal', '06971423030051', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'WGJR', 'Sidik Pramono', '', '', ''),
(5, '2023-07-14', '0000-00-00', '20240516000966', 'Cover Akrilik ( Custom) (Incl Laminating Keteranga', 'ACC NC dan REIS', 'Custom', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(6, '2023-07-14', '0000-00-00', '20240516000370', 'Modem GSM wifi', 'ACC NC dan REIS', 'Robustel', '06971423030010', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(7, '2023-07-14', '0000-00-00', '20240516000139', 'Terminal Listrik Outlet', 'ACC NC dan REIS', 'APC', '2Z2148P80109', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(8, '2023-07-14', '0000-00-00', '20240516000296', 'Terminal Listrik Outlet', 'ACC NC dan REIS', 'APC', '222148P80110', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(9, '2023-07-14', '2023-07-09', '20240516000897', 'Inverter', 'ACC NC dan REIS', 'Pascal', 'EHF80BC011', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'WGJR', 'Sidik Pramono', '', '', ''),
(10, '2023-07-14', '0000-00-00', '20240516000148', 'Inverter', 'ACC NC dan REIS', 'Pascal', 'EHF8DBC013', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(11, '2023-07-14', '2023-11-29', '20240516000754', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF80BC014', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'MBJN', 'Zamroni', '', '', ''),
(12, '2023-07-14', '0000-00-00', '20240516000628', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHFR0BC016', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(13, '2023-07-14', '0000-00-00', '20240516000979', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF808C017', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(15, '2023-07-14', '0000-00-00', '20240516000964', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EMFROBCD19', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(16, '2023-07-14', '2023-09-08', '20240516000379', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF80BC020', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'KMJR', 'Bin Jali', '', '', ''),
(17, '2023-07-14', '0000-00-00', '20240516000905', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EMF80BC021', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(18, '2023-07-14', '0000-00-00', '20240516000229', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF80BC022', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(19, '2023-07-14', '0000-00-00', '20240516000600', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF80BC023', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(20, '2023-07-14', '0000-00-00', '20240516000773', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'DHFRCBC024', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(22, '2023-07-14', '2023-10-08', '20240516000366', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF8C8C026', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'KYJR', 'Bin Jali', '', '', ''),
(23, '2023-07-14', '0000-00-00', '20240516000525', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF8C8C027', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(24, '2023-07-14', '0000-00-00', '20240516000403', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF8CBC028', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(25, '2023-07-14', '0000-00-00', '20240516000691', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'DHF3CBC029', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(26, '2023-07-14', '2023-09-08', '20240516000526', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'KMJR', 'Bin Jali', '', '', ''),
(27, '2023-07-14', '2023-09-08', '20240516000858', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'KMJR', 'Bin Jali', '', '', ''),
(28, '2023-07-14', '2023-09-08', '20240516000803', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'KMJR', 'Bin Jali', '', '', ''),
(29, '2023-07-14', '2023-07-09', '20240516000888', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'WGJR', 'Sidik Pramono', '', '', ''),
(30, '2023-07-14', '2023-07-09', '20240516000216', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'WGJR', 'Sidik Pramono', '', '', ''),
(31, '2023-07-14', '2023-07-09', '20240516000918', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'WGJR', 'Sidik Pramono', '', '', ''),
(32, '2023-07-14', '2023-09-08', '20240516000468', 'Stabilizer 2000 VA', 'ACC NC dan REIS', 'Matsumoto', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'KMJR', 'bin Jali', '', '', ''),
(33, '2023-07-14', '0000-00-00', '20240516000059', 'Stabilizer 2000 VA', 'ACC NC dan REIS', 'Matsumoto', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(34, '2023-07-14', '0000-00-00', '20240516000560', 'Stabilizer 2000 VA', 'ACC NC dan REIS', 'Matsumoto', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(35, '2023-07-14', '0000-00-00', '20240516000672', 'Stabilizer 2000 VA', 'ACC NC dan REIS', 'Matsumoto', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(36, '2023-07-14', '0000-00-00', '20240516000809', 'Stabilizer 2000 VA', 'ACC NC dan REIS', 'Matsumoto', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(37, '2023-07-14', '2024-01-23', '20240516000170', 'UPS 700VA', 'ACC NC dan REIS', 'APC', '982136A49642', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'NYO05-SARDA DIY', 'Sidik Pramono', '', '', ''),
(38, '2023-07-14', '0000-00-00', '20240516000150', 'UPS 700VA', 'ACC NC dan REIS', 'APC', '982136A49643', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(39, '2023-07-14', '2023-09-25', '20240516000011', 'UPS 700VA', 'ACC NC dan REIS', 'APC', '982136A49644', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'JUII', 'Sidik Pramono', '', '', ''),
(40, '2023-07-14', '0000-00-00', '20240516000321', 'UPS 700VA', 'ACC NC dan REIS', 'APC', '982136A49645', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(41, '2023-07-14', '0000-00-00', '20240516000762', 'UPS 700VA', 'ACC NC dan REIS', 'APC', '982136A49678', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(42, '2023-07-14', '2023-08-08', '20240516000532', 'UPS 700VA', 'ACC NC dan REIS', 'APC', '982136A49679', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'KCJN', 'Sidik Pramono', '', '', ''),
(43, '2023-07-14', '0000-00-00', '20240516000915', 'UPS 700VA', 'ACC NC dan REIS', 'APC', '982136A49680', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(44, '2023-07-14', '2023-09-25', '20240516000714', 'UPS 700VA', 'ACC NC dan REIS', 'APC', '982136A49681', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'BMJN', 'Bin Jali', '', '', ''),
(45, '2023-07-14', '0000-00-00', '20240516000244', 'Kabel Battery NYAF', 'ACC NC dan REIS', 'Jembo', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(46, '2023-07-14', '0000-00-00', '20240516000913', 'Kabel Battery NYAF', 'ACC NC dan REIS', 'Jembo', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(47, '2023-07-14', '0000-00-00', '20240516000402', 'Kabel Battery NYAF', 'ACC NC dan REIS', 'Jembo', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(49, '2023-08-22', '2023-06-03', '20240516000564', 'Modem GSM wifi', 'ACC NC dan REIS', 'Robustal', '06971423070003', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'NGYTJ', 'Wiji', '', '', ''),
(50, '2023-08-22', '0000-00-00', '20240516000176', 'Modem GSM wifi', 'ACC NC dan REIS', 'Robustal', '06971423070004', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(51, '2023-08-22', '2023-12-22', '20240516000248', 'Modem GSM wifi', 'ACC NC dan REIS', 'Robustal', '06971423070005', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'TKJN', 'Arif', '', '', ''),
(53, '2023-08-22', '0000-00-00', '20240516000562', 'Adaptor Display', 'ACC NC dan REIS', 'Mean Well', 'SC36048490', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(54, '2023-08-22', '2023-11-09', '20240516000793', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Malang', 'PT. Mindotama Avia Teknik', '', '', ''),
(55, '2023-08-22', '2023-11-09', '20240516000496', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Malang', 'PT. Mindotama Avia Teknik', '', '', ''),
(56, '2023-08-22', '2023-11-09', '20240516000338', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Malang', 'PT. Mindotama Avia Teknik', '', '', ''),
(57, '2023-08-22', '2023-11-09', '20240516000719', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF80BC030', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Malang', 'PT. Mindotama Avia Teknik', '', '', ''),
(58, '2023-08-22', '2023-11-09', '20240516000099', 'Modem GSM wifi', 'ACC NC dan REIS', 'Robustal', '06971423070001', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Malang', 'PT. Mindotama Avia Teknik', '', '', ''),
(59, '2023-08-22', '2023-11-09', '20240516000768', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Nganjuk', 'PT. Mindotama Avia Teknik', '', '', ''),
(60, '2023-08-22', '2023-11-09', '20240516000649', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Nganjuk', 'PT. Mindotama Avia Teknik', '', '', ''),
(61, '2023-08-22', '2023-11-09', '20240516000910', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Nganjuk', 'PT. Mindotama Avia Teknik', '', '', ''),
(62, '2023-08-22', '2023-11-09', '20240516000046', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Nganjuk', 'PT. Mindotama Avia Teknik', '', '', ''),
(63, '2023-08-22', '2023-11-09', '20240516000195', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Nganjuk', 'PT. Mindotama Avia Teknik', '', '', ''),
(65, '2023-08-22', '2023-11-09', '20240516000222', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF80BC032', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Nganjuk', 'PT. Mindotama Avia Teknik', '', '', ''),
(66, '2023-08-22', '2023-11-09', '20240516000400', 'Inverter DC to AC', 'ACC NC dan REIS', 'Pascal', 'EHF80BC033', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Nganjuk', 'PT. Mindotama Avia Teknik', '', '', ''),
(67, '2023-08-22', '2023-11-09', '20240516000247', 'Modem GSM wifi', 'ACC NC dan REIS', 'Robustal', '06971423070002', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Nganjuk', 'PT. Mindotama Avia Teknik', '', '', ''),
(68, '2023-08-22', '2023-11-09', '20240516000827', 'Stabilizer 2000 VA', 'ACC NC dan REIS', 'Matsumoto', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Nganjuk', 'PT. Mindotama Avia Teknik', '', '', ''),
(70, '2023-08-22', '2023-11-09', '20240516000156', 'LAN Arrester', 'ACC NC dan REIS', 'APC', '3Z2144X20611', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Banjarnegara', 'PT. Mindotama Avia Teknik', '', '', ''),
(71, '2023-08-22', '2023-11-09', '20240516000789', 'Switch Hub', 'ACC NC dan REIS', 'APC', 'CN27L4608J', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Banjarnegara', 'PT. Mindotama Avia Teknik', '', '', ''),
(72, '2023-08-28', '0000-00-00', '20240516000919', 'UPS 600 VA', 'Intensitymater Realshake', 'ICA', 'IBID2300278', 'Stageof Tangerang', 0, 'masuk', '', '', '', '', ''),
(73, '2023-08-28', '0000-00-00', '20240516000032', 'UPS 600 VA', 'Intensitymater Realshake', 'ICA', 'IBID2300276', 'Stageof Tangerang', 0, 'masuk', '', '', '', '', ''),
(74, '2023-08-28', '0000-00-00', '20240516000867', 'UPS 600 VA', 'Intensitymater Realshake', 'ICA', 'IBID2300292', 'Stageof Tangerang', 0, 'masuk', '', '', '', '', ''),
(75, '2023-08-28', '0000-00-00', '20240516000068', 'Stabilizer 1000 V', 'Intensitymater Realshake', 'Minamoto', '25G2L2300318', 'Stageof Tangerang', 0, 'masuk', '', '', '', '', ''),
(76, '2023-08-28', '0000-00-00', '20240516000456', 'Stabilizer 1000 V', 'Intensitymater Realshake', 'Minamoto', '25G2L2300317', 'Stageof Tangerang', 0, 'masuk', '', '', '', '', ''),
(77, '2023-08-28', '0000-00-00', '20240516000161', 'Sensor PAlert+ Model  PA50VE', 'Intensitymater Realshake', 'Palert+', '5159', 'Stageof Tangerang', 0, 'masuk', '', '', '', '', ''),
(78, '2023-08-28', '0000-00-00', '20240516000016', 'Cube Display', 'Intensitymater Realshake', 'Sanlien', '5199', 'Stageof Tangerang', 0, 'masuk', '', '', '', '', ''),
(79, '2023-08-28', '2023-06-10', '20240516000796', 'Cube Display', 'Intensitymater Realshake', 'Sanlien', '5200', 'Stageof Tangerang', 0, 'keluar', 'NKPTK', 'Bin Jali', '', '', ''),
(80, '2023-08-27', '2023-11-17', '20240516000782', 'Antena YAGI', 'ACC NC dan REIS', 'TXR 145', 'YAGI1', 'PT. Tri Eltree Elemen', 0, 'keluar', 'SKJR', 'Arif', '', '', ''),
(82, '2023-08-27', '2023-11-24', '20240516000646', 'Antena YAGI', 'ACC NC dan REIS', 'TXR 145', 'YAGI3', 'PT. Tri Eltree Elemen', 0, 'keluar', 'UNSO', 'Bin Jali', '', '', ''),
(83, '2023-08-27', '0000-00-00', '20240516000930', 'Antena YAGI', 'ACC NC dan REIS', 'TXR 145', 'YAGI4', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(84, '2023-08-27', '0000-00-00', '20240516000206', 'Antena YAGI', 'ACC NC dan REIS', 'TXR 145', 'YAGI5', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(88, '2023-08-27', '0000-00-00', '20240516000572', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG4', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(89, '2023-08-27', '0000-00-00', '20240516000703', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG5', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(91, '2023-08-27', '0000-00-00', '20240516000223', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG7', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(93, '2023-08-27', '0000-00-00', '20240516000256', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG9', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(94, '2023-08-27', '0000-00-00', '20240516000808', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG10', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(95, '2023-08-27', '0000-00-00', '20240516000033', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG11', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(96, '2023-08-27', '0000-00-00', '20240516000968', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG12', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(97, '2023-08-27', '0000-00-00', '20240516000042', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG13', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(98, '2023-08-27', '0000-00-00', '20240516000501', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG14', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(99, '2023-08-27', '0000-00-00', '20240516000320', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG15', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(100, '2023-08-27', '0000-00-00', '20240516000937', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG16', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(101, '2023-08-27', '0000-00-00', '20240516000252', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG17', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(102, '2023-08-27', '0000-00-00', '20240516000157', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG18', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(103, '2023-08-27', '0000-00-00', '20240516000877', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG19', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(104, '2023-08-27', '0000-00-00', '20240516000013', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG20', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(105, '2023-08-27', '0000-00-00', '20240516000579', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG21', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(106, '2023-08-27', '0000-00-00', '20240516000816', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG22', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(107, '2023-08-27', '0000-00-00', '20240516000154', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG23', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(108, '2023-08-27', '0000-00-00', '20240516000972', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG24', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(109, '2023-08-27', '0000-00-00', '20240516000118', 'Antena Pig Tail', 'ACC NC dan REIS', '', 'PIG25', 'PT. Tri Eltree Elemen', 0, 'masuk', '', '', '', '', ''),
(110, '2023-08-18', '0000-00-00', '20240516000048', 'Antena OMNI', 'ACC NC dan REIS', 'YNX-4G-019', '5745386892', 'PT. Penta Jaya Indonesia', 0, 'masuk', '', '', '', '', ''),
(111, '2023-08-18', '0000-00-00', '20240516000393', 'Antena OMNI', 'ACC NC dan REIS', 'YNX-4G-019', '3255293436', 'PT. Penta Jaya Indonesia', 0, 'masuk', '', '', '', '', ''),
(112, '2023-08-18', '0000-00-00', '20240516000931', 'Antena OMNI', 'ACC NC dan REIS', 'YNX-4G-019', '3349874874', 'PT. Penta Jaya Indonesia', 0, 'masuk', '', '', '', '', ''),
(113, '2023-08-18', '0000-00-00', '20240516000999', 'Antena OMNI', 'ACC NC dan REIS', 'YNX-4G-019', '4769865699', 'PT. Penta Jaya Indonesia', 0, 'masuk', '', '', '', '', ''),
(114, '2023-08-18', '0000-00-00', '20240516000130', 'Antena OMNI', 'ACC NC dan REIS', 'YNX-4G-019', '8334377899', 'PT. Penta Jaya Indonesia', 0, 'masuk', '', '', '', '', ''),
(115, '0000-00-00', '2023-05-02', '20240516000571', 'Antena OMNI', 'ACC NC dan REIS', 'YNX-4G-019', '2322766777', 'PT. Penta Jaya Indonesia', 0, 'keluar', '', '', '', '', ''),
(116, '2023-08-18', '2023-09-25', '20240516000386', 'Antena OMNI', 'ACC NC dan REIS', 'YNX-4G-019', '2354879424', 'PT. Penta Jaya Indonesia', 0, 'keluar', 'JUII', 'Sidik Pramono', '', '', ''),
(117, '2023-08-18', '2023-09-25', '20240516000733', 'Antena OMNI', 'ACC NC dan REIS', 'YNX-4G-019', '4242249442', 'PT. Penta Jaya Indonesia', 0, 'keluar', 'MBJN', 'Bin Jali', '', '', ''),
(118, '2023-08-18', '0000-00-00', '20240516000057', 'Antena OMNI', 'ACC NC dan REIS', 'YNX-4G-019', '6782248228', 'PT. Penta Jaya Indonesia', 0, 'masuk', '', '', '', '', ''),
(119, '2023-08-18', '0000-00-00', '20240516000396', 'Antena OMNI', 'ACC NC dan REIS', 'YNX-4G-019', '5732363733', 'PT. Penta Jaya Indonesia', 0, 'masuk', '', '', '', '', ''),
(120, '2023-07-25', '2023-08-08', '20240516000143', 'Meja Kerja', 'ACC NC dan REIS', 'Custom', 'M1', 'PT. Kurniawan Bumi Putra', 0, 'keluar', 'KCJN', 'Sidik Pramono', '', '', ''),
(121, '2023-07-25', '0000-00-00', '20240516000155', 'Meja Kerja', 'ACC NC dan REIS', 'Custom', 'M2', 'PT. Kurniawan Bumi Putra', 0, 'masuk', '', '', '', '', ''),
(122, '2023-03-07', '0000-00-00', '20240516000994', 'Solar Panel 390Wp', 'Seismograph InaTEWS', 'Sankelux', 'SP1', 'PT. Surya Semesta Cemerlang', 1948050, 'masuk', '', '', '', '', 'Di Rumah dinas pak Teguh'),
(123, '2023-03-07', '0000-00-00', '20240516000940', 'MPPT', 'Seismograph InaTEWS', '', 'MPPT1', 'PT. Surya Semesta Cemerlang', 0, 'masuk', '', '', '', '', ''),
(124, '2023-03-07', '0000-00-00', '20240516000109', 'Battery Lithium 24V 100 Ah', 'Seismograph InaTEWS', 'Life Poy ', 'B1', 'PT. Surya Semesta Cemerlang', 0, 'masuk', '', '', '', '', ''),
(126, '2023-01-08', '0000-00-00', '20240516000885', 'Display 55UH5J-H', 'WRS-NG', 'LG', '305INWA3F897', 'PT. Multikom Indo Persada', 0, 'masuk', '', '', '', '', ''),
(127, '2023-01-08', '0000-00-00', '20240516000860', 'Display 55UH5J-H', 'WRS-NG', 'LG', '305INEW8E964', 'PT. Multikom Indo Persada', 0, 'masuk', '', '', '', '', ''),
(128, '2023-01-08', '0000-00-00', '20240516000200', 'Display 55UH5J-H', 'WRS-NG', 'LG', '305INNG8E967', 'PT. Multikom Indo Persada', 0, 'masuk', '', '', '', '', ''),
(129, '2023-01-08', '0000-00-00', '20240516000404', 'Mini PC', 'WRS-NG', 'HP Pro Mini 400 G9', '8CC3202TRQ', 'PT. Multikom Indo Persada', 0, 'masuk', '', '', '', '', ''),
(130, '2023-01-08', '0000-00-00', '20240516000872', 'Mini PC', 'WRS-NG', 'HP Pro Mini 400 G9', '8CC3202TS9', 'PT. Multikom Indo Persada', 0, 'masuk', '', '', '', '', ''),
(133, '2023-05-10', '2023-11-29', '20240516000028', 'Battery 70AH', 'ACC NC dan REIS', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'MBJN', 'Zamroni', '', '', ''),
(134, '2023-05-10', '0000-00-00', '20240516000541', 'Battery 70AH', 'Intensitymater Rekayasa', 'Haze', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(135, '2023-05-10', '0000-00-00', '20240516000300', 'Inverter DC to AC', 'Intensitymater Rekayasa', 'Pascal', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(140, '2023-05-10', '2023-10-11', '20240516000912', 'SD Card 32 GB', 'ACC NC dan REIS', 'SwissBit', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(141, '2023-05-10', '2023-10-11', '20240516000418', 'SD Card 32 GB', 'ACC NC dan REIS', 'SwissBit', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(142, '2023-05-10', '2023-10-11', '20240516000873', 'SD Card 32 GB', 'ACC NC dan REIS', 'SwissBit', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(143, '2023-05-10', '2023-10-11', '20240516000844', 'SD Card 32 GB', 'ACC NC dan REIS', 'SwissBit', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(148, '2023-03-10', '2023-10-11', '20240516000536', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(149, '2023-03-10', '2023-10-11', '20240516000207', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(150, '2023-03-10', '2023-10-11', '20240516000368', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(151, '2023-03-10', '2023-10-11', '20240516000196', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(152, '2023-03-10', '2023-10-11', '20240516000213', 'Box Panel', 'Sirine Utama', '', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(153, '2023-03-10', '2023-10-11', '20240516000642', 'Box Panel', 'Sirine Utama', '', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(154, '2023-03-10', '2023-10-11', '20240516000736', 'Box Panel', 'Sirine Utama', '', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Stageof Banjarnegara', '', '', '', ''),
(155, '2023-03-10', '2023-11-18', '20240516000820', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Parangtritis, Bantul', 'CV. AW Tech', '', '', ''),
(156, '2023-03-10', '2023-11-18', '20240516000315', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Parangtritis, Bantul', 'CV. AW Tech', '', '', ''),
(157, '2023-03-10', '2023-11-18', '20240516000023', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Parangtritis, Bantul', 'CV. AW Tech', '', '', ''),
(158, '2023-03-10', '2023-11-18', '20240516000812', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Parangtritis, Bantul', 'CV. AW Tech', '', '', ''),
(159, '2023-03-10', '2023-11-21', '20240516000578', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Glagah, Kulon Progo', 'CV. AW Tech', '', '', ''),
(160, '2023-03-10', '2023-11-21', '20240516000037', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Glagah, Kulon Progo', 'CV. AW Tech', '', '', ''),
(161, '2023-03-10', '2023-11-21', '20240516000424', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Glagah, Kulon Progo', 'CV. AW Tech', '', '', ''),
(162, '2023-03-10', '2023-11-21', '20240516000328', 'Battery 75AH', 'Sirine Utama', 'Ritar', '', 'PT. Sarana Infotek Mandiri', 0, 'keluar', 'Glagah, Kulon Progo', 'CV. AW Tech', '', '', ''),
(163, '2023-03-10', '0000-00-00', '20240516000794', 'Box Panel', 'Sirine Utama', '', '', 'PT. Sarana Infotek Mandiri', 0, 'masuk', '', '', '', '', ''),
(164, '2023-03-10', '0000-00-00', '20240516000324', 'Box Panel', 'Sirine Utama', '', '', 'PT. Sarana Infotek Mandiri', 0, 'masuk', '', '', '', '', ''),
(165, '2023-03-10', '0000-00-00', '20240516000149', 'Box Panel', 'Sirine Utama', '', '', 'PT. Sarana Infotek Mandiri', 0, 'masuk', '', '', '', '', ''),
(166, '2023-03-10', '0000-00-00', '20240516000194', 'Box Panel', 'Sirine Utama', '', '', 'PT. Sarana Infotek Mandiri', 0, 'masuk', '', '', '', '', ''),
(167, '2023-11-13', '0000-00-00', '20240516000000', 'UPS 600 VA', 'Intensitymater Realshake', 'ICA', '1B1D12302227', 'Stageof Denpasar', 0, 'masuk', '', '', '', '', ''),
(168, '2023-11-13', '0000-00-00', '20240516000208', 'UPS 600 VA', 'Intensitymater Realshake', 'ICA', '1B1D12302228', 'Stageof Denpasar', 0, 'masuk', '', '', '', '', ''),
(169, '2023-11-13', '0000-00-00', '20240516000062', 'Stabilizer 2000 VA', 'Intensitymater Realshake', 'Matsumoto', '', 'Stageof Denpasar', 0, 'masuk', '', '', '', '', ''),
(174, '2023-03-11', '2023-11-21', '20240516000761', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2138A20783', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'SCJN', 'Arif', '', '', 'Salatiga'),
(175, '2023-03-11', '0000-00-00', '20240516000908', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2317A17599', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', 'Penggantian UPS 9B2138A20791'),
(177, '2023-03-11', '0000-00-00', '20240516000476', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2138A20986', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(178, '2023-03-11', '2024-01-22', '20240516000778', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2138A20989', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'UNSO', 'Bin Jali', '', '', ''),
(179, '2023-03-11', '2024-01-30', '20240516000430', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2330A01660', 'PT. Mindotama Avia Teknik', 0, 'keluar', '', 'Mindotama', '', '', 'pengganti 9B2138A20991'),
(180, '2023-03-11', '2024-01-30', '20240516000115', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2330A01602', 'PT. Mindotama Avia Teknik', 0, 'keluar', '', 'Mindotama', '', '', 'pengganti 9B2138A20993'),
(181, '2023-03-11', '2024-01-30', '20240516000689', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2330A01661', 'PT. Mindotama Avia Teknik', 0, 'keluar', '', 'Mindotama', '', '', 'pengganti 9B2138A20996'),
(182, '2023-03-11', '2024-01-30', '20240516000904', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2331A17746', 'PT. Mindotama Avia Teknik', 0, 'keluar', '', 'Mindotama', '', '', 'pengganti 9B2138A21001'),
(183, '2023-03-11', '2024-01-30', '20240516000750', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2331A17652', 'PT. Mindotama Avia Teknik', 0, 'keluar', '', 'Mindotama', '', '', 'pengganti 9B2138A21003'),
(184, '2023-03-11', '2024-01-30', '20240516000360', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2331A17644', 'PT. Mindotama Avia Teknik', 0, 'keluar', '', 'Mindotama', '', '', 'pengganti 9B2138A21007'),
(185, '2023-03-11', '2024-01-30', '20240516000660', 'UPS 1600 VA', 'ACC NC dan REIS', 'APC', '9B2331A17643', 'PT. Mindotama Avia Teknik', 0, 'keluar', '', 'Mindotama', '', '', 'pengganti 9B2138A21101'),
(187, '2023-03-11', '0000-00-00', '20240516000081', 'Kabel Battery NYAF', 'ACC NC dan REIS', 'Jembo', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(188, '2023-03-11', '2023-11-20', '20240516000925', 'SD Card 32 GB', 'ACC NC dan REIS', 'SwissBit', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'KCJN', 'Zamroni', '', '', 'Klaten'),
(189, '2023-03-11', '2023-11-22', '20240516000623', 'SD Card 32 GB', 'ACC NC dan REIS', 'SwissBit', '', 'PT. Mindotama Avia Teknik', 0, 'keluar', 'MCJN', 'Arif Kurniawan', '', '', ''),
(190, '2023-03-11', '0000-00-00', '20240516000542', 'SD Card 32 GB', 'ACC NC dan REIS', 'SwissBit', '', 'PT. Mindotama Avia Teknik', 0, 'masuk', '', '', '', '', ''),
(191, '2023-05-12', '0000-00-00', '20240516000184', 'Mini PC', 'WRS-NG', 'HP Pro Mini 400 G9', '', 'PT. Multikom Indo Persada', 0, 'masuk', '', '', '', '', ''),
(192, '2023-12-23', '0000-00-00', '20240516000928', 'Battery 75AH', 'Precursor Magnet Bumi', 'Panasonic', 'PAN1', 'PT. Citra Global Teknik', 0, 'masuk', '', '', '', '', ''),
(193, '2023-12-23', '0000-00-00', '20240516000034', 'Battery 75AH', 'Precursor Magnet Bumi', 'Panasonic', 'PAN2', 'PT. Citra Global Teknik', 0, 'masuk', '', '', '', '', ''),
(194, '2023-12-23', '0000-00-00', '20240516000137', 'Battery 75AH', 'Precursor Magnet Bumi', 'Panasonic', 'PAN3', 'PT. Citra Global Teknik', 0, 'masuk', '', '', '', '', ''),
(195, '2023-12-23', '0000-00-00', '20240516000280', 'Battery 75AH', 'Precursor Magnet Bumi', 'Panasonic', 'PAN4', 'PT. Citra Global Teknik', 0, 'masuk', '', '', '', '', ''),
(196, '2023-12-23', '0000-00-00', '20240516000104', 'Battery 75AH', 'Precursor Magnet Bumi', 'Panasonic', 'PAN5', 'PT. Citra Global Teknik', 0, 'masuk', '', '', '', '', ''),
(197, '2023-12-23', '0000-00-00', '20240516000391', 'Kabel Battery NYAF', 'Precursor Magnet Bumi', '', '', 'PT. Citra Global Teknik', 0, 'masuk', '', '', '', '', ''),
(198, '2023-12-23', '0000-00-00', '20240516000956', 'Kabel Battery NYAF', 'Precursor Magnet Bumi', '', '', 'PT. Citra Global Teknik', 0, 'masuk', '', '', '', '', ''),
(199, '2023-12-23', '0000-00-00', '20240516000144', 'Kabel Battery NYAF', 'Precursor Magnet Bumi', '', '', 'PT. Citra Global Teknik', 0, 'masuk', '', '', '', '', ''),
(200, '2023-12-23', '0000-00-00', '20240516000219', 'Kabel Battery NYAF', 'Precursor Magnet Bumi', '', '', 'PT. Citra Global Teknik', 0, 'masuk', '', '', '', '', ''),
(201, '2023-12-23', '0000-00-00', '20240516000152', 'Kabel Battery NYAF', 'Precursor Magnet Bumi', '', '', 'PT. Citra Global Teknik', 0, 'masuk', '', '', '', '', ''),
(202, '2024-12-03', '2023-03-20', '20240516000893', 'Modem GSM wifi', 'WRS-NG', 'Teltonika', '6000818441', 'PT. Parimas Hicindo Sentosa', 0, 'keluar', 'RRI', 'Bin Jali', '', '', ''),
(203, '2024-12-03', '2023-03-21', '20240516000359', 'Modem GSM wifi', 'WRS-NG', 'Teltonika', '6000926031', 'PT. Parimas Hicindo Sentosa', 0, 'keluar', 'BPBD Sleman', 'Sidik Pramono', '', '', ''),
(204, '2024-12-03', '2023-03-22', '20240516000769', 'Modem GSM wifi', 'WRS-NG', 'Teltonika', '6000817062', 'PT. Parimas Hicindo Sentosa', 0, 'keluar', 'SAR Yogyakarta', 'Arif Kurniawan', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datanama`
--
ALTER TABLE `datanama`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `jenisnama`
--
ALTER TABLE `jenisnama`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datanama`
--
ALTER TABLE `datanama`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `jenisnama`
--
ALTER TABLE `jenisnama`
  MODIFY `idjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
