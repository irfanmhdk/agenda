<?php
    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }
    
    $id = $_GET['id'];
    $nip = $_GET['nip'];

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
<header>
        <div class="sidebar">
            <a href="beranda2.php?id=<?= $nip ?>"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="beranda2.php?id=<?= $nip ?>">Home</a>
            <a class="active" href="verifikasi.php?id=<?= $nip ?>">Verifikasi</a>
            <a style="color: red;"href="logout.php"> log out</button></a>
        </div>
    </header>
    <div class="head">
        <?php
              foreach($k as $nama){ ?>
              <p style="margin-right: 10px;"><b><?= $nama['nama_guru'] ?></b></p>
            <?php
              }
          ?>
    </div>
    <div class="content">
        <table>
            <tr>
                <td><h1>Komentar</h1></td>
            </tr>
            <tr>
            <?php
                foreach($level as $c){
            ?>
                <td><?= $c['comment'] ?></td>
            
            <?php
                }
            ?>
            </tr>
        </table>
        <hr>
        <h1>Tambahkan Komentar (Bagi guru tidak yang hadir diwajibkan mengisi Komentar serta berikan alasannya </h1>
        <form action="process_comment.php" method="post">
            <textarea name="comment" rows="4" cols="50" required></textarea><br></td>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="nip" value="<?= $nip ?>">
            <td><input type="submit" value="Kirim Komentar" class="btn">
        </form>
    </div>
</body>
</html>