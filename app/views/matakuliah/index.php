<?php
$pageTitle = 'Data Mata Kuliah';
include __DIR__ . '/../layout/header.php';

?>

<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Data Mata Kuliah</h1>
        <a href="/College-Web-Sister/public/matakuliah/create" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            + Tambah Matkul
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Kode Matkul</th>
                    <th scope="col" class="py-3 px-6">Nama Mata Kuliah</th>
                    <th scope="col" class="py-3 px-6 text-center">SKS</th>
                    <th scope="col" class="py-3 px-6 text-center">Semester</th>
                    <th scope="col" class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($matkul_list as $matkul): ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="py-4 px-6 font-medium text-gray-900"><?= htmlspecialchars($matkul['KodeMatkul']) ?></td>
                        <td class="py-4 px-6"><?= htmlspecialchars($matkul['NamaMatkul']) ?></td>
                        <td class="py-4 px-6 text-center"><?= htmlspecialchars($matkul['SKS']) ?></td>
                        <td class="py-4 px-6 text-center"><?= htmlspecialchars($matkul['Semester']) ?></td>
                        <td class="py-4 px-6 text-center">
                            <a href="/College-Web-Sister/public/matakuliah/delete/<?= $matkul['KodeMatkul'] ?>" class="font-medium text-red-600 hover:underline" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                            <a href="/College-Web-Sister/public/matakuliah/edit/<?= $matkul['KodeMatkul'] ?>" class="font-medium text-blue-600 hover:underline mr-3">Edit</a>
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