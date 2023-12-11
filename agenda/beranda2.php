<!DOCTYPE html>
<html lang="en">
<?php
    include 'koneksi.php';

    $kelas = $_GET['id'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda  Guru SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
<style>
    <style>
  .container {
    position: relative;
    width: 100%;
    max-width: 400px;
  }

  .container img {
    width: 100%;
    height: auto;
  }

  .container .btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #555;
    color: white;
    font-size: 16px;
    padding: 12px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
    width: 250px;
  }
  .btn1 {
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #555;
    color: white;
    font-size: 16px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
    width: 250px;
  }
  .container .btn:hover {
    background-color: black;
  }
  .btn2 {
    position: absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #555;
    color: white;
    font-size: 16px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
  }


</style>
</head>
<body>
    <header>
        <div class="sidebar">
            <a class="active" href="beranda2.php?id=<?= $kelas ?>">Home</a>
            <a href="data_agenda_guru.php?id=<?= $kelas ?>">Jadwal</a>
            <a href="tampil_agenda_guru.php?id=<?= $kelas ?>">Data Agenda</a>
            <a href="verifikasi.php?id=<?= $kelas ?>">Verifikasi</a>
        </div>
        </div>
        <div class="container">
         <img src="image/smk2.jpg" alt="Snow" style="width:100%">
         <a href="verifikasi.php?id=<?= $kelas ?>"> <button class="btn">Verifikasi Agenda Siswa</button></a>
         <a href="data_agenda_guru.php?id=<?= $kelas ?>"> <button class="btn1">Isi Agenda Guru</button></a>
        </div>
    </header>
</body>
</html>