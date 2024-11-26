<?php 

class Home extends Controller {
    public function index() {   

        $data['judul'] = 'Home';
        $data['news'] = $this->model('Home_model')->getAllNews();
        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }
}


?>