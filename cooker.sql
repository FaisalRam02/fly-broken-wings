-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2024 pada 15.07
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
-- Database: `cooker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_surat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `documents`
--

INSERT INTO `documents` (`id`, `nama_surat`, `created_at`, `updated_at`, `kategori_id`) VALUES
(3, 'Surat Keterangan Domisili', '2024-09-23 19:37:26', '2024-09-23 19:37:26', 3),
(4, 'Surat Keterangan Kelahiran', '2024-09-23 20:20:58', '2024-09-23 20:20:58', 3),
(5, 'Surat Keterangan Kematian', '2024-09-23 20:21:36', '2024-09-23 20:21:36', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(2, 'Surat Pengantar', '2024-09-23 03:24:33', '2024-09-23 03:24:33'),
(3, 'Surat Keterangan', '2024-09-23 03:30:49', '2024-09-23 03:30:49'),
(4, 'Surat Pernyataan', '2024-09-23 20:21:47', '2024-09-23 20:21:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_21_100541_add_gender_and_photo_to_users_table', 1),
(6, '2024_09_21_131055_create_pekerjaan_table', 1),
(7, '2024_09_21_230938_create_penduduk_table', 1),
(8, '2024_09_21_231526_add_pekerjaan_id_to_penduduk_table', 1),
(9, '2024_09_22_031846_create_kategoris_table', 1),
(10, '2024_09_22_103353_create_documents_table', 1),
(11, '2024_09_22_103804_add_kategoris_id_to_documents_table', 1),
(12, '2024_09_24_023931_create_surats_table', 2),
(13, '2024_09_24_024140_add_documents_id_to_surats_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama_pekerjaan`, `created_at`, `updated_at`) VALUES
(1, 'Guru', '2024-09-23 03:25:02', '2024-09-23 03:25:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_kk` char(16) NOT NULL,
  `nik` char(16) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `rt` char(3) NOT NULL,
  `rw` char(3) NOT NULL,
  `alamat_spesifik` text NOT NULL,
  `status_pendidikan` varchar(255) NOT NULL,
  `status_perkawinan` enum('Belum Kawin','Kawin','Cerai Mati','Cerai Hidup') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pekerjaan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama`, `jenis_kelamin`, `no_kk`, `nik`, `tanggal_lahir`, `tempat_lahir`, `agama`, `rt`, `rw`, `alamat_spesifik`, `status_pendidikan`, `status_perkawinan`, `created_at`, `updated_at`, `pekerjaan_id`) VALUES
(1, 'Sophia', 'Perempuan', '1111111111111111', '1111111111111112', '2024-09-23', 'Mind', 'Tidak Beragama', '001', '002', 'Dream', 'SMA/SMK', 'Belum Kawin', '2024-09-23 03:42:35', '2024-09-23 03:42:35', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surats`
--

CREATE TABLE `surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengaju` varchar(255) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `status` enum('disetujui','ditolak') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `documents_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surats`
--

INSERT INTO `surats` (`id`, `nama_pengaju`, `tanggal_diterima`, `status`, `created_at`, `updated_at`, `documents_id`) VALUES
(5, 'Sophia', '2024-09-24', 'disetujui', '2024-09-24 04:55:43', '2024-09-24 05:31:46', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `gender`, `photo`) VALUES
(1, 'Misr', 'sal@gmail.com', NULL, '$2y$10$25gAZYdrx9U2mdSJvNeMkum5KXQx/YTJ22Uxf13LIqty7xGC04TSO', NULL, '2024-09-23 02:44:30', '2024-09-23 03:40:19', 'male', '1727088019_flower.jpeg'),
(2, 'THEFOOL', 'greatmaster@mail.com', NULL, '$2y$10$YA/VD1.pK5f6ZQGlvMahIuTnBybVpwB3BytbUF5QKWQ1QEDjdT/FO', NULL, '2024-09-23 03:39:51', '2024-09-23 03:39:51', 'male', '1727087991_eye.jpeg'),
(3, 'Sophia', 'soph@gmail.com', NULL, '$2y$10$2SFcVtvswrG3p62Rchto/.dj9FX0Ad1.fRCb5l1Qsp4IqmuUG/m9i', NULL, '2024-09-23 03:40:54', '2024-09-23 03:40:54', 'female', '1727088054_hsg.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pekerjaan_nama_pekerjaan_unique` (`nama_pekerjaan`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penduduk_nik_unique` (`nik`),
  ADD KEY `penduduk_pekerjaan_id_foreign` (`pekerjaan_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `surats`
--
ALTER TABLE `surats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surats_documents_id_foreign` (`documents_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surats`
--
ALTER TABLE `surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk_pekerjaan_id_foreign` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surats`
--
ALTER TABLE `surats`
  ADD CONSTRAINT `surats_documents_id_foreign` FOREIGN KEY (`documents_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
