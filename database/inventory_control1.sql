-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2020 pada 15.51
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_control1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(7) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `satuan`, `stok`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('B000001', 'Indomie Ayam Bawang', 108000, 120000, 'Dus', 7, 12, '2020-06-14 12:57:46', 12, '2020-06-14 13:11:11'),
('B000002', 'Nestle Bear Brand', 273000, 285000, 'Dus', 11, 12, '2020-06-14 13:07:05', 12, '2020-06-26 07:55:52'),
('B000003', 'Susu Frisian Flag 40g X 6', 42000, 50000, 'Kotak', 0, 12, '2020-07-01 10:41:15', 12, '2020-07-03 14:12:54'),
('B000004', 'Susu Frisian Flag UHT 900 ML', 15500, 16500, 'Dus', 0, 12, '2020-07-01 10:42:48', 12, '2020-07-01 10:42:48'),
('B000005', 'MIe Sedap Goreng', 88000, 100000, 'Dus', 0, 12, '2020-07-01 10:44:16', 12, '2020-07-01 10:44:16'),
('B000006', 'Mie Sedap Korean Spicy', 87000, 99000, 'Dus', 0, 12, '2020-07-01 10:45:16', 12, '2020-07-01 10:45:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `kode_barang` varchar(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`kode_transaksi`, `tanggal_keluar`, `kode_barang`, `jumlah_keluar`, `created_user`, `created_date`) VALUES
('TK-2020-0000001', '2020-06-14', 'B000001', 3, 12, '2020-06-14 13:11:11'),
('TK-2020-0000002', '2020-06-14', 'B000002', 7, 12, '2020-06-14 13:11:27'),
('TK-2020-0000003', '2020-06-26', 'B000002', 2, 12, '2020-06-26 07:55:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kode_barang` varchar(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`kode_transaksi`, `tanggal_masuk`, `kode_barang`, `jumlah_masuk`, `created_user`, `created_date`) VALUES
('TM-2020-0000001', '2020-06-14', 'B000001', 10, 12, '2020-06-14 13:10:27'),
('TM-2020-0000002', '2020-06-14', 'B000002', 20, 12, '2020-06-14 13:10:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_users`
--

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(12, 'RjrQzr', 'Rizwan Hidayat', 'be209472b4a29a3d00e5f4284caaa935', 'rizwanhidayat73@gmail.com', '089686701011', 'profil.png', 'Super Admin', 'aktif', '2020-06-01 06:59:26', '2020-06-01 07:05:23'),
(13, 'hidayat', 'Hidayat', '37f3c4ac0ecd4a50c7f7ea1bd2b017c7', NULL, NULL, NULL, 'Gudang', 'aktif', '2020-07-06 13:40:46', '2020-07-06 13:40:46'),
(14, 'rizwan', 'Rizwan', '12d6bf6231f55e3df7e53ce3a58cd90f', '', '', 'profil.png', 'Manajer', 'aktif', '2020-07-06 13:41:14', '2020-07-06 13:49:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masukan`
--

CREATE TABLE `masukan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masukan`
--

INSERT INTO `masukan` (`id`, `nama`, `email`, `subjek`, `saran`) VALUES
(1, 'Rizwam Hidayat', 'rizwanhidayat73@gmail.com', 'MAsukan', 'Mohon untuk semangat lagi'),
(2, 'Hidayat', 'hidayat@gmail.com', 'Kritikan', 'aaa'),
(3, 'Paul', 'paul123@gmail.com', 'Kritikan', 'Assalamualaikum wr wb,\r\nSelamt Pagi siang malam berhubung saya melihat website ini saya sangat tertarik untuk mengoreksi web ini karena masih banyak kekurangan dan masih banyak bug , mohon segera di perbaikinya karena sangat kurang rapih \r\nterimakasi \r\nmohon di maklumi'),
(4, 'qweqwe', 'aweqw@gmail.com', 'awew', 'asdasd'),
(5, 'ASDASD', 'akjsdauhod@gmail.com', 'Kritikan', 'ASDWASDAASDASFDFSDF'),
(6, 'Hidayat', 'hidayat@gmail.com', 'Kritikan', 'coba1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_barang` (`kode_barang`),
  ADD KEY `created_user` (`created_user`);

--
-- Indeks untuk tabel `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- Indeks untuk tabel `masukan`
--
ALTER TABLE `masukan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `masukan`
--
ALTER TABLE `masukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
