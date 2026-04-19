<?php

class AdminController
{
    private function view($view, $data = [])
    {
        extract($data);

        require_once __DIR__ . '/../views/admin/layouts/header.php';
        require_once __DIR__ . '/../views/' . $view . '.php';
        require_once __DIR__ . '/../views/admin/layouts/footer.php';
    }

    public function index()
    {
        $this->dashboard();
    }


    public function dashboard()
    {
        require_once __DIR__ . '/../models/Ulasan.php';
        $model = new Ulasan();

        $stats = $model->getStats();

        $data = [
            'ulasan' => $model->getAll(),
            'total' => $stats['total'],
            'pending' => $stats['pending'],
            'approved' => $stats['approved'],
            'pageTitle' => 'Dashboard',
            'activePage' => 'dashboard'
        ];

        $this->view('admin/dashboard', $data);
    }

    public function ulasan()
    {
        require_once __DIR__ . '/../models/Ulasan.php';
        $model = new Ulasan();

        $data = [
            'ulasan' => $model->getAll(),
            'pageTitle' => 'Data Ulasan',
            'activePage' => 'ulasan'
        ];

        $this->view('admin/ulasan', $data);
    }

    public function approve($id)
    {
        require_once __DIR__ . '/../models/Ulasan.php';
        $model = new Ulasan();

        if ($model->approve($id)) {
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Ulasan disetujui'];
        } else {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal approve'];
        }

        header('Location: /admin/ulasan');
        exit;
    }

    public function delete($id)
    {
        require_once __DIR__ . '/../models/Ulasan.php';
        $model = new Ulasan();

        if ($model->delete($id)) {
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Ulasan dihapus'];
        } else {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal hapus'];
        }

        header('Location: /admin/ulasan');
        exit;
    }

    public function fasilitas()
    {
        require_once __DIR__ . '/../models/Fasilitas.php';
        $model = new Fasilitas();

        $data = [
            'fasilitas' => $model->getAll(),
            'pageTitle' => 'Data Fasilitas',
            'activePage' => 'fasilitas'
        ];

        $this->view('admin/fasilitas', $data);
    }

    public function tambahFasilitas()
    {
        require_once __DIR__ . '/../models/Fasilitas.php';
        $model = new Fasilitas();

        $model->insert($_POST['nama'], $_POST['deskripsi'], $_POST['icon'], $_POST['status']);

        header('Location: /admin/fasilitas');
    }

    public function editFasilitas($id)
    {
        require_once __DIR__ . '/../models/Fasilitas.php';
        $model = new Fasilitas();

        $model->update($id, $_POST['nama'], $_POST['deskripsi'], $_POST['icon'], $_POST['status']);

        header('Location: /admin/fasilitas');
    }

    public function hapusFasilitas($id)
    {
        require_once __DIR__ . '/../models/Fasilitas.php';
        $model = new Fasilitas();

        $model->delete($id);

        header('Location: /admin/fasilitas');
    }
}
