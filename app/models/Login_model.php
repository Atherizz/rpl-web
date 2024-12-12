<?php
class Login_model
{
    private $db;
    public $error;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM user WHERE username = :username");
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM user");
        $this->db->resultSet();
    }

    public function getUserByForm($user)
    {
        $username = $user['username'];
        $password = $user['password'];

        $queryFindUser = "SELECT * FROM user WHERE username = :username COLLATE utf8mb4_bin";
        $this->db->query($queryFindUser);
        $this->db->bind('username', $username);
        $ambilUser = $this->db->single();
        $hashPass = hash('sha256', $password);

        if ($ambilUser) {
            if ($hashPass == $ambilUser['password']) {
                return $ambilUser;
            } else {
                $this->error = "password salah.";
                return false;
            }
        } else {
            $this->error = "username salah.";
            return false;
        }
        return false;
    }
}
