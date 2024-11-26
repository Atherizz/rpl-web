<main class="flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold text-green-800 mb-6 text-center">Login</h2>
            <form method="POST" action="<?=BASEURL?>/login/checkUsername">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-green-800 focus:ring-green-800 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-gray-700">Remember me</label>
                    </div>
                    <a href="#" class="text-green-800 hover:underline">Change Password</a>
                </div>
                <button type="submit" name="submit" class="w-full bg-green-800 text-white py-2 rounded-lg hover:bg-green-700">Login</button>
            </form>
        </div>
    </main>