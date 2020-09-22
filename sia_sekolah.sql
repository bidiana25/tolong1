-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 08:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_kk`
--

CREATE TABLE `jurnal_kk` (
  `id_jurnalkk` int(11) NOT NULL,
  `jurnalkk_tanggal` date NOT NULL,
  `jurnalkk_rid` int(11) NOT NULL,
  `debit_beban` bigint(20) NOT NULL,
  `debit_perlengkapan` bigint(20) NOT NULL,
  `debit_hutang` bigint(20) NOT NULL,
  `kreditkas` bigint(20) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurnal_kk`
--

INSERT INTO `jurnal_kk` (`id_jurnalkk`, `jurnalkk_tanggal`, `jurnalkk_rid`, `debit_beban`, `debit_perlengkapan`, `debit_hutang`, `kreditkas`, `kode_transaksi`) VALUES
(12, '2020-09-23', 44, 1000, 0, 0, 1000, 'BB0002'),
(13, '2020-09-24', 46, 1000000, 0, 0, 1000000, 'BB0003'),
(14, '2020-09-24', 50, 5000000, 0, 0, 5000000, 'BB0004');

-- --------------------------------------------------------

--
-- Table structure for table `tm_beban`
--

CREATE TABLE `tm_beban` (
  `id_beban` int(11) NOT NULL,
  `beban_tanggal` date NOT NULL,
  `rid_akun` int(11) NOT NULL,
  `beban_nominal` bigint(20) NOT NULL,
  `beban_ket` varchar(255) NOT NULL,
  `kode_beban` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_beban`
--

INSERT INTO `tm_beban` (`id_beban`, `beban_tanggal`, `rid_akun`, `beban_nominal`, `beban_ket`, `kode_beban`) VALUES
(38, '2020-09-23', 44, 1000, '', 'BB0002'),
(39, '2020-09-24', 46, 1000000, 'Sewa', 'BB0003');

-- --------------------------------------------------------

--
-- Table structure for table `tm_pemasukan`
--

CREATE TABLE `tm_pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tanggal_pemasukan` date NOT NULL,
  `nominal_pemasukan` bigint(20) NOT NULL,
  `kategori_pemasukan` varchar(255) NOT NULL,
  `keterangan_pemasukan` varchar(255) NOT NULL,
  `jenis_pemasukan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_pemasukan`
--

INSERT INTO `tm_pemasukan` (`id_pemasukan`, `tanggal_pemasukan`, `nominal_pemasukan`, `kategori_pemasukan`, `keterangan_pemasukan`, `jenis_pemasukan`) VALUES
(4, '2020-09-15', 1000000, 'Uang Komite', 'SPP dari Anak Kelas 3', 'Bank'),
(5, '2020-09-16', 500000, 'Infak Pembangunan', 'Uang Dodit', 'Bank');

-- --------------------------------------------------------

--
-- Table structure for table `t_m_akun1`
--

CREATE TABLE `t_m_akun1` (
  `id_akun1` int(11) NOT NULL,
  `nama_akun1` varchar(30) NOT NULL,
  `kode_akun1` varchar(20) NOT NULL,
  `kategori_akun1` enum('Harta (Aktiva)','Kewajiban/Hutang (Liability)','Modal (equity)','Pendapatan','Beban/Biaya (Expense)') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_m_akun1`
--

INSERT INTO `t_m_akun1` (`id_akun1`, `nama_akun1`, `kode_akun1`, `kategori_akun1`) VALUES
(1, 'Aset tetap', '12000', 'Harta (Aktiva)'),
(3, 'Aset Lancar', '11000', 'Harta (Aktiva)'),
(4, 'Aset Lainnya', '13000', 'Harta (Aktiva)'),
(5, 'Hutang Jangka Pendek', '21000', 'Kewajiban/Hutang (Liability)'),
(6, 'Hutang Jangka Panjang', '22000', 'Kewajiban/Hutang (Liability)'),
(7, 'Modal', '30000', 'Modal (equity)'),
(8, 'Pendapatan', '40000', 'Pendapatan'),
(9, 'Beban/Biaya', '50000', 'Beban/Biaya (Expense)');

-- --------------------------------------------------------

--
-- Table structure for table `t_m_akun2`
--

CREATE TABLE `t_m_akun2` (
  `id_akun2` int(11) NOT NULL,
  `rid_akun1` int(11) NOT NULL,
  `kode_akun2` varchar(30) NOT NULL,
  `nama_akun2` varchar(30) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_m_akun2`
--

INSERT INTO `t_m_akun2` (`id_akun2`, `rid_akun1`, `kode_akun2`, `nama_akun2`, `ket`, `saldo`) VALUES
(35, 9, '51000', 'Beban Gaji Guru', '', 0),
(36, 9, '51100', 'Beban Gaji Karyawan Lainnya', '', 0),
(37, 9, '52000', 'THR Guru', '', 0),
(38, 9, '52100', 'THR Karyawan Lainnya', '', 0),
(39, 9, '52200', 'Bonus Guru', '', 0),
(40, 9, '52300', 'Bonus Karyawan Lainnya', '', 0),
(41, 9, '52400', 'Bonus Tour', '', 0),
(42, 9, '53000', 'Gaji Pelatih', '', 0),
(43, 9, '53100', 'Perlengkapan Eskul', '', 0),
(44, 9, '54000', 'Beban Listrik', '', 0),
(45, 9, '54100', 'Beban Penyusutan Peralatan', '', 0),
(46, 9, '54200', 'Beban Sewa', '', 0),
(47, 9, '54300', 'Beban Kendaraan', '', 0),
(48, 9, '54400', 'Beban Internet/Pulsa', '', 0),
(49, 9, '54500', 'Prive', '', 0),
(50, 9, '55000', 'Beban Pelatihan/Workshop', '', 0),
(51, 9, '55100', 'Beban Kegiatan Anak', '', 0),
(52, 9, '55200', 'Beban Kegiatan OrangTua', '', 0),
(53, 9, '55300', 'Beban Rapor', '', 0),
(54, 9, '55400', 'Beban Barang Inventaris', '', 0),
(55, 9, '55500', 'Beban Gedung', '', 0),
(56, 9, '55600', 'Beban Operasional Lainnya', '', 0),
(57, 9, '55700', 'Beban Rapat', '', 0),
(58, 8, '41000', 'Uang Gedung', '', 0),
(59, 8, '41100', 'Uang Baju', '', 0),
(60, 8, '41200', 'Uang Buku', '', 0),
(61, 8, '41300', 'Uang Tahunan', '', 0),
(62, 8, '41400', 'Uang SPP', '', 0),
(63, 8, '41500', 'Uang Eskul', '', 0),
(64, 8, '41600', 'Uang Komite', '', 0),
(65, 8, '42000', 'Infak Pembangunan', '', 0),
(66, 8, '42100', 'Infak Sekolah', '', 0),
(67, 8, '43000', 'Tabungan', '', 0),
(68, 8, '44000', 'Hibah', '', 0),
(69, 8, '45000', 'Pendapatan Lainnya', '', 0),
(70, 7, '31000', 'Setoran Modal', '', 0),
(71, 7, '32000', 'Prive', '', 0),
(72, 7, '33000', 'Donasi/Hibah', '', 0),
(73, 7, '34000', 'Laba Ditahan', '', 0),
(74, 5, '21100', 'Hutang Usaha', '', 0),
(75, 5, '21200', 'Hutang Gaji', '', 0),
(76, 5, '21300', 'Hutang Listrik dan Air', '', 0),
(77, 5, '21400', 'Hutang Telepon dan Internet', '', 0),
(78, 5, '21500', 'Hutang Lancar Lainnya', '', 0),
(79, 6, '22100', 'Hutang Bank', '', 0),
(80, 3, '11110', 'Kas', '', 0),
(82, 3, '11130', 'Piutang Usaha', '', 0),
(83, 3, '11140', 'Perlengkapan', '', 0),
(84, 1, '12100', 'Bangunan', '', 0),
(85, 1, '12200', 'Tanah', '', 0),
(86, 1, '12300', 'Perabotan', '', 0),
(87, 1, '12400', 'Kendaraan', '', 0),
(88, 1, '12500', 'Teknologi', '', 0),
(89, 9, '5999', 'Beban Bidiana', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `role` enum('yayasan','bendahara','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'yayasan', 'e62f7824c7aab9dfc2d8ca00448afbfa', 'Bapak Cuk', 'yayasan'),
(2, 'bendahara', '62f7dec74b78ba0398e6a9f317f55126', 'Bendahara Sekolah', 'bendahara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurnal_kk`
--
ALTER TABLE `jurnal_kk`
  ADD PRIMARY KEY (`id_jurnalkk`),
  ADD KEY `jurnalkk_rid` (`jurnalkk_rid`);

--
-- Indexes for table `tm_beban`
--
ALTER TABLE `tm_beban`
  ADD PRIMARY KEY (`id_beban`),
  ADD KEY `akun` (`rid_akun`);

--
-- Indexes for table `tm_pemasukan`
--
ALTER TABLE `tm_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `t_m_akun1`
--
ALTER TABLE `t_m_akun1`
  ADD PRIMARY KEY (`id_akun1`);

--
-- Indexes for table `t_m_akun2`
--
ALTER TABLE `t_m_akun2`
  ADD PRIMARY KEY (`id_akun2`),
  ADD KEY `rid_akun1` (`rid_akun1`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurnal_kk`
--
ALTER TABLE `jurnal_kk`
  MODIFY `id_jurnalkk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tm_beban`
--
ALTER TABLE `tm_beban`
  MODIFY `id_beban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tm_pemasukan`
--
ALTER TABLE `tm_pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_m_akun1`
--
ALTER TABLE `t_m_akun1`
  MODIFY `id_akun1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_m_akun2`
--
ALTER TABLE `t_m_akun2`
  MODIFY `id_akun2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurnal_kk`
--
ALTER TABLE `jurnal_kk`
  ADD CONSTRAINT `jurnal_kk_ibfk_2` FOREIGN KEY (`jurnalkk_rid`) REFERENCES `t_m_akun2` (`id_akun2`);

--
-- Constraints for table `tm_beban`
--
ALTER TABLE `tm_beban`
  ADD CONSTRAINT `akun` FOREIGN KEY (`rid_akun`) REFERENCES `t_m_akun2` (`id_akun2`);

--
-- Constraints for table `t_m_akun2`
--
ALTER TABLE `t_m_akun2`
  ADD CONSTRAINT `t_m_akun2_ibfk_1` FOREIGN KEY (`rid_akun1`) REFERENCES `t_m_akun1` (`id_akun1`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
