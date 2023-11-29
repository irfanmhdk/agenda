<?php
    include 'koneksi.php';

    $sql = "SELECT tb_jadwal.id_jadwal, tb_kelas.nama_kelas, tb_jadwal.hari, tb_jadwal.jam, tb_guru.nama_guru, 
            tb_jadwal.mapel FROM tb_jadwal INNER JOIN tb_kelas ON tb_jadwal.id_kelas=tb_kelas.id_kelas INNER JOIN 
            tb_guru ON tb_jadwal.nip=tb_guru.nip";
    $proses = mysqli_query($Conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<style>
    table {
        border: 1px solid #dddddd;
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
        text-align: left;
    }
</style>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda.php">Home</a>
            <a href="tampil_agenda.php"> Data Agenda</a>
            <a class="active" href="jadwal.php">Jadwal</a>
            <a href="#about">About</a>
        </div>
    </header>
    <div class="content">
    <table>
        <h1>Jadwal</h1><hr>
        <tr>
            <th>Id Jadwal</th>
            <th>Kelas</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Nama Guru</th>
            <th>Mata Pelajaran</th>
        </tr>
        <?php
            foreach($proses as $data){
        ?>
        <tr>
            <td><?= $data['id_jadwal'] ?></td>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['hari'] ?></td>
            <td><?= $data['jam'] ?></td>
            <td><?= $data['nama_guru'] ?></td>
            <td><?= $data['mapel'] ?></td>
        </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>