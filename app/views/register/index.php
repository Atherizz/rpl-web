<meta name="viewport" content="width=device-width, initial-scale=1.0">

<main class="flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold text-green-800 mb-6 text-center">Register</h2>
            <form method="POST" action="<?=BASEURL?>/login/checkUsername">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Verify Password</label>
                    <input type="password" id="password" name="passwordVerify" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                </div>
                <div class="flex items-center justify-between mb-4">
                </div>
                <button type="submit" name="submit" class="w-full bg-green-800 text-white py-2 rounded-lg hover:bg-green-700">Register</button>
                <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                <?= htmlspecialchars($error); ?>
                </div>
                <?php endif; ?>
            </form>
        </div>
    </main>