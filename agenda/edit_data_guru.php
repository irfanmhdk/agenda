<?php
    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }

    if ($_SESSION['role'] != "1") {
        header("Location: index.php");
        exit();
      }

    $id = $_GET['id'];

    $result = mysqli_query($Conn, "SELECT tb_guru.nip, tb_guru.nama_guru, tb_guru.id_mapel, tb_mapel.nama_mapel FROM tb_guru INNER JOIN
                            tb_mapel ON tb_guru.id_mapel = tb_mapel.id_mapel WHERE tb_guru.nip = '$id'");

    while ($data = mysqli_fetch_array($result)) {
        $nip = $data['nip'];
        $nama = $data['nama_guru'];
        $mata = $data['id_mapel'];
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
    <?php include "nav_a.php"; ?>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
    <h1>EDIT DATA GURU</h1><hr><br>
    <form action="update_data_guru.php" method="POST">
        <table>
            <tr>
                <td>NIP</td>
                <td><input type="text" name="nip" value="<?= $nip ?>"></td>
            </tr>
            <tr>
                <td>Nama Guru</td>
                <td><input type="text" name="nama_guru" value="<?= $nama ?>"></td>
            </tr>
            <tr>
                <td>Mata Pelajaran</td>
                <td><select name="mapel">
                    <?php
                        $sql = "SELECT * FROM tb_mapel";
                        $level = mysqli_query($Conn, $sql);
    
                        foreach ($level as $mapel){ ?>
                            <option value="<?= $mapel['id_mapel'] ?>" <?= $mapel['id_mapel'] == "$mata" ? "selected" : ""?>><?= $mapel['nama_mapel'] ?></option>
                        <?php
                            }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="hidden" name="id" value="<?= $id ?>"><input type="submit" name="submit" value="Submit"></td>
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