-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2020 at 06:07 AM
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
-- Database: `starter_ci_auth`
--

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
('USER0043', 'superadmin', 'Superadmin', '$2y$10$ahvFhg.Lqy.xHw8a1Mi3Wud7aZx9PSKrpxM2I3Mz52DbK0RS4CKuG', '1', '1'),
('USER0044', 'raka', 'Raka', '$2y$10$L7xVw0fDQRbFrhdHjdQgvuxPPjIMfNd3wG9ZMbo4xAdyEXk9QG0QK', '1', '1'),
('USER0045', 'rodiah', 'Rodiyatul', '$2y$10$Gf5Aq6b2jr2bkWQiKRVp4.arNt9F7M3XTIR/yWO9N6YQcpAyQL/vC', '1', '0'),
('USER0046', 'admin', 'Agung Nugraha', '$2y$10$IO8wH1j1rXBOT8v.0avfTOpgWG6W8AXwxWGRP/HmwI8tMO6DOm8Lq', '1', '0'),
('USER0047', 'Agung', 'asddsa', '$2y$10$/Nk39Uki4w5/o8h9wLk2y.TWmSgg2mh7zUKsz/58rLvaiT4F5XI4a', '0', '0'),
('USER0048', 'arjuna', 'Arjuna Alkatiri', '$2y$10$v6UMYMqkBmtcYAkZrvN48elGd0u1saEIB6eNcSMDl9mCYh.7fXN6e', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
