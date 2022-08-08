-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 10:50 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'nurrajma suryanti', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_obat`
--

CREATE TABLE `data_obat` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `tgl_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_obat`
--

INSERT INTO `data_obat` (`id`, `nama`, `satuan`, `tgl_expired`) VALUES
(2, 'paracetamol', 'tablet', '2022-12-15'),
(4, 'Albendazol Tab ', 'tablet', '2022-12-28'),
(5, 'Aminofilin tablet 200 mg', 'Ampul ', '2022-12-19'),
(6, 'Albendazol syrup ', 'botol ', '2022-11-10'),
(7, 'Acyclovir Krim 5%', 'tube', '2022-12-15'),
(8, 'Amoksisillin 1gr injeksi', 'kapsul', '2022-11-20'),
(9, 'Antalgin injeksi 250 mg/ml -2 ml', 'tablet', '2022-12-01'),
(10, 'Asam Traneksamat inj 100mg/ml', 'ampul', '2022-12-04'),
(11, 'Atenolol 100 mg (betablok)', 'tablet', '2022-11-19'),
(12, 'Amoksisillin kaplet 500 mg', 'botol 60 ml', '2022-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `obat_keluar`
--

CREATE TABLE `obat_keluar` (
  `id` int(5) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `tgl_obat_keluar` date NOT NULL,
  `stok_keluar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat_keluar`
--

INSERT INTO `obat_keluar` (`id`, `id_obat`, `tgl_obat_keluar`, `stok_keluar`) VALUES
(1, 0, '2022-06-08', 15),
(2, 2, '2022-06-06', 30),
(3, 4, '2022-04-04', 200),
(4, 5, '2022-07-04', 30),
(5, 6, '2022-04-07', 20),
(6, 7, '2022-05-02', 100);

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk`
--

CREATE TABLE `obat_masuk` (
  `id` int(5) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `tgl_obat_masuk` date NOT NULL,
  `stok_masuk` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat_masuk`
--

INSERT INTO `obat_masuk` (`id`, `id_obat`, `tgl_obat_masuk`, `stok_masuk`) VALUES
(6, 2, '2022-01-01', 100),
(7, 4, '2021-12-30', 100),
(9, 5, '2022-01-03', 150),
(10, 6, '2022-01-03', 100),
(11, 7, '2022-01-03', 100);

-- --------------------------------------------------------

--
-- Table structure for table `stok_obat`
--

CREATE TABLE `stok_obat` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_obat`
--

INSERT INTO `stok_obat` (`id`, `id_obat`, `stok`) VALUES
(1, 4, 130),
(3, 2, 170),
(4, 5, 70),
(5, 6, 80),
(6, 7, 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_obat`
--
ALTER TABLE `stok_obat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_obat`
--
ALTER TABLE `data_obat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stok_obat`
--
ALTER TABLE `stok_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
