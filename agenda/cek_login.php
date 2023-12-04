<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        $sql = "SELECT * FROM tb_guru WHERE nip='$uname'";
        $result = mysqli_query($Conn, $sql);

        foreach($result as $log){
        if($uname == $log['nip'] && $psw == $log['password']){
            echo "<script>
                    alert('Login Berhasil');
                    window.location.href='beranda.php';
                </script>";
                //a
        }else{
            echo "<script>
                    alert('Login Gagal');
                    window.location.href='index.php';
            </script>";
        }
    }
    }
?>