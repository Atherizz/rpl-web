<?php 

class Kontak extends Controller {

    public function index() {
        $this->view('template/header');
        $this->view('kontak/index');
    }
}


?>