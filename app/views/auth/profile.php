<?php
$pageTitle = 'Profil';
include __DIR__ . '/../layout/header.php';
?>

<div class="flex items-center justify-center bg-stone-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-stone-800">Profil</h1>
            <a href="/College-Web-Sister/public/auth/logout"
                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Logout
            </a>
        </div>

        <div class="space-y-4">
            <p class="text-stone-700 text-lg">
                Selamat datang,
                <span class="font-bold text-indigo-600 inline-flex items-center gap-1">
                    <?= htmlspecialchars($displayName) ?>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                    </svg>
                </span>
            </p>

            <div class="mt-6 p-6 bg-stone-50 rounded-lg shadow-inner">
                <h2 class="text-xl font-semibold text-stone-700 mb-4">Detail Akun</h2>
                <ul class="space-y-2 text-stone-600">
                    <li><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></li>
                    <li><strong>Email:</strong> <?= htmlspecialchars($user['email'] ?? '-') ?></li>
                    <?php if (!empty($user['nama'])): ?>
                        <li><strong>Nama Lengkap:</strong> <?= htmlspecialchars($user['nama']) ?></li>
                    <?php endif; ?>
                </ul>

                <div class="mt-6 flex space-x-4">
                    <a href="/College-Web-Sister/public/auth/editProfile"
                        class="bg-stone-700 hover:bg-stone-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                        Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>