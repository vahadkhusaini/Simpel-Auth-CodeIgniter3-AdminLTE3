-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2020 at 04:53 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pembelian`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(6) NOT NULL,
  `nama_akun` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_akun`) VALUES
('110', 'Kas'),
('410', 'Pembelian'),
('610', 'PPN Masukan'),
('502', 'Retur'),
('211', 'Utang Dagang');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barcode`, `nama_barang`, `id_kategori`, `id_supplier`, `satuan`, `stok`, `harga_beli`) VALUES
('BRG0004', '903339100012222', 'Indomie Goreng', 'KTG0001', 'SPL0001', 'pcs', 12, 2000),
('BRG0005', '9033391000122900', 'Indomie Sambal', 'KTG0001', 'SPL0001', 'pcs', 200, 2000),
('BRG0006', '3901292933129009', 'Sedaap Goreng 65gr', 'KTG0001', 'SPL0003', 'pcs', 496, 2000),
('BRG0007', '3388919384740003', 'Isoplus 350ml', 'KTG0002', 'SPL0003', 'pcs', 155, 5000),
('BRG0008', '903339100012900', 'Sarimi Ayam Bawang', 'KTG0001', 'SPL0001', 'pcs', 212, 1900),
('BRG0009', '9033391000122', 'Supermie Ayam Bawang', 'KTG0001', 'SPL0001', 'pcs', 544, 2100),
('BRG0010', '903339100012222455', 'Supermie Sop Buntut', 'KTG0001', 'SPL0001', 'pcs', 196, 2100),
('BRG0011', '903339100023444', 'Supermie Soto', 'KTG0001', 'SPL0001', 'pcs', 258, 2000),
('BRG0012', '800099003394920999', 'Coca Cola original 350ml', 'KTG0002', 'SPL0004', 'pcs', 141, 4000),
('BRG0013', '29100948399989899', 'Fanta pet 350ml', 'KTG0002', 'SPL0004', 'pcs', 69, 4000),
('BRG0014', '92093993909039988', 'Coca Cola original 1 L', 'KTG0002', 'SPL0004', 'pcs', 66, 12000),
('BRG0015', '898745000009900', 'Sprite 1L', 'KTG0002', 'SPL0004', 'pcs', 38, 12000),
('BRG0016', '9033391000120009', 'Minute maid orange 350ml', 'KTG0002', 'SPL0004', 'pcs', 164, 8000),
('BRG0017', '8509420399900', 'Sprite 350 ml', 'KTG0002', 'SPL0004', 'pcs', 172, 4500),
('BRG0018', '84900009000', 'Minute maid aloevera 350ml', 'KTG0002', 'SPL0004', 'pcs', 83, 8000),
('BRG0019', '84035848504099333', 'Minute maid apple 350ml', 'KTG0002', 'SPL0004', 'pcs', 345, 10000),
('BRG0020', '90333910001224444', 'Minute maid honey 350ml', 'KTG0002', 'SPL0004', 'pcs', 105, 8000),
('BRG0021', '90333919001', 'Indomie Hype pedas abis', 'KTG0001', 'SPL0001', 'pcs', 144, 2200),
('BRG0022', '78399338999', 'Indomie Goreng Aceh', 'KTG0001', 'SPL0001', 'pcs', 63, 2000),
('BRG0023', '4488458943854859', 'Indomie Goreng Ayam Telur', 'KTG0001', 'SPL0001', 'pcs', 0, 2100);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_detail`
--

