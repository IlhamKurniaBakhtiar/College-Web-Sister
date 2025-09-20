<?php
$pageTitle = 'Login';
include __DIR__ . '/../layout/header.php';
?>

<div class="flex items-center justify-center min-h-screen bg-stone-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-stone-800 mb-6 text-center">Login</h2>

        <?php if (!empty($error)): ?>
            <div class="mb-4 text-red-600 text-sm text-center">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="post" class="space-y-4">
            <div>
                <label class="block text-stone-700 mb-1">Username</label>
                <input type="text" name="username" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-200">
            </div>
            <div>
                <label class="block text-stone-700 mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-200">
            </div>
            <button type="submit"
                class="w-full bg-stone-700 hover:bg-stone-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Login
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-stone-600">
            Belum punya akun?
            <a href="/College-Web-Sister/public/auth/register" class="text-indigo-600 hover:underline">Register</a>
        </p>
    </div>
</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>