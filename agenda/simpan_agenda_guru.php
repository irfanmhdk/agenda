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
        $mapel = $_POST['mapel'];
        $materi = $_POST['materi'];
        $tugas = $_POST['tugas'];
        $nama_guru = $_POST['nama_guru'];
        $kehadiran_guru = $_POST['kehadiran_guru'];
        $tanggal = $_POST['tanggal'];
        $jam_pembelajaran = $_POST['jam_pembelajaran'];
        $catatan_kejadian = $_POST['catatan_kejadian'];
        $kelas = $_POST['kelas'];

        $query1 = "INSERT INTO tb_agenda (tgl,jam_ke,nip,tugas,id_kelas,id_mapel,materi,evaluasi,kehadiran_guru)
        VALUE (CURRENT_TIMESTAMP,'$jam_pembelajaran','$nama_guru','$tugas','$kelas','$mapel','$materi','$catatan_kejadian','$kehadiran_guru')";
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
</body>
</html>