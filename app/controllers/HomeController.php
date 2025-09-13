<?php

class HomeController
{
    public function index()
    {
        $pageTitle = 'Selamat Datang';
        require_once __DIR__ . '/../views/home/index.php';
    }
}
