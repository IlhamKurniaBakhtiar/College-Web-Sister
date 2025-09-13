<?php
$pageTitle = 'Profil';
include __DIR__ . '/../layout/header.php';
?>

<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Profil</h1>
        <a href="/College-Web-Sister/public/auth/logout"
            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            Logout
        </a>
    </div>

    <div class="space-y-4">
        <p class="text-gray-700 text-lg">
            Selamat datang, <span class="font-semibold text-indigo-600">
                <?= htmlspecialchars($displayName) ?>
            </span> 🎉
        </p>

        <div class="mt-6 p-6 bg-gray-50 rounded-lg shadow-inner">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Detail Akun</h2>
            <ul class="space-y-2 text-gray-600">
                <li><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></li>
                <li><strong>Email:</strong> <?= htmlspecialchars($user['email'] ?? '-') ?></li>
                <?php if (!empty($user['nama'])): ?>
                    <li><strong>Nama Lengkap:</strong> <?= htmlspecialchars($user['nama']) ?></li>
                <?php endif; ?>
            </ul>

            <div class="mt-6 flex space-x-4">
                <a href="/College-Web-Sister/public/auth/editProfile"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Edit Profil
                </a>
            </div>
        </div>
    </div>

</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>