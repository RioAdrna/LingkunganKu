-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2025 pada 15.51
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
-- Database: `lingkunganku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabkot`
--

CREATE TABLE `kabkot` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('Kabupaten','Kota') NOT NULL,
  `ibu_kota` varchar(100) DEFAULT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `geojson_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kabkot`
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
-- Struktur dari tabel `kategori_laporan`
--

CREATE TABLE `kategori_laporan` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `icon` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_laporan`
--

INSERT INTO `kategori_laporan` (`id_kategori`, `nama_kategori`, `deskripsi`, `icon`) VALUES
(1, 'Kebersihan dan Sampah', 'Masalah pengelolaan sampah dan kebersihan lingkungan', 'kategori1-sampah.png'),
(2, 'Air dan Drainase', 'Masalah air bersih, saluran air, dan banjir', 'kategori2-air.png'),
(3, 'Udara dan Polusi', 'Masalah pencemaran udara dan kebisingan', 'kategori3-polusi.png'),
(4, 'Tanaman dan Ruang Terbuka Hijau', 'Masalah penghijauan, pohon, dan taman', 'kategori4-tanaman.png'),
(5, 'Satwa dan Hewan Liar', 'Masalah hewan liar, penelantaran, atau gangguan hewan', 'kategori5-hewan.png'),
(6, 'Pencemaran dan Limbah Industri', 'Masalah limbah pabrik, bahan beracun, atau pencemaran industri', 'kategori6-limbah.png'),
(7, 'Kebakaran dan Bahan Berbahaya', 'Masalah pembakaran liar, tumpahan bahan kimia, atau bahaya ledakan', 'kategori7-kebakaran.png'),
(8, 'Kawasan dan Tata Ruang', 'Masalah penyalahgunaan lahan, pembangunan di area terlarang, atau penambangan liar', 'kategori8-kawasan.png'),
(9, 'Perilaku Masyarakat', 'Tindakan masyarakat yang merusak atau mengganggu lingkungan', 'kategori9-perilaku.png'),
(10, 'Lain-lain', 'Masalah lingkungan lainnya yang tidak termasuk kategori di atas', 'kategori10-lainnya.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
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
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `user_id`, `kategori_id`, `kabkot_id`, `deskripsi`, `foto`, `latitude`, `longitude`, `alamat_lengkap`, `tingkat_keparahan`, `status`, `tanggal_laporan`, `updated_at`) VALUES
(26, 1, 5, 1, 'Ada badak masuk pemukiman, di tengah kota kok ada badak? lepas darimana?', '1763191101.jpg', -7.047194, 107.540911, NULL, 5, 'belum ditangani', '2025-11-15 07:18:21', NULL),
(27, 1, 1, 1, 'Di pinggir jalan sekitaran leuweung kaleng ada tumpukan sampah, agak menggangu pemandangan, padahal kalo gak ada sampah pemandangan di sini indah.', '1763191642.jpg', -7.047194, 108.540911, NULL, 3, 'belum ditangani', '2025-11-15 07:27:22', NULL),
(28, 1, 4, 1, 'di desa nagrak, sekitaran lapang futsal terbengkalai, ada pohon tumbang di jalan mau ke ladang', '1763194388.jpg', -7.043400, 107.540923, NULL, 3, 'belum ditangani', '2025-11-15 08:13:08', NULL),
(29, 1, 8, 1, 'punten, tangga di pasar baru ada yang patah gagangnya', '1763272600.jpg', -7.064993, 107.539432, NULL, 4, 'belum ditangani', '2025-11-16 05:56:40', NULL),
(30, 1, 1, 8, 'Terkadang ada sampah berserakan di pintu masuk gang cenkly, tidak banyak sih sampahnya, bisa dibersihkan sendiri, tapi kalau muncul terus menggangu juga. Tolong dicari tahu siapa pelakunya', '1763277585.jpg', -7.220452, 107.886123, NULL, 3, 'belum ditangani', '2025-11-02 07:19:45', NULL),
(31, NULL, 1, 8, 'Udah penuh nih, tong sampah pinggir jalan haji ismail.', '1763286590.jpg', -7.220243, 107.886432, NULL, 4, 'belum ditangani', '2025-11-01 09:49:50', NULL),
(32, NULL, 9, 8, 'Aduh kumaha ieu, meresahkan kieu aya nu gelo amuk-amukan ka tengah jalan, lokasi sakitaran pantai santolo', '1763286756.jpg', -7.220500, 107.886000, NULL, 3, 'belum ditangani', '2025-11-16 09:52:36', NULL),
(33, 1, 1, 1, 'Tumpukan sampah di pinggir jalan semakin membesar.', 'f001.jpg', -7.020100, 107.540500, 'Jl. Soreang Raya', 3, 'belum ditangani', '2025-01-12 01:23:10', NULL),
(34, 2, 4, 1, 'Pohon tumbang menghalangi akses ke kebun warga.', 'f002.jpg', -7.020900, 107.541200, 'Desa Cangkuang', 2, 'ditugaskan', '2025-02-03 03:12:41', NULL),
(35, 3, 3, 1, 'Asap pembakaran liar mengganggu warga.', 'f003.jpg', -7.019800, 107.539900, 'Kampung Rancamanyar', 4, 'sudah ditangani', '2025-03-14 08:33:29', NULL),
(36, 1, 6, 2, 'Limbah cair diduga berasal dari pabrik dekat pemukiman.', 'f004.jpg', -6.838400, 107.497200, 'Jl. Raya Ngamprah', 5, 'belum ditangani', '2025-04-11 02:22:51', NULL),
(37, 2, 8, 2, 'Bangunan baru diduga melanggar tata ruang.', 'f005.jpg', -6.838000, 107.496800, 'Cimareme', 3, 'belum ditangani', '2025-05-19 04:03:17', NULL),
(38, 3, 1, 2, 'TPS liar muncul kembali setelah dibersihkan.', 'f006.jpg', -6.837900, 107.497500, 'Padalarang', 2, 'selesai', '2025-06-28 07:44:00', NULL),
(39, 1, 7, 3, 'Terjadi kebakaran kecil di gudang tua.', 'f007.jpg', -6.324200, 107.149900, 'Cikarang Selatan', 4, 'sudah ditangani', '2025-02-14 00:19:21', NULL),
(40, 2, 9, 3, 'Sekelompok pemuda merusak fasilitas umum.', 'f008.jpg', -6.324500, 107.149400, 'Cikarang Utara', 3, 'ditugaskan', '2025-04-01 06:22:55', NULL),
(41, 1, 10, 3, 'Ada laporan lainnya dari masyarakat sekitar.', 'f009.jpg', -6.323000, 107.149800, 'Cibitung', 1, 'belum ditangani', '2025-03-23 09:12:11', NULL),
(42, 3, 4, 4, 'Pohon besar rawan tumbang saat hujan.', 'f010.jpg', -6.482400, 106.843100, 'Cibinong Kota', 2, 'belum ditangani', '2025-03-18 02:02:14', NULL),
(43, 1, 1, 4, 'Sampah plastik menumpuk di sungai kecil.', 'f011.jpg', -6.482800, 106.842900, 'Jl. Raya Bogor', 4, 'belum ditangani', '2025-05-22 05:44:00', NULL),
(44, 2, 2, 4, 'Saluran air mampet menyebabkan genangan.', 'f012.jpg', -6.481900, 106.843400, 'Kecamatan Sukaraja', 3, 'ditugaskan', '2025-06-07 03:19:34', NULL),
(45, 3, 6, 5, 'Limbah pabrik mencemari area persawahan.', 'f013.jpg', -7.324400, 108.351300, 'Ciamis Barat', 5, 'belum ditangani', '2025-03-12 05:02:21', NULL),
(46, 1, 1, 5, 'Banyak sampah berserakan di pasar tradisional.', 'f014.jpg', -7.324000, 108.350900, 'Pasar Ciamis', 3, 'ditugaskan', '2025-04-05 07:11:53', NULL),
(47, 2, 3, 5, 'Asap pembakaran ban mengganggu pengguna jalan.', 'f015.jpg', -7.323700, 108.351500, 'Jl. Nasional III', 4, 'sudah ditangani', '2025-05-28 01:56:47', NULL),
(48, 3, 7, 6, 'Gudang tua terbakar sebagian akibat korsleting.', 'f016.jpg', -6.818600, 107.139200, 'Kota Cianjur', 5, 'sudah ditangani', '2025-02-16 20:22:11', NULL),
(49, 1, 8, 6, 'Bangunan liar muncul di area resapan air.', 'f017.jpg', -6.817900, 107.138400, 'Cipanas', 3, 'ditugaskan', '2025-03-09 10:18:39', NULL),
(50, 2, 4, 6, 'Pohon tumbang mengenai kabel listrik.', 'f018.jpg', -6.818200, 107.139000, 'Cianjur Selatan', 4, 'belum ditangani', '2025-04-22 04:08:02', NULL),
(51, 3, 1, 7, 'TPS liar kembali muncul di dekat terminal.', 'f019.jpg', -6.763200, 108.487200, 'Sumber', 3, 'belum ditangani', '2025-05-11 02:33:14', NULL),
(52, 1, 3, 7, 'Bau menyengat dari pembakaran sampah.', 'f020.jpg', -6.762600, 108.486600, 'Kabupaten Cirebon', 4, 'belum ditangani', '2025-06-14 07:55:12', NULL),
(53, 2, 2, 7, 'Drainase buruk membuat air meluap.', 'f021.jpg', -6.763000, 108.487000, 'Plered', 2, 'ditugaskan', '2025-07-03 10:44:50', NULL),
(54, 3, 6, 8, 'Limbah cair mencemari sungai kecil.', 'f022.jpg', -7.220800, 107.886200, 'Tarogong Kidul', 5, 'belum ditangani', '2025-02-23 05:14:33', NULL),
(55, 1, 1, 8, 'Sampah plastik menumpuk di area wisata.', 'f023.jpg', -7.220400, 107.886500, 'Garut Kota', 3, 'belum ditangani', '2025-04-27 09:22:57', NULL),
(56, 2, 9, 8, 'Warga melakukan vandalisme di tembok sekolah.', 'f024.jpg', -7.220600, 107.886300, 'Cisurupan', 2, 'ditugaskan', '2025-06-19 11:43:01', NULL),
(57, 3, 3, 9, 'Asap pabrik menyebar ke pemukiman warga.', 'f025.jpg', -6.327300, 108.323300, 'Indramayu', 4, 'belum ditangani', '2025-03-13 00:11:30', NULL),
(58, 1, 4, 9, 'Pohon besar hampir tumbang dekat kantor desa.', 'f026.jpg', -6.326800, 108.323100, 'Sindang', 3, 'selesai', '2025-04-05 06:44:18', NULL),
(59, 2, 1, 9, 'TPS penuh dan meluber ke jalan.', 'f027.jpg', -6.327100, 108.322900, 'Jl. Pantura Indramayu', 2, 'belum ditangani', '2025-05-09 03:22:41', NULL),
(60, 3, 3, 10, 'Asap kendaraan berat meningkatkan polusi udara.', 'f028.jpg', -6.301800, 107.304400, 'Karawang Barat', 3, 'belum ditangani', '2025-02-04 01:19:51', NULL),
(61, 1, 7, 10, 'Kebakaran kecil terjadi di lahan kosong.', 'f029.jpg', -6.301200, 107.303800, 'Karawang Timur', 4, 'sudah ditangani', '2025-03-18 08:01:11', NULL),
(62, 2, 1, 10, 'Sampah plastik menumpuk di bahu jalan.', 'f030.jpg', -6.301500, 107.304100, 'Cikampek', 2, 'belum ditangani', '2025-05-22 02:34:17', NULL),
(63, 3, 4, 11, 'Pohon besar tumbang saat hujan deras.', 'f031.jpg', -6.975300, 108.484300, 'Kuningan', 3, 'ditugaskan', '2025-06-14 05:22:00', NULL),
(64, 1, 2, 11, 'Air sungai meluap dan membanjiri jalan.', 'f032.jpg', -6.975700, 108.484100, 'Cigugur', 4, 'belum ditangani', '2025-04-29 11:55:34', NULL),
(65, 2, 1, 11, 'Sampah menumpuk di pasar tradisional.', 'f033.jpg', -6.975400, 108.484600, 'Kuningan Kota', 2, 'selesai', '2025-03-07 02:33:10', NULL),
(66, 3, 5, 12, 'Hewan liar memasuki pemukiman warga.', 'f034.jpg', -6.834200, 108.223400, 'Majalengka', 3, 'belum ditangani', '2025-04-12 06:41:00', NULL),
(67, 1, 3, 12, 'Asap pembakaran sampah terlihat dari kejauhan.', 'f035.jpg', -6.833900, 108.222700, 'Kadipaten', 4, 'belum ditangani', '2025-05-01 09:14:22', NULL),
(68, 2, 8, 12, 'Pembangunan liar terlihat di area hijau.', 'f036.jpg', -6.834300, 108.223200, 'Jatiwangi', 3, 'ditugaskan', '2025-06-02 04:45:50', NULL),
(69, 3, 1, 13, 'Sampah berserakan di area pantai.', 'f037.jpg', -7.683600, 108.490400, 'Pangandaran', 3, 'belum ditangani', '2025-04-18 03:33:29', NULL),
(70, 1, 2, 13, 'Drainase buruk menyebabkan banjir kecil.', 'f038.jpg', -7.683200, 108.489900, 'Parigi', 2, 'ditugaskan', '2025-05-09 07:41:21', NULL),
(71, 2, 7, 13, 'Api muncul di lahan kosong dekat pantai.', 'f039.jpg', -7.683500, 108.490200, 'Cijulang', 5, 'sudah ditangani', '2025-06-21 00:22:54', NULL),
(72, 3, 1, 27, 'Sampah berserakan di depan terminal.', 'f100.jpg', -7.336800, 108.220500, 'Terminal Tasikmalaya', 3, 'belum ditangani', '2025-11-05 06:55:20', NULL),
(73, 1, 1, 19, 'Tumpukan sampah plastik menutupi trotoar dekat Alun-alun, baunya sangat menyengat.', 'sampah_bdg_01.jpg', -6.917500, 107.619100, 'Jl. Asia Afrika No. 10, Kota Bandung', 3, 'belum ditangani', '2025-11-01 01:30:00', NULL),
(74, 2, 2, 19, 'Saluran air mampet di Pagarsih, air meluap ke jalan setiap hujan deras.', 'banjir_pgr_02.jpg', -6.925000, 107.590000, 'Jl. Pagarsih, Kota Bandung', 4, 'ditugaskan', '2025-11-01 07:15:00', NULL),
(75, 3, 3, 23, 'Asap pembakaran sampah dari lahan kosong tetangga masuk ke perumahan warga.', 'asap_cimahi.jpg', -6.891300, 107.540000, 'Komplek Fajar Raya, Cimahi', 2, 'sudah ditangani', '2025-11-02 02:00:00', NULL),
(76, 1, 1, 1, 'Sampah pasar tumpah ke badan jalan di Soreang, macet dan bau.', 'sampah_soreang.jpg', -7.020300, 107.540000, 'Pasar Soreang, Kab. Bandung', 3, 'selesai', '2025-11-02 03:45:00', NULL),
(77, 2, 4, 2, 'Pohon besar di jalan raya Lembang sudah miring, berpotensi tumbang menimpa pengendara.', 'pohon_lembang.jpg', -6.838100, 107.496900, 'Jl. Raya Lembang, Bandung Barat', 5, 'belum ditangani', '2025-11-03 00:20:00', NULL),
(78, 3, 9, 19, 'Ada warga buang kasur bekas ke sungai Cikapundung.', 'perilaku_cikapundung.jpg', -6.900000, 107.610000, 'Bantaran Sungai Cikapundung', 4, 'belum ditangani', '2025-11-03 04:10:00', NULL),
(79, 1, 10, 23, 'Coretan vandalisme di tembok fasilitas umum taman kota.', 'vandal_cimahi.jpg', -6.895000, 107.545000, 'Taman Kartini, Cimahi', 1, 'ditolak', '2025-11-04 09:00:00', NULL),
(80, 2, 5, 1, 'Monyet liar turun ke pemukiman warga di Dago Pakar, mengacak-acak tempat sampah.', 'monyet_dago.jpg', -6.870000, 107.630000, 'Resor Dago Pakar, Kab. Bandung', 2, 'belum ditangani', '2025-11-05 01:00:00', NULL),
(81, 3, 1, 19, 'Tong sampah di halte bus TMB penuh dan tidak diangkut selama 3 hari.', 'tong_penuh.jpg', -6.940000, 107.660000, 'Halte Soekarno Hatta', 2, 'belum ditangani', '2025-11-05 06:30:00', NULL),
(82, 1, 2, 2, 'Drainase jalan di Padalarang tertutup beton pembangunan ruko, air tidak mengalir.', 'drainase_padalarang.jpg', -6.840000, 107.480000, 'Kawasan Kota Baru Parahyangan', 3, 'ditugaskan', '2025-11-06 02:15:00', NULL),
(83, 2, 8, 4, 'Pembangunan villa ilegal di kawasan resapan air Puncak.', 'villa_puncak.jpg', -6.700000, 106.900000, 'Kawasan Puncak, Kab. Bogor', 5, 'belum ditangani', '2025-11-06 03:00:00', NULL),
(84, 3, 2, 22, 'Sungai Ciliwung meluap membawa banyak sampah kiriman.', 'ciliwung_bogor.jpg', -6.595000, 106.799500, 'Bendung Katulampa, Kota Bogor', 4, 'sudah ditangani', '2025-11-06 23:00:00', NULL),
(85, 1, 3, 25, 'Polusi udara parah di jalan Margonda saat jam sibuk, butuh penghijauan tambahan.', 'asap_margonda.jpg', -6.402500, 106.794200, 'Jl. Margonda Raya, Depok', 3, 'belum ditangani', '2025-11-07 10:00:00', NULL),
(86, 2, 6, 4, 'Diduga ada limbah pabrik tahu dibuang langsung ke sungai kecil di Citeureup.', 'limbah_tahu.jpg', -6.480000, 106.880000, 'Kec. Citeureup, Kab. Bogor', 4, 'belum ditangani', '2025-11-08 04:00:00', NULL),
(87, 3, 1, 26, 'Tumpukan sampah di pasar Pelita Sukabumi menghalangi jalan masuk.', 'pasar_pelita.jpg', -6.922000, 106.925000, 'Pasar Pelita, Kota Sukabumi', 3, 'selesai', '2025-11-08 05:30:00', NULL),
(88, 1, 5, 16, 'Kemunculan buaya muara di dekat pantai Palabuhanratu, meresahkan wisatawan.', 'buaya_pelabuhan.jpg', -6.989000, 106.541000, 'Pantai Palabuhanratu', 5, 'ditugaskan', '2025-11-09 02:00:00', NULL),
(89, 2, 4, 22, 'Pohon angsana tua di Kebun Raya akarnya merusak trotoar luar.', 'akar_pohon.jpg', -6.600000, 106.800000, 'Keliling Kebun Raya Bogor', 2, 'belum ditangani', '2025-11-09 08:45:00', NULL),
(90, 3, 7, 25, 'Ada pembakaran kabel bekas untuk ambil tembaga, asap hitam pekat.', 'bakar_kabel.jpg', -6.410000, 106.810000, 'Sawangan, Depok', 4, 'belum ditangani', '2025-11-10 03:10:00', NULL),
(91, 1, 2, 16, 'Tanah longsor kecil menutupi selokan desa di Cisolok.', 'longsor_cisolok.jpg', -6.950000, 106.450000, 'Kec. Cisolok, Kab. Sukabumi', 3, 'belum ditangani', '2025-11-10 09:20:00', NULL),
(92, 2, 1, 4, 'Sampah liar di pinggir rel kereta api Bojong Gede.', 'sampah_rel.jpg', -6.490000, 106.800000, 'Stasiun Bojong Gede', 3, 'sudah ditangani', '2025-11-11 01:00:00', NULL),
(93, 3, 6, 3, 'Limbah cair berwarna hitam pekat mengalir di sungai Citarum sektor Bekasi.', 'limbah_hitam.jpg', -6.323900, 107.149300, 'Bantargebang, Kab. Bekasi', 5, 'belum ditangani', '2025-11-11 02:00:00', NULL),
(94, 1, 3, 21, 'Bau bahan kimia menyengat dari pabrik di Rawa Lumbu setiap malam.', 'bau_kimia.jpg', -6.234800, 106.996600, 'Rawa Lumbu, Kota Bekasi', 4, 'ditugaskan', '2025-11-12 16:00:00', NULL),
(95, 2, 1, 10, 'Sampah industri konveksi dibuang sembarangan di lahan kosong.', 'kain_perca.jpg', -6.301300, 107.304000, 'Karawang Timur', 3, 'belum ditangani', '2025-11-12 07:00:00', NULL),
(96, 3, 2, 10, 'Banjir rob sering masuk ke tambak warga karena tanggul rusak.', 'rob_karawang.jpg', -6.200000, 107.350000, 'Pesisir Karawang', 4, 'belum ditangani', '2025-11-13 03:00:00', NULL),
(97, 1, 6, 14, 'Pencemaran air waduk Jatiluhur oleh pakan ikan berlebih (keramba jaring apung).', 'kja_jatiluhur.jpg', -6.556000, 107.443000, 'Waduk Jatiluhur, Purwakarta', 3, 'selesai', '2025-11-13 01:30:00', NULL),
(98, 2, 3, 3, 'Debu proyek pembangunan apartemen di Cikarang sangat tebal.', 'debu_proyek.jpg', -6.310000, 107.160000, 'Cikarang Pusat', 2, 'belum ditangani', '2025-11-14 04:00:00', NULL),
(99, 3, 9, 21, 'Warga membakar sampah elektronik di pinggir kali.', 'bakar_ewaste.jpg', -6.240000, 107.000000, 'Jatiasih, Bekasi', 4, 'belum ditangani', '2025-11-14 08:15:00', NULL),
(100, 1, 4, 14, 'Taman Sri Baduga kurang terawat, banyak tanaman mati kekeringan.', 'taman_kering.jpg', -6.550000, 107.440000, 'Situ Buleud, Purwakarta', 2, 'belum ditangani', '2025-11-15 02:00:00', NULL),
(101, 2, 5, 10, 'Ular sanca sering terlihat di tumpukan barang bekas pabrik.', 'ular_sanca.jpg', -6.320000, 107.310000, 'Kawasan KIIC Karawang', 3, 'sudah ditangani', '2025-11-15 06:45:00', NULL),
(102, 3, 8, 3, 'Alih fungsi lahan sawah produktif menjadi gudang tanpa izin.', 'sawah_gudang.jpg', -6.330000, 107.150000, 'Cibitung, Bekasi', 4, 'belum ditangani', '2025-11-16 03:00:00', NULL),
(103, 1, 1, 24, 'Sampah laut menumpuk di pesisir Kejawanan.', 'sampah_laut.jpg', -6.711800, 108.558300, 'Pantai Kejawanan, Kota Cirebon', 3, 'belum ditangani', '2025-11-16 00:00:00', NULL),
(104, 2, 7, 9, 'Kebakaran lahan tebu karena puntung rokok.', 'kebakaran_tebu.jpg', -6.327000, 108.323000, 'Perkebunan Tebu Indramayu', 5, 'selesai', '2025-11-16 07:00:00', NULL),
(105, 3, 8, 11, 'Penambangan pasir batu liar di kaki Gunung Ciremai merusak jalan.', 'tambang_liar.jpg', -6.975600, 108.484000, 'Cigugur, Kuningan', 5, 'ditugaskan', '2025-11-17 04:30:00', NULL),
(106, 1, 3, 7, 'Debu dari pabrik semen sangat mengganggu pernapasan warga Palimanan.', 'debu_semen.jpg', -6.720000, 108.420000, 'Palimanan, Kab. Cirebon', 4, 'belum ditangani', '2025-11-17 02:00:00', NULL),
(107, 2, 2, 12, 'Irigasi persawahan di Kertajati tertimbun material proyek bandara.', 'irigasi_rusak.jpg', -6.834000, 108.223000, 'Kertajati, Majalengka', 3, 'belum ditangani', '2025-11-18 01:15:00', NULL),
(108, 3, 4, 24, 'Pohon pelindung jalan ditebang sembarangan oleh pemilik toko.', 'tebang_pohon.jpg', -6.715000, 108.560000, 'Jl. Kartini, Cirebon', 3, 'sudah ditangani', '2025-11-18 03:00:00', NULL),
(109, 1, 5, 11, 'Kucing liar sakit dan terlantar banyak berkeliaran di pasar.', 'kucing_pasar.jpg', -6.980000, 108.490000, 'Pasar Baru Kuningan', 2, 'belum ditangani', '2025-11-19 09:00:00', NULL),
(110, 2, 6, 9, 'Tumpahan minyak mentah mencemari pantai Balongan.', 'minyak_balongan.jpg', -6.350000, 108.350000, 'Balongan, Indramayu', 5, 'ditugaskan', '2025-11-18 23:30:00', NULL),
(111, 3, 1, 12, 'Sampah objek wisata Panyaweuyan tidak ada yang mengangkut.', 'sampah_wisata.jpg', -6.850000, 108.250000, 'Terasering Panyaweuyan', 2, 'belum ditangani', '2025-11-20 04:00:00', NULL),
(112, 1, 9, 7, 'Warga mencuci jeroan hewan kurban di sungai, air jadi bau amis.', 'cuci_sungai.jpg', -6.760000, 108.480000, 'Sumber, Cirebon', 3, 'selesai', '2025-11-20 06:00:00', NULL),
(113, 2, 4, 18, 'Hutan lindung gundul akibat penebangan liar di Tasik Selatan.', 'hutan_gundul.jpg', -7.355000, 108.113000, 'Cipatujah, Kab. Tasikmalaya', 5, 'belum ditangani', '2025-11-15 03:00:00', NULL),
(114, 3, 1, 27, 'Sampah plastik menumpuk di selokan pasar Cikurubuk.', 'sampah_cikurubuk.jpg', -7.336400, 108.220800, 'Pasar Cikurubuk, Kota Tasik', 3, 'ditugaskan', '2025-11-16 01:45:00', NULL),
(115, 1, 5, 8, 'Elang Jawa terlihat diperjualbelikan secara ilegal di pasar hewan.', 'satwa_ilegal.jpg', -7.220500, 107.886000, 'Pasar Hewan Garut', 5, 'belum ditangani', '2025-11-16 05:00:00', NULL),
(116, 2, 6, 8, 'Limbah pengolahan kulit Sukaregang langsung ke sungai, bau menyengat.', 'kulit_sukaregang.jpg', -7.210000, 107.900000, 'Sukaregang, Garut', 4, 'sudah ditangani', '2025-11-17 07:00:00', NULL),
(117, 3, 2, 5, 'Banjir lumpur sering terjadi di Panawangan saat hujan.', 'banjir_lumpur.jpg', -7.323900, 108.351000, 'Kec. Panawangan, Ciamis', 3, 'belum ditangani', '2025-11-17 09:00:00', NULL),
(118, 1, 1, 13, 'Pantai Pangandaran kotor oleh sampah wisatawan pasca libur panjang.', 'pantai_kotor.jpg', -7.683300, 108.490000, 'Pantai Barat Pangandaran', 3, 'selesai', '2025-11-18 00:00:00', NULL),
(119, 2, 10, 18, 'Jalan desa rusak parah akibat truk pasir berlebih muatan.', 'jalan_rusak.jpg', -7.360000, 108.120000, 'Singaparna', 3, 'belum ditangani', '2025-11-18 02:30:00', NULL),
(120, 3, 3, 27, 'Pembakaran sekam padi mengganggu jarak pandang jalan raya.', 'asap_sekam.jpg', -7.340000, 108.230000, 'Indihiang, Tasikmalaya', 2, 'belum ditangani', '2025-11-19 08:00:00', NULL),
(121, 1, 8, 5, 'Bangunan liar berdiri di bantaran citanduy.', 'bangunan_liar.jpg', -7.330000, 108.360000, 'Ciamis Kota', 3, 'belum ditangani', '2025-11-19 03:00:00', NULL),
(122, 2, 2, 13, 'Air sumur warga di Parigi terasa asin, diduga intrusi air laut.', 'air_asin.jpg', -7.690000, 108.500000, 'Parigi, Pangandaran', 4, 'ditugaskan', '2025-11-20 01:00:00', NULL),
(123, 3, 8, 17, 'Proyek tol Cisumdawu menyisakan tanah merah yang licin di jalan warga.', 'tanah_tol.jpg', -6.836000, 107.921000, 'Pamulihan, Sumedang', 3, 'belum ditangani', '2025-11-15 04:00:00', NULL),
(124, 1, 2, 15, 'Banjir Pamanukan merendam sawah dan rumah.', 'banjir_pamanukan.jpg', -6.570000, 107.758000, 'Pamanukan, Subang', 5, 'belum ditangani', '2025-11-15 22:00:00', NULL),
(125, 2, 4, 17, 'Hutan di Cadas Pangeran banyak sampah dibuang pengendara.', 'sampah_cadas.jpg', -6.860000, 107.880000, 'Cadas Pangeran', 2, 'selesai', '2025-11-16 06:00:00', NULL),
(126, 3, 6, 15, 'Bau busuk dari peternakan ayam dekat pemukiman.', 'bau_ayam.jpg', -6.580000, 107.760000, 'Cijambe, Subang', 3, 'belum ditangani', '2025-11-17 02:30:00', NULL),
(127, 1, 1, 17, 'Sampah menumpuk di depan kampus Jatinangor.', 'sampah_jatinangor.jpg', -6.930000, 107.770000, 'Jatinangor, Sumedang', 3, 'sudah ditangani', '2025-11-17 03:00:00', NULL),
(128, 2, 3, 15, 'Asap pembakaran jerami sisa panen di Jalancagak.', 'asap_jerami.jpg', -6.650000, 107.700000, 'Jalancagak, Subang', 2, 'belum ditangani', '2025-11-18 09:00:00', NULL),
(129, 3, 7, 17, 'Ada warga menimbun BBM di rumah padat penduduk.', 'timbun_bbm.jpg', -6.840000, 107.930000, 'Sumedang Utara', 5, 'ditugaskan', '2025-11-18 12:00:00', NULL),
(130, 1, 5, 15, 'Babi hutan masuk ke kebun nanas warga.', 'babi_hutan.jpg', -6.600000, 107.750000, 'Ciater, Subang', 3, 'belum ditangani', '2025-11-18 23:00:00', NULL),
(131, 2, 9, 17, 'Pemuda mabuk merusak pot bunga di alun-alun Sumedang.', 'rusak_pot.jpg', -6.835000, 107.920000, 'Alun-alun Sumedang', 2, 'selesai', '2025-11-19 14:00:00', NULL),
(132, 3, 2, 15, 'Saluran irigasi Pantura tersumbat sampah plastik.', 'irigasi_pantura.jpg', -6.550000, 107.800000, 'Pantura Subang', 3, 'belum ditangani', '2025-11-20 05:00:00', NULL),
(133, 1, 1, 19, 'Sampah di pasar Andir meluber ke jalan.', 'pasar_andir.jpg', -6.915000, 107.580000, 'Pasar Andir, Bandung', 3, 'belum ditangani', '2025-11-01 02:00:00', NULL),
(134, 2, 1, 21, 'TPS liar di lahan kosong Bintara.', 'tps_liar_bekasi.jpg', -6.230000, 106.970000, 'Bintara, Bekasi', 4, 'belum ditangani', '2025-11-02 01:00:00', NULL),
(135, 3, 2, 25, 'Genangan air setinggi 30cm di jalan Arif Rahman Hakim.', 'banjir_depok.jpg', -6.390000, 106.820000, 'Beji, Depok', 3, 'ditugaskan', '2025-11-03 08:00:00', NULL),
(136, 1, 3, 23, 'Polusi udara dari kendaraan tua di Leuwigajah.', 'polusi_cimahi.jpg', -6.880000, 107.530000, 'Leuwigajah, Cimahi', 2, 'belum ditangani', '2025-11-04 03:00:00', NULL),
(137, 2, 4, 22, 'Ranting pohon menutupi rambu lalu lintas.', 'ranting.jpg', -6.590000, 106.810000, 'Tajur, Bogor', 1, 'selesai', '2025-11-05 04:00:00', NULL),
(138, 3, 1, 20, 'Tong sampah pecah di taman kota Banjar.', 'tong_pecah.jpg', -7.370000, 108.540000, 'Banjar Kota', 1, 'belum ditangani', '2025-11-06 06:00:00', NULL),
(139, 1, 2, 14, 'Selokan mampet di depan kantor bupati.', 'selokan_pwk.jpg', -6.560000, 107.450000, 'Purwakarta', 2, 'sudah ditangani', '2025-11-07 02:00:00', NULL),
(140, 2, 6, 10, 'Limbah cair berwarna merah di sungai Citarum.', 'limbah_merah.jpg', -6.350000, 107.250000, 'Telukjambe, Karawang', 5, 'belum ditangani', '2025-11-08 03:00:00', NULL),
(141, 3, 5, 16, 'Anjing liar galak mengejar anak sekolah.', 'anjing_galak.jpg', -6.990000, 106.550000, 'Cibadak, Sukabumi', 4, 'ditugaskan', '2025-11-09 00:00:00', NULL),
(142, 1, 9, 2, 'Warga membakar sampah plastik di pinggir jalan.', 'bakar_plastik.jpg', -6.850000, 107.500000, 'Ngamprah', 3, 'belum ditangani', '2025-11-10 09:00:00', NULL),
(143, 2, 1, 19, 'Got mampet penuh botol minuman.', 'got_mampet.jpg', -6.920000, 107.620000, 'Kiaracondong, Bandung', 2, 'selesai', '2025-11-11 05:00:00', NULL),
(144, 3, 2, 21, 'Banjir di perumahan Galaxy Bekasi.', 'banjir_galaxy.jpg', -6.260000, 106.980000, 'Bekasi Selatan', 4, 'belum ditangani', '2025-11-12 07:00:00', NULL),
(145, 1, 8, 4, 'Tanah bergerak di desa Sukajaya.', 'tanah_gerak.jpg', -6.550000, 106.600000, 'Sukajaya, Bogor', 5, 'ditugaskan', '2025-11-13 01:00:00', NULL),
(146, 2, 10, 24, 'Lampu jalan mati di daerah rawan sampah liar.', 'pju_mati.jpg', -6.730000, 108.570000, 'Harjamukti, Cirebon', 2, 'belum ditangani', '2025-11-14 12:00:00', NULL),
(147, 3, 1, 27, 'Sampah menumpuk di TPS dadakan.', 'tps_dadakan.jpg', -7.350000, 108.240000, 'Kawalu, Tasik', 3, 'belum ditangani', '2025-11-15 00:00:00', NULL),
(148, 1, 3, 10, 'Bau amis dari pabrik pengalengan ikan.', 'bau_ikan.jpg', -6.310000, 107.320000, 'Karawang Barat', 3, 'sudah ditangani', '2025-11-16 04:00:00', NULL),
(149, 2, 4, 1, 'Taman tidak terawat di Soreang.', 'taman_soreang.jpg', -7.030000, 107.530000, 'Kutawaringin', 1, 'belum ditangani', '2025-11-17 03:00:00', NULL),
(150, 3, 2, 3, 'Kali Bekasi berbusa tebal.', 'busa_bekasi.jpg', -6.250000, 107.010000, 'Bekasi Timur', 4, 'belum ditangani', '2025-11-18 02:00:00', NULL),
(151, 1, 6, 15, 'Limbah tahu mencemari kolam ikan warga.', 'limbah_kolam.jpg', -6.560000, 107.770000, 'Pagaden, Subang', 3, 'selesai', '2025-11-19 06:00:00', NULL),
(152, 2, 7, 12, 'Kebakaran hutan kecil di lereng Ciremai.', 'bakar_hutan.jpg', -6.840000, 108.230000, 'Argapura, Majalengka', 5, 'ditugaskan', '2025-11-20 08:00:00', NULL),
(153, 3, 1, 19, 'Sampah botol plastik di Braga.', 'sampah_braga.jpg', -6.918000, 107.610000, 'Jl. Braga, Bandung', 2, 'belum ditangani', '2025-11-01 13:00:00', NULL),
(154, 1, 5, 2, 'Ular masuk dapur warga.', 'ular_dapur.jpg', -6.850000, 107.490000, 'Padalarang', 4, 'sudah ditangani', '2025-11-02 01:00:00', NULL),
(155, 2, 8, 4, 'Parkir liar di trotoar pedestrian.', 'parkir_liar.jpg', -6.600000, 106.810000, 'Bogor Tengah', 2, 'belum ditangani', '2025-11-03 04:00:00', NULL),
(156, 3, 9, 25, 'Membuang puntung rokok sembarangan di taman.', 'puntung_rokok.jpg', -6.400000, 106.800000, 'Taman Merdeka, Depok', 1, 'belum ditangani', '2025-11-04 07:00:00', NULL),
(157, 1, 1, 23, 'Sampah di pasar antri Cimahi.', 'pasar_antri.jpg', -6.890000, 107.550000, 'Pasar Antri', 3, 'selesai', '2025-11-05 02:00:00', NULL),
(158, 2, 2, 16, 'Selokan penuh lumpur.', 'lumpur_selokan.jpg', -6.930000, 106.930000, 'Cisaat', 2, 'belum ditangani', '2025-11-06 03:00:00', NULL),
(159, 3, 3, 21, 'Asap knalpot bis kota.', 'asap_bis.jpg', -6.240000, 107.000000, 'Terminal Bekasi', 3, 'belum ditangani', '2025-11-07 09:00:00', NULL),
(160, 1, 4, 19, 'Pohon tumbang di Dago.', 'pohon_tumbang_dago.jpg', -6.880000, 107.610000, 'Dago, Bandung', 4, 'ditugaskan', '2025-11-08 08:00:00', NULL),
(161, 2, 10, 20, 'Graffiti tidak senonoh di dinding sekolah.', 'graffiti.jpg', -7.375000, 108.535000, 'Banjar', 2, 'belum ditangani', '2025-11-09 04:00:00', NULL),
(162, 3, 1, 22, 'Sampah di sungai Cisadane.', 'sampah_cisadane.jpg', -6.610000, 106.790000, 'Empang, Bogor', 4, 'belum ditangani', '2025-11-10 01:00:00', NULL),
(163, 1, 6, 10, 'Limbah cair bau di Karawang.', 'limbah_cair.jpg', -6.310000, 107.290000, 'Klari', 4, 'belum ditangani', '2025-11-11 02:30:00', NULL),
(164, 2, 5, 7, 'Kera liar ganggu warga.', 'kera_plangon.jpg', -6.770000, 108.490000, 'Plangon, Cirebon', 3, 'selesai', '2025-11-12 06:00:00', NULL),
(165, 3, 2, 14, 'Air keruh di Situ Wanayasa.', 'air_keruh.jpg', -6.680000, 107.560000, 'Wanayasa', 2, 'belum ditangani', '2025-11-13 03:00:00', NULL),
(166, 1, 8, 17, 'Galian C ilegal.', 'galian_c.jpg', -6.820000, 107.950000, 'Tomo, Sumedang', 5, 'ditugaskan', '2025-11-14 07:00:00', NULL),
(167, 2, 1, 26, 'Sampah plastik berserakan.', 'plastik_sukabumi.jpg', -6.925000, 106.920000, 'Baros, Sukabumi', 2, 'belum ditangani', '2025-11-15 09:00:00', NULL),
(168, 3, 4, 24, 'Ranting pohon kena kabel listrik.', 'ranting_kabel.jpg', -6.720000, 108.550000, 'Kesambi, Cirebon', 5, 'belum ditangani', '2025-11-16 05:00:00', NULL),
(169, 1, 9, 19, 'Orang buang sampah dari mobil.', 'sampah_mobil.jpg', -6.950000, 107.650000, 'Gedebage', 2, 'belum ditangani', '2025-11-17 01:00:00', NULL),
(170, 2, 3, 3, 'Pembakaran sampah di lahan kosong.', 'bakar_lahan.jpg', -6.340000, 107.140000, 'Cikarang Selatan', 3, 'sudah ditangani', '2025-11-18 10:00:00', NULL),
(171, 3, 2, 1, 'Banjir cileuncang.', 'cileuncang.jpg', -7.000000, 107.550000, 'Katapang', 3, 'belum ditangani', '2025-11-19 08:30:00', NULL),
(172, 1, 1, 25, 'Sampah di setu.', 'sampah_setu.jpg', -6.410000, 106.820000, 'Setu Babakan', 3, 'selesai', '2025-11-20 04:00:00', NULL),
(173, 2, 5, 4, 'Biawak masuk rumah.', 'biawak.jpg', -6.470000, 106.850000, 'Cibinong', 3, 'belum ditangani', '2025-11-01 06:00:00', NULL),
(174, 3, 6, 21, 'Oli bekas dibuang ke selokan.', 'oli_bekas.jpg', -6.250000, 106.960000, 'Jatibening', 4, 'ditugaskan', '2025-11-02 03:00:00', NULL),
(175, 1, 4, 19, 'Pohon tua lapuk.', 'pohon_lapuk.jpg', -6.910000, 107.600000, 'Cihampelas', 4, 'belum ditangani', '2025-11-03 02:00:00', NULL),
(176, 2, 1, 23, 'Tumpukan kardus bekas.', 'kardus_bekas.jpg', -6.890000, 107.560000, 'Cibeber', 1, 'selesai', '2025-11-04 07:00:00', NULL),
(177, 3, 8, 2, 'Bangunan di bantaran sungai.', 'bangunan_sungai.jpg', -6.840000, 107.470000, 'Batujajar', 4, 'belum ditangani', '2025-11-05 04:00:00', NULL),
(178, 1, 2, 10, 'Drainase tersumbat beton.', 'sumbat_beton.jpg', -6.320000, 107.330000, 'Galuh Mas', 3, 'belum ditangani', '2025-11-06 08:00:00', NULL),
(179, 2, 3, 22, 'Bau sampah dari truk lewat.', 'truk_sampah.jpg', -6.580000, 106.780000, 'Yasmin, Bogor', 2, 'sudah ditangani', '2025-11-07 01:00:00', NULL),
(180, 3, 7, 4, 'Tabung gas bocor meledak di warung.', 'gas_meledak.jpg', -6.450000, 106.830000, 'Cilodong', 5, 'selesai', '2025-11-08 05:00:00', NULL),
(181, 1, 1, 12, 'Sampah di alun-alun.', 'alun_majalengka.jpg', -6.835000, 108.225000, 'Alun-alun Majalengka', 2, 'belum ditangani', '2025-11-09 09:00:00', NULL),
(182, 2, 10, 19, 'Lampu taman pecah.', 'lampu_pecah.jpg', -6.905000, 107.615000, 'Taman Lansia', 1, 'belum ditangani', '2025-11-10 03:00:00', NULL),
(183, 1, 1, 2, 'Sampah bekas makanan wisatawan berserakan di area parkir Farmhouse.', 'sampah_wisata_lembang.jpg', -6.820000, 107.600000, 'Jl. Raya Lembang No. 108', 2, 'belum ditangani', '2025-11-01 01:15:00', NULL),
(184, 2, 3, 19, 'Asap sate dan bakaran jagung pinggir jalan sangat pekat mengganggu pejalan kaki.', 'asap_kuliner.jpg', -6.900000, 107.610000, 'Jl. Dipatiukur, Bandung', 2, 'selesai', '2025-11-01 12:00:00', NULL),
(185, 3, 8, 1, 'Ada pembangunan cafe baru di kawasan hutan lindung Ciwidey tanpa plang izin.', 'bangunan_ciwidey.jpg', -7.120000, 107.440000, 'Ciwidey, Kab. Bandung', 5, 'ditugaskan', '2025-11-02 03:00:00', NULL),
(186, 1, 2, 23, 'Air selokan meluap warna-warni, diduga limbah tekstil rumahan.', 'air_warna.jpg', -6.880000, 107.550000, 'Cibeber, Cimahi Selatan', 4, 'belum ditangani', '2025-11-02 07:30:00', NULL),
(187, 2, 4, 19, 'Pohon tumbang menghalangi jalur sepeda.', 'pohon_dago.jpg', -6.870000, 107.620000, 'Dago Car Free Day Area', 3, 'selesai', '2025-11-03 00:00:00', NULL),
(188, 3, 9, 2, 'Pengunjung memetik bunga edelweiss yang dilindungi di area gunung.', 'petik_edelweiss.jpg', -6.759000, 107.609000, 'Gunung Tangkuban Parahu', 4, 'belum ditangani', '2025-11-03 04:00:00', NULL),
(189, 1, 1, 1, 'Tumpukan sampah popok bayi di pinggir kali Citarum sektor Bojongsoang.', 'sampah_popok.jpg', -6.980000, 107.630000, 'Bojongsoang', 4, 'ditugaskan', '2025-11-04 02:00:00', NULL),
(190, 2, 6, 19, 'Limbah medis jarum suntik ditemukan di TPS biasa.', 'limbah_medis.jpg', -6.940000, 107.650000, 'Antapani, Bandung', 5, 'belum ditangani', '2025-11-04 09:00:00', NULL),
(191, 3, 10, 23, 'Jembatan penyeberangan orang (JPO) berkarat dan berlubang, bahaya.', 'jpo_rusak.jpg', -6.890000, 107.530000, 'Baros, Cimahi', 3, 'belum ditangani', '2025-11-05 01:00:00', NULL),
(192, 1, 5, 2, 'Kuda wisata lepas kendali lari ke jalan raya.', 'kuda_lepas.jpg', -6.810000, 107.620000, 'Lembang', 3, 'sudah ditangani', '2025-11-05 05:00:00', NULL),
(193, 2, 3, 19, 'Suara bising mesin pabrik terdengar sampai pemukiman saat malam.', 'bising_pabrik.jpg', -6.950000, 107.570000, 'Holis, Bandung Kulon', 3, 'belum ditangani', '2025-11-06 16:00:00', NULL),
(194, 3, 2, 1, 'Genangan air abadi di jalan raya Rancaekek setelah hujan.', 'banjir_rancaekek.jpg', -6.960000, 107.760000, 'Depan Kahatex', 4, 'belum ditangani', '2025-11-07 08:00:00', NULL),
(195, 1, 4, 23, 'Taman komplek gersang tidak ada penghijauan sama sekali.', 'taman_gersang.jpg', -6.870000, 107.540000, 'Cipageran, Cimahi', 2, 'belum ditangani', '2025-11-08 03:00:00', NULL),
(196, 2, 8, 2, 'Penambangan batu kapur ilegal menyebabkan debu putih tebal.', 'tambang_kapur.jpg', -6.830000, 107.450000, 'Cipatat, Bandung Barat', 5, 'ditugaskan', '2025-11-09 02:30:00', NULL),
(197, 3, 1, 19, 'Tong sampah pilah di taman jomblo isinya campur aduk.', 'sampah_campur.jpg', -6.900000, 107.605000, 'Tamansari', 1, 'belum ditangani', '2025-11-10 06:00:00', NULL),
(198, 1, 5, 22, 'Sarang tawon vespa besar di atap sekolah SD.', 'tawon_vespa.jpg', -6.580000, 106.790000, 'Tanah Sareal, Bogor', 4, 'selesai', '2025-11-10 01:00:00', NULL),
(199, 2, 2, 4, 'Air tanah warga di Gunung Putri berbau bensin.', 'air_bensin.jpg', -6.440000, 106.900000, 'Gunung Putri', 5, 'ditugaskan', '2025-11-11 03:00:00', NULL),
(200, 3, 7, 25, 'Ada warga menimbun barang bekas mudah terbakar di gang sempit.', 'timbun_barang.jpg', -6.390000, 106.780000, 'Pancoran Mas, Depok', 4, 'belum ditangani', '2025-11-11 07:00:00', NULL),
(201, 1, 1, 16, 'Sampah styrofoam menumpuk di muara sungai Cimandiri.', 'sampah_muara.jpg', -7.000000, 106.550000, 'Palabuhanratu', 3, 'belum ditangani', '2025-11-12 02:00:00', NULL),
(202, 2, 9, 22, 'Corat-coret dinding underpass baru dibangun.', 'vandal_bogor.jpg', -6.570000, 106.800000, 'Underpass Sholeh Iskandar', 2, 'ditolak', '2025-11-12 09:00:00', NULL),
(203, 3, 4, 4, 'Tanaman hias di median jalan habis dimakan kambing liar.', 'kambing_makan.jpg', -6.480000, 106.840000, 'Cibinong', 1, 'belum ditangani', '2025-11-13 00:30:00', NULL),
(204, 1, 3, 25, 'Pembakaran sampah kabel di lapak rongsok menimbulkan asap hitam.', 'bakar_kabel2.jpg', -6.420000, 106.830000, 'Cilangkap, Depok', 4, 'ditugaskan', '2025-11-13 04:00:00', NULL),
(205, 2, 2, 26, 'Drainase mampet total karena sisa material bangunan ruko.', 'drainase_ruko.jpg', -6.920000, 106.930000, 'Cikole, Kota Sukabumi', 3, 'belum ditangani', '2025-11-14 06:00:00', NULL),
(206, 3, 6, 16, 'Limbah cair pabrik garmen mengalir ke sawah warga.', 'limbah_garmen.jpg', -6.850000, 106.900000, 'Cicurug', 4, 'sudah ditangani', '2025-11-14 08:00:00', NULL),
(207, 1, 8, 4, 'Tebing tanah merah rawan longsor di pinggir jalan desa.', 'tebing_rawan.jpg', -6.650000, 106.700000, 'Pamijahan', 5, 'belum ditangani', '2025-11-15 03:00:00', NULL),
(208, 2, 1, 25, 'Tempat sampah stasiun Depok Baru over kapasitas.', 'sampah_stasiun.jpg', -6.390000, 106.810000, 'Stasiun Depok Baru', 2, 'belum ditangani', '2025-11-15 10:00:00', NULL),
(209, 3, 5, 4, 'Ular kobra masuk ke pekarangan masjid.', 'kobra_masjid.jpg', -6.500000, 106.780000, 'Bojong Gede', 5, 'selesai', '2025-11-15 22:30:00', NULL),
(210, 1, 3, 22, 'Bau busuk menyengat dari truk sampah yang bocor air lindinya.', 'truk_lindi.jpg', -6.620000, 106.820000, 'Tajur', 3, 'belum ditangani', '2025-11-16 05:00:00', NULL),
(211, 2, 10, 16, 'Jalan berlubang besar seperti kolam ikan.', 'jalan_kolam.jpg', -6.950000, 106.600000, 'Jampang Tengah', 3, 'belum ditangani', '2025-11-17 01:00:00', NULL),
(212, 3, 4, 25, 'Penebangan pohon penghijauan tanpa alasan jelas.', 'tebang_liar.jpg', -6.380000, 106.840000, 'Cimanggis', 4, 'ditugaskan', '2025-11-17 04:00:00', NULL),
(213, 1, 6, 3, 'Limbah B3 dibuang di lahan kosong dekat sekolah.', 'limbah_b3.jpg', -6.280000, 107.100000, 'Tambun Selatan', 5, 'ditugaskan', '2025-11-18 02:00:00', NULL),
(214, 2, 3, 21, 'Debu batubara menempel di lantai rumah warga.', 'debu_batubara.jpg', -6.220000, 106.980000, 'Medan Satria', 3, 'belum ditangani', '2025-11-18 07:00:00', NULL),
(215, 3, 1, 10, 'Sampah pasar rengasdengklok belum diangkut seminggu.', 'sampah_rengasdengklok.jpg', -6.160000, 107.290000, 'Rengasdengklok', 4, 'belum ditangani', '2025-11-19 01:30:00', NULL),
(216, 1, 2, 3, 'Kali Cikarang menghitam dan berbau bahan kimia.', 'kali_hitam.jpg', -6.260000, 107.150000, 'Cikarang Utara', 5, 'sudah ditangani', '2025-11-19 06:00:00', NULL),
(217, 2, 7, 14, 'Gudang penyimpanan tinner terbakar, asap membahayakan.', 'bakar_tinner.jpg', -6.540000, 107.460000, 'Babakancikao, Purwakarta', 5, 'selesai', '2025-11-20 03:00:00', NULL),
(218, 3, 8, 21, 'Pembangunan ruko menutup akses saluran air warga.', 'ruko_tutup.jpg', -6.270000, 106.960000, 'Jatiasih', 3, 'belum ditangani', '2025-11-20 08:00:00', NULL),
(219, 1, 9, 10, 'Tawuran pelajar merusak pot tanaman jalan.', 'rusak_pot2.jpg', -6.330000, 107.300000, 'Karawang Kota', 2, 'ditolak', '2025-11-01 09:00:00', NULL),
(220, 2, 5, 3, 'Monyet liar masuk perumahan di Muara Gembong.', 'monyet_muara.jpg', -6.000000, 107.000000, 'Muara Gembong', 3, 'belum ditangani', '2025-11-02 00:00:00', NULL),
(221, 3, 4, 14, 'Taman kota Purwakarta banyak tanaman mati kurang siram.', 'tanaman_mati.jpg', -6.560000, 107.440000, 'Taman Maya Datar', 2, 'belum ditangani', '2025-11-03 02:00:00', NULL),
(222, 1, 1, 3, 'Sampah plastik menyumbat pintu air Bendung Bekasi.', 'sumbat_bendung.jpg', -6.240000, 107.010000, 'Bendung Bekasi', 4, 'ditugaskan', '2025-11-04 05:00:00', NULL),
(223, 2, 2, 21, 'Genangan banjir rob di jalan raya pejuang.', 'banjir_rob.jpg', -6.180000, 106.990000, 'Pejuang, Bekasi', 3, 'belum ditangani', '2025-11-05 04:00:00', NULL),
(224, 3, 6, 10, 'Ada ceceran oli di sepanjang jalan raya klari.', 'ceceran_oli.jpg', -6.350000, 107.340000, 'Klari', 3, 'sudah ditangani', '2025-11-06 01:00:00', NULL),
(225, 1, 3, 14, 'Bau menyengat dari peternakan ayam di tengah pemukiman.', 'bau_ternak.jpg', -6.600000, 107.500000, 'Darangdan', 3, 'belum ditangani', '2025-11-07 09:30:00', NULL),
(226, 2, 10, 3, 'Tiang listrik miring hampir roboh ke jalan.', 'tiang_miring.jpg', -6.200000, 107.050000, 'Babelan', 5, 'ditugaskan', '2025-11-08 07:00:00', NULL),
(227, 3, 8, 10, 'Alih fungsi lahan pertanian teknis jadi perumahan.', 'sawah_hilang.jpg', -6.250000, 107.400000, 'Telagasari', 3, 'belum ditangani', '2025-11-09 03:00:00', NULL),
(228, 1, 2, 9, 'Abrasi pantai menggerus tambak warga.', 'abrasi_pantai.jpg', -6.250000, 108.300000, 'Kandanghaur, Indramayu', 5, 'belum ditangani', '2025-11-10 01:00:00', NULL),
(229, 2, 1, 24, 'Sampah menumpuk di sekitar Keraton Kasepuhan.', 'sampah_keraton.jpg', -6.720000, 108.570000, 'Lemahwungkuk', 3, 'selesai', '2025-11-11 05:00:00', NULL),
(230, 3, 4, 11, 'Kebakaran hutan di lereng gunung Ciremai.', 'bakar_ciremai.jpg', -6.900000, 108.450000, 'Pasawahan, Kuningan', 5, 'ditugaskan', '2025-11-11 11:00:00', NULL),
(231, 1, 3, 7, 'Asap pembakaran bata merah mengganggu warga.', 'asap_bata.jpg', -6.700000, 108.500000, 'Weru, Cirebon', 2, 'belum ditangani', '2025-11-12 02:00:00', NULL),
(232, 2, 6, 12, 'Limbah pabrik gula mencemari sungai Cimanuk.', 'limbah_gula.jpg', -6.780000, 108.150000, 'Jatitujuh', 4, 'belum ditangani', '2025-11-13 08:00:00', NULL),
(233, 3, 5, 9, 'Serangan hama wereng meluas di sawah Indramayu.', 'hama_wereng.jpg', -6.450000, 108.200000, 'Widasari', 4, 'sudah ditangani', '2025-11-14 00:00:00', NULL),
(234, 1, 8, 11, 'Vila ilegal dibangun di zona merah longsor.', 'vila_ilegal.jpg', -6.950000, 108.470000, 'Cisantana', 4, 'belum ditangani', '2025-11-15 04:00:00', NULL),
(235, 2, 9, 24, 'Pemuda nongkrong buang botol miras di trotoar.', 'botol_miras.jpg', -6.710000, 108.550000, 'Jl. Siliwangi', 2, 'belum ditangani', '2025-11-15 16:00:00', NULL),
(236, 3, 2, 7, 'Banjir luapan sungai Cisanggarung merendam desa.', 'banjir_ciledug.jpg', -6.900000, 108.700000, 'Ciledug', 5, 'ditugaskan', '2025-11-15 23:00:00', NULL),
(237, 1, 1, 12, 'Sampah plastik berserakan di area paralayang.', 'sampah_paralayang.jpg', -6.840000, 108.230000, 'Gunung Panten', 2, 'belum ditangani', '2025-11-17 03:00:00', NULL),
(238, 2, 10, 9, 'Lampu PJU mati di jalur pantura rawan begal.', 'pju_pantura.jpg', -6.400000, 108.100000, 'Patrol', 5, 'belum ditangani', '2025-11-18 13:00:00', NULL),
(239, 3, 4, 24, 'Akar pohon merusak tembok pagar sekolah.', 'akar_rusak.jpg', -6.730000, 108.560000, 'Pekalipan', 2, 'selesai', '2025-11-19 02:00:00', NULL),
(240, 1, 7, 11, 'Kebocoran pipa gas elpiji di pangkalan.', 'bocor_gas.jpg', -6.970000, 108.480000, 'Kuningan Kota', 5, 'selesai', '2025-11-19 07:00:00', NULL),
(241, 2, 3, 12, 'Debu proyek bandara Kertajati beterbangan.', 'debu_bandara.jpg', -6.650000, 108.160000, 'Kertajati', 3, 'belum ditangani', '2025-11-20 04:00:00', NULL),
(242, 3, 6, 7, 'Pembuangan limbah kotoran sapi ke selokan umum.', 'kotoran_sapi.jpg', -6.950000, 108.500000, 'Cigugur', 3, 'belum ditangani', '2025-11-01 01:00:00', NULL),
(243, 1, 5, 8, 'Lutung jawa turun ke jalan raya Kamojang.', 'lutung.jpg', -7.150000, 107.800000, 'Kamojang, Garut', 2, 'belum ditangani', '2025-11-02 02:00:00', NULL),
(244, 2, 1, 27, 'Sampah styrofoam bubur ayam menumpuk di Dadaha.', 'sampah_dadaha.jpg', -7.340000, 108.220000, 'Komplek Dadaha', 3, 'sudah ditangani', '2025-11-03 00:00:00', NULL),
(245, 3, 2, 13, 'Gelombang pasang merusak warung pinggir pantai.', 'gelombang_pasang.jpg', -7.700000, 108.600000, 'Batu Hiu', 4, 'ditugaskan', '2025-11-04 03:00:00', NULL),
(246, 1, 8, 18, 'Penambangan pasir sungai Cimedang merusak tebing.', 'pasir_cimedang.jpg', -7.500000, 108.200000, 'Cikalong', 5, 'belum ditangani', '2025-11-05 06:00:00', NULL),
(247, 2, 4, 5, 'Pohon kelapa tumbang menimpa kabel listrik desa.', 'kelapa_tumbang.jpg', -7.300000, 108.400000, 'Rancah', 4, 'selesai', '2025-11-06 08:00:00', NULL),
(248, 3, 3, 15, 'Asap pembakaran arkan mengganggu pandangan di jalan cagak.', 'asap_arang.jpg', -6.670000, 107.690000, 'Jalancagak, Subang', 3, 'belum ditangani', '2025-11-07 10:00:00', NULL),
(249, 1, 9, 17, 'Vandalisme di dinding terowongan lingkar.', 'vandal_terowongan.jpg', -6.850000, 107.910000, 'Lingkar Selatan', 2, 'belum ditangani', '2025-11-08 01:00:00', NULL),
(250, 2, 6, 20, 'Limbah pemotongan hewan dibuang ke sungai Citanduy.', 'limbah_rph.jpg', -7.360000, 108.540000, 'Banjar', 4, 'ditugaskan', '2025-11-09 04:00:00', NULL),
(251, 3, 1, 18, 'Sampah plastik menutupi saluran irigasi sawah.', 'plastik_irigasi.jpg', -7.400000, 108.150000, 'Sukaraja', 3, 'belum ditangani', '2025-11-10 02:00:00', NULL),
(252, 1, 2, 27, 'Genangan air di jalan HZ Mustofa bikin macet.', 'banjir_hz.jpg', -7.330000, 108.210000, 'HZ Mustofa', 3, 'sudah ditangani', '2025-11-11 07:00:00', NULL),
(253, 2, 5, 15, 'Buaya muara muncul di sungai Blanakan.', 'buaya_blanakan.jpg', -6.300000, 107.650000, 'Blanakan', 5, 'ditugaskan', '2025-11-12 01:00:00', NULL),
(254, 3, 10, 8, 'Jalan desa ambles sedalam 1 meter.', 'jalan_ambles.jpg', -7.400000, 107.700000, 'Pameungpeuk', 5, 'belum ditangani', '2025-11-13 09:00:00', NULL),
(255, 1, 3, 17, 'Debu proyek tol mengotori jemuran warga.', 'debu_tol.jpg', -6.800000, 107.950000, 'Cimalaka', 2, 'belum ditangani', '2025-11-14 03:00:00', NULL),
(256, 2, 4, 5, 'Taman raflesia ciamis kotor banyak daun kering.', 'taman_kotor.jpg', -7.320000, 108.350000, 'Alun-alun Ciamis', 1, 'selesai', '2025-11-15 00:00:00', NULL),
(257, 3, 1, 13, 'Botol plastik bekas minuman turis asing di Green Canyon.', 'botol_greencanyon.jpg', -7.730000, 108.450000, 'Cijulang', 2, 'belum ditangani', '2025-11-16 06:00:00', NULL),
(258, 1, 7, 20, 'Kebakaran alang-alang dekat rel kereta.', 'bakar_alang.jpg', -7.370000, 108.520000, 'Langgensari', 4, 'selesai', '2025-11-17 05:00:00', NULL),
(259, 2, 2, 8, 'Banjir bandang Cimanuk meluap.', 'banjir_cimanuk.jpg', -7.200000, 107.900000, 'Tarogong Kidul', 5, 'ditugaskan', '2025-11-18 08:00:00', NULL),
(260, 3, 9, 15, 'Orang buang kasur di pinggir jalan raya.', 'buang_kasur.jpg', -6.500000, 107.800000, 'Ciasem', 3, 'belum ditangani', '2025-11-19 01:00:00', NULL),
(261, 1, 6, 17, 'Limbah tahu keruh masuk kolam warga.', 'limbah_tahu2.jpg', -6.850000, 107.900000, 'Sumedang Selatan', 3, 'belum ditangani', '2025-11-20 03:00:00', NULL),
(262, 2, 8, 27, 'Trotoar dijadikan tempat jualan permanen.', 'trotoar_jualan.jpg', -7.335000, 108.215000, 'Cihideung', 2, 'sudah ditangani', '2025-11-01 02:00:00', NULL),
(263, 3, 1, 15, 'Sampah menumpuk di pintu air irigasi.', 'pintu_air.jpg', -6.400000, 107.700000, 'Binong', 3, 'belum ditangani', '2025-11-02 04:00:00', NULL),
(264, 1, 5, 13, 'Rusa cagar alam keluar pagar makan tanaman warga.', 'rusa_keluar.jpg', -7.700000, 108.650000, 'Pangandaran', 3, 'ditugaskan', '2025-11-03 07:00:00', NULL),
(265, 2, 3, 8, 'Bau belerang menyengat dari kawah, waspada gas beracun.', 'gas_kawah.jpg', -7.250000, 107.750000, 'Papandayan', 4, 'belum ditangani', '2025-11-04 01:00:00', NULL),
(266, 3, 2, 18, 'Jembatan gantung desa putus diterjang banjir.', 'jembatan_putus.jpg', -7.600000, 108.100000, 'Cipatujah', 5, 'ditugaskan', '2025-11-05 09:00:00', NULL),
(267, 1, 10, 5, 'Tiang telepon roboh halangi jalan.', 'tiang_roboh.jpg', -7.300000, 108.300000, 'Cikoneng', 3, 'selesai', '2025-11-06 02:00:00', NULL),
(268, 2, 4, 17, 'Pohon beringin alun-alun perlu dipangkas rawan tumbang.', 'beringin.jpg', -6.830000, 107.920000, 'Alun-alun Sumedang', 2, 'belum ditangani', '2025-11-07 03:00:00', NULL),
(269, 3, 9, 20, 'Pecah botol kaca berserakan di taman.', 'botol_kaca.jpg', -7.370000, 108.530000, 'Taman Kota', 2, 'belum ditangani', '2025-11-08 00:00:00', NULL),
(270, 1, 1, 8, 'Sampah plastik sisa hajatan dibuang ke sungai.', 'sampah_hajatan.jpg', -7.150000, 107.950000, 'Wanaraja', 3, 'belum ditangani', '2025-11-09 06:00:00', NULL),
(271, 2, 6, 27, 'Air sumur warga keruh diduga rembesan septictank tetangga.', 'sumur_keruh.jpg', -7.350000, 108.200000, 'Tamansari', 3, 'belum ditangani', '2025-11-10 08:00:00', NULL),
(272, 3, 5, 15, 'Sarang ular sanca di gorong-gorong sekolah.', 'ular_gorong.jpg', -6.550000, 107.760000, 'Subang Kota', 4, 'selesai', '2025-11-11 04:00:00', NULL),
(273, 1, 3, 18, 'Pembakaran ban bekas untuk ambil kawat.', 'bakar_ban.jpg', -7.360000, 108.130000, 'Singaparna', 3, 'belum ditangani', '2025-11-12 07:00:00', NULL),
(274, 2, 2, 5, 'Kolam ikan meluap saat hujan deras.', 'kolam_meluap.jpg', -7.310000, 108.340000, 'Ciamis', 2, 'belum ditangani', '2025-11-13 02:00:00', NULL),
(275, 3, 8, 13, 'Reklamasi pantai ilegal untuk warung.', 'reklamasi.jpg', -7.690000, 108.510000, 'Pantai Timur', 4, 'ditugaskan', '2025-11-14 01:00:00', NULL),
(276, 1, 7, 8, 'Tabung gas 3kg meledak di pangkalan.', 'gas_meledak2.jpg', -7.210000, 107.890000, 'Tarogong Kaler', 5, 'selesai', '2025-11-15 03:00:00', NULL),
(277, 2, 4, 27, 'Taman median jalan gersang.', 'median_gersang.jpg', -7.340000, 108.220000, 'Jl. Ir H Juanda', 2, 'belum ditangani', '2025-11-16 09:00:00', NULL),
(278, 3, 1, 20, 'Tong sampah hilang dicuri.', 'tong_hilang.jpg', -7.370000, 108.540000, 'Purwaharja', 1, 'belum ditangani', '2025-11-17 01:30:00', NULL),
(279, 1, 10, 17, 'Pagar jembatan rusak ditabrak truk.', 'pagar_rusak.jpg', -6.860000, 107.930000, 'Ganeas', 3, 'sudah ditangani', '2025-11-18 04:00:00', NULL),
(280, 2, 6, 15, 'Cairan hitam berminyak di parit.', 'cairan_hitam.jpg', -6.570000, 107.780000, 'Cibogo', 3, 'belum ditangani', '2025-11-19 06:00:00', NULL),
(281, 3, 9, 13, 'Corat-coret batu karang tempat wisata.', 'vandal_karang.jpg', -7.710000, 108.480000, 'Pantai Karapyak', 2, 'ditolak', '2025-11-20 02:00:00', NULL),
(282, 1, 1, 19, 'Tong sampah di Jalan Riau (Martadinata) penuh meluber ke trotoar.', 'sampah_riau.jpg', -6.908000, 107.610000, 'Jl. LLRE Martadinata', 2, 'belum ditangani', '2025-11-01 03:00:00', NULL),
(283, 2, 3, 23, 'Suara bising bengkel las di pemukiman padat gang sempit.', 'bising_las.jpg', -6.885000, 107.545000, 'Cimahi Tengah', 3, 'belum ditangani', '2025-11-01 07:00:00', NULL),
(284, 3, 8, 2, 'Pembangunan benteng perumahan menutup akses jalan setapak warga desa.', 'benteng_tutup.jpg', -6.860000, 107.500000, 'Cisarua, KBB', 4, 'ditugaskan', '2025-11-02 02:00:00', NULL),
(285, 1, 2, 1, 'Drainase jalan raya Bojongsoang tidak berfungsi, hujan sebentar langsung banjir.', 'banjir_bojong.jpg', -6.990000, 107.630000, 'Bojongsoang', 5, 'belum ditangani', '2025-11-02 09:30:00', NULL),
(286, 2, 10, 19, 'Halte bus TMB di Cicaheum kotor penuh coretan dan bau pesing.', 'halte_kotor.jpg', -6.900000, 107.660000, 'Terminal Cicaheum', 2, 'selesai', '2025-11-03 01:00:00', NULL),
(287, 3, 4, 19, 'Pohon pelindung di jalan Cipaganti ditebang diam-diam malam hari.', 'tebang_cipaganti.jpg', -6.890000, 107.600000, 'Jl. Cipaganti', 4, 'ditugaskan', '2025-11-03 15:00:00', NULL),
(288, 1, 5, 2, 'Anjing liar bergerombol di area wisata Lembang, menakuti anak-anak.', 'anjing_lembang.jpg', -6.820000, 107.610000, 'Pasar Lembang', 3, 'belum ditangani', '2025-11-04 04:00:00', NULL),
(289, 2, 1, 23, 'Limbah pasar antri cimahi menumpuk di belakang pasar, bau busuk.', 'sampah_pasar_antri.jpg', -6.880000, 107.540000, 'Pasar Antri', 4, 'sudah ditangani', '2025-11-04 06:00:00', NULL),
(290, 3, 6, 1, 'Air sungai Citarum di Dayeuhkolot berwarna hitam pekat dan berbuih.', 'citarum_hitam.jpg', -7.000000, 107.620000, 'Jembatan Dayeuhkolot', 5, 'belum ditangani', '2025-11-05 00:30:00', NULL),
(291, 1, 9, 19, 'Pengendara motor membuang puntung rokok sembarangan kena mata pengendara lain.', 'puntung_motor.jpg', -6.920000, 107.610000, 'Simpang Lima', 3, 'ditolak', '2025-11-05 08:00:00', NULL),
(292, 2, 2, 1, 'Saluran irigasi tersumbat sampah plastik pertanian di Ciwidey.', 'irigasi_ciwidey.jpg', -7.100000, 107.450000, 'Pasirjambu', 3, 'belum ditangani', '2025-11-06 03:00:00', NULL),
(293, 3, 7, 2, 'Warga membakar sampah elektronik (kabel) di lahan kosong Padalarang.', 'bakar_kabel3.jpg', -6.840000, 107.470000, 'Padalarang', 4, 'belum ditangani', '2025-11-06 10:00:00', NULL),
(294, 1, 3, 19, 'Asap knalpot angkot di terminal Leuwipanjang sangat pekat.', 'asap_angkot.jpg', -6.940000, 107.590000, 'Terminal Leuwipanjang', 3, 'belum ditangani', '2025-11-07 02:00:00', NULL),
(295, 2, 4, 1, 'Taman alun-alun Soreang rumputnya mati terinjak-injak pengunjung pasar malam.', 'rumput_mati.jpg', -7.030000, 107.520000, 'Soreang', 2, 'selesai', '2025-11-08 01:00:00', NULL),
(296, 3, 8, 2, 'Galian tanah merah ilegal di Lembang merusak pemandangan dan jalan licin.', 'galian_lembang.jpg', -6.800000, 107.630000, 'Cibodas Lembang', 5, 'ditugaskan', '2025-11-08 05:00:00', NULL),
(297, 1, 5, 22, 'Ular sanca batik ditemukan di selokan perumahan Yasmin.', 'ular_yasmin.jpg', -6.560000, 106.770000, 'Taman Yasmin', 4, 'selesai', '2025-11-08 23:00:00', NULL),
(298, 2, 1, 4, 'Sampah wisatawan menumpuk di jalur pendakian Gunung Gede via Cibodas.', 'sampah_gunung.jpg', -6.740000, 106.990000, 'Cibodas', 3, 'belum ditangani', '2025-11-09 07:00:00', NULL),
(299, 3, 2, 25, 'Banjir setinggi lutut di jalan Margonda raya setelah hujan deras.', 'banjir_margonda.jpg', -6.370000, 106.830000, 'Depan Gunadarma', 4, 'ditugaskan', '2025-11-10 09:00:00', NULL),
(300, 1, 10, 22, 'Lampu penerangan jalan umum (PJU) mati total di jalan sepi rawan begal.', 'pju_mati_bogor.jpg', -6.630000, 106.800000, 'Batutulis', 5, 'belum ditangani', '2025-11-11 12:00:00', NULL),
(301, 2, 3, 16, 'Debu pabrik semen di Sukabumi menutupi atap rumah warga.', 'debu_semen_smi.jpg', -6.900000, 106.900000, 'Gunung Guruh', 3, 'belum ditangani', '2025-11-12 01:00:00', NULL),
(302, 3, 6, 25, 'Limbah sabun cuci mobil dibuang langsung ke sungai ciliwung.', 'limbah_cucian.jpg', -6.400000, 106.820000, 'Kelapa Dua', 3, 'belum ditangani', '2025-11-12 04:00:00', NULL),
(303, 1, 4, 4, 'Pohon angsana di jalan raya Bogor-Jakarta miring berbahaya.', 'pohon_miring.jpg', -6.500000, 106.850000, 'Cibinong', 4, 'sudah ditangani', '2025-11-13 00:00:00', NULL),
(304, 2, 9, 22, 'Aksi vandalisme corat-coret tembok pagar Kebun Raya Bogor.', 'vandal_kebunraya.jpg', -6.600000, 106.800000, 'Jalur SSA', 2, 'belum ditangani', '2025-11-13 16:00:00', NULL),
(305, 3, 8, 16, 'Pembangunan vila di kawasan konservasi Halimun Salak.', 'vila_halimun.jpg', -6.750000, 106.650000, 'Cidahu', 5, 'ditugaskan', '2025-11-14 02:00:00', NULL),
(306, 1, 1, 25, 'Tumpukan sampah liar di pinggir rel kereta Citayam.', 'sampah_citayam.jpg', -6.450000, 106.800000, 'Citayam', 3, 'belum ditangani', '2025-11-14 08:00:00', NULL),
(307, 2, 2, 26, 'Selokan di jalan Ahmad Yani Sukabumi mampet lemak restoran.', 'selokan_lemak.jpg', -6.920000, 106.930000, 'Jl. A. Yani', 3, 'belum ditangani', '2025-11-15 05:00:00', NULL);
INSERT INTO `laporan` (`id_laporan`, `user_id`, `kategori_id`, `kabkot_id`, `deskripsi`, `foto`, `latitude`, `longitude`, `alamat_lengkap`, `tingkat_keparahan`, `status`, `tanggal_laporan`, `updated_at`) VALUES
(308, 3, 7, 4, 'Kebakaran lahan alang-alang dekat pemukiman Sentul.', 'kebakaran_sentul.jpg', -6.550000, 106.880000, 'Babakan Madang', 4, 'selesai', '2025-11-15 07:00:00', NULL),
(309, 1, 5, 16, 'Kawanan monyet ekor panjang jarah warung warga di Cikidang.', 'monyet_cikidang.jpg', -6.900000, 106.650000, 'Cikidang', 3, 'belum ditangani', '2025-11-16 03:00:00', NULL),
(310, 2, 3, 25, 'Bau sampah dari TPS liar di Limo Depok.', 'bau_tps_limo.jpg', -6.380000, 106.770000, 'Limo', 3, 'belum ditangani', '2025-11-16 10:00:00', NULL),
(311, 3, 2, 22, 'Air PDAM di Bogor Timur keruh coklat.', 'pdam_keruh.jpg', -6.620000, 106.830000, 'Katulampa', 2, 'belum ditangani', '2025-11-17 01:00:00', NULL),
(312, 1, 6, 21, 'Limbah cair pabrik cat tumpah ke jalan raya Narogong.', 'cat_tumpah.jpg', -6.280000, 106.990000, 'Bantargebang', 5, 'sudah ditangani', '2025-11-17 06:00:00', NULL),
(313, 2, 1, 3, 'Gunung sampah di TPS Burangkeng longsor ke jalan.', 'sampah_burangkeng.jpg', -6.350000, 107.050000, 'Setu', 5, 'ditugaskan', '2025-11-18 01:00:00', NULL),
(314, 3, 4, 10, 'Pohon penghijauan di kawasan KIIC mati kekeringan.', 'pohon_kiic.jpg', -6.350000, 107.280000, 'KIIC Karawang', 2, 'belum ditangani', '2025-11-18 03:30:00', NULL),
(315, 1, 2, 14, 'Situ Buleud airnya surut drastis dan berbau amis.', 'situ_surut.jpg', -6.555000, 107.442000, 'Purwakarta Kota', 3, 'belum ditangani', '2025-11-19 02:00:00', NULL),
(316, 2, 10, 21, 'Jalan rusak parah berlubang besar di Babelan.', 'jalan_rusak_babelan.jpg', -6.180000, 107.030000, 'Babelan', 4, 'belum ditangani', '2025-11-19 09:00:00', NULL),
(317, 3, 3, 3, 'Debu proyek kereta cepat masih tersisa mengganggu warga.', 'debu_kcic.jpg', -6.300000, 107.200000, 'Tegal Danas', 2, 'selesai', '2025-11-20 04:00:00', NULL),
(318, 1, 9, 10, 'Pencurian tutup got besi di trotoar jalan Tuparev.', 'curi_tutup_got.jpg', -6.310000, 107.300000, 'Karawang Barat', 4, 'ditugaskan', '2025-11-20 13:00:00', NULL),
(319, 2, 8, 21, 'Bangunan liar di bantaran Kalimalang semakin banyak.', 'bangunan_kalimalang.jpg', -6.240000, 106.980000, 'Jakasampurna', 3, 'belum ditangani', '2025-11-01 02:30:00', NULL),
(320, 3, 5, 14, 'Serangan tomcat masuk ke pemukiman warga di Bungursari.', 'tomcat.jpg', -6.500000, 107.480000, 'Bungursari', 3, 'belum ditangani', '2025-11-02 01:00:00', NULL),
(321, 1, 7, 3, 'Kabel listrik semrawut terbakar korsleting.', 'kabel_bakar.jpg', -6.250000, 107.150000, 'Cikarang', 5, 'selesai', '2025-11-03 06:00:00', NULL),
(322, 2, 1, 10, 'Sampah plastik berserakan di hutan mangrove Sedari.', 'sampah_mangrove.jpg', -5.980000, 107.300000, 'Pantai Sedari', 3, 'belum ditangani', '2025-11-04 03:00:00', NULL),
(323, 3, 2, 3, 'Banjir merendam akses jalan tol Cibitung.', 'banjir_tol.jpg', -6.260000, 107.080000, 'Cibitung', 5, 'ditugaskan', '2025-11-04 23:00:00', NULL),
(324, 1, 6, 14, 'Pencemaran limbah tekstil di sungai Cikao.', 'limbah_cikao.jpg', -6.530000, 107.420000, 'Jatiluhur', 4, 'belum ditangani', '2025-11-06 07:00:00', NULL),
(325, 2, 3, 21, 'Pembakaran sampah liar di lahan kosong Jatiasih.', 'bakar_jatiasih.jpg', -6.280000, 106.950000, 'Jatiasih', 3, 'belum ditangani', '2025-11-07 10:00:00', NULL),
(326, 3, 4, 10, 'Ranting pohon menutupi lampu merah Johar.', 'ranting_johar.jpg', -6.315000, 107.310000, 'Johar', 2, 'selesai', '2025-11-08 02:00:00', NULL),
(327, 1, 2, 24, 'Air laut pasang (rob) masuk ke pemukiman warga Lemahwungkuk.', 'rob_cirebon.jpg', -6.720000, 108.570000, 'Lemahwungkuk', 4, 'belum ditangani', '2025-11-09 08:00:00', NULL),
(328, 2, 1, 11, 'Sampah pasar Kepuh Kuningan menumpuk bau busuk.', 'sampah_kepuh.jpg', -6.980000, 108.490000, 'Kuningan', 3, 'belum ditangani', '2025-11-10 01:00:00', NULL),
(329, 3, 8, 9, 'Alih fungsi lahan mangrove jadi tambak udang ilegal.', 'tambak_ilegal.jpg', -6.250000, 108.200000, 'Karangsong', 4, 'ditugaskan', '2025-11-11 04:00:00', NULL),
(330, 1, 6, 7, 'Limbah pengolahan batu alam dibuang ke sungai Palimanan.', 'limbah_batu.jpg', -6.730000, 108.430000, 'Palimanan', 4, 'belum ditangani', '2025-11-12 03:00:00', NULL),
(331, 2, 3, 12, 'Asap pembakaran jerami padi di sekitar bandara Kertajati.', 'asap_jerami_kjt.jpg', -6.670000, 108.180000, 'Kertajati', 3, 'selesai', '2025-11-13 09:00:00', NULL),
(332, 3, 5, 7, 'Kera liar dari situs Plangon turun ke jalan raya.', 'kera_jalan.jpg', -6.770000, 108.500000, 'Sumber', 2, 'belum ditangani', '2025-11-14 02:00:00', NULL),
(333, 1, 9, 24, 'Coretan vandalisme di gedung tua BAT Cirebon.', 'vandal_bat.jpg', -6.710000, 108.560000, 'Kawasan BAT', 2, 'ditolak', '2025-11-15 01:00:00', NULL),
(334, 2, 10, 9, 'Jalan beton pantura retak-retak membahayakan motor.', 'beton_retak.jpg', -6.450000, 108.150000, 'Lohbener', 3, 'belum ditangani', '2025-11-16 06:00:00', NULL),
(335, 3, 4, 11, 'Pohon besar di jalan raya Cirendang rawan tumbang.', 'pohon_cirendang.jpg', -6.950000, 108.470000, 'Cirendang', 3, 'ditugaskan', '2025-11-17 03:00:00', NULL),
(336, 1, 1, 9, 'Pantai Karangsong penuh sampah botol plastik.', 'sampah_karangsong.jpg', -6.320000, 108.370000, 'Indramayu', 3, 'belum ditangani', '2025-11-18 00:00:00', NULL),
(337, 2, 2, 12, 'Embung air di Talaga Kulon kering kerontang.', 'embung_kering.jpg', -6.990000, 108.300000, 'Talaga', 3, 'belum ditangani', '2025-11-19 04:00:00', NULL),
(338, 3, 7, 24, 'Kebakaran gudang rotan di Tegalwangi.', 'bakar_rotan.jpg', -6.750000, 108.450000, 'Weru', 5, 'selesai', '2025-11-20 07:00:00', NULL),
(339, 1, 3, 7, 'Bau busuk dari TPA Gunung Santri.', 'bau_tpa.jpg', -6.780000, 108.440000, 'Kepuh', 4, 'belum ditangani', '2025-11-01 05:00:00', NULL),
(340, 2, 6, 9, 'Tumpahan minyak dari kapal nelayan di muara.', 'minyak_muara.jpg', -6.300000, 108.350000, 'Eretan', 4, 'ditugaskan', '2025-11-02 02:00:00', NULL),
(341, 3, 8, 12, 'Penambangan pasir ilegal di sungai Cimanuk Majalengka.', 'tambang_cimanuk.jpg', -6.750000, 108.200000, 'Jatitujuh', 5, 'belum ditangani', '2025-11-03 03:00:00', NULL),
(342, 1, 4, 18, 'Hutan mangrove Cipatujah rusak ditebang warga.', 'mangrove_rusak.jpg', -7.650000, 108.050000, 'Cipatujah', 4, 'belum ditangani', '2025-11-04 01:00:00', NULL),
(343, 2, 1, 27, 'Sampah menumpuk di eks terminal Cilembang.', 'sampah_cilembang.jpg', -7.330000, 108.210000, 'Cilembang', 3, 'sudah ditangani', '2025-11-05 04:00:00', NULL),
(344, 3, 2, 8, 'Banjir bandang menerjang desa Sukawening Garut.', 'banjir_sukawening.jpg', -7.150000, 108.000000, 'Sukawening', 5, 'ditugaskan', '2025-11-06 08:00:00', NULL),
(345, 1, 5, 13, 'Babi hutan masuk ke lahan pertanian Kalipucang.', 'babi_kalipucang.jpg', -7.650000, 108.700000, 'Kalipucang', 3, 'belum ditangani', '2025-11-07 00:00:00', NULL),
(346, 2, 10, 5, 'Jembatan gantung Ciamis-Tasik putus tali selingnya.', 'jembatan_putus2.jpg', -7.350000, 108.400000, 'Manonjaya', 5, 'ditugaskan', '2025-11-08 06:00:00', NULL),
(347, 3, 3, 20, 'Bau limbah peternakan babi di pinggiran kota Banjar.', 'bau_babi.jpg', -7.380000, 108.550000, 'Banjar', 3, 'belum ditangani', '2025-11-09 09:00:00', NULL),
(348, 1, 6, 17, 'Limbah tahu Sumedang dibuang ke kali Cipeles.', 'limbah_cipeles.jpg', -6.850000, 107.910000, 'Sumedang', 4, 'belum ditangani', '2025-11-10 03:00:00', NULL),
(349, 2, 9, 15, 'Wisatawan buang sampah sembarangan di curug Cijalu.', 'sampah_cijalu.jpg', -6.700000, 107.600000, 'Sagalaherang', 2, 'selesai', '2025-11-11 07:00:00', NULL),
(350, 3, 8, 18, 'Galian pasir besi merusak pantai selatan Tasik.', 'pasir_besi.jpg', -7.750000, 108.200000, 'Cikalong', 5, 'belum ditangani', '2025-11-12 02:00:00', NULL),
(351, 1, 1, 5, 'Sampah pasar manis Ciamis meluber ke jalan.', 'sampah_manis.jpg', -7.320000, 108.350000, 'Pasar Ciamis', 3, 'belum ditangani', '2025-11-13 01:00:00', NULL),
(352, 2, 7, 8, 'Kebakaran hutan di Gunung Guntur.', 'bakar_guntur.jpg', -7.180000, 107.880000, 'Tarogong Kaler', 5, 'ditugaskan', '2025-11-14 11:00:00', NULL),
(353, 3, 2, 13, 'Air sumur warga Pangandaran terasa asin intrusi laut.', 'air_asin_pgnd.jpg', -7.680000, 108.650000, 'Pangandaran', 3, 'belum ditangani', '2025-11-15 04:00:00', NULL),
(354, 1, 4, 15, 'Taman kota Subang tidak terawat banyak ilalang.', 'taman_ilalang.jpg', -6.560000, 107.760000, 'Subang', 2, 'belum ditangani', '2025-11-16 02:00:00', NULL),
(355, 2, 10, 17, 'Tanah longsor menimbun jalan Cadas Pangeran.', 'longsor_cadas.jpg', -6.870000, 107.890000, 'Cadas Pangeran', 5, 'selesai', '2025-11-16 23:00:00', NULL),
(356, 3, 1, 27, 'Sampah plastik di sungai Ciloseh Tasikmalaya.', 'sampah_ciloseh.jpg', -7.320000, 108.220000, 'Cipedes', 3, 'belum ditangani', '2025-11-18 08:00:00', NULL),
(357, 1, 3, 15, 'Asap pembakaran ban bekas di Jalancagak.', 'bakar_ban_subang.jpg', -6.650000, 107.700000, 'Jalancagak', 3, 'belum ditangani', '2025-11-19 05:00:00', NULL),
(358, 2, 5, 8, 'Macan tutul terlihat di kebun warga Cisurupan.', 'macan_tutul.jpg', -7.300000, 107.800000, 'Cisurupan', 5, 'ditugaskan', '2025-11-20 00:00:00', NULL),
(359, 3, 8, 13, 'Pembangunan hotel di sempadan pantai melanggar aturan.', 'hotel_ilegal.jpg', -7.690000, 108.660000, 'Pantai Barat', 4, 'belum ditangani', '2025-11-01 03:00:00', NULL),
(360, 1, 2, 17, 'Waduk Jatigede dipenuhi sampah kayu kiriman sungai.', 'sampah_jatigede.jpg', -6.900000, 108.100000, 'Darmaraja', 3, 'belum ditangani', '2025-11-02 06:00:00', NULL),
(361, 2, 9, 27, 'Pagar taman kota Tasik dirusak orang mabuk.', 'rusak_pagar.jpg', -7.330000, 108.210000, 'Masjid Agung', 2, 'selesai', '2025-11-03 14:00:00', NULL),
(362, 3, 1, 6, 'Sampah menumpuk di pasar Cipanas.', 'sampah_cipanas.jpg', -6.730000, 107.040000, 'Cipanas, Cianjur', 3, 'belum ditangani', '2025-11-04 01:30:00', NULL),
(363, 1, 4, 6, 'Pohon tumbang di jalan raya Puncak macet total.', 'pohon_puncak.jpg', -6.700000, 106.990000, 'Puncak Pass', 4, 'selesai', '2025-11-05 07:00:00', NULL),
(364, 2, 2, 6, 'Selokan di Ciranjang mampet sampah pasar.', 'selokan_ciranjang.jpg', -6.820000, 107.260000, 'Ciranjang', 3, 'belum ditangani', '2025-11-06 03:00:00', NULL),
(365, 3, 5, 6, 'Anjing gila menggigit warga di Cibeber.', 'anjing_gila.jpg', -6.900000, 107.150000, 'Cibeber Cianjur', 5, 'ditugaskan', '2025-11-07 04:00:00', NULL),
(366, 1, 8, 6, 'Galian C ilegal di Gekbrong berdebu.', 'galian_gekbrong.jpg', -6.850000, 107.050000, 'Gekbrong', 4, 'belum ditangani', '2025-11-08 02:00:00', NULL),
(367, 2, 1, 19, 'Sampah daun menumpuk di jalan Ganesha.', 'sampah_ganesha.jpg', -6.890000, 107.610000, 'ITB', 1, 'selesai', '2025-11-09 09:00:00', NULL),
(368, 3, 3, 1, 'Asap pembakaran sampah di Kopo Sayati.', 'asap_kopo.jpg', -6.970000, 107.580000, 'Sayati', 3, 'belum ditangani', '2025-11-10 00:00:00', NULL),
(369, 1, 2, 21, 'Banjir di kolong jembatan tol Bekasi Timur.', 'banjir_bt.jpg', -6.260000, 107.020000, 'Bekasi Timur', 4, 'ditugaskan', '2025-11-11 08:00:00', NULL),
(370, 2, 4, 22, 'Pohon kamboja makam pahlawan tumbang.', 'kamboja_tumbang.jpg', -6.610000, 106.810000, 'Dreded', 2, 'selesai', '2025-11-12 01:00:00', NULL),
(371, 3, 6, 14, 'Oli bekas bengkel tumpah ke jalan.', 'oli_tumpah.jpg', -6.550000, 107.450000, 'Sadang', 3, 'belum ditangani', '2025-11-13 05:00:00', NULL),
(372, 1, 10, 24, 'Tembok keraton retak akibat getaran truk.', 'tembok_retak.jpg', -6.720000, 108.570000, 'Kasepuhan', 3, 'belum ditangani', '2025-11-14 03:00:00', NULL),
(373, 2, 1, 18, 'Sampah di terminal Singaparna.', 'sampah_singaparna.jpg', -7.350000, 108.110000, 'Singaparna', 3, 'belum ditangani', '2025-11-15 06:00:00', NULL),
(374, 3, 5, 25, 'Kucing liar banyak di pasar Kemiri Muka.', 'kucing_kemiri.jpg', -6.390000, 106.820000, 'Kemiri Muka', 2, 'belum ditangani', '2025-11-16 01:00:00', NULL),
(375, 1, 2, 2, 'Got mampet di Lembang.', 'got_lembang.jpg', -6.820000, 107.620000, 'Jayagiri', 2, 'selesai', '2025-11-17 02:00:00', NULL),
(376, 2, 9, 19, 'Vandalisme di tiang flyover Pasupati.', 'vandal_pasupati.jpg', -6.900000, 107.600000, 'Pasteur', 2, 'ditolak', '2025-11-18 16:00:00', NULL),
(377, 3, 7, 1, 'Gas bocor di rumah makan Padang.', 'gas_bocor.jpg', -7.020000, 107.530000, 'Soreang', 4, 'selesai', '2025-11-19 03:00:00', NULL),
(378, 1, 1, 23, 'Sampah menumpuk di Cimindi.', 'sampah_cimindi.jpg', -6.890000, 107.550000, 'Cimindi', 3, 'belum ditangani', '2025-11-20 00:30:00', NULL),
(379, 2, 4, 17, 'Pohon tumbang di Jatinangor.', 'pohon_jatinangor.jpg', -6.930000, 107.770000, 'Cikeruh', 3, 'sudah ditangani', '2025-11-01 07:00:00', NULL),
(380, 3, 8, 16, 'Galian pasir kuarsa ilegal.', 'pasir_kuarsa.jpg', -6.950000, 106.700000, 'Cibadak', 5, 'ditugaskan', '2025-11-02 04:00:00', NULL),
(381, 1, 2, 7, 'Irigasi jebol di Arjawinangun.', 'irigasi_jebol.jpg', -6.650000, 108.400000, 'Arjawinangun', 4, 'belum ditangani', '2025-11-03 08:00:00', NULL),
(382, 2, 10, 12, 'Jalan rusak di Kadipaten.', 'jalan_kadipaten.jpg', -6.780000, 108.170000, 'Kadipaten', 3, 'belum ditangani', '2025-11-04 02:00:00', NULL),
(383, 3, 3, 10, 'Debu jalanan Karawang Timur.', 'debu_karawang.jpg', -6.320000, 107.330000, 'Kondangjaya', 2, 'belum ditangani', '2025-11-05 09:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanganan`
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','petugas') DEFAULT 'user',
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `no_hp`, `alamat`, `created_at`, `foto`) VALUES
(1, 'Rio Adriana', 'rio@gmail.com', '$2y$10$i7Q0yfnvnohbrZCAw4ISKu3yMAmMfKMGz5/PtcbWT8wBGG0jI/P3O', 'admin', '083822085370', 'Ciumbuleuit', '2025-11-10 11:33:31', 'user_1_1763810781.jpg'),
(2, 'Siti Lestari', 'siti@gmail.com', '$2y$10$i7Q0yfnvnohbrZCAw4ISKu3yMAmMfKMGz5/PtcbWT8wBGG0jI/P3O', 'user', '082145678912', 'Jl. Pasir Koja No. 12, Bandung', '2025-11-10 11:33:31', 'user_2_1763811211.jpg'),
(3, 'Budi Santoso', 'budi@gmail.com', '$2y$10$i7Q0yfnvnohbrZCAw4ISKu3yMAmMfKMGz5/PtcbWT8wBGG0jI/P3O', 'petugas', '081345678901', 'Jl. Cipaganti No. 7, Bandung', '2025-11-10 11:33:31', 'user_3_1763811502.jpg'),
(4, 'Andika Putra', 'andika@gmail.com', '123456', 'petugas', '081234567001', 'Kantor DLH Bandung', '2025-11-10 11:33:31', ''),
(5, 'Admin Lingkungan', 'admin@dlh.go.id', '123456', 'admin', '081234567002', 'Kantor Dinas Lingkungan Hidup', '2025-11-10 11:33:31', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kabkot`
--
ALTER TABLE `kabkot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_nama` (`nama`),
  ADD UNIQUE KEY `geojson_id` (`geojson_id`);

--
-- Indeks untuk tabel `kategori_laporan`
--
ALTER TABLE `kategori_laporan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `kabkot_id` (`kabkot_id`);

--
-- Indeks untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `id_laporan` (`id_laporan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kabkot`
--
ALTER TABLE `kabkot`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `kategori_laporan`
--
ALTER TABLE `kategori_laporan`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_laporan` (`id_kategori`),
  ADD CONSTRAINT `laporan_ibfk_3` FOREIGN KEY (`kabkot_id`) REFERENCES `kabkot` (`id`);

--
-- Ketidakleluasaan untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  ADD CONSTRAINT `penanganan_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`) ON DELETE CASCADE,
  ADD CONSTRAINT `penanganan_ibfk_2` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
