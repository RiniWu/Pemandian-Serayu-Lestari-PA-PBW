<?php

require_once "controllers/AuthController.php";
require_once "controllers/UlasanController.php";
require_once "models/Wisata.php";
require_once "models/Ulasan.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {

    case 'home':
        $wisata = Wisata::getData();
        $ulasan = Ulasan::getApproved(); // 🔥 ganti ini
        require "views/home_index.php";
        break;

    case 'login':
        require_once "controllers/AuthController.php";
        break;

    // 🔥 DASHBOARD ADMIN
    case 'admin_dashboard':
        if (!isset($_SESSION['login'])) {
            header("Location: index.php?page=login");
            exit;
        }
        require "views/admin/dashboard.php";
        break;

    // 🔥 DATA ULASAN ADMIN
    case 'admin_ulasan':
        if (!isset($_SESSION['login'])) {
            header("Location: index.php?page=login");
            exit;
        }
        $ulasan = Ulasan::getAll();
        require "views/admin/ulasan.php";
        break;

    // 🔥 ACTION
    case 'tambah_ulasan':
        require_once "controllers/UlasanController.php";
        break;

    case 'hapus_ulasan':
        require_once "controllers/UlasanController.php";
        break;

    case 'logout':
        session_unset();
        session_destroy();
        header("Location: index.php");
        break;

    default:
        echo "404";
}
