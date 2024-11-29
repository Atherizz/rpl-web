<?php

class Home_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllNews($limit, $offset)
    {
        $this->db->query("SELECT * FROM article ORDER BY date DESC LIMIT :limit OFFSET :offset");
        $this->db->bind('limit', $limit);
        $this->db->bind('offset', $offset);
        return $this->db->resultSet();
    }

    public function countNews()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM article");
        return $this->db->single()['total'];
    }


    public function getNewsById($id)
    {
        $query = 'SELECT * FROM article WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getAllCarousel()
    {
        $this->db->query("SELECT * FROM carousel");
        return $this->db->resultSet();
    }
}
