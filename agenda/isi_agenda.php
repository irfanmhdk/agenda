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
<style>
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
    background-color: #FF0000;
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
    <header>
        <div class="sidebar">
        <a href="beranda.php">Home</a>
        <a class="active" href="#"> Data Agenda</a>
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
                <td><input type="text" name="materi"></td>
                </td>
            </tr>
            <tr>
                <td>Tugas</td>
                <td><select name="tugas">
                    <option value="Tugas Langsung">Tugas Langsung</option>
                    <option value="Menitipkan Tugas">Menitipkan Tugas</option>
                    <option value="Tidak Ada Tugas">Tidak Ada Tugas</option>
                    </select>
                </td>
            </tr>
            <td><label> Kelas</label></td>
                <td colspan="3"><select name="kelas">
                    <?php //a
                        $sql = "SELECT * FROM tb_kelas";
                        $kelasm = mysqli_query($Conn, $sql);

                        foreach($kelasm as $kelas){
                        echo "<option value=".$kelas['id_kelas'].">".$kelas['nama_kelas']."</option>";
                    } ?>
                    </select></td>
                    <tr>  
                <td><label>Nama Guru</label></td>
                <td colspan="3"><select name="nama_guru">
                    <?php
                        foreach($proses as $guru){
                        echo "<option value=".$guru['nip'].">".$guru['nama_guru']."</option>";
                    } ?>
                    </select></td>
            </tr>
            <tr>
                <td><label>Kehadiran Guru</label></td>
                <td><select name="kehadiran_guru">
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak">Tidak Hadir</option>
                        <option value="Hadir Diakhir">Hadir Diakhir</option>
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
                <td colspan="3"><textarea name="catatan_kejadian" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="kirim" value="Kirim"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>