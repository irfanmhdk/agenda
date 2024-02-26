<?php
    include 'koneksi.php';



$sql = "SELECT * FROM tb_kelas";
$proses = mysqli_query($Conn, $sql);

$sql1 = "SELECT * FROM tb_kegiatan_lain";
$k = mysqli_query($Conn,$sql1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Kegiatan lainnya Siswa </title>
    <link rel="stylesheet" href="navbar.css">
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        color: black;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    .btn {
        background-color: DodgerBlue;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 5px 10px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn:hover {
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
</head>
<body>
<header>
        <div class="sidebar">
            <a href="beranda.php?id=<?= $kelas ?>"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="kepsek_home.php">Home</a>
            <a href="report_guru.php">Data Agenda</a>
            <a href="data_user_kepsek.php">Manage Data User</a>
            <a  class="active"href="kegiatan_lainnya_kepsek.php">Agenda Kegiatan Lainnya</a>
            <a style="color: red;"href="logout.php"> log out</button></a>
        </div>
    </header>
    <div class="head">
        </div>
    <div class="content">
    <center>
<h1>KEGIATAN LAINNYA</h1><hr> </center>
<br>
<form action="search1.php" method="POST">
    <input type="text" name="search" placeholder="Cari Nama Guru...">
    <input type="hidden" name="kelas">
    <input type="submit" name="submit" value="Cari">
</form><br>
<center>
<table style="box-shadow: 7px 7px 5px lightgrey;">
        <tr>
            <th>Tanggal</th>
            <th>Jam Kegiatan</th>
            <th>Judul Kegiatan</th>
            <th>Isi Kegiatan</th>
            <th>Catatan Kejadian </th> 
        </tr>
    <?php foreach ($k as $row) : ?>
            <tr>
                <td><?= $row["tgl"];?></td>
                <td><?= $row["jam_mulai"]." - ".$row['jam_selesai'];?></td>
                <td><?= $row["judul_kegiatan"];?></td>
                <td><?= $row["isi_kegiatan"];?></td>
                <td><?= $row["catatan_kejadian"];?></td>
            </tr>
            <?php endforeach ; 
            ?>
</table>
    </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
</body>
</html>