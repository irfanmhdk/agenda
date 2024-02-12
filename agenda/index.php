<?php
    include 'koneksi.php';
    session_start();
    
    if(isset($_POST['submit'])){
        $role = $_POST['role'];
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        if($role == 1){
            $sql = "SELECT * FROM tb_user WHERE username='$uname' AND password='$psw'";
            $result = mysqli_query($Conn, $sql);

            if ($result->num_rows > 0) {
              $row = mysqli_fetch_assoc($result);
              $_SESSION['login'] = $row['username'];
              header("Location: beranda3.php?id=$row[role]");
              exit();
            } else {
                echo "<script>alert('username atau password Anda salah. Silakan coba lagi!')</script>";
            }
        }elseif($role == 2){
            $sql = "SELECT * FROM tb_guru WHERE nip='$uname' AND password='$psw'";
            $result = mysqli_query($Conn, $sql);

            if ($result->num_rows > 0) {
              $row = mysqli_fetch_assoc($result);
              $_SESSION['login'] = $row['nip'];
              header("Location: beranda2.php?id=$row[nip]");
              exit();
            } else {
                echo "<script>alert('username atau password Anda salah. Silakan coba lagi!')</script>";
            }
        }elseif($role == 3){
            $sql = "SELECT * FROM tb_kelas WHERE username='$uname' AND password='$psw'";
            $result = mysqli_query($Conn, $sql);

            if ($result->num_rows > 0) {
              $row = mysqli_fetch_assoc($result);
              $_SESSION['login'] = $row['id_kelas'];
              header("Location: beranda.php?id=$row[id_kelas]");
              exit();
            } else {
                echo "<script>alert('username atau password Anda salah. Silakan coba lagi!')</script>";
            }
        }elseif($role == 4){
            $sql = "SELECT * FROM tb_user WHERE role='$role'";
            $result = mysqli_query($Conn, $sql);
    
            if ($result->num_rows > 0) {
              $row = mysqli_fetch_assoc($result);
              $_SESSION['login'] = $row['id_kelas'];
              header("Location: kepsek_home.php");
              exit();
            } else {
                echo "<script>alert('username atau password Anda salah. Silakan coba lagi!')</script>";
            }
    }
    }
    
?>
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

<form action="index.php" method="POST">
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