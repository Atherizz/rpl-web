  <html>

  <head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
      SDN Dinoyo 4
    </title>
    <link rel="icon" href="<?= BASEURL; ?>/img/asset/logo-sd.png">
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <style>
      body {
        font-family: 'Roboto', sans-serif;
      }

      .dropdown:hover .dropdown-menu {
        display: block;
        z-index: 10000;
      }
    </style>
  </head>

  <body class="font-roboto ">
    <!-- Header -->
    <header class="bg-[#3C583D] text-white">
      <div class="container mx-auto flex justify-between items-center py-4 px-4 md:px-8">
        <div class="flex items-center">
          <img alt="School Logo" class="h-10 w-10 mr-2" height="50" src="<?= BASEURL ?>/img/asset/logo-sd.png" width="50" />
          <a class="text-xl font-bold" href="<?= BASEURL ?>/home">
            <h1 class="text-xl font-bold">
              SDN DINOYO 4
            </h1>
          </a>
        </div>
        <nav class="hidden md:flex space-x-4">
          <div class="dropdown">
            <a class="hover:text-gray-300 cursor-pointer">
              Tentang Kami
              <i class="fas fa-caret-down"></i>
            </a>
            <div class="absolute hidden dropdown-menu bg-white text-black mt-2 rounded shadow-lg">
              <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/profil">Profil</a>
              <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/visi_misi">Visi dan Misi</a>
              <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/guru">Guru dan Karyawan</a>
              <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/sarana_prasarana">Sarana Prasarana</a>
            </div>
          </div>
          <a class="hover:text-gray-300" href="<?= BASEURL ?>/ekskul">
            Ekstrakulikuler
          </a>
          <a class="hover:text-gray-300" href="<?= BASEURL ?>/kontak">
            Kontak
          </a>
          <a class="hover:text-gray-300" href="<?= BASEURL ?>/berita">
            Berita
          </a>
          <a class="hover:text-gray-300" href="<?= BASEURL ?>/login">
            Login
          </a>
        </nav>
        <div class="md:hidden">
          <button class="text-white focus:outline-none" id="menu-btn">
            <i class="fas fa-bars">
            </i>
          </button>
        </div>
      </div>
      <div class="hidden md:hidden px-4" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
          <div id="toggle-dropdown" class="relative dropdown">
            <a class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#A5CAA0]">
              Tentang Kami
              <i class="fas fa-caret-down">
              </i>
            </a>
            <div id="dropdown-menu-mbl" class="hidden bg-white text-black mt-2 rounded shadow-lg">
              <a class="block px-4 py-2 hover:bg-[#A5CAA0]" href="<?= BASEURL ?>/profil">
                Profil
              </a>
              <a class="block px-4 py-2 hover:bg-[#A5CAA0]" href="<?= BASEURL ?>/visi_misi">
                Visi dan Misi
              </a>
              <a class="block px-4 py-2 hover:bg-[#A5CAA0]" href="<?= BASEURL ?>/guru">
                Guru dan Karyawan
              </a>
              <a class="block px-4 py-2 hover:bg-[#A5CAA0]" href="<?= BASEURL ?>/sarana_prasarana">
                Sarana Prasarana
              </a>
            </div>
          </div>
          <a class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#A5CAA0]" href="<?= BASEURL ?>/ekskul">
            Ekstrakulikuler
          </a>
          <a class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#A5CAA0]" href="<?= BASEURL ?>/kontak">
            Kontak
          </a>
          <a class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#A5CAA0]" href="<?= BASEURL ?>/berita">
            Berita
          </a>
          <a class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#A5CAA0]" href="<?= BASEURL ?>/login">
            Login
          </a>
        </div>
      </div>
    </header>
    <script>
      document.getElementById('menu-btn').addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        if (menu.classList.contains('hidden')) {
          menu.classList.remove('hidden');
        } else {
          menu.classList.add('hidden');
        }
      });
      // Tombol "Tentang Kami" dan menu dropdown
      const toggleDropdownBtn = document.getElementById('toggle-dropdown');
      const dropdownMenu = document.getElementById('dropdown-menu-mbl');

      // Event listener untuk membuka/menutup menu dropdown
      toggleDropdownBtn.addEventListener('click', function() {
        if (dropdownMenu.classList.contains('hidden')) {
          dropdownMenu.classList.remove('hidden'); // Tampilkan dropdown
        } else {
          dropdownMenu.classList.add('hidden'); // Sembunyikan dropdown
        }
      });

      // Tambahkan logika untuk menutup dropdown ketika klik di luar area dropdown
      document.addEventListener('click', function(event) {
        const isClickInside = toggleDropdownBtn.contains(event.target) || dropdownMenu.contains(event.target);
        if (!isClickInside) {
          dropdownMenu.classList.add('hidden'); // Sembunyikan dropdown
        }
      });


      document.querySelectorAll('.dropdown').forEach(function(dropdown) {
        const dropdownMenu = dropdown.querySelector('.dropdown-menu');
        let timeout;

        dropdown.addEventListener('mouseenter', function() {
          clearTimeout(timeout); // Hentikan timeout jika mouse masuk
          dropdownMenu.classList.remove('hidden');
        });

        dropdown.addEventListener('mouseleave', function() {
          // Set timeout untuk menutup dropdown setelah 2 detik
          timeout = setTimeout(function() {
            dropdownMenu.classList.add('hidden');
          }, 30); // 2000 ms = 2 detik
        });
      });
    </script>
  </body>

  </html>