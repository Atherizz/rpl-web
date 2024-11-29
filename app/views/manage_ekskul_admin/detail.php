<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['data']['nama_ekskul'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto my-10 px-4">
        <!-- Header Section -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6"><?= $data['data']['nama_ekskul'] ?></h1>

        <!-- Card Container -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Image Section -->
            <div class="flex justify-center">
                <img src="/rpl-web/public/img/ekskul/<?= $data['data']['gambar'] ?>" class="object-cover rounded-lg mt-5 h-64">
            </div>

            <!-- Description Section -->
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deskripsi</h2>
                <p class="text-gray-600 leading-relaxed"><?= nl2br($data['data']['deskripsi']) ?></p>
            </div>
        </div>
    </div>

</body>

</html>