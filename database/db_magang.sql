-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2023 pada 14.31
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id_absensi` int(15) NOT NULL,
  `id_mahasiswa` int(15) DEFAULT NULL,
  `status` int(15) DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id_absensi`, `id_mahasiswa`, `status`, `waktu`, `tanggal`) VALUES
(1, 1, 1, '08:01:00', '2024-12-05'),
(2, 1, 1, '08:02:00', '2024-12-06'),
(3, 1, 1, '08:03:00', '2024-12-07'),
(4, 1, 1, '08:04:00', '2024-12-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(15) NOT NULL,
  `kode_admin` varchar(4) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `kode_admin`, `nama`, `nip`, `email`) VALUES
(1, 'A001', 'BAKESBANGPOL', '202110370311', 'bakesbangpol@gmail.com'),
(2, 'A002', 'Dinas Sosial Batu', '202110370312', 'dinassosialbatu@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alasan`
--

CREATE TABLE `tbl_alasan` (
  `id_alasan` int(15) NOT NULL,
  `id_mahasiswa` int(15) DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_alasan`
--

INSERT INTO `tbl_alasan` (`id_alasan`, `id_mahasiswa`, `alasan`, `tanggal`) VALUES
(1, 1, 'Izin Kampus', '2023-01-09'),
(2, 2, 'Sakit Perut', '2023-01-09'),
(3, 1, 'Izin Kampus', '2023-01-13'),
(4, 2, 'Izin Kampus', '2023-01-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(15) NOT NULL,
  `id_mahasiswa` int(15) DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `waktu_awal` time DEFAULT NULL,
  `waktu_akhir` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `id_mahasiswa`, `kegiatan`, `waktu_awal`, `waktu_akhir`, `tanggal`) VALUES
(1, 1, 'Melakukan Verifikasi Pajak', '08:00:09', '12:00:21', '2022-12-05'),
(2, 1, 'Melakukan Verifikasi Pajak', '14:13:10', '14:13:22', '2022-12-05'),
(3, 1, 'Melakukan Verifikasi Pajak', '08:09:09', '14:13:21', '2022-12-06'),
(4, 1, 'Melakukan Verifikasi Pajak', '14:13:10', '14:13:22', '2022-12-06'),
(5, 1, 'Melakukan Verifikasi Pajak', '08:09:09', '14:13:21', '2022-12-07'),
(6, 1, 'Melakukan Verifikasi Pajak', '14:13:10', '14:13:22', '2022-12-07'),
(7, 1, 'Melakukan Verifikasi Pajak', '08:09:09', '14:13:21', '2022-12-08'),
(8, 1, 'Melakukan Verifikasi Pajak', '14:13:10', '14:13:22', '2022-12-08'),
(9, 1, 'Melakukan Verifikasi Pajak', '08:09:09', '14:13:21', '2022-12-09'),
(10, 1, 'Melakukan Verifikasi Pajak', '14:13:10', '14:13:22', '2022-12-09'),


-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mahasiswa` int(15) NOT NULL,
  `kode_mahasiswa` varchar(4) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `universitas` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `mulai_magang` date DEFAULT NULL,
  `akhir_magang` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mahasiswa`, `kode_mahasiswa`, `nama`, `universitas`, `jurusan`, `nim`, `mulai_magang`, `akhir_magang`, `alamat`, `email`,`no_telp`, `foto`) VALUES
(1, 'M001', 'Lintar Rezha Candra Krisna', 'Universitas Muhammadiyah Malang', 'Teknik Informatika', '202110370311379', '2025-01-14', '2025-02-17', 'JL. Dawuhan, Gondang, Tegalgondo', 'lintarrezha7@gmail.com', '081239468766,', 'foto_default.png');
(2, 'M002', 'Febriyanto', 'Universitas Muhammadiyah Malang', 'Teknik Informatika', '202110370311350', '2025-01-14', '2025-02-17', 'JL. Dawuhan, Gondang, Tegalgondo', 'user1@gmail.com', '081239468766', 'foto_default.png');
(3, 'M003', 'Mohammad Fahril Alfarizi', 'Universitas Muhammadiyah Malang', 'Teknik Informatika', '202110370311386', '2025-01-14', '2025-02-17', 'JL. Dawuhan, Gondang, Tegalgondo', 'user2@gmail.com','081239468766', 'foto_default.png');
(4, 'M004', 'Bryan Rizky Maulana', 'Universitas Muhammadiyah Malang', 'Teknik Informatika', '202110370311390', '2025-01-14', '2025-02-17', 'JL. Dawuhan, Gondang, Tegalgondo', 'user3@gmail.com', '081239468766', 'foto_default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting_absensi`
--

CREATE TABLE `tbl_setting_absensi` (
  `id_waktu` int(15) DEFAULT NULL,
  `mulai_absen` time DEFAULT NULL,
  `akhir_absen` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting_absensi`
--

INSERT INTO `tbl_setting_absensi` (`id_waktu`, `mulai_absen`, `akhir_absen`) VALUES
(1, '08:00:00', '01:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_site`
--

CREATE TABLE `tbl_site` (
  `id_site` int(15) DEFAULT NULL,
  `nama_instansi` varchar(255) DEFAULT NULL,
  `pimpinan` varchar(255) DEFAULT NULL,
  `pembimbing` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_site`
--

INSERT INTO `tbl_site` (`id_site`, `nama_instansi`, `pimpinan`, `pembimbing`, `alamat`, `no_telp`, `website`, `logo`) VALUES
(1, 'Badan Kesatuan Bangsa dan Politik Kota Batu', 'Fulan, Spd.', 'Bashor Fauzan Muthohirin, S.Kom., M.Kom.', 'Balaikota Among Tani, Jl. Panglima Sudirman No.507, Pesanggrahan, Kec. Batu, Kota Batu, Jawa Timur 65314', '08123456778', 'https://bakesbangpol.malangkota.go.id/', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(15) NOT NULL,
  `kode_pengguna` varchar(4) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `kode_pengguna`, `username`, `password`, `level`) VALUES
(1, 'A001', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
(2, 'A002', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
(3, 'M001', '062030701635', 'e10adc3949ba59abbe56e057f20f883e', 'Mahasiswa'),
(4, 'M002', '062030701636', 'e10adc3949ba59abbe56e057f20f883e', 'Mahasiswa'),
(5, 'M003', '062030701634', 'e10adc3949ba59abbe56e057f20f883e', 'Mahasiswa'),
(6, 'M004', '202110370311379', 'e10adc3949ba59abbe56e057f20f883e', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `tbl_absensi_ibfk1_1` (`id_mahasiswa`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `kode_admin` (`kode_admin`);

--
-- Indeks untuk tabel `tbl_alasan`
--
ALTER TABLE `tbl_alasan`
  ADD PRIMARY KEY (`id_alasan`),
  ADD KEY `tbl_alasan_ibfk1_1` (`id_mahasiswa`);

--
-- Indeks untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `tbl_kegiatan_ibfk1_1` (`id_mahasiswa`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `kode_mahasiswa` (`kode_mahasiswa`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `kode_pengguna` (`kode_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id_absensi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_alasan`
--
ALTER TABLE `tbl_alasan`
  MODIFY `id_alasan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD CONSTRAINT `tbl_absensi_ibfk1_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tbl_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`kode_admin`) REFERENCES `tbl_user` (`kode_pengguna`);

--
-- Ketidakleluasaan untuk tabel `tbl_alasan`
--
ALTER TABLE `tbl_alasan`
  ADD CONSTRAINT `tbl_alasan_ibfk1_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tbl_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD CONSTRAINT `tbl_kegiatan_ibfk1_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tbl_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD CONSTRAINT `tbl_mahasiswa_ibfk_1` FOREIGN KEY (`kode_mahasiswa`) REFERENCES `tbl_user` (`kode_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
