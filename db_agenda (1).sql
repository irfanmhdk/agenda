-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 03:48 AM
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
-- Database: `db_agenda`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `data_absen` ()   SELECT tb_absen.nis,tb_siswa.nama,tb_siswa.id_kelas,tb_kelas.tingkat,tb_kelas.jurusan,tb_kelas.kelas,MONTH(tb_absen.tanggal) Bulan, COUNT(CASE WHEN tb_absen.kehadiran ='H' THEN 1 END) AS 'Hadir', COUNT(CASE WHEN tb_absen.kehadiran ='S' THEN 1 END) AS 'Sakit', COUNT(CASE WHEN tb_absen.kehadiran ='I' THEN 1 END) AS 'Ijin', COUNT(CASE WHEN tb_absen.kehadiran ='A' THEN 1 END) AS 'tanpa_keterangan' FROM tb_kelas INNER JOIN tb_siswa ON tb_kelas.id_kelas=tb_siswa.id_kelas INNER JOIN tb_absen ON tb_siswa.nis=tb_absen.nis GROUP BY nis$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `det_agenda`
--

CREATE TABLE `det_agenda` (
  `id` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `kehadiran` varchar(1) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kehadiran` varchar(2) NOT NULL,
  `ket` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_absen`
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
-- Table structure for table `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id_agenda` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jam_ke` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `id_mapel` varchar(5) NOT NULL,
  `durasi` int(11) NOT NULL,
  `tujuan_pemb` varchar(200) NOT NULL,
  `materi` varchar(200) NOT NULL,
  `evaluasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(70) NOT NULL,
  `pend_terakhir` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `nama`, `jk`, `no_telp`, `email`, `pend_terakhir`) VALUES
('198111032008011005', 'Gugum', 'Laki-laki', '0986565', '-', 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_mapel` varchar(6) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `tahun_pel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `nip`, `id_mapel`, `hari`, `jam_ke`, `tahun_pel`) VALUES
(5, '198111032008011005', 'MP1001', 'Senin', 1, '2023/2024'),
(6, '198111032008011005', 'MP1002', 'Selasa', 1, '2023/2024');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(6) NOT NULL,
  `tingkat` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `tingkat`, `jurusan`, `kelas`, `ket`) VALUES
('D10001', 'X', 'DKV', 'A', ''),
('D10002', 'X', 'DKV', 'B', ''),
('E10001', 'X', 'Elektronika ', 'A', ''),
('E10002', 'X', 'Elektronika ', 'B', ''),
('E10003', 'X', 'Elektronika ', 'C', ''),
('E10004', 'X', 'Elektronika', 'D', ''),
('P10001', 'X', 'PPLG', 'A', ''),
('P10002', 'X', 'PPLG', 'B', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `nip` varchar(18) NOT NULL,
  `password` varchar(15) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` varchar(6) NOT NULL,
  `nama_mapel` varchar(70) NOT NULL,
  `tingkat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`, `tingkat`) VALUES
('MP1001', 'Dasar Kejuruan PPLG', 'X'),
('MP1002', 'Informatika', 'X');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
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
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nip` varchar(18) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nip`, `username`, `password`, `role`) VALUES
('132456465468', '123', '123', 2),
('198111032008011005', 'gugum', 'gugum', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_walas`
--

CREATE TABLE `tb_walas` (
  `nip` varchar(18) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `tahun_pel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_walas`
--

INSERT INTO `tb_walas` (`nip`, `id_kelas`, `tahun_pel`) VALUES
('132456465468', 'P10002', '2023/2024'),
('198111032008011005', 'P10001', '2023/2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `det_agenda`
--
ALTER TABLE `det_agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agenda` (`id_agenda`,`nis`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `nip` (`nip`,`id_kelas`,`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nip` (`nip`,`id_mapel`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`) USING BTREE;

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_walas`
--
ALTER TABLE `tb_walas`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `det_agenda`
--
ALTER TABLE `det_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `det_agenda`
--
ALTER TABLE `det_agenda`
  ADD CONSTRAINT `det_agenda_ibfk_1` FOREIGN KEY (`id_agenda`) REFERENCES `tb_agenda` (`id_agenda`),
  ADD CONSTRAINT `det_agenda_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`);

--
-- Constraints for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD CONSTRAINT `tb_agenda_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_guru` (`nip`),
  ADD CONSTRAINT `tb_agenda_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `tb_agenda_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`);

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_guru` (`nip`);

--
-- Constraints for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `tb_login_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_guru` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
