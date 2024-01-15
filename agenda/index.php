<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<center><h2>Login Agenda</h2></center>

<form action="cek_login.php" method="post">
  <div class="imgcontainer">
    <img src="image/logo.JPG" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Status</b></label><br>
    <select class="custom-select" name="role">
      <?php //a
        include 'koneksi.php';

        $sql = "SELECT * FROM tb_role";
        $proses = mysqli_query($Conn, $sql);

        foreach($proses as $role){
      ?>
        <option value="<?= $role['id_role']; ?>"><?= $role['nama_role']; ?></option>
      <?php
        }
      ?>
    </select><br>

    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname">

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw">
        
    <button type="submit" name="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
  <p>&copy; 2024 By <b>Fadhil</b> & <b>IM</b></p>
  </div>
</form>
</body>
</html>