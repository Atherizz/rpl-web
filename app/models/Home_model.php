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

    public function getNewsById($id) {
        $query = 'SELECT * FROM article WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getAllCarousel() {
        $this->db->query("SELECT * FROM carousel");
        return $this->db->resultSet();
    }

    
}

?>