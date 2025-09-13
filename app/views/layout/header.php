<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Data Perkuliahan' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <nav class="bg-gray-800 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/College-Web-Sister/public/" class="text-white text-xl font-bold">🎓 Perkuliahan</a>

            <div class="space-x-4 flex items-center">
                <a href="/College-Web-Sister/public/mahasiswa" class="text-gray-300 hover:text-white">Mahasiswa</a>
                <a href="/College-Web-Sister/public/dosen" class="text-gray-300 hover:text-white">Dosen</a>
                <a href="/College-Web-Sister/public/matakuliah" class="text-gray-300 hover:text-white">Mata Kuliah</a>
                <a href="/College-Web-Sister/public/kuliah" class="text-gray-300 hover:text-white">Data Kuliah</a>

                <?php if (isset($_SESSION['user'])): ?>
                    <a href="/College-Web-Sister/public/auth/profile"
                        class="text-gray-300 hover:text-white font-semibold">
                        👤 <?= htmlspecialchars($_SESSION['user']['username']) ?>
                    </a>
                <?php else: ?>
                    <a href="/College-Web-Sister/public/auth/login"
                        class="text-gray-300 hover:text-white font-semibold">
                        Login
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-10 p-4">