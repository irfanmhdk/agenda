<?php
    include 'koneksi.php';

    $id = $_GET['id'];

    $sql = "SELECT tb_jadwal.id_jadwal, tb_jadwal.id_mapel, tb_jadwal.id_kelas, tb_kelas.nama_kelas, tb_jadwal.hari, tb_jadwal.jam_masuk, tb_jadwal.jam_selesai, tb_guru.nama_guru, 
            tb_mapel.nama_mapel, tb_jadwal.hari, tb_jadwal.ruangan FROM tb_jadwal INNER JOIN tb_kelas ON tb_jadwal.id_kelas=tb_kelas.id_kelas INNER JOIN 
            tb_guru ON tb_jadwal.nip=tb_guru.nip INNER JOIN tb_mapel ON tb_jadwal.id_mapel = tb_mapel.id_mapel WHERE tb_jadwal.id_jadwal = '$id'";
    $proses = mysqli_query($Conn, $sql);

    $sql1 = "SELECT * FROM tb_kelas";
    $level = mysqli_query($Conn, $sql1);

    $sql2 = "SELECT * FROM tb_mapel";
    $level1 = mysqli_query($Conn, $sql2);

    while ($data = mysqli_fetch_array($proses)) {
        $ij = $data['id_jadwal'];
        $im = $data['id_mapel'];
        $ik = $data['id_kelas'];
        $hari = $data['hari'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<style>
    table{
        background-color: #f1f1f1;
        padding: 10px 50px 10px 30px;
        border-radius: 3%;
    }
    input[type=text], select {
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
    input[type=date] {
    width: 200px;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }
    textarea {
    width: 240px;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
    }
</style>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <a href="beranda3.php">Home</a>
            <a href="guru_admin.php">Data Agenda</a>
            <a class="active" href="jadwal.php">Jadwal</a>
            <a href="manage_data_guru.php">Manage Data Guru</a>
        </div>
    </header>
    <div class="content">
    <h1>TAMBAH JADWAL</h1><hr><br>
    <form action="edit_jadwal2.php?id=<?= $id ?>" method="POST">
        <table>
            <tr>
                <td>Kelas</td>
                <td>
                <Select name="kelas">
                <?php
                    foreach ($level as $kelas){ ?>
                        <option value="<?= $kelas['id_kelas'] ?>" <?= $kelas['id_kelas'] == $ik ? "selected" : ""?>><?= $kelas['nama_kelas'] ?></option>
                    <?php
                        }
                    ?>
                </Select>
                </td>
            </tr>
            <tr>
                <td>Hari</td>
                <td><select name="hari">
                    <?php
                        $h = array("Senin","Selasa","Rabu","Kamis","Jumat");
                        for($i = 0; $i < 5; $i++){
                    ?>
                        <option value="<?= $h[$i] ?>" <?= $h[$i] == $hari ? "selected" : ""?>><?= $h[$i] ?></option>
                    <?php } ?>
                </select></td>
            </tr>
            <tr>
                <td>Mata Pelajaran</td>
                <td><select name="mapel">
                    <?php
                        foreach ($level1 as $mapel){ ?>
                            <option value="<?= $mapel['id_mapel'] ?>" <?= $mapel['id_mapel'] == $im ? "selected" : ""?>><?= $mapel['nama_mapel'] ?></option>
                        <?php
                            }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="berikut" value="Berikutnya"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>