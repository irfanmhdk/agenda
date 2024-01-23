<!DOCTYPE html>
<html lang="en">
<?php
    include 'koneksi.php';

    $get2 = mysqli_query($Conn, "SELECT * FROM tb_agenda");
    $count2 = mysqli_num_rows($get2);
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
  .grid{
    width: 100%;
    height: 240px;
    background: #76D8B3;
    padding: 10px;
    box-shadow: 10px 10px 5px lightgrey;
  }
  table{
    width: 100%;
  }
  th, td{
    padding: 15px;
  }
  .text{
    font-size: x-large;
    color: black;
    margin-left: 15px;
  }
</style>
</head>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <a class="active" href="beranda3.php">Home</a>
            <a href="data_admin.php">Data Agenda</a>
            <a href="jadwal.php">Jadwal</a> 
            <a href="manage_data_guru.php">Manage Data Guru</a>
        </div>
    </header>
        <div class="head" style="display: inline-block;">
          <p style="margin-right: 10px;"><b>Admin</b></p>
        </div>
        <div class="content">
          <table>
            <tr>
                <td colspan="2">
                  <div class="grid" style="background-color: #2AAF7D">
                    <center><img src="image/2cmi.PNG" style="width: 50px; padding: 5px;">
                    <h1 style="color: white;">APLIKASI AGENDA GURU DAN SISWA <br> SMKN 2 CIMAHI</h1>
                    <hr>
                    <p style="color: white;">Anda log-in sebagai Admin</p></center>
                  </div>
                </td>
              </tr>
              <tr>
                <td><div class="grid">
                  <img src="image/agenda_logo.PNG" width="80px">
                  <p class="text" style="margin-top: 10px;"><b>Data Agenda <br> Guru</b></p>
                  <a href="guru_admin.php" style="text-decoration:none;margin-left:15px;color: white;"><b>Lihat data...</b></a>
                </div></td>
                <td><div class="grid">
                  <img src="image/agenda_logo.PNG" width="80px">
                  <p class="text" style="margin-top: 10px;"><b>Data Agenda <br> Kelas</b></p>
                  <a href="kelas_admin.php" style="text-decoration:none;margin-left:15px;color: white;"><b>Lihat data...</b></a>
                </div></td>
              </tr>
          </table>
        </div>
        <div class="footer">
          <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
        </div>
</body>
</html>