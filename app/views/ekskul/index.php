<body class="bg-gray-100">
    <div class="max-w-5xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg">
        <h1 class="text-3xl font-bold text-center text-green-700 mb-6">EKSTRAKURIKULER</h1>

        <p class="text-gray-600 text-center mb-8">
            Kegiatan ekstrakurikuler adalah kegiatan tambahan yang dilakukan di luar jam pelajaran, bertujuan untuk menambah pengetahuan, keterampilan, dan wawasan serta membantu membentuk karakter peserta didik sesuai dengan minat dan bakat masing-masing.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Daftar Ekstrakurikuler di SDN Dinoyo 4 Malang</h2>

        <!-- Looping Data Ekstrakurikuler -->
        <?php foreach ($data['data'] as $index => $ekskul): ?>
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-700"> <?= ($index + 1) . '. ' . $ekskul['nama_ekskul']; ?> </h3>
                <div class="mt-4">
                    <img
                        src="<?= BASEURL; ?>/img/ekskul/<?= $ekskul['img'] ?>"
                        alt="<?= $ekskul['nama_ekskul']; ?>" class="w-80 h-48 object-cover rounded-lg shadow-lg mb-4">
                    <h4 class="text-lg text-gray-900">Pembina: <?= $ekskul['pembina']; ?></h4>
                    <p class="text-gray-600"><?= $ekskul['deskripsi']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>