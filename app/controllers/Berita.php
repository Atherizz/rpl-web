<?php 

class Berita extends Controller {

public function index() {

    $data['news'] = $this->model('Home_model')->getAllNews();

    $this->view('template/header');
    $this->view('berita/index', $data);
}



}