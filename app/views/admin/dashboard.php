<?php
// Variabel dari controller (sudah di-extract)
$ulasan = $ulasan ?? [];
$totalUlasan = $total ?? 0;
$pending = $pending ?? 0;
$approved = $approved ?? 0;

$BASEURL = base_url();
?>

<!-- STAT CARDS -->
<div class="row g-4 mb-4">

    <div class="col-sm-6 col-xl-3">
        <div class="stat-card stat-card-blue">
            <div class="stat-card-icon"><i class="bi bi-map-fill"></i></div>
            <div class="stat-card-info">
                <div class="stat-card-num"><?= $totalWisata ?? 0 ?></div>
                <div class="stat-card-label">Total Wisata</div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="stat-card stat-card-green">
            <div class="stat-card-icon"><i class="bi bi-check-circle-fill"></i></div>
            <div class="stat-card-info">
                <div class="stat-card-num"><?= $wisataAktif ?? 0 ?></div>
                <div class="stat-card-label">Wisata Aktif</div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="stat-card stat-card-purple">
            <div class="stat-card-icon"><i class="bi bi-chat-fill"></i></div>
            <div class="stat-card-info">
                <div class="stat-card-num"><?= $total ?? 0 ?></div>
                <div class="stat-card-label">Total Ulasan</div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="stat-card stat-card-orange">
            <div class="stat-card-icon"><i class="bi bi-hourglass-split"></i></div>
            <div class="stat-card-info">
                <div class="stat-card-num"><?= $pending ?? 0 ?></div>
                <div class="stat-card-label">Ulasan Menunggu</div>
            </div>
        </div>
    </div>

</div>

<div class="row g-4">

    <!-- ULASAN TERBARU -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header d-flex justify-content-between align-items-center">
                <h5 class="admin-card-title">Ulasan Terbaru</h5>
                <a href="<?= $BASEURL ?>/admin/ulasan" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>

            <div class="admin-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-admin mb-0">
                        <thead>
                            <tr>
                                <th>Pengunjung</th>
                                <th>Komentar</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($ulasan as $u): ?>
                                <tr>
                                    <td>
                                        <div class="fw-medium"><?= htmlspecialchars($u['nama']) ?></div>
                                    </td>

                                    <td><?= htmlspecialchars($u['komentar']) ?></td>

                                    <td><?= $u['rating'] ?> ⭐</td>

                                    <td>
                                        <?php if ($u['status'] === 'pending'): ?>
                                            <span class="badge bg-warning">Menunggu</span>
                                        <?php else: ?>
                                            <span class="badge bg-success">Disetujui</span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if ($u['status'] === 'pending'): ?>
                                            <a href="<?= $BASEURL ?>/admin/approve/<?= $u['id'] ?>"
                                                class="btn btn-xs btn-success">✓</a>
                                        <?php endif; ?>

                                        <a href="<?= $BASEURL ?>/admin/delete/<?= $u['id'] ?>"
                                            class="btn btn-xs btn-outline-danger"
                                            onclick="return confirm('Hapus ulasan?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($ulasan)): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        Belum ada ulasan
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- QUICK ACTION -->
    <div class="col-lg-4">

        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5 class="admin-card-title">Aksi Cepat</h5>
            </div>

            <div class="admin-card-body">
                <div class="d-grid gap-2">

                    <a href="<?= $BASEURL ?>/admin/wisata"
                        class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Wisata
                    </a>

                    <a href="<?= $BASEURL ?>/admin/ulasan"
                        class="btn btn-warning text-dark">
                        <i class="bi bi-clock me-2"></i>Review Ulasan (<?= $pending ?? 0 ?>)
                    </a>

                    <a href="<?= $BASEURL ?>" target="_blank"
                        class="btn btn-outline-secondary">
                        <i class="bi bi-globe me-2"></i>Lihat Website
                    </a>

                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="admin-card-title">Info Sistem</h5>
            </div>

            <div class="admin-card-body">
                <ul class="list-unstyled mb-0">

                    <li class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">PHP</span>
                        <span class="fw-medium"><?= PHP_VERSION ?></span>
                    </li>

                    <li class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Admin</span>
                        <span class="fw-medium"><?= $_SESSION['admin_nama'] ?? 'Admin' ?></span>
                    </li>

                    <li class="d-flex justify-content-between py-2">
                        <span class="text-muted">Status</span>
                        <span class="fw-medium text-success">Aktif</span>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</div>
