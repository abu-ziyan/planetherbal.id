-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 12:52 AM
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
-- Database: `planetherbal_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `kd_artikel` varchar(255) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `kategori_artikel` varchar(255) NOT NULL,
  `thumbnail_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `tanggal_artikel` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`kd_artikel`, `judul_artikel`, `kategori_artikel`, `thumbnail_artikel`, `isi_artikel`, `tanggal_artikel`) VALUES
('art-250418-1aba61a9ff', 'Testing aja', 'Kategori Kedua', 'picthumb-250418-6b8fd38c84.jpg', '<p><strong>bismillah</strong></p>\r\n', '2025-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `kd_kategori_artikel` varchar(255) NOT NULL,
  `nm_kategori_artikel` varchar(255) NOT NULL,
  `gambar_kategori_artikel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`kd_kategori_artikel`, `nm_kategori_artikel`, `gambar_kategori_artikel`) VALUES
('kdart-250418-4079056d09', 'Kategori Kedua', 'picart-250418-0577d70464.jpg'),
('kdart-250418-91d5c54a21', 'Kategori Pertama', 'picart-250418-e58ac8b0b0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `kd_kategori_produk` varchar(255) NOT NULL,
  `nm_kategori_produk` varchar(255) NOT NULL,
  `gambar_kategori_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`kd_kategori_produk`, `nm_kategori_produk`, `gambar_kategori_produk`) VALUES
('kdpro-250418-adfac45291', 'Kategori Pertama', 'picpro-250418-ecd97f1bb0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `no_pengguna` int(11) NOT NULL,
  `id_pengguna` varchar(255) NOT NULL,
  `sandi_pengguna` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`no_pengguna`, `id_pengguna`, `sandi_pengguna`) VALUES
(1, 'planetherbal.id', 'f63c5560bf06d4aa6775c01f45ee98e813aa29a9');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` varchar(255) NOT NULL,
  `nm_produk` varchar(255) NOT NULL,
  `kategori_produk` varchar(255) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `harga_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `petunjuk_produk` text NOT NULL,
  `tanggal_produk` date NOT NULL,
  `link_tokped` text NOT NULL,
  `link_shopee` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `nm_produk`, `kategori_produk`, `gambar_produk`, `harga_produk`, `deskripsi_produk`, `petunjuk_produk`, `tanggal_produk`, `link_tokped`, `link_shopee`) VALUES
('pro-250418-21362639d9', 'safgsdg', 'Kategori Pertama', 'imgpro-250418-9cd19b1bbf.jpg', 'Rp 50.000,-', '<p>jasddf&#39;as;LDKgkalfmval&#39;vma&#39;s;&#39;sdklaskfjad;gjsld</p>\r\n', 'sjafngk;asmfkl;gk\'adfskg;\"LASs', '2025-04-18', 'kldsnmgm;kdaskfgk\'', 'sdlkmg;lfadm\';;a;\'gk\'df;');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`no_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `no_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
