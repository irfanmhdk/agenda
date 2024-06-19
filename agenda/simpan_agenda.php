<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
    <body>
       
</body>
</html>
<?php
 include 'koneksi.php';
 if(isset($_POST['kirim'])){    
     $kehadiran_guru = $_POST['kehadiran_guru'];
     $materi = $_POST['materi'];
     $jam_m = $_POST['jam_masuk'];
     $jam_s = $_POST['jam_selesai'];
     $tugas = $_POST['tugas'];
     $catatan_kejadian = $_POST['catatan_kejadian'];
     $nip = $_POST['nip'];
     $kelas = $_POST['kel'];
     $mapel = $_POST['map'];
     $kelas = $_POST['kelas'];
     $hadir = $_POST['hadir'];
     $sakit = $_POST['sakit'];
     $izin = $_POST['izin'];
     $alpha = $_POST['alpha'];

     $query1 = "INSERT INTO tb_agenda (tgl,tugas,nip,jam_masuk,jam_selesai,id_mapel,id_kelas,kehadiran,materi,evaluasi,jumlah_siswa,kehadiran,sakit,izin,alpha,verifikasi)
     VALUE (CURRENT_TIMESTAMP,'$tugas','$nip','$jam_m','$jam_s','$mapel','$kelas','$kehadiran_guru','$materi','$catatan_kejadian','$kelas','$hadir','$sakit','$izin','$alpha','Belum Verifikasi')";
     $proses = mysqli_query($Conn, $query1);

     if($proses){
         echo "<script>
                 alert('Berhasil Mengisi Data');
                 window.location.href='tampil_agenda.php?id=$kelas';
             </script>"; //a
     }else{
         echo "<script>
                 alert('Gagal Mengisi Data');
                 window.location.href='isi_agenda.php?kel=$kelas &nip=$nip  &map=$mapel';
             </script>";
     }
 }
?>