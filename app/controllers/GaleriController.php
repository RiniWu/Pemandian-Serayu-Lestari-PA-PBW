<?php
require_once __DIR__ . '/../core/Controller.php';

class GaleriController extends Controller
{
    public function index()
    {
        // Ambil semua gambar dari public/assets/images/
        $imageDir = __DIR__ . '/../public/assets/images/';
        $files = glob($imageDir . 'img*.{jpg,jpeg,png,webp}', GLOB_BRACE);

        $allImages = [];
        if ($files) {
            sort($files);
            foreach ($files as $file) {
                $allImages[] = 'assets/images/' . basename($file);
            }
        }

        $data['allImages'] = $allImages;

        $this->view('home/galeri', $data);
    }
}
