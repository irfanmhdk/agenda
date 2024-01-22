<?php
    include 'koneksi.php';

$jam = $_GET['jam'];
$nip = $_GET['nip'];
$map = $_GET['map'];
$kel = $_GET['kel'];

$sql = "SELECT * FROM tb_guru";
$proses = mysqli_query($Conn, $sql);

$sql1 = "SELECT * FROM tb_kelas WHERE id_kelas='$kel'";
$k = mysqli_query($Conn,$sql1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Siswa & Guru</title>
    <link rel="stylesheet" href="navbar.css">
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
</head>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda.php?id=<?= $kel ?>"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <a href="beranda.php?id=<?= $kel ?>">Home</a>
            <a class="active" href="data_agenda.php?id=<?= $kel ?>">Jadwal</a>
            <a href="absensi.php?id=<?= $kel ?>">Absensi</a>
            <a href="tampil_agenda.php?id=<?= $kel ?>">Data Agenda</a>
        </div>
    </header>
    <div class="head">
          <?php
            foreach($k as $nama){ ?>
            <p style="margin-right: 10px;"><b><?= $nama['nama_kelas'] ?></b></p>
          <?php
            }
          ?>
        </div>
    <div class="content">
    <h1>PENGISIAN AGENDA</h1><hr><br>
    <form action="simpan_agenda.php" method="POST">
        <table>
        <tr>
                <td><label>Jam Pembelajaran mulai </label></td>
                    <td><select name="jam_pembelajaran">
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
                    <td><label>Jam Pembelajaran selesai </label></td>
                    <td><select name="jam_pembelajaran_s">
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
                <td><label>Kehadiran Guru</label></td>
                <td><select name="kehadiran_guru">
                        <option value="Hadir">Hadir Diawal</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak Hadir">Hadir Diakhir</option>
                        <option value="Hadir Diakhir">Tidak Hadir </option>
                    </select></td>
                    </tr>
            <tr>
                <td><label>Tanggal</label></td>
                <input type="date" id="tanggal" name="tanggal" readonly>
                <script>
    // Fungsi untuk mengisi tanggal saat ini ke dalam elemen formulir
    function isiTanggalOtomatis() {
        // Dapatkan elemen formulir tanggal
        var inputTanggal = document.getElementById('tanggal');

        // Dapatkan tanggal saat ini
        var tanggalSaatIni = new Date();

        // Format tanggal dalam bentuk YYYY-MM-DD
        var tanggalFormatted = tanggalSaatIni.toISOString().slice(0, 10);

        // Set nilai elemen formulir tanggal
        inputTanggal.value = tanggalFormatted;
    }

    // Panggil fungsi saat halaman dimuat
    window.onload = isiTanggalOtomatis;
</script>
            </td>
            </tr>
            <tr>
                <td><label>catatan Kejadian</label></td>
                <td colspan="3"><textarea name="catatan_kejadian" cols="30" rows="10"></textarea>
                    <input type="hidden" name="verif" value="Belum Verifikasi"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="hidden" name="kel" value="<?= $kel; ?>">
                   
                    <input type="hidden" name="nip" value="<?= $nip; ?>">
                    <input type="hidden" name="map" value="<?= $map; ?>">
                    <input type="submit" name="kirim" value="Kirim"></td>
            </tr>
        </table>
    </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
</body>
</html>