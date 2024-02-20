<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM tb_kelas WHERE id_kelas= '$id'";
    $hapus = mysqli_query($Conn, $sql);

    if ($hapus) {
        echo "
            <script>
                alert('Data anda berhasil dihapus');
                window.location.href = 'manage_data_kelas.php'; // alihkan langsung melalui JavaScript
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data anda gagal dihapus');
                window.location.href = 'manage_data_kelas.php'; // alihkan langsung melalui JavaScript
            </script>
        ";
        echo "<script>
            alert('Data Berhasil Dihapus');
            window.location.href='manage_data_mapel.php';
        </script>";
        exit();
    }
    ?>