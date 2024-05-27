<?php 

    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }
    if ($_SESSION['role'] != "3") {
        header("Location: index.php");
        exit();
    }
    
    $kelas = $_SESSION["id_user"];
    $agenda = $_GET["agen"];

    $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
            tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
            INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip WHERE tb_agenda.id_agenda='$agenda'";
    $level = mysqli_query($Conn, $sql);
    
    $sql1 = "SELECT * FROM tb_kelas WHERE id_kelas='$kelas'";
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
    <link rel="stylesheet" href="profile.css">
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
<body>
    <?php include "nav_s.php"; ?>
    <div class="content">
    <center>
<h1>DATA AGENDA</h1><hr> </center><br>
<center>
<table style="box-shadow: 7px 7px 5px lightgrey;">
    <?php foreach ($level as $row) : ?>
        <tr>
            <th>Tanggal</th>
            <td>: <?= $row["tgl"];?></td>
        </tr>
        <tr>
            <th>Mata Pelajaran</th>
            <td>: <?= $row["nama_mapel"];?></td>
        </tr>
        <tr>
            <th>Nama Guru</th>
            <td>: <?= $row["nama_guru"];?></td>
        </tr>
        <tr>
            <th>jam Pembelajaran</th>
            <td>: <?= $row["jam_masuk"]." - ".$row['jam_selesai'];?></td>
        </tr>        
        <tr>
            <th>kehadiran Guru</th>
            <td>: <?= $row["kehadiran"];?></td>
        </tr>
        <tr>
            <th>Materi</th>
            <td>: <?= $row["materi"];?></td>
        </tr>    
        <tr>
            <th>Tugas </th>
            <td>: <?= $row["tugas"];?></td>
        </tr>   
        <tr>
            <th>Catatan Kejadian </th>
            <td>: <?= $row["evaluasi"];?></td>
        </tr> 
        <tr>       
            <th>Verifikasi</th>
            <td><b>: <?= $row["verifikasi"];?></b></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="lihat_comment.php?a=<?= $row["id_agenda"]; ?>" style="text-decoration: none;"><button class="btn">Komentar</button></a> <a href="tampil_agenda.php" style="text-decoration: none;"><button class="btn">Kembali</a></td>
        </tr>
            <?php endforeach ; 
            ?>
</table>

<fieldset><legend><h2>Catatan</h2></legend>
<h3>Silahkan hubungi guru pengajar untuk<br>mem-verifikasi data agenda anda</h2>
</fieldset>
</center>


</div>
<div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
</div>
</body>
</html>