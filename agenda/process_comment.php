<?php
// Sertakan file koneksi
include 'koneksi.php';

// Ambil data dari formulir

$comment = $_POST['comment'];
$id = $_POST['id'];
$nip = $_POST['nip'];

// Simpan data ke dalam tabel comments
$sql = "UPDATE tb_agenda SET comment = '$comment' WHERE id_agenda='$id';";
$result = mysqli_query($Conn, $sql );

if ($result) {
    echo "<script>
            alert('Berhasil comments');
            window.location.href='comment.php?nip=$nip&id=$id';
    </script>"; //a
} else {
    echo "Error: " . $sql . "<br>";
}
?>
