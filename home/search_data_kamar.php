<?php 
    include '../connect.php';
    include 'session_check.php';
    
    $error_search = "";
    if(isset($_POST['search'])){
        $search = $_POST['nama'];
        $query = mysqli_query($conn, "SELECT * FROM warga_asrama JOIN kamar ON warga_asrama.no_kamar = kamar.no_kamar WHERE nama_warga='$search'");
        $query2 = mysqli_query($conn, "SELECT * FROM kamar WHERE id_gedung='$search'");
        $query3 = mysqli_query($conn, "SELECT * FROM kamar WHERE no_kamar='$search'");
        
        if(mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        }
        elseif(mysqli_num_rows($query2) > 0){
            $result = mysqli_fetch_all($query2, MYSQLI_ASSOC);
        }
        elseif(mysqli_num_rows($query3) > 0){
            $result = mysqli_fetch_all($query3, MYSQLI_ASSOC);
        }
        else{
            $error_search = "data tidak ditemukan";
        }
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        <?php include 'assets/style.css'; ?>
    </style>
    
</head>
<body>
    <?php require 'assets/header.php'; ?>
    <div class="d-flex justify-content-center mt-5">
        <div class="input-group flex-nowrap kip"  style="width: 25%;">
            <form action="" method="post" class="w-100">
                <div class="d-flex w-100">
                    <input type="text" class="form-control w-100" placeholder="Search nama/gedung/kamar" aria-label="Username" aria-describedby="addon-wrapping" name="nama">
                    <button class="input-group-text" id="addon-wrapping" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center mt-2 text-danger">
        <p><?= $error_search; ?></p>
    </div>
    <?php if(isset($_POST['search']) && $error_search == ""): ?>
        <div class="container mt-5">
            <div class="row">
            <?php foreach($result as $data): ?>
                <?php 
                    if ($data['status_kamar'] == 'Tersedia'){
                        $statusColor = '#219B9D';
                    } elseif ($data['status_kamar'] == 'Kosong') {
                        $statusColor = '#1F509A';
                    } else {
                        $statusColor = '#D91656';
                    }
            
                    $no_kamar = $data['no_kamar'];
                    $sql_penghuni = "SELECT COUNT(*) AS jumlah_penghuni FROM warga_asrama WHERE no_kamar = '$no_kamar'";
                    $result_penghuni = mysqli_query($conn, $sql_penghuni);
                    $penghuni = mysqli_fetch_assoc($result_penghuni);
                    $jumlah_penghuni = $penghuni['jumlah_penghuni'];
            
                    $kapasitas_kamar = 6;
                    $tersedia = $kapasitas_kamar - $jumlah_penghuni;    
                ?>
            
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg outer-card" style="background-color: #E2F4FD;">
                    <h4 class="card-header" style="width: 100%; text-align: center; background-color: #084B83; color: white;">Kamar</h4>
                    <h5 class="card-title p-2" style="width: 100%; text-align: center; color: white; background-color: #17689A;"><?= $no_kamar ?></h5>
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="card-text fw-bold">Gedung: <?= $data['id_gedung'] ?>  </p>
                            <p class="card-text fw-bold p-1" style="color: black">Status : <span class="p-1" style="background-color: <?= $statusColor ?>; color: white;"> <?= $data['status_kamar']  ?></span></p>
                            <p class="card-text fw-bold">Jumlah Penghuni: <?= $jumlah_penghuni ?> / <?= $kapasitas_kamar ?></p>
                            <p class="card-text fw-bold">Kamar Tersedia: <?= $tersedia ?></p>
                            <form action="detail_kamar.php" method="get">
                                <input type="hidden" name="no_kamar" value="<?= $no_kamar ?>">
                                <button type="submit" class="btn btn-primary">Lihat Detail Kamar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</body>
</html>
