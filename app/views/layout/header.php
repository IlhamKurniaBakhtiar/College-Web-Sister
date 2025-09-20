<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Data Perkuliahan' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/College-Web-Sister/public/page.js" defer></script>
    <style>
        #mobile-menu {
            transition: max-height 0.3s ease-out;
            max-height: 0;
            overflow: hidden;
        }

        #mobile-menu.show {
            max-height: 500px;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans flex flex-col min-h-screen">

    <nav class="bg-stone-700 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo Aplikasi -->
                <a href="/College-Web-Sister/public/" class="text-white text-xl font-bold flex items-center">
                    <span class="text-2xl mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                    </span> Perkuliahan
                </a>

                <!-- Ikon Menu Desktop -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="/College-Web-Sister/public/mahasiswa" class="group relative flex items-center justify-center text-stone-100 hover:bg-stone-600 hover:text-white h-12 w-12 rounded-full transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        <span class="absolute top-full mt-2 whitespace-nowrap bg-stone-900 text-white text-xs px-2 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none">
                            Mahasiswa
                        </span>
                    </a>

                    <a href="/College-Web-Sister/public/dosen" class="group relative flex items-center justify-center text-stone-100 hover:bg-stone-600 hover:text-white h-12 w-12 rounded-full transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        <span class="absolute top-full mt-2 whitespace-nowrap bg-stone-900 text-white text-xs px-2 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none">
                            Dosen
                        </span>
                    </a>

                    <a href="/College-Web-Sister/public/matakuliah" class="group relative flex items-center justify-center text-stone-100 hover:bg-stone-600 hover:text-white h-12 w-12 rounded-full transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                        <span class="absolute top-full mt-2 whitespace-nowrap bg-stone-900 text-white text-xs px-2 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none">
                            Mata Kuliah
                        </span>
                    </a>

                    <a href="/College-Web-Sister/public/kuliah" class="group relative flex items-center justify-center text-stone-100 hover:bg-stone-600 hover:text-white h-12 w-12 rounded-full transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                        <span class="absolute top-full mt-2 whitespace-nowrap bg-stone-900 text-white text-xs px-2 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none">
                            Data Kuliah
                        </span>
                    </a>

                    <!-- Tombol Login/Profil Desktop -->
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="/College-Web-Sister/public/auth/profile" class="group relative flex items-center justify-center text-stone-100 hover:bg-stone-600 hover:text-white h-12 w-12 rounded-full transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="absolute top-full mt-2 whitespace-nowrap bg-stone-900 text-white text-xs px-2 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none">
                                <?= htmlspecialchars($_SESSION['user']['username']) ?>
                            </span>
                        </a>
                    <?php else: ?>
                        <a href="/College-Web-Sister/public/auth/login" class="group relative flex items-center justify-center text-stone-100 hover:bg-stone-600 hover:text-white h-12 w-12 rounded-full transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            <span class="absolute top-full mt-2 whitespace-nowrap bg-stone-900 text-white text-xs px-2 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none">
                                Login
                            </span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Tombol Hamburger Mobile -->
                <div class="md:hidden flex items-center">
                    <button id="hamburger-button" class="text-white hover:text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div id="mobile-menu" class="md:hidden bg-stone-600">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/College-Web-Sister/public/mahasiswa" class="text-white hover:bg-stone-500 block px-3 py-2 rounded-md text-base font-medium">Mahasiswa</a>
                <a href="/College-Web-Sister/public/dosen" class="text-white hover:bg-stone-500 block px-3 py-2 rounded-md text-base font-medium">Dosen</a>
                <a href="/College-Web-Sister/public/matakuliah" class="text-white hover:bg-stone-500 block px-3 py-2 rounded-md text-base font-medium">Mata Kuliah</a>
                <a href="/College-Web-Sister/public/kuliah" class="text-white hover:bg-stone-500 block px-3 py-2 rounded-md text-base font-medium">Data Kuliah</a>

                <hr class="border-stone-700 my-2">

                <?php if (isset($_SESSION['user'])): ?>
                    <a href="/College-Web-Sister/public/auth/profile" class="text-white hover:bg-stone-500 block px-3 py-2 rounded-md text-base font-medium">
                        Profil: <?= htmlspecialchars($_SESSION['user']['username']) ?>
                    </a>
                <?php else: ?>
                    <a href="/College-Web-Sister/public/auth/login" class="text-white hover:bg-stone-500 block px-3 py-2 rounded-md text-base font-medium">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto mt-4 p-4">