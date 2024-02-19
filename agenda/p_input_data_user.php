<?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
        $id_user = $_POST['id_user'];
        $user = $_POST['user'];
        $pw = $_POST['pw'];
        $role = $_POST['role'];

        $pw = password_hash($pw, PASSWORD_DEFAULT);

        $sql = "INSERT INTO tb_user (id_user, username, password, role) VALUES 
                ('$id_user','$user','$pw','$role')";
        $insert = mysqli_query($Conn, $sql);

        if($insert){
            echo "<script>
                    alert('Berhasil Mengisi Data');
                    window.location.href='manage_data_user.php';
                </script>";
        }else{
            echo "<script>
                    alert('Gagal Mengisi Data');
                    window.location.href='input_data_user.php';
                </script>";
        }
    }
?>