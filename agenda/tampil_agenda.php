<?php 
    include 'koneksi.php';

    $sql = "SELECT * FROM tb_agenda";
    $level = mysqli_query($Conn, $sql);

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
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #F21818;
  color: white;
}
</style>
<body>
<header>
        <div class="sidebar">
        <a href="beranda.php">Home</a>
        <a class="active" href="tampil_agenda.php"> Data Agenda</a>
        <a href="jadwal.php">Jadwal</a>
        <a href="#about">About</a>
        </div>
    </header>
    <div class="content">
    <center>
<h1>Data Agenda</h1>
<br>
<center>
<table border="1" cellspacing="0" cellpadding = "10px">
    <thead>
        <tr>
            <th>Id Agenda</th>
            <th>Mata Pelajaran</th>
            <th>Materi</th>
            <th>Tugas </th>
            <th>Nama Guru</th>
            <th>kehadiran Guru</th>
            <th> Tanggal </th>
            <th> Jam Pembelajaran </th>
            <th> Catatan Kejadian </th>  
        </tr>
    </thead>
    <tbody>
    <?php foreach ($level as $row) : ?>
            <tr>
                <td><?= $row["id_agenda"];?></td>
                <td><?= $row["id_mapel"];?></td>
                <td><?= $row["materi"];?></td>
                <td><?= $row["tugas"];?></td>
                <td><?= $row["nip"];?></td>
                <td><?= $row["kehadiran_guru"];?></td>
                <td><?= $row["tgl"];?></td>
                <td><?= $row["jam_ke"];?></td>
                <td><?= $row["catatan_kejadian"];?></td>
            </tr>
            <?php endforeach ; 
            ?>
    </tbody>
</table>
    </center>


</div>