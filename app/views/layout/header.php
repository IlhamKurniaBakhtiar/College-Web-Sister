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
            <a href="/proyek_kuliah/public/" class="text-white text-xl font-bold">🎓 Perkuliahan</a>
            <div class="space-x-4">
                <a href="/proyek_kuliah/public/mahasiswa" class="text-gray-300 hover:text-white">Mahasiswa</a>
                <a href="/proyek_kuliah/public/dosen" class="text-gray-300 hover:text-white">Dosen</a>
                <a href="/proyek_kuliah/public/matakuliah" class="text-gray-300 hover:text-white">Mata Kuliah</a>
                <a href="/proyek_kuliah/public/kuliah" class="text-gray-300 hover:text-white">Data Kuliah</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-10 p-4">