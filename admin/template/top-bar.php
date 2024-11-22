<div class="flex justify-between items-center mb-6 bg-white p-4 rounded-lg shadow w-full">
        <div class="flex items-center space-x-4">
          <button class="bg-gray-200 text-gray-600 rounded-full p-2" id="themeSwitcher">
            <i class="fas fa-adjust"></i>
          </button>
        </div>
        <div class="flex items-center space-x-4 relative">
          <i class="fas fa-bell text-gray-500 relative"></i>
          <i class="fas fa-comment-dots text-gray-500"></i>
          <div class="flex items-center space-x-2">
            <img alt="User profile picture" class="rounded-full w-10 h-10" height="40" src="" width="40"/>
            <div>
              <div class="text-gray-800 font-semibold">admin1</div>
              <div class="text-gray-500 text-sm">Admin</div>
            </div>
            <i class="fas fa-chevron-down text-gray-500 cursor-pointer" id="profileMenuButton"></i>
            <div class="absolute right-0 mt-12 w-48 bg-white rounded-lg shadow-lg py-2 hidden" id="profileMenu">
              <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="#">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Logout
              </a>
            </div>
          </div>
        </div>
      </div>