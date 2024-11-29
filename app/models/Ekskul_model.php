<?php

class Ekskul_model
{
    private $db;
    public $error;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addEkskul($data)
    {
        $query = "INSERT INTO ekstrakurikuler (nama_ekskul, pembina, img, deskripsi) VALUES (:nama_ekskul, :pembina, :img, :deskripsi)";
        $image = $this->uploadImage();
        if (!$image) {
            return false;
        }

        $this->db->query($query);
        $this->db->bind('nama_ekskul', $data['nama_ekskul']);
        $this->db->bind('pembina', $data['pembina']);
        $this->db->bind('img', $image);
        $this->db->bind('deskripsi', $data['deskripsi']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function uploadImage()
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/ekskul/';
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

        // // memeriksa apakah file sudah ada
        // if (file_exists($target_file)) {
        //     $uploadOk = 0;
        //     $this->error = "file already exist!";
        //     return false;
        // }

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

    public function getAllEkskul()
    {
        $this->db->query("SELECT * FROM ekstrakurikuler");
        return $this->db->resultSet();
    }

    public function getEkskulById($id)
    {
        $this->db->query("SELECT * FROM ekstrakurikuler WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function delete($id)
    {
        $query = "SELECT img FROM ekstrakurikuler WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        $img = $this->db->single()['img'];

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/ekskul/';
        $target_file = $target_dir . $img;

        // Hapus file img jika ada
        if (file_exists($target_file)) {
            unlink($target_file);
        }
        $query = "DELETE FROM ekstrakurikuler WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function edit($data)
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/ekskul/';
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah format file sesuai
        if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            return false;
        }

        // Ambil nama file img lama berdasarkan id
        $query = "SELECT img FROM ekstrakurikuler WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        $img_lama = $this->db->single()['img'];

        // Hapus file img lama jika ada
        $old_file = $target_dir . $img_lama;
        if (file_exists($old_file)) {
            unlink($old_file);
        }

        // Pindahkan file img baru ke direktori
        if (!is_dir($target_dir) || !is_writable($target_dir)) {
            die("Upload directory is not writable or does not exist: " . $target_dir);
        }
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

        $query = "UPDATE ekstrakurikuler SET 
        nama_ekskul = :nama_ekskul,
        pembina = :pembina,
        img = :img,
        deskripsi = :deskripsi
        WHERE id = :id
        ";
        $this->db->query($query);
        $this->db->bind('nama_ekskul', $data['nama_ekskul']);
        $this->db->bind('pembina', $data['pembina']);
        $this->db->bind('img', $_FILES["img"]["name"]);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    
}
