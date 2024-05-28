<?php
// Sertakan file koneksi
include 'koneksi.php';

// Ambil data dari formulir

$materi = $_POST['ubah_materi'];
$id = $_POST['id'];
$nip = $_POST['nip'];

// Simpan data ke dalam tabel comments
$sql = "UPDATE tb_agenda SET materi = '$materi' WHERE id_agenda='$id';";
$result = mysqli_query($Conn, $sql );

if ($result) {
    echo "<script>
            alert('Berhasil Ubah Materi');
            window.location.href='verifikasi.php?id=$nip';
    </script>"; //a
} else {
    echo "Error: " . $sql . "<br>";
}
?>
