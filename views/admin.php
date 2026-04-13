<?php
include "../koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM ulasan");

while ($d = mysqli_fetch_array($data)) {
?>
    <p>
        <?= $d['nama'] ?> - <?= $d['komentar'] ?>
        <a href="../controllers/hapus_ulasan.php?id=<?= $d['id'] ?>">Hapus</a>
    </p>
<?php } ?>