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
        <a class="active" href="#home">Home</a>
        <a href="#">Data Agenda</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        </div>
    </header>
    <div class="content">
    <h1>Pengisian Agenda Guru</h1><hr>
    <form action="simpan_agenda_guru.php" method="POST">
        <table>
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
                <td><label>Kehadiran</label></td>
                <td><select name="kehadiran_guru">
                        <option value="H">Hadir</option>
                        <option value="A">Alpha</option>
                        <option value="S">Sakit</option>
                        <option value="I">Izin</option>
                    </select></td>
                <td><label>Keterangan</label></td>
                <td><input type="text" name="keterangan_guru"></td>
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
                <td><label>Mengajar Kelas</label></td>
                <td colspan="3"><select name="kelas">
                    <?php
                        $sql = "SELECT * FROM tb_kelas";
                        $kelasm = mysqli_query($Conn, $sql);

                        foreach($kelasm as $kelas){
                        echo "<option value=".$kelas['id_kelas'].">".$kelas['tingkat']." ".$kelas['jurusan']." ".$kelas['kelas']."</option>";
                    } ?>
                    </select></td>
            </tr>
            <tr>
                <td><label>Durasi Mengajar</label></td>
                <td colspan="3"><input type="number" name="durasi" value="berdasarkan menit"></td>
            </tr>
            <tr>
                <td><label>Tujuan Pembelajaran</label></td>
                <td colspan="3"><textarea  name="tujuan_pemb" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td><label>Materi</label></td>
                <td colspan="3"><textarea name="materi" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td><label>Evaluasi</label></td>
                <td colspan="3"><textarea name="evaluasi" cols="30" rows="10"></textarea></td>
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