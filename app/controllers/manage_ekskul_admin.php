<?php
class manage_ekskul_admin extends Controller
{

    public function index()
    {
        $data['data'] = $this->model('Ekskul_model')->getAllEkskul();
        $this->view('template/header_admin');
        $this->view('manage_ekskul_admin/index', $data);
    }
    public function detailEkskul($id)
    {
        $data['data'] = $this->model('Ekskul_model')->getEkskulById($id);
        $this->view('template/header_admin');
        $this->view('manage_ekskul_admin/detail', $data);
    }

    public function editEkskul($id)
    {
        $data['data'] = $this->model('Ekskul_model')->getEkskulById($id);
        $this->view('template/header_admin');
        $this->view('manage_ekskul_admin/edit', $data);
    }

    public function editById()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result =  $this->model('Ekskul_model')->edit($_POST);
            if ($result > 0) {
                header('Location: ' . BASEURL . '/manage_ekskul_admin/index');
            } else {
                $this->view('template/header_admin');
                $this->view('manage_ekskul_admin/edit');
            }
        }
    }
    public function deleteEkskul($id)
    {
        if ($this->model('Ekskul_model')->delete($id) > 0) {
            $data['info'] = "Berhasil Terhapus";
            header('Location:' . BASEURL . '/manage_ekskul_admin/index');
        } else {
            $data['info'] = "Gagal Terhapus";
            header('Location:' . BASEURL . '/manage_ekskul_admin/index');
        }
    }
}
