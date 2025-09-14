<?php

$host = "localhost";
$user = "root";
$pass = "";
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sqlFile = __DIR__ . "/database/migrations/perkuliahan.sql";

if (!file_exists($sqlFile)) {
    die("File SQL tidak ditemukan: $sqlFile");
}

$query = file_get_contents($sqlFile);
if ($query === false || trim($query) === '') {
    die("File SQL kosong atau gagal dibaca!");
}

$headerPath = __DIR__ . "/app/views/layout/header.php";
$footerPath = __DIR__ . "/app/views/layout/footer.php";

if (file_exists($headerPath)) {
    include $headerPath;
} else {
    echo '<!DOCTYPE html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Migrasi</title><script src="https://cdn.tailwindcss.com"></script></head><body class="bg-gray-100 font-sans"><nav class="bg-gray-800 p-4 shadow-lg"><div class="container mx-auto"><a href="/College-Web-Sister/public/" class="text-white text-xl font-bold">🎓 Perkuliahan</a></div></nav><main class="container mx-auto mt-10 p-4">';
}

$success = $conn->multi_query($query);

if ($success) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
}

?>
<div class="bg-white p-8 rounded-lg shadow-md text-center max-w-2xl mx-auto mt-8">
    <?php if ($success): ?>
        <h1 class="text-3xl font-bold text-black-600 mb-4">Migrasi Database Berhasil!</h1>
        <p class="text-gray-700 text-lg">
            Struktur tabel & data awal berhasil dibuat di database <span class="font-semibold">Perkuliahan</span>.
        </p>

        <div class="mt-8 flex justify-center gap-4">
            <a href="/College-Web-Sister/public/"
                class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                Lanjut ke Aplikasi
            </a>

            <a href="/College-Web-Sister/migrate.php"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition duration-300">
                Jalankan Lagi
            </a>
        </div>
    <?php else: ?>
        <h1 class="text-3xl font-bold text-red-600 mb-4">Migrasi Gagal</h1>
        <p class="text-gray-700 mb-6">Error: <span class="font-mono text-sm text-red-700"><?= htmlspecialchars($conn->error) ?></span></p>
        <div class="mt-6">
            <a href="/College-Web-Sister/migrate.php"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition duration-300">
                Coba Lagi
            </a>
        </div>
    <?php endif; ?>
</div>
<?php
$conn->close();

if (file_exists($footerPath)) {
    include $footerPath;
} else {
    echo '</main></body></html>';
}
?>