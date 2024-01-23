<?php
    include 'koneksi.php';

    $result = mysqli_query($Conn, "SELECT tb_guru.nip, tb_guru.nama_guru, tb_mapel.nama_mapel FROM tb_guru INNER JOIN
                            tb_mapel ON tb_guru.id_mapel = tb_mapel.id_mapel");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Siswa & Guru</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    .btn1 {
        background-color: DodgerBlue;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn1:hover {
        background-color: RoyalBlue;
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
        <a href="data_admin.php">Data Agenda</a>
        <a href="jadwal.php">Jadwal</a>
        <a class="active" href="manage_data_guru.php">Manage Data Guru</a>
    </div>
    </header>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
    <h1>MANAGE DATA GURU</h1><hr>
    <table>
        <tr>
            <td><input type="text" name="search" placeholder="Cari Nama Guru...">
            <button class="btn1" name="submit"><i class="fa fa-search"></i></button></form></td>
        </tr>
    </table>
    <table>
        <tr>
            <th>NIP</th>
            <th>Nama Guru</th>
            <th>Mata Pelajaran</th>
            <th>Opsi</th>
        </tr>
        <?php
        foreach($result as $d){ ?>
            <tr>
                <td><?= $d['nip'] ?></td>
                <td><?= $d['nama_guru'] ?></td>
                <td><?= $d['nama_mapel'] ?></td>
                <td><center><button class="btn1" name="submit" style="font-size: 11px;background-color: #ffcc00;color: #000000;"><i class="fa fa-search"> EDIT</i></button> 
                <button class="btn1" name="submit" style="font-size: 11px; background-color: #cc3300;"><i class="fa fa-close"> HAPUS</i></button></form></center></td>
            </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>