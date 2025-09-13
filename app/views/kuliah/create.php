<?php
$pageTitle = 'Tambah Data Kuliah';
include __DIR__ . '/../layout/header.php';
?>

<div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
  <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Data Kuliah</h1>

  <form action="/College-Web-Sister/public/kuliah/store" method="POST" class="space-y-6">

    <!-- Pilih Mahasiswa -->
    <div>
      <label for="nim" class="block mb-2 text-sm font-medium text-gray-700">Mahasiswa</label>
      <select name="nim" id="nim" class="w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">-- Pilih Mahasiswa --</option>
        <?php foreach ($mahasiswa as $m): ?>
          <option value="<?= htmlspecialchars($m['NIM']) ?>">
            <?= htmlspecialchars($m['Nama']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Pilih Dosen -->
    <div>
      <label for="nip" class="block mb-2 text-sm font-medium text-gray-700">Dosen</label>
      <select name="nip" id="nip" class="w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">-- Pilih Dosen --</option>
        <?php foreach ($dosen as $d): ?>
          <option value="<?= htmlspecialchars($d['NIP']) ?>">
            <?= htmlspecialchars($d['Nama']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Pilih Mata Kuliah -->
    <div>
      <label for="kode_matkul" class="block mb-2 text-sm font-medium text-gray-700">Mata Kuliah</label>
      <select name="kode_matkul" id="kode_matkul" class="w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">-- Pilih Mata Kuliah --</option>
        <?php foreach ($matkul as $mk): ?>
          <option value="<?= htmlspecialchars($mk['KodeMatkul']) ?>">
            <?= htmlspecialchars($mk['NamaMatkul']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Input Nilai -->
    <div>
      <label for="nilai" class="block mb-2 text-sm font-medium text-gray-700">Nilai</label>
      <input type="text" name="nilai" id="nilai" class="w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <!-- Tombol -->
    <div class="flex justify-between">
      <a href="/College-Web-Sister/public/kuliah" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
        Kembali
      </a>
      <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
        Simpan
      </button>
    </div>
  </form>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>