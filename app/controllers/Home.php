<?php 

class Home extends Controller {
    public function index() {   

        $data['judul'] = 'Home';
        $data['news'] = $this->model('Home_model')->getAllNews();
        $data['carousel'] = $this->model('Home_model')->getAllCarousel();
        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }
}


?>