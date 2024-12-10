<?php 

class User_model {
    private $db;
    public $error;

    public function __construct() {
        $this->db = new Database();
    }
    public function getDataUser($id) {
        $query = 'SELECT * FROM user WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function changePassword ($data) {
        $username = $data['username'];
        $currentPassword = $data['currentPassword'];
        $newPassword = $data['newPassword'];
        $confirmPassword = $data['confirmPassword'];

        $queryFindUser = "SELECT * FROM user WHERE username = :username";
        $this->db->query($queryFindUser);
        $this->db->bind('username', $username);
        $ambilUser = $this->db->single();

        $hashPass = hash('sha256', $currentPassword);
         if ($hashPass !== $ambilUser['password']) {
            $this->error = "password salah!";
            return false;
        } 

        if ($newPassword !== $confirmPassword) {
            $this->error = "konfirmasi password tidak sesuai!";
            return false;
        }

        $newPassword = hash("sha256", $newPassword);

        $query = "UPDATE user SET 
        password = :password
        WHERE id = :id
        ";
        $this->db->query($query);
        $this->db->bind('password', $newPassword);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}



?>