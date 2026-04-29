<?php
$BASEURL = base_url();
$allImages = $allImages ?? [];
$filters = $filters ?? [];

if (!function_exists('iconFilterFasilitas')) {
    function iconFilterFasilitas($label)
    {
        $label = strtolower(trim((string) $label));

        $iconMap = [
            'kolam renang dewasa' => 'bi-water',
            'kolam anak' => 'bi-emoji-smile',
            'gazebo' => 'bi-house-heart',
            'santai' => 'bi-house-heart',
            'warung makan' => 'bi-cup-hot',
            'kantin' => 'bi-cup-hot',
            'kamar bilas' => 'bi-droplet-half',
            'toilet' => 'bi-door-open',
            'area parkir' => 'bi-p-circle',
            'parkir' => 'bi-p-circle',
            'spot foto' => 'bi-camera',
            'kolam busa' => 'bi-clouds',
            'kolam ombak' => 'bi-water',
        ];

        foreach ($iconMap as $keyword => $icon) {
            if (str_contains($label, $keyword)) {
                return $icon;
            }
        }

        return 'bi-grid-1x2';
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri – Pemandian Serayu Lestari</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= $BASEURL ?>/assets/css/style.css">

    <style>
        body {
            background: #ffffff;
            color: #0f172a;
            font-family: 'Poppins', sans-serif;
        }

        /* ---- NAVBAR ---- */
        .navbar-galeri {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 14px 0;
            background: rgba(5, 16, 30, 0.92);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        }

        /* ---- HEADER ---- */
        .galeri-header {
            padding: 110px 0 50px;
            text-align: center;
            background: linear-gradient(180deg, #f8fbff 0%, #eef6ff 100%);
            position: relative;
            overflow: hidden;
        }

        .galeri-header::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(0, 183, 255, 0.1) 0%, transparent 70%);
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            pointer-events: none;
        }

        .galeri-header::after {
            content: '';
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: rgba(30, 64, 175, 0.08);
            top: 28px;
            left: 56px;
            pointer-events: none;
        }

        .galeri-bubble-bottom {
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(0, 183, 255, 0.08);
            bottom: -70px;
            right: 70px;
            pointer-events: none;
        }

        .galeri-header h1 {
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 800;
            margin-bottom: 10px;
            color: #0f172a;
        }

        .galeri-header h1 span {
            color: #00b7ff;
        }

        .galeri-header p {
            color: #64748b;
            max-width: 440px;
            margin: 0 auto 24px;
        }

        .galeri-count-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(0, 183, 255, 0.1);
            border: 1px solid rgba(0, 183, 255, 0.25);
            color: #00b7ff;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.88rem;
            font-weight: 600;
        }

        /* ---- FILTER ---- */
        .galeri-filter {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            padding: 30px 0 36px;
            position: relative;
            z-index: 1;
        }

        .galeri-content-wrap {
            position: relative;
            overflow: hidden;
            padding-bottom: 40px;
        }

        .galeri-content-wrap::before {
            content: '';
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: rgba(30, 64, 175, 0.05);
            top: 30px;
            left: 40px;
            pointer-events: none;
        }

        .galeri-content-wrap::after {
            content: '';
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(0, 183, 255, 0.06);
            right: 70px;
            bottom: 40px;
            pointer-events: none;
        }

        .galeri-content-bubble {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }

        .galeri-content-bubble.b1 {
            width: 140px;
            height: 140px;
            top: 120px;
            right: 140px;
            background: rgba(59, 130, 246, 0.06);
        }

        .galeri-content-bubble.b2 {
            width: 90px;
            height: 90px;
            top: 360px;
            left: 180px;
            background: rgba(14, 165, 233, 0.08);
        }

        .galeri-content-bubble.b3 {
            width: 170px;
            height: 170px;
            bottom: 180px;
            left: 34%;
            background: rgba(30, 64, 175, 0.05);
        }

        .galeri-content-bubble.b4 {
            width: 110px;
            height: 110px;
            bottom: 70px;
            right: 24%;
            background: rgba(6, 182, 212, 0.07);
        }

        .filter-btn {
            padding: 8px 22px;
            border-radius: 50px;
            border: 1.5px solid rgba(15, 23, 42, 0.12);
            background: #fff;
            color: #64748b;
            font-family: 'Poppins', sans-serif;
            font-size: 0.87rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.25s;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #00b7ff;
            border-color: #00b7ff;
            color: #051524;
            font-weight: 600;
            box-shadow: 0 4px 18px rgba(0, 183, 255, 0.3);
        }

        /* ---- MASONRY GRID ---- */
        .galeri-grid {
            columns: 4;
            column-gap: 12px;
            padding-bottom: 80px;
            position: relative;
            z-index: 1;
        }

        @media (max-width: 1200px) {
            .galeri-grid {
                columns: 3;
            }
        }

        @media (max-width: 768px) {
            .galeri-grid {
                columns: 2;
            }
        }

        @media (max-width: 480px) {
            .galeri-grid {
                columns: 1;
            }
        }

        .galeri-item {
            break-inside: avoid;
            margin-bottom: 12px;
            border-radius: 14px;
            overflow: hidden;
            cursor: pointer;
            position: relative;
            display: block;
            animation: fadeUp 0.45s ease both;
        }

        .galeri-item.hidden {
            display: none;
        }

        .galeri-item img {
            width: 100%;
            display: block;
            transition: transform 0.4s ease;
        }

        .galeri-item:hover img {
            transform: scale(1.07);
        }

        .galeri-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(5, 21, 36, 0.82) 0%, transparent 55%);
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            align-items: flex-end;
            padding: 14px;
        }

        .galeri-item:hover .galeri-overlay {
            opacity: 1;
        }

        .galeri-badge {
            background: rgba(0, 183, 255, 0.18);
            border: 1px solid rgba(0, 183, 255, 0.35);
            color: #00b7ff;
            font-size: 0.73rem;
            font-weight: 600;
            padding: 4px 11px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .galeri-zoom {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.13);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 0.95rem;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .galeri-item:hover .galeri-zoom {
            opacity: 1;
        }

        /* ---- EMPTY STATE ---- */
        .galeri-empty {
            text-align: center;
            padding: 80px 20px;
            color: #64748b;
        }

        .galeri-empty i {
            font-size: 3rem;
            display: block;
            margin-bottom: 14px;
        }

        /* ---- LIGHTBOX ---- */
        .gl-lb {
            position: fixed;
            inset: 0;
            background: rgba(3, 10, 20, 0.97);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(6px);
        }

        .gl-lb.open {
            display: flex;
        }

        .gl-lb-inner {
            position: relative;
            max-width: 92vw;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .gl-lb-img-wrap {
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.7);
        }

        .gl-lb-img-wrap img {
            max-width: 88vw;
            max-height: 78vh;
            object-fit: contain;
            display: block;
        }

        .gl-lb-close {
            position: fixed;
            top: 18px;
            right: 18px;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            border: 1.5px solid rgba(255, 255, 255, 0.18);
            color: #fff;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            z-index: 10001;
        }

        .gl-lb-close:hover {
            background: rgba(220, 53, 69, 0.8);
            border-color: transparent;
        }

        .gl-lb-nav {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            border: 1.5px solid rgba(255, 255, 255, 0.18);
            color: #fff;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            z-index: 10001;
        }

        .gl-lb-nav:hover {
            background: #00b7ff;
            border-color: #00b7ff;
            color: #051524;
        }

        .gl-lb-prev {
            left: 16px;
        }

        .gl-lb-next {
            right: 16px;
        }

        .gl-lb-counter {
            margin-top: 14px;
            color: rgba(255, 255, 255, 0.45);
            font-size: 0.85rem;
        }

        .gl-lb-counter span {
            color: #00b7ff;
            font-weight: 600;
        }

        /* thumbnails strip */
        .gl-lb-thumbs {
            display: flex;
            gap: 7px;
            margin-top: 14px;
            max-width: 88vw;
            overflow-x: auto;
            padding-bottom: 4px;
        }

        .gl-lb-thumbs::-webkit-scrollbar {
            height: 3px;
        }

        .gl-lb-thumbs::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .gl-lb-thumbs::-webkit-scrollbar-thumb {
            background: rgba(0, 183, 255, 0.4);
            border-radius: 4px;
        }

        .gl-thumb {
            width: 56px;
            height: 56px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            flex-shrink: 0;
            border: 2px solid transparent;
            transition: border-color 0.2s;
            opacity: 0.65;
            transition: opacity 0.2s, border-color 0.2s;
        }

        .gl-thumb.active {
            border-color: #00b7ff;
            opacity: 1;
        }

        .gl-thumb:hover {
            opacity: 1;
        }

        .gl-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar-galeri">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="<?= $BASEURL ?>/" class="d-flex align-items-center gap-2 text-decoration-none">
                <div style="width:38px;height:38px;background:linear-gradient(135deg,#00b7ff,#0077cc);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-water text-white"></i>
                </div>
                <span class="text-white fw-bold" style="font-size:0.95rem;">Pemandian Serayu Lestari</span>
            </a>

            <a href="<?= $BASEURL ?>/"
                class="d-flex align-items-center gap-2 text-decoration-none"
                style="color:rgba(255,255,255,0.6);font-size:0.88rem;transition:color 0.2s;"
                onmouseover="this.style.color='#00b7ff'"
                onmouseout="this.style.color='rgba(255,255,255,0.6)'">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>

        </div>
    </nav>

    <!-- HEADER -->
    <div class="galeri-header">
        <div class="galeri-bubble-bottom"></div>
        <div class="container">
            <h1>Galeri <span>Foto</span></h1>
            <p>Lihat keindahan dan suasana Pemandian Serayu Lestari melalui koleksi foto kami</p>
            <div class="galeri-count-badge">
                <i class="bi bi-images"></i>
                <span id="totalFoto"><?= count($allImages) ?></span> Foto Tersedia
            </div>
        </div>
    </div>

    <!-- FILTER -->
    <div class="container">
        <div class="galeri-content-wrap">
            <div class="galeri-content-bubble b1"></div>
            <div class="galeri-content-bubble b2"></div>
            <div class="galeri-content-bubble b3"></div>
            <div class="galeri-content-bubble b4"></div>
            <div class="galeri-filter">
                <button class="filter-btn active" data-filter="semua">
                    <i class="bi bi-grid-3x3-gap me-1"></i>Semua
                </button>
                <?php foreach ($filters as $filter): ?>
                    <?php $iconClass = iconFilterFasilitas($filter['label'] ?? ''); ?>
                    <button class="filter-btn" data-filter="<?= htmlspecialchars($filter['key']) ?>">
                        <i class="bi <?= htmlspecialchars($iconClass) ?> me-1"></i><?= htmlspecialchars($filter['label']) ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- GRID -->
            <?php if (!empty($allImages)): ?>
                <div class="galeri-grid" id="galeriGrid">
                    <?php foreach ($allImages as $i => $item):
                        $kat      = $item['kategori'] ?? 'fasilitas';
                        $label    = $item['label'] ?? 'Fasilitas';
                        $delay    = ($i % 8) * 55;
                    ?>
                        <div class="galeri-item"
                            data-kategori="<?= $kat ?>"
                            data-index="<?= $i ?>"
                            style="animation-delay:<?= $delay ?>ms"
                            onclick="bukaLB(<?= $i ?>)">

                            <img src="<?= $BASEURL ?>/<?= htmlspecialchars($item['src']) ?>"
                                alt="Foto <?= htmlspecialchars($label) ?>"
                                loading="lazy">

                            <div class="galeri-overlay">
                                <span class="galeri-badge"><?= htmlspecialchars($label) ?></span>
                            </div>
                            <div class="galeri-zoom"><i class="bi bi-zoom-in"></i></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="galeri-empty">
                    <i class="bi bi-image-alt"></i>
                    <p>Belum ada foto.<br>Tambahkan foto dari halaman admin <code>Data Fasilitas</code>.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- LIGHTBOX -->
    <div class="gl-lb" id="glLb" onclick="if(event.target===this)tutupLB()">
        <button class="gl-lb-close" onclick="tutupLB()"><i class="bi bi-x-lg"></i></button>
        <button class="gl-lb-nav gl-lb-prev" onclick="gantiLB(-1)"><i class="bi bi-chevron-left"></i></button>
        <button class="gl-lb-nav gl-lb-next" onclick="gantiLB(1)"><i class="bi bi-chevron-right"></i></button>

        <div class="gl-lb-inner">
            <div class="gl-lb-img-wrap">
                <img id="glLbImg" src="" alt="Galeri">
            </div>
            <div class="gl-lb-counter">
                Foto <span id="glCur">1</span> dari <span id="glTotal">1</span>
            </div>
            <div class="gl-lb-thumbs" id="glThumbs"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Build data array dari PHP
        const semuaFoto = [
            <?php foreach ($allImages as $item): ?> {
                    src: "<?= $BASEURL ?>/<?= htmlspecialchars($item['src']) ?>",
                    kat: "<?= htmlspecialchars($item['kategori'] ?? 'fasilitas') ?>",
                    label: "<?= htmlspecialchars($item['label'] ?? 'Fasilitas') ?>"
                },
            <?php endforeach; ?>
        ];

        // ===== FILTER =====
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const f = this.dataset.filter;
                let count = 0;
                document.querySelectorAll('.galeri-item').forEach(el => {
                    const show = f === 'semua' || el.dataset.kategori === f;
                    el.classList.toggle('hidden', !show);
                    if (show) count++;
                });
                document.getElementById('totalFoto').textContent = count;
            });
        });

        // ===== LIGHTBOX =====
        let curIdx = 0;

        function getVisible() {
            return [...document.querySelectorAll('.galeri-item:not(.hidden)')].map(el => ({
                src: el.querySelector('img').src,
                rawIdx: +el.dataset.index
            }));
        }

        function bukaLB(rawIdx) {
            const vis = getVisible();
            curIdx = vis.findIndex(v => v.rawIdx === rawIdx);
            if (curIdx < 0) return;
            document.getElementById('glLb').classList.add('open');
            document.body.style.overflow = 'hidden';
            renderLB(vis);
        }

        function renderLB(vis) {
            document.getElementById('glLbImg').src = vis[curIdx].src;
            document.getElementById('glCur').textContent = curIdx + 1;
            document.getElementById('glTotal').textContent = vis.length;

            const thumbsEl = document.getElementById('glThumbs');
            thumbsEl.innerHTML = '';
            vis.forEach((v, i) => {
                const t = document.createElement('div');
                t.className = 'gl-thumb' + (i === curIdx ? ' active' : '');
                t.innerHTML = `<img src="${v.src}" alt="">`;
                t.onclick = () => {
                    curIdx = i;
                    renderLB(vis);
                };
                thumbsEl.appendChild(t);
            });
            setTimeout(() => {
                const at = thumbsEl.querySelector('.active');
                if (at) at.scrollIntoView({
                    inline: 'center',
                    behavior: 'smooth'
                });
            }, 50);
        }

        function gantiLB(arah) {
            const vis = getVisible();
            curIdx = (curIdx + arah + vis.length) % vis.length;
            renderLB(vis);
        }

        function tutupLB() {
            document.getElementById('glLb').classList.remove('open');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', e => {
            if (!document.getElementById('glLb').classList.contains('open')) return;
            if (e.key === 'ArrowRight') gantiLB(1);
            if (e.key === 'ArrowLeft') gantiLB(-1);
            if (e.key === 'Escape') tutupLB();
        });
    </script>
</body>

</html>
