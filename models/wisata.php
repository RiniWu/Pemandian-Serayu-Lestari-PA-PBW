<?php
require_once __DIR__ . "/../config/koneksi.php";

class Wisata
{

    public static function getData()
    {
        global $conn;
        return mysqli_query($conn, "SELECT * FROM wisata LIMIT 1");
    }
}
