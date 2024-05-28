<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
</head>
<body>
    <header>
        <div class="sidebar">
            <a href="beranda.php"><center><img src="image/2cmi.png" style="width: 80px; padding: 5px;"></center></a>
            <hr  style="width: 90%;">
            <center><a href="#"><?= date("d F Y"); ?></a></center>
            <hr  style="width: 90%;">
            <a href="beranda2.php">Home</a>
            <button class="bt" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Change Password</button>
            <button class="dropdown-btn">Verifikasi Agenda
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="verifikasi.php">Agenda Hari Ini</a>
                <a href="verifikasi_semua.php">Agenda</a>
            </div>
            <a style="color: red;"href="logout.php"> log out</button></a>
        </div>
    </header>

    <div class="head">
          <?php
              foreach($k as $nama){ ?>
              <p style="margin-right: 10px;"><b><?= $nama['nama_guru'] ?></b></p>
            <?php
              }
          ?>
        </div>
        
    <div id="id01" class="modal">
    
    <form class="modal-content animate" action="ganti_pw_guru.php" method="post">
        
    <center>  <div class="imgcontainer">
        <img src="image/blank_profile.png" alt="Avatar" class="avatar" width="120px">
        </div></center>

        <div class="container">
        
        <label for="uname"><b>Username</b></label>
        <label><?= $nama['nama_guru']?></label>
    <br>
        <label for="psw"><b>Change Password</b></label>
        <input class="in" type="password" placeholder="New Password" name="psw" required>
        <input type="hidden"  value="<?= $nip ?>" name="id">
        <button class="bt" type="submit" name="submit">Change Password</button>
        <label>
        </label>
        </div>
        <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn bt">Cancel</button>
        </div>
    </form>
    </div>
    

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>