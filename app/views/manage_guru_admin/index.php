<style>
  .logout-button {
    position: absolute;
    top: 100px;
    right: 20px;
    background-color: green;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 2px;
    cursor: pointer;
    font-weight: bold;

  }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<a href="<?= BASEURL ?>/manage_guru_admin/tambah" class="logout-button">Tambah Data</a>
<main class="p-8">
  <?php if (isset($data['info'])) : ?>
    <p class="text-green-600 hover:underline"><?= $data['info'] ?></p>
  <?php endif; ?>
  <h2 class="text-center text-2xl font-bold text-green-800 mb-8">
    DAFTAR GURU
  </h2>
  <div class="mb-8">
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    <!-- Card 1 -->
    <?php foreach ($data['guru'] as $row) : ?>
      <div class="bg-white p-6 rounded-lg shadow-lg">
        <img
          alt="Profile picture of CIKGU BESAR S.Pd, M.Pd"
          class="w-24 h-24 mx-auto rounded-full mb-4"
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
        <div class="flex justify-between p-4 border-t">
          <a href="<?= BASEURL; ?>/manage_guru_admin/editGuru/<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a>
          <a href="<?= BASEURL; ?>/manage_guru_admin/deleteGuru/<?= $row['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('apakah anda yakin ingin menghapus ekskul ini?')">Delete</a>
        </div>
      </div>

    <?php endforeach; ?>
  </div>
</main>