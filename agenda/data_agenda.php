<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }

    if ($_SESSION['role'] != "3") {
        header("Location: index.php");
        exit();
    }

    include 'hari.php';
    $h = $hari[ date('N') ];

    $kelas = $_GET['id'];

    $sql = "SELECT * FROM tb_kelas WHERE id_kelas='$kelas'";
    $k = mysqli_query($Conn,$sql);
?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        color: black;
        text-align: left;
        padding: 8px;
    }
    
    tr:nth-child(even){background-color: #f2f2f2}

    .btn {
        background-color: DodgerBlue;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn:hover {
        background-color: RoyalBlue;
    }
    .btn1 {
        background-color: #4CAF52;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn1:hover {
        background-color: #15781B;
    }
</style>
<body>
    <header>
        <div class="sidebar">
        <a href="beranda.php?id=<?= $kelas ?>"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
        <hr  style="width: 90%;">
        <center><a href="#"><?= date("d F Y"); ?></a></center>
        <hr  style="width: 90%;">
        <a href="beranda.php?id=<?= $kelas ?>">Home</a>
        <a class="active" href="data_agenda.php?id=<?= $kelas ?>">Jadwal</a>
        <a href="absensi.php?id=<?= $kelas ?>">Absensi</a>
        <a href="tampil_agenda.php?id=<?= $kelas ?>">Data Agenda</a>
        <a href="kegiatan_lainnya.php?id=<?= $kelas ?>">Kegiatan Lainnya</a>
        <a style="color: red;"href="logout.php"> log out</button></a>
        </div>
    </header>
    <div class="head">
        <?php
            foreach($k as $nama){ ?>
            <p style="margin-right: 10px;"><b><?= $nama['nama_kelas'] ?></b></p>
          <?php
            }
          ?>
    </div>
    <div class="content">
        <h1>JADWAL KELAS</h1><hr>
        <table>
            <tr>
                <td><h4>Hari <?= $h ?></h4></td>
                <td style="text-align: right;"><a href="input_kegiatan_lain.php?kel=<?= $kelas ?>"><button class="btn" name="cetak"><i class="fa fa-calendar"></i> Kegiatan Lainnya</button></a></td>
            </tr>
        </table>
        <table style="box-shadow: 7px 7px 5px lightgrey;">
            <tr>
                <th>Mata Pelajaran</th>
                <th>Guru</th>                
                <th>Agenda</th>
            </tr>
                <?php
                    $sql ="SELECT tb_jadwal.jam_masuk, tb_jadwal.jam_selesai, tb_jadwal.hari, tb_kelas.nama_kelas, tb_guru.nama_guru, tb_mapel.nama_mapel, tb_jadwal.nip, tb_mapel.id_mapel
                           FROM tb_jadwal INNER JOIN tb_kelas ON tb_jadwal.id_kelas = tb_kelas.id_kelas INNER JOIN 
                           tb_guru ON tb_jadwal.nip = tb_guru.nip INNER JOIN tb_mapel ON tb_jadwal.id_mapel = tb_mapel.id_mapel WHERE tb_jadwal.hari = '$h' AND tb_jadwal.id_kelas='$kelas'";
                    $proses = mysqli_query($Conn, $sql);

                    foreach($proses as $jadwal){ ?>
                        <tr>
                        <td><?= $jadwal['nama_mapel'] ?></td>
                        <td><?= $jadwal['nama_guru'] ?></td>

                        <td><a href="isi_agenda.php?kel=<?= $kelas ?>&nip=<?= $jadwal['nip'] ?>&map=<?= $jadwal['id_mapel'] ?>&date=<?= date("Y-m-d"); ?>"><button class="btn1" name="submit" style="font-size: 14px;"><i class="fa fa-file"> Isi Agenda</i></button></a></td>
                <?php }  ?>
                </tr>
        </table>
    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
</body>
</html>