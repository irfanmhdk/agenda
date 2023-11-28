<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        $sql = "SELECT nip,password FROM tb_guru";
        $cek = mysqli_query($Conn, $sql);

        if($uname == a$cek['nip'] && $psw == $cek['password']){
                echo "<script>
                        alert('Login Berhasil');
                        window.location.href:data_agenda.php;
                    </script>";
        }
    }
?>