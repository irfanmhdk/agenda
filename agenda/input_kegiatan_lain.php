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

    $kelas = $_SESSION["id_user"];

$sql = "SELECT * FROM tb_guru";
$proses = mysqli_query($Conn, $sql);

$sql1 = "SELECT * FROM tb_kelas WHERE id_kelas='$kelas'";
$k = mysqli_query($Conn,$sql1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Siswa & Guru</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="profile.css">
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
</head>
<body>
    <?php include "nav_s.php"; ?>
    <div class="content">
    <h1>KEGIATAN LAINNYA</h1>
    <hr>
    <br>
    <form action="p_input_kegiatan_lainnya.php" method="POST">
        <table>
        <tr>
                <td><label>Jam Acara Mulai </label></td>
                    <td><select name="jam_masuk">
                        <option value="07.00">07.00</option>
                        <option value="07.45">07.45</option>
                        <option value="08.30">08.30</option>
                        <option value="09.15">09.15</option>
                        <option value="10.15">10.15</option>
                        <option value="10.55">10.55</option>
                        <option value="11.30">11.30</option>
                        <option value="13.00">13.00</option>
                        <option value="13.40">13.40</option>
                        <option value="14.20">14.20</option>
                        <option value="15.00">15.00</option>
                        <option value="15.30">15.30</option>
                    </select></td>
                    </tr>
                    <td><label>Jam Acara Selesai </label></td>
                    <td><select name="jam_selesai">
                        <option value="07.45">07.45</option>
                        <option value="08.30">08.30</option>
                        <option value="09.15">09.15</option>
                        <option value="10.15">10.15</option>
                        <option value="10.55">10.55</option>
                        <option value="11.30">11.30</option>
                        <option value="13.00">13.00</option>
                        <option value="13.40">13.40</option>
                        <option value="14.20">14.20</option>
                        <option value="15.00">15.00</option>
                        <option value="15.30">15.30</option>
                    </select></td>
                    </tr>
            </tr>
                <td><label>Judul Kegiatan</label></td>
                <td><input type="text" name="judul"></td>
                    </tr>
            <tr>
            <tr>
                <td>Isi Kegiatan</td>
                <td><input type="text" name="isi"></td>
            </tr>
                <td><label>catatan Kejadian</label></td>
                <td colspan="3"><textarea name="catatan" cols="30" rows="10"></textarea>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="hidden" name="kel" value="<?= $kelas; ?>">
                    <input type="submit" name="kirim" value="Kirim"></td>
            </tr>
        </table>
    </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
</body>
</html>