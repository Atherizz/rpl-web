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
        $query = "INSERT INTO ekstrakurikuler (nama_ekskul, gambar, deskripsi) VALUES (:nama_ekskul, :gambar, :deskripsi)";
        $image = $this->uploadImage();
        if (!$image) {
            return false;
        }

        $this->db->query($query);
        $this->db->bind('nama_ekskul', $data['nama_ekskul']);
        $this->db->bind('gambar', $image);
        $this->db->bind('deskripsi', $data['deskripsi']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function uploadImage()
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/ekskul/';
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["gambar"]["tmp_name"]);

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

        if ($_FILES["gambar"]["size"] > 50000000) {
            $uploadOk = 0;
            $this->error = "sorry, your file is too large!";
            return false;
        }

        // apakah format file sudah benar
        if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            $this->error = "only jpg, png, & jpeg are allowed!";
            return false;
        }

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            return basename($_FILES["gambar"]["name"]);
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
        $query = "SELECT gambar FROM ekstrakurikuler WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        $gambar = $this->db->single()['gambar'];

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/ekskul/';
        $target_file = $target_dir . $gambar;

        // Hapus file gambar jika ada
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
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah format file sesuai
        if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            return false;
        }

        // Ambil nama file gambar lama berdasarkan id
        $query = "SELECT gambar FROM ekstrakurikuler WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        $gambar_lama = $this->db->single()['gambar'];

        // Hapus file gambar lama jika ada
        $old_file = $target_dir . $gambar_lama;
        if (file_exists($old_file)) {
            unlink($old_file);
        }

        // Pindahkan file gambar baru ke direktori
        if (!is_dir($target_dir) || !is_writable($target_dir)) {
            die("Upload directory is not writable or does not exist: " . $target_dir);
        }
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

        $query = "UPDATE ekstrakurikuler SET 
        nama_ekskul = :nama_ekskul,
        gambar = :gambar,
        deskripsi = :deskripsi
        WHERE id = :id
        ";
        $this->db->query($query);
        $this->db->bind('nama_ekskul', $data['nama_ekskul']);
        $this->db->bind('gambar', $_FILES["gambar"]["name"]);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
