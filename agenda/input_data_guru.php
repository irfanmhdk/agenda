<?php
    include 'koneksi.php';
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
    input[type=text], input[type=password], select {
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
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="beranda3.php">Home</a>
            <a href="data_admin.php">Data Agenda</a>
            <a href="jadwal.php">Jadwal</a>
            <a class="active" href="manage_data_guru.php">Manage Data Guru</a>
        </div>
    </header>
    <div class="content">
    <h1>TAMBAH DATA GURU</h1><hr><br>
    <form action="p_input_data_guru.php" method="POST">
        <table>
            <tr>
                <td>NIP</td>
                <td><input type="text" name="nip" placeholder="Input NIP..."></td>
            </tr>
            <tr>
                <td>Nama Guru</td>
                <td><input type="text" name="nama_guru" placeholder="Input Nama Guru..."></td>
            </tr>
            <tr>
                <td>Mata Pelajaran</td>
                <td><select name="mapel">
                    <?php
                        $sql = "SELECT * FROM tb_mapel";
                        $level = mysqli_query($Conn, $sql);
    
                        foreach ($level as $mapel){ ?>
                            <option value="<?= $mapel['id_mapel'] ?>"><?= $mapel['nama_mapel'] ?></option>
                        <?php
                            }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pw" placeholder="Input Password"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="role" value="2"></td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>