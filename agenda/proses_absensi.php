<?php
include("koneksi.php");

if (isset($_POST['kirim'])) {
    $kehadiran = $_POST['kehadiran'];

    foreach ($kehadiran as $nis => $status_absensi) {
        $nis = mysqli_real_escape_string($Conn, $nis);
        $status_absensi = mysqli_real_escape_string($Conn, $status_absensi);
        $tanggal = date("Y-m-d");

        $query = "INSERT INTO tb_absen (tanggal, nis, kehadiran) VALUES (CURRENT_TIMESTAMP, '$nis', '$status_absensi')";
        $result = mysqli_query($Conn, $query);

        if (!$result) {
            echo "Gagal mencatat absensi untuk NISN $nis. Error: " . mysqli_error($Conn);
            break;
        }
    }

    if ($result) {
    ?>
            <video id="myvideo"width="100%" height="100%" controls autoplay>
            <source src="image/TickRed.mp4" type="video/mp4">
            </video>
            <script>
            document.getElementById("myVideo").play();
            </script>
    <?php
    } else {
        echo "Gagal mencatat absensi. Error: " . mysqli_error($Conn);
    }
} else {
    echo "Tidak ada data yang dikirimkan.";
}

mysqli_close($Conn);
?>