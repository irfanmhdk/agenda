<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="navbar.css">
</head>
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
    <form action="isi_agenda_guru.php" method="POST">
        <table>
            <tr>
                <td><label>E-Mail</label></td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Status Pengisi</td>
                <td><select name="status">
                    <option value="guru">Guru</option>
                    <option value="siswa">Siswa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="berikutnya"></td>
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