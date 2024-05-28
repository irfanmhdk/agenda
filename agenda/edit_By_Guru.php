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
    
    $id = $_GET['id'];
    $nip = $_SESSION["id_user"];

    $sql = "SELECT tb_agenda.id_agenda, tb_kelas.nama_kelas, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran,
            tb_agenda.tgl, tb_agenda.jam_masuk, tb_agenda.jam_selesai, tb_agenda.evaluasi, tb_agenda.nip, tb_agenda.verifikasi, tb_agenda.comment FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
            INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip INNER JOIN tb_kelas ON tb_agenda.id_kelas = tb_kelas.id_kelas WHERE tb_agenda.id_agenda='$id'";
    $level = mysqli_query($Conn, $sql);
    
    $sql1 = "SELECT * FROM tb_guru WHERE nip='$nip'";
    $k = mysqli_query($Conn,$sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Guru</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="profile.css">
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
    <?php include "nav_g.php"; ?>
    <div class="content">
        <hr>
        <h3>Edit Materi Ubah materi yang disampaikan pada Guru jika murid salah mengisi materi yang disampaikan</h3>
        <form action="process_Edit_Guru.php" method="post">
            <textarea name="ubah_materi" rows="4" cols="50" required></textarea><br></td>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="nip" value="<?= $nip ?>">
            <td><input type="submit" value="Ubah Materi yang disampaikan" class="btn">
        </form>
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