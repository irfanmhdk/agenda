<?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
        $nip = $_POST['nip'];
        $nama = $_POST['nama_guru'];
        $mapel = $_POST['mapel'];

        $sql = "INSERT INTO tb_guru (nip, nama_guru, id_mapel) VALUES 
                ('$nip','$nama','$mapel')";
        $insert = mysqli_query($Conn, $sql);

        if($insert){
            echo "<script>
                    alert('Berhasil Mengisi Data');
                    window.location.href='manage_data_guru.php';
                </script>"; //a
        }else{
            echo "<script>
                    alert('Gagal Mengisi Data');
                    window.location.href='input_data_guru.php';
                </script>";
        }
    }
?>