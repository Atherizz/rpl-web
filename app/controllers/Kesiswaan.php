<?php
class Kesiswaan extends Controller
{

    public function index()
    {
        $data['data'] = $this->model('Ekskul_model')->getAllEkskul();
        $this->view('template/header');
        $this->view('kesiswaan/index', $data);
    }
}
