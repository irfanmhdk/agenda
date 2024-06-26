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

    $result = mysqli_query($Conn, "SELECT tb_guru.nip, tb_guru.nama_guru, tb_mapel.nama_mapel FROM tb_guru INNER JOIN
                            tb_mapel ON tb_guru.id_mapel = tb_mapel.id_mapel");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Siswa & Guru</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        color: black;
        text-align: left;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    .btn {
        width: auto;
        background-color: #4CAF50;
        color: white;
        padding: 18px 20px;
        margin: 16px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #3e8e41;
        color: white;
    }
    .btn1 {
        background-color: DodgerBlue;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .btn1:hover {
        background-color: RoyalBlue;
    }
    input[type=text] {
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
    .select-box {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            position: relative;
            display: inline-block;
            background-color: #fff;
        }

        .select-box select {
            width: 100%;
            padding: 5px;
            border: none;
            outline: none;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
        }

        .select-box::after {
            content: '\25BC';
            font-size: 12px;
            color: #555;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }
</style>
<body>
    <?php include "nav_a.php"; ?>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
    <h1>MANAGE DATA ABSEN</h1><hr>
    <table>
        <tr>
    <td><h2>Kelas :</td>
    <td><h2>Tanggal :</td>
    <td><h2>Bulan :</td>
    <td><h2>Keterangan :</h2></td>
    </tr>
        <form action="tampil_absen.php" method="POST">
     <tr>       
       
    
   
    <td>
        <div class="select-box">
            <?php
             $query = "SELECT * FROM tb_kelas";
             $result = mysqli_query($Conn, $query);
        if ($result) {
        ?>
        <select name="kelas">
            <?php
        while ($row = mysqli_fetch_assoc($result)) {
        
            echo '<option value="' . $row['id_kelas'] . '">' . $row['nama_kelas'] . '</option>';
        }
        echo '</select>';
        mysqli_free_result($result);
    } else {
        echo "Query failed: " . mysqli_error($Conn);
    }
    mysqli_close($Conn);
?>    </select>
 </div>
</td>

<td>
 <div class="select-box">
        <select name="Tanggal">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
    </div>
</td>

<td>
 <div class="select-box">
        <select name="bulan">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
    </div>
</td>

<td>
    <div class="select-box">
        <select name="berdasar">
        <option value="Keseluruhan">Keseluruhan</option>
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
            <option value="Alpha">Alpha</option>
        </select>
    </div> </td>
<td> <button class="btn1" name="submit"><i class="fa fa-search"></i></button></form></td>
        </tr>
        <table>
    </table>
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
  <?php
    exit();
  ?>
</body>
</html>