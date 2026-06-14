-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jun 2026 pada 09.38
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
  `id_sekolah` int(11) NOT NULL,
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alergi_siswa`
--

INSERT INTO `alergi_siswa` (`id_alergi_siswa`, `id_siswa`, `id_alergi`, `id_sekolah`, `catatan`) VALUES
(1, 1, 1, 1, 'Hindari minuman susu murni di lingkungan TK'),
(2, 2, 4, 1, 'Batasi makan telur ceplok/rebus saat makan siang'),
(3, 3, 3, 1, 'Sama sekali tidak boleh terpapar bumbu kacang'),
(4, 4, 2, 1, 'Hindari kuah tumisan seafood'),
(5, 11, 5, 2, 'Ganti roti gandum dengan opsi karbohidrat lain'),
(6, 12, 6, 2, 'Reaksi gatal kecil jika makan tahu goreng berlebih'),
(7, 13, 7, 2, 'Ganti lauk ikan tongkol dengan ayam tepung'),
(8, 14, 8, 2, 'Hindari snack cokelat batangan saat pembagian camilan'),
(9, 21, 1, 3, 'Alergi susu formula akut, sediakan opsi susu kedelai'),
(10, 22, 2, 3, 'Gatal di kulit jika makan udang rebon'),
(11, 23, 4, 3, 'Hindari mayones berbahan dasar telur pada makanan'),
(12, 24, 15, 3, 'Hindari toping keju parut pada jagung manis'),
(13, 31, 11, 4, 'Ganti jus stroberi ke jus jambu biji'),
(14, 32, 3, 4, 'Dilarang keras makan pecel/gado-gado'),
(15, 33, 2, 4, 'Alergi udang dan kepiting laut tingkat tinggi'),
(16, 34, 10, 4, 'Ganti bola daging sapi ke bola-bola ayam fillet'),
(17, 41, 12, 5, 'Hindari buah jeruk yang terlalu asam pada hidangan penutup'),
(18, 42, 6, 5, 'Kurangi porsi kecap manis berkedelai pekat'),
(19, 43, 14, 5, 'Ganti saus tomat kemasan dengan saus kaldu tomat asli'),
(20, 44, 1, 5, 'Ganti puding susu dengan puding buah jeli murni');

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
(1, 1, 1, 3, '2026-06-15', 1, 250, 'Sudah Dibagikan'),
(2, 2, 5, 3, '2026-06-15', 1, 180, 'Belum Dibagikan'),
(3, 3, 2, 3, '2026-06-15', 1, 380, 'Sudah Dibagikan'),
(4, 4, 8, 3, '2026-06-15', 1, 140, 'Sudah Dibagikan'),
(5, 5, 3, 3, '2026-06-15', 1, 450, 'Belum Dibagikan'),
(6, 6, 7, 6, '2026-06-15', 1, 90, 'Sudah Dibagikan'),
(7, 7, 6, 6, '2026-06-15', 1, 320, 'Belum Dibagikan'),
(8, 8, 10, 6, '2026-06-15', 1, 280, 'Sudah Dibagikan'),
(9, 9, 4, 6, '2026-06-15', 1, 120, 'Belum Dibagikan'),
(10, 10, 13, 6, '2026-06-15', 1, 220, 'Sudah Dibagikan'),
(11, 11, 11, 3, '2026-06-15', 1, 210, 'Sudah Dibagikan'),
(12, 12, 14, 3, '2026-06-15', 1, 410, 'Belum Dibagikan'),
(13, 13, 12, 3, '2026-06-15', 1, 130, 'Sudah Dibagikan'),
(14, 14, 17, 3, '2026-06-15', 1, 200, 'Sudah Dibagikan'),
(15, 15, 15, 6, '2026-06-15', 1, 95, 'Belum Dibagikan'),
(16, 16, 18, 6, '2026-06-15', 1, 340, 'Sudah Dibagikan'),
(17, 17, 16, 6, '2026-06-15', 1, 80, 'Sudah Dibagikan'),
(18, 18, 20, 6, '2026-06-15', 1, 220, 'Sudah Dibagikan'),
(19, 19, 19, 3, '2026-06-15', 1, 80, 'Belum Dibagikan'),
(20, 20, 2, 3, '2026-06-15', 1, 380, 'Sudah Dibagikan');

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
(1, 1, 'Melakukan optimasi data massal database smartmbg', '2026-06-13 07:35:07'),
(2, 2, 'Menambahkan stok Beras Kepala Super sebanyak 150 kg', '2026-06-13 07:35:07'),
(3, 3, 'Membagikan porsi makan siang di SD Swasta Nusantara 1', '2026-06-13 07:35:07'),
(4, 1, 'Mengubah data master sekolah id 3', '2026-06-13 07:35:07'),
(5, 5, 'Melakukan update stok Daging Ayam Fillet masuk', '2026-06-13 07:35:07'),
(6, 6, 'Membagikan Jus Stroberi kepada siswa SMP', '2026-06-13 07:35:07'),
(7, 4, 'Melakukan audit berkala data master alergi', '2026-06-13 07:35:07'),
(8, 2, 'Mengeluarkan stok Udang Vaname untuk menu makan siang', '2026-06-13 07:35:07'),
(9, 7, 'Mencatat tanggal kedaluwarsa bahan mentah keju kraft', '2026-06-13 07:35:07'),
(10, 3, 'Melakukan validasi status pengiriman distribusi makanan', '2026-06-13 07:35:07'),
(11, 1, 'Menonaktifkan user akun lama yang tidak terpakai', '2026-06-13 07:35:07'),
(12, 5, 'Menginput log stok harian telur ayam negeri', '2026-06-13 07:35:07'),
(13, 6, 'Memperbarui status antrean pembagian makanan di SMK', '2026-06-13 07:35:07'),
(14, 4, 'Mengeksport data laporan bulanan MBG ke format Excel', '2026-06-13 07:35:07'),
(15, 2, 'Memeriksa kapasitas ruang penyimpanan dingin (cold storage)', '2026-06-13 07:35:07'),
(16, 3, 'Mengonfirmasi penerimaan porsi makan oleh kepala sekolah', '2026-06-13 07:35:07'),
(17, 1, 'Mengubah konfigurasi sistem keamanan password admin', '2026-06-13 07:35:07'),
(18, 7, 'Mendaftarkan item bahan makanan baru biji selasih kering', '2026-06-13 07:35:07'),
(19, 6, 'Menangani laporan kerusakan kemasan susu UHT kotak', '2026-06-13 07:35:07'),
(20, 4, 'Menyelesaikan rekap log validasi bahaya kontaminasi makanan', '2026-06-13 07:35:07');

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
(1, 'Alergi Susu Sapi', 'Reaksi terhadap protein kasein atau whey dalam susu sapi'),
(2, 'Alergi Seafood', 'Reaksi terhadap ikan, udang, kepiting, atau kerang'),
(3, 'Alergi Kacang Tanah', 'Reaksi terhadap protein pada kacang tanah'),
(4, 'Alergi Telur Ayam', 'Alergi umum pada bagian putih telur atau kuning telur'),
(5, 'Alergi Gandum / Gluten', 'Intoleransi atau alergi terhadap protein tepung terigu'),
(6, 'Alergi Kedelai', 'Alergi terhadap olahan kedelai seperti tempe/tahu'),
(7, 'Alergi Ikan Tongkol', 'Sensitivitas terhadap jenis ikan air laut tertentu'),
(8, 'Alergi Cokelat', 'Reaksi alergi terhadap kandungan kakao atau tambahan zat di cokelat'),
(9, 'Alergi Jagung', 'Sensitivitas terhadap karbohidrat kompleks jagung'),
(10, 'Alergi Daging Sapi', 'Reaksi imun langka terhadap protein daging merah'),
(11, 'Alergi Stroberi', 'Reaksi gatal akibat buah stroberi asam'),
(12, 'Alergi Jeruk', 'Reaksi asam sitrat pada kulit mulut siswa'),
(13, 'Alergi Madu', 'Alergi karena kontaminasi serbuk sari di dalam madu'),
(14, 'Alergi Tomat', 'Gatal-gatal ringan seputar area mulut setelah makan tomat'),
(15, 'Alergi Keju', 'Turunan dari alergi susu dengan reaksi pencernaan kembung'),
(16, 'Alergi Udang Galah', 'Spesifik alergi seafood krustasea besar'),
(17, 'Alergi Kepiting', 'Pembengkakan bibir akibat kandungan protein kepiting baku'),
(18, 'Alergi Mentega', 'Reaksi terhadap lemak susu olahan padat'),
(19, 'Alergi Kacang Almond', 'Alergi jenis tree nuts (kacang pohon)'),
(20, 'Alergi Pewarna Sintetis', 'Alergi zat aditif pewarna merah/kuning makanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_sekolah`
--

