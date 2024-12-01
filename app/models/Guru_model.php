<?php 

class Guru_model {
    private $db;
    public $error;
    public function __construct() {
        $this->db = new Database();
    }
    public function getAllTeacher() {
        $this->db->query("SELECT * FROM guru");
        return $this->db->resultSet();
    }

    public function getGuruById($id) {
        $this->db->query( "SELECT * FROM guru WHERE id = :id");
        $this->db->bind('id',$id);
        return $this->db->single();

    }

    public function addGuru($data)
    {
        $query = "INSERT INTO guru (nama, jabatan, img) VALUES (:nama, :jabatan, :img)";
        $path = "guru";
        $image = $this->uploadImage($path);
        if (!$image) {
            return false;
        }

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('img', $image);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id) {
        $query = "SELECT img FROM guru WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        $gambar = $this->db->single()['img'];

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/guru/';
        $target_file = $target_dir . $gambar;

        // Hapus file gambar jika ada
        if (file_exists($target_file)) {
            unlink($target_file);
        }

        $query = "DELETE FROM guru WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function edit($data) {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] .'/rpl-web/public/img/guru/';
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

    

        $query = "UPDATE guru SET 
        nama = :nama,
        jabatan = :jabatan,
        img = :img
        WHERE id = :id
        ";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('img', $_FILES["img"]["name"]);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function uploadImage($path)
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/' . $path . '/';
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["img"]["tmp_name"]);

        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            $this->error = "File is not an image!";
            return false;
        }


        if ($_FILES["img"]["size"] > 50000000) {
            $uploadOk = 0;
            $this->error = "sorry, your file is too large!";
            return false;
        }

        // apakah format file sudah benar
        if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            $this->error = "only jpg, png, & jpeg are allowed!";
            return false;
        }

        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            return basename($_FILES["img"]["name"]);
        } else {
            $this->error = "there was an error while uploading!";
            return false;
        }

        if (!is_dir($target_dir) || !is_writable($target_dir)) {
            die("Upload directory is not writable or does not exist: " . $target_dir);
        }
    }
}