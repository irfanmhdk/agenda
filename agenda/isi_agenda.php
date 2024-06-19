<?php
    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }
    if ($_SESSION['role'] != "3") {
        header("Location: index.php");
        exit();
    }
    include 'hari.php';

    $kelas = $_SESSION["id_user"];
    $nip = $_GET['nip'];
    $map = $_GET['map'];
    $date = $_GET['date'];

$sql = "SELECT * FROM tb_guru";
$proses = mysqli_query($Conn, $sql);

$sql1 = "SELECT * FROM tb_kelas WHERE id_kelas='$kelas'";
$k = mysqli_query($Conn,$sql1);

$sql2 = "SELECT * FROM tb_guru INNER JOIN tb_mapel ON tb_guru.id_mapel = tb_mapel.id_mapel WHERE tb_guru.nip='$nip'";
$k2 = mysqli_query($Conn,$sql2);
while ($data = mysqli_fetch_array($k2)) {
    $nama_guru = $data['nama_guru'];
    $nama_mapel = $data['nama_mapel'];
}


$result = mysqli_query($Conn,  "SELECT 
                                    tb_absen.id_absen, 
                                    tb_absen.nis, 
                                    tb_absen.tanggal, 
                                    tb_absen.kehadiran,
                                    tb_kelas.nama_kelas,
                                    siswa.nama,
                                    siswa.jk,
                                    siswa.id_kelas
                                FROM 
                                    tb_absen
                                INNER JOIN 
                                    siswa ON tb_absen.nis = siswa.nis
                                INNER JOIN 
                                    tb_kelas ON siswa.id_kelas = tb_kelas.id_kelas 
                                WHERE 
                                    siswa.id_kelas = '$kelas'
                                    AND  tb_absen.tanggal LIKE '%$date%'
                                    AND (tb_absen.kehadiran = 'Sakit' OR tb_absen.kehadiran = 'Alpha' OR tb_absen.kehadiran = 'Izin')");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Siswa & Guru</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="profile.css">
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
    input[type=number], select {
    width: 240px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    .tb1{
    position: absolute;
    padding: 15px;
    right: 0;
    top: 25%;
    border-radius: 5%;
    }
    .t{
        padding: 10px;
    }
</style>
</head>
<body>
    <?php include "nav_s.php"; ?>
    <div class="content">
    <h1>PENGISIAN AGENDA</h1><hr><br>
    <form action="simpan_agenda.php" method="POST">
        <table>
        <tr>
            <td>Nama Guru</td>
            <td><input type="text" value="<?= $nama_guru; ?>" readonly></td>
        </tr>
        <tr>
            <td>Matapelajaran</td>
            <td><input type="text" value="<?= $nama_mapel; ?>" readonly></td>
        <tr>
        <tr>
                <td><label>Jam Pembelajaran mulai </label></td>
                    <td><select name="jam_masuk">
                        <option value="07.00">07.00</option>
                        <option value="07.45">07.45</option>
                        <option value="08.30">08.30</option>
                        <option value="09.15">09.15</option>
                        <option value="10.15">10.15</option>
                        <option value="10.55">10.55</option>
                        <option value="11.30">11.30</option>
                        <option value="13.00">13.00</option>
                        <option value="13.40">13.40</option>
                        <option value="14.20">14.20</option>
                        <option value="15.00">15.00</option>
                        <option value="15.30">15.30</option>
                    </select></td>
                    </tr>
                    <td><label>Jam Pembelajaran selesai </label></td>
                    <td><select name="jam_selesai">
                        <option value="07.45">07.45</option>
                        <option value="08.30">08.30</option>
                        <option value="09.15">09.15</option>
                        <option value="10.15">10.15</option>
                        <option value="10.55">10.55</option>
                        <option value="11.30">11.30</option>
                        <option value="13.00">13.00</option>
                        <option value="13.40">13.40</option>
                        <option value="14.20">14.20</option>
                        <option value="15.00">15.00</option>
                        <option value="15.30">15.30</option>
                    </select></td>
                    </tr>
                <td>Materi</td>
                <td><input type="text" name="materi"></td>
                </td>
            </tr>
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
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                        <option value="Hanya Hadir Diawal">Hanya Hadir Diawal</option>
                        <option value="Hanya Hadir Diakhir">Hanya Hadir Diakhir </option>
                    </select></td>
                    </tr>
                    <tr>
                    <td><label>Jumlah Siswa Dalam Satu Kelas</label></td>
                    <td><input type="number" name="kelas"></td>
                   </tr>
                   <tr>
                    <td><label>Jumlah Siswa Yang Hadir</label></td>
                    <td><input type="number" name="hadir"></td>
                   </tr>
                   <tr>
                    <td><label>Jumlah Siswa Yang Sakit</label></td>
                    <td><input type="number" name="sakit"></td>
                   </tr>
                   <tr>
                    <td><label>Jumlah Siswa Yang Izin</label></td>
                    <td><input type="number" name="izin"></td>
                   </tr>
                   <tr>
                    <td><label>Jumlah Siswa Yang Alpha</label></td>
                    <td><input type="number" name="alpha"></td>
                   </tr>
            <tr>
                <td><label>catatan Kejadian</label></td>
                <td colspan="3"><textarea name="catatan_kejadian" cols="30" rows="10" placeholder="Masukan Nama Siswa yang tidak hadir beserta keterangan nya. Jika ada kejadian tertentu mohon untuk diisi"></textarea>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="hidden" name="kel" value="<?= $kelas; ?>">
                   
                    <input type="hidden" name="nip" value="<?= $nip; ?>">
                    <input type="hidden" name="map" value="<?= $map; ?>">
                    <input type="submit" name="kirim" value="Kirim"></td>
            </tr>
        </table>
        </form>
        <br>
        
        <div class="tb1">
        <table>
            <tr>
                <th colspan="4" align="left" class="t"><?= date("d/m/Y") ?> | Siswa Tidak Hadir</th>
            </tr>
            <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Keterangan</th>
            </tr>
            <?php
        foreach($result as $d) { ?>
                <tr>
                    <td class="t"><?= $d['nis'] ?></td>
                    <td class="t"><?= $d['nama'] ?></td>
                    <td class="t"><?= $d['nama_kelas'] ?></td>
                    <td class="t"><?= $d['kehadiran'] ?></td>
                </tr>
            <?php }  ?>
        </table>
        </div>
        
    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
</body>
</html>