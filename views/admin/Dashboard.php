<?php
// ambil data dari model (sudah disiapkan di routes)
$totalUlasan = mysqli_num_rows(Ulasan::getAll());
$pending = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ulasan WHERE status='pending'"));
$approved = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ulasan WHERE status='approved'"));
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle . ' - ' : '' ?>Admin | Serayu Lestari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body class="admin-body">

    <!-- SIDEBAR -->
    <div class="admin-sidebar">

        <a href="#" class="sidebar-brand">
            <div class="brand-icon-sm">
                <i class="bi bi-water"></i>
            </div>
            <div>
                <strong>Serayu Lestari</strong><br>
                <span class="text-blue-fade">Panel Admin</span>
            </div>
        </a>

        <div class="sidebar-nav">

            <div class="nav-section-label">MENU UTAMA</div>

            <a href="index.php?page=admin_dashboard" class="sidebar-link active">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <a href="index.php?page=admin_ulasan" class="sidebar-link">
                <i class="bi bi-chat-left-text"></i> Data Ulasan
            </a>

            <div class="nav-section-label">LAINNYA</div>

            <a href="index.php" class="sidebar-link">
                <i class="bi bi-globe"></i> Lihat Website
            </a>

            <a href="index.php?page=logout" class="sidebar-link text-danger-soft">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>

        </div>
    </div>

    <!-- MAIN -->
    <div class="admin-main">

        <!-- TOPBAR -->
        <div class="admin-topbar">
            <button class="btn-toggle-sidebar">
                <i class="bi bi-list"></i>
            </button>

            <div class="topbar-title">Dashboard</div>

            <div class="topbar-user">
                <div class="user-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <?= $_SESSION['admin_username'] ?? 'Admin' ?>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="admin-content">

            <!-- STAT -->
            <div class="row g-4 mb-4">

                <div class="col-md-4">
                    <div class="stat-card stat-card-blue">
                        <div class="stat-card-icon">
                            <i class="bi bi-chat-fill"></i>
                        </div>
                        <div>
                            <div class="stat-card-num"><?= $totalUlasan ?></div>
                            <div class="stat-card-label">Total Ulasan</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat-card stat-card-green">
                        <div class="stat-card-icon">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <div>
                            <div class="stat-card-num"><?= $approved ?></div>
                            <div class="stat-card-label">Disetujui</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat-card stat-card-orange">
                        <div class="stat-card-icon">
                            <i class="bi bi-hourglass-split"></i>
                        </div>
                        <div>
                            <div class="stat-card-num"><?= $pending ?></div>
                            <div class="stat-card-label">Menunggu</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- TABLE -->
            <div class="admin-card">
                <div class="admin-card-header d-flex justify-content-between">
                    <h5 class="admin-card-title">Ulasan Terbaru</h5>
                    <a href="index.php?page=admin_ulasan" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>

                <div class="admin-card-body p-0">
                    <table class="table table-admin mb-0">

                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Komentar</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($u = mysqli_fetch_assoc($ulasan)): ?>
                                <tr>
                                    <td><?= $u['nama'] ?></td>
                                    <td><?= $u['komentar'] ?></td>
                                    <td><?= $u['rating'] ?> ⭐</td>

                                    <td>
                                        <?php if ($u['status'] == 'pending'): ?>
                                            <span class="badge bg-warning">Menunggu</span>
                                        <?php else: ?>
                                            <span class="badge bg-success">Disetujui</span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <a href="index.php?page=hapus_ulasan&id=<?= $u['id'] ?>" class="btn btn-xs btn-outline-danger">Hapus</a>

                                        <?php if ($u['status'] == 'pending'): ?>
                                            <a href="index.php?page=hapus_ulasan&approve=<?= $u['id'] ?>" class="btn btn-xs btn-success">✓</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

</body>