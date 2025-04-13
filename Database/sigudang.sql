-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2025 pada 04.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `id_suplayer` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `kategori` enum('Makanan_Olahan','Daging','Buah','Sayur') NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_distribusi`
--

CREATE TABLE `tb_detail_distribusi` (
  `id_detail` int(11) NOT NULL,
  `id_distribusi` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `jumlah_distribusi` decimal(10,0) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `konfirmasi` enum('Konfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_distribusi`
--

CREATE TABLE `tb_distribusi` (
  `id_distribusi` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_distribusi` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suplayer`
--

CREATE TABLE `tb_suplayer` (
  `id_suplayer` int(11) NOT NULL,
  `nama_suplayer` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_suplayer`
--

INSERT INTO `tb_suplayer` (`id_suplayer`, `nama_suplayer`, `alamat`, `telepon`) VALUES
(1, 'PT. Rasa Nusantara Food', 'Jl. Raden Saleh No. 45, Jakarta Pusat', '085853536345'),
(2, 'CV. Daging Segar Jaya', 'Jl. Peternakan No. 12, Bandung', '089876543246'),
(3, 'UD. Buah Tropis Sejahtera', 'Jl. Kebun Raya No. 27, Bogor', '087546351234'),
(4, 'PT. Sayur Segar Mandiri', 'Jl. Pertanian No. 18, Lembang', '087695433456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `nama_toko`, `alamat`, `telepon`) VALUES
(1, 'Superindo Cimahi', 'Jl. Kolonel Matsuri No. 50, Cimahi', '085876564654'),
(2, 'Griya Lembang', 'Jl. Raya Lembang No. 21, Lembang', '087654342532'),
(3, 'Indomaret Pasteur', 'Jl. Dr.Djunjunan No.30, Bandung', '087546351234'),
(4, 'Borma Cimahi', 'Jl. Gatot Subroto No.78, Cimahi', '087695433456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `username`, `password`) VALUES
(14, 'asep@gmail.com', 'Asep', '1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_detail_distribusi`
--
ALTER TABLE `tb_detail_distribusi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tb_distribusi`
--
ALTER TABLE `tb_distribusi`
  ADD PRIMARY KEY (`id_distribusi`);

--
-- Indeks untuk tabel `tb_suplayer`
--
ALTER TABLE `tb_suplayer`
  ADD PRIMARY KEY (`id_suplayer`);

--
-- Indeks untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_distribusi`
--
ALTER TABLE `tb_detail_distribusi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_distribusi`
--
ALTER TABLE `tb_distribusi`
  MODIFY `id_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_suplayer`
--
ALTER TABLE `tb_suplayer`
  MODIFY `id_suplayer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
