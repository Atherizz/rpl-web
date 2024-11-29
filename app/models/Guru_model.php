<?php 

class Guru_model {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function getAllTeacher() {
        $this->db->query("SELECT * FROM guru");
        return $this->db->resultSet();
    }
}