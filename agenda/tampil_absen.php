<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

if(isset($_POST['submit'])){

    $search = $_POST['search'];

    $result = mysqli_query($Conn, "SELECT * From tb_siswa LIKE '%$search%'");
}
