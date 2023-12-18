<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<?php
    include 'koneksi.php';

    $kelas = $_GET['id'];
?>
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
</style>
<body>
    <header>
        <div class="sidebar">
        <a  href="beranda3.php?id=<?= $kelas ?>">Home</a>
            <a href="data_agenda_guruA.php?id=<?= $kelas ?>">Agenda Guru</a>
            <a class="active" href="data_agendaA.php?id=<?= $kelas ?>">Agenda Siswa</a>
        </div>
    </header>
    <div class="content">
        <h1>JADWAL KELAS</h1><hr>
        <table>
            <tr>
                <th colspan="4"><b>Hari : Senin | Tanggal : 29-11-2023</b></th>
            </tr>
            <tr>
                <th><center>Jam Pembelajaran</center></th>
                <th><center>Guru</center></th>
                <th><center>Mata Pelajaran</center></th>
                <th><center>Agenda</center></th>
            </tr>
                <?php

                    $sql ="SELECT tb_jadwal.jam, tb_jadwal.hari, tb_kelas.nama_kelas, tb_guru.nama_guru, tb_mapel.nama_mapel, tb_jadwal.nip, tb_mapel.id_mapel
                           FROM tb_jadwal INNER JOIN tb_kelas ON tb_jadwal.id_kelas = tb_kelas.id_kelas INNER JOIN 
                           tb_guru ON tb_jadwal.nip = tb_guru.nip INNER JOIN tb_mapel ON tb_jadwal.id_mapel = tb_mapel.id_mapel WHERE tb_jadwal.id_kelas='$kelas'";
                    $proses = mysqli_query($Conn, $sql);

                    foreach($proses as $jadwal){ ?>
                        <tr>
                        <td><?= $jadwal['jam'] ?></td>
                        <td><?= $jadwal['nama_guru'] ?></td>
                        <td><?= $jadwal['nama_mapel'] ?></td>
                        <td><a href="isi_agenda.php?kel=<?= $kelas ?>&jam=<?= $jadwal['jam'] ?>&nip=<?= $jadwal['nip'] ?>&map=<?= $jadwal['id_mapel'] ?>"><center><button class="btn"><b>Isi Agenda</b></button></center></a></td>
                        </tr>
                <?php }  ?>
            
        </table>
    </div>
</body>
</html>