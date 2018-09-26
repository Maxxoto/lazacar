-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 06:40 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lazacar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_user` bigint(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `roles` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `username`, `password`, `roles`) VALUES
(110110, 'admin', 'admin', 'admin'),
(111111, 'admin2', 'admin2', 'admin'),
(111113, 'admin3', 'admin3', 'admin'),
(13456644, 'test1', 'test1', 'admin'),
(909090901, 'dina', 'dina', 'user'),
(851238012301803, 'arif', 'arif', 'user'),
(1231313103131031, 'ada', 'ada', 'user'),
(9203103103139131, 'adaada', 'adadada', 'user'),
(9203910391023910, 'Supeno', 'supeno', 'user');

--
-- Triggers `tb_admin`
--
DELIMITER $$
CREATE TRIGGER `DELETEIDUSER` BEFORE DELETE ON `tb_admin` FOR EACH ROW DELETE FROM tb_bio WHERE id_user = old.id_user
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `INSERTIDUSER` AFTER INSERT ON `tb_admin` FOR EACH ROW INSERT INTO tb_bio VALUES (new.id_user,null,null,null,null)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bio`
--

CREATE TABLE `tb_bio` (
  `id_user` varchar(30) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `jk_user` enum('L','P') DEFAULT NULL,
  `alamat_user` varchar(60) DEFAULT NULL,
  `notelp_user` int(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bio`
--

INSERT INTO `tb_bio` (`id_user`, `nama_user`, `jk_user`, `alamat_user`, `notelp_user`) VALUES
('110110', 'Ahmat Dani Setiawan ', 'L', 'JL Simojayan  ', 852239821),
('111111', 'Andrean Prayoga', 'L', 'Jl Krembangan Solo', 853876451),
('111113', 'Ahmat Dani ', 'L', 'Karangan 4/28 \r\n							 ', 2147483647),
('1231313103131031', ' Ada Sitompul', 'P', 'Sawojajar MARS\r\n							  ', 2147483647),
('13456644', ' Test 1', 'L', 'Malang\r\n							 ', 2147483647),
('851238012301803', ' Arif Firmansyah', 'L', 'JL SIDODOL						  ', 2147483647),
('909090901', ' Dina Delta        ', 'L', ' \r\n							 Eplek kenyes      ', 2147483647),
('9203103103139131', NULL, NULL, NULL, NULL),
('9203910391023910', ' Supeno', 'L', 'JL.SUPENO							  ', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cash`
--

CREATE TABLE `tb_cash` (
  `id_beli` varchar(30) NOT NULL,
  `id_pembeli` varchar(30) NOT NULL,
  `id_mobil` varchar(30) DEFAULT NULL,
  `id_admin` bigint(20) DEFAULT NULL,
  `status_verifikasi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cash`
--

INSERT INTO `tb_cash` (`id_beli`, `id_pembeli`, `id_mobil`, `id_admin`, `status_verifikasi`) VALUES
('BCASH00003', '909090901', 'MBL002', 0, '1'),
('BCASH00004', '909090901', 'MBL001', 110110, '1'),
('BCASH00005', '909090901', 'MBL005', 0, '0'),
('BCASH00006', '9203910391023910', 'MBL001', 110110, '1'),
('BCASH00007', '9203910391023910', 'MBL003', 110110, '1'),
('BCASH00008', '9203910391023910', 'MBL001', 0, '0'),
('BCASH00009', '9203910391023910', 'MBL003', 0, '0'),
('BCASH00010', '851238012301803', 'MBL002', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` varchar(30) NOT NULL,
  `nm_mobil` varchar(30) NOT NULL,
  `spek_mobil` varchar(600) NOT NULL,
  `harga_mobil` int(30) NOT NULL,
  `gambar` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `nm_mobil`, `spek_mobil`, `harga_mobil`, `gambar`) VALUES
('MBL001', 'AVANZA 1', ' Mesin 1500HP , Turbocharger, Super Duper Intercooler,4WD Tires , + Dongkrak , dan serta Tool Box ', 750000000, 'create.PNG'),
('MBL002', 'Xenia Petok', '  Xenia Super   ', 150000000, 'isi.PNG'),
('MBL003', 'Daihatsu', 'Fuel Economic,SU-FI,4WD,Banyak varian dan banyak variasi mesin, Tersedia : 400HP,750HP,1500HP,DLL.\r\n\r\nTurbocharger,Intercooler.', 15000000, 'Ionic-framework.JPG'),
('MBL004', 'Viper GTR', 'MOBIL SPORT SERBAGUNA ', 2147483647, 'error web-tidak-terkoneksi.JPG'),
('MBL005', 'Mitsubishi', 'Offroad Engine + Offroad Wheel ', 15000000, 'Jormugand.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `id_beli` varchar(30) NOT NULL,
  `id_pembeli` varchar(30) NOT NULL,
  `tgl_beli` varchar(30) DEFAULT NULL,
  `id_mobil` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembeli`
--

INSERT INTO `tb_pembeli` (`id_beli`, `id_pembeli`, `tgl_beli`, `id_mobil`) VALUES
('BCASH00002', '909090901', '27/02/17', 'MBL003'),
('BCASH00004', '909090901', '28/02/17', 'MBL001'),
('BCASH00006', '9203910391023910', '28/02/17', 'MBL001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_bio`
--
ALTER TABLE `tb_bio`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_cash`
--
ALTER TABLE `tb_cash`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  ADD PRIMARY KEY (`id_beli`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
