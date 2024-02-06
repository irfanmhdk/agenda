<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM tb_jadwal WHERE id_jadwal= $id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
            <script>
                alert('Data anda berhasil dihapus');
            </script>
        ";
        header("Location: jadwal.php");
    } else {
        echo "
            <script>
                alert('Data anda gagal dihapus');
            </script>
        ";
        header("Location: hapus_jadwal.php");
    }
?>