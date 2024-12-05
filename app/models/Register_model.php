<?php 
class Register_model {
    private $db;
    public $error;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUsers () {
        $this->db->query("SELECT * FROM user");
        $this->db->resultSet();
    }
    
    public function register($data) {
        $this->db->query("SELECT * FROM user WHERE username = :username");
        $this->db->bind('username', $data['username']);
        $user = $this->db->single();

        if ($user) {
            $this->error = "username telah digunakan!";
            return false;
        }

        if ($data['password'] !== $data['passwordVerify']) {
            $this->error = "verifikasi password tidak sesuai!";
            return false;
        }
      
        $password = hash("sha256", $data['password']);

        $this->db->query("INSERT INTO user (username, password) VALUES (:username, :password)");
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $password);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
}
?>