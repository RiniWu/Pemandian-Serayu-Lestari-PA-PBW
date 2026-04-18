<?php
$d = mysqli_fetch_assoc($wisata);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemandian Serayu Lestari – Samarinda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <div class="brand-icon">
                    <i class="bi bi-water"></i>
                </div>
                <div>
                    <div class="brand-name">Pemandian Serayu Lestari</div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li><a class="nav-link" href="#"><i class="bi bi-house me-1"></i>Beranda</a></li>
                    <li><a class="nav-link" href="#wisata"><i class="bi bi-map me-1"></i>Wisata</a></li>
                    <li><a class="nav-link" href="#ulasan"><i class="bi bi-star me-1"></i>Ulasan</a></li>
                    <li><a href="#ulasan" class="btn btn-nav ms-2"><i class="bi bi-pencil me-1"></i>Jelajahi</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== HERO ===== -->
    <section class="hero">
        <div class="hero-bg-orb orb1"></div>
        <div class="hero-bg-orb orb2"></div>
        <div class="hero-bg-orb orb3"></div>

        <div class="container">
            <div class="row align-items-center g-5">

                <!-- KIRI -->
                <div class="col-lg-6">

                    <!-- LOCATION -->
                    <div class="badge-location mb-4">
                        <i class="bi bi-geo-alt-fill me-1"></i> Samarinda, Kalimantan Timur
                    </div>

                    <!-- TITLE -->
                    <h1 class="hero-title mb-3">
                        Nikmati Kesegaran<br>
                        <span class="hero-title-accent">Alam Serayu</span><br>
                        Lestari
                    </h1>

                    <!-- DESC -->
                    <p class="hero-desc mb-4">
                        Destinasi wisata air keluarga terbaik di Samarinda. Kolam renang jernih,
                        suasana alam sejuk, dan fasilitas lengkap menanti Anda.
                    </p>

                    <!-- BUTTON -->
                    <div class="hero-buttons d-flex gap-3 mb-5">
                        <a href="#wisata" class="btn btn-hero-primary">
                            <i class="bi bi-compass me-2"></i>Telusuri Sekarang
                        </a>

                        <a href="#ulasan" class="btn btn-hero-outline">
                            <i class="bi bi-eye me-2"></i>Lihat Kata Mereka
                        </a>
                    </div>

                    <!-- STATS -->
                    <div class="hero-stats d-flex align-items-center gap-4">

                        <div class="stat-item">
                            <h4>800+</h4>
                            <p>Pengunjung/Bulan</p>
                        </div>

                        <div class="stat-divider"></div>

                        <div class="stat-item">
                            <h4>4.8★</h4>
                            <p>Rating Wisata</p>
                        </div>

                        <div class="stat-divider"></div>

                        <div class="stat-item">
                            <h4>10+</h4>
                            <p>Fasilitas</p>
                        </div>

                    </div>

                </div>

                <!-- KANAN -->
                <div class="col-lg-6"> <!-- 🔥 diperbesar dari 6 ke 7 -->
                    <div class="hero-visual">

                        <div class="hero-badge-family">
                            <i class="bi bi-people-fill me-1"></i> Ramah Keluarga
                        </div>

                        <div class="hero-img-card">
                            <?php if (!empty($d['gambar'])): ?>
                                <img
                                    src="assets/images/<?= htmlspecialchars($d['gambar']) ?>"
                                    alt="Foto Wisata"
                                    class="hero-img img-fluid">
                            <?php else: ?>
                                <div class="hero-img-placeholder">
                                    <i class="bi bi-image"></i>
                                    <p>Foto Wisata</p>
                                    <small>Gambar dengan foto asli di public/img</small>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="hero-scroll-hint">
            <i class="bi bi-chevron-down"></i>
        </div>
    </section>

    <!-- ===== CAROUSEL FOTO ===== -->
    <div class="container my-5">
        <div id="carouselSerayu" class="carousel slide rounded-4 overflow-hidden shadow-lg" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/img2.jpg" class="d-block w-100 carousel-img" alt="Foto 1">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/img3.jpg" class="d-block w-100 carousel-img" alt="Foto 2">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/img4.jpg" class="d-block w-100 carousel-img" alt="Foto 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselSerayu" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselSerayu" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- ===== FITUR / KEUNGGULAN ===== -->
    <section class="section-features">
        <div class="container">
            <div class="section-label">MENGAPA PILIH KAMI</div>
            <h2 class="section-title-main">Pengalaman Wisata<br><span>Tak Terlupakan</span></h2>
            <p class="section-sub">Kami hadir untuk memberikan pengalaman liburan terbaik untuk Anda dan keluarga</p>

            <div class="row g-4 mt-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon bg-blue">
                            <i class="bi bi-droplet-fill"></i>
                        </div>
                        <h5>Kolam Renang Bersih</h5>
                        <p>Air bersih dan jernih dengan sirkulasi modern, dijaga kebersihannya setiap hari.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon bg-green">
                            <i class="bi bi-tree-fill"></i>
                        </div>
                        <h5>Suasana Alam Sejuk</h5>
                        <p>Dikelilingi pepohonan hijau yang memberikan kesejukan dan ketenangan alami.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon bg-orange">
                            <i class="bi bi-shield-check-fill"></i>
                        </div>
                        <h5>Aman & Ramah Anak</h5>
                        <p>Kolam khusus anak, penjaga keamanan, dan area bermain yang aman untuk buah hati.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== OBJEK WISATA ===== -->
    <section id="wisata" class="section-wisata">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                    <div class="section-label">DESTINASI KAMI</div>
                    <h2 class="section-title-main">Pemandian Serayu Lestari</h2>
                </div>
            </div>

            <div class="row g-4 mt-3">
                <div class="col-lg-5">
                    <div class="wisata-card">
                        <div class="wisata-card-img">
                            <?php if (!empty($d['gambar'])): ?>
                                <img src="assets/images/<?= htmlspecialchars($d['gambar']) ?>" alt="Wisata">
                            <?php else: ?>
                                <div class="wisata-img-placeholder"><i class="bi bi-image"></i></div>
                            <?php endif; ?>
                            <span class="wisata-badge-buka">● Buka</span>
                        </div>
                        <div class="wisata-card-body">
                            <h5><?= htmlspecialchars($d['nama'] ?? 'Pemandian Serayu Lestari') ?></h5>
                            <p><?= htmlspecialchars(substr($d['deskripsi'] ?? '', 0, 100)) ?>...</p>
                            <div class="wisata-info">
                                <span><i class="bi bi-geo-alt"></i> <?= htmlspecialchars($d['lokasi'] ?? '') ?></span>
                                <span><i class="bi bi-clock"></i> <?= htmlspecialchars($d['jam_buka'] ?? '') ?></span>
                                <span class="wisata-harga">
                                    <i class="bi bi-people"></i> Dewasa: <?= htmlspecialchars($d['harga_tiket'] ?? '') ?>
                                </span>
                            </div>
                            <a href="#tentang" class="btn btn-detail w-100 mt-3">
                                <i class="bi bi-info-circle me-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>

                <!-- TENTANG -->
                <div class="col-lg-7" id="tentang">
                    <div class="tentang-card h-100">
                        <h3 class="mb-3">Tentang <span>Kami</span></h3>
                        <p><?= htmlspecialchars($d['deskripsi'] ?? '') ?></p>
                        <hr class="my-3">
                        <div class="tentang-info-grid">
                            <div class="tentang-info-item">
                                <i class="bi bi-geo-alt-fill"></i>
                                <div>
                                    <small>Lokasi</small>
                                    <p><?= htmlspecialchars($d['lokasi'] ?? '') ?></p>
                                </div>
                            </div>
                            <div class="tentang-info-item">
                                <i class="bi bi-clock-fill"></i>
                                <div>
                                    <small>Jam Buka</small>
                                    <p><?= htmlspecialchars($d['jam_buka'] ?? '') ?></p>
                                </div>
                            </div>
                            <div class="tentang-info-item">
                                <i class="bi bi-ticket-fill"></i>
                                <div>
                                    <small>Harga Tiket</small>
                                    <p><?= htmlspecialchars($d['harga_tiket'] ?? '') ?></p>
                                </div>
                            </div>
                            <div class="tentang-info-item">
                                <i class="bi bi-grid-fill"></i>
                                <div>
                                    <small>Fasilitas</small>
                                    <p><?= htmlspecialchars($d['fasilitas'] ?? '') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FASILITAS ===== -->
    <section class="section-fasilitas">
        <div class="container">
            <div class="section-label text-center">LENGKAP & NYAMAN</div>
            <h2 class="section-title-main text-center">Fasilitas <span>Tersedia</span></h2>

            <div class="row g-3 mt-4">
                <?php
                $fasilitasList = [
                    ['icon' => 'bi-water',          'nama' => 'Kolam Renang Dewasa'],
                    ['icon' => 'bi-emoji-smile',    'nama' => 'Kolam Anak'],
                    ['icon' => 'bi-house-door',     'nama' => 'Gazebo & Santai'],
                    ['icon' => 'bi-cup-hot',        'nama' => 'Warung Makan'],
                    ['icon' => 'bi-door-closed',    'nama' => 'Kamar Bilas'],
                    ['icon' => 'bi-p-circle',       'nama' => 'Area Parkir'],
                    ['icon' => 'bi-lightning',      'nama' => 'Flying Fox'],
                    ['icon' => 'bi-camera',         'nama' => 'Spot Foto'],
                ];

                // Jika ada model Fasilitas, ambil dari DB
                if (isset($fasilitas)) {
                    mysqli_data_seek($fasilitas, 0);
                    while ($f = mysqli_fetch_assoc($fasilitas)) {
                        echo '<div class="col-6 col-md-3">';
                        echo '<div class="fasilitas-card">';
                        echo '<div class="fasilitas-icon"><i class="bi bi-check-circle-fill"></i></div>';
                        echo '<p>' . htmlspecialchars($f['nama']) . '</p>';
                        echo '</div></div>';
                    }
                } else {
                    foreach ($fasilitasList as $f) {
                        echo '<div class="col-6 col-md-3">';
                        echo '<div class="fasilitas-card">';
                        echo '<div class="fasilitas-icon"><i class="bi ' . $f['icon'] . '"></i></div>';
                        echo '<p>' . $f['nama'] . '</p>';
                        echo '</div></div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- ===== LOKASI ===== -->
    <section id="lokasi" class="section-lokasi">
        <div class="container">
            <h2 class="section-title-main text-center">Lokasi <span>Wisata</span></h2>

            <div class="map-wrapper mt-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.7038807288204!2d117.2108934!3d-0.4339606!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df5d7ad57501ed5%3A0x9b933c83728110ea!2sTempat%20wisata%20Pemandian%20Serayu%20Lestari!5e0!3m2!1sid!2sid!4v1776102263339!5m2!1sid!2sid"
                    width="100%"
                    height="350"
                    style="border:0;"
                    allowfullscreen
                    loading="lazy">
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="lokasi-info-row mt-4">
                <div class="lokasi-info-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <div>
                        <small>Alamat</small>
                        <p>Jl. Serayu No.24, Tanah Merah, Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75116</p>
                    </div>
                </div>
                <div class="lokasi-info-item">
                    <i class="bi bi-clock-fill"></i>
                    <div>
                        <small>Jam Operasional</small>
                        <p>08.30 – 17.00 WITA</p>
                    </div>
                </div>
                <div class="lokasi-info-item">
                    <i class="bi bi-telephone-fill"></i>
                    <div>
                        <small>Kontak</small>
                        <p>0852-5550-9272</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="https://www.google.com/maps/place/Tempat+wisata+Pemandian+Serayu+Lestari/@-0.4339606,117.2108934,17z/data=!4m14!1m7!3m6!1s0x2df5d6534ba9de1b:0x62c2f315f3260b0b!2sBaths+Serayu+Lestari!8m2!3d-0.4339606!4d117.2108934!16s%2Fg%2F11c7t2nygf!3m5!1s0x2df5d7ad57501ed5:0x9b933c83728110ea!8m2!3d-0.4332896!4d117.2108753!16s%2Fg%2F11d_8gm011?entry=ttu&g_ep=EgoyMDI2MDQwOC4wIKXMDSoASAFQAw%3D%3D"
                    target="_blank"
                    class="btn btn-maps">
                    <i class="bi bi-map-fill me-2"></i>Buka di Google Maps
                </a>
            </div>
        </div>
    </section>

    <!-- ===== ULASAN ===== -->
    <section id="ulasan" class="section-ulasan">
        <div class="container">
            <h2 class="section-title-main text-center">Sampaikan <span>Ulasan Kamu</span></h2>
            <p class="section-sub text-center">Dengarkan pengalaman nyata dari pengunjung setia kami</p>

            <?php
            // Ambil semua ulasan ke array dulu agar bisa reuse
            mysqli_data_seek($ulasan, 0);

            $ulasanData = [];
            while ($u = mysqli_fetch_assoc($ulasan)) {
                $ulasanData[] = $u;
            }
            $ulasanTampil = array_slice($ulasanData, 0, 4); // tampilkan 4 dulu
            ?>

            <div class="row g-4 mt-3" id="ulasanContainer">
                <?php foreach ($ulasanTampil as $u): ?>
                    <div class="col-md-6 col-lg-3">
                        <?php
                        $initial = strtoupper(substr($u['nama'] ?? 'U', 0, 1));
                        $colors = ['bg-blue', 'bg-teal', 'bg-orange', 'bg-purple', 'bg-green'];
                        $colorClass = $colors[array_rand($colors)];
                        ?>
                        <div class="ulasan-card">
                            <div class="ulasan-header">
                                <div class="ulasan-avatar <?= $colorClass ?>"><?= $initial ?></div>
                                <div>
                                    <strong><?= htmlspecialchars($u['nama']) ?></strong>
                                    <small><?= isset($u['tanggal']) ? date('d M Y', strtotime($u['tanggal'])) : '' ?></small>
                                </div>
                            </div>
                            <div class="ulasan-stars mb-2">
                                <?php if (isset($u['rating'])) for ($i = 0; $i < $u['rating']; $i++) echo "⭐"; ?>
                            </div>
                            <p class="ulasan-text">"<?= htmlspecialchars($u['komentar']) ?>"</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (count($ulasanData) > 4): ?>
                <div class="text-center mt-4">
                    <button class="btn btn-lihat-ulasan" id="btnLihatSemua">
                        <i class="bi bi-chevron-down me-2"></i>Lihat Semua Ulasan
                    </button>
                </div>
            <?php endif; ?>

            <!-- FORM ULASAN -->
            <div class="ulasan-form-card mt-5">
                <h5 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Tulis Ulasan Anda</h5>

                <form action="index.php?page=tambah_ulasan" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama</label>
                            <input name="nama" type="text" class="form-control" placeholder="Nama Anda" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Rating</label>
                            <select name="rating" class="form-control" required>
                                <option value="">Pilih Rating</option>
                                <option value="5">⭐⭐⭐⭐⭐ – Luar Biasa</option>
                                <option value="4">⭐⭐⭐⭐ – Bagus</option>
                                <option value="3">⭐⭐⭐ – Cukup</option>
                                <option value="2">⭐⭐ – Kurang</option>
                                <option value="1">⭐ – Buruk</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Komentar</label>
                            <textarea name="komentar" class="form-control" rows="3" placeholder="Ceritakan pengalaman Anda..." required></textarea>
                        </div>
                        <div class="col-12">
                            <button name="tambah" type="submit" class="btn btn-kirim w-100">
                                <i class="bi bi-send-fill me-2"></i>Kirim Ulasan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <!-- ===== CTA ===== -->
    <div class="container my-5">
        <div class="cta-box">
            <div class="cta-orb cta-orb1"></div>
            <div class="cta-orb cta-orb2"></div>
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="cta-title">
                        Siap Merasakan Kesegaran <span>Serayu Lestari?</span>
                    </h2>
                    <p class="cta-desc">Kunjungi kami dan rasakan pengalaman wisata air yang tak terlupakan bersama keluarga tercinta.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="#wisata" class="btn btn-cta-white me-2">
                        <i class="bi bi-info-circle me-1"></i>Info Wisata
                    </a>
                    <a href="#ulasan" class="btn btn-cta-outline">
                        <i class="bi bi-pencil me-1"></i>Tulis Ulasan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== WAVE ===== -->
    <div class="wave-divider">
        <svg viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path fill="#051524" d="M0,40 C240,80 480,0 720,40 C960,80 1200,0 1440,40 L1440,100 L0,100 Z"></path>
        </svg>
    </div>

    <!-- ===== FOOTER ===== -->
    <footer class="footer-modern" id="kontak">
        <div class="container">
            <div class="row g-4">

                <!-- BRAND -->
                <div class="col-md-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="footer-brand-icon">
                            <i class="bi bi-water"></i>
                        </div>
                        <div>
                            <div class="footer-brand-name">Pemandian Serayu Lestari</div>
                            <div class="footer-brand-sub">Samarinda</div>
                        </div>
                    </div>
                    <p class="footer-desc">
                        Destinasi wisata air keluarga terbaik di Samarinda. Nikmati kesegaran alam yang asri dan fasilitas lengkap.
                    </p>
                    <div class="footer-social mt-3">
                        <a href="#" class="social-btn"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-tiktok"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <!-- MENU -->
                <div class="col-md-2">
                    <h6 class="footer-col-title">Menu</h6>
                    <ul class="footer-list">
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#wisata">Wisata</a></li>
                        <li><a href="#ulasan">Ulasan</a></li>
                        <li><a href="index.php?page=admin">Admin</a></li>
                    </ul>
                </div>

                <!-- FASILITAS -->
                <div class="col-md-3">
                    <h6 class="footer-col-title">Fasilitas</h6>
                    <ul class="footer-list">
                        <li><i class="bi bi-check2 me-1"></i>Kolam Renang</li>
                        <li><i class="bi bi-check2 me-1"></i>Area Bermain</li>
                        <li><i class="bi bi-check2 me-1"></i>Gazebo & Santai</li>
                        <li><i class="bi bi-check2 me-1"></i>Warung Makan</li>
                    </ul>
                </div>

                <!-- KONTAK -->
                <div class="col-md-3">
                    <h6 class="footer-col-title">Kontak & Lokasi</h6>
                    <ul class="footer-contact-list">
                        <li><i class="bi bi-geo-alt-fill"></i> Jl. Serayu No.24, Tanah Merah, Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75116</li>
                        <li><i class="bi bi-clock-fill"></i> Buka Setiap Hari: 08.30 – 17.00 WITA</li>
                        <li><i class="bi bi-telephone-fill"></i> 0852-5550-9272</li>
                        <li><i class="bi bi-envelope-fill"></i> serayulestari@gmail.com</li>
                    </ul>
                </div>

            </div>

            <hr class="footer-divider mt-5">

            <p class="footer-copy text-center">
                © 2026 Pemandian Serayu Lestari. All rights reserved.
                <span class="ms-3 text-end d-block d-md-inline">Wisata Keluarga Terbaik di Samarinda 🌊</span>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Lihat semua ulasan
        document.getElementById('btnLihatSemua')?.addEventListener('click', function() {
            const allHidden = document.querySelectorAll('.ulasan-hidden');
            allHidden.forEach(el => el.classList.remove('ulasan-hidden'));
            this.style.display = 'none';
        });

        // Scroll reveal sederhana
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.feature-card, .ulasan-card, .fasilitas-card, .wisata-card, .tentang-card')
            .forEach(el => observer.observe(el));
    </script>
</body>

</html>