<?php
$pageTitle = 'Data Mahasiswa';

include __DIR__ . '/../layout/header.php';

?>

<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Data Mahasiswa</h1>
        <a href="/College-Web-Sister/public/mahasiswa/create" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            + Tambah Mahasiswa
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xm text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">NIM</th>
                    <th scope="col" class="py-3 px-6">Nama</th>
                    <th scope="col" class="py-3 px-6">Alamat</th>
                    <th scope="col" class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa_list as $mhs): ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="py-4 px-6 font-medium text-gray-900"><?= htmlspecialchars($mhs['NIM']) ?></td>
                        <td class="py-4 px-6 font-medium text-gray-900"><?= htmlspecialchars($mhs['Nama']) ?></td>
                        <td class="py-4 px-6"><?= htmlspecialchars($mhs['Alamat']) ?></td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="/College-Web-Sister/public/mahasiswa/edit/<?= $mhs['NIM'] ?>" class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300 text-sm">Edit</a>
                                <a href="/College-Web-Sister/public/mahasiswa/delete/<?= $mhs['NIM'] ?>" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 text-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                            </div>
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