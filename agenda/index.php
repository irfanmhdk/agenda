<?php
    include 'koneksi.php';
    session_start();

    if (isset($_SESSION['login'])) {
      if($_SESSION['role'] == "1"){
        header("Location: beranda.php");
        exit();
      }elseif($_SESSION['role'] == "2"){
        header("Location: beranda2.php?id=$_SESSION[id_user]");
        exit();
      }elseif($_SESSION['role'] == "3"){
        header("Location: beranda.php?id=$_SESSION[id_user]");
        exit();
      }elseif($_SESSION['role'] == "4"){
        header("Location: kepsek_home.php");
        exit();
      }
    }
  
    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        $result = mysqli_query($Conn, "SELECT * FROM tb_user WHERE username='$uname'");

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($psw, $row['password'])){
                if($row['role'] == 1){

                            $_SESSION["login"] = true;
                            $_SESSION["role"] = $row['role'];

                            echo "<script>
                                    alert('Login Berhasil');
                                    window.location.href='beranda3.php';
                                </script>";
                            exit();

                }elseif($row['role'] == 2){

                            $_SESSION["login"] = true;
                            $_SESSION["role"] = $row['role'];
                            $_SESSION["id_user"] = $row['id_user'];

                            echo "<script>
                                    alert('Login Berhasil');
                                    window.location.href='beranda2.php?id=$row[id_user]';
                                </script>";
                            exit();

                }elseif($row['role'] == 3){

                            $_SESSION["login"] = true;
                            $_SESSION["role"] = $row['role'];
                            $_SESSION["id_user"] = $row['id_user'];

                            echo "<script>
                                    alert('Login Berhasil');
                                    window.location.href='beranda.php?id=$row[id_user]';
                                </script>";
                            exit();

                }elseif($row['role'] == 4){

                            $_SESSION["login"] = true;
                            $_SESSION["role"] = $row['role'];

                            echo "<script>
                                    alert('Login Berhasil');
                                    window.location.href='kepsek_home.php';
                                </script>";
                            exit();

                }
            }
        }else{
          echo "<script>
                  alert('Username atau Password salah');
                  window.location.href='index.php';
                </script>";
          exit();
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
    <img src="image/logo.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">

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