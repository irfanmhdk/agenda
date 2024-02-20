<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){

        $id = $_POST['id_kelas'];
        $kelas = $_POST['kelas'];

        $result = mysqli_query($Conn, "UPDATE tb_kelas SET id_kelas='$id', nama_kelas='$kelas' WHERE id_kelas='$id'");
        if ($result) {
            echo "
            <script>
                alert('Data berhasil diedit');
                window.location.href='manage_data_kelas.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diedit');
                window.location.href='edit_data_kelas.php?id=$id';
            </script>";
        }
    }
?>