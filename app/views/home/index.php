<?php
include __DIR__ . '/../layout/header.php';
?>

<div class="bg-white p-8 rounded-lg shadow-md text-center">
    <h1 class="text-4xl font-bold text-gray-800 mb-4"> Selamat Datang di Sistem Informasi Perkuliahan</h1>
    <p class="text-gray-600 text-lg">
        Aplikasi ini dibuat untuk mengelola data Mahasiswa, Dosen, dan Mata Kuliah di Universitas Harvard.
    </p>

    <div class="mt-8 flex justify-center gap-4">
        <a href="/College-Web-Sister/public/mahasiswa"
            class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
            Lihat Data Mahasiswa
        </a>
    </div>

    <div class="mt-8">
        <img src="/College-Web-Sister/public/img/harvard.jpg"
            alt="Universitas Ngawi Utara"
            class="mx-auto rounded-lg shadow-lg w-1/2">
    </div>
</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>