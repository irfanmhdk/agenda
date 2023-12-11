<?php 
    include 'koneksi.php';
    $nip = $_GET['id'];
    $sql = "SELECT tb_agenda_guru.id_agenda_guru, tb_agenda_guru.tgl, tb_guru.nama_guru, tb_agenda_guru.jam_ke, tb_mapel.nama_mapel, tb_kelas.nama_kelas, tb_agenda_guru.kehadiran_guru,
            tb_agenda_guru.materi, tb_agenda_guru.catatan_kejadian, tb_agenda_guru.dokumentasi FROM tb_agenda_guru INNER JOIN tb_guru ON tb_agenda_guru.nip = tb_guru.nip 
            INNER JOIN tb_mapel ON tb_agenda_guru.id_mapel = tb_mapel.id_mapel 
            INNER JOIN tb_kelas ON tb_agenda_guru.id_kelas = tb_kelas.id_kelas WHERE tb_agenda_guru.nip='$nip'";
    $level = mysqli_query($Conn, $sql);
    //a
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Siswa & Guru</title>
    <link rel="stylesheet" href="navbar.css">
<style>
    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
    background-color: #F21818;
    color: white;
    text-align: center;
    }
</style>
<body>
<header>
        <div class="sidebar">
            <a href="beranda2.php?id=<?= $nip ?>">Home</a>
            <a href="data_agenda_guru.php?id=<?= $nip ?>">Jadwal</a>
            <a class="active" href="tampil_agenda_guru.php?id=<?= $nip ?>">Data Agenda</a>
            <a href="verifikasi.php?id=<?= $nip ?>">Verifikasi</a>
        </div>
    </header>
    <div class="content">
    <center>
<h1>DATA AGENDA GURU</h1><hr>
<br>
<center>
<table border="1" cellspacing="0" cellpadding = "10px">
    <thead>
        <tr>
            <th>ID Agenda Guru</th>
            <th>Tanggal</th>
            <th>Nama Guru</th>
            <th>Jam</th>
            <th>Mapel </th>
            <th>Mengajar Kelas</th>
            <th>kehadiran Guru</th>
            <th>Materi </th>
            <th>Catatan Kejadian</th>
            <th>Dokumentasi </th> 
        </tr>
    </thead>
    <tbody>
    <?php foreach ($level as $row) : ?>
            <tr>
                <td><?= $row["id_agenda_guru"];?></td>
                <td><?= $row["tgl"];?></td>
                <td><?= $row["nama_guru"];?></td>
                <td><?= $row["jam_ke"];?></td>
                <td><?= $row["nama_mapel"];?></td>
                <td><?= $row["nama_kelas"];?></td>
                <td><?= $row["kehadiran_guru"];?></td>
                <td><?= $row["materi"];?></td>
                <td><?= $row["catatan_kejadian"];?></td>
                <td><center><img src="image/<?= $row["dokumentasi"];?>" width="100" height="70px"></center></td>
            </tr>
            <?php endforeach ; 
            ?>
    </tbody>
</table>
    </center>


</div>