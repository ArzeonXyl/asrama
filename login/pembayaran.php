<?php
include '../connect.php';
session_start();

// Tangkap NIM dari URL atau session
if (isset($_GET['username'])) {
    $nim_sesion = $_GET['username']; // Mengambil NIM dari parameter URL
    $_SESSION['pendaftaran']['NIM'] = $nim_sesion; // Simpan NIM ke session jika datang dari URL
    $nim_sesion = $_SESSION['pendaftaran']['NIM']; // Mengambil NIM dari session
} else {
    // Jika tidak ada parameter username atau session pendaftaran, arahkan ke halaman login
    header('Location: login_warga.php');
    exit();
}

// Handle form pembayaran
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $metode_pembayaran = $_POST['metode_pembayaran'] ?? '';
    $nominal = $_POST['nominal'] ?? '';
    $tanggal_pembayaran = $_POST['tanggal_pembayaran'] ?? '';
    $errors = [];

    // Validasi input
    if (empty($metode_pembayaran)) {
        $errors['metode_pembayaran'] = 'Metode pembayaran harus dipilih.';
    }
    if (empty($nominal)) {
        $errors['nominal'] = 'Nominal pembayaran harus diisi.';
    }
    if (empty($tanggal_pembayaran)) {
        $errors['tanggal_pembayaran'] = 'Tanggal pembayaran harus diisi.';
    }

    // Jika tidak ada error, proses pembayaran
    if (empty($errors)) {
        // Mengambil ID pembayaran terakhir dan menambahkannya
        $cek_id = "SELECT MAX(id_pembayaran) FROM pembayaran";
        $result = mysqli_query($conn, $cek_id);
        $row = mysqli_fetch_row($result);
        $id = $row[0] + 1; // Auto increment ID, based on max ID

        // Lakukan query untuk insert pembayaran ke database
        $tambah_pembayaran = "INSERT INTO pembayaran (id_pembayaran, nim_warga, nominal, tanggal_pembayaran, metode_pembayaran) 
                              VALUES('$id', '$nim_sesion', '$nominal', '$tanggal_pembayaran', '$metode_pembayaran')";
        if (mysqli_query($conn, $tambah_pembayaran)) {
            // Pembayaran berhasil
            echo "<script>alert('Pembayaran berhasil!'); window.location.href = 'success.php';</script>";
            $_SESSION['pembayaran_sukses'] = true;
            $_SESSION['pembayaran']['nominal'] = $nominal;  // Simpan nominal pembayaran

        } else {
            echo "Error: " . mysqli_error($conn);
        }
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran</title>
    <style>
        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<form method="POST">
    <h2>Detail Pembayaran</h2>
    <label for="NIM">NIM</label>
    <p>Lanjutkan pembayaran dengan NIM:</p>
    <span><?= htmlspecialchars($nim_sesion) ?></span>

    <label for="metode_pembayaran">Metode Pembayaran</label>
    <select id="metode_pembayaran" name="metode_pembayaran">
        <option value="">Pilih Metode</option>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="Kartu Kredit">Kartu Kredit</option>
        <option value="E-Wallet">E-Wallet</option>
    </select>
    <span class="error"><?= $errors['metode_pembayaran'] ?? '' ?></span>

    <label for="nominal">Nominal</label>
    <input type="text" id="nominal" name="nominal" placeholder="Masukkan jumlah pembayaran" value="<?= htmlspecialchars($nominal ?? '') ?>">
    <span class="error"><?= $errors['nominal'] ?? '' ?></span>

    <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
    <input type="date" id="tanggal_pembayaran" name="tanggal_pembayaran" value="<?= htmlspecialchars($tanggal_pembayaran ?? '') ?>">
    <span class="error"><?= $errors['tanggal_pembayaran'] ?? '' ?></span>

    <button type="submit">Bayar</button>
    <button type="button" onclick="window.location.href='login_warga.php'">Kembali</button>
</form>
</body>
</html>
