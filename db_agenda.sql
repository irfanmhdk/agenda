-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2024 pada 07.48
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

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `data_absen` ()   SELECT tb_absen.nis,tb_siswa.nama,tb_siswa.id_kelas,tb_kelas.tingkat,tb_kelas.jurusan,tb_kelas.kelas,MONTH(tb_absen.tanggal) Bulan, COUNT(CASE WHEN tb_absen.kehadiran ='H' THEN 1 END) AS 'Hadir', COUNT(CASE WHEN tb_absen.kehadiran ='S' THEN 1 END) AS 'Sakit', COUNT(CASE WHEN tb_absen.kehadiran ='I' THEN 1 END) AS 'Ijin', COUNT(CASE WHEN tb_absen.kehadiran ='A' THEN 1 END) AS 'tanpa_keterangan' FROM tb_kelas INNER JOIN tb_siswa ON tb_kelas.id_kelas=tb_siswa.id_kelas INNER JOIN tb_absen ON tb_siswa.nis=tb_absen.nis GROUP BY nis$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_agenda`
--

CREATE TABLE `det_agenda` (
  `id` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `kehadiran` varchar(1) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kehadiran` varchar(2) NOT NULL,
  `ket` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `nis`, `tanggal`, `kehadiran`, `ket`) VALUES
