<?php 

class Home_model {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function getAllNews() {
        $this->db->query("SELECT * FROM article");
        return $this->db->resultSet();
    }

    public function getAllCarousel() {
        $this->db->query("SELECT * FROM carousel");
        return $this->db->resultSet();
    }
}

?>