<?php 

class Manage_guru_admin extends Controller {

    public function index()
    {
        $data['guru'] = $this->model('Guru_model')->getAllTeacher();
        $this->view('template/header_admin');
        $this->view('manage_guru_admin/index', $data);
    }

    public function tambah() {
        $this->view('template/header_admin');
        $this->view('manage_guru_admin/tambah');
    }
}


?>