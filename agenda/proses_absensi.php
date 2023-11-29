<?php
include("koneksi.php");

// Ambil data dari formulir absensi
$siswa_id = $_POST['siswa_id'];
$status_absensi = $_POST['status_absensi'];
$tanggal = date("Y-m-d");  // Ambil tanggal saat ini

// Masukkan data absensi ke database
$query = "INSERT INTO tb_absensi (nis, tanggal, tanggal) VALUES ('$siswa_id', '$status_absensi', '$tanggal')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "Absensi berhasil dicatat.";
} else {
    echo "Gagal mencatat absensi. Error: " . mysqli_error($koneksi);
}

// Tutup koneksi database
mysqli_close($koneksi);
?>