<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class login extends Controller {

    public function __construct()
 {
    if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
        $username = $_COOKIE["username"];
        $password = $_COOKIE["password"];
        
        $result = $this->model('Login_model')->getUserByUsername($username);
        if ($result && $password == $result['password']) {
            $_SESSION["login"] = true;
        }
      }
 }

    public function index() {

        $this->view('template/header');
        $this->view('login/index');
    }

    public function checkUsername () {
        $model = $this->model('Login_model');
        if (isset($_POST['submit'])) {
        $result = $model->getUserByForm($_POST);
        
        if ($result) {
            if (isset($_POST['remember'])) {
                setcookie("username", $result['username'], time() + 3600);
                setcookie("password", $result['password'], time() + 3600);
            }
            $_SESSION['login'] = true;
            $_SESSION["id"] = $result["id"];
            $_SESSION["username"] = $result["username"];
            header('Location: ' . BASEURL . '/home_admin');
            exit;
        } else {
            $data['error'] = $model->error;
            $this->view('template/header');
            $this->view('login/index', $data);
            $this->view('template/footer');
        }
    }
    } 
}


// $hashPass = hash('sha256', $password);