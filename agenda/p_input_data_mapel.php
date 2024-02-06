<?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
        $id_mapel = $_POST['id_mapel'];
        $mapel = $_POST['mapel'];

        $sql = "INSERT INTO tb_mapel (id_mapel, nama_mapel) VALUES 
                ('$id_mapel','$mapel')";
        $insert = mysqli_query($Conn, $sql);

        if($insert){
            echo "<script>
                    alert('Berhasil Mengisi Data');
                    window.location.href='manage_data_mapel.php';
                </script>"; //a
        }else{
            echo "<script>
                    alert('Gagal Mengisi Data');
                    window.location.href='input_data_mapel.php';
                </script>";
        }
    }
?>