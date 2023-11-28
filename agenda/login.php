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
    <label>Login Sebagai</label>
    <select name="status">
        <option value="kelas">Siswa</option>
        <option value="guru">Guru</option>
        <option value="guru">Admin</option>
    </select>

    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
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