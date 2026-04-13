<?php
require_once "../models/Ulasan.php";

// TAMBAH ULASAN
if (isset($_POST['tambah'])) {

    $nama = $_POST['nama'];
    $komentar = $_POST['komentar'];
    $rating = $_POST['rating'];

    Ulasan::insert($nama, $komentar, $rating);

    header("Location: ../index.php");
}

// HAPUS ULASAN
if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    Ulasan::delete($id);

    header("Location: ../views/admin.php");
}
