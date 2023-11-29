<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        $sql = "SELECT * FROM tb_guru WHERE nip='$uname' AND password='$psw'";
        $result = $Conn->query($sql);

        if($result->num_rows > 0){
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