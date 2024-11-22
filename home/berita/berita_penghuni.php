<?php
// Simulasi daftar berita untuk penghuni
$daftarBeritaPenghuni = [
    ['id' => 1, 'judul' => 'Berita Penghuni 1', 'konten' => 'Isi berita penghuni 1'],
    ['id' => 2, 'judul' => 'Berita Penghuni 2', 'konten' => 'Isi berita penghuni 2']
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita untuk Penghuni</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Berita untuk Penghuni</h1>
        <ul class="list-group">
            <?php foreach ($daftarBeritaPenghuni as $berita) : ?>
                <li class="list-group-item">
                    <strong><?php echo $berita['judul']; ?></strong><br>
                    <?php echo $berita['konten']; ?>
                </li>
                <li>
                    <span><a href="komentar_penghuni.php">Beri Komentar</a></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
