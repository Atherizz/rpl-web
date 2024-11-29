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

    public function uploadGuru()
    {
        $model = $this->model('Guru_Model');
        $result = $model->addGuru($_POST);
        if ($result == 0) {
            $error = $model->error;
            $this->view('template/header_admin');
            $this->view('manage_guru_admin/index', ['error' => $error]);
        } else {
            header('Location: ' . BASEURL . '/manage_guru_admin/index');
        }
    }

    public function editGuru($id) {
        $data['guru'] = $this->model('Guru_model')->getGuruById($id);
        $this->view('template/header_admin');
        $this->view('manage_guru_admin/edit', $data);
    }

    public function editById() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $result =  $this->model('Guru_model')->edit($_POST);
            if ($result > 0) {
                header('Location: ' . BASEURL . '/manage_guru_admin/index');  
            } else {
                $this->view('template/header_admin');
                $this->view('manage_guru_admin/edit');
            }
        }
    }

    public function deleteGuru($id) {
        if ($this->model('Guru_model')->delete($id) > 0) {
            $data['info'] = "Berhasil Terhapus";
            header('Location:' . BASEURL . '/manage_guru_admin/index');
        } else {
            $data['info'] = "Gagal Terhapus";
            header('Location:' . BASEURL . '/manage_guru_admin/index');
        }
        }
}


?>