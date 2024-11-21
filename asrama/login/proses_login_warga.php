<?php
    session_start();
    require "../connect.php";
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password=md5($_POST['password']);
        echo $password;
        $cek = "SELECT * FROM `warga_asrama` WHERE `nim_warga`='$username' AND `password_warga`='$password'";
        $result = mysqli_query($conn, $cek);
        if (mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['nim']= $row['nim_warga'];
            $_SESSION['nama']= $row['nama_warga'];
            $_SESSION['jurusan_warga']= $row['jurusan_warga'];
            $_SESSION['alamat_warga']= $row['alamat_warga'];
            $_SESSION['jenis_kelamin_warga']= $row['jenis_kelamin_warga'];
            $_SESSION['no_kamar']= $row['no_kamar'];
            $_SESSION['logged_in']= true;
            echo '<script>window.location.href= "../home/index.php"</script>';
        }else{
            echo "<script>alert('username atau password salah')</script>";
            // header('location:login_warga.php');
        }
    }
    if (isset($_POST['register'])) {
       header('location:register_warga.php');
    }
?>