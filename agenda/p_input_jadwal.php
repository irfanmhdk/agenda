<?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
        $kelas = $_POST['kelas'];
        $hari = $_POST['hari'];
        $mapel = $_POST['mapel'];
        $guru = $_POST['guru'];
        $jam = $_POST['jam'];
        $ruangan = $_POST['ruangan'];

        $query1 = "INSERT INTO tb_jadwal (id_kelas,hari,jam,nip,id_mapel,ruangan)
        VALUE ('$kelas','$hari','$jam','$guru','$mapel','$ruangan')";
        $proses = mysqli_query($Conn, $query1);

        if($proses){
            echo "<script>
                    alert('Berhasil Mengisi Data');
                    window.location.href='jadwal.php';
                </script>"; //a
        }else{
            echo "<script>
                    alert('Gagal Mengisi Data');
                    window.location.href='input_jadwal.php';
                </script>";
        }
    }
?>