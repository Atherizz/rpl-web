<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Login extends Controller {

    public function __construct()
 {
    if(isset($_COOKIE["id"]) && isset($_COOKIE["password"])) {
        $id = $_COOKIE["id"];
        $password = $_COOKIE["password"];
        
        $result = $this->model('Login_model')->getUserByForm($_POST);
    
        if ($password == hash("sha256", $result["username"])) {
          $_SESSION["login"] = true;
        }
      }
 }

    public function index() {

        $this->view('template/header');
        $this->view('login/index');
    }

    public function checkUsername () {
        if (isset($_POST['submit'])) {
        $result = $this->model('Login_model')->getUserByForm($_POST);
        if ($result === true) {
            $data['error'] = $result;

            $this->view('template/header', $data);
            $this->view('login/index', $data);
            $this->view('template/footer');
        } else {
            if (isset($_POST['remember'])) {
                setcookie("username", $result['username'], time()+60*60);
                setcookie("password", hash("sha256", $result['password']), time()+60*60);
              }
            $_SESSION['login'] = true;
            header('Location: ' . BASEURL . '/home_admin');
            exit;
        }
    } 
}
}

// $hashPass = hash('sha256', $password);