<?php
    include 'koneksi.php';

    $sql = "SELECT tb_jadwal.id_jadwal, tb_kelas.nama_kelas, tb_jadwal.hari, tb_jadwal.jam, tb_guru.nama_guru, 
            tb_mapel.nama_mapel, tb_jadwal.ruangan FROM tb_jadwal INNER JOIN tb_kelas ON tb_jadwal.id_kelas=tb_kelas.id_kelas INNER JOIN 
            tb_guru ON tb_jadwal.nip=tb_guru.nip INNER JOIN tb_mapel ON tb_jadwal.id_mapel = tb_mapel.id_mapel";
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
        width: auto;
        background-color: #4CAF50;
        color: white;
        padding: 7px 10px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #3e8e41;
        color: white;
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
</style>
<body>
    <header>
    <div class="sidebar">
        <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
        <hr  style="width: 90%;">
        <a href="beranda3.php">Home</a>
        <a href="guru_admin.php">Data Agenda</a>
        <a class="active" href="jadwal.php">Jadwal</a> 
    </div>
    </header>
    <div class="content">
    <h1>Jadwal</h1><hr>
    <a href="input_jadwal.php"><button class="btn"><p style="vertical-align:middle;"><img src="image/plus.PNG" width="20px">Tambah Jadwal</p> </button></a><br>
    <table>
        <tr>
            <th>Kelas</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Nama Guru</th>
            <th>Mata Pelajaran</th>
            <th>Ruangan</th>
        </tr>
        <?php
            foreach($proses as $data){
        ?>
        <tr>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['hari'] ?></td>
            <td><?= $data['jam'] ?></td>
            <td><?= $data['nama_guru'] ?></td>
            <td><?= $data['nama_mapel'] ?></td>
            <td><?= $data['ruangan'] ?></td>  
        </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>