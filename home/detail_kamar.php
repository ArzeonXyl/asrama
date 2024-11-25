<?php
    include '../connect.php';
    include 'session_check.php';

    if (isset($_GET['no_kamar'])) {
        $no_kamar = $_GET['no_kamar'];
    } else {
        die("No kamar tidak ditemukan!");
    }


    $sql_kamar = "SELECT * FROM kamar WHERE no_kamar = '$no_kamar'";
    $query = mysqli_query($conn, $sql_kamar);
    $result_kamar = mysqli_fetch_assoc($query);


    $sql_warga = "SELECT * FROM warga_asrama WHERE no_kamar = '$no_kamar'";
    $query2 = mysqli_query($conn, $sql_warga);
    $result_warga = mysqli_fetch_all($query2, MYSQLI_ASSOC);
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
        <h2 class="mb-4">Detail Kamar - <?= ($result_kamar['no_kamar']); ?></h2>
        <table class="table table-bordered">
            <tr>
                <th>No Kamar</th>
                <td><?= ($result_kamar['no_kamar']); ?></td>
            </tr>
            <tr>
                <th>Gedung</th>
                <td><?= ($result_kamar['id_gedung']); ?></td>
            </tr>
            <tr>
                <th>Status Kamar</th>
                <td><?= ($result_kamar['status_kamar']); ?></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><?= ($result_kamar['keterangan'] ?? 'Tidak ada keterangan'); ?></td>
            </tr>
        </table>

        <h3 class="mt-5">Warga Asrama yang Menggunakan Kamar Ini</h3>
        <?php if (count($result_warga) >  0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">NIM Warga</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jurusan</th>
                        <?php if($_SESSION['role'] == "pengurus"): ?>
                                <th>Action</th>
                            <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $position = 0 ?>
                    <?php while ($position < count($result_warga)): ?>
                        <tr>
                            <td><?= ($result_warga[$position]['nim_warga']); ?></td>
                            <td><?= ($result_warga[$position]['nama_warga']); ?></td>
                            <td><?= ($result_warga[$position]['jurusan_warga']); ?></td>
                            <?php if($_SESSION['role'] == "pengurus"): ?>
                                <td>
                                    <button>Edit</button>
                                    <button>Hapus</button>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php $position+=1; ?>
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
