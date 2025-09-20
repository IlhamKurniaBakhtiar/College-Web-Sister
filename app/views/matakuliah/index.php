<?php
$pageTitle = 'Data Mata Kuliah';
include __DIR__ . '/../layout/header.php';
?>

<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-stone-800">Data Mata Kuliah</h1>

        <a href="/College-Web-Sister/public/matakuliah/create"
            class="bg-stone-700 hover:bg-stone-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            + Tambah Matkul
        </a>

    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-stone-500">
            <thead class="text-xm text-stone-700 uppercase bg-stone-50">
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
                    <tr class="bg-white border-b hover:bg-stone-50">
                        <td class="py-4 px-6 font-medium text-stone-900"><?= htmlspecialchars($matkul['KodeMatkul']) ?></td>
                        <td class="py-4 px-6 font-medium text-stone-900"><?= htmlspecialchars($matkul['NamaMatkul']) ?></td>
                        <td class="py-4 px-6 font-medium text-stone-900 text-center"><?= htmlspecialchars($matkul['SKS']) ?></td>
                        <td class="py-4 px-6 font-medium text-stone-900 text-center"><?= htmlspecialchars($matkul['Semester']) ?></td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center space-x-6 justify-center">
                                <a href="/College-Web-Sister/public/matakuliah/edit/<?= $matkul['KodeMatkul'] ?>"
                                    class="bg-stone-600 hover:bg-stone-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300 text-sm">Edit</a>
                                <a href="/College-Web-Sister/public/matakuliah/delete/<?= $matkul['KodeMatkul'] ?>"
                                    class="bg-red-600 hover:bg-reed-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 text-sm"
                                    onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
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