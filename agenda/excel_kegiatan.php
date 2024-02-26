<?php
    include 'koneksi.php';

    if(isset($_POST['cetak'])){
        $s = $_POST['search'];
    
        if(empty($s)){
            $sql1 = "SELECT tb_kelas.nama_kelas, tb_kegiatan_lain.tgl, tb_kegiatan_lain.jam_mulai, tb_kegiatan_lain.jam_selesai,
                     tb_kegiatan_lain.judul_kegiatan, tb_kegiatan_lain.isi_kegiatan, tb_kegiatan_lain.catatan_kejadian FROM tb_kegiatan_lain INNER JOIN
                     tb_kelas ON tb_kegiatan_lain.id_kelas = tb_kelas.id_kelas";
            $k = mysqli_query($Conn,$sql1);
        }else{
            $sql1 = "SELECT tb_kelas.nama_kelas, tb_kegiatan_lain.tgl, tb_kegiatan_lain.jam_mulai, tb_kegiatan_lain.jam_selesai,
                     tb_kegiatan_lain.judul_kegiatan, tb_kegiatan_lain.isi_kegiatan, tb_kegiatan_lain.catatan_kejadian FROM tb_kegiatan_lain INNER JOIN
                     tb_kelas ON tb_kegiatan_lain.id_kelas = tb_kelas.id_kelas WHERE tb_kegiatan_lain.judul_kegiatan LIKE '%$s%'";
            $k = mysqli_query($Conn,$sql1);
        }
        
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
<body>
    <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=laporan_agenda.xls")
    ?>
    <center><h1>LAPORAN KEGIATAN LAIN</h1>
    <h1>SMK NEGERI 2 CIMAHI</h1><hr></center><br>
    <table>
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
            <th class="ta">Jam Pelaksanaan</th>
            <th class="ta">Judul Kegiatan</th>
            <th class="ta">Isi Kegiatan</th>
            <th class="ta">Catatan Kejadian</th>
        </tr>
    <?php foreach ($k as $row) : ?>
        <tr>
                <td class="te"><?= $row["tgl"];?></td>
                <td class="te"><?= $row["nama_kelas"];?></td>
                <td class="te"><?= $row["jam_mulai"]." - ".$row['jam_selesai'];?></td>
                <td class="te"><?= $row["judul_kegiatan"];?></td>
                <td class="te"><?= $row["isi_kegiatan"];?></td>
                <td class="te"><?= $row["catatan_kejadian"];?></td>
            </tr>
            <?php endforeach ; 
            ?>
        <tr>
            <td colspan="5"></td>
            <td><br>
                <center><p style="font-size: 11px;">Cimahi, <?= date("d F Y"); ?><br>
                    Kepala Sekolah SMKN 2 Cimahi <br><br><br><br><br><br>
                    Tanszah Lazuardi Raditya, S.Pd, M.Pd <br>
                    NIP. 192304562356033330
                </p></center>
            </td>
        </tr>
    </table>
    </center>
    <meta http-equiv="refresh" content="1; URL=http:kegiatan_admin.php"/>
</body>