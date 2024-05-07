<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: index.php");
        exit();
      }
    if ($_SESSION['role'] != "3") {
        header("Location: index.php");
        exit();
    }
    include 'koneksi.php';

    $kelas = $_GET['id'];

$sql = "SELECT * FROM tb_kelas WHERE id_kelas='$kelas'";
$proses = mysqli_query($Conn, $sql);

$sql1 = "SELECT * FROM tb_kegiatan_lain WHERE id_kelas='$kelas'";
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
    <?php include "nav_s.php"; ?>
    <div class="head">
          <?php
            foreach($proses as $nama){ ?>
            <p style="margin-right: 10px;"><b><?= $nama['nama_kelas'] ?></b></p>
          <?php
            }
          ?>
        </div>
    <div class="content">
    <center>
<h1>KEGIATAN LAINNYA</h1><hr> </center>
<br>
<form action="search_kegiatan_lain.php" method="POST">
    <input type="text" name="search" placeholder="Cari Judul Kegiatan...">
    <input type="hidden" name="kelas" value="<?= $kelas ?>">
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