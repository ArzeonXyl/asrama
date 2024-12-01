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
            <img src="assets/img/logo_asrama.jpg" alt="Logo Asrama">
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
            <li><a href="#portfolio">Berita</a></li>
            <li><a href="profil.php">Profil</a></li>
        </ul>
    </nav>
    
</header>
