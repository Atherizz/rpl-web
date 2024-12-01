
    <style>
        .logout-button {
            position: absolute;
            top: 100px;
            right: 20px;
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            font-weight: bold;

        }
    </style>

<body>
    <main class="container mx-auto py-12 px-6">        
        <h2 class="text-2xl font-bold text-green-800 mb-6">Admin Menu</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Upload Berita Section -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Upload Berita</h3>
                <form method="POST" action="<?= BASEURL ?>/admin/uploadNews" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 font-bold mb-2">Judul Berita:</label>
                        <input type="text" id="judul" name="title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <div class="mb-4">
                        <label for="tanggal" class="block text-gray-700 font-bold mb-2">Tanggal:</label>
                        <input type="date" id="tanggal" name="date" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <div class="mb-4">
                        <label for="konten" class="block text-gray-700 font-bold mb-2">Konten Berita:</label>
                        <textarea id="konten" name="word" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="gambar" class="block text-gray-700 font-bold mb-2">Upload Gambar:</label>
                        <input type="file" id="gambar" name="picture" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <button type="submit" name="submit" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-700">Upload Berita</button>
                    <p style="font-style: italic; color: red;"><?= (isset($data['error'])) ? $data['error'] : '' ?></p>
                </form>
            </div>

            <!-- Upload Ekskul Section -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Upload Ekstrakurikuler</h3>
                <form method="POST" action="<?= BASEURL ?>/admin/uploadEkskul" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 font-bold mb-2">Nama Ekskul:</label>
                        <input type="text" id="judul" name="nama_ekskul" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <div class="mb-4">
                        <label for="pembina" class="block text-gray-700 font-bold mb-2">Nama Pembina Ekskul:</label>
                        <input type="text" id="pembina" name="pembina" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <div class="mb-4">
                        <label for="konten" class="block text-gray-700 font-bold mb-2">Deskripsi:</label>
                        <textarea id="konten" name="deskripsi" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="gambar" class="block text-gray-700 font-bold mb-2">Upload Gambar:</label>
                        <input type="file" id="gambar" name="gambar" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <button type="submit" name="submit" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-700">Upload Ekskul</button>
                    <p style="font-style: italic; color: red;"><?= (isset($data['error'])) ? $data['error'] : '' ?></p>
                </form>
            </div>

            <!-- Upload Carousel Section -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Upload Foto Carousel</h3>
                <form method="POST" action="<?= BASEURL ?>/admin/uploadImage" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="carousel-gambar" class="block text-gray-700 font-bold mb-2">Upload Gambar:</label>
                        <input type="file" id="carousel-gambar" name="picture" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <button type="submit" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-700">Upload Gambar</button>
                    <p style="font-style: italic; color: red;"><?= (isset($data['error'])) ? $data['error'] : '' ?></p>
                </form>
                </form>
            </div>

    </main>
</body>

</html>