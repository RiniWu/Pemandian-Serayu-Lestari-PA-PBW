<?php
require_once __DIR__ . '/../core/Controller.php';

class GaleriController extends Controller
{
    public function index()
    {
        $allImages = [];
        $filters = [];
        $fasilitasModel = $this->model('Fasilitas');
        $fasilitasAktif = $fasilitasModel->getAllAktifWithGambar();

        foreach ($fasilitasAktif as $fasilitas) {
            $gambarList = $fasilitas['gambar_list'] ?? [];
            $label = $fasilitas['nama'] ?? 'Fasilitas';
            $filterKey = $this->slugify($label);

            if (!isset($filters[$filterKey])) {
                $filters[$filterKey] = [
                    'key' => $filterKey,
                    'label' => $label,
                ];
            }

            foreach ($gambarList as $gambar) {
                $allImages[] = [
                    'src' => $gambar,
                    'kategori' => $filterKey,
                    'label' => $label,
                ];
            }
        }

        $data['allImages'] = $allImages;
        $data['filters'] = array_values($filters);

        $this->view('home/galeri', $data);
    }

    private function slugify($text)
    {
        $slug = strtolower(trim((string) $text));
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        return trim((string) $slug, '-');
    }
}
