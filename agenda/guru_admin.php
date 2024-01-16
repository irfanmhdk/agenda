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
    table {
    border-collapse: collapse;
    width: 100%;
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
</style>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <a href="beranda3.php">Home</a>
            <a class="active" href="guru_admin.php">Agenda Guru</a>
            <a href="kelas_admin.php">Agenda Siswa</a> 
        </div>
    </header>
    <div class="head">
    <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
        <h1>Silahkan Pilih Guru</h1><hr>
        <form action="tampil_agenda_guruA.php" method="POST">
            <select name="nip">
                <?php
                    include 'koneksi.php';
        
                    $sql = "SELECT * FROM tb_guru";
                    $level = mysqli_query($Conn, $sql);

                    $sql1 = "SELECT  tb_agenda_guru.id_agenda_guru, tb_agenda_guru.tgl, tb_guru.nama_guru, tb_agenda_guru.jam_ke, tb_mapel.nama_mapel, tb_kelas.nama_kelas, tb_agenda_guru.kehadiran_guru,
                    tb_agenda_guru.materi, tb_agenda_guru.catatan_kejadian, tb_agenda_guru.dokumentasi FROM tb_agenda_guru INNER JOIN tb_guru ON tb_agenda_guru.nip = tb_guru.nip 
                    INNER JOIN tb_mapel ON tb_agenda_guru.id_mapel = tb_mapel.id_mapel 
                    INNER JOIN tb_kelas ON tb_agenda_guru.id_kelas = tb_kelas.id_kelas;";
                    $level1 = mysqli_query($Conn,$sql1);

                    foreach ($level as $guru){ ?>
                <option value="<?= $guru['nip'] ?>"><?= $guru['nama_guru'] ?></option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="Pilih">
        </form><br>
        <center>
<table border="1" cellspacing="0" cellpadding = "10px">
    <thead>
        <tr>
            <th>ID Agenda Guru</th>
            <th>Tanggal</th>
            <th>Nama Guru</th>
            <th>Jam</th>
            <th>Mapel </th>
            <th>Mengajar Kelas</th>
            <th>kehadiran Guru</th>
            <th>Materi </th>
            <th>Catatan Kejadian</th>
            <th>Dokumentasi </th> 
        </tr>
    </thead>
    <tbody>
    <?php foreach ($level1 as $row) : ?>
            <tr>
                <td><?= $row["id_agenda_guru"];?></td>
                <td><?= $row["tgl"];?></td>
                <td><?= $row["nama_guru"];?></td>
                <td><?= $row["jam_ke"];?></td>
                <td><?= $row["nama_mapel"];?></td>
                <td><?= $row["nama_kelas"];?></td>
                <td><?= $row["kehadiran_guru"];?></td>
                <td><?= $row["materi"];?></td>
                <td><?= $row["catatan_kejadian"];?></td>
                <td><center><img src="image/<?= $row["dokumentasi"];?>" width="100" height="70px"></center></td>
            </tr>
            <?php endforeach ; 
            ?>
    </tbody>
</table>
    </center>
    </div>
    <div class="footer">
          <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
        </div>
</body>
</html>