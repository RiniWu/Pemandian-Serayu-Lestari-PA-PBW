<?php
$total = mysqli_num_rows(Ulasan::getAll());
$pending = mysqli_num_rows(Ulasan::getPending());
$approved = mysqli_num_rows(Ulasan::getApproved());
?>

<link rel="stylesheet" href="assets/css/admin.css">

<div class="admin-container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Serayu Admin</h2>
        <a href="index.php?page=admin_dashboard">Dashboard</a>
        <a href="index.php?page=admin_ulasan">Data Ulasan</a>
        <a href="index.php?page=logout">Logout</a>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <h2>Dashboard</h2>

        <div class="cards">

            <div class="card blue">
                <h3><?= $total ?></h3>
                <p>Total Ulasan</p>
            </div>

            <div class="card green">
                <h3><?= $approved ?></h3>
                <p>Disetujui</p>
            </div>

            <div class="card orange">
                <h3><?= $pending ?></h3>
                <p>Menunggu</p>
            </div>

        </div>

    </div>
</div>