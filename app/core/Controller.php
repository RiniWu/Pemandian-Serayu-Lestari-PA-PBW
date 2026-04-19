<?php

class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    // VIEW ADMIN (pakai layout)
    public function viewAdmin($view, $data = [])
    {
        extract($data);

        require_once '../app/views/admin/layout/header.php';
        require_once '../app/views/' . $view . '.php';
        require_once '../app/views/admin/layout/footer.php';
    }

    // VIEW BIASA (tanpa layout admin)
    public function view($view, $data = [])
    {
        extract($data);
        require_once '../app/views/' . $view . '.php';
    }
}
