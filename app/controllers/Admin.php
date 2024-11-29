<?php
class Admin extends Controller
{
    public function index()
    {

        $data['judul'] = 'admin';
        $this->view('template/header_admin', $data);
        $this->view('admin/index');
    }

    public function uploadNews()
    {
        $model = $this->model('Admin_Model');
        $result = $model->addNews($_POST);
        if ($result == 0) {
            $error = $model->error;
            $this->view('template/header_admin');
            $this->view('admin/index', ['error' => $error]);
        } else {
            header('Location: ' . BASEURL . '/admin/index');
        }
    }
    public function uploadEkskul()
    {
        $model = $this->model('Ekskul_model');
        $result = $model->addEkskul($_POST);
        if ($result == 0) {
            $error = $model->error;
            $this->view('template/header_admin');
            $this->view('admin/index', ['error' => $error]);
        } else {
            header('Location: ' . BASEURL . '/admin/index');
        }
    }

    public function uploadImage()
    {
        $model = $this->model('Admin_Model');
        $result = $model->addCarousel($_POST);
        if ($result == 0) {
            $error = $model->error;
            $this->view('template/header_admin');
            $this->view('admin/index', ['error' => $error]);
        } else {
            header('Location: ' . BASEURL . '/admin/index');
        }
    }
}
