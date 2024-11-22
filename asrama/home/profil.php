<?php
    include '../connect.php';
    include 'session_check.php';

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>asrama</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <style>
        <?php include 'assets/style.css';
        ?>
        /* Jika style dipisahkan */
        </style>
    </head>

    <body>
        <?php require 'assets/header.php'; ?>

        <!-- Konten lainnya -->
        <main>
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Profil Pengguna</div>
                    <p class="text-gray-700 text-base">NIM: <?php echo $_SESSION['nim']; ?></p>
                    <p class="text-gray-700 text-base">Nama: <?php echo $_SESSION['nama']; ?></p>
                    <p class="text-gray-700 text-base">Jurusan: <?php echo $_SESSION['jurusan_warga']; ?></p>
                    <p class="text-gray-700 text-base">Alamat: <?php echo $_SESSION['alamat_warga']; ?></p>
                    <p class="text-gray-700 text-base">Jenis Kelamin: <?php echo $_SESSION['jenis_kelamin_warga']; ?>
                    </p>
                    <p class="text-gray-700 text-base">No Kamar: <?php echo $_SESSION['no_kamar']; ?></p>
                </div>
            </div>
        </main>
    </body>

</html>