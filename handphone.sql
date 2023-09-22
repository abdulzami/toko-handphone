-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 07:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_barangmasuk`
--

CREATE TABLE `tabel_barangmasuk` (
  `id` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_hp` varchar(10) DEFAULT NULL,
  `id_supplier` int(10) DEFAULT NULL,
  `jumlah` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_barangmasuk`
--

INSERT INTO `tabel_barangmasuk` (`id`, `tanggal`, `id_hp`, `id_supplier`, `jumlah`) VALUES
(14, '2017-12-11', '7', 3, 10),
(15, '2017-12-11', '12', 3, 10),
(16, '2017-12-11', '12', 3, 10),
(17, '2017-12-11', '12', 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_handphone`
--

CREATE TABLE `tabel_handphone` (
  `id` int(10) NOT NULL,
  `merk_hp` varchar(200) DEFAULT NULL,
  `tipe_hp` varchar(200) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_handphone`
--

INSERT INTO `tabel_handphone` (`id`, `merk_hp`, `tipe_hp`, `harga`, `stok`, `gambar`) VALUES
(8, 'Iphone', '6S', 6500000, 0, 'iphone6s-gold-select-2015.jpg'),
(9, 'Samsung', 'J7', 1900000, 0, 'harga-samsung-galaxy-j7-2.jpg'),
(10, 'Samsung', 'J5', 1000000, 0, 'harga-samsung-galaxy-j7-2.jpg'),
(11, 'Samsung', 'Bajakan', 2000000, 0, 'sven vs jugg.jpg'),
(12, 'Iphone', '7', 12000000, 22, 'iphone7-jetblack-select-2016.png'),
(13, 'Iphone', 'Bajakan', 3000000, 0, 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_login`
--

CREATE TABLE `tabel_login` (
  `id` int(10) NOT NULL,
  `uname` varchar(200) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `level` varchar(200) DEFAULT NULL,
  `id_pegatpem` int(10) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_login`
--

INSERT INTO `tabel_login` (`id`, `uname`, `pass`, `foto`, `level`, `id_pegatpem`, `status`) VALUES
(1, 'doel', 'pembeli', 'thumb_477210.jpg', 'pembeli', 2, 'aktif'),
(14, 'abdul', 'admin', 'thumb_477210.jpg', 'admin', 8, 'aktif'),
(15, 'adam', 'kasir', 'thumb_477210.jpg', 'kasir', 7, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pegawai`
--

CREATE TABLE `tabel_pegawai` (
  `id` int(10) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jenis_kelamin` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telepon` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pegawai`
--

INSERT INTO `tabel_pegawai` (`id`, `nama`, `jenis_kelamin`, `alamat`, `no_telepon`) VALUES
(6, 'zami', 'laki-laki', 'gresik', '081231238535'),
(7, 'adam', 'laki-laki', 'gresik', '081331722530'),
(8, 'abdul', 'laki-laki', 'gresik', '081212121212'),
(9, 'rian', 'laki-laki', 'gresik ', '091231238593');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembeli`
--

CREATE TABLE `tabel_pembeli` (
  `id` int(10) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jenis_kelamin` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telepon` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pembeli`
--

INSERT INTO `tabel_pembeli` (`id`, `nama`, `jenis_kelamin`, `alamat`, `no_telepon`) VALUES
(2, 'Zamiads', 'laki-laki', 'mamadam232', '67'),
(3, 'zsdaf', 'laki-laki', 'gresik', '1299'),
(4, 'kaka', 'laki-laki', 'gresik', '100'),
(5, 'cgh', 'vdf', 'dfd', '23');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_supplier`
--

CREATE TABLE `tabel_supplier` (
  `id` int(10) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telepon` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_supplier`
--

INSERT INTO `tabel_supplier` (`id`, `nama`, `alamat`, `no_telepon`) VALUES
(2, 'PT. Samsung Bajakan Indonesia', 'JL. Bajaklaut No.9999', '081231238535'),
(3, 'PT. Apple Bajakan Indonesia', 'JL.Bajakan Kembar 09', '081111111177');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pembeli` varchar(10) DEFAULT NULL,
  `id_hp` varchar(10) DEFAULT NULL,
  `jumlah` int(15) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id`, `tanggal`, `id_pembeli`, `id_hp`, `jumlah`, `status`) VALUES
(27, '2017-12-11', '3', '7', 1, 'sudahdibayar'),
(28, '2017-12-11', '4', '7', 1, 'sudahdibayar'),
(30, '2017-12-11', '2', '12', 2, 'sudahdibayar'),
(31, '2017-12-11', '2', '12', 5, 'sudahdibayar'),
(32, '2018-04-07', '2', '12', 3, 'belumdibayar'),
(33, '2018-04-07', '2', '12', 20, 'belumdibayar'),
(34, '2019-03-21', '2', '12', 10, 'belumdibayar'),
(35, '2019-04-01', '2', '12', 1, 'sudahdibayar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_barangmasuk`
--
ALTER TABLE `tabel_barangmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_handphone`
--
ALTER TABLE `tabel_handphone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_login`
--
ALTER TABLE `tabel_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_pembeli`
--
ALTER TABLE `tabel_pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_supplier`
--
ALTER TABLE `tabel_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_barangmasuk`
--
ALTER TABLE `tabel_barangmasuk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tabel_handphone`
--
ALTER TABLE `tabel_handphone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_login`
--
ALTER TABLE `tabel_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_pembeli`
--
ALTER TABLE `tabel_pembeli`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_supplier`
--
ALTER TABLE `tabel_supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
