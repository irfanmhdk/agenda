<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
</head>
<body>
<header>
        <div class="sidebar">
            <a href="beranda.php?id=<?= $nip ?>"><center><img src="image/2cmi.png" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="beranda2.php?id=<?= $nip ?>">Home</a>
            <button class="dropdown-btn">Verifikasi Agenda
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="verifikasi.php?id=<?= $nip ?>">Agenda Hari Ini</a>
                <a href="verifikasi_semua.php?id=<?= $nip ?>">Agenda</a>
            </div>
            <a style="color: red;"href="logout.php"> log out</button></a>
        </div>
    </header>
</body>
</html>