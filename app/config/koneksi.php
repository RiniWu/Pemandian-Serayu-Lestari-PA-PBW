<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ps_db";

$conn = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