CREATE TABLE `jurnal_detail` (
  `id` int(11) NOT NULL,
  `id_jurnal` varchar(25) NOT NULL,
  `id_akun` varchar(6) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal_detail`
--

INSERT INTO `jurnal_detail` (`id`, `id_jurnal`, `id_akun`, `debet`, `kredit`) VALUES
(1, 'JUPB200718102749', '410', 782000, 0),
(2, 'JUPB200718102749', '610', 78200, 0),
(3, 'JUPB200718102749', '211', 0, 860200),
(4, 'JUPB200718103000', '410', 1250000, 0),
(5, 'JUPB200718103000', '610', 125000, 0),
(6, 'JUPB200718103000', '211', 0, 1375000),
(7, 'JUPB200718103029', '410', 570000, 0),
(8, 'JUPB200718103029', '610', 57000, 0),
(9, 'JUPB200718103029', '211', 0, 627000),
(10, 'JUPB200718181131', '410', 800000, 0),
(11, 'JUPB200718181131', '610', 80000, 0),
(12, 'JUPB200718181131', '110', 0, 880000),
(13, 'JUPB200718181155', '410', 240000, 0),
(14, 'JUPB200718181155', '610', 24000, 0),
(15, 'JUPB200718181155', '110', 0, 264000),
(16, 'JUPB200721052206', '410', 90000, 0),
(17, 'JUPB200721052206', '610', 9000, 0),
(18, 'JUPB200721052206', '110', 0, 99000),
(19, 'JUPB200721105902', '410', 560000, 0),
(20, 'JUPB200721105902', '610', 56000, 0),
(21, 'JUPB200721105902', '211', 0, 616000),
(22, 'JUPB200721110346', '410', 702400, 0),
(23, 'JUPB200721110346', '610', 70240, 0),
(24, 'JUPB200721110346', '211', 0, 772640),
(25, 'JUPB200721113931', '410', 400000, 0),
(26, 'JUPB200721113931', '610', 40000, 0),
(27, 'JUPB200721113931', '110', 0, 440000),
(28, 'JUPB200721114626', '110', 0, 440000),
(29, 'JUPB200721114626', '410', 400000, 0),
(30, 'JUPB200721114626', '610', 40000, 0),
(31, 'JUPB200812020244', '211', 0, 2200000),
(32, 'JUPB200812020244', '610', 200000, 0),
(33, 'JUPB200812020244', '410', 2000000, 0),
(34, 'JUPB200812031147', '110', 0, 2200000),
(35, 'JUPB200812031147', '211', 2200000, 0),
(36, 'JUPB200812031456', '502', 0, 24750),
(37, 'JUPB200812031456', '110', 0, 2175250),
(38, 'JUPB200812031456', '211', 2200000, 0),
(39, 'JUPB200812162726', '211', 0, 546700),
(40, 'JUPB200812162726', '610', 49700, 0),
(41, 'JUPB200812162726', '410', 497000, 0),
(42, 'JUPB200812162815', '110', 0, 546700),
(43, 'JUPB200812162815', '211', 546700, 0),
(44, 'JUPB200812182044', '211', 0, 1350000),
(45, 'JUPB200812182044', '610', 125000, 0),
(46, 'JUPB200812182044', '410', 1225000, 0),
(47, 'JUPB200812182117', '110', 0, 1350000),
(48, 'JUPB200812182117', '211', 1350000, 0),
(49, 'JUPB200819084559', '211', 0, 633600),
(50, 'JUPB200819084559', '610', 57600, 0),
(51, 'JUPB200819084559', '410', 576000, 0),
(52, 'JUPB200819100508', '211', 0, 154319),
(53, 'JUPB200819100508', '610', 14029, 0),
(54, 'JUPB200819100508', '410', 140290, 0),
(55, 'JUPB200819101508', '110', 0, 308220),
(56, 'JUPB200819101508', '610', 28020, 0),
(57, 'JUPB200819101508', '410', 280200, 0),
(58, 'JUPB200824193352', '211', 0, 341000),
(59, 'JUPB200824193352', '610', 31000, 0),
(60, 'JUPB200824193352', '410', 310000, 0),
(61, 'JUPB200824210628', '211', 0, 125400),
(62, 'JUPB200824210628', '610', 11400, 0),
(63, 'JUPB200824210628', '410', 114000, 0),
(64, 'JUPB200901084219', '211', 0, 216480),
(65, 'JUPB200901084219', '610', 19680, 0),
(66, 'JUPB200901084219', '410', 196800, 0),
(67, 'JUPB200901091136', '110', 0, 216480),
(68, 'JUPB200901091136', '211', 216480, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_header`
--

CREATE TABLE `jurnal_header` (
  `id_jurnal` varchar(25) NOT NULL,
  `id_pembelian` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal_header`
--

INSERT INTO `jurnal_header` (`id_jurnal`, `id_pembelian`, `tanggal`, `keterangan`) VALUES
('JUPB200718102749', 'PB200718200001', '2020-07-18', 'Pembelian dari PT Coca Cola Indonesia CC802909'),
('JUPB200718103000', 'PB200718510002', '2020-07-18', 'Pembelian dari PT Indomarco IDM2211233'),
('JUPB200718103029', 'PB200718020003', '2020-07-18', 'Pembelian dari Wings WG800290999'),
('JUPB200718181131', 'PB200718040003', '2020-07-18', 'Pembelian dari PT Adiputa Abadi 899009PP'),
('JUPB200718181155', 'PB200718330003', '2020-07-18', 'Pembelian dari PT Enseval 3903900939933'),
('JUPB200721052206', 'PB200721350003', '2020-07-20', 'Pembelian dari PT San Prima Jaya 3432222333'),
('JUPB200721105902', 'PB200721240004', '2020-07-21', 'Pembelian dari PT Coca Cola Indonesia CC22139009'),
('JUPB200721110346', 'PB200721230004', '2020-07-21', 'Pembelian dari PT Indomarco IDM9022221'),
('JUPB200721113931', 'PB200721170004', '2020-07-21', 'Pembelian dari PT Enseval 87766677'),
('JUPB200721114626', 'PB200721120004', '2020-07-21', 'Pembelian dari Wings 899009PP12'),
('JUPB200812020244', 'PB2008120202130007', '2020-08-11', 'Pembelian dari PT Coca Cola Indonesia COCA90000'),
('JUPB200812031456', 'COCA90000', '2020-08-11', 'Pelunasan Untuk PT Coca Cola Indonesia COCA90000'),
('JUPB200812162726', 'PB2008121626560008', '2020-08-12', 'Pembelian dari PT Coca Cola Indonesia CC12081010'),
('JUPB200812162815', 'CC12081010', '2020-08-12', 'Pelunasan Untuk PT Coca Cola Indonesia CC12081010'),
('JUPB200812182044', 'PB2008121819490009', '2020-08-12', 'Pembelian dari PT Coca Cola Indonesia CCC9292900900'),
('JUPB200812182117', 'CCC9292900900', '2020-08-12', 'Pelunasan Untuk PT Coca Cola Indonesia CCC9292900900'),
('JUPB200819084559', 'PB2008190844530010', '2020-08-18', 'Pembelian dari Wings WG999999993'),
('JUPB200819100508', 'PB2008191002380011', '2020-08-19', 'Pembelian dari PT Coca Cola Indonesia CC223222222'),
('JUPB200819101508', 'PB2008191011110012', '2020-08-19', 'Pembelian dari PT Indomarco 12333232444242'),
('JUPB200824193352', 'PB2008241932300013', '2020-08-24', 'Pembelian dari PT Coca Cola Indonesia CCL3884993099'),
('JUPB200824210628', 'PB2008242105260014', '2020-08-24', 'Pembelian dari PT Indomarco IDM2124433'),
('JUPB200901084219', 'PB2009010840570015', '2020-09-01', 'Pembelian dari PT Coca Cola Indonesia 903993490CC'),
('JUPB200901091136', '903993490CC', '1970-01-01', 'Pelunasan Untuk PT Coca Cola Indonesia 903993490CC');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTG0001', 'Makanan'),
('KTG0002', 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan`
--

CREATE TABLE `pelunasan` (
  `id_pelunasan` varchar(50) NOT NULL,
  `no_nota` varchar(25) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `tanggal_pelunasan` date NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelunasan`
--

INSERT INTO `pelunasan` (`id_pelunasan`, `no_nota`, `id_supplier`, `tanggal_pelunasan`, `keterangan`, `jumlah_bayar`) VALUES
('BYR903993490CC', '903993490CC', 'SPL0004', '1970-01-01', 'Pelunasan Untuk PT Coca Cola Indonesia', 216480),
('BYRCC12081010', 'CC12081010', 'SPL0004', '2020-08-12', 'Pelunasan Untuk PT Coca Cola Indonesia', 546700),
('BYRCCC9292900900', 'CCC9292900900', 'SPL0004', '2020-08-12', 'Pelunasan Untuk PT Coca Cola Indonesia', 1350000),
('BYRCOCA90000', 'COCA90000', 'SPL0004', '2020-08-11', 'Pelunasan Untuk PT Coca Cola Indonesia', 2175250),
('BYRIMR903889', 'IMR903889', 'SPL0001', '2020-08-11', 'Pelunasan Untuk PT Indomarco', 602360),
('BYRWG800290999', 'WG800290999', 'SPL0003', '2020-07-18', 'Pelunasan Untuk Wings', 599500);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_pembelian` varchar(20) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan_beli` varchar(10) NOT NULL,
  `ppn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_pembelian`, `id_barang`, `harga_beli`, `jumlah`, `satuan_beli`, `ppn`) VALUES
('PB200718200001', 'BRG0020', 8000, 23, '', 18400),
('PB200718200001', 'BRG0019', 10000, 23, '', 23000),
('PB200718200001', 'BRG0018', 8000, 23, '', 18400),
('PB200718200001', 'BRG0016', 8000, 23, '', 18400),
('PB200718510002', 'BRG0011', 2000, 100, '', 20000),
('PB200718510002', 'BRG0010', 2100, 100, '', 21000),
('PB200718510002', 'BRG0009', 2100, 400, '', 84000),
('PB200718020003', 'BRG0007', 5000, 34, '', 17000),
('PB200718020003', 'BRG0006', 2000, 200, '', 40000),
('PB200718040003', 'BRG0016', 8000, 100, '', 80000),
('PB200718330003', 'BRG0015', 12000, 20, '', 24000),
('PB200721350003', 'BRG0017', 4500, 20, '', 9000),
('PB200721240004', 'BRG0020', 8000, 20, '', 16000),
('PB200721240004', 'BRG0019', 10000, 40, '', 40000),
('PB200721230004', 'BRG0011', 2000, 10, '', 2000),
('PB200721230004', 'BRG0010', 2100, 48, '', 10080),
('PB200721230004', 'BRG0009', 2100, 96, '', 20160),
('PB200721230004', 'BRG0008', 1900, 200, '', 38000),
('PB200721170004', 'BRG0012', 4000, 100, '', 40000),
('PB200721120004', 'BRG0006', 2000, 200, '', 40000),
('PB2007241145540004', 'BRG0017', 4500, 23, '', 10350),
('PB2007241145540004', 'BRG0019', 10000, 34, '', 34000),
('PB2008120152130005', 'BRG0022', 2000, 23, '', 4600),
('PB2008120152130005', 'BRG0021', 2200, 48, '', 10560),
('PB2008120152130005', 'BRG0005', 2000, 200, '', 40000),
('PB2008120155220006', 'BRG0011', 2000, 100, '', 20000),
('PB2008120202130007', 'BRG0019', 10000, 200, '', 200000),
('PB2008121626560008', 'BRG0020', 8000, 22, '', 17600),
('PB2008121626560008', 'BRG0018', 8000, 12, '', 9600),
('PB2008121626560008', 'BRG0017', 4500, 50, '', 22500),
('PB2008121819490009', 'BRG0020', 8000, 50, '', 40000),
('PB2008121819490009', 'BRG0017', 4500, 50, '', 22500),
('PB2008121819490009', 'BRG0014', 12000, 50, '', 62500),
('PB2008190844530010', 'BRG0006', 2000, 48, '', 9600),
('PB2008190844530010', 'BRG0007', 5000, 96, '', 48000),
('PB2008191002380011', 'BRG0016', 45000, 1, 'dus', 4500),
('PB2008191002380011', 'BRG0012', 52000, 1, 'dus', 5200),
('PB2008191002380011', 'BRG0013', 43290, 1, 'dus', 4329),
('PB2008191011110012', 'BRG0022', 2100, 42, 'pcs', 8820),
('PB2008191011110012', 'BRG0021', 2000, 96, 'pcs', 19200),
('PB2008241932300013', 'BRG0012', 3500, 20, 'pcs', 7000),
('PB2008241932300013', 'BRG0013', 5000, 48, 'pcs', 24000),
('PB2008242105260014', 'BRG0004', 7500, 12, 'pcs', 9000),
('PB2008242105260014', 'BRG0008', 2000, 12, 'pcs', 2400),
('PB2009010840570015', 'BRG0018', 2000, 48, 'pcs', 9600),
('PB2009010840570015', 'BRG0019', 2100, 48, 'pcs', 10080);

--
-- Triggers `pembelian_detail`
--
DELIMITER $$
CREATE TRIGGER `stok_masuk` AFTER INSERT ON `pembelian_detail` FOR EACH ROW BEGIN
		UPDATE barang SET stok = stok+NEW.jumlah
        WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_header`
--

CREATE TABLE `pembelian_header` (
  `id_pembelian` varchar(20) NOT NULL,
  `id_pemesanan` varchar(20) NOT NULL,
  `no_nota` varchar(25) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `jenis_pembelian` enum('T','K') NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_jth_tempo` date NOT NULL,
  `status` enum('belum lunas','lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_header`
--

INSERT INTO `pembelian_header` (`id_pembelian`, `id_pemesanan`, `no_nota`, `id_supplier`, `keterangan`, `jenis_pembelian`, `tanggal_pembelian`, `tanggal_jth_tempo`, `status`) VALUES
('PB200718020003', 'PO200718550002', 'WG800290999', 'SPL0003', 'Pembelian dari Wings', 'K', '2020-07-18', '2020-01-08', 'belum lunas'),
('PB200718040003', 'PO200718130003', '899009PP', 'SPL0007', 'Pembelian dari PT Adiputa Abadi', 'T', '2020-07-18', '1970-01-01', 'lunas'),
('PB200718200001', 'PO200718450001', 'CC802909', 'SPL0004', 'Pembelian dari PT Coca Cola Indonesia', 'K', '2020-07-18', '2020-02-08', 'belum lunas'),
('PB200718330003', 'PO200718480003', '3903900939933', 'SPL0005', 'Pembelian dari PT Enseval', 'T', '2020-07-18', '1970-01-01', 'lunas'),
('PB200718510002', 'PO200718110003', 'IDM2211233', 'SPL0001', 'Pembelian dari PT Indomarco', 'K', '2020-07-18', '2020-02-08', 'belum lunas'),
('PB200721120004', 'PO200721420005', '899009PP12', 'SPL0003', 'Pembelian dari Wings', 'T', '2020-07-21', '1970-01-01', 'lunas'),
('PB200721170004', 'PO200721250005', '87766677', 'SPL0005', 'Pembelian dari PT Enseval', 'T', '2020-07-21', '1970-01-01', 'lunas'),
('PB200721230004', 'PO200721220005', 'IDM9022221', 'SPL0001', 'Pembelian dari PT Indomarco', 'K', '2020-07-21', '2020-04-08', 'belum lunas'),
('PB200721240004', 'PO200721350004', 'CC22139009', 'SPL0004', 'Pembelian dari PT Coca Cola Indonesia', 'K', '2020-07-21', '2020-04-08', 'belum lunas'),
('PB200721350003', 'PO200721290003', '3432222333', 'SPL0006', 'Pembelian dari PT San Prima Jaya', 'T', '2020-07-20', '1970-01-01', 'lunas'),
('PB2007241145540004', 'PO200718200003', 'TRJTI0000', 'SPL0002', 'Pembelian dari PT Trijaya', 'K', '2020-07-24', '1970-01-01', 'belum lunas'),
('PB2008120152130005', 'PO200812550006', 'IMR903889', 'SPL0001', 'Pembelian dari PT Indomarco', 'K', '2020-08-11', '2020-10-09', 'belum lunas'),
('PB2008120155220006', 'PO200812230007', 'SPJ20222900', 'SPL0006', 'Pembelian dari PT San Prima Jaya', 'K', '2020-08-11', '1970-01-01', 'belum lunas'),
('PB2008120202130007', 'PO200812130007', 'COCA90000', 'SPL0004', 'Pembelian dari PT Coca Cola Indonesia', 'K', '2020-08-11', '1970-01-01', 'belum lunas'),
('PB2008121626560008', 'PO200812520007', 'CC12081010', 'SPL0004', 'Pembelian dari PT Coca Cola Indonesia', 'K', '2020-08-12', '2020-04-09', 'belum lunas'),
('PB2008121819490009', 'PO200812400007', 'CCC9292900900', 'SPL0004', 'Pembelian dari PT Coca Cola Indonesia', 'K', '2020-08-12', '2020-11-09', 'belum lunas'),
('PB2008190844530010', 'PO200819390008', 'WG999999993', 'SPL0003', 'Pembelian dari Wings', 'K', '2020-08-18', '2020-11-09', 'belum lunas'),
('PB2008191002380011', 'PO200819080009', 'CC223222222', 'SPL0004', 'Pembelian dari PT Coca Cola Indonesia', 'K', '2020-08-19', '1970-01-01', 'belum lunas'),
('PB2008191011110012', 'PO200813050007', '12333232444242', 'SPL0001', 'Pembelian dari PT Indomarco', 'T', '2020-08-19', '1970-01-01', 'lunas'),
('PB2008241932300013', 'PO200824130011', 'CCL3884993099', 'SPL0004', 'Pembelian dari PT Coca Cola Indonesia', 'K', '2020-08-24', '1970-01-01', 'belum lunas'),
('PB2008242105260014', 'PO200824540011', 'IDM2124433', 'SPL0001', 'Pembelian dari PT Indomarco', 'K', '2020-08-24', '2020-05-09', 'belum lunas'),
('PB2009010840570015', 'PO200831300014', '903993490CC', 'SPL0004', 'Pembelian dari PT Coca Cola Indonesia', 'K', '2020-09-01', '1970-01-01', 'belum lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id_pemesanan` varchar(20) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan_beli` varchar(50) NOT NULL,
  `ppn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id_pemesanan`, `id_barang`, `harga_beli`, `jumlah`, `satuan_beli`, `ppn`) VALUES
('PO200718450001', 'BRG0020', 8000, 23, '', 18400),
('PO200718450001', 'BRG0019', 10000, 23, '', 23000),
('PO200718450001', 'BRG0018', 8000, 23, '', 18400),
('PO200718450001', 'BRG0016', 8000, 23, '', 18400),
('PO200718550002', 'BRG0007', 5000, 34, '', 17000),
('PO200718550002', 'BRG0006', 2000, 200, '', 40000),
('PO200718110003', 'BRG0011', 2000, 100, '', 20000),
('PO200718110003', 'BRG0010', 2100, 100, '', 21000),
('PO200718110003', 'BRG0009', 2100, 400, '', 42000),
('PO200718130003', 'BRG0016', 8000, 100, '', 80000),
('PO200718480003', 'BRG0015', 12000, 20, '', 24000),
('PO200718200003', 'BRG0017', 4500, 23, '', 10350),
('PO200718200003', 'BRG0019', 10000, 34, '', 34000),
('PO200721290003', 'BRG0017', 4500, 20, '', 9000),
('PO200721350004', 'BRG0020', 8000, 20, '', 16000),
('PO200721350004', 'BRG0019', 10000, 40, '', 40000),
('PO200721220005', 'BRG0011', 2000, 10, '', 2000),
('PO200721220005', 'BRG0010', 2100, 48, '', 10080),
('PO200721220005', 'BRG0009', 2100, 96, '', 20160),
('PO200721220005', 'BRG0008', 1900, 200, '', 38000),
('PO200721250005', 'BRG0012', 4000, 100, '', 40000),
('PO200721420005', 'BRG0006', 2000, 200, '', 40000),
('PO200812550006', 'BRG0022', 2000, 23, '', 4600),
('PO200812550006', 'BRG0021', 2200, 48, '', 10560),
('PO200812550006', 'BRG0005', 2000, 200, '', 40000),
('PO200812230007', 'BRG0011', 2000, 100, '', 20000),
('PO200812130007', 'BRG0019', 10000, 200, '', 200000),
('PO200812520007', 'BRG0020', 8000, 22, '', 17600),
('PO200812520007', 'BRG0018', 8000, 12, '', 9600),
('PO200812520007', 'BRG0017', 4500, 50, '', 22500),
('PO200812400007', 'BRG0020', 8000, 50, '', 40000),
('PO200812400007', 'BRG0017', 4500, 50, '', 22500),
('PO200812400007', 'BRG0014', 12500, 50, '', 62500),
('PO200813050007', 'BRG0022', 2000, 21, '', 4200),
('PO200813050007', 'BRG0021', 2200, 48, '', 10560),
('PO200819390008', 'BRG0006', 2000, 23, '', 0),
('PO200819390008', 'BRG0007', 5000, 23, '', 0),
('PO200819080009', 'BRG0016', 8000, 1, 'dus', 800),
('PO200819080009', 'BRG0012', 4000, 1, 'dus', 400),
('PO200824130011', 'BRG0012', 0, 20, 'pcs', 0),
('PO200824130011', 'BRG0013', 0, 48, 'pcs', 0),
('PO200824540011', 'BRG0004', 0, 12, 'pcs', 0),
('PO200824540011', 'BRG0008', 0, 12, 'pcs', 0),
('PO200825070012', 'BRG0006', 0, 96, 'pcs', 0),
('PO200825070012', 'BRG0007', 0, 100, 'pcs', 0),
('PO200830520013', 'BRG0021', 2000, 20, 'pcs', 0),
('PO200830520013', 'BRG0023', 3000, 12, 'pcs', 0),
('PO200831300014', 'BRG0018', 2100, 48, 'pcs', 0),
('PO200831300014', 'BRG0019', 2100, 48, 'pcs', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_header`
--

CREATE TABLE `pemesanan_header` (
  `id_pemesanan` varchar(20) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `status` enum('Belum Selesai','Selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_header`
--

INSERT INTO `pemesanan_header` (`id_pemesanan`, `tanggal_pemesanan`, `id_supplier`, `status`) VALUES
('PO200718110003', '2020-07-18', 'SPL0001', 'Selesai'),
('PO200718130003', '2020-07-18', 'SPL0007', 'Selesai'),
('PO200718200003', '2020-07-18', 'SPL0002', 'Selesai'),
('PO200718450001', '2020-07-18', 'SPL0004', 'Selesai'),
('PO200718480003', '2020-07-18', 'SPL0005', 'Selesai'),
('PO200718550002', '2020-07-18', 'SPL0003', 'Selesai'),
('PO200721220005', '2020-07-21', 'SPL0001', 'Selesai'),
('PO200721250005', '2020-07-21', 'SPL0005', 'Selesai'),
('PO200721290003', '2020-07-20', 'SPL0006', 'Selesai'),
('PO200721350004', '2020-07-21', 'SPL0004', 'Selesai'),
('PO200721420005', '2020-07-21', 'SPL0003', 'Selesai'),
('PO200812130007', '2020-08-11', 'SPL0004', 'Selesai'),
('PO200812230007', '2020-08-11', 'SPL0006', 'Selesai'),
('PO200812400007', '2020-08-12', 'SPL0004', 'Selesai'),
('PO200812520007', '2020-08-12', 'SPL0004', 'Selesai'),
('PO200812550006', '2020-08-11', 'SPL0001', 'Selesai'),
('PO200813050007', '2020-08-13', 'SPL0001', 'Selesai'),
('PO200819080009', '2020-08-19', 'SPL0004', 'Selesai'),
('PO200819390008', '2020-08-18', 'SPL0003', 'Selesai'),
('PO200819570009', '2020-08-19', 'SPL0001', 'Belum Selesai'),
('PO200824130011', '2020-08-24', 'SPL0004', 'Selesai'),
('PO200824160010', '2020-08-24', 'SPL0004', 'Belum Selesai'),
('PO200824540011', '2020-08-24', 'SPL0001', 'Selesai'),
('PO200825070012', '2020-08-25', 'SPL0003', 'Belum Selesai'),
('PO200830520013', '2020-08-30', 'SPL0001', 'Belum Selesai'),
('PO200831300014', '2020-08-31', 'SPL0004', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian_detail`
--

CREATE TABLE `retur_pembelian_detail` (
  `no_nota` varchar(25) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ppn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_pembelian_detail`
--

INSERT INTO `retur_pembelian_detail` (`no_nota`, `id_barang`, `harga_beli`, `jumlah`, `ppn`) VALUES
('WG800290999', 'BRG0007', 5000, 5, 2500),
('CC802909', 'BRG0020', 8000, 10, 8000),
('IMR903889', 'BRG0022', 2000, 2, 400),
('COCA90000', 'BRG0017', 4500, 5, 2250);

--
-- Triggers `retur_pembelian_detail`
--
DELIMITER $$
CREATE TRIGGER `stok_keluar` AFTER INSERT ON `retur_pembelian_detail` FOR EACH ROW BEGIN
		UPDATE barang SET stok = stok-NEW.jumlah
        WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian_header`
--

CREATE TABLE `retur_pembelian_header` (
  `id_retur_pembelian` varchar(20) NOT NULL,
  `no_nota` varchar(25) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_pembelian_header`
--

INSERT INTO `retur_pembelian_header` (`id_retur_pembelian`, `no_nota`, `id_supplier`, `tanggal`) VALUES
('RTBCC802909', 'CC802909', 'SPL0004', '2020-07-18'),
('RTBCOCA90000', 'COCA90000', 'SPL0004', '2020-08-11'),
('RTBIMR903889', 'IMR903889', 'SPL0001', '2020-08-11'),
('RTBWG800290999', 'WG800290999', 'SPL0003', '2020-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telepon`, `alamat`) VALUES
('SPL0001', 'PT Indomarco', '0852789000021', 'Capgawen, Kedungwuni'),
('SPL0002', 'PT Trijaya', '08900230000', 'Jalan Kusuma Bangsa'),
('SPL0003', 'Wings', '089000233390', 'Jalan Keputra Raya'),
('SPL0004', 'PT Coca Cola Indonesia', '08290000901', 'Jalan Patiunus 100'),
('SPL0005', 'PT Enseval', '08530029000', 'Jalan Pegangsaan'),
('SPL0006', 'PT San Prima Jaya', '0829002900', 'JL. Bina Griya No 167'),
('SPL0007', 'PT Adiputa Abadi', '083921099990', 'Kedungwuni No.90'),
('SPL0008', 'PT Jaya Katwang 2', '083902220390', 'Jalan Raya Kedungwuni');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_pengguna` varchar(25) NOT NULL,
  `nama_pengguna` varchar(25) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `hak_akses` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_pengguna`, `nama_pengguna`, `nama_lengkap`, `password`, `status`, `hak_akses`) VALUES
('42', 'vahad', 'Vahad Khusaini', '$2y$10$srJxZoNvUYOslkFMP7D3seTAwoWt8Ob2Ub4yvhmxCSzB0LeDlw1qa', '0', '1'),
('USER0043', 'superadmin', 'Bu Eni', '$2y$10$qtdXtsMxGJ9nSsSPjvf2YucTOLhs4LbAOQqLNhU8YqAoE8G4.ASJW', '1', '1'),
('USER0044', 'raka', 'Raka', '$2y$10$L7xVw0fDQRbFrhdHjdQgvuxPPjIMfNd3wG9ZMbo4xAdyEXk9QG0QK', '1', '1'),
('USER0045', 'rodiah', 'Rodiyatul', '$2y$10$Gf5Aq6b2jr2bkWQiKRVp4.arNt9F7M3XTIR/yWO9N6YQcpAyQL/vC', '1', '0'),
('USER0046', 'admin', 'Agung Nugraha haha', '$2y$10$IO8wH1j1rXBOT8v.0avfTOpgWG6W8AXwxWGRP/HmwI8tMO6DOm8Lq', '1', '0'),
('USER0047', 'Agung', 'asddsa', '$2y$10$/Nk39Uki4w5/o8h9wLk2y.TWmSgg2mh7zUKsz/58rLvaiT4F5XI4a', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `nama_akun` (`nama_akun`),
  ADD UNIQUE KEY `id_akun` (`id_akun`),
  ADD KEY `id_akun_2` (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jurnal` (`id_jurnal`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `jurnal_header`
--
ALTER TABLE `jurnal_header`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `id_jurnal` (`id_jurnal`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD PRIMARY KEY (`id_pelunasan`),
  ADD KEY `id_pembelian` (`no_nota`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `pembelian_header`
--
ALTER TABLE `pembelian_header`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD UNIQUE KEY `no_nota` (`no_nota`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `pemesanan_header`
--
ALTER TABLE `pemesanan_header`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `retur_pembelian_detail`
--
ALTER TABLE `retur_pembelian_detail`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `no_nota` (`no_nota`);

--
-- Indexes for table `retur_pembelian_header`
--
ALTER TABLE `retur_pembelian_header`
  ADD PRIMARY KEY (`id_retur_pembelian`),
  ADD KEY `no_nota` (`no_nota`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
