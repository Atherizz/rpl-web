<?php

class Home_Admin_model
{
    private $db;
    public $error;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addNews($data)
    {
        $query = "INSERT INTO article (`date`,title, img, word) VALUES (:date, :title, :img, :word)";
        $path = "news";
        $image = $this->uploadImage($path);
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

    public function addCarousel($data)
    {
        $query = "INSERT INTO carousel (img) VALUES (:img)";
        $path = "carousel";
        $img = $this->uploadImage($path);

        if (!$img) {
            return false;
        }
        $this->db->query($query);
        $this->db->bind('img', $img);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getNewsById($id)
    {
        $this->db->query("SELECT * FROM article WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function delete($id)
    {
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

    public function deleteImage($id)
    {
        $query = "SELECT img FROM carousel WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        $gambar = $this->db->single()['img'];

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/carousel/';
        $target_file = $target_dir . $gambar;

        // Hapus file gambar jika ada
        if (file_exists($target_file)) {
            unlink($target_file);
        }

        $query = "DELETE FROM carousel WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function edit($data)
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/news/';
        $imageFileType = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION));

        // Ambil nama file gambar lama dari database
        $query = "SELECT img FROM article WHERE id = :id";
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

        // Update data di database dengan nama file gambar yang baru
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
        $this->db->bind('img', $img_baru);
        $this->db->bind('word', $data['word']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function uploadImage($path)
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/rpl-web/public/img/' . $path . '/';
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
            $this->error = "Only JPG, JPEG, & PNG are allowed!";
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
            return $img_baru;
        } else {
            $this->error = "There was an error while uploading!";
            return false;
        }
    }
}
