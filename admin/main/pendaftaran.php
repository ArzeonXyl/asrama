<?php
    ob_start(); // Mulai output buffering
    include "../template/head.php";
    include $_SERVER['DOCUMENT_ROOT'] . '/asrama/connect.php';
    include "../template/sidebar.php";
    include "../template/top-bar.php";

    // Pastikan sesi 'pendaftaran' diinisialisasi
    if (!isset($_SESSION['pendaftaran'])) {
        $_SESSION['pendaftaran'] = [];
    }

    // Cek jika ada data pencarian
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $searchBy = isset($_POST['search_by']) ? $_POST['search_by'] : 'nama'; // default pencarian berdasarkan nama

    // Filter data berdasarkan pencarian
    $filteredData = $_SESSION['pendaftaran']; // Defaultnya semua data ditampilkan

    // Jika ada pencarian, filter data berdasarkan nama atau NIM
    if ($search) {
        $filteredData = [];
        foreach ($_SESSION['pendaftaran'] as $index => $data) {
            if ($searchBy == 'nama' && strpos(strtolower($data['nama']), strtolower($search)) !== false) {
                // Jika nama cocok dengan pencarian
                $filteredData[] = $data;
            } elseif ($searchBy == 'nim' && strpos($data['NIM'], $search) !== false) {
                // Jika NIM cocok dengan pencarian
                $filteredData[] = $data;
            }
        }
    }

    // Proses untuk menyetujui pendaftaran
    if (isset($_POST['setujui']) && isset($_POST['index']) && is_array($_POST['index'])) {
        foreach ($_POST['index'] as $index) {
            if (isset($_SESSION['pendaftaran'][$index])) {
                $input = $_SESSION['pendaftaran'][$index];
                $pengurus = isset($_POST['pengurus'][$index]) ? $_POST['pengurus'][$index] : null;
                $no_kamar = isset($_POST['no_kamar'][$index]) ? $_POST['no_kamar'][$index] : null;

                if ($pengurus && $no_kamar) {
                    $sql = "INSERT INTO warga_asrama (`nim_warga`, `nama_warga`, `jurusan_warga`, `alamat_warga`, `password_warga`, `jenis_kelamin_warga`, `nomor_handphone_warga`, `no_kamar`, `nim_pengurus`)
                            VALUES ('{$input['NIM']}', '{$input['nama']}', '{$input['jurusan']}', '{$input['alamat']}', '{$input['password']}', '{$input['kelamin']}', '{$input['hp']}', '$no_kamar', '$pengurus')";
                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        unset($_SESSION['pendaftaran'][$index]);
                        echo "<script>alert('Pendaftaran berhasil disetujui dan data dimasukkan ke database.')</script>";
                    } else {
                        echo "<script>alert('Terjadi kesalahan saat menyimpan data ke database.')</script>";
                    }
                } else {
                    echo "<script>alert('Pengurus atau nomor kamar tidak valid.')</script>";
                }
            }
        }
    }

    // Proses penghapusan data pendaftaran
    if (isset($_POST['hapus']) && isset($_POST['index']) && is_array($_POST['index'])) {
        foreach ($_POST['index'] as $index) {
            unset($_SESSION['pendaftaran'][$index]); // Hapus data dari session
        }
        echo "<script>alert('Data berhasil dihapus dari daftar pendaftaran.')</script>";
    }

    // Menghapus semua data pendaftaran
    if (isset($_POST['hapus_semua'])) {
        unset($_SESSION['pendaftaran']);
        echo "<script>alert('Semua data pendaftaran telah dihapus.')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Warga</title>
    <script>
        function showSuggestions(str) {
            if (str.length == 0) {
                document.getElementById("suggestions").innerHTML = "";
                return;
            }
            var suggestions = <?php echo json_encode($_SESSION['pendaftaran']); ?>;
            var output = '';
            str = str.toLowerCase();
            suggestions.forEach(function(data) {
                if (data.nama.toLowerCase().includes(str)) {
                    output += '<a href="#" class="list-group-item list-group-item-action" onclick="selectSuggestion(\'' + data.nama + '\')">' + data.nama + '</a>';
                }
            });
            document.getElementById("suggestions").innerHTML = output;
        }

        function selectSuggestion(suggestion) {
            document.getElementById("searchInput").value = suggestion;
            document.getElementById("suggestions").innerHTML = "";
        }
    </script>
</head>
<body>
    <form method="POST" action="pendaftaran.php">
        <div class="form-group">
            <!-- Pilih untuk mencari berdasarkan Nama atau NIM -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="search_by" value="nama" id="searchByNama" <?php if ($searchBy == 'nama') echo 'checked'; ?>>
                <label class="form-check-label" for="searchByNama">Nama</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="search_by" value="nim" id="searchByNim" <?php if ($searchBy == 'nim') echo 'checked'; ?>>
                <label class="form-check-label" for="searchByNim">NIM</label>
            </div>

            <input type="text" name="search" class="form-control" id="searchInput" placeholder="Cari..." value="<?php echo htmlspecialchars($search); ?>" onkeyup="showSuggestions(this.value)">
            <div id="suggestions" class="list-group mt-2"></div>
            <button type="submit" name="search_button" class="btn btn-primary mt-3">Cari</button>
        </div>
        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th>Pendaftar</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Pengurus</th>
                    <th>No Kamar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($filteredData)) {
                    foreach ($filteredData as $index => $data) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='index[]' value='{$index}'></td>";
                        echo "<td>{$data['NIM']}</td>";
                        echo "<td>{$data['nama']}</td>";
                        echo "<td>{$data['jurusan']}</td>";
                        echo "<td>{$data['alamat']}</td>";
                        echo "<td>
                                <select name='pengurus[{$index}]' class='form-select'>
                                    <option value=''>Pilih Pengurus</option>";
                                    $sql_pengurus = "SELECT nim_pengurus, nama_pengurus FROM pengurus";
                                    $result_pengurus = mysqli_query($conn, $sql_pengurus);
                                    while ($row = mysqli_fetch_assoc($result_pengurus)) {
                                        echo "<option value='{$row['nim_pengurus']}'>{$row['nama_pengurus']}</option>";
                                    }
                        echo "</select></td>";
                        echo "<td>
                                <select name='no_kamar[{$index}]' class='form-select'>
                                    <option value=''>Pilih No Kamar</option>";
                                    $sql_kamar = "SELECT no_kamar, status_kamar FROM kamar WHERE status_kamar = 'Tersedia'";
                                    $result_kamar = mysqli_query($conn, $sql_kamar);
                                    while ($row = mysqli_fetch_assoc($result_kamar)) {
                                        echo "<option value='{$row['no_kamar']}'>{$row['no_kamar']}</option>";
                                    }
                        echo "</select></td>";
                        echo "<td>
                                <button type='submit' name='setujui' class='btn btn-success'>Setujui</button>
                                <button type='submit' name='hapus' class='btn btn-danger'>Hapus</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Belum ada data yang ditambahkan</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="submit" name="hapus_semua" class="btn btn-danger">Hapus Semua</button>
    </form>
</body>
</html>
