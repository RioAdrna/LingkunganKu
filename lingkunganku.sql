-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2025 at 02:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lingkunganku`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabkot`
--

CREATE TABLE `kabkot` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('Kabupaten','Kota') NOT NULL,
  `ibu_kota` varchar(100) DEFAULT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `geojson_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabkot`
--

INSERT INTO `kabkot` (`id`, `nama`, `jenis`, `ibu_kota`, `latitude`, `longitude`, `geojson_id`) VALUES
(1, 'Kabupaten Bandung', 'Kabupaten', 'Soreang', -7.020300, 107.540000, 4),
(2, 'Kabupaten Bandung Barat', 'Kabupaten', 'Ngamprah', -6.838100, 107.496900, 18),
(3, 'Kabupaten Bekasi', 'Kabupaten', 'Cikarang', -6.323900, 107.149300, 17),
(4, 'Kabupaten Bogor', 'Kabupaten', 'Cibinong', -6.482000, 106.842500, 1),
(5, 'Kabupaten Ciamis', 'Kabupaten', 'Ciamis', -7.323900, 108.351000, 7),
(6, 'Kabupaten Cianjur', 'Kabupaten', 'Cianjur', -6.818300, 107.138900, 3),
(7, 'Kabupaten Cirebon', 'Kabupaten', 'Sumber', -6.762800, 108.486800, 10),
(8, 'Kabupaten Garut', 'Kabupaten', 'Tarogong Kidul', -7.220500, 107.886000, 5),
(9, 'Kabupaten Indramayu', 'Kabupaten', 'Indramayu', -6.327000, 108.323000, 13),
(10, 'Kabupaten Karawang', 'Kabupaten', 'Karawang Barat', -6.301300, 107.304000, 16),
(11, 'Kabupaten Kuningan', 'Kabupaten', 'Kuningan', -6.975600, 108.484000, 9),
(12, 'Kabupaten Majalengka', 'Kabupaten', 'Majalengka', -6.834000, 108.223000, 11),
(13, 'Kabupaten Pangandaran', 'Kabupaten', 'Parigi', -7.683300, 108.490000, 8),
(14, 'Kabupaten Purwakarta', 'Kabupaten', 'Purwakarta', -6.556000, 107.443000, 15),
(15, 'Kabupaten Subang', 'Kabupaten', 'Subang', -6.570000, 107.758000, 14),
(16, 'Kabupaten Sukabumi', 'Kabupaten', 'Palabuhanratu', -6.989000, 106.541000, 2),
(17, 'Kabupaten Sumedang', 'Kabupaten', 'Sumedang Utara', -6.836000, 107.921000, 12),
(18, 'Kabupaten Tasikmalaya', 'Kabupaten', 'Singaparna', -7.355000, 108.113000, 6),
(19, 'Kota Bandung', 'Kota', 'Bandung', -6.917500, 107.619100, 21),
(20, 'Kota Banjar', 'Kota', 'Banjar', -7.369900, 108.530000, 27),
(21, 'Kota Bekasi', 'Kota', 'Bekasi', -6.234800, 106.996600, 23),
(22, 'Kota Bogor', 'Kota', 'Bogor', -6.595000, 106.799500, 19),
(23, 'Kota Cimahi', 'Kota', 'Cimahi', -6.891300, 107.540000, 25),
(24, 'Kota Cirebon', 'Kota', 'Cirebon', -6.711800, 108.558300, 22),
(25, 'Kota Depok', 'Kota', 'Depok', -6.402500, 106.794200, 24),
(26, 'Kota Sukabumi', 'Kota', 'Sukabumi', -6.922000, 106.925000, 20),
(27, 'Kota Tasikmalaya', 'Kota', 'Tasikmalaya', -7.336400, 108.220800, 26);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_laporan`
--

CREATE TABLE `kategori_laporan` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_laporan`
--

