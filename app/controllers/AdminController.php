<?php

class AdminController
{
    public function __construct()
    {
        $this->cekLogin();
    }

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

    private function cekLogin()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . base_url('auth/login'));
            exit;
        }
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

        $filter = $_GET['filter'] ?? 'semua';
        $stats = $model->getStats();

        if ($filter === 'pending') {
            $daftarUlasan = $model->getPending();
        } elseif ($filter === 'approved') {
            $daftarUlasan = $model->getApproved();
        } else {
            $filter = 'semua';
            $daftarUlasan = $model->getAll();
        }

        $data = [
            'ulasan' => $daftarUlasan,
            'filter' => $filter,
            'total' => (int) ($stats['total'] ?? 0),
            'pending' => (int) ($stats['pending'] ?? 0),
            'approved' => (int) ($stats['approved'] ?? 0),
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
            setFlash('success', 'Ulasan disetujui');
        } else {
            setFlash('error', 'Gagal approve');
        }

        header('Location: ' . base_url('admin/ulasan'));
        exit;
    }

    public function delete($id)
    {
        require_once __DIR__ . '/../models/Ulasan.php';
        $model = new Ulasan();

        if ($model->delete($id)) {
            setFlash('success', 'Ulasan dihapus');
        } else {
            setFlash('error', 'Gagal hapus');
        }

        header('Location: ' . base_url('admin/ulasan'));
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

        header('Location: ' . base_url('admin/fasilitas'));
        exit;
    }

    public function editFasilitas($id)
    {
        require_once __DIR__ . '/../models/Fasilitas.php';
        $model = new Fasilitas();

        $model->update($id, $_POST['nama'], $_POST['deskripsi'], $_POST['icon'], $_POST['status']);

        header('Location: ' . base_url('admin/fasilitas'));
        exit;
    }

    public function hapusFasilitas($id)
    {
        require_once __DIR__ . '/../models/Fasilitas.php';
        $model = new Fasilitas();

        $model->delete($id);

        header('Location: ' . base_url('admin/fasilitas'));
        exit;
    }
}
