<?php
    include 'koneksi.php';
    if(isset($_POST['cetak'])){
        $nip = $_POST['nip'];
        $t = $_POST['bulan'];
        $h = $_POST['hadir'];

        $sql = "SELECT tb_agenda.id_agenda, tb_mapel.nama_mapel, tb_agenda.materi, tb_agenda.tugas, tb_guru.nama_guru, tb_agenda.kehadiran, tb_kelas.nama_kelas,
        tb_agenda.tgl, tb_agenda.evaluasi, tb_agenda.verifikasi, tb_agenda.jam_masuk, tb_agenda.jam_selesai, tb_agenda.comment FROM tb_agenda INNER JOIN tb_mapel ON tb_agenda.id_mapel = tb_mapel.id_mapel 
        INNER JOIN tb_guru ON tb_agenda.nip = tb_guru.nip INNER JOIN tb_kelas ON tb_agenda.id_kelas = tb_kelas.id_kelas WHERE tb_agenda.nip = '$nip'";
        $level = mysqli_query($Conn, $sql);
    }
?>
<style>
    .tb {
        border-collapse: collapse;
        width: 100%;
    }

    .ta, .te {
        border: 1px solid #000000;
        color: black;
        padding: 8px;
    }

    .te:nth-child(even){background-color: #f2f2f2}
</style>
<body onload="print()">
       <hr></hr>
    <center><h3>LAPORAN AGENDA</h3>
    <h3>SMK NEGERI 2 CIMAHI</h3></center><br>
    <center>
    <p>PEMERINTAHAN DAERAH PROVINSI JAWA BARAT <br> DINAS PENDIDIKAN <br> CABANG DINAS PENDIDIKAN WILAYAH VII</p>
    <h2>SEKOLAH MENENGAH KEJURUAN NEGERI 2 CIMAHI</h2>
    <p>Jl. Kamarung Km. 1,5 No. 69 Kel. Citeureup Kec. Cimahi Utara <br> Telp/Fax:(022) 87805857 Website : http://smkn2cmi.sch,id E-mail : smkn2cmi@yahoo.com <br>
    Kota Cimahi - 40512</p><hr></center><br>
    <table>
        <tr>
            <td>Laporan</td>
            <td> : </td>
            <td>Laporan Agenda</td>
        </tr>
        <tr>
            <td>Semester</td>
            <td> : </td>
            <td>GENAP</td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td> : </td>
            <td>2024</td>
        </tr>
    </table><br>
    <center>
    <table class="tb">
        <tr>
            <th class="ta">Tanggal</th>
            <th class="ta">Kelas</th>
            <th class="ta">Jam Pembelajaran</th>
            <th class="ta">Mata Pelajaran</th>
            <th class="ta">Nama Guru</th>
            <th class="ta">Materi</th>
            <th class="ta">kehadiran Guru</th>
            <th class="ta">Catatan</th>
            <th class="ta">Verifikasi</th>
            <th class="ta">Komentar</th>
        </tr>
    <?php foreach ($level as $row) : ?>
        <tr>
                <td class="te"><?= $row["tgl"];?></td>
                <td class="te"><?= $row["nama_kelas"];?></td>
                <td class="te"><?= $row["jam_masuk"]." - ".$row['jam_selesai'];?></td>
                <td class="te"><?= $row["nama_mapel"];?></td>
                <td class="te"><?= $row["nama_guru"];?></td>
                <td class="te"><?= $row["materi"];?></td>
                <td class="te"><?= $row["kehadiran"];?></td>
                <td class="te"><?= $row["evaluasi"];?></td>
                <td class="te"><b><?= $row["verifikasi"];?></b></td>
                <td class="te"><?= $row["comment"];?></td>
            </tr>
            <?php endforeach ; 
            ?>
        <tr>
            <td colspan="6"></td>
            <td colspan="3"><br>
                <center><p style="font-size: 11px;">Cimahi, <?= date("d F Y"); ?><br>
                    Kepala Sekolah SMKN 2 Cimahi <br><br><br><br><br><br>
                    Tanszah Lazuardi Raditya, S.Pd, M.Pd <br>
                    NIP. 192304562356033330
                </p></center>
            </td>
        </tr>
    </table>
    </center>

    <meta http-equiv="refresh" content="1; URL=http:data_admin.php"/>
</body>