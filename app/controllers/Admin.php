<?php 
class Admin extends Controller {
    public function index() {
        
        $data['judul'] = 'admin';
        $this->view('template/header', $data);
        $this->view('admin/index');
        $this->view('template/footer');
    }
}