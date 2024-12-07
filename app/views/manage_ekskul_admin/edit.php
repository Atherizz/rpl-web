<?php 

if(!isset($_SESSION['login'])) {
    header('Location: ' . BASEURL . '/login/index');
    exit;
}


?>


<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-center text-2xl font-bold text-green-700 mb-8">
            Edit Ekskul
        </h1>
        <div class="bg-white rounded-lg shadow-md p-6">
            <form method="POST" action="<?= BASEURL ?>/manage_ekskul_admin/editById" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['data']['id'] ?>">
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="nama_ekskul">
                        Nama Ekskul
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="nama_ekskul" name="nama_ekskul"
                        type="text" value="<?= $data['data']['nama_ekskul'] ?>"
                        placeholder="Masukkan nama ekskul" />
                </div>
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="pembina">
                        Nama Pembina Ekskul
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="pembina" name="pembina"
                        type="text" value="<?= $data['data']['pembina'] ?>"
                        placeholder="Masukkan nama pembina ekskul" />
                </div>
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="gambar">
                        Gambar
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="gambar" value="<?= $data['data']['img'] ?>"
                        type="file" name="img"
                        accept="image/*" required />
                </div>
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="teks">
                        Deskripsi Ekskul
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="teks"
                        name="deskripsi"
                        rows="5"
                        placeholder="Masukkan deskripsi ekskul"><?= $data['data']['deskripsi'] ?></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit" name="submit">
                        Simpan
                    </button>
                    <a
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                     href="<?=BASEURL?>/manage_ekskul_admin/index"
                    >
                    Batal
                    </a>
                </div>
            </form>
        </div>
    </div>