(32, '102306363', '2023-09-18', 'H', '-'),
(33, '102306363', '2023-09-19', 'H', '-'),
(34, '102306364', '2023-09-18', 'H', '-'),
(35, '102306364', '2023-09-19', 'H', '-'),
(36, '102306365', '2023-09-18', 'H', '-'),
(37, '102306365', '2023-09-19', 'S', '-'),
(38, '102306366', '2023-09-18', 'S', '-'),
(39, '102306366', '2023-09-19', 'S', '-'),
(40, '102306367', '2023-09-18', 'H', '-'),
(41, '102306367', '2023-09-19', 'S', '-'),
(42, '102306368', '2023-09-18', 'H', '-'),
(43, '102306368', '2023-09-19', 'H', '-'),
(44, '102306369', '2023-09-18', 'H', '-'),
(45, '102306369', '2023-09-19', 'H', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id_agenda` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jam_masuk` varchar(50) NOT NULL,
  `jam_selesai` varchar(50) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `id_mapel` varchar(6) NOT NULL,
  `tugas` enum('Tugas Langsung','Menitipkan Tugas','Tidak Ada Tugas') NOT NULL,
  `materi` varchar(200) NOT NULL,
  `evaluasi` varchar(200) NOT NULL,
  `kehadiran` enum('Hadir','Tidak Hadir','Hanya Hadir Diakhir','Hanya Hadir Diawal') NOT NULL,
  `verifikasi` varchar(50) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_agenda`
--

INSERT INTO `tb_agenda` (`id_agenda`, `tgl`, `jam_masuk`, `jam_selesai`, `nip`, `id_kelas`, `id_mapel`, `tugas`, `materi`, `evaluasi`, `kehadiran`, `verifikasi`, `comment`) VALUES
(10, '2024-01-23 01:57:18', '07.00', '08.30', '198111032008011005', 'P10001', 'MP1001', 'Menitipkan Tugas', 'asdw', 'dwasd', 'Hanya Hadir Diakhir', 'Belum Verifikasi', ''),
(11, '2024-02-05 02:49:45', '10.55', '11.30', '198111032008011005', 'P10001', 'MP1001', 'Tugas Langsung', 'q4e3', 'qefe', 'Hadir', 'Sudah Verifikasi', 'aman'),
(12, '2024-02-05 04:30:41', '07.00', '10.15', '198111032008011005', 'P10001', 'MP1001', 'Tugas Langsung', 'sdwasd', 'aman', 'Hadir', 'Belum Verifikasi', ''),
(13, '2024-02-05 04:32:24', '10.15', '11.30', '198111032008011006', 'P10001', 'MP1002', 'Menitipkan Tugas', 'dthd', 'ssdge', 'Hanya Hadir Diakhir', 'Belum Verifikasi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agenda_guru`
--

CREATE TABLE `tb_agenda_guru` (
  `id_agenda_guru` int(11) NOT NULL,
  `tgl` varchar(18) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `id_mapel` varchar(6) NOT NULL,
  `materi` varchar(200) NOT NULL,
  `dokumentasi` text NOT NULL,
  `catatan_kejadian` text NOT NULL,
  `kehadiran_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_agenda_guru`
--

INSERT INTO `tb_agenda_guru` (`id_agenda_guru`, `tgl`, `jam_ke`, `nip`, `id_kelas`, `id_mapel`, `materi`, `dokumentasi`, `catatan_kejadian`, `kehadiran_guru`) VALUES
(1, '198111032008011005', 1, 'MP1005', 'D10001', 'Hadir', 'VOC', 'dadad', '', ''),
(2, '', 0, '', '', 'Hadir', 'VOC', 'dadad', '', ''),
(3, '', 0, '', '', 'Hadir', 'VOC', 'zxzxzx', '', ''),
(4, '', 0, '', '', 'Hadir', 'VOC8989898', '9090909', '', ''),
(5, '', 0, '', '', 'Tidak ', 'VOC', 'asasas', '', ''),
(6, '', 0, '', '', 'Hadir', 'qqq', 'qq', '', ''),
(7, '', 0, '', '', 'Hadir', 'ssssss', 'adadadadad', '', ''),
(8, '', 0, '', '', 'Hadir', 'qqq', 'cbcdfbgdgd', '', ''),
(9, '2023-12-18 11:10:5', 3, '198111032008011007', 'P10001', 'MP1003', 'gfgdfgfg', 'Screenshot (2).png', 'dqeqeqe', 'Tidak Hadir'),
(10, '2023-12-18 13:50:5', 1, '198111032008011005', 'P10001', 'MP1001', 'gfgdfgfg', 'Screenshot (2).png', 'adsa', 'Hadir'),
(11, '2023-12-19 07:29:5', 2, '198111032008011006', 'P10001', 'MP1002', 'Excel', 'smk2.jpg', 'dasadasasdasdas', 'Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` varchar(18) NOT NULL,
  `id_mapel` varchar(6) NOT NULL,
  `nama_guru` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `id_mapel`, `nama_guru`) VALUES
('198111032008011005', 'MP1032', 'Gugum'),
('198111032008011006', 'MP1006', 'Endro Tri Prasetyo'),
('198111032008011007', 'MP1018', 'Eneng sayidah'),
('198111032008011008', 'MP1006', 'Engkus Kusawara'),
('198111032008011009', 'MP1005', 'Agung Apriatna'),
('198111032008011010', 'MP1004', 'ACA'),
('198111032008011011', 'MP1007', 'Adrianty Noorhanif'),
('198111032008011012', 'MP1012', 'Agus Basuki'),
('198111032008011013', 'MP1013', 'Agus M Sopyan'),
('198111032008011014', 'MP1014', 'Andi Garnadi'),
('198111032008011015', 'MP1015', 'Anom Jati Kusumo'),
('198111032008011016', 'MP1015', 'Arum Pertiwi'),
('198111032008011017', 'MP1016', 'Asep Permana'),
('198111032008011018', 'MP1017', 'Asep Sukmana'),
('198111032008011019', 'MP1017', 'Asri Dena Veviani'),
('198111032008011020', 'MP1001', 'Astri Hastriani'),
('198111032008011021', 'MP1018', 'Astri Putri Perdana'),
('198111032008011022', 'MP1019', 'Cristhin Agustin'),
('198111032008011023', 'MP1008', 'Cucu Lasmanawati'),
('198111032008011024', 'MP1020', 'Dadan Mahdan'),
('198111032008011025', 'MP1001', 'Dadan Rosadi'),
('198111032008011026', 'MP1020', 'Daniel Adhi Hutomo'),
('198111032008011027', 'MP1022', 'Dede Pamungkas'),
('198111032008011028', 'MP1010', 'Dedi Suhendar'),
('198111032008011029', 'MP1023', 'Didit Ariadi'),
('198111032008011030', 'MP1025', 'Deden Sumirat'),
('198111032008011031', 'MP1015', 'Durahman'),
('198111032008011032', 'MP1009', 'Dwi Cahyaningsih'),
('198111032008011033', 'MP1026', 'Dwisnaini Adriyos '),
('198111032008011034', 'MP1027', 'Dyah Kusumaningrum'),
('198111032008011035', 'MP1028', 'Edy Santoso'),
('198111032008011036', 'MP1005', 'Erni Anggraeni'),
('198111032008011037', 'MP1029', 'Fajar Heriyanto'),
('198111032008011038', 'MP1030', 'Fajar Bani Fauzan'),
('198111032008011039', 'MP1031', 'Fauzi Nugroho'),
('198111032008011040', 'MP1032', 'Gigin Gantini'),
('198111032008011041', 'MP1002', 'Gina Dwi Septiani'),
('198111032008011042', 'MP1002', 'Hana Susanti'),
('198111032008011043', 'MP1002', 'Hani Handayani'),
('198111032008011044', 'MP1006', 'Heni Hadiati'),
('198111032008011045', 'MP1015', 'Husni Maridiah'),
('198111032008011046', 'MP1001', 'Ima Nurmayati'),
('198111032008011047', 'MP1033', 'Irvan Hilmi'),
('198111032008011048', 'MP1034', 'Ismita Ratnasari'),
('198111032008011049', 'MP1035', 'Iwan Toni Saputro'),
('198111032008011050', 'MP1036', 'Izma Yuliana'),
('198111032008011051', 'MP1037', 'Julisa Irtina'),
('198111032008011052', 'MP1038', 'Kusman Subaja'),
('198111032008011053', 'MP1039', 'Kuswati'),
('198111032008011054', 'MP1004', 'Lilis Susanti'),
('198111032008011055', 'MP1034', 'Mariam Komalawati'),
('198111032008011056', 'MP1015', 'Marsita Dahliani Putri'),
('198111032008011057', 'MP1009', 'Mas Yudi Riksa Kusumah'),
('198111032008011058', 'MP1002', 'Maya Karmila'),
('198111032008011059', 'MP1032', 'Moch Gani Setiawan'),
('198111032008011060', 'MP1015', 'Mutiara Sobariah'),
('198111032008011061', 'MP1008', 'Nandang'),
('198111032008011062', 'MP1009', 'Nani Hasanah'),
('198111032008011063', 'MP1008', 'Neneng Fauziah'),
('198111032008011064', 'MP1043', 'Neneng Isti janiati'),
('198111032008011065', 'MP1002', 'Nunung Lisnawati'),
('198111032008011066', 'MP1011', 'Nurrani Siswanti'),
('198111032008011067', 'MP1044', 'Pradina Diah Aryanti'),
('198111032008011068', 'MP1045', 'Rahmat Santa'),
('198111032008011069', 'MP1046', 'Ramdan Nurhaidir'),
('198111032008011070', 'MP1047', 'Raniutami Widiyanti'),
('198111032008011071', 'MP1005', 'Ratna Isnaeni Tesdy'),
('198111032008011072', 'MP1032', 'Irfan Santika Rahman'),
('198111032008011073', 'MP1038', 'Rulyan Saptadji'),
('198111032008011074', 'MP1048', 'Ridawn Firdaus'),
('198111032008011075', 'MP1051', 'Ridawn Yanuardi'),
('198111032008011076', 'MP1002', 'Ririn Widiarti'),
('198111032008011077', 'MP1024', 'Rohaeni Nur Eli'),
('198111032008011078', 'MP1008', 'Saliman'),
('198111032008011079', 'MP1052', 'Samsudin'),
('198111032008011080', 'MP1022', 'Sandra Irawan'),
('198111032008011081', 'MP1006', 'Setiawan'),
('198111032008011082', 'MP1001', 'Siti Eftafiyana'),
('198111032008011083', 'MP1002', 'Siti Roidah'),
('198111032008011084', 'MP1009', 'Sri Mulyati'),
('198111032008011085', 'MP1030', 'Syaifullah'),
('198111032008011086', 'MP1004', 'Syntia Mahyarani'),
('198111032008011087', 'MP1047', 'Teti Suharti'),
('198111032008011088', 'MP1015', 'Tini Hernawati'),
('198111032008011089', 'MP1024', 'Tuti Murdayani'),
('198111032008011090', 'MP1001', 'Utami Nurhayati'),
('198111032008011091', 'MP1049', 'Wahyu Sumirat Sumardi'),
('198111032008011092', 'MP1020', 'Wisnu Ramdhani'),
('198111032008011093', 'MP1054', 'Yana Cahya Kusumah'),
('198111032008011094', 'MP1024', 'Yayat Ruhyat'),
('198111032008011095', 'MP1055', 'Yayat Sudrajat'),
('198111032008011096', 'MP1056', 'Yudi Wahyudi'),
('198111032008011097', 'MP1015', 'Yudith Rahayu'),
('198111032008011098', 'MP1007', 'Yuliani'),
('198111032008011099', 'MP1008', 'Yulie Yulianti'),
('198111032008011100', 'MP1022', 'Yulius Rudiana'),
('198111032008011101', 'MP1004', 'Yusi Siti Masitoh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_masuk` varchar(15) NOT NULL,
  `jam_selesai` varchar(15) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_mapel` varchar(6) NOT NULL,
  `ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_kelas`, `hari`, `jam_masuk`, `jam_selesai`, `nip`, `id_mapel`, `ruangan`) VALUES
(12, 'D10001', 'Senin', '08.30', '11.30', '198111032008011083', 'MP1002', 'E5'),
(19, 'A10001', 'Senin', '11.30', '15.00', '198111032008011038', 'MP1030', 'R-B1'),
(20, 'A10001', 'Selasa', '07.00', '10.15', '198111032008011033', 'MP1026', 'R-B1'),
(21, 'A10001', 'Selasa', '10.15', '13.40', '198111032008011038', 'MP1030', 'R-B1'),
(22, 'A10001', 'Selasa', '13.40', '15.00', '198111032008011088', 'MP1015', 'E9'),
(23, 'A10001', 'Rabu', '07.00', '09.15', '198111032008011023', 'MP1008', 'R-B1'),
(24, 'A10001', 'Rabu', '09.15', '10.55', '198111032008011071', 'MP1005', 'R-B1'),
(25, 'A10001', 'Rabu', '10.55', '13.40', '198111032008011044', 'MP1006', 'Lap-1, R-B1'),
(26, 'A10001', 'Rabu', '14.20', '15.00', '198111032008011028', 'MP1010', 'R-B1'),
(27, 'A10001', 'Rabu', '15.00', '16.00', '198111032008011032', 'MP1009', 'R-B1'),
(28, 'A10001', 'Kamis', '07.00', '11.30', '198111032008011089', 'MP1024', 'R-B1'),
(29, 'A10001', 'Kamis', '11.30', '13.40', '198111032008011066', 'MP1011', 'R-B1'),
(30, 'A10001', 'Kamis', '13.40', '16.00', '198111032008011010', 'MP1004', 'R-B1'),
(31, 'A10001', 'Jumat', '07.00', '10.15', '198111032008011043', 'MP1002', 'R-B1'),
(32, 'A10001', 'Jumat', '10.15', '14.20', '198111032008011090', 'MP1001', 'R-B1'),
(33, 'A10002', 'Senin', '08.30', '11.30', '198111032008011010', 'MP1004', 'R-B2'),
(34, 'A10002', 'Senin', '11.30', '13.40', '198111032008011066', 'MP1011', 'R-B2'),
(35, 'A10002', 'Senin', '13.40', '16.00', '198111032008011043', 'MP1002', 'R-B2'),
(36, 'A10002', 'Selasa', '07.00', '09.15', '198111032008011044', 'MP1006', 'Lap-1, R-B2'),
(37, 'A10002', 'Selasa', '09.15', '11.30', '198111032008011023', 'MP1008', 'R-B2'),
(38, 'A10002', 'Selasa', '11.30', '16.00', '198111032008011089', 'MP1024', 'R-B2'),
(39, 'A10002', 'Rabu', '07.00', '10.15', '198111032008011085', 'MP1030', 'R-B2'),
(40, 'A10002', 'Rabu', '10.15', '13.40', '198111032008011033', 'MP1026', 'R-B2'),
(41, 'A10002', 'Rabu', '13.40', '15.00', '198111032008011015', 'MP1015', 'R-B2'),
(42, 'A10002', 'Kamis', '07.00', '10.15', '198111032008011038', 'MP1030', 'R-B2'),
(43, 'A10002', 'Kamis', '10.15', '13.40', '198111032008011085', 'MP1030', 'R-B2'),
(44, 'A10002', 'Jumat', '07.00', '10.55', '198111032008011090', 'MP1001', 'E10'),
(45, 'A10002', 'Jumat', '10.55', '13.40', '198111032008011071', 'MP1005', 'E10'),
(46, 'A10002', 'Jumat', '13.40', '15.00', '198111032008011028', 'MP1010', 'E10'),
(47, 'A10002', 'Jumat', '15.00', '16.00', '198111032008011032', 'MP1009', 'E10'),
(48, 'D10001', 'Senin', '11.30', '13.40', '198111032008011036', 'MP1005', 'E5'),
(49, 'D10001', 'Senin', '13.40', '15.00', '198111032008011031', 'MP1015', 'E5'),
(50, 'D10001', 'Selasa', '07.00', '10.15', '198111032008011029', 'MP1023', 'DKV L-A'),
(51, 'D10001', 'Selasa', '09.15', '15.00', '198111032008011068', 'MP1045', 'DKV L-A'),
(52, 'D10001', 'Rabu', '07.00', '10.15', '198111032008011101', 'MP1004', 'E5'),
(53, 'D10001', 'Rabu', '10.15', '11.30', '198111032008011028', 'MP1010', 'E5'),
(54, 'D10001', 'Rabu', '11.30', '15.00', '198111032008011046', 'MP1001', 'E5'),
(55, 'D10001', 'Kamis', '07.00', '09.15', '198111032008011023', 'MP1008', 'E5'),
(56, 'D10001', 'Kamis', '09.15', '11.30', '198111032008011081', 'MP1006', 'Lap-1, E5'),
(57, 'D10001', 'Kamis', '11.30', '16.00', '198111032008011094', 'MP1024', 'E5'),
(58, 'D10001', 'Jumat', '07.00', '13.40', '198111032008011068', 'MP1045', 'DKV L-C'),
(59, 'D10001', 'Jumat', '13.40', '15.00', '198111032008011032', 'MP1009', 'E5'),
(60, 'D10001', 'Jumat', '15.00', '16.00', '198111032008011066', 'MP1011', 'E5'),
(61, 'P10001', 'Senin', '08.30', '11.30', '198111032008011072', 'MP1032', 'RPL-2'),
(62, 'P10001', 'Senin', '11.30', '16.00', '198111032008011005', 'MP1032', 'RPL-2'),
(63, 'P10001', 'Selasa', '07.00', '10.55', '198111032008011040', 'MP1032', 'RPL-2'),
(64, 'P10001', 'Selasa', '10.55', '15.00', '198111032008011059', 'MP1032', 'RPL-2'),
(65, 'P10001', 'Selasa', '15.00', '16.00', '198111032008011031', 'MP1015', 'RPL-2'),
(66, 'P10001', 'Rabu', '07.00', '09.15', '198111032008011044', 'MP1006', 'Lap-1'),
(67, 'P10001', 'Rabu', '09.15', '11.30', '198111032008011058', 'MP1002', 'E3'),
(68, 'P10001', 'Rabu', '13.00', '15.30', '198111032008011054', 'MP1004', 'E3'),
(69, 'P10001', 'Kamis', '07.00', '10.15', '198111032008011090', 'MP1001', 'E3'),
(70, 'P10001', 'Kamis', '10.15', '11.30', '198111032008011023', 'MP1008', 'E3'),
(71, 'P10001', 'Kamis', '13.00', '14.20', '198111032008011036', 'MP1005', 'E3'),
(72, 'P10001', 'Kamis', '15.30', '16.00', '198111032008011066', 'MP1011', 'E3'),
(73, 'P10001', 'Jumat', '07.00', '08.30', '198111032008011028', 'MP1010', 'E3'),
(74, 'P10001', 'Jumat', '09.15', '10.55', '198111032008011084', 'MP1009', 'E3'),
(75, 'P10001', 'Jumat', '10.55', '15.30', '198111032008011094', 'MP1024', 'E3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan_lain`
--

CREATE TABLE `tb_kegiatan_lain` (
  `id_kelain` int(11) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `judul_kegiatan` varchar(255) NOT NULL,
  `isi_kegiatan` varchar(255) NOT NULL,
  `catatan_kejadian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kegiatan_lain`
--

INSERT INTO `tb_kegiatan_lain` (`id_kelain`, `id_kelas`, `tgl`, `judul_kegiatan`, `isi_kegiatan`, `catatan_kejadian`) VALUES
(1, 'P10001', '2024-02-20 02:26:28', 'Pesantren Kilat', 'Mengaji', 'Rizky Mabal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(6) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
('A10001', 'X ANIMASI A'),
('A10002', 'X ANIMASI B'),
('A20001', 'XI ANIMASI A'),
('A20002', 'XI ANIMASI B'),
('D10001', 'X DKV A'),
('D10002', 'X DKV B'),
('D10003', 'X DKV C'),
('D20001', 'XI DKV A'),
('D20002', 'XI DKV B'),
('D20003', 'XI DKV C'),
('E10001', 'X ELEKTRONIKA A'),
('E10002', 'X ELEKTRONIKA B'),
('E10003', 'X ELEKTRONIKA C'),
('E10004', 'X ELEKTRONIKA D'),
('E20001', 'XI ELEKTRONIKA A'),
('E20002', 'XI ELEKTRONIKA B'),
('E20003', 'XI ELEKTRONIKA C'),
('E20004', 'XI ELEKTRONIKA D'),
('K10001', 'X KIMIA A'),
('K10002', 'X KIMIA B'),
('K10003', 'X KIMIA C'),
('K20001', 'XI KIMIA A'),
('K20002', 'XI KIMIA B'),
('K20003', 'XI KIMIA C'),
('P10001', 'X PPLG A'),
('P10002', 'X PPLG B'),
('P20001', 'XI PPLG A'),
('P20002', 'XI PPLG B'),
('T10001', 'X PEMESINAN A'),
('T10002', 'X PEMESINAN B'),
('T20001', 'XI PEMESINAN A'),
('T20002', 'XI PEMESINAN B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` varchar(6) NOT NULL,
  `nama_mapel` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`) VALUES
('MP1001', 'Matematika'),
('MP1002', 'Bahasa Indonesia'),
('MP1003', 'Ilmu Pengetahuan Alam Sosial'),
('MP1004', 'Bahasa Inggris'),
('MP1005', 'Sejarah'),
('MP1006', 'Pendidikan Jasmani, Olahraga, dam Kesehatan'),
('MP1007', 'Pendidikan Lingkungan Hidup'),
('MP1008', 'Pendidikan Agama Islam dan Budi Pekerti'),
('MP1009', 'Pendidikan Pancasila'),
('MP1010', 'Seni Budaya dan Keterampilan'),
('MP1011', 'Bahasa Sunda'),
('MP1012', 'Konsentrasi Keahlian Desain Grafis '),
('MP1013', 'KK2 T- Permesinan-BUBUT'),
('MP1014', 'PKK2 T-Permesinan'),
('MP1015', 'BP/BK'),
('MP1016', 'KK1 T- Permesinan-CNC'),
('MP1017', 'PKK2 DKV'),
('MP1018', 'Dasar-Dasar Kejuruan'),
('MP1019', 'PKK3 Robotik'),
('MP1020', 'Perawatan dan perbaikan peralatan Mekatronik'),
('MP1021', 'Teknik Kontrol Sistem Mekatronik'),
('MP1022', 'KK Animasi-12'),
('MP1023', 'Informartika DKV'),
('MP1024', 'IPAS'),
('MP1025', 'Dasar Kelistrikan'),
('MP1026', 'Informartika Animasi'),
('MP1027', 'Konsentrasi Keahlian Desain Grafis Percetakan '),
('MP1028', 'KKMK1-Sistem Robotik'),
('MP1029', 'Informartika Elektronika'),
('MP1030', 'Dasar dasar Animasi'),
('MP1031', 'Pilihan-A Indusrtrial IOT'),
('MP1032', 'Dasar-Dasar PPL&GIM'),
('MP1033', 'Bahasa Jepang'),
('MP1034', 'Konsentrasi Keahlian RPL -2 '),
('MP1035', 'Informartika Mesin'),
('MP1036', 'PIlihan-A Teknik Kimia Industri'),
('MP1037', 'XII-KIMIDUS 2-AIK'),
('MP1038', 'Teknik Kontrol Mekatronika-1'),
('MP1039', 'PKK1 DKV'),
('MP1040', 'PKK2 DKV'),
('MP1041', 'Konsentrasi Keahlian RPL -1'),
('MP1042', 'Konsentrasi Keahlian RPL -3'),
('MP1043', 'Konsentrasi Keahlian Pengolahan Audio'),
('MP1044', 'Pilihan-B Teknik Kimia Industri'),
('MP1045', 'Dasar-Dasar DKV'),
('MP1046', 'XI-KIMIDUS 2-AIK'),
('MP1047', 'KI Dasar Dasar Kejuruan'),
('MP1048', 'PKK1 Mekatronika'),
('MP1049', 'PKK2 Mekatronika'),
('MP1050', 'PKK3 Mekatronika'),
('MP1051', 'KK2 T Permesinan-GTM'),
('MP1052', 'SIstem Mekatronik Berbasis CAE'),
('MP1053', 'KI-Dasar-Dasar Kejuran'),
('MP1054', 'Konsentrasi keahlian -1'),
('MP1055', 'KK1 T Permesinan FRAIS'),
('MP1056', 'KKMK1-CAE'),
('MP1057', 'Informatika PPL & GIM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Kelas'),
(4, 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `jk`, `id_kelas`, `no_telp`) VALUES
('102306363', 'ADI FADLY SHAADIQIN', 'L', 'P10001', '-'),
('102306364', 'AHMAD IQBAL MAULANA', 'L', 'P10001', '-'),
('102306365', 'AL RASYID NAZARUDIN', 'L', 'P10001', '-'),
('102306366', 'AQELL RAZZA HAFIIZ', 'L', 'P10001', '-'),
('102306367', 'DIANA NUR RAMDIANI', 'P', 'P10001', '-'),
('102306368', 'DWI PUTRI RAHMADANI', 'P', 'P10001', '-'),
('102306369', 'DZIKA AZIZIL JULFIKRI', 'L', 'P10001', '-'),
('102306370', 'FABIAN AULIA PERMANA', 'L', 'P10001', '-'),
('102306371', 'FATMA NUR FADILA', 'P', 'P10001', '-'),
('102306372', 'IZZY SANDRIANNA RAKHMAN', 'L', 'P10001', '-'),
('102306373', 'KAYLA ADHALIES SOLEH', 'P', 'P10001', '-'),
('102306374', 'LIDYA VALENTINA CRISTIE BR MANIK', 'P', 'P10001', '-'),
('102306375', 'MARSYA AMIRA', 'P', 'P10001', '-'),
('102306376', 'MUHAMAD ALFAN RAMADAN', 'L', 'P10001', '-'),
('102306377', 'MUHAMMAD DAFFA ARRIZKY', 'L', 'P10001', '-'),
('102306378', 'MUHAMMAD HAIKAL \'ARIEF', 'L', 'P10001', '-'),
('102306379', 'MUHAMMAD PASHA AFGANI SIDAMPOY', 'L', 'P10001', '-'),
('102306380', 'MUHAMMAD QINTHAR AZKA NUGRAHA', 'L', 'P10001', '-'),
('102306381', 'MUHAMMAD RIZKI HASAN', 'L', 'P10001', '-'),
('102306382', 'QAILLA JULYA AGNIA SUPRATMAN', 'P', 'P10001', '-'),
('102306383', 'RADEN MOHAMAD NAUFAL GHANI FATTAH MUTAQIEN', 'L', 'P10001', '-'),
('102306384', 'RAFFI ALDZANI', 'L', 'P10001', '-'),
('102306385', 'RAIZAN KHAIRUL ANAM', 'L', 'P10001', '-'),
('102306386', 'RAKHA ATHOILLAH ', 'L', 'P10001', '-'),
('102306387', 'RAMDANI', 'L', 'P10001', '-'),
('102306388', 'REZA HERMAWAN', 'L', 'P10001', '-'),
('102306389', 'RIANA PUTRI LESTARI', 'P', 'P10001', '-'),
('102306390', 'RITA SALWA ALFIYAH', 'P', 'P10001', '-'),
('102306391', 'RIZKY DWI HARYADI', 'L', 'P10001', '-'),
('102306392', 'SANDY HIDAYAT', 'L', 'P10001', '-'),
('102306393', 'SAVAIRA MUTHIA RAMADHAN', 'P', 'P10001', '-'),
('102306394', 'SEPTIANA RAMADHANI', 'L', 'P10001', '-'),
('102306395', 'SILVA NAFISA SABILLA', 'P', 'P10001', '-'),
('102306396', 'SYIFA NUR AULYA', 'P', 'P10001', '-'),
('102306397', 'WAFIYANA IBRAHIM', 'L', 'P10001', '-'),
('102306398', 'YUGA AHMAD FAUZAN', 'L', 'P10001', '-'),
('102306399', 'ADZFAR SEPTIAN DHIAULROHMAN', 'L', 'P10002', '-'),
('102306400', 'AGISTI NUR ANDINI', 'P', 'P10002', '-'),
('102306401', 'AISHA SALSABILA', 'P', 'P10002', '-'),
('102306402', 'AJENG HERLYANA SETIA FAJRI', 'P', 'P10002', '-'),
('102306403', 'ALBIAN RIZKY RAMADHAN', 'L', 'P10002', '-'),
('102306404', 'ANDIKA AGIFTIA', 'L', 'P10002', '-'),
('102306405', 'ANDRE AGUSTINUS ZACHARIAS', 'L', 'P10002', '-'),
('102306406', 'ASRIANITA NOVIANTI', 'P', 'P10002', '-'),
('102306407', 'DERELL EDRICO ARDIANO LUBIS', 'L', 'P10002', '-'),
('102306408', 'DEWI ANDINI', 'P', 'P10002', '-'),
('102306409', 'ELSA AURELIA PUTRI', 'P', 'P10002', '-'),
('102306410', 'FAHREZA ZULFAQI', 'L', 'P10002', '-'),
('102306411', 'FAHRI RAISA FATURAHMAN', 'L', 'P10002', '-'),
('102306412', 'FAREL RADITYA FAHREZI', 'L', 'P10002', '-'),
('102306413', 'GALLANT FATHUR RAHMAN', 'L', 'P10002', '-'),
('102306414', 'HABIB APTA HIDAYATULLAH', 'L', 'P10002', '-'),
('102306415', 'INTAN SYNTIA DEWI', 'P', 'P10002', '-'),
('102306416', 'KAYLA ANGGI WULANDARI', 'P', 'P10002', '-'),
('102306417', 'KIRANA AURELIA', 'P', 'P10002', '-'),
('102306418', 'M. AZRILBAHTIAR', 'L', 'P10002', '-'),
('102306419', 'MELINDA PUSPITA ANGGRAENI', 'P', 'P10002', '-'),
('102306420', 'MUHAMMAD JIYAD RADIANSYAH', 'L', 'P10002', '-'),
('102306421', 'MUHAMMAD PANCA ABIPHRAYA SUJANA', 'L', 'P10002', '-'),
('102306422', 'MUHAMMAD ZAHWAN AL HASBY', 'L', 'P10002', '-'),
('102306423', 'NAWANG SARI AISYAH', 'P', 'P10002', '-'),
('102306424', 'RAIHAAN FAUZI BARLIAN', 'L', 'P10002', '-'),
('102306425', 'RAISYA SILVANIA RUSNANDI', 'P', 'P10002', '-'),
('102306426', 'REHAN PRATAMA SETIADI', 'L', 'P10002', '-'),
('102306427', 'RIFA PEBRIANTI', 'P', 'P10002', '-'),
('102306428', 'RINI', 'P', 'P10002', '-'),
('102306429', 'RUBEN RAFAEL', 'L', 'P10002', '-'),
('102306430', 'SALIM SYAUQHI RACHMAN', 'L', 'P10002', '-'),
('102306431', 'SARAH AULIA FAJRIANI', 'P', 'P10002', '-'),
('102306432', 'TIARA NUR AMANAH', 'P', 'P10002', '-'),
('102306433', 'ZALWA KHOERUNNISA PEBRIANY', 'P', 'P10002', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(18) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`) VALUES
('1', 'kepsek2cmi', 'kepsek2', 4),
('12345453535353', 'aasas', '$2y$10$oJJFs.tewbq.0YLS4M8.jOFrTF4Bj.u0Fp2RYstGOWTQ9tXi6Ijsq', 2),
('198111032008011005', '198111032008011005', '$2y$10$G2GnZWqojnfrscm/lVDQ5.9dog7nolD7FpMK.h06bvmlhzjzmL/AW', 2),
('198111032008011006', '198111032008011006', '$2y$10$xjCJNZnu03DD1Id8.j3Gw.zyZFcv.fI2fJlGgx0PVfmo5ldC3AD1e', 2),
('198111032008011007', '198111032008011007', '$2y$10$73juMyw0o9dnU7g5Ks5Bl.ag1APRMR23T1BxkdFT0ZQMhxBc1z7QK', 2),
('2', 'admin', '$2y$10$9Olg2QJvYZbIk3RJ4gMcuuX.W2WxpUywFKjPT4xpjJvHThObmMclm', 1),
('A10001', 'xanimasia', '$2y$10$HxXBSIkT.2hLP69zGpYnnuwfHh08npB6YRssSVFy56CC0osZOtSri', 3),
('A10002', 'xanimasib', '$2y$10$wCbEbTjx2WxibkkbG2mSbeBCFNb8VbyB6g.Q3gEz9AF1O8IE2H03e', 3),
('A20001', 'xianimasia', '$2y$10$ylQGNVM6Zdh2/umXnrQIZen08Y4DW0axUCdmk7lFu9Yv3eStBSg5u', 3),
('A20002', 'xianimasib', '$2y$10$WxCAhLTQmH.bzPkcAfDQ.uZS3cFL3H2qlZ49oZWwPzW2mrl4qkqQm', 3),
('D10001', 'xdkva', '$2y$10$EPe74oitZSqGkLcdv06lfeU0swg0QHa5g3lOTgbYE1l2rKTx/8Mpq', 3),
('D10002', 'xdkvb', '$2y$10$tMPNqbikiC9JEULGJKJKZuAWD69LKduVWaD52mZvTXbmII9Jz8ecy', 3),
('D10003', 'xdkvc', '$2y$10$fGD5wAHdMK9cyWVqbQrSfeCeVNRHxOH7TKD51GXnV4wBlFKups1Na', 3),
('D20001', 'xidkva', '$2y$10$EKb.yY1tSC83UNVHomtXI.AqJTLjIJllHi27Kn.uIOf.eOgIrFYLy', 3),
('D20002', 'xidkvb', '$2y$10$fv5PXJUJTXjcnkf/so.ccesKnZ9WIqAIC5.39bLiWPQm5dvWozY.e', 3),
('D20003', 'xidkvc', '$2y$10$v/6nCH24Zz.WuWwWTenwO.1oyRXv4Ik1T.L/yum0DDceWeE12D.Aq', 3),
('E10001', 'xelektronikaa', '$2y$10$m/TUydi7jA1.EJAts1.b6OMYZYU6laXec2FfsZbQwmQM0I9NQDIii', 3),
('E10002', 'xelektronikab', '$2y$10$VXWkrjNCAFy2oYkpD5wL6eLBpSRpY6Myv7H6cGCxZt1Ek.yg72cSO', 3),
('E10003', 'xelektronikac', '$2y$10$KPbhOzlvA6fMQhVYgmDnyuGbLohACrSSMUxLwnRXKfkAdelJ83x76', 3),
('E10004', 'xelektronikad', '$2y$10$Ubmnf38KFtM6KbtMk9mur.U.x6UumrjivWRGhjwRB8RMkzkN/5GXS', 3),
('E20001', 'xielektronikaa', '$2y$10$Zekn8uORjhcNoHznn2qxyuMB.kcyWElVqE3XwDbQcNTXlcabaLij6', 3),
('E20002', 'xielektronikab', '$2y$10$hv63Y4GlYQ4y3zhKHuVqiefQrB2Xn1b9KpCMgcbhUNRYdd2P2.Ceu', 3),
('E20003', 'xielektronikac', '$2y$10$jm4UMEqWXXWvgosk2IJWYOwtaY/FCVkDON7z3ifxRgbJOy8DPN4vG', 3),
('E20004', 'xielektronikad', '$2y$10$jbk8fh/3O0xZIJVnJhC41OF5UMGiAPvt.NIvFmf5slFH0GhhpKoJa', 3),
('K10001', 'xkimiaa', '$2y$10$vb0jnDGaFHqjiPYph2vhxujaCHsYX9li5Xhahlmp/SJnvNUN695DK', 3),
('K10002', 'xkimiab', '$2y$10$1QFf6MxEkV0LLICmt8jfBeLh5YyZ2M5HplDLw61gCIMwyMSrS17..', 3),
('K10003', 'xkimiac', '$2y$10$qFzOYCdUedJCEKNu0mvj0.Wn7.YLrJqOijAbtZoiVnYNW6dKAGGfe', 3),
('K20001', 'xikimiaa', '$2y$10$MXHy2LahbtaB9xF3cACboOzzYgFd8SCOcZH4BCfc8o1P..Fm0s7Q2', 3),
('K20002', 'xikimiab', '$2y$10$A7wCQqHOFdhTxHIozjMLPeC8MZaI24FtAJPgduPaQLLpW71xOs81.', 3),
('K20003', 'xikimiac', '$2y$10$2OiK4RFF31NzVrk9DS3DfeLg8FiMgpVCISIF7OjCdDwYV.5S2d5x2', 3),
('P10001', 'xpplga', '$2y$10$K5fw4JlDvB3C/UKHfwS9OuBXGq0WmUrdogS.VttYqB68g2ZKheh6q', 3),
('P10002', 'xpplgb', '$2y$10$klK1cO4dJ/bdQvz5SHgpQOGraz1MmEtJ8mCZMrbffj9HYHiPrKz1i', 3),
('P20001', 'xipplga', '$2y$10$UcV6EamW0yDQHapKaAbLh.AMh3MDIXTmPaHycknC0kzA2nZVYZd7S', 3),
('P20002', 'xipplgb', '$2y$10$yzVAc0L.r4BuYIStjVAD8u8RL1c4rXUeNzt9c9aHiOf5cOtwpt61G', 3),
('T10001', 'xpemesinana', '$2y$10$Ddlnw4zE5zNNWJxGtnhlouJluinL0LR9KWoKoMtWO21lgXEd8I0ku', 3),
('T10002', 'xpemesinanb', '$2y$10$JL9e9sgeDbsj9u6hwHFr..E866dwm.7qcja7IJ/pwM0V2YIEB/GHu', 3),
('T20001', 'xipemesinana', '$2y$10$jgQVWNrNgov8WTz1erWxGOMgMVW8z8krGUdbuj2JFYmWVaonb98pC', 3),
('T20002', 'xipemesinanb', '$2y$10$yVLxH.shD9CLsUFMmrWl1eWHHuy7Z97dVI.JJ426W8iz3NqPEi.82', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `det_agenda`
--
ALTER TABLE `det_agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agenda` (`id_agenda`,`nis`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `nip` (`nip`,`id_kelas`,`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `tb_agenda_guru`
--
ALTER TABLE `tb_agenda_guru`
  ADD PRIMARY KEY (`id_agenda_guru`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tb_kegiatan_lain`
--
ALTER TABLE `tb_kegiatan_lain`
  ADD PRIMARY KEY (`id_kelain`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`) USING BTREE;

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `det_agenda`
--
ALTER TABLE `det_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_agenda_guru`
--
ALTER TABLE `tb_agenda_guru`
  MODIFY `id_agenda_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `tb_kegiatan_lain`
--
ALTER TABLE `tb_kegiatan_lain`
  MODIFY `id_kelain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
