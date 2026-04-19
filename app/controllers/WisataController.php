<?php

class WisataController extends Controller
{
    // ==========================
    // LIST ADMIN
    // ==========================
    public function admin()
    {
        $this->cekLogin();

        $wisata = $this->model('Wisata');
        $data['wisata'] = $wisata->getData();

        $this->view('admin/wisata', $data);
    }

    // ==========================
    // TAMBAH
    // ==========================
    public function tambah()
    {
        $this->cekLogin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $gambar = $this->uploadGambar($_FILES['gambar']);

            $data = [
                'nama' => $_POST['nama'],
                'deskripsi' => $_POST['deskripsi'],
                'gambar' => $gambar ?? ''
            ];

            $this->model('Wisata')->tambah($data);

            $_SESSION['success'] = "Wisata berhasil ditambahkan!";
            header("Location: /wisata/admin");
            exit;
        }

        $this->view('admin/tambah_wisata');
    }

    // ==========================
    // EDIT
    // ==========================
    public function edit($id)
    {
        $this->cekLogin();

        $wisata = $this->model('Wisata');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $gambar = $this->uploadGambar($_FILES['gambar']);
            if (!$gambar) {
                $gambar = $_POST['gambar_lama'];
            }

            $data = [
                'nama' => $_POST['nama'],
                'deskripsi' => $_POST['deskripsi'],
                'gambar' => $gambar
            ];

            $wisata->update($id, $data);

            $_SESSION['success'] = "Wisata berhasil diupdate!";
            header("Location: /wisata/admin");
            exit;
        }

        $data['wisata'] = $wisata->getById($id);
        $this->view('admin/edit_wisata', $data);
    }

    // ==========================
    // DELETE
    // ==========================
    public function delete($id)
    {
        $this->cekLogin();

        $this->model('Wisata')->delete($id);

        $_SESSION['success'] = "Wisata berhasil dihapus!";
        header("Location: /wisata/admin");
        exit;
    }

    // ==========================
    // UPLOAD
    // ==========================
    private function uploadGambar($file)
    {
        if (!isset($file) || $file['error'] !== 0) return null;

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($ext, $allowed)) return null;
        if ($file['size'] > 5 * 1024 * 1024) return null;

        $nama = time() . '_' . uniqid() . '.' . $ext;
        $path = "assets/images/" . $nama;

        if (move_uploaded_file($file['tmp_name'], $path)) {
            return $nama;
        }

        return null;
    }

    private function cekLogin()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: /login");
            exit;
        }
    }
}
