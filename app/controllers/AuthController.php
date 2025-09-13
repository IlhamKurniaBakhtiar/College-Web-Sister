<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $db;
    private $userModel;

    public function __construct($db)
    {
        $this->db = $db;
        $this->userModel = new User($db);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);
            if ($user) {
                $_SESSION['user'] = $user;

                header("Location: /College-Web-Sister/public/auth/profile");
                exit;
            } else {
                $error = "Username atau password salah.";
            }
        }
        include __DIR__ . '/../views/auth/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email    = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->register($username, $email, $password)) {
                header("Location: /College-Web-Sister/public/auth/login");
                exit;
            } else {
                $error = "Gagal register.";
            }
        }
        include __DIR__ . '/../views/auth/register.php';
    }

    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /College-Web-Sister/public/auth/login");
            exit;
        }

        $user = $_SESSION['user'];
        $displayName = $user['nama'] ?? $user['username'];

        include __DIR__ . '/../views/auth/profile.php';
    }

    public function editProfile()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /College-Web-Sister/public/auth/login");
            exit;
        }

        $user = $_SESSION['user'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];

            if ($this->userModel->updateProfile($user['id'], $username, $email)) {
                $_SESSION['user']['username'] = $username;
                $_SESSION['user']['email'] = $email;
                header("Location: /College-Web-Sister/public/auth/profile");
                exit;
            } else {
                $error = "Gagal update profil.";
            }
        }

        include __DIR__ . '/../views/auth/editprofile.php';
    }

    public function logout()
    {
        session_destroy();
        header("Location: /College-Web-Sister/public/auth/login");
        exit;
    }
}
