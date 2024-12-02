<?php 
class Register_model {
    private $db;

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
    }
}
?>