<?php 

class Guru extends Controller {
 
    public function index() {
        $data['guru'] = $this->model('Guru_model')->getAllTeacher();
        $this->view('template/header');
        $this->view('guru/index', $data);
    }

}

?>