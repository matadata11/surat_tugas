-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2022 pada 07.40
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sppd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_surat`
--

CREATE TABLE `dt_surat` (
  `id_surat` int(11) NOT NULL,
  `admin_surat` varchar(80) NOT NULL,
  `nm_pegawai` varchar(80) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `anggota1` varchar(80) DEFAULT NULL,
  `nip1` varchar(30) DEFAULT NULL,
  `jabatan1` varchar(80) DEFAULT NULL,
  `anggota2` varchar(80) DEFAULT NULL,
  `nip2` varchar(30) DEFAULT NULL,
  `jabatan2` varchar(80) DEFAULT NULL,
  `anggota3` varchar(80) DEFAULT NULL,
  `nip3` varchar(30) DEFAULT NULL,
  `jabatan3` varchar(80) DEFAULT NULL,
  `pg1` varchar(70) DEFAULT NULL,
  `pg2` varchar(70) DEFAULT NULL,
  `pg3` varchar(70) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dt_surat`
--

INSERT INTO `dt_surat` (`id_surat`, `admin_surat`, `nm_pegawai`, `nip`, `tanggal`, `anggota1`, `nip1`, `jabatan1`, `anggota2`, `nip2`, `jabatan2`, `anggota3`, `nip3`, `jabatan3`, `pg1`, `pg2`, `pg3`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 'Administrator', 'Imanuddin, S.Kom', '123456789', '2022-11-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hh', '2022-11-22', ''),
(4, 'Administrator', 'Imanuddin, S.Kom', '123456789', '2022-11-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'x', '2022-11-22', ''),
(5, 'Administrator', 'Dwi Satria Pangestu, A.Md.Kom', '201501015', '2022-11-22', 'Dwi', '-', NULL, 'iman', '-', NULL, 'hardi', '-', NULL, NULL, NULL, NULL, 'v', '2022-11-22', ''),
(6, 'Administrator', 'Imanuddin, S.Kom', '123456789', '2022-11-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jhgjgh', '2022-11-22', ''),
(7, 'Administrator', 'Imanuddin, S.Kom', '12345678', '2022-11-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hjg', '2022-11-22', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_admin`
--

CREATE TABLE `mt_admin` (
  `id_admin` int(11) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `instansi` text NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `is_active` int(11) NOT NULL,
  `level` enum('Super','Admin','Ops') NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mt_admin`
--

INSERT INTO `mt_admin` (`id_admin`, `admin`, `instansi`, `fullname`, `email`, `password`, `is_active`, `level`, `kabupaten_id`, `provinsi_id`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Dinas Pendidikan Aceh', 'Administrator', 'matadata.dev2021@gmail.com', '$2y$10$wS.94ciyc9btbeyn4rireOuXtuTt32xbWkdWTC9aQGVaSfPBjOhra', 1, 'Super', 6, 0, '', ''),
(10, 'Administrator', 'Cabang Dinas Pendididkan Wilayah Kota Subulussalam dan Kab Aceh Singkil', 'Imannuddin, S, Kom', 'iman@admin.com', '$2y$10$iyllxUY8Tu/otI9hPaBoo.RTgxr.pHn4i55dnn7Srojcy8TMoCpwW', 1, 'Admin', 3, 3, '2022-10-11', ''),
(11, 'Imannuddin, S, Kom', 'SMK Negeri 1 Simpang Kanan', 'Putri Amaliananda', 'admin@admin.com', '$2y$10$PQ3d7EQNa2FMHKQ/IYzuEudY9lZmfOTeZ54nSv2jMj9rriViUZgMW', 1, 'Ops', 3, 3, '2022-10-11', ''),
(12, 'Administrator', 'SMK Negeri 1 Deli', 'deli', 'deli@deli.com', '$2y$10$58UElAbKPxSmIA/fzc386etlovLiBt1kl8zOZRDltUwHxd10h5zaK', 1, 'Admin', 4, 4, '2022-10-14', ''),
(13, 'deli', 'SMK Negeri 1 Deli', 'Deli Serdang', 'serdang@serdang.com', '$2y$10$ImeQv8Y0CE65rYGmq2U9jOt10ZhXJXtrso.xNjIHg1OXjwaWIJ71.', 1, 'Ops', 4, 4, '2022-10-14', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_pegawai`
--

CREATE TABLE `mt_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `admin_peg` varchar(70) NOT NULL,
  `nm_pegawai` varchar(70) NOT NULL,
  `nip` varchar(60) NOT NULL,
  `jabatan` varchar(70) NOT NULL,
  `pg` varchar(70) NOT NULL,
  `status` varchar(70) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mt_pegawai`
--

INSERT INTO `mt_pegawai` (`id_pegawai`, `admin_peg`, `nm_pegawai`, `nip`, `jabatan`, `pg`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Administrator', 'Dwi Satria Pangestu, A.Md.Kom', '201501015', 'Programmer', '-', 'Administrasi DAK', '2022-11-22', '2022-11-22'),
(3, 'Administrator', 'Imanuddin, S.Kom', '12345678', 'Admin', '-', 'Pegawai Negeri Sipil', '2022-11-22', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_pptk`
--

CREATE TABLE `mt_pptk` (
  `id_pptk` int(11) NOT NULL,
  `admin_pptk` varchar(70) NOT NULL,
  `nm_pegawai` varchar(80) NOT NULL,
  `nip` varchar(70) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mt_pptk`
--

INSERT INTO `mt_pptk` (`id_pptk`, `admin_pptk`, `nm_pegawai`, `nip`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Dwi Satria Pangestu, A.Md.Kom', '201501015', '2022-11-22', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_surat`
--
ALTER TABLE `dt_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `mt_admin`
--
ALTER TABLE `mt_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `mt_pegawai`
--
ALTER TABLE `mt_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `mt_pptk`
--
ALTER TABLE `mt_pptk`
  ADD PRIMARY KEY (`id_pptk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dt_surat`
--
ALTER TABLE `dt_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mt_admin`
--
ALTER TABLE `mt_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mt_pegawai`
--
ALTER TABLE `mt_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mt_pptk`
--
ALTER TABLE `mt_pptk`
  MODIFY `id_pptk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
