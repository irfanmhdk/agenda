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
    select{
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
    <header>
        <div class="sidebar">
            <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <a class="active" href="beranda3.php">Home</a>
            <a href="tampil_agenda_guruA.php">Agenda Guru</a>
            <a href="tampil_agendaA.php">Agenda Siswa</a> 
        </div>
    </header>
    <div class="head"></div>
    <div class="content">
        <h1>Silahkan Pilih Kelas</h1><hr>
        <form action="tampil_agendaA.php" mehod="POST">
            <select name="kelas">
                <?php
                    include 'koneksi.php';
        
                    $sql = "SELECT * FROM tb_kelas";
                    $level = mysqli_query($Conn, $sql);

                    foreach ($level as $kelas){ ?>
                <option value="<?= $kelas['nama_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="Pilih">
        </form>
    </div>
</body>
</html>