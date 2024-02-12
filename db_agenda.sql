-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2024 pada 09.21
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
  `nama_guru` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `id_mapel`, `nama_guru`, `password`, `role`) VALUES
('198111032008011005', 'MP1032', 'Gugum', 'ggm', 2),
('198111032008011006', 'MP1006', 'Endro Tri Prasetyo', 'jms', 2),
('198111032008011007', 'MP1018', 'Eneng sayidah', 'mrn', 2),
('198111032008011008', 'MP1006', 'Engkus Kusawara', 'dna', 2),
('198111032008011009', 'MP1005', 'Agung Apriatna', 'agg', 2),
('198111032008011010', 'MP1004', 'ACA', 'aca', 2),
('198111032008011011', 'MP1007', 'Adrianty Noorhanif', 'anf', 2),
('198111032008011012', 'MP1012', 'Agus Basuki', 'abibi', 2),
('198111032008011013', 'MP1013', 'Agus M Sopyan', 'agms', 2),
('198111032008011014', 'MP1014', 'Andi Garnadi', 'agdi', 2),
('198111032008011015', 'MP1015', 'Anom Jati Kusumo', 'ajko', 2),
('198111032008011016', 'MP1015', 'Arum Pertiwi', 'armprwi', 2),
('198111032008011017', 'MP1016', 'Asep Permana', 'aspa', 2),
('198111032008011018', 'MP1017', 'Asep Sukmana', 'aska', 2),
('198111032008011019', 'MP1017', 'Asri Dena Veviani', 'asdvi', 2),
('198111032008011020', 'MP1001', 'Astri Hastriani', 'astri', 2),
('198111032008011021', 'MP1018', 'Astri Putri Perdana', 'aspp', 2),
('198111032008011022', 'MP1019', 'Cristhin Agustin', 'cags', 2),
('198111032008011023', 'MP1008', 'Cucu Lasmanawati', 'cucu', 2),
('198111032008011024', 'MP1020', 'Dadan Mahdan', 'daadn', 2),
('198111032008011025', 'MP1001', 'Dadan Rosadi', 'rosadi', 2),
('198111032008011026', 'MP1020', 'Daniel Adhi Hutomo', 'daniel', 2),
('198111032008011027', 'MP1022', 'Dede Pamungkas', 'dedec', 2),
('198111032008011028', 'MP1010', 'Dedi Suhendar', 'dedi', 2),
('198111032008011029', 'MP1023', 'Didit Ariadi', 'didit', 2),
('198111032008011030', 'MP1025', 'Deden Sumirat', 'deden', 2),
('198111032008011031', 'MP1015', 'Durahman', 'durahman', 2),
('198111032008011032', 'MP1009', 'Dwi Cahyaningsih', 'dwicahya', 2),
('198111032008011033', 'MP1026', 'Dwisnaini Adriyos ', 'dwisnaini', 2),
('198111032008011034', 'MP1027', 'Dyah Kusumaningrum', 'dyah', 2),
('198111032008011035', 'MP1028', 'Edy Santoso', 'edy', 2),
('198111032008011036', 'MP1005', 'Erni Anggraeni', 'erni', 2),
('198111032008011037', 'MP1029', 'Fajar Heriyanto', 'fajar', 2),
('198111032008011038', 'MP1030', 'Fajar Bani Fauzan', 'fajar', 2),
('198111032008011039', 'MP1031', 'Fauzi Nugroho', 'fauzi', 2),
('198111032008011040', 'MP1032', 'Gigin Gantini', 'gigin', 2),
('198111032008011041', 'MP1002', 'Gina Dwi Septiani', 'gina', 2),
('198111032008011042', 'MP1002', 'Hana Susanti', 'hana', 2),
('198111032008011043', 'MP1002', 'Hani Handayani', 'Hani', 2),
('198111032008011044', 'MP1006', 'Heni Hadiati', 'Heni', 2),
('198111032008011045', 'MP1015', 'Husni Maridiah', 'husni', 2),
('198111032008011046', 'MP1001', 'Ima Nurmayati', 'ima', 2),
('198111032008011047', 'MP1033', 'Irvan Hilmi', 'irvan', 2),
('198111032008011048', 'MP1034', 'Ismita Ratnasari', 'ismita', 2),
('198111032008011049', 'MP1035', 'Iwan Toni Saputro', 'iwan', 2),
('198111032008011050', 'MP1036', 'Izma Yuliana', 'izma', 2),
('198111032008011051', 'MP1037', 'Julisa Irtina', 'julisa', 2),
('198111032008011052', 'MP1038', 'Kusman Subaja', 'kusman', 2),
('198111032008011053', 'MP1039', 'Kuswati', 'kuswati', 2),
('198111032008011054', 'MP1004', 'Lilis Susanti', 'lilis', 2),
('198111032008011055', 'MP1034', 'Mariam Komalawati', 'mariam', 2),
('198111032008011056', 'MP1015', 'Marsita Dahliani Putri', 'marsita', 2),
('198111032008011057', 'MP1009', 'Mas Yudi Riksa Kusumah', 'masyudi', 2),
('198111032008011058', 'MP1002', 'Maya Karmila', 'maya', 2),
('198111032008011059', 'MP1032', 'Moch Gani Setiawan', 'gani', 2),
('198111032008011060', 'MP1015', 'Mutiara Sobariah', 'Mutiara', 2),
('198111032008011061', 'MP1008', 'Nandang', 'nandang', 2),
('198111032008011062', 'MP1009', 'Nani Hasanah', 'nani', 2),
('198111032008011063', 'MP1008', 'Neneng Fauziah', 'neneng', 2),
('198111032008011064', 'MP1043', 'Neneng Isti janiati', 'neneg asti', 2),
('198111032008011065', 'MP1002', 'Nunung Lisnawati', 'nunung', 2),
('198111032008011066', 'MP1011', 'Nurrani Siswanti', 'nurrani', 2),
('198111032008011067', 'MP1044', 'Pradina Diah Aryanti', 'pradina', 2),
('198111032008011068', 'MP1045', 'Rahmat Santa', 'rahmat', 2),
('198111032008011069', 'MP1046', 'Ramdan Nurhaidir', 'ramdan', 2),
('198111032008011070', 'MP1047', 'Raniutami Widiyanti', 'raiutami', 2),
('198111032008011071', 'MP1005', 'Ratna Isnaeni Tesdy', 'artna', 2),
('198111032008011072', 'MP1032', 'Irfan Santika Rahman', 'irfan', 2),
('198111032008011073', 'MP1038', 'Rulyan Saptadji', 'rulyan', 2),
('198111032008011074', 'MP1048', 'Ridawn Firdaus', 'ridawn', 2),
('198111032008011075', 'MP1051', 'Ridawn Yanuardi', 'Yanuardi', 2),
('198111032008011076', 'MP1002', 'Ririn Widiarti', 'ririn', 2),
('198111032008011077', 'MP1024', 'Rohaeni Nur Eli', 'rohani', 2),
('198111032008011078', 'MP1008', 'Saliman', 'saliman', 2),
('198111032008011079', 'MP1052', 'Samsudin', 'samsudin', 2),
('198111032008011080', 'MP1022', 'Sandra Irawan', 'Sandra', 2),
('198111032008011081', 'MP1006', 'Setiawan', 'setiawan', 2),
('198111032008011082', 'MP1001', 'Siti Eftafiyana', 'siti', 2),
('198111032008011083', 'MP1002', 'Siti Roidah', 'roidah', 2),
('198111032008011084', 'MP1009', 'Sri Mulyati', 'Sri', 2),
('198111032008011085', 'MP1030', 'Syaifullah', 'Syaifullah', 2),
('198111032008011086', 'MP1004', 'Syntia Mahyarani', 'syntia', 2),
('198111032008011087', 'MP1047', 'Teti Suharti', 'teti', 2),
('198111032008011088', 'MP1015', 'Tini Hernawati', 'tini', 2),
('198111032008011089', 'MP1024', 'Tuti Murdayani', 'tuti', 2),
('198111032008011090', 'MP1001', 'Utami Nurhayati', 'utami', 2),
('198111032008011091', 'MP1049', 'Wahyu Sumirat Sumardi', 'wahyu', 2),
('198111032008011092', 'MP1020', 'Wisnu Ramdhani', 'wisnu', 2),
('198111032008011093', 'MP1054', 'Yana Cahya Kusumah', 'yana', 2),
('198111032008011094', 'MP1024', 'Yayat Ruhyat', 'yayat', 2),
('198111032008011095', 'MP1055', 'Yayat Sudrajat', 'sudarajat', 2),
('198111032008011096', 'MP1056', 'Yudi Wahyudi', 'yudi', 2),
('198111032008011097', 'MP1015', 'Yudith Rahayu', 'rahayu', 2),
('198111032008011098', 'MP1007', 'Yuliani', 'yuliani', 2),
('198111032008011099', 'MP1008', 'Yulie Yulianti', 'Yulie', 2),
('198111032008011100', 'MP1022', 'Yulius Rudiana', 'yulius', 2),
('198111032008011101', 'MP1004', 'Yusi Siti Masitoh', 'yusi', 2);

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
(13, 'E10002', 'Rabu', '10.55', '11.30', '198111032008011006', 'MP1002', 'F1'),
(14, 'P10001', 'Senin', '09.15', '10.00', '198111032008011005', 'MP1001', 'LAB RPL 3'),
(15, 'P10001', 'Senin', '07.00', '09.15', '198111032008011006', 'MP1002', 'LAB RPL 3'),
(17, 'P10001', 'Rabu', '07.00', '08.30', '198111032008011007', 'MP1003', 'F3'),
(18, 'A10001', 'Senin', '08.30', '11.30', '198111032008011085', 'MP1030', 'R-B1'),
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
(60, 'D10001', 'Jumat', '15.00', '16.00', '198111032008011066', 'MP1011', 'E5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(6) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `username`, `password`, `role`) VALUES
('A10001', 'X ANIMASI A', 'xanimasia', 'xanimasia', 3),
('A10002', 'X ANIMASI B', 'xanimasib', 'xanimasib', 3),
('A20001', 'XI ANIMASI A', 'xianimasia', 'xianimasia', 3),
('A20002', 'XI ANIMASI B', 'xianimasib', 'xianimasib', 3),
('D10001', 'X DKV A', 'xdkva', 'xdkva', 3),
('D10002', 'X DKV B', 'xdkvb', 'xdkvb', 3),
('D10003', 'X DKV C', 'xdkvc', 'xdkvc', 3),
('D20001', 'XI DKV A', 'xidkva', 'xidkva', 3),
('D20002', 'XI DKV B', 'xidkvb', 'xidkvb', 3),
('D20003', 'XI DKV C', 'xidkvc', 'xidkvc', 3),
('E10001', 'X ELEKTRONIKA A', 'xelektronikaa', 'xelektronikaa', 3),
('E10002', 'X ELEKTRONIKA B', 'xelektronikab', 'xelektronikab', 3),
('E10003', 'X ELEKTRONIKA C', 'xelektronikac', 'xelektronikac', 3),
('E10004', 'X ELEKTRONIKA D', 'xelektronikad', 'xelektronikad', 3),
('E20001', 'XI ELEKTRONIKA A', 'xielektronikaa', 'xielektronikaa', 3),
('E20002', 'XI ELEKTRONIKA B', 'xielektronikab', 'xielektronikab', 3),
('E20003', 'XI ELEKTRONIKA C', 'xielektronikac', 'xielektronikac', 3),
('E20004', 'XI ELEKTRONIKA D', 'xielektronikad', 'xielektronikad', 3),
('K10001', 'X KIMIA A', 'xkimiaa', 'xkimiaa', 3),
('K10002', 'X KIMIA B', 'xkimiab', 'xkimiab', 3),
('K10003', 'X KIMIA C', 'xkimiac', 'xkimiac', 3),
('K20001', 'XI KIMIA A', 'xikimiaa', 'xikimiaa', 3),
('K20002', 'XI KIMIA B', 'xikimiab', 'xikimiab', 3),
('K20003', 'XI KIMIA C', 'xikimiac', 'xikimiac', 3),
('P10001', 'X PPLG A', 'xpplga', 'xpplga', 3),
('P10002', 'X PPLG B', 'xpplgb', 'xpplgb', 3),
('P20001', 'XI PPLG A', 'xipplga', 'xipplga', 3),
('P20002', 'XI PPLG B', 'xipplgb', 'xipplgb', 3),
('T10001', 'X PEMESINAN A', 'xpemesinana', 'xpemesinana', 3),
('T10002', 'X PEMESINAN B', 'xpemesinanb', 'xpemesinanb', 3),
('T20001', 'XI PEMESINAN A', 'xipemesinana', 'xipemesinana', 3),
('T20002', 'XI PEMESINAN B', 'xipemesinanb', 'xipemesinanb', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `nip` varchar(18) NOT NULL,
  `password` varchar(15) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('MP1056', 'KKMK1-CAE');

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
  `nip` varchar(18) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`nip`, `username`, `password`, `role`) VALUES
('1', 'kepsek2cmi', 'kepsek2', 4),
('2', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_walas`
--

CREATE TABLE `tb_walas` (
  `nip` varchar(18) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `tahun_pel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_walas`
--

INSERT INTO `tb_walas` (`nip`, `id_kelas`, `tahun_pel`) VALUES
('132456465468', 'P10002', '2023/2024'),
('198111032008011005', 'P10001', '2023/2024');

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
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`nip`);

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
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tb_walas`
--
ALTER TABLE `tb_walas`
  ADD PRIMARY KEY (`nip`);

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
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
