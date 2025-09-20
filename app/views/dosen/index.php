<?php
$pageTitle = 'Data Dosen';
include __DIR__ . '/../layout/header.php';

?>

<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-stone-800">Data Dosen</h1>
        <a href="/College-Web-Sister/public/dosen/create" class="bg-stone-700 hover:bg-stone-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            + Tambah Dosen
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-stone-500">
            <thead class="text-xm text-stone-700 uppercase bg-stone-50">
                <tr>
                    <th scope="col" class="py-3 px-6">NIP</th>
                    <th scope="col" class="py-3 px-6">Nama</th>
                    <th scope="col" class="py-3 px-6">Alamat</th>
                    <th scope="col" class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dosen_list as $dosen): ?>
                    <tr class="bg-white border-b hover:bg-stone-50">
                        <td class="py-4 px-6 font-medium text-stone-900"><?= htmlspecialchars($dosen['NIP']) ?></td>
                        <td class="py-4 px-6 font-medium text-stone-900"><?= htmlspecialchars($dosen['Nama']) ?></td>
                        <td class="py-4 px-6 text-stone-900"><?= htmlspecialchars($dosen['Alamat']) ?></td>
                        <td class="py-4 px-6 text-center">
                            <a href="/College-Web-Sister/public/dosen/edit/<?= $dosen['NIP'] ?>" class="bg-stone-600 hover:bg-stone-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300 text-sm">Edit</a>
                            <a href="/College-Web-Sister/public/dosen/delete/<?= $dosen['NIP'] ?>" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 text-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
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