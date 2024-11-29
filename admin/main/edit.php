    <?php 
    // Menyertakan file yang diperlukan
    include '../template/head.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/asrama/connect.php';
    include '../template/sidebar.php';
    include '../template/top-bar.php';

    // Cek apakah parameter 'nim' ada di URL
    if (isset($_GET['nim'])) {
        // Validasi parameter nim
        $nim = mysqli_real_escape_string($conn, $_GET['nim']);
        
        // Query untuk mendapatkan data warga berdasarkan NIM
        $sql = "SELECT * FROM warga_asrama, pengurus WHERE nim_warga = '$nim'";
        $result = $conn->query($sql);
        
        // Periksa apakah data ditemukan
        if ($result && $data = mysqli_fetch_assoc($result)) {
            // Menyimpan data dari database ke variabel
            $nim_warga = htmlspecialchars($data['nim_warga']);
            $nama_warga = htmlspecialchars($data['nama_warga']);
            $jurusan_warga = htmlspecialchars($data['jurusan_warga']);
            $alamat_warga = htmlspecialchars($data['alamat_warga']);
            $jenis_kelamin_warga = htmlspecialchars($data['jenis_kelamin_warga']);
            $no_kamar = htmlspecialchars($data['no_kamar']);
            $nama_pengurus = htmlspecialchars($data['nama_pengurus']);
            ?>

            <h1 class="mb-4 text-center bg-primary text-white">Edit Data Warga</h1>
            <!-- Form untuk menampilkan dan mengedit data -->
            <form method="POST" action="data.php" class="row g-3">
                <div class="col-md-6">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" id="nim" name="nim" class="form-control" value="<?php echo $nim_warga; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $nama_warga; ?>">
                </div>
                <div class="col-md-6">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" class="form-control" value="<?php echo $jurusan_warga; ?>">
                </div>
                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo $alamat_warga; ?>">
                </div>
                <div class="col-md-6">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                        <option value="Laki-laki" <?php if ($jenis_kelamin_warga === 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($jenis_kelamin_warga === 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="no_kamar" class="form-label">No Kamar</label>
                    <input type="text" id="no_kamar" name="no_kamar" class="form-control" value="<?php echo $no_kamar; ?>">
                </div>
                <div class="col-md-6">
                    <label for="nama_pengurus" class="form-label">Nama Pengurus</label>
                    <input type="text" id="nama_pengurus" name="nama_pengurus" class="form-control" value="<?php echo $nama_pengurus; ?>">
                </div>
                <div class="col-12">
                    <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>

            <?php
        } else {
            echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Parameter NIM tidak diberikan.</div>";
    }
    ?>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
