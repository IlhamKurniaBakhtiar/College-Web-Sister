<?php

// Tentukan controller dan method dari URL
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'KuliahController';
$methodName = isset($_GET['method']) ? $_GET['method'] : 'index';

// Tentukan path ke controller
$controllerPath = '../app/controllers/' . $controllerName . '.php';

// Cek apakah file controller ada
if (file_exists($controllerPath)) {
    require_once $controllerPath;

    // Cek apakah class controller ada
    if (class_exists($controllerName)) {
        $controller = new $controllerName();

        // Cek apakah method ada di dalam class controller
        if (method_exists($controller, $methodName)) {
            // Panggil method
            $controller->$methodName();
        } else {
            // Tampilkan error jika method tidak ditemukan
            echo "Error: Method '$methodName' tidak ditemukan di Controller '$controllerName'.";
        }
    } else {
        // Tampilkan error jika class tidak ditemukan
        echo "Error: Class '$controllerName' tidak ditemukan.";
    }
} else {
    // Tampilkan error jika file controller tidak ditemukan
    echo "Error: Controller '$controllerName' tidak ditemukan.";
}
