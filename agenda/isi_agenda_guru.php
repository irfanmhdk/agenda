<?php include "koneksi.php"; 
$jam = $_GET['jam'];
$nip = $_GET['nip'];
$map = $_GET['map'];
$kel = $_GET['kel'];
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
            <a href="beranda2.php?id=<?= $nip ?>">Home</a>
            <a class="active" href="data_agenda_guru.php?id=<?= $nip ?>">Jadwal</a>
            <a href="tampil_agenda_guru.php?id=<?= $nip ?>">Data Agenda</a>
            <a href="verifikasi.php?id=<?= $nip ?>">Verifikasi</a>
        </div>
    </header>
    <div class="content">
    <h1>PENGISIAN AGENDA GURU</h1><hr>
    <form action="simpan_agenda_guru.php" method="POST">
        <table>
            </tr>
            <tr>
                <td><label>Kehadiran Guru</label></td>
                <td><select name="kehadiran_guru">
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                        <option value="Hadir Diakhir">Hadir Diakhir</option>
                    </select></td>
                    </tr>
                    <tr>
                <td>Materi</td>
                <td><input type="text" name="materi"></td>
                </td>
                    </tr>
                    
                    <tr>
                <td><label>catatan Kejadian</label></td>
                <td colspan="3"><textarea name="catatan_kejadian" cols="30" rows="10"></textarea><input type="hidden" name="verif" value="Belum Verifikasi"></td>
            </tr>
            <tr>
            <td><label>Dokumentasi</label></td>
                <td colspan="3"><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td>  <input type="hidden" name="kel" value="<?= $kel; ?>">
                    <input type="hidden" name="jam" value="<?= $jam; ?>">
                    <input type="hidden" name="nip" value="<?= $nip; ?>">
                    <input type="hidden" name="map" value="<?= $map; ?>">
                </td>
                <td><input type="submit" name="kirim" value="Kirim"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>