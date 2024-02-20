<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM tb_jadwal WHERE id_jadwal= $id"; //
    $hapus = mysqli_query($Conn, $sql);

    if ($hapus) {
        echo "<script>
            alert('Data Berhasil Dihapus');
            window.location.href='jadwal.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='jadwal.php';
        </script>";
        exit();
    }
?>