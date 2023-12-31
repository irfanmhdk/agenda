<!DOCTYPE html>
<html lang="en">
<?php
    include 'koneksi.php';

    $nip = $_GET['id'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #d4d4d4;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #dddddd;
    }
    .btn {
        background-color: #ddd;
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
            <a class="active" href="data_agenda_guru.php?id=<?= $nip ?>">Jadwal</a>
            <a href="tampil_agenda_guru.php?id=<?= $nip ?>">Data Agenda</a>
            <a href="verifikasi.php?id=<?= $nip ?>">Verifikasi</a>
        </div>
    </header>
    <div class="content">
        <h1>JADWAL GURU</h1><hr>

        <table>
            <tr>
              
            </tr>
            <tr>
                <th>Guru</th>
                <th>Jam Pembelajaran</th>
                <th>Mata Pelajaran</th>
                <th>Mengajar Kelas</th>
                <th>Isi Agenda</th>
            </tr>
                <?php

                        $sql ="SELECT tb_jadwal.jam, tb_jadwal.hari, tb_kelas.nama_kelas, tb_guru.nama_guru, tb_mapel.nama_mapel, tb_jadwal.nip, tb_mapel.id_mapel, tb_jadwal.id_kelas, tb_jadwal.id_mapel
                        FROM tb_jadwal INNER JOIN tb_kelas ON tb_jadwal.id_kelas = tb_kelas.id_kelas INNER JOIN 
                        tb_guru ON tb_jadwal.nip = tb_guru.nip INNER JOIN tb_mapel ON tb_jadwal.id_mapel = tb_mapel.id_mapel WHERE tb_jadwal.nip='$nip'";
                        $proses = mysqli_query($Conn, $sql);


                    foreach($proses as $jadwal){ ?>
                        <tr>
                        <td><?= $jadwal['nama_guru'] ?></td>
                        <td><?= $jadwal['jam'] ?></td>
                        <td><?= $jadwal['nama_mapel'] ?></td>
                        <td><?= $jadwal['nama_kelas'] ?></td>
                        <td><a href="isi_agenda_guru.php?nip=<?= $nip ?>&jam=<?= $jadwal['jam'] ?>&kel=<?= $jadwal['id_kelas'] ?>&map=<?= $jadwal['id_mapel'] ?>"><center><button class="btn"><b>Isi Agenda</b></button></center></a></td>
                        </tr>
                <?php
             }  ?>
            
        </table>

    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
</body>
</html>