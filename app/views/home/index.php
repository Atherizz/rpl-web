<main class="bg-white">
    <!-- Hero Section -->
    <section class="relative">
        <img
            alt="School Banner"
            class="w-full"
            height="400"
            src="https://storage.googleapis.com/a1aa/image/wIdWe3YpleiNOUeaWfsocz9xpkRjtsJk1nPiBIwjAJ5FA5QPB.jpg"
            width="1200"
        />
    </section>
    <!-- Information Section -->
    <section class="container mx-auto py-8">
        <h2 class="text-center text-2xl font-bold text-green-800 mb-8">
            INFORMASI SD NEGERI DINOYO 4
        </h2>
        <div class="flex flex-wrap justify-center gap-8">
            <!-- News Item -->
            <?php foreach ($data['news'] as $row) : ?>
                <div class="bg-white shadow-md w-80 flex flex-col">
                    <img
                        alt="School Event"
                        class="h-80 object-cover"
                        src="<?= BASEURL; ?>/img/<?= $row['img'] ?>"
                        width="400"
                    />
                    <div class="p-4 flex-1">
                        <p class="text-gray-500 text-sm"><?= $row['date'] ?></p>
                        <h3 class="text-xl font-bold text-green-800"><?= $row['title'] ?></h3>
                        <p class="text-gray-700">
                            <?= implode(' ', array_slice(explode(' ', $row['word']), 0, 20)) . (str_word_count($row['word']) > 50 ? '...' : ''); ?>
                        </p>
                        <a class="text-green-800 hover:underline" href="#">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <!-- Statistics Section -->
    <section class="bg-green-800 text-white py-8">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-8">SD NEGERI DINOYO 4</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <i class="fas fa-user-graduate text-4xl mb-2"> </i>
                    <p class="text-4xl font-bold">335</p>
                    <p>Jumlah Peserta Didik</p>
                </div>
                <div>
                    <i class="fas fa-chalkboard-teacher text-4xl mb-2"> </i>
                    <p class="text-4xl font-bold">24</p>
                    <p>Jumlah Guru</p>
                </div>
                <div>
                    <i class="fas fa-users text-4xl mb-2"> </i>
                    <p class="text-4xl font-bold">12</p>
                    <p>Jumlah Karyawan</p>
                </div>
            </div>
        </div>
    </section>
</main>