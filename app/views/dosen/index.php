<?php
$pageTitle = 'Data Dosen';
include __DIR__ . '/../layout/header.php';

?>

<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Data Dosen</h1>
        <a href="/College=Web-Sister/public/dosen/create" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            + Tambah Dosen
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">NIP</th>
                    <th scope="col" class="py-3 px-6">Nama</th>
                    <th scope="col" class="py-3 px-6">Alamat</th>
                    <th scope="col" class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dosen_list as $dosen): ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="py-4 px-6 font-medium text-gray-900"><?= htmlspecialchars($dosen['nip']) ?></td>
                        <td class="py-4 px-6"><?= htmlspecialchars($dosen['nama']) ?></td>
                        <td class="py-4 px-6"><?= htmlspecialchars($dosen['alamat']) ?></td>
                        <td class="py-4 px-6 text-center">
                            <a href="/College=Web-Sister/public/dosen/edit/<?= $dosen['nip'] ?>" class="font-medium text-blue-600 hover:underline mr-3">Edit</a>
                            <a href="/College=Web-Sister/public/dosen/delete/<?= $dosen['nip'] ?>" class="font-medium text-red-600 hover:underline" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>