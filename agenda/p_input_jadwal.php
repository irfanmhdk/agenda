<?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
        $kelas = $_POST['kelas'];
        $hari = $_POST['hari'];
        $mapel = $_POST['mapel'];
        $guru = $_POST['guru'];
        $jam1 = $_POST['jam'];
        $jam2 = $_POST['jam1'];
        $ruangan = $_POST['ruangan'];

        $query1 = "INSERT INTO tb_jadwal (id_kelas,hari,jam_masuk,jam_selesai,nip,id_mapel,ruangan)
        VALUE ('$kelas','$hari','$jam1','$jam2','$guru','$mapel','$ruangan')";
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