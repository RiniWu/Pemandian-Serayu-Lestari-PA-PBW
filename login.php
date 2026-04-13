<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $data = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");

    if (mysqli_num_rows($data) > 0) {
        $_SESSION['login'] = true;
        header("Location:view/admin.php");
    }
}
?>

<form method="POST">
    <input name="username">
    <input type="password" name="password">
    <button name="login">Login</button>
</form>