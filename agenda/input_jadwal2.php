<?php
    include 'koneksi.php';
    if(isset($_POST['berikut'])){
        $kelas = $_POST['kelas'];
        $hari = $_POST['hari'];
        $mapel = $_POST['mapel'];

        $sql = "SELECT * FROM tb_guru WHERE id_mapel='$mapel'";
        $guru = mysqli_query($Conn, $sql);
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
        <form action="p_input_jadwal.php" method="POST">
            <table>
                <tr>
                    <td><label>Jam Pembelajaran</label></td>
                    <td><select name="jam">
                        <option value="07.00-07.45">07.00-07.45</option>
                        <option value="07.45-08.30">07.45-08.30</option>
                        <option value="08.30-09.15">08.30-09.15</option>
                        <option value="09.15-10.00">09.15-10.00</option>
                        <option value="10.15-10.55">10.15-10.55</option>
                        <option value="10.55-11.30">10.55-11.30</option>
                        <option value="11.30-12.10">11.30-12.10</option>
                        <option value="13.00-13.40">13.00-13.40</option>
                        <option value="13.40-14.20">13.40-14.20</option>
                        <option value="14.20-15.00">14.20-15.00</option>
                        <option value="15.00-15.30">15.00-15.30</option>
                        <option value="15.30-16.00">15.30-16.00</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Guru</td>
                    <?php
                        foreach($guru as $g){ ?>
                            <td><select name="guru">
                                <option value="<?= $g['nip'] ?>"><?= $g['nama_guru'] ?></option>
                            </select></td>
                    <?php
                        }
                    ?>
                </tr>
                <tr>
                    <td>Ruangan</td>
                    <td><input type="text" name="ruangan"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="kelas" value="<?= $kelas ?>">
                        <input type="hidden" name="hari" value="<?= $hari ?>">
                        <input type="hidden" name="mapel" value="<?= $mapel ?>">
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>