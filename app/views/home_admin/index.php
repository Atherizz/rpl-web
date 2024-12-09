<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="flex justify-end space-x-4 p-4">
        <a href="<?= BASEURL ?>/home_admin/tambah" class="bg-green-700 text-white px-4 py-2 rounded-md text-sm font-bold hover:bg-green-700 transition duration-300">Tambah Berita</a>
        <a href="<?= BASEURL ?>/home_admin/tambahCarousel" class="bg-green-700 text-white px-4 py-2 rounded-md text-sm font-bold hover:bg-green-700 transition duration-300">Tambah Carousel</a>
    </div>
<section class="container mx-auto py-8">
    <h2 class="text-center text-2xl font-bold text-green-800 mb-8">
        CAROUSEL SD NEGERI DINOYO 4
    </h2>
    <?php if (isset($data['add'])) : ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold"><?= $data['add'] ?></strong>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <i class="fas fa-times cursor-pointer" onclick="closeAlert(event)"></i>
            </span>
        </div>
    <?php endif; ?>
    <?php if (isset($data['delete'])) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold"><?= $data['delete'] ?></strong>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <i class="fas fa-times cursor-pointer" onclick="closeAlert(event)"></i>
            </span>
        </div>
    <?php endif; ?>
    <?php if (isset($data['edit'])) : ?>
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold"><?= $data['edit'] ?></strong>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <i class="fas fa-times cursor-pointer" onclick="closeAlert(event)"></i>
            </span>
        </div>
    <?php endif; ?>
    <div class="flex flex-wrap justify-center gap-8">
        <?php foreach ($data['carousel'] as $row) : ?>
            <div class="carousel-item bg-white shadow-md w-80 flex flex-col">
                <img
                    alt="School Event"
                    class="h-80 object-cover"
                    src="<?= BASEURL; ?>/img/carousel/<?= $row['img'] ?>"
                    width="400" />
                <div class="carousel-buttons">
                    <a href="<?= BASEURL; ?>/home_admin/deleteCarousel/<?= $row['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('apakah anda yakin ingin menghapus berita?')">Delete</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
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
                    width="400" />
                <div class="p-4 flex-1">
                    <p class="text-gray-500 text-sm"><?= $row['date'] ?></p>
                    <h3 class="text-xl font-bold text-green-800"><?= $row['title'] ?></h3>
                    <p class="text-gray-700">
                        <?= implode(' ', array_slice(explode(' ', $row['word']), 0, 20)) . (str_word_count($row['word']) > 50 ? '...' : ''); ?>
                    </p>
                    <a class="text-green-800 hover:underline" href="<?= BASEURL; ?>/home_admin/detailNews/<?= $row['id'] ?>">
                        Baca Selengkapnya
                    </a>
                </div>
                <div class="flex justify-between p-4 border-t">
                    <a href="<?= BASEURL; ?>/home_admin/editNews/<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a>
                    <a href="<?= BASEURL; ?>/home_admin/deleteNews/<?= $row['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('apakah anda yakin ingin menghapus berita?')">Delete</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>
<style>
        .carousel-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px; /* Space between carousel items */
    }
    .carousel-item img {
        max-width: 100%; /* Ensure images are responsive */
        height: auto; /* Maintain aspect ratio */
    }
    .carousel-buttons {
        display: flex;
        justify-content: space-between;
        width: 100%;
        padding: 10px 0;
    }
</style>
<script>
        function closeAlert(event) {
            event.target.parentElement.parentElement.style.display = 'none';
        }
</script>