<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){

        $psw = $_POST['psw'];
        $id = $_POST['id'];

        $pw = password_hash($psw, PASSWORD_DEFAULT);

        $result = mysqli_query($Conn, "UPDATE tb_user SET password='$pw' WHERE id_user='$id'");
        if ($result) {
            echo "
            <script>
                alert('Password berhasil diganti');
                window.location.href='beranda2.php?id=$id';
            </script>";
        } else {
            echo "
            <script>
                alert('Password gagal diganti');
                window.location.href='beranda2.php?id=$id';
            </script>";
        }
    }
?>
    