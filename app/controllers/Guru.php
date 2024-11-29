<?php 

class Guru extends Controller {
 
    public function index() {
        $this->view('template/header');
        $this->view('guru/index');
    }
    
}

?>