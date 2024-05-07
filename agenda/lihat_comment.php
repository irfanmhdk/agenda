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
    $id = $_GET['a'];

    $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran, tb_agenda.comment,
            tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
            INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip WHERE tb_agenda.id_agenda = '$id'";
    $level = mysqli_query($Conn, $sql);
    
    $sql1 = "SELECT * FROM tb_kelas WHERE id_kelas='$kelas'";
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
</body>
</html>