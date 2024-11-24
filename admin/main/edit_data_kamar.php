<?php 
    require $_SERVER['DOCUMENT_ROOT'] . "/asrama/connect.php";
    session_start();
    $no_kamar = $_GET['kamar'];
    $nim = $_GET['nim'];
    
    $query = mysqli_query($conn, "SELECT * FROM warga_asrama WHERE no_kamar='$no_kamar' AND nim_warga='$nim'");
    $result = mysqli_fetch_assoc($query);

    // $query2 = mysqli_query($conn, "SELECT *")
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <form action="" method="post">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card bg-light shadow-lg" style="width: 50%;">
                <div class="card-header bg-light mt-2"><h3>Edit  Warga : <?= $result['nama_warga']?></h3></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label">NIM </label>
                        <input type="text" class="form-control bg-secondary text-light" name="nim" value="<?= $result['nim_warga']?>" disabled>
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control bg-secondary text-light" name="nama" value="<?= $result['nama_warga']?>" disabled>
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Jurusan</label>
                        <input type="text" class="form-control bg-secondary text-light" name="jurusan" value="<?= $result['jurusan_warga']?>" disabled>
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Alamat</label>
                        <textarea class="form-control bg-secondary text-light" id="" rows="3" name="alamat" disabled><?= $result['alamat_warga']?></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control bg-secondary text-light" id="" name="password" value="<?= $result['password_warga']?>" disabled>
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Laki-Laki" <?= $result['jenis_kelamin_warga'] == "Laki-Laki" ?  "checked" : ""; ?> disabled>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Laki-Laki
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Perempuan" <?= $result['jenis_kelamin_warga'] == "perempuan" ?  "checked" : ""; ?> disabled>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Perempuan
                            </label>
                            </div>
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">No Kamar</label>
                        <input type="tel" class="form-control bg-secondary text-light" id="" name="nokamar" value="<?= $result['no_kamar']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Pengurus</label>
                        <select name="pengurus" id=""class="form-control form-control-md bg-secondary text-light" style="width: 100%;">
                            <option value="">~~Pilih Pengurus~~</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-success" type="submit" name="save">Simpan</button>
                        <button class="btn btn-danger" type="button" onclick="window.location.href='master_detail_kamar.php'">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>
</body>
</html>