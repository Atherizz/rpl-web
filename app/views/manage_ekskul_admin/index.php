<?php 
if(!isset($_SESSION['login'])) {
    header('Location: ' . BASEURL . '/login/index');
    exit;
}

?>




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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="flex justify-end space-x-4 p-4">
        <a href="<?= BASEURL ?>/manage_ekskul_admin/tambah" class="bg-green-700 text-white px-4 py-2 rounded-md text-sm font-bold hover:bg-green-700 transition duration-300 mr-4">Tambah Data</a>
    </div>
<section class="container mx-auto py-8">
    <h2 class="text-center text-2xl font-bold text-green-800 mb-8">
        EKSTRAKURIKULER SD NEGERI DINOYO 4
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
        <!-- News Item -->
        <?php foreach ($data['data'] as $row) : ?>
            <div class="bg-white shadow-md w-80 flex flex-col">
                <img
                    alt="School Event"
                    class="h-80 object-cover"
                    src="<?= BASEURL; ?>/img/ekskul/<?= $row['img'] ?>"
                    width="400" />
                <div class="p-4 flex-1">
                    <h3 class="text-xl font-bold text-green-800"><?= $row['nama_ekskul'] ?></h3>
                    <p class="text-gray-700">
                        <?= implode(' ', array_slice(explode(' ', $row['deskripsi']), 0, 20)) . (str_word_count($row['deskripsi']) > 50 ? '...' : ''); ?>
                    </p>
                    <a class="text-green-800 hover:underline" href="<?= BASEURL; ?>/manage_ekskul_admin/detailEkskul/<?= $row['id'] ?>">
                        Baca Selengkapnya
                    </a>
                </div>
                <div class="flex justify-between p-4 border-t">
                    <a href="<?= BASEURL; ?>/manage_ekskul_admin/editEkskul/<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a>
                    <a href="<?= BASEURL; ?>/manage_ekskul_admin/deleteEkskul/<?= $row['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('apakah anda yakin ingin menghapus ekskul ini?')">Delete</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>