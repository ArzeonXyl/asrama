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
        <?php include 'assets/style.css'; ?>
        </style>
    </head>

    <body>
        <?php require 'assets/header.php'; ?>

        <!-- Konten lainnya -->
        <main>
            <h2 class="text-center">Berikut Daftar Kamar yang Ada di Asrama</h2>
            <div class="container mt-5">
                <div class="row">
                    <?php
                    // Query untuk mengambil data kamar
                    $sql = "SELECT * FROM kamar";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Loop melalui semua data kamar
                        while ($row = $result->fetch_assoc()) {
                            // Cek status kamar
                            if ($row['status_kamar'] == 'Tersedia') {
                                $statusColor = 'green';
                            } elseif ($row['status_kamar'] == 'Kosong') {
                                $statusColor = 'blue';
                            } else {
                                $statusColor = 'red';
                            }

                            // Hitung jumlah penghuni di setiap kamar
                            $no_kamar = $row['no_kamar'];
                            $sql_penghuni = "SELECT COUNT(*) AS jumlah_penghuni FROM warga_asrama WHERE no_kamar = '$no_kamar'";
                            $result_penghuni = $conn->query($sql_penghuni);
                            $penghuni = $result_penghuni->fetch_assoc();
                            $jumlah_penghuni = $penghuni['jumlah_penghuni'];

                            // Misalnya kapasitas kamar adalah 6
                            $kapasitas_kamar = 6;
                            $tersedia = $kapasitas_kamar - $jumlah_penghuni;

                            echo '<div class="col-md-4 mb-4">
                                    <div class="card shadow-lg rounded-lg">
                                        <div class="card-body">
                                            <h5 class="card-title">' . $row['no_kamar'] . '</h5>
                                            <p class="card-text">Gedung: ' . $row['id_gedung'] . '</p>
                                            <p class="card-text" style="color:' . $statusColor . ';">' . $row['status_kamar'] . '</p>
                                            <p class="card-text">Jumlah Penghuni: ' . $jumlah_penghuni . ' / ' . $kapasitas_kamar . '</p>
                                            <p class="card-text">Kamar Tersedia: ' . $tersedia . '</p>
                                            <form action="detail_kamar.php" method="get">
                                                <input type="hidden" name="no_kamar" value="' . $row['no_kamar'] . '">
                                                <button type="submit" class="btn btn-primary">Lihat Detail Kamar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </main>
    </body>

</html>
