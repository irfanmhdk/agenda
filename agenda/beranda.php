<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 2 Cimahi</title>
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
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}
.btn1 {
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}
.container .btn:hover {
  background-color: black;
}
.postion1{
  position: fixed;
  bottom: 270px;
  right: 520px;
  width: 300px;
}
        </style>
</head>
<body>
    <header>
        <div class="sidebar">
        <a class="active" href="beranda.php">Home</a>
        <a href="data_agenda.php">Data Agenda</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        </div>
        <div class="container">
         <img src="smkn2.jpg" alt="Snow" style="width:100%">
         <a href="tampil_agenda.php"> <button class="btn">Lihat Agenda</button></a>
         <a href="isi_agenda.php"> <button class="btn1">Isi Agenda</button></a>
        </div>
    </header>
</body>
</html>