INSERT INTO `kategori_laporan` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'Kebersihan dan Sampah', 'Masalah pengelolaan sampah dan kebersihan lingkungan'),
(2, 'Air dan Drainase', 'Masalah air bersih, saluran air, dan banjir'),
(3, 'Udara dan Polusi', 'Masalah pencemaran udara dan kebisingan'),
(4, 'Tanaman dan Ruang Terbuka Hijau', 'Masalah penghijauan, pohon, dan taman'),
(5, 'Satwa dan Hewan Liar', 'Masalah hewan liar, penelantaran, atau gangguan hewan'),
(6, 'Pencemaran dan Limbah Industri', 'Masalah limbah pabrik, bahan beracun, atau pencemaran industri'),
(7, 'Kebakaran dan Bahan Berbahaya', 'Masalah pembakaran liar, tumpahan bahan kimia, atau bahaya ledakan'),
(8, 'Kawasan dan Tata Ruang', 'Masalah penyalahgunaan lahan, pembangunan di area terlarang, atau penambangan liar'),
(9, 'Perilaku Masyarakat', 'Tindakan masyarakat yang merusak atau mengganggu lingkungan'),
(10, 'Lain-lain', 'Masalah lingkungan lainnya yang tidak termasuk kategori di atas');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `kabkot_id` int(10) UNSIGNED DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `alamat_lengkap` varchar(255) DEFAULT NULL,
  `tingkat_keparahan` tinyint(1) DEFAULT 1 COMMENT '\r\nTingkat keparahan\r\n\r\n1. sangat ringan\r\n2. ringan\r\n3. Sedang\r\n4. Berat\r\n5. Sangat berat',
  `status` enum('belum ditangani','ditugaskan','sudah ditangani','selesai','ditolak') NOT NULL DEFAULT 'belum ditangani',
  `tanggal_laporan` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `user_id`, `kategori_id`, `kabkot_id`, `deskripsi`, `foto`, `latitude`, `longitude`, `alamat_lengkap`, `tingkat_keparahan`, `status`, `tanggal_laporan`, `updated_at`) VALUES