CREATE TABLE `master_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `npsn` varchar(8) DEFAULT NULL,
  `nama_sekolah` varchar(150) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL DEFAULT '0',
  `status_sekolah` enum('Negeri','Swasta') DEFAULT 'Negeri',
  `alamat_sekolah` text,
  `telepon` varchar(20) DEFAULT NULL,
  `nama_kepsek` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_sekolah`
--

INSERT INTO `master_sekolah` (`id_sekolah`, `npsn`, `nama_sekolah`, `jumlah_siswa`, `status_sekolah`, `alamat_sekolah`, `telepon`, `nama_kepsek`, `created_at`) VALUES
(1, '10200001', 'TK Pembina Al-Fitrah', 45, 'Negeri', 'Jl. Merdeka No. 12, Medan', '061-123401', 'Hj. Aminah Putri, M.Pd', '2026-06-13 07:35:07'),
(2, '10200002', 'SD Swasta Nusantara 1', 180, 'Swasta', 'Jl. Sisingamangaraja No. 45, Medan', '061-123402', 'Drs. Budi Setiawan', '2026-06-13 07:35:07'),
(3, '10200003', 'SMP Negeri 1 Garuda', 320, 'Negeri', 'Jl. Gatot Subroto Km. 5, Medan', '061-123403', 'Siti Rahmah, S.Pd', '2026-06-13 07:35:07'),
(4, '10203456', 'SMA N 2 Kisaran', 250, 'Negeri', 'Jl. Jend. Ahmad Yani, Kisaran', '0623-41234', 'Drs. H. Syahrial, M.Pd', '2026-06-13 07:35:07'),
(5, '10200008', 'SMK Negeri 2 Medan', 600, 'Negeri', 'Jl. Jamin Ginting Km. 10, Medan', '061-123408', 'Dr. Supriyadi, M.T', '2026-06-13 07:35:07');

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
(17, 1, 18),
(1, 3, 2),
(2, 4, 1),
(20, 4, 18),
(3, 6, 3),
(13, 7, 11),
(4, 8, 4),
(5, 9, 6),
(6, 10, 7),
(7, 11, 5),
(9, 12, 1),
(8, 12, 8),
(10, 13, 9),
(11, 13, 15),
(12, 14, 10),
(14, 15, 12),
(15, 16, 9),
(18, 18, 4),
(19, 18, 5),
(16, 20, 10);

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
(1, 'Bubur Kacang Hijau Santan', 'TK', 'Makanan Utama', 'Bubur kacang hijau manis bergizi', 250, '7.00', '5.00', '42.00', '2.50', 150, '6000.00', 'Aktif', '2026-06-13 07:35:07'),
(2, 'Nasi Tim Ayam Jamur', 'SD', 'Makanan Utama', 'Nasi tim lunak sehat untuk anak', 380, '15.50', '8.00', '55.00', '3.10', 250, '12000.00', 'Aktif', '2026-06-13 07:35:07'),
(3, 'Nasi Goreng Seafood Ceria', 'SMP', 'Makanan Utama', 'Nasi goreng racikan dengan udang segar', 450, '18.00', '12.00', '65.00', '1.50', 300, '15000.00', 'Aktif', '2026-06-13 07:35:07'),
(4, 'Susu Kotak UHT Ultra', 'TK', 'Minuman', 'Susu sapi murni tinggi kalsium', 120, '4.00', '3.50', '10.00', '4.00', 200, '5000.00', 'Aktif', '2026-06-13 07:35:07'),
(5, 'Sup Makaroni Ayam Sosis', 'SD', 'Sayur', 'Sup kaldu ayam jernih hangat', 180, '10.00', '4.00', '25.00', '2.00', 200, '8000.00', 'Aktif', '2026-06-13 07:35:07'),
(6, 'Sate Ayam Bumbu Kacang', 'SMK', 'Lauk', 'Sate dada ayam tanpa kulit bakar', 320, '24.00', '14.00', '12.00', '1.00', 150, '18000.00', 'Aktif', '2026-06-13 07:35:07'),
(7, 'Jus Stroberi Segar', 'SMP', 'Minuman', 'Jus buah stroberi asli tanpa pengawet', 90, '0.80', '0.20', '20.00', '15.00', 250, '7000.00', 'Aktif', '2026-06-13 07:35:07'),
(8, 'Perkedel Kentang Telur', 'SD', 'Lauk', 'Kentang tumbuk goreng lapis telur ayam', 140, '3.50', '6.00', '18.00', '0.50', 60, '4000.00', 'Aktif', '2026-06-13 07:35:07'),
(9, 'Tumis Tahu Tempe Kedelai', 'TK', 'Sayur', 'Tumisan kecap manis kaya protein nabati', 150, '12.00', '7.00', '14.00', '1.20', 100, '5000.00', 'Aktif', '2026-06-13 07:35:07'),
(10, 'Ikan Tongkol Balado', 'SMK', 'Lauk', 'Potongan ikan tongkol sambal merah pedas', 280, '22.00', '11.00', '5.00', '2.00', 120, '13000.00', 'Aktif', '2026-06-13 07:35:07'),
(11, 'Roti Gandum Selai Srikaya', 'SMP', 'Makanan Utama', 'Karbohidrat serat tinggi untuk sarapan', 210, '6.00', '4.50', '38.00', '0.80', 80, '6000.00', 'Aktif', '2026-06-13 07:35:07'),
(12, 'Puding Cokelat Susu', 'TK', 'Buah', 'Camilan manis pemicu energi ceria', 130, '3.00', '4.00', '22.00', '0.50', 90, '4500.00', 'Aktif', '2026-06-13 07:35:07'),
(13, 'Jasuke (Jagung Susu Keju)', 'SD', 'Makanan Utama', 'Jagung manis serut gurih padat gizi', 220, '5.50', '9.00', '32.00', '3.00', 120, '7000.00', 'Aktif', '2026-06-13 07:35:07'),
(14, 'Steak Daging Sapi Lada Hitam', 'SMK', 'Lauk', 'Daging sapi empuk saus lada hitam restoran', 410, '28.00', '22.00', '15.00', '1.10', 180, '25000.00', 'Aktif', '2026-06-13 07:35:07'),
(15, 'Jus Jeruk Peras Alami', 'SMP', 'Minuman', 'Kaya vitamin C penambah daya tahan tubuh', 95, '0.70', '0.10', '22.00', '25.00', 250, '6500.00', 'Aktif', '2026-06-13 07:35:07'),
(16, 'Sayur Bening Bayam Jagung', 'TK', 'Sayur', 'Sayur bening segar zat besi tinggi', 80, '2.50', '0.50', '14.00', '8.00', 150, '4000.00', 'Aktif', '2026-06-13 07:35:07'),
(17, 'Nasi Putih Organik Pulen', 'SD', 'Makanan Utama', 'Nasi putih sebagai basis makanan pokok', 200, '4.00', '0.40', '44.00', '0.00', 150, '3500.00', 'Aktif', '2026-06-13 07:35:07'),
(18, 'Ayam Goreng Tepung Crispy', 'SMK', 'Lauk', 'Dada ayam fillet goreng tepung renyah', 340, '25.00', '16.00', '18.00', '0.20', 130, '12000.00', 'Aktif', '2026-06-13 07:35:07'),
(19, 'Es Teh Manis Selasih', 'SMP', 'Minuman', 'Minuman segar pelengkap makan siang siswa', 80, '0.00', '0.00', '19.00', '0.10', 300, '3000.00', 'Aktif', '2026-06-13 07:35:07'),
(20, 'Sop Bola Daging Sapi Kuah', 'SD', 'Sayur', 'Sop sayuran wortel buncis dengan bakso', 220, '14.00', '9.00', '20.00', '4.20', 200, '11000.00', 'Aktif', '2026-06-13 07:35:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `status`, `created_at`, `id_sekolah`) VALUES
(1, '0211111001', 'Aisyah Putri', 'P', 'Aktif', '2026-06-13 07:35:07', 1),
(2, '0202222002', 'Faris Pratama', 'L', 'Aktif', '2026-06-13 07:35:07', 1),
(3, '0211111003', 'Gibran Rakabuming', 'L', 'Aktif', '2026-06-13 07:35:07', 1),
(4, '0202222004', 'Mutia Khanza', 'P', 'Aktif', '2026-06-13 07:35:07', 1),
(5, '0211111005', 'Qonita Kayla', 'P', 'Aktif', '2026-06-13 07:35:07', 1),
(6, '0202222006', 'Zaki Anwar', 'L', 'Aktif', '2026-06-13 07:35:07', 1),
(7, '0211111007', 'Naila Shafa', 'P', 'Aktif', '2026-06-13 07:35:07', 1),
(8, '0202222008', 'Rizky Alfariz', 'L', 'Aktif', '2026-06-13 07:35:07', 1),
(9, '0211111009', 'Ahmad Dani', 'L', 'Aktif', '2026-06-13 07:35:07', 1),
(10, '0202222010', 'Siti Zahra', 'P', 'Aktif', '2026-06-13 07:35:07', 1),
(11, '0153333011', 'Budi Ramadhan', 'L', 'Aktif', '2026-06-13 07:35:07', 2),
(12, '0164444012', 'Citra Lestari', 'P', 'Aktif', '2026-06-13 07:35:07', 2),
(13, '0141010013', 'Hendra Wijaya', 'L', 'Aktif', '2026-06-13 07:35:07', 2),
(14, '0161515014', 'Naufal Rizqi', 'L', 'Aktif', '2026-06-13 07:35:07', 2),
(15, '0151919015', 'Rian Alamsyah', 'L', 'Aktif', '2026-06-13 07:35:07', 2),
(16, '0164444016', 'Adelia Rahma', 'P', 'Aktif', '2026-06-13 07:35:07', 2),
(17, '0153333017', 'Fahri Husein', 'L', 'Aktif', '2026-06-13 07:35:07', 2),
(18, '0164444018', 'Indah Permata', 'P', 'Aktif', '2026-06-13 07:35:07', 2),
(19, '0153333019', 'Yusuf Mahendra', 'L', 'Aktif', '2026-06-13 07:35:07', 2),
(20, '0164444020', 'Tiara Andini', 'P', 'Aktif', '2026-06-13 07:35:07', 2),
(21, '0125555021', 'Doni Saputra', 'L', 'Aktif', '2026-06-13 07:35:07', 3),
(22, '0136666022', 'Larasati Ayu', 'P', 'Aktif', '2026-06-13 07:35:07', 3),
(23, '0121212023', 'Indah Lestari', 'P', 'Aktif', '2026-06-13 07:35:07', 3),
(24, '0132020024', 'Siti Rahma', 'P', 'Aktif', '2026-06-13 07:35:07', 3),
(25, '0125555025', 'Dimas Anggara', 'L', 'Aktif', '2026-06-13 07:35:07', 3),
(26, '0136666026', 'Arif Rahman', 'L', 'Aktif', '2026-06-13 07:35:07', 3),
(27, '0121212027', 'Nadia Vega', 'P', 'Aktif', '2026-06-13 07:35:07', 3),
(28, '0132020028', 'Bagus Saputra', 'L', 'Aktif', '2026-06-13 07:35:07', 3),
(29, '0125555029', 'Eka Satria', 'L', 'Aktif', '2026-06-13 07:35:07', 3),
(30, '0136666030', 'Windy Utami', 'P', 'Aktif', '2026-06-13 07:35:07', 3),
(31, '0082121031', 'Aditya Pratama', 'L', 'Aktif', '2026-06-13 07:35:07', 4),
(32, '0092121032', 'Bella Safira', 'P', 'Aktif', '2026-06-13 07:35:07', 4),
(33, '0102121033', 'Chandra Wijaya', 'L', 'Aktif', '2026-06-13 07:35:07', 4),
(34, '0082121034', 'Dinda Lestari', 'P', 'Aktif', '2026-06-13 07:35:07', 4),
(35, '0092121035', 'Edo Syahputra', 'L', 'Aktif', '2026-06-13 07:35:07', 4),
(36, '0102121036', 'Fitriani Pane', 'P', 'Aktif', '2026-06-13 07:35:07', 4),
(37, '0082121037', 'Gilang Ramadhan', 'L', 'Aktif', '2026-06-13 07:35:07', 4),
(38, '0092121038', 'Hana Salsabila', 'P', 'Aktif', '2026-06-13 07:35:07', 4),
(39, '0102121039', 'Irfan Hakim', 'L', 'Aktif', '2026-06-13 07:35:07', 4),
(40, '0082121040', 'Jessica Putri', 'P', 'Aktif', '2026-06-13 07:35:07', 4),
(41, '0097777041', 'Eka Putra', 'L', 'Aktif', '2026-06-13 07:35:07', 5),
(42, '0108888042', 'Putri Rahmadani', 'P', 'Aktif', '2026-06-13 07:35:07', 5),
(43, '0081313043', 'Kevin Sanjaya', 'L', 'Aktif', '2026-06-13 07:35:07', 5),
(44, '0091717044', 'Putra Perkasa', 'L', 'Aktif', '2026-06-13 07:35:07', 5),
(45, '0102121045', 'Taufik Hidayat', 'L', 'Aktif', '2026-06-13 07:35:07', 5),
(46, '0097777046', 'Rian Sanjaya', 'L', 'Aktif', '2026-06-13 07:35:07', 5),
(47, '0108888047', 'Mega Utami', 'P', 'Aktif', '2026-06-13 07:35:07', 5),
(48, '0081313048', 'Fajar Shadiq', 'L', 'Aktif', '2026-06-13 07:35:07', 5),
(49, '0091717049', 'Salsa Bila', 'P', 'Aktif', '2026-06-13 07:35:07', 5),
(50, '0102121050', 'Angga Wijaya', 'L', 'Aktif', '2026-06-13 07:35:07', 5);

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
(1, 1, 1, '2026-06-15'),
(2, 2, 5, '2026-06-15'),
(3, 3, 2, '2026-06-15'),
(4, 4, 8, '2026-06-15'),
(5, 5, 3, '2026-06-15'),
(6, 6, 7, '2026-06-15'),
(7, 7, 6, '2026-06-15'),
(8, 8, 10, '2026-06-15'),
(9, 9, 4, '2026-06-15'),
(10, 10, 13, '2026-06-15'),
(11, 11, 11, '2026-06-15'),
(12, 12, 14, '2026-06-15'),
(13, 13, 12, '2026-06-15'),
(14, 14, 17, '2026-06-15'),
(15, 15, 15, '2026-06-15'),
(16, 16, 18, '2026-06-15'),
(17, 17, 16, '2026-06-15'),
(18, 18, 20, '2026-06-15'),
(19, 19, 19, '2026-06-15'),
(20, 20, 2, '2026-06-15');

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
(1, 'Beras Kepala Super', 150, 'Kg', 20, '2026-06-01', '2027-06-01', '2026-06-13 07:35:07'),
(2, 'Daging Ayam Fillet', 45, 'Kg', 10, '2026-06-10', '2026-06-25', '2026-06-13 07:35:07'),
(3, 'Udang Vaname Segar', 20, 'Kg', 5, '2026-06-12', '2026-06-15', '2026-06-13 07:35:07'),
(4, 'Susu UHT Dus', 30, 'Karton', 5, '2026-06-05', '2026-12-05', '2026-06-13 07:35:07'),
(5, 'Makaroni Pipa', 15, 'Kg', 3, '2026-06-02', '2027-06-02', '2026-06-13 07:35:07'),
(6, 'Kacang Tanah Kupas', 25, 'Kg', 5, '2026-06-01', '2026-09-01', '2026-06-13 07:35:07'),
(7, 'Buah Stroberi Frozen', 12, 'Kg', 2, '2026-06-11', '2026-07-11', '2026-06-13 07:35:07'),
(8, 'Telur Ayam Negeri', 100, 'Butir', 30, '2026-06-12', '2026-07-02', '2026-06-13 07:35:07'),
(9, 'Tahu Putih Bersih', 200, 'Pcs', 50, '2026-06-13', '2026-06-16', '2026-06-13 07:35:07'),
(10, 'Ikan Tongkol Segar', 30, 'Kg', 8, '2026-06-12', '2026-06-16', '2026-06-13 07:35:07'),
(11, 'Tepung Terigu Segitiga', 40, 'Kg', 10, '2026-06-01', '2027-03-01', '2026-06-13 07:35:07'),
(12, 'Cokelat Bubuk Murni', 10, 'Kg', 2, '2026-06-02', '2027-06-02', '2026-06-13 07:35:07'),
(13, 'Jagung Manis Pipil', 35, 'Kg', 10, '2026-06-10', '2026-08-10', '2026-06-13 07:35:07'),
(14, 'Daging Sapi Sirloin', 25, 'Kg', 5, '2026-06-11', '2026-07-11', '2026-06-13 07:35:07'),
(15, 'Buah Jeruk Siam', 50, 'Kg', 15, '2026-06-12', '2026-06-22', '2026-06-13 07:35:07'),
(16, 'Sayur Bayam Segar', 15, 'Ikat', 5, '2026-06-13', '2026-06-15', '2026-06-13 07:35:07'),
(17, 'Minyak Goreng Sania', 60, 'Liter', 12, '2026-06-01', '2028-06-01', '2026-06-13 07:35:07'),
(18, 'Gula Pasir Putih', 80, 'Kg', 15, '2026-06-01', '2029-06-01', '2026-06-13 07:35:07'),
(19, 'Keju Cheddar Kraft', 15, 'Pcs', 3, '2026-06-05', '2026-11-05', '2026-06-13 07:35:07'),
(20, 'Biji Selasih Kering', 5, 'Kg', 1, '2026-06-01', '2027-06-01', '2026-06-13 07:35:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas_stok','petugas_distribusi') DEFAULT 'petugas_stok',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Shaqilla Swita Sarah', 'shaqilla', '$2y$10$7rXUqK4gP6x8Z3fW8eG5eO7uFz8k9uRjYw5CqH3tE1r8oV7uW3xZa', 'admin', '2026-06-13 07:35:07'),
(2, 'Andi Gunawan', 'andipetugas', '$2y$10$7rXUqK4gP6x8Z3fW8eG5eO7uFz8k9uRjYw5CqH3tE1r8oV7uW3xZa', 'petugas_stok', '2026-06-13 07:35:07'),
(3, 'Budi Santoso', 'budidistribusi', '$2y$10$7rXUqK4gP6x8Z3fW8eG5eO7uFz8k9uRjYw5CqH3tE1r8oV7uW3xZa', 'petugas_distribusi', '2026-06-13 07:35:07'),
(4, 'Rian Hidayat', 'rianadmin', '$2y$10$7rXUqK4gP6x8Z3fW8eG5eO7uFz8k9uRjYw5CqH3tE1r8oV7uW3xZa', 'admin', '2026-06-13 07:35:07'),
(5, 'Siti Aminah', 'sitistok', '$2y$10$7rXUqK4gP6x8Z3fW8eG5eO7uFz8k9uRjYw5CqH3tE1r8oV7uW3xZa', 'petugas_stok', '2026-06-13 07:35:07'),
(6, 'Fauzan Lubis', 'fauzandist', '$2y$10$7rXUqK4gP6x8Z3fW8eG5eO7uFz8k9uRjYw5CqH3tE1r8oV7uW3xZa', 'petugas_distribusi', '2026-06-13 07:35:07'),
(7, 'Dewi Sartika', 'dewipetugas', '$2y$10$7rXUqK4gP6x8Z3fW8eG5eO7uFz8k9uRjYw5CqH3tE1r8oV7uW3xZa', 'petugas_stok', '2026-06-13 07:35:07');

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
(1, 1, 'Aman', 'Siswa tidak memiliki riwayat alergi menu ini', '2026-06-13 07:35:07'),
(2, 2, 'Aman', 'Verifikasi sistem aman', '2026-06-13 07:35:07'),
(3, 3, 'Aman', 'Bebas kontaminasi alergi', '2026-06-13 07:35:07'),
(4, 4, 'Aman', 'Siswa aman mengonsumsi perkedel', '2026-06-13 07:35:07'),
(5, 5, 'Bahaya', 'Peringatan! Menu seafood berbenturan dengan alergi berat siswa id 5', '2026-06-13 07:35:07'),
(6, 6, 'Aman', 'Jus stroberi aman bagi siswa', '2026-06-13 07:35:07'),
(7, 7, 'Bahaya', 'Peringatan! Bumbu sate mengandung kacang tanah', '2026-06-13 07:35:07'),
(8, 8, 'Aman', 'Lauk tongkol tervalidasi bersih', '2026-06-13 07:35:07'),
(9, 9, 'Bahaya', 'Siswa memiliki riwayat alergi susu formula akut!', '2026-06-13 07:35:07'),
(10, 10, 'Aman', 'Jasuke aman', '2026-06-13 07:35:07'),
(11, 11, 'Perlu Penggantian', 'Siswa alergi gandum, disarankan ganti menu nasi', '2026-06-13 07:35:07'),
(12, 12, 'Aman', 'Steak daging sapi aman', '2026-06-13 07:35:07'),
(13, 13, 'Perlu Penggantian', 'Menu puding mengandung susu sapi, siswa sensitif', '2026-06-13 07:35:07'),
(14, 14, 'Aman', 'Nasi putih bersih tervalidasi', '2026-06-13 07:35:07'),
(15, 15, 'Aman', 'Minuman jeruk peras aman', '2026-06-13 07:35:07'),
(16, 16, 'Aman', 'Ayam renyah aman digunakkan', '2026-06-13 07:35:07'),
(17, 17, 'Aman', 'Sayur bayam aman', '2026-06-13 07:35:07'),
(18, 18, 'Aman', 'Sop bola daging tervalidasi aman', '2026-06-13 07:35:07'),
(19, 19, 'Aman', 'Es teh manis segar aman', '2026-06-13 07:35:07'),
(20, 20, 'Aman', 'Siswa aman dari komponen nasi tim', '2026-06-13 07:35:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alergi_siswa`
--
ALTER TABLE `alergi_siswa`
  ADD PRIMARY KEY (`id_alergi_siswa`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`,`id_alergi`),
  ADD KEY `id_alergi` (`id_alergi`),
  ADD KEY `alergi_siswa_ibfk_sekolah` (`id_sekolah`);

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
-- Indexes for table `master_sekolah`
--
ALTER TABLE `master_sekolah`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD UNIQUE KEY `npsn` (`npsn`);

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
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `siswa_ibfk_sekolah` (`id_sekolah`);

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
  MODIFY `id_alergi_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `master_alergi`
--
ALTER TABLE `master_alergi`
  MODIFY `id_alergi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `master_sekolah`
--
ALTER TABLE `master_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu_alergen`
--
ALTER TABLE `menu_alergen`
  MODIFY `id_menu_alergen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `siswa_menu`
--
ALTER TABLE `siswa_menu`
  MODIFY `id_siswa_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `stok_bahan`
--
ALTER TABLE `stok_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `validasi_alergi`
--
ALTER TABLE `validasi_alergi`
  MODIFY `id_validasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alergi_siswa`
--
ALTER TABLE `alergi_siswa`
  ADD CONSTRAINT `alergi_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alergi_siswa_ibfk_2` FOREIGN KEY (`id_alergi`) REFERENCES `master_alergi` (`id_alergi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alergi_siswa_ibfk_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `master_sekolah` (`id_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `master_sekolah` (`id_sekolah`) ON UPDATE CASCADE;

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
