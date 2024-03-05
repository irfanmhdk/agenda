<?php
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
    
    $id = $_GET['a'];

    $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran, tb_agenda.comment,
            tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
            INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip WHERE tb_agenda.id_agenda = '$id'";
    $level = mysqli_query($Conn, $sql);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Guru</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    table {
        border-collapse: collapse;
        width: 60%;
        background-color: #f1f1f1;
        padding: 10px 50px 10px 30px;
        border-radius: 3%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #04AA6D;
        color: white;
        text-align: center;
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
        width: auto;
        background-color: #3e8e41;
        color: black;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover{
        background-color: #04AA6D;
        color: white;
    }
    </style>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="beranda3.php">Home</a>
            <a class="active" href="data_admin.php">Data Agenda</a>
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
            </div>
            <a style="color: red;"href="logout.php"> log out</button></a>
        </div>
    </header>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
        <table>
            <tr>
                <td colspan="2"><h1>Komentar</h1><hr></td>
            </tr>
            <tr>
            <?php
                foreach($level as $c){
            ?>
                <td style="padding-bottom: 30px; width: 5px;">◉</td>
                <td style="padding-bottom: 30px;"><?= $c['comment'] ?></td>
            
            <?php
                }
            ?>
            </tr>
        </table>
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