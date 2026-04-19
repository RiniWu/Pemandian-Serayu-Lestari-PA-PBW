<?php
$fasilitas = $fasilitas ?? [];
?>

<div class="admin-section">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h4 class="mb-0 fw-bold">Data Fasilitas</h4>

        <a href="/admin/fasilitas?tambah=1" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Fasilitas
        </a>
    </div>

    <?php
    $editData = null;
    if (isset($_GET['edit'])) {
        foreach ($fasilitas as $f) {
            if ($f['id'] == $_GET['edit']) {
                $editData = $f;
            }
        }
    }
    ?>

    <!-- FORM -->
    <?php if (isset($_GET['tambah']) || $editData): ?>
        <div class="admin-card mb-4">

            <div class="admin-card-header">
                <h5 class="admin-card-title">
                    <?= $editData ? 'Edit Fasilitas' : 'Tambah Fasilitas' ?>
                </h5>
            </div>

            <div class="admin-card-body">
                <form method="POST"
                    action="<?= $editData ? '/admin/editFasilitas/' . $editData['id'] : '/admin/tambahFasilitas' ?>">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label fw-medium">Nama Fasilitas</label>
                            <input type="text" name="nama" class="form-control"
                                value="<?= htmlspecialchars($editData['nama'] ?? '') ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium">Icon (Bootstrap Icon)</label>
                            <input type="text" name="icon" class="form-control"
                                placeholder="contoh: bi-water"
                                value="<?= htmlspecialchars($editData['icon'] ?? '') ?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-medium">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($editData['deskripsi'] ?? '') ?></textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-medium">Status</label>
                            <select name="status" class="form-select">
                                <option value="aktif" <?= ($editData['status'] ?? '') === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                                <option value="nonaktif" <?= ($editData['status'] ?? '') === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                            </select>
                        </div>

                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i>
                            <?= $editData ? 'Update' : 'Simpan' ?>
                        </button>

                        <a href="/admin/fasilitas" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle me-1"></i> Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    <?php endif; ?>

    <!-- TABLE -->
    <div class="admin-card">

        <div class="admin-card-header">
            <h5 class="admin-card-title">
                Daftar Fasilitas (<?= count($fasilitas) ?>)
            </h5>
        </div>

        <div class="admin-card-body p-0">
            <div class="table-responsive">

                <table class="table table-admin mb-0">

                    <thead>
                        <tr>
                            <th width="40">#</th>
                            <th>Icon</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($fasilitas)): ?>
                            <?php foreach ($fasilitas as $i => $f): ?>
                                <tr>

                                    <td><?= $i + 1 ?></td>

                                    <td>
                                        <div class="fs-5 text-primary">
                                            <i class="bi <?= htmlspecialchars($f['icon']) ?>"></i>
                                        </div>
                                    </td>

                                    <td class="fw-medium">
                                        <?= htmlspecialchars($f['nama']) ?>
                                    </td>

                                    <td>
                                        <span class="badge bg-<?= $f['status'] === 'aktif' ? 'success' : 'secondary' ?>">
                                            <?= ucfirst($f['status']) ?>
                                        </span>
                                    </td>

                                    <td>
                                        <div class="d-flex gap-1 flex-wrap">

                                            <a href="/admin/fasilitas?edit=<?= $f['id'] ?>"
                                                class="btn btn-xs btn-outline-primary"
                                                title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <a href="/admin/hapusFasilitas/<?= $f['id'] ?>"
                                                class="btn btn-xs btn-outline-danger"
                                                onclick="return confirm('Yakin hapus fasilitas ini?')"
                                                title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </a>

                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    Belum ada data fasilitas
                                </td>
                            </tr>
                        <?php endif; ?>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>