<?php
    include "../template/head.php";
    include $_SERVER['DOCUMENT_ROOT'] . '/asrama/connect.php';
?>
<?php
    include "../template/sidebar.php"
?>

<?php
    include "../template/top-bar.php"
?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
     <a class="bg-white p-6 rounded-lg shadow flex items-center space-x-4 hover:bg-gray-100" href="#">
      <i class="fas fa-users text-blue-600 text-2xl">
      </i>
      <div>
       <div class="text-gray-800 font-semibold">
        Data User
       </div>
       <div class="text-gray-500 text-sm">
        Manage user data
       </div>
      </div>
     </a>
     <a class="bg-white p-6 rounded-lg shadow flex items-center space-x-4 hover:bg-gray-100" href="ekstrakulikuler.php">
      <i class="fas fa-futbol text-green-600 text-2xl">
      </i>
      <div>
       <div class="text-gray-800 font-semibold">
        Ekstrakulikuler
       </div>
       <div class="text-gray-500 text-sm">
        Manage extracurricular activities
       </div>
      </div>
     </a>
     <a class="bg-white p-6 rounded-lg shadow flex items-center space-x-4 hover:bg-gray-100" href="#">
      <i class="fas fa-bed text-purple-600 text-2xl">
      </i>
      <div>
       <div class="text-gray-800 font-semibold">
        Kamar
       </div>
       <div class="text-gray-500 text-sm">
        Manage rooms
       </div>
      </div>
     </a>
     <a class="bg-white p-6 rounded-lg shadow flex items-center space-x-4 hover:bg-gray-100" href="#">
      <i class="fas fa-concierge-bell text-yellow-600 text-2xl">
      </i>
      <div>
       <div class="text-gray-800 font-semibold">
        Fasilitas
       </div>
       <div class="text-gray-500 text-sm">
        Manage facilities
       </div>
      </div>
     </a>
     <a class="bg-white p-6 rounded-lg shadow flex items-center space-x-4 hover:bg-gray-100" href="#">
      <i class="fas fa-user text-red-600 text-2xl">
      </i>
      <div>
       <div class="text-gray-800 font-semibold">
        Profil
       </div>
       <div class="text-gray-500 text-sm">
        Manage profile
       </div>
      </div>
     </a>
    </div>
<?php
    include "../template/script.php"
?>