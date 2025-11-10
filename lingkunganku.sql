-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2025 pada 18.19
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
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kategori` enum('sampah','banjir') DEFAULT 'sampah',
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_laporan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `user_id`, `kategori`, `deskripsi`, `foto`, `tanggal_laporan`) VALUES
(1, 1, 'sampah', 'Tumpukan sampah di pinggir jalan utama menimbulkan bau tidak sedap.', 'uploads/sampah1.jpg', '2025-11-10 11:36:45'),
(2, 2, 'banjir', 'Air meluap dari selokan membuat jalan tergenang air.', 'uploads/banjir1.jpg', '2025-11-10 11:36:45'),
(3, 3, 'sampah', 'Asap tebal dari pabrik di kawasan industri.', 'uploads/polusi1.jpg', '2025-11-10 11:36:45'),
(4, 1, 'banjir', 'Kebakaran kecil di area hutan Dago.', 'uploads/kebakaran1.jpg', '2025-11-10 11:36:45'),
(5, 2, 'sampah', 'TPS sudah penuh dan warga mulai buang sampah di pinggir jalan.', 'uploads/sampah2.jpg', '2025-11-10 11:36:45'),
(6, 1, 'sampah', 'Tumpukan sampah di area pasar mulai menumpuk dan mengganggu pengunjung.', 'uploads/sampah3.jpg', '2025-11-10 17:05:27'),
(7, 2, 'banjir', 'Parit tersumbat menyebabkan banjir kecil setelah hujan deras.', 'uploads/banjir2.jpg', '2025-11-10 17:05:27'),
(8, 3, 'sampah', 'Sampah plastik berserakan di lapangan sepak bola.', 'uploads/sampah4.jpg', '2025-11-10 17:05:27'),
(9, 1, 'banjir', 'Sungai meluap ke pemukiman warga.', 'uploads/banjir3.jpg', '2025-11-10 17:05:27'),
(10, 2, 'sampah', 'Bau menyengat dari tempat pembuangan sampah liar.', 'uploads/sampah5.jpg', '2025-11-10 17:05:27'),
(11, 3, 'banjir', 'Drainase rusak sehingga air tidak mengalir dengan baik.', 'uploads/banjir4.jpg', '2025-11-10 17:05:27'),
(12, 1, 'sampah', 'Tumpukan kardus dan plastik di area ruko.', 'uploads/sampah6.jpg', '2025-11-10 17:05:27'),
(13, 2, 'banjir', 'Air menggenang di depan pintu rumah hingga setinggi mata kaki.', 'uploads/banjir5.jpg', '2025-11-10 17:05:27'),
(14, 3, 'sampah', 'Sampah rumah tangga dibuang sembarangan di pinggir sungai.', 'uploads/sampah7.jpg', '2025-11-10 17:05:27'),
(15, 1, 'banjir', 'Selokan mampet menyebabkan jalan licin dan berbahaya.', 'uploads/banjir6.jpg', '2025-11-10 17:05:27'),
(16, 2, 'sampah', 'Botol dan gelas plastik berserakan setelah acara warga.', 'uploads/sampah8.jpg', '2025-11-10 17:05:27'),
(17, 3, 'banjir', 'Air hujan tidak terserap karena kurangnya sumur resapan.', 'uploads/banjir7.jpg', '2025-11-10 17:05:27'),
(18, 1, 'sampah', 'Sampah menumpuk di belakang gedung olahraga.', 'uploads/sampah9.jpg', '2025-11-10 17:05:27'),
(19, 2, 'banjir', 'Air dari sungai meluap ke kebun dan merusak tanaman warga.', 'uploads/banjir8.jpg', '2025-11-10 17:05:27'),
(20, 3, 'sampah', 'Warga membuang sampah ke area kosong dekat perumahan.', 'uploads/sampah10.jpg', '2025-11-10 17:05:27'),
(21, 1, 'banjir', 'Banjir kembali terjadi setiap hujan deras.', 'uploads/banjir9.jpg', '2025-11-10 17:05:27'),
(22, 2, 'sampah', 'Sampah daun dan ranting menyumbat aliran sungai kecil.', 'uploads/sampah11.jpg', '2025-11-10 17:05:27'),
(23, 3, 'banjir', 'Pompa air tidak berfungsi sehingga air meluber ke jalan.', 'uploads/banjir10.jpg', '2025-11-10 17:05:27'),
(24, 1, 'sampah', 'Banyak sampah plastik kecil beterbangan di area taman.', 'uploads/sampah12.jpg', '2025-11-10 17:05:27'),
(25, 2, 'banjir', 'Air setinggi lutut menggenang di area pemukiman padat.', 'uploads/banjir11.jpg', '2025-11-10 17:05:27');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
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
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
