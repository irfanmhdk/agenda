<?php 

    include 'koneksi.php';
    

    $sql = "SELECT tb_agenda.id_agenda, tb_kelas.nama_kelas, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
            tb_agenda.tgl, tb_agenda.jam_ke, tb_agenda.evaluasi, tb_agenda.verifikasi FROM tb_agenda INNER JOIN tb_kelas ON tb_agenda.id_kelas = tb_kelas.id_kelas INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
            INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip";
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
        background-color: #04AA6D;
        color: white;
        text-align: center;
    }
    input[type=text]{
        width: 200px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    input[type=submit]{
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    .btn {
        background-color: #04AA6D;
        border: none;
        color: black;
        padding: 2px 7px;
        text-align: center;
        font-size: 13px;
        margin: 4px 2px;
        transition: 0.3s;
    }

    .btn:hover {
        background-color: #3e8e41;
        color: white;
    }
    .footer{
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 50px;
    background-color: #555;
    color : white;
    text-align: center;
    }
</style>
<body>
    <header>
    <div class="sidebar">
            <a href="beranda3.php">Home</a>
            <a href="tampil_agenda_guruA.php">Agenda Guru</a>
            <a class="active" href="tampil_agendaA.php">Agenda Siswa</a> 
        </div>
    </header>
    <div class="content">
    <center>
<h1>DATA AGENDA</h1><hr>
<br>
<form action="search1.php" method="POST" align="left">
    <input type="text" name="search" placeholder="Search...">
    <button name="submit" class="btn">Cari</button>
</form>
<br>
<center>
<table border="1" cellspacing="0" cellpadding = "10px">
    <thead>
        <tr>
            <th>Kelas</th>
            <th>Mata Pelajaran</th>
            <th>Materi</th>
            <th>Tugas </th>
            <th>Nama Guru</th>
            <th>kehadiran Guru</th>
            <th>Tanggal </th>
            <th>Jam Pembelajaran </th>
            <th>Catatan Kejadian </th> 
            <th>Verifikasi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($level as $row) : ?>
            <tr>
                <td><?= $row["nama_kelas"];?></td>
                <td><?= $row["nama_mapel"];?></td>
                <td><?= $row["materi"];?></td>
                <td><?= $row["tugas"];?></td>
                <td><?= $row["nama_guru"];?></td>
                <td><?= $row["kehadiran"];?></td>
                <td><?= $row["tgl"];?></td>
                <td><?= $row["jam_ke"];?></td>
                <td><?= $row["evaluasi"];?></td>
                <td><b><?= $row["verifikasi"];?></b></td>
            </tr>
            <?php endforeach ; 
            ?>
    </tbody>
</table>
    </center>


</div>
<div class="footer">
        <p>&copy; 2024 By Fadhil & IM</p>
    </div>