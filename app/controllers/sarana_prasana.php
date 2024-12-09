<?php 

class Profil extends Controller {

public function index() {

    $this->view('template/header');
    $this->view('sarana_prasana/index');
    $this->view('template/footer');

}

}