<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $nip = $_GET['nip'];

    $sql = "UPDATE tb_agenda SET verifikasi='Sudah Verifikasi' WHERE id_agenda='$id'";
    $proses = mysqli_query($Conn, $sql);

    if($proses){
        echo "<script>
                alert('Berhasil Verifikasi');
                window.location.href='verifikasi.php?id=$nip';
            </script>"; //a
    }else{
        echo "<script>
                alert('Gagal Verifikasi');
                window.location.href='verifikasi.php?id=$nip';
            </script>";
    }
?>