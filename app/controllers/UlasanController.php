<?php

class UlasanController extends Controller
{
    // ==========================
    // USER TAMBAH ULASAN
    // ==========================
    public function tambah()
    {
        $ulasan = $this->model('Ulasan');

        $nama = $_POST['nama'] ?? '';
        $komentar = $_POST['komentar'] ?? '';
        $rating = $_POST['rating'] ?? 0;

        $ulasan->tambah($nama, $komentar, $rating);

        header("Location: " . base_url(''));
        exit;
    }

    // ==========================
    // ADMIN VIEW
    // ==========================
    public function admin()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . base_url('auth/login'));
            exit;
        }

        $ulasan = $this->model('Ulasan');

        // ambil data
        $data['ulasan'] = $ulasan->getAll();
        $data['pendingData'] = $ulasan->getPending();
        $data['approvedData'] = $ulasan->getApproved();

        // ✅ FIX DI SINI (pakai count, bukan mysqli_num_rows)
        $data['total'] = count($data['ulasan']);
        $data['pending'] = count($data['pendingData']);
        $data['approved'] = count($data['approvedData']);

        // 👉 buat header kamu (sidebar badge dll)
        $data['ulasanPendingCount'] = $data['pending'];

        // 👉 buat title & active menu
        $data['pageTitle'] = "Data Ulasan";
        $data['activePage'] = "ulasan";

        $this->view('admin/ulasan', $data);
    }

    // ==========================
    // APPROVE
    // ==========================
    public function approve($id)
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . base_url('auth/login'));
            exit;
        }

        $ulasan = $this->model('Ulasan');
        $ulasan->approve($id);

        header("Location: " . base_url('ulasan/admin'));
        exit;
    }

    // ==========================
    // DELETE
    // ==========================
    public function delete($id)
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . base_url('auth/login'));
            exit;
        }

        $ulasan = $this->model('Ulasan');
        $ulasan->delete($id);

        header("Location: " . base_url('ulasan/admin'));
        exit;
    }
}
