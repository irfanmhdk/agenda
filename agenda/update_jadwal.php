<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $kelas = $_POST['kelas'];
    $hari = $_POST['hari'];
    $mapel = $_POST['mapel'];
    $guru = $_POST['guru'];
    $jam1 = $_POST['jam'];
    $jam2 = $_POST['jam1'];
    $ruangan = $_POST['ruangan'];

    $result = mysqli_query($Conn, "UPDATE tb_jadwal SET id_kelas='$kelas', hari='$hari', id_mapel='$mapel',
              nip='$guru', jam_masuk='$jam1', jam_selesai='$jam2', ruangan='$ruangan' WHERE id_jadwal='$id'");
    if ($result) {
        echo "
        <script>
            alert('Data berhasil diedit');
            window.location.href='jadwal.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal diedit');
            window.location.href='edit_jadwal.php?id=$id';
        </script>";
    }
    
}
?>