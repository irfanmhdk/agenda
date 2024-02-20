<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM tb_mapel WHERE id_mapel= $id"; //WS
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
            <script>
                alert('Data anda berhasil dihapus');
                window.location.href = 'manage_data_mapel.php'; // alihkan langsung melalui JavaScript
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data anda gagal dihapus');
                window.location.href = 'manage_data_mapel.php'; // alihkan langsung melalui JavaScript
            </script>
        ";
    }
?>