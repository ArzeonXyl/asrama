<?php 
    include '../template/head.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/asrama/connect.php';
    include '../template/sidebar.php';
    include '../template/top-bar.php';

    $no_kamar = $_GET['kamar'];
    $nim = $_GET['nim'];
    
    $query = mysqli_query($conn, "SELECT * FROM warga_asrama WHERE no_kamar='$no_kamar' AND nim_warga='$nim'");
    $result = mysqli_fetch_assoc($query);

    $query_kamar = mysqli_query($conn, "SELECT * FROM kamar");
    $data_1 = mysqli_fetch_all($query_kamar, MYSQLI_ASSOC);

    $query_pengurus = mysqli_query($conn, "SELECT * FROM pengurus");
    $data_2 = mysqli_fetch_all($query_pengurus, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="" method="post">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card bg-light shadow-lg" style="width: 30%;">
                <div class="card-header bg-light mt-2"><h1 class="h3">Edit  Warga : <?= $result['nama_warga']?></h1></div>
                <div class="card-body">
                    <div class="mb-1">
                        <label for="" class="form-label">No Kamar</label>
                        <select name="pengurus" id=""class="form-control form-control-md bg-light" style="width: 100%;">
                            <option value="">~~Pilih Kamar~~</option>
                            <?php foreach($data_1 as $kamar):?>
                                <option value="<?= $kamar['no_kamar'] ?>" <?= isset($no_kamar) && $no_kamar == $kamar['no_kamar'] ? 'selected' : "" ?>><?= $kamar['no_kamar'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Pengurus</label>
                        <select name="pengurus" id=""class="form-control form-control-md bg-light" style="width: 100%;">
                            <option value="none">~~Pilih Pengurus~~</option>
                            <?php foreach($data_2 as $pengurus):?>
                                <option value="<?= $pengurus['nim_pengurus'] ?>" <?= !empty($pengurus['nim_pengurus']) ? 'selected' : "" ?>><?= $pengurus['nama_pengurus'] ?></option>
                            <?php endforeach;?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>