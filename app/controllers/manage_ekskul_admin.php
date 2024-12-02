<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class manage_ekskul_admin extends Controller
{

    public function __construct(){
        if(!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/login/index');
            exit;
        }


    }

    public function index()
    {   

        if(isset($_SESSION['success'])) {
            $data['info'] = $_SESSION['success'];
            unset($_SESSION['success']);
        }
        $data['data'] = $this->model('Ekskul_model')->getAllEkskul();
        $this->view('template/header_admin');
        $this->view('manage_ekskul_admin/index', $data);
         
    }

    public function tambah() {
        $this->view('template/header_admin');
    $this->view('manage_ekskul_admin/tambah');   
    }

    public function uploadEkskul()
    {
        $model = $this->model('Ekskul_model');
        $result = $model->addEkskul($_POST);
        if ($result == 0) {
            $error = $model->error;
            $this->view('template/header_admin');
            $this->view('manage_ekskul_admin/tambah', ['error' => $error]);
        } else {
            $_SESSION['success'] = 'Berhasil Menambahkan Data!';
            header('Location: ' . BASEURL . '/manage_ekskul_admin/index');
            exit;
        }
    }
    public function detailEkskul($id)
    {
        $data['data'] = $this->model('Ekskul_model')->getEkskulById($id);
        $this->view('template/header_admin');
        $this->view('manage_ekskul_admin/detail', $data);
    }

    public function editEkskul($id)
    {
        $data['data'] = $this->model('Ekskul_model')->getEkskulById($id);
        $this->view('template/header_admin');
        $this->view('manage_ekskul_admin/edit', $data);
    }

    public function editById()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result =  $this->model('Ekskul_model')->edit($_POST);
            if ($result > 0) {
                $_SESSION['success'] = 'Berhasil Mengedit Data!';
                header('Location: ' . BASEURL . '/manage_ekskul_admin/index');
                exit;
            } else {
                $this->view('template/header_admin');
                $this->view('manage_ekskul_admin/edit');
            }
        }
    }
    public function deleteEkskul($id)
    {
        if ($this->model('Ekskul_model')->delete($id) > 0) {
            $_SESSION['success'] = 'Berhasil Menghapus Data!';
            header('Location:' . BASEURL . '/manage_ekskul_admin/index');
        } else {
            header('Location:' . BASEURL . '/manage_ekskul_admin/index');
        }
    }
}
