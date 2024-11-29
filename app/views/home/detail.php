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
  <aside class="w-1/3 ml-8">
    <h3 class="text-xl font-bold mb-4">Terbaru</h3>
    <?php foreach ($data['list'] as $row) : ?>
      <div class="space-y-4">
        <div class="flex items-center">
          <img
            alt="Event Image"
            class="w-20 h-20 rounded-lg mr-4"
            height="100"
            src="<?= BASEURL; ?>/img/news/<?= $row['img'] ?>"
            width="100" />
          <div>
            <h4 class="text-lg font-semibold">
              <?= $row['title'] ?>
            </h4>
            <a href="<?= BASEURL ?>/home/detail/<?= $row['id'] ?>" class="text-green-800 hover:underline">Read More</a>
          </div>
        </div>
      <?php endforeach; ?>

  </aside>
</main>