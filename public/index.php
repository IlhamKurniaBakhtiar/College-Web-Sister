<?php
session_start();

require_once __DIR__ . '/../config/database.php';

$database = new Database();
$db = $database->getConnection();

// Ambil path dari URL
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Sesuaikan base_path dengan project folder kamu
$base_path = 'College-Web-Sister/public';
if (strpos($path, $base_path) === 0) {
    $path = substr($path, strlen($base_path));
}
$path = trim($path, '/');

// Pecah URL jadi segmen
$segments = $path ? explode('/', $path) : [];

// Tentukan controller dan method
$controller_name = !empty($segments[0]) ? ucfirst(strtolower($segments[0])) . 'Controller' : 'HomeController';
$method_name     = !empty($segments[1]) ? strtolower($segments[1]) : 'index';
$params          = array_slice($segments, 2);

$controller_file = __DIR__ . '/../app/controllers/' . $controller_name . '.php';

// Cek login (kecuali AuthController)
if (!isset($_SESSION['user']) && $controller_name !== 'AuthController') {
    header("Location: /College-Web-Sister/public/auth/login");
    exit;
}

// Load controller file
if (file_exists($controller_file)) {
    require_once $controller_file;

    if (class_exists($controller_name)) {
        // AuthController perlu DB
        if ($controller_name === 'AuthController') {
            $controller = new $controller_name($db);
        } else {
            $controller = new $controller_name();
        }

        if (method_exists($controller, $method_name)) {
            // 🔑 Panggil method dengan parameter yang tepat
            $ref = new ReflectionMethod($controller, $method_name);
            $expectedParams = $ref->getNumberOfRequiredParameters();

            if ($expectedParams > 0) {
                call_user_func_array([$controller, $method_name], $params);
            } else {
                $controller->$method_name();
            }
        } else {
            http_response_code(404);
            echo "Error 404: Method '$method_name' not found in controller '$controller_name'.";
        }
    } else {
        http_response_code(404);
        echo "Error 404: Controller class '$controller_name' not found.";
    }
} else {
    // Default ke HomeController
    require_once __DIR__ . '/../app/controllers/HomeController.php';
    $homeController = new HomeController();
    $homeController->index();
}
