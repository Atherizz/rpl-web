<?php 

class Admin_Model {
    private $db;
    public $error;

    public function __construct() {
        $this->db = new Database();
    }

    public function addNews ($data) {
        $query = "INSERT INTO article (`date`,title, img, word) VALUES (:date, :title, :img, :word)";
        $image = $this->uploadImage();
        if (!$image) {
            return false;
        }

        $this->db->query($query);
        $this->db->bind('date', $data['date']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('img', $image);
        $this->db->bind('word', $data['word']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function addCarousel ($data) {
        $query = "INSERT INTO carousel (img) VALUES (:img)";
        $img = $this->uploadImage();

        if (!$img) {
            return false;
        }
        $this->db->query($query);
        $this->db->bind('img', $img);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function uploadImage () {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] .'/rpl-web/public/img/';
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        $check = getimagesize($_FILES["picture"]["tmp_name"]);
    
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            $this->error = "File is not an image!";
            return false;
        }
    
        // // memeriksa apakah file sudah ada
        // if (file_exists($target_file)) {
        //     $uploadOk = 0;
        //     $this->error = "file already exist!";
        //     return false;
        // }
    
        if ($_FILES["picture"]["size"] > 50000000) {
            $uploadOk = 0;
            $this->error = "sorry, your file is too large!";
            return false;
        } 
    
        // apakah format file sudah benar
        if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            $this->error = "only jpg, png, & jpeg are allowed!";
            return false;
        }
    
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {   
            return basename($_FILES["picture"]["name"]);
            } else {
            $this->error = "there was an error while uploading!";
            return false;   
        }

        if (!is_dir($target_dir) || !is_writable($target_dir)) {
            die("Upload directory is not writable or does not exist: " . $target_dir);
        }
        
        
    }

}


?>