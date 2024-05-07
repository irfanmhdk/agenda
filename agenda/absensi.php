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

$kelas = $_GET['id'];

$sql = "SELECT * FROM siswa WHERE id_kelas='$kelas'";
$level = mysqli_query($Conn, $sql);

$sql1 = "SELECT * FROM tb_kelas WHERE id_kelas='$kelas'";
$k = mysqli_query($Conn,$sql1);

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
            color: black;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        .btn {
  border: 2px solid black;
  background-color: white;
  color: black;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}

/* Green */
.success {
  border-color: #04AA6D;
  color: green;
}

.success:hover {
  background-color: #04AA6D;
  color: white;
}
    </style>
</head>
<body>
    <?php include "nav_s.php"; ?>
    <div class="head">
        <?php
            foreach($k as $nama){ ?>
            <p style="margin-right: 10px;"><b><?= $nama['nama_kelas'] ?></b></p>
          <?php
            }
        ?>
    </div>
    <div class="content">
        <center>
            <h1>ABSENSI</h1><hr>
            <br>
                <form action="proses_absensi.php?id=<?= $kelas ?>" method="post">
                    <table style="box-shadow: 7px 7px 5px lightgrey;">
                            <tr>
                                <th>Nisn</th>
                                <th>Jenis Kelamin</th>
                                <th>Nama</th>
                                <th>Hadir</th>
                                <th>Sakit</th>
                                <th>Izin</th>
                                <th>Alpha</th>
                            </tr>
                            <?php foreach ($level as $row) : ?>
                                <tr>
                                    <td><?= $row["nis"];?></td>
                                    <td><?= $row["jk"];?></td>
                                    <td><?= $row["nama"];?></td>
                                    <td><input type="radio" name="kehadiran[<?= $row["nis"];?>]" value="Hadir" checked></td>
                                    <td><input type="radio" name="kehadiran[<?= $row["nis"];?>]" value="Sakit"></td>
                                    <td><input type="radio" name="kehadiran[<?= $row["nis"];?>]" value="Izin"></td>
                                    <td><input type="radio" name="kehadiran[<?= $row["nis"];?>]" value="Alpha"></td>
                                </tr>
                            <?php endforeach; ?>
                    </table>
                    <br><br>
                    <button class="btn success"type="submit" name="kirim">Submit Absensi</button><br><br>
                </form>
        </center>
    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
</body>
</html>