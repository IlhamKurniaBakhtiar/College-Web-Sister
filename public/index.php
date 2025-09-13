<?php
// File: public/index.php

// 1. Menguraikan URL yang diminta
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// 2. Menghapus base path/direktori proyek dari URL
// Sesuaikan 'proyek_kuliah/public' dengan nama direktori Anda
$base_path = 'College-Web-Sister/public';
if (strpos($path, $base_path) === 0) {
    $path = substr($path, strlen($base_path));
}
$path = trim($path, '/');
$segments = $path ? explode('/', $path) : [];

// 3. Menentukan Controller, Method, dan Parameter
$controller_name = !empty($segments[0]) ? ucfirst(strtolower($segments[0])) . 'Controller' : 'HomeController';
$method_name = !empty($segments[1]) ? strtolower($segments[1]) : 'index';
$params = array_slice($segments, 2);

// 4. Memuat file Controller
$controller_file = __DIR__ . '/../app/controllers/' . $controller_name . '.php';

if (file_exists($controller_file)) {
    require_once $controller_file;

    if (class_exists($controller_name)) {
        $controller = new $controller_name();

        if (method_exists($controller, $method_name)) {
            // Memanggil method dengan parameter
            call_user_func_array([$controller, $method_name], $params);
        } else {
            // Error: Method tidak ditemukan
            echo "Error 404: Method '$method_name' not found in controller '$controller_name'.";
        }
    } else {
        // Error: Class Controller tidak ditemukan
        echo "Error 404: Controller class '$controller_name' not found.";
    }
} else {
    // Jika file controller tidak ada, panggil HomeController sebagai default
    require_once __DIR__ . '/../app/controllers/HomeController.php';
    $homeController = new HomeController();
    $homeController->index();
}
