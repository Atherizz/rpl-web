<?php 

class Manage_guru_admin extends Controller {

    public function index()
    {
        $this->view('template/header_admin');
        $this->view('manage_guru_admin/index');
    }
}


?>