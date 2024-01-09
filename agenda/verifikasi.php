<?php 

    include 'koneksi.php';
    
    $nip = $_GET['id'];

    $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
            tb_agenda.tgl, tb_agenda.jam_ke, tb_agenda.evaluasi, tb_agenda.nip, tb_agenda.verifikasi FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
            INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip WHERE tb_agenda.nip='$nip'";
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
    .btn {
        background-color: #04AA6D;
        border: none;
        color: black;
        padding: 10px 16px;
        text-align: center;
        font-size: 13px;
        margin: 4px 2px;
        transition: 0.3s;
        border-radius: 15px;
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
            <a href="beranda2.php?id=<?= $nip ?>">Home</a>
            <a href="data_agenda_guru.php?id=<?= $nip ?>">Jadwal</a>
            <a href="tampil_agenda_guru.php?id=<?= $nip ?>">Data Agenda</a>
            <a class="active" href="verifikasi.php?id=<?= $nip ?>">Verifikasi</a>
        </div>
    </header>
    <div class="content">
    <center>
<h1>DATA AGENDA</h1><hr>
<br>
<center>
<table border="1" cellspacing="0" cellpadding = "10px">
    <thead>
        <tr>
            <th>ID Agenda</th>
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
                <td><?= $row["id_agenda"];?></td>
                <td><?= $row["nama_mapel"];?></td>
                <td><?= $row["materi"];?></td>
                <td><?= $row["tugas"];?></td>
                <td><?= $row["nama_guru"];?></td>
                <td><?= $row["kehadiran"];?></td>
                <td><?= $row["tgl"];?></td>
                <td><?= $row["jam_ke"];?></td>
                <td><?= $row["evaluasi"];?></td>
                <?php
                    $status = $row['verifikasi'];
                    if($status == "Sudah Verifikasi"){ ?>
                        <td><?= $status;?></td>
                <?php
                    }else{ ?> 
                        <td><a href="proses_verifikasi.php?id=<?= $row["id_agenda"]; ?>&nip=<?= $row["nip"];?>" style="text-decoration: none;"><button class="btn"><b>Verifikasi</b></button></a></td>
                <?php
                    }
                ?>
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