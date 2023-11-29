<?php
include("koneksi.php");

if (isset($_POST['kirim'])) {
    $kehadiran = $_POST['kehadiran'];

    foreach ($kehadiran as $nis => $status_absensi) {
        $nis = mysqli_real_escape_string($Conn, $nis);
        $status_absensi = mysqli_real_escape_string($Conn, $status_absensi);
        $tanggal = date("Y-m-d");

        $query = "INSERT INTO tb_absen (tanggal, nis, kehadiran) VALUES ('$tanggal', '$nis', '$status_absensi')";
        $result = mysqli_query($Conn, $query);

        if (!$result) {
            echo "Gagal mencatat absensi untuk NISN $nis. Error: " . mysqli_error($Conn);
            break;
        }
    }

    if ($result) {
        echo "Absensi berhasil dicatat.";
    } else {
        echo "Gagal mencatat absensi. Error: " . mysqli_error($Conn);
    }
} else {
    echo "Tidak ada data yang dikirimkan.";
}

mysqli_close($Conn);
?>