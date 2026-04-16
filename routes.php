<?php

require_once "models/Wisata.php";
require_once "models/Ulasan.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {

    case 'home':
        $wisata = Wisata::getData();
        $ulasan = Ulasan::getApproved();
        require "views/home_index.php";
        break;

    case 'login':
        require_once "controllers/AuthController.php";
        break;

    case 'admin_dashboard':
        if (!isset($_SESSION['login'])) {
            header("Location: index.php?page=login");
            exit;
        }

        // ambil semua ulasan
        $ulasan = Ulasan::getAll();

        // statistik
        $totalUlasan = mysqli_num_rows($ulasan);
        $pending = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ulasan WHERE status='pending'"));
        $approved = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ulasan WHERE status='approved'"));

        require "views/admin/dashboard.php";
        break;

    case 'admin_ulasan':
        if (!isset($_SESSION['login'])) {
            header("Location: index.php?page=login");
            exit;
        }
        $ulasan = Ulasan::getAll();
        require "views/admin/ulasan.php";
        break;

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
