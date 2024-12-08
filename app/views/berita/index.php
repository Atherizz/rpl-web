<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SDN DINOYO 4 - Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<section class="bg-[#D5D3D3] py-2">
        <div class="container mx-auto ">
            <h2 class="text-2xl font-bold text-gray-700 ml-12">Berita</h2>
        </div>
    </section>
    <main class="container mx-auto p-4 mt-5">
    <a href="<?= BASEURL ?>/home/" class="text-green-800 hover:underline">Kembali</a>
        <div class="flex flex-col lg:flex-row">
            <div class="lg:w-3/4">
            <?php foreach ($data['news'] as $row) : ?> 
                <div class="mb-8">
                    <img alt="Event at SDN Dinoyo 4" class="w-full rounded-lg mb-4" height="400" src="<?= BASEURL ?>/img/news/<?= $row['img'] ?>" width="800"/>
                    <h3 class="text-xl font-semibold"><?= $row['title'] ?></h3>
                    <p class="text-gray-600"><?= $row['date'] ?></p>
                    <a class="text-green-600 hover:underline" href="<?= BASEURL ?>/home/detail/<?= $row['id']?>">READ MORE <i class="fas fa-arrow-right"></i></a>
                </div>
                <?php endforeach; ?>
            </div>
            <aside class="lg:w-1/4 lg:pl-8 hidden lg:block">
                <h3 class="text-xl font-bold mb-4">Terbaru</h3>
                <?php foreach ($data['news'] as $row) : ?> 
                <div class="mb-4">
                    <img alt="Event at SDN Dinoyo 4" class="w-full rounded-lg mb-2" 
                    height="100" src="<?= BASEURL ?>/img/news/<?= $row['img'] ?>" width="200"/>
                    <h4 class="text-lg font-semibold"><?= $row['title'] ?></h4>
                    <p class="text-gray-600 text-sm"><?= $row['date'] ?></p>
                    <a class="text-green-600 text-sm hover:underline" href="<?= BASEURL ?>/home/detail/<?= $row['id']?>">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
                <?php endforeach; ?>
            </aside>
        </div>
    </main>
</body>
</html>
