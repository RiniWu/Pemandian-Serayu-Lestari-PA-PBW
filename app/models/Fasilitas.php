<?php

class Fasilitas
{
    private $conn;

    public function __construct()
    {
        require __DIR__ . '/../config/koneksi.php';
        $this->conn = $conn;
    }

    public function getAll()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM fasilitas ORDER BY id DESC");
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getById($id)
    {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM fasilitas WHERE id=?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        return mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    }

    public function insert($nama, $deskripsi, $icon, $status)
    {
        $stmt = mysqli_prepare(
            $this->conn,
            "INSERT INTO fasilitas (nama, deskripsi, icon, status) VALUES (?, ?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt, "ssss", $nama, $deskripsi, $icon, $status);
        return mysqli_stmt_execute($stmt);
    }

    public function update($id, $nama, $deskripsi, $icon, $status)
    {
        $stmt = mysqli_prepare(
            $this->conn,
            "UPDATE fasilitas SET nama=?, deskripsi=?, icon=?, status=? WHERE id=?"
        );
        mysqli_stmt_bind_param($stmt, "ssssi", $nama, $deskripsi, $icon, $status, $id);
        return mysqli_stmt_execute($stmt);
    }

    public function delete($id)
    {
        $stmt = mysqli_prepare($this->conn, "DELETE FROM fasilitas WHERE id=?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}
