<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #d4d4d4;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #dddddd;
    }
</style>
<body>
    <header>
        <div class="sidebar">
        <a href="beranda.php">Home</a>
        <a class="active" href="data_agenda.php">Data Agenda</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        </div>
    </header>
    <div class="content">
        <h1>DATA AGENDA</h1>
    <form action="isi_agenda_guru.php" method="POST">
        <table>
            <tr>
                <th colspan="4"><b>Hari : Senin | Tanggal : 29-11-2023</b></th>
            </tr>
            <tr>
                <th>Jam Pembelajaran</th>
                <th>Guru</th>
                <th>Mata Pelajaran</th>
                <th>Isi Agenda</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Yanto</td>
                <td>Bahasa Sunda</td>
                <td><a href="isi_agenda.php" style="text-decoration: none;"><b>Isi Agenda</b></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Lili</td>
                <td>Matematika</td>
                <td><a href="isi_agenda.php" style="text-decoration: none;"><b>Isi Agenda</b></a></td>
            </tr>
        </table>
    </form>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $status = $_POST['status'];
            if($status == "guru"){
                header('location: isi_agenda_guru.php');
            }else{
                header('location: isi_agenda.php');
            }
        }
    ?>
</body>
</html>