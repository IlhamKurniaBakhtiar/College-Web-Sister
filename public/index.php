<?php

// Menguraikan URL yang diminta
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$path = trim($request_uri[0], '/');
$segments = explode('/', $path);

// Menghapus nama direktori proyek dari segment jika ada
// Sesuaikan 'proyek_kuliah/public' dengan struktur direktori Anda
$base_path_segments = explode('/', 'proyek_kuliah/public');
foreach ($base_path_segments as $index => $bp_segment) {
    if (isset($segments[$index]) && $segments[$index] == $bp_segment) {
        unset($segments[$index]);
    }
}
$segments = array_values($segments);

// Menentukan controller, method, dan parameter dari URL
$controller_name = isset($segments[0]) && !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
$method_name = isset($segments[1]) && !empty($segments[1]) ? $segments[1] : 'index';
$params = array_slice($segments, 2);

// Memuat file controller yang sesuai
$controller_file = '../app/controllers/' . $controller_name . '.php';

if (file_exists($controller_file)) {
    require_once $controller_file;

    // Membuat instance dari controller dan memanggil method-nya
    if (class_exists($controller_name)) {
        $controller = new $controller_name();

        if (method_exists($controller, $method_name)) {
            // Memanggil method dengan parameter jika ada
            call_user_func_array([$controller, $method_name], $params);
        } else {
            echo "Method not found: " . $method_name;
        }
    } else {
        echo "Controller class not found: " . $controller_name;
    }
} else {
    // Anda bisa membuat HomeController untuk halaman default
    echo "<h1>Selamat Datang!</h1><p>Silakan pilih menu di atas.</p>";
    // echo "Controller file not found: " . $controller_file;
}
