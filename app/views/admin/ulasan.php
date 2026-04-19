<?php
$BASEURL = "http://pa_pbw_profilwisata.test";

$daftarUlasan = $ulasan ?? [];
$filter = $filter ?? 'semua';

$totalSemua = $total ?? 0;
$totalMenunggu = $pending ?? 0;
$totalDisetujui = $approved ?? 0;
$totalDitolak = 0; // optional kalau belum ada
?>

<!-- TITLE -->
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
    <h4 class="mb-0 fw-bold">Data Ulasan Pengunjung</h4>
</div>

<!-- FILTER TABS -->
<div class="filter-tabs mb-4">
    <a href="<?= $BASEURL ?>/admin/ulasan"
        class="filter-tab <?= $filter === 'semua' ? 'active' : '' ?>">
        Semua <span class="tab-badge"><?= $totalSemua ?></span>
    </a>

    <a href="<?= $BASEURL ?>/admin/ulasan"
        class="filter-tab">
        Menunggu <span class="tab-badge tab-badge-warning"><?= $totalMenunggu ?></span>
    </a>

    <a href="<?= $BASEURL ?>/admin/ulasan"
        class="filter-tab">
        Disetujui <span class="tab-badge tab-badge-success"><?= $totalDisetujui ?></span>
    </a>
</div>

<!-- TABLE -->
<div class="admin-card">
    <div class="admin-card-header">
        <h5 class="admin-card-title">
            Data Ulasan (<?= count($daftarUlasan) ?>)
        </h5>
    </div>

    <div class="admin-card-body p-0">
        <div class="table-responsive">

            <table class="table table-admin mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pengunjung</th>
                        <th>Komentar</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($daftarUlasan as $i => $u): ?>
                        <tr>

                            <td><?= $i + 1 ?></td>

                            <td>
                                <div class="fw-medium"><?= htmlspecialchars($u['nama']) ?></div>
                            </td>

                            <td>
                                <small><?= htmlspecialchars(substr($u['komentar'], 0, 80)) ?>...</small>
                            </td>

                            <td><?= $u['rating'] ?> ⭐</td>

                            <td>
                                <?php if ($u['status'] === 'pending'): ?>
                                    <span class="badge bg-warning">Menunggu</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Disetujui</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="d-flex gap-1">

                                    <!-- APPROVE -->
                                    <?php if ($u['status'] === 'pending'): ?>
                                        <a href="<?= $BASEURL ?>/admin/approve/<?= $u['id'] ?>"
                                            class="btn btn-xs btn-success">
                                            <i class="bi bi-check-lg"></i>
                                        </a>
                                    <?php endif; ?>

                                    <!-- DELETE -->
                                    <a href="<?= $BASEURL ?>/admin/delete/<?= $u['id'] ?>"
                                        class="btn btn-xs btn-outline-danger"
                                        onclick="return confirm('Yakin hapus ulasan?')">
                                        <i class="bi bi-trash"></i>
                                    </a>

                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                    <?php if (empty($daftarUlasan)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox display-6 d-block mb-2"></i>
                                Tidak ada ulasan
                            </td>
                        </tr>
                    <?php endif; ?>

                </tbody>

            </table>

        </div>
    </div>
</div>