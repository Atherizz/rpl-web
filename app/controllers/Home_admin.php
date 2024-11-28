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

    public function editNews($id) {
        $model = $this->model('Home_Admin_model'); 
        $result = $model->edit($_POST);  
        if ($result == 0) {
            $error = $model->error; 
            $this->view('template/header_admin');
            $this->view('home_admin/index', ['error' => $error]); 
        } else {
            header('Location: ' . BASEURL . '/home_admin/index');    
        }
    }
}

?>