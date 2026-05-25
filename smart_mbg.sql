-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Mei 2026 pada 08.37
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_mbg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alergi_siswa`
--

CREATE TABLE `alergi_siswa` (
  `id_alergi_siswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_alergi` int(11) NOT NULL,
  `tingkat_alergi` enum('Ringan','Sedang','Berat') DEFAULT 'Ringan',
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alergi_siswa`
--

INSERT INTO `alergi_siswa` (`id_alergi_siswa`, `id_siswa`, `id_alergi`, `tingkat_alergi`, `catatan`) VALUES
(1, 1, 2, 'Ringan', 'Tidak boleh susu berlebihan'),
(2, 2, 1, 'Sedang', 'Alergi ikan laut'),
(3, 3, 4, 'Berat', 'Tidak boleh kacang'),
(4, 4, 3, 'Ringan', 'Hindari telur setengah matang'),
(5, 5, 5, 'Sedang', 'Hindari makanan berbahan gluten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusi`
--

CREATE TABLE `distribusi` (
  `id_distribusi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_porsi` int(11) DEFAULT '1',
  `total_kalori` int(11) DEFAULT '0',
  `status` enum('Sudah Dibagikan','Belum Dibagikan') DEFAULT 'Belum Dibagikan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distribusi`
--

INSERT INTO `distribusi` (`id_distribusi`, `id_siswa`, `id_menu`, `id_petugas`, `tanggal`, `jumlah_porsi`, `total_kalori`, `status`) VALUES
(1, 1, 1, 2, '2026-05-19', 1, 450, 'Sudah Dibagikan'),
(2, 2, 2, 2, '2026-05-19', 1, 600, 'Sudah Dibagikan'),
(3, 3, 5, 3, '2026-05-19', 1, 550, 'Sudah Dibagikan'),
(4, 4, 3, 4, '2026-05-19', 1, 750, 'Belum Dibagikan'),
(5, 5, 4, 2, '2026-05-19', 1, 900, 'Belum Dibagikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `id_user`, `aktivitas`, `waktu`) VALUES
(1, 1, 'Menambahkan data siswa', '2026-05-19 05:14:30'),
(2, 2, 'Mengupdate stok bahan', '2026-05-19 05:14:30'),
(3, 3, 'Menambahkan menu MBG', '2026-05-19 05:14:30'),
(4, 4, 'Melakukan distribusi makanan', '2026-05-19 05:14:30'),
(5, 5, 'Melakukan validasi alergi', '2026-05-19 05:14:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_alergi`
--

CREATE TABLE `master_alergi` (
  `id_alergi` int(11) NOT NULL,
  `nama_alergi` varchar(100) NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_alergi`
--

INSERT INTO `master_alergi` (`id_alergi`, `nama_alergi`, `deskripsi`) VALUES
(1, 'Seafood', 'Alergi makanan laut'),
(2, 'Susu', 'Alergi produk susu'),
(3, 'Telur', 'Alergi telur'),
(4, 'Kacang', 'Alergi kacang'),
(5, 'Gluten', 'Alergi gandum/gluten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_alergen`
--

CREATE TABLE `menu_alergen` (
  `id_menu_alergen` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_alergi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_alergen`
--

INSERT INTO `menu_alergen` (`id_menu_alergen`, `id_menu`, `id_alergi`) VALUES
(2, 1, 2),
(1, 2, 1),
(3, 3, 3),
(5, 4, 5),
(4, 5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_makanan`
--

CREATE TABLE `menu_makanan` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `jenjang` enum('TK','SD','SMP','SMK') NOT NULL,
  `kategori` enum('Makanan Utama','Lauk','Sayur','Buah','Minuman') NOT NULL,
  `deskripsi` text,
  `kalori` int(11) NOT NULL,
  `protein` decimal(5,2) DEFAULT '0.00',
  `lemak` decimal(5,2) DEFAULT '0.00',
  `karbohidrat` decimal(5,2) DEFAULT '0.00',
  `vitamin` decimal(5,2) DEFAULT '0.00',
  `berat_porsi` int(11) DEFAULT '0' COMMENT 'gram',
  `harga` decimal(10,2) DEFAULT '0.00',
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_makanan`
--

INSERT INTO `menu_makanan` (`id_menu`, `nama_menu`, `jenjang`, `kategori`, `deskripsi`, `kalori`, `protein`, `lemak`, `karbohidrat`, `vitamin`, `berat_porsi`, `harga`, `status`, `created_at`) VALUES
(1, 'Paket MBG TK', 'TK', 'Makanan Utama', 'Nasi ayam, sayur, buah dan susu untuk anak TK', 450, '15.00', '12.00', '55.00', '8.00', 300, '15000.00', 'Aktif', '2026-05-19 05:14:30'),
(2, 'Paket MBG SD', 'SD', 'Makanan Utama', 'Nasi ikan, sayur bayam, buah dan susu untuk siswa SD', 600, '20.00', '15.00', '75.00', '10.00', 350, '18000.00', 'Aktif', '2026-05-19 05:14:30'),
(3, 'Paket MBG SMP', 'SMP', 'Makanan Utama', 'Nasi telur, ayam, sayur, buah dan susu untuk siswa SMP', 750, '25.00', '18.00', '90.00', '12.00', 400, '22000.00', 'Aktif', '2026-05-19 05:14:30'),
(4, 'Paket MBG SMK', 'SMK', 'Makanan Utama', 'Nasi ayam, tempe, sayur, buah dan susu untuk siswa SMK', 900, '30.00', '22.00', '110.00', '15.00', 450, '25000.00', 'Aktif', '2026-05-19 05:14:30'),
(5, 'Paket Vegetarian SD', 'SD', 'Makanan Utama', 'Nasi, tahu, tempe, sayur dan jus buah', 550, '18.00', '10.00', '80.00', '14.00', 350, '17000.00', 'Aktif', '2026-05-19 05:14:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenjang` enum('TK','SD','SMP','SMK') NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `nama_sekolah` varchar(150) NOT NULL,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenjang`, `kelas`, `jenis_kelamin`, `nama_sekolah`, `status`, `created_at`) VALUES
(1, 'TK001', 'Aisyah', 'TK', 'TK-A', 'P', 'TK Negeri Ceria', 'Aktif', '2026-05-19 05:14:30'),
(2, 'SD001', 'Budi Santoso', 'SD', '3A', 'L', 'SD Negeri 01 Medan', 'Aktif', '2026-05-19 05:14:30'),
(3, 'SD002', 'Citra Lestari', 'SD', '5B', 'P', 'SD Negeri 02 Medan', 'Aktif', '2026-05-19 05:14:30'),
(4, 'SMP001', 'Doni Saputra', 'SMP', '8A', 'L', 'SMP Negeri 5 Medan', 'Aktif', '2026-05-19 05:14:30'),
(5, 'SMK001', 'Eka Putri', 'SMK', '11-RPL', 'P', 'SMK Negeri 1 Medan', 'Aktif', '2026-05-19 05:14:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_menu`
--

CREATE TABLE `siswa_menu` (
  `id_siswa_menu` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa_menu`
--

INSERT INTO `siswa_menu` (`id_siswa_menu`, `id_siswa`, `id_menu`, `tanggal`) VALUES
(1, 1, 1, '2026-05-19'),
(2, 2, 2, '2026-05-19'),
(3, 3, 5, '2026-05-19'),
(4, 4, 3, '2026-05-19'),
(5, 5, 4, '2026-05-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_bahan`
--

CREATE TABLE `stok_bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok_minimum` int(11) DEFAULT '0',
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_expired` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_bahan`
--

INSERT INTO `stok_bahan` (`id_bahan`, `nama_bahan`, `jumlah_stok`, `satuan`, `stok_minimum`, `tanggal_masuk`, `tanggal_expired`, `created_at`) VALUES
(1, 'Beras', 100, 'Kg', 20, '2026-05-01', '2026-12-01', '2026-05-19 05:14:30'),
(2, 'Ayam', 50, 'Kg', 10, '2026-05-10', '2026-05-25', '2026-05-19 05:14:30'),
(3, 'Ikan', 40, 'Kg', 10, '2026-05-11', '2026-05-23', '2026-05-19 05:14:30'),
(4, 'Susu', 200, 'Kotak', 50, '2026-05-05', '2026-08-01', '2026-05-19 05:14:30'),
(5, 'Bayam', 30, 'Ikat', 5, '2026-05-15', '2026-05-20', '2026-05-19 05:14:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas_stok') DEFAULT 'petugas_stok',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Administrator', 'admin', 'admin123', 'admin', '2026-05-19 05:14:30'),
(2, 'Budi Stok', 'budi', 'budi123', 'petugas_stok', '2026-05-19 05:14:30'),
(3, 'Siti Gudang', 'siti', 'siti123', 'petugas_stok', '2026-05-19 05:14:30'),
(4, 'Andi Petugas', 'andi', 'andi123', 'petugas_stok', '2026-05-19 05:14:30'),
(5, 'Rina Admin', 'rina', 'rina123', 'admin', '2026-05-19 05:14:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `validasi_alergi`
--

CREATE TABLE `validasi_alergi` (
  `id_validasi` int(11) NOT NULL,
  `id_distribusi` int(11) NOT NULL,
  `status_validasi` enum('Aman','Bahaya','Perlu Penggantian') DEFAULT 'Aman',
  `catatan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `validasi_alergi`
--

INSERT INTO `validasi_alergi` (`id_validasi`, `id_distribusi`, `status_validasi`, `catatan`, `created_at`) VALUES
(1, 1, 'Perlu Penggantian', 'Mengandung susu', '2026-05-19 05:14:30'),
(2, 2, 'Bahaya', 'Mengandung seafood', '2026-05-19 05:14:30'),
(3, 3, 'Aman', 'Menu aman dikonsumsi', '2026-05-19 05:14:30'),
(4, 4, 'Perlu Penggantian', 'Mengandung telur', '2026-05-19 05:14:30'),
(5, 5, 'Aman', 'Tidak ada alergen berbahaya', '2026-05-19 05:14:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alergi_siswa`
--
ALTER TABLE `alergi_siswa`
  ADD PRIMARY KEY (`id_alergi_siswa`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`,`id_alergi`),
  ADD KEY `id_alergi` (`id_alergi`);

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id_distribusi`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `master_alergi`
--
ALTER TABLE `master_alergi`
  ADD PRIMARY KEY (`id_alergi`),
  ADD UNIQUE KEY `nama_alergi` (`nama_alergi`);

--
-- Indexes for table `menu_alergen`
--
ALTER TABLE `menu_alergen`
  ADD PRIMARY KEY (`id_menu_alergen`),
  ADD UNIQUE KEY `id_menu` (`id_menu`,`id_alergi`),
  ADD KEY `id_alergi` (`id_alergi`);

--
-- Indexes for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `siswa_menu`
--
ALTER TABLE `siswa_menu`
  ADD PRIMARY KEY (`id_siswa_menu`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `stok_bahan`
--
ALTER TABLE `stok_bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `validasi_alergi`
--
ALTER TABLE `validasi_alergi`
  ADD PRIMARY KEY (`id_validasi`),
  ADD KEY `id_distribusi` (`id_distribusi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alergi_siswa`
--
ALTER TABLE `alergi_siswa`
  MODIFY `id_alergi_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_alergi`
--
ALTER TABLE `master_alergi`
  MODIFY `id_alergi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu_alergen`
--
ALTER TABLE `menu_alergen`
  MODIFY `id_menu_alergen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `siswa_menu`
--
ALTER TABLE `siswa_menu`
  MODIFY `id_siswa_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stok_bahan`
--
ALTER TABLE `stok_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `validasi_alergi`
--
ALTER TABLE `validasi_alergi`
  MODIFY `id_validasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alergi_siswa`
--
ALTER TABLE `alergi_siswa`
  ADD CONSTRAINT `alergi_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alergi_siswa_ibfk_2` FOREIGN KEY (`id_alergi`) REFERENCES `master_alergi` (`id_alergi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  ADD CONSTRAINT `distribusi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `distribusi_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu_makanan` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `distribusi_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu_alergen`
--
ALTER TABLE `menu_alergen`
  ADD CONSTRAINT `menu_alergen_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu_makanan` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_alergen_ibfk_2` FOREIGN KEY (`id_alergi`) REFERENCES `master_alergi` (`id_alergi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_menu`
--
ALTER TABLE `siswa_menu`
  ADD CONSTRAINT `siswa_menu_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu_makanan` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `validasi_alergi`
--
ALTER TABLE `validasi_alergi`
  ADD CONSTRAINT `validasi_alergi_ibfk_1` FOREIGN KEY (`id_distribusi`) REFERENCES `distribusi` (`id_distribusi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
