<html>
<head>
    <title>SDN DINOYO 4 - Admin Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-white">
<?php if (isset($data['change'])) : ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 max-w-xl mx-auto mt-[7rem] mb-[-7rem] rounded-lg shadow-lg relative" role="alert">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-500"></i>
                </div>
                <div class="ml-3">
                    <p class="font-bold"><?= $data['change'] ?></p>
                </div>
                <div class="ml-auto">
                    <button class="text-green-500 hover:text-green-700" onclick="closeAlert(event)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <main class="flex justify-center items-center h-screen">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
            <h2 class="text-green-800 text-2xl font-bold mb-6 text-center">Admin Profile</h2>
            <form action="" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" placeholder="Username" type="text" value="<?= $data['user']['username']?>" readonly/>
                </div>
                <a class="text-green-800 hover:underline" href="<?= BASEURL ?>/home_admin/">Kembali</a>
                <div class="flex items-center justify-center">
                    <a href="<?= BASEURL ?>/profile_admin/change" class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Change Password</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
<script>
        function closeAlert(event) {
            const alert = event.target.closest('[role="alert"]');
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        }
</script>