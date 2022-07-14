-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 10:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_admin` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `tgl_lahir`, `alamat_admin`, `no_hp`) VALUES
(1, 'admin1', '2001-07-06', 'Majalengka', '083823702022');

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

CREATE TABLE `bukti` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `foto_bukti` varchar(100) NOT NULL,
  `bukti_selesai` varchar(100) NOT NULL,
  `kategori` varchar(11) NOT NULL,
  `url_web` varchar(100) NOT NULL,
  `manual_book` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukti`
--

INSERT INTO `bukti` (`id`, `id_pelanggan`, `nama_lengkap`, `no_rek`, `foto_bukti`, `bukti_selesai`, `kategori`, `url_web`, `manual_book`, `status`) VALUES
(3, 'PLG2', 'clariza yudith', '1010101001', '@molliecioso (3).png', '', 'Non IT', '', '', 'Produk Sampai'),
(8, 'PLG1', 'dina aulia', '12345', '2.jpg', 'esa.jpeg', 'IT', 'hsgdjgsdjhsd', '06. Panduan Praktikum PAM-M6.pdf', 'Selesai'),
(9, 'PLG3', 'Nida Hanifah', '12345', 'c99436d3-b2a8-4bcb-8735-36853f7741f0.jfif', '', 'IT', 'htwiueyw', '06. Panduan Praktikum PAM-M6.pdf', 'Revisi'),
(10, 'PLG1', 'dina aulia', '1010101001', 'esa.jpeg', 'esa.jpeg', 'Non IT', 'hsgdjgsdjhsd', '06. Panduan Praktikum PAM-M6.pdf', 'Produk Sampai'),
(11, 'PLG1', 'dina aulia', '12345', 'esa.jpeg', '', 'IT', 'hsgdjgsdjhsd', '06. Panduan Praktikum PAM-M6.pdf', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `direktur`
--

CREATE TABLE `direktur` (
  `id_direktur` int(11) NOT NULL,
  `nama_direktur` varchar(50) NOT NULL,
  `alamat_direktur` varchar(100) NOT NULL,
  `nohp_direktur` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `pelanggan_id` varchar(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `due` date NOT NULL,
  `price` varchar(12) NOT NULL,
  `qty` varchar(5) NOT NULL,
  `kategori` enum('IT','Non IT') NOT NULL,
  `produk` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `ekspedisi` varchar(11) NOT NULL,
  `jenis_sistem` varchar(15) NOT NULL,
  `desk_sistem` text NOT NULL,
  `uang_muka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `no_invoice`, `pelanggan_id`, `nama_pelanggan`, `date`, `due`, `price`, `qty`, `kategori`, `produk`, `total`, `ekspedisi`, `jenis_sistem`, `desk_sistem`, `uang_muka`) VALUES
(118, 'INV1', 'PLG1', 'dina aulia', '2022-07-04', '2022-07-11', '20000', '3', 'Non IT', 'Celana', 60000, '', '', '', 0),
(119, 'INV1', 'PLG1', 'dina aulia', '2022-07-04', '2022-07-11', '25000', '2', 'Non IT', 'Piring', 50000, '', '', '', 0),
(162, 'INV16', 'PLG4', 'Anisa Purnamasari', '2022-07-14', '2022-07-21', '35000', '1', 'Non IT', 'Celana', 35000, 'COD', '', '', 0),
(163, 'INV16', 'PLG4', 'Anisa Purnamasari', '2022-07-14', '2022-07-21', '30000', '1', 'Non IT', 'Piring', 30000, 'COD', '', '', 0),
(164, 'INV17', 'PLG3', 'Nida Hanifah', '2022-07-14', '2022-07-21', '20000', '1', 'Non IT', 'Piring', 20000, 'COD', '', '', 0),
(165, 'INV17', 'PLG3', 'Nida Hanifah', '2022-07-14', '2022-07-21', '20000', '1', 'Non IT', 'Celana', 20000, 'COD', '', '', 0),
(166, 'INV18', 'PLG2', 'clariza yudith', '2022-07-14', '2022-07-21', '22000000', '1', 'IT', '', 22000000, '', 'website', 'pembuatan website ecommerce', 6000000);

--
-- Triggers `invoice`
--
DELIMITER $$
CREATE TRIGGER `stok` AFTER INSERT ON `invoice` FOR EACH ROW UPDATE produklayanan SET satuan = satuan-NEW.qty WHERE produk = produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` enum('admin','pelanggan','direktur','supplier') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `id_pelanggan`, `username`, `password`, `nama`, `alamat`, `nomor_hp`, `nama_perusahaan`, `alamat_perusahaan`, `jabatan`, `email`, `level`) VALUES
(1, '8', 'admin', 'admin', '', '', '', '', '', '', '', 'admin'),
(5, '2', 'direktur', 'direktur', '', '', '', '', '', '', '', 'direktur'),
(46, 'PLG1', 'pelanggan', 'pelanggan', 'dina aulia', 'majalengka', '085624485091', '', '', '', '', 'pelanggan'),
(47, 'PLG2', 'pelanggan2', 'pelanggan2', 'clariza yudith', 'pagaden', '085793965160', '', '', '', '', 'pelanggan'),
(48, 'PLG3', 'pelanggan3', 'pelanggan3', 'Nida Hanifah', 'Pamanukan', '085871501760', '', '', '', '', 'pelanggan'),
(49, 'PLG4', 'pelanggan4', 'pelanggan4', 'Anisa Purnamasari', 'Garut', '083823702022', '', '', '', '', 'pelanggan'),
(52, 'PLG5', 'pelanggan5', 'pelanggan5', 'Ulfah', 'Pagaden', '08817846833', '', '', '', '', 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `pelanggan_id` varchar(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `pelanggan_id`, `nama_pelanggan`, `alamat_pelanggan`, `no_hp`, `nama_perusahaan`, `alamat_perusahaan`, `jabatan`) VALUES
(26, 'PPP1', 'Dina Aulia', 'majalengka', '085624485091', '', '', ''),
(27, 'PPP2', 'Nidahanifah', 'pamanukan', '089763542672', '', '', ''),
(28, 'PPP3', 'Clariza', 'Pagaden Subang', '083823702022', '', '', ''),
(29, 'PPP4', 'Caca', 'Walahar', '085263789254', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `id_supplier` varchar(11) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id`, `id_produk`, `id_supplier`, `produk`, `jumlah`, `status`) VALUES
(12, '19', 'SUP3', 'Piring', 12, 'Tervalidasi'),
(13, '17', 'SUP2', 'Kaos', 2, 'Tervalidasi'),
(14, '18', 'SUP2', 'Celana', 2, 'Tervalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `produklayanan`
--

CREATE TABLE `produklayanan` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `kategori` enum('IT','Non IT') NOT NULL,
  `produk` varchar(100) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga_dasar` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `file_desk` varchar(100) NOT NULL,
  `validasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produklayanan`
--

INSERT INTO `produklayanan` (`id`, `id_produk`, `id_supplier`, `kategori`, `produk`, `satuan`, `harga_dasar`, `harga_jual`, `file_desk`, `validasi`) VALUES
(2, '18', 'SUP2', 'Non IT', 'Celana', '-51', 60000, 65000, '06. Panduan Praktikum PAM-M6.pdf', 'Tervalidasi'),
(6, '19', 'SUP3', 'Non IT', 'Piring', '47', 30000, 34000, '06. Panduan Praktikum PAM-M6.pdf', 'Tervalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `produk_sup`
--

CREATE TABLE `produk_sup` (
  `id_produk` int(11) NOT NULL,
  `id_supplier` varchar(11) NOT NULL,
  `kategori` varchar(6) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `satuan` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_sup`
--

INSERT INTO `produk_sup` (`id_produk`, `id_supplier`, `kategori`, `produk`, `satuan`, `harga_jual`, `status`) VALUES
(17, 'SUP2', 'Non IT', 'Kaos', 95, 32000, ''),
(18, 'SUP2', 'Non IT', 'Celana', 98, 32000, ''),
(19, 'SUP3', 'Non IT', 'Piring', 88, 20000, '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `username`, `password`, `nama_perusahaan`, `alamat_perusahaan`, `nomor_hp`, `email`, `level`) VALUES
('SUP1', '', '', '', '', '', '', ''),
('SUP2', 'sup2', 'sup2', 'Toko Amanah', 'Subang', '083823702022', 'sup2@gmail.com', 'supplier'),
('SUP3', 'sup3', 'sup3', 'Toko Budi', 'Subang', '085793965160', 'sup3@gmail.com', 'supplier'),
('SUP4', 'sup4', 'sup4', 'Kartajaya', 'Subang', '085624485091', 'kartajaya@gmail.com', 'supplier'),
('SUP5', 'sup5', 'sup5', 'Toko Yeti', 'Pagaden Subang', '085624485091', 'sup5@gmail.com', 'supplier');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `desk_transaksi` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direktur`
--
ALTER TABLE `direktur`
  ADD PRIMARY KEY (`id_direktur`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pelanggan_2` (`id_pelanggan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produklayanan`
--
ALTER TABLE `produklayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_sup`
--
ALTER TABLE `produk_sup`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`,`id_produk`,`id_invoice`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `direktur`
--
ALTER TABLE `direktur`
  MODIFY `id_direktur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produklayanan`
--
ALTER TABLE `produklayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk_sup`
--
ALTER TABLE `produk_sup`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
