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
    input[type=text], select {
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
    input[type=date] {
    width: 200px;
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
    <h1>TAMBAH JADWAL</h1><hr><br>
    <form action="input_jadwal2.php" method="POST">
        <table>
            <tr>
                <td>Kelas</td>
                <td>
                <Select name="kelas">
                <?php
                    $sql = "SELECT * FROM tb_kelas";
                    $level = mysqli_query($Conn, $sql);

                    foreach ($level as $kelas){ ?>
                        <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                    <?php
                        }
                    ?>
                </Select>
                </td>
            </tr>
            <tr>
                <td>Hari</td>
                <td><select name="hari">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                </select></td>
            </tr>
            <tr>
                <td>Mata Pelajaran</td>
                <td><select name="mapel">
                    <?php
                        $sql = "SELECT * FROM tb_mapel";
                        $level = mysqli_query($Conn, $sql);
    
                        foreach ($level as $mapel){ ?>
                            <option value="<?= $mapel['id_mapel'] ?>"><?= $mapel['nama_mapel'] ?></option>
                        <?php
                            }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="berikut" value="Berikutnya"></td>
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