(1, 1, 10, NULL, 'Tumpukan sampah di pinggir jalan utama menimbulkan bau tidak sedap.', 'uploads/sampah1.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 11:36:45', NULL),
(2, 2, 10, NULL, 'Air meluap dari selokan membuat jalan tergenang air.', 'uploads/banjir1.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 11:36:45', NULL),
(3, 3, 10, NULL, 'Asap tebal dari pabrik di kawasan industri.', 'uploads/polusi1.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 11:36:45', NULL),
(4, 1, 10, NULL, 'Kebakaran kecil di area hutan Dago.', 'uploads/kebakaran1.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 11:36:45', NULL),
(5, 2, 10, NULL, 'TPS sudah penuh dan warga mulai buang sampah di pinggir jalan.', 'uploads/sampah2.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 11:36:45', NULL),
(6, 1, 10, NULL, 'Tumpukan sampah di area pasar mulai menumpuk dan mengganggu pengunjung.', 'uploads/sampah3.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(7, 2, 10, NULL, 'Parit tersumbat menyebabkan banjir kecil setelah hujan deras.', 'uploads/banjir2.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(8, 3, 10, NULL, 'Sampah plastik berserakan di lapangan sepak bola.', 'uploads/sampah4.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(9, 1, 10, NULL, 'Sungai meluap ke pemukiman warga.', 'uploads/banjir3.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(10, 2, 10, NULL, 'Bau menyengat dari tempat pembuangan sampah liar.', 'uploads/sampah5.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(11, 3, 10, NULL, 'Drainase rusak sehingga air tidak mengalir dengan baik.', 'uploads/banjir4.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(12, 1, 10, NULL, 'Tumpukan kardus dan plastik di area ruko.', 'uploads/sampah6.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(13, 2, 10, NULL, 'Air menggenang di depan pintu rumah hingga setinggi mata kaki.', 'uploads/banjir5.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(14, 3, 10, NULL, 'Sampah rumah tangga dibuang sembarangan di pinggir sungai.', 'uploads/sampah7.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(15, 1, 10, NULL, 'Selokan mampet menyebabkan jalan licin dan berbahaya.', 'uploads/banjir6.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(16, 2, 10, NULL, 'Botol dan gelas plastik berserakan setelah acara warga.', 'uploads/sampah8.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(17, 3, 10, NULL, 'Air hujan tidak terserap karena kurangnya sumur resapan.', 'uploads/banjir7.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(18, 1, 10, NULL, 'Sampah menumpuk di belakang gedung olahraga.', 'uploads/sampah9.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(19, 2, 10, NULL, 'Air dari sungai meluap ke kebun dan merusak tanaman warga.', 'uploads/banjir8.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(20, 3, 10, NULL, 'Warga membuang sampah ke area kosong dekat perumahan.', 'uploads/sampah10.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(21, 1, 10, NULL, 'Banjir kembali terjadi setiap hujan deras.', 'uploads/banjir9.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(22, 2, 10, NULL, 'Sampah daun dan ranting menyumbat aliran sungai kecil.', 'uploads/sampah11.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(23, 3, 10, NULL, 'Pompa air tidak berfungsi sehingga air meluber ke jalan.', 'uploads/banjir10.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(24, 1, 10, NULL, 'Banyak sampah plastik kecil beterbangan di area taman.', 'uploads/sampah12.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(25, 2, 10, NULL, 'Air setinggi lutut menggenang di area pemukiman padat.', 'uploads/banjir11.jpg', NULL, NULL, NULL, 1, 'belum ditangani', '2025-11-10 17:05:27', NULL),
(26, 1, 5, 1, 'Ada badak masuk pemukiman, di tengah kota kok ada badak? lepas darimana?', '1763191101.jpg', -7.047194, 107.540911, NULL, 5, 'belum ditangani', '2025-11-15 07:18:21', NULL),
(27, 1, 1, 1, 'Di pinggir jalan sekitaran leuweung kaleng ada tumpukan sampah, agak menggangu pemandangan, padahal kalo gak ada sampah pemandangan di sini indah.', '1763191642.jpg', -7.047194, 107.540911, NULL, 3, 'belum ditangani', '2025-11-15 07:27:22', NULL),
(28, 1, 4, 1, 'di desa nagrak, sekitaran lapang futsal terbengkalai, ada pohon tumbang di jalan mau ke ladang', '1763194388.jpg', -7.047194, 107.540911, NULL, 3, 'belum ditangani', '2025-11-15 08:13:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penanganan`
--

CREATE TABLE `penanganan` (
  `id` int(11) NOT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tanggal_penanganan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_penanganan` enum('Diproses','Selesai') DEFAULT 'Diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','petugas') DEFAULT 'user',
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `no_hp`, `alamat`, `created_at`) VALUES
(1, 'Rio Adriana', 'rio@gmail.com', '123456', 'user', '081234567890', 'Jl. Merdeka No. 45, Bandung', '2025-11-10 11:33:31'),
(2, 'Siti Lestari', 'siti@gmail.com', '123456', 'user', '082145678912', 'Jl. Pasir Koja No. 12, Bandung', '2025-11-10 11:33:31'),
(3, 'Budi Santoso', 'budi@gmail.com', '123456', 'user', '081345678901', 'Jl. Cipaganti No. 7, Bandung', '2025-11-10 11:33:31'),
(4, 'Andika Putra', 'andika@gmail.com', '123456', 'petugas', '081234567001', 'Kantor DLH Bandung', '2025-11-10 11:33:31'),
(5, 'Admin Lingkungan', 'admin@dlh.go.id', '123456', 'admin', '081234567002', 'Kantor Dinas Lingkungan Hidup', '2025-11-10 11:33:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabkot`
--
ALTER TABLE `kabkot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_nama` (`nama`),
  ADD UNIQUE KEY `geojson_id` (`geojson_id`);

--
-- Indexes for table `kategori_laporan`
--
ALTER TABLE `kategori_laporan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `id_laporan` (`id_laporan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kabkot`
--
ALTER TABLE `kabkot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori_laporan`
--
ALTER TABLE `kategori_laporan`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_laporan` (`id_kategori`);

--
-- Constraints for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD CONSTRAINT `penanganan_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`) ON DELETE CASCADE,
  ADD CONSTRAINT `penanganan_ibfk_2` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
