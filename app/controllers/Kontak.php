<?php 

class kontak extends Controller {

    public function index() {
        $this->view('template/header');
        $this->view('kontak/index');
    }
}


?>