<?php 
class Login_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUsers () {
        $this->db->query("SELECT * FROM user");
        $this->db->resultSet();
    }
    
    public function getUserByForm ($user) {
        $username = $user['username'];
        $password = $user['password'];

        $queryFindUser = "SELECT * FROM user WHERE username = :username";
        $this->db->query($queryFindUser);
        $this->db->bind('username', $username);
        $ambilUser = $this->db->single();

        if ($ambilUser) {
            if ($password == $ambilUser['password']) {
                return true;
            } else {
                return "username / password salah!";

            }
        }

    }
}
?>