<?php
$pageTitle = 'Edit Dosen';
include __DIR__ . '/../layout/header.php';

?>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Data Dosen</h1>

    <form action="/College-Web-Sister/public/dosen/update" method="POST">
        <input type="hidden" name="nip" value="<?= htmlspecialchars($dosen['NIP']) ?>">

        <div class="mb-4">
            <label for="nip_display" class="block text-gray-700 text-sm font-bold mb-2">NIP</label>
            <input type="text" id="nip_display" value="<?= htmlspecialchars($dosen['NIP']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none" readonly>
        </div>
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($dosen['Nama']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>
        <div class="mb-6">
            <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500"><?= htmlspecialchars($dosen['Alamat']) ?></textarea>
        </div>
        <div class="flex items-center justify-end">
            <a href="/College-Web-Sister/public/dosen" class="text-gray-600 hover:text-gray-800 mr-4">Batal</a>
            <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">Update</button>
        </div>
    </form>
</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>