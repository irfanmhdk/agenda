<?php
    include 'koneksi.php';


$sql = "SELECT * FROM tb_kelas";
$proses = mysqli_query($Conn, $sql);

$sql1 = "SELECT tb_kelas.nama_kelas, tb_kegiatan_lain.tgl, tb_kegiatan_lain.jam_mulai, tb_kegiatan_lain.jam_selesai,
         tb_kegiatan_lain.judul_kegiatan, tb_kegiatan_lain.isi_kegiatan, tb_kegiatan_lain.catatan_kejadian  FROM tb_kegiatan_lain INNER JOIN
         tb_kelas ON tb_kegiatan_lain.id_kelas = tb_kelas.id_kelas";
$k = mysqli_query($Conn,$sql1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Kegiatan lainnya Siswa </title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    input[type=submit] {
        width: 100px;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
</head>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="beranda3.php">Home</a>
            <a href="data_admin.php">Data Agenda</a>
            <a class="active" href="kegiatan_admin.php">Kegiatan Lainnya</a>
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
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
    <center>
<h1>KEGIATAN LAINNYA</h1><hr> </center>
<br>
<form action="search1.php" method="POST">
    <input type="text" name="search" placeholder="Cari Judul Kegiatan...">
    <input type="hidden" name="kelas" value="<?= $kelas ?>">
    <input type="submit" name="submit" value="Cari">
    </form><br>
        <center>
        <table style="box-shadow: 7px 7px 5px lightgrey;">
        <tr>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Jam Kegiatan</th>
            <th>Judul Kegiatan</th>
            <th>Isi Kegiatan</th>
            <th>Catatan Kejadian </th> 
        </tr>
        <?php foreach ($k as $row) : ?>
            <tr>
                <td><?= $row["nama_kelas"];?></td>
                <td><?= $row["tgl"];?></td>
                <td><?= $row["jam_mulai"]." - ".$row['jam_selesai'];?></td>
                <td><?= $row["judul_kegiatan"];?></td>
                <td><?= $row["isi_kegiatan"];?></td>
                <td><?= $row["catatan_kejadian"];?></td>
            </tr>
            <?php endforeach ; 
            ?>
        </table>
    </form>
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
</html>