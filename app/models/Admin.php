<?php

class Admin
{
    private $conn;

    public function __construct()
    {
        require __DIR__ . '/../config/koneksi.php';
        $this->conn = $conn;
    }

    public function login($username, $password)
    {
        $stmt = mysqli_prepare($this->conn, "
            SELECT * FROM admin WHERE username = ?
        ");

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $admin = mysqli_fetch_assoc($result);

        // cek password (HASH)
        if ($admin && password_verify($password, $admin['password'])) {
            return $admin;
        }

        return false;
    }
}
