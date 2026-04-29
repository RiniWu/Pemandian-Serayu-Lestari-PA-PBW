<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$BASEURL = base_url();
$adminCssPath = dirname(__DIR__, 4) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'admin.css';
$adminCssVersion = file_exists($adminCssPath) ? filemtime($adminCssPath) : time();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle . ' - ' : '' ?>Admin | Serayu Lestari</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= $BASEURL ?>/assets/css/admin.css?v=<?= $adminCssVersion ?>">
</head>

<body class="admin-body">

    <!-- FLASH MESSAGE -->
    <?php if (isset($_SESSION['flash'])): ?>
        <div class="admin-flash-wrap">
            <div class="alert alert-<?= $_SESSION['flash']['type'] === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show admin-flash" role="alert">
                <?= htmlspecialchars($_SESSION['flash']['message']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <!-- Sidebar -->
    <div class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <div class="brand-icon-sm"><i class="bi bi-water"></i></div>
            <div>
                <div class="fw-bold text-white">Serayu Lestari</div>
                <small class="text-blue-fade">Panel Admin</small>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section-label">MENU UTAMA</div>

            <!-- DASHBOARD -->
            <a href="<?= $BASEURL ?>/admin/dashboard"
                class="sidebar-link <?= ($activePage ?? '') === 'dashboard' ? 'active' : '' ?>">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>

            <!-- WISATA -->
            <a href="<?= $BASEURL ?>/admin/fasilitas"
                class="sidebar-link <?= ($activePage ?? '') === 'fasilitas' ? 'active' : '' ?>">
                <i class="bi bi-grid-fill"></i>
                <span>Data Fasilitas</span>
            </a>

            <!-- ULASAN -->
            <a href="<?= $BASEURL ?>/admin/ulasan"
                class="sidebar-link <?= ($activePage ?? '') === 'ulasan' ? 'active' : '' ?>">
                <i class="bi bi-chat-square-text-fill"></i>
                <span>Data Ulasan</span>
            </a>

            <div class="nav-section-label mt-3">LAINNYA</div>

            <!-- LIHAT WEBSITE -->
            <a href="<?= $BASEURL ?>" target="_blank" class="sidebar-link">
                <i class="bi bi-globe"></i>
                <span>Lihat Website</span>
            </a>

            <!-- LOGOUT -->
            <a href="<?= $BASEURL ?>/auth/logout"
                class="sidebar-link text-danger-soft">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
            </a>
        </nav>
    </div>

    <div class="admin-sidebar-overlay" id="adminSidebarOverlay"></div>

    <!-- Main Content -->
    <div class="admin-main" id="adminMain">

        <div class="admin-topbar">
            <button class="btn-toggle-sidebar" id="toggleSidebar" type="button" aria-label="Buka menu" aria-controls="adminSidebar" aria-expanded="false">
                <i class="bi bi-list"></i>
            </button>

            <div class="topbar-title"><?= $pageTitle ?? 'Dashboard' ?></div>

            <div class="topbar-user">
                <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                <span class="d-none d-md-inline">
                    <?= htmlspecialchars($_SESSION['admin_nama'] ?? 'Admin') ?>
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="admin-content">
