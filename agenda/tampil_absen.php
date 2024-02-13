<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    exit();
 header("Location: index.php");
   }

if(isset($_POST['submit'])){

    $search = $_POST['search'];

    $result = mysqli_query($Conn, "SELECT tb_absen.id_absen, tb_absen.nis, tb_absen.tanggal, 
    tb_absen.kehadiran, tb_siswa.id_kelas FROM tb_siswa INNER JOIN tb_absen WHERE id_kelas='%$search%'");
}
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
        color: black;
        text-align: left;
    }

    tr:nth-child(even){background-color: #f2f2f2}

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
   
</style>
<body>
<header>
<div class="sidebar">
        <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
        <hr  style="width: 90%;">
        <center><a href="#"><?= date("d F Y"); ?></a></center>
        <hr  style="width: 90%;">
        <a href="beranda3.php">Home</a>
        <a href="data_admin.php">Data Agenda</a>
        <a href="jadwal.php">Jadwal</a>
        <button class="dropdown-btn">Manage Data 
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="manage_data_guru.php">Data Guru</a>
            <a href="manage_data_mapel.php">Data Mata Pelajaran</a>
            <a href="manage_data_kelas.php">Data Kelas</a>
        </div>
        <a style="color: red;"href="logout.php"> log out</button></a>
    </div>
    </header>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
    <h1>Tampil Absen Kelas</h1><hr>
    <table>
         <tr>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
        </tr>
        <?php
        foreach($result as $d){ ?>
            <tr>
                <td><?= $d['nis'] ?></td>
                <td><?= $d['nama'] ?></td>
                <td><?= $d['jk'] ?></td>
                <td><?= $d['id_kelas'] ?></td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
