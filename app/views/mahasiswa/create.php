<?php
$pageTitle = 'Tambah Mahasiswa';
include __DIR__ . '/../layout/header.php';
?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Mahasiswa Baru</h1>

    <form action="/College-Web-Sister/public/mahasiswa/store" method="POST">
        <div class="mb-4">
            <label for="nim" class="block text-gray-700 text-sm font-bold mb-2">NIM</label>
            <input type="text" id="nim" name="nim" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>
        <div class="mb-6">
            <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
        </div>
        <div class="flex items-center justify-end">
            <a href="/College-Web-Sister/public/mahasiswa" class="text-gray-600 hover:text-gray-800 mr-4">Batal</a>
            <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">Simpan</button>
        </div>
    </form>
</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>