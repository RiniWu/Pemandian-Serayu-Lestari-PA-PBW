<?php
require_once __DIR__ . "/../config/koneksi.php";

class Ulasan
{

    public static function getAll()
    {
        global $conn;
        return mysqli_query($conn, "SELECT * FROM ulasan ORDER BY id DESC");
    }

    public static function insert($nama, $komentar, $rating)
    {
        global $conn;

        return mysqli_query($conn, "
            INSERT INTO ulasan (nama, komentar, rating)
            VALUES ('$nama','$komentar','$rating')
        ");
    }

    public static function delete($id)
    {
        global $conn;
        return mysqli_query($conn, "DELETE FROM ulasan WHERE id=$id");
    }
}
