<?php
require_once __DIR__ . "/../models/Ulasan.php";

// TAMBAH ULASAN
if (isset($_POST['tambah'])) {

    $nama = $_POST['nama'];
    $komentar = $_POST['komentar'];
    $rating = $_POST['rating'];

    Ulasan::insert($nama, $komentar, $rating);

    // redirect ke home
    header("Location: index.php");
    exit;
}

// HAPUS ULASAN
if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    Ulasan::delete($id);

    header("Location: index.php?page=admin");
    exit;
}

// APPROVE ULASAN
if (isset($_GET['approve'])) {

    $id = intval($_GET['approve']);

    Ulasan::approve($id);

    header("Location: index.php?page=admin");
    exit;
}
