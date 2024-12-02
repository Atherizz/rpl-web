<style>
    .logout-button {
        position: absolute;
        top: 100px;
        right: 20px;
        background-color: green;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 2px;
        cursor: pointer;
        font-weight: bold;
    }
</style>

<a href="<?= BASEURL ?>/home_admin/tambah" class="logout-button">Tambah Data</a>
<section class="container mx-auto py-8">

    <h2 class="text-center text-2xl font-bold text-green-800 mb-8">
        INFORMASI SD NEGERI DINOYO 4
    </h2>
    <?php if (isset($data['info'])) : ?>
        <p class="text-green-600 hover:underline"><?= $data['info'] ?></p>
    <?php endif; ?>
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
                    <a class="text-green-800 hover:underline" href="#">
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