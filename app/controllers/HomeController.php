<?php

class HomeController extends Controller
{
    public function index()
    {
        $wisata = $this->model('Wisata');
        $fasilitas = $this->model('Fasilitas');
        $ulasan = $this->model('Ulasan');

        $data['wisata'] = $wisata->getAll();
        $data['fasilitas'] = $fasilitas->getAllAktifWithGambar();
        $data['ulasan'] = $ulasan->getApproved();


        $this->view('home/index', $data);
    }
}
