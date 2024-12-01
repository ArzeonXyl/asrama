<?php
    include "../template/head.php";
    include $_SERVER['DOCUMENT_ROOT'] . '/asrama/connect.php';
?>
<?php
    include  "../template/sidebar.php";
?>

<?php
    include  "../template/top-bar.php";
?>
<?php
// Cek apakah admin sudah login
if (!isset($_SESSION['nama_admin'])) {
    header("Location: ../../login/login_warga.php");
    exit;
}

$id_admin_login = $_SESSION['nama_admin'];

// Ambil data admin yang sedang login
$result = $conn->query("SELECT * FROM admin WHERE nama_admin = '$id_admin_login'");
$admin_login = $result->fetch_assoc();

// Inisialisasi variabel untuk notifikasi
$notification = "";

// Logika untuk menambah admin baru
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_admin'])) {
    $id_admin = $_POST['id_admin'];
    $nama_admin = $_POST['nama_admin'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $password_admin = password_hash($_POST['password_admin'], PASSWORD_DEFAULT);

    // Query untuk menambah data baru
    $sql_add = "INSERT INTO admin (id_admin, nama_admin, jenis_kelamin, password_admin) 
                VALUES ('$id_admin', '$nama_admin', '$jenis_kelamin', '$password_admin')";

    if ($conn->query($sql_add) === TRUE) {
        $notification = "Admin baru berhasil ditambahkan!";
    } else {
        $notification = "Gagal menambah admin: " . $conn->error;
    }
}

// Logika untuk memperbarui data admin yang sedang login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_admin'])) {
    $nama_admin = $_POST['nama_admin'];
    $password_admin = password_hash($_POST['password_admin'], PASSWORD_DEFAULT);

    // Query untuk memperbarui data
    $sql_update = "UPDATE admin SET 
                    nama_admin='$nama_admin', 
                    password_admin='$password_admin'
                    WHERE id_admin='$id_admin_login'";

    if ($conn->query($sql_update) === TRUE) {
        $notification = "Data berhasil diperbarui!";
    } else {
        $notification = "Gagal memperbarui data: " . $conn->error;
    }

    // Refresh data admin yang sedang login
    $result = $conn->query("SELECT * FROM admin WHERE id_admin = '$id_admin_login'");
    $admin_login = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        header {
            background-color: #004080;
            padding: 20px;
            color: white;
            text-align: center;
        }
        .container {
            width: 70%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #004080;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 16px;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn {
            background-color: #004080;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #FFC107;
        }
        .alert {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Profil Admin</h1>
    </header>
    <div class="container">
        <!-- Tampilkan notifikasi -->
        <?php if ($notification): ?>
            <div class="alert"><?php echo $notification; ?></div>
        <?php endif; ?>

        <!-- Informasi Admin yang sedang login -->
        <section>
            <div class="section-title">Informasi Admin</div>
            <p><strong>ID Admin:</strong> <?php echo $admin_login['id_admin']; ?></p>
            <p><strong>Nama Admin:</strong> <?php echo $admin_login['nama_admin']; ?></p>
        </section>

        <!-- Form untuk memperbarui data admin yang login -->
        <section>
            <div class="section-title">Perbarui Data Diri</div>
            <form action="" method="POST">
                <input type="hidden" name="update_admin" value="1">
                <div class="form-group">
                    <label for="nama_admin">Nama Lengkap</label>
                    <input type="text" id="nama_admin" name="nama_admin" value="<?php echo $admin_login['nama_admin']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password_admin">Password Baru</label>
                    <input type="password" id="password_admin" name="password_admin" placeholder="Password baru" required>
                </div>
                <button type="submit" class="btn">Perbarui Data</button>
            </form>
        </section>

        <!-- Form untuk menambah admin baru -->
        <section>
            <div class="section-title">Tambah Admin Baru</div>
            <form action="" method="POST">
                <input type="hidden" name="add_admin" value="1">
                <div class="form-group">
                    <label for="id_admin">ID Admin</label>
                    <input type="text" id="id_admin" name="id_admin" placeholder="Masukkan ID Admin" required>
                </div>
                <div class="form-group">
                    <label for="nama_admin">Nama Lengkap</label>
                    <input type="text" id="nama_admin" name="nama_admin" placeholder="Nama lengkap" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password_admin">Password</label>
                    <input type="password" id="password_admin" name="password_admin" placeholder="Password" required>
                </div>
                <button type="submit" class="btn">Tambah Admin</button>
            </form>
        </section>
    </div>
</body>
</html>
<?php include "../template/script.php";?>
<?php include "../template/footer.php";?>