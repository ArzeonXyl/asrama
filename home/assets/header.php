<?php
        session_start();
        if (!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == false) {
            header("Location: ../login/login_warga.php");
            exit();
        }
?>
<header>
    <div class="header-content">
        <div class="logo">
            <img src="assets/img/logo_asrama.png" alt="Logo Asrama">
        </div>
        <div class="title">
            <h1 class="text-center">Selamat Datang di Asrama</h1>
        </div>
        <div class="logout-container">
            <a href="../login/logout.php" class="logout-link">
                <i class="fas fa-sign-out-alt logout-icon"></i>
                <span class="logout-text">Logout</span>
            </a>
        </div>
    </div>
    
    <nav class="navmenu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="kamar.php">Kamar</a></li>
            <li><a href="ekstra.php">Ekstrakulikuler</a></li>
            <li><a href="jadwal.php">Jadwal Kegiatan</a></li>
            <li><a href="fasilitas.php">Fasilitas</a></li>
            <li><a href="berita_penghuni.php">Berita</a></li>
            <li><a href="profil.php">Profil</a></li>
            <?php
            if (isset($_SESSION['nama']) && ($_SESSION['nama'] == 'pengurus 1' || $_SESSION['nama'] == 'pengurus 2')) {
                echo '<li><a href="info_pembayaran.php">pembayaran warga</a></li>';
            }
            ?>

        </ul>
    </nav>
    
</header>
