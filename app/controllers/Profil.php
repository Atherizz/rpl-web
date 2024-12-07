<?php 

class Profil extends Controller {

public function index() {

    $this->view('template/header');
    $this->view('profil/index');

}

}


