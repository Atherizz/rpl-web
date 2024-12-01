<?php 

class Ekskul extends Controller {

    public function index() {
        $data['data'] = $this->model('Ekskul_model')->getAllEkskul();
        $this->view('template/header');
        $this->view('ekskul/index', $data);
    }
}

?>