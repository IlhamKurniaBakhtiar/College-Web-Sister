<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "Perkuliahan";

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = file_get_contents(__DIR__ . "/database/migrations/perkuliahan.sql");

if ($conn->multi_query($sql)) {
    echo "Migration berhasil. Database '$dbname' sudah dibuat.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
