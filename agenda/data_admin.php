<?php 
    $tgl = "";
    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }
    
    if ($_SESSION['role'] != "1") {
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['submit'])){
        $tgl = $_POST['tampil'];
        $hadir = $_POST['tampil1'];
        $kelas = $_POST['cari_kelas'];

        if($tgl == "Semua" && $hadir == "Semua1"){
            $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran, tb_kelas.nama_kelas,
            tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai, tb_agenda.comment FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
            INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip INNER JOIN tb_kelas ON tb_agenda.id_kelas = tb_kelas.id_kelas";
            $level = mysqli_query($Conn, $sql);
        }elseif($tgl == "Semua"){
            $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
                    tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
                    INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip WHERE tb_agenda.kehadiran = '$hadir'";
            $level = mysqli_query($Conn, $sql);
        }elseif($hadir == "Semua1"){
            $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
                    tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
                    INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip WHERE tgl BETWEEN '$tgl'";
            $level = mysqli_query($Conn, $sql);
        }else{
            $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
                    tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
                    INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip WHERE tgl BETWEEN '$tgl' AND tb_agenda.kehadiran = '$hadir'";
            $level = mysqli_query($Conn, $sql);
        }
    }else{
        $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
                tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
                INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip";
        $level = mysqli_query($Conn, $sql);
    }
    $sql_kls = "SELECT * FROM tb_kelas";
    $result_kls = mysqli_query($Conn, $sql_kls);

?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Siswa & Guru</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        color: black;
        padding: 8px;
    }
    th{
        text-align: center;
    }

    tr:nth-child(even){background-color: #f2f2f2}

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
        background-color: #3e8e41;
    }

    .btn {
        background-color: DodgerBlue;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 5px 10px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn:hover {
        background-color: RoyalBlue;
    }

    input[type=text] {
        width: 240px;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    select {
        width: 240px;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=submit] {
        width: 100px;
        background-color: RoyalBlue;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<body>
    <?php include "nav_a.php"; ?>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
<h1>DATA AGENDA</h1><hr>
<br>
<table>
    <tr>
        <td>
            <form action="data_admin.php" method="POST">
                <select name="tampil">
                    <option value="Semua">Semua</option>
                    <option value="2024-01-01 01:00:0' AND '2024-01-31 23:59:0">Januari</option>
                    <option value="2024-02-01 01:00:0' AND '2024-02-29 23:59:0">Februari</option>
                    <option value="2024-03-01 01:00:0' AND '2024-03-31 23:59:0">Maret</option>
                    <option value="2024-04-01 01:00:0' AND '2024-04-30 23:59:0">April</option>
                    <option value="2024-05-01 01:00:0' AND '2024-05-31 23:59:0">Mei</option>
                    <option value="2024-06-01 01:00:0' AND '2024-06-30 23:59:0">Juni</option>
                    <option value="2024-07-01 01:00:0' AND '2024-07-31 23:59:0">Juli</option>
                    <option value="2024-08-01 01:00:0' AND '2024-08-31 23:59:0">Agustus</option>
                    <option value="2024-09-01 01:00:0' AND '2024-09-30 23:59:0">September</option>
                    <option value="2024-10-01 01:00:0' AND '2024-10-31 23:59:0">Oktober</option>
                    <option value="2024-11-01 01:00:0' AND '2024-11-30 23:59:0">November</option>
                    <option value="2024-12-01 01:00:0' AND '2024-12-31 23:59:0">Desember</option>
                </select>
                <select name="tampil1">
                    <option value="Semua1">Semua</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Tidak Hadir">Tidak Hadir</option>
                    <option value="Hanya Hadir Diawal">Hanya Hadir Diawal</option>
                    <option value="Hanya Hadir Diakhir">Hanya Hadir Diakhir</option>
                </select>
                <select name="cari_kelas">
                <?php
                    foreach($result_kls as $k){ ?>
                    <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
                <?php } ?>
            </select>
                <input type="submit" name="submit" value="Tampil">
            </form>
        </td>
        <form action="cetak_laporan.php" method="POST">
            <input type="hidden" name="bulan" value="<?= $tgl ?>">
            <input type="hidden" name="hadir" value="<?= $hadir ?>">
        <td align="right"><button class="btn1" name="cetak" style="background-color: red;"><i class="fa fa-print"></i> Cetak PDF</button></td>
        </form>
        <form action="excel.php" method="POST">
            <input type="hidden" name="bulan" value="<?= $tgl ?>">
            <input type="hidden" name="hadir" value="<?= $hadir ?>">
        <td><button class="btn1" name="cetak"><i class="fa fa-print"></i> Cetak Excel</button></td>
        </form>
    </tr>
</table><br>
<center>
<table style="box-shadow: 7px 7px 5px lightgrey;">
        <tr>
            <th>Tanggal</th>
            <th>Mata Pelajaran</th>
            <th>Nama Guru</th>
            <th>jam Pembelajaran</th>
            <th>Materi</th>
            <th>Tugas </th>
            <th>kehadiran Guru</th>
            <th>Catatan Kejadian </th> 
            <th>Verifikasi</th>
        </tr>
    <?php foreach ($level as $row) : ?>
        <tr>
                <td><?= $row["tgl"];?></td>
                <td><?= $row["nama_mapel"];?></td>
                <td><?= $row["nama_guru"];?></td>
                <td><?= $row["jam_masuk"]." - ".$row['jam_selesai'];?></td>
                <td><?= $row["materi"];?></td>
                <td><?= $row["tugas"];?></td>
                <td><?= $row["kehadiran"];?></td>
                <td><?= $row["evaluasi"];?></td>
                <td><b><?= $row["verifikasi"];?></b></td>
                <td><a href="comment_admin.php?a=<?= $row["id_agenda"]; ?>" style="text-decoration: none;""><button class="btn"><img src="image/pencil.png" width="18px"></button></a></td>
            </tr>
            <?php endforeach ; 
            ?>
</table>
    </center>
</div>
<div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>

    <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
          dropdownContent.style.display = "block";
    }
      });
    }
  </script>
</body>