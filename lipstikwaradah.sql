-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2016 at 07:40 AM
-- Server version: 5.7.10-log
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lipstikwaradah`
--

-- --------------------------------------------------------

--
-- Table structure for table `contoh32`
--

CREATE TABLE `contoh32` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contoh32`
--

INSERT INTO `contoh32` (`username`, `password`) VALUES
('hahah', '12345678'),
('root', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `ketikaonline`
--

CREATE TABLE `ketikaonline` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `ID_Penjual` varchar(20) NOT NULL,
  `nama_toko` varchar(20) DEFAULT NULL,
  `alamat_toko` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`ID_Penjual`, `nama_toko`, `alamat_toko`, `username`, `password`) VALUES
('20163012072206', 'ddd', 'wsss', 'www', 'ww'),
('234825', 'ASROH BEAUTY SHOP', 'Jl. Bangau Sakti', '@asroh', '123456712'),
('334927', 'RANGGA BEAUTY SHOP', 'Jl. Antah Berantah', '@rangga', '12332198'),
('386332', 'POHON BEAUTY SHOP', 'Jl. Kenangan', '@pohon', '98778965'),
('454213', 'VENA BEAUTY SHOP', 'Jl. Merpati Sakti', '@vena', '34575864'),
('593111', 'DINDA BEAUTY SHOP', 'Jl. Arjuna', '@dinda', '18181819'),
('734682', 'DILLA BEAUTY SHOP', 'Jl. Air Dingin', '@dilla', '64729103');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `Kode_produk` varchar(20) NOT NULL,
  `kode_warna` varchar(20) NOT NULL,
  `merk` varchar(20) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `netto` varchar(20) DEFAULT NULL,
  `gambar_produk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Kode_produk`, `kode_warna`, `merk`, `jenis`, `netto`, `gambar_produk`) VALUES
('123456', '02', 'Wardah', 'Long Lasting', '2.5 g', '"images/wardah-longlasting.jpg"'),
('203975', '01', 'Wardah', 'Lip Balm', '6.5 g', '"images/wardah-lipbalm-strawberry.jpg"'),
('209374', '09', 'Wardah', 'Lip Cream', '4 g', '"images/wardah-lipcream.jpg"'),
('455638', '17', 'Wardah', 'Matte Lipstik', '3.8 g', '"images/wardah-matte-lipstik.jpg"'),
('897544', '003', 'Wardah', 'pallate', '10 g', '"images/wardah-pallate.png"'),
('988234', '05', 'Wardah', 'Intense Matte', '2.5 g', '"images/wardah-intanse-matte.jpg"');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_Transaksi` varchar(20) NOT NULL,
  `ID_Penjual` varchar(20) NOT NULL,
  `Kode_produk` varchar(20) NOT NULL,
  `expired` date DEFAULT NULL,
  `harga` decimal(20,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_Transaksi`, `ID_Penjual`, `Kode_produk`, `expired`, `harga`) VALUES
('00000001', '593111', '123456', '2018-08-20', '98000'),
('00000002', '734682', '455638', '2018-08-20', '98000'),
('00000003', '454213', '897544', '2018-08-20', '98000'),
('00000004', '234825', '988234', '2018-08-20', '98000'),
('00000005', '334927', '203975', '2018-08-20', '98000'),
('00000006', '386332', '209374', '2018-08-20', '98000'),
('20163012070949', '234825', '203975', '2018-12-30', '98000'),
('20163012071036', '234825', '203975', '2018-12-30', '98000'),
('20163012071213', '234825', '455638', '2018-12-30', '98000'),
('20163012071346', '234825', '455638', '2018-12-30', '98000');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `kode_warna` varchar(20) NOT NULL,
  `warna` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`kode_warna`, `warna`) VALUES
('003', 'ChocoAholic'),
('01', 'Strawberry'),
('02', 'Pink Sorbet'),
('05', 'Easy Brownie'),
('09', 'Mauve On'),
('17', 'Georgeus Pink');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contoh32`
--
ALTER TABLE `contoh32`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ketikaonline`
--
ALTER TABLE `ketikaonline`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`ID_Penjual`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Kode_produk`),
  ADD KEY `kode_warna` (`kode_warna`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_Transaksi`),
  ADD KEY `ID_Penjual` (`ID_Penjual`),
  ADD KEY `Kode_produk` (`Kode_produk`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`kode_warna`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kode_warna`) REFERENCES `warna` (`kode_warna`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_Penjual`) REFERENCES `penjual` (`ID_Penjual`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`Kode_produk`) REFERENCES `produk` (`Kode_produk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
