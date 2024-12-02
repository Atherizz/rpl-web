<?php

class Home extends Controller
{

    public function __construct() {

    }
    public function index()
    {
        $newsPerPage = 6; // Jumlah berita per halaman

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $offset = ($currentPage - 1) * $newsPerPage;

        $data['judul'] = 'Home';
        $data['news'] = $this->model('Home_model')->getNewsPagination($newsPerPage, $offset);
        $data['carousel'] = $this->model('Home_model')->getAllCarousel();

        $totalNews = $this->model('Home_model')->countNews();
        $data['totalPages'] = ceil($totalNews / $newsPerPage);
        $data['currentPage'] = $currentPage;

        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }

    public function detail($id)
    {
        $this->view('template/header');
        $data['news'] = $this->model('Home_model')->getNewsById($id);
        $data['list'] = $this->model('Home_model')->getAllNews();
        $this->view('home/detail', $data);
    }
}
