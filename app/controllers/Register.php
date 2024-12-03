<?php 

class Register extends Controller {

    public function index() {
        $this->view('template/header');
        $this->view('register/index');
    }

    public function registrasi () {
        $model = $this->model('Register_model');
        $result = $model->register($_POST);
        if ($result > 0) {
            header('Location: ' . BASEURL . '/login');
        } else if ($result == false) {
        $data['error'] = $model->error;
        $this->view('template/header');
        $this->view('register/index', $data);
        }
    }

}