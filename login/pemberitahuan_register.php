<?php
session_start();
include '../connect.php';

// Pastikan ada data di session['pendaftaran']
if (isset($_SESSION['pendaftaran']) && count($_SESSION['pendaftaran']) > 0) {
    $pendaftaran = $_SESSION['pendaftaran'][count($_SESSION['pendaftaran']) - 1]; // Mengambil data pendaftaran terakhir
} else {
    $pendaftaran = null; // Jika tidak ada data pendaftaran
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberitahuan Pendaftaran</title>
    <!-- Menggunakan Bootstrap dan Tailwind untuk styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-center text-primary">Pendaftaran Berhasil</h2>
                <?php if ($pendaftaran): ?>
                    <p>Nama: <?= htmlspecialchars($pendaftaran['nama']) ?></p>
                    <p>NIM: <?= htmlspecialchars($pendaftaran['NIM']) ?></p>
                    <p>Anda telah berhasil terdaftar dan sedang menunggu persetujuan admin.</p>
                    <p class="text-warning">Harap melakukan pembayaran untuk melanjutkan proses pendaftaran jika sudah disetujio oleh admin.</p>
                <?php else: ?>
                    <p class="text-danger">Data pendaftaran tidak ditemukan.</p>
                <?php endif; ?>
                <div class="text-center">
                    <a href="login_warga.php" class="btn btn-primary">Kembali ke Login</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
