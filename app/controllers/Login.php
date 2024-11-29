<?php 

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
            header('Location: ' . BASEURL . '/admin');
        }
    }
}
}