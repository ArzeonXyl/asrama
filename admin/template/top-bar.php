<div class="flex justify-between items-center mb-6 bg-white p-4 rounded-lg shadow w-full">
    <div class="flex items-center space-x-4">
        <button class="bg-gray-200 text-gray-600 rounded-full p-2" id="themeSwitcher">
            <i class="fas fa-adjust"></i>
        </button>
    </div>
    <div class="flex items-center space-x-4 relative">
        <!-- Ikon bel dengan jumlah pendaftar baru -->
        <i class="fas fa-bell text-gray-500 relative cursor-pointer text-3xl" id="notifBell">
            <!-- Menampilkan jumlah pendaftar baru jika ada -->
            <?php if (isset($_SESSION['pendaftaran']) && count($_SESSION['pendaftaran']) > 0): ?>
                <span class="absolute top-0 right-0 rounded-full bg-red-500 text-white text-xs px-2 py-1 min-w-[20px] text-center">
                    <?php echo count($_SESSION['pendaftaran']); ?>
                </span>
            <?php endif; ?>
        </i>
        <!-- <i class="fas fa-comment-dots text-gray-500"></i> -->
        <div class="flex items-center space-x-2">
        <i class="fas fa-user-circle rounded-full text-gray-500 w-10 h-10" style="font-size: 40px;"></i>
            <div>
                <div class="text-gray-800 font-semibold">admin1</div>
                <div class="text-gray-500 text-sm">Admin</div>
            </div>
            <i class="fas fa-chevron-down text-gray-500 cursor-pointer" id="profileMenuButton"></i>
            <div class="absolute right-0 mt-12 w-48 bg-white rounded-lg shadow-lg py-2 hidden" id="profileMenu">
                <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="../../login/logout.php">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Notifikasi -->
<div id="notificationModal" class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Pemberitahuan</h2>
        <p>Anda memiliki <strong>
            <?php echo isset($_SESSION['pendaftaran']) ? count($_SESSION['pendaftaran']) : 0; ?>
        </strong> pendaftar baru yang menunggu persetujuan.</p>
        <button class="mt-4 bg-red-500 text-white py-2 px-4 rounded" id="closeModal">Tutup</button>
    </div>
</div>
<style>
  /* Memperbesar ikon bel */
#notifBell {
    font-size: 2rem; /* Menambah ukuran ikon bel */
}

/* Mengatur posisi angka notifikasi */
#notifBell span {
    font-size: 0.75rem; /* Menyesuaikan ukuran teks angka */
    padding: 0.1rem 0.4rem;
    min-width: 20px;
    height: 20px;
    line-height: 20px; /* Menjaga agar angka tetap terlihat di tengah lingkaran */
    text-align: center;
}

</style>

<!-- Modal Notifikasi -->
<div id="notificationModal" class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Pemberitahuan</h2>
        <p>Anda memiliki <strong>
            <?php echo isset($_SESSION['pendaftaran']) ? count($_SESSION['pendaftaran']) : 0; ?>
        </strong> pendaftar baru yang menunggu persetujuan.</p>
        <button class="mt-4 bg-red-500 text-white py-2 px-4 rounded" id="closeModal">Tutup</button>
    </div>
</div>
<script>
    // Menangani klik pada ikon notifikasi
    document.getElementById('notifBell').addEventListener('click', function() {
        // Menampilkan modal
        document.getElementById('notificationModal').classList.remove('hidden');
    });

    // Menangani klik untuk menutup modal
    document.getElementById('closeModal').addEventListener('click', function() {
        // Menyembunyikan modal
        document.getElementById('notificationModal').classList.add('hidden');
    });
</script>
