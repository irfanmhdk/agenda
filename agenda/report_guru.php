<?php 

    include 'koneksi.php';
    
    $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
            tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
            INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip";
    $level = mysqli_query($Conn, $sql);
    
    $sql1 = "SELECT * FROM tb_kelas WHERE";
    $k = mysqli_query($Conn,$sql1);
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
        color: black;
        padding: 8px;
    }
    th{
        text-align: center;
    }

    tr:nth-child(even){background-color: #f2f2f2}

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
        background-color: RoyalBlue;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <a href="kepsek_home.php">Home</a>
            <a class="active" href="report_guru.php">Data Agenda</a>
        </div>
    </header>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Kepala Sekolah</b></p>
    </div>
    <div class="content">
<h1>DATA AGENDA</h1><hr>
<br>
<form action="search1.php" method="POST">
    <input type="text" name="search" placeholder="Cari Nama Guru...">
    <input type="hidden" name="kelas" value="<?= $kelas ?>">
    <input type="submit" name="submit" value="Cari">
</form><br>
<center>
<table style="box-shadow: 7px 7px 5px lightgrey;">
        <tr>
            <th>Tanggal</th>
            <th>Mata Pelajaran</th>
            <th>Nama Guru</th>
            <th>jam Pembelajaran</th>
            <th>Materi</th>
            <th>Tugas </th>
            <th>kehadiran Guru</th>
            <th>Catatan Kejadian </th> 
            <th>Verifikasi</th>
        </tr>
    <?php foreach ($level as $row) : ?>
        <tr>
                <td><?= $row["tgl"];?></td>
                <td><?= $row["nama_mapel"];?></td>
                <td><?= $row["nama_guru"];?></td>
                <td><?= $row["jam_masuk"]." - ".$row['jam_selesai'];?></td>
                <td><?= $row["materi"];?></td>
                <td><?= $row["tugas"];?></td>
                <td><?= $row["kehadiran"];?></td>
                <td><?= $row["evaluasi"];?></td>
                <td><b><?= $row["verifikasi"];?></b></td>
                <td><a href="?id=<?= $kelas; ?>&a=<?= $row["id_agenda"]; ?>" style="text-decoration: none;"><button class="btn"><img src="image/warning.PNG" width="18px"></button></a></td>
            </tr>
            <?php endforeach ; 
            ?>
</table>
    </center>


</div>
<div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>