<meta name="viewport" content="width=device-width, initial-scale=1.0">

<main class="bg-white">
    <!-- Hero Section -->
    <section class="relative h-[420px] md:h-[500px] lg:h-[600px] overflow-hidden">
            <div class="relative w-full h-full">
                <div class="carousel">
                    <?php foreach ($data['carousel'] as $row) : ?>
                        <div class="carousel-item">
                            <img alt="School Banner 1" class="w-full h-full object-cover" src="<?= BASEURL ?>/img/carousel/<?= $row['img'] ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center xl:hidden">
                <div class="text-center text-white">
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-bold">SD NEGERI DINOYO 4</h1>
                    <p class="text-xl font-serif">"TATA TITI TITIS"</p>
                </div>
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden md:hidden sm:hidden xl:grid">
                <div class="text-center text-white">
                    <h1 class="text-4xl font-bold">SD NEGERI DINOYO 4</h1>
                    <p class="text-xl font-serif">"TATA TITI TITIS"</p>
                </div>
            </div>
            <button id="prev" class="absolute top-1/2 left-0 transform -translate-y-1/2 text text-white p-2">&#10094;</button>
            <button id="next" class="absolute top-1/2 right-0 transform -translate-y-1/2 text-white p-2">&#10095;</button>
    </section>
    <section class="container mx-auto py-8">
        <h2 class="text-center text-2xl font-bold text-[#3C583D] mb-8">
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
                        width="400" />
                    <div class="p-4 flex-1">
                        <p class="text-gray-500 text-sm"><?= $row['date'] ?></p>
                        <h3 class="text-xl font-bold text-green-800"><?= $row['title'] ?></h3>
                        <p class="text-gray-700">
                            <?= implode(' ', array_slice(explode(' ', $row['word']), 0, 20)) . (str_word_count($row['word']) > 50 ? '...' : ''); ?>
                        </p>
                        <a class="text-green-800 hover:underline" href="<?= BASEURL ?>/home/detail/<?= $row['id'] ?>">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <nav class="inline-flex -space-x-px">
                <!-- Tombol Previous -->
                <?php if ($data['currentPage'] > 1): ?>
                    <a href="<?= BASEURL ?>?page=<?= $data['currentPage'] - 1 ?>"
                        class="px-3 py-2 border border-gray-300 text-gray-500 hover:text-green-800">
                        Previous
                    </a>
                <?php endif; ?>

                <!-- Tombol Angka Halaman -->
                <?php for ($i = 1; $i <= $data['totalPages']; $i++) : ?>
                    <a href="<?= BASEURL ?>?page=<?= $i ?>"
                        class="px-3 py-2 border border-gray-300 <?= $i == $data['currentPage'] ? 'bg-green-800 text-white' : 'text-gray-500 hover:text-green-800' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <!-- Tombol Next -->
                <?php if ($data['currentPage'] < $data['totalPages']): ?>
                    <a href="<?= BASEURL ?>?page=<?= $data['currentPage'] + 1 ?>"
                        class="px-3 py-2 border border-gray-300 text-gray-500 hover:text-green-800">
                        Next
                    </a>
                <?php endif; ?>
            </nav>
        </div>

    </section>
    <!-- Statistics Section -->
    <section class="bg-[#81A37D] py-2">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold  text-[#EBE2B0]">SD NEGERI DINOYO 4</h2>
        </div>
    </section>
    <section class="bg-[#A5CAA0] text-white py-8">
        <div class="counter-container mx-auto text-center">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="animate-count">
                    <i class="fas fa-user-graduate text-4xl mb-2"> </i>
                    <!-- Kalau mau ubah tampilan jumlah di dalam data target -->
                    <p class="text-5xl font-bold mb-2" data-target="355">0</p> 
                    <p>Jumlah Peserta Didik</p>
                </div>
                <div class="animate-count">
                    <i class="fas fa-chalkboard-teacher text-4xl mb-2"> </i>
                    <p class="text-5xl font-bold mb-2" data-target="24">0</p>
                    <p>Jumlah Guru</p>
                </div>
                <div class="animate-count">
                    <i class="fas fa-users text-4xl mb-2"> </i>
                    <p class="text-5xl font-bold mb-2" data-target="12">0</p>
                    <p>Jumlah Karyawan</p>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    // Count Animation
    const countElements = document.querySelectorAll('.animate-count');

    countElements.forEach(element => {
        const targetNumber = parseInt(element.querySelector('p[data-target]').getAttribute('data-target'));
        const countElement = element.querySelector('p');

        let start = 0;
        const increment = targetNumber / 75;
        const interval = setInterval(() => {
            start += increment;
            countElement.textContent = Math.round(start);

            if (start >= targetNumber) {
                clearInterval(interval);
                countElement.textContent = targetNumber;
            }
        }, 15); // Speed animation
    });
    // carousel
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');
    const totalItems = items.length;
    let currentIndex = 0;

    document.getElementById('next').addEventListener('click', () => {
        items[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % totalItems;
        items[currentIndex].classList.add('active');
    });

    document.getElementById('prev').addEventListener('click', () => {
        items[currentIndex].classList.remove('active');
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        items[currentIndex].classList.add('active');
    });

    // Initialize carousel
    items.forEach((item, index) => {
        if (index !== 0) {
            item.classList.remove('active');
        } else {
            item.classList.add('active');
        }
    });
    // Auto slide carousel
    const autoSlideInterval = 6000; // Set the interval time in milliseconds

    setInterval(() => {
        items[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % totalItems;
        items[currentIndex].classList.add('active');
    }, autoSlideInterval);
</script>
<style>
    .animate-count {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid white;
    border-radius: 5px;
    padding: 1rem;
    margin-left: 1rem;
    margin-right: 1rem;
    }
    .carousel-item {
        opacity: 0;
        transition: opacity 2s ease-in-out;
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .carousel-item.active {
        opacity: 1;
    }
</style>