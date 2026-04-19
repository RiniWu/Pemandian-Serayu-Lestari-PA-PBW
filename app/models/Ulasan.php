<?php

class Ulasan
{
    private $conn;

    public function __construct()
    {
        require __DIR__ . '/../config/koneksi.php';
        $this->conn = $conn;
    }

    // ==========================
    // HELPER (BIAR GA NGULANG)
    // ==========================
    private function fetchAll($query)
    {
        $result = mysqli_query($this->conn, $query);

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    // ==========================
    // AMBIL SEMUA (ADMIN)
    // ==========================
    public function getAll()
    {
        return $this->fetchAll("
            SELECT * FROM ulasan
            ORDER BY id DESC
        ");
    }

    // ==========================
    // APPROVED (USER & ADMIN)
    // ==========================
    public function getApproved()
    {
        return $this->fetchAll("
            SELECT * FROM ulasan
            WHERE status='approved'
            ORDER BY id DESC
        ");
    }

    // ==========================
    // PENDING (ADMIN)
    // ==========================
    public function getPending()
    {
        return $this->fetchAll("
            SELECT * FROM ulasan
            WHERE status='pending'
            ORDER BY id DESC
        ");
    }

    // ==========================
    // STATS DASHBOARD (ADMIN)
    // ==========================
    public function getStats()
    {
        $result = mysqli_query($this->conn, "
            SELECT 
                COUNT(*) as total,
                SUM(status='pending') as pending,
                SUM(status='approved') as approved
            FROM ulasan
        ");

        return mysqli_fetch_assoc($result);
    }

    // ==========================
    // TAMBAH ULASAN (USER)
    // ==========================
    public function tambah($nama, $komentar, $rating)
    {
        $stmt = mysqli_prepare($this->conn, "
            INSERT INTO ulasan (nama, komentar, rating, status)
            VALUES (?, ?, ?, 'pending')
        ");

        mysqli_stmt_bind_param($stmt, "ssi", $nama, $komentar, $rating);
        return mysqli_stmt_execute($stmt);
    }

    // ==========================
    // APPROVE (ADMIN)
    // ==========================
    public function approve($id)
    {
        $stmt = mysqli_prepare($this->conn, "
            UPDATE ulasan SET status='approved' WHERE id=?
        ");

        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }

    // ==========================
    // DELETE (ADMIN)
    // ==========================
    public function delete($id)
    {
        $stmt = mysqli_prepare($this->conn, "
            DELETE FROM ulasan WHERE id=?
        ");

        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}
