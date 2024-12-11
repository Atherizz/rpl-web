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
        $imageFileType = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION));

        // Periksa apakah file adalah gambar
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check === false) {
            $this->error = "File is not an image!";
            return false;
        }

        // Periksa ukuran file
        if ($_FILES["img"]["size"] > 50000000) {
            $this->error = "Sorry, your file is too large!";
            return false;
        }

        // Periksa format file
        if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            $this->error = "Only JPG, PNG, & JPEG are allowed!";
            return false;
        }

        // Pastikan direktori bisa diakses
        if (!is_dir($target_dir) || !is_writable($target_dir)) {
            die("Upload directory is not writable or does not exist: " . $target_dir);
        }

        // Gunakan timestamp sebagai unique ID untuk nama file baru
        $timestamp = time();  // Dapatkan timestamp saat ini
        $img_baru = $timestamp . '.' . $imageFileType; // Nama file baru menggunakan timestamp
        $target_file = $target_dir . $img_baru;

        // Pindahkan file ke direktori target
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            return $img_baru; // Mengembalikan nama file baru
        } else {
            $this->error = "There was an error while uploading!";
            return false;
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
        $imageFileType = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION));

        // Ambil nama file gambar lama dari database
        $query = "SELECT img FROM ekstrakurikuler WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        $img_lama = $this->db->single()['img'];
        // Jika ada file gambar baru yang diunggah
        if (!empty($_FILES["img"]["tmp_name"])) {
            // Validasi format file
            if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
                $this->error = "Invalid file format! Only JPG, JPEG, and PNG are allowed.";
                return false;
            }

            // Pastikan direktori dapat diakses dan tulis
            if (!is_dir($target_dir) || !is_writable($target_dir)) {
                die("Upload directory is not writable or does not exist: " . $target_dir);
            }
            if ($img_lama && file_exists($target_dir . $img_lama)) {
                unlink($target_dir . $img_lama);
            }

            // Gunakan timestamp sebagai unique ID untuk nama file baru
            $timestamp = time();  // Dapatkan timestamp saat ini
            $img_baru = $timestamp . '.' . $imageFileType; // Nama file baru menggunakan timestamp
            $target_file = $target_dir . $img_baru;

            // Pindahkan file baru ke direktori
            if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $this->error = "There was an error while uploading the file!";
                return false;
            }
        }

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
        $this->db->bind('img', $img_baru);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
