<?php
$pageTitle = 'Edit Data Kuliah';
include __DIR__ . '/../layout/header.php';
?>

<div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
  <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Data Kuliah</h1>

  <form action="/College-Web-Sister/public/kuliah/update" method="POST" class="space-y-6">

    <!-- Hidden input untuk key lama -->
    <input type="hidden" name="old_nim" value="<?= htmlspecialchars($kuliah_data['NIM']) ?>">
    <input type="hidden" name="old_nip" value="<?= htmlspecialchars($kuliah_data['NIP']) ?>">
    <input type="hidden" name="old_kode_matkul" value="<?= htmlspecialchars($kuliah_data['KodeMatkul']) ?>">

    <!-- Pilih Mahasiswa -->
    <div>
      <label for="nim" class="block mb-2 text-sm font-medium text-gray-700">Mahasiswa</label>
      <select name="nim" id="nim" class="w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        <?php foreach ($mahasiswa as $m): ?>
          <option value="<?= htmlspecialchars($m['NIM']) ?>"
            <?= $m['NIM'] == $kuliah_data['NIM'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($m['Nama']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Pilih Dosen -->
    <div>
      <label for="nip" class="block mb-2 text-sm font-medium text-gray-700">Dosen</label>
      <select name="nip" id="nip" class="w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        <?php foreach ($dosen as $d): ?>
          <option value="<?= htmlspecialchars($d['NIP']) ?>"
            <?= $d['NIP'] == $kuliah_data['NIP'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($d['Nama']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Pilih Mata Kuliah -->
    <div>
      <label for="kode_matkul" class="block mb-2 text-sm font-medium text-gray-700">Mata Kuliah</label>
      <select name="kode_matkul" id="kode_matkul" class="w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        <?php foreach ($matkul as $mk): ?>
          <option value="<?= htmlspecialchars($mk['KodeMatkul']) ?>"
            <?= $mk['KodeMatkul'] == $kuliah_data['KodeMatkul'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($mk['NamaMatkul']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Input Nilai -->
    <div>
      <label for="nilai" class="block mb-2 text-sm font-medium text-gray-700">Nilai</label>
      <input type="text" name="nilai" id="nilai"
        value="<?= htmlspecialchars($kuliah_data['Nilai']) ?>"
        class="w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <!-- Tombol -->
    <div class="flex justify-between">
      <a href="/College-Web-Sister/public/kuliah" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
        Batal
      </a>
      <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
        Update
      </button>
    </div>
  </form>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>