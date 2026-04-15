<?php
require_once __DIR__ . "/../config/koneksi.php";

class Ulasan
{

    // AMBIL SEMUA (dipakai admin)
    public static function getAll()
    {
        global $conn;
        return mysqli_query($conn, "SELECT * FROM ulasan ORDER BY id DESC");
    }

    // AMBIL YANG SUDAH APPROVED (untuk homepage)
    public static function getApproved()
    {
        global $conn;
        return mysqli_query($conn, "SELECT * FROM ulasan WHERE status='approved' ORDER BY id DESC");
    }

    // AMBIL YANG PENDING (untuk admin)
    public static function getPending()
    {
        global $conn;
        return mysqli_query($conn, "SELECT * FROM ulasan WHERE status='pending' ORDER BY id DESC");
    }

    // INSERT ULASAN (otomatis pending)
    public static function insert($nama, $komentar, $rating)
    {
        global $conn;

        return mysqli_query($conn, "
            INSERT INTO ulasan (nama, komentar, rating, status)
            VALUES ('$nama','$komentar','$rating','pending')
        ");
    }

    // DELETE ULASAN
    public static function delete($id)
    {
        global $conn;
        return mysqli_query($conn, "DELETE FROM ulasan WHERE id=$id");
    }

    // APPROVE ULASAN
    public static function approve($id)
    {
        global $conn;
        return mysqli_query($conn, "UPDATE ulasan SET status='approved' WHERE id=$id");
    }

    // PAGINATION (homepage)
    public static function getApprovedLimit($limit, $offset)
    {
        global $conn;
        return mysqli_query(
            $conn,
            "SELECT * FROM ulasan 
             WHERE status='approved' 
             ORDER BY id DESC 
             LIMIT $limit OFFSET $offset"
        );
    }
}
