<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan server MySQL Anda
$username = "root";        // Ganti dengan username MySQL Anda
$password = "";            // Ganti dengan password MySQL Anda
$dbname = "asrama";        // Nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data fasilitas dari database
$sql = "SELECT * FROM fasilitas";
$result = $conn->query($sql);

// Memeriksa apakah ada data
if ($result->num_rows > 0) {
    $fasilitas = [];
    while($row = $result->fetch_assoc()) {
        $fasilitas[] = $row;
    }
} else {
    $fasilitas = [];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas Asrama</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Link ke Font Awesome -->
    <style>
        <?php include './assets/style.css';?>

        header h1 {
            font-size: 28px;
            margin: 0;
            color: #f9f9f9;
            padding-right: 40px; /* Memberi ruang untuk ikon notifikasi */
        }

        .notification-icon {
            position: absolute;
            right: 20px;
            cursor: pointer;
            font-size: 24px;
            color: #f9f9f9;
            transition: color 0.3s ease;
        }

        .notification-icon:hover {
            color: #FFC107;
        }

        .underline {
            width: 100px;
            height: 4px;
            background-color: #FFC107;
            margin: 10px auto;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .grid-item {
            width: 180px;
            height: 330px;
            perspective: 1000px;
            padding: 50px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 250px;
            height: 310px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.5s;
        }

        .grid-item:hover .card {
            transform: rotateY(180deg); /* Membalik kartu */
        }

        .front, .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
        }

        .front {
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .back {
            background-color: #004080;
            color: white;
            transform: rotateY(180deg);
            font-size: 14px;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .name {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #004080;
        }

        .description {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
            text-align: center;
            padding: 0 10px;
        }

        footer {
            margin-top: 40px;
            padding: 10px;
            background-color: #004080;
            color: white;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php require './assets/header.php';?>
    <header>
        <h1>Fasilitas Asrama</h1>
        <a href="notifikasi.php">
            <i class="fas fa-bell notification-icon"></i>
        </a>
    </header>

    <div class="underline"></div>

    <div class="grid">
        <?php foreach ($fasilitas as $fasilitas_item): ?>
        <div class="grid-item" onclick="window.location.href='detail.php?id=<?= $fasilitas_item['id_fasilitas'] ?>'">
            <div class="card">
                <div class="front">
                    <!-- Tidak ada gambar, hanya teks -->
                    <span><?= $fasilitas_item['nama_fasilitas'] ?></span>
                </div>
                <div class="back">
                    <span>Lihat Detail</span>
                </div>
            </div>
            <div class="name"><?= $fasilitas_item['nama_fasilitas'] ?></div>
            <p class="description"><?= $fasilitas_item['jumlah_fasilitas'] ?> unit tersedia.</p>
        </div>
        <?php endforeach; ?>
    </div>

    <footer>
        &copy; 2024 Asrama Mahasiswa
    </footer>
</body>
</html>
