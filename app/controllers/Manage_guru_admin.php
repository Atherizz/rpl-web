<?php 

class Manage_guru_admin extends Controller {

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
            $_SESSION['success'] = 'Berhasil Menambahkan Data!';
            header('Location: ' . BASEURL . '/manage_guru_admin/index');
            exit;
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
                $_SESSION['success'] = 'Berhasil Mengedit Data!';
                header('Location: ' . BASEURL . '/manage_guru_admin/index');  
                exit;
            } else {
                $this->view('template/header_admin');
                $this->view('manage_guru_admin/edit');
            }
        }
    }

    public function deleteGuru($id) {
        if ($this->model('Guru_model')->delete($id) > 0) {
            $_SESSION['success'] = 'Berhasil Menghapus Data!';
            header('Location:' . BASEURL . '/manage_guru_admin/index');
        } else {
            header('Location:' . BASEURL . '/manage_guru_admin/index');
        }
        }
}


?>