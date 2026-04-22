<?php
$fasilitas = $fasilitas ?? [];
$BASEURL = base_url();
?>

<div class="admin-section">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h4 class="mb-0 fw-bold">Data Fasilitas</h4>

        <a href="<?= $BASEURL ?>/admin/fasilitas?tambah=1" class="btn btn-primary">
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
                <form method="POST" enctype="multipart/form-data"
                    action="<?= $editData ? $BASEURL . '/admin/editFasilitas/' . $editData['id'] : $BASEURL . '/admin/tambahFasilitas' ?>">

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

                        <div class="col-12">
                            <label class="form-label fw-medium">Foto Fasilitas</label>
                            <div id="fotoFasilitasList" class="d-flex flex-column gap-2">
                                <input type="file" name="gambar[]" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif">
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="btnTambahFotoField">
                                <i class="bi bi-plus-circle me-1"></i>Tambah Kolom Foto
                            </button>
                            <small class="text-muted d-block mt-2">
                                Bisa upload banyak foto sekaligus dengan menambah kolom foto. Format: JPG, PNG, WEBP, GIF. Maksimal 5MB per file.
                            </small>
                        </div>

                        <?php if ($editData && !empty($editData['gambar_list'])): ?>
                            <div class="col-12">
                                <label class="form-label fw-medium">Foto Saat Ini</label>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php foreach ($editData['gambar_list'] as $gambar): ?>
                                        <a href="<?= $BASEURL . '/' . htmlspecialchars($gambar) ?>" target="_blank" rel="noopener noreferrer">
                                            <img src="<?= $BASEURL . '/' . htmlspecialchars($gambar) ?>"
                                                alt="Foto <?= htmlspecialchars($editData['nama']) ?>"
                                                style="width:90px;height:90px;object-fit:cover;border-radius:10px;border:1px solid #dee2e6;">
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="replace_gambar" value="1" id="replaceGambar">
                                    <label class="form-check-label" for="replaceGambar">
                                        Ganti semua foto lama dengan foto baru yang diupload
                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i>
                            <?= $editData ? 'Update' : 'Simpan' ?>
                        </button>

                        <a href="<?= $BASEURL ?>/admin/fasilitas" class="btn btn-outline-secondary">
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
                            <th>Foto</th>
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
                                        <?php $jumlahGambar = count($f['gambar_list'] ?? []); ?>
                                        <?php if ($jumlahGambar > 0): ?>
                                            <span class="badge bg-info text-dark"><?= $jumlahGambar ?> foto</span>
                                        <?php else: ?>
                                            <span class="text-muted">Belum ada</span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <span class="badge bg-<?= $f['status'] === 'aktif' ? 'success' : 'secondary' ?>">
                                            <?= ucfirst($f['status']) ?>
                                        </span>
                                    </td>

                                    <td>
                                        <div class="d-flex gap-1 flex-wrap">

                                            <a href="<?= $BASEURL ?>/admin/fasilitas?edit=<?= $f['id'] ?>"
                                                class="btn btn-xs btn-outline-primary"
                                                title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <a href="<?= $BASEURL ?>/admin/hapusFasilitas/<?= $f['id'] ?>"
                                                class="btn btn-xs btn-outline-danger btn-hapus-fasilitas"
                                                data-fasilitas-nama="<?= htmlspecialchars($f['nama'], ENT_QUOTES) ?>"
                                                data-delete-url="<?= $BASEURL ?>/admin/hapusFasilitas/<?= $f['id'] ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalHapusFasilitas"
                                                title="Hapus data fasilitas">
                                                <i class="bi bi-trash"></i>
                                            </a>

                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
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

<div class="modal fade" id="modalHapusFasilitas" tabindex="-1" aria-labelledby="modalHapusFasilitasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <div>
                    <p class="text-danger fw-semibold mb-1">Konfirmasi hapus</p>
                    <h5 class="modal-title mb-0" id="modalHapusFasilitasLabel">Hapus fasilitas ini?</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body pt-3">
                <p class="mb-0 text-muted">
                    Fasilitas <span class="fw-semibold text-body" id="hapusFasilitasNama">ini</span> akan dihapus permanen.
                    Data dan foto yang terkait tidak bisa dipulihkan setelah aksi ini dilakukan.
                </p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-danger" id="btnKonfirmasiHapusFasilitas">Ya, hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fotoList = document.getElementById('fotoFasilitasList');
        const btnTambah = document.getElementById('btnTambahFotoField');
        const modalHapus = document.getElementById('modalHapusFasilitas');
        const namaHapus = document.getElementById('hapusFasilitasNama');
        const btnKonfirmasiHapus = document.getElementById('btnKonfirmasiHapusFasilitas');
        const tombolHapus = document.querySelectorAll('.btn-hapus-fasilitas');

        if (!fotoList || !btnTambah) {
            // Modal hapus tetap bisa dipakai walau form foto tidak tampil.
        }

        if (fotoList && btnTambah) {
            btnTambah.addEventListener('click', function() {
                const input = document.createElement('input');
                input.type = 'file';
                input.name = 'gambar[]';
                input.className = 'form-control';
                input.accept = '.jpg,.jpeg,.png,.webp,.gif';
                fotoList.appendChild(input);
            });
        }

        if (modalHapus && namaHapus && btnKonfirmasiHapus) {
            tombolHapus.forEach(function(tombol) {
                tombol.addEventListener('click', function() {
                    const nama = tombol.getAttribute('data-fasilitas-nama') || 'fasilitas ini';
                    const deleteUrl = tombol.getAttribute('data-delete-url') || '#';

                    namaHapus.textContent = nama;
                    btnKonfirmasiHapus.setAttribute('href', deleteUrl);
                });
            });
        }
    });
</script>
