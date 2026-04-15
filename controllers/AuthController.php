<?php
require_once __DIR__ . "/../config/koneksi.php";

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = mysqli_real_escape_string($conn, $_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Username dan password harus diisi.';
    } else {

        $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
        $admin = mysqli_fetch_assoc($query);

        if ($admin && password_verify($password, $admin['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];

            header("Location: index.php?page=admin_dashboard");
            exit;
        } else {
            $error = 'Username atau password salah. Silakan coba lagi.';
        }
    }
}

require "views/login.php";
