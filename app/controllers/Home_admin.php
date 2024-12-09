<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Home_admin extends Controller
{
    public function __construct(){
        if(!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/login/index');
            exit;
        }

    }

    public function index()
    {
        $newsPerPage = 6; // Jumlah berita per halaman
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $offset = ($currentPage - 1) * $newsPerPage;

        if(isset($_SESSION['success'])) {
            $data['add'] = $_SESSION['success'];
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['delete'])) {
            $data['delete'] = $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['edit'])) {
            $data['edit'] = $_SESSION['edit'];
            unset($_SESSION['edit']);
        }


        $data['judul'] = 'Home';
        $data['news'] = $this->model('Home_model')->getAllNews($newsPerPage, $offset);
        $data['carousel'] = $this->model('Home_model')->getAllCarousel();

        $totalNews = $this->model('Home_model')->countNews();
        $data['totalPages'] = ceil($totalNews / $newsPerPage);
        $data['currentPage'] = $currentPage;


        $this->view('template/header_admin', $data);
        $this->view('home_admin/index', $data);
        $this->view('template/footer');
    }

    public function tambah()
    {
        $this->view('template/header_admin');
        $this->view('home_admin/tambah');
    }

    public function tambahCarousel()
    {
        $this->view('template/header_admin');
        $this->view('home_admin/tambahCarousel');
    }

    public function uploadNews()
    {
        $model = $this->model('Home_Admin_Model');
        $result = $model->addNews($_POST);
        if ($result == 0) {
            $error = $model->error;
            $this->view('template/header_admin');
            $this->view('home_admin/index', ['error' => $error]);
        } else {
            $_SESSION['success'] = 'Berhasil Menambahkan Data!';
            header('Location: ' . BASEURL . '/home_admin/index');
            exit;
        }
    }

    public function uploadImage()
    {
        $model = $this->model('Home_admin_Model');
        $result = $model->addCarousel($_POST);
        if ($result == 0) {
            $error = $model->error;
            $this->view('template/header_admin');
            $this->view('home_admin/index', ['error' => $error]);
        } else {
            header('Location: ' . BASEURL . '/home_admin/index');
        }
    }


    public function detailNews($id)
    {
        $data['data'] = $this->model('Home_model')->getNewsById($id);
        $this->view('template/header_admin');
        $this->view('home_admin/detail', $data);
    }
    public function deleteNews($id)
    {
        if ($this->model('Home_Admin_model')->delete($id) > 0) {
            $_SESSION['delete'] = 'Berhasil Menghapus Data!';
            header('Location:' . BASEURL . '/home_admin/index');
        } else {
            header('Location:' . BASEURL . '/home_admin/index');
        }
    } 

    public function deleteCarousel($id)
    {
        if ($this->model('Home_Admin_model')->deleteImage($id) > 0) {
            $_SESSION['delete'] = 'Berhasil Menghapus Data!';
            header('Location:' . BASEURL . '/home_admin/index');
        } else {
            header('Location:' . BASEURL . '/home_admin/index');
        }
    }

    public function editNews($id)
    {
        $data['news'] = $this->model('Home_admin_model')->getNewsById($id);
        $this->view('template/header_admin');
        $this->view('home_admin/edit', $data);
    }

    public function editById()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result =  $this->model('Home_Admin_model')->edit($_POST);
            if ($result > 0) {
                $_SESSION['edit'] = 'Berhasil Mengedit Data!';
                header('Location: ' . BASEURL . '/home_admin/index');
                exit;
            } else {
                $this->view('template/header_admin');
                $this->view('home_admin/edit');
            }
        }
    }
}
