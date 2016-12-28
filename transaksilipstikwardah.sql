-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2016 at 12:22 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `transaksilipstikwardah`
--

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE IF NOT EXISTS `penjual` (
  `ID_Penjual` varchar(20) NOT NULL,
  `nama_toko` varchar(20) DEFAULT NULL,
  `alamat_toko` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_Penjual`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`ID_Penjual`, `nama_toko`, `alamat_toko`) VALUES
('234825', 'ASROH BEAUTY SHOP', 'Jl. Bangau Sakti'),
('334927', 'RANGGA BEAUTY SHOP', 'Jl. Antah Berantah'),
('386332', 'POHON BEAUTY SHOP', 'Jl. Kenangan'),
('454213', 'VENA BEAUTY SHOP', 'Jl. Merpati Sakti'),
('593111', 'DINDA BEAUTY SHOP', 'Jl. Arjuna'),
('734682', 'DILLA BEAUTY SHOP', 'Jl. Air Dingin');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `Kode_produk` varchar(20) NOT NULL,
  `kode_warna` varchar(20) NOT NULL,
  `merk` varchar(20) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `netto` varchar(20) DEFAULT NULL,
  `gambar_produk` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Kode_produk`),
  KEY `kode_warna` (`kode_warna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Kode_produk`, `kode_warna`, `merk`, `jenis`, `netto`, `gambar_produk`) VALUES
('123456', '02', 'Wardah', 'Long Lasting', '2.5 g', NULL),
('203975', '01', 'Wardah', 'Lip Balm', '6.5 g', NULL),
('209374', '09', 'Wardah', 'Lip Cream', '4 g', NULL),
('455638', '17', 'Wardah', 'Matte Lipstik', '3.8 g', NULL),
('897544', '003', 'Wardah', 'pallate', '10 g', NULL),
('988234', '05', 'Wardah', 'Intense Matte', '2.5 g', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `ID_Transaksi` varchar(20) NOT NULL,
  `ID_Penjual` varchar(20) NOT NULL,
  `Kode_produk` varchar(20) NOT NULL,
  `expired` varchar(20) DEFAULT NULL,
  `harga` decimal(20,0) DEFAULT NULL,
  PRIMARY KEY (`ID_Transaksi`),
  KEY `ID_Penjual` (`ID_Penjual`),
  KEY `Kode_produk` (`Kode_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_Transaksi`, `ID_Penjual`, `Kode_produk`, `expired`, `harga`) VALUES
('00000001', '593111', '123456', '180820', 98000),
('00000002', '734682', '455638', '180820', 98000),
('00000003', '454213', '897544', '180820', 98000),
('00000004', '234825', '988234', '180820', 98000),
('00000005', '334927', '203975', '180820', 98000),
('00000006', '386332', '209374', '180820', 98000);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE IF NOT EXISTS `warna` (
  `kode_warna` varchar(20) NOT NULL,
  `warna` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kode_warna`)
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
