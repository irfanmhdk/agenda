<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
    <style>
    table {
        position: absolute;
        left: 600px;
        top: 150px;
    
  }
  </style>
</head>
<body>
    <header>
        <div class="sidebar">
        <a class="active" href="beranda.php">Home</a>
        <a href="data_agenda">Data Agenda</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        </div>
</header>
<div class="content">
    <form action="simpan_agenda_guru.php" method="POST">
        <table >
            <tr>
                <td><label>Masukan Nisn</label></td>
                <td><input type="number" name="nis"></td>
            </tr>
            <tr>
            </tr>
            <tr>
                <a href="isi_agenda.php">  <td colspan="2"><input type="submit" name="submit" value="berikutnya"></td></a>
            </tr>
        </table>
    </form>
    </div>
    <?php
        if(isset($_POST['submit'])){
            header('location: isi_agenda.php');
        }
        ?>
</body>
</html>    