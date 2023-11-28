<?php include "koneksi.php"; 

$sql = "SELECT * FROM tb_guru";
$proses = mysqli_query($Conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Siswa & Guru</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <header>
        <div class="sidebar">
        <a href="beranda.php">Home</a>
        <a class="active" href="#">Data Agenda</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        </div>
    </header>
    <div class="content">
    <h1>Pengisian Agenda</h1><hr>
    <form action="simpan_agenda_guru.php" method="POST">
        <table>
        <tr>
                <td><label>Mata Pelajaran</label></td>
                <td colspan="3"><select name="mapel">
                    <?php
                        $sql = "SELECT * FROM tb_mapel";
                        $mapel = mysqli_query($Conn, $sql);

                        foreach($mapel as $pelajaran){
                        echo "<option value=".$pelajaran['id_mapel'].">".$pelajaran['nama_mapel']."</option>";
                    } ?>
                    </select></td>
            </tr>
        <tr>
                <td>Materi</td>
                <td><input type="text" name="nama"></td>
                </td>
            </tr>
            <tr>
                <td>Tugas</td>
                <td><select name="tugas">
                    <option value="TL">Tugas Langsung</option>
                    <option value="MT">Menitipkan Tugas</option>
                    <option value="TT">Tidak Ada Tugas</option>
                    </select>
                </td>
            </tr>
            
                    <tr>  
                <td><label>Nama Guru</label></td>
                <td colspan="3"><select name="nama_guru">
                    <?php
                        foreach($proses as $guru){
                        echo "<option value=".$guru['nip'].">".$guru['nama']."</option>";
                    } ?>
                    </select></td>
            </tr>
            <tr>
                <td><label>Kehadiran Guru</label></td>
                <td><select name="kehadiran_guru">
                        <option value="Y">Ya</option>
                        <option value="T">Tidak</option>
                        <option value="HD">Hadir Diakhir</option>
                    </select></td>
                    </tr>
            <tr>
                <td><label>Tanggal</label></td>
                <td colspan="3"><input type="date" name="tanggal"></td>
            </tr>
            <tr>
                <td><label>Jam Pembelajaran</label></td>
                <td colspan="3"><select name="jam_pembelajaran">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select></td>
            </tr>
            <tr>
                <td><label>catatan Kejadian</label></td>
                <td colspan="3"><textarea name="tujuan_pemb" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><input type="submit" name="kirim" value="Kirim"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>