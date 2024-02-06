<?php
    include 'koneksi.php';

    $sql = "SELECT tb_jadwal.id_jadwal, tb_kelas.nama_kelas, tb_jadwal.hari, tb_jadwal.jam_masuk, tb_jadwal.jam_selesai, tb_guru.nama_guru, 
            tb_mapel.nama_mapel, tb_jadwal.ruangan FROM tb_jadwal INNER JOIN tb_kelas ON tb_jadwal.id_kelas=tb_kelas.id_kelas INNER JOIN 
            tb_guru ON tb_jadwal.nip=tb_guru.nip INNER JOIN tb_mapel ON tb_jadwal.id_mapel = tb_mapel.id_mapel";
    $proses = mysqli_query($Conn, $sql);

    $sql1 = "SELECT * FROM tb_kelas";
    $proses1 = mysqli_query($Conn, $sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        color: black;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    .btn {
        width: auto;
        background-color: #4CAF50;
        color: white;
        padding: 7px 10px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #3e8e41;
        color: white;
    }
    .btn1 {
        background-color: DodgerBlue;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn1:hover {
        background-color: RoyalBlue;
    }
    select {
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
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="beranda3.php">Home</a>
            <a href="data_admin.php">Data Agenda</a>
            <a class="active" href="jadwal.php">Jadwal</a>
            <button class="dropdown-btn">Manage Data 
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="manage_data_guru.php">Data Guru</a>
                <a href="manage_data_mapel.php">Data Mata Pelajaran</a>
                <a href="#">Data Kelas</a>
            </div>
        </div>
    </header>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
    <h1>JADWAL</h1><hr>

    <table>
        <tr>
            <td><form action="s_jadwal.php" method="POST"><select name="search">
                <?php
                    foreach($proses1 as $k){ ?>
                    <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
                <?php } ?>
            </select>
            <button class="btn1" name="submit"><i class="fa fa-search"></i></button></form></td>
            <td style="text-align:right;"><a href="input_jadwal.php"><button class="btn1"><i class="fa fa-plus"></i> Tambah Data</button></a></td>
        </tr>
    </table>
    <table style="box-shadow: 7px 7px 5px lightgrey;">
        <tr>
            <th>Kelas</th>
            <th>Hari</th>
            <th>Jam Pembelajaran</th>
            <th>Nama Guru</th>
            <th>Mata Pelajaran</th>
            <th>Ruangan</th>
            <th>Opsi</th>
        </tr>
        <?php
            foreach($proses as $data){
        ?>
        <tr>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['hari'] ?></td>
            <td><?= $data['jam_masuk']." - ".$data['jam_selesai'] ?></td>
            <td><?= $data['nama_guru'] ?></td>
            <td><?= $data['nama_mapel'] ?></td>
            <td><?= $data['ruangan'] ?></td>
            <td><a href="edit_jadwal.php?id=<?= $data['id_jadwal'] ?>"><button class="btn1" name="submit" style="font-size: 11px;background-color: #ffcc00;color: #000000;"><i class="fa fa-search"> EDIT</i></button></a>
            <td><a href="hapus_jadwal.php?id=<?= $data['id_jadwal'] ?>"><button class="btn1" name="submit"style="font-size: 11px; background-color: #cc3300;"><i class="fa fa-close"> HAPUS</i></button></form></td> 
        </tr>
        <?php } ?>
    </table>
    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
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