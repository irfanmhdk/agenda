<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<center><h2>Login Agenda</h2></center>

<form action="cek_login.php" method="post">
  <div class="imgcontainer">
    <img src="image/avatar.PNG" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Status</b></label><br>
    <select class="custom-select" name="role">
      <?php
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
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</body>
</html>