<?php 
include 'koneksi.php';

$kelas = $_GET['id'];

$sql = "SELECT * FROM tb_siswa WHERE id_kelas='$kelas'";
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
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #F21818;
            color: white;
            text-align: center;
        }

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
    <header>
        <div class="sidebar">
            <a href="beranda.php?id=<?= $kelas ?>">Home</a>
            <a href="data_agenda.php?id=<?= $kelas ?>">Jadwal</a>
            <a class="active" href="absensi.php?id=<?= $kelas ?>">Absensi</a>
            <a href="tampil_agenda.php?id=<?= $kelas ?>">Data Agenda</a>
        </div>
    </header>
    <div class="content">
        <center>
            <h1>ABSENSI</h1><hr>
            <br>
            <center>
                <form action="proses_absensi.php" method="post">
                    <table border="1" cellspacing="0" cellpadding="10px">
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
                                    <td><input type="radio" name="kehadiran[<?= $row["nis"];?>]" value="Hadir" checked></td>
                                    <td><input type="radio" name="kehadiran[<?= $row["nis"];?>]" value="Sakit"></td>
                                    <td><input type="radio" name="kehadiran[<?= $row["nis"];?>]" value="Izin"></td>
                                    <td><input type="radio" name="kehadiran[<?= $row["nis"];?>]" value="Alpha"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br><br>
                    <button class="btn success"type="submit" name="kirim">Submit Absensi</button><br><br>
                </form>
            </center>
        </center>
    </div>
</body>
</html>