<html>

<head>
  <title>SDN Dinoyo 4</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap"
    rel="stylesheet" />
</head>

<body class="font-roboto">
  <!-- Header -->
  <header class="bg-green-800 text-white">
    <div class="container mx-auto flex justify-between items-center py-4">
      <div class="flex items-center">
        <img
          alt="School Logo"
          class="h-10 w-10 mr-2"
          height="50"
          src="<?= BASEURL ?>/img/asset/logo-sd.png"
          width="50" />
        <h1 class="text-xl font-bold">SDN DINOYO 4</h1>
      </div>
      <nav class="flex space-x-4">
        <a class="hover:text-gray-300" href="<?= BASEURL ?>/home_admin"> Home </a>
        <a class="hover:text-gray-300" href="<?= BASEURL ?>/manage_ekskul_admin"> Manage Ekskul </a>
        <a class="hover:text-gray-300" href="<?= BASEURL ?>/admin"> Admin </a>
      </nav>
    </div>
  </header>