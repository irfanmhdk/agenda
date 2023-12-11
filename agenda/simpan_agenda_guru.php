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
        $mapel = $_POST['map'];
        $materi = $_POST['materi'];
        $nama_guru = $_POST['nip'];
        $kehadiran_guru = $_POST['kehadiran_guru'];
        $jam_pembelajaran = $_POST['jam'];
        $catatan_kejadian = $_POST['catatan_kejadian'];
        $kelas = $_POST['kel'];
        $foto = $_POST['foto'];

        $query1 = "INSERT INTO tb_agenda_guru (tgl,jam_ke,nip,id_kelas,id_mapel,materi,dokumentasi,catatan_kejadian,kehadiran_guru)
        VALUE (CURRENT_TIMESTAMP,'$jam_pembelajaran','$nama_guru','$kelas','$mapel','$materi','$foto','$catatan_kejadian','$kehadiran_guru')";
        $proses = mysqli_query($Conn, $query1);

        if($proses){
            echo "<script>
                    alert('Berhasil Mengisi Data');
                    window.location.href='tampil_agenda_guru.php?id=$nama_guru';
                </script>"; //a
        }else{
            echo "<script>
                    alert('Gagal Mengisi Data');
                    window.location.href='isi_agenda_guru.php?id=$nama_guru';
                </script>";
        }
    }
?>
</body>
</html>