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

    $result = mysqli_query($Conn, "SELECT * FROM tb_kelas");

    $ResultsController = mysqli_query($Conn, "SELECT * FROM tb_kelas");

    // Get total number of rows
    $total_rows = mysqli_num_rows($result);

    // Set pagination variables
    $per_page = 10; // number of rows to display per page
    $cur_page = isset($_GET['page'])? $_GET['page'] : 1;
    $offset = ($cur_page - 1) * $per_page;

    // Query with LIMIT and OFFSET
    $query = "SELECT * FROM tb_kelas LIMIT $offset, $per_page";
    $result = mysqli_query($Conn, $query);

    // Display pagination links
    $total_pages = ceil($total_rows / $per_page);
    $limit = 5; // limit the number of page links
    $min_page = max(1, $cur_page - floor($limit / 2));
    $max_page = min($total_pages, $cur_page + floor($limit / 2));

    while ($d = mysqli_fetch_assoc($result)) {
        //... (rest of the table code remains the same)
    }
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
        padding: 7px 10px;
        margin: 8px 0;
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
    .pagination {
    text-align: center;
    margin: 20px 0;
    }

    .pagination a {
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-decoration: none;
        color: #337ab7;
    }

    .pagination a:hover {
        background-color: #f5f5f5;
        color: #23527c;
    }

    .pagination a.active {
        background-color: #337ab7;
        color: #fff;
    }
</style>
<body>
    <?php include "nav_a.php"; ?>
    <div class="head" style="display: inline-block;">
        <p style="margin-right: 10px;"><b>Admin</b></p>
    </div>
    <div class="content">
    <h1>MANAGE DATA KELAS</h1><hr>
    <table>
        <tr>
            <td><form action="s_data_kelas.php" method="POST"><input type="text" name="search" placeholder="Cari Nama Kelas...">
            <button class="btn1" name="submit"><i class="fa fa-search"></i></button></form></td>
            <td style="text-align:right;"><a href="input_data_kelas.php"><button class="btn1"><i class="fa fa-plus"></i> Tambah Data</button></a></td>
        </tr>
    </table>
    <?php
    echo "<div class='pagination'>";
    if ($cur_page > 1) {
        echo "<a href='?page=". ($cur_page - 1). "'>&lsaquo; Previous</a>";
    }
    for ($i = $min_page; $i <= $max_page; $i++) {
        if ($i == $cur_page) {
            echo "<a href='?page=$i' class='active'>$i</a> ";
        } else {
            echo "<a href='?page=$i'>$i</a> ";
        }
    }
    if ($cur_page < $total_pages) {
        echo "<a href='?page=". ($cur_page + 1). "'>Next &rsaquo;</a>";
    }
    echo "</div>";
    ?>
    <table style="box-shadow: 7px 7px 5px lightgrey;">
        <tr>
            <th>ID Kelas</th>
            <th>Kelas</th>
            <th>Opsi</th>
        </tr>
        <?php
        foreach($result as $d){ ?>
            <tr>
                <td><?= $d['id_kelas'] ?></td>
                <td><?= $d['nama_kelas'] ?></td>
                <td><a href="edit_data_kelas.php?id=<?= $d['id_kelas'] ?>"><button class="btn1" name="submit" style="font-size: 11px;background-color: #ffcc00;color: #000000;"><i class="fa fa-edit"> EDIT</i></button></a>
                <td><a href="hapus_data_kelas.php?id=<?= $d['id_kelas'] ?>"><button class="btn1" onclick="return confirm('Anda Akan Menghapus Data, Yakin?')" name="submit" style="font-size: 11px; background-color: #cc3300;"><i class="fa fa-trash"> HAPUS</i></button></form></td>
            </tr>
        <?php } ?>
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
</body>
</html>