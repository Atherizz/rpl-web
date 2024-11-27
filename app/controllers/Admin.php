<?php 
class Admin extends Controller {
    public function index() {
        
        $data['judul'] = 'admin';
        $this->view('template/header', $data);
        $this->view('admin/index');
        $this->view('template/footer');
    }


    public function uploadNews() {
        $model = $this->model('Admin_Model'); 
        $result = $model->addNews($_POST);  
        if ($result == 0) {
            $error = $model->error; 
            $this->view('template/header');
            $this->view('admin/index', ['error' => $error]); 
            $this->view('template/footer');
        } else {
            header('Location: ' . BASEURL . '/admin/index');    
        }
    }

    public function uploadImage() {
        $model = $this->model('Admin_Model'); 
        $result = $model->addCarousel($_POST);  
        if ($result == 0) {
            $error = $model->error; 
            $this->view('template/header');
            $this->view('admin/index', ['error' => $error]); 
            $this->view('template/footer');
        } else {
            header('Location: ' . BASEURL . '/admin/index');    
        }
    }
    
}