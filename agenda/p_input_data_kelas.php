<?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
        $id_kelas = $_POST['id_kelas'];
        $kelas = $_POST['kelas'];

        $sql = "INSERT INTO tb_kelas (id_kelas, nama_kelas) VALUES 
                ('$id_kelas','$kelas')";
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