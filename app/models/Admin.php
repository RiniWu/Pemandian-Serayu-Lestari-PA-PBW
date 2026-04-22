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

        // dukung password hash dan data lama yang masih plain text
        if (
            $admin
            && (
                password_verify($password, $admin['password'])
                || hash_equals((string) $admin['password'], (string) $password)
            )
        ) {
            return $admin;
        }

        return false;
    }
}
