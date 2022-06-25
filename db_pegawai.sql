-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2022 pada 17.20
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `ID_Absensi` int(11) NOT NULL,
  `ID_Pegawai` int(11) NOT NULL,
  `Tgl_Absensi` date NOT NULL,
  `Absen_Masuk` varchar(5) NOT NULL,
  `Keterangan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensikeluar`
--

CREATE TABLE `absensikeluar` (
  `ID_Absensi` int(11) NOT NULL,
  `ID_Pegawai` int(11) NOT NULL,
  `Tgl_Absensi` date NOT NULL,
  `Absensi_Keluar` varchar(15) NOT NULL,
  `Keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensikeluar`
--

INSERT INTO `absensikeluar` (`ID_Absensi`, `ID_Pegawai`, `Tgl_Absensi`, `Absensi_Keluar`, `Keterangan`) VALUES
(1001, 1001, '2022-06-01', 'Sudah', 'Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `ID_Dept` varchar(5) NOT NULL,
  `Nama_Dept` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`ID_Dept`, `Nama_Dept`) VALUES
('1001', 'HRD'),
('1002', 'Beverage'),
('1003', 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin'),
('Riri', 'riri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_Pegawai` int(5) NOT NULL,
  `Nama_Peg` varchar(20) NOT NULL,
  `Alamat` varchar(20) NOT NULL,
  `ID_Dept` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`ID_Pegawai`, `Nama_Peg`, `Alamat`, `ID_Dept`) VALUES
(1001, 'Riri Eriska', 'Kuningan', '1001'),
(1002, 'Restu', 'Cirebon', '1002'),
(1003, 'Sindi', 'Banjarmasin', '1003'),
(1004, 'Sinta', 'Majalengka', '1004'),
(1005, 'Riska', 'Bandung', '1002'),
(1006, 'Elsa', 'Purwaketo', '1001'),
(1007, 'Ratna', 'Cianjur', '1003'),
(1008, 'Sisil', 'Ciawi', '1002'),
(1009, 'Ninda', 'Majalengka', '1003'),
(1010, 'Nisa', 'Belitung', '1001'),
(1011, 'Tika', 'Tasik', '1002'),
(1012, 'Ati', 'Bekasi', '1003'),
(1013, 'Zeni', 'Cirebon', '1002'),
(1014, 'Bilsa', 'Tasik', '1002'),
(1015, 'Dila', 'Kalimantan', '1001'),
(1016, 'Gigi', 'Riau', '1002'),
(1017, 'Nata', 'Kuningan', '1001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
--

CREATE TABLE `penggajian` (
  `ID_Penggajian` int(11) NOT NULL,
  `ID_Pegawai` int(11) NOT NULL,
  `Rekening` varchar(20) NOT NULL,
  `Gaji` int(11) NOT NULL,
  `Tgl_Transfer` date NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penggajian`
--

INSERT INTO `penggajian` (`ID_Penggajian`, `ID_Pegawai`, `Rekening`, `Gaji`, `Tgl_Transfer`, `Status`) VALUES
(1001, 1001, '12345678911', 40000000, '2022-06-01', 'AKTIF');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`ID_Absensi`);

--
-- Indeks untuk tabel `absensikeluar`
--
ALTER TABLE `absensikeluar`
  ADD PRIMARY KEY (`ID_Absensi`);

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`ID_Dept`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`ID_Pegawai`);

--
-- Indeks untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`ID_Penggajian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `ID_Absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensikeluar`
--
ALTER TABLE `absensikeluar`
  MODIFY `ID_Absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `ID_Penggajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
