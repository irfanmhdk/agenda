<!DOCTYPE html>
<html lang="en">
<?php
    include 'koneksi.php';

    $kelas = $_GET['id'];

    $sql1 = "SELECT * FROM tb_guru WHERE nip='$kelas'";
    $k = mysqli_query($Conn,$sql1);
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
    padding: 12px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
    width: 250px;
  }
  .container .btn:hover {
    background-color: black;
  }
  .container .btn1:hover {
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
            <a href="beranda2.php?id=<?= $kelas ?>"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a class="active" href="beranda2.php?id=<?= $kelas ?>">Home</a>
            <a href="verifikasi.php?id=<?= $kelas ?>">Verifikasi</a>
            <a style="color: red;"href="logout.php"> log out</button></a>
        </div>
        <div class="head">
          <?php
              foreach($k as $nama){ ?>
              <p style="margin-right: 10px;"><b><?= $nama['nama_guru'] ?></b></p>
            <?php
              }
          ?>
        </div>
        <div class="container">
         <img src="image/smk2.jpg" alt="Snow" style="width:100%">
         <a href="verifikasi.php?id=<?= $kelas ?>"> <button class="btn">Verifikasi Agenda Siswa</button></a>
        </div>
    </header>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
</body>
</html>