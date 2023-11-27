-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2023 pada 09.03
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agenda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id_agenda` int(11) NOT NULL,
  `status_pengisi` varchar(10) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jam_ke` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `id_mapel` varchar(6) NOT NULL,
  `durasi` int(11) NOT NULL,
  `tujuan_pemb` varchar(200) NOT NULL,
  `materi` varchar(200) NOT NULL,
  `evaluasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_agenda`
--

INSERT INTO `tb_agenda` (`id_agenda`, `status_pengisi`, `tgl`, `jam_ke`, `nip`, `id_kelas`, `id_mapel`, `durasi`, `tujuan_pemb`, `materi`, `evaluasi`) VALUES
(3, 'siswa', '2023-11-27 07:57:55', 2, '198111032008011005', 'E10001', 'MP1002', 55, 'Meningkatkan Kualitas', 'CURRENT TIMESTAMP', 'Deadline');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `nip` (`nip`,`id_kelas`,`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD CONSTRAINT `tb_agenda_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_guru` (`nip`),
  ADD CONSTRAINT `tb_agenda_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `tb_agenda_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
