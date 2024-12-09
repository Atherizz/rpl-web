<html lang="en">
<body>
    <section class="bg-[#D5D3D3] py-2">
        <div class="container mx-auto ">
            <h2 class="text-2xl font-bold text-gray-700 ml-12">Sarana Prasarana</h2>
        </div>
    </section>
    <main class="max-w-7xl mx-auto p-4">
        <div class="space-y-2">
            <button class="w-full bg-[B7DCB8] text-bold p-4 rounded-lg flex justify-between items-center" onclick="toggleContent('perpustakaan')">
                <span>PERPUSTAKAAN</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div id="perpustakaan" class="hidden bg-[EBF7F5] p-4 rounded-lg shadow-md">
            <img alt="Library with bookshelves and reading area" class="w-full h-auto rounded-lg mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/eaCe9JWP2lkuSEXemhIXvCAjQ1fRXif09Sc4VqvP4pV8agIfE.jpg" width="600"/>
            <p class="text-bold">
                Perpustakaan di SDN Dinoyo 4 terletak di lantai dua sekolah tersebut, menawarkan fasilitas untuk mendukung kegiatan belajar mengajar para siswa. Perpustakaan ini menyediakan berbagai koleksi buku yang dapat diakses oleh siswa untuk memperkaya wawasan mereka, serta mendukung pengembangan literasi di kalangan pelajar. Dengan suasana yang tenang dan nyaman, diharapkan perpustakaan ini dapat menjadi tempat yang menyenangkan untuk belajar dan membaca. Selain buku teks, perpustakaan juga menyediakan bahan bacaan lain yang mendukung pengembangan keterampilan kognitif dan kreativitas siswa. Fasilitas ini diharapkan dapat mendukung pembelajaran yang lebih efektif dan menyenangkan bagi siswa-siswa SDN Dinoyo 4
            </p>               
            </div>
            <button class="w-full bg-[B7DCB8] text-bold p-4 rounded-lg flex justify-between items-center" onclick="toggleContent('ruang-guru')">
                <span>RUANG GURU</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div id="ruang-guru" class="hidden bg-[EBF7F5] p-4 rounded-lg shadow-md">
                <p class="text-bold">Content for Ruang Guru...</p>
            </div>
            <button class="w-full bg-[B7DCB8] text-bold p-4 rounded-lg flex justify-between items-center" onclick="toggleContent('musholla')">
                <span>MUSHOLLA</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div id="musholla" class="hidden bg-[EBF7F5] p-4 rounded-lg shadow-md">
                <p class="text-bold">Content for Musholla...</p>
            </div>
            <button class="w-full bg-[B7DCB8] text-bold p-4 rounded-lg flex justify-between items-center" onclick="toggleContent('kantin')">
                <span>KANTIN</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div id="kantin" class="hidden bg-[EBF7F5] p-4 rounded-lg shadow-md">
                <p class="text-bold">Content for Kantin...</p>
            </div>
            <button class="w-full bg-[B7DCB8] text-bold p-4 rounded-lg flex justify-between items-center" onclick="toggleContent('lab-bahasa')">
                <span>LAB. BAHASA</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div id="lab-bahasa" class="hidden bg-[EBF7F5] p-4 rounded-lg shadow-md">
                <p class="text-bold">Content for Lab. Bahasa...</p>
            </div>
        </div>
    </main>
    <script>
        function toggleContent(id) {
            const content = document.getElementById(id);
            content.classList.toggle('hidden');
        }
    </script>
</body>
</html>