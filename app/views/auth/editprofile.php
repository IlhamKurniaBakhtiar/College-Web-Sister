<?php
$pageTitle = 'Edit Profil';
include __DIR__ . '/../layout/header.php';
?>

<div class="bg-white p-8 rounded-lg shadow-md max-w-lg mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Profil</h1>

    <?php if (!empty($error)): ?>
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <div>
            <label class="block text-gray-700 mb-1">Username</label>
            <input type="text" name="username"
                value="<?= htmlspecialchars($_SESSION['user']['username']) ?>"
                class="w-full p-2 border rounded-lg" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="email" name="email"
                value="<?= htmlspecialchars($_SESSION['user']['email']) ?>"
                class="w-full p-2 border rounded-lg" required>
        </div>

        <div class="flex justify-between">
            <a href="/College-Web-Sister/public/auth/profile"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Batal
            </a>
            <button type="submit"
                class="bg-orange-500 hover:bg-orange-700 text-white px-4 py-2 rounded-lg">
                Simpan
            </button>
        </div>
    </form>
</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>