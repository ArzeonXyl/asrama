<?php
session_start();
require "../connect.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Gunakan password_hash untuk keamanan lebih baik
    echo $password;

    // Definisikan query untuk setiap tabel
    $cek_warga = "SELECT * FROM `warga_asrama` WHERE `nim_warga`='$username' AND `password_warga`='$password'";
    $cek_pengurus = "SELECT * FROM `pengurus` WHERE `nim_pengurus`='$username' AND `password_pengurus`='$password'";
    $cek_admin = "SELECT * FROM `admin` WHERE `id_admin`='$username' AND `password_admin`='$password'";

    // Periksa tabel warga_asrama
    $result_warga = mysqli_query($conn, $cek_warga);
    if (mysqli_num_rows($result_warga) > 0) {
        $row = mysqli_fetch_assoc($result_warga);

        // Set session untuk warga
        $_SESSION['nim'] = $row['nim_warga'];
        $_SESSION['nama'] = $row['nama_warga'];
        $_SESSION['jurusan_warga'] = $row['jurusan_warga'];
        $_SESSION['alamat_warga'] = $row['alamat_warga'];
        $_SESSION['jenis_kelamin_warga'] = $row['jenis_kelamin_warga'];
        $_SESSION['no_kamar'] = $row['no_kamar'];
        $_SESSION['role'] = 'warga';
        $_SESSION['logged_in'] = true;

        echo '<script>window.location.href= "../home/index.php"</script>';
        exit; // Stop eksekusi setelah login berhasil
    }

    // Periksa tabel pengurus
    $result_pengurus = mysqli_query($conn, $cek_pengurus);
    if (mysqli_num_rows($result_pengurus) > 0) {
        $row = mysqli_fetch_assoc($result_pengurus);

        // Set session untuk pengurus
        $_SESSION['nim_pengurus'] = $row['nim_pengurus'];
        $_SESSION['nama_pengurus'] = $row['nama_pengurus'];
        $_SESSION['jurusan_pengurus'] = 'jurusan_pengurus';
        $_SESSION['logged_in'] = true;

        echo '<script>window.location.href= "../dashboard/index.php"</script>';
        exit; // Stop eksekusi setelah login berhasil
    }

    // Periksa tabel admin
    $result_admin = mysqli_query($conn, $cek_admin);
    if (mysqli_num_rows($result_admin) > 0) {
        $row = mysqli_fetch_assoc($result_admin);

        // Set session untuk admin
        $_SESSION['username'] = $row['username_admin'];
        $_SESSION['nama_admin'] = $row['nama_admin'];
        $_SESSION['role'] = 'admin';
        $_SESSION['logged_in'] = true;

        echo '<script>window.location.href= "../admin/main/dashboard.php"</script>';
        exit; // Stop eksekusi setelah login berhasil
    }

    // Jika tidak ditemukan di ketiga tabel
    echo "<script>alert('Username atau password salah')</script>";
}

if (isset($_POST['register'])) {
    header('location:register_warga.php');
}
?>
