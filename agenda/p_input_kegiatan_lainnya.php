<?php
    include 'koneksi.php';
    if(isset($_POST['kirim'])){
        $kel = $_POST['kel'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $catatan = $_POST['catatan'];
        $jam1 = $_POST['jam_masuk'];
        $jam2 = $_POST['jam_selesai'];

        $query1 = "INSERT INTO tb_kegiatan_lain (id_kelas,jam_mulai,jam_selesai,tgl,judul_kegiatan,isi_kegiatan,catatan_kejadian)
        VALUES ('$kel','$jam1','$jam2',CURRENT_TIMESTAMP,'$judul','$isi','$catatan')";
        $proses = mysqli_query($Conn, $query1);

        if($proses){
            echo "<script>
                    alert('Berhasil Mengisi Data');
                    window.location.href='data_agenda.php?id=$kel';
                </script>"; //a
        }else{
            echo "<script>
                    alert('Gagal Mengisi Data');
                    window.location.href='p_input_kegiatan_lainnya.php';
                </script>";
        }
    }
?>