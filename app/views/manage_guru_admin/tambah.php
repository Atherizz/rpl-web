<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-center text-2xl font-bold text-green-700 mb-8">
            Tambah Data Guru
        </h1>
        <div class="bg-white rounded-lg shadow-md p-6">
            <form method="POST" action="<?= BASEURL ?>/manage_guru_admin/uploadGuru" enctype="multipart/form-data">
                <input type="hidden" name="id">
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="nama_ekskul">
                        Nama Guru
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="nama_ekskul" name="nama"
                        type="text"
                        placeholder="Masukkan nama guru" />
                </div>
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="pembina">
                        Jabatan
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="pembina" name="jabatan"
                        type="text" 
                        placeholder="Masukkan jabatan" />
                </div>
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="gambar">
                        Gambar
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="gambar"
                        type="file" name="img"
                        accept="image/*" required />
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit" name="submit">
                        Simpan
                    </button>
                    <a
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                     href="<?=BASEURL?>/manage_guru_admin/index"
                    >
                    Batal
                    </a>
                </div>
            </form>
        </div>
    </div>