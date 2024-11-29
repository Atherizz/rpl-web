<?php 
class Home_admin extends Controller {

    public function index() {
    $data['news'] = $this->model('Home_model')->getAllNews();
    $this->view('template/header_admin');
    $this->view('home_admin/index', $data);
    }

    public function tambah() {
        $this->view('template/header_admin');
    $this->view('home_admin/tambah');   
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
            header('Location: ' . BASEURL . '/home_admin/index');
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

    public function deleteNews($id) {
    if ($this->model('Home_Admin_model')->delete($id) > 0) {
        $data['info'] = "Berhasil Terhapus";
        header('Location:' . BASEURL . '/home_admin/index');
    } else {
        $data['info'] = "Gagal Terhapus";
        header('Location:' . BASEURL . '/home_admin/index');
    }
    }

    public function editNews($id) {
        $data['news'] = $this->model('Home_admin_model')->getNewsById($id);
        $this->view('template/header_admin');
        $this->view('home_admin/edit', $data);
    }

    public function editById() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $result =  $this->model('Home_Admin_model')->edit($_POST);
            if ($result > 0) {
                header('Location: ' . BASEURL . '/home_admin/index');  
            } else {
                $this->view('template/header_admin');
                $this->view('home_admin/edit');
            }
        }
    }



}

?>