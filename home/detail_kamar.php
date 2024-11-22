<?php
    include '../connect.php';
    include 'session_check.php';

    // Mendapatkan `no_kamar` dari URL
    if (isset($_GET['no_kamar'])) {
        $no_kamar = $_GET['no_kamar'];
    } else {
        die("No kamar tidak ditemukan!");
    }

    // Query untuk mengambil data detail kamar
    $sql_kamar = "SELECT * FROM kamar WHERE no_kamar = ?";
    $stmt_kamar = $conn->prepare($sql_kamar);
    $stmt_kamar->bind_param("s", $no_kamar);
    $stmt_kamar->execute();
    $result_kamar = $stmt_kamar->get_result();

    if ($result_kamar->num_rows > 0) {
        $data_kamar = $result_kamar->fetch_assoc();
    } else {
        die("Kamar dengan no $no_kamar tidak ditemukan.");
    }

    // Query untuk mengambil data warga asrama berdasarkan no_kamar
    $sql_warga = "SELECT * FROM warga_asrama WHERE no_kamar = ?";
    $stmt_warga = $conn->prepare($sql_warga);
    $stmt_warga->bind_param("s", $no_kamar);
    $stmt_warga->execute();
    $result_warga = $stmt_warga->get_result();

    $stmt_kamar->close();
    $stmt_warga->close();
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kamar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        td {
            text-align: left;
        }
        <?php include 'assets/style.css'; ?> 
    </style>
</head>

<body>
    <?php require 'assets/header.php'; ?>

    <main class="container mt-5">
        <h2 class="mb-4">Detail Kamar - <?php echo htmlspecialchars($data_kamar['no_kamar']); ?></h2>
        <table class="table table-bordered">
            <tr>
                <th>No Kamar</th>
                <td><?php echo htmlspecialchars($data_kamar['no_kamar']); ?></td>
            </tr>
            <tr>
                <th>Gedung</th>
                <td><?php echo htmlspecialchars($data_kamar['id_gedung']); ?></td>
            </tr>
            <tr>
                <th>Status Kamar</th>
                <td><?php echo htmlspecialchars($data_kamar['status_kamar']); ?></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><?php echo htmlspecialchars($data_kamar['keterangan'] ?? 'Tidak ada keterangan'); ?></td>
            </tr>
        </table>

        <h3 class="mt-5">Warga Asrama yang Menggunakan Kamar Ini</h3>
        <?php if ($result_warga->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">NIM Warga</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row_warga = $result_warga->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row_warga['nim_warga']); ?></td>
                            <td><?php echo htmlspecialchars($row_warga['nama_warga']); ?></td>
                            <td><?php echo htmlspecialchars($row_warga['jurusan_warga']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-danger">Tidak ada warga yang menggunakan kamar ini.</p>
        <?php endif; ?>

        <a href="kamar.php" class="btn btn-primary">Kembali</a>
    </main>
</body>

</html>
