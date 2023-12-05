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
     $mapel = $_POST['kehadiran_guru'];
     $materi = $_POST['materi'];
     $tugas = $_POST['catatan_kejadian'];
     $tugas = $_POST['foto'];

     $query1 = "INSERT INTO tb_agenda_guru (nip,jam_pembelajaran,id_mapel,id_kelas,kehadiran_guru,materi,catatan_kejadian,dokumentasi)
     VALUE (CURRENT_TIMESTAMP,'$jam_pembelajaran','$nama_guru','$tugas','$kelas','$mapel','$materi','$catatan_kejadian','$kehadiran_guru','$verif')";
     $proses = mysqli_query($Conn, $query1);

     if($proses){
         echo "<script>
                 alert('Berhasil Mengisi Data');
                 window.location.href='tampil_agenda.php';
             </script>"; //a
     }else{
         echo "<script>
                 alert('Gagal Mengisi Data');
                 window.location.href='isi_agenda.php';
             </script>";
     }
 }
?>