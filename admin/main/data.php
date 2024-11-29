<?php 
include '../template/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/asrama/connect.php';
include '../template/sidebar.php';
include '../template/top-bar.php';
$input['jurusan']='';
echo "<form action='data.php' method='get'>
<label for='search'>Search:</label>"
?>
<select id='jurusan' name='jurusan' class='form-select'>
    <option value=''>Pilih Jurusan</option>
    <option value='S1 Ilmu Hukum' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Ilmu Hukum' ? 'selected' : '' ?>>S1 Ilmu Hukum</option>
    <option value='S1 Manajemen' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Manajemen' ? 'selected' : '' ?>>S1 Manajemen</option>
    <option value='S1 Akuntansi' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Akuntansi' ? 'selected' : '' ?>>S1 Akuntansi</option>
    <option value='S1 Ekonomi Pembangunan' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Ekonomi Pembangunan' ? 'selected' : '' ?>>S1 Ekonomi Pembangunan</option>
    <option value='S1 Agroteknologi' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Agroteknologi' ? 'selected' : '' ?>>S1 Agroteknologi</option>
    <option value='S1 Agribisnis' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Agribisnis' ? 'selected' : '' ?>>S1 Agribisnis</option>
    <option value='S1 Teknologi Ilmu Pertanian' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Teknologi Ilmu Pertanian' ? 'selected' : '' ?>>S1 Teknologi Ilmu Pertanian</option>
    <option value='S1 Ilmu Kelautan' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Ilmu Kelautan' ? 'selected' : '' ?>>S1 Ilmu Kelautan</option>
    <option value='S1 Manajemen Sumberdaya Perairan' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Manajemen Sumberdaya Perairan' ? 'selected' : '' ?>>S1 Manajemen Sumberdaya Perairan</option>
    <option value='S1 Teknik Informatika' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Teknik Informatika' ? 'selected' : '' ?>>S1 Teknik Informatika</option>
    <option value='S1 Teknologi Informasi' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Teknologi Informasi' ? 'selected' : '' ?>>S1 Teknologi Informasi</option>
    <option value='S1 Teknik Industri' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Teknik Industri' ? 'selected' : '' ?>>S1 Teknik Industri</option>
    <option value='S1 Teknik Elektro' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Teknik Elektro' ? 'selected' : '' ?>>S1 Teknik Elektro</option>
    <option value='S1 Teknik Listrik' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Teknik Listrik' ? 'selected' : '' ?>>S1 Teknik Listrik</option>
    <option value='S1 Teknik Mesin' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Teknik Mesin' ? 'selected' : '' ?>>S1 Teknik Mesin</option>
    <option value='S1 Sosiologi' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Sosiologi' ? 'selected' : '' ?>>S1 Sosiologi</option>
    <option value='S1 Ilmu Komunikasi' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Ilmu Komunikasi' ? 'selected' : '' ?>>S1 Ilmu Komunikasi</option>
    <option value='S1 Sastra Inggris' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Sastra Inggris' ? 'selected' : '' ?>>S1 Sastra Inggris</option>
    <option value='S1 Psikologi' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Psikologi' ? 'selected' : '' ?>>S1 Psikologi</option>
    <option value='S1 Pendidikan Guru Sekolah Dasar' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Pendidikan Guru Sekolah Dasar' ? 'selected' : '' ?>>S1 Pendidikan Guru Sekolah Dasar</option>
    <option value='S1 Pendidikan Anak Usia Dini' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Pendidikan Anak Usia Dini' ? 'selected' : '' ?>>S1 Pendidikan Anak Usia Dini</option>
    <option value='S1 Pendidikan Ilmu Pengetahuan Alam' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Pendidikan Ilmu Pengetahuan Alam' ? 'selected' : '' ?>>S1 Pendidikan Ilmu Pengetahuan Alam</option>
    <option value='S1 Pendidikan Informatika' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Pendidikan Informatika' ? 'selected' : '' ?>>S1 Pendidikan Informatika</option>
    <option value='S1 Pendidikan Bahasa dan Sastra Indonesia' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Pendidikan Bahasa dan Sastra Indonesia' ? 'selected' : '' ?>>S1 Pendidikan Bahasa dan Sastra Indonesia</option>
    <option value='S1 Hukum Bisnis Syariah' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Hukum Bisnis Syariah' ? 'selected' : '' ?>>S1 Hukum Bisnis Syariah</option>
    <option value='S1 Ekonomi Syariah' <?= isset($input['jurusan']) && $input['jurusan'] == 'S1 Ekonomi Syariah' ? 'selected' : '' ?>>S1 Ekonomi Syariah</option>
</select>
<button class='btn btn-primary' type='submit'>Cari</button>
</form>
<?php
if (isset($_GET['jurusan'])){
    $jurusan = $_GET['jurusan'];
    $input['jurusan'] = $jurusan;
    $sql = "SELECT * FROM warga_asrama,pengurus WHERE jurusan_warga='$input[jurusan]'";
    $result = mysqli_query($conn, $sql);
}else{
    $input['jurusan'] = '';
    $sql = "SELECT * FROM warga_asrama,pengurus Order by jurusan_warga";
    $result = mysqli_query($conn, $sql);
}
if (isset($_GET['nim'])){
    $nim = $_GET['nim'];
    $sql="DELETE from warga_asrama where nim_warga='$nim'";
    $query=mysqli_query($conn,$sql);
}

echo"<table class='table table-striped table-bordered mt-4'>
    <thead>
        <tr>
        <th scope='col'>No</th>
        <th scope='col'>NIM</th>
        <th scope='col'>Nama</th>
        <th scope='col'>Jurusan</th>
        <th scope='col'>Alamat</th>
        <th scope='col'>Jenis Kelamin</th>
        <th scope='col'>No Kamar</th>
        <th scope='col'>Pengurus</th>
        <th scope='col'>Aksi</th>
        </tr>
    </thead>
    <tbody>";
    foreach ($result as $index => $data) {
        echo "<tr>";
        echo "<th scope='row'>" . ($index + 1) . "</th>";
        echo "<td>" . $data['nim_warga'] . "</td>";
        echo "<td>" . $data['nama_warga'] . "</td>";
        echo "<td>" . $data['jurusan_warga'] . "</td>";
        echo "<td>" . $data['alamat_warga'] . "</td>";
        echo "<td>" . $data['jenis_kelamin_warga'] . "</td>";
        echo "<td>" . $data['no_kamar'] . "</td>";
        echo "<td>" . $data['nama_pengurus'] . "</td>";
        echo "<td>
                <a href='edit.php?nim=" . $data['nim_warga'] . "' class='btn btn-primary'>Edit</a>
                <a href='data.php?nim=" . $data['nim_warga'] . "' class='btn btn-danger'>Hapus</a>
            </td>";
        echo "</tr>";
    }
    echo "</tbody>
</table>";
?>
<?php
    include "../template/script.php"
?>