<?php
    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }

    $tgl = $_GET['tgl'];
    
    if(empty($tgl)){
        $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
                tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_kelas.nama_kelas, tb_agenda.jam_masuk, tb_agenda.jam_selesai FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
                INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip INNER JOIN tb_kelas ON tb_agenda.id_kelas = tb_kelas.id_kelas";
        $level = mysqli_query($Conn, $sql);
    }else{
        $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
                tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_kelas.nama_kelas, tb_agenda.jam_masuk, tb_agenda.jam_selesai FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
                INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip INNER JOIN tb_kelas ON tb_agenda.id_kelas = tb_kelas.id_kelas WHERE tgl BETWEEN '$tgl'";
        $level = mysqli_query($Conn, $sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Siswa & Guru</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<style>
    .tb {
        border-collapse: collapse;
        width: 100%;
    }

    .ta, .te {
        border: 1px solid #000000;
        color: black;
        padding: 8px;
    }

    .ta:nth-child(even){background-color: #f2f2f2}
</style>
<body onload="print()">
    <center><h1>LAPORAN AGENDA</h1>
    <h1>SMK NEGERI 2 CIMAHI</h1><hr></center><br>
    <table>
        <tr>
            <td>Semester</td>
            <td> : </td>
            <td>GENAP</td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td> : </td>
            <td>2024</td>
        </tr>
    </table><br>
    <center>
    <table class="tb">
        <tr>
            <th class="ta">Tanggal</th>
            <th class="ta">Kelas</th>
            <th class="ta">Jam Pembelajaran</th>
            <th class="ta">Mata Pelajaran</th>
            <th class="ta">Nama Guru</th>
            <th class="ta">Materi</th>
            <th class="ta">kehadiran Guru</th>
            <th class="ta">Catatan</th>
            <th class="ta">Verifikasi</th>
        </tr>
    <?php foreach ($level as $row) : ?>
        <tr>
                <td class="te"><?= $row["tgl"];?></td>
                <td class="te"><?= $row["nama_kelas"];?></td>
                <td class="te"><?= $row["jam_masuk"]." - ".$row['jam_selesai'];?></td>
                <td class="te"><?= $row["nama_mapel"];?></td>
                <td class="te"><?= $row["nama_guru"];?></td>
                <td class="te"><?= $row["materi"];?></td>
                <td class="te"><?= $row["kehadiran"];?></td>
                <td class="te"><?= $row["evaluasi"];?></td>
                <td class="te"><b><?= $row["verifikasi"];?></b></td>
            </tr>
            <?php endforeach ; 
            ?>
        <tr>
            <td colspan="6"></td>
            <td colspan="3"><br>
                <center><p style="font-size: 11px;">Cimahi, <?= date("d F Y"); ?><br>
                    Kepala Sekolah SMKN 2 Cimahi <br><br><br><br><br><br>
                    Tanszah Lazuardi Raditya, S.Pd, M.Pd <br>
                    NIP. 192304562356033330
                </p></center>
            </td>
        </tr>
    </table>
    </center>
</body>
</html>