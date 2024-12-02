<?php
require "../../connect.php";

// Penanganan penambahan komentar
if (isset($_POST['tambah_komentar'])) {
    $nama = $mysqli->real_escape_string($_POST['nama']);
    $komentar = $mysqli->real_escape_string($_POST['komentar']);
    $id_berita = isset($_POST['id_berita']) ? (int)$_POST['id_berita'] : 1; // Default ke ID berita 1 jika tidak disediakan

    $query = "INSERT INTO komentar (isi_komentar, id_berita) VALUES ('$komentar', '$id_berita')";
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
$result = $mysqli->query($query);
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
    <title>Komentar Penghuni</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Komentar Penghuni</h1>

        <!-- Formulir untuk menambah komentar -->
        <form method="POST" class="mb-4">
            <input type="hidden" name="id_berita" value="1"> <!-- Ganti dengan ID berita sesuai -->
            <div class="mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama Penghuni" required>
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
                    <strong>ID Berita:</strong> <?php echo $komentar['id_berita']; ?> | 
                    <?php echo $komentar['isi_komentar']; ?>
                    <a href="?hapus_komentar_id=<?php echo $komentar['id_komentar']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
