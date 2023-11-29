<?php 
    include 'koneksi.php';

    $sql = "SELECT * FROM tb_siswa";
    $level = mysqli_query($Conn, $sql);

?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Siswa</title>
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
        <a href="beranda.php">Home</a>
        <a class="active" href="#"> isi Agenda</a>
        <a href="#contact">Contact</a>
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
        <th>Nisn</th>
            <th>Jenis Kelamin</th>
            <th>Nama</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Izin</th>
            <th>Alpha</th>
            </tr>
    </thead>
    <tbody>
    <?php foreach ($level as $row) : ?>
        <tr>
                <td><?= $row["nis"];?></td>
                <td><?= $row["jk"];?></td>
                <td><?= $row["nama"];?></td>
                <form action="proses_absensi.php" method="post">
                <td><input type="radio" id="hadir" name="kehadiran<?= $row["nis"];?>" value="Hadir" checked></td>
                <td><input type="radio" id="sakit" name="kehadiran<?= $row["nis"];?>" value="sakit" ></td>
                <td><input type="radio" id="izin" name="kehadiran<?= $row["nis"];?>" value="Izin" ></td>
                <td><input type="radio" id="alpha" name="kehadiran<?= $row["nis"];?>" value="alpha" ></td>

                <?php endforeach ; 
            ?>
    </tbody>
</table>
<br><br>
<button type="submit" name="kirim">Submit Absensi</button>
    </form>
    </center>


</div>
            
            
            