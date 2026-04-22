<?php

require_once __DIR__ . '/Flash.php';

if (!function_exists('base_url')) {
    function base_url($path = '')
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
        $path = ltrim($path, '/');

        $baseUrl = $scheme . '://' . $host . $basePath;

        return $path === '' ? $baseUrl : $baseUrl . '/' . $path;
    }
}

class Controller
{
    public function model($model)
    {
        require_once __DIR__ . '/../models/' . $model . '.php';
        return new $model;
    }

    // VIEW ADMIN (pakai layout)
    public function viewAdmin($view, $data = [])
    {
        extract($data);

        require_once __DIR__ . '/../views/admin/layouts/header.php';
        require_once __DIR__ . '/../views/' . $view . '.php';
        require_once __DIR__ . '/../views/admin/layouts/footer.php';
    }

    // VIEW BIASA (tanpa layout admin)
    public function view($view, $data = [])
    {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
