<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="profile.css">
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

    $kelas = $_SESSION["id_user"];

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
    <?php include "nav_s.php"; ?>
    <div class="content">
        <h1>JADWAL KELAS</h1><hr>
        <table>
            <tr>
                <td><h4>Hari <?= $h ?></h4></td>
                <td style="text-align: right;"><a href="input_kegiatan_lain.php?"><button class="btn" name="cetak"><i class="fa fa-calendar"></i> Kegiatan Lainnya</button></a></td>
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

                    foreach($proses as $jadwal){
                        $nip = $jadwal['nip'];
                        $mapel = $jadwal['id_mapel'];
                        $dte = date("Y-m-d");
                        $cek = mysqli_query($Conn, "SELECT * FROM tb_agenda WHERE nip = '$nip' AND id_kelas = '$kelas' AND id_mapel = '$mapel' AND tgl LIKE '%$dte%'")?>
                        <tr>
                        <td><?= $jadwal['nama_mapel'] ?></td>
                        <td><?= $jadwal['nama_guru'] ?></td>

                        <td><?php if(mysqli_num_rows($cek) == 0){ ?>
                            <a href="isi_agenda.php?nip=<?= $jadwal['nip'] ?>&map=<?= $jadwal['id_mapel'] ?>&date=<?= date("Y-m-d"); ?>"><button class="btn1" name="submit" style="font-size: 14px;"><i class="fa fa-file"> Isi Agenda</i></button></a>
                        <?php }else{ ?>
                            <p>Sudah Megisi Agenda</p>
                        <?php } ?></td>
                <?php }  ?>
                </tr>
        </table>
    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
</body>
</html>