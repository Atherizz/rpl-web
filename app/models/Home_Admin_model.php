<?php 

class Home_Admin_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getNewsById($id) {
        $this->db->query( "SELECT * FROM article WHERE id = :id");
        $this->db->bind('id',$id);
        return $this->db->single();

    }

    public function delete($id) {
        $query = "SELECT img FROM article WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        $gambar = $this->db->single()['img'];

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/news/';
        $target_file = $target_dir . $gambar;

        // Hapus file gambar jika ada
        if (file_exists($target_file)) {
            unlink($target_file);
        }

        $query = "DELETE FROM article WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function edit($data) {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] .'/rpl-web/public/img/news/';
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            return false;
        }
    
        if (!is_dir($target_dir) || !is_writable($target_dir)) {
            die("Upload directory is not writable or does not exist: " . $target_dir);
        }
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

    

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
        $this->db->bind('img', $_FILES["img"]["name"]);
        $this->db->bind('word', $data['word']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}


?>