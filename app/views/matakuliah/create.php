<?php
$pageTitle = 'Tambah Mata Kuliah';
include __DIR__ . '/../layout/header.php';
?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Mata Kuliah Baru</h1>

    <form action="/proyek_kuliah/public/matakuliah/store" method="POST">
        <div class="mb-4">
            <label for="kode_matkul" class="block text-gray-700 text-sm font-bold mb-2">Kode Mata Kuliah</label>
            <input type="text" id="kode_matkul" name="kode_matkul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="nama_matkul" class="block text-gray-700 text-sm font-bold mb-2">Nama Mata Kuliah</label>
            <input type="text" id="nama_matkul" name="nama_matkul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label for="sks" class="block text-gray-700 text-sm font-bold mb-2">SKS</label>
                <input type="number" id="sks" name="sks" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>
            <div>
                <label for="semester" class="block text-gray-700 text-sm font-bold mb-2">Semester</label>
                <input type="number" id="semester" name="semester" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <a href="/proyek_kuliah/public/matakuliah" class="text-gray-600 hover:text-gray-800 mr-4">Batal</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg">Simpan</button>
        </div>
    </form>
</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>