<?php
$pageTitle = 'Data Perkuliahan';
include __DIR__ . '/../layout/header.php';
?>

<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Data Perkuliahan</h1>
        <a href="/College-Web-Sister/public/kuliah/create" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            + Tambah Data Kuliah
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xm text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Nama Mahasiswa</th>
                    <th scope="col" class="py-3 px-6">Nama Dosen</th>
                    <th scope="col" class="py-3 px-6">Mata Kuliah</th>
                    <th scope="col" class="py-3 px-6 text-center">Nilai</th>
                    <th scope="col" class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($kuliah_list) && is_array($kuliah_list) && count($kuliah_list) > 0):
                ?>
                    <?php foreach ($kuliah_list as $kuliah): ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="py-4 px-6 font-medium text-gray-900"><?= htmlspecialchars($kuliah['Mahasiswa']) ?></td>
                            <td class="py-4 px-6 font-medium text-gray-900"><?= htmlspecialchars($kuliah['Dosen']) ?></td>
                            <td class="py-4 px-6 font-medium text-gray-900"><?= htmlspecialchars($kuliah['NamaMatkul']) ?></td>
                            <td class="py-4 px-6 font-medium text-gray-900 text-center"><?= htmlspecialchars($kuliah['Nilai']) ?></td>
                            <td class="py-4 px-6 text-center">
                                <a href="/College-Web-Sister/public/kuliah/edit/<?= $kuliah['NIM'] ?>/<?= $kuliah['NIP'] ?>/<?= $kuliah['KodeMatkul'] ?>" class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300 text-sm">Edit</a>
                                <a href="/College-Web-Sister/public/kuliah/delete/<?= $kuliah['NIM'] ?>/<?= $kuliah['NIP'] ?>/<?= $kuliah['KodeMatkul'] ?>" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 text-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="py-4 px-6 text-center text-gray-400">Tidak ada data perkuliahan yang ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>