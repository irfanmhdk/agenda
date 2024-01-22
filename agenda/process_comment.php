<?php
// Sertakan file koneksi
include 'koneksi.php';

// Ambil data dari formulir

$comment = $_POST['comment'];

// Simpan data ke dalam tabel comments
$sql = "INSERT INTO comments (comment_text) VALUES ('$comment')";

if ($Conn->query($sql) === TRUE) {
    echo "<script>
    alert('Berhasil comments');
    window.location.href='verifikasi.php?id=$nip';
</script>"; //a
} else {
    echo "Error: " . $sql . "<br>";
}

// Tutup koneksi database
$Conn->close();
?>
