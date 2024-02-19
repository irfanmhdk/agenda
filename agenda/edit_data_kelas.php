<?php
    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }

    $id = $_GET['id'];

    $result = mysqli_query($Conn, "SELECT * FROM tb_kelas WHERE id_kelas = '$id'");

    while ($data = mysqli_fetch_array($result)) {
        $id_kelas= $data['id_kelas'];
        $nama = $data['nama_kelas'];
        $username = $data['username'];
        $pw = $data['password'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    table{
        background-color: #f1f1f1;
        padding: 10px 50px 10px 30px;
        border-radius: 3%;
    }
    input[type=text], input[type=password], select {
    width: 240px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    input[type=submit] {
    width: 100px;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }
    textarea {
    width: 240px;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
    }
</style>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="beranda3.php">Home</a>
            <a href="data_admin.php">Data Agenda</a>
            <a href="jadwal.php">Jadwal</a>
            <a href="manage_data_user.php">Manage Data User</a>
            <button class="dropdown-btn">Manage Data 
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="manage_data_guru.php">Data Guru</a>
                <a href="manage_data_mapel.php">Data Mata Pelajaran</a>
                <a href="manage_data_kelas.php">Data Kelas</a>
            </div>
            <a style="color: red;"href="logout.php"> log out</button></a>
        </div>
    </header>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
    <h1>EDIT DATA KELAS</h1><hr><br>
    <form action="update_data_kelas.php" method="POST">
        <table>
            <tr>
                <td>ID kelas</td>
                <td><input type="text" name="id_kelas" value="<?= $id_kelas ?>"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="text" name="kelas" value="<?= $nama ?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?= $username ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pw" value="<?= $pw ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="role" value="3"></td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
    <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
          dropdownContent.style.display = "block";
    }
      });
    }
  </script>
</body>
</html>