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
     $jam_pel_m = $_POST['jam_pembelajaran'];
     $jam_pel_s = $_POST['jam_pembelajaran_selesai'];
     $tugas = $_POST['tugas'];
     $catatan_kejadian = $_POST['catatan_kejadian'];
     $nip = $_POST['nip'];
     $kelas = $_POST['kel'];
     $mapel = $_POST['map'];

     $query1 = "INSERT INTO tb_agenda (tgl,tugas,nip,jam_ke,id_mapel,id_kelas,kehadiran,materi,evaluasi,verifikasi,jam_pelajaran_mulai,jam_pelajaran_selesai)
     VALUE (CURRENT_TIMESTAMP,'$tugas','$nip','$mapel','$kelas','$kehadiran_guru','$materi','$catatan_kejadian','Belum Verifikasi','$jam_pel_m'.'$jam_pel_s')";
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