<meta name="viewport" content="width=device-width, initial-scale=1.0">
<main class="container mx-auto mt-8 flex">
  <section class="w-2/3 bg-white p-6 rounded-lg shadow-md">
    <a href="<?= BASEURL ?>/home/" class="text-green-800 hover:underline">Kembali</a>
    <h2 class="text-2xl font-bold mb-4">
      <?= $data['news']['title'] ?>
    </h2>
    <img
      alt="School Building"
      class="w-full mb-4 rounded-lg"
      height="400"
      src="<?= BASEURL; ?>/img/news/<?= $data['news']['img'] ?>"
      width="600" />
    <p class="text-gray-500 text-sm"><?= $data['news']['date'] ?></p>
    <p class="mb-4">
      <?= $data['news']['word']; ?>
    </p>
  </section>

  <aside class="lg:w-1/4 lg:pl-8 hidden lg:block">
                <h3 class="text-xl font-bold mb-4">Terbaru</h3>
                <?php
    $count = 0; // Inisialisasi counter
    foreach ($data['list'] as $row) :
      if ($count >= 10) break; // Hentikan setelah 10 iterasi
    ?> 
                <div class="mb-4">
                    <img alt="Event at SDN Dinoyo 4" class="w-full rounded-lg mb-2" height="100" src="<?= BASEURL ?>/img/news/<?= $row['img'] ?>" width="200"/>
                    <h4 class="text-lg font-semibold"><?= $row['title'] ?></h4>
                    <p class="text-gray-600 text-sm"><?= $row['date'] ?></p>
                    <a class="text-green-600 text-sm hover:underline" href="<?= BASEURL ?>/home/detail/<?= $row['id']?>">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
                <?php
      $count++; // Increment counter
    endforeach;
      ?>
    </aside>
</main>