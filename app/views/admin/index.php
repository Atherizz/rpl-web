<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>
<main class="container mx-auto py-12 px-6">
        <a href="<?=BASEURL?>/home"class="logout-button" onclick="return confirm('apakah anda yakin ingin logout?')">Logout</a>
        <h2 class="text-2xl font-bold text-green-800 mb-6">Admin Menu</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Upload Berita Section -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Upload Berita</h3>
                <form method="POST" action="<?=BASEURL?>/admin/uploadNews" enctype="multipart/form-data">
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
                    <p style="font-style: italic; color: red;"><?= (isset($data['error'])) ? $data['error'] : ''?></p>
                </form>
            </div>

            <!-- Upload Carousel Section -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Upload Foto Carousel</h3>
                <form method="POST" action="<?=BASEURL?>/admin/uploadImage" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="carousel-gambar" class="block text-gray-700 font-bold mb-2">Upload Gambar:</label>
                        <input type="file" id="carousel-gambar" name="picture" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <button type="submit" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-700">Upload Gambar</button>
                    <p style="font-style: italic; color: red;"><?= (isset($data['error'])) ? $data['error'] : ''?></p>
                    </form>
                </form>
            </div>

            <!-- Upload Prestasi Section -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Upload Prestasi</h3>
                <form>
                    <div class="mb-4">
                        <label for="prestasi-judul" class="block text-gray-700 font-bold mb-2">Judul Prestasi:</label>
                        <input type="text" id="prestasi-judul" name="prestasi-judul" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <div class="mb-4">
                        <label for="prestasi-tanggal" class="block text-gray-700 font-bold mb-2">Tanggal:</label>
                        <input type="date" id="prestasi-tanggal" name="prestasi-tanggal" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <div class="mb-4">
                        <label for="prestasi-gambar" class="block text-gray-700 font-bold mb-2">Upload Gambar:</label>
                        <input type="file" id="prestasi-gambar" name="prestasi-gambar" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    </div>
                    <button type="submit" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-700">Upload Prestasi</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>