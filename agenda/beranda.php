<?php
    include 'koneksi.php';
    session_start();
 
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit();
    }

    if ($_SESSION['role'] != "3") {
      header("Location: index.php");
      exit();
    }

    $kelas = $_SESSION["id_user"];

    $sql = "SELECT * FROM tb_kelas WHERE id_kelas='$kelas'";
    $k = mysqli_query($Conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="navbar.css">
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
  top: 20%;
  left: 25%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background: #026C09;
  color: white;
  font-size: 16px;
  padding: 14px 12px ;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: left;
  width: 250px;
  height: 100px;
}

.btn1 {
  position: absolute;
  top: 20%;
  left: 45%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background: #026C09;
  color: white;
  font-size: 16px;
  padding: 14px 12px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: left;
  width: 250px;
  height: 100px;
}
.container .btn:hover {
  background-color: #026C09;
}
.btn2 {
  position: absolute;
  top: 40%;
  left: 25%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background: #026C09;
  color: white;
  font-size: 16px;
  padding: 14px 12px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: left;
  width: 250px;
  height: 100px;
}
.btn3 {
  position: absolute;
  top: 60%;
  left:  25%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background: #026C09;
  color: white;
  font-size: 16px;
  padding: 14px 12px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: left;
  width: 250px;
  height: 100px;
}
  .container .btn1:hover {
    background-color: #026C09;
  }
  .container .btn2:hover {
    background-color: #026C09;
  }
  .container .btn3:hover {
    background-color: #026C09;
  }

        </style>
</head>
<body>
  <?php include "nav_s.php"; ?>
        <div class="container">
         <img src="smkn2.jpg" alt="Snow" style="width:100%">
         <a href="tampil_agenda.php?id=<?= $kelas ?>"> <button class="btn">Lihat Agenda</button></a>
         <a href="data_agenda.php?id=<?= $kelas ?>"> <button class="btn1">Isi Agenda</button></a>
         <a href="absensi.php?id=<?= $kelas ?>"> <button class="btn2">Isi Absensi</button></a>
         <a href="logout.php"> <button class="btn3">log out</button></a>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="ganti_pw_kelas.php" method="post">
    
  <center>  <div class="imgcontainer">
      <img src="image/blank_profile.png" alt="Avatar" class="avatar" width="120px">
    </div></center>

    <div class="container">
      
      <label for="uname"><b>Username</b></label>
      <label><?= $nama['nama_kelas']?></label>
<br>
      <label for="psw"><b>Change Password</b></label>
      <input class="in" type="password" placeholder="New Password" name="psw" required>
      <input type="hidden"  value="<?= $kelas ?>" name="id">
      <button type="submit" name="submit">Change Password</button>
      <label>
      </label>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

        </div>
    <div class="footer">
        <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
    </div>
</body>
</html>