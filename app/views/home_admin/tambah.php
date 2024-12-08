<script>
        function showSuccessAlert() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Berita berhasil ditambahkan!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= BASEURL ?>/home_admin/index';
                }
            });
        }
    </script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
      <h1 class="text-center text-2xl font-bold text-green-700 mb-8">
       Tambah Data Berita
      </h1>
      <div class="bg-white rounded-lg shadow-md p-6">
        <form method="POST" action="<?= BASEURL ?>/home_admin/uploadNews" enctype="multipart/form-data" >
          <input type="hidden" name="id" >
          <div class="mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="judul"
            >
              Judul
            </label> 
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="judul" name="title"
              type="text" 
              placeholder="Masukkan judul berita"
            />
          </div>
          <div class="mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="tanggal" 
            >
              Tanggal
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="tanggal" 
              type="date" name="date"
            />
          </div>
          <div class="mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="gambar" 
            >
              Gambar
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="gambar" 
              type="file" name="img" 
              accept="image/*" required
            />
          </div>
          <div class="mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="teks" 
            >
              Teks Berita
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="teks" name="word" 
              rows="5"
              placeholder="Masukkan teks berita"
            ></input>
          </div>
          <div class="flex items-center justify-between">
            <button
              class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit" name="submit"
            >
              Simpan
            </button>
            <a
              class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              href="<?=BASEURL?>/home_admin/index"
            >
              Batal
            </a>
          </div>
        </form>
      </div>
    </div>

