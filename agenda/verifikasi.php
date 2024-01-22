<?php 

    include 'koneksi.php';
    
    $nip = $_GET['id'];

    $sql = "SELECT tb_agenda.id_agenda, tb_kelas.nama_kelas, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
            tb_agenda.tgl, tb_agenda.jam_ke, tb_agenda.evaluasi, tb_agenda.nip, tb_agenda.verifikasi FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
            INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip INNER JOIN tb_kelas ON tb_agenda.id_kelas = tb_kelas.id_kelas WHERE tb_agenda.nip='$nip'";
    $level = mysqli_query($Conn, $sql);
    
    $sql1 = "SELECT * FROM tb_guru WHERE nip='$nip'";
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
        background-color: #d4d4d4;
        border: none;
        color: black;
        padding: 5px;
        text-align: center;
        font-size: 13px;
        margin: 4px 2px;
        transition: 0.3s;
        border-radius: 5px;
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
            <a href="beranda.php?id=<?= $nip ?>"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <a href="beranda2.php?id=<?= $nip ?>">Home</a>
            <a class="active" href="verifikasi.php?id=<?= $nip ?>">Verifikasi</a>
        </div>
    </header>
    <div class="head">
        <?php
              foreach($k as $nama){ ?>
              <p style="margin-right: 10px;"><b><?= $nama['nama_guru'] ?></b></p>
            <?php
              }
          ?>
    </div>
    <div class="content">
    <center>
<h1>DATA AGENDA</h1><hr> </center>
<br>
<form action="search_verifikasi.php" method="POST">
    <input type="text" name="search" placeholder="Cari Kelas...">
    <input type="hidden" name="nip" value="<?= $nip ?>">
    <input type="submit" name="submit" value="Cari">
</form>
<center>
<table border="1" cellspacing="0" cellpadding = "10px">
    <thead>
        <tr>
            <th>Kelas</th>
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
                <td><?= $row["nama_kelas"];?></td>
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
                        <td><?= $status;?>
                        <a href="comment.php?id=<?= $row["id_agenda"]; ?>&nip=<?= $row["nip"];?>" style="text-decoration: none;""><button class="btn"><img src="image/comment.PNG" width="18px"></button></a></td>
                <?php
                    }else{ ?> 
                        <td><center><a href="proses_verifikasi.php?id=<?= $row["id_agenda"]; ?>&nip=<?= $row["nip"];?>" style="text-decoration: none;"><button class="btn"><img src="image/ceklis.PNG" width="18px"></button></a> 
                        <a href="comment.php?id=<?= $row["id_agenda"]; ?>&nip=<?= $row["nip"];?>" style="text-decoration: none;""><button class="btn"><img src="image/comment.PNG" width="18px"></button></a></center></td>
                <?php
                    }
                ?>
            </tr>
            <?php endforeach ; 
            ?>
    </tbody>
</table>
    </center>

<ul>
    <li>
        <img src="image/ceklis.PNG" width="30px"> : 
        Verifikasi 
    </li>
    <li>
        <img src="image/comment.PNG" width="30px"> : 
        Comment 
        </li>
</ul>

</div>
<div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>