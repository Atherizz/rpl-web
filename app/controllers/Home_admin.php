<?php 
class Home_admin extends Controller {

    public function index() {
    $data['news'] = $this->model('Home_model')->getAllNews();
    $this->view('template/header_admin');
    $this->view('home_admin/index', $data);
    }
}

?>