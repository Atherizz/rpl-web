<meta name="viewport" content="width=device-width, initial-scale=1.0">
<section class="bg-[#D5D3D3] py-2">
        <div class="container mx-auto ">
            <h2 class="text-2xl font-bold text-gray-700 ml-12">Guru & Karyawan</h2>
        </div>
</section>
<main class="p-8">
  <div class="mb-8">
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    <!-- Card 1 -->
    <?php foreach ($data['guru'] as $row) : ?>
      <div class="bg-white p-6 rounded-lg shadow-lg">
        <img
          alt="Profile picture of CIKGU BESAR S.Pd, M.Pd"
          class="w-24 h-24 mx-auto rounded-full mb-4 object-cover object-top"
          height="100"
          src="<?= BASEURL ?>/img/guru/<?= $row['img'] ?>"
          width="100" />
        <h3 class="text-center text-xl font-bold mb-2">
          <?= $row['nama'] ?>
        </h3>
        <p
          class="text-center bg-green-700 text-white py-1 px-4 rounded-full mb-4">
          <?= $row['jabatan'] ?>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
</main>
<style>
  .img{
    object-fit: cover;
    object-position: top center;
    height: 100%;
    width: 100%;
  }
</style>