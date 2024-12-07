<html>

<head>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>
    SDN Dinoyo 4
  </title>
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
    }
  </style>
</head>

<body class="font-roboto">
  <!-- Header -->
  <header class="bg-[#3C583D] text-white">
    <div class="container mx-auto flex justify-between items-center py-4 px-4 md:px-8">
      <div class="flex items-center">
        <img alt="School Logo" class="h-10 w-10 mr-2" height="50" src="<?= BASEURL ?>/img/asset/logo-sd.png" width="50" />
        <a class="text-xl font-bold" href="#">
          <h1 class="text-xl font-bold">
            SDN DINOYO 4
          </h1>
        </a>
      </div>
      <nav class="hidden md:flex space-x-4">
        <div class="relative dropdown">
          <a class="hover:text-gray-300 cursor-pointer">
            Tentang Kami
            <i class="fas fa-caret-down">
            </i>
          </a>
          <div class="absolute hidden dropdown-menu bg-white text-black mt-2 rounded shadow-lg">
            <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/profil">
              Profil
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/visi_misi">
              Visi dan Misi
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Sejarah
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Kepala Sekolah
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/guru">
              Guru
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Sarana Prasarana
            </a>
          </div>
        </div>
        <div class="relative dropdown">
          <a class="hover:text-gray-300 cursor-pointer">
            Kesiswaan
            <i class="fas fa-caret-down">
            </i>
          </a>
          <div class="absolute hidden dropdown-menu bg-white text-black mt-2 rounded shadow-lg">
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Kurikulum
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Kegiatan
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/ekskul">
              Ekstrakulikuler
            </a>
          </div>
        </div>
        <a class="hover:text-gray-300" href="<?= BASEURL ?>/kontak">
          Kontak
        </a>
        <a class="hover:text-gray-300" href="#">
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
        <div class="relative dropdown">
          <a class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700 cursor-pointer">
            Tentang Kami
            <i class="fas fa-caret-down">
            </i>
          </a>
          <div class="hidden dropdown-menu bg-white text-black mt-2 rounded shadow-lg">
            <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/profil">
              Profil
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/visi_misi">
              Visi dan Misi
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Sejarah
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Kepala Sekolah
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/guru">
              Guru
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Sarana Prasarana
            </a>
          </div>
        </div>
        <div class="relative dropdown">
          <a class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700 cursor-pointer">
            Kesiswaan
            <i class="fas fa-caret-down">
            </i>
          </a>
          <div class="hidden dropdown-menu bg-white text-black mt-2 rounded shadow-lg">
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Kurikulum
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Kegiatan
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/ekskul">
              Ekstrakulikuler
            </a>
          </div>
        </div>
        <a class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700" href="<?= BASEURL ?>/kontak">
          Kontak
        </a>
        <a class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700" href="#">
          Berita
        </a>
        <a class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700" href="<?= BASEURL ?>/login">
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
  </script>
</body>

</html>