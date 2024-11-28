<?php 

class Home_Admin_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function delete($id) {
        $query = "DELETE FROM article WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function edit($data) {
        $query = "UPDATE article SET 
        `date` = :date,
        title = :title,
        img = :img,
        word = :word
        WHERE id = :id
        ";
        $this->db->query($query);
        $this->db->bind('date', $data['date']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('img', $data['img']);
        $this->db->bind('word', $data['word']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}


?>