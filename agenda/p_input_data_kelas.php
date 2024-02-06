<?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
        $id_kelas = $_POST['id_kelas'];
        $kelas = $_POST['kelas'];
        $username = $_POST['username'];
        $pw = $_POST['pw'];
        $role = $_POST['role'];

        $sql = "INSERT INTO tb_kelas (id_kelas, nama_kelas, username, password, role) VALUES 
                ('$id_kelas','$kelas','$username','$pw','$role')";
        $insert = mysqli_query($Conn, $sql);

        if($insert){
            echo "<script>
                    alert('Berhasil Mengisi Data');
                    window.location.href='manage_data_kelas.php';
                </script>"; //a
        }else{
            echo "<script>
                    alert('Gagal Mengisi Data');
                    window.location.href='input_data_kelas.php';
                </script>";
        }
    }
?>