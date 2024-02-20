<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM tb_guru WHERE nip= $id";
    $hapus = mysqli_query($Conn, $sql);

    if ($hapus) {
        echo "<script>
            alert('Data Berhasil Dihapus');
            window.location.href='manage_data_guru.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='manage_data_guru.php';
        </script>";
        exit();
    }
?>