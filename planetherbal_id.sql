-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 07:27 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `banner_beranda`
--

CREATE TABLE `banner_beranda` (
  `kd_banner_beranda` varchar(255) NOT NULL,
  `gambar_banner_beranda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `kd_kategori_artikel` varchar(255) NOT NULL,
  `nm_kategori_artikel` varchar(255) NOT NULL,
  `gambar_kategori_artikel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('kdpro-250419-34ed3f0e1d', 'Kode Produk Pertama', 'picpro-250419-2504a8fdff.jpg'),
('kdpro-250419-0f257e4705', 'Kode Produk Kedua', 'picpro-250419-54549270b8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `kd_keyword` varchar(255) NOT NULL,
  `nm_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `kd_logo` varchar(255) NOT NULL,
  `gambar_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('pro-250419-491ecc3749', 'Panadol Herbal', 'Kode Produk Kedua', 'imgpro-250419-ad1bceec98.png', '100.000', '<p><em><strong>Emang ada panadol herbal? Sok tau. Kan cuma contoh doang wkwkwkwkk</strong></em></p>\r\n', 'Gausah diminum. Toh cuma contoh doang. Mana ada panadol Herbal wkwkwkwkwk', '2025-04-19', 'tokopedia.com', 'shopee.com');

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
