<?php
    include 'koneksi.php';
    if(isset($_POST['kirim'])){
        $status = $_POST['status'];
        $kehadiran = $_POST['kehadiran_guru'];
        $keterangan = $_POST['keterangan_guru'];
        $tanggal = $_POST['tanggal'];
        $jam_pemb = $_POST['jam_pembelajaran'];
        $nama = $_POST['nama_guru'];
        $mapel = $_POST['mapel'];
        $kelas = $_POST['kelas'];
        $durasi = $_POST['durasi'];
        $tujuan_pemb = $_POST['tujuan_pemb'];
        $materi = $_POST['materi'];
        $evaluasi= $_POST['evaluasi'];

        $query1 = "INSERT INTO tb_agenda (status_pengisi, tgl, jam_ke, nip, id_kelas, id_mapel, durasi, tujuan_pemb, materi, evaluasi) VALUE ('$status',CURRENT_TIMESTAMP, '$jam_pemb', '$nama', '$kelas',
                   '$mapel', '$durasi', '$tujuan_pemb', '$materi', '$evaluasi')";
        $proses = mysqli_query($Conn, $query1);

        if($proses){
            echo "<script>
                    alert('Berhasil Mengisi Agenda');
                    window.location.href:data_agenda.php;
                </script>";
        }else{
            echo "<script>
                    alert('Gagal Mengisi Agenda');
                    window.location.href:data_agenda.php;
                </script>";
        }
    }
?>