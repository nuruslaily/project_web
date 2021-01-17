-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jan 2021 pada 04.58
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `tahun_peroleh` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `penguasaan` varchar(25) NOT NULL,
  `id_ruang` int(11) DEFAULT NULL,
  `keadaan` varchar(25) NOT NULL,
  `keterangan` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `merk`, `tahun_peroleh`, `jumlah`, `satuan`, `penguasaan`, `id_ruang`, `keadaan`, `keterangan`, `created`, `modified`) VALUES
(1, '30563', 'Lemari Besi', 'vhbj', '1234', 1, 'Buah', '-', 1, 'Rusak Ringan', 'Telah diterima 7 Januari 2021', '2021-01-14 17:59:57', '2021-01-17 10:43:40'),
(2, '3862324', 'PC Unit', '', '', 4, 'Buah', '', 9, 'Rusak Ringan', 'Sering kali mengalami blue screen', '2021-01-14 17:59:57', '2021-01-17 10:26:19'),
(3, '0829897', 'Meja Kayu', '', '', 5, 'Buah', '', 3, 'Baik', 'Baik', '2021-01-14 17:59:57', NULL),
(4, '0909181', 'Telepon Umum', '', '', 1, 'Buah', '', 2, 'Baik', 'Warna Putih', '2021-01-14 17:59:57', NULL),
(5, '3862324', 'PC Unit', '', '', 8, 'Unit', '', 4, 'Rusak Ringan', 'Butuh update windows', '2021-01-14 17:59:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `kode_kendaraan` varchar(20) NOT NULL,
  `merk_kendaraan` varchar(50) NOT NULL,
  `tipe_kendaraan` varchar(50) NOT NULL,
  `kategori_kendaraan` varchar(15) NOT NULL,
  `nopol` varchar(20) NOT NULL,
  `pj_kendaraan` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `kode_kendaraan`, `merk_kendaraan`, `tipe_kendaraan`, `kategori_kendaraan`, `nopol`, `pj_kendaraan`, `no_tlp`, `alamat`, `foto`, `keterangan`, `created`, `modified`) VALUES
(2, '09090', 'Yamaha', 'Nmax 2020', 'Motor', 'N0990JJ', 'Dwi Handayani', '08762517199', 'Malang', '4018648881.jpg', 'Motor dinas nmax tahun 2020 warna merah', '2021-01-14 18:04:15', '2021-01-17 09:39:50'),
(4, '02222', 'Suzuki', 'APV 2015', 'Bus', 'N2565AQ', 'Bagja', '08556251718', 'Jalan Raya Sukun No 60,Malang', 'apv.jpg', 'Warna Silver', '2021-01-14 18:04:15', NULL),
(5, '09090', 'Honda', 'Supra Fit 2010', 'Motor', 'N2235KK', 'Budi', '', '', 'supraa.jpg', 'warna biru', '2021-01-14 18:04:15', NULL),
(6, '09090', 'Honda', 'Beat 2019', 'Motor', 'N8880AP', 'Ratna', '', '', 'beat.jpg', 'warna merah', '2021-01-14 18:04:15', NULL),
(7, '09090', 'Honda', 'Vario 2018', 'Motor', 'N1118GG', 'Aryo', '', '', 'vario.jpg', 'Warna silver dengan nomer STNK : 00826751461', '2021-01-14 18:04:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id_ruang` int(11) NOT NULL,
  `kode_ruang` varchar(11) NOT NULL,
  `uraian_ruang` varchar(20) NOT NULL,
  `lantai` int(11) NOT NULL,
  `pj_ruang` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `kode_ruang`, `uraian_ruang`, `lantai`, `pj_ruang`, `no_tlp`, `alamat`, `created`, `modified`) VALUES
(1, '010103', 'Ruang Lobby', 1, 'Rony', '08555177182', 'Jalan Raya Sukun No 60,Malang', '2021-01-14 18:06:36', NULL),
(2, '010104', 'Ruang Perpustakaan', 1, 'Agus Suhartono', '08912632300', 'jalan soekarno hatta no11', '2021-01-14 18:06:36', NULL),
(3, '8989', 'Ruang IPDS', 1, 'Imam', '085525617', 'Malang', '2021-01-14 18:06:36', NULL),
(4, '9837', 'Ruang TU', 1, 'Asep', '08651416', 'Sawojajar', '2021-01-14 18:06:36', NULL),
(5, '552615', 'Ruang Tehnis', 1, 'Budi', '08727192', 'Malang', '2021-01-14 18:06:36', NULL),
(6, '979871', 'Ruang Kepala', 2, 'Edi', '08626151', 'Batu', '2021-01-14 18:06:36', NULL),
(7, '098977', 'Ruang Rapat', 2, 'Ayu', '08999826147', 'Malang', '2021-01-14 18:06:36', NULL),
(8, '9087287', 'Ruang KSK', 2, 'Haryo', '085165237', 'Malang', '2021-01-14 18:06:36', NULL),
(9, '8888', 'Ruang Gudang', 1, 'Indra', '08777627189', 'Batu', '2021-01-14 18:06:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(5, 'Kinanti', 'kinanpermata', 'kinan', 2),
(6, 'user', 'user', 'user', 2),
(7, 'Budi', 'budiman', '123', 2),
(8, 'kinan darin millan', 'karinlan', 'karinlan', 2),
(9, 'testing', 'testing', 'testing123', 2),
(10, 'demo cust', 'demo', 'demo', 2),
(11, 'millaniaaaaaa', 'nia123', 'nia123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `id_ruang` FOREIGN KEY (`id_ruang`) REFERENCES `tb_ruang` (`id_ruang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
