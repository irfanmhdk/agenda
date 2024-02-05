<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){

        $id = $_POST['id'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama_guru'];
        $mapel = $_POST['mapel'];

        $result = mysqli_query($Conn, "UPDATE tb_guru SET nip='$nip', nama_guru='$nama', id_mapel='$mapel' WHERE nip='$id'");
        if ($result) {
            echo "
            <script>
                alert('Data berhasil diedit');
                window.location.href='manage_data_guru.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diedit');
                window.location.href='edit_data_guru.php?id=$id';
            </script>";
        }
    }
?>