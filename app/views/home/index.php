<?php
$d = $data['wisata'][0] ?? null;
$ulasan = $data['ulasan'] ?? [];
$BASEURL = base_url();
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
    <link rel="stylesheet" href="<?= $BASEURL ?>/assets/css/style.css">
</head>

<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNavbar">
        <div class="container">

            <!-- BRAND -->
            <a class="navbar-brand d-flex align-items-center gap-3" href="#">
                <div class="brand-icon">
                    <i class="bi bi-water"></i>
                </div>
                <div>
                    <div class="brand-name">Pemandian Serayu Lestari</div>
                    <div class="d-block brand-tagline">Wisata Air Keluarga</div>
                </div>
            </a>

            <!-- TOGGLER -->
            <button class="navbar-toggler border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu">
                <i class="bi bi-list text-white fs-2"></i>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-center gap-2">

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom active" href="#">
                            <i class="bi bi-house-door me-1"></i>Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="#wisata">
                            <i class="bi bi-compass me-1"></i>Wisata
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="#ulasan">
                            <i class="bi bi-chat-dots me-1"></i>Ulasan
                        </a>
                    </li>

                    <li class="nav-item ms-2">
                        <a href="#wisata" class="btn-nav-cta">
                            <i class="bi bi-ticket-perforated me-1"></i>Jelajahi
                        </a>
                    </li>

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
                    <div class="hero-buttons mb-5">
                        <a href="#wisata" class="btn-hero-primary">
                            <i class="bi bi-compass me-2"></i>Telusuri Sekarang
                        </a>
                        <a href="#ulasan" class="btn-hero-outline">
                            <i class="bi bi-eye me-2"></i>Lihat Kata Mereka
                        </a>
                    </div>

                    <!-- STATS -->
                    <div class="hero-stats">

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
                                    src="<?= $BASEURL ?>/assets/images/<?= htmlspecialchars($d['gambar']) ?>"
                                    alt="Foto Wisata Pemandian Serayu Lestari"
                                    class="hero-img">
                            <?php else: ?>
                                <div class="hero-img-placeholder">
                                    <i class="bi bi-image"></i>
                                    <p>Foto Wisata</p>
                                    <small>Tambahkan foto di folder assets/images</small>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="hero-scroll-hint">
            <a href="#wisata">
                <i class="bi bi-chevron-down"></i>
                <i class="bi bi-chevron-down"></i>
            </a>
        </div>
    </section>

    <!-- ===== CAROUSEL FOTO ===== -->
    <div class="container my-5">
        <div id="carouselSerayu" class="carousel slide rounded-4 overflow-hidden shadow-lg" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= $BASEURL ?>/assets/images/img2.jpg" class="d-block w-100 carousel-img" alt="Foto Pemandian 1">
                </div>
                <div class="carousel-item">
                    <img src="<?= $BASEURL ?>/assets/images/img3.jpg" class="d-block w-100 carousel-img" alt="Foto Pemandian 2">
                </div>
                <div class="carousel-item">
                    <img src="<?= $BASEURL ?>/assets/images/img4.jpg" class="d-block w-100 carousel-img" alt="Foto Pemandian 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselSerayu" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselSerayu" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- ===== FITUR / KEUNGGULAN ===== -->
    <section class="section-features">
        <div class="container text-center">

            <h2 class="section-title-main">
                Rasakan Liburan Air yang<br>
                <span>Lebih Nyaman & Berkesan</span>
            </h2>

            <p class="section-sub">
                Tempat terbaik untuk melepas penat, bermain, dan menciptakan momen indah bersama keluarga tercinta.
            </p>

            <div class="row g-4 mt-4">

                <!-- 1 -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon bg-blue">
                            <i class="bi bi-droplet-fill"></i>
                        </div>
                        <h5>Air Jernih & Higienis</h5>
                        <p>
                            Kolam selalu terjaga kebersihannya dengan sistem filtrasi modern,
                            memberikan pengalaman berenang yang segar dan nyaman setiap saat.
                        </p>
                    </div>
                </div>

                <!-- 2 -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon bg-green">
                            <i class="bi bi-tree-fill"></i>
                        </div>
                        <h5>Nuansa Alam Menenangkan</h5>
                        <p>
                            Dikelilingi pepohonan hijau dan udara segar,
                            menciptakan suasana rileks yang cocok untuk melepas penat dari rutinitas.
                        </p>
                    </div>
                </div>

                <!-- 3 -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon bg-orange">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h5>Aman & Ramah Keluarga</h5>
                        <p>
                            Area khusus anak, pengawasan keamanan, dan fasilitas lengkap
                            menjadikan tempat ini aman serta nyaman untuk semua usia.
                        </p>
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
                                <img src="<?= $BASEURL ?>/assets/images/<?= htmlspecialchars($d['gambar']) ?>" alt="Foto <?= htmlspecialchars($d['nama'] ?? 'Wisata') ?>">
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
                $index = 0;

                // Array statis fasilitas (untuk tampilan home)
                $fasilitasList = [
                    ['icon' => 'bi-water',       'nama' => 'Kolam Renang Dewasa', 'deskripsi' => 'Kolam renang dengan kedalaman 1,2m - 2m, air jernih dan bersih.'],
                    ['icon' => 'bi-emoji-smile', 'nama' => 'Kolam Anak', 'deskripsi' => 'Kolam khusus anak dengan kedalaman aman 30cm - 60cm.'],
                    ['icon' => 'bi-house-door',  'nama' => 'Gazebo & Santai', 'deskripsi' => 'Tempat bersantai bersama keluarga dengan gazebo nyaman.'],
                    ['icon' => 'bi-cup-hot',     'nama' => 'Warung Makan', 'deskripsi' => 'Tersedia berbagai menu makanan dan minuman segar.'],
                    ['icon' => 'bi-door-closed', 'nama' => 'Kamar Bilas', 'deskripsi' => 'Kamar bilas bersih dengan air hangat dan dingin.'],
                    ['icon' => 'bi-p-circle',    'nama' => 'Area Parkir', 'deskripsi' => 'Area parkir luas untuk mobil dan motor.'],
                    ['icon' => 'bi-lightning',   'nama' => 'Flying Fox', 'deskripsi' => 'Wahana flying fox dengan panjang lintasan 50 meter.'],
                    ['icon' => 'bi-camera',      'nama' => 'Spot Foto', 'deskripsi' => 'Berbagai spot foto instagramable dengan dekorasi alam.'],
                ];

                // Loop dan scan gambar dari folder
                foreach ($fasilitasList as $f) {
                    // Buat slug dari nama
                    $slug = strtolower(trim($f['nama']));
                    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
                    $slug = trim($slug, '-');

                    // Path folder gambar
                    $folderPath = 'assets/images/fasilitas/' . $slug . '/';
                    $fullPath = __DIR__ . '/../../../public/' . $folderPath;

                    // Scan gambar dari folder
                    $gambarArray = [];
                    if (is_dir($fullPath)) {
                        $files = scandir($fullPath);
                        foreach ($files as $file) {
                            if (preg_match('/\.(jpg|jpeg|png|webp|gif)$/i', $file)) {
                                $gambarArray[] = $folderPath . $file;
                            }
                        }
                        sort($gambarArray);
                    }

                    // Fallback kalau folder kosong atau tidak ada
                    if (empty($gambarArray)) {
                        $gambarArray = ['assets/images/img1.jpg'];
                    }

                    $gambarJson = json_encode($gambarArray);
                    $nama = htmlspecialchars($f['nama'], ENT_QUOTES);
                    $deskripsi = htmlspecialchars($f['deskripsi'], ENT_QUOTES);
                    $icon = htmlspecialchars($f['icon']);
                    $jumlahGambar = count($gambarArray);
                ?>
                    <div class="col-6 col-md-3">
                        <div class="fasilitas-card"
                            onclick='bukaLightbox(<?php echo $index; ?>, "<?php echo $nama; ?>", "<?php echo $deskripsi; ?>", <?php echo $gambarJson; ?>)'>
                            <div class="fasilitas-icon">
                                <i class="bi <?php echo $icon; ?>"></i>
                            </div>
                            <p><?php echo htmlspecialchars($f['nama']); ?></p>
                            <small class="text-muted">
                                <i class="bi bi-images"></i> Lihat Galeri
                                <span class="badge-gambar"><?php echo $jumlahGambar; ?></span>
                            </small>
                        </div>
                    </div>
                <?php
                    $index++;
                }
                ?>
            </div>
        </div>
    </section>

    <!-- ===== LIGHTBOX OVERLAY ===== -->
    <div id="lightbox-overlay" class="lightbox-overlay" onclick="tutupLightbox(event)">
        <div class="lightbox-container" onclick="event.stopPropagation()">
            <button class="lightbox-close" onclick="tutupLightbox()">
                <i class="bi bi-x-lg"></i>
            </button>

            <button class="lightbox-nav lightbox-prev" onclick="gantiFoto(-1)">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="lightbox-nav lightbox-next" onclick="gantiFoto(1)">
                <i class="bi bi-chevron-right"></i>
            </button>

            <div class="lightbox-content">
                <img id="lightbox-img" src="" alt="Fasilitas">
                <div class="lightbox-info">
                    <h3 id="lightbox-judul"></h3>
                    <p id="lightbox-deskripsi"></p>
                    <div class="lightbox-counter">
                        <span id="lightbox-current">1</span> / <span id="lightbox-total">1</span>
                    </div>
                </div>
            </div>

            <div class="lightbox-thumbnails" id="lightbox-thumbnails"></div>
        </div>
    </div>

    <!-- ===== LOKASI ===== -->
    <section id="lokasi" class="section-lokasi">
        <div class="container">
            <h2 class="section-title-main text-center">Lokasi <span>Wisata</span></h2>

            <div class="map-wrapper mt-4">
                <!-- Diperbaiki: referrerpolicy dipindah ke dalam tag iframe (bukan di luar) -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.7038807288204!2d117.2108934!3d-0.4339606!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df5d7ad57501ed5%3A0x9b933c83728110ea!2sTempat%20wisata%20Pemandian%20Serayu%20Lestari!5e0!3m2!1sid!2sid!4v1776102263339!5m2!1sid!2sid"
                    width="100%"
                    height="350"
                    style="border:0;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Lokasi Pemandian Serayu Lestari">
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
                    rel="noopener noreferrer"
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
            <p class="section-sub text-center">Ceritakan pengalaman nyata kunjungan Anda bersama kami</p>

            <?php
            $ulasanData = $ulasan ?? [];

            $ulasanTampil = array_slice($ulasanData, 0, 4);
            $ulasanSisa   = array_slice($ulasanData, 4);
            ?>

            <div class="row g-4 mt-3" id="ulasanContainer">
                <?php
                $colors = ['bg-blue', 'bg-teal', 'bg-orange', 'bg-purple', 'bg-green'];
                $colorIdx = 0;

                foreach ($ulasanTampil as $u):
                    $initial   = strtoupper(substr($u['nama'] ?? 'U', 0, 1));
                    $colorClass = $colors[$colorIdx % count($colors)];
                    $colorIdx++;
                ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="ulasan-card">
                            <div class="ulasan-header">
                                <div class="ulasan-avatar <?= $colorClass ?>"><?= htmlspecialchars($initial) ?></div>
                                <div>
                                    <strong><?= htmlspecialchars($u['nama']) ?></strong>
                                    <small><?= isset($u['tanggal']) ? date('d M Y', strtotime($u['tanggal'])) : '' ?></small>
                                </div>
                            </div>
                            <div class="ulasan-stars mb-2">
                                <?php if (isset($u['rating'])) for ($i = 0; $i < (int)$u['rating']; $i++) echo "⭐"; ?>
                            </div>
                            <p class="ulasan-text">"<?= htmlspecialchars($u['komentar']) ?>"</p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Diperbaiki: ulasan tersembunyi langsung ada di DOM dengan class ulasan-hidden -->
                <?php foreach ($ulasanSisa as $u):
                    $initial    = strtoupper(substr($u['nama'] ?? 'U', 0, 1));
                    $colorClass = $colors[$colorIdx % count($colors)];
                    $colorIdx++;
                ?>
                    <div class="col-md-6 col-lg-3 ulasan-hidden">
                        <div class="ulasan-card">
                            <div class="ulasan-header">
                                <div class="ulasan-avatar <?= $colorClass ?>"><?= htmlspecialchars($initial) ?></div>
                                <div>
                                    <strong><?= htmlspecialchars($u['nama']) ?></strong>
                                    <small><?= isset($u['tanggal']) ? date('d M Y', strtotime($u['tanggal'])) : '' ?></small>
                                </div>
                            </div>
                            <div class="ulasan-stars mb-2">
                                <?php if (isset($u['rating'])) for ($i = 0; $i < (int)$u['rating']; $i++) echo "⭐"; ?>
                            </div>
                            <p class="ulasan-text">"<?= htmlspecialchars($u['komentar']) ?>"</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Diperbaiki: tombol hanya muncul jika memang ada ulasan lebih dari 4 -->
            <?php if (count($ulasanData) > 4): ?>
                <div class="text-center mt-4">
                    <button class="btn-lihat-ulasan" id="btnLihatSemua" type="button">
                        <i class="bi bi-chevron-down me-2"></i>Lihat Semua Ulasan
                    </button>
                </div>
            <?php endif; ?>

            <!-- FORM ULASAN -->
            <div class="ulasan-form-card mt-5">
                <h5 class="mb-4">
                    <i class="bi bi-pencil-square me-2"></i>Tulis Ulasan Anda
                </h5>

                <form action="<?= $BASEURL ?>/ulasan/tambah" method="POST">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label" for="nama">Nama</label>
                            <input id="nama" name="nama" type="text"
                                class="form-control"
                                placeholder="Nama Anda" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="rating">Rating</label>
                            <select id="rating" name="rating"
                                class="form-control" required>
                                <option value="">Pilih Rating</option>
                                <option value="5">⭐⭐⭐⭐⭐ – Luar Biasa</option>
                                <option value="4">⭐⭐⭐⭐ – Bagus</option>
                                <option value="3">⭐⭐⭐ – Cukup</option>
                                <option value="2">⭐⭐ – Kurang</option>
                                <option value="1">⭐ – Buruk</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="komentar">Komentar</label>
                            <textarea id="komentar" name="komentar"
                                class="form-control"
                                rows="3"
                                placeholder="Ceritakan pengalaman Anda..."
                                required></textarea>
                        </div>

                        <!-- 🔥 WAJIB -->
                        <input type="hidden" name="wisata_id" value="1">

                        <div class="col-12">
                            <button type="submit" class="btn-kirim w-100">
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
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0 d-flex flex-wrap gap-2 justify-content-lg-end">
                    <a href="#wisata" class="btn-cta-white">
                        <i class="bi bi-info-circle me-1"></i>Info Wisata
                    </a>
                    <a href="#ulasan" class="btn-cta-outline">
                        <i class="bi bi-pencil me-1"></i>Tulis Ulasan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== WAVE ===== -->
    <div class="wave-divider">
        <svg viewBox="0 0 1440 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
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
                        <a href="#" class="social-btn" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-btn" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                        <a href="#" class="social-btn" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-btn" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <!-- MENU -->
                <div class="col-md-2">
                    <h6 class="footer-col-title">Menu</h6>
                    <ul class="footer-list">
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#wisata">Wisata</a></li>
                        <li><a href="#ulasan">Ulasan</a></li>
                        <li><a href="<?= $BASEURL ?>/admin">Admin</a></li>
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
                <span class="ms-3 d-block d-md-inline">Wisata Keluarga Terbaik di Samarinda 🌊</span>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script>
        // ===== Lihat semua ulasan =====
        // Diperbaiki: class .ulasan-hidden sudah ada di CSS (display:none),
        // hapus class tersebut agar elemen muncul kembali
        const btnLihat = document.getElementById('btnLihatSemua');
        if (btnLihat) {
            btnLihat.addEventListener('click', function() {
                document.querySelectorAll('.ulasan-hidden').forEach(el => {
                    el.classList.remove('ulasan-hidden');
                });
                this.style.display = 'none';

                // Trigger scroll reveal untuk kartu yang baru muncul
                document.querySelectorAll('.ulasan-card:not(.visible)').forEach(el => {
                    observer.observe(el);
                });
            });
        }

        // ===== Scroll reveal =====
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target); // stop observing setelah visible
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.feature-card, .ulasan-card, .fasilitas-card, .wisata-card, .tentang-card')
            .forEach(el => observer.observe(el));

        // ===== Active nav link berdasarkan scroll =====
        const sections = document.querySelectorAll('section[id], footer[id]');
        const navLinks = document.querySelectorAll('.nav-link-custom');

        const navObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    navLinks.forEach(link => link.classList.remove('active'));
                    const activeLink = document.querySelector(`.nav-link-custom[href="#${entry.target.id}"]`);
                    if (activeLink) activeLink.classList.add('active');
                }
            });
        }, {
            threshold: 0.4
        });

        sections.forEach(sec => navObserver.observe(sec));

        // ===== 🔥 Navbar scroll effect (INI YANG BARU) =====
        window.addEventListener("scroll", function() {
            const navbar = document.querySelector(".navbar-custom");
            if (navbar) {
                navbar.classList.toggle("scrolled", window.scrollY > 20);
            }
        });
    </script>
</body>

</html>