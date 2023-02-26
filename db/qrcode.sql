-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2022 pada 11.47
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrcode`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `foto`, `petugas`) VALUES
(1, 'Baron', 'baron', 'admin.jpeg', 'Petugas Barcode'),
(2, 'Ifan', 'ifan', '', 'Petugas Meja'),
(3, 'Neneng', 'neneng', 'logo.png', 'Petugas Barcode');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Tamu Biasa'),
(2, 'Tamu VIP'),
(3, 'Tamu Keluarga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` bigint(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `alamat_tamu` text NOT NULL,
  `no_meja` bigint(20) NOT NULL,
  `jam_hadir` varchar(200) NOT NULL DEFAULT 'Belum Check In',
  `total_tamu` int(11) NOT NULL,
  `souvenir` varchar(100) NOT NULL DEFAULT 'Belum Terima',
  `status` varchar(20) NOT NULL DEFAULT 'Belum Hadir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `id_kategori`, `nama_tamu`, `alamat_tamu`, `no_meja`, `jam_hadir`, `total_tamu`, `souvenir`, `status`) VALUES
(1, 1, 'Karlos Nende', 'Kayu Putih', 1, '16:24:34 - 24 September 2022', 2, 'Sudah Terima', 'Hadir'),
(2, 2, 'Aron Kiu', 'Oebufu', 2, '16:23:32 - 24 September 2022', 5, 'Sudah Terima', 'Hadir'),
(3, 3, 'Gibe Tanauw', 'Kayu Putih', 3, '16:21:46 - 24 September 2022', 2, 'Sudah Terima', 'Hadir'),
(4, 1, 'Nilsan Kiu', 'Oebufu', 4, 'Belum Check In', 0, 'Belum Terima', 'Belum Hadir'),
(5, 2, 'Ifan Baletty', 'Oebufu', 5, 'Belum Check In', 0, 'Belum Terima', 'Belum Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu_hadir`
--

CREATE TABLE `tamu_hadir` (
  `id_tamu_hadir` bigint(20) NOT NULL,
  `id_tamu` bigint(20) NOT NULL,
  `id_kategori` bigint(20) NOT NULL,
  `nama_tamu_hadir` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu_hadir`
--

INSERT INTO `tamu_hadir` (`id_tamu_hadir`, `id_tamu`, `id_kategori`, `nama_tamu_hadir`) VALUES
(1, 3, 3, 'Gibe Tanauw'),
(2, 2, 2, 'Aron Kiu'),
(3, 1, 1, 'Karlos Nende');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indeks untuk tabel `tamu_hadir`
--
ALTER TABLE `tamu_hadir`
  ADD PRIMARY KEY (`id_tamu_hadir`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tamu_hadir`
--
ALTER TABLE `tamu_hadir`
  MODIFY `id_tamu_hadir` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
