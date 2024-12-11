<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
</head>
<body class="bg-gray-100">
    <main class="flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full relative">
            <h2 class="text-2xl font-bold text-green-800 mb-6 text-center">Login</h2>
            <form method="POST" action="<?=BASEURL?>/login/checkUsername">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer mt-6" onclick="togglePasswordVisibility('password', 'eye-icon')">
                        <i class="fas fa-eye" id="eye-icon"></i>
                    </span>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-green-800 focus:ring-green-800 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-gray-700">Remember me</label>
                    </div>
                </div>
                <button type="submit" name="submit" class="w-full bg-green-800 text-white py-2 rounded-lg hover:bg-green-700">Login</button>
                <p style="color: red; font-style : italic;">
                <?= (isset($data['error'])) ? $data['error'] : '' ?>
                </p>
            </form>
        </div>
    </main>
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
</body>
</html>