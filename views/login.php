<?php
// ambil error dari controller
$error = $error ?? '';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Serayu Lestari</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body class="login-page">

    <div class="login-bg">
        <div class="login-shape-1"></div>
        <div class="login-shape-2"></div>
        <div class="login-shape-3"></div>
    </div>

    <div class="login-container">
        <div class="login-card">

            <div class="login-header text-center">
                <div class="login-logo">
                    <i class="bi bi-water"></i>
                </div>
                <h2 class="login-title">Selamat Datang</h2>
                <p class="login-subtitle">Panel Admin Permandian Serayu Lestari</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger d-flex align-items-center gap-2">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <!-- 🔥 ACTION KE ROUTING -->
            <form method="POST" action="index.php?page=login" id="loginApp">

                <div class="mb-4">
                    <label class="form-label fw-medium">Username</label>
                    <div class="input-group-custom">
                        <i class="bi bi-person-fill input-icon"></i>
                        <input type="text" name="username" class="form-control form-control-login"
                            placeholder="Masukkan username" required autofocus>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-medium">Password</label>
                    <div class="input-group-custom">
                        <i class="bi bi-lock-fill input-icon"></i>
                        <input :type="showPass ? 'text' : 'password'" name="password"
                            class="form-control form-control-login"
                            placeholder="Masukkan password" required>

                        <button type="button" class="btn-eye" @click="showPass = !showPass">
                            <i :class="'bi bi-' + (showPass ? 'eye-slash' : 'eye')"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" name="login" class="btn btn-login w-100">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Panel Admin
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="index.php" class="btn-back-home">
                    <i class="bi bi-house me-1"></i>Kembali ke Beranda
                </a>
            </div>

            <div class="login-hint mt-3 text-center">
                <small class="text-muted">
                    <i class="bi bi-info-circle me-1"></i>Default: admin / admin123
                </small>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.prod.js"></script>

    <script>
        const {
            createApp
        } = Vue;
        createApp({
            data() {
                return {
                    showPass: false
                }
            }
        }).mount('#loginApp');
    </script>

</body>

</html>