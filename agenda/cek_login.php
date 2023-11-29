<?php
    include 'koneksi.php';

    $sql = "SELECT * FROM tb_guru";
    $result = mysqli_query($Conn, $sql);

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        foreach($result as $log){
        if($uname == $log['nip'] && $psw == $log['password']){
            echo "<script>
                    alert('Login Berhasil');
                    window.location.href='beranda.php';
                </script>";
        }else{
            echo "<script>
                    alert('Login Gagal');
                    window.location.href='login.php';
            </script>";
        }
    }
    }
?>