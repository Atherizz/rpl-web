<?php 

class Berita extends Controller {

public function index() {

    $this->view('template/header');
    $this->view('berita/index');
    $this->view('template/footer');
}

}


