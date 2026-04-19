<?php

class Wisata
{
    private $conn;

    public function __construct()
    {
        require __DIR__ . '/../config/koneksi.php';
        $this->conn = $conn;
    }

    // ==========================
    // HELPER
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
    // AMBIL SEMUA
    // ==========================
    public function getAll()
    {
        return $this->fetchAll("
            SELECT * FROM wisata
            ORDER BY id DESC
        ");
    }

    // ==========================
    // AMBIL BY ID
    // ==========================
    public function getById($id)
    {
        $stmt = mysqli_prepare($this->conn, "
            SELECT * FROM wisata WHERE id=?
        ");

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    // ==========================
    // DELETE
    // ==========================
    public function delete($id)
    {
        $stmt = mysqli_prepare($this->conn, "
            DELETE FROM wisata WHERE id=?
        ");

        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}
