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
            <a href="beranda.php?id=<?= $kelas ?>"><center><img src="image/2cmi.png" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?> </a></center>
            <hr  style="width: 90%;">
            <a href="beranda.php?id=<?= $kelas ?>">Home</a>
            <a href="data_agenda.php?id=<?= $kelas ?>">Jadwal</a>
            <a href="absensi.php?id=<?= $kelas ?>">Absensi</a>
            <a href="tampil_agenda.php?id=<?= $kelas ?>">Data Agenda</a>
            <a href="kegiatan_lainnya.php?id=<?= $kelas ?>">Kegiatan Lainnya</a>
            <a style="color: red;"href="logout.php"> log out</button></a>
        </div>
    </header>
</body>
</html>