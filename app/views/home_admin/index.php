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
                <div class="flex justify-between p-4 border-t">
                    <a href="<?= BASEURL; ?>/edit/<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a>
                    <a href="<?= BASEURL; ?>/delete/<?= $row['id'] ?>" class="text-red-600 hover:underline">Delete</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>