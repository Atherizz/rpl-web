<html>

<head>
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
      z-index: 9999;
      position: absolute;
      top: 100%;
      left: 0;
      min-width: 10rem;
      padding: 0.5rem 0;
      margin: 0.125rem 0 0;
      font-size: 1rem;
      color: #212529;
      text-align: left;
      list-style: none;
      background-color: #fff;
      border: 1px solid rgba(0, 0, 0, 0.15);
      border-radius: 0.25rem;
    }
  </style>
</head>

<body class="font-roboto">
  <!-- Header -->
  <header class="bg-green-800 text-white">
    <div class="container mx-auto flex justify-between items-center py-4">
      <div class="flex items-center">
        <img alt="School Logo" class="h-10 w-10 mr-2" height="50" src="<?= BASEURL ?>/img/asset/logo-sd.png" width="50" />
        <h1 class="text-xl font-bold">
          SDN DINOYO 4
        </h1>
      </div>
      <nav class="flex space-x-4">
        <a class="hover:text-gray-300" href="<?= BASEURL ?>/home">
          Home
        </a>
        <div class="relative dropdown">
          <a class="hover:text-gray-300 cursor-pointer">
            Tentang Kami
            <i class="fas fa-caret-down">
            </i>
          </a>
          <div class="absolute hidden dropdown-menu bg-white text-black mt-2 rounded shadow-lg">
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Profil
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/visi_misi">
              Visi dan Misi
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="#">
              Sejarah
            </a>
            <a class="block px-4 py-2 hover:bg-gray-200" href="<?= BASEURL ?>/guru">
              Data Guru
            </a>
          </div>
        </div>
        <div class="relative dropdown">
          <a class="hover:text-gray-300 cursor-pointer">
            Akademik
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
          </div>
        </div>
        <a class="hover:text-gray-300" href="<?= BASEURL ?>/kesiswaan">
          Kesiswaan
        </a>
        <a class="hover:text-gray-300" href="<?= BASEURL ?>/kontak">
          Kontak
        </a>
        <a class="hover:text-gray-300" href="<?= BASEURL ?>/login">
          Login
        </a>
      </nav>
    </div>
  </header>
</body>

</html>