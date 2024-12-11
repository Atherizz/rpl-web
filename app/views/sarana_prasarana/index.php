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
            <img alt="Library with bookshelves and reading area" class="w-full h-auto rounded-lg mb-4" height="500" src="<?= BASEURL; ?>/img/sarpras/perpus.jpg" width="600"/>        
            </div>
            <button class="w-full bg-[B7DCB8] text-bold p-4 rounded-lg flex justify-between items-center" onclick="toggleContent('musholla')">
                <span>MUSHOLLA</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div id="musholla" class="hidden bg-[EBF7F5] p-4 rounded-lg shadow-md">
            <img alt="Library with bookshelves and reading area" class="w-full h-auto rounded-lg mb-4" height="500" src="<?= BASEURL; ?>/img/sarpras/Musholla.jpg" width="600"/>
            </div>
            <button class="w-full bg-[B7DCB8] text-bold p-4 rounded-lg flex justify-between items-center" onclick="toggleContent('kelas')">
                <span>KELAS</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div id="kelas" class="hidden bg-[EBF7F5] p-4 rounded-lg shadow-md">
            <img alt="Library with bookshelves and reading area" class="w-full h-auto rounded-lg mb-4 " height="500" src="<?= BASEURL; ?>/img/sarpras/Kelas.jpg" width="600"/>
            </div>
            <button class="w-full bg-[B7DCB8] text-bold p-4 rounded-lg flex justify-between items-center" onclick="toggleContent('uks')">
                <span>UKS</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div id="uks" class="hidden bg-[EBF7F5] p-4 rounded-lg shadow-md">
            <img alt="Library with bookshelves and reading area" class="w-full h-auto rounded-lg mb-4" height="500" src="<?= BASEURL; ?>/img/sarpras/UKS.jpg" width="600"/>
            </div>
            <button class="w-full bg-[B7DCB8] text-bold p-4 rounded-lg flex justify-between items-center" onclick="toggleContent('lab-bahasa')">
                <span>LAB. BAHASA</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div id="lab-bahasa" class="hidden bg-[EBF7F5] p-4 rounded-lg shadow-md">
            <img alt="Library with bookshelves and reading area" class="w-full h-auto rounded-lg mb-4" height="500" src="<?= BASEURL; ?>/img/sarpras/LABBHS.jpg" width="600"/>
            </div>
            <button class="w-full bg-[B7DCB8] text-bold p-4 rounded-lg flex justify-between items-center" onclick="toggleContent('panggung')">
                <span>PANGGUNG</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div id="panggung" class="hidden bg-[EBF7F5] p-4 rounded-lg shadow-md">
            <img alt="Library with bookshelves and reading area" class="w-full h-auto rounded-lg mb-4" height="500" src="<?= BASEURL; ?>/img/sarpras/Panggung.jpg" width="600"/>
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