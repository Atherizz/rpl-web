
    <main class="p-8">
      <h2 class="text-3xl font-bold mb-4">GURU &amp; KARYAWAN</h2>
      <div class="mb-8">
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Card 1 -->
         <?php foreach ($data['guru'] as $row)  : ?>
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img
            alt="Profile picture of CIKGU BESAR S.Pd, M.Pd"
            class="w-24 h-24 mx-auto rounded-full mb-4"
            height="100"
            src="<?=BASEURL?>/img/guru/<?=$row['img']?>"
            width="100"
          />
          <h3 class="text-center text-xl font-bold mb-2">
            <?= $row['nama'] ?>
          </h3>
          <p
            class="text-center bg-green-700 text-white py-1 px-4 rounded-full mb-4"
          >
           <?= $row['jabatan'] ?>
          </p>
        </div>       
        <?php endforeach; ?>
      </div>
      <div class="mt-8 flex justify-between items-center">
        <p>Showing 1 to 8 of 50 items</p>
        <div class="flex space-x-2">
          <button class="px-3 py-1 border rounded">1</button>
          <button class="px-3 py-1 border rounded">2</button>
          <button class="px-3 py-1 border rounded">3</button>
          <button class="px-3 py-1 border rounded">Last</button>
        </div>
      </div>
    </main>

