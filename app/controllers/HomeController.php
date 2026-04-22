<?php

class HomeController extends Controller
{
    public function index()
    {
        $fasilitas = $this->model('Wisata');
        $ulasan = $this->model('Ulasan');

        $data['wisata'] = $fasilitas->getAll();
        $data['ulasan'] = $ulasan->getApproved();


        $this->view('home/index', $data);
    }
}
