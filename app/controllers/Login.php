<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Login extends Controller {

    public function index() {

        $this->view('template/header');
        $this->view('login/index');
    }

    public function checkUsername () {
        if (isset($_POST['submit'])) {
        $result = $this->model('Login_model')->getUserByForm($_POST);
        if ($result !== true) {
            $data['error'] = $result;

            $this->view('template/header', $data);
            $this->view('login/index', $data);
            $this->view('template/footer');
        } else {
            $_SESSION['login'] = true;
            header('Location: ' . BASEURL . '/home_admin');
            exit;
        }
    } 
}
}