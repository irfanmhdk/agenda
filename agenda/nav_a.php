<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda3.php"><center><img src="image/2cmi.png" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="beranda3.php">Home</a>
            <a href="data_admin.php">Data Agenda</a>
            <a href="kegiatan_admin.php">Kegiatan Lainnya</a>
            <a href="jadwal.php">Jadwal</a>
            <a href="manage_data_user.php">Manage Data User</a>
            <button class="dropdown-btn">Manage Data 
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
              <a href="manage_data_guru.php">Data Guru</a>
              <a href="manage_data_mapel.php">Data Mata Pelajaran</a>
              <a href="manage_data_kelas.php">Data Kelas</a>
              <a href="manage_absen_kelas.php">Absen Kelas</a>
            </div>
            <a style="color: red;"href="logout.php"> log out</button></a>
        </div>
    </header>
</body>
</html>