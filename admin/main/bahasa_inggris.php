<?php
    include "../template/head.php";
    include $_SERVER['DOCUMENT_ROOT'] . '/asrama/connect.php';
?>
<?php
    include "../template/sidebar.php";
?>
<?php
    include "../template/top-bar.php";
    $sql = "
    SELECT 
        wa.nim_warga,
        wa.nama_warga,
        wa.jurusan_warga
    FROM 
        warga_ekstrakulikuler we
    INNER JOIN 
        warga_asrama wa ON we.nim_warga = wa.nim_warga
    INNER JOIN 
        ekstrakulikuler e ON we.id_ekstrakulikuler = e.id_ekstrakulikuler
    WHERE 
        e.id_ekstrakulikuler = '2'
";
    $result = mysqli_query($conn, $sql);
    $sql2="SELECT * FROM ekstrakulikuler,dosen_pengajar WHERE id_ekstrakulikuler=2 AND ekstrakulikuler.dosen_NIP=dosen_pengajar.NIP";
    $result2=mysqli_fetch_array(mysqli_query($conn,$sql2));
    if(isset($_POST['submit'])){
        $status=$_POST['status'];
        $jadwal=$_POST['jadwal'];
        $dosen=$_POST['dosen'];
        $sql3="UPDATE ekstrakulikuler,dosen_pengajar  SET jadwal_ekstrakulikuler='$jadwal',nama_dosen='$dosen' WHERE id_ekstrakulikuler=2 AND ekstrakulikuler.dosen_NIP=dosen_pengajar.NIP";
        $sql4=mysqli_query($conn,"UPDATE ekstrakulikuler SET status='$status' WHERE id_ekstrakulikuler=2");
        $result3=mysqli_query($conn,$sql3);
        if($result3){
            echo "<script>alert('Data berhasil')</script>
            <script>window.location.href='bahasa_inggris.php'</script>";

        }
    }
?>
<h1 class="text-center mb-4 font-bold font-siz e-xl">Ekstrakulikuler Bahasa Inggris</h1>
<form action="bahasa_inggris.php" method="POST">
    <label for="jadwal">Jadwal: <input type="text" value="<?= $result2['jadwal_ekstrakulikuler'] ?>" name="jadwal"></label><br>
    <label for="dosen">Dosen: <input type="text" value="<?= $result2['nama_dosen'] ?>" name="dosen"></label><br>
    <label for="status">Status: 
    <select name="status" id="status">
        <option value="Tersedia" <?= isset($status) && $status == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
        <option value="Tidak Tersedia" <?= isset($status) && $status == 'Tidak Tersedia' ? 'selected' : '' ?>>Tidak Tersedia</option>
    </select>
</label><br>

    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
</form>
<table class="table table-striped table-bordered mt-4">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope='col'>NIM</th>
            <th scope='col'>nama</th>
            <th scope='col'>jurusan</th>
            <th scope='col'>aksi</th>  
        </tr>
    </thead>
    <tbody>
<?php
        foreach ($result as $row => $rows) {
?>
            <tr>
                <th scope="row"><?= $row+1 ?></th>
                <td><?= $rows['nim_warga'] ?></td>
                
                <td><?= $rows['nama_warga'] ?></td>
                <td><?= $rows['jurusan_warga'] ?></td>
                <td>
                    <a href="bahasa_inggris.php?nim_warga=<?= $rows['nim_warga'] ?>" class="btn btn-danger"><button>Hapus</button></a>
                    <?php $r=$rows['nim_warga']; 
                    if (isset($_GET['nim_warga']))  {
                        $aku=mysqli_query($conn,"DELETE FROM warga_ekstrakulikuler WHERE nim_warga='$r' AND id_ekstrakulikuler=2"); 
                        if($aku){
                            echo "<script>alert('Data berhasil dihapus') ;window.location.href='bahasa_inggris.php'</script>";
                        }
                    }  ?>
                </td>
            </tr>
<?php
        }
    echo "</tbody>";
    include "../template/script.php"
?>
</table>