<main class="bg-white">
    <!-- Hero Section -->
    <section class="relative h-screen md:h-[600px] overflow-hidden">
        <div class="relative w-full h-full">
            <div class="carousel">
                <?php foreach ($data['carousel'] as $row) : ?>
                    <div class="carousel-item">
                        <img alt="School Banner 1" class="w-full h-full object-cover" src="<?= BASEURL ?>/img/carousel/<?= $row['img'] ?>" />
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
    </section>
    <!-- Statistics Section -->
    <section class="bg-[#81A37D] py-2">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold  text-[#EBE2B0]">SD NEGERI DINOYO 4</h2>
        </div>
    </section>
    <section class="bg-[#A5CAA0] text-white py-8">
        <div class="container mx-auto text-center">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class = "animate-count">
                    <i class="fas fa-user-graduate text-4xl mb-2"> </i>
                    <!-- Kalau mau ubah tampilan jumlah di dalam data target -->
                    <p class="text-5xl font-bold mb-2" data-target="355">0</p> 
                    <p>Jumlah Peserta Didik</p>
                </div>
                <div class = "animate-count">
                    <i class="fas fa-chalkboard-teacher text-4xl mb-2"> </i>
                    <p class="text-5xl font-bold mb-2" data-target="24">0</p>
                    <p>Jumlah Guru</p>
                </div>
                <div class = "animate-count">
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
    }, 10); // Speed animation
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
</script>
<style>
    .animate-count {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid white;
    border-radius: 5px;
    padding: 1rem;
    }
    .carousel-item {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
    position: absolute;
    width: 100%;
    height: 100%;
}

.carousel-item.active {
    opacity: 1;
}
</style>