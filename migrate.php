<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "Perkuliahan"; // bisa kosong juga karena kita create database di SQL

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Path ke file SQL
$sqlFile = __DIR__ . "/database/migrations/perkuliahan.sql";

if (!file_exists($sqlFile)) {
    die("File SQL tidak ditemukan: $sqlFile");
}

$query = file_get_contents($sqlFile);

if (!$query) {
    die("File SQL kosong atau gagal dibaca!");
}

if ($conn->multi_query($query)) {
    echo "<h3>Migrasi database berhasil!</h3>";
    echo '<br><a href="http://localhost/College-Web-Sister/public/" 
             style="display:inline-block;
                    margin-top:10px;
                    padding:10px 15px;
                    background:#007bff;
                    color:#fff;
                    text-decoration:none;
                    border-radius:5px;">
             Lanjut ke Aplikasi
          </a>';
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
