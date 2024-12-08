<?php
require "../connect.php";
require "assets/header.php"; 

$role = $_SESSION['role']; // Ubah menjadi "admin" jika admin login
$nama_warga = $_SESSION['nama']; // Nama pengguna yang sedang login
$nim_warga = $_SESSION['nim']; // Nim pengguna yang sedang login

// Penanganan penambahan komentar
if (isset($_POST['tambah_komentar'])) {
    $nim_warga = mysqli_real_escape_string($conn, $_SESSION['nim']);
    $komentar = mysqli_real_escape_string($_POST['komentar']);
    $id_berita = isset($_POST['id_berita']) ? (int)$_POST['id_berita'] : 1;

    // Query insert yang benar
    $query = "INSERT INTO komentar (nim_warga, isi_komentar, id_berita) VALUES ('$nim_warga', '$komentar', '$id_berita')";
    if ($mysqli->query($query)) {
        echo "<div class='alert alert-success'>Komentar berhasil ditambahkan!</div>";
    } else {
        echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $mysqli->error . "</div>";
    }
}

// Penanganan penghapusan komentar
if (isset($_GET['hapus_komentar_id'])) {
    $hapusId = (int)$_GET['hapus_komentar_id'];
    $query = "DELETE FROM komentar WHERE id_komentar = $hapusId";
    if ($mysqli->query($query)) {
        echo "<div class='alert alert-success'>Komentar berhasil dihapus!</div>";
    } else {
        echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $mysqli->error . "</div>";
    }
}

// Ambil data komentar dari database
$komentarPenghuni = [];
$query = "SELECT * FROM komentar ORDER BY id_komentar DESC";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $komentarPenghuni[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asrama</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
    <?php include 'assets/style.css'; ?>
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Komentar Penghuni</h1>

        <!-- Formulir untuk menambah komentar -->
        <form method="POST" class="mb-4">
            <input type="hidden" name="id_berita" value="1"> <!-- Ganti dengan ID berita sesuai -->
            <div class="mb-3">
                <input type="text" name="nim_warga" class="form-control" value="<?php echo $nim_warga; ?>" readonly>
            </div>
            <div class="mb-3">
                <textarea name="komentar" class="form-control" placeholder="Komentar" required></textarea>
            </div>
            <button type="submit" name="tambah_komentar" class="btn btn-primary">Tambah Komentar</button>
        </form>

        <h2>Daftar Komentar</h2>
        <ul class="list-group">
            <?php foreach ($komentarPenghuni as $komentar) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?php echo $nama_warga; ?></strong> : 
                        <?php echo htmlspecialchars($komentar['isi_komentar']); ?>
                    </div>
                    <div>
                        <?php if ($_SESSION['role'] === 'admin' || $_SESSION['nim'] || $komentar['nim']) : ?>
                            <a href="edit_komentar.php?edit_komentar_id=<?php echo $komentar['id_komentar']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="?hapus_komentar_id=<?php echo $komentar['id_komentar']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    include "assets/footer.php"
?>