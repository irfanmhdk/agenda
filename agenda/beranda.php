<?php
    include 'koneksi.php';

    $kelas = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
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
  width: 150px;
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
  width: 150px;
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
  width: 150px;
}
.btn3 {
  position: absolute;
  top: 80%;
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
  width: 150px;
}
  .container .btn1:hover {
    background-color: black;
  }
  .container .btn2:hover {
    background-color: black;
  }
  .container .btn3:hover {
    background-color: black;
  }
  .footer{
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 50px;
    background-color: #555;
    color : white;
    text-align: center;
    }

        </style>
</head>
<body>
    <header>
        <div class="sidebar">
        <a class="active" href="beranda.php?id=<?= $kelas ?>">Home</a>
        <a href="data_agenda.php?id=<?= $kelas ?>">Jadwal</a>
        <a href="absensi.php?id=<?= $kelas ?>">Absensi</a>
        <a href="tampil_agenda.php?id=<?= $kelas ?>">Data Agenda</a>
        </div>
        <div class="container">
         <img src="smkn2.jpg" alt="Snow" style="width:100%">
         <a href="tampil_agenda.php?id=<?= $kelas ?>"> <button class="btn">Lihat Agenda</button></a>
         <a href="data_agenda.php?id=<?= $kelas ?>"> <button class="btn1">Isi Agenda</button></a>
         <a href="absensi.php?id=<?= $kelas ?>"> <button class="btn2">Isi Absensi</button></a>
         <a href="index.php"> <button class="btn3">log out</button></a>
        </div>
    </header>0
    <div class="footer">
        <p>&copy; 2024 By Fadhil & IM</p>
    </div>
</body>
</html>