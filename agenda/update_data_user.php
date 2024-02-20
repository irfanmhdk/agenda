<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){

        $i = $_POST['i'];
        $id = $_POST['id'];
        $user = $_POST['user'];
        $pw = $_POST['pw'];
        $role = $_POST['role'];

        $pw = password_hash($pw, PASSWORD_DEFAULT);

        $result = mysqli_query($Conn, "UPDATE tb_user SET id_user='$id', username='$user', password='$pw',
                                 role='$role' WHERE id_user='$i'");
        if ($result) {
            echo "
            <script>
                alert('Data berhasil diedit');
                window.location.href='manage_data_user.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diedit');
                window.location.href='edit_data_user.php?id=$i';
            </script>";
        }
    }
?>