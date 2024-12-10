<?php 
session_start();

class logout extends Controller {

    public function index() {
        session_destroy();
        session_unset();
        $_SESSION = [];
        header('Location: ' . BASEURL . '/home');

        
    }
}

?>