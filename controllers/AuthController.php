<?php
session_start();
require_once "../config/koneksi.php";

if (isset($_POST['login'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user'");
    $d = mysqli_fetch_assoc($data);

    if ($d && password_verify($pass, $d['password'])) {

        $_SESSION['login'] = true;

        header("Location: ../views/admin.php");
    } else {
        echo "<script>alert('Login gagal!');</script>";
    }
}
