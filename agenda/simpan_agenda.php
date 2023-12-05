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
     $catatan_kejadian = $_POST['catatan_kejadian'];
     $foto = $_POST['foto'];

     $query1 = "INSERT INTO tb_agenda_guru (nip,jam_pembelajaran,id_mapel,id_kelas,kehadiran_guru,materi,catatan_kejadian,dokumentasi)
     VALUE (CURRENT_TIMESTAMP,'$nip','$jam','$mapel','$kelas','$kehadiran_guru','$materi','$catatan_kejadian','$foto')";
     $proses = mysqli_query($Conn, $query1);

     if($proses){
         echo "<script>
                 alert('Berhasil Mengisi Data');
                 window.location.href='tampil_agenda.php?id=<?= $kelas ?>';
             </script>"; //a
     }else{
         echo "<script>
                 alert('Gagal Mengisi Data');
                 window.location.href='isi_agenda_guru.php?id=<?= $kelas ?>';
             </script>";
     }
 }
?>