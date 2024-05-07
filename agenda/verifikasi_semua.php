<?php 

    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }
    if ($_SESSION['role'] != "2") {
        header("Location: index.php");
        exit();
      }
    
    $nip = $_GET['id'];

    $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran, tb_kelas.nama_kelas,
    tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai, tb_agenda.comment FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
    INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip INNER JOIN tb_kelas ON tb_agenda.id_kelas = tb_kelas.id_kelas WHERE tb_agenda.nip = '$nip'";
    $level = mysqli_query($Conn, $sql);
    
    $sql1 = "SELECT * FROM tb_guru WHERE nip='$nip'";
    $k = mysqli_query($Conn,$sql1);
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Siswa & Guru</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="profile.css">
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

    .btn1 {
        background-color: DodgerBlue;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn1:hover {
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
<body>
    <?php include "nav_g.php"; ?>
    <div class="content">
    <center>
<h1>DATA AGENDA</h1><hr> </center>
<br>
<form action="search_verifikasi.php" method="POST">
    <input type="text" name="search" placeholder="Cari Kelas...">
    <input type="hidden" name="nip" value="<?= $nip ?>">
    <button class="btn1" name="submit"><i class="fa fa-search"></i></button>
</form>
<center>
<table style="box-shadow: 7px 7px 5px lightgrey;">
        <tr>
            <th>Kelas</th>
            <th>Tanggal </th>
            <th>Mata Pelajaran</th>
            <th>Nama Guru</th>
            <th>kehadiran Guru</th>
            <th>Tugas </th>
            <th>Materi</th>
            <th>Jam Pembelajaran </th>
            <th>Catatan Kejadian </th> 
            <th colspan="2">Verifikasi</th>
        </tr>
    <?php foreach ($level as $row) : ?>
            <tr>
                <td><?= $row["nama_kelas"];?></td>
                <td><?= $row["tgl"];?></td>
                <td><?= $row["nama_mapel"];?></td>
                <td><?= $row["nama_guru"];?></td>
                <td><?= $row["kehadiran"];?></td>
                <td><?= $row["tugas"];?></td>
                <td><?= $row["materi"];?></td>
                <td><?= $row["jam_masuk"]." - ".$row['jam_selesai'];?></td>
                <td><?= $row["evaluasi"];?></td>
                <?php
                    $status = $row['verifikasi'];
                    if($status == "Sudah Verifikasi"){ ?>
                        <td><center><?= $status;?></center></td>
                        <td><a href="comment.php?id=<?= $row["id_agenda"]; ?>&nip=<?= $nip;?>" style="text-decoration: none;""><button class="btn"><img src="image/comment.PNG" width="18px"></button></a></td>
                <?php
                    }else{
                        if($row['kehadiran'] != "Hadir" && $row['comment'] == ""){
                ?>
                    <td>Beri Alasan Terlebih Dahulu!</td>
                    <td><center><a href="comment.php?id=<?= $row["id_agenda"]; ?>&nip=<?= $nip;?>" style="text-decoration: none;""><button class="btn"><img src="image/comment.PNG" width="18px"></button></a></center></td>
                <?php
                            
                        }else{ ?>
                     <td><center><a href="proses_verifikasi.php?id=<?= $row["id_agenda"]; ?>&nip=<?= $nip;?>" style="text-decoration: none;"><button class="btn"><img src="image/ceklis.PNG" width="18px"></button></a></center></td>
                        <td><center><a href="comment.php?id=<?= $row["id_agenda"]; ?>&nip=<?= $nip;?>" style="text-decoration: none;""><button class="btn"><img src="image/comment.PNG" width="18px"></button></button></a></center></td>      
                <?php           
                        }
                    }
                ?>
            </tr>
            <?php endforeach ; 
            ?>
</table>
    </center>

<ul>
    <li>
        <h4>Silahkan beri penjelasan di kolom komentar jika keterangan kehadiran "Tidak Hadir" / "Hanya Hadir Diawal" / "Hanya Hadir Diakhhir"</h4>
    </li>
    <li>
        <img src="image/ceklis.PNG" width="30px"> : 
        Verifikasi 
    </li>
    <li>
        <img src="image/comment.PNG" width="30px"> : 
        Comment 
    </li>
</ul>

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