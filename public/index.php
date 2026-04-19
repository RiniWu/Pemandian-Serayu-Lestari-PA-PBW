<?php
session_start();

// ambil URL
$url = isset($_GET['url']) ? $_GET['url'] : '';

// bersihkan URL
$url = trim($url, '/');
$url = explode('/', $url);

// kirim ke routes
require_once '../app/core/App.php';
$app = new App();
