<!DOCTYPE html>
<html lang="en">
<?php
    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }
    if ($_SESSION['role'] != "2") {
      header("Location: index.php");
      exit();
    }

    $nip = $_SESSION["id_user"];

    $sql1 = "SELECT * FROM tb_guru WHERE nip='$nip'";
    $k = mysqli_query($Conn,$sql1);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda  Guru SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    <style>
  .container {
    position: relative;
    width: 100%;
    max-width: 400px;
  }

  .container img {
    width: 100%;
    height: auto;
  }

  .container .btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #555;
    color: white;
    font-size: 16px;
    padding: 12px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
    width: 250px;
  }
  .btn1 {
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #555;
    color: white;
    font-size: 16px;
    padding: 12px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
    width: 250px;
  }
  .container .btn:hover {
    background-color: black;
  }
  .container .btn1:hover {
    background-color: black;
  }
  .btn2 {
    position: absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #555;
    color: white;
    font-size: 16px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
  }
</style>
</head>
<body>
  <?php include "nav_g.php"; ?>
        <div class="container">
         <img src="image/smk2.jpg" alt="Snow" style="width:100%">
         <a href="verifikasi.php?id=<?= $nip ?>"> <button class="btn">Verifikasi Agenda Siswa</button></a>
        </div>

    </header>
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