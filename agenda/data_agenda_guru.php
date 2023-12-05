<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #d4d4d4;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #dddddd;
    }
</style>
<body>
    <header>
        <div class="sidebar">
        <a href="beranda.php">Home</a>
        <a class="active" href="data_agenda.php">Jadwal</a>
        <a href="#about">About</a>
        </div>
    </header>
    <div class="content">
        <h1>JADWAL GURU</h1><hr>
    <form action="isi_agenda_guru.php" method="POST">
        <table>
            <tr>
              
            </tr>
            <tr>
                <th>Guru</th>
                <th>Jam Pembelajaran</th>
                <th>Mata Pelajaran</th>
                <th>Mengajar Kelas</th>
                <th>Isi Agenda</th>
            </tr>
                <?php
                    include 'koneksi.php';

                    $sql ="SELECT tb_jadwal.jam, tb_jadwal.hari, tb_kelas.nama_kelas, tb_guru.nama_guru, tb_mapel.nama_mapel
                            FROM tb_jadwal INNER JOIN tb_kelas ON tb_jadwal.id_kelas = tb_kelas.id_kelas INNER JOIN 
                            tb_guru ON tb_jadwal.nip = tb_guru.nip INNER JOIN tb_mapel ON tb_jadwal.id_mapel = tb_mapel.id_mapel WHERE hari='Senin'";
                    $proses = mysqli_query($Conn, $sql);

                    foreach($proses as $jadwal){ ?>
                        <tr>
                        <td><?= $jadwal['nama_guru'] ?></td>
                        <td><?= $jadwal['jam'] ?></td>
                        <td><?= $jadwal['nama_mapel'] ?></td>
                        <td><?= $jadwal['nama_kelas'] ?></td>
                        <td><a href="isi_agenda_guru.php" style="text-decoration: none;"><b>Isi Agenda</b></a></td>
                        </tr>
                <?php }  ?>
            
        </table>
    </form>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $status = $_POST['status'];
            if($status == "guru"){
                header('location: isi_agenda_guru.php');
            }else{
                header('location: isi_agenda.php');
            }
        }
    ?>
</body>
</html>