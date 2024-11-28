<?php 
class Home_admin extends Controller {

    public function index() {
    $data['news'] = $this->model('Home_model')->getAllNews();
    $this->view('template/header_admin');
    $this->view('home_admin/index', $data);
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

    public function editNews() {
        // $model = $this->model('Home_Admin_model'); 
        // $result = $model->edit($_POST);  
        // if ($result == 0) {
        //     $this->view('template/header_admin');
        //     $this->view('home_admin/index'); 
        // } else {
        //     header('Location: ' . BASEURL . '/home_admin/index');    
        // }
        $this->view('template/header_admin');
        $this->view('home_admin/edit');
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