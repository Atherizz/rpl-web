<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script>
        function togglePasswordVisibility(id, iconId) {
            const passwordField = document.getElementById(id);
            const eyeIcon = document.getElementById(iconId);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</head>
<body class="bg-white">
    <main class="flex justify-center items-center h-screen">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
            <h2 class="text-green-800 text-2xl font-bold mb-6 text-center">Change Password</h2>
            <form action="<?= BASEURL ?>/profile_admin/changePass" method="POST">
                <input type="hidden" name="username" value="<?= $data['user']['username']?>"/>
                <input type="hidden" name="id" value="<?= $data['user']['id']?>"/>
                <div class="mb-4 relative">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="current-password">Current Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline pr-10" id="current-password" name="currentPassword" placeholder="Current Password" type="password"/>
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility('current-password', 'eye-icon-current')">
                        <i class="fas fa-eye mt-7" id="eye-icon-current"></i>
                    </span>
                </div>

                <div class="mb-4 relative">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="new-password">New Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline pr-10" id="new-password" placeholder="New Password" name="newPassword" type="password" />
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility('new-password', 'eye-icon-new')">
                        <i class="fas fa-eye mt-7" id="eye-icon-new"></i>
                    </span>
                </div>

                <div class="mb-4 relative">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Confirm New Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline pr-10" id="confirm-password" placeholder="Confirm New Password" type="password" name="confirmPassword"/>
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility('confirm-password', 'eye-icon-confirm')">
                        <i class="fas fa-eye mt-7" id="eye-icon-confirm"></i>
                    </span>
                </div>
                <a class="text-green-800 hover:underline" href="<?= BASEURL ?>/profile_admin/">Kembali</a>
                <div class="flex items-center justify-center">
                    <button class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">Change Password</button>
                </div>
                <p style="color: red; font-style : italic;">
                <?= (isset($data['error'])) ? $data['error'] : '' ?>
                </p>
            </form>
        </div>
    </main>
</body>
</html>