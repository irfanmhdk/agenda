<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){
        $role = $_POST['role'];
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        if($role == 1){
            $sql = "SELECT * FROM tb_user WHERE username='$uname'";
            $result = mysqli_query($Conn, $sql);

            foreach($result as $log){
                if($uname == $log['username'] && $psw == $log['password']){
                    echo "<script>
                            alert('Login Berhasil');
                            window.location.href='beranda3.php?id=$log[nip]';
                        </script>";
                        
                }else{
                    echo "<script>
                            alert('Login Gagal');
                            window.location.href='index.php';
                    </script>";
                }
            }
        }elseif($role == 2){
            $sql = "SELECT * FROM tb_guru WHERE nip='$uname'";
            $result = mysqli_query($Conn, $sql);

            foreach($result as $log){
                if($uname == $log['nip'] && $psw == $log['password']){
                    echo "<script>
                            alert('Login Berhasil');
                            window.location.href='beranda2.php?id=$log[nip]';
                        </script>";
                }else{
                    echo "<script>
                            alert('Login Gagal');
                            window.location.href='index.php';
                    </script>"; //a
                }
            }
        }elseif($role == 3){
            $sql = "SELECT * FROM tb_kelas WHERE username='$uname'";
            $result = mysqli_query($Conn, $sql);

            foreach($result as $log){
                if($uname == $log['username'] && $psw == $log['password']){
                    echo "<script>
                            alert('Login Berhasil');
                            window.location.href='beranda.php?id=$log[id_kelas]';
                        </script>";
                }else{
                    echo "<script>
                            alert('Login Gagal');
                            window.location.href='index.php';
                    </script>";
                }
            }
        }
    }elseif($role == 4){
        $sql = "SELECT * FROM tb_user WHERE username='$uname'";
        $result = mysqli_query($Conn, $sql);

        foreach($result as $log){
            if($uname == $log['username'] && $psw == $log['password']){
                echo "<script>
                        alert('Login Berhasil');
                        window.location.href='beranda4.php?id=$log[id_kelas]';
                    </script>";
            }else{
                echo "<script>
                        alert('Login Gagal');
                        window.location.href='index.php';
                </script>";
            }
        }
    }
    
?>