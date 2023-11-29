<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        $sql = "SELECT * FROM tb_guru";
        $result = mysqli_fetch_array($Conn, $sql);

        if($result['nip'] == $uname && $result['password'] == $psw){
                "<script>
                    alert('Login Berhasil');
                    window.location.href='data_agenda.php';
                </script>";
        }else{
            echo "<script>
                    alert('Login Gagal');
                    window.location.href='login.php';
            </script>";
        }
    }
?>