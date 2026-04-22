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
            $row['gambar_list'] = $this->getGambarList($row['nama']);
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
        $data = $this->getById($id);
        $stmt = mysqli_prepare($this->conn, "DELETE FROM fasilitas WHERE id=?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        $deleted = mysqli_stmt_execute($stmt);

        if ($deleted && !empty($data['nama'])) {
            $this->deleteGambarFolder($data['nama']);
        }

        return $deleted;
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
            $row['gambar_list'] = $this->getGambarList($row['nama']);
            $data[] = $row;
        }

        return $data;
    }

    public function getGambarList($namaFasilitas)
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
            return [];
        }

        return $gambar;
    }

    public function uploadGambar($namaFasilitas, $files, $replace = false)
    {
        if (!$files || empty($files['name'])) {
            return 0;
        }

        $folderPath = $this->getFolderPath($namaFasilitas);
        if ($replace && is_dir($folderPath)) {
            $this->deleteDirectoryContents($folderPath);
        }

        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        $uploadedCount = 0;
        $names = is_array($files['name']) ? $files['name'] : [$files['name']];
        $tmpNames = is_array($files['tmp_name']) ? $files['tmp_name'] : [$files['tmp_name']];
        $errors = is_array($files['error']) ? $files['error'] : [$files['error']];
        $sizes = is_array($files['size']) ? $files['size'] : [$files['size']];

        foreach ($names as $i => $originalName) {
            if (($errors[$i] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
                continue;
            }

            $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            if (!in_array($ext, $allowed, true)) {
                continue;
            }

            if (($sizes[$i] ?? 0) > 5 * 1024 * 1024) {
                continue;
            }

            $fileName = 'img' . time() . '_' . ($i + 1) . '.' . $ext;
            $target = $folderPath . DIRECTORY_SEPARATOR . $fileName;

            if (move_uploaded_file($tmpNames[$i], $target)) {
                $uploadedCount++;
            }
        }

        return $uploadedCount;
    }

    public function renameGambarFolder($namaLama, $namaBaru)
    {
        $namaLama = trim((string) $namaLama);
        $namaBaru = trim((string) $namaBaru);

        if ($namaLama === '' || $namaBaru === '' || $namaLama === $namaBaru) {
            return;
        }

        $folderLama = $this->getFolderPath($namaLama);
        $folderBaru = $this->getFolderPath($namaBaru);

        if (!is_dir($folderLama) || $folderLama === $folderBaru) {
            return;
        }

        if (is_dir($folderBaru)) {
            return;
        }

        @rename($folderLama, $folderBaru);
    }

    public function deleteGambarFolder($namaFasilitas)
    {
        $folderPath = $this->getFolderPath($namaFasilitas);
        if (!is_dir($folderPath)) {
            return;
        }

        $this->deleteDirectoryContents($folderPath);
        @rmdir($folderPath);
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

    private function getFolderPath($namaFasilitas)
    {
        $slug = $this->createSlug($namaFasilitas);
        return __DIR__ . '/../../public/' . $this->gambarBasePath . $slug;
    }

    private function deleteDirectoryContents($folderPath)
    {
        $items = scandir($folderPath);
        if ($items === false) {
            return;
        }

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $target = $folderPath . DIRECTORY_SEPARATOR . $item;
            if (is_file($target)) {
                @unlink($target);
            }
        }
    }
}
