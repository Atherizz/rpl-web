<?php 

    class profile_admin extends Controller {
        private $id;
        private $username;
        // private $password;

        public function __construct() {

            if(!isset($_SESSION['login'])) {
                header('Location: ' . BASEURL . '/login/index');
                exit;
            }

            if(isset($_SESSION["id"]) && isset($_SESSION["username"])) {
                $this->id = $_SESSION["id"];
                $this->username = $_SESSION["username"];
            }
        }

    public function index() {

        if(isset($_SESSION['success'])) {
            $data['change'] = $_SESSION['success'];
            unset($_SESSION['success']);
        }

        $data['user'] = $this->model('User_model')->getDataUser($this->id);
        $this->view('template/header_admin');
        $this->view('profile_admin/index', $data);
    }

    public function change() {

    $data['user'] = $this->model('User_model')->getDataUser($this->id);
    $this->view('template/header_admin');
    $this->view('profile_admin/change', $data);
}

    public function changePass() {
        $model = $this->model('User_model');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result =  $model->changePassword($_POST);
            if ($result > 0) {
                $_SESSION['success'] = 'Berhasil Mengubah Password!';
                header('Location: ' . BASEURL . '/profile_admin/index');
                exit;
            } else {
                $data['error'] = $model->error;
                $data['user'] = $model->getDataUser($this->id);
                $this->view('template/header_admin');
                $this->view('profile_admin/change', $data);
            }
        }
    }

}



