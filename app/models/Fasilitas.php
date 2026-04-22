<?php

class Fasilitas
{
    private $conn;
    private $gambarBasePath;

    public function __construct()
    {
        require __DIR__ . '/../config/koneksi.php';
        $this->conn = $conn;
        $this->gambarBasePath = 'assets/images/fasilitas/';
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

    // ============================================
    // METHOD BARU UNTUK LIGHTBOX
    // ============================================

    /**
     * Ambil semua fasilitas aktif dengan gambar dari folder
     */
    public function getAllAktifWithGambar()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM fasilitas WHERE status = 'aktif' ORDER BY id ASC");
        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $row['gambar_list'] = $this->getGambarFromFolder($row['nama']);
            $data[] = $row;
        }

        return $data;
    }

    /**
     * Scan gambar dari folder berdasarkan nama fasilitas
     */
    private function getGambarFromFolder($namaFasilitas)
    {
        $slug = $this->createSlug($namaFasilitas);
        $folderPath = __DIR__ . '/../../public/' . $this->gambarBasePath . $slug . '/';
        $webPath = $this->gambarBasePath . $slug . '/';

        $gambar = [];

        if (is_dir($folderPath)) {
            $files = scandir($folderPath);

            foreach ($files as $file) {
                if (preg_match('/\.(jpg|jpeg|png|webp|gif)$/i', $file)) {
                    $gambar[] = $webPath . $file;
                }
            }

            sort($gambar);
        }

        if (empty($gambar)) {
            $gambar[] = 'assets/images/img1.jpg';
        }

        return implode(',', $gambar);
    }

    /**
     * Buat slug dari nama fasilitas
     */
    private function createSlug($string)
    {
        $slug = strtolower(trim($string));
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        return trim($slug, '-');
    }
}
