<main class="bg-white">
<!-- Hero Section -->
<section class="relative h-screen md:h-[600px] overflow-hidden">
    <div class="relative w-full h-full">
        <div class="carousel">
                <?php foreach ($data['carousel'] as $row)  : ?>
                <div class="carousel-item">
                    <img alt="School Banner 1" class="w-full h-full object-cover" src="<?=BASEURL?>/img/news/<?=$row['img']?>" />
                </div>
                <?php endforeach; ?>
            </div>
            <button class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white p-2" id="prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white p-2" id="next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>
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
                        src="<?= BASEURL; ?>/img/news/<?= $row['img'] ?>"
                        width="400"
                    />
                    <div class="p-4 flex-1">
                        <p class="text-gray-500 text-sm"><?= $row['date'] ?></p>
                        <h3 class="text-xl font-bold text-green-800"><?= $row['title'] ?></h3>
                        <p class="text-gray-700">
                            <?= implode(' ', array_slice(explode(' ', $row['word']), 0, 20)) . (str_word_count($row['word']) > 50 ? '...' : ''); ?>
                        </p>
                        <a class="text-green-800 hover:underline" href="<?=BASEURL?>/home/detail/<?=$row['id'] ?>">
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
<script>
   const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');
    const totalItems = items.length;
    let currentIndex = 0;

    document.getElementById('next').addEventListener('click', () => {
        items[currentIndex].classList.remove('block');
        items[currentIndex].classList.add('hidden');
        currentIndex = (currentIndex + 1) % totalItems;
        items[currentIndex].classList.remove('hidden');
        items[currentIndex].classList.add('block');
    });

    document.getElementById('prev').addEventListener('click', () => {
        items[currentIndex].classList.remove('block');
        items[currentIndex].classList.add('hidden');
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        items[currentIndex].classList.remove('hidden');
        items[currentIndex].classList.add('block');
    });

    // Initialize carousel
    items.forEach((item, index) => {
        if (index !== 0) {
            item.classList.add('hidden');
        } else {
            item.classList.add('block');
        }
    });
  </script>
 