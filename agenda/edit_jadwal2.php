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

    $i = $_GET['id'];

    $sql1 = "SELECT tb_jadwal.id_jadwal, tb_jadwal.id_mapel, tb_jadwal.id_kelas, tb_jadwal.nip, tb_kelas.nama_kelas, tb_jadwal.hari, tb_jadwal.jam_masuk, tb_jadwal.jam_selesai, tb_guru.nama_guru, 
             tb_mapel.nama_mapel, tb_jadwal.hari, tb_jadwal.ruangan FROM tb_jadwal INNER JOIN tb_kelas ON tb_jadwal.id_kelas=tb_kelas.id_kelas INNER JOIN 
             tb_guru ON tb_jadwal.nip=tb_guru.nip INNER JOIN tb_mapel ON tb_jadwal.id_mapel = tb_mapel.id_mapel WHERE tb_jadwal.id_jadwal = '$i'";
    $proses = mysqli_query($Conn, $sql1);
    
    while ($data = mysqli_fetch_array($proses)) {
        $jm = $data['jam_masuk'];
        $js = $data['jam_selesai'];
        $r = $data['ruangan'];
        $n = $data['nip'];
    }

    if(isset($_POST['berikut'])){
        $kelas = $_POST['kelas'];
        $hari = $_POST['hari'];
        $mapel = $_POST['mapel'];

        $sql = "SELECT * FROM tb_guru WHERE id_mapel='$mapel'";
        $guru = mysqli_query($Conn, $sql);
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
<header>
    <div class="sidebar">
        <a href="beranda3.php"><center><img src="image/2cmi.PNG" style="width: 80px; padding: 5px;"></center></a>
        <hr  style="width: 90%;">
        <center><a href="#"><?= date("d F Y"); ?></a></center>
        <hr  style="width: 90%;">
        <a href="beranda3.php">Home</a>
        <a href="guru_admin.php">Data Agenda</a>
        <a href="kegiatan_admin.php">Kegiatan Lainnya</a>
        <a class="active" href="jadwal.php">Jadwal</a>
        <a href="manage_data_user.php">Manage Data User</a>
        <button class="dropdown-btn">Manage Data 
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="manage_data_guru.php">Data Guru</a>
                <a href="manage_data_mapel.php">Data Mata Pelajaran</a>
                <a href="manage_data_kelas.php">Data Kelas</a>
            </div>
        <a style="color: red;"href="logout.php"> log out</button></a>
    </div>
    </header>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
    <h1>EDIT JADWAL</h1><hr><br>
        <form action="update_jadwal.php" method="POST">
            <table>
                <tr>
                    <td colspan="2"><b>Jam Pembelajaran</b></td>
                </tr>
                <tr>
                    <td><label>Jam Masuk</label></td>
                    <td><select name="jam">
                        <option value="07.00">07.00</option>
                        <option value="07.45">07.45</option>
                        <option value="08.30">08.30</option>
                        <option value="09.15">09.15</option>
                        <option value="10.15">10.15</option>
                        <option value="10.55">10.55</option>
                        <option value="11.30">11.30</option>
                        <option value="13.00">13.00</option>
                        <option value="13.40">13.40</option>
                        <option value="14.20">14.20</option>
                        <option value="15.00">15.00</option>
                        <option value="15.30">15.30</option>
                        <option value="16.00">16.00</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label>Jam Selesai</label></td>
                    <td><select name="jam1">
                        <option value="07.45">07.45</option>
                        <option value="08.30">08.30</option>
                        <option value="09.15">09.15</option>
                        <option value="10.15">10.15</option>
                        <option value="10.55">10.55</option>
                        <option value="11.30">11.30</option>
                        <option value="13.00">13.00</option>
                        <option value="13.40">13.40</option>
                        <option value="14.20">14.20</option>
                        <option value="15.00">15.00</option>
                        <option value="15.30">15.30</option>
                        <option value="16.00">16.00</option>
                    </select></td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td>Guru</td>
                    <td><select name="guru">
                    <?php
                        foreach($guru as $g){ ?>
                                <option value="<?= $g['nip'] ?>" <?= $g['nip'] == $n ? "selected" : ""?>><?= $g['nama_guru'] ?></option>
                    <?php
                        }
                    ?>
                    </select></td>
                </tr>
                <tr>
                    <td>Ruangan</td>
                    <td><input type="text" name="ruangan" value=<?php echo $r; ?>></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="kelas" value="<?= $kelas ?>">
                        <input type="hidden" name="hari" value="<?= $hari ?>">
                        <input type="hidden" name="mapel" value="<?= $mapel ?>">
                        <input type="hidden" name="id" value="<?= $i ?>">
                        <input type="submit" name="update" value="Update">
                    </td>
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