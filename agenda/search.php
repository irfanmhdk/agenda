<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){
        $search = $_POST['search'];
        $nip = $_POST['nip'];

        $sql = "SELECT  tb_agenda_guru.id_agenda_guru, tb_agenda_guru.tgl, tb_guru.nama_guru, tb_agenda_guru.jam_ke, tb_mapel.nama_mapel, tb_kelas.nama_kelas, tb_agenda_guru.kehadiran_guru,
        tb_agenda_guru.materi, tb_agenda_guru.catatan_kejadian, tb_agenda_guru.dokumentasi FROM tb_agenda_guru INNER JOIN tb_guru ON tb_agenda_guru.nip = tb_guru.nip 
        INNER JOIN tb_mapel ON tb_agenda_guru.id_mapel = tb_mapel.id_mapel 
        INNER JOIN tb_kelas ON tb_agenda_guru.id_kelas = tb_kelas.id_kelas WHERE tb_kelas.nama_kelas LIKE '%".$search."%' AND tb_agenda_guru.nip = '$nip';";
        $level = mysqli_query($Conn,$sql);

        $sql1 = "SELECT * FROM tb_guru WHERE nip='$nip'";
        $k = mysqli_query($Conn,$sql1);
    }
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
    input[type=text] {
        width: 240px;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=submit] {
        width: 100px;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
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
</style>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda.php?id=<?= $nip ?>"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="beranda2.php?id=<?= $nip ?>">Home</a>
            <a href="data_agenda_guru.php?id=<?= $nip ?>">Jadwal</a>
            <a class="active" href="tampil_agenda_guru.php?id=<?= $nip ?>">Data Agenda</a>
            <a href="verifikasi.php?id=<?= $nip ?>">Verifikasi</a>
        </div>
    </header>
    <div class="head">
        <?php
              foreach($k as $nama){ ?>
              <p style="margin-right: 10px;"><b><?= $nama['nama_guru'] ?></b></p>
            <?php
              }
          ?>
    </div>
    <div class="content">
    <center>
<h1>DATA AGENDA GURU</h1><hr>
<br>
<form action="search.php" method="POST" align="left">
    <input type="text" name="search" placeholder="Search...">
    <button name="submit" class="btn">Cari</button>
</form>
<br>
<center>
<table border="1" cellspacing="0" cellpadding = "10px">
    <thead>
    <tr>
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
<div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>