<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){

        $i = $_POST['id'];
        $id = $_POST['id_mapel'];
        $nama = $_POST['nama'];

        $result = mysqli_query($Conn, "UPDATE tb_mapel SET id_mapel='$id', nama_mapel='$nama' WHERE id_mapel='$i'");
        if ($result) {
            echo "
            <script>
                alert('Data berhasil diedit');
                window.location.href='manage_data_mapel.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diedit');
                window.location.href='edit_data_mapel.php?id=$id';
            </script>";
        }
    }
?>